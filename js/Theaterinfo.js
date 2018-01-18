// topright裡面的canvas
var t = 1;
var context;
//線段的點座標點
var vertices = [];
//路徑點(很細的點)
var waypoints = [];
function doFirst(){
	//先跟HTML畫面產生關聯(尋找物件)，再建事件聆聽的功能
	var canvas = document.getElementById('canvas');
	context = canvas.getContext('2d');
	(function () {
		var lastTime = 0;
		var vendors = ['ms', 'moz', 'webkit', 'o'];
		for (var x = 0; x < vendors.length && !window.requestAnimationFrame; ++x) {
			window.requestAnimationFrame = window[vendors[x] + 'RequestAnimationFrame'];
			window.cancelAnimationFrame = window[vendors[x] + 'CancelAnimationFrame'] || window[vendors[x] + 'CancelRequestAnimationFrame'];
		}

		if (!window.requestAnimationFrame) window.requestAnimationFrame = function (callback, element) {
			var currTime = new Date().getTime();
			var timeToCall = Math.max(0, 16 - (currTime - lastTime));
			var id = window.setTimeout(function () {
				callback(currTime + timeToCall);
			},
			timeToCall);
			lastTime = currTime + timeToCall;
			return id;
		};

		if (!window.cancelAnimationFrame) window.cancelAnimationFrame = function (id) {
			clearTimeout(id);
		};
	}());
	context.strokeStyle = '#35ffba';
	context.lineWidth = 5;


	// define the path to plot

	vertices.push({
		x: 15,
		y: 20
	});
	vertices.push({
		x: 200,
		y: 20
	});
	vertices.push({
		x: 250,
		y: 80
	});
	vertices.push({
		x: 250,
		y: 300
	});
  //算出寬度左右連續的點
  //算出兩端點中間的所有點
  //100--->線段之間要切100點
  //切越多，線越細，越慢
    for (var i = 1; i < vertices.length; i++) {
        var pt0 = vertices[i - 1];
        var pt1 = vertices[i];
        var dx = pt1.x - pt0.x;
        var dy = pt1.y - pt0.y;
        for (var j = 0; j < 25; j++) {
            var x = pt0.x + dx * j / 25;
            var y = pt0.y + dy * j / 25;
            waypoints.push({
                x: x,
                y: y
            });
        }
    }
	context.beginPath();
	animate();
}
//連續畫線
//t - 1前一點，t目前點
function animate() {
    if (t < waypoints.length - 1) {
        requestAnimationFrame(animate);
    }
    // draw a line segment from the last waypoint
    // to the current waypoint
    //context.beginPath();
    context.lineTo(waypoints[t - 1].x, waypoints[t - 1].y);
    context.lineTo(waypoints[t].x, waypoints[t].y);
    context.stroke();
    // increment "t" to get the next waypoint
    t++;
}
window.addEventListener('load',doFirst);

//小導覽列切換
$(document).ready(function(){
	$('.Recycle_arrows').click(function(){ 
    // 按下循環按鈕後，"購買票劵"直接移上來，"節目介紹"往下移
		$('.sq-one').toggleClass("move");
		$('.sq-two').toggleClass("move");
    //延遲一秒後才會跳到Theaterbuyticket.html
		setTimeout(function(){
			window.location.href = 'Theaterbuyticket.php';
		},300); 
	}); 
});

//太空人、星球動畫
$(document).ready(function(){
    setTimeout(function(){
      $('.planet').animate({
            left: '10%'
          },1500);
      $('.spaceman').animate({
            left: '20%'
          },1500);
      $('.programonetitle').animate({
            left: '1%'
          },1500);
      $('.programonecontent').animate({
            left: '3%'
          },1500);
    },250);  
});

// programoneline 和 programtwospan、spaceship 的變化
$(document).ready(function(){
    $(document).scroll(function(){
        var scroll_value = $(document).scrollTop();
        // programoneline、programoneline2

        if (scroll_value>120) {
          $('#programoneline').css({
            width:'5',
            height: '60%'
          },1000)
        }
        if (scroll_value>120) {
           $('#programoneline2').css({
             width:'5',
             height: '60%'
          }, 1000)
        }

        // spaceship
        //手機版不執行動畫
        const mq = window.matchMedia("(max-width:414px)");

        if(mq.matches){
          //window width is less than 414 px
        }else{
          //window  width is at least  414 px
            if (scroll_value>140) {
            $('.spaceship').animate({
              left: '-30%'
            },1500)
          }
        }
        

        //programtwotitle
        if (scroll_value>140) {
          $('.programtwotitle').animate({
            left: '2%'
          },1500)
        }

        //programtwocontent
          if (scroll_value>160) {
            $('.programtwocontent').animate({
              left: '8%'
           },1500)
        }

        // programtwospan
        if (scroll_value>490) {
         $('.programtwospan').css({
            width:'5',
            height: '353%'
           }, 500)
         }
        if (scroll_value>490) {
         $('.programtwospan2').css({
            width:'5',
            height: '346%'
           }, 500)
         }
         if (scroll_value>500) {
         $('.programtwoHr').animate({
            right: '41%'
           }, 500)
         }
         if (scroll_value>500) {
         $('.programtwoHr2').animate({
            right: '34%'
           }, 500)
         }
         if (scroll_value>500) {
         $('.programtwoimg').animate({
            left: '18%'
           }, 1000)
         }
    });
});