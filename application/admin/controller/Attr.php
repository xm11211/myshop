<?php
namespace app\admin\controller;
use think\Loader;
use app\admin\model\Attr as AttrModel;
class Attr extends Base {
    public function lst() {
        $where = array();
        $typeId = input('typeId');
        $stypeId = input('stypeId');
        $searchText = input('searchText');
        $attrType = input('attrType');
        $select = '';
        if($typeId) {
            $select = $typeId;
            $where['a.typeId'] = array('eq',$typeId);
        }
        if(isset($stypeId)) {
            if($stypeId != '') {
                $select = $stypeId;
                $where['a.typeId'] = array('eq',$stypeId);
            }else {
                $select = '';
                $where = array();
            }
        }
        if($searchText) {
            $where['a.attrName'] = array('like', "%$searchText%");
        }
        if($attrType) {
            $where['a.attrType'] = array('eq', $attrType);
        }
        $list = db('attr')->alias('a')
            ->join('type b','a.typeId=b.id','LEFT')
            ->field('a.*,b.typeName')
            ->where($where)
            ->paginate(10,false,['query' => array('stypeId' => $stypeId,'searchText' => $searchText,'attrType' => $attrType)]);
        $typeData = db('type')->select();
        $plUrl = url('lst');
        $this->assign(array(
            'list' => $list,
            'typeData' => $typeData,
            'select' => $select,
            'plName' => '商品属性',
            'plUrl' => $plUrl,
            'slName' => '查看',
        ));
        return view();
    }
    public function add() {
        if(request()->isPost()) {
            $data = input('post.');
            if($data['attrType'] == 1) {
                if($data['attrValues'] != '') {
                    if(strpos($data['attrValues'],'，') !== false) {
                        $data['attrValues'] = str_replace('，',',',$data['attrValues']);
                    }
                }else {
                    $this->error('单选类型必须要有可选值！');
                }
            }else {
                $data['attrValues'] = '';
            }
            $validate = Loader::validate('attr');
            if($validate->check($data)) {
                if(db('attr')->insert($data)) {
                    $this->redirect('lst');
                }
                $this->error('添加失败');
            }
           $this->error($validate->getError());
        }
        $plUrl = url('lst');
        $this->assign(array(
            'plName' => '商品属性',
            'plUrl' => $plUrl,
            'slName' => '添加属性',
        ));
        return $this->fetch();
    }

    public function edit() {
        $id = input('id');
        $attrData = AttrModel::alias('a')
            ->join('type b','a.typeId=b.id','LEFT')
            ->field('a.*,b.typeName')
            ->where('a.id','eq',$id)
            ->find();
        if(request()->isPost()) {
            $data = input('post.');
            if(isset($data['attrValues'])) {
                if($data['attrValues'] != '') {
                    if (strpos($data['attrValues'], '，') !== false) {
                        $data['attrValues'] = str_replace('，', ',', $data['attrValues']);
                    }
                }else {
                    $this->error('单选类型必须要有可选值！');
                }
            }
            $validate = Loader::validate('attr');
            if($validate->scene('edit')->check($data)) {
                if(db('attr')->update($data) !== false) {
                    $this->redirect('lst');
                }
                $this->error('修改失败');
            }
            $this->error($validate->getError());
        }
        $plUrl = url('lst');
        $this->assign(array(
            'attrData' => $attrData,
            'plName' => '商品属性',
            'plUrl' => $plUrl,
            'slName' => '修改属性',
        ));
        return $this->fetch();
    }
    public function del() {
        $id = input('id');
        $goodsIds = db('goods_attr')->where('attrId',$id)->field('goodsId')->select();
        if($goodsIds) {
            foreach($goodsIds as $k => $v) {
                $arr[] = $v['goodsId'];
            }
            $arr = implode(',',array_unique($arr));
            $this->error("该属性下有商品尚未删除，请先删除id为{$arr}的商品");
        }
        //删除分类中的attrId
        $cateData = db('category')->select();
        foreach($cateData as $k => $v) {
            if (strpos($v['attrId'], $id) !== false) {
                $arr = explode(',',$v['attrId']);
               foreach($arr as $k1 => $v1) {
                   if($id == $v1) {
                       unset($arr[$k1]);
                   }
               }
               $arr = implode(',',$arr);
               db('category')->where('id',$v['id'])->setField('attrId',$arr);
            }
        }
        if(db('attr')->delete($id) !== false ){
            $this->success('删除成功！','admin/attr/lst');
        }
        $this->error("属性删除失败！");

    }
}
