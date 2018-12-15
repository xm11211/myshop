<?php
namespace app\index\controller;
class Article extends Base{
    public function index($artId) {
        $cacheFlag = $this->config['cache'];//缓存是否开启
        $cacheTime = $this->config['cacheTime'];//缓存时间
        $artName = $artId.'_artData';
        $artData = cache($artName);
        if(!$artData) {
            $artData = db('article')->find($artId);
            if(empty($artData)) {
                cache($artName,404,86400);
                abort(404);
                return;
            }
            if($cacheFlag == '是') {
                cache($artName, $artData,$cacheTime);
            }
        }
        if($artData == 404) {
            abort(404);
        }else {
            $cateId = $artData['cateId'];
            $cbName = $cateId.'_cateBread';
            $cateBread = cache($cbName);
            if(!$cateBread) {
                $cateBread = bread(db('cate'),$cateId);
                if($cacheFlag == '是') {
                    cache($cbName, $cateBread, $cacheTime);
                }
            }
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
            'artData' => $artData,
        ));
        return $this->fetch();
    }
}
