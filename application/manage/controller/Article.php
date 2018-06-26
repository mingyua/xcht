<?php
namespace app\manage\controller;
use think\Controller;
use think\Db;
use \think\Cache;
class Article extends Controller{
	public function index(){
	$this->view->engine->layout(false); 
		 
		 
	return $this->fetch();
	}

}
?>