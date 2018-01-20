var today = new Date();
var todayYear = today.getFullYear();
var todayMonth = today.toString().substr(4,3);
var todayMonthIndex = today.getMonth();
var firstDayofMonth = new Date(todayYear,todayMonthIndex).getDay();
var daysofMonth = new Date(todayYear,todayMonthIndex+1,0).toString().substr(8,2);// 本月有幾天
var iMonth = 0;

// 初始化月曆
window.addEventListener("load", iniCal);
function iniCal(){
	document.getElementById("showToday").innerText = todayYear+"/"+(todayMonthIndex+1)+"/"+today.toString().substr(8,2);
	document.getElementById("showMonth").innerText = todayMonth.toUpperCase()+" "+todayYear;
	document.getElementsByTagName("i")[2].style.visibility = "hidden";
	for(i = 0; i < daysofMonth ; i++){
		document.getElementsByClassName("claContent")[firstDayofMonth+i].style.opacity = "1";
		// 小於10的日期，前面加"0"
		var date = " ";
		if( i < 9 ){
			date = "0";
			document.getElementsByClassName("daysHere")[firstDayofMonth+i].innerText = date+(i+1).toString();
		}else{
			document.getElementsByClassName("daysHere")[firstDayofMonth+i].innerText = i+1;
		}
		document.getElementsByClassName("daysHere")[firstDayofMonth+i].style.transform = "rotate3d(0,1,0,720deg)";
		var textShadow = document.createElement("span");
		textShadow.className = "textShadow";
		document.getElementsByClassName("daysHere")[firstDayofMonth+i].appendChild(textShadow);
	}
	// 今日強調顯示
	document.getElementsByClassName("daysHere")[today.getDate()+firstDayofMonth-1].style.backgroundColor = "#ccffff";
	document.getElementsByClassName("daysHere")[today.getDate()+firstDayofMonth-1].style.color = "orange";
}

// 回到今日：用getMonth()和getFullYear()方法，將年月資料初始化
document.getElementById("backToToday").addEventListener("click", backToToday);
function backToToday(){
	iMonth = 0;
	document.getElementsByTagName("i")[0].style.visibility = "hidden";
	document.getElementsByTagName("i")[1].style.visibility = "visible";
	todayMonthIndex = today.getMonth();
	todayYear = today.getFullYear();
	document.getElementById("showMonth").innerText = todayMonth.toUpperCase()+" "+todayYear;
	for(i = 0 ; i < 40 ; i++){
		document.getElementsByClassName("daysHere")[i].innerText = " ";
		document.getElementsByClassName("daysHere")[i].style.backgroundColor = "transparent";
		document.getElementsByClassName("claContent")[i].innerText = " ";
		document.getElementsByClassName("claContent")[firstDayofMonth+i].style.opacity = "0";
		document.getElementsByClassName("daysHere")[i].style.backgroundColor = "transparent";
	}
	for(i = 0; i < daysofMonth ; i++){
		// 小於10的日期，前面加"0"
		var date = " ";
		if( i < 9 ){
			date = "0";
			document.getElementsByClassName("daysHere")[firstDayofMonth+i].innerText = date+(i+1).toString();
		}else{
			document.getElementsByClassName("daysHere")[firstDayofMonth+i].innerText = i+1;
		}
		document.getElementsByClassName("claContent")[firstDayofMonth+i].style.opacity = "1";
	}
	document.getElementsByClassName("daysHere")[today.getDate()+firstDayofMonth-1].style.backgroundColor = "#ff6600";
}

// 前一個月
document.getElementsByTagName("i")[2].addEventListener("click",prevMonth);
function prevMonth(){
	// 更新月曆
	iMonth--;
	if( iMonth == 0){
		document.getElementsByTagName("i")[2].style.visibility = "hidden";
	}if( iMonth <= 3){
		document.getElementsByTagName("i")[3].style.visibility = "visible";
	}
	todayMonthIndex--;// 新月份的index
	var newdaysofMonth = parseInt(new Date(todayYear,todayMonthIndex+1,0).toString().substr(8,2));// 新月份的天數
	var newfirstDayofMonth = new Date(todayYear,todayMonthIndex).getDay();// 新月份第一天是星期幾
	for(i = 0 ; i < 40 ; i++){
		document.getElementsByClassName("daysHere")[i].innerText = " ";
		document.getElementsByClassName("daysHere")[i].style.backgroundColor = "transparent";
		document.getElementsByClassName("claContent")[i].innerText = " ";
		document.getElementsByClassName("claContent")[firstDayofMonth+i].style.opacity = "0";
	}

	for(i = 0 ; i < newdaysofMonth ; i++){
		var date = " ";// 小於10的日期，前面加"0"
		if( i < 9){
			var date = "0";
			document.getElementsByClassName("daysHere")[newfirstDayofMonth+i].innerText = date+(i+1).toString();
		}else{
			document.getElementsByClassName("daysHere")[newfirstDayofMonth+i].innerText = i+1;
		}
		document.getElementsByClassName("claContent")[firstDayofMonth+i].style.opacity = "1";
	}
	// 更新#showMonth
	document.getElementById("showMonth").innerText = new Date(todayYear,todayMonthIndex).toString().substr(4,11).toUpperCase().replace(" 01 "," ");
}


