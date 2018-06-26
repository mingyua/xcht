<?php
    namespace app\manage\validate;
    use think\Validate;
    class Admin extends Validate{        
        //需要验证的键值
        protected $rule =   [
            'user_code'               => 'require|max:20',
            'user_mobile'         => 'require|number|length:11|unique:admin_user,user_mobile,0,id',
        ];
        //验证不符返回msg
        protected $message  =   [
            'user_code.require'      => '用户名必须|用户名长度为6-12',
            'user_mobile.require'      => '手机必填',    
            'user_mobile.number'       => '手机格式为数字',
            'user_mobile.length'       =>'手机格式为11位的数字',
            'user_mobile.unique' => '手机号码已存在',
        ];
        //需要指定验证位置 和字段
        protected $scene = [
            'add'                 =>  ['user_mobile'],
            'edit'                =>  ['user_code'],
        ];
}