<?php
    namespace app\manage\validate;
    use think\Validate;
    class Member extends Validate{        
        //需要验证的键值
        protected $rule =   [
            'number_class_name'               => 'require|unique:number_class',
        ];
        //验证不符返回msg
        protected $message  =   [
            'number_class_name.require'      => '会员等级名称必填',    
            'number_class_name.unique' => '会员等级名称已存在',
        ];
        //需要指定验证位置 和字段
        protected $scene = [
	        'add'   =>  ['number_class_name'],
	        'edit'  =>  ['number_class_name'=>'require|unique:number_class,number_class_name^number_class'],
    	];   
}