<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:69:"K:\AMP\day\myshop2\public/../application/admin\view\goods\photos.html";i:1519346392;s:53:"K:\AMP\day\myshop2\application\admin\view\layout.html";i:1515386558;s:60:"K:\AMP\day\myshop2\application\admin\view\Common\header.html";i:1535520340;s:60:"K:\AMP\day\myshop2\application\admin\view\Common\footer.html";i:1515571090;}*/ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- Head -->
<head>
    <meta charset="utf-8" />
    <title>Dashboard</title>

    <meta name="description" content="Dashboard" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="robots" content="noindex,nofollow" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="/static/favicon.ico" type="image/x-icon">
    <!--Basic Styles-->
    <link href="/static/Admin/css/bootstrap.css" rel="stylesheet" />
    <link id="bootstrap-rtl-link" href="" rel="stylesheet" />
    <link href="/static/Admin/css/font-awesome.min.css" rel="stylesheet" />
    <link href="/static/Admin/css/weather-icons.min.css" rel="stylesheet" />

    <!--Fonts-->
    <link href="/static/Admin/css/googlefonts1.css" rel="stylesheet" type="text/css">
    <link href='/static/Admin/css/googlefonts2.css' rel='stylesheet' type='text/css'>
    <!--Beyond styles-->
    <link href="/static/Admin/css/beyond.min.css" rel="stylesheet" type="text/css" />
    <link href="/static/Admin/css/demo.min.css" rel="stylesheet" />
    <link href="/static/Admin/css/typicons.min.css" rel="stylesheet" />
    <link href="/static/Admin/css/animate.min.css" rel="stylesheet" />
    <link id="skin-link" href="" rel="stylesheet" type="text/css" />
    <!--myadmin styles-->
    <link href="/static/Admin/css/base/admin.css" rel="stylesheet" />
    <link href="/static/Admin/css/base/page.css" rel="stylesheet" />
    <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
    <script src="/static/Admin/js/skins.min.js"></script>
    <script src="/static/Admin/js/jquery.min.js"></script>
</head>
<!-- /Head -->
<!-- Body -->
<body>
<!-- Loading Container -->
<div class="loading-container">
    <div class="loader"></div>
