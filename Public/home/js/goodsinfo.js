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
  $(".right-tab>a").click(function(){
    $(this).addClass("tab-red").siblings().removeClass("tab-red");
    var index = $(this).index();
    $(".tab-numbid>div").eq(index).show().siblings().hide();
  })
  $(".hover-lun>a").hover(function(){
    $(this).addClass("a-before").siblings().removeClass("a-before");
  })
  $(".hover-lun>a>span>img").hover(function(){
    var s=$(this)[0].src;
    $(".bigb").attr("src",s);
  })
   $(".bigb").hover(function(){
    var s=$(this)[0].src;
    $(".introdu-big>img").attr("src",s);
  })
  $(".new-lion>ul>li").click(function(){
    var index = $(this).index();
    $(this).addClass("lion-line").siblings().removeClass("lion-line");
    $(".lion-cont>div").eq(index).show().siblings().hide();
  })
})  
