<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:45:"D:\HT/application/manage\view\menu\index.html";i:1525854419;s:41:"D:\HT\application\manage\view\layout.html";i:1525854419;s:48:"D:\HT\application\manage\view\public\header.html";i:1528785250;s:48:"D:\HT\application\manage\view\public\footer.html";i:1525858100;}*/ ?>
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
	<div class="row" style="margin-top: 5px;">
		<div class="layui-col-sm12 pb-0">	
		<div id="headform"><span class="title">菜单列表</span><button class="layui-btn f-r add" title="添加菜单" dataurl="<?php echo URL('menu/addmenu'); ?>">添加菜单</button></div>
		</div>
		<table class="table table-bordered">
			<thead>
				<th>ID</th>
				<th>菜单名称</th>
				<th>链接地址</th>
				<th>排序</th>
				<th>是否显示</th>
				<th width="200">操作</th>
			</thead>
			<tbody>
				<?php if(is_array($menulist) || $menulist instanceof \think\Collection || $menulist instanceof \think\Paginator): $i = 0; $__LIST__ = $menulist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
				<tr>
					<td><?php echo $v['ID']; ?></td>
					<td><?php echo $v['html']; ?><?php echo $v['Menu_name']; ?></td>
					<td><?php echo $v['Menu_url']; ?></td>
					<td id="order" dataid="order" dataurl="<?php echo URL('menu/order'); ?>"><?php echo $v['Menu_order']; ?></td>
					<td><?php if($v['Status'] == '1'): ?>显示<?php else: ?>关闭<?php endif; ?></td>
					<td id="usebtn" class="text-center">

						<button class="layui-btn layui-btn-sm add" title="修改菜单" dataurl="<?php echo URL('menu/addmenu',array('id'=>$v['ID'])); ?>">修改</button>
						<button class="layui-btn layui-btn-sm layui-btn-danger del" arrid="<?php echo $v['ID']; ?>" dataurl="<?php echo URL('menu/delmenu'); ?>">删除</button>
					</td>
				</tr>
					
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
			
		</table>
	</div>
</div>
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
