<?php
namespace app\admin\validate;
use think\Validate;
class Conf extends Validate
{

    protected $rule=[
        'cnName'=>'unique:conf|require|max:60',
        'enName'=>'unique:conf|require|max:60',
        'value'=>'max:255',
        'values'=>'max:255',
    ];


    protected $message=[
        'cnName.require'=>'中文名称不得为空！',
        'cnName.unique'=>'中文名称不得重复！',
        'enName.unique'=>'英文名称不得重复！',
        'enName.require'=>'英文名称不得为空！',
        'cnName.max'=>'中文名称不能大于60个字符！',
        'enName.max'=>'英文名称不能大于60个字符！',
        'value.max'=>'配置值不能大于255个字符！',
        'values.max'=>'配置可选值不能大于255个字符！',
    ];





    

    




   

	












}
