<?php
namespace app\member\controller;
class Order extends Base {
	//用户订单
    public function orderList() {
        $uid = session('uid');
        $orderStatus = input('orderStatus');
        if(isset($orderStatus)) {
        	switch($orderStatus) {
		        case 1:
			        break;
		        case 2:
			        $where['orderStatus'] = ['eq',0];
			        break;
		        case 3:
			        $where['payStatus'] = ['eq',0];
			        break;
		        case 4:
			        $where['postStatus'] = ['eq',1];
			        break;
		        case 5:
			        $where['orderStatus'] = ['eq',1];
			        break;
		        default:
			        return view('common/tip_info',['errorMsg' => "非法操作！",'showRight' => 1200]);
	        }
        }else {
	        $orderStatus = 1;
        }
        $where['userId'] = ['eq',$uid];
        $where['delStatus'] = ['eq',0];
        //获取用户订单信息
	    $orderModel = db('order');
        $orders = $orderModel->where($where)->paginate(5);
	    $showOrders = [];
	    foreach($orders as $k => $v) {
		    $goodsArr = db('order_goods')->where('orderId',$v['id'])->select();
		    foreach($goodsArr as $k1 => &$v1) {
			    $v1['smPic'] = db('goods')->where('id',$v1['goodsId'])->field('smPic')->find()['smPic'];
		    }
		    $v['orderGoods'] = $goodsArr;
		    $showOrders[] = $v;
	    }
        //全部订单数量
        $ordersNum = $orderModel->where(array('userId' => array('eq',$uid),'delStatus' => array('eq',0)))->count();  //全部订单数量
//        echo "<pre>";
//        print_r($orders);die;
        $this->assign(array(
            'showRight' => 1200,
            'currOpt' => 'order',
            'orders' => $orders,
            'showOrders' => $showOrders,
            'ordersNum' => $ordersNum,
	        'orderStatus' => $orderStatus

        ));
        return view();
    }

    //订单详情
    public function orderDetail() {
	    $uid = session('uid');
	    $id = input('id');
	    if(!$id) {
		    return view('common/tip_info',['errorMsg' => "非法操作！",'showRight' => 1200]);
	    }
	    $orders = db('order')->alias('a')
                  ->field('a.*,b.goodsName,goodsMemberPrice,goodsAttrStr,goodsNum,c.smPic,num,c.id goodsId')
                  ->join('order_goods b','a.id = b.orderId','left')
	              ->join('goods c','b.goodsId = c.id','left')
                  ->where('a.id',$id)
		          ->select();
	    if(empty($orders)) {
		    return view('common/tip_info',['errorMsg' => "很抱歉，没有找到订单或订单不存在",'showRight' => 1200]);
	    }
	    $totalGoodsNum = 0;
	    foreach($orders as $k => &$v) {
		    $totalGoodsNum += $v['goodsNum'];
		    $v['subtotal'] = $v['goodsMemberPrice'] * $v['goodsNum'];
	    }
	    $progress = 1;
	    if($orders[0]['orderStatus'] == 1) {
	    	$progress = 5;
	    }else if($orders[0]['postStatus'] == 2) {
		    $progress = 4;
	    }else if($orders[0]['postStatus'] == 1) {
		    $progress = 3;
	    }else if($orders[0]['payStatus'] == 1) {
		    $progress = 2;
	    }
//	    dump($orders);die;
	    $this->assign(array(
		    'showRight' => 1200,
		    'currOpt' => 'order',
		    'orders' => $orders,
		    'totalGoodsNum' => $totalGoodsNum,
		    'progress' => $progress,
	    ));
    	return view();
    }

    //订单软删除
	public function orderDelete() {
		$id = input('id');
		if(db('order')->where('id',$id)->update(array('delStatus' => 1)) !== false ){
			$this->success('订单删除成功','/orderlist.html');
		}
		$this->error("订单删除失败",'/orderlist.html');
	}
}
