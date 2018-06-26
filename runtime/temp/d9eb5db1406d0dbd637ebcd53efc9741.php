<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:46:"D:\HT/application/manage\view\goods\index.html";i:1525941023;s:41:"D:\HT\application\manage\view\layout.html";i:1525854419;s:48:"D:\HT\application\manage\view\public\header.html";i:1528785250;s:48:"D:\HT\application\manage\view\public\footer.html";i:1525858100;}*/ ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>贵州小草商盟后台</title>
		<link href="/public/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
		<link href="/public/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<link href="/public/manage/build/css/custom.css" rel="stylesheet">
		<link href='/public/nprogress/nprogress.css' rel='stylesheet' />
		<link rel="stylesheet" type="text/css" href="/public/manage/css/style.css"/>
		<link rel="stylesheet" type="text/css" href="/public/layui/css/layui.css"/>
		<script src="/public/manage/js/jquery.min.js"></script>
		<script src="/public/layui/layui.js" type="text/javascript" charset="utf-8"></script>

	</head>
	<body class="nav-md">
 
    <link rel="stylesheet" href="/public/zTree/bootstrapStyle.css" type="text/css">

    <script type="text/javascript" src="/public/zTree/jquery.ztree.core.js"></script>
    <script type="text/javascript" src="/public/zTree/jquery.ztree.excheck.js"></script>
    <script type="text/javascript" src="/public/zTree/jquery.ztree.exedit.js"></script>

    <SCRIPT type="text/javascript">
 var setting = {
			view: {
				addHoverDom: addHoverDom,
				removeHoverDom: removeHoverDom,
				selectedMulti: false
			},
			edit: {
				enable: true,
			},
			data: {
				simpleData: {
					enable: true
				}
			},
			callback: {
				beforeDrag: beforeDrag,
				beforeEditName: beforeEditName,
				beforeRemove: beforeRemove,
				beforeRename: beforeRename,
				onRemove: onRemove,				
				onRename: onRename,
				onDblClick: zTreeonDblClick

			}
		};

		var zNodes =<?php echo $kinds; ?>;
		var className = "dark";
		function beforeDrag(treeId, treeNodes) {
			return false;
		}
		function beforeEditName(treeId, treeNode) {
			className = (className === "dark" ? "":"dark");			
			var zTree = $.fn.zTree.getZTreeObj("treeDemo");
			zTree.selectNode(treeNode);
			zTree.editName(treeNode);
			return false;
		}
		function beforeRemove(treeId, treeNode) { 
			return confirm("确认删除 节点 -- " + treeNode.name + " 吗？");
		}

		function beforeRename(treeId, treeNode, newName, isCancel) {
			className = (className === "dark" ? "":"dark");
			if (newName.length == 0) {
				setTimeout(function() {
					var zTree = $.fn.zTree.getZTreeObj("treeDemo");
					zTree.cancelEditName();
					layer.msg("节点名称不能为空",{icon:2});
				}, 0);
				return false;
			}
			return true;
		}
		

		var newCount = 1;
		function addHoverDom(treeId, treeNode) {
			var maxid="<?php echo getmaxid(); ?>";
			var sObj = $("#" + treeNode.tId + "_span");
			if (treeNode.editNameFlag || $("#addBtn_"+treeNode.tId).length>0) return;
			var addStr = "<span class='button add' id='addBtn_" + treeNode.tId
				+ "' title='add node' onfocus='this.blur();'></span>";
			sObj.after(addStr);
			var btn = $("#addBtn_"+treeNode.tId);
			if (btn) btn.bind("click", function(){
				var zTree = $.fn.zTree.getZTreeObj("treeDemo");
				zTree.addNodes(treeNode, {id:(parseInt(maxid) + newCount), pId:treeNode.id, name:"new node" + (newCount++)});
				ajaxpost('',"new node"+(newCount++),treeNode.id,"<?php echo URL('Goods/addkinds'); ?>");
				
				return false;
			});
		};
		function removeHoverDom(treeId, treeNode) {
			$("#addBtn_"+treeNode.tId).unbind().remove();
		};
		
		function onRename(e, treeId, treeNode, isCancel) {
			if(!isCancel){
				ajaxpost(treeNode.id,treeNode.name,'0',"<?php echo URL('Goods/editkinds'); ?>");
			}
		}
		function onRemove(e, treeId, treeNode) {
			
			ajaxpost(treeNode.id,'0','0',"<?php echo URL('Goods/delkinds'); ?>");

		}
		function ajaxpost(id,name,pid,url){			
			if(name){
				$.ajax({
					type:"post",
					url:url,//"<?php echo URL('Goods/editkinds'); ?>",
					data:{id:id,name:name,pid:pid},
					success:function(res){
						layer.msg(res.msg,{icon:res.status});
						if(res.status>1){$('#del').val('1');} //如果删除不成功，也要显示菜单
					},error:function(index){
						layer.msg('网络错误',{icon:2});
						return false;
					}
				});	
			}
		}
		function zTreeonDblClick(event, treeId, treeNode) {
			var val =[],b;
			if(treeNode.children){
				$.each(treeNode.children, function(index,item) {
					val.push(item.id);
					if(item.children){
						$.each(item.children, function(index,child) {
							val.push(child.id);
						});
					}
				});
				b = val.join(",");
			}else{
				b=treeNode.id;
			}
			
			$('#spflid').val(b);
			$('#submit').click();
		};
		$(document).ready(function(){
			$.fn.zTree.init($("#treeDemo"), setting, zNodes);

		});
		
       
    </SCRIPT>
