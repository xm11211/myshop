<?php
namespace app\admin\controller;
use think\Loader;
class Order extends Base {
    public function lst() {
        $orderModel = model('order');
        $list = $orderModel->search(10);
        $plUrl = url('lst');
        $this->assign(array(
            'list' => $list,
            'plName' => '订单管理',
            'plUrl' => $plUrl,
            'slName' => '查看',
        ));
        return $this->fetch();
    }

    //导出订单
    public function exportOrders() {
        vendor('phpoffice.phpexcel.Classes.PHPExcel');
        if(!input('')) {
            $query['ps'] = 0;
            $query['dg'] = 0;
            $query['outTradeNo'] = '';
            $query['user'] = '';
        }else {
            $query = $this->strToArr(input('')['query']);
        }
        $orderModel = model('order');
        $list = $orderModel->search(0,$query);
        $phpexcel = new \PHPExcel();
        $phpexcel->setActiveSheetIndex(0);
        $sheet = $phpexcel->getActiveSheet();
        $arr = [
            'id' => '订单id',
            'outTradeNo' => '订单编号',
            'goodsTotalPrice' => '商品总额',
            'payStatus' => '支付状态',
            'orderStatus' => '订单状态',
            'postStatus' => '配送状态',
            'distribution' => '配送方',
            'payment' => '支付方式',
            'name' => '收货人',
            'phone' => '手机号',
            'orderTime' => '下单时间',
            'userName' => '用户名',
        ];
        array_unshift($list ,$arr);
        $row = 1;
        foreach($list as $k => $v) {
            if($k != 0) {
                $v = $this->getOrderStatus($v);
            }
            $sheet->setCellValue('A'.$row,$v['id'])
                  ->setCellValue('B'.$row,$v['outTradeNo'])
                  ->setCellValue('C'.$row,$v['goodsTotalPrice'])
                  ->setCellValue('D'.$row,$v['payStatus'])
                  ->setCellValue('E'.$row,$v['orderStatus'])
                  ->setCellValue('F'.$row,$v['postStatus'])
                  ->setCellValue('G'.$row,$v['distribution'])
                  ->setCellValue('H'.$row,$v['payment'])
                  ->setCellValue('I'.$row,$v['name'])
                  ->setCellValue('J'.$row,$v['phone'])
                  ->setCellValue('K'.$row,$v['orderTime'])
                  ->setCellValue('L'.$row,$v['userName']);
        }
        $row += 1;
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="dingdan.xlsx"');
        header('Cache-Control: max-age=0');
        $phpwriter = new \PHPExcel_Writer_Excel2007($phpexcel);
        $phpwriter->save('php://output');
    }

    //字符串转数组
    public function strToArr($str) {
        $arr = explode('&',$str);
        $arr2 = [];
        foreach($arr as $k => $v) {
            $v = explode('=',$v);
            $arr2[$v[0]] = $v[1];
        }
        return $arr2;
    }

    public function edit() {
        $id = input('id');
        $orderData =  db('order')
            ->alias('a')
            ->field('a.*,b.userName')
            ->join('user b','a.userId = b.id','LEFT')
            ->find($id);
        if(request()->isPost()) {
            $data = input('post.');
            $validate = Loader::validate('Order');
            if($validate->check($data)) {
                if (db('order')->update($data) !== false) {
                    $this->redirect('lst');
                }
                $this->error('修改失败');
            }
            $this->error($validate->getError());
        }
        $plUrl = url('lst');
        $this->assign(array(
            'orderData' => $orderData,
            'plName' => '订单管理',
            'plUrl' => $plUrl,
            'slName' => '修改订单',
        ));
        return $this->fetch();
    }

    public function del() {
        $id = input('id');
        if(db('order')->delete($id) !== false ){
            db('order_goods')->where('orderId',$id)->delete();
            $this->success('订单删除成功','admin/order/lst');
        }
        $this->error("订单删除失败",'admin/order/lst');
    }

    //详情
    public function detail() {
        $id = input('id');
        $orderData =  db('order')
            ->alias('a')
            ->field('a.*,b.userName')
            ->join('user b','a.userId = b.id','LEFT')
            ->find($id);
        $orderData = $this->getOrderStatus($orderData);
        echo json_encode($orderData);
    }

