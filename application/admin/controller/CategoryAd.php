<?php
namespace app\admin\controller;
use think\Loader;
class CategoryAd extends Base {
    public function lst() {
        $list = db('Category_ad')
            ->alias('a')
            ->field('a.*,b.cateName')
            ->join('category b','a.cateId = b.id','LEFT')
            ->order('a.cateId asc,a.id desc')
            ->paginate(10);
        $plUrl = url('lst');
        $this->assign(array(
            'list' => $list,
            'plName' => '楼层广告',
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
            if($data['position'] == 2) {
                $num1 = db('category_ad')->where(array('cateId' => array('eq',$data['cateId']),'position' => array('eq',2)))->count();
                if($num1 == 1) {
                    $this->error('右上位置已有数据，不得再次添加，请去修改！');
                }
            }
            if($data['position'] == 3) {
                $num2 = db('category_ad')->where(array('cateId' => array('eq',$data['cateId']),'position' => array('eq',3)))->count();
                if($num2 == 1) {
                    $this->error('右下位置已有数据，不得再次添加，请去修改！');
                }
            }
            if(isset($_FILES['pic']) && $_FILES['pic']['error'] == 0) {
                $ret = uploadOne('pic','cateAdPic');
                if($ret['ok'] == 1) {
                    $data['pic'] = $ret['images']['0'];
                }else{
                    $this->error($ret['error']);
                }
            }else {
                $this->error("必须选择图片！");
            }
            $validate = Loader::validate('CategoryAd');
            if($validate->check($data)) {
                if(db('Category_ad')->insert($data)) {
                    $this->redirect('lst');
                }
                $this->error('添加失败');
            }
           $this->error($validate->getError());
        }
        $plUrl = url('lst');
        $this->assign(array(
            'plName' => '楼层广告',
            'plUrl' => $plUrl,
            'slName' => '添加楼层广告',
        ));
        return $this->fetch();
    }

    public function edit() {
        $id = input('id');
        $caData = db('Category_ad')
            ->alias('a')
            ->field('a.*,b.cateName')
            ->join('category b','a.cateId = b.id')
            ->find($id);
        if(request()->isPost()) {
            $data = input('post.');
            if(isset($_FILES['pic']) && $_FILES['pic']['error'] == 0) {
                $ret = uploadOne('pic', 'cateAdPic');
                if ($ret['ok'] == 1) {
                    deleteImage($caData['pic']);
                    $data['pic'] = $ret['images']['0'];
                } else {
                    $this->error($ret['error']);
                }
            }
            $validate = Loader::validate('CategoryAd');
            if($validate->check($data)) {
                if(db('Category_ad')->update($data) !== false) {
                    $this->redirect('lst');
                }
                $this->error('修改失败');
            }
            $this->error($validate->getError());
        }
        $plUrl = url('lst');
        $this->assign(array(
            'caData' => $caData,
            'plName' => '楼层广告',
            'plUrl' => $plUrl,
            'slName' => '修改楼层广告',
        ));
        return $this->fetch();
    }
    public function del() {
        $id = input('id');
        $pic = db('Category_ad')->field('pic')->find($id);
        deleteImage($pic['pic']);
        if(db('Category_ad')->delete($id) !== false ){
            $this->success('删除成功！','admin/CategoryAd/lst');
        }
        $this->error("楼层广告删除失败！");
    }
}
