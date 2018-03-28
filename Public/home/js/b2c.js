$(function(){
  // $(".pagin>a").click(function(){
  //     var index =$(this).index();
  //     var width =$(window).width();
  //     console.log(width);
  //     $(".pagin>a").eq(index).addClass("active").siblings().removeClass("active");
  //     //  $(".new-carousel>a").eq(index).stop(true,true).css("margin-left","-index*width")
  //     // console.log(-index*width);
  //     if (index==0) {
  //       $(".new-carousel").stop(true,true).animate({"marginLeft":"0"},500)
  //     };
  //     if (index==1) {
  //       $(".new-carousel").stop(true,true).animate({"marginLeft":"-1349px"},500)
  //     };
  //     if (index==2) {
  //       $(".new-carousel").stop(true,true).animate({"marginLeft":"-2698px"},500)
  //     };
  //     if (index==3) {
  //       $(".new-carousel").stop(true,true).animate({"marginLeft":"-4047px"},500)
  //     };
  //     if (index==4) {
  //       $(".new-carousel").stop(true,true).animate({"marginLeft":"-5396px"},500)
  //     };
  // })
	var nowIndex =$(".active").index();
	function goLeft(index){
		if(nowIndex ==4){nowIndex = -1}
       $(".pagin>a").eq(nowIndex+=1).addClass("active").siblings().removeClass("active");
       $(".new-carousel").stop(true,true).animate({
       	    marginLeft:"-=1349px",
       },500,function(){
       	var first = $(".new-carousel>a").first();
       	var last = $(".new-carousel>a").last();
       	first.insertAfter(last);
       	$(".new-carousel").css("margin-left","-1349px");
       })
	}
	function goRight(index){
		if(nowIndex ==0){nowIndex = 5}
       $(".pagin>a").eq(nowIndex-=1).addClass("active").siblings().removeClass("active");
       $(".new-carousel").stop(true,true).animate({
       	    marginLeft:"+=1349px",
       },500,function(){
       	var first = $(".new-carousel>a").first();
       	var last = $(".new-carousel>a").last();
       	last.insertBefore(first);
       	$(".new-carousel").css("margin-left","-1349px");
       })
	}
	$(".last-page").click(function(){
        goLeft(nowIndex);
    })
    $(".next-page").click(function(){
        goRight(nowIndex);
    })
 	  exportTimer();
    function exportTimer(){
        timer = setInterval(function(){
            goLeft(nowIndex);
        },5000);
    }
    $(".pagin>a").hover(function(){
        clearInterval(timer);
    },function(){
        exportTimer();
    })
    $(".next-page").hover(function(){
            clearInterval(timer);
        },function(){
            exportTimer();
    })
    $(".last-page").hover(function(){
            clearInterval(timer);
        },function(){
            exportTimer();
    })
  $(".nav-goods>div").mouseover(function(){
    $(this).children(".classify").show();
    $(this).children(".make").show();
  }) 
  $(".nav-goods>div").mouseleave(function(){
    $(this).children(".classify").hide();
    $(this).children(".make").hide();
  }) 
  $(".nav-top>a").mouseover(function(){
    $(this).children(".show").show();
  })
  $(".nav-top>a").mouseleave(function(){
    $(this).children(".show").hide();
  })
  $(".top-3").click(function(){
    $('html,body').animate({'scrollTop': 0}, 500)
  })
  // $(".bigs").mouseover(function(){
  //   $(".web-hide").show();
  // })
  // $(".bigs").mouseleave(function(){
  //   $(".web-hide").hide();
  // })
})
$(window).scroll(function(){
  var adHeight = $(".box-ad").height();
  var textHeight = $(".nav-box").height();
  var bodyHeight = $("body").height(); 
  var wHeight = $(window).height(); 
  var scrollHeight = $(window).scrollTop();
  if((scrollHeight + wHeight) >=(textHeight + wHeight +adHeight)) {
    $(".nav-fixed").show();
  }else {
    $(".nav-fixed").hide();
  }
  if(scrollHeight > 0) {
    $(".top-3").show();
  }else {
    $(".top-3").hide();
  }
  $(".nav-fixed>a").click(function(){
    var index =$(this).index();
    $(".nav-fixed>a").eq(index).addClass("add").siblings().removeClass("add");
    $('html,body').stop().animate({scrollTop:$('.section').eq($(this).index()).offset().top}, 800);
  })
})