</div>
<!--  /Loading Container -->
<!-- Navbar -->
<div class="navbar">
    <div class="navbar-inner">
        <div class="navbar-container">
            <!-- Navbar Barnd -->
            <div class="navbar-header pull-left">
                <a href="#" class="navbar-brand">
                    <small>
                        <img src="/static/Admin/img/tp5.png" alt="" />
                    </small>
                </a>
            </div>
            <!-- /Navbar Barnd -->
            <!-- Sidebar Collapse -->
            <div class="sidebar-collapse" id="sidebar-collapse">
                <i class="collapse-icon fa fa-bars"></i>
            </div>
            <!-- /Sidebar Collapse -->
            <!-- Account Area and Settings --->
            <div class="navbar-header pull-right">
                <div class="navbar-account">
                    <ul class="account-area">
                        <li>
                            <a class=" dropdown-toggle" data-toggle="dropdown" title="Notifications" href="#">
                                <i class="icon fa fa-warning"></i>
                            </a>
                            <!--Notification Dropdown-->
                            <ul class="pull-right dropdown-menu dropdown-arrow dropdown-notifications">
                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                            <div class="notification-icon">
                                                <i class="fa fa-phone bg-themeprimary white"></i>
                                            </div>
                                            <div class="notification-body">
                                                <span class="title">Skype meeting with Patty</span>
                                                <span class="description">01:00 pm</span>
                                            </div>
                                            <div class="notification-extra">
                                                <i class="fa fa-clock-o themeprimary"></i>
                                                <span class="description">office</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                            <div class="notification-icon">
                                                <i class="fa fa-check bg-darkorange white"></i>
                                            </div>
                                            <div class="notification-body">
                                                <span class="title">Uncharted break</span>
                                                <span class="description">03:30 pm - 05:15 pm</span>
                                            </div>
                                            <div class="notification-extra">
                                                <i class="fa fa-clock-o darkorange"></i>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                            <div class="notification-icon">
                                                <i class="fa fa-gift bg-warning white"></i>
                                            </div>
                                            <div class="notification-body">
                                                <span class="title">Kate birthday party</span>
                                                <span class="description">08:30 pm</span>
                                            </div>
                                            <div class="notification-extra">
                                                <i class="fa fa-calendar warning"></i>
                                                <i class="fa fa-clock-o warning"></i>
                                                <span class="description">at home</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                            <div class="notification-icon">
                                                <i class="fa fa-glass bg-success white"></i>
                                            </div>
                                            <div class="notification-body">
                                                <span class="title">Dinner with friends</span>
                                                <span class="description">10:30 pm</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-footer ">
                                        <span>
                                            Today, March 28
                                        </span>
                                    <span class="pull-right">
                                            10°c
                                            <i class="wi wi-cloudy"></i>
                                        </span>
                                </li>
                            </ul>
                            <!--/Notification Dropdown-->
                        </li>
                        <li>
                            <a class="dropdown-toggle" data-toggle="dropdown" title="Mails" href="#">
                                <i class="icon fa fa-envelope"></i>
                                <span class="badge">3</span>
                            </a>
                            <!--Messages Dropdown-->
                            <ul class="pull-right dropdown-menu dropdown-arrow dropdown-messages">
                                <li>
                                    <a href="#">
                                        <img src="/static/Admin/img/avatars/divyia.jpg" class="message-avatar" alt="Divyia Austin">
                                        <div class="message">
                                                <span class="message-sender">
                                                    Divyia Austin
                                                </span>
                                            <span class="message-time">
                                                    2 minutes ago
                                                </span>
                                            <span class="message-subject">
                                                    Here's the recipe for apple pie
                                                </span>
                                            <span class="message-body">
                                                    to identify the sending application when the senders image is shown for the main icon
                                                </span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="/static/Admin/img/avatars/bing.png" class="message-avatar" alt="Microsoft Bing">
                                        <div class="message">
                                                <span class="message-sender">
                                                    Bing.com
                                                </span>
                                            <span class="message-time">
                                                    Yesterday
                                                </span>
                                            <span class="message-subject">
                                                    Bing Newsletter: The January Issue‏
                                                </span>
                                            <span class="message-body">
                                                    Discover new music just in time for the Grammy® Awards.
                                                </span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="/static/Admin/img/avatars/adam-jansen.jpg" class="message-avatar" alt="Divyia Austin">
                                        <div class="message">
                                                <span class="message-sender">
                                                    Nicolas
                                                </span>
                                            <span class="message-time">
                                                    Friday, September 22
                                                </span>
                                            <span class="message-subject">
                                                    New 4K Cameras
                                                </span>
                                            <span class="message-body">
                                                    The 4K revolution has come over the horizon and is reaching the general populous
                                                </span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <!--/Messages Dropdown-->
                        </li>
                        <li>
                            <a class="dropdown-toggle" data-toggle="dropdown" title="Tasks" href="#">
                                <i class="icon fa fa-tasks"></i>
                                <span class="badge">4</span>
                            </a>
                            <!--Tasks Dropdown-->
                            <ul class="pull-right dropdown-menu dropdown-tasks dropdown-arrow ">
                                <li class="dropdown-header bordered-darkorange">
                                    <i class="fa fa-tasks"></i>
                                    4 Tasks In Progress
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                            <span class="pull-left">Account Creation</span>
                                            <span class="pull-right">65%</span>
                                        </div>

                                        <div class="progress progress-xs">
                                            <div style="width:65%" class="progress-bar"></div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                            <span class="pull-left">Profile Data</span>
                                            <span class="pull-right">35%</span>
                                        </div>

                                        <div class="progress progress-xs">
                                            <div style="width:35%" class="progress-bar progress-bar-success"></div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                            <span class="pull-left">Updating Resume</span>
                                            <span class="pull-right">75%</span>
                                        </div>

                                        <div class="progress progress-xs">
                                            <div style="width:75%" class="progress-bar progress-bar-darkorange"></div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                            <span class="pull-left">Adding Contacts</span>
                                            <span class="pull-right">10%</span>
                                        </div>

                                        <div class="progress progress-xs">
                                            <div style="width:10%" class="progress-bar progress-bar-warning"></div>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-footer">
                                    <a href="#">
                                        See All Tasks
                                    </a>
                                    <button class="btn btn-xs btn-default shiny darkorange icon-only pull-right"><i class="fa fa-check"></i></button>
                                </li>
                            </ul>
                            <!--/Tasks Dropdown-->
                        </li>
                        <li >
                            <a class="login-area dropdown-toggle" data-toggle="dropdown">
                                <div class="avatar" title="View your public profile">
                                    <?php echo showImage(\think\Request::instance()->session('adminPic'),'',''); ?>
                                </div>
                                <section>
                                    <h2><span class="profile"><span><?php echo \think\Request::instance()->session('adminName'); ?>，欢迎您！</span></span></h2>
                                </section>
                            </a>
                            <!--Login Area Dropdown-->
                            <ul class="pull-right dropdown-menu dropdown-arrow dropdown-login-area">
                                <li class="username"><a></a></li>
                                <!--Avatar Area-->
                                <li>
                                    <div class="avatar-area">
                                        <?php echo showImage(\think\Request::instance()->session('adminPic'),'','','avatar'); ?>
                                    </div>
                                </li>
                                <!--Avatar Area-->
                                <li class="edit">
                                    <a href="javascript:void(0);" class="pull-left">皮肤</a>
                                    <a href="<?php echo url('admin/edit',array('id'=>\think\Request::instance()->session('aid'))); ?>" class="pull-right">修改信息</a>
                                </li>
                                <!--Theme Selector Area-->
                                <li class="theme-area">
                                    <ul class="colorpicker" id="skin-changer">
                                        <li><a class="colorpick-btn" href="#" style="background-color:#5DB2FF;" rel="/static/Admin/css/skins/blue.min.css"></a></li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#2dc3e8;" rel="/static/Admin/css/skins/azure.min.css"></a></li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#03B3B2;" rel="/static/Admin/css/skins/teal.min.css"></a></li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#53a93f;" rel="/static/Admin/css/skins/green.min.css"></a></li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#FF8F32;" rel="/static/Admin/css/skins/orange.min.css"></a></li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#cc324b;" rel="/static/Admin/css/skins/pink.min.css"></a></li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#AC193D;" rel="/static/Admin/css/skins/darkred.min.css"></a></li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#8C0095;" rel="/static/Admin/css/skins/purple.min.css"></a></li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#0072C6;" rel="/static/Admin/css/skins/darkblue.min.css"></a></li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#585858;" rel="/static/Admin/css/skins/gray.min.css"></a></li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#474544;" rel="/static/Admin/css/skins/black.min.css"></a></li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#001940;" rel="/static/Admin/css/skins/deepblue.min.css"></a></li>
                                    </ul>
                                </li>
                                <!--/Theme Selector Area-->
                                <li class="dropdown-footer">
                                    <a href="<?php echo url('admin/logout'); ?>">
                                        登出
                                    </a>
                                </li>
                            </ul>
                            <!--/Login Area Dropdown-->
                        </li>
                        <li>
                            <a class="login-area dropdown-toggle" id="clearCache" title="清空缓存" href="javascript:void(0);">
                                <section>
                                    <h2><span class="profile"><span><i class="menu-icon fa fa-trash-o"></i>&nbsp;&nbsp;&nbsp;&nbsp;清空缓存</span></span></h2>
                                </section>
                            </a>
                        </li>
                        <!-- /Account Area -->
                        <!--Note: notice that setting div must start right after account area list.
                        no space must be between these elements-->
                        <!-- Settings -->
                    </ul><div class="setting">
                    <a id="btn-setting" title="Setting" href="#">
                        <i class="icon glyphicon glyphicon-cog"></i>
                    </a>
                </div><div class="setting-container">
                    <label>
                        <input type="checkbox" id="checkbox_fixednavbar">
                        <span class="text">Fixed Navbar</span>
                    </label>
                    <label>
                        <input type="checkbox" id="checkbox_fixedsidebar">
                        <span class="text">Fixed SideBar</span>
                    </label>
                    <label>
                        <input type="checkbox" id="checkbox_fixedbreadcrumbs">
                        <span class="text">Fixed BreadCrumbs</span>
                    </label>
                    <label>
                        <input type="checkbox" id="checkbox_fixedheader">
                        <span class="text">Fixed Header</span>
                    </label>
                </div>
                    <!-- Settings -->
                </div>
            </div>
            <!-- /Account Area and Settings -->
        </div>
    </div>
