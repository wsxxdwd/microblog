<?php
require_once "linkDataBase.php";
session_start();
$id = $_SESSION["id"];

//从数据库获取数据
$sql = mysql_query("SELECT * FROM User WHERE id='$id' LIMIT 1");
$user = mysql_fetch_array($sql);
$username = $user["username"];
$msg = $user["msg"];
$img_url = $user["img"];
?>