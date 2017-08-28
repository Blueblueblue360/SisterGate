<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Welcome!</title>
<style>
* {
   margin: 0;
   padding: 0;
}
#ballBox {
   width:100%;
   height:100%;
   position: relative;
   margin: 0 auto;
   overflow: auto;
   z-index:999;
   background-image:url(images/background.jpg);
}
div img{
    position:absolute;
    left:50%;
    margin-left:-350px;//这里的值是图片宽度的一半
}
</style>
</head>
<body>
<div id="ballBox">
    <image src="images/welcome.jpg" />
</div>
</body>
<script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<script>				
    var ballBox = document.getElementById("ballBox");		
    var div = ballBox.getElementsByTagName("div");	
    var timerX = []; //x方向 定时器
    var timerY = []; //y方向 定时器
    var timerXX = []; //x方向碰壁反弹时的定时器
    var timerYY = []; //y方向碰壁反弹时的定时器
    var positionX = [];  //设置这个小球的位置的初始的X轴坐标
    var positionY = [];  //设置这个小球的位置的初始的y轴坐标	
    var boolX = [];  //用来判断小球是否碰到过墙壁，用不用反方向
    var boolY = [];  //用来判断小球是否碰到过墙壁，用不用反方向
	
    var i = []; // 小球碰到墙壁，减速加速时使用	
    var width = [];   //小球碰到墙壁时，每次运行定时器时小球的宽度
    var height = [];  //小球碰到墙壁时，每次运行定时器时小球的高度
	
    var initialW = document.documentElement.clientWidth;  //小球弹跳区域的大小，这里设置的是可视区域
    var initialH = document.documentElement.clientHeight;  //小球弹跳区域的大小，这里设置的是可视区域
    ballBox.style.width = initialW + "px";
    ballBox.style.height = initialH + "px";	
    var num = 0;// 用来记录新生成小球的个数，同时作为小球的索引值
	
	var colorArr = ["rgba(255,255,0,0.5)","rgba(127,255,0,0.5)","rgba(255,105,180,0.5)","rgba(0,255,255,0.5)","rgba(255,99,71,0.5)","rgba(210,180,140,0.5)"];

var ball = setInterval(function(){ createBall() },1000);//执行函数

function createBall(){
		num +=1 ;
		var temp = [];  //临时数组，用来放三个随机数
        do {
            temp[0] = Math.random()*60;
        }while(temp[0] < 35)  //生成一个随机数，用来做为小球的直径；
        do {
            temp[1] = Math.random()*4;
        }while(temp[1] < 1)  //生成一个随机数，用来做为小球x方向的步长；
        do {
            temp[2] = Math.random()*4;
        }while(temp[2] < 1)  //生成一个随机数，用来做为小球y方向的步长；
		
        var newDiv = document.createElement("div");
        newDiv.style.position = "absolute";  //设置小球的一系列属性，大小，颜色等等
        newDiv.style.width = temp[0] + "px";
        newDiv.style.height = temp[0] + "px";
        newDiv.style.borderRadius = "50%";
        newDiv.style.backgroundColor = colorArr[Math.floor(Math.random()*6)];		
        newDiv.style.top = 0;
        newDiv.style.left = 0;
        //newDiv.title = num++;  //设置索引
        newDiv.style.fontSize = temp[0]/2 + "px";
        newDiv.style.lineHeight = temp[0] + "px";		
        positionX[positionX.length] = 0;  //设置这个小球的位置的初始的X轴坐标也就是小球出发的位置
        positionY[positionY.length] = 0;  //设置这个小球的位置的初始的y轴坐标也就是小球出发的位置
        boolX[boolX.length]= false;  //用来判读小球是否碰到过墙壁，用不用反方向
        boolY[boolY.length]= false;  //用来判读小球是否碰到过墙壁，用不用反方向	
        ballBox.appendChild(newDiv);	
        timerX[timerX.length] = setInterval("moveX("+temp[0]+","+temp[1]+","+ (div.length-1) +")",10);
        timerY[timerY.length] = setInterval("moveY("+temp[0]+","+temp[2]+","+ (div.length-1) +")",10);
		if(num > 20){
			clearInterval(ball);	
		}
}	
    function moveX(dia,x,index) {      //小球x轴方向的位移函数
        if (positionX[index]+x > initialW-dia) {  //if用来判断小球是否需要换方向
            clearInterval(timerX[index]);
            div[index].style.left = "";
            div[index].style.right =  "0";
            i[index] = 0;
            timerXX[index] = setInterval("fn("+x+","+index+ ","+ dia +",'right')",10);
            return;
        }
        if (positionX[index]+x < 0) {  //if用来判断小球是否需要换方向
            clearInterval(timerX[index]);
            div[index].style.left = "0";
           	i[index] = 0;
            timerXX[index] = setInterval("fn("+x+","+index+ ","+ dia +",'left')",10);
            return;
        }
        positionX[index] += x;
        div[index].style.left =  positionX[index] + "px";  //设定此小球距离左端的距离
    }
    function moveY(dia,y,index) {      //小球y轴方向的位移函数
        if (positionY[index]+y > initialH-dia) {  //if用来判断小球是否需要换方向
            clearInterval(timerY[index]);
            div[index].style.top = "";
            div[index].style.bottom =  "0";
          	i[index] = 0;
            timerYY[index] = setInterval("fn("+y+","+index+ ","+ dia +",'bottom')",10);
            return;
        }
        if (positionY[index]+y < 0) {  //if用来判断小球是否需要换方向
            clearInterval(timerY[index]);
            div[index].style.top = "0";
           	i[index] = 0;
            timerYY[index] = setInterval("fn("+y+","+index+ ","+ dia +",'top')",10);
            return;
        }
        positionY[index] += y;
        div[index].style.top =  positionY[index] + "px";   //设定此小球距离顶端的距离
    }
    function fn(k,index,dia,direction) {
        width[index] = div[index].scrollWidth;
        height[index] = div[index].scrollHeight;
        k = -k;
        //  判断是否已经反弹完成，该脱离墙壁了
        if ( -(Math.abs(k)+i[index]) > Math.abs(k)) {
            div[index].style.width = dia + "px";        //使宽高均为原始大小
            div[index].style.height = dia + "px";       //使宽高均为原始大小
            //判断是左右方向撞墙还是上下方向，需要调用不同的定时器
            if (direction == "left"||direction == "right") {
                clearInterval(timerXX[index]);
                timerX[index] = setInterval("moveX("+dia+","+k+","+ index +")",10);
                return ;
            }else {
                clearInterval(timerYY[index]);
                timerY[index] = setInterval("moveY("+dia+","+k+","+ index +")",10);
                return ;
            }
        }
		
        i[index] -= 0.4;

    }
</script>
</html>

<!--加速度的定义是△v/△t,这是一般的求法-->
<!--还有就是利用牛顿第二定律,F=ma,可以先求合外力,再比上质量就是加速度a-->
<!--还可以利用运动学公式X=1/2at²+v0t或者v²-v0²=2ax求出-->