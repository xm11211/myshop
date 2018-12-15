<?php
namespace app\admin\controller;
use think\Loader;
use extend\String;
class Goods extends Base {
    public function lst() {
        $goodsModel = Loader::model('goods');
        $list = $goodsModel->search(10);
        $plUrl = url('lst');
        $bdData = db('brand')->field('id,brandName')->select();
        $catData = getTree(db('category'),'sort');
        $this->assign(array(
            'bdData' => $bdData,
            'catData' => $catData,
            'list' => $list,
            'plName' => '商品列表',
            'plUrl' => $plUrl,
            'slName' => '查看',
        ));
        return $this->fetch();
    }
    public function add() {
        if(request()->isPost()) {
            $data = input('post.');
            $validate = Loader::validate('goods');
            if($validate->check($data)) {
                $goodsModel = Loader::model('goods');
                if($goodsModel->save($data)) {
                    $this->redirect('lst');
                }
                $this->error($goodsModel->getError());
            }
           $this->error($validate->getError());
        }
        $cateData = getTree(db('category'));
        $mlData = db('member_level')->select();
        $recpData = db('rec_pos')->where('recType','eq','1')->select();
        $plUrl = url('lst');
        $this->assign(array(
            'cateData' => $cateData,
            'mlData' => $mlData,
            'recpData' => $recpData,
            'plName' => '商品列表',
            'plUrl' => $plUrl,
            'slName' => '添加商品',
        ));
        return $this->fetch();
    }

