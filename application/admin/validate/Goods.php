<?php
namespace app\admin\validate;
use think\Validate;
class Goods extends Validate
{

    protected $rule=[
        'goodsName'=>'max:128|require|unique:goods',
        'num' => 'max:16',
        'marketPrice' => 'max:10|number',
        'shopPrice' => 'max:10|number',
        'weight' => 'max:10|number',
        'brandId' => 'number',
        'cateId' => 'number',
        'typeId' => 'number',
    ];

    protected $message=[
        'goodsName.require' => '商品名称不得为空！',
        'goodsName.unique' => '商品名称不得重复！',
        'goodsName.max' => '商品名称不能大于128个字符！',
        'num.max' => '商品编码长度不能大于16个字符！',
        'marketPrice.max' => '市场价长度不得大于10个字符！',
        'marketPrice.number' => '市场价必须是数字！',
        'shopPrice.max' => '门店价长度不得大于10个字符！',
        'shopPrice.number' => '门店价必须是数字！',
        'brandId.number' => '请不要篡改品牌id！',
        'cateId.number' => '请不要篡改分类id！',
        'typeId.number' => '请不要篡改类型id！',
    ];

}
