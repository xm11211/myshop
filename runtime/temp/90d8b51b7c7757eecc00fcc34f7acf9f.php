<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"/www/wwwroot/www.xxsucai.com/public/../application/index/view/flow/wxPay.html";i:1530604402;}*/ ?>


<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Language" content="zh-cn">
    <meta name="apple-mobile-web-app-capable" content="no"/>
    <meta name="apple-touch-fullscreen" content="yes"/>
    <meta name="format-detection" content="telephone=no,email=no"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="white">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Cache-control" content="no-cache">
    <meta http-equiv="Cache" content="no-cache">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>微信扫码支付</title>
    <link href="/static/Home/css/wxpay.css" rel="stylesheet" media="screen">
    <link href="/static/Home/css/font-awesome.min.css" rel="stylesheet" media="screen">
    <style>
        .text-success{
            color: #468847;
            font-size: 2.33333333em;
        }
        .text-center {
            text-align: center;
        }
    </style>
    <script type="text/javascript" src="/static/Home/js/jquery-1.9.1.min.js"></script>
</head>

<body>
<div class="body">
    <h1 class="mod-title">
        <span class="ico_log ico-3"></span>
    </h1>

    <div class="mod-ct">
        <div class="order">
        </div>
        <div class="amount" id="money">￥<?php echo $orderTotalPrice; ?></div>
        <div class="qrcode-img-wrapper" data-role="qrPayImgWrapper">
            <div data-role="qrPayImg" class="qrcode-img-area">
                <div class="ui-loading qrcode-loading" data-role="qrPayImgLoading" style="display: none;">加载中</div>
                <div style="position: relative;display: inline-block;">
                    <img src="<?php echo url('index/flow/wxewm',array('outTradeNo' => $outTradeNo,'orderTotalPrice' => $orderTotalPrice),''); ?>">
                </div>
            </div>
        </div>

        <div class="tip">
            <div class="ico-scan"></div>
            <div class="tip-text">
                <p>请使用微信扫一扫</p>
                <p>扫描二维码完成支付</p>
            </div>
        </div>


        <div class="tip-text">
        </div>


    </div>
    <div class="foot">
        <div class="inner">
            <p>手机用户可保存上方二维码到手机中</p>
            <p>在微信扫一扫中选择“相册”即可</p>
        </div>
    </div>

</div>
<div class="copyRight">

</div>


<script>
    var outTradeNo = "<?php echo $outTradeNo; ?>";
    var url = "<?php echo $siteurl; ?>/paySuccess?out_trade_no=<?php echo $outTradeNo; ?>";
    var timer = setInterval(function () {
        $.ajax({
            method:'post',
            url:"<?php echo url('index/flow/wxStatus'); ?>",
            data:{outTradeNo:outTradeNo},
            success:function (data) {
                if(data == 1) {
                    var str = '<h1 class="text-center text-success"><strong><i class="fa fa-check fa-lg"></i> 支付成功</strong></h1>';
                    $('.qrcode-img-wrapper').remove();
                    $('.amount').after(str);
                    clearInterval(timer);
                    setTimeout(function () {
                        top.location.href = url;
                    },3000);
                }
            }
        });
    },2000);
</script>
</body>
</html>