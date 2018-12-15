<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:81:"/www/wwwroot/www.xxsucai.com/public/../application/index/view/category/index.html";i:1540948675;s:70:"/www/wwwroot/www.xxsucai.com/application/index/view/common/header.html";i:1526944134;s:69:"/www/wwwroot/www.xxsucai.com/application/index/view/common/right.html";i:1519852424;s:70:"/www/wwwroot/www.xxsucai.com/application/index/view/common/footer.html";i:1540963003;}*/ ?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $confArr['siteName']; ?></title>
<meta name="Keywords" content="<?php echo $confArr['keywords']; ?>" />
<meta name="Description" content="<?php echo $confArr['desc']; ?>" />
<link rel="stylesheet" type="text/css" href="/static/Home/css/base.css" />
<link rel="stylesheet" type="text/css" href="/static/Home/css/style.css" />
<link rel="stylesheet" type="text/css" href="/static/Home/css/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/static/Home/css/purebox.css" />
<link rel="stylesheet" type="text/css" href="/static/Home/css/quickLinks.css" />
<script type="text/javascript" src="/static/Home/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="/static/Home/js/jquery.json.js"></script>
<script type="text/javascript" src="/static/Home/js/transport_jquery.js"></script>
<script type="text/javascript">
var json_languages = {"ok":"\u786e\u5b9a","determine":"\u786e\u5b9a","cancel":"\u53d6\u6d88","drop":"\u5220\u9664","edit":"\u7f16\u8f91","remove":"\u79fb\u9664","follow":"\u5173\u6ce8","pb_title":"\u63d0\u793a","Prompt_information":"\u63d0\u793a\u4fe1\u606f","title":"\u63d0\u793a","not_login":"\u60a8\u5c1a\u672a\u767b\u5f55","close":"\u5173\u95ed","cart":"\u8d2d\u7269\u8f66","js_cart":"\u8d2d\u7269\u8f66","all":"\u5168\u90e8","go_login":"\u53bb\u767b\u9646","select_city":"\u8bf7\u9009\u62e9\u5e02","comment_goods":"\u8bc4\u8bba\u5546\u54c1","submit_order":"\u63d0\u4ea4\u8ba2\u5355","sys_msg":"\u7cfb\u7edf\u63d0\u793a","no_keywords":"\u8bf7\u8f93\u5165\u641c\u7d22\u5173\u952e\u8bcd\uff01","adv_packup_one":"\u8bf7\u53bb\u540e\u53f0\u5e7f\u544a\u4f4d\u7f6e","adv_packup_two":"\u91cc\u9762\u8bbe\u7f6e\u5e7f\u544a\uff01","more":"\u66f4\u591a","Please":"\u8bf7\u53bb","set_up":"\u8bbe\u7f6e\uff01","login_phone_packup_one":"\u8bf7\u8f93\u5165\u624b\u673a\u53f7\u7801","more_options":"\u66f4\u591a\u9009\u9879","Pack_up":"\u6536\u8d77","no_attr":"\u6ca1\u6709\u66f4\u591a\u5c5e\u6027\u4e86","search_Prompt":"\u53ef\u8f93\u5165\u6c49\u5b57,\u62fc\u97f3\u67e5\u627e\u54c1\u724c","most_input":"\u6700\u591a\u53ea\u80fd\u9009\u62e95\u9879","multi_select":"\u591a\u9009","checkbox_Packup":"\u8bf7\u6536\u8d77\u5168\u90e8\u591a\u9009","radio_Packup":"\u8bf7\u6536\u8d77\u5168\u90e8\u5355\u9009","contrast":"\u5bf9\u6bd4","empty_contrast":"\u6e05\u7a7a\u5bf9\u6bd4\u680f","Prompt_add_one":"\u6700\u591a\u53ea\u80fd\u6dfb\u52a04\u4e2a\u54e6^_^","Prompt_add_two":"\u60a8\u8fd8\u53ef\u4ee5\u7ee7\u7eed\u6dfb\u52a0","button_compare":"\u6bd4\u8f83\u9009\u5b9a\u5546\u54c1","exist":"\u60a8\u5df2\u7ecf\u9009\u62e9\u4e86%s","count_limit":"\u6700\u591a\u53ea\u80fd\u9009\u62e94\u4e2a\u5546\u54c1\u8fdb\u884c\u5bf9\u6bd4","goods_type_different":"%s\u548c\u5df2\u9009\u62e9\u5546\u54c1\u7c7b\u578b\u4e0d\u540c\u65e0\u6cd5\u8fdb\u884c\u5bf9\u6bd4","compare_no_goods":"\u60a8\u6ca1\u6709\u9009\u5b9a\u4efb\u4f55\u9700\u8981\u6bd4\u8f83\u7684\u5546\u54c1\u6216\u8005\u6bd4\u8f83\u7684\u5546\u54c1\u6570\u5c11\u4e8e 2 \u4e2a\u3002","btn_buy":"\u8d2d\u4e70","is_cancel":"\u53d6\u6d88","select_spe":"\u8bf7\u9009\u62e9\u5546\u54c1\u5c5e\u6027","Province":"\u8bf7\u9009\u62e9\u6240\u5728\u7701\u4efd","City":"\u8bf7\u9009\u62e9\u6240\u5728\u5e02","District":"\u8bf7\u9009\u62e9\u6240\u5728\u533a\u57df","Street":"\u8bf7\u9009\u62e9\u6240\u5728\u8857\u9053","Detailed_address_null":"\u8be6\u7ec6\u5730\u5740\u4e0d\u80fd\u4e3a\u7a7a","Select_attr":"\u8bf7\u9009\u62e9\u5c5e\u6027","Focus_prompt_one":"\u60a8\u5df2\u5173\u6ce8\u8be5\u5e97\u94fa\uff01","Focus_prompt_login":"\u60a8\u5c1a\u672a\u767b\u5f55\u5546\u57ce\u4f1a\u5458\uff0c\u4e0d\u80fd\u5173\u6ce8\uff01","Focus_prompt_two":"\u767b\u5f55\u5546\u57ce\u4f1a\u5458\u3002","store_focus":"\u5e97\u94fa\u5173\u6ce8\u3002","Focus_prompt_three":"\u60a8\u786e\u5b9e\u8981\u5173\u6ce8\u6240\u9009\u5e97\u94fa\u5417\uff1f","Focus_prompt_four":"\u60a8\u786e\u5b9e\u8981\u53d6\u6d88\u5173\u6ce8\u5e97\u94fa\u5417\uff1f","Focus_prompt_five":"\u60a8\u8981\u5173\u6ce8\u8be5\u5e97\u94fa\u5417\uff1f","Purchase_quantity":"\u8d85\u8fc7\u9650\u8d2d\u6570\u91cf.","My_collection":"\u6211\u7684\u6536\u85cf","shiping_prompt":"\u8be5\u5730\u533a\u6682\u4e0d\u652f\u6301\u914d\u9001","Have_goods":"\u6709\u8d27","No_goods":"\u65e0\u8d27","No_shipping":"\u65e0\u6cd5\u914d\u9001","Deliver_back_order":"\u4e0b\u5355\u540e\u7acb\u5373\u53d1\u8d27","Time_delivery":" \u65f6\u53d1\u8d27","goods_over":"\u6b64\u5546\u54c1\u6682\u65f6\u552e\u5b8c","Stock_goods_null":"\u5546\u54c1\u5e93\u5b58\u4e0d\u8db3","purchasing_prompt_two":"\u5bf9\u4e0d\u8d77\uff0c\u8be5\u5546\u54c1\u5df2\u7ecf\u7d2f\u8ba1\u8d85\u8fc7\u9650\u8d2d\u6570\u91cf","day_not_available":"\u5f53\u65e5\u65e0\u8d27","day_yes_available":"\u5f53\u65e5\u6709\u8d27","Already_buy":"\u5df2\u8d2d\u4e70","Already_buy_two":"\u4ef6\u5546\u54c1\u8fbe\u5230\u9650\u8d2d\u6761\u4ef6,\u65e0\u6cd5\u518d\u8d2d\u4e70","Already_buy_three":"\u4ef6\u8be5\u5546\u54c1,\u53ea\u80fd\u518d\u8d2d\u4e70","goods_buy_empty_p":"\u5546\u54c1\u6570\u91cf\u4e0d\u80fd\u5c11\u4e8e1\u4ef6","goods_number_p":"\u5546\u54c1\u6570\u91cf\u5fc5\u987b\u4e3a\u6570\u5b57","search_one":"\u8bf7\u586b\u5199\u7b5b\u9009\u4ef7\u683c","search_two":"\u8bf7\u586b\u5199\u7b5b\u9009\u5de6\u8fb9\u4ef7\u683c","search_three":"\u8bf7\u586b\u5199\u7b5b\u9009\u53f3\u8fb9\u4ef7\u683c","search_four":"\u5de6\u8fb9\u4ef7\u683c\u4e0d\u80fd\u5927\u4e8e\u6216\u7b49\u4e8e\u53f3\u8fb9\u4ef7\u683c","jian":"\u4ef6","letter":"\u4ef6","inventory":"\u5b58\u8d27","move_collection":"\u79fb\u81f3\u6211\u7684\u6536\u85cf","select_shop":"\u8bf7\u9009\u62e9\u5957\u9910\u5546\u54c1","Parameter_error":"\u53c2\u6570\u9519\u8bef","screen_price":"\u8bf7\u586b\u5199\u7b5b\u9009\u4ef7\u683c","screen_price_left":"\u8bf7\u586b\u5199\u7b5b\u9009\u5de6\u8fb9\u4ef7\u683c","screen_price_right":"\u8bf7\u586b\u5199\u7b5b\u9009\u53f3\u8fb9\u4ef7\u683c","screen_price_dy":"\u5de6\u8fb9\u4ef7\u683c\u4e0d\u80fd\u5927\u4e8e\u6216\u7b49\u4e8e\u53f3\u8fb9\u4ef7\u683c","invoice_ok":"\u4fdd\u5b58\u53d1\u7968\u4fe1\u606f","invoice_desc_null":"\u8f93\u5165\u5185\u5bb9\u4e0d\u80fd\u4e3a\u7a7a\uff01","invoice_desc_number":"\u60a8\u6700\u591a\u53ef\u4ee5\u6dfb\u52a03\u4e2a\u516c\u53f8\u53d1\u7968\uff01","invoice_packup":"\u8bf7\u9009\u62e9\u6216\u586b\u5199\u53d1\u7968\u62ac\u5934\u90e8\u5206\uff01","invoice_tax_null":"\u8bf7\u586b\u5199\u7eb3\u7a0e\u4eba\u8bc6\u522b\u7801","add_address_10":"\u6700\u591a\u53ea\u80fd\u6dfb\u52a010\u4e2a\u6536\u8d27\u5730\u5740","msg_phone_not":"\u624b\u673a\u53f7\u7801\u4e0d\u6b63\u786e","captcha_not":"\u9a8c\u8bc1\u7801\u4e0d\u80fd\u4e3a\u7a7a","captcha_xz":"\u8bf7\u8f93\u51654\u4f4d\u6570\u7684\u9a8c\u8bc1\u7801","captcha_cw":"\u9a8c\u8bc1\u7801\u9519\u8bef","Detailed_map":"\u8be6\u7ec6\u5730\u56fe","email_error":"\u90ae\u7bb1\u683c\u5f0f\u4e0d\u6b63\u786e\uff01","bid_prompt_null":"\u4ef7\u683c\u4e0d\u80fd\u4e3a\u7a7a!","bid_prompt_error":"\u4ef7\u683c\u8f93\u5165\u683c\u5f0f\u4e0d\u6b63\u786e\uff01","mobile_error_goods":"\u624b\u673a\u683c\u5f0f\u4e0d\u6b63\u786e\uff01","null_email_goods":"\u90ae\u7bb1\u4e0d\u80fd\u4e3a\u7a7a","select_store":"\u8bf7\u9009\u62e9\u95e8\u5e97\uff01","Product_spec_prompt":"\u8bf7\u9009\u62e9\u5546\u54c1\u89c4\u683c\u7c7b\u578b","reply_desc_one":"\u56de\u590d\u5e16\u5b50\u5185\u5bb9\u4e0d\u80fd\u4e3a\u7a7a","go_shoping":"\u53bb\u8d2d\u7269","highest_price":"\u5df2\u662f\u6700\u9ad8\u4ef7\uff01","lowest_price":"\u5df2\u662f\u6700\u4f4e\u4ef7\uff01","no_history":"\u60a8\u5df2\u6e05\u7a7a\u6700\u8fd1\u6d4f\u89c8\u8fc7\u7684\u5546\u54c1","receive_coupons":"\u9886\u53d6\u4f18\u60e0\u5238","Immediate_use":"\u7acb\u5373\u4f7f\u7528","no_enabled":"\u5173\u95ed"};
//加载效果
var load_cart_info = '<img src="/static/Home/img/loadGoods.gif" height="108" class="ml100">';
var load_icon = '<img src="/static/Home/img/load.gif" width="200" height="200">';
</script><link rel="stylesheet" type="text/css" href="/static/Home/css/suggest.css" />
<link rel="stylesheet" type="text/css" href="/static/Home/css/select.css" />
<link rel="stylesheet" type="text/css" href="js/perfect-scrollbar/perfect-scrollbar.min.css" />
</head>
<body>
<div class="site-nav" id="site-nav">
    <div class="w w<?php if(isset($showRight)){echo $showRight;}else{echo 1390;}?>">
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
<div class="header">
    <div class="w w<?php if(isset($showRight)){echo $showRight;}else{echo 1390;}?>">
        <div class="logo">
            <div class="logoImg"><a href="/"><img src="/static/Home/img/logo.png" /></a></div>
        </div>
        <div class="dsc-search">
            <div class="form">
                <form id="searchForm" name="searchForm" method="get" action="search.php" onSubmit="return checkSearchForm()" class="search-form">
                    <input autocomplete="off" onKeyUp="lookup(this.value);" name="keywords" type="text" id="keyword" value="<?php echo $confArr['seaVal']; ?>" class="search-text"/>
                    <input type="hidden" name="store_search_cmt" value="0">
                    <button type="submit" class="button button-goods" onclick="checkstore_search_cmt(0)" >搜商品</button>
                </form>
                <ul class="keyword">
                    <?php $seaKey = explode(',',$confArr['seaKey']);
                    foreach($seaKey as $k => $v):
