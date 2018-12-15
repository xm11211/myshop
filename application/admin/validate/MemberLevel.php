<?php
namespace app\admin\validate;
use think\Validate;
class MemberLevel extends Validate
{
    protected $regex = [ 'posint' => '^\d+$'];

    protected $rule=[
        'levelName'=>'max:30|require|unique:member_level',
        'bottom' => 'require|number|between:0,4294967295|regex:posint',
        'top' => 'require|number|between:1,4294967295|regex:posint',
        'rate' => 'number|between:0,100|regex:posint',
    ];

    protected $message=[
        'levelName.require' => '级别名称不得为空！',
        'levelName.unique' => '级别名称不得重复！',
        'levelName.max' => '级别名称不能大于30个字符！',
        'bottom.require' => '积分下限不得为空！',
        'bottom.number' => '积分下限必须是数字！',
        'bottom.between' => '积分下限只能在0-4294967295之间！',
        'bottom.regex' => '积分下限必须是正整数！',
        'top.require' => '积分上限不得为空！',
        'top.number' => '积分上限必须是数字！',
        'top.regex' => '积分上限必须是正整数！',
        'top.between' => '积分上限只能在1-4294967295之间！',
        'rate.number' => '折扣率必须是数字！',
        'rate.between' => '折扣率只能在0-100之间！',
        'rate.regex' => '折扣率必须是正整数！',
    ];

}
