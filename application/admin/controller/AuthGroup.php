<?php
namespace app\admin\controller;
use app\admin\model\AuthGroup as AuthGroupModel;
use think\Loader;
class AuthGroup extends Base
{
    public function lst(){
        $list=AuthGroupModel::paginate(6);
        $plUrl = url('lst');
        $this->assign(array(
            'list' => $list,
            'plName' => '用户组',
            'plUrl' => $plUrl,
            'slName' => '查看',
        ));
        return $this->fetch();
    }

    public function add(){
        if(request()->isPost()){
            $data=input('post.');
            if($data['rules']){
                $data['rules']=implode(',', $data['rules']);
            }
            $validate = Loader::validate('AuthGroup');
            if($validate->check($data)) {
                if(db('auth_group')->insert($data)) {
                    $this->redirect('lst');
                }
                $this->error('添加失败');
            }
            $this->error($validate->getError());
        }

        $authData = db('auth_rule')->select();
        $arr = array();
        foreach($authData as $k => $v) {
            if($v['pid'] == 0) {
                foreach($authData as $k1 => $v1) {
                    if($v1['pid'] == $v['id']) {
                        foreach($authData as $k2 => $v2) {
                            if($v2['pid'] == $v1['id']) {
                                $v2['level'] = 3;
                                $v1['child'][] = $v2;
                            }
                        }
                        $v1['level'] = 2;
                        $v['child'][] = $v1;
                    }
                }
                $v['level'] = 1;
                $arr[] = $v;
            }
        }
        echo "<pre>";
        print_r($arr);die;
        $plUrl = url('lst');
        $this->assign(array(
            'authData' => $arr,
            'plName' => '用户组',
            'plUrl' => $plUrl,
            'slName' => '添加用户组',
        ));
        return $this->fetch();
    }

    public function edit(){
        if(request()->isPost()){

            $data=input('post.');
            if($data['rules']){
                $data['rules']=implode(',', $data['rules']);
            }
            if(!input('status')) {
                $data['status'] = 0;
            }
            $validate = Loader::validate('AuthGroup');
            if($validate->check($data)) {
                if(db('auth_group')->update($data) !== false) {
                    $this->redirect('lst');
                }
                $this->error('修改失败');
            }
            $this->error($validate->getError());
        }
        $agData=db('auth_group')->find(input('id'));
        $plUrl = url('lst');
        $authData = db('auth_rule')->select();
        $arr = array();
        foreach($authData as $k => $v) {
            if($v['pid'] == 0) {
                foreach($authData as $k1 => $v1) {
                    if($v1['pid'] == $v['id']) {
                        foreach($authData as $k2 => $v2) {
                            if($v2['pid'] == $v1['id']) {
                                $v2['level'] = 3;
                                $v1['child'][] = $v2;
                            }
                        }
                        $v1['level'] = 2;
                        $v['child'][] = $v1;
                    }
                }
                $v['level'] = 1;
                $arr[] = $v;
            }
        }
        $this->assign(array(
            'authData' => $arr,
            'plName' => '用户组',
            'plUrl' => $plUrl,
            'slName' => '添加用户组',
            'agData' => $agData,
        ));
        return $this->fetch();
    }

    public function del(){
        $id = input('id');
        if($id == 1) {
            $this->error('超级管理员用户组不得删除！');
        }
        db('auth_group_access')->where('group_id','eq',$id)->delete();
        if(db('auth_group')->delete($id) !== false){
            $this->success('删除成功！','admin/auth_group/lst');
        }else{
            $this->error('删除用户组失败！','admin/auth_group/lst');
        }
    }
    public function status(){
        $flag = input('value');
        $id = input('groupId');
        if($flag == 0) {
            db('auth_group')->where('id','eq',$id)->setField('status',0);
        }elseif($flag == 1) {
            db('auth_group')->where('id','eq',$id)->setField('status',1);
        }else{
            $this->error('状态修改出错，请联系管理员！');
        }
    }
}