?>
                    <li><a href="#" target="_blank"><?=$v?></a></li>
                    <?php endforeach;?>
                </ul>

                <div class="suggestions_box" id="suggestions" style="display:none;">
                    <div class="suggestions_list" id="auto_suggestions_list">
                        &nbsp;
                    </div>
                </div>

            </div>
        </div>
        <div class="shopCart" data-ectype="dorpdown" id="ECS_CARTINFO" data-carteveval="0">

            <div class="shopCart-con dsc-cm">
                <a href="#">
                    <i class="iconfont icon-carts"></i>
                    <span>我的购物车</span>
                    <em class="count cart_num"></em>
                </a>
            </div>
            <div class="dorpdown-layer" ectype="dorpdownLayer">
                <div class="prompt"><div class="nogoods"><b></b><span>购物车中还没有商品，赶紧选购吧！</span></div></div>
            </div>

            <script type="text/javascript">
                $.ajax({
                    url:"<?php echo url('index/flow/getCartNum'); ?>",
                    type:'post',
                    success:function (data) {
                        $(".cart_num").text(data);
                    }
                });
                function changenum(rec_id, diff, warehouse_id, area_id)
                {
                    var cValue = $('#cart_value').val();
                    var goods_number =Number($('#goods_number_' + rec_id).text()) + Number(diff);

                    if(goods_number < 1)
                    {
                        return false;
                    }
                    else
                    {
                        change_goods_number(rec_id,goods_number, warehouse_id, area_id, cValue);
                    }
                }
                function change_goods_number(rec_id, goods_number, warehouse_id, area_id, cValue)
                {
                    if(cValue != '' || cValue == 'undefined'){
                        var cValue = $('#cart_value').val();
                    }
                    Ajax.call('flow.php?step=ajax_update_cart', 'rec_id=' + rec_id +'&goods_number=' + goods_number +'&cValue=' + cValue +'&warehouse_id=' + warehouse_id +'&area_id=' + area_id, change_goods_number_response, 'POST','JSON');
                }
                function change_goods_number_response(result)
                {
                    var rec_id = result.rec_id;
                    if (result.error == 0)
                    {
                        $('#goods_number_' +rec_id).val(result.goods_number);//更新数量
                        $('#goods_subtotal_' +rec_id).html(result.goods_subtotal);//更新小计
                        if (result.goods_number <= 0)
                        {
                            //数量为零则隐藏所在行
                            $('#tr_goods_' +rec_id).style.display = 'none';
                            $('#tr_goods_' +rec_id).innerHTML = '';
                        }
                        $('#total_desc').html(result.flow_info);//更新合计
                        if($('ECS_CARTINFO'))
                        

                        if(result.group.length > 0){
                            for(var i=0; i<result.group.length; i++){
                                $("#" + result.group[i].rec_group).html(result.group[i].rec_group_number);//配件商品数量
                                $("#" + result.group[i].rec_group_talId).html(result.group[i].rec_group_subtotal);//配件商品金额
                            }
                        }

                        $("#goods_price_" + rec_id).html(result.goods_price);
                        $(".cart_num").html(result.subtotal_number);
                    }
                    else if (result.message != '')
                    {
                        $('#goods_number_' +rec_id).val(result.cart_Num);//更新数量
                        alert(result.message);
                    }
                }

                function deleteCartGoods(rec_id,index)
                {
                    Ajax.call('delete_cart_goods.php', 'id='+rec_id+'&index='+index, deleteCartGoodsResponse, 'POST', 'JSON');
                }

                /**
                 * 接收返回的信息
                 */
                function deleteCartGoodsResponse(res)
                {
                    if (res.error)
                    {
                        alert(res.err_msg);
                    }
                    else if(res.index==1)
                    {
                        Ajax.call('get_ajax_content.php?act=get_content', 'data_type=cart_list', return_cart_list, 'POST', 'JSON');
                    }
                    else
                    {
                        $("#ECS_CARTINFO").html(res.content);
                        $(".cart_num").html(res.cart_num);
                    }
                }

                function return_cart_list(result)
                {
                    $(".cart_num").html(result.cart_num);
                    $(".pop_panel").html(result.content);
                    tbplHeigth();
                }
            </script>        </div>
    </div>
