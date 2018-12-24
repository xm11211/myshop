<?php
namespace app\member\controller;
use app\index\controller\Base;
use think\Loader;
use extend\String;
class Account extends Base {
    public function reg() {
	    $uid = session('uid');
	    if($uid) {
		    $this->redirect('/user/'.$uid.'.html');
	    }
        if(request()->isPost()) {
           $validate = Loader::validate('User');
           $data = input('post.');
           if($validate->check($data)) {
               if(isset($data['register_type'])) {
                   if($data['register_type'] == 1) {
                       if($this->checkGroup('phoneGroup',$data['mobile_code'],$data['mobile_phone'])) {
                           session('phoneGroup',null);
                           $arr['tel'] = $data['mobile_phone'];
                           $arr['tChecked'] = 1;
                           $arr['regType'] = 1;
                           $arr['regTime'] = time();
                       }else {
                           $this->error('手机和验证码不匹配，请重新获取并填写或修改！');
                       }
                       $arr['userName'] = $data['username'];
                       Loader::import('String', EXTEND_PATH);
                       $arr['randString'] = String::randString(15);
                       $arr['password'] = getPwd($data['password'].$arr['randString']);
                       if(db('user')->insert($arr)) {
                           $this->success('注册成功！','/user.html');
                       }else {
                           $this->error('注册失败！请联系管理员或重新尝试注册！');
                       }
                   }else if($data['register_type'] == 0) {
                       if($this->checkGroup('emailGroup',$data['send_code'],$data['email'])) {
                           session('emailGroup',null);
                           $arr['email'] = $data['email'];
                           $arr['eChecked'] = 1;
                           $arr['regType'] = 0;
                           $arr['regTime'] = time();
                       }else {
                           $this->error('邮箱和邮箱验证码不匹配，请重新获取并填写或修改！');
                       }
                       $arr['userName'] = $data['username'];
                       Loader::import('String', EXTEND_PATH);
                       $arr['randString'] = String::randString(15);
                       $arr['password'] = getPwd($data['password'].$arr['randString']);
                       if(db('user')->insert($arr)) {
                           $this->success('注册成功！','/user.html');
                       }else {
                           $this->error('注册失败！请联系管理员或重新尝试注册！');
                       }
                   }else {
                       abort(404);
                   }
               }else {
                   abort(404);
               }
           }
           $this->error($validate->getError());
        }
        return view();
    }
    private function checkGroup($field,$code1,$code2) {
        $sessGroup = session($field);
        if(!isset($sessGroup)) {
            return false;
        }
        $sessCode = substr($sessGroup,-6);
        $index = strrpos($sessGroup,$sessCode);
        $sessCheck = substr($sessGroup,0,$index);
        if($sessCode == $code1 && $sessCheck == $code2) {
            return true;
        }
    }
    //短信注册验证码
    public function sendCode() {
        if(request()->isAjax()) {
            $phone = input('phone');
            $sendUrl = 'http://v.juhe.cn/sms/send'; //短信接口的URL
            $code = mt_rand(100000,999999);
            $smsConf = array(
                'key'   => '329189cd911506d04dd47112a613268a', //您申请的APPKEY
                'mobile'    => $phone, //接受短信的用户手机号码
                'tpl_id'    => '66549', //您申请的短信模板ID，根据实际情况修改
                'tpl_value' =>'#code#='. $code //您设置的模板变量，根据实际情况修改
            );

            $content = msgcurl($sendUrl,$smsConf,1); //请求发送短信

            if($content){
                $result = json_decode($content,true);
                $errorCode = $result['error_code'];
                if($errorCode == 0){
                    $phoneGroup = $phone.$code;
                    //状态为0，说明短信发送成功
                    session('phoneGroup',$phoneGroup);
                    echo 1;
                }else{
                    //状态非0，说明失败
                    $msg = $result['reason'];
                    echo "短信发送失败(".$errorCode.")：".$msg;
                }
            }else{
                //返回内容异常，以下可根据业务逻辑自行修改
                echo "请求发送短信失败";
            }
        }else {
            abort(404);
        }

    }
    //短信找回验证码
    public function sendFindCode() {
        if(request()->isAjax()) {
            $phone = input('phone');
            $num = db('user')->where(array('tel' => $phone))->count();
            if($num == 0) {
               $result['code'] = 1;
               $result['msg'] = '该手机号不存在！';
               return json($result);
            }
            $sendUrl = 'http://v.juhe.cn/sms/send'; //短信接口的URL
            $code = mt_rand(100000,999999);
            $smsConf = array(
                'key'   => '329189cd911506d04dd47112a613268a', //您申请的APPKEY
                'mobile'    => $phone, //接受短信的用户手机号码
                'tpl_id'    => '67391', //您申请的短信模板ID，根据实际情况修改
                'tpl_value' =>'#code#='. $code //您设置的模板变量，根据实际情况修改
            );

            $content = msgcurl($sendUrl,$smsConf,1); //请求发送短信
            if($content){
                $result = json_decode($content,true);
                $errorCode = $result['error_code'];
                if($errorCode == 0){
                    $phoneGroup = $phone.$code;
                    //状态为0，说明短信发送成功
                    session('phoneFindGroup',$phoneGroup);
                    $result['code'] = 0;
                    return $result;
                }else{
                    //状态非0，说明失败
                    $msg = $result['reason'];
                    echo "短信发送失败(".$errorCode.")：".$msg;
                }
            }else{
                //返回内容异常，以下可根据业务逻辑自行修改
                echo "请求发送短信失败";
            }
        }else {
            abort(404);
        }

    }
    public function sendEmail($type = 0,$email,$password = '') {
        if($type == 1) {
            $content = sendEmail($email, '【新新家电】您的新密码是：', $password);
            if($content) {
                $errorCode = $content['code'];
                if($errorCode == 1) {
                    return true;
                }else {
                    $this->error("邮件发送失败(".$errorCode.")");
                }
            }else {
                $this->error("请求发送邮件失败");
            }
        }
        if(request()->isAjax()) {
            $email = input('email');
            $code = mt_rand(100000,999999);
            $content = sendEmail($email, '【新新家电】邮箱验证码：', $code);
            if($content) {
                $errorCode = $content['code'];
                if($errorCode == 1) {
                    $emailGroup = $email.$code;
                    session('emailGroup',$emailGroup);
                    echo 1;
                }else {
                    echo "邮件发送失败(".$errorCode.")";
                }
            }else {
                echo "请求发送邮件失败";
            }
        }else {
            abort(404);
        }
    }
    public function checkUsername() {
        if(request()->isAjax()) {
            $userName = input('username');
            $num = db('user')->where('userName','eq',$userName)->count();
            if($num == 1) {
                return false;
            }
            return true;
        }else{
            abort(404);
        }
    }
    public function checkEmail() {
        if(request()->isAjax()) {
            $email = input('email');
            $num = db('user')->where('email','eq',$email)->count();
            if($num == 1) {
                return false;
            }
            return true;
        }else{
            abort(404);
        }
    }
    public function checkEmailCode() {
        if(request()->isAjax()) {
            $emailCode = input('send_code');
            $email = input('email');
            $sessGroup = session('emailGroup');
            if(!isset($sessGroup)) {
                return false;
            }
            $sessCode = substr($sessGroup,-6);
            $index = strrpos($sessGroup,$sessCode);
            $sessEmail = substr($sessGroup,0,$index);
            if($sessCode == $emailCode && $sessEmail == $email) {
                return true;
            }
            return false;
        }else{
            abort(404);
        }
    }
    public function checkPhone() {
        if(request()->isAjax()) {
            $tel = input('mobile_phone');
            $num = db('user')->where('tel','eq',$tel)->count();
            if($num == 1) {
                return false;
            }
            return true;
        }else{
            abort(404);
        }
    }
    public function checkPhoneCode() {
        if(request()->isAjax()) {
            $smsCode = input('mobile_code');
            $phone = input('mobile_phone');
            $sessGroup = session('phoneGroup');
            if(!isset($sessGroup)) {
                return false;
            }
            $sessCode = substr($sessGroup,-6);
            $index = strrpos($sessGroup,$sessCode);
            $sessPhone = substr($sessGroup,0,$index);
            if($sessCode == $smsCode && $sessPhone == $phone) {
                return true;
            }
            return false;
        }else{
            abort(404);
        }
    }
    public function checkFindPhoneCode() {
        if(request()->isAjax()) {
            $smsCode = input('mobile_code');
            $phone = input('mobile_phone');
            $sessGroup = session('phoneFindGroup');
            if(!isset($sessGroup)) {
                return false;
            }
            $sessCode = substr($sessGroup,-6);
            $index = strrpos($sessGroup,$sessCode);
            $sessPhone = substr($sessGroup,0,$index);
            if($sessCode == $smsCode && $sessPhone == $phone) {
                return true;
            }
            return false;
        }else{
            abort(404);
        }
    }
    public function login() {
        $uid = session('uid');
        if($uid) {
            $this->redirect('/user/'.$uid.'.html');
        }
        if(request()->isPost()) {
            $data = input('post.');
            $userModel = model('user');
            $result = $userModel->login($data);
            return $result;
        }
        return view();
    }
    //ajax判断用户登录状态
    public function checkLogin() {
        $uid = session('uid');
        if($uid) {
            $result['error'] = 0;
            $result['uid'] = $uid;
            $result['username'] = session('username');
            return $result;
        }else if(cookie('username') && cookie('password')) {
            $userModel = model('user');
            $data['username'] = $userModel->jiemi(cookie('username'));
            $data['password'] = $userModel->jiemi(cookie('password'));
            $result = $userModel->login($data,true);
            return $result;
        }
    }
    //找回密码
    public function getPassword() {
        return view();
    }
    public function emailChangePassword() {
       $data = input('post.');
       $token = session('pwd_token');
       if($token != $data['pwd_token']) {
           abort(404);
       }
       $where['userName'] = array('eq',$data['user_name']);
       $where['email'] = array('eq',$data['email']);
       $num = db('user')->where($where)->count();
       if($num == 0) {
           return view('index@common/tip_info',['errorMsg' => "用户名和邮箱不匹配！",'showRight' => 1200]);
//           $this->error("用户名和邮箱不匹配！");
       }else {
           Loader::import('String', EXTEND_PATH);
           $password = String::randString(10,3,'@!#$%^&*?.0123456789');
           $status = $this->sendEmail(1,$data['email'],$password);
           if($status) {
               //修改数据库密码
               $randString = String::randString(15);
               $password = getPwd($password.$randString);
               db('user')->where('email','eq',$data['email'])->update(array(
                   'password' => $password,
                   'randString' => $randString,
               ));
               $this->success("新密码已经发送到您的邮箱，请注意接收！");
           }
       }
    }
}
