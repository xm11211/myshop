<?php
namespace app\admin\validate;
use think\Validate;
class Order extends Validate
{
    protected $regex = [
            'phone' => '^1[3|4|5|7|8][0-9]{9}$'
    ];
    protected $rule=[
        'goodsTotalPrice' => 'max:11|number|require',
        'orderTotalPrice' => 'max:11|number|require',
        'name' => 'max:60|require',
        'province' => 'max:60|require',
        'city' => 'max:60|require',
        'county' => 'max:60|require',
        'address' => 'max:300|require',
        'phone' => 'regex:phone|require',
        'remark' => 'max:300'
    ];

    protected $message=[
        'goodsTotalPrice.max' => '商品总额不得大于99999999！',
        'goodsTotalPrice.number' => '商品总额必须是数字！',
        'goodsTotalPrice.require' => '商品总额不得为空！',
        'orderTotalPrice.max' => '订单总额不得大于99999999！',
        'orderTotalPrice.number' => '订单总额必须是数字！',
        'orderTotalPrice.require' => '订单总额不得为空！',
        'name.require' => '收货人姓名不得为空！',
        'name.max' => '收货人姓名不能大于60个字符！',
        'province.require' => '省份不得为空！',
        'province.max' => '省份不能大于60个字符！',
        'city.require' => '城市不得为空！',
        'city.max' => '城市不能大于60个字符！',
        'county.require' => '区县不得为空！',
        'county.max' => '区县不能大于60个字符！',
        'address.require' => '详细地址不得为空！',
        'address.max' => '详细地址不能大于300个字符！',
        'phone.regex' => '手机号格式有误！',
        'phone.require' => '手机号不得为空！',
        'remark.max' => '订单备注不能大于300个字符！'
    ];

}
