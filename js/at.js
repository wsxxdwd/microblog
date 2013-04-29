$(function(){
				$.ajax({
				type:"POST",
				url:"at.php",
				dataType: 'json',
				data: 5,
				success: function(data) {
				$("textarea#inputor").atwho("@",{
                'data':data,
                limit:5
            });
				}
			});
     
            //var data = ["Jacob","Isabella","Ethan","Emma","Michael","Olivia","Alexander","Sophia","William","Ava","Joshua","Emily","Daniel","Madison","Jayden","lepture","Abigail","Noah","Chloe","aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa","你好","你你你", "高富帅"
            //];

            

          //data
      

});