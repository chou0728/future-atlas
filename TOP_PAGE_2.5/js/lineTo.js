function doFirst(){
	var canvas = document.getElementById('canvas1');
	var context = canvas.getContext('2d');

//將圓心位移到畫布中間 var r for 半徑
	var r = 200;
	context.translate(r,r);
	context.strokeStyle = 'deeppink';
	context.lineWidth = 2;
	var r = 40;//控制星型內凹程度, 越大越不凹
	var r2 = r/1.4142135623730950488;

//放射狀線段 var c for central
	context.strokeStyle = 'blue';
	var c = 200;//控制星型尺寸
	var c2 = c*1.4142135623730950488;
	// context.rotate(22.5*Math.PI/180);//旋轉22.5度

	context.beginPath();
	context.moveTo(0,-c2/1.5);
	context.lineTo(r2,-r2);
	context.lineTo(c2/1.5,0);
	context.lineTo(r2,r2);
	context.lineTo(0,c2);
	context.lineTo(-r2,r2);
	context.lineTo(-c2/1.5,0);
	context.lineTo(-r2,-r2);
	context.lineTo(0,-c2/1.5);
	context.stroke();
	context.fillStyle="lightblue";
	context.fill() //模仿FA logo

// ============================================================

	var canvas = document.getElementById('canvas2');
	var context = canvas.getContext('2d');

//將圓心位移到畫布中間 var r for 半徑
	var r = 200;
	context.translate(r,r);
	context.strokeStyle = 'deeppink';
	context.lineWidth = 2;
	var r = 40;//控制星型內凹程度, 越大越不凹
	var r2 = r/1.4142135623730950488;

//放射狀線段 var c for central
	context.strokeStyle = 'blue';
	var c = 200;//控制星型尺寸
	var c2 = c*1.4142135623730950488;
	// context.rotate(22.5*Math.PI/180);//旋轉22.5度

	context.beginPath();
	context.moveTo(0,-c2/1.5);
	context.lineTo(r2,-r2);
	context.lineTo(c2/1.5,0);
	context.lineTo(r2,r2);
	context.lineTo(0,c2);
	context.lineTo(-r2,r2);
	context.lineTo(-c2/1.5,0);
	context.lineTo(-r2,-r2);
	context.lineTo(0,-c2/1.5);
	context.stroke();
	context.fillStyle="lightblue";
	context.fill() //模仿FA logo
}
window.addEventListener('load',doFirst);