</div>
<div class="nav dsc-zoom">
    <div class="w w<?php if(isset($showRight)){echo $showRight;}else{echo 1390;}?>">
        <div class="categorys <?php if(!isset($siteMast)){echo 'site-mast';}?>">
            <div class="categorys-type"><a href="#" target="_blank">全部商品分类</a></div>
            <div class="categorys-tab-content">
                <div class="categorys-items" id="cata-nav">

                    <?php if(is_array($foreCateArr) || $foreCateArr instanceof \think\Collection || $foreCateArr instanceof \think\Paginator): $i = 0; $__LIST__ = $foreCateArr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <div class="categorys-item" ectype="cateItem" data-id="<?php echo $vo['id']; ?>" data-eveval="0">
                        <div class="item item-content">
                            <i class="iconfont <?php echo $vo['iconName']; ?>"></i>
                            <div class="categorys-title">
                                <strong>
                                    <a href="/category/<?php echo $vo['id']; ?>" target="_blank"><?php echo $vo['cateName']; ?></a>
                                </strong>
                                <span>
                                     <?php if(is_array($vo['children']) || $vo['children'] instanceof \think\Collection || $vo['children'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['children'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;if($i < 3): ?>
                                    <a href="/category/<?php echo $vo1['id']; ?>" target="_blank"><?php echo $vo1['cateName']; ?></a>
                                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                 </span>
                            </div>
                        </div>
                        <div class="categorys-items-layer" ectype="cateLayer">
                            <div class="cate-layer-con clearfix">
                                <div class="cate-layer-left">
                                    <div class="cate_channel" ectype="channels_<?php echo $vo['id']; ?>"></div>
                                    <div class="cate_detail" ectype="subitems_<?php echo $vo['id']; ?>"></div>
                                </div>
                                <div class="cate-layer-rihgt" ectype="brands_<?php echo $vo['id']; ?>"></div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>

                </div>
            </div>
        </div>
        <div class="nav-main" id="nav">
            <ul class="navitems">
                <li><a href="/" class="curr">首页</a></li>
                <?php if(is_array($navArr['2']) || $navArr['2'] instanceof \think\Collection || $navArr['2'] instanceof \think\Paginator): $i = 0; $__LIST__ = $navArr['2'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li><a href="<?php echo $vo['navUrl']; ?>"  <?php if($vo['open'] == 2): ?>target="_blank"<?php endif; ?>><?php echo $vo['navName']; ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
</div>
<script>
    var getGoodsCates = "<?php echo url('index/category/getGoodsCates'); ?>";
    var getBrands = "<?php echo url('index/brand/lst'); ?>";
</script>
    
<div class="hot-sales">
    <div class="hotsale w1390 w">
        <div class="hatsale-mt">热门推荐</div>
        <div class="bd">
            <ul>
            	    <li>
                    <div class="item">
                        <div class="p-img"><a href="#" target="_blank"><img src="/static/Home/img/0_thumb_G_1489100550574.jpg" /></a></div>
                        <div class="p-name"><a href="#" target="_blank">法国DK正品文胸套装女内衣性感蕾丝聚拢深V调整型小胸品牌收副乳 法国正品 蕾丝性感 原装包装 送女神必备</a></div>
                        <div class="p-price">
                        	    <em>¥</em>258.00                        </div>
                        <div class="p-btn"><a class="btn sc-redBg-btn" href="goods.php?id=630">立即购买</a></div>
                    </div>
                </li>
        <li>
                    <div class="item">
                        <div class="p-img"><a href="#" target="_blank"><img src="/static/Home/img/0_thumb_G_1490169030833.jpg" /></a></div>
                        <div class="p-name"><a href="#" title='韩都衣舍2017韩版女装夏装新款时尚修身显瘦圆领条纹T恤OGY7711娋 显瘦版型 舒适面料 条纹元素' target="_blank">韩都衣舍2017韩版女装夏装新款时尚修身显瘦圆领条纹T恤OGY7711娋 显瘦版型 舒适面料 条纹元素</a></div>
                        <div class="p-price">
                        	    <em>¥</em>88.00                        </div>
                        <div class="p-btn"><a class="btn sc-redBg-btn" href="goods.php?id=768">立即购买</a></div>
                    </div>
                </li>
        <li>
                    <div class="item">
                        <div class="p-img"><a href="#" target="_blank"><img src="/static/Home/img/0_thumb_G_1490169216444.jpg" /></a></div>
                        <div class="p-name"><a href="#" title='韩都衣舍2016新款秋冬款长袖连衣裙宽松学生冬季内搭打底裙子韩版 领券下单立减/单件包邮/先拍先发货！' target="_blank">韩都衣舍2016新款秋冬款长袖连衣裙宽松学生冬季内搭打底裙子韩版 领券下单立减/单件包邮/先拍先发货！</a></div>
                        <div class="p-price">
                        	    <em>¥</em>159.00                        </div>
                        <div class="p-btn"><a class="btn sc-redBg-btn" href="goods.php?id=773">立即购买</a></div>
                    </div>
                </li>
        <li class="last">
                    <div class="item">
                        <div class="p-img"><a href="#" target="_blank"><img src="/static/Home/img/0_thumb_G_1490169250846.jpg" /></a></div>
                        <div class="p-name"><a href="#" title='韩都衣舍秋冬喇叭长袖针织衫毛衣女套头宽松纯色百搭学生韩版打底 领券下单立减/单件包邮/先拍先发货！' target="_blank">韩都衣舍秋冬喇叭长袖针织衫毛衣女套头宽松纯色百搭学生韩版打底 领券下单立减/单件包邮/先拍先发货！</a></div>
                        <div class="p-price">
                        	    <em>¥</em>159.00                        </div>
                        <div class="p-btn"><a class="btn sc-redBg-btn" href="goods.php?id=774">立即购买</a></div>
                    </div>
                </li>
                        </ul>
            <a href="#" class="prev"></a>
            <a href="#" class="next"></a>
        </div>
    </div>
</div>
	<div class="w w1390">
    	<div class="crumbs-nav">
	<div class="crumbs-nav-main clearfix">
				<div class="crumbs-nav-item">
			<div class="menu-drop">
				<div class="trigger">
					<a href="#"><span>男装、女装、内衣</span></a>
					<i class="iconfont icon-down"></i>
				</div>
                				<div class="menu-drop-main">
					<ul>
			<li><a href="#">女装</a></li>
			<li><a href="#">男装</a></li>
			<li><a href="#">内衣</a></li>
			<li><a href="#">服饰配件</a></li>
			<li><a href="#">运动户外</a></li>
		</ul>
				</div>
                			</div>
			<i class="iconfont icon-right"></i>		</div>
				<div class="crumbs-nav-item">
			<div class="menu-drop">
				<div class="trigger">
					<a href="#"><span>女装</span></a>
					<i class="iconfont icon-down"></i>
				</div>
                				<div class="menu-drop-main">
					<ul>
			<li><a href="#">连衣裙</a></li>
			<li><a href="#">蕾丝/雪纺衫</a></li>
			<li><a href="#">衬衫</a></li>
			<li><a href="#">T恤</a></li>
			<li><a href="#">半身裙</a></li>
			<li><a href="#">休闲裤</a></li>
			<li><a href="#">短裤</a></li>
			<li><a href="#">牛仔裤</a></li>
			<li><a href="#">针织衫</a></li>
			<li><a href="#">吊带/背心</a></li>
			<li><a href="#">打底衫</a></li>
			<li><a href="#">打底裤</a></li>
			<li><a href="#">正装裤</a></li>
			<li><a href="#">小西服</a></li>
			<li><a href="#">马甲</a></li>
			<li><a href="#">风衣</a></li>
			<li><a href="#">羊毛衫</a></li>
			<li><a href="#">羊绒衫</a></li>
			<li><a href="#">短外套</a></li>
			<li><a href="#">棉服</a></li>
			<li><a href="#">毛呢大衣</a></li>
			<li><a href="#">加绒裤</a></li>
			<li><a href="#">羽绒服</a></li>
			<li><a href="#">皮草</a></li>
			<li><a href="#">真皮皮衣</a></li>
			<li><a href="#">仿皮皮衣</a></li>
			<li><a href="#">旗袍/唐装</a></li>
			<li><a href="#">礼服</a></li>
			<li><a href="#">婚纱</a></li>
			<li><a href="#">中老年女装</a></li>
			<li><a href="#">大码女装</a></li>
		</ul>
				</div>
                			</div>
					</div>
					</div>
</div>
    </div>
    <div class="container">
    	<div class="w w1390">
            <div class="selector">

<div class="right-extra" rewrite=0>
    <div class="u_cloose">
        <dl>
            <dt>已选条件：</dt>
            <dd>
    &nbsp;







</dd>
            <dd class="give_up_all"><a href="#" class="ftx-05">全部撤销</a></dd>
        </dl>
    </div>
	<div class="goods_list">
        <a href="" id="search"></a>
		<ul class="attr_father">
            <?php if($brandData): ?>
                        <li class="s-line">
                <div class="s-l-wrap brand_img attr_list">
                    <div class="s-l-tit brand_name_l">品牌：</div>
                    <div class="s-l-value attr_son">
                        <div class="price_auto fl">
                            <div class="price_range"><a <?php if(!input('brandId')): ?>class="btn sc-redBg-btn"<?php endif; ?> href="<?php echo url('index/category/index',['id' => $categoryId]),''; ?>">不限</a></div>
                            <?php if(is_array($brandData) || $brandData instanceof \think\Collection || $brandData instanceof \think\Paginator): $i = 0; $__LIST__ = $brandData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <div class="price_range"><a <?php if(input('brandId') == $vo['id']): ?>class="btn sc-redBg-btn"<?php endif; ?> href="<?php echo url('index/category/index',['id' => $categoryId,'brandId' => $vo['id']]),''; ?>"><?php echo $vo['brandName']; ?></a></div>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                    </div>
                </div>
            </li>
            <?php endif; if($priceSection): ?>
                        <li class="s-line">
                <dl class="s-l-wrap">
                    <div class="s-l-tit filter_attr_name">价格：</div>
                    <div class="s-l-value attr_son">
                        <div class="price_auto fl">
                            <div class="price_range">
                                <a <?php if(!input('price')): ?>class="btn sc-redBg-btn"<?php endif; ?> href="<?php echo url('index/category/index',['id' => $categoryId]),''; ?>">不限</a>
                            </div>
                            <?php if(is_array($priceSection) || $priceSection instanceof \think\Collection || $priceSection instanceof \think\Paginator): $i = 0; $__LIST__ = $priceSection;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <div class="price_range">
                                <a <?php if(input('price') == $vo): ?>class="btn sc-redBg-btn"<?php endif; ?> href="<?php echo url('index/category/index',['id' => $categoryId,'price' => $vo]),''; ?>"><?php echo $vo; ?></a>
                            </div>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                        <div class="price_auto price_bottom fl">
<input type="text" title="最低价" name="price_min" class="price_class price_min">
<span class="price_class span_price_class">-</span>
<input type="text" title="最高价" name="price_max" class="price_class price_max">
<button class="price_ok price_class">确定</button>
                        </div>
                    </div>
                </dl>
            </li>
            <?php endif; if(is_array($attrData) || $attrData instanceof \think\Collection || $attrData instanceof \think\Paginator): $i = 0; $__LIST__ = $attrData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <li class="s-line">
                <dl class="s-l-wrap">
                    <div class="s-l-tit filter_attr_name"><?php echo $vo['attrName']; ?>：</div>
                    <div class="s-l-value attr_son">
                        <div class="price_auto fl">
                            <?php if(is_array($vo['attrValues']) || $vo['attrValues'] instanceof \think\Collection || $vo['attrValues'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['attrValues'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?>
                            <div class="price_range"><a href="<?php echo $vo1; ?>"><?php echo $vo1; ?></a></div>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                    </div>
                </dl>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>



            		</ul>
    </div>
	<div class="click_more s-more"><span class="sm-wrap"><strong>更多选项</strong><i class="iconfont icon-down"></i></span></div>
</div>
            </div>
            <div class="filter">
        <div class="filter-wrap">
    <div class="filter-sort">
        <?php if($ob == 'xl' && $ow == 'desc'): ?>
        <a href="<?php echo url('index/category/index',['id' => $categoryId,'ob' => 'xl', 'ow' => 'asc']),''; ?>#search" class="curr">销量<i class="iconfont icon-arrow-down"></i></a>
        <?php elseif($ob == 'xl' && $ow == 'asc'): ?>
        <a href="<?php echo url('index/category/index',['id' => $categoryId,'ob' => 'xl', 'ow' => 'desc']),''; ?>#search" class="curr">销量<i class="iconfont icon-arrow-up"></i></a>
        <?php else: ?>
        <a href="<?php echo url('index/category/index',['id' => $categoryId,'ob' => 'xl', 'ow' => 'asc']),''; ?>#search" class="">销量<i class="iconfont icon-arrow-down"></i></a>
        <?php endif; if($ob == 'addTime' && $ow == 'desc'): ?>
        <a href="<?php echo url('index/category/index',['id' => $categoryId,'ob' => 'addTime', 'ow' => 'asc']),''; ?>#search" class="curr">新品<i class="iconfont icon-arrow-down"></i></a>
        <?php elseif($ob == 'addTime' && $ow == 'asc'): ?>
        <a href="<?php echo url('index/category/index',['id' => $categoryId,'ob' => 'addTime', 'ow' => 'desc']),''; ?>#search" class="curr">新品<i class="iconfont icon-arrow-up"></i></a>
        <?php else: ?>
        <a href="<?php echo url('index/category/index',['id' => $categoryId,'ob' => 'addTime', 'ow' => 'asc']),''; ?>#search" class="">新品<i class="iconfont icon-arrow-down"></i></a>
        <?php endif; if($ob == 'pl' && $ow == 'desc'): ?>
        <a href="<?php echo url('index/category/index',['id' => $categoryId,'ob' => 'pl', 'ow' => 'asc']),''; ?>#search" class="curr">评论数<i class="iconfont icon-arrow-down"></i></a>
        <?php elseif($ob == 'pl' && $ow == 'asc'): ?>
        <a href="<?php echo url('index/category/index',['id' => $categoryId,'ob' => 'pl', 'ow' => 'desc']),''; ?>#search" class="curr">评论数<i class="iconfont icon-arrow-up"></i></a>
        <?php else: ?>
        <a href="<?php echo url('index/category/index',['id' => $categoryId,'ob' => 'pl', 'ow' => 'asc']),''; ?>#search" class="">评论数<i class="iconfont icon-arrow-down"></i></a>
        <?php endif; if($ob == 'price' && $ow == 'desc'): ?>
        <a href="<?php echo url('index/category/index',['id' => $categoryId,'ob' => 'price', 'ow' => 'asc']),''; ?>#search" class="curr">价格<i class="iconfont icon-arrow-down"></i></a>
        <?php elseif($ob == 'price' && $ow == 'asc'): ?>
        <a href="<?php echo url('index/category/index',['id' => $categoryId,'ob' => 'price', 'ow' => 'desc']),''; ?>#search" class="curr">价格<i class="iconfont icon-arrow-up"></i></a>
        <?php else: ?>
        <a href="<?php echo url('index/category/index',['id' => $categoryId,'ob' => 'price', 'ow' => 'asc']),''; ?>#search" class="">价格<i class="iconfont icon-arrow-down"></i></a>
        <?php endif; ?>


    </div>
</div>    </div>
<div class="g-view w">
    <div class="goods-list" ectype="gMain">
                <div class="gl-warp gl-warp-large">
        	            <form name="compareForm" action="compare.php" method="post" onSubmit="return compareGoods(this);" class="goodslistForm" data-state="0">
                            <ul>
                                <?php if(is_array($goodsRes) || $goodsRes instanceof \think\Collection || $goodsRes instanceof \think\Paginator): $i = 0; $__LIST__ = $goodsRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                <li class="gl-item">
                                    <div class="gl-i-wrap">
                                        <div class="p-img"><a href="#" target="_blank"><?php if($vo['mdPic']): ?><?php echo showImage($vo['mdPic']); else: ?>图片暂缺<?php endif; ?></a></div>
                                        <div class="sider">
                                            <ul>
                                                <li class="curr"><?php echo showImage($vo['mdPic'],26,26); ?></li>
                                                <?php if(is_array($vo['photos']) || $vo['photos'] instanceof \think\Collection || $vo['photos'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['photos'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;if($vo1): ?>
                                                <li><?php echo showImage($vo1,26,26); ?></li>
                                                <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                            </ul>
                                        </div>
                                        <div class="p-lie">
                                            <div class="p-price"><em>¥</em><?php echo $vo['shopPrice']; ?></div>
                                            <div class="p-num">已售<em><?php echo $vo['xl']; ?></em>件<em> <?php echo $vo['pl']; ?></em>评论</div>
                                        </div>
                                        <div class="p-name"><a href="#" target="_blank" title="<?php echo $vo['goodsName']; ?>"><?php echo $vo['goodsName']; ?></a></div>
                                        <div class="p-store">
                                            <a href="http://wpa.qq.com/msgrd?v=3&uin=980172892&site=qq&menu=yes" title="联系客服" class="store">联系客服</a>
                                            <a href="http://wpa.qq.com/msgrd?v=3&uin=980172892&site=qq&menu=yes" class="p-kefu p-c-violet"><i class="iconfont icon-kefu"></i></a>
                                        </div>
                                        <div class="p-activity">
                                            <?php if(is_array($vo['recName']) || $vo['recName'] instanceof \think\Collection || $vo['recName'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['recName'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;switch($vo1): case "热卖商品": ?><span class="tag tac-mh"><i class="i-left"></i>热卖<i class="i-right"></i></span><?php break; case "新品推荐": ?><span class="tag tac-mn"><i class="i-left"></i>新品<i class="i-right"></i></span><?php break; case "精品推荐": ?><span class="tag tac-mb"><i class="i-left"></i>精品<i class="i-right"></i></span><?php break; case "限时抢购": ?><span class="tag tac-sr"><i class="i-left"></i>限时<i class="i-right"></i></span><?php break; default: ?><span class="tag tac-mn"><i class="i-left"></i>精品<i class="i-right"></i></span>
                                                <?php endswitch; endforeach; endif; else: echo "" ;endif; ?>
                                        </div>
                                    </div>
                                </li>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </form>
                        <div id="flyItem" class="fly_item"><img src="" width="40" height="40"></div>
        </div>

    </div>
    <div class="goods-spread">
    <a href="#" class="g-stop" ectype="gstop"><i class="iconfont icon-right"></i></a>
    <div class="gs-warp">
        <div class="gs-tit">推广商品</div>
        <ul class="gs-list">
<li class="opacity_img">
                <div class="">
                        <div class="p-img"><a href="#" target="_blank"><img src="/static/Home/img/0_thumb_G_1489100550574.jpg" width="190" height="190"></a></div>
                        <div class="p-price">
                        <em>¥</em>258.00                    </div>
                    <div class="p-name"><a href="#" target="_blank" title='法国DK正品文胸套装女内衣性感蕾丝聚拢深V调整型小胸品牌收副乳 法国正品 蕾丝性感 原装包装 送女神必备'>法国DK正品文胸套装女内衣性感蕾丝聚拢深V调整型小胸品牌收副乳 法国正品 蕾丝性感 原装包装 送女神必备</a></div>
                    <div class="p-num">已售<em>0</em>件</div>
                </div>
            </li>
                    </ul>
    </div>
</div>
</div>            
            <div class="p-panel-main guess-love">
            	<div class="ftit ftit-delr"><h3>猜你喜欢</h3></div>
                <div class="gl-list clearfix">
                	<ul class="clearfix">
            	<li class="opacity_img">
                        	<div class="p-img"><a href="#" target="_blank"><img src="/static/Home/img/0_thumb_G_1489109583798.jpg" width="190" height="190"></a></div>
<div class="p-price">
            <em>¥</em>555.00    </div>
<div class="p-name"><a href="#" target="_blank">【情侣款】Camel骆驼男靴 时尚潮流英伦风马丁靴高帮皮靴 爆卖1万双！ 情侣马丁靴 好评如潮</a></div>
                        	<div class="p-num">已售<em>35</em>件</div>
                        </li>
            </ul>
                </div>
            </div>
        </div>
    </div>
<div class="mui-mbar-tabs">
    <div class="quick_link_mian" data-userid="0">
        <div class="quick_links_panel">
            <div id="quick_links" class="quick_links">
                <ul>
                    <li>
                        <a href="#"><i class="setting"></i></a>
                        <div class="ibar_login_box status_login">
                            <div class="avatar_box">
                                <p class="avatar_imgbox">
                                    <img src="/static/Home/img/touxiang.jpg" width="100" height="100"/>
                                </p>
                                <ul class="user_info">
                                    <li>用户名：暂无</li>
                                    <li>级&nbsp;别：暂无</li>
                                </ul>
                            </div>
                            <div class="login_btnbox">
                                <a href="#" class="login_order">我的订单</a>
                                <a href="#" class="login_favorite">我的收藏</a>
                            </div>
                            <i class="icon_arrow_white"></i>
                        </div>
                    </li>

                    <li id="shopCart">
                        <a href="#" class="cart_list">
                            <i class="message"></i>
                            <div class="span">购物车</div>
                            <span class="cart_num">0</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="mpbtn_order"><i class="chongzhi"></i></a>
                        <div class="mp_tooltip">
                            <font id="mpbtn_money" style="font-size:12px; cursor:pointer;">我的订单</font>
                            <i class="icon_arrow_right_black"></i>
                        </div>
                    </li>
                    <li>
                        <a href="#" class="mpbtn_yhq"><i class="yhq"></i></a>
                        <div class="mp_tooltip">
                            <font id="mpbtn_money" style="font-size:12px; cursor:pointer;">优惠券</font>
                            <i class="icon_arrow_right_black"></i>
                        </div>
                    </li>
                    <li>
                        <a href="#" class="mpbtn_total"><i class="view"></i></a>
                        <div class="mp_tooltip" style=" visibility:hidden;">
                            <font id="mpbtn_myMoney" style="font-size:12px; cursor:pointer;">我的资产</font>
                            <i class="icon_arrow_right_black"></i>
                        </div>
                    </li>
                    <li>
                        <a href="#" class="mpbtn_history"><i class="zuji"></i></a>
                        <div class="mp_tooltip">
                            <font id="mpbtn_histroy" style="font-size:12px; cursor:pointer;">我的足迹</font>
                            <i class="icon_arrow_right_black"></i>
                        </div>
                    </li>
                    <li>
                        <a href="#" class="mpbtn_collection"><i class="wdsc"></i></a>
                        <div class="mp_tooltip">
                            <font id="mpbtn_wdsc" style="font-size:12px; cursor:pointer;">我的收藏</font>
                            <i class="icon_arrow_right_black"></i>
                        </div>
                    </li>
                    <li>
                        <a href="#" class="mpbtn_email"><i class="email"></i></a>
                        <div class="mp_tooltip">
                            <font id="mpbtn_email" style="font-size:12px; cursor:pointer;">邮箱订阅</font>
                            <i class="icon_arrow_right_black"></i>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="quick_toggle">
                <ul>
                    <li>


                        <a id="IM" IM_type="dsc" onclick="openWin(this)" href="javascript:;"><i class="kfzx"></i></a>
                        <div class="mp_tooltip">客服中心<i class="icon_arrow_right_black"></i></div>

                    </li>
                    <li class="returnTop">
                        <a href="#" class="return_top"><i class="top"></i></a>
                    </li>
                </ul>

            </div>
        </div>
        <div id="quick_links_pop" class="quick_links_pop"></div>
    </div>
</div>
<div class="email_sub">
	<div class="attached_bg"></div>
	<div class="w1200">
        <div class="email_sub_btn">
            <input type="input" id="user_email" name="user_email" autocomplete="off" placeholder="请输入您的邮箱帐号">
            <a href="#" onClick="add_email_list();" class="emp_btn">订阅</a>
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

    <script type="text/javascript" src="/static/Home/js/cart_common.js"></script>
    <script type="text/javascript" src="/static/Home/js/parabola.js"></script>
    <script type="text/javascript" src="/static/Home/js/shopping_flow.js"></script>
    <script type="text/javascript" src="/static/Home/js/cart_quick_links.js"></script>
    <script type="text/javascript" src="/static/Home/js/jd_choose.js"></script>
    <script type="text/javascript" src="/static/Home/js/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script type="text/javascript" src="/static/Home/js/dsc-common.js"></script>
    <script type="text/javascript" src="/static/Home/js/jquery.purebox.js"></script>
</body>
</html>
