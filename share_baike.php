<?php
require_once "linkDataBase.php";
require_once "getInfo.php";
$baike_id =(int)$_POST["id"];
$sender_id = $id;
$content = trim($_POST["content"]);

if(!mysql_query("UPDATE baike SET share = share+1 WHERE id='$baike_id'")){
  echo "0";
}

if(!mysql_query("INSERT INTO Baike (sender_id,content) VALUES ('$sender_id','$content')")){
  echo "0";
}
?>