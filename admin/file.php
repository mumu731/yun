<?php

	header("Content-Type:text/html;charset=utf-8");
	/*1、 读取一个文件目录，并将目录中的文件夹和文件分类罗列；*/
	$dir = "../upload";
	$dir = iconv("UTF-8", "GBK", $dir);
	$res = opendir($dir);
	$files = [];
	$dirs = [];
	while($f = readdir($res)){
		if($f=="." || $f=="..") continue;
		$f = iconv("GBK", "UTF-8", $f);
		$f1 = iconv("UTF-8", "GBK", $dir."/".$f);
		if(is_file($f1)){
			$files[] = $f;
		}elseif(is_dir($f1)){
			$dirs[] = $f;
		}
	}
	
	$data = date("Ymd");
	echo "<h2>所有文件：</h2>";
	echo "<hr />";
	foreach ($files as $key => $value) {
		echo '<div>';
		echo '<a style="text-decoration:none; font-size: 20px; color: #2F4056; font-weight: bold;" href="process.php?filename=' . $value . '">' . $value .'  &&点击下载'.'</a>';
		echo '</div>';
		echo '<br />';
	}