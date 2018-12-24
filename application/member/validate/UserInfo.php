<?php
namespace app\member\validate;
use think\Validate;
class UserInfo extends Validate
{
    protected $rule=[
        'nickName' => 'max:60|token:userInfo',
        'year' => 'number|between:1958,2019',
        'month' => 'number|between:1,12',
        'day' => 'number|between:1,31',
        'sex' => 'number|between:1,3',
    ];

    protected $message=[
        'nickName.max' => '收货人姓名不能大于60个字符！',
        'nickName.token' => '非法请求！',
        'year.number' => '出生年份必须是数字！',
        'year.between' => '不存在的出生年份！',
        'month.number' => '出生月份必须是数字！',
        'month.between' => '不存在的出生月份！',
        'day.number' => '出生日必须是数字！',
        'day.between' => '不存在的出生日！',
        'sex.number' => '不存在的性别！',
        'sex.between' => '不存在的性别！',
    ];

}
