<?php
namespace app\admin\controller;
use think\Loader;
class RecPos extends Base {
    public function lst() {
        $list = db('rec_pos')->paginate(10);
        $plUrl = url('lst');
        $this->assign(array(
            'list' => $list,
            'plName' => '推荐位管理',
            'plUrl' => $plUrl,
            'slName' => '查看',
        ));
        return $this->fetch();
    }
    public function add() {
        if(request()->isPost()) {
            $data = input('post.');
            $validate = Loader::validate('RecPos');
            if($validate->check($data)) {
                if(db('rec_pos')->insert($data)) {
                    $this->redirect('lst');
                }
                $this->error('添加失败');
            }
           $this->error($validate->getError());
        }
        $plUrl = url('lst');
        $this->assign(array(
            'plName' => '推荐位管理',
            'plUrl' => $plUrl,
            'slName' => '添加推荐位',
        ));
        return $this->fetch();
    }

    public function edit() {
        $id = input('id');
        $recpData = db('rec_pos')->find($id);
        if(request()->isPost()) {
            $data = input('post.');
            $validate = Loader::validate('RecPos');
            if($validate->check($data)) {
                if(db('rec_pos')->update($data) !== false) {
                    $this->redirect('lst');
                }
                $this->error('修改失败');
            }
            $this->error($validate->getError());
        }
        $plUrl = url('lst');
        $this->assign(array(
            'recpData' => $recpData,
            'plName' => '推荐位管理',
            'plUrl' => $plUrl,
            'slName' => '修改推荐位',
        ));
        return $this->fetch();
    }
    public function del() {
        $id = input('id');
        if(db('rec_pos')->delete($id) !== false ){
            $this->success('删除成功','admin/rec_pos/lst');
        }
        $this->error("推荐位删除失败",'admin/rec_pos/lst');
    }
    public function status(){
        $flag = input('value');
        $id = input('recpId');
        $field = input('field');
        db('rec_pos')->where('id','eq',$id)->setField($field,$flag);
        db('rec_item')->where('recposId','eq',$id)->delete();
    }
}
