<?php
namespace app\manage\controller;
use think\Controller;
use think\Db;
use think\Request;
use \think\Cache;
class Auth extends Controller
{
	protected function _initialize() {
		header("Content-type: text/html; charset=utf-8");
		$request= Request::instance();

		$this->assign('md_name',$request->module());
		$this->assign('ct_name',$request->controller());
		$this->assign('ac_name',$request->action());
		$uid=session('uid');
		$diqu=db('xc_diqu')->cache(true)->select();	
	    $this->assign('diqu',json_encode($diqu));

		if(empty($uid)){
			$this->redirect('Login/index');
		}
		$roleid=session('roleid');
		if(empty(Cache::get('menulist'.$uid))){
			$rolename=db('xc_role')->where("ID='".$roleid."'")->find();
			$menuid=db('xc_role_menu')->where("RoleID='".$roleid."'")->select();	
			$mid=implode(',',array_column($menuid,'MenuID'));
			$map['ID'] = array('in',$mid);
			$map['Status']=array('eq',1);			
			$menulist=db('xc_menu')->where($map)->order('Menu_order DESC')->select();	
			$data=cate($menulist,'newarr',0);		
			
			$amap['ID'] = array('in',$mid);	
			$access=db('xc_menu')->where($amap)->order('Menu_order DESC')->select();			
			
			Cache::set('menulist'.$uid,$data);
			Cache::set('access'.$uid,$access);
			
			$this->menudata=$data;
			$ac=array_filter(array_column($access,'Menu_url'));	
			$this->assign('access',implode(',',$ac));	
		}else{

			$ac=array_filter(array_column(Cache::get('access'.$uid),'Menu_url'));			
			$this->assign('access',implode(',',$ac));			
			$this->menudata=Cache::get('menulist'.$uid);

		}
		
	} 
	   
}
