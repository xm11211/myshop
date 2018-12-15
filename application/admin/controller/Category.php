<?php
namespace app\admin\controller;
use think\Loader;
use app\admin\model\Category as CategoryModel;
class Category extends Base {
    public function lst() {
        $sort = input('sort');
        $list = getTree(db('category'),'sort',$sort);
        $plUrl = url('lst');
        $this->assign(array(
            'list' => $list,
            'plName' => '商品分类',
            'plUrl' => $plUrl,
            'slName' => '查看',
        ));
        return $this->fetch();
    }
    public function add() {
        if(request()->isPost()) {
            $data = input('post.');
            if(isset($data['attrId'])) {
                $data['attrId'] = array_unique(array_filter($data['attrId']));
                $data['attrId'] = implode(',',$data['attrId']);
            }
            if(strpos($data['keywords'],'，') !== false) {
                $data['keywords'] = str_replace('，',',',$data['keywords']);
            }
            if(input('status') == 1){
                $data['status'] = input('status');
            }else{
                $data['status'] = 0;
            }
            if(isset($_FILES['cateImg']) && $_FILES['cateImg']['error'] == 0) {
                $ret = uploadOne('cateImg','goodsCatePic');
                if($ret['ok'] == 1) {
                    $data['cateImg'] = $ret['images']['0'];
                }else{
                    $this->error($ret['error']);
                }
            }
            $validate = Loader::validate('category');
            if($validate->check($data)) {
                $cateModel =  model('category');
                if($cateModel->save($data)) {
                    $this->redirect('lst');
                }
                $this->error('添加失败');
            }
           $this->error($validate->getError());
        }
        $plUrl = url('lst');
        $allCates = getTree(db('category'));
        $recpData = db('rec_pos')->where('recType','eq','2')->select();
        $typeData = db('type')->select();
        $this->assign(array(
            'allCates' => $allCates,
            'recpData' => $recpData,
            'typeData' => $typeData,
            'plName' => '商品分类',
            'plUrl' => $plUrl,
            'slName' => '添加分类',
        ));
        return $this->fetch();
    }

    //获取属性
    public function getAttr() {
        $id = input('typeId');
        $attrData = db('attr')->where(array(
            'typeId' => array('eq',$id),
            'attrType' => array('eq',1)
        ))->select();
        return json($attrData);
    }

    public function edit() {
        $id = input('id');
        $cateData = db('category')->find($id);
        if(request()->isPost()) {
            $data = input('post.');
            if(isset($data['attrId'])) {
                $data['attrId'] = array_unique(array_filter($data['attrId']));
                $data['attrId'] = implode(',',$data['attrId']);
            }else {
                $data['attrId'] = '';
            }
            if(strpos($data['keywords'],'，') !== false) {
                $data['keywords'] = str_replace('，',',',$data['keywords']);
            }
            if(input('status') == 1){
                $data['status'] = input('status');
            }else{
                $data['status'] = 0;
            }
            if(isset($_FILES['cateImg']) && $_FILES['cateImg']['error'] == 0) {
                $ret = uploadOne('cateImg','goodsCatePic');
                if($ret['ok'] == 1) {
                    deleteImage($cateData['cateImg']);
                    $data['cateImg'] = $ret['images']['0'];
                }else{
                    $this->error($ret['error']);
                }
            }
            $validate = Loader::validate('category');
            if($validate->check($data)) {
                $cateModel =  model('category');
                if($cateModel->isUpdate(true)->save($data) !== false) {
                    $this->redirect('lst');
                }
                $this->error('修改失败');
            }
            $this->error($validate->getError());
        }
        $plUrl = url('lst');
        $allCates = getTree(db('category'));
        $childCates = getChildren(db('category'),$id);
        $recpData = db('rec_pos')->where('recType','eq','2')->select();
        $recData = db('rec_item')->where('valId','eq',$id)->field('recposId')->select();
        $recArr = array();
        foreach($recData as $k => $v) {
            $recArr[]  = $v['recposId'];
        }
        $typeData = db('type')->select();
        $attrTypeArr = $this->createAttrType($cateData['attrId'],$id);
        $this->assign(array(
            'allCates' => $allCates,
            'childCates' => $childCates,
            'recpData' => $recpData,
            'recData' => $recArr,
            'typeData' => $typeData,
            'attrTypeArr' => $attrTypeArr,
            'cateData' => $cateData,
            'plName' => '商品分类',
            'plUrl' => $plUrl,
            'slName' => '修改分类'
        ));
        return $this->fetch();
    }

    //制作attrId和typeId对应的数组
    public function createAttrType($attrId,$id) {
        $arr = explode(',',$attrId);
        $attrTypeArr = [];
        $num = 0;
        foreach($arr as $k => $v) {
            $typeId = db('attr')->where('id',$v)->field('typeId')->find();
            //如果typeId不存在，则说明对应的属性数据已不存在，需要修改该条分类数据下的attrId集合字符串，此处删除$v
            if(!$typeId) {
               unset($arr[$k]);
               continue;
            }
            $attrs = db('attr')->where(array(
                'typeId' => array('eq',$typeId['typeId']),
                'attrType' => array('eq',1)
            ))->select();
            $attrTypeArr[$num]['typeId'] = $typeId['typeId'];
            $attrTypeArr[$num]['attrId'] = $v;
            $attrTypeArr[$num]['attrs'] = $attrs;
            $num ++;
        }
        //更新该条分类数据下的attrId集合字符串
        $str = implode(',',$arr);
        db('category')->where('id',$id)->setField('attrId',$str);

        return $attrTypeArr;
    }

    public function del() {
        $id = input('id');
        $childCates = getChildren(db('category'),$id);
        if($childCates) {
            $childCates = implode(',',$childCates);
            $this->error("请先删除分类ID为{$childCates}的数据！请不要越级删除！");
        }
        $cateImg = db('category')->find($id);
        deleteImage($cateImg['cateImg']);
        if(db('category')->delete($id) !== false ){
            //修改商品分类cateId为0
            db('goods')->where('cateId','eq',$id)->setField('cateId',0);
            //修改扩展分类catId为0
            db('goods_cat')->where('catId','eq',$id)->setField('catId',0);
            //删除商品推荐位
            db('rec_item')->where('valId','eq',$id)->delete();
            $this->success('删除成功！','admin/category/lst');
        }
        $this->error("分类删除失败！",'admin/category/lst');

    }
    public function sort() {
        $postData = input('post.');
        $sortArr = $postData['arrValue'];
        foreach($sortArr as $k => $v) {
            if($v == ''){
                continue;
            }
            if(is_numeric($v)){
                categoryModel::where(array('id' => array('eq',$k)))->setField('sort',$v);
            }else{
                echo $this->error("排序请输入数字！");
            }
        }
    }
    public function status(){
        $flag = input('value');
        $id = input('categoryId');
        $field = input('field');
        db('category')->where('id','eq',$id)->setField($field,$flag);
    }
}
