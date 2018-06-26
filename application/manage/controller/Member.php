<?php
namespace app\manage\controller;
use think\Controller;
use think\Request;
use think\Db;
class Member extends Auth
{
	public function grade() {
		
		$admin=model('Member');		
		$where['id']=array("gt",0);		
		$data=$admin->order('up_amount DESC')->paginate(14, false, ['query' => request()->param()]);
		$this->assign('adminlist',$data);		
		return $this -> fetch();
	}
	public function addgrade() {
		if($this->request->isPost()) {				
            $post = $this->request->post();         
			$model=model('Member');
			if(isset($post['number_class'])){
				$result = $model->allowField(true)->validate('Member.edit')->save($post,['number_class' => $post['id']]);
				if(false === $result){
									
				    $back=['msg'=>$model->getError(),'status'=>2];
				}else{
					$back=['msg'=>'修改成功','status'=>1];
				}							
				
			}else{
				$result = $model->validate('Member.add')->allowField(true)->save($post);
				if(false === $result){
				    $back=['msg'=>$model->getError(),'status'=>2];
				}else{
					$back=['msg'=>'添加成功','status'=>1];
				}
						
				
			}
			
			return $back;		
		}else{
		$id=input('id');	
		if($id){
			$info=model('Member')->where("number_class='$id'")->find();
		}else{
			$info=NULL;
		}
		
		
		$this->assign('info',$info);			
			
		return $this->fetch();
		}
	}	
	public function delgrade() {
		if($this->request->isPost()) {
            $post = $this->request->post(); 

			$id=input('id');
			$grade = db("number_class"); 

			if($grade->where("number_class=".$id)->delete()){
				$back=['msg'=>'删除成功','status'=>1];	
				
			}else{
				$back=['msg'=>'删除失败','status'=>2];	
				
			}

			return $back;
						
		}	
	}
	

}