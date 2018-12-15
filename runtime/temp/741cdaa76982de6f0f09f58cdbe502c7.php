<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:66:"K:\AMP\day\myshop2\public/../application/admin\view\order\lst.html";i:1535009368;s:53:"K:\AMP\day\myshop2\application\admin\view\layout.html";i:1515386558;s:60:"K:\AMP\day\myshop2\application\admin\view\Common\header.html";i:1535520340;s:60:"K:\AMP\day\myshop2\application\admin\view\Common\footer.html";i:1515571090;}*/ ?>
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
<div id="container" class="row">
    <div class="col-xs-12 col-md-12">
        <div class="widget">
            <div class="widget-header  with-footer">
                <span class="widget-caption"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">订单列表</font></font></span>
                <div class="widget-buttons">
                    <a href="#" data-toggle="maximize">
                        <i class="fa fa-expand"></i>
                    </a>
                    <a href="#" data-toggle="collapse">
                        <i class="fa fa-minus"></i>
                    </a>

                </div>
            </div>

            <div class="widget-body">
                <form action="" method="get" name="searchForm">
                    <div class="buttons-preview">
                        <div class="widget-buttons no-padding">
                            <input type="text" name="outTradeNo" value="<?=input('get.outTradeNo')?>" class=" input-xs widget-buttons" placeholder="订单号">
                            <input type="text" name="user" value="<?=input('get.user')?>" class=" input-xs widget-buttons" placeholder="用户名或用户id">
                        </div>
                    </div>
                    <div class="buttons-preview">
                        <span>支付状态：</span>
                        <label>
                            <input name="ps" onclick="this.parentNode.parentNode.parentNode.submit()" type="radio" value="0" <?php if(input('get.ps') == 0) echo 'checked="checked"'; ?> class="colored-blue">
                            <span class="text"> 全部</span>&nbsp;&nbsp;&nbsp;&nbsp;
                        </label>
                        <label>
                            <input name="ps" onclick="this.parentNode.parentNode.parentNode.submit()" type="radio" value="1" <?php if(input('get.ps') == 1) echo 'checked="checked"'; ?> class="colored-blue">
                            <span class="text"> 未支付</span>&nbsp;&nbsp;&nbsp;&nbsp;
                        </label>
                        <label>
                            <input name="ps" onclick="this.parentNode.parentNode.parentNode.submit()" type="radio" value="2" <?php if(input('get.ps') == 2) echo 'checked="checked"'; ?> class="colored-blue">
                            <span class="text"> 已支付</span>&nbsp;&nbsp;&nbsp;&nbsp;
                        </label>
                    </div>
                    <div class="buttons-preview">
                        <span>配送状态：</span>
                        <label>
                            <input name="dg" onclick="this.parentNode.parentNode.parentNode.submit()" type="radio" value="0" <?php if(input('get.dg') == 0) echo 'checked="checked"'; ?> class="colored-blue">
                            <span class="text"> 全部</span>&nbsp;&nbsp;&nbsp;&nbsp;
                        </label>
                        <label>
                            <input name="dg" onclick="this.parentNode.parentNode.parentNode.submit()" type="radio" value="1" <?php if(input('get.dg') == 1) echo 'checked="checked"'; ?> class="colored-blue">
                            <span class="text"> 未发货</span>&nbsp;&nbsp;&nbsp;&nbsp;
                        </label>
                        <label>
                            <input name="dg" onclick="this.parentNode.parentNode.parentNode.submit()" type="radio" value="2" <?php if(input('get.dg') == 2) echo 'checked="checked"'; ?> class="colored-blue">
                            <span class="text"> 已发货</span>&nbsp;&nbsp;&nbsp;&nbsp;
                        </label>
                        <label>
                            <input name="dg" onclick="this.parentNode.parentNode.parentNode.submit()" type="radio" value="3" <?php if(input('get.dg') == 3) echo 'checked="checked"'; ?> class="colored-blue">
                            <span class="text"> 已收货</span>&nbsp;&nbsp;&nbsp;&nbsp;
                        </label>
                    </div>
                    <div class="buttons-preview">
                        <button class="btn btn-info btn-xs" onclick="javascript:document.searchForm.submit();" ><i class="fa fa-search"></i> 点击查询</button>
                        <button class="btn btn-success btn-xs" id="reset" ><i class="fa fa-backward"></i> 点击重置</button>
                        <a class="btn btn-darkorange btn-xs" href="<?php echo url('Order/exportOrders',array('query' => $_SERVER['QUERY_STRING'])); ?>" ><i class="glyphicon glyphicon-retweet"></i> 导出订单</a>
                    </div>
                </form>
                <div class="flip-scroll">
                    <table class="table table-bordered table-striped table-condensed flip-content">
                        <thead class="flip-content bordered-palegreen">
                        <tr>
                            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                id
                            </font></font></th>
                            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                订单号
                            </font></font></th>
                            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                下单用户
                            </font></font></th>
                            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                订单总额
                            </font></font></th>
                            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                支付方式
                            </font></font></th>
                            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                配送方式
                            </font></font></th>
                            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                订单状态
                            </font></font></th>
                            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                支付状态
                            </font></font></th>
                            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                配送状态
                            </font></font></th>
                            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                收货人
                            </font></font></th>
                            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                手机号
                            </font></font></th>
                            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                下单时间
                            </font></font></th>
                            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                               相关操作
                            </font></font></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <tr>
                            <td class="numeric"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                <?php echo $vo['id']; ?>
                            </font></font></td>
                            <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                <?php echo $vo['outTradeNo']; ?>
                            </font></font></td>
                            <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                <?php echo $vo['userName']; ?>
                            </font></font></td>
                           <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                <?php echo $vo['orderTotalPrice']; ?>
                            </font></font></td>
                            <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                <?php switch($vo['payment']): case "1": ?>支付宝<?php break; case "2": ?>微信<?php break; case "3": ?>微信第三方<?php break; case "4": ?>余额<?php break; endswitch; ?>
                            </font></font></td>
                            <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                <?php echo $vo['distribution']; ?>
                            </font></font></td>
                            <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                <?php switch($vo['orderStatus']): case "0": ?>未确认<?php break; case "1": ?>已确认<?php break; case "2": ?>申请退款<?php break; case "3": ?>退款成功<?php break; endswitch; ?>
                            </font></font></td>
                            <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                <?php switch($vo['payStatus']): case "0": ?>未支付<?php break; case "1": ?><span style="color: red;">已支付</span><?php break; endswitch; ?>
                            </font></font></td>
                            <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                <?php switch($vo['postStatus']): case "0": ?>未发货<?php break; case "1": ?><span style="color: red;">已发货</span><?php break; case "2": ?>已收货<?php break; endswitch; ?>
                            </font></font></td>
                            <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                <?php echo $vo['name']; ?>
                            </font></font></td>
                            <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                <?php echo $vo['phone']; ?>
                            </font></font></td>
                            <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                <?php echo date('Y/m/d H:i:s',$vo['orderTime']); ?>
                            </font></font></td>
                            <td>
                                <button value="<?php echo $vo['id']; ?>" name="see" data-toggle="modal" data-target="#myModal" class="btn btn-purple btn-xs"><i class="fa fa-search-plus"></i>详情</button>
                                <a href="<?php echo url('goods',array('id' => $vo['id'])); ?>" class="btn btn-warning btn-xs"><i class="fa fa-gift"></i> 订单商品</a>
                                <a href="<?php echo url('edit',array('id' => $vo['id'])); ?>" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> 修改</a>
                                <button value="<?php echo $vo['id']; ?>" flag="del" name="bootbox-confirm" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>删除</button>
                            </td>
                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; if($list->render() != ''): ?>
                        <tr class="mypage" style="background:#fff;">
                            <td colspan=""><?php echo $list->render(); ?></td>
                        </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
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
                <h4 class="modal-title">订单详情</h4>
            </div>
            <div class="modal-body">
                <!--js来添加模态框内容-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">确认</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<button id="secMsg" style="display: none;"></button>