</div>
<button id="clearMsg" style="display: none;"></button>
<script>
    $("#clearCache").on('click',function () {
        $.ajax({
            method:'post',
            url:"<?php echo url('admin/clear'); ?>",
            success:function (data) {
                if(data == 1) {
                    judgeEvents("#clearMsg",'click','清除缓存成功！','success','fa-check','top-left');
                }else{
                    judgeEvents("#clearMsg",'click','清除缓存失败！','danger','fa-bolt','top-left');
                }
            }
        });
    });
</script>
<!-- /Navbar -->
<!-- Main Container -->
<div class="main-container container-fluid">
    <!-- Page Container -->
    <div class="page-container">

        <!-- Page Sidebar -->
        <div class="page-sidebar" id="sidebar">
            <!-- Page Sidebar Header-->
            <div class="sidebar-header-wrapper">
                <div class="searchhelper"></div>
            </div>
            <!-- /Page Sidebar Header -->
            <!-- Sidebar Menu -->
            <ul id="sidebar-menu" class="nav sidebar-menu">
                <!--Dashboard-->

                <?php if(authCheck('index/index', session('aid'))): ?>
                <li name="Index">
                    <a href="/Admin/Index/index">
                        <i class="menu-icon fa fa-dashboard"></i>
                        <span class="menu-text"> 控制台 </span>
                    </a>
                </li>
                <?php endif; if(authCheck('admin/lst', session('aid')) or authCheck('authRule/lst', session('aid')) or authCheck('authGroup/lst', session('aid'))): ?>
                <li>
                    <a href="#" class="menu-dropdown">
                        <i class="menu-icon fa fa-user"></i>
                        <span class="menu-text"> 管理员 </span>
                        <i class="menu-expand"></i>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="<?php echo url('admin/lst'); ?>">
                                <span class="menu-text">管理员列表</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo url('authRule/lst'); ?>">
                                <span class="menu-text">权限列表</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo url('authGroup/lst'); ?>">
                                <span class="menu-text">用户组</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php endif; if(authCheck('goods/lst', session('aid')) or authCheck('brand/lst', session('aid')) or authCheck('category/lst', session('aid')) or authCheck('type/lst', session('aid'))): ?>
                <li>
                    <a href="#" class="menu-dropdown">
                        <i class="menu-icon fa fa-shopping-cart"></i>
                        <span class="menu-text"> 商品管理 </span>
                        <i class="menu-expand"></i>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="<?php echo url('goods/lst'); ?>">
                                <span class="menu-text">商品列表</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo url('brand/lst'); ?>">
                                <span class="menu-text">商品品牌</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo url('category/lst'); ?>">
                                <span class="menu-text">商品分类</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo url('type/lst'); ?>">
                                <span class="menu-text">商品类型</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php endif; if(authCheck('categoryWords/lst', session('aid')) or authCheck('categoryBrands/lst', session('aid')) or authCheck('categoryAd/lst', session('aid'))): ?>
                <li>
                    <a href="#" class="menu-dropdown">
                        <i class="menu-icon fa fa-random"></i>
                        <span class="menu-text"> 栏目关联 </span>
                        <i class="menu-expand"></i>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="<?php echo url('categoryWords/lst'); ?>">
                                <span class="menu-text">推荐词关联</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo url('categoryBrands/lst'); ?>">
                                <span class="menu-text">品牌关联</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo url('categoryAd/lst'); ?>">
                                <span class="menu-text">楼层广告</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php endif; if(authCheck('recPos/lst', session('aid'))): ?>
                <li>
                    <a href="#" class="menu-dropdown">
                        <i class="menu-icon fa fa-thumbs-up"></i>
                        <span class="menu-text"> 推荐位管理 </span>
                        <i class="menu-expand"></i>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="<?php echo url('recPos/lst'); ?>">
                                <span class="menu-text">推荐位列表</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php endif; if(authCheck('goods/lst', session('aid')) or authCheck('authRule/lst', session('aid')) or authCheck('authGroup/lst', session('aid'))): ?>
                <li>
                    <a href="#" class="menu-dropdown">
                        <i class="menu-icon fa fa-money"></i>
                        <span class="menu-text"> 促销管理 </span>
                        <i class="menu-expand"></i>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="">
                                <span class="menu-text">促销活动</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span class="menu-text">积分商城</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span class="menu-text">优惠券</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php endif; if(authCheck('order/lst', session('aid')) or authCheck('authRule/lst', session('aid'))): ?>
                <li>
                    <a href="#" class="menu-dropdown">
                        <i class="menu-icon fa fa-legal"></i>
                        <span class="menu-text"> 订单管理 </span>
                        <i class="menu-expand"></i>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="<?php echo url('order/lst'); ?>">
                                <span class="menu-text">订单列表</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span class="menu-text">订单查询</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php endif; if(authCheck('memberLevel/lst', session('aid')) or authCheck('member/lst', session('aid')) or authCheck('authGroup/lst', session('aid'))): ?>
                <li>
                    <a href="#" class="menu-dropdown">
                        <i class="menu-icon fa fa-users"></i>
                        <span class="menu-text"> 会员管理 </span>
                        <i class="menu-expand"></i>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="<?php echo url('user/lst'); ?>">
                                <span class="menu-text">会员列表</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo url('memberLevel/lst'); ?>">
                                <span class="menu-text">会员级别</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span class="menu-text">会员留言</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php endif; if(authCheck('cate/lst', session('aid')) or authCheck('article/lst', session('aid'))): ?>
                <li>
                    <a href="#" class="menu-dropdown">
                        <i class="menu-icon fa fa-file-text"></i>
                        <span class="menu-text"> 文章管理 </span>
                        <i class="menu-expand"></i>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="<?php echo url('cate/lst'); ?>">
                                <span class="menu-text">文章栏目</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo url('article/lst'); ?>">
                                <span class="menu-text">文章列表</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php endif; if(authCheck('nav/lst', session('aid'))): ?>
                <li>
                    <a href="#" class="menu-dropdown">
                        <i class="menu-icon fa fa-location-arrow"></i>
                        <span class="menu-text"> 导航管理 </span>
                        <i class="menu-expand"></i>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="<?php echo url('nav/lst'); ?>">
                                <span class="menu-text">导航列表</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php endif; if(authCheck('picture/lst', session('aid')) OR authCheck('slider/lst', session('aid'))): ?>
                <li>
                    <a href="#" class="menu-dropdown">
                        <i class="menu-icon fa fa-picture-o"></i>
                        <span class="menu-text"> 图片管理 </span>
                        <i class="menu-expand"></i>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="<?php echo url('picture/lst'); ?>">
                                <span class="menu-text">图片列表</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo url('slider/lst'); ?>">
                                <span class="menu-text">轮播图</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php endif; if(authCheck('frlink/lst', session('aid'))): ?>
                <li>
                    <a href="#" class="menu-dropdown">
                        <i class="menu-icon fa fa-link"></i>
                        <span class="menu-text"> 友情链接管理 </span>
                        <i class="menu-expand"></i>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="<?php echo url('frlink/lst'); ?>">
                                <span class="menu-text">链接列表</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php endif; if(authCheck('goods/lst', session('aid')) or authCheck('authRule/lst', session('aid')) or authCheck('authGroup/lst', session('aid'))): ?>
                <li>
                    <a href="#" class="menu-dropdown">
                        <i class="menu-icon fa fa-sitemap"></i>
                        <span class="menu-text"> 数据库管理 </span>
                        <i class="menu-expand"></i>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="">
                                <span class="menu-text">数据备份</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span class="menu-text">数据表优化</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php endif; if(authCheck('goods/lst', session('aid')) or authCheck('authRule/lst', session('aid')) or authCheck('authGroup/lst', session('aid'))): ?>
                <li>
                    <a href="#" class="menu-dropdown">
                        <i class="menu-icon fa fa-envelope"></i>
                        <span class="menu-text"> 短信管理 </span>
                        <i class="menu-expand"></i>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="">
                                <span class="menu-text">数据备份</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span class="menu-text">数据表优化</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php endif; if(authCheck('Conf/lst', session('aid')) or authCheck('Conf/conf', session('aid'))): ?>
                <li>
                    <a href="#" class="menu-dropdown">
                        <i class="menu-icon fa fa-gear"></i>
                        <span class="menu-text"> 系统配置 </span>
                        <i class="menu-expand"></i>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="<?php echo url('Conf/lst'); ?>">
                                <span class="menu-text">配置列表</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo url('Conf/conf'); ?>">
                                <span class="menu-text">配置</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span class="menu-text">支付方式设置</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>
            </ul>
            <!-- /Sidebar Menu -->
        </div>
        <!-- /Page Sidebar -->
        <!-- Page Content -->
        <div class="page-content">
            <div class="page-breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="/admin/Index/index">首页</a>
                    </li>
                    <li class="active"><a href="<?php echo $plUrl; ?>"><?php echo $plName; ?></a></li>
                </ul>
            </div>
            <div class="page-header position-relative">
                <div class="header-title">
                    <h1>
                        <?php echo $plName; ?>
                        <small>
                            <i class="fa fa-angle-right"></i>
                            <?php echo $slName; ?>
                        </small>
                    </h1>
                </div>
            <!--Header Buttons-->
            <div class="header-buttons">
                <a class="sidebar-toggler" href="#">
                    <i class="fa fa-arrows-h"></i>
                </a>
                <a class="refresh" id="refresh-toggler" href="">
                    <i class="glyphicon glyphicon-refresh"></i>
                </a>
                <a class="fullscreen" id="fullscreen-toggler" href="#">
                    <i class="glyphicon glyphicon-fullscreen"></i>
                </a>
            </div>
            <!--Header Buttons End-->
        </div>
        <!-- /Page Header -->
        <!-- Page Body -->
        <div class="page-body">
            <section id="content">
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="widget  radius-bordered">
            <div class="widget-header bg-themeprimary">
                <span class="widget-caption">商品相册</span>
            </div>
            <div class="widget-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="well with-header">
                            <div class="header bordered-blueberry">添加图片</div>
                            <form action="" id="goodsPhotos" class="dropzone dz-clickable">
                                <div class="dz-default dz-message">
                                    <span>单击或拖拽</span>
                                </div>
                                <?php if($gpData): ?>
                                    <?php echo '<script>$("#goodsPhotos").addClass("dz-started")</script>'; if(is_array($gpData) || $gpData instanceof \think\Collection || $gpData instanceof \think\Paginator): $k = 0; $__LIST__ = $gpData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
                                        <div class="dz-preview dz-processing dz-image-preview dz-complete" name="<?php echo $vo['randString']; ?>">
                                            <div class="dz-image"><img data-dz-thumbnail=""  src="/static/upload/<?php echo $vo['smPhoto']; ?>" width="120"></div>
                                            <div class="dz-success-mark" style="opacity: 1;">
                                                <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="../www.bohemiancoding.com/sketch/ns">      <title>Check</title>      <defs></defs>      <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">        <path d="M23.5,31.8431458 L17.5852419,25.9283877 C16.0248253,24.3679711 13.4910294,24.366835 11.9289322,25.9289322 C10.3700136,27.4878508 10.3665912,30.0234455 11.9283877,31.5852419 L20.4147581,40.0716123 C20.5133999,40.1702541 20.6159315,40.2626649 20.7218615,40.3488435 C22.2835669,41.8725651 24.794234,41.8626202 26.3461564,40.3106978 L43.3106978,23.3461564 C44.8771021,21.7797521 44.8758057,19.2483887 43.3137085,17.6862915 C41.7547899,16.1273729 39.2176035,16.1255422 37.6538436,17.6893022 L23.5,31.8431458 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" id="Oval-2" stroke-opacity="0.198794158" stroke="#747474" fill-opacity="0.816519475" fill="#FFFFFF" sketch:type="MSShapeGroup"></path>      </g>    </svg>
                                            </div>
                                            <a style="margin-right:11px;margin-top:10px;cursor:pointer;" randString="<?php echo $vo['randString']; ?>" imgPath="<?php echo $vo['photo']; ?>" name="check1" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal"><i class="fa fa-check"></i> 查看</a>
                                            <a style="margin-top:10px;cursor:pointer;" randString="<?php echo $vo['randString']; ?>" name="del1" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal"><i class="fa fa-times"></i> 删除</a></div>
                                    <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="myModal" class="modal modal-primary fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><!--js来添加模态框标题--></h4>
            </div>
            <div class="modal-body">
                <!--js来添加模态框内容-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" id="myCancel" data-dismiss="modal">取消</button>
                <button type="button" class="btn btn-primary" id="myOk" data-dismiss="modal">确认</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!--Dropzone-->
