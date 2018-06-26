<?php
namespace app\manage\controller;
use think\Controller;
use think\Db;
class Index extends Auth
{
    public function index()
    {
    	
    	//dump($this->menudata);die();
	$this->assign('menudata',$this->menudata);

	return $this->fetch();
    }
    public function right()
    {
    

	return $this->fetch();
    }
    
    public function clearcache(){
    	unlinkRecursive(RUNTIME);
    	return ['msg'=>'清除缓存成功！','status'=>1];
    }    
}
