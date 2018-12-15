<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:82:"/www/wwwroot/www.xxsucai.com/public/../application/index/view/flow/paySuccess.html";i:1540950849;s:70:"/www/wwwroot/www.xxsucai.com/application/index/view/common/footer.html";i:1540963003;}*/ ?>

<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="Keywords" content="大商创,免费商城系统,S2B2C,B2B2C,多用户商城系统,开源网店系统,网上商城系统,免费网店,电商系统,模板堂,大商创源码,源码,源码授权,授权." />
    <meta name="Description" content="大商创,国内首款B2B2C+S2B2C多用户商城系统,集供货商,分销商,批发商,入驻商与一体,另外搭配微商城,App,小程序,线下收银,pos,实现全渠道生态化商业体系!大商创,一切为了商家!" />

    <title>购物流程_大商创演示站-B2B2C商城系统,S2B2C新零售生态系统,多用户商城系统</title>



    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="stylesheet" type="text/css" href="/static/Home/css/base.css" />
    <link rel="stylesheet" type="text/css" href="/static/Home/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/static/Home/css/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="/static/Home/css/purebox.css" />
    <link rel="stylesheet" type="text/css" href="/static/Home/css/quickLinks.css" />

    <script type="text/javascript" src="/static/Home/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="/static/Home/js/jquery.json.js"></script>
    <script type="text/javascript" src="/static/Home/js/transport_jquery.js"></script>
    <script type="text/javascript">
        var json_languages = {"ok":"\u786e\u5b9a","determine":"\u786e\u5b9a","cancel":"\u53d6\u6d88","drop":"\u5220\u9664","edit":"\u7f16\u8f91","remove":"\u79fb\u9664","follow":"\u5173\u6ce8","pb_title":"\u63d0\u793a","Prompt_information":"\u63d0\u793a\u4fe1\u606f","title":"\u63d0\u793a","not_login":"\u60a8\u5c1a\u672a\u767b\u5f55","close":"\u5173\u95ed","cart":"\u8d2d\u7269\u8f66","js_cart":"\u8d2d\u7269\u8f66","all":"\u5168\u90e8","go_login":"\u53bb\u767b\u9646","select_city":"\u8bf7\u9009\u62e9\u5e02","comment_goods":"\u8bc4\u8bba\u5546\u54c1","submit_order":"\u63d0\u4ea4\u8ba2\u5355","sys_msg":"\u7cfb\u7edf\u63d0\u793a","no_keywords":"\u8bf7\u8f93\u5165\u641c\u7d22\u5173\u952e\u8bcd\uff01","adv_packup_one":"\u8bf7\u53bb\u540e\u53f0\u5e7f\u544a\u4f4d\u7f6e","adv_packup_two":"\u91cc\u9762\u8bbe\u7f6e\u5e7f\u544a\uff01","more":"\u66f4\u591a","Please":"\u8bf7\u53bb","set_up":"\u8bbe\u7f6e\uff01","login_phone_packup_one":"\u8bf7\u8f93\u5165\u624b\u673a\u53f7\u7801","more_options":"\u66f4\u591a\u9009\u9879","Pack_up":"\u6536\u8d77","no_attr":"\u6ca1\u6709\u66f4\u591a\u5c5e\u6027\u4e86","search_Prompt":"\u53ef\u8f93\u5165\u6c49\u5b57,\u62fc\u97f3\u67e5\u627e\u54c1\u724c","most_input":"\u6700\u591a\u53ea\u80fd\u9009\u62e95\u9879","multi_select":"\u591a\u9009","checkbox_Packup":"\u8bf7\u6536\u8d77\u5168\u90e8\u591a\u9009","radio_Packup":"\u8bf7\u6536\u8d77\u5168\u90e8\u5355\u9009","contrast":"\u5bf9\u6bd4","empty_contrast":"\u6e05\u7a7a\u5bf9\u6bd4\u680f","Prompt_add_one":"\u6700\u591a\u53ea\u80fd\u6dfb\u52a04\u4e2a\u54e6^_^","Prompt_add_two":"\u60a8\u8fd8\u53ef\u4ee5\u7ee7\u7eed\u6dfb\u52a0","button_compare":"\u6bd4\u8f83\u9009\u5b9a\u5546\u54c1","exist":"\u60a8\u5df2\u7ecf\u9009\u62e9\u4e86%s","count_limit":"\u6700\u591a\u53ea\u80fd\u9009\u62e94\u4e2a\u5546\u54c1\u8fdb\u884c\u5bf9\u6bd4","goods_type_different":"%s\u548c\u5df2\u9009\u62e9\u5546\u54c1\u7c7b\u578b\u4e0d\u540c\u65e0\u6cd5\u8fdb\u884c\u5bf9\u6bd4","compare_no_goods":"\u60a8\u6ca1\u6709\u9009\u5b9a\u4efb\u4f55\u9700\u8981\u6bd4\u8f83\u7684\u5546\u54c1\u6216\u8005\u6bd4\u8f83\u7684\u5546\u54c1\u6570\u5c11\u4e8e 2 \u4e2a\u3002","btn_buy":"\u8d2d\u4e70","is_cancel":"\u53d6\u6d88","select_spe":"\u8bf7\u9009\u62e9\u5546\u54c1\u5c5e\u6027","Country":"\u8bf7\u9009\u62e9\u6240\u5728\u56fd\u5bb6","Province":"\u8bf7\u9009\u62e9\u6240\u5728\u7701\u4efd","City":"\u8bf7\u9009\u62e9\u6240\u5728\u5e02","District":"\u8bf7\u9009\u62e9\u6240\u5728\u533a\u57df","Street":"\u8bf7\u9009\u62e9\u6240\u5728\u8857\u9053","Detailed_address_null":"\u8be6\u7ec6\u5730\u5740\u4e0d\u80fd\u4e3a\u7a7a","consignee":"\u8bf7\u586b\u5199\u6536\u8d27\u4eba\u4fe1\u606f","Select_attr":"\u8bf7\u9009\u62e9\u5c5e\u6027","Focus_prompt_one":"\u60a8\u5df2\u5173\u6ce8\u8be5\u5e97\u94fa\uff01","Focus_prompt_login":"\u60a8\u5c1a\u672a\u767b\u5f55\u5546\u57ce\u4f1a\u5458\uff0c\u4e0d\u80fd\u5173\u6ce8\uff01","Focus_prompt_two":"\u767b\u5f55\u5546\u57ce\u4f1a\u5458\u3002","store_focus":"\u5e97\u94fa\u5173\u6ce8\u3002","Focus_prompt_three":"\u60a8\u786e\u5b9e\u8981\u5173\u6ce8\u6240\u9009\u5e97\u94fa\u5417\uff1f","Focus_prompt_four":"\u60a8\u786e\u5b9e\u8981\u53d6\u6d88\u5173\u6ce8\u5e97\u94fa\u5417\uff1f","Focus_prompt_five":"\u60a8\u8981\u5173\u6ce8\u8be5\u5e97\u94fa\u5417\uff1f","Purchase_quantity":"\u8d85\u8fc7\u9650\u8d2d\u6570\u91cf.","My_collection":"\u6211\u7684\u6536\u85cf","shiping_prompt":"\u6682\u4e0d\u652f\u6301\u914d\u9001","Have_goods":"\u6709\u8d27","No_goods":"\u5f88\u62b1\u6b49\uff0c\u65e0\u8d27\u5566","No_shipping":"\u5f88\u62b1\u6b49\uff0c\u65e0\u6cd5\u914d\u9001","Deliver_back_order":"\u4e0b\u5355\u540e\u7acb\u5373\u53d1\u8d27","Time_delivery":" \u65f6\u53d1\u8d27","goods_over":"\u6b64\u5546\u54c1\u6682\u65f6\u552e\u5b8c","Stock_goods_null":"\u5546\u54c1\u5e93\u5b58\u4e0d\u8db3","purchasing_prompt_two":"\u5bf9\u4e0d\u8d77\uff0c\u8be5\u5546\u54c1\u5df2\u7ecf\u7d2f\u8ba1\u8d85\u8fc7\u9650\u8d2d\u6570\u91cf","day_not_available":"\u5f53\u65e5\u65e0\u8d27","day_yes_available":"\u5f53\u65e5\u6709\u8d27","Already_buy":"\u5df2\u8d2d\u4e70","Already_buy_two":"\u4ef6\u5546\u54c1\u8fbe\u5230\u9650\u8d2d\u6761\u4ef6,\u65e0\u6cd5\u518d\u8d2d\u4e70","Already_buy_three":"\u4ef6\u8be5\u5546\u54c1,\u53ea\u80fd\u518d\u8d2d\u4e70","goods_buy_empty_p":"\u5546\u54c1\u6570\u91cf\u4e0d\u80fd\u5c11\u4e8e1\u4ef6","goods_number_p":"\u5546\u54c1\u6570\u91cf\u5fc5\u987b\u4e3a\u6570\u5b57","search_one":"\u8bf7\u586b\u5199\u7b5b\u9009\u4ef7\u683c","search_two":"\u8bf7\u586b\u5199\u7b5b\u9009\u5de6\u8fb9\u4ef7\u683c","search_three":"\u8bf7\u586b\u5199\u7b5b\u9009\u53f3\u8fb9\u4ef7\u683c","search_four":"\u5de6\u8fb9\u4ef7\u683c\u4e0d\u80fd\u5927\u4e8e\u6216\u7b49\u4e8e\u53f3\u8fb9\u4ef7\u683c","jian":"\u4ef6","letter":"\u4ef6","inventory":"\u5b58\u8d27","move_collection":"\u79fb\u81f3\u6211\u7684\u6536\u85cf","select_shop":"\u8bf7\u9009\u62e9\u5957\u9910\u5546\u54c1","Parameter_error":"\u53c2\u6570\u9519\u8bef","screen_price":"\u8bf7\u586b\u5199\u7b5b\u9009\u4ef7\u683c","screen_price_left":"\u8bf7\u586b\u5199\u7b5b\u9009\u5de6\u8fb9\u4ef7\u683c","screen_price_right":"\u8bf7\u586b\u5199\u7b5b\u9009\u53f3\u8fb9\u4ef7\u683c","screen_price_dy":"\u5de6\u8fb9\u4ef7\u683c\u4e0d\u80fd\u5927\u4e8e\u6216\u7b49\u4e8e\u53f3\u8fb9\u4ef7\u683c","invoice_ok":"\u4fdd\u5b58\u53d1\u7968\u4fe1\u606f","invoice_desc_null":"\u8f93\u5165\u5185\u5bb9\u4e0d\u80fd\u4e3a\u7a7a\uff01","invoice_desc_number":"\u60a8\u6700\u591a\u53ef\u4ee5\u6dfb\u52a03\u4e2a\u516c\u53f8\u53d1\u7968\uff01","invoice_packup":"\u8bf7\u9009\u62e9\u6216\u586b\u5199\u53d1\u7968\u62ac\u5934\u90e8\u5206\uff01","invoice_tax_null":"\u8bf7\u586b\u5199\u7eb3\u7a0e\u4eba\u8bc6\u522b\u7801","add_address_10":"\u6700\u591a\u53ea\u80fd\u6dfb\u52a010\u4e2a\u6536\u8d27\u5730\u5740","msg_phone_not":"\u624b\u673a\u53f7\u7801\u4e0d\u6b63\u786e","msg_phone_blank":"\u624b\u673a\u53f7\u7801\u4e0d\u80fd\u4e3a\u7a7a","captcha_not":"\u9a8c\u8bc1\u7801\u4e0d\u80fd\u4e3a\u7a7a","captcha_xz":"\u8bf7\u8f93\u51654\u4f4d\u6570\u7684\u9a8c\u8bc1\u7801","captcha_cw":"\u9a8c\u8bc1\u7801\u9519\u8bef","Detailed_map":"\u8be6\u7ec6\u5730\u56fe","email_error":"\u90ae\u7bb1\u683c\u5f0f\u4e0d\u6b63\u786e\uff01","bid_prompt_null":"\u4ef7\u683c\u4e0d\u80fd\u4e3a\u7a7a!","bid_prompt_error":"\u4ef7\u683c\u8f93\u5165\u683c\u5f0f\u4e0d\u6b63\u786e\uff01","mobile_error_goods":"\u624b\u673a\u683c\u5f0f\u4e0d\u6b63\u786e\uff01","null_email_goods":"\u90ae\u7bb1\u4e0d\u80fd\u4e3a\u7a7a","select_store":"\u8bf7\u9009\u62e9\u95e8\u5e97\uff01","Product_spec_prompt":"\u8bf7\u9009\u62e9\u5546\u54c1\u89c4\u683c\u7c7b\u578b","reply_desc_one":"\u56de\u590d\u5e16\u5b50\u5185\u5bb9\u4e0d\u80fd\u4e3a\u7a7a","go_shoping":"\u53bb\u8d2d\u7269","loading":"\u6b63\u5728\u62fc\u547d\u52a0\u8f7d\u4e2d...","purchasing_minamount":"\u5bf9\u4e0d\u8d77\uff0c\u8d2d\u4e70\u6570\u91cf\u4e0d\u80fd\u5c0f\u4e8e\u6700\u5c0f\u9636\u68af\u4ef7","no_history":"\u60a8\u5df2\u6e05\u7a7a\u6700\u8fd1\u6d4f\u89c8\u8fc7\u7684\u5546\u54c1","receive_coupons":"\u9886\u53d6\u4f18\u60e0\u5238","Immediate_use":"\u7acb\u5373\u4f7f\u7528","no_enabled":"\u5173\u95ed","highest_price":"\u5df2\u662f\u6700\u9ad8\u4ef7\uff01","lowest_price":"\u5df2\u662f\u6700\u4f4e\u4ef7\uff01","Purchase_restrictions":"\u8d2d\u4e70\u6570\u91cf\u4e0d\u80fd\u5c11\u4e8e1\u4ef6","remove_checked_goods":"\u5220\u9664\u9009\u4e2d\u7684\u5546\u54c1","go_up":"\u7ee7\u7eed","back_cart":"\u8fd4\u56de\u8d2d\u7269\u8f66","save":"\u4fdd\u5b58","delivery_Prompt":"\u8be5\u533a\u57df\u6ca1\u6709\u63d0\u8d27\u70b9!","delivery_Prompt_two":"\u8bf7\u9009\u62e9\u63d0\u8d27\u65f6\u95f4\u6bb5!","checked_address":"\u8bf7\u9009\u62e9\u6536\u8d27\u5730\u5740!","no_store":"\u8be5\u5730\u533a\u6ca1\u6709\u95e8\u5e97!","buy_more":"\u6700\u591a\u9886\u53d6","a_goods":"\u4e2a\u5546\u54c1","drop_goods":"\u5220\u9664\u5546\u54c1\uff1f","drop_desc":"\u60a8\u53ef\u4ee5\u9009\u62e9\u79fb\u5230\u6536\u85cf\uff0c\u6216\u5220\u9664\u5546\u54c1\u3002","Move_collection":"\u79fb\u5230\u6536\u85cf","Move_desc":"\u79fb\u52a8\u540e\u9009\u4e2d\u5546\u54c1\u5c06\u4e0d\u5728\u8d2d\u7269\u8f66\u4e2d\u663e\u793a\u3002","confirm_default_address":"\u60a8\u786e\u5b9a\u8981\u8bbe\u7f6e\u4e3a\u9ed8\u8ba4\u6536\u8d27\u5730\u5740\u5417\uff1f","confirm_drop_address":"\u60a8\u786e\u5b9a\u8981\u5220\u9664\u8be5\u6536\u8d27\u5730\u5740\u5417\uff1f","please_checked_address":"\u60a8\u8fd8\u6ca1\u6709\u9009\u62e9\u6536\u8d27\u5730\u5740\uff01","cart_empty_goods":"\u60a8\u7684\u8d2d\u7269\u8f66\u4e2d\u6ca1\u6709\u5546\u54c1\uff01","confirm_Move_collection":"\u79fb\u52a8\u540e\u9009\u4e2d\u5546\u54c1\u5c06\u4e0d\u5728\u8d2d\u7269\u8f66\u4e2d\u663e\u793a\uff01","Shipping_address":"\u6536\u8d27\u5730\u5740","add_shipping_address":"\u6dfb\u52a0\u6536\u8d27\u5730\u5740","no_delivery":"\u6682\u4e0d\u652f\u6301\u8be5\u5730\u533a\u914d\u9001\u3002","delivery_information":"\u914d\u9001\u4fe1\u606f","pay_password_packup_null":"\u652f\u4ed8\u5bc6\u7801\u4e0d\u80fd\u4e3a\u7a7a\uff01","pay_password_packup_error":"\u60a8\u7684\u652f\u4ed8\u5bc6\u7801\u6709\u8bef\uff01","flow_no_payment":"\u60a8\u5fc5\u987b\u9009\u5b9a\u4e00\u4e2a\u652f\u4ed8\u65b9\u5f0f","flow_no_shipping":"\u60a8\u5fc5\u987b\u9009\u5b9a\u4e00\u4e2a\u914d\u9001\u65b9\u5f0f","Mobile_error":"\u624b\u673a\u53f7\u683c\u5f0f\u4e0d\u6b63\u786e\uff01","phone_error":"\u7535\u8bdd\u53f7\u7801\u683c\u5f0f\u4e0d\u6b63\u786e\uff01","order_detail":"\u8ba2\u5355\u8be6\u60c5","down_detail":"\u6536\u8d77\u8be6\u60c5","payTitle":"\u6b63\u5728\u652f\u4ed8","select_consigne":"\u8bf7\u9009\u62e9\u6240\u5728\u56fd\u5bb6","consignee_legitimate_email":"\u60a8\u8f93\u5165\u7684\u90ae\u4ef6\u5730\u5740\u4e0d\u662f\u4e00\u4e2a\u5408\u6cd5\u7684\u90ae\u4ef6\u5730\u5740","consignee_legitimate_phone":"\u624b\u673a\u53f7\u7801\u4e0d\u5408\u6cd5","input_Consignee_name":"\u8bf7\u60a8\u586b\u5199\u6536\u8d27\u4eba\u59d3\u540d","con_Preservation":"\u4fdd\u5b58\u6536\u8d27\u4eba\u4fe1\u606f","Preservation":"\u4fdd\u5b58","add_invoice":"\u65b0\u589e\u5355\u4f4d\u53d1\u7968","checked_goods_number":"\u8bf7\u52fe\u9009\u4e2d\u5546\u54c1\u5728\u4fee\u6539\u5546\u54c1\u6570\u91cf","not_seller_batch_goods_num":"\u8bf7\u52fe\u9009\u4e2d\u5546\u54c1\u5728\u4fee\u6539\u5546\u54c1\u6570\u91cf","payment_is_online":"\u5728\u7ebf\u652f\u4ed8"};

        //加载效果
        var load_cart_info = '<img src="/static/Home/img/loadGoods.gif" class="load" />';
        var load_icon = '<img src="/static/Home/img/load.gif" width="200" height="200" />';
    </script>
    <link rel="stylesheet" type="text/css" href="/static/Home/css/perfect-scrollbar.min.css" />
