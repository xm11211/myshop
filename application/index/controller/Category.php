<?php
namespace app\index\controller;
use app\index\model\Goods;
use app\admin\model\Goods as backGoods;
class Category extends Base{
    public function index() {
        $id = input('id');
        $cateData = db('category')->find($id);

        //获取属性信息
        if(!cache('attrData_'.$id)) {
            $attrData = [];
            if($cateData['attrId']) {
                $arr = explode(',',$cateData['attrId']);
                foreach($arr as $k => $v) {
                    $attr = db('attr')->field('attrName,attrValues,id')->find($v);
                    $arr2 = explode(',',$attr['attrValues']);
                    foreach($arr2 as $k1 => &$v1) {
                        $num = db('goods_attr')->where(array(
                            'attrVal' => array('eq',$v1),
                            'attrId' => array('eq',$v)
                        ))->count();
                        if(!$num) {
                            unset($arr2[$k1]);
                        }
                    }
                    if($arr2) {
                        $attrData[$k]['attrName'] = $attr['attrName'];
                        $attrData[$k]['attrId'] = $attr['id'];
                        $attrData[$k]['attrValues'] = $arr2;
                    }
                }
            }
            cache('attrData_'.$id,$attrData);
        }
//        dump(cache('attrData_'.$id));die;

        //获取品牌信息
        if(!cache('brandData_'.$id)) {
            //商品价格的筛选不受分类限制，意思是如果两个分类彼此间有相同的一个或多个属性，
            $backGoodsModel = new backGoods();
            $goodsIds = $backGoodsModel->getIds($id);
            $brandData = [];
            if($goodsIds) {
                $brandIds = db('goods')->field('DISTINCT brandId')
                    ->where('id','in',$goodsIds)->select();
                if($brandIds) {
                    foreach($brandIds as $k => $v) {
                        $brandData[] = db('brand')->field('brandName,id')->find($v['brandId']);
                    }
                }
            }
            cache('brandData_'.$id,$brandData);
        }

        //计算价格区间
        if(!cache('priceSection_'.$id)) {

            //商品价格的筛选不受分类限制，意思是如果两个分类彼此间有相同的一个或多个属性，
            $backGoodsModel = new backGoods();
            $goodsIds = $backGoodsModel->getIds($id);
            $priceSection = [];
            if($goodsIds) {
                $goodsPrices = db('goods')->field('MIN(shopPrice) minPrice,MAX(shopPrice) maxPrice')
                    ->where(array( 'id' => array('in',$goodsIds)))->find();
                $sPrice = ceil(($goodsPrices['maxPrice'] - $goodsPrices['minPrice']) / $cateData['psNum']);
                //当基数不为0时，价格区间有意义，基数为0时，不用做价格区间
                if($sPrice) {
                    $minPrice = intval($goodsPrices['minPrice']); //区间最小价
                    for($a = 0; $a < $cateData['psNum']; ++ $a) {
                        if($a == 0) {
                            $priceSection[] = $minPrice.'-'.(ceil((($minPrice + $sPrice) / 10)*10 - 1));
                        }else if($a == $cateData['psNum'] - 1) {
                            $priceSection[] = (ceil(($minPrice / 10) * 10)).'-'.($minPrice + $sPrice);
                        }else {
                            $startPrice = ceil(($minPrice / 10) * 10);
                            $endPrice = ceil((($minPrice + $sPrice) / 10)*10 - 1);
                            $goodsCount = db('goods')->where(array(
                                'shopPrice' => array('between',[$startPrice,$endPrice]),
                                'id' => array('in',$goodsIds),
                                'onSale' => array('eq',1)
                            ))->count();
                            if($goodsCount) {
                                $priceSection[] = $startPrice.'-'.$endPrice;
                            }
                        }
                        $minPrice +=  $sPrice;
                    }
                }else {
                    $priceSection[] = '0-' . $goodsPrices['maxPrice'];
                }
                cache('priceSection_'.$id,$priceSection);
            }
        }

        //商品筛选
	    $ob = input('ob') ? input('ob') : 'xl';
	    $ow = input('ow') ? input('ow') : 'desc';
        $goodsModel = new Goods();
        $goodsRes = $goodsModel->searchGoods($id);

        //接收到的筛选属性
	    $filters = input('filterAttr');

        $this->assign(array(
            'attrData' => cache('attrData_'.$id),
            'brandData' => cache('brandData_'.$id),
            'priceSection' => cache('priceSection_'.$id),
            'categoryId' => $id,
            'ob' => $ob,
            'ow' => $ow,
            'goodsRes' => $goodsRes,
	        'filters' => $filters,
        ));
        return $this->fetch();

    }


