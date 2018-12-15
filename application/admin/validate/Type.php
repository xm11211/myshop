<?php
namespace app\admin\validate;
use think\Validate;
class Type extends Validate
{

    protected $rule=[
        'typeName'=>'max:30|require|unique:type',
    ];

    protected $message=[
        'typeName.require' => '属性名称不得为空！',
        'typeName.unique' => '属性名称不得重复！',
        'typeName.max' => '属性名称不能大于30个字符！',
    ];

}
