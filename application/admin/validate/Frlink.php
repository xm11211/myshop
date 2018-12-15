<?php
namespace app\admin\validate;
use think\Validate;
class Frlink extends Validate
{

    protected $rule=[
        'title'=>'max:60|require|unique:frlink',
        'url'=>'max:60',
        'desc'=>'max:300',
    ];

    protected $message=[
        'title.require' => '链接名称不得为空！',
        'title.unique' => '链接名称不得重复！',
        'title.max' => '链接名称不能大于60个字符！',
        'url.max' => '网址不能大于60个字符！',
        'desc.max' => '描述不能大于300个字符！',
    ];

}
