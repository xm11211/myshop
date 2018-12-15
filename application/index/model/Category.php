<?php
namespace app\index\model;
use think\Model;
class Category extends Model {
    //前两级分类
    public function getForeCates() {
        $cateArr = $this->where(array('pid' => 0))->select();
        foreach($cateArr as $k => $v) {
            $cateArr[$k]['children'] = $this->where(array('pid' => $v['id']))->select();
        }
        return $cateArr;
    }
    //二级和三级分类
    public function getGoodsCates($catId){
            $all = db('category')->select();
            $goodsCates = array();
            foreach ($all as $k => $v) {
                //找出顶级分类
                if ($v['pid'] == 0 && $v['id'] == $catId) {
                    //找出顶级分类的子分类
                    foreach ($all as $k1 => $v1) {
                        if ($v1['pid'] == $v['id']) {
                            //找出子分类的子分类
                            foreach ($all as $k2 => $v2) {
                                if ($v2['pid'] == $v1['id']) {
                                    $v1['children'][] = $v2;
                                }
                            }
                            $goodsCates[] = $v1;
                        }
                    }
                }
            }
        return $goodsCates;
    }
    //关联推荐词
    public function getTopicContent($catId) {
        $topicContent = db('category_words')->where(array('cateId' => $catId))->select();
        return $topicContent;
    }
    //关联品牌
    public function getBrandsAdContent($catId) {
        $brandsAdContent = db('category_brands')->where(array('cateId' => $catId))->find();
        $arr = db('brand')->where('id','in',$brandsAdContent['brandId'])->select();
        $bacData['top'] = $arr;
        $bacData['bottom'] = $brandsAdContent;
        return $bacData;
    }
    //楼层广告
    public function getCategoryAdContent($catId,$limit) {
        $arr = array();
        $arr['slider'] = db('category_ad')->where(array('cateId' => array('eq',$catId),'position' => array('eq',1)))
            ->order('id desc')->limit($limit)->select();
        $arr['rt'] = db('category_ad')->where(array('cateId' => array('eq',$catId),'position' => array('eq',2)))
            ->order('id desc')->find();
        $arr['rb'] = db('category_ad')->where(array('cateId' => array('eq',$catId),'position' => array('eq',3)))
            ->order('id desc')->find();
        return $arr;
    }
    //首页楼层的推荐分类
    public function getRecposCategory($recposId,$pid = 0,$limit = '') {
        $cateIds = db('rec_item')->where(array('valType' => 2,'recposId' => $recposId))->select();
        $arr = array();
        $index = 0;
        foreach ($cateIds as $k => $v) {
            $cateArr = db('category')->field('id,cateName,pid')->where(array('id' => $v['valId'],'pid' => $pid))->find();
            if($cateArr) {
                //判断是否分割数据
                if($limit != '' && $index == $limit) {
                    return $arr;
                }
                $arr[] = $cateArr;
                $index ++;
            }

        }
        return $arr;
    }
}

