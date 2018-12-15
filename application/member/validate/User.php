<?php
namespace app\member\validate;
use think\Validate;
class User extends Validate
{
    protected $regex = [ 'send_code' => '^\d{6}$','mobile_code' => '^\d{6}$','mobile_phone' => '^1[3|4|5|7|8][0-9]{9}$'];
    protected $rule=[
        'username' => 'max:60|require|unique:user|token',
        'password' => 'require|confirm:confirm_password',
        'mobile_phone' => 'regex:mobile_phone|unique:user,tel',
        'email'=> 'email|unique:user',
        'send_code' => 'regex:send_code',
        'mobile_code' => 'regex:mobile_code',
        'mobileagreement' => 'accepted'
    ];

    protected $message=[
        'username.require' => '用户名不得为空！',
        'username.unique' => '用户已被注册！',
        'username.max' => '用户名不能大于60个字符！',
        'username.token' => '非法请求！',
        'password.require' => '密码不得为空！',
        'password.confirm' => '两次密码输入不一致！',
        'email.email' => '邮箱格式有误！',
        'email.unique' => '该邮箱已被注册！',
        'mobile_phone.regex' => '手机号格式有误！',
        'mobile_phone.unique' => '手机号已被注册！',
        'send_code.regex' => '邮箱验证码必须是6位正整数！',
        'mobile_code.regex' => '短信验证码必须是6位正整数！',
        'mobileagreement.accepted' => '请您阅读并同意《用户注册协议》',
    ];

}
