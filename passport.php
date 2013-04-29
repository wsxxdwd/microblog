<?php
require_once "linkDataBase.php";

$username = $_POST["username"];
$password = md5($_POST["password"]);

$is_username = mysql_query("SELECT COUNT(*) FROM User WHERE username = '$username' LIMIT 1");
$is_username_in = mysql_fetch_array($is_username);
if($is_username_in[0]>0){
  $key_row = mysql_query("SELECT * FROM User WHERE username = '$username' LIMIT 1");
  $key = mysql_fetch_array($key_row);
  if($key["password"] == $password){
    //登录成功
    echo "1";
    
    $id = $key["id"];
    //此时把$id保存到session里面作为登录用户的唯一标识
    
    session_start();
    $_SESSION["id"] = $id;
  }
  else{
    echo "0";
  }
}
else{
  echo "0";
}
?>