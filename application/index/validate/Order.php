<?php
namespace app\index\validate;
use think\Validate;
class Order extends Validate
{
    protected $regex = [
            'userId' => '^\d{1,8}$',
            'zipcode' => '^\d{6}$',
            'phone' => '^1[3|4|5|7|8][0-9]{9}$',
            'tel' => '^\d{1,11}$'
    ];
    protected $rule=[
        'name' => 'max:60|require|token:order',
        'province' => 'max:60|require',
        'city' => 'max:60|require',
        'county' => 'max:60|require',
        'address' => 'max:300|require',
        'userId' => 'regex:userId',
        'phone' => 'regex:phone',
        'tel' => 'regex:tel',
        'email'=> 'email',
        'zipcode'=> 'regex:zipcode',
        'remark' => 'max:300'
    ];

    protected $message=[
        'name.require' => '收货人姓名不得为空！',
        'name.max' => '收货人姓名不能大于60个字符！',
        'name.token' => '非法请求！',
        'province.require' => '省份不得为空！',
        'province.max' => '省份不能大于60个字符！',
        'city.require' => '城市不得为空！',
        'city.max' => '城市不能大于60个字符！',
        'county.require' => '区县不得为空！',
        'county.max' => '区县不能大于60个字符！',
        'address.require' => '详细地址不得为空！',
        'address.max' => '详细地址不能大于300个字符！',
        'email.email' => '邮箱格式有误！',
        'phone.regex' => '手机号格式有误！',
        'zipcode.regex' => '邮政编码必须是6位正整数！',
        'tel.regex' => '电话号格式有误！',
        'remark.max' => '订单备注不能大于300个字符！',
    ];

}
