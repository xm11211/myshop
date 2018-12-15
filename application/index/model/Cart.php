<?php
namespace app\index\Model;
use think\Model;
class Cart extends Model{
    public function addToCart($goodsId,$goodsAttr = '',$goodsNum = 1) {
        $cart = isset($_COOKIE['cart']) ? unserialize($_COOKIE['cart']) : array();
        $key = $goodsId.'-'.$goodsAttr;
        if(isset($cart[$key])) {
            $cart[$key] += $goodsNum;
        }else {
            $cart[$key] = $goodsNum;
        }
        $aMonth = time() + 30 * 24 * 3600;
        setcookie('cart',serialize($cart),$aMonth,'/');
    }
    public function removeCart() {
        setcookie('cart','',1);
    }
    public function  delCart($goodsId,$goodsAttr = '') {
        $cart = isset($_COOKIE['cart']) ? unserialize($_COOKIE['cart']) : array();
        if($goodsAttr != '') {
            $key = $goodsId.'-'.$goodsAttr;
            unset($cart[$key]);
        }else {
            if(strpos($goodsId,'|') !== false) {
                $arr = explode('|',$goodsId);
                foreach($arr as $k => $v) {
                    unset($cart[$v]);
                }
            }else {
                unset($cart[$goodsId]);
            }
        }
        $aMonth = time() + 30 * 24 * 3600;
        setcookie('cart',serialize($cart),$aMonth,'/');
    }

    /*出问题了，以后再解决*/
    public function updateToCart($goodsId,$goodsNum = 1) {
        $cart = isset($_COOKIE['cart']) ? unserialize($_COOKIE['cart']) : array();
        $cart[$goodsId] = $goodsNum;
        $aMonth = time() + 30 * 24 * 3600;
        setcookie('cart',serialize($cart),$aMonth,'/');
    }



    public function getGoodsListInCart($goodsIds = array()) {
        $goodsModel = model('goods');
        $cart = isset($_COOKIE['cart']) ? unserialize($_COOKIE['cart']) : array();
        if($goodsIds) {
            $cart = array();
            foreach($goodsIds as $k => $v) {
                $ret = explode('|',$v);
                $cart[$ret[0]] = $ret[1];
            }
        }
        //如果传入数组
        $newCart = array();
        foreach($cart as $k => $v) {
            $arr = explode('-',$k); //$arr[0]是商品Id,如果存在第二个元素的话$arr[1]代表商品单选属性id
            $goodsInfo = $goodsModel->field('id,goodsName,mdPic,shopPrice,marketPrice')->find($arr[0]);
            $memberPrice = $goodsModel->getMemberPrice($goodsInfo['id']);
            if(!$memberPrice) {
                $memberPrice = $goodsInfo['shopPrice'];
            }
            $newCart[$k]['id'] = $goodsInfo['id'];
            $newCart[$k]['goodsName'] = $goodsInfo['goodsName'];
            $newCart[$k]['shopPrice'] = $goodsInfo['shopPrice'];
            $newCart[$k]['mdPic'] = $goodsInfo['mdPic'];
            $newCart[$k]['memberPrice'] = $memberPrice;
            $newCart[$k]['marketPrice'] = $goodsInfo['marketPrice'];
            $goodsAttrStr = array();
            $goodsAttrPrice = 0;
            if($arr[1]) {
                $goodsAttrArr = $goodsModel->getCartGoodsAttr($arr[1]);
                foreach($goodsAttrArr as $k1 => $v1) {
                    $goodsAttrStr[] = $v1['attrName'].':'.$v1['attrVal']."（￥{$v1['attrPrice']}元）";
                    $goodsAttrPrice += $v1['attrPrice'];
                }
                $goodsAttrStr = implode('<br />',$goodsAttrStr);
            }
            $newCart[$k]['goodsAttrStr'] = $goodsAttrStr;
            $newCart[$k]['shopPrice'] += $goodsAttrPrice;
            $newCart[$k]['memberPrice'] += $goodsAttrPrice;
            $newCart[$k]['goodsNumber'] = $v;
            $newCart[$k]['totalPrice'] = $v * $newCart[$k]['memberPrice'];
        }
        return $newCart;
    }
    //获取单商品在购物车的信息
    public function getGoodsMsgInCart($goodsId) {
        $goodsModel = model('goods');
        $cart = isset($_COOKIE['cart']) ? unserialize($_COOKIE['cart']) : array();
        $arr = explode('-',$goodsId);
        $goodsInfo = $goodsModel->field('id,goodsName,mdPic,shopPrice')->find($arr[0]);
        $memberPrice = $goodsModel->getMemberPrice($arr[0]);
        if(!$memberPrice) {
            $memberPrice = $goodsInfo['shopPrice'];
        }
        $arr2['goods_number'] = $cart[$goodsId]; //数量
        $arr2['goods_subtotal'] = $cart[$goodsId] * $memberPrice; //小计
        return $arr2;
    }
}
