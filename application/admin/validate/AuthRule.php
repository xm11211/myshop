<?php
namespace app\admin\validate;
use think\Validate;
class AuthRule extends Validate
{

    protected $rule=[
        'name'=>'max:80',
        'iconName'=>'max:30',
        'title'=>'unique:auth_rule|require|max:20',
    ];


    protected $message=[

        'name.max' => '规则名称不能大于80个字符！',
        'title.require' => '权限名称不得为空！',
        'title.unique' => '权限名称不得重复！',
        'title.max' => '权限名称不能大于20个字符！',
        'iconName.max' => '图标名称不能大于30个字符！',
    ];





    

    




   

	












}
