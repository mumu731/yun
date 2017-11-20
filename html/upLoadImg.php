<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title></title>
		<link rel="stylesheet" type="text/css" href="../css/layui.css"/>
		<style type="text/css">
			.file {
			    position: relative;
			    display: inline-block;
			    overflow: hidden;
			    text-decoration: none;
			}
			.file input {
			    position: absolute;
			    font-size: 50px;
			    right: 0;
			    top: 0;
			    opacity: 0;
			}
		</style>
	</head>
	<body>
		<form action="../admin/doAddImg.php" method="post" enctype="multipart/form-data">
			<a href="javascript:;" class="layui-btn layui-btn-big layui-btn-radius layui-btn-normal file">选择文件
				<input type="file" name="img[]" multiple="multiple" accept="image/*" />
			</a>
			<input type="hidden" name="userName" />
			<input type="hidden" name="time" />
			<input type="button" value="上传图片" id="btn" class="layui-btn layui-btn-big layui-btn-radius layui-btn-normal"/>
			
		</form>
		<br />
		<div id="liuyanban"></div>
		
		
		
		
		
		<script type="text/javascript" src="../js/jquery-3.1.1.js" ></script>
		<script type="text/javascript">
			var loginUser = '<?php echo isset($_GET["loginUser"])?$_GET["loginUser"]:"null";?>';
			if(loginUser=="null"){}
			getData();
			$("#div1 span").text(loginUser);
			
			$("#btn").click(function(){
				if(!$("input[type='file']").val()){
					alert("图片至少上传一张");
					return false;
				}
				$("input[name='userName']").val(loginUser);
				$("input[name='time']").val(getTime());
				$("form").submit();
			});
			
			
			function getData(){
				$.post("../admin/doShowImg.php",function(data){
					var arr = data.split("<=>");
					arr.pop();
					for(var i=0; i<arr.length; i++){
						var img = JSON.parse(arr[i]);
						console.log(img);
						var html = "<br/><div>发布时间："+img.time+"<br><br>";
						for(var j=0; j<img.imgArr.length; j++){
							html += "<img style='height:100px; ' src='"+img.imgArr[j]+"'/>&nbsp;&nbsp;&nbsp;";
						}
						html += "</div><br><hr>";
						$("#liuyanban").prepend(html);
					}
				});
			}
			
			function getTime(){
				var dates = new Date();
				var year = dates.getFullYear();
				var month = dates.getMonth();
				var date1 = dates.getDate();
				var day = dates.getDay();
				var weeks = ["星期日","星期一","星期二","星期三","星期四","星期五","星期六"];
				var hours = dates.getHours()<10?
							"0"+dates.getHours():dates.getHours();
							
				var minutes = dates.getMinutes()<10? 
							"0"+dates.getMinutes():dates.getMinutes();
							
				var seconds = dates.getSeconds()<10?
							"0"+dates.getSeconds():dates.getSeconds();
				
				return year+"年"+(month+1)+"月"+date1+"日 "+weeks[day]+hours+":"+minutes+":"+seconds;
			}
			
		</script>

		
	</body>
</html>