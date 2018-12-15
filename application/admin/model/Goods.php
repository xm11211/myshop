<?php
namespace app\admin\model;
use think\Model;
class Goods extends Model {
    protected $auto = ['goodsName','marketPrice','shopPrice','weight','unit','brandId','cateId','typeId','desc','onSale','status','time'];
    protected $createTime = 'time';
    protected $updateTime = false;
    protected static function init() {
        self::beforeInsert(function ($goods) {
            $data = $goods->data;
            if(!isset($data['status'])) {
                $data['status'] = 0;
            }
            unset($data['mp']);             //会员价
            unset($data['extCat']);         //扩展分类
            unset($data['attrVal']);        //商品属性
            unset($data['attrPrice']);      //商品属性价格
            unset($data['recpId']);         //推荐位Id
            $data['num'] = uniqid();
            if(!isset($data['onSale'])) {
                $data['onSale'] = 0;
            }
            if($data['typeId'] == null) {
                $data['typeId'] = 0;
            }
            if(isset($_FILES['pic']) && $_FILES['pic']['error'] == 0) {
                $picConf = config('IMAGE_CONFIG');
                $ret = uploadOne('pic','goodsPic',array(
                    array($picConf['smPicWidth'],$picConf['smPicHeight']),
                    array($picConf['mdPicWidth'],$picConf['mdPicHeight']),
                    array($picConf['bigPicWidth'],$picConf['bigPicHeight']),
                ));
                if($ret['ok'] == 1) {
                    $data['pic'] = $ret['images']['0'];
                    $data['smPic'] = $ret['images']['1'];
                    $data['mdPic'] = $ret['images']['2'];
                    $data['bigPic'] = $ret['images']['3'];
                }else{
                    $goods->error = $ret['error'];
                    return false;
                }
            }
            $goods->data = $data;
        });
        self::afterInsert(function ($goods) {
            //获取新增商品id,销售价格,折扣启用状态
            $id = $goods->data['id'];
            $shopPrice = $goods->data['shopPrice'];
            $status = $goods->data['status'];
            //判断是否启用会员折扣
            if($status) {
                //获取会员折扣率
                $rates = db('member_level')->field('id,rate')->select();
                $ratArr = array();
                foreach ($rates as $k => $v) {
                    $ratArr[$v['id']] = $v['rate'];
                }
                $mpArr = input('mp/a');
                foreach ($mpArr as $k => $v) {
                    if ($v == '') {
                        $v = $shopPrice * ($ratArr[$k] / 100);
                        if(!db('member_price')->insert(array(
                            'levelId' => $k,
                            'goodsId' => $id,
                            'memPrice' => $v
                        ))) {
                            $goods->error = '添加会员价格失败！';
                            return false;
                        };
                    } else {
                        if(!db('member_price')->insert(array(
                            'levelId' => $k,
                            'goodsId' => $id,
                            'memPrice' => $v
                        ))) {
                            $goods->error = '添加会员价格失败！';
                            return false;
                        };
                    }
                }
            }
            //扩展分类
            $extCatArr = input('extCat/a');
            if($extCatArr) {
                $extCatArr = array_unique($extCatArr);
                foreach($extCatArr as $k => $v) {
                    if($v != 0) {
                        if(!db('goods_cat')->insert(array(
                            'goodsId' => $id,
                            'catId' => $v
                        ))) {
                            $goods->error = '添加扩展分类失败！';
                            return false;
                        };
                    }
                }
            }
            //增加推荐位
            $recpId = input('recpId/a');
            if($recpId != null) {
                foreach($recpId as $k => $v) {
                    if(!db('rec_item')->insert(array(
                        'recposId' => $v,
                        'valId' => $id,
                        'valType' => 1,
                    ))) {
                        $goods->error = '添加推荐位失败！';
                        return false;
                    }
                }
            }
            //商品属性
            if($goods->data['typeId'] != '') {
                $attrValArr = input('attrVal/a');
                $attrPrice = input('attrPrice/a');
                $gaModel = db('goods_attr');
                //先过滤一遍，看提交的属性集合是否为空
                foreach($attrValArr as $k => $v) {
                    $arr6 = array_filter($v);
                    if(empty($arr6)) {
                        continue;
                    }
                    $arr7[] = $arr6;
                }
                static $arr8 = array();
                if(!empty($arr7)) {
                    foreach($attrValArr as $k => $v) {
                        foreach($v as $k1 => $v1) {
                            if(!in_array($v1,$arr8)) {
                                if($v1 == '0') {
                                    continue;
                                }
                                if(isset($attrPrice[$k])) {
                                    if(!$gaModel->insert(array(
                                        'goodsId' => $id,
                                        'attrId' => $k,
                                        'attrVal' => $v1,
                                        'attrPrice' => $attrPrice[$k][$k1]
                                    ))) {
                                        $goods->error = '添加商品属性失败！';
                                        return false;
                                    };
                                }else {
                                    if(!$gaModel->insert(array(
                                        'goodsId' => $id,
                                        'attrId' => $k,
                                        'attrVal' => $v1,
                                        'attrPrice' => 0,
                                    ))) {
                                        $goods->error = '添加商品属性失败！';
                                        return false;
                                    };
                                }
                                $arr8[] = $v1;
                            }
                        }
                        $arr8 = array();
                    }
                }
            }
        });
        self::beforeUpdate(function ($goods) {
            $data = $goods->data;
            if(!isset($data['status'])) {
                $data['status'] = 0;
            }
            if(!isset($data['typeId'])) {
                unset($data['typeId']);         //商品类型
            }
            unset($data['mp']);             //会员价
            unset($data['extCat']);         //扩展分类
            unset($data['attrVal']);        //商品属性
            unset($data['gaId']);           //商品属性Id
            unset($data['attrPrice']);           //商品属性价格
            unset($data['recpId']);         //推荐位Id
            //获取新增商品id,销售价格,折扣启用状态
            $id = $goods->data['id'];
            $shopPrice = $goods->data['shopPrice'];
            $status = $goods->data['status'];
            //判断是否启用会员折扣
            if($status) {
                //获取会员折扣率
                $rates = db('member_level')->field('id,rate')->select();
                $ratArr = array();
                foreach($rates as $k => $v) {
                    $ratArr[$v['id']] = $v['rate'];
                }
                $mpArr = input('mp/a');
                //判断有无会员价，有会员价就更新，无会员价就新增
                $num = db('member_price')->where('goodsId','eq',$id)->count();
                if($num > 0) {
                    foreach($mpArr as $k => $v) {
                        if($v == '') {
                            $v = $shopPrice * ($ratArr[$k] / 100);
                            if(db('member_price')
                                    ->where(array('levelId' => array('eq',$k),'goodsId' => array('eq',$id)))
                                    ->update(array(
                                        'memPrice' => $v
                                    )) === false) {
                                $goods->error = '修改会员价格失败！';
                                return false;
                            };
                        }else {
                            if(db('member_price')
                                    ->where(array('levelId' => array('eq',$k),'goodsId' => array('eq',$id)))
                                    ->update(array(
                                        'memPrice' => $v
                                    )) === false) {
                                $goods->error = '修改会员价格失败！';
                                return false;
                            };
                        }
                    }
                }else {
                    foreach($mpArr as $k => $v) {
                        if($v == '') {
                            $v = $shopPrice * ($ratArr[$k] / 100);
                            if(!db('member_price')->insert(array(
                                'levelId' => $k,
                                'goodsId' => $id,
                                'memPrice' => $v
                            ))) {
                                $goods->error = '添加会员价格失败！';
                                return false;
                            };
                        }else {
                            if(!db('member_price')->insert(array(
                                'levelId' => $k,
                                'goodsId' => $id,
                                'memPrice' => $v
                            ))) {
                                $goods->error = '添加会员价格失败！';
                                return false;
                            };
                        }
                    }
                }
            }else {
                //删除原有会员价格
                if(db('member_price')->where('goodsId','eq',$id)->delete() === false) {
                    $goods->error = '会员价格删除失败！';
                    return false;
                }
            }
            //扩展分类
            //删除原有扩展分类
            if(db('goods_cat')->where('goodsId','eq',$id)->delete() === false) {
                $goods->error = '扩展分类删除失败！';
                return false;
            }
            $extCatArr = input('extCat/a');
            if($extCatArr) {
                $extCatArr = array_unique($extCatArr);
                foreach($extCatArr as $k => $v) {
                    if($v != 0) {
                        if(!db('goods_cat')->insert(array(
                            'goodsId' => $id,
                            'catId' => $v
                        ))) {
                            $goods->error = '修改扩展分类失败！';
                            return false;
                        };
                    }
                }
            }
            //处理推荐位
            if(db('rec_item')->where('valId','eq',$id)->delete() === false) {
                $goods->error = '推荐位删除失败！';
                return false;
            }
            $recpId = input('recpId/a');
            if($recpId != null) {
                foreach($recpId as $k => $v) {
                    if(!db('rec_item')->insert(array(
                        'recposId' => $v,
                        'valId' => $id,
                        'valType' => 1,
                    ))) {
                        $goods->error = '修改推荐位失败！';
                        return false;
                    }
                }
            }
            //处理商品属性
            if(isset($goods->data['typeId'])) {
                if($goods->data['typeId'] != '') {
                    $attrPrice = input('attrPrice/a');
                    if(db('goods_num')->where('goodsId','eq',$id)->delete() === false) {
                        $goods->error = '删除商品库存失败！';
                        return false;
                    }
                    $attrValArr = input('attrVal/a');
                    $gaModel = db('goods_attr');
                    foreach($attrValArr as $k => $v) {
                        $arr6 = array_filter($v);
                        if(empty($arr6)) {
                            continue;
                        }
                        $arr7[] = $arr6;
                    }
                    static $arr8 = array();
                    if(!empty($arr7)) {
                        foreach($attrValArr as $k => $v) {
                            foreach($v as $k1 => $v1) {
                                if(!in_array($v1,$arr8)) {
                                    if($v1 == '0') {
                                        continue;
                                    }
                                    if(isset($attrPrice[$k])) {
                                        if(!$gaModel->insert(array(
                                            'goodsId' => $id,
                                            'attrId' => $k,
                                            'attrVal' => $v1,
                                            'attrPrice' => $attrPrice[$k][$k1]
                                        ))) {
                                            $goods->error = '添加商品属性失败！';
                                            return false;
                                        };
                                    }else {
                                        if(!$gaModel->insert(array(
                                            'goodsId' => $id,
                                            'attrId' => $k,
                                            'attrVal' => $v1,
                                            'attrPrice' => 0,
                                        ))) {
                                            $goods->error = '添加商品属性失败！';
                                            return false;
                                        };
                                    }
                                    $arr8[] = $v1;
                                }
                            }
                            $arr8 = array();
                        }
                    }
                }
            }else {
                $gaId = input('gaId/a');
                $attrValArr = input('attrVal/a');
                $attrPrice = input('attrPrice/a');
                $gaModel = db('goods_attr');
                //获取原有商品属性的所有id
                $oldIds = $gaModel->where('goodsId','eq',$id)->field('id')->select();
                $ret1 = array();
                foreach($oldIds as $k => $v) {
                    $ret1[] = $v['id'];
                }
                $ret2 = array();
                foreach($gaId as $k => $v) {
                    if($v != '') {
                        $ret2[] = $v;
                    }
                }
                //获取将要删除商品属性id并删除属性
                $old = array_diff($ret1,$ret2);
                if($old) {
                    if($gaModel->delete($old) === false) {
                        $goods->error = '商品属性删除失败！';
                        return false;
                    };
                }
                //制作数组
                foreach($attrValArr as $k => $v) {
                    foreach($v as $k1 => $v1) {
                        $arr1[] = $v1;
                    }
                }
                foreach($attrPrice as $k => $v) {
                    foreach($v as $k1 => $v1) {
                        $arr9[] = $v1;
                    }
                }
                $arr6 = array_filter($gaId);
                if(!empty($arr6)) {
                    foreach($gaId as $k => $v) {
                        //$v代表旧属性的id
                        //判断$v是否为空字符串，只要$v为空，就表明这条属性数据是新增的数据，暂不处理
                        if($v != '') {
                            //判断属性是可选还是唯一，过滤掉唯一属性
                            $attrType = db('goods_attr')
                                ->alias('a')
                                ->field('b.attrType')
                                ->join('attr b','a.attrId = b.id','LEFT')
                                ->where('a.id','eq',$v)
                                ->find();
                            if($attrType['attrType'] == 1) {
                                $arr2[$v] = $arr1[$k]; //新提交的旧的单选属性id和属性组成的一维数组
                                $arr10[$v] = $arr9[$k]; //新提交的旧的单选属性id和属性价格组成的一维数组
                            }
                        }
                    }
                    //统计新提交的旧的单选属性id和属性组成的一维数组的长度（去重后的长度）
                    $attrNum1 = count(array_unique($arr2));
                    //再次获取数据库中的属性相关数据
                    $oldAttrVals = $gaModel->where(array('goodsId' => array('eq',$id)))
                        ->field('id,attrId,attrVal')->select();
                    //过滤掉数据库中唯一属性
                    foreach($oldAttrVals as $k => $v) {
                        $attrType = db('goods_attr')
                            ->alias('a')
                            ->field('b.attrType')
                            ->join('attr b','a.attrId = b.id','LEFT')
                            ->where('a.id','eq',$v['id'])
                            ->find();
                        if($attrType['attrType'] == 1) {
                            $arr3[$v['id']] = $v['attrVal']; //数据库中原有的旧的单选属性id和属性组成的一维数组
                        }
                    }
                    //统计数据库中原有的旧的单选属性id和属性组成的一维数组的长度
                    $attrNum2 = count($arr3);
                    //判断新提交的旧属性是否有重复
                    if($attrNum1 < $attrNum2) {
                        $goods->error = '属性重复！';
                        return false;
                    }
                    //更新提交的旧属性
                    foreach($arr2 as $k => $v) {
                        if($v == '0') {
                            if($gaModel->delete($k) === false) {
                                $goods->error = '商品属性删除失败！';
                                return false;
                            };
                        }
                        if($gaModel->update(array(
                            'id' => $k,
                            'attrVal' => $v,
                            'attrPrice' => $arr10[$k],
                        )) === false) {
                            $goods->error = '商品属性修改失败！';
                            return false;
                        };
                    }
                }
                //新增属性
                $a = 0;
                foreach($attrValArr as $k => $v) {
                    $arr4 = array();
                    $oldAttrVals = $gaModel->where(array('attrId' => array('eq',$k),'goodsId' => array('eq',$id)))
                        ->field('attrVal')->select();
                    foreach($oldAttrVals as $k2 => $v2) {
                        $arr4[] = $v2['attrVal'];
                    }
                    foreach($v as $k3 => $v3) {
                        if($gaId[$a] == '') {
                            if(!in_array($v3,$arr4)) {
                                if($v3 == '0') {
                                    $a++;
                                    continue;
                                }else {
                                    if(!$gaModel->insert(array(
                                        'attrId' => $k,
                                        'attrVal' => $v3,
                                        'goodsId' => $id,
                                        'attrPrice' => $arr9[$a],
                                    ))) {
                                        $goods->error = '添加商品属性失败！';
                                        return false;
                                    };
                                    $arr4[] = $v3;
                                }
                            }
                        }
                        $a++;
                    }
                }
            }
            //判断商品库存是否失效
            $attrsArr = db('goods_num')->where('goodsId','eq',$id)->field('attrs')->select();
            $strArr = array();
            foreach($attrsArr as $k => $v) {
                $strArr[]  = $v['attrs'];
            }
            foreach($strArr as $k => $v) {
                $v = explode(',',$v);
                foreach($v as $k1 => $v1) {
                    $num = db('goods_attr')->where('id','eq',$v1)->count();
                    if($num == 0) {
                        $vv = implode(',',$v);
                        db('goods_num')->where('attrs','eq',$vv)->delete();
                    }
                }
            }
            if(!isset($data['onSale'])) {
                $data['onSale'] = 0;
            }
            if(isset($_FILES['pic']) && $_FILES['pic']['error'] == 0) {
                $picConf = config('IMAGE_CONFIG');
                $ret = uploadOne('pic','goodsPic',array(
                    array($picConf['smPicWidth'],$picConf['smPicHeight']),
                    array($picConf['mdPicWidth'],$picConf['mdPicHeight']),
                    array($picConf['bigPicWidth'],$picConf['bigPicHeight']),
                ));
                if($ret['ok'] == 1) {
                    //删除商品图片
                    $picArr = $goods->field('pic,smPic,mdPic,bigPic')->find($data['id'])->data;
                    deleteImage($picArr);
                    $data['pic'] = $ret['images']['0'];
                    $data['smPic'] = $ret['images']['1'];
                    $data['mdPic'] = $ret['images']['2'];
                    $data['bigPic'] = $ret['images']['3'];
                }else{
                    $goods->error = $ret['error'];
                    return false;
                }
            }
            $goods->data = $data;
        });
        self::beforeDelete(function ($goods) {
            $id = $goods->data['id'];
            //删除商品图片
            $picArr = $goods->field('pic,smPic,mdPic,bigPic')->find($id)->data;
            deleteImage($picArr);
            //删除相册图片
            $photoArr = db("goods_photos")->where('goodsId','eq',$id)->field('photo,smPhoto,mdPhoto,bigPhoto,randString')->select();
            foreach($photoArr as $k => $v) {
                deleteImage($v);
            }
            //删除会员价
            if(db("member_price")->where('goodsId','eq',$id)->delete() === false) {
                return false;
            }
            //删除扩展分类
            if(db("goods_cat")->where('goodsId','eq',$id)->delete() === false) {
                return false;
            }
            //删除商品相册
            if(db("goods_photos")->where('goodsId','eq',$id)->delete() === false) {
                return false;
            }
            //删除商品属性
            if(db("goods_attr")->where('goodsId','eq',$id)->delete() === false) {
                return false;
            }
            //删除商品库存
            if(db('goods_num')->where('goodsId','eq',$id)->delete() === false) {
                return false;
            }
            //删除商品推荐位
            if(db('rec_item')->where('valId','eq',$id)->delete() === false) {
                return false;
            }
        });
    }
    public function getIds($catId) {
        //根据主分类ID获取子类ID集合并把自己添加进去
        $subIds = getChildren(db('category'),$catId);
        $subIds[] = $catId;
        /************取出主分类和扩展分类在这些分类中的商品**************/
        //根据主分类ID获取商品ID集合(二维数组)
        $gIds1 = $this->field('DISTINCT id')->where(array(
//            'cateId' => $catId,
            'cateId' => array('in',$subIds),
        ))->select();
        //取出扩展分类下的商品ID集合(二维数组)
        $gcModel = db('goods_cat');
        $gIds2 = $gcModel->field('DISTINCT goodsId id')->where(array(
            'catId' => array('in',$subIds),
        ))->select();
        $gIds = null;
        if($gIds1 && $gIds2) {
            $gIds = array_merge($gIds1,$gIds2);//如果根据主分类ID获取的商品ID存在的情况下
        }else if($gIds1) {
            $gIds = $gIds1; //只有主分类ID获取的商品
        }else if($gIds2) {
            $gIds = $gIds2; //只有扩展分类分类ID获取的商品
        }
        //二维转一维
        $ids = array();
        if($gIds) {
            foreach($gIds as $k => $v) {
                if(!in_array($v['id'],$ids)) {
                    $ids[] = $v['id'];
                }
            }
        }
        if(empty($ids)) {
            return false;
        }
        return $ids;
    }
    /*
     * 分页数据
     * @access public
     * @param  int $pagesize 每页显示条数
     */
    public function search($pagesize = 10) {
        $where = array();
        //商品品牌
        $bd = input('get.brandId');
        if($bd) {
            $where['a.brandId'] = array('eq',$bd);
        }
        //商品分类
        $cd = input('get.catId');
        if($cd) {
            $gids = $this->getIds($cd);
            $where['a.id'] = array('in',$gids);
        }
        //商品名称
        $cd = input('get.goodsName');
        if($cd) {
            $where['a.goodsName'] = array('like',"%{$cd}%");
        }
        //商品价格
        $fp = input('get.fp');
        $tp = input('get.tp');
        if($fp && $tp) {
            $where['a.shopPrice'] = array('between',array($fp,$tp));
        }else if($fp) {
            $where['a.shopPrice'] = array('egt',$fp);
        }else if($tp){
            $where['a.shopPrice'] = array('elt',$tp);
        }
        //添加时间
        $ft = input('get.ft');
        $tt = input('get.tt');
        if($ft && $tt) {
            $ft = strtotime($ft);
            $tt = strtotime($tt);
            $where['a.time'] = array('between',array($ft,$tt));
        }else if($ft) {
            $ft = strtotime($ft);
            $where['a.time'] = array('egt',$ft);
        }else if($tt){
            $tt = strtotime($tt);
            $where['a.time'] = array('elt',$tt);
        }
        //是否上架
        $os = input('get.os');
        if($os == 1) {
            $where['a.onSale'] = array('eq',1);
        }else if($os == 2) {
            $where['a.onSale'] = array('eq',0);
        }
        //排序方式
        $orderby = 'a.id';
        $orderway = 'desc';
        $odby = input('get.odby');
        if($odby) {
            if($odby == 'ia') {
                $orderway = 'asc';
            }else if($odby == 'pd') {
                $orderby = 'a.shopPrice';
            }else if($odby == 'pa') {
                $orderby ='a.shopPrice';
                $orderway = 'asc';
            }
        }
        $list = $this
            ->alias('a')
//            ->field('a.*,b.brandName,c.cateName,f.typeName,GROUP_CONCAT(DISTINCT e.cateName SEPARATOR "<br>") extCates,FLOOR(SUM(g.num)/COUNT(e.cateName)) goodsNum')
            ->field('a.*,b.brandName,c.cateName,f.typeName,GROUP_CONCAT(DISTINCT e.cateName SEPARATOR "<br>") extCates,SUM(g.num) goodsNum')
            ->join('brand b','a.brandId = b.id','LEFT')
            ->join('category c','a.cateId = c.id','LEFT')
            ->join('goods_cat d','a.id = d.goodsId','LEFT')
            ->join('category e','d.catId = e.id','LEFT')
            ->join('type f','a.typeId = f.id','LEFT')
            ->join('goods_num g','a.id = g.goodsId','LEFT')
            ->where($where)
            ->group('a.id')
            ->order("$orderby $orderway")
            ->paginate($pagesize,false,
            ['query' => array('brandId' => $bd,'catId' => $cd,'goodsName' => $cd,'fp' => $fp,'tp' => $tp,'os' => $os,'odby' => $odby,'ft' => $ft,'tt' => $tt)]);
        return $list;
    }
    /*****************************************************前后台公用方法**************************************************/
    /*
     * @param $id int 商品id
     * @param $attrType int 属性类型（单选和唯一）
     * @param $in string 购物车中商品所挑选的属性
     */
    public function getGoodsAttr($id,$attrType) {
        $gaData = db('goods_attr')
            ->alias('a')
            ->field('a.*,b.attrName')
            ->join('attr b','a.attrId = b.id','LEFT')
            ->where(array(
                'a.goodsId' => array('eq',$id),
                'b.attrType' => array('eq',$attrType),
            ))->select();
        if($attrType == 2) {
            return $gaData;
        }
        //二维转三维
        $arr = array();
        foreach($gaData as $k => $v) {
            $arr[$v['attrName']][] = $v;
        }
        return $arr;
    }
}