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
	document.getElementById("showMonth").innerText = todayMonth+" "+todayYear;
	document.getElementsByTagName("i")[0].style.visibility = "hidden";
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
		document.getElementsByClassName("daysHere")[firstDayofMonth+i].style.transform = "rotate3d(0,1,0,360deg)";
		var textShadow = document.createElement("span");
		textShadow.className = "textShadow";
		document.getElementsByClassName("daysHere")[firstDayofMonth+i].appendChild(textShadow);
	}
	// 今日強調顯示
	document.getElementsByClassName("daysHere")[today.getDate()+firstDayofMonth-1].style.backgroundColor = "#ccffff";
}

// 回到今日：用getMonth()和getFullYear()方法，將年月資料初始化
document.getElementById("backToToday").addEventListener("click", backToToday);
function backToToday(){
	iMonth = 0;
	document.getElementsByTagName("i")[0].style.visibility = "hidden";
	document.getElementsByTagName("i")[1].style.visibility = "visible";
	todayMonthIndex = today.getMonth();
	todayYear = today.getFullYear();
	document.getElementById("showMonth").innerText = todayMonth+" "+todayYear;
	for(i = 0 ; i < 40 ; i++){
		document.getElementsByClassName("claContent")[i].innerText = " ";
		document.getElementsByClassName("claContent")[i].style.opacity = "0";
	}
	for(i = 0; i < daysofMonth ; i++){
		document.getElementsByClassName("daysHere")[firstDayofMonth+i].innerText = i+1;
		document.getElementsByClassName("claContent")[firstDayofMonth+i].innerText = " ";
		document.getElementsByClassName("claContent")[firstDayofMonth+i].style.opacity = "1";
	}
	document.getElementsByClassName("daysHere")[today.getDate()+firstDayofMonth-1].style.backgroundColor = "#ccffff";
	document.getElementsByClassName("daysHere")[today.getDate()+firstDayofMonth-1].style.color = "orange";
}

// 前一個月
document.getElementsByTagName("i")[0].addEventListener("click",prevMonth);
function prevMonth(){
	// 更新月曆
	iMonth--;
	if( iMonth == 0){
		document.getElementsByTagName("i")[0].style.visibility = "hidden";
	}if( iMonth <= 3){
		document.getElementsByTagName("i")[1].style.visibility = "visible";
	}
	todayMonthIndex--;// 新月份的index
	var newdaysofMonth = parseInt(new Date(todayYear,todayMonthIndex+1,0).toString().substr(8,2));// 新月份的天數
	var newfirstDayofMonth = new Date(todayYear,todayMonthIndex).getDay();// 新月份第一天是星期幾
	for(i = 0 ; i < 40 ; i++){
		document.getElementsByClassName("daysHere")[i].innerText = " ";
		document.getElementsByClassName("daysHere")[i].style.backgroundColor = "transparent";
		document.getElementsByClassName("claContent")[i].innerText = " ";
		document.getElementsByClassName("claContent")[i].style.opacity = "0";
	}
	for(i = 0 ; i < newdaysofMonth ; i++){
		document.getElementsByClassName("daysHere")[newfirstDayofMonth+i].innerText = i+1;
		document.getElementsByClassName("claContent")[newfirstDayofMonth+i].style.opacity = "1";
	}
	// 更新#showMonth
	document.getElementById("showMonth").innerText = new Date(todayYear,todayMonthIndex).toString().substr(4,11).replace(" 01 "," ");
}


// 下一個月
document.getElementsByTagName("i")[1].addEventListener("click",nextMonth);
function nextMonth(){
// 更新月曆
	iMonth++;
	if( iMonth > 0){
		document.getElementsByTagName("i")[0].style.visibility = "visible";
	}if( iMonth == 3){
		// 只能查看三個月後的活動資訊
		document.getElementsByTagName("i")[1].style.visibility = "hidden";
	}
	todayMonthIndex++;// 新月份的index
	var newdaysofMonth = parseInt(new Date(todayYear,todayMonthIndex+1,0).toString().substr(8,2));// 新月份的天數
	var newfirstDayofMonth = new Date(todayYear,todayMonthIndex).getDay();// 新月份第一天是星期幾
	for(i = 0 ; i < 40 ; i++){
		document.getElementsByClassName("daysHere")[i].innerText = " ";
		document.getElementsByClassName("daysHere")[i].style.backgroundColor = "transparent";
		document.getElementsByClassName("claContent")[i].innerText = " ";
		document.getElementsByClassName("claContent")[i].style.opacity = "0";
	}
	for(i = 0 ; i < newdaysofMonth ; i++){
		document.getElementsByClassName("daysHere")[newfirstDayofMonth+i].innerText = i+1;
		document.getElementsByClassName("claContent")[newfirstDayofMonth+i].style.opacity = "1";
	}
	// 更新#showMonth
	document.getElementById("showMonth").innerText = new Date(todayYear,todayMonthIndex).toString().substr(4,11).replace(" 01 "," ");
}

