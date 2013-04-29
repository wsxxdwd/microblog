<?php
require_once "linkDataBase.php";
require_once "getInfo.php";

$commenter_id = $id;
$content = $_POST["content"];
$baike_id = $_POST["baike_id"];

if(!mysql_query("INSERT INTO comment (commenter_id,content,baike_id) VALUE('$commenter_id','$content','$baike_id')")){
  echo mysql_error();
}

if(!mysql_query("UPDATE Baike SET comment=comment+1 WHERE id=$baike_id")){
  echo mysql_error();
}

?>