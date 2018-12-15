<?php
namespace app\admin\validate;
use think\Validate;
class Slider extends Validate
{

    protected $rule=[
        'title'=>'max:150|require',
        'url'=>'max:60',
    ];

    protected $message=[
        'title.require' => '轮播图名称不得为空！',
        'title.unique' => '轮播图名称不得重复！',
        'title.max' => '轮播图名称不能大于150个字符！',
        'url.max' => '网址不能大于60个字符！',
    ];

}
