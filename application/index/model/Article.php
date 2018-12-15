<?php
namespace app\index\model;
use think\Model;
class Article extends Model {
    //获取帮助分类
    public function getFootArts() {
        $helpCateArr = db('cate')->where('type','eq','3')->order('sort desc')->select();
        foreach($helpCateArr as  $k => $v) {
            $helpCateArr[$k]['arts'] = $this->where(array(
                'cateId' => array('eq',$v['id']),
                'showStatus' => 1
            ))->select();
        }
        return $helpCateArr;
    }
    //获取网店信息分类
    public function getShopArts() {
        $shopArr = $this->where('cateId','eq','8')->field('id,title')->select();
        return $shopArr;
    }
    //获取文章
    public function getArts($cateId,$limit) {
        $arts = $this->where('cateId','eq',$cateId)->field('id,title')->limit($limit)->select();
        return $arts;
    }
}