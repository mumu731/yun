<?php 
	header ( "Content-Type:text/html;charset = utf-8");
	
	$user = $_POST["user"]."<=>";
	
	$num = file_put_contents("user.txt", $user,FILE_APPEND);
	
	if($num>0) echo "true";
	else echo "false";
