<?php
namespace app\index\controller;
use think\Controller;
class Brand extends Controller {
    public function lst() {
        $brands = db('brand')->order('id desc')->paginate(17);
        $arr['totalPage'] = $brands->lastPage();
        $brands = $brands->items();
        $str = "<ul>";
        foreach($brands as $k => $v) {
            $pic = showImage($v['pic'],'','','',true);
            $str .= '<li>
                         <div class="brand-img"><a href="/brand/'.$v['id'].'" target="_blank">'.$pic.'</a></div>
                     </li>';
        }
        $str .= '</ul> <a href="javascript:void(0);" ectype="changeBrand" class="refresh-btn"><i class="iconfont icon-rotate-alt"></i><span>换一批</span></a>';
        $arr['content'] = $str;
        return $arr;
    }
}