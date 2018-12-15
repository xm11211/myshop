<?php
namespace app\admin\validate;
use think\Validate;
class User extends Validate
{
    protected $regex = ['mobile_phone' => '^1[3|4|5|7|8][0-9]{9}$'];
    protected $rule=[
        'userName' => 'max:60|require|unique:user',
        'password' => 'require',
        'mobile_phone' => 'regex:mobile_phone|unique:user',
        'email'=> 'email|unique:user',
        'points' => 'between:0,16777215'
    ];

    protected $message=[
        'userName.require' => '用户名不得为空！',
        'userName.unique' => '用户已被注册！',
        'userName.max' => '用户名不能大于60个字符！',
        'password.require' => '密码不得为空！',
        'email.email' => '邮箱格式有误！',
        'email.unique' => '该邮箱已被注册！',
        'mobile_phone.regex' => '手机号格式有误！',
        'mobile_phone.unique' => '手机号已被注册！',
        'points.between' => '积分不得大于16777215！',
    ];

    protected $scene = [
        'edit'  =>  [
            'userName' => 'max:60|require',
            'mobile_phone' => 'regex:mobile_phone',
            'email'=> 'email',
        ]
    ];

}
