<?php
namespace app\admin\controller;
use think\Loader;
use app\admin\model\MemberLevel as MemberLevelModel;
class MemberLevel extends Base {
    public function lst() {
        $list = MemberLevelModel::paginate(10);
        $plUrl = url('lst');
        $this->assign(array(
            'list' => $list,
            'plName' => '会员级别',
            'plUrl' => $plUrl,
            'slName' => '查看',
        ));
        return $this->fetch();
    }
    public function add() {
        if(request()->isPost()) {
            $data = input('post.');
            $validate = Loader::validate('memberLevel');
            if($data['rate'] == 0) {
                $data['rate'] = 100;
            }
            if($validate->check($data)) {
                if(db('member_level')->insert($data)) {
                    $this->redirect('lst');
                }
                $this->error('添加失败！');
            }
           $this->error($validate->getError());
        }
        $plUrl = url('lst');
        $this->assign(array(
            'plName' => '会员级别',
            'plUrl' => $plUrl,
            'slName' => '添加级别',
        ));
        return $this->fetch();
    }

    public function edit() {
        $id = input('id');
        $mlData = db('member_level')->find($id);
        if(request()->isPost()) {
            $data = input('post.');
            $validate = Loader::validate('member_level');
            if($data['rate'] == 0) {
                $data['rate'] = 100;
            }
            if($validate->check($data)) {
                if(db('member_level')->update($data) !== false) {
                    $this->redirect('lst');
                }
                $this->error('修改失败！');
            }
            $this->error($validate->getError());
        }
        $plUrl = url('lst');
        $this->assign(array(
            'mlData' => $mlData,
            'plName' => '会员级别',
            'plUrl' => $plUrl,
            'slName' => '修改级别',
        ));
        return $this->fetch();
    }
    public function del() {
        $id = input('id');
        if(db('member_level')->delete($id) !== false ){
            $this->success('删除成功！','admin/member_level/lst');
        }
        $this->error("级别删除失败！",'admin/member_level/lst');

    }
}
