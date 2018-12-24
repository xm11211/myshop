<?php
namespace app\member\controller;
use think\Controller;
use app\index\model\Article;
use app\index\model\Conf;
use app\index\model\Category;
class Base extends Controller{
    public $config;
    public function _initialize(){
    	$this->checkLogin();        //判断登录状态
	    $this->getUserInfo();       //获取左侧用户信息
        $this->getNav();            //获取导航
        $this->getFootArts();       //获取底部帮助信息
        $this->getConf();           //获取配置信息
        $this->getForeCates();      //获取前两级导航
    }

    public function checkLogin() {
    	$uid = session('uid');
    	if(!$uid) {
		    $this->redirect('/login.html');
	    }
    }

    public function getUserInfo() {
	    $uid = session('uid');
	    $userData = db('user')->find($uid);
	    //会员中心验证进度条
	    $progress = 0;
	    if($userData['regType'] == 0) {
		    if($userData['eChecked'] == 1) {
			    $progress += 30;
		    }
	    }else if($userData['regType'] == 1) {
		    if($userData['tChecked'] == 1) {
			    $progress += 40;
		    }
	    }else if($userData['regType'] == 2) {
		    if($userData['eChecked'] == 1 && $userData['tChecked'] == 1) {
			    $progress += 70;
		    }else if($userData['eChecked'] == 1) {
			    $progress += 30;
		    }else if($userData['tChecked'] == 1) {
			    $progress += 40;
		    }
	    }
	    if($userData['password'] != '') {
		    $progress += 30;
	    }
	    //会员级别
	    $levelId = session('levelId');
	    $levelName = db('member_level')->field('levelName')->find($levelId);
	    //获取用户订单信息
	    $orderModel = db('order');
	    //待确认订单数量
	    $notConfirmOrdersNum = $orderModel->where(array('userId' => array('eq',$uid),'delStatus' => array('eq',0),'orderStatus' => array('eq',0)))->count();
	    //待付款订单数量
	    $notPayOrdersNum = $orderModel->where(array('userId' => array('eq',$uid),'delStatus' => array('eq',0),'payStatus' => array('eq',0)))->count();
	    //待收货订单数量
	    $notReceiveOrdersNum = $orderModel->where(array('userId' => array('eq',$uid),'delStatus' => array('eq',0),'postStatus' => array('eq',1)))->count();
	    //已完成订单数量
	    $finishOrdersNum = $orderModel->where(array('userId' => array('eq',$uid),'delStatus' => array('eq',0),'orderStatus' => array('eq',1)))->count();
	    $this->assign(array(
		    'userData' => $userData,
		    'progress' => $progress,
		    'levelName' => $levelName['levelName'],
		    'notConfirmOrdersNum' => $notConfirmOrdersNum,
		    'notPayOrdersNum' => $notPayOrdersNum,
		    'notReceiveOrdersNum' => $notReceiveOrdersNum,
		    'finishOrdersNum' => $finishOrdersNum,
	    ));
    }

    private function getForeCates() {
        $foreCateArr = cache('foreCateArr');
        if(!$foreCateArr) {
            $categoryModel = new Category();
            $foreCateArr = $categoryModel->getForeCates();
            cache('foreCateArr',$foreCateArr,86400);
        }
        $this->assign(array(
            'foreCateArr' => $foreCateArr,
        ));
    }
    private function getFootArts() {
        $helpCateArr = cache('helpCateArr');
        $shopArtArr = cache('shopArtArr');
        $artModel = new Article();
        if(!$helpCateArr) {
            $helpCateArr = $artModel->getFootArts();
            cache('helpCateArr',$helpCateArr,86400);
        }
        if(!$shopArtArr) {
            $shopArtArr = $artModel->getShopArts();
            cache('shopArtArr',$shopArtArr,86400);
        }
        $this->assign(array(
            'helpCateArr' => $helpCateArr,
            'shopArtArr' => $shopArtArr,
        ));
    }
    private function getNav() {
        $navArr = cache('navArr');
        if(!$navArr) {
            $arr = db('nav')->order('sort desc')->select();
            $navArr = array();
            foreach ($arr as $k => $v) {
                $navArr[$v['pos']][] = $v;
            }
            cache('navArr',$navArr,86400);
        }
        $this->assign(array(
            'navArr' => $navArr,
        ));
    }
    private function getConf() {
        $confArr = cache('confArr');
        if(!$confArr) {
            $confModel = new Conf();
            $confArr = $confModel->getConf();
            cache('confArr',$confArr,86400);
        }
        $this->config = $confArr;
        $this->assign(array(
            'confArr' => $confArr,
        ));
    }
}
