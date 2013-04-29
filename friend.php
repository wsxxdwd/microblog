<?php
require_once "getInfo.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta charset="utf8">
  <title><?php echo $username;?>人人微博</title>
<link rel="stylesheet" type="text/css" href="css/friend.css" />
<link rel="stylesheet" type="text/css" href="css/base.css" />
<link rel="stylesheet" type="text/css" href="css/home.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="css/jquery.atwho.css"/>
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/jquery.atwho.js"></script>
  <script type="text/javascript" src="js/home.js"></script>
  <script type="text/javascript" src="js/base.js"></script>
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
            <div id="logo"><img src="images/logo.png" alt="虽不明，但觉厉" title="虽不明，但觉厉"/></div>
            <div id="rec" title="每日“姿势”，点击查看">
     	 <h>随机百科：</h>
             <br>
             <p>
     	     <?php
  echo $baike_content;
            ?>
             </p>
	     <br>
	     <div id="good_share">
             <span style="display:none" id="hidden_id"><?php echo $baike_id?></span>
             <button class="good_btn btn btn-primary btn-dis btn-first">赞(<?php echo $baike_good; ?>)</button>
  <button class="share_btn btn btn-primary btn-dis">分享(<?php echo $baike_share;?>)</button>
             </div>
            </div>
            <div id="menu">
            <a id="menu1" href="home.php" class="menu no_unique">首页</a>
            <a id="menu2" class="unique menu">好友</a>
            <a id="menu3" href="info.php" class="menu no_unique"><img src="images/head/<?php echo $img_url;?>" alt="commom_head"/></a>
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
                   
                  
                </div>
                </div>
                 <div id="send_baike">
              <p id="title_send">发送新百科</p>
              <textarea id="content_send" placeholder="写下你生活中的小百科"></textarea><br>
			  <form action="post_img.php" method="post" enctype="multipart/form-data" target="help_frame">
				  <input type="file" name="file" id="file_btn" onChange="if(this.value)insertTitle(this.value);" class="btn btn-primary" style="margin-left:50px;"/>
				  <input type="submit" name="submit" class="tip_button" id="post_img_btn" style="margin-top:8px;" value="发布图像"/>
			  </form>
			  <h3 style="margin-left:50px;">请上传500k以下的JPG文件</h3>
              <button id="baike_send_btn" class="btn btn-primary">发送</button>
              </div>
               <iframe id="help_frame" name="help_frame" height="40" width="400" src="about:blank" style="margin-top:20px;padding-left:100px;border:none;color:red;"></iframe>
            </div>
            <div id="right">
             <div id="friend_head">
              <?php
  $friend_sql = mysql_query("SELECT * FROM friend WHERE guanzhu = $id");
while($friend_row = mysql_fetch_array($friend_sql)){
  $friend_id = $friend_row["be_guanzhu"];
  
  $unique_sql = mysql_query("SELECT * FROM User WHERE id = $friend_id LIMIT 1");
  $unique_row = mysql_fetch_array($unique_sql);
  $unique_name = $unique_row["username"];
  $unique_tips = $unique_row["tips"];
  $unique_img = $unique_row["img"];
  
echo "<div class='friend_div float_left'>";
echo "<div class='head float_left'>";
echo "<div class='friend_head_holder'>";
echo "<a href='other_info.php?&key=".$friend_id."'><img alt='head' src='images/head/".$unique_img."'></a>";
echo "</div>";
echo "</div>";
echo "<div class='detail float_left'>";
echo "<h class='friend_name'>用户名：<span>".$unique_name."</span></h>";
echo "</div>";
echo "</div>";
}
              ?>

             </div>
            </div>
       </div>

       <div id="footer">
        	<a>^</a>
        	<p>COPYRIGHT [C] 2012 Speed Design</p>
       </div>
    
  </div>


</body>
</html>
