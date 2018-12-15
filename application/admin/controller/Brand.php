<?php
namespace app\admin\controller;
use think\Loader;
use app\admin\model\Brand as BrandModel;
class Brand extends Base {
    public function lst() {
        $sort = input('sort');
        if($sort) {
            $list = BrandModel::order("sort $sort")->paginate(10);
        }else {
            $list = BrandModel::order("sort asc")->paginate(10);
        }
        $plUrl = url('lst');
        $this->assign(array(
            'list' => $list,
            'plName' => '品牌管理',
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
                $ret = uploadOne('pic','brandPic');
                if($ret['ok'] == 1) {
                    $data['pic'] = $ret['images']['0'];
                }else{
                    $this->error($ret['error']);
                }
            }
            $validate = Loader::validate('Brand');
            if($validate->check($data)) {
                if(db('brand')->insert($data)) {
                    $this->redirect('lst');
                }
                $this->error('添加失败');
            }
           $this->error($validate->getError());
        }
        $plUrl = url('lst');
        $this->assign(array(
            'plName' => '品牌管理',
            'plUrl' => $plUrl,
            'slName' => '添加品牌',
        ));
        return $this->fetch();
    }

    public function edit() {
        $id = input('id');
        $brandData = db('brand')->find($id);
        if(request()->isPost()) {
            $data = input('post.');
            if(input('status') == 1){
                $data['status'] = input('status');
            }else{
                $data['status'] = 0;
            }
            if(isset($_FILES['pic']) && $_FILES['pic']['error'] == 0) {
                $ret = uploadOne('pic','brandPic');
                if($ret['ok'] == 1) {
                    deleteImage($brandData['pic']);
                    $data['pic'] = $ret['images']['0'];
                }else{
                    $this->error($ret['error']);
                }
            }
            $validate = Loader::validate('Brand');
            if($validate->check($data)) {
                if(db('brand')->update($data) !== false) {
                    $this->redirect('lst');
                }
                $this->error('修改失败');
            }
            $this->error($validate->getError());
        }
        $plUrl = url('lst');
        $this->assign(array(
            'brandData' => $brandData,
            'plName' => '品牌管理',
            'plUrl' => $plUrl,
            'slName' => '修改品牌',
        ));
        return $this->fetch();
    }
    public function del() {
        $id = input('id');
        $pic = db('brand')->field('pic')->find($id);
        deleteImage($pic['pic']);
        if(db('brand')->delete($id) !== false ){
            //修改商品品牌brandId为0
            db('goods')->where('brandId','eq',$id)->setField('cateId',0);
            $this->success('删除成功','admin/brand/lst');
        }
        $this->error("品牌删除失败",'admin/brand/lst');

    }
    public function sort() {
        $postData = input('post.');
        $sortArr = $postData['arrValue'];
        foreach($sortArr as $k => $v) {
            if($v == ''){
                continue;
            }
            if(is_numeric($v)){
                BrandModel::where(array('id' => array('eq',$k)))->setField('sort',$v);
            }else{
                echo $this->error("排序请输入数字！");
            }
        }
    }
    public function status(){
        $flag = input('value');
        $id = input('brandId');
        db('brand')->where('id','eq',$id)->setField('status',$flag);

    }
}
