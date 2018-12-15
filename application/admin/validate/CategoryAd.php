<?php
namespace app\admin\validate;
use think\Validate;
class CategoryAd extends Validate
{

    protected $rule=[
        'url' => 'require|max:60',
    ];

    protected $message=[
        'url.max' => '链接不能大于60个字符！',
        'url.require' => '链接不得为空！',
    ];





    

    




   

	












}
