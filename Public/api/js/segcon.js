$(function(){
	 var windowHeight = $(window).height();
     var scrollHeight = $(window).scrollTop();
     console.log(scrollHeight)
	$(".do-tab>a").click(function(){
	  var index =$(this).index();
      $(this).addClass("add-bg").siblings().removeClass("add-bg");
      $(".tab-form>div").eq(index).show().siblings().hide();
	})
	$(".check-click>a").click(function(){
		$(".fixed-flow").show();
	})
	$(".fixed-a").click(function(){
		$(".fixed-flow").hide();
        location.replace(location.href);
	})
	$(".fixed-text>a").click(function(){
		$(".fixed-flow").hide();
        location.replace(location.href);
	})
	$(".click-phone").blur(function(){
	    $.ajax({ 
			url:"/api/user/checkUserId", //请求验证页面 
			type:"GET", //请求方式 可换为post 注意验证页面接收方式
			// dataType:"jsonp", 
			// jsonp: "jsonpCallback",
			data:"phone="+$(".click-phone").val(), //取得表文本框数据，作为提交数据 注意前面的 user 此处格式 key=value 其他方式请参考ajax手册 
			success: function(data) 
			{ //请求成功时执行操作 
			$("#chk").html(data); //向ID为chk的元素内添加html代码 
			}
		}); 
	})

	$(".click-email").blur(function(){
	    $.ajax({ 
			url:"/api/user/checkUserEmail", //请求验证页面 
			type:"GET", //请求方式 可换为post 注意验证页面接收方式
			// dataType:"jsonp", 
			// jsonp: "jsonpCallback",
			data:"email="+$(".click-email").val(), //取得表文本框数据，作为提交数据 注意前面的 user 此处格式 key=value 其他方式请参考ajax手册 
			success: function(data) 
			{ //请求成功时执行操作 
			$("#chk1").html(data); //向ID为chk的元素内添加html代码 
			}
		}); 
	})
	 $(".click-ph").blur(function(){
		var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/; 
		if(!myreg.test($(".click-ph").val())) 
	    { 
		    $(this).siblings(".hide").show();
			$(this).siblings(".hide").text("请输入有效的手机号码！");
		     $('.click-ph').focus(function(){
	        	 $(this).siblings(".hide").hide();
	        	 $(this).siblings(".hide").text("");
	        });
	     } 
	})
	$(".click-ph").blur(function() {
		if ($.trim($('.click-ph').val()).length == 0) {  
            $(this).siblings(".hide").show();
			$(this).siblings(".hide").text("手机号不能为空");
	        $('.click-ph').focus(function(){
	        	 $(this).siblings(".hide").hide();
	        	 $(this).siblings(".hide").text("");
	        });
	    }
	})
    $(".set-pass").blur(function(){
    	var pwdReg = /^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,16}$/;//6到16位数字与字母组合
        var value = $(".set-pass").val();
        if(!pwdReg.test(value)){
            $(this).siblings(".hide").show();
			$(this).siblings(".hide").text("密码不合法");
	        $(".set-pass").focus(function(){
	        	$(this).siblings(".hide").hide();
	        	$(this).siblings(".hide").text("");
	        });
        }else{
	        $(".set-pass").focus(function(){
	        	$(this).siblings(".hide").hide();
	        	$(this).siblings(".hide").text("");
	        });
        }
    })
     $(".set-pass").blur(function() {
        var valueLength = $(".set-pass").val().length;
        if ($.trim($('.set-pass').val()).length == 0) {  
            $(this).siblings(".hide").show();
			$(this).siblings(".hide").text("密码不能为空");
	        $('.set-pass').focus(function(){
	        	 $(this).siblings(".hide").hide();
	        	 $(this).siblings(".hide").text("");
	        });
	    }
     })
     $(".click-mi").blur(function(){
    	var pwdReg = /^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,16}$/;//6到16位数字与字母组合
        var value = $(".click-mi").val();
        if(!pwdReg.test(value)){
            $(this).siblings(".hide").show();
			$(this).siblings(".hide").text("密码不合法");
	        $(".click-mi").focus(function(){
	        	$(this).siblings(".hide").hide();
	        	$(this).siblings(".hide").text("");
	        });
        }else{
	        $(".click-mi").focus(function(){
	        	$(this).siblings(".hide").hide();
	        	$(this).siblings(".hide").text("");
	        });
        }
    })
     $(".click-mi").blur(function() {
        var valueLength = $(".click-mi").val().length;
        if ($.trim($('.click-mi').val()).length == 0) {  
            $(this).siblings(".hide").show();
			$(this).siblings(".hide").text("密码不能为空");
	        $('.click-mi').focus(function(){
	        	 $(this).siblings(".hide").hide();
	        	 $(this).siblings(".hide").text("");
	        });
	    }
     })
    $(".true-pass").blur(function() {
        var a=document.getElementById('true-pass').value;
        var b=document.getElementById('set-pass').value;
         if(a == b) {
			$(".true-pass").focus(function(){
	        	$(this).siblings(".hide").hide();
	        	$(this).siblings(".hide").text("");
	        });
         }else {
         	$(this).siblings(".hide").show();
			$(this).siblings(".hide").text("密码不一致");
			$(".true-pass").focus(function(){
	        	$(this).siblings(".hide").hide();
	        	$(this).siblings(".hide").text("");
	        });
         }
    })
     $(".click-que").blur(function() {
        var aa=document.getElementById('click-que').value;
        var bb=document.getElementById('click-mi').value;
         if(aa == bb) {
			$(".click-que").focus(function(){
	        	$(this).siblings(".hide").hide();
	        	$(this).siblings(".hide").text("");
	        });
         }else {
         	$(this).siblings(".hide").show();
			$(this).siblings(".hide").text("密码不一致");
			$(".click-que").focus(function(){
	        	$(this).siblings(".hide").hide();
	        	$(this).siblings(".hide").text("1111");
	        });
         }
    })
  //   $(".email").blur(function() {
  //   var temp = $(".email").val();
  //   var myEmail = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
  //   if(!myEmail.test(temp))
  //   {
  //   	$(this).siblings(".hide").show();
		// $(this).siblings(".hide").text("请填写有效的邮箱");
		// $(".email").focus(function(){
  //       	$(this).siblings(".hide").hide();
  //       	$(this).siblings(".hide").text("");
	 //    });
       
  //   }else {
    	
  //   }
    // })
    $(".click-out").blur(function(){
		var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/; 
		if(!myreg.test($(".click-out").val())) 
	    { 
		    $(this).siblings(".hide").show();
			$(this).siblings(".hide").text("请输入有效的手机号码！");
		     $('.click-out').focus(function(){
	        	 $(this).siblings(".hide").hide();
	        	 $(this).siblings(".hide").text("");
	        });
	     } 
	})
	$(".click-out").blur(function() {
		if ($.trim($('.click-out').val()).length == 0) {  
            $(this).siblings(".hide").show();
			$(this).siblings(".hide").text("手机号不能为空");
	        $('.click-out').focus(function(){
	        	 $(this).siblings(".hide").hide();
	        	 $(this).siblings(".hide").text("");
	        });
	    }
	})
    $(".check-click>input").on('click', function(){
        forancti(); 
        if(forancti() == true){
        	$("#b1").removeAttribute("disabled");
        }else {
            $("#b1").prop("disabled",true);
            forancti();
        }
    })
  
    $(".check-about>input").on('click', function(){
        foranction();
         console.log(foranction()) 
        if(foranction() == true){
        	$("#but").removeAttribute("disabled");
        }else {
            $("#but").prop("disabled",true);
            foranction();
        }
    })
    // function check-form(){
    // 	return forancti();
    // }
    function  forancti() {
        var temp = $(".click-email").val();
	    var myEmail = /^([0-9A-Za-z]+)@(?:qq|163)\.(?:cn|com)/;
	    if(!myEmail.test(temp))
	    {
	    	$(".fixed-flow").show();
		    $(".fixed-text>span").text("请输入有效的邮箱！");
		    return false;
	    }else {
	    	// $(".fixed-flow").hide();
	    }
	  //   var imgLength = $(".line-pmg1").val().length;
		 //    console.log(imgLength)
		 //    if(imgLength == 0){
		 //    	$(".fixed-flow").show();
			//     $(".fixed-text>span").text("验证码不能为空！请重新输入");
			//     return false;
		 //    }
		 //    else {

		 //    }
			// $.ajax({
			// url:"/api/user/check_verify", //请求验证页面 
			// type:"GET", //请求方式 可换为post 注意验证页面接收方式
			// //dataType:"json", 
			// // jsonp: "jsonpCallback",
			// data:"verifyCode="+$(".line-pmg1").val(), //取得表文本框数据，作为提交数据 注意前面的 user 此处格式 key=value 其他方式请参考ajax手册 
			// success: function(res) 
			// { //请求成功时执行操作 
			// 	$(".fixed-flow").show();
			//     $(".fixed-text>span").text("验证码错误！请重新输入");
			//     return false;
			// }
			// })
	    var pwdReg = /^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,16}$/;//6到16位数字与字母组合
        var value = $(".click-mi").val();
        var valueLength = $(".click-mi").val().length;
        if(valueLength == 0) {
        	 $(".fixed-flow").show();
		    $(".fixed-text>span").text("密码不能为空！请重新输入");
		    return false;
        }else {

        }
        if(!pwdReg.test(value)){
            $(".fixed-flow").show();
		    $(".fixed-text>span").text("密码格式错误！请重新输入");
		    return false;
        }else{

        }
        var aa=document.getElementById('click-que').value;
        var bb=document.getElementById('click-mi').value;
        if(aa == bb) {
            
        }else {
         	$(".fixed-flow").show();
		    $(".fixed-text>span").text("确认密码错误！请重新输入")
		    return false;
        }	
	    var box= document.getElementById("hecheck");
	    if(box.checked === true){
             
	    }else {
	    	$(".fixed-flow").show();
		    $(".fixed-text>span").text("请阅读并同意《TPshop网服务协议》");
		    return false;
	    }
        return true;    
    }
    function foranction() {
            var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/; 
		    if (!myreg.test($(".click-phone").val())) {
	            $(".fixed-flow").show();
			    $(".fixed-text>span").text("请输入有效的手机号码!!!!!!!");
			    return false;
		    }else {

		    }
		 //    var imgLength = $(".line-pmg").val().length;
		 //    console.log(imgLength)
		 //    if(imgLength == 0){
		 //    	$(".fixed-flow").show();
			//     $(".fixed-text>span").text("验证码不能为空！请重新输入");
			//     return false;
		 //    }
		 //    else {

		 //    }
			// $.ajax({
			// url:"/api/user/check_verify", //请求验证页面 
			// type:"GET", //请求方式 可换为post 注意验证页面接收方式
			// //dataType:"jsonp", 
			// // jsonp: "jsonpCallback",
			// data:"verifyCode="+$(".line-pmg").val(), //取得表文本框数据，作为提交数据 注意前面的 user 此处格式 key=value 其他方式请参考ajax手册 
			
			// success: function(res) 
			// { //请求成功时执行操作 
			// 	$(".fixed-flow").show();
			//     $(".fixed-text>span").text("验证码错误！请重新输入");
			//     console.log(verifyCode);
			//     var ql = $(".line-pmg").val();
			//     console.log(ql);
			//     return false;
			// }
			// })
		    var pwdReg = /^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,16}$/;//6到16位数字与字母组合
	        var value = $(".set-pass").val();
	        var valueLength = $(".set-pass").val().length;
	        if(valueLength == 0) {
	        	 $(".fixed-flow").show();
			    $(".fixed-text>span").text("密码不能为空！请重新输入");
			    return false;
	        }else {

	        }
	        if(!pwdReg.test(value)){
	            $(".fixed-flow").show();
			    $(".fixed-text>span").text("密码格式错误！请重新输入");
			    return false;
	        }else{

	        }
	        var a=document.getElementById('true-pass').value;
	        var b=document.getElementById('set-pass').value;
	        if(a == b ) {
	            
	        }else {
	         	$(".fixed-flow").show();
			    $(".fixed-text>span").text("确认密码错误！请重新输入");
			    return false;
	        }	
		    var box= document.getElementById("ch");
		    if(box.checked ===true){
             
		    }else {
		    	$(".fixed-flow").show();
			    $(".fixed-text>span").text("请阅读并同意《TPshop网服务协议》");
			    return false;
		    }
            return true;
        console.log(this);
    }
    $('.verify').click(function(){
			newsrc="/Api/User/verifyCode/v/"+Math.random();
			$('.verify').attr('src',newsrc);
		})
})   
