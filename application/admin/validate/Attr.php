<?php
namespace app\admin\validate;
use think\Validate;
class Attr extends Validate
{

    protected $rule=[
        'attrName' => 'require|max:30',
        'attrValues' => 'max:255',
        'typeId' => 'require'
    ];

    protected $message=[
        'attrName.require' => '属性名称不得为空！',
        'attrName.max' => '属性名称不能大于30个字符！',
        'attrValues.max' => '属性值不能大于255个字符！',
        'typeId' => '必须选择类型'
    ];

	protected $scene = [
		'edit'  =>  ['adminName','attrValues'],
	];




    

    




   

	












}
