<?php
namespace app\index\model;
use think\Model;
class Cate extends Model {
    //普通分类
    public function getComCates() {
        //普通分类的顶级分类
        $comCates = $this->where(array(
            'type' => array('eq',5),
            'pid' => array('eq',0)
        ))->select();
        //普通分类二级分类
        foreach($comCates as $k => $v) {
            $comCates[$k]['children'] = $this->where(array('pid' => $v['id']))->select();
        }
        return $comCates;
    }
    // 网店帮助分类
    public function getHelpCates() {
        $helpCates = $this->where(array(
            'type' => array('eq',3),
            'pid' => array('eq',4)
        ))->select();
        return $helpCates;
    }
}