<script src="/static/Admin/js/dropzone/dropzone.min.js"></script>
<!--商品相册-->
<script>
    $(function () {
        var myOk = $("#myOk");
        var myCancel = $("#myCancel");
        var events = null;
        Dropzone.autoDiscover = false;
        var id = $("input[name=id]").val();
        var goodsPhotos = new Dropzone("#goodsPhotos", {
            url: "admin/goods/photos/id/" + id,
            method: 'post',
            maxFilesize: 10,//文件最大容量
            acceptedFiles:".jpg,.png,.jpeg,.gif",
            parallelUploads:1,
            filesizeBase: 1024,
            success: function (file, response, e) {
                response = JSON.parse(response);
                if(response.success == 1){
                    $(".dz-success-mark").css('opacity', 1);
                    $(".dz-details").remove();
                    $(".dz-progress").remove();
                    $(".dz-error-message").remove();
                    $(".dz-error-mark").remove();
                    var str = response.randString;
                    var a = '<a style="margin-right:11px;margin-top:10px;cursor:pointer;" id="'+ str +'check" class="btn btn-primary btn-xs"  data-toggle="modal" data-target="#myModal">' +
                        '<i class="fa fa-check"></i> 查看' +
                        '</a>';
                    var a2 = '<a style="margin-top:10px;cursor:pointer;" id="'+ str +'del" class="btn btn-danger btn-xs"  data-toggle="modal" data-target="#myModal">' +
                        '<i class="fa fa-times"></i> 删除' +
                        '</a>';
                    $(".dz-preview:last").attr("name",str);
                    $(".dz-preview:last").append(a);
                    $(".dz-preview:last").append(a2);
                    $("#"+str+"check").on('click',function () {
                        var img = '<img src="/static/upload/'+response.imgPath+'" width="300" height="auto">';
                        $("#myModal .modal-body").html(img);
                        $("#myModal .modal-title").html("相册图片");
                        myCancel.removeClass('btn-warning').addClass('btn-primary').html("确认");
                        myOk.remove();
                    });

                    $("#"+str+"del").on('click',function () {
                        $("#myModal .modal-body").html('确认删除吗？');
                        $("#myModal .modal-title").html("提示信息");
                        myCancel.removeClass('btn-primary').addClass('btn-warning').html("取消");
                        $("#myModal .modal-footer").append(myOk);
                        events = $._data(myOk[0],"events");
                        if(events && events["click"]){
                            myOk.off("click");
                            ajaxDelPhotos(myOk,str);
                        }else {
                            ajaxDelPhotos(myOk,str);
                        }
                    });
                }else{
                    alert('上传失败！错误原因：'+response.errormessage);
                    $(".dz-preview:last").remove();
                }
            },
            error: function (file,errormessage,xhr){
                alert('上传失败！错误原因：'+errormessage);
                $(".dz-preview:last").remove();
            },
            uploadprogress:function(file, progress, bytesSent) {
                $(".dz-upload").css('opacity',0.3);
                $(".dz-upload").css('width',progress+'%');
            }
        });
        <!--刷新相册页面，如果有图片，显示图片以及绑定相应事件的操作-->
        $("a[name=check1]").each(function (k, v) {
            $(v).on('click',function () {
                var imgPath = $(this).attr("imgPath");
                var img = '<img src="/static/upload/'+ imgPath +'" width="300" height="auto">';
                $("#myModal .modal-body").html(img);
                $("#myModal .modal-title").html("相册图片");
                myCancel.removeClass('btn-warning').addClass('btn-primary').html("确认");
                myOk.remove();
            })
        });
        $("a[name=del1]").each(function (k, v) {
            $(v).on('click',function () {
                $("#myModal .modal-body").html('确认删除吗？');
                $("#myModal .modal-title").html("提示信息");
                myCancel.removeClass('btn-primary').addClass('btn-warning').html("取消");
                $("#myModal .modal-footer").append(myOk);
                var str = $(this).attr("randString");
                events = $._data(myOk[0],"events");
                if(events && events["click"]){
                    myOk.off("click");
                    ajaxDelPhotos(myOk,str);
                }else {
                    ajaxDelPhotos(myOk,str);
                }
            })
        });
        function ajaxDelPhotos(myOk,str) {
            myOk.on('click', function () {
                $.ajax({
                    url: "<?php echo url('delPhotos'); ?>",
                    method: 'get',
                    data: {randString: "" + str + ""},
                    cache: false,
                    success: function (data) {
                        if (data == 1) {
                            $(".dz-preview[name=" + str + "]").remove();
                            <!--判断是否显示区域文字-->
                            if($(".dz-preview").length == 0) {
                                $("#goodsPhotos").removeClass("dz-started");
                            }
                        } else {
                            alert("删除失败！");
                        }
                    }
                });

            });
        }
        $("#sidebar-menu a[href*=goods" + "\\/"+ "lst]").parent().addClass('active').parent().parent().addClass('open');
    });
