<?php
namespace app\admin\controller;
use think\Loader;
use app\admin\model\Cate as cateModel;
class Cate extends Base {
    public function lst() {
        $sort = input('sort');
        $list = getTree(db('cate'),'sort',$sort);
        $plUrl = url('lst');
        $this->assign(array(
            'list' => $list,
            'plName' => '栏目管理',
            'plUrl' => $plUrl,
            'slName' => '查看',
        ));
        return $this->fetch();
    }
    public function add() {
        if(request()->isPost()) {
            $data = input('post.');
            if(input('showNav') == 1){
                $data['showNav'] = input('showNav');
            }else{
                $data['showNav'] = 0;
            }
            if(input('type') == 3) {
                $data['pid'] = 4;
                $data['allowSon'] = 0;
            }
            if(input('pid') == 4) {
                $data['type'] = 3;
                $data['allowSon'] = 0;
            }
            $validate = Loader::validate('Cate');
            if($validate->check($data)) {
                if(db('Cate')->insert($data)) {
                    $this->redirect('lst');
                }
                $this->error('添加失败');
            }
           $this->error($validate->getError());
        }
        //获取所有栏目
        $allCates = getTree(db('cate'));
        $plUrl = url('lst');
        $this->assign(array(
            'allCates' => $allCates,
            'plName' => '栏目管理',
            'plUrl' => $plUrl,
            'slName' => '添加栏目',
        ));
        return $this->fetch();
    }

    public function edit() {
        $id = input('id');
        $cateData = db('Cate')->find($id);
        if(request()->isPost()) {
            $data = input('post.');
            if(input('showNav') == 1){
                $data['showNav'] = input('showNav');
            }else{
                $data['showNav'] = 0;
            }
            $validate = Loader::validate('Cate');
            if($validate->scene('edit')->check($data)) {
                if(db('Cate')->update($data) !== false) {
                    $this->redirect('lst');
                }
                $this->error('修改失败');
            }
            $this->error($validate->getError());
        }
        $plUrl = url('lst');
        //获取所有栏目
        $allCates = getTree(db('cate'));
        $childCates = getChildren(db('cate'),$id);
        $this->assign(array(
            'cateData' => $cateData,
            'childCates' => $childCates,
            'allCates' => $allCates,
            'plName' => '栏目管理',
            'plUrl' => $plUrl,
            'slName' => '修改栏目',
        ));
        return $this->fetch();
    }
    public function del() {
        $id = input('id');
        $arr = [5,8,4];
        if(in_array($id,$arr)) {
            $this->error("该栏目不得删除！");
        }
        $childCates = getChildren(db('cate'),$id);
        if($childCates) {
            $childCates = implode(',',$childCates);
            $this->error("请先删除栏目ID为{$childCates}的数据！请不要越级删除！");
        }
        //该栏目下的文章
        db('article')->where('cateId',$id)->setField('cateId',0);
        if(db('Cate')->delete($id) !== false ){
            $this->success('删除成功！','admin/Cate/lst');
        }
        $this->error("栏目删除失败！",'admin/Cate/lst');

    }
    public function sort() {
        $postData = input('post.');
        $sortArr = $postData['arrValue'];
        foreach($sortArr as $k => $v) {
            if($v == ''){
                continue;
            }
            if(is_numeric($v)){
                cateModel::where(array('id' => array('eq',$k)))->setField('sort',$v);
            }else{
                echo $this->error("排序请输入数字！");
            }
        }
    }
    public function status(){
        $flag = input('value');
        $id = input('cateId');
        if($flag == 0) {
            db('cate')->where('id','eq',$id)->setField('showNav',0);
        }elseif($flag == 1) {
            db('cate')->where('id','eq',$id)->setField('showNav',1);
        }else{
            $this->error('状态修改出错，请联系管理员！');
        }
    }
    public function search() {
        $cateId = input('post.cateId');
        $articleModel = db('article');
        $artData = $articleModel->where('cateId','eq',$cateId)->field('id,title,time')->select();
        $arr = [];
        foreach($artData as $k => $v) {
            $v['time'] = realDate($v['time']);
            $arr[] = $v;
        }
        echo json_encode($arr);
    }
}
