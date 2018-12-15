<?php
namespace app\admin\validate;
use think\Validate;
class Cate extends Validate {
    protected $rule = [
        'cateName' => 'unique:cate|require|max:30',
        'keywords' => 'max:255',
        'desc' => 'max:255',
    ];


    protected $message = [
        'cateName.require' => '栏目名称不得为空！',
        'cateName.unique' => '栏目名称不得重复！',
        'cateName.max'     => '栏目名称长度不得大于30位',
        'keywords.max'     => '栏目关键词长度不得大于255位',
        'desc.max'     => '栏目描述长度不得大于255位',
    ];
}

