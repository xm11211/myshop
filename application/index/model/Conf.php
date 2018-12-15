<?php
namespace app\index\model;
use think\Model;
class Conf extends Model {
    public function getConf() {
        $confArr = $this->field('enName,value')->select();
        $arr = array();
        foreach ($confArr as $k => $v) {
            $arr[$v['enName']] = $v['value'];
        }
        return $arr;
    }
}