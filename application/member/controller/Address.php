<?php
namespace app\member\controller;
use think\Loader;
class Address extends Base {

	//用户收货地址
    public function address() {
        $uid = session('uid');
        if(request()->isPost()) {
            $data = input('post.');
	        //先验证地址数据，并将地址数据添加到地址表中
	        $validate = Loader::validate('Address');
	        if($validate->check($data)) {
	            unset($data['addr']);
		        $num = db('address')->where('userId','eq',$data['userId'])->count();
		        if($num) {
			        if(db('address')->where('userId','eq',$data['userId'])->update($data) === false) {
				        return view('common/tip_info',['errorMsg' => "抱歉，收货地址更新失败！请稍后重试或联系客服",'showRight' => 1200]);
			        }
		        }else {
			        if(!db('address')->insert($data)) {
				        return view('common/tip_info',['errorMsg' => "抱歉，新增收货地址失败！请稍后重试或联系客服",'showRight' => 1200]);
			        }
		        }
		        $this->redirect('/address.html');
	        }
	        $this->error($validate->getError());
        }
        //获取收货地址
        $address = db('address')->where('userId',$uid)->find();
        $this->assign(array(
	        'address' => $address,
	        'currOpt' => 'address',
        ));
        return view();
    }
}
