<?php
use think\Loader;
use extend\Redis;
use think\Request;
use app\admin\controller\Auth;
Loader::import('Redis', EXTEND_PATH);
//有选择的过滤CSS
function removeXSS($data) {
    require_once  '../../public/static/plugins/htmlPurifier/HTMLPurifier.auto.php';
    $_clean_xss_config = HTMLPurifier_Config::createDefault();
    $_clean_xss_config->set('Core.Encoding', 'UTF-8');
    $_clean_xss_config->set('HTML.Allowed','div,b,strong,i,em,a[href|title],ul,ol,li,p[style],br,span[style],img[width|height|alt|src]');
    $_clean_xss_config->set('CSS.AllowedProperties', 'font,font-size,font-weight,font-style,font-family,text-decoration,padding-left,color,background-color,text-align');
    $_clean_xss_config->set('HTML.TargetBlank', TRUE);
    $_clean_xss_obj = new HTMLPurifier($_clean_xss_config);
    //执行过滤
    return $_clean_xss_obj->purify($data);
}

function uploadFile($fileName, $dirName) {
    $fc = config('FILE_CONFIG');
    $file = request()->file($fileName);
    $savePath = $dirName; // 自定义的附件目录
    $info = $file->validate(['size' => $fc['maxSize'],'ext' => $fc['exts']])->move($fc['rootPath'] . $savePath);
    if(!$info) {
        return array(
            'ok' => 0,
            'error' => $file->getError(),
        );
    }else {
        $ret['ok'] = 1;
        $saveArrLen = count(explode('/',$info->getSaveName()));
        if($saveArrLen == 2){
            $timeDir = $saveArrLen[0];
            $saveName = $saveArrLen[1];
        }elseif($saveArrLen == 1){
            $saveArrLen = explode('\\',$info->getSaveName());
            $timeDir = $saveArrLen[0];
            $saveName = $saveArrLen[1];
        }
        $ret['file'] = $savePath . DS . $timeDir . DS .$saveName;
        return $ret;
    }
}
//上传单张图片
function uploadOne($imgName, $dirName, $thumb = array()) {
    // 上传LOGO
    $ic = config('IMAGE_CONFIG');
    $file = request()->file($imgName);
    $savePath = $dirName; // 自定义的图片目录名称
    // 上传文件
    $info = $file->validate(['size' => $ic['maxSize'],'ext' => $ic['exts']])->move($ic['rootPath'] . $savePath);
    if(!$info) {
        return array(
            'ok' => 0,
            'error' => $file->getError(),
        );
    }
    else {
        $ret['ok'] = 1;
        $saveArr = explode('/',$info->getSaveName());
        $saveArrLen = count($saveArr);
        if($saveArrLen == 2){
            $timeDir = $saveArr[0];
            $saveName = $saveArr[1];
        }elseif($saveArrLen == 1){
            $saveArr = explode('\\',$info->getSaveName());
            $timeDir = $saveArr[0];
            $saveName = $saveArr[1];
        }
        $ret['images'][0] = $logoName = $savePath . DS . $timeDir . DS .$saveName;

        // 判断是否生成缩略图
        if($thumb)
        {
            // 循环生成缩略图
            foreach ($thumb as $k => $v)
            {
                $ret['images'][$k+1] = $savePath . DS . $timeDir . DS .'thumb_'.$k.'_' .$saveName;
                // 打开要处理的图片
                $image = \think\Image::open($ic['rootPath'].$logoName);
                $image->thumb($v[0], $v[1],\think\Image::THUMB_FIXED)->save($ic['rootPath'].$ret['images'][$k+1]);
            }
        }
        return $ret;
    }
}
//循环删除单个商品的图片
function deleteImage($image) {
    $ic = config('IMAGE_CONFIG');
    if(is_string($image)) {
        @unlink($ic['rootPath'].$image);
    }else if(is_array($image)) {
        foreach($image as $v) {
            if($v == '') {
                continue;
            }
            @unlink($ic['rootPath'].$v);
        }
    }
}
function buildSelect($table,$select,$valueField,$textField,$selected = '',$num = 8,$where = array(),$flag = false) {
    $model = db($table);
    $data = $model->field("$valueField,$textField")->where($where)->select();
    $sel = "<div class='col-lg-".$num."'>";
    $sel .= "<select name='$select'><option value=''>请选择</option>>";
    foreach ($data as $k => $v) {
        $value = $v[$valueField];
        $text = $v[$textField];
        if($selected && $selected == $value) {
            $sl = 'selected="selected"';
        }else{
            $sl = '';
        }
        $sel .= '<option '.$sl.' value="'.$value.'">'.$text.'</option>';
    }
    $sel .= "</select>";
    $sel .= "</div>";
    if($flag) {
        return $sel;
    }
    echo $sel;
}
function myrequest($url,$https=true,$method='get',$data=null) {
    //1.初始化url
    $ch = curl_init($url);
    //2.设置相关的参数
    //字符串不直接输出,进行一个变量的存储
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//    curl_setopt($ch, CURLOPT_HEADER, 1);
    //判断是否为https请求
    if($https === true){
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    }
    //判断是否为post请求
    if($method == 'post'){
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    }
//    //3.发送请求
    $str = curl_exec($ch);
//    $hd = curl_getinfo($ch);
    //4.关闭连接
    curl_close($ch);
    //返回请求到的结果
    // return array('str'=>$str,'hd'=>$hd);
    return $str;
}
function getCity() {
    $request = Request::instance();
    $ip = $request->ip();
    if($ip === '127.0.0.1'){
        $ip = '121.235.4.13';
    }
    $ipUrl = 'http://ip.taobao.com/service/getIpInfo.php?ip='.$ip;
    $ipContent = myrequest($ipUrl,false);
    $city = json_decode($ipContent,true)['data']['city'];
    if($city == '') {
        $city = '无锡';
    }
    return $city;
}
function getWeather() {
    $city = getCity();
    $weatherUrl = 'https://v.juhe.cn/weather/index?format=2&cityname='.$city.'&key=f7f1c0921995387e2419cde879681613';
    $data = myrequest($weatherUrl,true);
    $data = json_decode($data,true);
    if($data['resultcode'] == 200) {
        $weaContent = $data['result'];
    }else{
        echo '获取天气数据失败，请调试！';
        die;
//        $data = getWeather();
//        $weaContent = $data['result'];
    }
    return $weaContent;
}
function httpGet($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    $output=curl_exec($ch);
    curl_close($ch);
    return $output;
}
function getRealTimeWeatherCode() {
    $city = getCity();
    $key = 'k2gcsd7u8u2uihhg';
    $uid = 'UB70874D96';
    $api = 'https://api.seniverse.com/v3/weather/now.json';
    $param = [
        'ts' => time(),
        'ttl' => 300,
        'uid' => $uid,
    ];
    $sig_data = http_build_query($param);
    $sig = base64_encode(hash_hmac('sha1', $sig_data, $key, TRUE));
    $param['sig'] = $sig; // 签名
    $param['location'] = $city;
    $param['start'] = 0; // 开始日期。0 = 今天天气
    $param['days'] = 1; // 查询天数，1 = 只查一天
    $url = $api . '?' . http_build_query($param);
    $data = json_decode(httpGet($url),true)['results'][0]['now'];
    return $data;
}
function initconfig(){
    // Memcache 主机
    $_SERVER['MEMCACHE_HOST'] = '127.0.0.1';
    // Memcache 端口
    $_SERVER['MEMCACHE_PORT'] = 11211;
    // Redis 主机
    $_SERVER['REDIS_HOST'] = '127.0.0.1';
    // Redis 端口
    $_SERVER['REDIS_PORT'] = 6379;
}
function doWeaToRedis() {
    //设置脚本永不超时
    set_time_limit(0);
    //改变脚本可用内存,默认是128M,改为500M
    ini_set("memory_limit","500M");
    //把mysql里的mobile数据全部取出来
    $data = db('wea')->select();
    //连接redis
    initconfig();
    $redis = Redis::getInstance();
    $redis->select(1);
    $redis->flushDB();
    foreach ($data as $key => $value) {
        if($redis->setnx($value['wid'],$value['weacss'])) {
            //销毁变量数据，释放内存
            unset($value);
        }else{
            echo 'redis出错，请调试！';
            return false;
        }
    }
    return true;
}
function getRealWeather() {
    initconfig();
    $redis = Redis::getInstance();
    $redis->select(2);
    if(!cookie('myflag1')) {
        $redis->del('now');
        cookie('myflag1',1,3600);
        $now = getRealTimeWeatherCode();
        $redis->select(1);
        $now['cate'] =  $redis->get($now['code']);
        $redis->select(2);
        $redis->set('now',serialize($now));
        return $now;
    }else{
        $now = $redis->get('now');
        return unserialize($now);
    }
}
function updateRealWeather() {
    $rtWeather = getRealWeather();
    echo json_encode($rtWeather);
}
function updateWeather() {
    initconfig();
    $redis = Redis::getInstance();
    $redis->select(2);
    if(!cookie('myflag2')) {
        $redis->del('arr');
        cookie('myflag2',1,28800);
        $weaContent = getWeather();
        $arr['weaSk'] = $weaContent['sk'];
        $arr['weaFu'] = $weaContent['future'];
        $arr['weaTo'] = $weaContent['today'];
        $redis->set('arr',serialize($arr));
        return $arr;
    }else{
        $arr = $redis->get('arr');
        return unserialize($arr);
    }
}
function realDate($time = null) {
    if($time) {
        $timeFrame = date('a',$time) == 'am' ? '上午':'下午';
        $week = date('N',$time);
        $arr = ['星期一','星期二','星期三','星期四','星期五','星期六','星期日'];
        $date = date('Y/m/d h:i:s',$time);
        $date = str_replace(' ',' '.$arr[$week-1].' '.$timeFrame,$date);
        return $date;
    }else{
        $timeFrame = date('a',time()) == 'am' ? '上午':'下午';
        $week = date('N',time());
        $arr = ['星期一','星期二','星期三','星期四','星期五','星期六','星期日'];
        $date = date('Y/m/d h:i:s',time());
        $date = str_replace(' ',' '.$arr[$week-1].' '.$timeFrame,$date);
        return $date;
    }

}
function getPwd($str){
    return sha1(md5($str));
}

function authcheck($rule,$uid,$type=1, $mode='url', $relation='and'){
    if($uid == 5) {
        return true;
    } elseif(session('isRoot')){
        return true;
    }else{
        $auth=new Auth();
        return $auth->check($rule,$uid,$type,$mode,$relation) ? true:false;
    }
}