</head>

<body class="bg-ligtGary">
<div class="site-nav" id="site-nav">
    <div class="site-nav" id="site-nav">
        <div class="w w1200">
            <div class="fl">
                <div class="city-choice" id="city-choice" data-ectype="dorpdown">
                    <div class="dorpdown-layer">
                        <div class="ui-areamini-content-wrap" id="ui-content-wrap">
                            <div class="scrollBody" id="scrollBody">
                                <input name="area_phpName" id="phpName" value="index.php" type="hidden">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="txt-info" id="ECS_MEMBERZONE">
                    <!--用户登录状态-->
                </div>
                <script>
                    var checkLoginUrl = "<?php echo url('member/account/checkLogin'); ?>";
                </script>
                <script src="/static/Home/js/login.js"></script>
            </div>
            <ul class="quick-menu fr">
                <?php if(is_array($navArr[1]) || $navArr[1] instanceof \think\Collection || $navArr[1] instanceof \think\Paginator): $i = 0; $__LIST__ = $navArr[1];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li>
                    <div class="dt"><a href="<?php echo $vo['navUrl']; ?>" <?php if($vo['open'] == 1): ?>target="_blank"<?php endif; ?>><?php echo $vo['navName']; ?></a></div>
                </li>
                <?php if(count($navArr[1]) != $i): ?>
                <li class="spacer"></li>
                <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