    public function getGoodsCates() {
        if(request()->isAjax()) {
            $catId = input('get.cat_id');
            $action = input('get.act');
            if($catId && $action) {
                $data = $this->$action($catId);
                return json($data);
            }
        }else {
            abort(404);
        }

    }

    public function getCategoryCallback($catId) {
        $data = array();
        $data['cat_id'] =  $catId;
        $cateModel = model('category');
        $goodsCateArr = $cateModel->getGoodsCates($catId);
        $str = '';
        foreach($goodsCateArr as $k => $v) {
            $str .= '<dl class="dl_fore'.++$k.'">';
            $str .= '<dt><a href="'.url('index/category/index',['id' => $v['id']]).'" target="_blank">'.$v['cateName'].'</a></dt>';
            $str .= '<dd>';
            foreach($v['children'] as $k1 => $v1) {
                $str .= '<a href="'.url('index/category/index',['id' => $v1['id']]).'" target="_blank">'.$v1['cateName'].'</a>';
            }
            $str .= '</dd>';
            $str .= '</dl>';
        }
        $topicContent = $cateModel->getTopicContent($catId);
        $str2 = '';
        foreach($topicContent as $k => $v) {
            $str2 .= '<a href="'.$v['url'].'" target="_blank">'.$v['word'].'</a>';
        }
        $data['cat_content'] = $str;
        $data['topic_content'] = $str2;
        $brandsAdContent = $cateModel->getBrandsAdContent($catId);
        $str3 = '<div class="cate-brand">';
        foreach($brandsAdContent['top'] as $k => $v) {
            $pic = showImage($v['pic'],'','','',true);
            $str3 .= '<div class="img"><a href="/category/brandId/'.$v['id'].'/cateId/'.$catId.'" target="_blank" title="'.$v['brandName'].'">'.$pic.'</a></div>';
        }
        $str3 .= ' </div>';
        $pic2 = showImage($brandsAdContent['bottom']['pic'],199,97,'',true);
        $str3 .= '<div class="cate-promotion">';
        $str3 .= '<a href="'.$brandsAdContent['bottom']['url'].'" target="_blank">'.$pic2.'</a>';
        $str3 .= '</div>';
        $data['brands_ad_content'] = $str3;
        return $data;
    }
}

//                    $goodsId = db('goods_attr')->field('goodsId')->where(array(
//                        'attrVal' => array('eq',$v1),
//                        'attrId' => array('eq',$v)
//                    ))->select();
//                    if($goodsId) {
//                        foreach($goodsId as $k2 => $v2)
//                        $goodsIds[] = $v2['goodsId'];
//                    }else {
//                        unset($arr2[$k1]);
//                    }
//if($goodsIds) {
//    $goodsIds = array_unique($goodsIds);
//    $goodsPrices = db('goods')->field('MIN(shopPrice) minPrice,MAX(shopPrice) maxPrice')
//        ->where('id','in',$goodsIds)->find();
//    $sPrice = ($goodsPrices['maxPrice'] - $goodsPrices['minPrice']) / $cateData['psNum'];
//    dump($goodsPrices);die;
//}

//价格区间
//        $trueMinPrice = strval($minPrice); //实际要展示的区间最小价
//        if($trueMinPrice[strlen($trueMinPrice) - 1] != 0) {
//            $trueMinPrice[strlen($trueMinPrice) - 1] = 0;
//        }
//        for($a = 0; $a < $cateData['psNum']; ++ $a) {
//            $maxPrice = strval($minPrice + $sPrice);
//            if($maxPrice[strlen($maxPrice ) - 1] != 9) {
//                $maxPrice[strlen($maxPrice ) - 1] = 9;
//            }
//            $priceSection[] = $minPrice.' - '.($minPrice + $sPrice);
//            $priceSection2[] = $trueMinPrice.' - '.$maxPrice;
//            $minPrice +=  $sPrice;
//            $trueMinPrice = intval($maxPrice) + 1;
//        }