<?php

	header("Content-Type:text/html;charset=utf-8");
	$count = count($_FILES["file"]["name"]);
	for($i=0; $i<$count; $i++){
		// 取到文件名，并用.分割为数组
		$arr = explode(".", $_FILES['file']['name'][$i]);
		// 取到数组最后一个即为后缀名
		$type = $arr[count($arr)-1];
		// 使用原文件名+当前时间+随机数，生成新文件名
		$fileName = $arr[0].".".$type;
		$fileName = iconv("UTF-8", "GBK", $fileName);
		// 检测文件是否为合法上传文件
		if(!is_uploaded_file($_FILES['file']['tmp_name'][$i])){
			//echo("文件【{$_FILES['file']['name'][$i]}】不是合法上传文件！<br>");
			echo "<script>alert('请选择上传文件');</script>";
			echo "<script>location.replace('../html/uploadFile.html');</script>";
			continue;
		}
		// 将临时文件，移动到指定文件夹下
		$isOk = move_uploaded_file($_FILES['file']['tmp_name'][$i], "../upload/{$fileName}");
		if(!$isOk){
			echo("文件【{$_FILES['file']['name'][$i]}】上传失败！<br>");
			continue;
		}
		//echo "文件【{$_FILES['file']['name'][$i]}】上传成功！<br>";
		echo "<script type='text/javascript'>alert('文件【{$_FILES['file']['name'][$i]}】上传成功！');</script>";
		echo "<script type='text/javascript'> window.location.assign('../html/uploadFile.html')</script>";
	}
	
	
	