</div>
<div class="header header-cart">
    <div class="w w1200">
        <div class="logo">
            <div class="logoImg"><a href="index.php"><img src="/static/Home/img/logo.png" /></a></div>
            <div class="tit">结算页</div>
        </div>
        <div class="cart-stepflex">
            <div class="cart-step-item cur">
                <span>1.我的购物车</span>
                <i class="iconfont icon-arrow-right-alt"></i>
            </div>
            <div class="cart-step-item cur">
                <span>2.填写订单信息</span>
                <i class="iconfont icon-arrow-right-alt"></i>
            </div>
            <div class="cart-step-item curr">
                <span>3.成功提交订单</span>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="w w1200">

        <div class="shopend-warp">

            <div class="shopend-info">
                <div class="s-i-left"><i class="ico-success"></i></div>
                <div class="s-i-right">
                    <h3>
                        支付成功
                    </h3>
                    <div class="s-i-tit">
                        <p>订单号：<em id="nku"><?php echo $orderData['outTradeNo']; ?></em></p>
                        <p>配送方式：<em><?php echo $orderData['distribution']; ?></em></p>
                        <p>运费：<em><em>¥</em><?php echo $orderData['postSpant']; ?></em></p>
                        <p>应付总金额：<em><em>¥</em><?php echo $orderData['orderTotalPrice']; ?></em></p>
                        <p>收货人：<span id="username"><?php echo $orderData['name']; ?></span><span id="tel" class="ml20"><?php echo $orderData['phone']; ?></span></p>
                        <p>寄送至： <span id="address"><?php echo $orderData['province']; ?> <?php echo $orderData['city']; ?> <?php echo $orderData['county']; ?>&nbsp;<?php echo $orderData['address']; ?></span></p>
                    </div>
                    <div class="s-i-btn">
                        <a href="#" class="btn sc-redBg-btn">查看订单</a>
                        <a href="/">返回首页</a>                        </div>
                </div>
            </div>
        </div>

        <div class="p-panel-main c-history">
            <div class="ftit ftit-delr"><h3>继续剁手</h3></div>
            <div class="gl-list clearfix">
                <ul class="clearfix">
                    <li class="opacity_img">
                        <div class="p-img"><a href="goods.php?id=843" target="_blank"><img src="/static/Home/img/0_thumb_G_1490209495581.jpg" width="190" height="190"></a></div>
                        <div class="p-price">
                            <em>¥</em>3499.00                                                            </div>
                        <div class="p-name"><a href="goods.php?id=843" title="Sony/索尼 KDL-48W650D 48英寸液晶高清 wifi网络 平板电视 正品保证 三期免息 咨询有礼 售后上门" target="_blank">Sony/索尼 KDL-48W650D 48英寸液晶高清 wifi网络 平板电视 正品保证 三期免息 咨询有礼 售后上门</a></div>
                        <div class="p-num">已售<em>0</em>件</div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div id="pay_Dialog" class="hide">
    <div class="pat">请您在新打开的支付页面进行支付，支付完成前请不要关闭该窗口</div>
    <div class="paydia-warp">
        <i></i>
        <div class="con">
            <div class="con-warp con-success">
                <h3>支付成功了</h3>
                <a href="user.php?act=order_list" class="ftx-05">订单详情></a>
            </div>
            <div class="con-warp con-fail">
                <h3>支付失败了</h3>
                <a href="article.php?id=17" class="ftx-05">支付遇到问题></a>
                <a href="index.php" class="ftx-05">继续购物></a>
            </div>
        </div>
    </div>
