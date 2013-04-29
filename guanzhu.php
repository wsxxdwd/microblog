<?php
require_once "linkDataBase.php";
require_once "getInfo.php";
$guanzhu = $id;
$be_guanzhu = $_POST["this_id"];

if($_POST["type"] == "0"){
  //关注
  if(!mysql_query("INSERT INTO friend (guanzhu,be_guanzhu) VALUES('$guanzhu','$be_guanzhu')")){
    echo mysql_error();
  }
}
else{
  //取消关注
  if(!mysql_query("DELETE FROM friend WHERE guanzhu=$guanzhu AND be_guanzhu=$be_guanzhu")){
    echo mysql_error();
  }
}


?>