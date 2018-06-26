<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:47:"D:\HT/application/manage\view\menu\addmenu.html";i:1526007472;s:41:"D:\HT\application\manage\view\layout.html";i:1525854419;s:48:"D:\HT\application\manage\view\public\header.html";i:1528785250;s:48:"D:\HT\application\manage\view\public\footer.html";i:1525858100;}*/ ?>
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
 <include file="Public:header" />
<div class="container">
	<div class="row" style="margin-top: 20px;padding: 20px;">
		<form class="layui-form layui-form-pane">
			<div class="layui-form-item"> <label class="layui-form-label">菜单名称</label>
				<div class="layui-input-block"> 
				<select name="ParentID">
					<option value="0">顶级菜单</option>
					
					<?php if(is_array($menulist) || $menulist instanceof \think\Collection || $menulist instanceof \think\Paginator): $i = 0; $__LIST__ = $menulist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
						<option value="<?php echo $v['ID']; ?>" <?php if($info['ParentID'] == $v['ID']): ?>selected<?php endif; ?> ><?php echo $v['html']; ?><?php echo $v['Menu_name']; ?></option>
					<?php endforeach; endif; else: echo "" ;endif; ?>
					
				</select>
				</div>
			</div>
			<div class="layui-form-item"> <label class="layui-form-label"><font color="red" size="+2">*</font>菜单名称</label>
				<div class="layui-input-block"> <input name="Menu_name" autocomplete="off" lay-verify="required"  placeholder="请输入名称" class="layui-input" type="text" value="<?php echo (isset($info['Menu_name']) && ($info['Menu_name'] !== '')?$info['Menu_name']:''); ?>"> </div>
			</div>
			<div class="layui-form-item"> <label class="layui-form-label">链接地址</label>
				<div class="layui-input-block"> <input name="Menu_url" autocomplete="off" placeholder="请输入链接地址" class="layui-input" type="text" value="<?php echo (isset($info['Menu_url']) && ($info['Menu_url'] !== '')?$info['Menu_url']:''); ?>"> </div>
			</div>
			<div class="layui-form-item">
				<div class="layui-inline"> <label class="layui-form-label">排序</label>
					<div class="layui-input-inline"> <input name="Menu_order"  autocomplete="off" class="layui-input" type="text" value="<?php echo (isset($info['Menu_order']) && ($info['Menu_order'] !== '')?$info['Menu_order']:'0'); ?>"> </div>
				</div>
				<div class="layui-inline"> <label class="layui-form-label">状态</label>
					  <input name="Status" value="1" title="显示" <?php if(($info['Status'] == '1') OR ($info['Status'] == '')): ?>checked="checked"<?php endif; ?> type="radio">
				      <input name="Status" value="0" title="关闭" type="radio" <?php if($info['Status'] == '0'): ?>checked="checked"<?php endif; ?>>			
				</div>				
				<div class="layui-inline"> <label class="layui-form-label">是否分组</label>
					  <input name="IsFz" value="1"     <?php if($info['IsFz'] == '1'): ?>checked="checked"<?php endif; ?> title="是"  type="radio">
				      <input name="IsFz" value="0" title="否" <?php if(($info['IsFz'] == '0') OR ($info['IsFz'] == '')): ?>checked="checked"<?php endif; ?>  type="radio">			
				</div>
			</div>
			<div class="layui-form-item"> <label class="layui-form-label">图标</label>
				<div class="layui-input-block"> <input name="Menu_icon" id="menuico" autocomplete="off" placeholder="请输入图标" class="layui-input" type="text" value="<?php echo (isset($info['Menu_icon']) && ($info['Menu_icon'] !== '')?$info['Menu_icon']:''); ?>"> </div>
			</div>
			<div class="layui-form-item">
				<div class="layui-input-block"><a class="layui-btn" lay-submit lay-filter="send" dataurl="<?php echo URL('menu/addmenu'); ?>">立即提交</a>  </div>
			</div>

				<?php if(!(empty($info['ID']) || (($info['ID'] instanceof \think\Collection || $info['ID'] instanceof \think\Paginator ) && $info['ID']->isEmpty()))): ?>
					<input type="hidden" name="id" value="<?php echo (isset($info['ID']) && ($info['ID'] !== '')?$info['ID']:''); ?>" />			
				<?php endif; ?>

		</form>
