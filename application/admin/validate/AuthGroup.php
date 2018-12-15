<?php
namespace app\admin\validate;
use think\Validate;
class AuthGroup extends Validate
{

    protected $rule=[
        'title'=>'unique:auth_group|require|max:100',
    ];


    protected $message=[
        'title.require' => '用户组名称不得为空！',
        'title.unique' => '用户组名称不得重复！',
        'title.max' => '用户组名称不能大于100个字符！',
    ];





    

    




   

	












}
