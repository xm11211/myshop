<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"K:\AMP\day\myshop2\public/../application/admin\view\login\index.html";i:1530185412;}*/ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<!--Head-->
<head>
    <meta charset="utf-8" />
    <title>Login Page</title>

    <meta name="description" content="login page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="/static/Admin/img/favicon.png" type="image/x-icon">

    <!--Basic Styles-->
    <link href="/static/Admin/css/bootstrap.css" rel="stylesheet" />
    <link id="bootstrap-rtl-link" href="" rel="stylesheet" />
    <link href="/static/Admin/css/font-awesome.min.css" rel="stylesheet" />
    <!--Beyond styles-->
    <link href="/static/Admin/css/beyond.min.css" rel="stylesheet" />
    <link href="/static/Admin/css/demo.min.css" rel="stylesheet" />
    <link href="/static/Admin/css/animate.min.css" rel="stylesheet" />
    <link href="/static/Admin/css/base/admin.css" rel="stylesheet" />
    <link id="skin-link" href="" rel="stylesheet" type="text/css" />

    <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
    <script src="/static/Admin/js/skins.min.js"></script>
</head>
<!--Head Ends-->
<!--Body-->
<body>
<div class="login-container animated fadeInDown">
    <div class="loginbox bg-white">
        <div class="loginbox-title">后台登录</div>
        <form id="loginForm" action="" method="post" class="form-horizontal bv-form" novalidate="novalidate">
            <input type="hidden" name="validate" value="<?php echo \think\Request::instance()->session('validate'); ?>">
        <div class="loginbox-textbox form-group" style="margin-bottom:0;">
            <input type="text" class="form-control" name="adminName" placeholder="用户名" data-bv-field="adminName">
            <i class="form-control-feedback" data-bv-icon-for="adminName" style="display: none;"></i>
            <small class="help-block" data-bv-validator="notEmpty" data-bv-for="adminName" data-bv-result="NOT_VALIDATED" style="display: none;">用户名不能为空！</small>
        </div>
        <div class="loginbox-textbox form-group" style="margin-bottom:0;">
            <input type="password" class="form-control" name="password" placeholder="密码" data-bv-field="password">
            <i class="form-control-feedback" data-bv-icon-for="password" style="display: none;"></i>
            <small class="help-block" data-bv-validator="notEmpty" data-bv-for="password" data-bv-result="NOT_VALIDATED" style="display: none;">密码不能为空！</small>
        </div>
        <div class="loginbox-textbox form-group" style="margin-bottom:0;">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <input style="margin-left:-15px;" type="text" name="code" class="form-control" placeholder="验证码" data-bv-field="code"/>
                <i class="form-control-feedback" data-bv-icon-for="code" style="display: none;right:1px;"></i>
                <small class="help-block" data-bv-validator="notEmpty" data-bv-for="code" data-bv-result="NOT_VALIDATED" style="display: none;">验证码不能为空！</small>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <img id="chkcode" src="<?php echo url('admin/login/captcha'); ?>" alt="验证码" onclick="this.src='<?php echo url('admin/login/captcha'); ?>?' + Math.random()">
            </div>

        </div>
        <div class="loginbox-submit">
            <input type="submit" id="login" class="btn btn-primary btn-block" value="登录">
        </div>
        </form>
        <button id="errMsg" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger" style="display: none;">danger</button>
    </div>
</div>
<div id="modal-danger" class="modal modal-message modal-danger fade" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <i class="glyphicon glyphicon-fire"></i>
            </div>
            <div class="modal-title">警告！</div>

            <div class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">确认</button>
            </div>
        </div> <!-- / .modal-content -->
    </div> <!-- / .modal-dialog -->
</div>

<!--Basic Scripts-->
<script src="/static/Admin/js/jquery.min.js"></script>
<script src="/static/Admin/js/bootstrap.min.js"></script>
<script src="/static/Admin/js/slimscroll/jquery.slimscroll.min.js"></script>

<!--Beyond Scripts-->
<script src="/static/Admin/js/beyond.js"></script>
<!--bootstrap表单验证-->
<script src="/static/Admin/js/validation/bootstrapValidator.js"></script>
<script src="/static/Admin/js/bootbox/bootbox.js"></script>
<script>
    $(document).ready(function () {
        window.sessionStorage.removeItem('num');
        $('#loginForm').bootstrapValidator({
            excluded: [':disabled'],
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                adminName: {
                    validators: {
                        notEmpty: {
                            message: '用户名不能为空!'
                        },
                        stringLength: {
                            min: 1,
                            max: 30,
                            message: '请不要输入过长!'
                        }
                    }
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: '密码不能为空！'
                        },
                        stringLength: {
                            min: 1,
                            max: 30,
                            message: '请不要输入过长!'
                        }
                    }
                },
                code: {
                    validators: {
                        notEmpty: {
                            message: '验证码不能为空！'
                        },
                        stringLength: {
                            min: 4,
                            max: 4,
                            message: '请输入4位验证码!'
                        }
                    }
                },
            }
        }).on("success.form.bv",function(e){
            e.preventDefault();
            var formData = new FormData($("#loginForm")[0]);
            $.ajax({
                url:"<?php echo url('/xm11211'); ?>",
                method:'post',
                cache:false,
                data:formData,
                processData: false,
                contentType: false,
                success: function(data, textStatus, request){
                    switch(data.msg){
                        case "4":
                            $(".modal-body").text("验证码错误！");
                            $("#chkcode").click();
                            $("#errMsg").click();
                            break;
                        case "2":
                            $(".modal-body").text("密码错误！");
                            $("#chkcode").click();
                            $("#errMsg").click();
                            break;
                        case "1":
                            $(".modal-body").text("用户名不存在！");
                            $("#chkcode").click();
                            $("#errMsg").click();
                            break;
                        case "5":
                            location.href = "<?=SITEURL?>";
                            break;
                        case "success":              
                            location.href = data.url;
                            break;
                        default:
                            $(".modal-body").text("未知错误，请联系管理员！");
                            $("#errMsg").click();
                            break;
                    }
                }
            });
        });
    });
    $("input[name=code]").on('input',function () {
        $("i[data-bv-icon-for=code]").css('right','0');
        $("small[data-bv-for=code]").css('marginLeft','-15px');
    });
    $("#login").on('click',function () {
        $("i[data-bv-icon-for=code]").css('right','0');
        $("small[data-bv-for=code]").css('marginLeft','-15px');
    });

    </script>

</body>
<!--Body Ends-->
</html>
