<?php
session_start();
if(isset($_SESSION["id"])){
  //注销返回首页时 终结SESSION["id"]
  unset($_SESSION["id"]);
}
?>

<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>微博</title>
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/index.css">
  </head>

  <body>
    <section>
    
      
      <header class="clearfix">
	<div id="error_tips"></div>
	<div id="logo">
		<p class="tip_name">！！！！人人微博！！！</p>
	</div>
      </header>
      
      <div id="window">
	<div id="login_reg" class="clearfix">
	  <div class="sub_form" id="login">
	    <p class="tip_name">用户名</p>
	    <input class="tip_input" id="log_username" type="text" placeholder="请输入用户名" />
	    <p class="tip_name">密码</p>
	    <input class="tip_input" id="log_password" type="password" placeholder="请输入密码" />
	    <input class="tip_button" id="register"  type="button" value="注 册"/>
	    <input class="tip_button" id="log" type="submit" value="登 录"/>
          </div>

          <div class="sub_form" id="reg">
	    <div id="back_button">
	      <img height="40" width="20"  src="images/login/back.png" id="back_logo" alt="back button">
	    </div>
	    <div id="main_form">
	       <p class="tip_name">用户名</p>
	       <input class="tip_input" id="username" name="username" type="text" placeholder="请输入用户名" />
	       <p class="tip_name">密码</p>
	       <input class="tip_input" id="password" name="password" type="password" placeholder="请输入密码" />
	       <p class="tip_name">确认密码</p>
	       <input class="tip_input" id="s_password" name="confirm_password" type="password" placeholder="请再次输入密码" />
	        <input class="tip_button" id="confirm_button" type="submit" value="确 认"/>
	    </div>
	  </div>
	  <div class="sub_form" id="send_head">
  <h><span id="get_name">您</span>的头像！(JPG格式 500k大小限制)</h>
            <div id='head_div'>
            <img src="images/head/0.jpg" height="160" width="160" alt="head_example">
            </div>
           
            <form action="send_head.php" method="post" enctype="multipart/form-data" target="help_frame">
				<input type="file" name="file" id="file_btn" />
				<input type="submit" name="submit" class="tip_button" id="send_btn"  value="上传头像"/>
				<input type="button" class="tip_button" id="final"  value="完 成"/>
            </form>

	  <iframe id="help_frame" name="help_frame" height="40" width="400" src="about:blank" style="margin-top:20px;padding-left:100px;border:none;color:red;"></iframe>
          </div>
	       
	    </div>

       

	</div>
      </div>
    </section>

    <!--javascript-->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
    <!--javascript-->
  </body>
</html>