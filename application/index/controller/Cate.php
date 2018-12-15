<?php
namespace app\index\controller;
class Cate extends Base{
    public function index() {
        $cacheFlag = $this->config['cache'];//缓存是否开启
        $cacheTime = $this->config['cacheTime'];//缓存时间
        $cateId = input('cateId');
        if($cateId) {
            $cacheName = $cateId.'_childCates';
            $childCates = cache($cacheName );
            if(!$childCates) {
                //某个分类及其子分类下的文章
                $childCates = getChildren(db('cate'),$cateId);
                $childCates[] = $cateId;
                if($cacheFlag == '是') {
                    cache($cacheName, $childCates, $cacheTime);
                }
            }
            $arts = db('article')->where('cateId','in',$childCates)->select();
            if(empty($arts)) {
                abort(404);
            }
            $cateBread = bread(db('cate'),$cateId);
            $activeCate = $cateBread[0]['cateName'];
            $currCate = end($cateBread)['cateName'];
            $cateNum = count($cateBread);
            $this->assign(array(
                'title' => '',
                'cateNum' => $cateNum,
                'currCate' => $currCate,
                'cateBread' => $cateBread,
                'activeCate' => $activeCate,
            ));
        }else {
            $arts = db('article')->select();
            $this->assign(array(
                'title' => '所有文章',
                'activeCate' => '',
            ));
        }
        $helpCates = cache('helpCates');
        if(!$helpCates) {
            //帮助分类
            $helpCates = model('cate')->getHelpCates();
            if($cacheFlag == '是') {
                cache('helpCates', $helpCates, $cacheTime);
            }
        }
        $comCates = cache('comCates');
        if(!$comCates) {
            //普通分类
            $comCates = model('cate')->getComCates();
            if($cacheFlag == '是') {
                cache('comCates', $comCates, $cacheTime);
            }
        }
        $this->assign(array(
            'showRight' => 1200,
            'helpCates' => $helpCates,
            'comCates' => $comCates,
            'arts' => $arts,
        ));
        return $this->fetch();
    }
}
