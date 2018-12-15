<?php
namespace app\admin\validate;
use think\Validate;
class RecPos extends Validate
{

    protected $rule=[
        'recName'=>'max:60|require',
    ];

    protected $message=[
        'recName.require' => '推荐位名称不得为空！',
        'recName.max' => '推荐位名称不能大于60个字符！',
    ];

}
