<?php
namespace app\admin\validate;
use think\Validate;
class Admin extends Validate {
//验证规则
    protected $rule = [
        'adminName'  => 'require|max:30|unique:admin',
        'password' => 'require|max:40',
        'id' => 'number'
    ];
//错误信息
    protected $message  =   [
        'adminName.require' => '管理员名称必须填写',
        'adminName.max'     => '管理员名称长度不得大于30位',
        'password.require' => '密码必须填写',
        'password.max'     => '密码长度不得大于40位',
        'id.number' => '管理员ID必须是数字，请不要擅自修改ID值'
    ];
//验证场景
    protected $scene = [
        'add'  =>  ['adminName','password'],
        'edit'  =>  ['adminName','password' => 'max:40','id'],
    ];
}