<script>
   $(function () {
       //为按钮添加链接
       addBind('#linkAdd','<?php echo url('add'); ?>');
       // //表格数据行数
       var rowsLen = $("tr").length - 2;
       //列合并最后一列
       if($("tr[class=mypage]").length != 0){
           colspan();
       }
       //单个删除
       delUrl = "<?php echo url('del'); ?>";
       ajaxDelete('button[flag=del]',delUrl,'#secMsg');
       //订单详情
       ajaxSee('button[name=see]',"<?php echo url('detail'); ?>");
       function ajaxSee(obj,detailUrl){
           var but = $(obj);
           var butLen = but.length;
           for(var a = 0;a < butLen;++ a) {
               $(but[a]).on('click',function(){
                   var id = $(this).val();
                   $.ajax({
                       url:detailUrl,
                       method:"post",
                       data:{'id':id},
                       success:function (data) {
                           if(data != 'null') {
                               var order = JSON.parse(data);
                               var str = '';
                               str += '订单号：' + order.outTradeNo + '<br />';
                               str += '下单用户：' + order.userName + '<br />';
                               str += '商品总额：' + order.goodsTotalPrice + '<br />';
                               str += '订单总额：' + order.orderTotalPrice + '<br />';
                               str += '支付方式：' + order.payment + '<br />';
                               str += '配送方式：' + order.distribution + '<br />';
                               str += '订单状态：' + order.orderStatus + '<br />';
                               str += '支付状态：' + order.payStatus + '<br />';
                               str += '配送状态：' + order.postStatus + '<br />';
                               str += '运费：' + order.postSpant + '<br />';
                               str += '订单备注：' + order.remark + '<br />';
                               str += '收货人姓名：' + order.name + '<br />';
                               str += '收货地址：' + order.province + order.city + order.county + order.address +'<br />';
                               str += '收货手机号：' + order.phone + '<br />';
                               str += '下单时间：' + order.orderTime + '<br />';
                               $("#myModal .modal-body").html(str);
                           }else {
                               $("#myModal .modal-body").html('暂无！');
                           }
                       }
                   });
               });
           }
       }
       //重置按钮
       $("#reset").on('click',function (e) {
           e.preventDefault();
           $("input").val('');
       });
       $("#sidebar-menu a[href*=order" + "\\/"+ "lst]").parent().addClass('active').parent().parent().addClass('open');
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
