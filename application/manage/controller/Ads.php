<?php
namespace app\manage\controller;
use think\Controller;
use think\Db;
use \think\Cache;
class Ads extends Auth{
	public function index(){
		$adlist=model('Adsourse')->with('ads')->paginate(12, false, ['query' => request()->param()]);
		//dump($adlist);
		$this->assign('adlist',$adlist);
		return $this->fetch();
	}
	
	public function addads(){
		//dump($this->request->post());
		if($this->request->post()){
			$post=$this->request->post();
				if($post['types']==1){
					$post['Ad_path']=$post['videopath'];
				}else{
					$post['Ad_path']=$post['imgpath'];
				}	
				if(!isset($post['Ad_flag'])){
					$post['Ad_flag']=0;
				}
						
			if(isset($post['id'])){
				$result=model('Adsourse')->allowField(true)->save($post,['ID'=>$post['id']]);
				if(false===$result){
					$back=['msg'=>'修改失败','status'=>2];
				}else{				
					$back=['msg'=>'修改成功','status'=>1];
				}
			}else{
				
				$result=model('Adsourse')->allowField(true)->save($post);
				if(false===$result){
					$back=['msg'=>'添加失败','status'=>2];
				}else{				
					$back=['msg'=>'添加成功','status'=>1];
				}
			}
			
			return $back;
		}else{
			$id=input('id');
			if(isset($id)){
				$info=db('ad_resouse')->where('ID','eq',$id)->find();
			}else{
				$info='';
			}
			$kinds=db('ad_type')->select();
			$this->assign('kinds',$kinds);
			$this->assign('info',$info);
		return $this->fetch();	
			
		}
		
	}
	
	public function kinds(){
		
		$adlist=db('ad_type')->paginate(12, false, ['query' => request()->param()]);
		$this->assign('data',$adlist);
		return $this->fetch();
	}
	public function addkinds(){
		if($this->request->post()){
			$ads=model('Ads');
			$post=$this->request->post();
			if(isset($post['Ad_flag'])){
				$post['Ad_flag']=1;
			}else{
				$post['Ad_flag']=0;
			}
			if(isset($post['ID'])){
				$result=$ads->allowField(true)->save($post,['ID'=>$post['ID']]);
				if(false===$result){
					$back=['msg'=>'修改失败','status'=>2];
				}else{
					
					
					$adstoreid=implode(',',$post['allck']);
					if(isset($post['allck'])){
						model('Adstore')->destroy(['Ad_id' => $post['ID']]);
							$data=[];
							foreach($post['allck'] as $k=>$v){
								$data[$k]['Ad_id']=$post['ID'];
								$data[$k]['Store_code']=$v;
							}
						model('Adstore')->allowField(true)->saveall($data);
					}else{
						model('Adstore')->destroy(['Ad_id' => $post['ID']]);	
					}					
					
					
					$back=['msg'=>'修改成功','status'=>1];
				}
				
			}else{
				$result=$ads->allowField(true)->save($post);
				if(false===$result){
					$back=['msg'=>'添加失败','status'=>2];
				}else{
					if(isset($post['allck'])){
						$data=[];
						foreach($post['allck'] as $k=>$v){
							$data[$k]['Ad_id']=$ads->ID;
							$data[$k]['Store_code']=$v;
						}
					    model('Adstore')->allowField(true)->saveall($data);
						
					}
					$back=['msg'=>'添加成功','status'=>1];
				}
			}
			return $back;
		}else{
			
			$id=input('id');
			//dump($id);
			$store=db('store')->select();
			if(isset($id)){
				$info=db('ad_type')->where('ID','eq',$id)->find();
				$dpfid=db('ad_store')->where('Ad_id','eq',$id)->field('store_code')->select();
				if(is_array($dpfid)){
					$dpcode= array_column($dpfid, 'store_code');
					foreach($store as $k=>$v){
						if(in_array($v['store_code'],$dpcode)){
							$store[$k]['checked']="checked";
						}else{
							$store[$k]['checked']="";
						}
					}
					
				}
				
			}else{
				$info='';
				foreach($store as $k=>$v){
						
						$store[$k]['checked']="";
					}				
			}
		
			
			
			$this->assign('info',$info);
			$this->assign('store',$store);
			return $this->fetch();
		}
		
		
		
	}
	public function delkinds(){
		if($this->request->isPost()) {
            $post = $this->request->post(); 

			$id=input('id');
			$kinds = db("ad_type"); 

			if($kinds->where("ID=".$id)->delete()){
				$back=['msg'=>'删除成功','status'=>1];	
				
			}else{
				$back=['msg'=>'删除失败','status'=>2];	
				
			}

			return $back;
						
		}	
	}
	public function delads(){
		if($this->request->isPost()) {
            $post = $this->request->post(); 

			$id=input('id');
			$adsre = db("ad_resouse"); 

			if($adsre->where("ID=".$id)->delete()){
				$back=['msg'=>'删除成功','status'=>1];	
				
			}else{
				$back=['msg'=>'删除失败','status'=>2];	
				
			}

			return $back;
						
		}	
	}
    public function status()
    {
		if($this->request->isPost()) {
            $post = $this->request->post(); 
    		$id=$post['id'];
    		$status=Db::name('ad_resouse')->where('ID',$id)->value('Ad_flag');
    	
	    	if($status==1){
	    		$data['Ad_flag']=0;
	    	}else{
	    		$data['Ad_flag']=1;
	    	}
	    	$result=model('Adsourse')->save($data,['ID'=>$id]);
	   		if(false === $result){
			    $back=['msg'=>'操作失败','status'=>2];
			}else{	       		
		   		$back=['msg'=>'操作成功','status'=>1];
	   		}
		return $back;
		}
	}		
}
?>