</div>





<div class="footer-new">
    <div class="footer-new-top">
        <div class="w w1200">
            <div class="service-list">
                <div class="service-item">
                    <i class="f-icon f-icon-qi"></i>
                    <span>七天包退</span>
                </div>
                <div class="service-item">
                    <i class="f-icon f-icon-zheng"></i>
                    <span>正品保障</span>
                </div>
                <div class="service-item">
                    <i class="f-icon f-icon-hao"></i>
                    <span>好评如潮</span>
                </div>
                <div class="service-item">
                    <i class="f-icon f-icon-shan"></i>
                    <span>闪电发货</span>
                </div>
                <div class="service-item">
                    <i class="f-icon f-icon-quan"></i>
                    <span>权威荣誉</span>
                </div>
            </div>
            <div class="contact">
                <div class="contact-item contact-item-first"><i class="f-icon f-icon-tel"></i><span>4000-000-000</span></div>
                <div class="contact-item">
                    <a id="IM" im_type="dsc" onclick="openWin(this)" href="javascript:;" class="btn-ctn"><i class="f-icon f-icon-kefu"></i><span>咨询客服</span></a>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-new-con">
        <div class="fnc-warp">
            <div class="help-list">
                <?php if(is_array($helpCateArr) || $helpCateArr instanceof \think\Collection || $helpCateArr instanceof \think\Paginator): $i = 0; $__LIST__ = $helpCateArr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <div class="help-item">
                    <h3><?php echo $vo['cateName']; ?> </h3>
                    <ul>
                        <?php if(is_array($vo['arts']) || $vo['arts'] instanceof \think\Collection || $vo['arts'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['arts'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?>
                        <li><a href="<?php if($vo1['url'] == ''): ?>/article/<?php echo $vo1['id']; else: ?><?php echo $vo1['url']; endif; ?>"><?php echo $vo1['title']; ?></a></li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <div class="qr-code">
                <div class="qr-item qr-item-first">
                    <div class="code_img"><img src="/static/Home/img/ecjia_qrcode.png"></div>
                    <div class="code_txt">官方网址</div>
                </div>
                <div class="qr-item">
                    <div class="code_img"><img src="/static/Home/img/ectouch_qrcode.png"></div>
                    <div class="code_txt">微信二维码</div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-new-bot">
        <div class="w w1200">

            <p class="copyright_links">
                <a href="/">首页</a>
                <span class="spacer"></span>
                <?php if(is_array($shopArtArr) || $shopArtArr instanceof \think\Collection || $shopArtArr instanceof \think\Paginator): $i = 0; $__LIST__ = $shopArtArr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <a href="/article/<?php echo $vo['id']; ?>"><?php echo $vo['title']; ?></a>
                <?php if(count($shopArtArr) != $i): ?>
                <span class="spacer"></span>
                <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </p>

            <p>
                <?php $copyright = explode(',',$confArr['copyright']);
                    foreach($copyright as $k => $v):
                ?>
                <span><?=$v;?>&nbsp;&nbsp;</span>
                <?php endforeach;?>
            </p>

            <p class="copyright_auth">&nbsp;</p>
        </div>
    </div>


    <div class="hide" id="pd_coupons">
        <span class="success-icon m-icon"></span>
        <div class="item-fore">
            <h3>领取成功！感谢您的参与，祝您购物愉快~</h3>
            <div class="txt ftx-03">本活动为概率性事件，不能保证所有客户成功领取优惠券</div>
        </div>
    </div>


    <div class="hidden">
        <input name="seller_kf_IM" value="" rev="" ru_id="" type="hidden">
        <input name="seller_kf_qq" value="349488953" type="hidden">
        <input name="seller_kf_tel" value="4000-000-000" type="hidden">
        <input name="user_id" value="62" type="hidden">
    </div>
</div>

<script type="text/javascript" src="/static/Home/js/suggest.js"></script>
<script type="text/javascript" src="/static/Home/js/scroll_city.js"></script>
<script type="text/javascript" src="/static/Home/js/utils.js"></script>
<script type="text/javascript" src="/static/Home/js/warehouse.js"></script>
<script type="text/javascript" src="/static/Home/js/warehouse_area.js"></script>
<script type="text/javascript" src="/static/Home/js/jquery.SuperSlide.2.1.1.js"></script>
<script type="text/javascript" src="/static/Home/js/common.js"></script>
<script type="text/javascript" src="/static/Home/js/shopping_flow.js"></script>
<script type="text/javascript" src="/static/Home/js/jquery.nyroModal.js"></script>
<script type="text/javascript" src="/static/Home/js/perfect-scrollbar.min.js"></script>
<script type="text/javascript" src="/static/Home/js/lib_ecmobanFunc.js"></script>
<script type="text/javascript" src="/static/Home/js/jquery.validation.min.js"></script>
<script type="text/javascript" src="/static/Home/js/dsc-common.js"></script>
<script type="text/javascript" src="/static/Home/js/jquery.purebox.js"></script>
<script type="text/javascript" src="/static/Home/js/region.js"></script>

<script type="text/javascript">
    $(function(){
        $(".p-mode-list .p-mode-item").click(function(){
            var onlinepay_type = $(this).attr('flag');
            var order_sn = $(this).attr('order_sn');
            $.ajax({
                async: false,
                url:"flow.php?act=onlinepay_edit&onlinepay_type="+onlinepay_type+"&order_sn="+order_sn,
            });
        });


        $(".p-mode-item input").click(function(){
            var content = $("#pay_Dialog").html();
            pb({
                id:"payDialog",
                title:json_languages.payTitle,
                width:550,
                height:300,
                content:content,
                drag:false,
                foot:false
            });
        });

        //微信支付定时查询订单状态 by wanglu
        checkOrder();

        //微信扫码
        $("[data-type='wxpay']").on("click",function(){
            var content = $("#wxpay_dialog").html();
            pb({
                id: "scanCode",
                title: "",
                width: 716,
                content: content,
                drag: true,
                foot: false,
                cl_cBtn: false,
                cBtn: false
            });
        });
    });

    var timer;
    function checkOrder(){
        var pay_name = "在线支付";
        var pay_status = "0";
        var url = "flow.php?step=checkorder&order_id=8";
        if(pay_name == json_languages.payment_is_online && pay_status == 0){
            $.get(url, {}, function(data){
                //已付款
                if(data.code > 0 && data.pay_code == 'wxpay'){
                    clearTimeout(timer);
                    location.href = "respond.php?code=" + data.pay_code + "&status=1";
                }
            },'json');
        }
        timer = setTimeout("checkOrder()", 5000);
    }
</script>

<script type="text/javascript">
    $(function(){
        $("input[name='store_order']").val(0);

        $(document).on('click', "[ectype='store_order']", function(){
            var i = 0;
            $("*[ectype='ckShopAll']").each(function(){
                var t = $(this);
                if(t.prop("checked") == true){
                    i++
                }
            });

            if(i > 1){
                pbDialog(json_languages.not_seller_batch_goods_num,"",0,'','',55);
            }else{
                $("input[name='store_order']").val(1);
                $("form[name='formCart']").submit();
            }
        });
    })
</script>
</body>
</html>