<?php
namespace app\admin\controller;
use think\Loader;
class CategoryBrands extends Base {
    public function lst() {
        $list = db('category_brands')
            ->alias('a')
            ->field('a.*,b.cateName')
            ->join('category b','a.cateId = b.id','LEFT')
            ->paginate(10);
        $plUrl = url('lst');
        $this->assign(array(
            'list' => $list,
            'plName' => '品牌关联',
            'plUrl' => $plUrl,
            'slName' => '查看',
        ));
        return view();
    }
    public function add() {
        if(request()->isPost()) {
            $data = input('post.');
            if($data['cateId'] == '') {
                $this->error('必须选择分类！');
            }
            if(!isset($data['brandId'])) {
                $this->error('必须选择品牌！');
            }else {
                $data['brandId'] = implode(',',$data['brandId']);
            }
            if(isset($_FILES['pic']) && $_FILES['pic']['error'] == 0) {
                $ret = uploadOne('pic','cateBrandPic');
                if($ret['ok'] == 1) {
                    $data['pic'] = $ret['images']['0'];
                }else{
                    $this->error($ret['error']);
                }
            }else {
                $this->error("必须选择图片！");
            }
            $validate = Loader::validate('CategoryBrands');
            if($validate->check($data)) {
                if(db('category_brands')->insert($data)) {
                    $this->redirect('lst');
                }
                $this->error('添加失败');
            }
           $this->error($validate->getError());
        }
        $plUrl = url('lst');
        $brandData = db('brand')->select();
        $this->assign(array(
            'brandData' => $brandData,
            'plName' => '品牌关联',
            'plUrl' => $plUrl,
            'slName' => '添加推荐品牌',
        ));
        return $this->fetch();
    }

    public function edit() {
        $id = input('id');
        $cbData = db('category_brands')
            ->alias('a')
            ->field('a.*,b.cateName')
            ->join('category b','a.cateId = b.id')
            ->find($id);
        if(request()->isPost()) {
            $data = input('post.');
            if(!isset($data['brandId'])) {
                $this->error('必须选择品牌！');
            }else {
                $data['brandId'] = implode(',',$data['brandId']);
            }
            if(isset($_FILES['pic']) && $_FILES['pic']['error'] == 0) {
                $ret = uploadOne('pic', 'cateBrandPic');
                if ($ret['ok'] == 1) {
                    deleteImage($cbData['pic']);
                    $data['pic'] = $ret['images']['0'];
                } else {
                    $this->error($ret['error']);
                }
            }
            $validate = Loader::validate('CategoryBrands');
            if($validate->check($data)) {
                if(db('category_brands')->update($data) !== false) {
                    $this->redirect('lst');
                }
                $this->error('修改失败');
            }
            $this->error($validate->getError());
        }
        $plUrl = url('lst');
        $brandData = db('brand')->select();
        $cbData['brandId'] = explode(',',$cbData['brandId']);
        $this->assign(array(
            'brandData' => $brandData,
            'cbData' => $cbData,
            'plName' => '品牌关联',
            'plUrl' => $plUrl,
            'slName' => '修改推荐品牌',
        ));
        return $this->fetch();
    }
    public function del() {
        $id = input('id');
        $pic = db('category_brands')->field('pic')->find($id);
        deleteImage($pic['pic']);
        if(db('category_brands')->delete($id) !== false ){
            $this->success('删除成功！','admin/CategoryBrands/lst');
        }
        $this->error("推荐品牌删除失败！");

    }
}