<section>
<div class="row fontawesome-icon-list">

<a ><i class="fa fa-adjust" aria-hidden="true"></i></a>
<a ><i class="fa fa-american-sign-language-interpreting" aria-hidden="true"></i></a>
<a ><i class="fa fa-anchor" aria-hidden="true"></i> </a>
<a ><i class="fa fa-archive" aria-hidden="true"></i> </a>
<a ><i class="fa fa-area-chart" aria-hidden="true"></i></a>
<a ><i class="fa fa-arrows" aria-hidden="true"></i> </a>
<a ><i class="fa fa-arrows-h" aria-hidden="true"></i> </a>
<a ><i class="fa fa-arrows-v" aria-hidden="true"></i></a>
<a ><i class="fa fa-asl-interpreting" aria-hidden="true"></i></a>
<a ><i class="fa fa-assistive-listening-systems" aria-hidden="true"></i> </a>
<a ><i class="fa fa-asterisk" aria-hidden="true"></i> </a>
<a ><i class="fa fa-at" aria-hidden="true"></i> </a>
<a ><i class="fa fa-audio-description" aria-hidden="true"></i> </a>
<a ><i class="fa fa-automobile" aria-hidden="true"></i></a>
<a ><i class="fa fa-balance-scale" aria-hidden="true"></i> </a>
<a ><i class="fa fa-ban" aria-hidden="true"></i> </a>
<a ><i class="fa fa-bank" aria-hidden="true"></i>  </a>
<a ><i class="fa fa-bar-chart" aria-hidden="true"></i></a>
<a ><i class="fa fa-bar-chart-o" aria-hidden="true"></i></a>
<a ><i class="fa fa-barcode" aria-hidden="true"></i> </a>
<a ><i class="fa fa-bars" aria-hidden="true"></i> </a>
<a ><i class="fa fa-bath" aria-hidden="true"></i> </a>
<a ><i class="fa fa-bathtub" aria-hidden="true"></i> </a>
<a ><i class="fa fa-battery" aria-hidden="true"></i></a>
<a ><i class="fa fa-battery-0" aria-hidden="true"></i></a>
<a ><i class="fa fa-battery-1" aria-hidden="true"></i> </a>
<a ><i class="fa fa-battery-2" aria-hidden="true"></i> </a>
<a ><i class="fa fa-battery-3" aria-hidden="true"></i> </a>
<a ><i class="fa fa-battery-4" aria-hidden="true"></i> </a>
<a ><i class="fa fa-battery-empty" aria-hidden="true"></i> </a>
<a ><i class="fa fa-battery-full" aria-hidden="true"></i></a>
<a ><i class="fa fa-battery-half" aria-hidden="true"></i></a>
<a ><i class="fa fa-battery-quarter" aria-hidden="true"></i></a>
<a ><i class="fa fa-battery-three-quarters" aria-hidden="true"></i> </a>
<a ><i class="fa fa-bed" aria-hidden="true"></i> </a>
<a ><i class="fa fa-beer" aria-hidden="true"></i> </a>
<a ><i class="fa fa-bell" aria-hidden="true"></i> </a>
<a ><i class="fa fa-bell-o" aria-hidden="true"></i></a>
<a ><i class="fa fa-bell-slash" aria-hidden="true"></i></a>
<a ><i class="fa fa-bell-slash-o" aria-hidden="true"></i> </a>
<a ><i class="fa fa-bicycle" aria-hidden="true"></i> </a>
<a ><i class="fa fa-binoculars" aria-hidden="true"></i> </a>
<a ><i class="fa fa-birthday-cake" aria-hidden="true"></i></a>
<a ><i class="fa fa-blind" aria-hidden="true"></i> </a>
<a ><i class="fa fa-bluetooth" aria-hidden="true"></i> </a>
<a ><i class="fa fa-bluetooth-b" aria-hidden="true"></i> </a>
<a ><i class="fa fa-bolt" aria-hidden="true"></i> </a>
<a ><i class="fa fa-bomb" aria-hidden="true"></i> </a>
<a ><i class="fa fa-book" aria-hidden="true"></i> </a>
<a ><i class="fa fa-bookmark" aria-hidden="true"></i> </a>
<a ><i class="fa fa-bookmark-o" aria-hidden="true"></i> </a>
<a ><i class="fa fa-braille" aria-hidden="true"></i> </a>
<a ><i class="fa fa-briefcase" aria-hidden="true"></i> </a>
<a ><i class="fa fa-bug" aria-hidden="true"></i> </a>
<a ><i class="fa fa-building" aria-hidden="true"></i> </a>
<a ><i class="fa fa-building-o" aria-hidden="true"></i> </a>
<a ><i class="fa fa-bullhorn" aria-hidden="true"></i> </a>
<a ><i class="fa fa-bullseye" aria-hidden="true"></i> </a>
<a ><i class="fa fa-bus" aria-hidden="true"></i> </a>
<a ><i class="fa fa-cab" aria-hidden="true"></i>  </a>
<a ><i class="fa fa-calculator" aria-hidden="true"></i> </a>
<a ><i class="fa fa-calendar" aria-hidden="true"></i> </a>
<a ><i class="fa fa-calendar-check-o" aria-hidden="true"></i></a>
<a ><i class="fa fa-calendar-minus-o" aria-hidden="true"></i> </a>
<a ><i class="fa fa-calendar-o" aria-hidden="true"></i> </a>
<a ><i class="fa fa-calendar-plus-o" aria-hidden="true"></i></a>
<a ><i class="fa fa-calendar-times-o" aria-hidden="true"></i></a>
<a ><i class="fa fa-camera" aria-hidden="true"></i></a>
<a ><i class="fa fa-camera-retro" aria-hidden="true"></i> </a>
<a ><i class="fa fa-car" aria-hidden="true"></i> </a>
<a ><i class="fa fa-caret-square-o-down" aria-hidden="true"></i> </a>
<a ><i class="fa fa-caret-square-o-left" aria-hidden="true"></i> </a>
<a ><i class="fa fa-caret-square-o-right" aria-hidden="true"></i> </a>
<a ><i class="fa fa-caret-square-o-up" aria-hidden="true"></i></a>
<a ><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></a>
<a ><i class="fa fa-cart-plus" aria-hidden="true"></i></a>
<a ><i class="fa fa-cc" aria-hidden="true"></i> </a>
<a ><i class="fa fa-certificate" aria-hidden="true"></i> </a>
<a ><i class="fa fa-check" aria-hidden="true"></i> </a>
<a ><i class="fa fa-check-circle" aria-hidden="true"></i> </a>
<a ><i class="fa fa-check-circle-o" aria-hidden="true"></i> </a>
<a ><i class="fa fa-check-square" aria-hidden="true"></i> </a>
<a ><i class="fa fa-check-square-o" aria-hidden="true"></i> </a>
<a ><i class="fa fa-child" aria-hidden="true"></i> </a>
<a ><i class="fa fa-circle" aria-hidden="true"></i> </a>
<a ><i class="fa fa-circle-o" aria-hidden="true"></i> </a>
<a ><i class="fa fa-circle-o-notch" aria-hidden="true"></i> </a>
<a ><i class="fa fa-circle-thin" aria-hidden="true"></i> </a>
<a ><i class="fa fa-clock-o" aria-hidden="true"></i> </a>
<a ><i class="fa fa-clone" aria-hidden="true"></i> </a>
<a ><i class="fa fa-close" aria-hidden="true"></i>  </a>
</div>
</section>		
	</div>
</div>
<include file="Public:footer" />
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
