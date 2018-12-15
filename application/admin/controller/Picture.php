<?php
namespace app\admin\controller;
class Picture extends Base {
    public function lst() {
        $imageArr = $this->readAll(UEIMAGE,true,NOWPOS);

        $plUrl = url('lst');
        $this->assign(array(
            'imageArr' => $imageArr,
            'plName' => '图片管理',
            'plUrl' => $plUrl,
            'slName' => '查看',
        ));
        return $this->fetch();
    }
    public function readAll($dir,$isClear = true,$position) {
        $handle = @opendir($dir);
        static $arr = array();
        if($isClear) {
            $arr = array();
        }
        if($handle) {
            while(false !== ($line = readdir($handle))) {
                if($line == '.' || $line == '..') {
                    continue;
                }
                if(is_dir($dir.'/'.$line)) {
                    $this->readAll($dir.'/'.$line,false,$position);
                }else {
                    $line = str_replace($position,'',$dir.'/'.$line);
                    $arr[] = iconv('gbk','utf-8',$line);
                }
            }
        }else{
            echo '路径不存在！';
            return false;
        }
        closedir($handle);
        return $arr;
    }
    public function del() {
        $data = input('id');
        if(strpos($data,',') !== false) {
            $arr = explode(',',$data);
            foreach($arr as $v) {
                $pic = './' . $v;
                @unlink($pic);
            }
            $this->success('1');
            return;
        }
        $pic = './' . $data;
        @unlink($pic);
        $this->success('1');
    }
}
