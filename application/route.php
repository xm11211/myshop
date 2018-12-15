<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Route;
Route::pattern([
    'id' => '^[1-9][0-9]*$',
    'artId'    =>  '^[1-9][0-9]*$',
    'cateId'    =>  '^[1-9][0-9]*$',
    'categoryId' => '^[1-9][0-9]*$',
    'brandId'    => '^[1-9][0-9]*$',
    'userId'    => '^[1-9][0-9]*$',
    'oid'    => '^[1-9][0-9]*$',
    'price' => '^[0-9]+\-[0-9]+$'
]);
Route::get('index/index/ajax_change_brands',function(){
    abort(404);
});
return [
    'xm11211<check>$' => ['admin/login/index',['method' => 'get'],['check' => '\d{4}']],    //后台登录地址
    'xm11211$' => ['admin/login/index',['method' => 'post']],       //后台登录
    'captcha$' => 'admin/login/captcha',       //后台登录验证码
    'category' => 'index/category/index',
    'category/id/:categoryId$' => 'index/category/index',
    'category/id/:categoryId/price/:price$' => 'index/category/index',
    'category/id/:categoryId/brandId/:brandId$' => 'index/category/index',
    'goods$' => 'index/goods/index',
    'goods/:id$' => 'index/goods/index',
    'article/:artId$' => 'index/article/index',
    'cate/:cateId$' => 'index/cate/index',
    'cate' => 'index/cate/index',
    'getGoodsCates' => 'index/category/getGoodsCates',
    'getBrands' => 'index/brand/lst',
    'reg' => 'member/account/reg',
    'login' => 'member/account/login',
    'sendCode' => 'member/account/sendCode',    //用户注册验证码
    'sendFindCode' => 'member/account/sendFindCode',    //用户找回验证码
    'sendEmail' => 'member/account/sendEmail',
    'checkUsername' => 'member/account/checkUsername',
    'checkEmail' => 'member/account/checkEmail',
    'checkEmailCode' => 'member/account/checkEmailCode',
    'checkPhone' => 'member/account/checkPhone',
    'checkPhoneCode' => 'member/account/checkPhoneCode',
    'checkFindPhoneCode' => 'member/account/checkFindPhoneCode',
    'user$' => 'member/user/index',
    'user/:userId$' => 'member/user/index',
    'logout$' => 'member/user/logout',
    'checkLogin' => 'member/account/checkLogin',        //ajax检测用户登录状态
    'getpassword' => 'member/account/getPassword',      //找回密码界面
    'emailChangePassword' => 'member/account/emailChangePassword',      //找回密码
    'addToCart' => 'index/flow/addToCart',      //ajax加入购物车
    'cart' => 'index/flow/cart',      //购物车显示
    'cartGoodsAmount' => 'index/flow/cartGoodsAmount',      //ajax计算商品数量及价格
    'cartGoodsRemove' => 'index/flow/cartGoodsRemove',      //ajax删除单项购物车商品
    'updateToCart' => 'index/flow/updateToCart',      //更新购物车
    'getCartNum' => 'index/flow/getCartNum',      //获取购物车商品数量
    'getLoginDialog' => 'index/flow/getLoginDialog',      //支付时获取用户登录状态
    'orderPost' => 'index/flow/orderPost',      //订单提交
//    'order' => 'index/flow/order',      //订单提交
    'orderPay/:oid$' => 'index/flow/orderPay',      //下单成功提示支付页面
    'wxThreePay/:oid$' => 'index/flow/wxThreePay',      //下单成功提示微信第三方支付页面
    'wxThreeNotify' => 'index/flow/wxThreeNotify',      //微信第三方支付成功回调方法
    'wxNotify' => 'index/flow/wxNotify',      //微信支付成功回调方法
    'aliNotify' => 'index/flow/aliNotify',      //支付宝支付成功回调方法
    'wxewm' => 'index/flow/wxewm',      //微信二维码生成
    'wxPay/:oid$' => 'index/flow/wxPay',      //微信支付
    'wxStatus' => 'index/flow/wxStatus',  //检测微信扫码支付状态
    'paySuccess' => 'index/flow/paySuccess',      //支付成功页面
    'orderList' => 'member/order/orderList'  //订单列表
];
