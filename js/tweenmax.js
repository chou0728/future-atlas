$(function () {


    TweenMax.fromTo(".title",2, {
        y: -10,
        opacity: 0
    },{
        y: 0,
        opacity: 0.8,
        ease: Sine.easeOut,
        className : '+=plus'
    })

     TweenMax.fromTo(".sub",3, {
        x: -50,
        opacity: 0
    },{
        x: 0,
        opacity: 1,
        ease: Sine.easeOut
    })

      TweenMax.fromTo(".rocket",4, {
        x: 0,
        y: 0,
        opacity: 0.8,
        delay:1
    },{
        x: 1200,
        y: -1200,
        opacity: 1,
        ease: SlowMo.ease.config(0.7, 0.2, false)
    })
//--------
      
      TweenMax.to(".img1", 2, 
    {

        rotationZ: 360,
        transformOrigin : "42% 56%",
        repeat:-1,
        ease: Power0.easeNone
    
    })

        TweenMax.to(".img2", 4, 
    {

        rotationZ: 360,
        transformOrigin : "63% 35%",
        repeat:-1,
        ease: Power0.easeNone
    
    })

//-------


    //   TweenMax.staggerFromTo(".box", 1, {
    //     x: -10,
    //     y: -20,
    //     opacity: 0
    // }, {
    //     x: 0,
    //     y:0,
    //     opacity: 1,
    //     scale : 1,
    //     repeat : -1, 
    //     // rotationX  : 360,
    //     // rotationY : 360,
    //     ease: Back.easeOut.config(1.7)
    // } ,0.8);



})



// $(function(){

// //先建立場景 
// var controller = new ScrollMagic.Controller();

// //設計一段動畫
//     var tween01 = TweenMax.to(".block2", 1, {
//         bezier: {
//             curviness: 1.25,
//             values: [{
//                 x: 0,
//                 y: 39
//             }, {
//                 x: -25,
//                 y: 559
//             }, {
//                 x: 340,
//                 y: 50
//             }, {
//                 x: 360,
//                 y: 150
//             },  {
//                 x: -600,
//                 y: -150
//             },  {
//                 x: -200,
//                 y: -20
//             }, {
//                 x: 0,
//                 y: 0
//             }],
//             //  autoRotate:true
//         }
//     });

    
// //scroll 處發點

//     var scene = new ScrollMagic.Scene({
//             triggerElement: "#trigger1", //觸發點id
//         })
//         .setTween(tween01) // 找到動畫事件
//         .addIndicators() // 觸發點指標
//         .addTo(controller) //最後加到場景裡面



// //設計一段動畫02
//    var tween02 = TweenMax.to(".block1", 1, {
//         x:0,
//         y:950,
//         opacity: 1,
//         // rotationX : 360,
//         // rotationY : 360,
//     });
// //scroll 處發點

//     var scene2 = new ScrollMagic.Scene({
//             triggerElement: "#trigger2", //觸發點id
//             offset : '50px',
//             duration: '600', //移動距離
//             reverse: true // 是否返回 預設是true  false 不返回

//         })
//         .setTween(tween02) // 找到動畫事件
//         .addIndicators() // 觸發點指標
//         .addTo(controller) //最後加到場景裡面



// });





var canvas = document.getElementById("canvas").appendChild( document.createElement( 'canvas' ) ),
    context = canvas.getContext( '2d' );
context.globalCompositeOperation = 'lighter';
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;
draw();

var textStrip = ['F', 'U', 'T', 'U', 'R', 'E', 'A', 'T', 'L', 'A', 'S', 'G', '3'];

var stripCount = 60, stripX = new Array(), stripY = new Array(), dY = new Array(), stripFontSize = new Array();

for (var i = 0; i < stripCount; i++) {
    stripX[i] = Math.floor(Math.random()*1265);
    stripY[i] = -100;
    dY[i] = Math.floor(Math.random()*7)+3;
    stripFontSize[i] = Math.floor(Math.random()*16)+8;
}

var theColors = ['#00ccff', '#0099cc', '#80dfff', '#99ccff', '#3399ff', ' #e6faff'];

var elem, context, timer;

function drawStrip(x, y) {
    for (var k = 0; k <= 20; k++) {
        var randChar = textStrip[Math.floor(Math.random()*textStrip.length)];
        if (context.fillText) {
            switch (k) {
            case 0:
                context.fillStyle = theColors[0]; break;
            case 1:
                context.fillStyle = theColors[1]; break;
            case 3:
                context.fillStyle = theColors[2]; break;
            case 7:
                context.fillStyle = theColors[3]; break;
            case 13:
                context.fillStyle = theColors[4]; break;
            case 17:
                context.fillStyle = theColors[5]; break;
            }
            context.fillText(randChar, x, y);
        }
        y -= stripFontSize[k];
    }
}

function draw() {
    // clear the canvas and set the properties
    context.clearRect(0, 0, canvas.width, canvas.height);
    context.shadowOffsetX = context.shadowOffsetY = 0;
    context.shadowBlur = 8;
    context.shadowColor = '#94f475';
    
    for (var j = 0; j < stripCount; j++) {
        context.font = stripFontSize[j]+'px MatrixCode';
        context.textBaseline = 'top';
        context.textAlign = 'center';
        
        if (stripY[j] > 1358) {
            stripX[j] = Math.floor(Math.random()*canvas.width);
            stripY[j] = -100;
            dY[j] = Math.floor(Math.random()*7)+3;
            stripFontSize[j] = Math.floor(Math.random()*17)+8;
            drawStrip(stripX[j], stripY[j]);
        } else drawStrip(stripX[j], stripY[j]);
        
        stripY[j] += dY[j];
    }
  setTimeout(draw, 70);
}

  //找到場景
    var scene = document.getElementById('parallax_box');
     //把滾動視差加入場景
    var parallax = new Parallax(scene);

