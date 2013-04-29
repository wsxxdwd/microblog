<?php
//require_once "linkDataBase.php";
$filename = $_FILES["file"]["name"];
$filename = iconv('utf-8','gb2312',$filename);
if ((($_FILES["file"]["type"] == "image/jpeg")||($_FILES["file"]["type"] == "image/pjpeg"))&&($_FILES["file"]["size"] < 500000))
{
  if ($_FILES["file"]["error"] > 0)
  {
    echo "error";
  }
  else
  {
    
    if(move_uploaded_file($_FILES["file"]["tmp_name"],"./images/upload/".$filename)){
    }else{
		echo "fa";
	}
  }    
}
else
{
  echo "500";
}
?>