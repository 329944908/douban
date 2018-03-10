$(function(){
	$(".set-pass").blur(function(){
        var valueLength = $(".set-pass").val().length;
        if ($.trim($('.set-pass').val()).length == 0) {  
            $(this).siblings(".hide").show();
			$(this).siblings(".hide").text("密码不能为空");
	        $('.set-pass').focus(function(){
	        	 $(this).siblings(".hide").hide();
	        	 $(this).siblings(".hide").text("");
	        });
	    }else {

	    }
    })
    $(".check-click>a").click(function(){
		$(".fixed-flow").show();
	})
	$(".fixed-a").click(function(){
		$(".fixed-flow").hide();
	})
	$(".fixed-text>a").click(function(){
		$(".fixed-flow").hide();
	})
	$(".click-phone").blur(function(){
		if ($.trim($('.click-phone').val()).length == 0) {  
            $(this).siblings(".hide").show();
			$(this).siblings(".hide").text("信息不能为空");
	        $('.click-phone').focus(function(){
	        	 $(this).siblings(".hide").hide();
	        	 $(this).siblings(".hide").text("");
	        });
	    }
	})
	function  foranctilala(){
    	var temp = $(".click-phone").val();
    	var tempLength = $(".click-phone").val().length;
	    var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/; 
	    var myEmail = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
	    if(!tempLength == 0 ) {
	        if(!myEmail.test(temp) && !myreg.test(temp))
		    {
		    	$(".fixed-flow").show();
			    $(".fixed-text>span").text("请输入有效的手机号或者邮箱！");
			    return false;
	        }else{

	        }
	    }    
	    else {
	    	$(".fixed-flow").show();
		    $(".fixed-text>span").text("请输入有效的手机号或者邮箱！");
		    return false;
	    }
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
        return true;
    }
	$(".red-login>input").click(function(){
        foranctilala()
        if(foranctilala() == true){
        	$(".fixed-flow").show();
	        $(".fixed-text>span").text("条件都满足！")
        }else {

        } 
    })  
})
