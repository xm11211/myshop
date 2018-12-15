<?php
namespace app\admin\controller;
use think\Loader;
use app\admin\model\Nav as NavModel;
class Nav extends Base {
    public function lst() {
        $sort = input('sort');
        if($sort) {
            $list = NavModel::order("sort $sort")->paginate(10);
        }else {
            $list = NavModel::order("sort asc")->paginate(10);
        }
        $plUrl = url('lst');
        $this->assign(array(
            'list' => $list,
            'plName' => '导航管理',
            'plUrl' => $plUrl,
            'slName' => '查看',
        ));
        return $this->fetch();
    }
    public function add() {
        if(request()->isPost()) {
            $data = input('post.');
            $validate = Loader::validate('nav');
            if($validate->check($data)) {
                if(db('nav')->insert($data)) {
                    $this->redirect('lst');
                }
                $this->error('添加失败');
            }
           $this->error($validate->getError());
        }
        $plUrl = url('lst');
        $this->assign(array(
            'plName' => '导航管理',
            'plUrl' => $plUrl,
            'slName' => '添加导航',
        ));
        return $this->fetch();
    }

    public function edit() {
        $id = input('id');
        $navData = db('nav')->find($id);
        if(request()->isPost()) {
            $data = input('post.');
            $validate = Loader::validate('nav');
            if($validate->check($data)) {
                if(db('nav')->update($data) !== false) {
                    $this->redirect('lst');
                }
                $this->error('修改失败');
            }
            $this->error($validate->getError());
        }
        $plUrl = url('lst');
        $this->assign(array(
            'navData' => $navData,
            'plName' => '导航管理',
            'plUrl' => $plUrl,
            'slName' => '修改导航',
        ));
        return $this->fetch();
    }
    public function del() {
        $id = input('id');
        if(db('nav')->delete($id) !== false ){
            $this->success('删除成功','admin/nav/lst');
        }
        $this->error("导航删除失败",'admin/nav/lst');

    }
    public function sort() {
        $postData = input('post.');
        $sortArr = $postData['arrValue'];
        foreach($sortArr as $k => $v) {
            if($v == ''){
                continue;
            }
            if(is_numeric($v)){
                navModel::where(array('id' => array('eq',$k)))->setField('sort',$v);
            }else{
                echo $this->error("排序请输入数字！");
            }
        }
    }
    public function status(){
        $flag = input('value');
        $id = input('navId');
        $field = input('field');
        db('nav')->where('id','eq',$id)->setField($field,$flag);
    }
}
