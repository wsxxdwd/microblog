
window.onload = function(){
    //IE placeholder(效果有不同)
    if($.browser.msie)
    {
	$("#content_send").attr("value","写下你生活中趣事");
	$("#content_send").bind("focus",function(){
	    if($(this).attr("value") == "写下你生活中的趣事")
	    {
		$(this).attr("value","");
	    }
	});
	$("#content_send").bind("blur",function(){
	    if($(this).attr("value") == "")
	    {
		$(this).attr("value","写下你生活中的趣事");
	    }
	});
    }

    //百科发送按钮事件绑定
    $("#baike_send_btn").bind("click",function(){
	send_baike();
    });
	$("#post_img_btn").bind("click",function(){
	post_img();
    });
	$("#msg").bind("click",function(){
	reloadMsg();//重载消息提示
    });
	$("#refresh_head_btn").bind("click",function(){
	window.location.href = "info.php"; //刷新页面
	});
    //good and share button on the top
    $(".good_btn").bind("click",function(){
	good_baike(this,0);
    });
    $(".share_btn").bind("click",function(){
	share_baike(this,0);
    })

    //good and share button on the middle
    $(".good_btn_1").bind("click",function(){
	good_baike(this,1);
    });
    $(".share_btn_1").bind("click",function(){
	share_baike(this,1);
    });

    //点击评论展开
    $(".comment_btn").bind("click",function(){
	comment(this);
    });

    //点击评论发送评论
    $(".send_comment").bind("click",function(){
	send_comment(this);
    });

    //关注和取消关注
    $(".guanzhu").bind("click",function(){
	change_guanzhu(this,0);
    });
    $(".no_guanzhu").bind("click",function(){
	change_guanzhu(this,1);
    });
}

//发送百科微薄
function send_baike(){
    var content = $("#content_send").attr("value");
	var proData=atToLink(content);
	content=proData.content;
	if(proData.user){
		var x = proData.user.join('|');
	}
    if(content == "")
    {
	alert("不能发送空内容！");
    }
    else{
	//百科保存到数据库
	$.ajax({
	    type:"POST",
            url:"send_baike.php",
            data:"&content="+content+"&atwho="+x,
            success:
            function(returnKey){
           
			   window.location.href = "home.php";
		    
	    }
	});
    }
}
var imgName;//global var
function insertTitle(tValue){ 
   var t1 = tValue.lastIndexOf("\\"); 
   if(t1 >= 0){  
    imgName=tValue.substring(t1 + 1, tValue.length);  
   }  
} 
function post_img(){
	$("#content_send").attr("value","<img src=\"images\\upload\\"+imgName+"\"/>");
}
function reloadMsg(){
	$("#msg").html("无消息");
	$.ajax({
	type:"POST",
	url:"send_baike.php",
    data:"&reload=1",
	success:function(returnKey){
	}
    });
}
function good_baike(obj,key){
    var id = parseInt($(obj).prev().html());
    var new_id = parseInt($(obj).html().substring(2))+1;
    $.ajax({
	type:"POST",
	url:"good_baike.php",
        data:"&id="+id+"&type="+key,
	success:function(returnKey){
	    alert("\"赞\"成功");
	    $(obj).html("赞("+new_id+")");
	}
    });
}
    
function share_baike(obj,key){
    var id = parseInt($(obj).prev().prev().html());
    var new_id = parseInt($(obj).html().substring(3))+1;
    
    if(key==0){
	var content = $(obj).parent().prev().prev().html();
    }
    else{
	var content = $(obj).parent().prev().children().html();
    }
    $.ajax({
	type:"POST",
	url:"share_baike.php",
        data:"&id="+id+"&content="+"分享自"+id+":"+content,
	success:function(returnKey){
		alert("\"分享\"成功"+new_id);
		$(obj).html("分享("+new_id+")");
	}
    });
}


function comment(obj){
    //展示评论
    $(obj).parent().next().next().slideToggle("slow");
}

function send_comment(obj){
    //获取信息
    var content = $(obj).prev().prev().prev().attr("value"); 
	content=atToLink(content).content;
    var baike_id = $(obj).prev().html();
    var comment_name =  $("#info_name").html();    
    var img_url = $(obj).parent().prev().children().children().attr("src");
    var now_time = get_time();
    //ajax 发送到数据库
    $.ajax({
	type:"POST",
	url:"comment.php",
	data:"&content="+content+"&baike_id="+baike_id,
        success:function(returnKey){
	     //把评论添加到头部
    $(obj).parent().parent().next().append("<div class='comment_head float_left'><div class='head_holder'><img alt='comment_head' src='"+img_url+"'></div></div><div class='comment_textarea float_left'><h class='comment_name'>"+comment_name+":"+"</h><p class='comment_p'>"+content+"</p>"+"<p class='comment_time'>"+now_time+"</p>"+"</div>");
	}
    });
}

function get_time(){
    var now= new Date();
    var year=now.getFullYear();
    var month=complete_data(now.getMonth()+1);
    var day=complete_data(now.getDate());
    var hour=complete_data(now.getHours());
    var minute=complete_data(now.getMinutes());
    var second=complete_data(now.getSeconds());
    return (year+"."+month+"."+day+" "+hour+":"+minute+":"+second);

    function complete_data(data){
	if(data<10){
	    data = "0"+data;
	}
	return data;
    }
}

function change_guanzhu(obj,key){
    //替换按钮
    var this_id = $(obj).parent().children().html();
    $.ajax({
	type:"POST",
	url:"guanzhu.php",
	data:"&type="+key+"&this_id="+this_id,
	success:function(returnKey){
	     if(key == 0)
	    {
		//关注
		$(obj).css("display","none");
		$(obj).next().css("display","block");
	    }
	    else{
		$(obj).css("display","none");
		$(obj).prev().css("display","block");
	    }
	}
    });
}

function atToLink(data){
	try{
		var username=data.match(/@\w+\(\d+\)\s/g);
		var atuser=[];
		for(var i=0;i<username.length;i++){
			data=data.replace(username[i],"<a href=\"http://localhost/microblog/other_info.php?key="+userid(username[i])+"\">"+username[i].replace("("+userid(username[i])+")","")+"</a>");
			atuser[i]=userid(username[i]);
			
		}
		return {content:data,user:atuser};
	}catch(e){
		return {content:data,user:null};
	}
	
	function userid(username){
		return username.match(/\d+/)[0];
	}
}
