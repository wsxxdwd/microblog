<?php
require_once "linkDataBase.php";
$id =(int)$_POST["id"];
$table_name = "";
if($_POST["type"]=="0"){
  $table_name  = "headbaike";
}
else{
  $table_name = "Baike";
}

if(!mysql_query("UPDATE $table_name SET good = good+1 WHERE id=$id")){
  echo mysql_error();
}
?>