    public function edit() {
        $id = input('id');
        $goodsData = db('goods')->find($id);
        if(request()->isPost()) {
            $data = input('post.');
            $validate = Loader::validate('goods');
            if($validate->check($data)) {
                $goodsModel = Loader::model('goods');
                if($goodsModel->isUpdate(true)->save($data) !== false) {
                    $this->redirect('lst');
                }
                $this->error($goodsModel->getError());
            }
            $this->error($validate->getError());
        }
        $cateData = getTree(db('category'));
        $mlData = db('member_level')->select();
        $mpData = db('member_price')->where('goodsId','eq',$id)->field('levelId,memPrice')->select();
        $ecData = db('goods_cat')->where('goodsId','eq',$id)->select();
        $recpData = db('rec_pos')->where('recType','eq','1')->select();
        $recData = db('rec_item')->where('valId','eq',$id)->field('recposId')->select();
        $recArr = array();
        foreach($recData as $k => $v) {
            $recArr[]  = $v['recposId'];
        }
        $gaData = db('attr')
            ->alias('a')
            ->field('a.id attrId,a.attrName,a.attrType,a.attrValues,b.attrVal,b.attrPrice,b.id')
            ->join('goods_attr b', 'a.id = b.attrId AND b.goodsId='.$id,'LEFT')
            ->where('typeId','eq',$goodsData['typeId'])
            ->order('attrId asc')
            ->select();
        $typeName = db('type')->field('typeName')->find($goodsData['typeId']);
        $arr = array();
        foreach($mpData as $k => $v) {
            $arr[$v['levelId']] = $v['memPrice'];
        }
        $plUrl = url('lst');
        $this->assign(array(
            'goodsData' => $goodsData,
            'cateData' => $cateData,
            'mlData' => $mlData,
            'mpData' => $arr,
            'ecData' => $ecData,
            'recpData' => $recpData,
            'recData' => $recArr,
            'gaData' => $gaData,
            'typeName' => $typeName['typeName'],
            'plName' => '商品列表',
            'plUrl' => $plUrl,
            'slName' => '修改商品',
        ));
        return $this->fetch();
    }
    public function del() {
        $id = input('id');
        $goodsModel = Loader::model('goods');
        if(strpos($id,',') !== false) {
            $arr = explode(',',$id);
            foreach($arr as $k => $v) {
                if($goodsModel::destroy($v) != false) {
                    continue;
                }else {
                    $this->error('商品删除失败！','admin/goods/lst');
                }
            }
            $this->success('删除成功','admin/goods/lst');
            return;
        }
        if($goodsModel::destroy($id) != false){
            $this->success('商品删除成功！','admin/goods/lst');
        }
        $this->error('商品删除失败！','admin/goods/lst');
    }
    public function photos() {
        $id = input('id');
        $gpModel = db('goods_photos');
        if($_FILES && $id) {
            $picConf = config('IMAGE_CONFIG');
            $ret = uploadOne('file','goodsPhotos',array(
                array($picConf['smPicWidth'],$picConf['smPicHeight']),
                array($picConf['mdPicWidth'],$picConf['mdPicHeight']),
                array($picConf['bigPicWidth'],$picConf['bigPicHeight']),
            ));
            if($ret['ok'] == 1) {
                Loader::import('String', EXTEND_PATH);
                $randString = String::randString(15);
                $gpModel->insert(array(
                    'goodsId' => $id,
                    'photo' => $ret['images'][0],
                    'smPhoto' => $ret['images'][1],
                    'mdPhoto' => $ret['images'][2],
                    'bigPhoto' => $ret['images'][3],
                    'randString' => $randString,
                ));
                $arr['imgPath'] = $ret['images'][0];
                $arr['randString'] = $randString;
                $arr['success'] = 1;
                echo json_encode($arr);
                return;
            }else{
                $arr['error'] = 1;
                $arr['errormessage'] = $ret['error'];
                echo json_encode($arr);
                return;
            }
        }
        $gpData = $gpModel->where(array(
            'goodsId' => array('eq',$id)
        ))->select();
        $plUrl = url('lst');
        $this->assign(array(
            'gpData' => $gpData,
            'id' => $id,
            'plName' => '商品列表',
            'plUrl' => $plUrl,
            'slName' => '商品相册',
        ));
        return $this->fetch();
    }
    public function delPhotos() {
        $randString = input('get.randString');
        $gpModel = db('goods_photos');
        $data = $gpModel
            ->field('photo,smPhoto,mdPhoto,bigPhoto')
            ->where(array(
                'randString' => array('eq',$randString)
            ))->find();
        deleteImage($data);
        $gpModel->where(array(
            'randString' => array('eq',$randString)
        ))->delete();
        echo 1;
    }
    public function getAttr() {
        $typeId = input('typeId');
        $data = db('attr')->where('typeId','eq',$typeId)->select();
        echo json_encode($data);
    }
    public function goodsNum() {
        $id = input('id');
        if(request()->isPost()) {
            $gaId = input('post.gaId/a');
            $num = input('post.num/a');
            //判断商品是否有单选属性
            if($gaId) {
                foreach($gaId as $k => $v) {
                    if($v == '') {
                        $this->error("请选择完整的属性再提交！",'admin/goods/goodsNum');
                    }
                }
                $count1 = count($gaId);
                $count2 = count($num);
                $avg = $count1 / $count2;
                $a = 0;
                $attrs = array();
                for($i = 0; $i < $count2; ++ $i) {
                    $ret = array();
                    for($j = 0; $j < $avg; ++ $j) {
                        $ret[] = $gaId[$a];
                        $a++;
                    }
                    sort($ret,SORT_NUMERIC);
                    $str = implode(',', $ret);
                    if(!in_array($str,$attrs)) {
                        $attrs[] = $str;
                    }else {
                        $this->error("属性重复！请重新选择！");
                    }
                }
            }else {
                $count1 = count($num);
                if($count1 > 1) {
                    $this->error("属性重复！请重新选择！");
                }
            }
            //删除原有库存
            db('goods_num')->where('goodsId','eq',$id)->delete();
            foreach($num as $k => $v) {
                if($v == '') {
                    $v = 0;
                }
                if(isset($attrs)) {
                    db('goods_num')->insert(array(
                        'goodsId' => $id,
                        'attrs' => $attrs[$k],
                        'num' => $v,
                    ));
                }else {
                    db('goods_num')->insert(array(
                        'goodsId' => $id,
                        'attrs' => '',
                        'num' => $v,
                    ));
                }

            }
        }
        $goodsModel = model('goods');
        $arr = $goodsModel->getGoodsAttr($id,1);
        $gnData = db('goods_num')->where('goodsId','eq',$id)->select();
        $plUrl = url('lst');
        $this->assign(array(
            'id' => $id,
            'gaData' => $arr,
            'gnData' => $gnData,
            'plName' => '商品列表',
            'plUrl' => $plUrl,
            'slName' => '商品库存',
        ));
        return $this->fetch();
    }
    public function status(){
        $flag = input('value');
        $id = input('goodsId');
        $field = input('field');
        db('goods')->where('id','eq',$id)->setField($field,$flag);
    }
}
