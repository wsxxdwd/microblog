<?php
require_once "linkDataBase.php";
require_once "getInfo.php";
if( $_POST["content"]){
	$content = $_POST["content"];
	$sender_id = $id;
	if(mysql_query("INSERT INTO Baike (sender_id,content) VALUES ('$sender_id','$content')")){
	}
}
if($_POST["atwho"]){
	$atwho = $_POST["atwho"];
	$atwho = explode('|',$atwho);//以'|'切割字符串生成数组
	foreach($atwho as $value){ 
	if(mysql_query("UPDATE user SET msg = '1' WHERE id = '$value'")){
	}	
}
}
if($_POST["reload"]){
	mysql_query("UPDATE user SET msg = '0' WHERE id = '$id'");
	echo "1";
}


?>