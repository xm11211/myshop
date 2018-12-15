<?php
namespace app\admin\controller;
use think\Loader;
class CategoryWords extends Base {
    public function lst() {
        $list = db('category_words')
            ->alias('a')
            ->field('a.*,b.cateName')
            ->join('category b','a.cateId = b.id','LEFT')
            ->paginate(10);
        $plUrl = url('lst');
        $this->assign(array(
            'list' => $list,
            'plName' => '推荐词关联',
            'plUrl' => $plUrl,
            'slName' => '查看',
        ));
        return view();
    }
    public function add() {
        if(request()->isPost()) {
            $data = input('post.');
            if($data['cateId'] == '') {
                $this->error('必须选择栏目！');
            }
            $validate = Loader::validate('CategoryWords');
            if($validate->check($data)) {
                if(db('category_words')->insert($data)) {
                    $this->redirect('lst');
                }
                $this->error('添加失败');
            }
           $this->error($validate->getError());
        }
        $plUrl = url('lst');
        $this->assign(array(
            'plName' => '推荐词关联',
            'plUrl' => $plUrl,
            'slName' => '添加推荐词',
        ));
        return $this->fetch();
    }

    public function edit() {
        $id = input('id');
        $cwData = db('category_words')->find($id);
        if(request()->isPost()) {
            $data = input('post.');
            if($data['cateId'] == '') {
                $this->error('必须选择栏目！');
            }
            $validate = Loader::validate('CategoryWords');
            if($validate->check($data)) {
                if(db('category_words')->update($data) !== false) {
                    $this->redirect('lst');
                }
                $this->error('修改失败');
            }
            $this->error($validate->getError());
        }
        $plUrl = url('lst');
        $this->assign(array(
            'cwData' => $cwData,
            'plName' => '推荐词关联',
            'plUrl' => $plUrl,
            'slName' => '修改推荐词',
        ));
        return $this->fetch();
    }
    public function del() {
        $id = input('id');
        if(db('category_words')->delete($id) !== false ){
            $this->success('删除成功！','admin/categoryWords/lst');
        }
        $this->error("推荐词删除失败！");

    }
}
