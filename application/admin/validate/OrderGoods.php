<?php
namespace app\admin\validate;
use think\Validate;
class OrderGoods extends Validate
{
    protected $rule=[
        'goodsName' => 'max:150|require',
        'goodsMemberPrice' => 'max:11|number|require',
        'goodsMarketPrice' => 'max:11|number|require',
        'goodsShopPrice' => 'max:11|number|require',
        'goodsAttrStr' => 'require',
        'goodsNum' => 'require|gt:0',
    ];

    protected $message=[
        'goodsName.require' => '商品名称不得为空！',
        'goodsName.max' => '商品名称不能大于150个字符！',
        'goodsMemberPrice.max' => '商品会员价不得大于99999999！',
        'goodsMemberPrice.number' => '商品会员价必须是数字！',
        'goodsMemberPrice.require' => '商品会员价不得为空！',
        'goodsMarketPrice.max' => '商品市场价不得大于99999999！',
        'goodsMarketPrice.number' => '商品本店价必须是数字！',
        'goodsMarketPrice.require' => '商品本店价不得为空！',
        'goodsShopPrice.max' => '商品本店价不得大于99999999！',
        'goodsShopPrice.number' => '商品本店价必须是数字！',
        'goodsShopPrice.require' => '商品本店价不得为空！',
        'goodsAttrStr.require' => '商品属性不得为空！',
        'goodsNum.require' => '商品数量不得为空！',
        'goodsNum.gt' => '商品数量必须大于0！',
    ];

}
