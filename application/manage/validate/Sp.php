<?php
    namespace app\manage\validate;
    use think\Validate;
    class Sp extends Validate{        
        //需要验证的键值
        protected $rule =   [
            'code'               => 'require|unique:xc_shangpin',
        ];
        //验证不符返回msg
        protected $message  =   [
            'code.require'      => '商品条码必填',    
            'code.unique' => '商品条码已存在',
        ];
        //需要指定验证位置 和字段
        protected $scene = [
	        'add'   =>  ['code'],
	        'edit'  =>  ['code'],
    	];   
}