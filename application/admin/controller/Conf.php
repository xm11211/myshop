<?php
namespace app\admin\controller;
use think\Loader;
use app\admin\model\Conf as ConfModel;
class Conf extends Base {
    public function lst() {
        $sort = input('sort');
        if($sort) {
            session('mysort',$sort);
            $list = ConfModel::order("sort $sort")->paginate(10);
        }elseif(session('mysort')) {
            $mysort = session('mysort');
            $list = ConfModel::order("sort $mysort")->paginate(10);
        }else{
            session('mysort','desc');
            $list = ConfModel::order("sort desc")->paginate(10);
        }
        $plUrl = url('lst');
        $this->assign(array(
            'list' => $list,
            'plName' => '系统配置',
            'plUrl' => $plUrl,
            'slName' => '查看',
        ));
        return $this->fetch();
    }

    public function add() {
        if(request()->isPost()) {
            $data = input('post.');
            if(strpos($data['values'],'，') !== false) {
                $data['values'] = str_replace('，',',',$data['values']);
            }
            $validate = Loader::validate('Conf');
            if($validate->scene('add')->check($data)) {
                if(db('Conf')->insert($data)) {
                    $this->redirect('lst');
                }
                $this->error('添加失败');
            }
           $this->error($validate->getError());
        }
        $plUrl = url('lst');
        $this->assign(array(
            'plName' => '系统配置',
            'plUrl' => $plUrl,
            'slName' => '添加配置',
        ));
        return $this->fetch();
    }

    public function edit() {
        $id = input('id');
        $confData = db('Conf')->find($id);
        if(request()->isPost()) {
            $data = input('post.');
            if(strpos($data['values'],'，') !== false) {
                $data['values'] = str_replace('，',',',$data['values']);
            }
            $validate = Loader::validate('Conf');
            if($validate->scene('edit')->check($data)) {
                if(db('Conf')->update($data) !== false) {
                    $this->redirect('lst');
                }
                $this->error('修改失败');
            }
            $this->error($validate->getError());
        }
        $plUrl = url('lst');
        $this->assign(array(
            'confData' => $confData,
            'plName' => '系统配置',
            'plUrl' => $plUrl,
            'slName' => '修改配置',
        ));
        return $this->fetch();
    }
    public function del() {
        $id = input('id');
        $confData = db('conf')->find($id);
        if($confData['type'] == 6 && $confData['value'] != '' ) {
            deleteImage($confData['value']);
        }
        if(db('Conf')->delete($id) !== false ){
            $this->success('删除成功','admin/Conf/lst');
        }
        $this->error("配置删除失败",'admin/Conf/lst');

    }
    public function sort() {
        $postData = input('post.');
        $sortArr = $postData['arrValue'];
        foreach($sortArr as $k => $v) {
            if($v == ''){
                continue;
            }
            if(is_numeric($v)){
                ConfModel::where(array('id' => array('eq',$k)))->setField('sort',$v);
            }else{
                echo $this->error("排序请输入数字！");
            }
        }
    }
    public function conf(){
        if(request()->isPost()){
            $data=input('post.');
            $formarr=array();
            foreach ($data as $k => $v) {
                $formarr[] = $k;
            }
            $confarr = db('conf')->field('enName,type')->select();
            //判断没有提交上的表单值
            $checkboxarr=array();
            foreach ($confarr as $k => $v) {
                if(!in_array($v['enName'], $formarr)){
                    $checkboxarr[]=$v;
                }
            }
            if($checkboxarr){
                foreach ($checkboxarr as $k => $v) {
                    //若是图片类型，就不删除数据值，若是复选类型，则删除数据值
                    if($v['type'] == 6){
                        continue;
                    }
                    ConfModel::where('enName',$v['enName'])->update(['value' => '']);
                }
            }
            foreach($_FILES as $k => $v) {
                if($_FILES[$k]['name'] !='' && $_FILES[$k]['error'] == 0) {
                    $ret = uploadOne($k,'configPic');
                    if($ret['ok'] == 1) {
                        $picData = db('conf')->where('enName',$k)
                            ->field('value')->find();
                        if($picData['value'] != '') {
                            deleteImage($picData['value']);
                        }
                        ConfModel::where('enName',$k)->update(['value'=>$ret['images']['0']]);
                    }else{
                        $this->error($ret['error']);
                    }
                }
            }
            if($data) {
                foreach ($data as $k=>$v) {
                    if(is_array($v)) {
                        if(count($v) > 1) {
                           $v = implode(',',$v);
                        }else {
                            $v = $v[0];
                        }
                    }
                    ConfModel::where('enName',$k)->update(['value' => $v]);
                }
                $this->redirect('conf');
            }
            return;
        }
        $mysort = session('mysort');
        if($mysort) {
            $confData = ConfModel::order("sort $mysort")->select();
        }else{
            $confData = ConfModel::order("sort desc")->select();
        }
        $plUrl = url('lst');
        $this->assign(array(
            'confData' => $confData,
            'plName' => '系统配置',
            'plUrl' => $plUrl,
            'slName' => '配置',
        ));
        return view();
    }
    public function status(){
        $flag = input('value');
        $id = input('confId');
        $field = input('field');
        db('conf')->where('id','eq',$id)->setField($field,$flag);
    }
}
