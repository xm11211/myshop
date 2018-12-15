<?php
namespace app\index\model;
use think\Model;
class Slider extends Model {
    //获取品牌
    public function getSliders() {
        $sliders = $this->where('status','eq',1)->order('sort desc')->select();
        foreach($sliders as $k => &$v) {
            $v['pic'] = str_replace('\\','/',$v['pic']);
        }
        return $sliders;
    }
}