<?php
  require_once "getInfo.php";
if(isset($_GET['key'])){
  $this_user_id = $_GET['key'];
  $sql = mysql_query("SELECT * FROM User WHERE id='$this_user_id' LIMIT 1");
  $user = mysql_fetch_array($sql);
  $this_username = $user["username"];
  $this_tips = $user["tips"];
  $this_img_url = $user["img"];
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta charset="utf8">
  <title><?php echo $username;?>人人微博</title>
<link rel="stylesheet" type="text/css" href="css/base.css" />
<link rel="stylesheet" type="text/css" href="css/home.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="css/info.css" />
<link rel="stylesheet" type="text/css" href="css/jquery.atwho.css"/>
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/jquery.atwho.js"></script>
  <script type="text/javascript" src="js/base.js"></script>  
  <script type="text/javascript" src="js/home.js"></script> 
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
            <a id="menu1" href="home.php" class="no_unique menu">首页</a>
            <a id="menu2" href="friend.php" class="no_unique menu">好友</a>
            <a id="menu3"  href="info.php" class="unique menu"><img src="images/head/<?php echo $img_url;?>" alt="commom_head"/></a>
            </div>
        </div>

        <div id="content">
            <div id="sidetext">
                <div id="basic_info">
                <div  class="float_left" id="info_head">
                <?php
  echo "<img id='big_head' height='100%' width='100%' src='images/head/".$this_img_url."' alt='big_head'>";
                ?>
                </div>
                
                <div class="float_left" id="info_other">
  <h id="info_name"><?php echo $this_username;?></h>
                    <hr id="line">
                   
                   
                </div>
                </div>
		<div id="send_baike">
  <span style="display:none"><?php echo $this_user_id;?></span>
                <?php
  $is_guanzhu_sql = mysql_query("SELECT COUNT(*) FROM friend WHERE guanzhu=$id AND be_guanzhu=$this_user_id");
$is_guanzhu = mysql_fetch_array($is_guanzhu_sql);
if($is_guanzhu[0]==0){
  //判断是否关注
  echo '<button class="guanzhu btn btn-warning">关注</button>';
  echo '<button style="display:none" class="no_guanzhu btn btn-success">取消关注</button>';
}
else{
 echo '<button style="display:none;" class="guanzhu btn btn-warning">关注</button>';
echo '<button class="no_guanzhu btn btn-success">取消关注</button>';
}
                ?>
               
              </div>
            </div>
            <div id="right">
             <h id="right_head">我的状态</h>
            <hr id="right_line">
            <?php
  $sql = mysql_query("SELECT * FROM Baike WHERE sender_id='$this_user_id' ORDER BY time DESC");
while($row = mysql_fetch_array($sql)){
  $content = $row["content"];
  $time = $row["time"];
  $good = $row["good"];
  $share = $row["share"];
  $this_id = $row["id"];
  $comment = $row["comment"];

echo "<div class='baike_div clearfix'>";
echo "<div class='baike_sender float_left'>";
echo "<div class='img_div'>";
echo "<img class='baike_head' height='100%' width='100%' alt='baike_head' src='images/head/".$this_img_url."' />";
echo "</div>";
echo "</div>";
echo "<div class='baike_detail float_left'>";
echo "<p class='sender_name'>";
echo $this_username;
echo "</p>";
echo "<div class='baike_main'>";
echo "<div class='baike_box'>";
echo "<span>".$content."</span>";
echo "<br><span class='send_time'>";
echo $time;
echo "</span>";
echo "</div>";
echo "<div class='baike_fn'>";
echo '<span style="display:none" class="hidden_id">'.$this_id.'</span>';
echo "<button class='good_btn_1 btn btn-primary'>赞(".$good.")</button>";
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
