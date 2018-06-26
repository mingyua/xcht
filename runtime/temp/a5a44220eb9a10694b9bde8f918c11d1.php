<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:49:"D:\HT/application/manage\view\goods\addgoods.html";i:1526009626;s:41:"D:\HT\application\manage\view\layout.html";i:1525854419;s:48:"D:\HT\application\manage\view\public\header.html";i:1528785250;s:48:"D:\HT\application\manage\view\public\footer.html";i:1525858100;}*/ ?>
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
<script type="text/javascript" src="/public/manage/js/pinying.js"></script>
<div class="container">
	<div class="row" style="margin-top: 20px;padding: 20px;">
		<form class="layui-form layui-form-pane">
			<div class="layui-col-sm9">
			<div class="layui-form-item">
				<div class="layui-inline">
			      <label class="layui-form-label"><font color="red" size="+2">*</font>商品名称</label>
			      <div class="layui-input-inline">
			        <input id="txtChinese" name="name" onKeyUp="query()" lay-verify="required" autocomplete="off" placeholder="请输入商品名称" class="layui-input" type="text" value="<?php echo (isset($info['name']) && ($info['name'] !== '')?$info['name']:''); ?>">
			     </div>
			    </div>
			    <div class="layui-inline">
			      <label class="layui-form-label"><font color="red" size="+2">*</font>商品品牌</label>
			      <div class="layui-input-inline">
				      	<input id="autoload" dataurl="<?php echo URL('goods/getpp'); ?>" lay-verify="required" autocomplete="off" placeholder="请输入商品品牌" class="layui-input" type="text" <?php if(!(empty($info['shangpinppid']) || (($info['shangpinppid'] instanceof \think\Collection || $info['shangpinppid'] instanceof \think\Paginator ) && $info['shangpinppid']->isEmpty()))): ?>value="<?php echo (getpp($info['shangpinppid']) ?: ''); ?>"<?php endif; ?> >
			      		<div class="autobox"></div><input type="hidden" name="shangpinppid" id="shangpinppid" value="<?php echo (isset($info['shangpinppid']) && ($info['shangpinppid'] !== '')?$info['shangpinppid']:''); ?>" />
			      	
			      </div>
			    </div>
			</div>

			<div class="layui-form-item">
				<div class="layui-inline">
			      <label class="layui-form-label"><font color="red" size="+2">*</font>商品规格</label>
			      <div class="layui-input-inline">
			        <input name="shangpingg" lay-verify="required" autocomplete="off" placeholder="请输入商品规格" class="layui-input" type="text" value="<?php echo (isset($info['shangpingg']) && ($info['shangpingg'] !== '')?$info['shangpingg']:''); ?>">
			      </div>
			    </div>
				<div class="layui-inline">
			      <label class="layui-form-label"><font color="red" size="+2">*</font>商品分类</label>
			      <div class="layui-input-inline">
			          	<input id="autoload" dataurl="<?php echo URL('goods/getkinds'); ?>" lay-verify="required" autocomplete="off" placeholder="请输入商品分类" class="layui-input" type="text" <?php if(!(empty($info['shangpinflid']) || (($info['shangpinflid'] instanceof \think\Collection || $info['shangpinflid'] instanceof \think\Paginator ) && $info['shangpinflid']->isEmpty()))): ?>value="<?php echo (getfl($info['shangpinflid']) ?: ''); ?>"<?php endif; ?>>
						<div class="autobox"></div><input type="hidden" name="shangpinflid" id="shangpinflid" value="<?php echo (isset($info['shangpinflid']) && ($info['shangpinflid'] !== '')?$info['shangpinflid']:''); ?>" />
						 
			      </div>
			    </div>

			</div>			
			<div class="layui-form-item">
				<div class="layui-inline">
			      <label class="layui-form-label"><font color="red" size="+2">*</font>商品条形码</label>
			      <div class="layui-input-inline">
			        <input id="code" name="code" lay-verify="required"  autocomplete="off" placeholder="请输入商品条形码" class="layui-input" type="text" value="<?php echo (isset($info['code']) && ($info['code'] !== '')?$info['code']:''); ?>">
			      </div>
			    </div>

			    <div class="layui-inline">
			      <label class="layui-form-label"><font color="red" size="+2">*</font>商品单位</label>
			      <div class="layui-input-inline">
			        <input id="autoload" dataurl="<?php echo URL('goods/getdw'); ?>" lay-verify="required" autocomplete="off" placeholder="请输入商品单位" class="layui-input" type="text" <?php if(!(empty($info['danwei']) || (($info['danwei'] instanceof \think\Collection || $info['danwei'] instanceof \think\Paginator ) && $info['danwei']->isEmpty()))): ?> value="<?php echo (getdw($info['danwei']) ?: ''); ?>"<?php endif; ?>>
			      	<div class="autobox"></div><input type="hidden" name="danwei" id="danwei" value="<?php echo (isset($info['danwei']) && ($info['danwei'] !== '')?$info['danwei']:''); ?>" />
			      </div>
			    </div>
			</div>			
			<div class="layui-form-item"> 				
				
			      <label class="layui-form-label">生产厂家</label>
			      <div class="layui-input-block">
			        <input name="changjia" lay-verify="" autocomplete="off" placeholder="厂家" class="layui-input" type="text" value="<?php echo (isset($info['changjia']) && ($info['changjia'] !== '')?$info['changjia']:''); ?>">			      	
			      </div>
			    

			</div>
			<div class="layui-form-item"> 
				
				<div class="layui-inline">
			      <label class="layui-form-label"><font color="red" size="+2">*</font>保质期</label>
			      <div class="layui-input-inline">
			        <input name="baozhiq" lay-verify="required|number" autocomplete="off" placeholder="保质期" class="layui-input" type="text" value="<?php echo (isset($info['baozhiq']) && ($info['baozhiq'] !== '')?$info['baozhiq']:''); ?>">
			      	<label class="lableright">天</label>
			      </div>
			    </div>
				<div class="layui-inline">
			      <label class="layui-form-label"><font color="red" size="+2">*</font>数量</label>
			      <div class="layui-input-inline">
			        <input name="shuliang" lay-verify="required|number" autocomplete="off" placeholder="最小单位" class="layui-input" type="text" value="<?php echo (isset($info['shuliang']) && ($info['shuliang'] !== '')?$info['shuliang']:''); ?>">			      	
			      </div>
			    </div>
			</div>
			<div class="layui-form-item">				
			      <label class="layui-form-label">商品描述</label>
			      <div class="layui-input-block">
						<textarea name="shangpinms" class="layui-textarea"><?php echo (isset($info['shangpinms']) && ($info['shangpinms'] !== '')?$info['shangpinms']:''); ?></textarea>
			      </div>
			</div>
			<div class="layui-form-item">				
			      <label class="layui-form-label">商品备注</label>
			      <div class="layui-input-block">
			        <input  name="beizhu" lay-verify="" autocomplete="off" placeholder="请输入商品备注" class="layui-input" type="text" value="<?php echo (isset($info['beizhu']) && ($info['beizhu'] !== '')?$info['beizhu']:''); ?>">
			      </div>
			</div>
			</div>
			<div class="layui-col-sm3 text-center">
				<div class="layui-form-item">
			   <a href="javascript:;" id="sptpss" class="sptp upimgbox" onclick="upimg('#sptp');"  title="商品图片"><?php if(!(empty($info['id']) || (($info['id'] instanceof \think\Collection || $info['id'] instanceof \think\Paginator ) && $info['id']->isEmpty()))): ?><img src="/<?php echo getsptp($info['id']); ?>" width="100%" ><?php else: ?>商品图片<?php endif; ?></a>
			   <input type="hidden" id="sptpImg" lay-verify="filetu" name="sptpImg" <?php if(!(empty($info['id']) || (($info['id'] instanceof \think\Collection || $info['id'] instanceof \think\Paginator ) && $info['id']->isEmpty()))): ?>value="<?php echo (getsptp($info['id']) ?: '0'); ?>" <?php endif; ?>/>
				</div>
			</div>
			
			<div class="layui-form-item">
				<div class="layui-input-block text-center"><a class="layui-btn" lay-submit lay-filter="send" dataurl="<?php echo URL('goods/addgoods'); ?>">立即提交</a>  </div>
			</div>
				<input type="hidden" name="pinyinm" id="py" value="<?php echo (isset($info['pinyinm']) && ($info['pinyinm'] !== '')?$info['pinyinm']:''); ?>" />				
				<?php if(!(empty($info['id']) || (($info['id'] instanceof \think\Collection || $info['id'] instanceof \think\Paginator ) && $info['id']->isEmpty()))): ?>
					<input type="hidden" name="id" value="<?php echo (isset($info['id']) && ($info['id'] !== '')?$info['id']:''); ?>" />			
				<?php endif; ?>

		</form>			
			<button id="sptp" class="layui-btn demoMore hidden" lay-data="{ url: '<?php echo URL('upload/index'); ?>' }">商品图片</button>
	</div>
</div>
<script>

	function upimg(obj){$(obj).click();};
$('body').on('keyup','#autoload',function(){		
		var _this=$(this), keywords = $(this).val(),url=$(this).attr('dataurl');
		if (keywords=='') { _this.next().hide(); return };
		$.ajax({
			type:"get",
			url:url,
			data:{keys:keywords},
			beforeSend:function(){
				_this.next().append("<div>正在加载...</div>");				
			},
			success:function(res){
				_this.next().empty().show();				
				if(res.data==''){
					_this.val('');
					_this.next().append('<div class="error">没有数据  "' + keywords + '"请先添加</div>');
				}
				
				$.each(res.data, function(){
					_this.next().append('<div class="click_work" dataarr="'+ 	this.id +'">'+ this.name +'</div>');
				})
			},
			error:function(){
				$('.autobox').empty().show();
				$('autobox').append('<div class="click_work">失败 "' + keywords + '"</div>');
				
			}
		});

});

function query(){
    var str = document.getElementById("txtChinese").value.trim();
    if(str == "") return;
    var arrRslt = makePy(str);
    document.getElementById("py").value=arrRslt;//清空下拉框    
}
</script>

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
