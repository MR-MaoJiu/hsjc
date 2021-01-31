<?php

namespace app\index\validate;

use think\Validate;
class HuiYuanValidate extends Validate
{

    /**
     * 定义验证规则
     * 格式：'字段名'    =>    ['规则1','规则2'...]
     *
     * @var array
     */
    protected $rule = [
        'name' => 'require',
        'mobile' => 'require|max:11',
        'idcard' => 'require',
    ];

    /**
     * 定义错误信息
     * 格式：'字段名.规则名'    =>    '错误信息'
     *
     * @var array
     */
    protected $message = [
        'name.require' => '姓名必填',
        'mobile.require' => '手机号必填',
        'idcard.require' => '身份证号必填',
    ];
}