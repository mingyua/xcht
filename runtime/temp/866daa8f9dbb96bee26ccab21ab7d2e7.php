<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:46:"D:\HT/application/manage\view\index\right.html";i:1526026841;s:41:"D:\HT\application\manage\view\layout.html";i:1525854419;s:48:"D:\HT\application\manage\view\public\header.html";i:1528785250;s:48:"D:\HT\application\manage\view\public\footer.html";i:1525858100;}*/ ?>
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
 
<div class="container" style="padding:10px 20px;">

    <div class="row clear">
      <div class="col-md-3 col-sm-6 col-xs-12 ">
       <div class="count4">
        <i class="glyphicon glyphicon-usd bg2"></i>
        <span>
         <p class="price">250,000.00</p>
         <p class="title">日销售额(元)</p>
     </span>
 </div>

</div>
<div class="col-md-3 col-sm-6 col-xs-12">
   <div class="count4">
    <i class="glyphicon glyphicon-hourglass bg1"></i>
    <span>
     <p class="price">2,500.00</p>
     <p class="title">日利润(元)</p>
 </span>

</div>

</div>
<div class="col-md-3 col-sm-6 col-xs-12">
   <div class="count4">
    <i class="glyphicon glyphicon-shopping-cart bg3"></i>
    <span>
     <p class="price">25,000</p>
     <p class="title">日销售量(单)</p>
 </span>

</div>


</div>
<div class="col-md-3 col-sm-6 col-xs-12">
   <div class="count4">
    <i class="glyphicon glyphicon-leaf bg4"></i>
    <span>
     <p class="price">25</p>
     <p class="title">退货金额(元)</p>
 </span>

</div>


</div>
</div>

<div class="row clearfix" style="margin-top: 30px;">
	<div class="col-md-6 col-sm-6 col-xs-12">
       <div id="daycount" style="width: 98%;height:500px;box-shadow: 0 2px 4px #CCD0D7;background: #FFFFFF;padding: 10px;"></div>

   </div>	
   <div class="col-md-6 col-sm-6 col-xs-12">
       <div id="daytop" style="width: 98%;height:500px;box-shadow: 0 2px 4px #CCD0D7;background: #FFFFFF;padding: 10px;"></div>
   </div>	

   <div class="col-md-6 col-sm-6 col-xs-12">
       <div id="monthcount" style="width: 98%;height:500px;box-shadow: 0 2px 4px #CCD0D7;background: #FFFFFF;padding: 10px;margin-top: 10px; "></div>
   </div>	


   <div class="col-md-6 col-sm-6 col-xs-12">
       <div id="spcount" style="width: 98%;height:500px;box-shadow: 0 2px 4px #CCD0D7;background: #FFFFFF;padding: 10px; margin-top: 10px"></div>
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
