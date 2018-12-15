<?php
namespace app\admin\validate;
use think\Validate;
class Brand extends Validate
{

    protected $rule=[
        'brandName'=>'max:60|require|unique:brand',
        'url'=>'max:60',
        'desc'=>'max:300',
    ];

    protected $message=[
        'brandName.require' => '品牌名称不得为空！',
        'brandName.unique' => '品牌名称不得重复！',
        'brandName.max' => '品牌名称不能大于60个字符！',
        'url.max' => '网址不能大于60个字符！',
        'desc.max' => '描述不能大于300个字符！',
    ];

}
