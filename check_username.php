<?php
require_once "linkDataBase.php";
     
$username = $_POST["username"];

//判断数据库是否已经存在该用户名
$is_username = mysql_query("SELECT COUNT(*) FROM User WHERE username = '$username' LIMIT 1");
$is_username_in = mysql_fetch_array($is_username);
if($is_username_in[0]>0){
  //用户名已经存在
  echo "0";
}
else{
  //用户名不存在
  echo "1";
}
?>