<?php
require_once "linkDataBase.php";
$id = $_POST["id"];
$data=array();
$friend_sql = mysql_query("SELECT * FROM friend WHERE guanzhu = '$id'");
while($friend_row = mysql_fetch_array($friend_sql)){
  $friend_id = $friend_row["be_guanzhu"];
  $unique_sql = mysql_query("SELECT * FROM User WHERE id = $friend_id LIMIT 1");
  $unique_row = mysql_fetch_array($unique_sql);
  $unique_name = $unique_row["username"];
	$data[$friend_id]=$unique_name;
}
echo json_encode($data);
?>