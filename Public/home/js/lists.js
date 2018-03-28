$(function(){
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
  $("#nav-goods>div:not('#nav-goods>div:first')").hide();
  $("#nav-goods>div:first-child").mouseover(function(){
  $("#nav-goods>div:not('#nav-goods>div:first')").show();
  })
  $("#nav-goods").mouseleave(function(){
  $("#nav-goods>div:not('#nav-goods>div:first')").hide();
  })
  $(".fault").click(function(){
    $(this).parent().siblings(".text-color").children(".fu-check").css("display","none");
    $(this).parent().css("display","none");
    $(this).parent().siblings(".list-bee").children(".list-bee>a").css("display","block");
  })
  $(".list-bee>a").click(function(){
    $(this).parent().prev(".text-color").children(".fu-check").css("display","inline-block");
    $(this).parent().next(".fuu-check").css("display","block");
    $(this).css("display","none");
    console.log($(this).parents(".drand-about"))
    // $(this).parents(".drand-about").siblings().children(".list-bee>a").css("display","block");
  })
  $(".buy-info>ul>li").mouseover(function(){
    $(this).addClass("la-color").siblings().removeClass("la-color");
    var index =$(this).index();
    console.log( $(this).parent().prev())
    $(this).parent().prev().children(".info-a>img").eq(index).fadeIn().siblings().fadeOut();
  	// var s=$(this)[0].src;
  	// $(".buy-info>a>img").attr("src",s);
  })
 
})