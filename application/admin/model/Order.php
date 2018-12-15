<?php
namespace app\admin\model;
use think\Model;
class Order extends Model {
    /*
    * 分页数据
    * @access public
    * @param  int $pagesize 每页显示条数
    * @param  array $query  phpexcel导出时要用到的查询数据
    */
    public function search($pagesize = 10,$query = null) {
        $where = array();
        //支付状态
        $ps = !empty($query) ? $query['ps'] : input('get.ps');
        if($ps == 1) {
            $where['a.payStatus'] = array('eq',0);
        }else if($ps == 2) {
            $where['a.payStatus'] = array('eq',1);
        }
        //收发状态
        $dg = !empty($query) ? $query['dg'] : input('get.dg');
        if($dg == 1) {
            $where['a.postStatus'] = array('eq',0);
        }else if($dg == 2) {
            $where['a.postStatus'] = array('eq',1);
        }else if($dg == 3) {
            $where['a.postStatus'] = array('eq',2);
        }
        //订单号
        $outTradeNo = !empty($query) ? $query['outTradeNo'] : input('get.outTradeNo');
        if($outTradeNo) {
            $where['a.outTradeNo'] = array('eq',$outTradeNo);
        }
        //用户名或用户id
        $user = !empty($query) ? $query['user'] : input('get.user');
        if($user) {
            $where['a.userId|b.userName'] = array('eq',$user);
        }
        if(!empty($query)) {
            $list = db('order')
                ->alias('a')
                ->field('a.*,b.userName')
                ->join('user b','a.userId = b.id','LEFT')
                ->where($where)
                ->select();
        }else {
            $list = $this
                ->alias('a')
                ->field('a.*,b.userName')
                ->join('user b','a.userId = b.id','LEFT')
                ->where($where)
                ->paginate($pagesize,false,
                    ['query' => ['outTradeNo' => $outTradeNo,'user' => $user,'ps' => $ps,'dg' => $dg]]);
        }
        return $list;
    }
}