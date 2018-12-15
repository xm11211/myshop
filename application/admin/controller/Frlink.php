<?php
namespace app\admin\controller;
use think\Loader;
use app\admin\model\Frlink as FrlinkModel;
class Frlink extends Base {
    public function lst() {
        $sort = input('sort');
        if($sort) {
            $list = FrlinkModel::order("sort $sort")->paginate(10);
        }else {
            $list = FrlinkModel::order("sort asc")->paginate(10);
        }
        $plUrl = url('lst');
        $this->assign(array(
            'list' => $list,
            'plName' => '友情链接管理',
            'plUrl' => $plUrl,
            'slName' => '查看',
        ));
        return $this->fetch();
    }
    public function add() {
        if(request()->isPost()) {
            $data = input('post.');
            if(input('status') == 1){
                $data['status'] = input('status');
            }else{
                $data['status'] = 0;
            }
            if(isset($_FILES['pic']) && $_FILES['pic']['error'] == 0) {
                $ret = uploadOne('pic','frlinkPic');
                if($ret['ok'] == 1) {
                    $data['pic'] = $ret['images']['0'];
                }else{
                    $this->error($ret['error']);
                }
            }
            $validate = Loader::validate('frlink');
            if($validate->check($data)) {
                if(db('frlink')->insert($data)) {
                    $this->redirect('lst');
                }
                $this->error('添加失败');
            }
           $this->error($validate->getError());
        }
        $plUrl = url('lst');
        $this->assign(array(
            'plName' => '友情链接管理',
            'plUrl' => $plUrl,
            'slName' => '添加链接',
        ));
        return $this->fetch();
    }

    public function edit() {
        $id = input('id');
        $frlinkData = db('frlink')->find($id);
        if(request()->isPost()) {
            $data = input('post.');
            if(input('status') == 1){
                $data['status'] = input('status');
            }else{
                $data['status'] = 0;
            }
            if(isset($_FILES['pic']) && $_FILES['pic']['error'] == 0) {
                $ret = uploadOne('pic','frlinkPic');
                if($ret['ok'] == 1) {
                    deleteImage($frlinkData['pic']);
                    $data['pic'] = $ret['images']['0'];
                }else{
                    $this->error($ret['error']);
                }
            }
            $validate = Loader::validate('frlink');
            if($validate->check($data)) {
                if(db('frlink')->update($data) !== false) {
                    $this->redirect('lst');
                }
                $this->error('修改失败');
            }
            $this->error($validate->getError());
        }
        $plUrl = url('lst');
        $this->assign(array(
            'frlinkData' => $frlinkData,
            'plName' => '友情链接管理',
            'plUrl' => $plUrl,
            'slName' => '修改链接',
        ));
        return $this->fetch();
    }
    public function del() {
        $id = input('id');
        if(strpos($id,',') !== false) {
            $arr = explode(',',$id);
            //删除图片
            $pic = db('frlink')->field('pic')->where('id' ,'in',$arr)->select();
            foreach($pic as $k => $v) {
                deleteImage($v);
            }
            //删除数据
            if(db('frlink')->delete($arr) !== false ) {
                $this->success('删除成功！','admin/frlink/lst');
            };
            $this->error("链接删除失败！",'admin/frlink/lst');
            return;
        }
        $pic = db('frlink')->field('pic')->find($id);
        deleteImage($pic['pic']);
        if(db('frlink')->delete($id) !== false ){
            $this->success('删除成功！','admin/frlink/lst');
        }
        $this->error("链接删除失败！",'admin/frlink/lst');

    }
    public function sort() {
        $postData = input('post.');
        $sortArr = $postData['arrValue'];
        foreach($sortArr as $k => $v) {
            if($v == ''){
                continue;
            }
            if(is_numeric($v)){
                FrlinkModel::where(array('id' => array('eq',$k)))->setField('sort',$v);
            }else{
                echo $this->error("排序请输入数字！");
            }
        }
    }
    public function status(){
        $flag = input('value');
        $id = input('frId');
        $field = input('field');
        db('frlink')->where('id','eq',$id)->setField($field,$flag);
    }
}
