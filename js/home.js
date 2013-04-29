var menuState=1;

$(document).ready(function(){
	
	$('.unique').css('background','rgba(0,0,0,0.8)');
	$('.unique').css('color','#FAA9D3');
       

    $(".no_unique").bind("mouseover",function(){
	$(this).css("backgroundColor","rgba(0,0,0,0.6)");
    });
     $(".no_unique").bind("mouseout",function(){
	$(this).css("backgroundColor","rgba(255,255,255,0.5)");
    });


	changFocus('#menu1',1);
	changFocus('#menu2',2);
	changFocus('#menu3',3);
	if(document.body.clientWidth<=900){
			$('.menu').css('font-size','300%');
			$('.menu').css('padding',"1% 0 1%");
			$('#menu3 img').css('height',48);
			$('#sidetext').css('width',"100%");
			$('#sidetext').css('min-height',"300px");
			$('#right').css('width',"100%");
			$('#footer a').css('font-size',"3500%");
			//$('#content img').hide();
			
	}

	window.onscroll=changeMenu;
    function changeMenu(){
		if(document.body.clientWidth<=899){
			//$('.menu').css('height',75);
		}else{
			var distance=Math.max($('body').scrollTop(),$('html').scrollTop());
			if(distance!=0&&menuState==1){
				$('.menu').animate( {fontSize:"300%",padding:"1% 0 1%"},'fast' );
      			$('#menu3 img').animate( {height:"48"},'fast');
				menuState=2;
			}
			if(distance==0&&menuState==2){
				 $('.menu').animate( {fontSize:"700%",padding:"7% 0 7%"},'fast' );
     			 $('#menu3 img').animate( {height:"112"},'fast' );
					menuState=1;
			}
		}
    }
	
	var a=$("#menu1").offset();
//backtop
	backToTop=$("#footer a");
	scrollToMenu=function(){
		
	$("html,body").animate({scrollTop:a.top},500)};
	backToTop.click(scrollToMenu);
//menuLink
	$(".menu").click(function(){
		$("html,body").animate({scrollTop:a.top},500);
		  
	});
//menuChangeFocus
   function changFocus(a,num){
	   $(a).click(function(){
	   		$('.menu').css('background','rgba(255,255,255,0.5)');
			$('.menu').css('color','#EEE');
			$(a).css('background','rgba(0,0,0,0.8)');
			$(a).css('color','#FAA9D3');
			focusNum=num;
	   });
	   //$(a).mouseenter(function(){
		 //  if(num!=focusNum)
		   //$(this).css("background","red");
		//});
   }



});

