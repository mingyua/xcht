<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:45:"D:\HT/application/manage\view\shop\index.html";i:1528705355;s:41:"D:\HT\application\manage\view\layout.html";i:1525854419;s:48:"D:\HT\application\manage\view\public\header.html";i:1528785250;s:48:"D:\HT\application\manage\view\public\footer.html";i:1525858100;}*/ ?>
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
 <div class="layui-fluid">
	<div class="layui-row" style="margin-top: 5px;">
		
			<form id="headform" class="layui-form layui-form-pane" method="get" method="<?php echo URL('shop/index'); ?>">
			<div class="layui-form-item"> <label class="layui-form-label">地区选择</label>
				<div class="layui-input-inline"> 
				<select id="prov" name="position_id" lay-filter="prov"></select>
				</div>
				<div  class="layui-input-inline"> 
				<select id="city" name="position_id1" lay-filter="city"></select>
				</div>
				<div  class="layui-input-inline"> 
				<select id="area" name="position_id2"></select>
				</div>
				<div class="layui-input-inline"><input type="text" name="keyword" class="layui-input" placeholder="请输入店铺名称" /></div>
				<div class="layui-input-inline"><button type="submit" name="submit" class="layui-btn" >搜索</button></div>
				
				<a class="layui-btn f-r add" title="添加店铺" dataurl="<?php echo URL('shop/addshop'); ?>">添加店铺</a>
			</div>				
			</form>
			
		<?php if(empty($storelist) || (($storelist instanceof \think\Collection || $storelist instanceof \think\Paginator ) && $storelist->isEmpty())): ?>	
		<div class="layui-col-sm12 ">
			<h2 class="text-center red f-30"><i class="layui-icon layui-icon-cry" style="font-size: 40px;"></i><br>没有获取到数据</h2>
		</div>	
		<?php endif; if(is_array($storelist) || $storelist instanceof \think\Collection || $storelist instanceof \think\Paginator): $i = 0; $__LIST__ = $storelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
		<div id="blist" class="layui-col-sm3">
			<div class="md-5 pd-20 <?php if($v['Statue'] == '1'): ?>layui-bg-blue <?php else: ?>layui-bg-red<?php endif; ?>  ">
				<h2 class="mb-20 mt-10"><?php echo $v['store_name']; ?></h2>
				<div class="pl-15">
					<p class="mb-10"><i class="fa fa-shopping-bag mr-10"></i>店铺编号：<?php echo $v['store_code']; ?></p>
					<p class="mb-10"><i class="fa fa-money mr-10"></i>当日营业额：<font color="#FF5722" size="+1">￥<?php echo $v['xsje']; ?></font></p>
					<p class="mb-10"><i class="fa fa-user mr-10"></i>当班收银员：<?php echo $v['cashiername']; ?></p>
					<p class="mb-10"><i class="fa fa-phone mr-10"></i>联系电话：<?php echo $v['TEL']; ?></p>				
					<p class="mb-10"><i class="fa fa-desktop mr-10"></i>设备状态： 
						<span class="layui-badge layui-bg-cyan">离线</span>  
						<span class="layui-badge layui-bg-green">在线</span>  
						<span class="layui-badge layui-bg-blue"><a class="layui-badge layui-bg-gray" href="<?php echo URL('shop/view',array('dpid'=>$v['store_code'])); ?>" target="_blank">查看今日销售数据</a></span></p>
											
				</div>
			</div>
			<div class="actbox">
				
				<div class="layui-btn-group">
					<?php if($v['Statue'] == '1'): ?>
					<button class="layui-btn layui-btn-sm layui-bg-gray add" title="修改" dataurl="<?php echo URL('shop/addshop',array('tel'=>$v['TEL'])); ?>"><i class="fa fa-edit"></i></button>					
					<button class="layui-btn layui-btn-sm layui-bg-red status " title="禁用" dataid="<?php echo $v['TEL']; ?>"><i class="fa fa-close"></i></button>
					<button class="layui-btn  layui-btn-sm layui-bg-orange bold add" title="支付设置" dataurl="<?php echo URL('shop/payset',array('dpid'=>$v['store_code'],'ucode'=>$v['user_code'])); ?>">支付设置</button>					
					<?php else: ?>
					<button class="layui-btn layui-btn-sm layui-bg-green status" title="启用" dataid="<?php echo $v['TEL']; ?>"><i class="fa fa-check"></i></button>
					<?php endif; ?>
				</div>
			</div>
			
		</div>
		<?php endforeach; endif; else: echo "" ;endif; ?>
		
		<div class="layui-col-sm12 text-right">
			<?php echo $storelist->render(); ?>
		</div>
	</div>
</div>
<script>
	var arrdata='<?php echo $diqu; ?>';
	function upimg(div){$(div).click();}
	function prov(arr,fid){
		var html='<option value="">请选择</option>';
		var data=JSON.parse(arr);
		$.each(data, function(key,val) {
			if(val.fuid==fid){
			html += '<option value="'+val.ID+'">'+val.name+'</option>';
			}
		});
		return html;
	};	
layui.use(['form', 'layer','element'], function() {
	var $ = layui.jquery,		
		form = layui.form,
		layer = layui.layer,	
		element = layui.element;
		

	form.on('select(prov)', function(data){			
		$('#city').html(prov(arrdata,data.value));
		//layer.msg(data.value);
		form.render();
	});
	form.on('select(city)', function(data){			
		$('#area').html(prov(arrdata,data.value));
		//layer.msg(data.value);
		form.render();
	});

});
$('#prov').html(prov(arrdata,0));
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
