<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:46:"D:\HT/application/manage\view\login\index.html";i:1526005569;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>贵州小草商盟后台管理系统</title>
  <link href="/public/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
  <link href="/public/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="/public/manage/build/css/custom.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="/public/layui/css/layui.css" media="screen">
  <script src="/public/manage/js/jquery.min.js"></script>
  <script src="/public/layui/layui.js"></script>
</head>
<style>
*body{height:100%}
.login{position: relative; height:auto;width:460px;margin: 10% auto; background-color:#000000;background:rgba(255,255,255,0.3);filter:Alpha(opacity=80);box-shadow: 0 0px 1px #ccc;padding: 40px 40px 60px 40px;}
.login h1{ text-align:center; color:#000; font-size:40px; padding:0 20px 20px 20px; }
.form_code{ position:relative; }
.form_code .code{ position:absolute; right:0; top:1px; cursor:pointer; }
.login_btn{ width:100%; }
.login .layui-form-item{position: relative;}
.login i{position: absolute;left: 15px;top:16px;font-size: 20px;}
</style>
<body style="background: #FFF url(/public/manage/images/loginbg.jpg);">
<div class="login">

	
	    <form class="layui-form layui-form-pane mb-20">
	    	<h1><img src="/public/manage/images/logo1.png" width="80" />小草商盟</h1>	
	    	<div class="layui-form-item"><i class="fa fa-user"></i>
	    		
				<input class="layui-input" style="padding: 0 40px;height: 50px;" name="username" id="username" placeholder="请输入手机号码" lay-verify="required|phone" type="text" autocomplete="off"  value="">
		    </div>
		    <div class="layui-form-item"><i class="fa fa-key"></i>
				<input class="layui-input" style="padding: 0 40px;height: 50px;" name="password" id="password" placeholder="密码" lay-verify="required|pass" type="password" autocomplete="off" value="">
		    </div>
		    <div class="layui-form-item form_code"><i class="fa fa-puzzle-piece"></i>
				<input class="layui-input" style="padding: 0 40px;height: 50px;" name="code" id="code" placeholder="验证码" lay-verify="required" type="text" autocomplete="off" value="">
				<div class="code"><img src="<?php echo captcha_src(); ?>" width="166" height="49" onclick="this.src='<?php echo captcha_src(); ?>?seed='+Math.random()" id="captcha"></div>
		    </div>
			<a id="submit" class="layui-btn login_btn" style="line-height: 50px;height: 50px;font-size: 20px;" lay-submit="" lay-filter="demo1">登录</a>
	   </form>	   	

</div>


 
<script>
layui.use(['form', 'layedit', 'laydate'], function(){
  var form = layui.form
  ,layer = layui.layer
  ,layedit = layui.layedit
  ,laydate = layui.laydate;
  

  //监听提交
  form.on('submit(demo1)', function(data){
  	$.ajax({
  		type:"post",
  		url:"<?php echo URL('login/login'); ?>",
  		//async:true,
  		data:data.field,
  		success:function(res){
  			if(res.code==1){
  				layer.msg(res.msg,{icon:res.code,time:3000},function(){  					
  					window.location.href=res.url;
  				});
  			}else{
  				$('#captcha').click();
  				layer.msg(res.msg,{icon:res.code});
  			}
  			//alert(JSON.stringify(res));
  		},
  		error:function(res){
  			$('#captcha').click();
  			layer.msg('网络错误');
  		}
  	});
  	
  	
//  layer.alert(JSON.stringify(data.field), {
//    title: '最终的提交信息'
//  })
    return false;
  });
  
  
});

document.onkeydown = function(e){
        var ev = document.all ? window.event : e;
        if(ev.keyCode==13) {
         $('#submit').click();
        }
    }
$('.layui-form').find('input').first().focus();
</script>

</body>
</html>
 





