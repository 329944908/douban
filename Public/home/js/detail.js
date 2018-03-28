window.onload = function(){
    // 鼠标放到小盒子上时，大盒子图片同等比例移动
    //技术点：onmouseenter==onmouseover 第一个不冒泡
    //技术点：onmouseleave==onmouseout  第一个不冒泡
    //步骤：
    //1.鼠标放上去显示盒子，移开隐藏盒子
    //2.mask跟随移动
    //3.右侧的大图片，等比例移动

    var box = document.getElementsByClassName("introdu-box")[0];
    var small = box.firstElementChild || box.firstChild;
    var big = box.children[1];
    var mask = small.children[1];
    var bigImg = big.children[0];

    // 1.鼠标放上去显示盒子，移开隐藏盒子（为小盒子绑定事件）

    // 调用封装好的方法，显示元素
    small.onmouseenter = function(){
        show(mask);
        show(big);
    }
    // 调用封装好的方法，隐藏元素
    small.onmouseleave = function(){
        hide(mask);
        hide(big);
    }

    // 2. mask跟随鼠标移动
    // 绑定事件是onmousemove，事件源是small，只要在小盒子上移动1px，mask也要跟随移动
    small.onmousemove = function(event){
        // 想移动mask，需要知道鼠标在small中的位置，x作为mask的left值，y作为mask的top值
        event = event || window.event;
        // 获取鼠标在整个页面的位置
        var pagex = event.pageX || scroll().left + event.clientX;
        var pagey = event.pageY || scroll().top + event.clientY;
        // 让鼠标在mask的最中间，减去mask宽高的一半，x、y为mask的坐标
        // console.log(pagex + " " + pagey);
        var x = pagex - box.offsetLeft - mask.offsetWidth;
        var y = pagey - box.offsetTop - mask.offsetHeight*2;
        // console.log(y)
        // console.log(small.offsetHeight - mask.offsetHeight)
        // 限制mask的范围，left取值大于0，小于小盒子的宽减mask的宽
        if(x<0){
            x = 0;
        }
        if(x>small.offsetWidth - mask.offsetWidth){
            x = small.offsetWidth - mask.offsetWidth;
        }
        if(y<0){
            y = 0;
        }
        if(y>small.offsetHeight - mask.offsetHeight){
            y = small.offsetHeight - mask.offsetHeight;
        }
        // 移动mask
        // console.log("x:" + x + " y:" + y);
        mask.style.left = x + "px";
        mask.style.top = y + "px";

        //3.右侧的大图片，等比例移动
        // 大图片/大盒子 = 小图片/mask盒子
        // 大图片走的距离/mask走的距离 = （大图片-大盒子）/（小图片-mask）
        //比例var times = (bigImg.offsetWidth-big.offsetWidth)/(small.offsetWidth-mask.offsetWidth);
        //大图片走的距离/mask盒子走的距离 = 大图片/小图片
        var times = bigImg.offsetWidth/small.offsetWidth;
        var _x = x * times;
        var _y = y * times;
        bigImg.style.marginLeft = -_x + "px";
        bigImg.style.marginTop = -_y + "px";
    }
}
// 显示隐藏元素
function show(element){
    element.style.display = "block";
}
function hide(element){
    element.style.display = "none";
}
