<?php
namespace app\admin\controller;
use think\Controller;
use think\Loader;
use extend\Redis;
use think\Request;
class Base extends Controller{
    protected static $redis;
    public function _initialize(){
        if(session('aid')){
            $request = Request::instance();
            $con = $request->controller();
            $action = $request->action();
            $name = $con.'/'.$action;
            $serverTime = date("Y:m:d h:i:s");
            $this->assign('serverTime',$serverTime);
            if(!authcheck($name, session('aid'))) {
            $this->error('没有权限', url('index/index'));
            }
        }else {
            abort(404);
        }
    }
}
//        initconfig();
//        Loader::import('Redis', EXTEND_PATH);
//        self::$redis=Redis::getInstance();