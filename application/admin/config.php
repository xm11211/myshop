<?php
return [
    'template'  =>  [
    'layout_on'     =>  true,
    'layout_name'   =>  'layout',
    ],
    'view_replace_str'       => [
        '__PUBLIC__' =>   '/static',         // 静态资源存放目录
        '__PLUGINS__' =>   '/static/plugins',         // 静态资源存放目录
        '__CSS__' => '/static/Admin/css',
        '__JS__' => '/static/Admin/js',
        '__IMG__' => '/static/Admin/img',
        '__LAYER__' => '/static/plugins/layer',
        '__404CSS__' => '/static/Admin/css',
        '__404JS__' => '/static/Admin/js',
        '__404IMG__' => '/static/Admin/img',
        '__UPLOADS__' => '/static/upload'
    ],
];
