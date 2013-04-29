<?php
require_once "linkDataBase.php";
session_start();   
$username = $_POST["username"];
$password = md5($_POST["password"]);


//写入数据库
if(mysql_query("INSERT INTO user (username,password) VALUES ('$username','$password')")){
  echo 1;
  //获得id号
  $last_id = mysql_insert_id();
  //session_start();
  $_SESSION["id"] = $last_id;
}else{
	echo 2;
}


?>