<?php 
header ( "Content-Type:text/html;charset = utf-8");

//	var_dump($_POST);
//	var_dump($_FILES);

	$count = count($_FILES['img']['name']);
	$imgArr = [];
	for($i=0; $i < $count; $i++){
		//取后缀名
		$arr = explode(".", $_FILES['img']['name'][$i]);
		$type = $arr[count($arr)-1];
		
		$filename = date("YmdHis").rand(100, 999).".".$type;
		
		if(!is_uploaded_file($_FILES['img']['tmp_name'][$i]))
			continue;
		$isok = move_uploaded_file($_FILES['img']['tmp_name'][$i], "../upload/img/{$filename}");
		
		if(!$isok) continue;
		$imgArr[] = "../upload/img/{$filename}";
	}
	
	if($count == count($imgArr)){
		
		$arr = ['userName'=>$_POST['userName'],"time"=>$_POST['time'],"imgArr"=>$imgArr];
		$str = json_encode($arr);
		$num = file_put_contents("imgs.txt", $str."<=>",FILE_APPEND);
		if($num>0)
			gotoIndex("图片上传成功！");
		else
			gotoIndex("图片上传失败！");
			
		
	}else{
		gotoIndex("图片上传失败！");
	}
	function gotoIndex($str){
		$js = <<<js
			<script>
				alert("{$str}");
				location = "../html/upLoadImg.php?loginUser={$_POST['userName']}";
			</script>
		
js;
	echo $js;
	}
	
	
