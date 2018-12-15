<?php
namespace app\admin\validate;
use think\Validate;
class Article extends Validate {
    //验证规则
    protected $rule = [
        'title'  => 'require|max:60|unique:article',
        'keywords'  => 'max:100',
        'author'  => 'max:30',
        'desc'  => 'max:255',
        'email'  => 'max:60',
        'url'  => 'max:150',

    ];
    //错误信息
    protected $message  =   [
        'title.unique'  => '文章标题不能重复',
        'title.require' => '文章标题必须填写',
        'title.max'     => '文章标题长度不得大于60位',
        'keywords.max'  => '关键词长度不得大于100位',
        'author.max'    => '作者名字长度不得大于30位',
        'desc.max'      => '文章描述长度不得大于255位',
        'email.max'     => '邮箱长度不得大于60位',
        'url.max'       => '外链地址不得大于150位',
    ];
}