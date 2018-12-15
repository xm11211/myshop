<?php
namespace app\index\controller;
use app\admin\model\Goods;
class Index extends Base{
    public function index() {
        $cacheFlag = $this->config['cache'];//缓存是否开启
        $cacheTime = $this->config['cacheTime'];//缓存时间
        $goodsModel = model('goods');
        $indexGoods = cache('indexGoods');
        if(!$indexGoods) {
            $indexGoods = $goodsModel->getRecposGoods(8,20);//获取首页商品
            if($cacheFlag == '是') {
                cache('indexGoods',$indexGoods, $cacheTime);
            }
        }
        $cateModel = model('category');
        $recposCate = cache('recposCate');
        if(!$recposCate) {
            $recposCate = $this->getRecposCategory($cateModel);//获取推荐分类/分类下精品推荐商品/关联品牌
            if($cacheFlag == '是') {
                cache('recposCate', $recposCate,  $cacheTime);
            }
        }
        $artModel = model('article');
        $notArts = cache('notArts');
        if(!$notArts) {
            $notArts = $artModel->getArts(33,3); //获取公告文章
            if($cacheFlag == '是') {
                cache('notArts', $notArts,  $cacheTime);
            }
        }
        $proArts = cache('proArts');
        if(!$proArts) {
            $proArts = $artModel->getArts(34,3); //获取促销文章
            if($cacheFlag == '是') {
                cache('proArts', $proArts,  $cacheTime);
            }
        }
        $brandModel = model('brand');
        $brands = $brandModel->getBrands(17); //获取前17个品牌图
        $sliderModel = model('slider');
        $sliders = cache('cliders');
        if(!$sliders) {
            $sliders = $sliderModel->getSliders();//轮播图
            if($cacheFlag == '是') {
                cache('sliders', $sliders,  $cacheTime);
            }
        }
//        echo "<pre>";
//        print_r($recposCate);die;
        $this->assign(array(
            'showRight' => 1200,
            'siteMast' => 1,
            'indexGoods' => $indexGoods,
            'recposCate' => $recposCate,
            'notArts' => $notArts,
            'proArts' => $proArts,
            'brands' => $brands,
            'sliders' => $sliders,
        ));
        return $this->fetch();
    }
    public function getRecposCategory($cateModel) {
        $recFirCategory = $cateModel->getRecposCategory(5,0); //获取首页楼层的推荐分类
        foreach($recFirCategory as $k => &$v) {
            $v['firRecNewGoods'] = $this->getRecGoods($v['id'],4); //一级分类推荐商品
            $v['firRecBrands'] = $cateModel->getBrandsAdContent($v['id'])['top']; //关联品牌
            $v['firRecCateAd'] = $cateModel->getCategoryAdContent($v['id'],3); //楼层广告
            $recSecCategory = $cateModel->getRecposCategory(6,$v['id'],2); //二级分类
            if($recSecCategory) {
                $v['children'] =  $recSecCategory;
                foreach($v['children'] as $k1 => &$v1) {
                    $v1['secRecNewGoods'] = $this->getRecGoods($v1['id'],7); //二级分类推荐商品
                }
            }
        }
        return $recFirCategory;
    }
    private function getRecGoods($id,$recposId,$order = 'id desc',$limit = 6) {
        $goodsModel = new Goods();
        //获取该分类下的所有商品id
        $ids = $goodsModel->getIds($id);
        //筛选新品推荐id
        $map['valId'] = array('in',$ids);
        $map['recposId'] = array('eq',$recposId);
        $map['valType'] = array('eq',1);
        $recNewGoodsIds = db('rec_item')->where($map)->field('valId')->select();
        if($recNewGoodsIds) {
            $arr = array();
            foreach($recNewGoodsIds as $k1 => $v1) {
                $arr[] = $v1['valId'];
            }
            //获取商品
            $map2['onSale'] = array('eq',1);
            $map2['id'] = array('in',$arr);
            $data = db('goods')->where($map2)->order($order)->limit($limit)->select();
            return $data;
        }
        return null;
    }
}