</script>






</section>
</div>
<!-- /Page Body -->
</div>
<!-- /Page Content -->

</div>
<!-- /Page Container -->
<!-- Main Container -->

</div>

<!--Basic Scripts-->
<script>var adminUrl = "/static/Admin/";</script>
<script src="/static/Admin/js/bootstrap.min.js"></script>
<script src="/static/Admin/js/slimscroll/jquery.slimscroll.min.js"></script>
<!--Beyond Scripts-->
<script src="/static/Admin/js/beyond.js"></script>
<!--Page Related Scripts-->
<script src="/static/Admin/js/bootbox/bootbox.js"></script>
<script src="/static/Admin/js/toastr/toastr.js"></script>
<!--myadmin js-->
<script src="/static/Admin/js/base/admin.js"></script>
<script>
    // If you want to draw your charts with Theme colors you must run initiating charts after that current skin is loaded
    $(window).bind("load", function () {

        /*Sets Themed Colors Based on Themes*/
        themeprimary = getThemeColorFromCss('themeprimary');
        themesecondary = getThemeColorFromCss('themesecondary');
        themethirdcolor = getThemeColorFromCss('themethirdcolor');
        themefourthcolor = getThemeColorFromCss('themefourthcolor');
        themefifthcolor = getThemeColorFromCss('themefifthcolor');
        //Sets The Hidden Chart Width
        $('#dashboard-bandwidth-chart')
            .data('width', $('.box-tabbs')
                .width() - 20);
    });

    // $(function () {
    //     var url = location.href;
    //     var str = /Admin/;
    //     var num = url.match(str).index + 6;
    //     var str2 = url.substring(num);
    //     var arr = str2.split('/');
    //     var controller = arr[0];
    //     var action = arr[1];
    //     if(controller.toLowerCase() == action.toLowerCase()){
    //         $("li[name=Index]").addClass("active");
    //         window.sessionStorage.removeItem('num');
    //     }
    //     var lis = [];
    //     var parLis = $(".sidebar-menu").children().eq(0).nextAll();
    //     parLis.each(function (k,v) {
    //         var lis1 = $(v).find('ul').find('li');
    //         lis1.each(function (k1,v1) {
    //             lis.push(v1);
    //         });
    //     });
    //     var lisLen = lis.length;
    //     var index = window.sessionStorage.getItem('num');
    //     if(index){
    //         $(lis[index]).addClass("active")
    //             .parent().css("display","block")
    //             .parent().addClass("active open");
    //         for(var a = 0; a < lisLen; ++ a) {
    //             lis[a].index = a;
    //             $(lis[a]).on('click',function (e) {
    //                 e.preventDefault();
    //                 window.sessionStorage.removeItem('num');
    //                 window.sessionStorage.setItem('num',this.index);
    //                 location.href = $(this).find("a").attr("href");
    //             })
    //         }
    //     }else{
    //         for(var a1 = 0; a1 < lisLen; ++ a1) {
    //             lis[a1].index = a1;
    //             $(lis[a1]).on('click',function (e) {
    //                 e.preventDefault();
    //                 window.sessionStorage.setItem('num',this.index);
    //                 location.href = $(this).find("a").attr("href");
    //             })
    //         }
    //     }
    //
    // });
</script>


</body>
<!--  /Body -->
</html>
