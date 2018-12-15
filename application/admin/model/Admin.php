<?php
namespace app\admin\model;
use think\Model;
class Admin extends Model {
    protected $createTime = false;
    protected $updateTime = false;
    public function login($data) {
        $captcha = new \think\captcha\Captcha();
        if (!$captcha->check($data['code'])) {
            return 4;
        }
        $admin = Admin::get(['adminName' => $data['adminName']]);
        if($admin) {
            if($admin['password'] == sha1(md5($data['password'].$admin['randString']))) {
                session('adminName',$admin['adminName']);
                session('aid',$admin['id']);
                session('adminPic',$admin['pic']);
                session('isRoot',$admin['isRoot']);
                session('version',PHP_VERSION);//获取PHP服务器版本
                session('pc',$_SERVER['SERVER_NAME']);//当前主机名
                session('osname',php_uname());//获取系统类型及版本号
                session('port',$_SERVER['SERVER_PORT']);//获取服务器Web端口
                session('mysql_version',$this->_mysql_version());
                //session('apacheVer',apache_get_version());
                return 3;//信息正确
            }else {
                return 2;//密码错误
            }
        }else{
            return 1;//用户不存在
        }
    }
    private function _mysql_version()
    {
        $version = $this->query("select version() as ver");
        return $version[0]['ver'];
    }
}