<div class="layui-fluid">
	<div class="layui-row">
		

		<div class="layui-col-sm2">
			<fieldset class="layui-elem-field mr-20" id="kindsheight">
			  <legend class="bold">商品类别</legend>
			  <div id="kindsbox" class="layui-field-box" >
				   <ul id="treeDemo" class="ztree"></ul>		
			  </div>
			</fieldset>			
		</div>	
		<div class="layui-col-sm10">
			<div class="layui-col-sm12">
			
			<form id="headform" class="layui-form layui-form-pane" method="get" method="<?php echo URL('goods/index'); ?>">
			<div class="layui-form-item">
				<div class="layui-input-inline"><input type="hidden" id="spflid" name="spflid" class="layui-input" placeholder="商品id"  value="<?php echo $idarr; ?>"/></div>
				<div class="layui-input-inline"><input type="text" name="keyword" class="layui-input" placeholder="请输入品名或条码" value="<?php echo $key; ?>" /></div>
				<div class="layui-input-inline"><button id="submit" type="submit" name="submit" class="layui-btn" ><i class="fa fa-search"></i>搜索</button></div>
				
				<div class="layui-btn-group f-r mr-10">
					<a class="layui-btn layui-bg-green allstatus" datatype="allon" dataurl='allon'><i class="fa fa-check"></i>	启用</a>
					<a class="layui-btn layui-btn-primary allstatus" datatype="alloff" dataurl='allon'><i class="fa fa-close"></i>禁用</a>
					<a class="layui-btn layui-btn-danger allstatus"  datatype="alldel" dataurl='alldel'><i class="fa fa-trash-o"></i>删除选中</a>
					<a class="layui-btn  add" title="添加商品" dataurl="<?php echo URL('goods/addgoods'); ?>"><i class="fa fa-plus"></i>添加商品</a>

				</div>

			</div>				
			</form>
				
			</div>
	
			<div id="res">
			
			</div>
			
			<table class="layui-table layui-form">
				<thead class="text-center ">
					<th width="20"><input type="checkbox" lay-filter="checkall"  lay-skin="primary" /></th>
					<th width="20">ID</th>
					<th width="140">条码</th>
					<th>商品名称</th>
					<th>分类</th>
					<th width="60">保质期</th>
					<th >状态</th>
					<th width="150">操作</th>
				</thead>
				<tbody>
					<?php if(empty($splist) || (($splist instanceof \think\Collection || $splist instanceof \think\Paginator ) && $splist->isEmpty())): ?>	
					<tr><td colspan="8">
						<div class="layui-col-sm12 ">
							<h2 class="text-center red f-30"><i class="layui-icon layui-icon-cry" style="font-size: 40px;"></i><br>没有获取到数据</h2>
						</div>
						</td>
					</tr>	
					<?php endif; if(is_array($splist) || $splist instanceof \think\Collection || $splist instanceof \think\Paginator): $i = 0; $__LIST__ = $splist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
					<tr>
						<td><input type="checkbox" name="allck[]" value="<?php echo $v['id']; ?>"  lay-skin="primary" /></td>
						<td><?php echo $v['id']; ?></td>
						<td class="text-center"><?php echo $v['code']; ?></td>
						<td><?php echo $v['name']; ?></td>
						<td><?php echo $v['kinds']['cpmmodity_type_name']; ?></td>
						<td class="text-center"><?php echo $v['baozhiq']; ?>天</td>
						<td class="text-center" width="80">							
						      <input <?php if($v['isdel'] == '0'): ?>checked<?php endif; ?> name="isdel" dataid="<?php echo $v['id']; ?>" lay-skin="switch" lay-filter="switch" lay-text="启用|禁用" type="checkbox" class="pb-0 mb-0 mt-10 pt-0">						   					
						</td>
						<td class="text-center">
						  <div class="layui-btn-group">
						    <button class="layui-btn layui-btn-sm add" title="编辑商品" dataurl="<?php echo URL('goods/addgoods',array('id'=>$v['id'])); ?>">编辑</button>
						    <button class="layui-btn layui-btn-sm layui-btn-danger del" arrid="<?php echo $v['id']; ?>" dataurl="<?php echo URL('goods/alldel'); ?>">删除</button>
						  </div>
						</td>
					</tr>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</tbody>
				<tfoot>
					<tr>
						<td colspan="8" class="text-right"><?php echo $splist->render(); ?></td>
					</tr>
				</tfoot>
			</table>
			
			
		</div>	
	</div>
</div>
<script type="text/javascript">
	var winH=$(window).height() - 40;
	$('#kindsheight').height(winH);
	//alert(winH);
</script>

		<script src='/public/nprogress/nprogress.js'></script>
		<script src="/public/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="/public/manage/build/js/custom.js"></script>
		<script src="/public/manage/js/jquery.nicescroll.js"></script>

		<script type="text/javascript">
			var statusurl ="/<?php echo $md_name; ?>/<?php echo $ct_name; ?>/status";
			var posturl ="/<?php echo $md_name; ?>/<?php echo $ct_name; ?>/";
			var rootimg = "";
			var access="<?php echo $access; ?>";
			$('body #kindsheight').niceScroll({
			    cursorcolor: "#ccc",//#CC0071 光标颜色
			    cursoropacitymax: 1, //改变不透明度非常光标处于活动状态（scrollabar“可见”状态），范围从1到0
			    touchbehavior: false, //使光标拖动滚动像在台式电脑触摸设备
			    cursorwidth: "5px", //像素光标的宽度
			    cursorborder: "0", // 游标边框css定义
			    cursorborderradius: "5px",//以像素为光标边界半径
			    autohidemode: false //是否隐藏滚动条
			});		
		</script>
		<script src="/public/manage/js/common.js" type="text/javascript" charset="utf-8"></script>

		
	</body>

</html>
