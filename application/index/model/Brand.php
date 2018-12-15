<?php
namespace app\index\model;
use think\Model;
class Brand extends Model {
    //获取品牌
    public function getBrands($limit) {
        $brands = $this->order('id desc')->limit($limit)->select();
        return $brands;
    }
}