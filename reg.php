<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>用户注册</title>
		<link rel="stylesheet" type="text/css" href="css/layui.css"/>
		<style type="text/css">
			body{
				margin: 0px;
				padding: 0px;
				background-color: #CCCCCC;
			}
			.panel{
				width: 380px;
				height: 300px;
				position: absolute;
				left: 50%;
				margin-left: -190px;
				top: 50%;
				margin-top: -140px;
				border: 1px solid #009688;
				background-color: white;
			}
			.body{
				margin: 7%;
			}
			.btns{
				display: flex;
				justify-content: center;
			}
		</style>
	</head>
	
	
	<body>
		<div class="panel">
			<div class="layui-nav" style="height: 38px;">
				<div class="layui-nav-item" style="line-height: 38px;font-weight: bold;">XX网盘注册</div>
			</div>
			<div class="body">
				<form class="form-horizontal">
					<div class="layui-form-item">
						<label class="layui-form-label" style="font-weight: bold;">用户名</label>
						<div class="layui-input-inline">
							<input type="text" name="userName" required lay-verify="required" placeholder="请输入用户名" autocomplete="off" class="layui-input">
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label" style="font-weight: bold;">密码</label>
						<div class="layui-input-inline">
							<input type="password" name="pwd" required lay-verify="required" placeholder="请输入密码" autocomplete="off" class="layui-input">
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label" style="font-weight: bold;">确认密码</label>
						<div class="layui-input-inline">
							<input type="password" name="rePwd" required lay-verify="required" placeholder="请输入密码" autocomplete="off" class="layui-input">
						</div>
					</div>
					
					<div class="form-group btns">
						<input type="button" class="layui-btn" value="确定注册" id="submit"/>
						&nbsp;&nbsp;&nbsp;&nbsp;
						<a type="button" class="layui-btn" href="login.php"/>返回登录</a>
					</div>
					
				</form>
			</div>
		</div>
	</body>
	
	<script src="js/jquery-3.1.1.js"></script>
	<script type="text/javascript">
		$(function(){
			$("#submit").on("click",function(){
				var str = $("form").serialize();
				console.log(str);
				$.post("admin/doReg.php",{"user":str},function(data){
					if(data=="true"){
						alert("注册成功！即将跳转登陆页！");
						location = "login.php";
					}else{
						alert("注册失败！因为啥我不知道！");
					}
				});
			});
		});
	</script>
</html>
