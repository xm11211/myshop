<?php
namespace app\admin\controller;
use think\Loader;
use extend\String;
class User extends Base {
    public function lst() {
        $list = db('user')
            ->alias('a')
            ->field('a.*,b.levelName')
            ->join('member_level b','a.points <= b.top and a.points >= b.bottom','LEFT')
            ->paginate(20);
        $plUrl = url('lst');
        $this->assign(array(
            'list' => $list,
            'plName' => '会员管理',
            'plUrl' => $plUrl,
            'slName' => '查看',
        ));
        return $this->fetch();
    }

    public function add() {
        if(request()->isPost()) {
            $data = input('post.');
            $data['eChecked'] = input('eChecked') ? 1 : 0;
            $data['tChecked'] = input('tChecked') ? 1 : 0;
            if($data['eChecked'] && $data['tChecked']) {
                if($data['email'] && $data['tel']) {
                    $data['regType'] = 2;
                }else {
                    $this->error('请填写手机号与邮箱，或去掉勾选验证标识');
                }

            }else if($data['eChecked']) {
                if($data['email']) {
                    $data['regType'] = 0;
                }else {
                    $this->error('请填写邮箱，或去掉勾选验证标识');
                }
            }else if($data['tChecked']) {
                if($data['tel']) {
                    $data['regType'] = 1;
                }else {
                    $this->error('请填写手机号，或去掉勾选验证标识');
                }
            }else {
                $data['regType'] = 3;
            }
            $data['regTime'] = time();
            Loader::import('String', EXTEND_PATH);
            $data['randString'] = String::randString(15);
            $data['password'] = getPwd($data['password'].$data['randString']);
            if(isset($_FILES['avator']) && $_FILES['avator']['error'] == 0) {
                $ret = uploadOne('avator','userPic');
                if($ret['ok'] == 1) {
                    $data['avator'] = $ret['images']['0'];
                }else{
                    $this->error($ret['error']);
                }
            }
            $validate = Loader::validate('user');
            if($validate->check($data)) {
                if(db('user')->insert($data)) {
                    $this->redirect('lst');
                }
                $this->error('添加失败');
            }
            $this->error($validate->getError());
        }
        $plUrl = url('lst');
        $this->assign(array(
            'plName' => '用户管理',
            'plUrl' => $plUrl,
            'slName' => '添加用户',
        ));
        return $this->fetch();
    }

    public function edit() {
        $id = input('id');
        $userData = db('user')->find($id);
        if(request()->isPost()) {
            $data = input('post.');
            $data['eChecked'] = input('eChecked') ? 1 : 0;
            $data['tChecked'] = input('tChecked') ? 1 : 0;
            if($data['eChecked'] && $data['tChecked']) {
                if($data['email'] && $data['tel']) {
                    $data['regType'] = 2;
                }else {
                    $this->error('请填写手机号与邮箱，或去掉勾选验证标识');
                }

            }else if($data['eChecked']) {
                if($data['email']) {
                    $data['regType'] = 0;
                }else {
                    $this->error('请填写邮箱，或去掉勾选验证标识');
                }
            }else if($data['tChecked']) {
                if($data['tel']) {
                    $data['regType'] = 1;
                }else {
                    $this->error('请填写手机号，或去掉勾选验证标识');
                }
            }else {
                $data['regType'] = 3;
            }
            unset($data['regTime']);
            if($data['password']) {
                Loader::import('String', EXTEND_PATH);
                $data['randString'] = String::randString(15);
                $data['password'] = getPwd($data['password'].$data['randString']);
            }else {
                unset($data['password']);
            }
            if(isset($_FILES['avator']) && $_FILES['avator']['error'] == 0) {
                $ret = uploadOne('avator','userPic');
                if($ret['ok'] == 1) {
                    deleteImage($userData['avator']);
                    $data['avator'] = $ret['images']['0'];
                }else{
                    $this->error($ret['error']);
                }
            }
            $validate = Loader::validate('User');
            if($validate->scene('edit')->check($data)) {
                if(db('user')->update($data)) {
                    $this->redirect('lst');
                }
                $this->error('修改失败');
            }
            $this->error($validate->getError());
        }
        $plUrl = url('lst');
        $this->assign(array(
            'userData' => $userData,
            'plName' => '用户管理',
            'plUrl' => $plUrl,
            'slName' => '添加用户',
        ));
        return $this->fetch();
    }
    public function del() {
        $id = input('id');
        $pic = db('user')->field('avator')->find($id);
        deleteImage($pic['avator']);
        if(db('user')->delete($id) !== false ){
            $orderIds = db('order')->field('id')->where('userId',$id)->select();
            foreach($orderIds as $k => $v) {
                db('order')->delete($v['id']);
                db('order_goods')->where('orderId',$v['id'])->delete();
            }
            $this->success('用户删除成功','admin/user/lst');
        }
        $this->error("用户删除失败",'admin/user/lst');
    }
}
