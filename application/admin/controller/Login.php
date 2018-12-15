<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\Admin;
use think\Loader;
use extend\String;
class Login extends Controller {
    public function index($check = null) {
        if(session('aid')) {
            $this->success('您已登录！','index/index');
        }
        $codeCheck = date("Hi",$_SERVER['REQUEST_TIME']);
        if(request()->isAjax() && $check == null) {
            $validate = input('post.validate');
            if(session('validate') == $validate) {
                $admin = new Admin();
                $data = input('post.');
                $num = $admin->login($data);
                if($num == 3){
                    $this->success('success','index/index');
                }elseif($num == 4) {
                    $this->error('4');
                }
                elseif($num == 2) {
                    $this->error('2');
                }else{
                    $this->error('1');
                }
            }else {
                $this->error('5');
            }
        }
        if($check != $codeCheck) {
            abort(404);
        }
        Loader::import('String', EXTEND_PATH);
        $salt = String::randString(15).uniqid();
        session('validate',$salt);
        $this->assign('validate',$salt);
        $this->view->engine->layout(false);
        return $this->fetch();
    }
    public function captcha(){
        $config = [
            // 验证码字符集合
            'codeSet'  => '2345678abcdefhijkmnpqrstuvwxyzABCDEFGHJKLMNPQRTUVWXY',
            // 验证码字体大小(px)
            'fontSize' => 14,
            // 验证码图片高度
            'imageH'   => 30,
            // 验证码位数
            'length'   => 4,
            // 验证成功后是否重置
            'reset'    => true
        ];
        $captcha1 = new \think\captcha\Captcha($config);
        return $captcha1->entry();
    }
}
