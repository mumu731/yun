<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>用户登录</title>
		<link rel="stylesheet" type="text/css" href="css/layui.css"/>
		<style type="text/css">
			body{
				margin: 0px;
				padding: 0px;
				background-color: #CCCCCC;
			}
			.panel{
				width: 380px;
				height: 280px;
				position: absolute;
				left: 50%;
				margin-left: -190px;
				top: 50%;
				margin-top: -140px;
				border: 1px solid #009688;
				background-color: white;
			}
			.body{
				margin-top: 7%;
			}
			.btns{
				display: flex;
				justify-content: center;
			}
		</style>
	</head>
	
	
	<body>
		<div class="panel panel-primary">
			<div class="layui-nav" style="height: 38px;">
				<div class="layui-nav-item" style="line-height: 38px;font-weight: bold;">XX网盘登录</div>
			</div>
			<div class="body">
				<form class="layui-form" action="">
					<div class="layui-form-item">
						<label class="layui-form-label" style="font-weight: bold;">用户名</label>
						<div class="layui-input-inline">
							<input type="text" name="userName" required lay-verify="required" placeholder="请输入用户名" autocomplete="off" class="layui-input">
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label" style="font-weight: bold;">密码框</label>
						<div class="layui-input-inline">
							<input type="password" name="pwd" required lay-verify="required" placeholder="请输入密码" autocomplete="off" class="layui-input">
						</div>
					</div>
					
					<div class="form-group btns">
						<input type="button" class="layui-btn" value="登录系统" id="submit"/>
						&nbsp;&nbsp;&nbsp;&nbsp;
						<a type="button" class="layui-btn" href="reg.php"/>注册账号</a>
					</div>
					
				</form>
			</div>
		</div>
	</body>
	
	<script src="js/jquery-3.1.1.js"></script>
	<script src="layer/layer.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		$(function(){
			$("#submit").click(function(){
				var str = $("form").serialize();
				$.post("admin/doLogin.php",{"user":str},function(data){
					if (data=="true") {
						layer.alert('登录成功', {icon: 6});
						location = "index.html?loginUser="+$("input[name='userName']").val();
					}else{
						layer.alert('登录失败', {icon: 5});
					}
				});
			});
		});
	</script>
</html>
