window.addEventListener('load', init);
function init() {
   	//shuffle-text
   		var li = document.getElementsByClassName('shuffle');
   		var effectList = [];
   		for(var i =0;i<li.length;i++){
   			var element = li[i];
         		element.dataset.index = i;
   			effectList[i] =  new ShuffleText(element);
   			effectList[i].sourceRandomCharacter ="FUTUREATLASBD103";

          	element.addEventListener('mouseenter', function () {
            	effectList[+this.dataset.index].start();
        });
   		}
   	//parallax
  		var scene = document.getElementById('scene');
  		var parallaxInstance = new Parallax(scene);

  	//load_up
  		setTimeout(loadUp, 3300);
  		setTimeout(loadUpSecond, 3780);
  	//target_appear

  	//NeonLight
  		// var fw_motobox = document.getElementsByClassName('fw_motobox');
  		// fw_motobox[0].onclick = NeonLight;

  	//bannerOpenClose
  		var banner = document.getElementsByClassName('banner');
  		var shipbox = document.getElementsByClassName('shipbox');
  		var cross = document.getElementsByClassName('cross');
  		banner[0].onclick = bannerOpenClose;
  		document.addEventListener('mousewheel',bannerMousewheelClose);
    //mobilebannerOpenClose
      setTimeout(mobileOpenB,4000);


    //canvas
    // document.addEventListener('mousewheel',canvasRunStop);//待修改--------------------!!
    if(location.hash=="#page1"||location.hash==""){

        e_light();
    }
  	//roboAppear
  	var robo = document.getElementById('robo');
  	robo.onclick = roboAppear;

}



// function canvasRunStop(){
//   if(location.hash=="#page1"||location.hash==""){
//       e_light();
//   }else{
//     cancelAnimationFrame(timer1);
//     clearTimeout(timer2);
//     clearTimeout(timer3);
    
//   }
// }



function loadUp(){
  	var entrance = document.getElementsByClassName('entrance');
  	var e_canvas_cover = document.getElementsByClassName('e_canvas_cover')[0];
  	var robo = document.getElementById('robo');
  	var roller = document.getElementsByClassName('roller');
  	var rocket = document.getElementsByClassName('rocket');
  	var ferris_cover = document.getElementsByClassName('ferris_cover');
  	entrance[0].setAttribute("id", "entranceApear");
  	e_canvas_cover.setAttribute("id", "canvas_cover");
  	robo.style.transform = "translateY(0)";
  	roller[0].setAttribute("id", "rollerAppear");
  	rocket[0].setAttribute("id", "rocketAppear");
  	ferris_cover[0].setAttribute("id", "ferrisAppear");
  	clearTimeout(loadUp);
}
function loadUpSecond(){
  	var flyship = document.getElementsByClassName('flyship');
  	var banner = document.getElementsByClassName('banner');
  	var clouds = document.getElementsByClassName('machi');
    var balloon = document.getElementsByClassName('balloon');
  	flyship[0].style.transform = "translateX(0)";
  	banner[0].style.transform = "translateX(0)";
  	clouds[0].style.opacity = "0.8";
  	clouds[1].style.opacity = "0.9";
    for(var b= 0; b<balloon.length;b++){
      balloon[b].setAttribute("id", "ballonfly");
    }
    clearTimeout(loadUpSecond);
}
function bannerOpenClose(){
  	var banner = document.getElementsByClassName('banner');
  	var shipbox = document.getElementsByClassName('shipbox');
  	var cross = document.getElementsByClassName('cross');
  	var allPage = document.getElementById('all-page');
  	if(shipbox[0].id != "shipboxOpen"){
  	banner[0].setAttribute("id", "openBanner");
  	shipbox[0].setAttribute("id", "shipboxOpen");
  	allPage.style.display="block";
  	}else{
  	banner[0].id="";
  	shipbox[0].id ="";
  	allPage.style.display="";
  	}
	
}
function bannerMousewheelClose(){
  	var banner = document.getElementsByClassName('banner');
  	var shipbox = document.getElementsByClassName('shipbox');
  	var cross = document.getElementsByClassName('cross');
  	var allPage = document.getElementById('all-page');
  	if(shipbox[0].id == "shipboxOpen"){
  		banner[0].id="";
      shipbox[0].id ="";
      allPage.style.display="";
  	}
}
function mobileOpenB(){
    var mobileSizeBanner = document.getElementsByClassName('mobileSizeBanner');
    var allPage = document.getElementById('all-page');
    mobileSizeBanner[0].setAttribute("id", "mobileOpenBanner");
    mobileSizeBanner[0].src="img/firstSection/banner1.png";
    setTimeout(mobileOpenB2,8000);
}
function mobileOpenB2(){
   var mobileSizeBanner = document.getElementsByClassName('mobileSizeBanner');
    var allPage = document.getElementById('all-page');
    mobileSizeBanner[0].src="img/firstSection/banner2.png";
    setTimeout(mobileOpenB3,8000);

}
function mobileOpenB3(){
    var mobileSizeBanner = document.getElementsByClassName('mobileSizeBanner');
    var allPage = document.getElementById('all-page');
    mobileSizeBanner[0].src="img/firstSection/banner1.png";
    mobileSizeBanner[0].id="";
    setTimeout(mobileOpenB,5000);
}
// function NeonLight(){
// 		var fw_motobox = document.getElementsByClassName('fw_motobox');
// 		var fw_motoword = document.getElementsByClassName('fw_motoword');
// 		if(fw_motobox[0].id != "fw_wordbox" && fw_motoword[0].id != "fw_word"){
// 			fw_motobox[0].setAttribute("id", "fw_wordbox");
// 			fw_motoword[0].setAttribute("id", "fw_word");
// 		}else{
// 			fw_motobox[0].id = "";
// 			fw_motoword[0].id = "";
// 		}	
// }

