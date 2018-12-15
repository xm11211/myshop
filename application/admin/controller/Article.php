<?php
namespace app\admin\controller;
use think\Loader;
class Article extends Base {
    public function lst() {
        $where = array();
        $searchText = input('get.searchText');
        $cateId = input('get.cateId');
        if($searchText) {
            $where['a.title'] = array('like', "%$searchText%");
        }
        if($cateId) {
            $where['a.cateId'] = array('eq', $cateId);
        }
        //获取栏目信息
        $list = db('article')
            ->alias('a')
            ->join('cate c','c.id=a.cateId','LEFT')
            ->field('a.id,a.title,a.showTop,a.showStatus,a.thumb,a.time,c.cateName')
            ->where($where)
            ->paginate(10,false,['query'=>array('searchText' => $searchText,'cateId' => $cateId)]);
        $cateData = getTree(db('cate'));
        $plUrl = url('lst');
        $this->assign(array(
            'cateData' => $cateData,
            'list' => $list,
            'plName' => '文章管理',
            'plUrl' => $plUrl,
            'slName' => '查看',
        ));
        return $this->fetch();
    }

    public function add() {
        if(request()->isPost()) {
            $data = input('post.');
            $data['time'] = time();
            $data['upTime'] = $data['time'];
            if(input('showTop') == 1){
                $data['showTop'] = input('showTop');
            }else{
                $data['showTop'] = 0;
            }
            if(input('showStatus') == 1){
                $data['showStatus'] = input('showStatus');
            }else{
                $data['showStatus'] = 0;
            }
            if(isset($_FILES['thumb']) && $_FILES['thumb']['error'] == 0) {
                $ret = uploadOne('thumb','artPic');
                if($ret['ok'] == 1) {
                    $data['thumb'] = $ret['images']['0'];
                }else{
                   $this->error($ret['error']);
                }
            }
            $validate = Loader::validate('Article');
            if($validate->check($data)) {
                if(db('Article')->insert($data)) {
                    $this->redirect('lst');
                }
                $this->error('添加失败');
            }
            $this->error($validate->getError());
        }
        //获取栏目信息
        $cateData = getTree(db('cate'));
        $plUrl = url('lst');
        $this->assign(array(
            'cateData' => $cateData,
            'plName' => '文章管理',
            'plUrl' => $plUrl,
            'slName' => '添加文章',
        ));
        return $this->fetch();
    }

    public function edit() {
        $id = input('id');
        $artData = db('Article')->find($id);
        if(request()->isPost()) {
            $data = input('post.');
            $data['upTime'] = time();
            if(input('showTop') == 1){
                $data['showTop'] = input('showTop');
            }else{
                $data['showTop'] = 0;
            }
            if(input('showStatus') == 1){
                $data['showStatus'] = input('showStatus');
            }else{
                $data['showStatus'] = 0;
            }
            if(isset($_FILES['thumb']) && $_FILES['thumb']['error'] == 0) {
                $ret = uploadOne('thumb','artPic');
                if($ret['ok'] == 1) {
                    deleteImage($artData['thumb']);
                    $data['thumb'] = $ret['images']['0'];
                }else{
                    $this->error($ret['error']);
                }
            }
            $validate = Loader::validate('Article');
            if($validate->check($data)) {
                if(db('Article')->update($data) !== false) {
                    $this->redirect('lst');
                }
                $this->error('修改失败');
            }
            $this->error($validate->getError());
        }
        //获取栏目信息
        $cateData = getTree(db('cate'));
        $plUrl = url('lst');
        $this->assign(array(
            'artData' => $artData,
            'cateData' => $cateData,
            'plName' => '文章管理',
            'plUrl' => $plUrl,
            'slName' => '修改文章',
        ));
        return $this->fetch();
    }
    public function del() {
        $id = input('id');
        if(strpos($id,',') !== false) {
            $arr = explode(',',$id);
            //删除图片
            $pic = db('Article')->field('thumb')->where('id' ,'in',$arr)->select();
            foreach($pic as $k => $v) {
                deleteImage($v);
            }
            //删除数据
            db('Article')->delete($arr);
            $this->success('删除成功','admin/article/lst');
            return;
        }
        $artData = db('Article')->find($id);
        deleteImage($artData['thumb']);
        db('Article')->delete($id);
        $this->success('删除成功','admin/article/lst');
    }
    public function status(){
        $flag = input('value');
        $id = input('artId');
        $field = input('field');
        db('article')->where('id','eq',$id)->setField($field,$flag);
    }
}
