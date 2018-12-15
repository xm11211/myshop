<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\Article;
use app\index\model\Conf;
use app\index\model\Category;
class Base extends Controller{
    public $config;
    public function _initialize(){
        $this->getNav();            //获取导航
        $this->getFootArts();       //获取底部帮助信息
        $this->getConf();           //获取配置信息
        $this->getForeCates();      //获取前两级导航
    }
    private function getForeCates() {
        $foreCateArr = cache('foreCateArr');
        if(!$foreCateArr) {
            $categoryModel = new Category();
            $foreCateArr = $categoryModel->getForeCates();
            cache('foreCateArr',$foreCateArr,86400);
        }
        $this->assign(array(
            'foreCateArr' => $foreCateArr,
        ));
    }
    private function getFootArts() {
        $helpCateArr = cache('helpCateArr');
        $shopArtArr = cache('shopArtArr');
        $artModel = new Article();
        if(!$helpCateArr) {
            $helpCateArr = $artModel->getFootArts();
            cache('helpCateArr',$helpCateArr,86400);
        }
        if(!$shopArtArr) {
            $shopArtArr = $artModel->getShopArts();
            cache('shopArtArr',$shopArtArr,86400);
        }
        $this->assign(array(
            'helpCateArr' => $helpCateArr,
            'shopArtArr' => $shopArtArr,
        ));
    }
    private function getNav() {
        $navArr = cache('navArr');
        if(!$navArr) {
            $arr = db('nav')->order('sort desc')->select();
            $navArr = array();
            foreach ($arr as $k => $v) {
                $navArr[$v['pos']][] = $v;
            }
            cache('navArr',$navArr,86400);
        }
        $this->assign(array(
            'navArr' => $navArr,
        ));
    }
    private function getConf() {
        $confArr = cache('confArr');
        if(!$confArr) {
            $confModel = new Conf();
            $confArr = $confModel->getConf();
            cache('confArr',$confArr,86400);
        }
        $this->config = $confArr;
        $this->assign(array(
            'confArr' => $confArr,
        ));
    }
}
