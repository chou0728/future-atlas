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
	context.lineWidth = 10;


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
        for (var j = 0; j < 100; j++) {
            var x = pt0.x + dx * j / 100;
            var y = pt0.y + dy * j / 100;
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
			window.location.href = 'Theaterbuyticket.html';
		},500); 
	}); 
});

// programoneline 和 programtwospan、spaceship 的變化
$(document).ready(function(){
    $(document).scroll(function(){
        var scroll_value = $(document).scrollTop();
        // programoneline
        if (scroll_value>40) {
          $('#programoneline').css({
            height: '15%'
          },1000)
        }

        if (scroll_value>80) {
          $('#programoneline').css({
            height: '20%'
          }, 1000)
        }
        if (scroll_value>100) {
          $('#programoneline').css({
            height: '30%'
          }, 1500)
        }
        if (scroll_value>110) {
          $('#programoneline').css({
            height: '40%'
          }, 1500)
        }
        if (scroll_value>120) {
          $('#programoneline').css({
            height: '60%'
          },2000)
        }

        // spaceship
         if (scroll_value>140) {
          $('#spaceship').animate({
          	left: '-20%'
          },1500)
        }

        // programtwospan
        if (scroll_value>490) {
          $('#programtwospan').css({
            height: '30%'
          }, 500)
        }
        if (scroll_value>520) {
          $('#programtwospan').css({
            height: '50%'
          }, 500)
        }
        if (scroll_value>540) {
          $('#programtwospan').css({
            height: '70%'
          }, 500)
        }
        if (scroll_value>580) {
          $('#programtwospan').css({
            height: '180%'
          }, 500)
        }
        if (scroll_value>640) {
          $('#programtwospan').css({
            height: '300%'
          }, 500)
        }
    });
});