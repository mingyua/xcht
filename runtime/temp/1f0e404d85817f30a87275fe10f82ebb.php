<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:44:"D:\HT/application/manage\view\shop\view.html";i:1528707245;s:41:"D:\HT\application\manage\view\layout.html";i:1525854419;s:48:"D:\HT\application\manage\view\public\header.html";i:1528785250;s:48:"D:\HT\application\manage\view\public\footer.html";i:1525858100;}*/ ?>
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
 <!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<title>小草</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box;}
html,body,h1,h2,h3,p,ul{padding:0;margin:0;}
.clearfx {zoom: 1;}
.clearfx:after{width:0;height:0;clear:both;content:".";display:block;font-size:0;}
.main-box {width: 100%;height: auto;margin: 0 auto;}
.row {width: 100% height:auto;margin-bottom: 20px;}
.title h1 {padding:15px;text-align:center;color:#fff;background-color:#555;margin-bottom:40px;}
.title h1 span{color:#f0d;}
.left,.center,.right {float:left;height: auto;}
.left {width: 15%}
.left ul {width:100%;list-style: none;padding-left:10px;padding-right:10px;}
.left ul li{width:auto;margin-bottom:10px;background-color:#009688;text-align:center;height:160px;padding-top:40px;cursor: pointer;transition: all 0.6s;-moz-transition: all 0.6s;-webkit-transition: all 0.6s;-o-transition: all 0.6s;}
.left ul li:first-child{background-color:#350696;}
.left ul li:last-child{margin-bottom:0;}
.left ul li h3{color:#feefee;}
.left ul li p {color: #ffd600;font-size: 35px;padding-top:5px}
.center {width: 63%;}
.right {width: 22%;padding-left:10px;padding-right:10px;}
.right h2 {background-color:#009688;height:60px;line-height:60px;text-align:center;color:#fff;}
.right ul {border:1px #ccc solid;height: 440px;overflow-y: auto;overflow-x: hidden;font-size: 12px;background-color:#fefefe;padding:5px;}
.right ul li {border-bottom: 1px #ddd solid;margin-right: 10px;padding-bottom: 10px;padding-top: 10px;}
.box {padding:10px;margin-left:15%;margin-right:22%;background-color:#eed;}
.box span {color:red;}
#todaytime {float:right;}
#charts-box {width:100%;box-shadow: 0 0 5px #000;height:500px;}
@media screen and (max-width:1225px) {
    .main-box {width:1225px;}
    .left ul li p {color: #ffd600;font-size: 28px;padding-top:10px}
}
</style>
<script type="text/javascript">var dianpuid = "<?php echo $id; ?>",logurl="<?php echo URL('shop/getsalelog'); ?>";</script>
</head>

<body>
<div class="main-box">
    <div class="row title">
        <h1>当前店铺 : [ <span><?php echo $dpname; ?></span> ]</h1>
        <div class="box">
            <span id="todaytime"></span>
            昨日成交额: <span id="zrCJE">0</span> 昨日客单: <span id="zrKD">0</span> 昨日客单价: <span id="zrKDJ">0</span> 
        </div>
    </div>
    <div class="row clearfx">
        <div class="left">
            <ul>
                <li>
                    <h3>今日成交额</h3>
                    <p id="xse">0,00</p>
                </li>
                <li>
                    <h3>今日客单</h3>
                    <p id="kedan">0,00</p>
                </li>
                <li>
                    <h3>今日客单价</h3>
                    <p id="kedanj">0,00</p>
                </li>
            </ul>
        </div>
        <div class="center">
            <div id="charts-box"></div>
        </div>
        <div class="right">
            <h2>订单明细</h2>
            <ul id="jilu">
                <li>暂无数据</li>
            </ul>
        </div>
    </div>
</div>
<script src="/public/manage/view/jquery.js"></script>
<script src="/public/manage/view/echarts.js"></script>
<script src="/public/manage/view/main.js"></script>
</body>
</html>
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
