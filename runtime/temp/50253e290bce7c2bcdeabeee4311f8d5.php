<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:48:"K:\AMP\day\myshop\thinkphp\tpl\dispatch_jump.tpl";i:1519087354;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
    <title>提示信息</title>
    <script src="/static/plugins/layer/jquery.min.js"></script>
    <script src="/static/plugins/layer/layer.js"></script>
</head>
<body>
<input type="hidden" id="msg" name="msg" value="<?php
if(isset($msg)){
	echo($msg);
}
?>" />
<input type="hidden" id="url" name="url" value="<?php echo($url); ?>" />
<input type="hidden" id="wait" name="wait" value="<?php echo($wait); ?>" />
<script type="text/javascript">
    (function(){
// var wait = document.getElementById('wait'),href = document.getElementById('href').href;
        var msg=$("#msg").val();
        var url=$("#url").val();
        var wait=$("#wait").val();
        layer.open({
            content: msg + "<br /><span id='num'>" + wait + "</span>秒后返回",
            btn: ['确定'],
            yes: function(index, layero){
                //按钮【按钮一】的回调
                location.href=url;
            },
            cancel: function(){
                //右上角关闭回调
                location.href=url;
            },
            success: function () {
                var interval = setInterval(function(){
                    $("#num").text(--wait);
                    if(wait <= 0) {
                        clearInterval(interval);
                        location.href = url;
                    };
                }, 1000);
            }
        });
    })();
</script>
</body>
</html>
