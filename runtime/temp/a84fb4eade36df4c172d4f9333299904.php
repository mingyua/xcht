<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:46:"D:\HT/application/manage\view\goods\brand.html";i:1525854419;s:41:"D:\HT\application\manage\view\layout.html";i:1525854419;s:48:"D:\HT\application\manage\view\public\header.html";i:1528785250;s:48:"D:\HT\application\manage\view\public\footer.html";i:1525858100;}*/ ?>
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
		
			<form id="headform" class="layui-form layui-form-pane" method="get" method="<?php echo URL('goods/index'); ?>">
			<div class="layui-form-item">
				
				<div class="layui-input-inline"><input type="text" name="keyword" class="layui-input" placeholder="请输入品名或条码" /></div>
				<div class="layui-input-inline"><button type="submit" name="submit" class="layui-btn" >搜索</button></div>
				
				<a class="btn btn-primary f-r addpro" title="品牌" dataurl="<?php echo URL('goods/addpp'); ?>">添加品牌</a>
			</div>				
			</form>
		
		<div id="adddata" class="layui-row">
		<?php if(is_array($brandlist) || $brandlist instanceof \think\Collection || $brandlist instanceof \think\Paginator): $i = 0; $__LIST__ = $brandlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
		<div class="layui-col-sm2">
			<div class="brandbox">
				<h2><?php echo $v['name']; ?></h2>
				<div class="layui-btn-group edit" style="width: 100%;">
					<a class="layui-btn addpro" style="width:50%" dataname="<?php echo $v['name']; ?>" dataid="<?php echo $v['ID']; ?>" title="品牌" dataurl="<?php echo URL('goods/addpp'); ?>"><i class="fa fa-edit"></i>编辑</a>
				    <a class="layui-btn layui-btn-danger del" arrid="<?php echo $v['ID']; ?>" dataurl="<?php echo URL('goods/delsppp'); ?>" style="width:50%"><i class="fa fa-trash"></i>删除</a>
				</div>
			</div>
		</div>	
		
		<?php endforeach; endif; else: echo "" ;endif; ?>
		<div class="layui-col-sm12 text-right">
			<?php echo $brandlist->render(); ?>
		</div>
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
