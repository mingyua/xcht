<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
/**
 * 递归实现删除目录下的所有的文件和文件夹
 * @param $dir 要删除的目录
 * @param bool $deleteRootToo 是否删除根目录 默认不删除
 http://www.manongjc.com/article/1333.html
 */
function unlinkRecursive($dir, $deleteRootToo = false)
{
    if(!$dh = @opendir($dir))
    {
        return 0;
    }
    while (false !== ($obj = readdir($dh)))
    {
        if($obj == '.' || $obj == '..')
        {
            continue;
        }
        if (!@unlink($dir . '/' . $obj))//删除文件, 如果是目录则返回false
        {
            unlinkRecursive($dir.'/'.$obj, true);
        }
    }
    
    closedir($dh);
    if ($deleteRootToo)
    {
        @rmdir($dir);//删除目录
    }
    return;
}
/*
 */
function getsptp($spid){
	$name=db('xc_shangpintp')->where('shangpinid','EQ',$spid)->value('dizhi');	
	return $name;
}
function getfl($dwid){
	$name=db('commodity_type')->where('ID','EQ',$dwid)->value('cpmmodity_type_name');	
	return $name;
}
function getpp($dwid){
	$name=db('xc_shangpinpp')->where('id','EQ',$dwid)->value('name');	
	return $name;
}
function getdw($dwid){
	$name=db('unit')->where('ID','EQ',$dwid)->value('unit_name');	
	return $name;
}
function inarr($text,$arr){
	$arr=explode(',',$arr);	
	if(in_array($text,$arr)){
		return 'checked';
	}else{
		return false;
	}
}

//返回所属企业
function getuserinfo($tel,$field){
	if($tel){
		$name=db('user')->where('TEL','EQ',$tel)->value($field);	
		return $name;
	}else{
		return '';
	}
	
}

function times($val='',$type='Y-m-d'){

		$year=explode('-',$val);
		
		if(isset($year[1])){		
			return date($type,strtotime($val));			
		}else if($val==null){
			return date($type,time());			
		}else{
			return date($type,$val);			
		}	

	
}


 function cate($cate,$name='child',$pid=0){
		
		$arr=array();
		foreach ($cate as $v){
			if($v['ParentID']== $pid){
			   $v[$name]=cate($cate,$name,$v['ID']);
				$arr[]=$v;
				}
			
			}
			return $arr;
		}

function menutree(&$list, $pid = 0, $level = 0, $html = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;') {
	static $tree = array();
	foreach ($list as $v) {
		if ($v['ParentID'] == $pid) {
			if ($level == 1) {
				$v['html'] = str_repeat($html, $level) . "└ ";
			}else if ($level == 2) {
				$v['html'] = str_repeat($html, $level + 1) . "└ ";
			}else{
				$v['html'] ='';
			}
			//$v['html'] = str_repeat($html, $level);
			$tree[] = $v;
			menutree($list, $v['ID'], $level + 1);
		}
	}
	return $tree;
}
function getrolename($id){
		$name=db('xc_role')->where("id='$id'")->find();
		return $name['Role_name'];
}
function checked($rid,$mid){
		$name=db('xc_role_menu')->where(array('RoleID'=>$rid,'MenuID'=>$mid))->find();
		if($name){
			$ck='checked';
		}else{
			$ck="";
		}
		return $ck;
}


function ztree($data,$pid='0'){
	static $tree = array();
	foreach ($data as $k=> $v) {
		if ($v['super_id'] == $pid) {			
			$tree[$k]['id'] = $v['id'];
			$tree[$k]['pId'] = $v['super_id'];
			$tree[$k]['name'] = $v['cpmmodity_type_name'];
			if($v['super_id']==0){
			$tree[$k]['open'] = true;
			}
			ztree($data, $v['id']);
		}
	}
	$arr=array(['id'=>0,'pId'=>'-1','name'=>'全部类别','open'=>true]);
	foreach($tree as $k=> $v){
		$arr[]=$v;
	}
			
	return $arr;		
		
}
/*
 * 返回最大ID
 */
function getmaxid(){
	$id=db('commodity_type')->max('id');
	return $id;
}

function getkinds($id){
	$name=db('commodity_type')->where('id','eq',$id)->value('cpmmodity_type_name');
	return $name;
}

function dpstatus(){
	$name=db('cashier_login_log')->where('end_datetime','eq','')->select();
}