// 依照日期園區活動一覽
$(document).ready(function(){
	$(".daysHere").click(function(){
		var showDate = $(this).text();
		if( !showDate){
			showDate = "今日";
		}else{
			var showDate = parseInt(todayMonthIndex%12+1)+"/"+$(this).text();
		}
		$("#activityDate").text(showDate);
	});
});
$(document).ready(function(){
	$("#backToToday").click(function(){
		$("#activityDate").text("今日");
	});
});

// 依照日期園區活動一覽
$(document).ready(function(){
	$(".daysHere").click(function(){
		var showDate = $(this).text();
		if( !showDate){
			showDate = "今日";
		}else{
			var showDate = parseInt(todayMonthIndex%12+1)+"/"+$(this).text();
		}
		$("#activityDate").text(showDate);
		// 依照日期查看園區活動一覽: 星期
		var day = ["(日)","(一)","(二)","(三)","(四)","(五)","(六)"];
	$("#activityDay").text(day[$(this).index()/2]);
	});
	$("#backToToday").click(function(){
		$("#activityDate").text("今日");
		$("#activityDay").text("");
	});
});

// 切換活動月曆模式
$(document).ready(function(){
	$("#icon1").click(function(){
		$(".sun").html("<img src='img/forthSection/theater.png' style='width: 25px'>");
		$(".mon").html("");
		$(".tue").html("<img src='img/forthSection/theater.png' style='width: 25px'>");
		$(".wed").html("<img src='img/forthSection/theater.png' style='width: 25px'>");
		$(".thu").html("");
		$(".fri").html("<img src='img/forthSection/theater.png' style='width: 25px'>");
		$(".sat").html("<img src='img/forthSection/theater.png' style='width: 25px'>");
	});
	$("#icon2").click(function(){
		$(".sun").html("");
		$(".mon").html("<img src='img/forthSection/outoforder.png' style='width: 25px'>");
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
		$(".sun").html("<img src='img/forthSection/lecture.png' style='width: 25px'>");
		$(".mon").html("");
		$(".tue").html("<img src='img/forthSection/lecture.png' style='width: 25px'>");
		$(".wed").html("");
		$(".thu").html("<img src='img/forthSection/lecture.png' style='width: 25px'>");
		$(".fri").html("<img src='img/forthSection/lecture.png' style='width: 25px'>");
		$(".sat").html("<img src='img/forthSection/lecture.png' style='width: 25px'>");
	});
	$("#clearCal").click(function(){
		$(".claContent").html("");
	});
});
//calendar---------------------------------------------------
	//calendar---------------------------------------------------
		$(window).on('load', function() {ajaxCallJsonP("http://api.openweathermap.org/data/2.5/forecast?","6696918");});

		function ajaxCallJsonP(url, cityID){
		    var data=$.getJSON(url,{
		        id:cityID,
		        lang:"zh_TW",
		        APPID:"9f77563bbcf008306ba9d8e72b57e524",
		        units:"metric"
		    });
		    data.success(
		            function(msg){
		                $("#result1").append("<h6>"+msg.list[3].main.temp.toFixed(1)+"°C&nbsp&nbsp"+msg.list[3].weather[0].description+"</h6><br><img src='http:openweathermap.org/img/w/"+msg.list[3].weather[0].icon+".png'>");
		                $("#result2").append("<h6>"+msg.list[4].main.temp.toFixed(1)+"°C&nbsp&nbsp"+msg.list[4].weather[0].description+"</h6><br><img src='http:openweathermap.org/img/w/"+msg.list[4].weather[0].icon+".png'>");
		                $("#result3").append("<h6>"+msg.list[5].main.temp.toFixed(1)+"°C&nbsp&nbsp"+msg.list[5].weather[0].description+"</h6><br><img src='http:openweathermap.org/img/w/"+msg.list[5].weather[0].icon+".png'>");
		                $("#result4").append("<h6>"+msg.list[6].main.temp.toFixed(1)+"°C&nbsp&nbsp"+msg.list[6].weather[0].description+"</h6><br><img src='http:openweathermap.org/img/w/"+msg.list[6].weather[0].icon+".png'>");
		                $("#result5").append("<h6>"+msg.list[7].main.temp.toFixed(1)+"°C&nbsp&nbsp"+msg.list[7].weather[0].description+"</h6><br><img src='http:openweathermap.org/img/w/"+msg.list[7].weather[0].icon+".png'>");
		                $("#result1").css("width","250px");
						$("#result2").css("width","250px");
						$("#result3").css("width","250px");
						$("#result4").css("width","250px");
						$("#result5").css("width","250px");
		            }
		        );
		    data.error(
		            function(msg){
		                console.log(msg);
		            }
		        );
		}