function roboAppear(){
  	this.style.bottom="0";
  	this.setAttribute("class","robolight");
}



// CANVAS----------------------------------------------
window.requestAnimFrame = (function() {
  return (
      window.requestAnimationFrame       || 
      window.webkitRequestAnimationFrame || 
      window.mozRequestAnimationFrame    || 
      window.oRequestAnimationFrame      || 
      window.msRequestAnimationFrame     || 
      function(callback, time) {
        var time = time ? time: 1000 / 60;
        window.setTimeout(callback, time);
    }
  );
})();


/*resize重新取得canvas長寬*/
window.addEventListener("resize",e_light);
function e_light(){
	canvas = document.getElementById('e_light');
    var ctx = canvas.getContext('2d');
   	var	cover = document.getElementsByClassName('e_canvas_cover')[0];
    w = cover.offsetWidth;
    h = cover.offsetHeight;
    	canvas.setAttribute("width",w);
    	canvas.setAttribute("height",h);
    var x = 0;
    var y = 0;


  	function Rect(thx,thy,thW,thH,color){
  		 var _col = color || 'black';
  		 ctx.beginPath();
  		 ctx.fillStyle = _col;
  		 ctx.fillRect(thx,thy,thW,thH);
  	}

     function theaterAnimate(){//---右下劇場區塊

     	var g = Math.round(Math.random()*100);
     	var b = Math.round(Math.random()*280);

     		Rect(1114.1/1583*w,347.5/539*h,16/1583*w,10/539*h,"#00ff99");
  	   	Rect(1154.5/1583*w,378/539*h,35/1583*w,10/539*h,"#00ff99");
  	   	Rect(1177/1583*w,351.5/539*h,15/1583*w,25/539*h,"#00ff99");
  	   	Rect(1249.4/1583*w,441.1/539*h,20/1583*w,25/539*h,"rgb("+g+",200,"+b+")");/*劇場/*/
  	   	Rect(1255.5/1583*w,422/539*h,45/1583*w,25/539*h,"rgb("+g+",255,"+b+")");/*劇場/*/
  	   	Rect(1299.9/1583*w,439.1/539*h,40/1583*w,25/539*h,"rgb("+g+",255,"+b+")");/*劇場/*/
  	   	Rect(1469.6/1583*w,423.0/539*h,15/1583*w,10/539*h,"#00ff99");
  	   	Rect(1523/1583*w,465.2/539*h,12/1583*w,10/539*h,"#00fff6");
  		setTimeout(theaterAnimate,300);
  		
     }
     theaterAnimate();

     var height = 0;
     function doorAnimate(){//---正中間
     		if(height<=250){
     			height=height+5;
     		}else if(height>250){
     			height = 0;
     		}
     		
     		Rect(877/1583*w,47.4/539*h,10/1583*w,220/539*h,"#000000");/*黑底*/
     		Rect(877/1583*w,47.4/539*h,10/1583*w,height/539*h,"#00f6ff");
     		Rect(1061.5/1583*w,18.2/539*h,10/1583*w,250/539*h,"#000000");/*黑底*/
     		Rect(1061.5/1583*w,18.2/539*h,10/1583*w,height/539*h,"#00f6ff");

     		Rect(1078.7/1583*w,275/539*h,10/1583*w,80/539*h,"#00f6ff");
     		Rect(990.9/1583*w,305.2/539*h,10/1583*w,80/539*h,"#00f6ff");
     		timer1 = requestAnimationFrame(doorAnimate);
        // console.log(height);
     }
     doorAnimate();

     function left(){//---左區塊
     		Rect(969.7/1583*w,425.3/539*h,10/1583*w,10/539*h,"#5bf9ff");
     		Rect(827.3/1583*w,421.3/539*h,15/1583*w,10/539*h,"#5bf9ff");
     		Rect(776.8/1583*w,337.7/539*h,10/1583*w,15/539*h,"#5bf9ff");
     		Rect(784.9/1583*w,390/539*h,10/1583*w,20/539*h,"#9bfbff");
     		Rect(721.2/1583*w,431/539*h,20/1583*w,10/539*h,"#00ff8c");
     		Rect(681.8/1583*w,424/539*h,25/1583*w,10/539*h,"#00ff8c");
     		Rect(607.1/1583*w,410.9/539*h,10/1583*w,10/539*h,"#60cfff");
     		Rect(589/1583*w,404.8/539*h,10/1583*w,20/539*h,"#60cfff");
     		Rect(525.3/1583*w,374.6/539*h,20/1583*w,40/539*h,"#60cfff");
     		Rect(535.4/1583*w,361.5/539*h,20/1583*w,20/539*h,"#60cfff");
     		Rect(507.1/1583*w,395.8/539*h,20/1583*w,20/539*h,"#60cfff");
     		Rect(472.8/1583*w,408.9/539*h,20/1583*w,20/539*h,"#32ff84");
     		Rect(472.8/1583*w,408.9/539*h,20/1583*w,20/539*h,"#32ff84");
     		Rect(439.5/1583*w,429/539*h,20/1583*w,20/539*h,"#729fff");
     }
     left();
  	var a,b,c=0;
     function leftAnimate_A(){
     	
     	var randomTime = Math.round(Math.random()*600);
     	   	if(a<155&&b<251&&c<255){
  	   		a=155;
  	   		b=251;
  	   		c=255;
     		}else{
  	   		a=0;
  	   		b=0;
  	   		c=0;
     		}
     		
     		Rect(784.9/1583*w,390/539*h,10/1583*w,20/539*h,"rgb("+a+","+b+","+c+")");/*color*/
     		timer2 = setTimeout(leftAnimate_A,randomTime);
        
     }
     leftAnimate_A();

     function leftAnimate_B(){
     		var randomTime = Math.round(Math.random()*700);
     	   	if(a==0&&b<255&&c<140){
  	   		a=0;
  	   		b=255;
  	   		c=140;
     		}else{
  	   		a=0;
  	   		b=0;
  	   		c=0;
     		}
     	Rect(564.7/1583*w,228.5/539*h,10/1583*w,40/539*h,"rgb("+a+","+b+","+c+")");/*color*/ 
     	timer3 = setTimeout(leftAnimate_B,randomTime);		
  		
     }
        leftAnimate_B();

    //   function onClick(e) {
           
    //       var rect = e.target.getBoundingClientRect();
    //       x = e.clientX - rect.left;
    //       y = e.clientY - rect.top;

    //       console.log(x,y);
    //       draw();
    //   }
   	// function draw() {
    //       ctx.fillRect(x, y, 10, 10);

    //   }
    //   canvas.addEventListener('click', onClick, false);
}

