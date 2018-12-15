<?php
namespace app\admin\controller;
use think\Loader;
use app\admin\model\Admin as AdminModel;
use extend\String;
class Admin extends Base {
    public function lst() {
        $auth=new Auth();
        $list = AdminModel::paginate(6);
        foreach ($list as $k => $v) {
            $group=$auth->getGroups($v['id']);
            $v['group']=$group;
        }
        $plUrl = url('lst');
        $this->assign(array(
            'list' => $list,
            'plName' => '管理员管理',
            'plUrl' => $plUrl,
            'slName' => '查看',
        ));
        return $this->fetch();
    }

    public function add() {
        if(request()->isPost()) {
            $data = input('post.');
            $validate = Loader::validate('Admin');
            if(isset($data['agId'])) {
                foreach($data['agId'] as $k => $v) {
                    if($v == 1) {
                        $arr = [1];
                        break;
                    }else {
                        $arr[] = $v;
                    }
                }
                unset($data['agId']);
            }
            if(isset($_FILES['pic']) && $_FILES['pic']['error'] == 0) {
                $ret = uploadOne('pic','adminPic');
                if($ret['ok'] == 1) {
                    $data['pic'] = $ret['images']['0'];
                }else{
                    $this->error($ret['error']);
                }
            }
            Loader::import('String', EXTEND_PATH);
            $data['randString'] = String::randString(15);
            $data['password'] = getPwd(input('password').$data['randString']);
            if($validate->scene('add')->check($data)) {
                $adminModel = model('admin');
                if($adminModel->save($data)) {
                    if($arr) {
                        foreach($arr as $k => $v) {
                            if($v == 1) {
                                db('admin')->where('id','eq',$adminModel->id)->setField('isRoot',1);
                            }
                            db('auth_group_access')->insert(array(
                                'uid' => $adminModel->id,
                                'group_id' => $v
                            ));
                        }
                        $this->redirect('lst');
                    }
                }
                $this->error('添加失败');
            }
            $this->error($validate->getError());
        }
        $agData = db('auth_group')->select();
        $agData = array_chunk($agData,4);
        $plUrl = url('lst');
        $this->assign(array(
            'agData' => $agData,
            'plName' => '管理员管理',
            'plUrl' => $plUrl,
            'slName' => '添加管理员',
        ));
        return $this->fetch();
    }

    public function edit() {
        $id = input('id');
        $adminData = db('admin')->find($id);
        $agIds = db('auth_group_access')->where('uid','eq',$id)->field('group_id')->select();
        $ret2 = array();
        foreach($agIds as $k => $v) {
            $ret2[] = (int)$v['group_id'];
        }
        if(request()->isPost()) {
            $data = input('post.');
            if(isset($data['agId']))  {
                foreach($data['agId'] as $k => $v) {
                    if($v == 1) {
                        $arr = [1];
                        break;
                    }else {
                        $arr[] = $v;
                    }
                }
                unset($data['agId']);
            }
            if(input('password')) {
                Loader::import('String', EXTEND_PATH);
                $data['randString'] = String::randString(15);
                $data['password'] = getPwd(input('password').$data['randString']);
            }else {
                unset($data['password']);
            }
            if(isset($_FILES['pic']) && $_FILES['pic']['error'] == 0) {
                $ret = uploadOne('pic','adminPic');
                if($ret['ok'] == 1) {
                    deleteImage($adminData['pic']);
                    $data['pic'] = $ret['images']['0'];
                }else{
                    $this->error($ret['error']);
                }
            }
            if(in_array(1,$ret2) && !in_array(1,$arr)) {
                if(session('aid') == $id) {
                    session('isRoot',0);
                }
                db('admin')->where('id','eq',$id)->setField('isRoot',0);
            } elseif(!in_array(1,$ret2) && in_array(1,$arr)) {
                if(session('aid') == $id) {
                    session('isRoot',1);
                }
                db('admin')->where('id','eq',$id)->setField('isRoot',1);
            }
            $validate = Loader::validate('Admin');
            if($validate->scene('edit')->check($data)) {
                if(db('admin')->update($data) !== false) {
                    if ($arr) {
                        db('auth_group_access')->where('uid','eq',$id)->delete();
                        foreach ($arr as $k => $v) {
                            db('auth_group_access')->insert(array(
                                'uid' => $id,
                                'group_id' => $v
                            ));
                        }
                        $this->redirect('lst');
                    }
                }
                $this->error('修改失败');
            }
            $this->error($validate->getError());
        }
        $agData = db('auth_group')->select();
        $agData = array_chunk($agData,4);

        $plUrl = url('lst');
        $this->assign(array(
            'agData' => $agData,
            'adminData' => $adminData,
            'agIds' => $ret2,
            'plName' => '管理员管理',
            'plUrl' => $plUrl,
            'slName' => '修改管理员',
        ));
        return $this->fetch();
    }
    public function del() {
        $id = input('id');
        if($id != 5){
            $adminData = db('admin')->find($id);
            deleteImage($adminData['pic']);
            db("auth_group_access")->where('uid','eq',$id)->delete();
            if(db('admin')->delete($id) !== false ){
                $this->success('删除成功','admin/admin/lst');
            }
            $this->error("删除管理员失败");
        }else {
            $this->error("顶级管理员不得删除");
        }
    }
    //清空缓存
    public function clear() {
        $result = cache(null);
        if($result) {
            echo 1;
        }else {
            echo 2;
        }
    }
    //退出
    public function logout() {
        session('adminName',null);
        session('aid',null);
        session('adminPic',null);
        session('isRoot',null);
        session('version',null);//获取PHP服务器版本
        session('pc',null);//当前主机名
        session('osname',null);//获取系统类型及版本号
        session('port',null);//获取服务器Web端口
        session('mysql_version',null);
        session('apacheVer',null);
        $code = date("Hi",$_SERVER['REQUEST_TIME']);
        $this->redirect("/xm11211{$code}");
    }
}