// 下一個月
document.getElementsByTagName("i")[3].addEventListener("click",nextMonth);
function nextMonth(){
// 更新月曆
	iMonth++;
	if( iMonth > 0){
		document.getElementsByTagName("i")[2].style.visibility = "visible";
	}if( iMonth == 3){
		// 只能查看三個月後的活動資訊
		document.getElementsByTagName("i")[3].style.visibility = "hidden";
	}
	todayMonthIndex++;// 新月份的index
	var newdaysofMonth = parseInt(new Date(todayYear,todayMonthIndex+1,0).toString().substr(8,2));// 新月份的天數
	var newfirstDayofMonth = new Date(todayYear,todayMonthIndex).getDay();// 新月份第一天是星期幾
	for(i = 0 ; i < 40 ; i++){
		document.getElementsByClassName("daysHere")[i].innerText = " ";
		document.getElementsByClassName("daysHere")[i].style.backgroundColor = "transparent";
		document.getElementsByClassName("claContent")[i].innerText = " ";
		document.getElementsByClassName("claContent")[i].style.opacity = 0;
	}
	for(i = 0 ; i < newdaysofMonth ; i++){
		var date = " ";
		if( i < 9){// 小於10的日期，前面加"0"
			var date = "0";
			document.getElementsByClassName("daysHere")[newfirstDayofMonth+i].innerText = date+(i+1).toString();
		}else{
			document.getElementsByClassName("daysHere")[newfirstDayofMonth+i].innerText = i+1;
		}
		document.getElementsByClassName("claContent")[firstDayofMonth+i].style.opacity = 1;
	}
	// 更新#showMonth
	document.getElementById("showMonth").innerText = new Date(todayYear,todayMonthIndex).toString().substr(4,11).toUpperCase().replace(" 01 "," ");
}

// 依照日期查看園區活動一覽: 日期
$(document).ready(function(){
	$(".daysHere").click(function(){
		var showDate = $(this).text();
		if( !showDate ){
			showDate = "今日";
		}else{
			var showDate = parseInt(todayMonthIndex%12+1)+"/"+$(this).text()+" ";
		}
		$("#activityDate").text(showDate);
		// 依照日期查看園區活動一覽: 星期
		var day = ["(日)","(一)","(二)","(三)","(四)","(五)","(六)"];
		$("#activityDay").text(day[$(this).index()/2]);
	});
});

// 切換活動月曆模式
$(document).ready(function(){
	$("#icon1").click(function(){
		$(".sun").html("<img src='img/activity/theater.png' style='width: 25px; height:25px'>");
		$(".mon").html("");
		$(".tue").html("<img src='img/activity/theater.png' style='width: 25px; height:25px'>");
		$(".wed").html("<img src='img/activity/theater.png' style='width: 25px; height:25px'>");
		$(".thu").html("");
		$(".fri").html("<img src='img/activity/theater.png' style='width: 25px; height:25px'>");
		$(".sat").html("<img src='img/activity/theater.png' style='width: 25px; height:25px'>");
	});
	$("#icon2").click(function(){
		$(".sun").html("");
		$(".mon").html("<img src='img/activity/outoforder.png' style='width: 25px; height:25px'>");
		$(".tue").html("");
		$(".wed").html("");
		$(".thu").html("");
		$(".fri").html("");
		$(".sat").html("");
	});
	$("#icon3").click(function(){
		$(".sun").html("9-22");
		$(".mon").html("休園");
		$(".tue").html("10-22");
		$(".wed").html("10-22");
		$(".thu").html("10-22");
		$(".fri").html("10-24");
		$(".sat").html("9-24");
	});
	$("#icon4").click(function(){
		$(".sun").html("<img src='img/activity/lecture.png' style='width: 25px; height:25px'>");
		$(".mon").html("");
		$(".tue").html("<img src='img/activity/lecture.png' style='width: 25px; height:25px'>");
		$(".wed").html("");
		$(".thu").html("<img src='img/activity/lecture.png' style='width: 25px; height:25px'>");
		$(".fri").html("<img src='img/activity/lecture.png' style='width: 25px; height:25px'>");
		$(".sat").html("<img src='img/activity/lecture.png' style='width: 25px; height:25px'>");
	});
});

// 於月曆&活動之間滾動
$(document).ready(function(){
	$("#toCal").click(function(){
		$("html,body").animate({scrollTop:$("#calWrapper").offset().top}, 400);
	});
	$("#toActivity").click(function(){
		$("html,body").animate({scrollTop:$("#activityDay").offset().top}, 400);
	});
});