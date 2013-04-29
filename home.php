<?php
require_once "getInfo.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta charset="utf8">
  <title><?php echo $username;?>人人微博</title>
<link rel="stylesheet" type="text/css" href="css/base.css" />
<link rel="stylesheet" type="text/css" href="css/home.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="css/jquery.atwho.css"/>
<link rel="stylesheet" type="text/css" href="css/bootstrap-fileupload.min.css"/>
 <script type="text/javascript" src="js/jquery.js"></script>
 <script type="text/javascript" src="js/jquery.atwho.js"></script>
 <script type="text/javascript" src="js/home.js"></script> 
 <script type="text/javascript" src="js/base.js"></script>
 <script type="text/javascript" src="js/bootstrap-fileupload.min.js"></script>
  <script type="text/javascript">
   $(function(){
				$.ajax({
				type:"POST",
				url:"at.php",
				dataType: 'json',
				data: "id=<?php echo $id; ?>",
				success: function(data) {
				
				var newdata=[];
				for(var p in data){
					newdata[data[p]] = p;
				}
				data = $.map(data,function(value,i) {
					return {'name':value,'id':"("+newdata[value]+")"};
				});

				$("textarea").atwho("@",{
				tpl: "<li data-value='${name}${id}'>${name} <small>${id}</small></li>",
                'data':data,
                limit:5
            });
				}
			});
     
});
  </script>
</head>

<body>
	<div id="main">
    
    	<div id="header">
            <div id="logo"></div>
            <div id="menu">
            <a id="menu1" class="menu unique">首页</a>
            <a id="menu2" href="friend.php" class="no_unique menu">好友</a>
            <a id="menu3" href="info.php" class="no_unique menu"><img src="images//head/<?php echo $img_url;?>" alt="commom_head"/></a>
            </div>
      </div>

        <div id="content">
            <div id="sidetext">
              <div id="basic_info">
                <div  class="float_left" id="info_head">
                <?php
  echo "<img id='big_head' height='100%' width='100%' src='images/head/".$img_url."' alt='big_head'>";
                ?>
                </div>
                
                <div class="float_left" id="info_other">
  <h id="info_name"><?php echo $username;?></h>
                    <hr id="line">
                <button id="msg" class="btn btn-primary" >
				<?php
					if($msg){
						echo "有人@你了";
					}else{
						echo "无消息";
				    }
				?>
				</button>
                    
                </div>
              </div>
               
              <div id="send_baike">
              <p id="title_send">发送状态</p>
              <textarea id="content_send" placeholder="说写什么吧"></textarea><br>
			  <form action="post_img.php" method="post" enctype="multipart/form-data" target="help_frame">
				  <div class="fileupload fileupload-new" data-provides="fileupload" style="margin-left:50px;">
            <span class="btn btn-file"><span class="fileupload-new">Select file</span><span class="fileupload-exists">Change</span><input type="file" name="file" id="file_btn" onChange="if(this.value)insertTitle(this.value);"/></span>
            <span class="fileupload-preview"></span>
            <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
          </div>
				  <input type="submit" name="submit" class="tip_button" id="post_img_btn" style="margin-top:8px;" value="发布图像"/>
			  </form>
			  
			  <h3 style="margin-left:50px;">请上传500k以下的JPG文件</h3>
              <button id="baike_send_btn" class="btn btn-primary">发送</button>
              </div>
              <iframe id="help_frame" name="help_frame" height="40" width="400" src="about:blank" style="margin-top:20px;padding-left:100px;border:none;color:red;"></iframe>
            </div>

            <div id="right">
            <h id="right_head">最新状态</h>
            <hr id="right_line">
            <?php
  $sql = mysql_query("SELECT * FROM Baike ORDER BY time DESC");
while($row = mysql_fetch_array($sql)){
  $content = $row["content"];
  $sender_id = $row["sender_id"];
  $good = $row["good"];
  $share = $row["share"];
  $time = $row["time"];
  $this_id = $row["id"];
  $comment = $row["comment"];

  $sql_sender = mysql_query("SELECT * FROM User WHERE id='$sender_id' LIMIT 1");
$sender = mysql_fetch_array($sql_sender);
$sender_username = $sender["username"];
$sender_img_url = $sender["img"];

echo "<div class='baike_div clearfix'>";
echo "<div class='baike_sender float_left'>";
echo "<div class='img_div'>";
if($sender_id == $id){
echo "<a href='info.php'><img class='baike_head' height='100%' width='100%' alt='baike_head' src='images/head/".$sender_img_url."' /></a>";
}
else{
echo "<a href='other_info.php?key=".$sender_id."'><img class='baike_head' height='100%' width='100%' alt='baike_head' src='images/head/".$sender_img_url."' /></a>";
}
echo "</div>";
echo "</div>";
echo "<div class='baike_detail float_left'>";
echo "<p class='sender_name'>";
echo $sender_username;
echo "</p>";
echo "<div class='baike_main'>";
echo "<div class='baike_box'>";
echo "<span>".$content."</span>";
echo "<br><span class='send_time'>";
echo $time;
echo "</span>";
echo "</div>";
echo "<div class='baike_fn'>";
echo '<span style="display:none;" class="hidden_id">'.$this_id.'</span>';
echo "<button  class='good_btn_1 btn btn-primary'>赞(".$good.")</button>";
if($id != $sender_id){
echo "<button  class='share_btn_1 btn btn-primary'>分享(".$share.")</button>";
}
echo "<button class='comment_btn btn btn-primary'>评论(".$comment.")</button>";
echo "</div><br>";


echo "<div class='comment_div'>";

echo "<div class='comment_box'>";
echo "<div class='comment_head float_left'>";
echo "<div class='head_holder'>";
echo "<img alt='comment_head' src='images/head/".$img_url."'>";
echo "</div>";
echo "</div>";
echo "<div class='comment_textarea float_left'>";
echo "<textarea class='comment_textbox'></textarea><br>";
echo "<span style='display:none' class='hidden_id'>".$this_id."</span>";
echo "<button class='send_comment btn btn-success'>评论</button>";
echo "</div>";
echo "</div>";


echo "<div class='add_comment'>";
echo "</div>";

echo "<div class='comments'>";

$comment_sql = mysql_query("SELECT * FROM comment WHERE baike_id= '$this_id' ORDER BY time DESC");

while($comments = mysql_fetch_array($comment_sql)){
  $comment_content = $comments["content"];
  $comment_time = $comments["time"];
  $comment_id = $comments["commenter_id"];
  
  $tmp_sql = mysql_query("SELECT * FROM User WHERE id='$comment_id' LIMIT 1");
  $tmp_row = mysql_fetch_array($tmp_sql);
  $comment_name = $tmp_row["username"];
  $comment_img_url = $tmp_row["img"];


  echo "<div class='comment_head float_left'><div class='head_holder'><img alt='comment_head' src='images/head/".$comment_img_url."'></div></div><div class='comment_textarea float_left'><h class='comment_name'>".$comment_name.":"."</h><p class='comment_p'>".$comment_content."</p>"."<p class='comment_time'>".$comment_time."</p>"."</div>";
}

echo "</div>";
echo "</div>";



echo "</div>";
echo "</div>";
echo "</div>";
}





            ?>
            </div>
       </div>

       <div id="footer">
        	<a>^</a>
        	<p>COPYRIGHT [C] 2012 Speed Design</p>
       </div>
    
  </div>
  

</body>
</html>
