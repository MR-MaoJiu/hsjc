<?php

namespace app\admin\validate;

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
        'model' => 'require',
        'qrcode' => 'require',
    ];

    /**
     * 定义错误信息
     * 格式：'字段名.规则名'    =>    '错误信息'
     *
     * @var array
     */
    protected $message = [
        'model.require' => '检测模式必填',
        'qrcode.require' => '条形码必填',
    ];
}