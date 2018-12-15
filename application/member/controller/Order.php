<?php
namespace app\member\controller;
use think\Controller;
use app\index\controller\Base;
use think\Loader;
use extend\String;
class Order extends Base {
    public function orderList() {
        $id = session('uid');
        //判断用户是否登录了
        if(!$id) {
            $this->redirect('/login');
        }
        $status = input('orderStatus');
        if(isset($status)) {
            $where['orderStatus'] = ['eq',$status];
        }
        $where['userid'] = ['eq',$id];
        //获取用户订单信息
        $orders = db('order')->where($where)->paginate(5);
        $ordersNum = $orders->total();
        $showOrders = [];
        foreach($orders as $k => $v) {
            $goodsArr = db('order_goods')->where('orderId',$v['id'])->select();
            foreach($goodsArr as $k1 => &$v1) {
                $v1['smPic'] = db('goods')->where('id',$v1['goodsId'])->field('smPic')->find()['smPic'];
            }
            $v['orderGoods'] = $goodsArr;
            $showOrders[] = $v;
        }
//        echo "<pre>";
//        print_r($orders);die;
        $this->assign(array(
            'showRight' => 1200,
            'orders' => $orders,
            'showOrders' => $showOrders,
            'ordersNum' => $ordersNum
        ));
        return view();
    }
}
