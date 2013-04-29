window.onload = function(){
    //乱七八糟的事件绑定
    $("#register").bind("click",function(){
	turn_right_left("login_reg","-400px",300);
    });
    $("#back_logo").bind("click",function(){
	turn_right_left("login_reg","0px",300);
    });
    //返回小三角的移进移出效果
    $("#back_logo").bind("mouseover",function(){
	turn_right_left("back_logo","-3px",100);
    });
    $("#back_logo").bind("mouseout",function(){
	turn_right_left("back_logo","0px",100);
    });
    //label的点击效果以及移进移出效果
    label_bind();

  
    //点击添加 添加用户自定义标签
    add_button_event();
    
    //点击完成，用户注册完毕
    $("#complete_button").bind("click",function(){
	complete();
    });
     $("#final").bind("click",function(){
	final_fn();
    })
    //点击登录
    $("#log").bind("click",function(){
	login();
    });

 

    function add_button_event(){
	$("#add_button").bind("click",function(){
	    if($(this).attr("state") == 0){
		//此时点击按钮执行add操作
		add_state(this);
	    }
	    else{
		//此时点击按钮执行confirm操作
		confirm_state(this);
	    }
	})
    }
    
      function label_bind(){
	$(".label_button").bind("click",function(){
	    if($(this).attr("state") == "0"){
		//未显示效果，点击之后显示 
		change_style(this,0)
		$(this).attr("state","1");
		$(this).unbind("mouseout");
		$(this).unbind("mouseover");
	    }
	    else{
		//显示出了效果,点击之后还原
		change_style(this,1);
		$(this).attr("state","0");
		$(this).bind("mouseover",function(){
		    change_style(this,0);
		});
		
		$(this).bind("mouseout",function(){
		    change_style(this,1);
		})
	    }
	})
	
	$(".label_button").bind("mouseover",function(){
	    change_style(this,0);
	});
	
	$(".label_button").bind("mouseout",function(){
	    change_style(this,1);
	})
    }


    function add_state(obj){
	//添加状态,点击成为确认状态,改变其点击函数
	//创建新输入框
	var $label_button = $("<input type='text' state='0' class='label_button' style='text-align:center'>")
	$(obj).before($label_button);
	//变成确认状态
	$(obj).attr("value","确认");
	$(obj).css("backgroundColor","red");
	$(obj).attr("state","1");
	//重新绑定事件
	$(obj).unbind("click");
	add_button_event()
    }

    function confirm_state(obj){
	//确认状态，点击成为添加状态
	//把输入款变成按钮
	var content = $(obj).prev().attr("value");
	$(obj).prev().remove();
	var $label_button = $("<input type='button' state='0' class='label_button'>");
	$(obj).before($label_button);
	$label_button.attr("value",content);
	$(".label_button").unbind("click");
	label_bind();
	//变成添加状态
	$(obj).attr("value","添加+");
	$(obj).css("background","#458B00");
	$(obj).attr("state","0");
	//重新绑定事件
	$(obj).unbind("click");
	add_button_event();
    }
    
    $("#confirm_button").bind("click",function(){
	check_send();
    });
    

    //IE placeholder(效果有不同)
    if($.browser.msie)
    {
	$("#username").attr("value","请输入用户名");
	$("#username").bind("focus",function(){
	    if($(this).attr("value") == "请输入用户名")
	    {
		$(this).attr("value","");
	    }
	});
	$("#username").bind("blur",function(){
	    if($(this).attr("value") == ""){
		$(this).attr("value","请输入用户名");
	    }
	});
    }
}
    
function slide_up_down(content){
    //错误提示栏下拉，等待秒后上拉
    $("#error_tips").html(content);
    $("#error_tips").animate({"top":"-1px"},500);
    setTimeout(function(){
	$("#error_tips").animate({"top":"-46px"},500);
    },1500);
}

function change_style(obj,type){
  //0显示效果 1返回
    if(type == 0)
    {
	obj.style.backgroundColor = "#515151";
	obj.style.color = "#CDCDCD";
    }
    else{
	obj.style.backgroundColor = "#CDCDCD";
	obj.style.color = "#515151";
    }
}

function turn_right_left(obj_string,len,time){
    var obj_string = "#"+obj_string; 
    $(obj_string).animate({"left":len},time);
}

function check_send(){
    //获得注册的信息进行检查、发送
    var username = $("#username").attr("value");
    var password = $("#password").attr("value");
    var s_password = $("#s_password").attr("value");
    //判断用户名是否为空
    if(username == ""){
	slide_up_down("用户名不能为空");
    }
    else if(password == "" || s_password == ""){
	slide_up_down("密码不能为空");
    }
    else if(password != s_password){
	slide_up_down("两次输入的密码不相同");
	$("#password,#s_password").attr("value","");
    }
    else{
	check_is_username(username);
    }

    function check_is_username(username){
	//ajax传送数据
	$.ajax({
            type: "POST",
            url: "check_username.php",  
            data: "&username="+username,
            success: 
	    function(returnKey){
		//成功后右移进入下一步
		if(returnKey == "0")
		{
		    //用户名已经被注册
		    slide_up_down("该用户名已经被使用,请更换");
		}
		else{
		    //成功注册
			complete();
			$("#get_name").html(username);
            slide_up_down("成功！进入下一步");
		    setTimeout(function(){
			turn_right_left("login_reg","-800px",300);
		    },1600);
		}
	    }
        });
	
    }
}

function complete(){
    //获得用户名和密码
    var username = $("#username").attr("value");
    var password = $("#password").attr("value");

    //获取标签的内容
    var tips = "";
    $(".label_button").each(function(){
	if($(this).attr("state") == "1")
	{
	    tips = tips+$(this).attr("value")+"*"
	}
    });

    //ajax发送到后台注册
    $.ajax({
        type: "POST",
        url: "register.php",  
        data: "&username="+username+"&password="+password+"&tips="+tips,
        success: 
	function(returnKey){
		
	    //成功
	    if(returnKey == "1"){
			alert('注册成功');
                
	    }else{
			alert('shibai');
		}
	}
    });   
}

function login(){
    var username = $("#log_username").attr("value");
    var password = $("#log_password").attr("value");
    check_error(username,password);
    

    function check_error(username,password){
	if(username == "")
	{
	    slide_up_down("请输入用户名");
	}
	else if(password == ""){
	    slide_up_down("请输入密码");
	}
	else{
	    $.ajax({
		type:"POST",
		url:"passport.php",
		data:"&username="+username+"&password="+password,
		success:
		function(returnKey){
		    if(returnKey == "0"){
			slide_up_down("你的用户名或者密码有误");
			$("#log_password").attr("value","");
		    }
		    else{
			//登录到主页
			window.location.href = "home.php";
		    }
		}
		
	    });
	}
    }
}

function final_fn(){
	slide_up_down("注册完成!马上返回登录!");
    setTimeout(function(){
	window.location.href = "index.php";
    },1600);
}




