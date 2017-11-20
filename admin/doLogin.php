<?php 
header ( "Content-Type:text/html;charset = utf-8");
	// username=lisi&pwd=123
	//处理登录信息
	list($username,$pwd) = explode("&", $_POST["user"]);
	list(,$username) = explode("=", $username);
	list(,$pwd) = explode("=", $pwd);
	$str = file_get_contents("user.txt");
	
	//将每个人的信息分开，并存入数组
	$user = explode("<=>", $str);
	
	// 验证登录信息
	foreach ($user as $user) {
		// 遍历数组，将每个人的信息，进行分割，并进行对比
		list($realName,$realPwd) = explode("&",$user);
		list(,$realName) = explode("=", $realName);
		list(,$realPwd) = explode("=", $realPwd);
		//验证
		if($username == $realName && $pwd == $realPwd)
			die("true");
	}
	die("false");
