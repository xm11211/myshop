<?php
namespace app\admin\controller;
use think\Loader;
use app\admin\model\Type as TypeModel;
class Type extends Base {
    public function lst() {
        $list = TypeModel::paginate(10);
        $plUrl = url('lst');
        $this->assign(array(
            'list' => $list,
            'plName' => '商品类型',
            'plUrl' => $plUrl,
            'slName' => '查看',
        ));
        return $this->fetch();
    }
    public function add() {
        if(request()->isPost()) {
            $data = input('post.');
            $validate = Loader::validate('type');
            if($validate->check($data)) {
                if(db('type')->insert($data)) {
                    $this->redirect('lst');
                }
                $this->error('添加失败');
            }
           $this->error($validate->getError());
        }
        $plUrl = url('lst');
        $this->assign(array(
            'plName' => '商品类型',
            'plUrl' => $plUrl,
            'slName' => '添加类型',
        ));
        return $this->fetch();
    }

    public function edit() {
        $id = input('id');
        $typeData = db('type')->find($id);
        if(request()->isPost()) {
            $data = input('post.');
            $validate = Loader::validate('type');
            if($validate->check($data)) {
                if(db('type')->update($data) !== false) {
                    $this->redirect('lst');
                }
                $this->error('修改失败');
            }
            $this->error($validate->getError());
        }
        $plUrl = url('lst');
        $this->assign(array(
            'typeData' => $typeData,
            'plName' => '商品类型',
            'plUrl' => $plUrl,
            'slName' => '修改类型',
        ));
        return $this->fetch();
    }
    public function del() {
        $id = input('id');
        $attrIds = db('attr')->where('typeId',$id)->field('id')->select();
        if($attrIds) {
            foreach($attrIds as $k => $v) {
                $arr[] = $v['id'];
            }
            $arr = implode(',',$arr);
            $this->error("该类型下有属性尚未删除，请先删除id为{$arr}的属性");
        }
        if(db('type')->delete($id) !== false ){
            //删除属性
            $this->success('删除成功','admin/type/lst');
        }
        $this->error("类型删除失败",'admin/type/lst');
    }
}
