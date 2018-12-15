<?php
namespace app\admin\model;
use think\Model;
class Category extends Model {
    protected $field = true;
    protected static function init(){
        self::beforeInsert(function ($cates) {
            $catesData = $cates->data;
        });
        self::afterInsert(function ($cates) {
            $id = $cates->data['id'];
            //增加推荐位
            $recpId = input('recpId/a');
            if($recpId != null) {
                foreach($recpId as $k => $v) {
                    if(!db('rec_item')->insert(array(
                        'recposId' => $v,
                        'valId' => $id,
                        'valType' => 2,
                    ))) {
                        $cates->error = '添加推荐位失败！';
                        return false;
                    }
                }
            }
        });
        self::beforeUpdate(function ($cates) {
            $id = $cates->data['id'];
            //处理推荐位
            if(db('rec_item')->where('valId','eq',$id)->delete() === false) {
                $cates->error = '推荐位删除失败！';
                return false;
            }
            $recpId = input('recpId/a');
            if($recpId != null) {
                foreach($recpId as $k => $v) {
                    if(!db('rec_item')->insert(array(
                        'recposId' => $v,
                        'valId' => $id,
                        'valType' => 2,
                    ))) {
                        $cates->error = '修改推荐位失败！';
                        return false;
                    }
                }
            }
        });
    }
}