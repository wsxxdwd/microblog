<?php
require_once "linkDataBase.php";

session_start();
$id = $_SESSION["id"];
$filename = $id.".jpg";

if ((($_FILES["file"]["type"] == "image/jpeg")||($_FILES["file"]["type"] == "image/pjpeg"))&&($_FILES["file"]["size"] < 5000000))
{
  //jpg格式 500k大小限制
  if ($_FILES["file"]["error"] > 0)
  {
    echo "上传图片错误";
  }
  else
  {
    //获取文件信息
    
    if(move_uploaded_file($_FILES["file"]["tmp_name"],"./images/head/".$filename)){
      //写入数据库 
      
      if(mysql_query("UPDATE User SET img = '$filename' WHERE id = '$id'")){
	  echo "上传成功";
      }
    }
  }    
}
else
{
  echo "请上传500k以下的JPG文件";
}
?>