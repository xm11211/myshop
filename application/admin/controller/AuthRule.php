<?php
namespace app\admin\controller;
use think\Loader;
use app\admin\model\AuthRule as AuthRuleModel;
class AuthRule extends Base {
    public function lst() {
        $sort = input('sort');
        $list = getTree(db('auth_rule'),'sort',$sort);
        $plUrl = url('lst');
        $this->assign(array(
            'list' => $list,
            'plName' => '权限规则',
            'plUrl' => $plUrl,
            'slName' => '查看',
        ));
        return $this->fetch();
    }
    public function add() {
        if(request()->isPost()) {
            $data = input('post.');
            $validate = Loader::validate('AuthRule');
            if($validate->check($data)) {
                if(db('auth_rule')->insert($data)) {
                    $this->redirect('lst');
                }
                $this->error('添加失败');
            }
           $this->error($validate->getError());
        }
        $plUrl = url('lst');
        $arData = getTree(db('auth_rule'),'sort','desc');
        $this->assign(array(
            'arData' => $arData,
            'plName' => '权限规则',
            'plUrl' => $plUrl,
            'slName' => '添加权限',
        ));
        return $this->fetch();
    }

    public function edit() {
        $id = input('id');
        if(request()->isPost()) {
            $data = input('post.');
            $validate = Loader::validate('AuthRule');
            if($validate->check($data)) {
                if(db('auth_rule')->update($data) !== false) {
                    $this->redirect('lst');
                }
                $this->error('修改失败');
            }
            $this->error($validate->getError());
        }
        $plUrl = url('lst');
        $allRules = getTree(db('auth_rule'),'sort','desc');
        $childRules = getChildren(db('auth_rule'),$id);
        $arData = db('auth_rule')->find($id);
        $this->assign(array(
            'allRules' => $allRules,
            'childRules' => $childRules,
            'arData' => $arData,
            'plName' => '权限规则',
            'plUrl' => $plUrl,
            'slName' => '修改权限',
        ));
        return $this->fetch();
    }
    public function del() {
        $id = input('id');
        $childRules = getChildren(db('auth_rule'),$id);
        if($childRules) {
            $childRules = implode(',',$childRules);
            $this->error("请先删除权限ID为{$childRules}的数据！请不要越级删除！");
        }
        if(db('auth_rule')->delete($id) !== false ){
            $this->success('删除成功！','admin/auth_rule/lst');
        }
        $this->error("权限删除失败！",'admin/auth_rule/lst');

    }
    public function sort() {
        $postData = input('post.');
        $sortArr = $postData['arrValue'];
        foreach($sortArr as $k => $v) {
            if($v == ''){
                continue;
            }
            if(is_numeric($v)){
                AuthRuleModel::where(array('id' => array('eq',$k)))->setField('sort',$v);
            }else{
                echo $this->error("排序请输入数字！");
            }
        }
    }
    public function status(){
        $flag = input('value');
        $id = input('authRuleId');
        if($flag == 0) {
            db('auth_rule')->where('id','eq',$id)->setField('status',0);
        }elseif($flag == 1) {
            db('auth_rule')->where('id','eq',$id)->setField('status',1);
        }else{
            $this->error('状态修改出错，请联系管理员！');
        }
    }
}
