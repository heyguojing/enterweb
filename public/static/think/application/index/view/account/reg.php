<!DOCTYPE html>
<html>
<head>
	<title>小米商城-登录</title>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/x-icon" href="/static/img/footlogo.png" />
    <link rel="stylesheet" type="text/css" href="/static/layui/css/layui.css">
    <link rel="stylesheet" type="text/css" href="/static/css/login.css">
    <link rel="stylesheet" type="text/css" href="/static/font-awesome/css/font-awesome.min.css">
	<script type="text/javascript" src="/static/layui/layui.js"></script>
</head>
<body>
	<div class="header">
		<a href=" ./index.html"><img src="/static/img/5.png"></a>
	</div>
	<div class="content">
		<div class="login_content">
			<div class="login_form">
				<div class="login_form_main" style="margin-top:25px;">
					<p id="regTabs_0" onclick="ChangeReg('0','register_',1)" style="color:#FF6A00 ">账号注册</p>
					<span class="span">|</span>
		        	<p id="regTabs_1" onclick="ChangeReg('1','register_',1)">帐号登录</p>
		        	<div class="clear"></div>
			    </div>
			    <div class="login_form_content"id="register_0" >
				    <form>
				    	<input type="text" name="username" placeholder="邮箱/手机号码/小米ID">
				    	<input type="password" name="password" placeholder="密码">
				    	<input type="password" name="re_password" placeholder="确认密码">
				    	<button onclick="doreg();return false;">注册</button>
				    </form>
				    <h6><a href="#" style="color: #FF6A00;">手机短信登录/注册</a><span><a href="#">立即注册</a> &nbsp;  |  &nbsp; <a href=""> 忘记密码？</a></span></h6>
				    <div class="clear"></div>
				    <div class="login_form_pic">
				    	<p>其他方式登录</p>
				    	<ul>
				    		<li style="margin-right: 35px;" class="login_form_pic1"><i class="fa fa-qq"></i> </li>
				    		<li style="margin-right: 35px;" class="login_form_pic2"><i class="fa fa-weibo"></i> </li>
				    		<li style="margin-right: 35px;" class="login_form_pic3"><i class="fa fa-twitter-square"></i></li>
				    		<li class="login_form_pic4"><i class="fa fa-weixin"></i> </li>	
				    	</ul>
				    </div>
				    <div class="clear"></div>
				</div>
				<div class="login_form_content0" id="register_1"style="display: none;"  >
					<img src="/static/img/下载.png">
					<p>使用<span style="color:#FF6A00; ">小米商城APP</span>扫一扫</p>
					<p>小米手机可打开「设置」>「小米帐号」扫码登录</p>
				</div>    
			</div>
		</div>
	</div>
	<p style="margin-top: 60px;">简体<span>|</span>繁体<span>|</span>English<span>|</span> 常见问题<span>|</span> 隐私政策</p>
	<p>小米公司版权所有-京ICP备10046444-<img src="/static/img/ghs.png"> 京公网安备11010802020134号-京ICP证110507号</p>

<script type="text/javascript">

	layui.use(['layer'],function(){
		$ = layui.jquery;
		layer = layui.layer;
	});
	
	function ChangeReg(divId,divName,Count) {
		for(var i=0;i<=Count;i++){
			document.getElementById(divName+i).style.display="none";
		}
		document.getElementById(divName+divId).style.display="block";
		if (divId==0) {
			document.getElementById("regTabs_0").style.color="#FF6A00";
			document.getElementById("regTabs_1").style.color="#757575";
		}
		if (divId==1) {
			document.getElementById("regTabs_0").style.color="#757575";
			document.getElementById("regTabs_1").style.color="#FF6A00";
		}
	}

	// 注册
	function doreg(){
		var username = $('input[name="username"]').val();
		var pwd = $('input[name="password"]').val();
		var re_pwd = $('input[name="re_password"]').val();
		if(username == ''){
			layer.msg('请输入用户名',{'icon':2});
			return;
		}
		if(pwd == ''){
			layer.msg('请输入密码',{'icon':2});
			return;
		}
		if(pwd != re_pwd){
			layer.msg('两次密码不一致',{'icon':2});
			return;
		}

		$.post('/index.php/index/account/doreg',$('form').serialize(),function(res){
			if(res.code>0){
				layer.msg(res.msg,{'icon':2});
			}else{
				layer.msg(res.msg,{'icon':1});
				setTimeout(function(){window.location.href = '/index.php/index/index/index';},1000);
			}
		},'json');
	}

</script>
</body>
</html>