<?php
namespace app\manage\controller;
use think\Controller;
use think\Db;
class Login extends Controller
{
    public function index()
    {
    $uid=session('uid');
    if($uid){
    	$this->redirect('index/index');
    }	
    $admin=Db::name('admin_user')->select();
    	//dump($admin);
	$this->view->engine->layout(false); 
	return $this->fetch();
    }
    public function login(){
    	$this->view->engine->layout(false); 
		if($this->request->isPost()) {
            $post = $this->request->post();           
			$rule = [
			    ['username','require|length:11','手机必须|手机格式有误！'],
			    ['password','require|length:6,12','密码不能为空！|密码长度为6-12字符'],
			    ['code','require|captcha','验证码不能为空|验证码错误']
			];            
			$validate = new \think\Validate($rule);
			$result   = $validate->check($post);
			if(!$result){
				return ['msg'=>'提交失败：' . $validate->getError(),'code'=>2]; 
			}else{
				$map['user_mobile']=$_POST['username'];
				$map['user_pass']=md5($_POST['password']);
				$admin=Db::name('admin_user')->where($map)->find();
				if($admin['user_flag']=='0'){
					return ['msg'=>'用户已禁用，请联系管理员！','code'=>2]; 		
				}else if($admin){
					session('uid',$admin['id']);
					session('uname',$admin['user_code']);
					session('roleid',$admin['RoleID']);
					return ['msg'=>'登录成功！正在跳转...','code'=>1,'url'=>url('index/index')]; 					
				}else{
					return ['msg'=>'用户不存在或密码错误,请重新输入！','code'=>2]; 					
				}
				

			}            
            
           
        }
	}

	public function logout(){
		header("Content-type: text/html; charset=utf-8");
		session(null);
		return ['msg'=>'退出成功','status'=>1,'url'=>URL("Login/index")]; 		
	}
    
}