    /*
    * 转换订单数据状态
    * @access public
    * @param  array $orderData 一条订单数据
    */
    public function getOrderStatus($orderData) {
        $orderData['orderTime'] = date('Y/m/d H:i:s', $orderData['orderTime']);
        switch($orderData['payment']) {
            case 1:
                $orderData['payment'] = '支付宝';
                break;
            case 2:
                $orderData['payment'] = '微信';
                break;
            case 3:
                $orderData['payment'] = '微信第三方';
                break;
            case 3:
                $orderData['payment'] = '余额';
                break;
        }
        switch($orderData['orderStatus']) {
            case 0:
                $orderData['orderStatus'] = '未确认';
                break;
            case 1:
                $orderData['orderStatus'] = '已确认';
                break;
            case 2:
                $orderData['orderStatus'] = '申请退款';
                break;
            case 3:
                $orderData['orderStatus'] = '退款成功';
                break;
        }
        switch($orderData['payStatus']) {
            case 0:
                $orderData['payStatus'] = '未支付';
                break;
            case 1:
                $orderData['payStatus'] = '已支付';
                break;
        }
        switch($orderData['postStatus']) {
            case 0:
                $orderData['postStatus'] = '未发货';
                break;
            case 1:
                $orderData['postStatus'] = '已发货';
                break;
            case 2:
                $orderData['orderStatus'] = '已收货';
                break;
        }
        return $orderData;
    }

    //订单商品
    public function goods() {
        $id = input('id');
        $goodsData =  db('order_goods')->where('orderId',$id)->select();
        $plUrl = url('lst');
        $this->assign(array(
            'goodsData' => $goodsData,
            'plName' => '订单管理',
            'plUrl' => $plUrl,
            'slName' => '订单商品',
        ));
        return $this->fetch();
    }

    //订单商品
    public function goodsdel() {
        $id = input('id');
        $orderGoods =  db('order_goods')->find($id);
        $orderId = $orderGoods['orderId'];  //订单id
        $goodsTotalPrice = $orderGoods['goodsMemberPrice'] * $orderGoods['goodsNum'];  //单商品总价
        if(db('order_goods')->delete($id) !== false ) {
            //判断删除订单商品后是否还有剩余订单商品，没有就删除订单
           if(db('order_goods')->where('orderId',$orderId)->count() == 0) {
               if(db('order')->delete($orderId) !== false ){
                   $this->success('订单删除成功','admin/order/lst');
               }
               $this->error('订单删除失败','admin/order/lst');
           };
           //重新计算商品总价和订单总价
           $order = db('order')->find($orderId);
           db('order')->update(array(
               'id' => $orderId,
               'goodsTotalPrice' => $order['goodsTotalPrice'] - $goodsTotalPrice,
               'orderTotalPrice' => $order['orderTotalPrice'] - $goodsTotalPrice,
           ));
           $this->success('订单商品删除成功','admin/order/lst');
        }
        $this->error("订单商品删除失败",'admin/order/lst');
    }

    //订单商品修改
    public function goodsedit() {
        $id = input('id');
        $goodsData =  db('order_goods')->find($id);
        if(request()->isPost()) {
            $data = input('post.');
            $validate = Loader::validate('OrderGoods');
            if($validate->check($data)) {
                if (db('order_goods')->update($data) !== false) {
                    //判断商品是用会员价格还是本店价，如果商品有会员价（会员价大于0），那就用会员价
                    //如果商品没有会员价，那么就用本店价
                    if($data['goodsMemberPrice'] > 0) {
                        $goodsTruePrice = $data['goodsMemberPrice'];
                    }else {
                        $goodsTruePrice = $data['goodsShopPrice'];
                    }

                    /****************************重新计算当前订单的总价****************************/
                    //获取该订单所有商品的信息
                    $orderGoodsData = db('order_goods')->where('orderId',$goodsData['orderId'])->select();
                    $totalPrice = 0; //当前订单总价
                    //实例化前台模型
                    $goodsModel = new \app\index\model\Goods();
                    foreach($orderGoodsData as $k => $v) {
                        $goodsAttrPrice = 0; //单商品属性价格
                        if($v['goodsAttrId']) {
                            $goodsAttrArr = $goodsModel->getCartGoodsAttr($v['goodsAttrId']);
                            foreach($goodsAttrArr as $k1 => $v1) {
                                $goodsAttrPrice += $v1['attrPrice'];
                            }
                        }
                        $goodsTruePrice += $goodsAttrPrice;
                        $totalPrice += $v['goodsNum'] * $goodsTruePrice;
                    }
                    //获取当前订单配送费用
                    $postSpant = db('order')->find($goodsData['orderId'])['postSpant'];
                    $orderTotalPrice =  $totalPrice + $postSpant;
                    if(db('order')->where('id',$goodsData['orderId'])->update(array(
                            'goodsTotalPrice' => $totalPrice,
                            'orderTotalPrice' => $orderTotalPrice,
                    )) !== false) {
                        $this->redirect('order/goods',['id' => $id]);
                    }
                    $this->error('订单总金额修改失败，订单商品修改失败！');
                }
                $this->error('订单商品修改失败！');
            }
            $this->error($validate->getError());
        }
        $plUrl = url('lst');
        $this->assign(array(
            'goodsData' => $goodsData,
            'plName' => '订单管理',
            'plUrl' => $plUrl,
            'slName' => '订单商品',
        ));
        return $this->fetch();
    }
}
