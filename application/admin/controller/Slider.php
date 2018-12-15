<?php
namespace app\admin\controller;
use think\Loader;
use app\admin\model\Slider as SliderModel;
class Slider extends Base {
    public function lst() {
        $sort = input('sort');
        if($sort) {
            $list = SliderModel::order("sort $sort")->paginate(10);
        }else {
            $list = SliderModel::order("sort asc")->paginate(10);
        }
        $plUrl = url('lst');
        $this->assign(array(
            'list' => $list,
            'plName' => '轮播图',
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
                $ret = uploadOne('pic','sliderPic');
                if($ret['ok'] == 1) {
                    $data['pic'] = $ret['images']['0'];
                }else{
                    $this->error($ret['error']);
                }
            }else {
                $this->error('必须选择图片！');
            }
            $validate = Loader::validate('slider');
            if($validate->check($data)) {
                if(db('slider')->insert($data)) {
                    $this->redirect('lst');
                }
                $this->error('添加失败');
            }
           $this->error($validate->getError());
        }
        $plUrl = url('lst');
        $this->assign(array(
            'plName' => '轮播图',
            'plUrl' => $plUrl,
            'slName' => '添加轮播图',
        ));
        return $this->fetch();
    }

    public function edit() {
        $id = input('id');
        $sliderData = db('slider')->find($id);
        if(request()->isPost()) {
            $data = input('post.');
            if(input('status') == 1){
                $data['status'] = input('status');
            }else{
                $data['status'] = 0;
            }
            if(isset($_FILES['pic']) && $_FILES['pic']['error'] == 0) {
                $ret = uploadOne('pic','sliderPic');
                if($ret['ok'] == 1) {
                    deleteImage($sliderData['pic']);
                    $data['pic'] = $ret['images']['0'];
                }else{
                    $this->error($ret['error']);
                }
            }
            $validate = Loader::validate('slider');
            if($validate->check($data)) {
                if(db('slider')->update($data) !== false) {
                    $this->redirect('lst');
                }
                $this->error('修改失败');
            }
            $this->error($validate->getError());
        }
        $plUrl = url('lst');
        $this->assign(array(
            'sliderData' => $sliderData,
            'plName' => '轮播图',
            'plUrl' => $plUrl,
            'slName' => '修改轮播图',
        ));
        return $this->fetch();
    }
    public function del() {
        $id = input('id');
        $pic = db('slider')->field('pic')->find($id);
        deleteImage($pic['pic']);
        if(db('slider')->delete($id) !== false ){
            $this->success('删除成功','admin/slider/lst');
        }
        $this->error("轮播图删除失败",'admin/slider/lst');

    }
    public function sort() {
        $postData = input('post.');
        $sortArr = $postData['arrValue'];
        foreach($sortArr as $k => $v) {
            if($v == ''){
                continue;
            }
            if(is_numeric($v)){
                SliderModel::where(array('id' => array('eq',$k)))->setField('sort',$v);
            }else{
                echo $this->error("排序请输入数字！");
            }
        }
    }
    public function status(){
        $flag = input('value');
        $id = input('sliderId');
        db('slider')->where('id','eq',$id)->setField('status',$flag);

    }
}
