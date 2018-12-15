<?php
namespace app\admin\validate;
use think\Validate;
class Category extends Validate
{

    protected $rule=[
        'cateName' => 'unique:category|require|max:30',
        'psNum' => 'between:0,20',
        'keywords' => 'max:150',
        'desc' => 'max:255',
        'iconName'=>'max:30',
    ];


    protected $message=[
        'cateName.require' => '分类名称不得为空！',
        'cateName.unique' => '分类名称不得重复！',
        'cateName.max' => '分类名称不能大于30个字符！',
        'psNum.between' => '区间数在0-20个之间',
        'keywords.max' => '规则名称不能大于150个字符！',
        'desc.max' => '分类描述不能大于255个字符！',
        'iconName.max' => '图标名称不能大于30个字符！',
    ];





    

    




   

	












}
