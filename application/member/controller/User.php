<?php
namespace app\member\controller;
use think\Controller;
use app\index\controller\Base;
use think\Loader;
use extend\String;
class User extends Base {
    public function index() {
        $this->assign(array(
            'showRight' => 1200,
        ));
        return view();
    }
    public function logout() {
        session('uid',null);
        session('username',null);
        session('levelId',null);
        session('rate',null);
        cookie('password',null);
        cookie('username',null);
        $this->redirect('/');
    }
}
