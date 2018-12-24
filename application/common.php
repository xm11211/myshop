<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------
// 应用公共文件
function http_404(){
    $theme = get_system_value('site_theme');
    $template = 'template/index/'. $theme .'/Public_404.html';
    // $info = Request::instance()->header();
    return \think\Response::create($template, 'view', '404');
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
//显示图片函数
function showImage($url,$width = '',$height = '',$class='',$flag = false) {
    $ic =config('IMAGE_CONFIG');
    if($width) {
        $width = "width='$width'";
    }
    if($height) {
        $height = "height='$height'";
    }
    if($class) {
        $class = "class='$class'";
    }
    if($flag) {
        return "<img src='{$ic['viewPath']}$url' $width $height $class/>";
    }
    echo "<img src='{$ic['viewPath']}$url' $width $height $class/>";
}
function getTree($model,$sort = null,$rule = 'asc')
{
    if($sort){
        $data = $model->order("$sort $rule")->select();
        return reSort($data);
    }
    $data = $model->select();
    return reSort($data);
}
function reSort($data, $parentId=0, $level=0, $isClear=TRUE)
{
    static $ret = array();
    if($isClear)
        $ret = array();
    foreach ($data as $k => $v)
    {
        if($v['pid'] == $parentId)
        {
            $v['level'] = $level;
            $ret[] = $v;
            reSort($data, $v['id'], $level+1, FALSE);
        }
    }
    return $ret;
}
function getChildren($model,$id,$flag=false,$isClear=TRUE)
{
    $data = $model->select();
    return children($data,$id,$flag,$isClear);
}
function children($data,$id=0,$flag,$isClear=TRUE)
{
    static $ret = array();
    if($isClear)
        $ret = array();
    foreach ($data as $k => $v)
    {
        if($v['pid'] == $id)
        {
            if($flag) {
                $ret[] = $v;
            }else{
                $ret[] = $v['id'];
            }
            children($data, $v['id'],$flag,FALSE);
        }
    }
    return $ret;
}
function bread($model,$id,$flag = false) {
    if($flag) {
        while($id) {
            $data = $model->find($id);
            $id = $data['pid'];
            $parData = $data['id'];
        }
        return $parData;
    }else{
        while($id) {
            $data = $model->find($id);
            $arr[] = $data;
            $id = $data['pid'];
        }
        return array_reverse($arr);
    }
}
function cut_str($sourcestr,$cutlength)

{

    $returnstr='';

    $i=0;

    $n=0;

    $str_length=strlen($sourcestr);//字符串的字节数

    while (($n<$cutlength) and ($i<=$str_length))

    {

        $temp_str=substr($sourcestr,$i,1);

        $ascnum=Ord($temp_str);//得到字符串中第$i位字符的ascii码

        if ($ascnum>=224)    //如果ASCII位高与224，

        {

            $returnstr=$returnstr.substr($sourcestr,$i,3); //根据UTF-8编码规范，将3个连续的字符计为单个字符

            $i=$i+3;            //实际Byte计为3

            $n++;            //字串长度计1

        }

        elseif ($ascnum>=192) //如果ASCII位高与192，

        {

            $returnstr=$returnstr.substr($sourcestr,$i,2); //根据UTF-8编码规范，将2个连续的字符计为单个字符

            $i=$i+2;            //实际Byte计为2

            $n++;            //字串长度计1

        }

        elseif ($ascnum>=65 && $ascnum<=90) //如果是大写字母，

        {

            $returnstr=$returnstr.substr($sourcestr,$i,1);

            $i=$i+1;            //实际的Byte数仍计1个

            $n++;            //但考虑整体美观，大写字母计成一个高位字符

        }

        else                //其他情况下，包括小写字母和半角标点符号，

        {

            $returnstr=$returnstr.substr($sourcestr,$i,1);

            $i=$i+1;            //实际的Byte数计1个

            $n=$n+0.5;        //小写字母和半角标点等与半个高位字符宽...

        }

    }

    if ($str_length>$i){

        $returnstr = $returnstr . "...";//超过长度时在尾处加上省略号

    }

    return $returnstr;

}