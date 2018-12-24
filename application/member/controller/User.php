<?php
namespace app\member\controller;
use think\Loader;
use extend\String;
class User extends Base {

	//用户中心首页
    public function index() {
    	$uid = input('userId');
    	$sessUid = session('uid');
    	if($uid != $sessUid) {
		    $this->redirect("/user/{$sessUid}.html");
	    }
	    //会员页面我的订单
	    $orders = db('order')->limit(5)->select();
	    foreach($orders as $k => &$v) {
		    $goodsArr = db('order_goods')->where('orderId',$v['id'])->select();
		    foreach($goodsArr as $k1 => &$v1) {
			    $v1['smPic'] = db('goods')->where('id',$v1['goodsId'])->field('smPic')->find()['smPic'];
		    }
		    $v['orderGoods'] = $goodsArr;
	    }
        $this->assign(array(
            'showRight' => 1200,
	        'currOpt' => '',
            'orders' => $orders,
        ));
        return view();
    }

    //用户信息
    public function userInfo() {
	    $uid = session('uid');
	    if(request()->isPost()) {
		    $data = input('post.');
		    //先验证地址数据，并将地址数据添加到地址表中
		    $validate = Loader::validate('UserInfo');
		    if($validate->check($data)) {
			    if(isset($_FILES['avator']) && $_FILES['avator']['error'] == 0) {
				    $ret = uploadOne('avator','userPic');
				    if($ret['ok'] == 1) {
					    $avator = db('user')->field('avator')->find($uid);
					    deleteImage($avator);
					    if(db('user')->where('id',$uid)->update(array(
							       'avator' => $ret['images'][0]
						       )) === false) {
						    return view('common/tip_info',['errorMsg' => "抱歉，用户头像更新失败！请稍后重试或联系客服",'showRight' => 1200]);
					        }
					    }else {
					        $error = '抱歉，用户头像更新失败!错误原因：'.$ret['error'].'。请稍后重试或联系客服';
				            return view('common/tip_info',['errorMsg' => $error,'showRight' => 1200]);
			        }
			    }
			    unset($data['userInfo']);
			    $num = db('user_info')->where('userId','eq',$data['userId'])->count();
			    if($num) {
				    if(db('user_info')->where('userId','eq',$data['userId'])->update($data) === false) {
					    return view('common/tip_info',['errorMsg' => "抱歉，用户信息更新失败！请稍后重试或联系客服",'showRight' => 1200]);
				    }
			    }else {
				    if(!db('user_info')->insert($data)) {
					    return view('common/tip_info',['errorMsg' => "抱歉，新增用户信息失败！请稍后重试或联系客服",'showRight' => 1200]);
				    }
			    }
			    $this->redirect('/userInfo.html');
		    }
		    $this->error($validate->getError());
	    }
	    //获取收货地址
	    $userInfo = db('user_info')->where('userId',$uid)->find();
	    //头像
	    $avator = db('user')->field('avator')->find($uid);
	    $this->assign(array(
		    'currOpt' => 'userInfo',
		    'userInfo' => $userInfo,
		    'avator' => $avator['avator'],
	    ));
	    return view();
    }

    //用户登出
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
