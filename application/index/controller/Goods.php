<?php
namespace app\index\controller;
use app\admin\model\Goods as GoodsModel;
class Goods extends Base{
    public function index() {
        $id = input('id');
        if($id) {
            $goodsData = db('goods')->find($id);
            $uid = session('uid');
            if($goodsData['status'] == 1 && isset($uid)) {
                $goodsModel = model('goods');
                $goodsData['memPrice'] = $goodsModel->getMemberPrice($goodsData['id']);
            }
            $goodsAdminModel = new GoodsModel();
            $radioAttr = $goodsAdminModel->getGoodsAttr($id,1);      //单选属性
            $uniqueAttr = $goodsAdminModel->getGoodsAttr($id,2);     //唯一属性
            $photoData = db('goods_photos')->field('photo,smPhoto,mdPhoto,bigPhoto')->where('goodsId','eq',$id)->select();
            $primaryPhoto['photo'] = $goodsData['pic'];
            $primaryPhoto['smPhoto'] = $goodsData['smPic'];
            $primaryPhoto['mdPhoto'] = $goodsData['mdPic'];
            $primaryPhoto['bigPhoto'] = $goodsData['bigPic'];
            array_unshift($photoData,$primaryPhoto);
            if($goodsData) {
                $this->assign(array(
                    'showRight' => 1200,
                    'goodsData' => $goodsData,
                    'photoData' => $photoData,
                    'radioAttr' => $radioAttr,
                    'uniqueAttr' => $uniqueAttr
                ));
            return $this->fetch();
            }else {
                return view('common/tip_info',['errorMsg' => '商品不存在！','showRight' => 1200]);
            }
        }else {
            return view('common/tip_info',['errorMsg' => '页面不存在！','showRight' => 1200]);
        }
    }
}
