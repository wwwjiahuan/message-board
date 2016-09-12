<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<meta http-equive="content-type" content="text/html;charset=utf=8">
		<title>Register</title>
		<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/basic.css" />
		<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/Home/reg.css" />
		<script type="text/javascript" src="__PUBLIC__/Js/jquery.js"></script>
		<script>
			$(function(){
				var error=new Array();
				$('input[name="username"]').blur(function(){
					var username=$(this).val();
					$.get('__URL__/checkName',{'username':username},function(data){
						if(data=='不允许'){
							$('input[name="username"]').after('<p id="umessage" style="color:red">该用户已经注册</p>');
						}else{
							error['username']=0;
							$('#umessage').remove();
						}
					});
				});
				//提交表单
				$('img.register').click(function(){
					if(error['username']==1){
						return false;
					}else{
						$('form[name="myForm"]').submit();
					}	
				});
			});

		</script>
	</head>
	<body>
		<form action='__URL__/doReg' method='post' name='myForm'>
			用 户 名：<input type='text' name='username'/></br>
			密　　码：<input type='password' name='password'/></br>
			确认密码：<input type='password' name='repassword'/></br>
			性　　别：<input type='radio' name='sex' value='1' class='radio'/>男
				  <input type='radio' name='sex' value='0' class='radio'/>女</br>
			验 证 码：<input type='text' name='code'/>
					  <img src='__APP__/Public/code?h=30&w=30' onclick='this.src=this.src+"?"+Math.random()'/>
					  </br>
			<img src='__PUBLIC__/Images/register.gif'class='register'/>
			<img src='__PUBLIC__/Images/reset.gif' class='reset'/>
		</form>
	</body>
</html>