<?php
namespace app\index\model;
use think\Model;
use app\admin\model\Goods as backGoods;

class Goods extends Model {
    public function getRecposGoods($recposId,$limit = '') {
        $hotIds = db('rec_item')->where(array('valType' => 1,'recposId' => $recposId))->select();
        $arr = array();
        foreach ($hotIds as $k => $v) {
            $arr[] = $v['valId'];
        }
        $hotGoods = $this->field('id,goodsName,mdPic,shopPrice,marketPrice')->where('id','in',$arr)->limit($limit)->order('id desc')->select();
        return $hotGoods;
    }
    public function getMemberPrice($goodsId) {
        $levelId = session('levelId');
        if($levelId) {
            $map['goodsId'] = array('eq',$goodsId);
            $map['levelId'] = array('eq',$levelId);
            $memberPrice = db('member_price')->where($map)->field('memPrice')->find();
            return $memberPrice['memPrice'];
        }else {
           return null;
        }
    }
    public function getCartGoodsAttr($in) {
        $gaData = db('goods_attr')
            ->alias('a')
            ->field('a.*,b.attrName')
            ->join('attr b','a.attrId = b.id','LEFT')
            ->where(array(
                'a.id' => array('in',$in),
            ))->select();
        return $gaData;
    }

    //商品筛选
    public function searchGoods($cateId) {
        //SELECT a.id,a.goodsName,IFNULL(SUM(b.goodsNum),0) xl,
        //(SELECT COUNT(id) FROM php_comment c WHERE a.id = c.goodsId) pl
        //FROM php_goods a LEFT JOIN php_order_goods b
        //ON(a.id = b.goodsId AND b.orderId IN(SELECT id FROM php_order WHERE payStatus = 1))
        //GROUP BY a.id ORDER BY xl DESC;

        //获取当前分类、扩展分类以及当前分类下子分类的所有商品id
        $backGoodsModel = new backGoods();
        $goodsIds = $backGoodsModel->getIds($cateId);

        //搜索条件
        $where['a.onSale'] = ['eq',1];
        $where['a.id'] = ['in',$goodsIds];

	    //自定义属性筛选
	    $filterAttr = input('filterAttr');
	    if($filterAttr) {
		    $oldArr = [];
		    $newArr = [];
		    $filterAttr = explode('.',$filterAttr);
		    foreach($filterAttr as $k => $v) {
			    if($v != '0') {
				    $vv = explode('-',$v);
				    if($vv[0] == '0') {
				    	continue;
				    }
				    $goodsIdArr = db('goods_attr')->where(array(
					    'attrId' => array('eq',$vv[1]),
					    'attrVal' => array('eq',$vv[0]),
				    ))->field('DISTINCT goodsId')->select();

				    //判断当前属性是否有查到商品信息，若没有，则不用查下去，直接返回空，因为没有一件商品满足该属性
				    if($goodsIdArr) {
					    foreach($goodsIdArr as $k1 => $v1) {
						    if(!in_array($v1['goodsId'],$newArr)) {
							    $newArr[] = $v1['goodsId'];
						    }
					    }
					    //判断是否是第一次执行筛选属性
					    if($oldArr) {
					    	//取出新老数组的交集，如果为空，则返回空
						    $oldArr = array_intersect($newArr,$oldArr);
						    if(!$oldArr) {
							    return null;
						    }
					    }else {
						    $oldArr = $newArr;
					    }
					    //重置筛选数组
					    $newArr = [];
				    }else {
					    return null;
				    }
			    }
		    }
		    if($oldArr) {
			    $goodsIds = array_intersect($goodsIds,$oldArr);
			    $where['a.id'] = ['in',$goodsIds];
		    }
	    }

        //价格筛选
        if(input('price')) {
            $priceArr = explode('-',input('price'));
            $where['a.shopPrice'] = ['between',$priceArr];
        }

        //品牌
        if(input('brandId')) {
            $where['a.brandId'] = ['eq',input('brandId')];
        }

        //排序方式
        $orderBy = 'xl';
        $orderWay = 'desc';
        $ob = input('ob');
        $ow = input('ow');
        if($ob && in_array($ob,['xl','price','addTime','pl'])) {
        	switch($ob){
		        case 'price':
		        	$orderBy = 'a.shopPrice';
		        	break;
		        case 'addTime':
		        	$orderBy = 'a.time';
		        	break;
		        default:
			        $orderBy = $ob;
			        break;
	        }
	        if($ow && in_array($ow,['asc','desc'])) {
		        $orderWay = $ow;
            }
        }


        //查询获取数据
        $goodsRes = db('goods')
            ->alias('a')
            ->field('a.id,a.goodsName,a.shopPrice,a.mdPic,IFNULL(SUM(b.goodsNum),0) xl,
        (SELECT COUNT(id) FROM php_comment c WHERE a.id = c.goodsId) pl,
        (SELECT GROUP_CONCAT(mdPhoto SEPARATOR ",") FROM php_goods_photos d WHERE a.id = d.goodsId) photos,
        (SELECT GROUP_CONCAT(recName SEPARATOR ",") FROM php_rec_pos WHERE id 
        IN(SELECT recposId FROM php_rec_item e WHERE e.valType = 1 AND e.valId = a.id)) recName')
            ->join('order_goods b','a.id = b.goodsId AND b.orderId 
            IN(SELECT id FROM php_order WHERE payStatus = 1)','LEFT')
            ->where($where)
            ->group('a.id')
            ->order("$orderBy $orderWay")
            ->paginate(12)
            ->all();
        foreach($goodsRes as $k => &$v) {
            $v['photos'] = explode(',',$v['photos']);
            $v['recName'] = explode(',',$v['recName']);
        }
//        dump($goodsRes);die;
        return $goodsRes;
    }
}