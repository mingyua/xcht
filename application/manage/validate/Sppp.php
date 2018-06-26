<?php
    namespace app\manage\validate;
    use think\Validate;
    class Sppp extends Validate{        
        //需要验证的键值
        protected $rule =   [
            'name'               => 'require|unique:xc_shangpinpp',
        ];
        //验证不符返回msg
        protected $message  =   [
            'name.require'      => '商品品牌必填',    
            'name.unique' => '商品品牌已存在',
        ];
        //需要指定验证位置 和字段
        protected $scene = [
	        'add'   =>  ['name'],
	        'edit'  =>  ['name'],
    	];   
}