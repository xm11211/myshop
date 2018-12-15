<?php
namespace app\admin\validate;
use think\Validate;
class CategoryWords extends Validate
{

    protected $rule=[
        'word' => 'require|max:60',
        'url' => 'require|max:60',
    ];

    protected $message=[
        'word.require' => '词汇不得为空！',
        'word.max' => '词汇不能大于60个字符！',
        'url.max' => '链接不能大于60个字符！',
        'url.require' => '链接不得为空！',
    ];





    

    




   

	












}
