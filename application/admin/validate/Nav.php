<?php
namespace app\admin\validate;
use think\Validate;
class Nav extends Validate
{

    protected $rule=[
        'navName'=>'max:30|require',
        'navUrl'=>'max:60',
    ];

    protected $message=[
        'navName.require' => '导航名称不得为空！',
        'navName.max' => '导航名称不能大于30个字符！',
        'navUrl.max' => '导航地址不能大于30个字符！',
    ];

}
