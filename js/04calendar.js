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
	document.getElementsByTagName("i")[0].style.opacity = "0.3";
	document.getElementsByTagName("i")[0].style.cursor = "default";
	document.getElementsByTagName("i")[0].removeEventListener("click",prevMonth);
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
	}
	// 今日強調顯示
	document.getElementsByClassName("daysHere")[today.getDate()+firstDayofMonth-1].style.color = "#ccffff";
	document.getElementsByClassName("daysHere")[today.getDate()+firstDayofMonth-1].style.textShadow = "1px 1px 5px orange";
	document.getElementsByClassName("daysHere")[today.getDate()+firstDayofMonth-1].style.backgroundColor = "#44A0D9";
}

// 回到今日：用getMonth()和getFullYear()方法，將年月資料初始化
document.getElementById("backToToday").addEventListener("click", backToToday);
function backToToday(){
	iMonth = 0;
	document.getElementsByTagName("i")[0].style.opacity = "0.3";
	document.getElementsByTagName("i")[0].style.cursor = "default";
	document.getElementsByTagName("i")[0].addEventListener("click",prevMonth);
	document.getElementsByTagName("i")[1].style.opacity = "1";
	todayMonthIndex = today.getMonth();
	todayYear = today.getFullYear();
	document.getElementById("showMonth").innerText = todayMonth+" "+todayYear;
	for(i = 0 ; i < 40 ; i++){
		document.getElementsByClassName("claContent")[i].innerText = " ";
		document.getElementsByClassName("claContent")[i].style.opacity = "0";
		document.getElementsByClassName("daysHere")[i].style.color = "orange";
		document.getElementsByClassName("daysHere")[i].style.textShadow = "none";
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
		document.getElementsByTagName("i")[0].style.opacity = "0.3";
		document.getElementsByTagName("i")[0].style.cursor = "default";
		document.getElementsByTagName("i")[0].removeEventListener("click",prevMonth);
	}if( iMonth <= 3){
		document.getElementsByTagName("i")[1].style.opacity = "1";
		document.getElementsByTagName("i")[1].style.cursor = "pointer";
		document.getElementsByTagName("i")[1].addEventListener("click",nextMonth);
	}
	todayMonthIndex--;// 新月份的index
	var newdaysofMonth = parseInt(new Date(todayYear,todayMonthIndex+1,0).toString().substr(8,2));// 新月份的天數
	var newfirstDayofMonth = new Date(todayYear,todayMonthIndex).getDay();// 新月份第一天是星期幾
	for(i = 0 ; i < 40 ; i++){
		document.getElementsByClassName("daysHere")[i].innerText = " ";
		document.getElementsByClassName("daysHere")[i].style.backgroundColor = "transparent";
		document.getElementsByClassName("daysHere")[i].style.color = "navy";
		document.getElementsByClassName("daysHere")[i].style.textShadow = "none";
		document.getElementsByClassName("claContent")[i].innerText = " ";
		document.getElementsByClassName("claContent")[i].style.opacity = "0";
	}
	for(i = 0 ; i < newdaysofMonth ; i++){
		document.getElementsByClassName("daysHere")[newfirstDayofMonth+i].innerText = i+1;
		document.getElementsByClassName("claContent")[newfirstDayofMonth+i].style.opacity = "1";
		if( iMonth == 0){
			document.getElementsByClassName("daysHere")[today.getDate()+firstDayofMonth-1].style.color = "#ccffff";
			document.getElementsByClassName("daysHere")[today.getDate()+firstDayofMonth-1].style.textShadow = "1px 1px 5px orange";
			document.getElementsByClassName("daysHere")[today.getDate()+firstDayofMonth-1].style.backgroundColor = "#44A0D9";
		}
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
		document.getElementsByTagName("i")[0].style.opacity = "1";
		document.getElementsByTagName("i")[0].style.cursor = "pointer";
		document.getElementsByTagName("i")[0].addEventListener("click",prevMonth);
	}if( iMonth == 3){
		// 只能查看三個月後的活動資訊
		document.getElementsByTagName("i")[1].style.opacity = "0.3";
		document.getElementsByTagName("i")[1].style.cursor = "default";
		document.getElementsByTagName("i")[1].removeEventListener("click",nextMonth);
	}
	todayMonthIndex++;// 新月份的index
	var newdaysofMonth = parseInt(new Date(todayYear,todayMonthIndex+1,0).toString().substr(8,2));// 新月份的天數
	var newfirstDayofMonth = new Date(todayYear,todayMonthIndex).getDay();// 新月份第一天是星期幾
	for(i = 0 ; i < 40 ; i++){
		document.getElementsByClassName("daysHere")[i].innerText = " ";
		document.getElementsByClassName("daysHere")[i].style.backgroundColor = "transparent";
		document.getElementsByClassName("daysHere")[i].style.color = "navy";
		document.getElementsByClassName("daysHere")[i].style.textShadow = "none";
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
		$("#showActivityWrapper").css("right","0");
		$("#cal").addClass("calFadeOut");
		var showDate = $(this).text();

		// 預備透過ajax抓取當日活動的param
		var d = new Date();
			if( d.getMonth() < 9){
				var month = "0"+(d.getMonth()+1);
			}
		var activity_date = parseInt($(this).text());
		show_activity(activity_date);
		console.log(activity_date);

		if( !showDate){
			showDate = "今日";
		}else{
			var showDate = parseInt(todayMonthIndex%12+1)+"/"+$(this).text();
		}
		$("#activityDate").text(showDate);
		// 依照日期查看園區活動一覽: 星期
		var day = ["(日)","(一)","(二)","(三)","(四)","(五)","(六)"];
	$("#activityDay").text(day[$(this).index()]);
	});
	$("#backToToday").click(function(){
		$("#activityDate").text("今日");
		$("#activityDay").text("");	
	});
	$("#activityClose").click(function(){
		$("#showActivityWrapper").css("right","-200%");
		$("#cal").removeClass("calFadeOut");
	});
});


window.addEventListener("load",getDate);
function getDate(){
	var d = new Date();
	show_activity(d.getDate());	
}

function show_activity(activity_date){
	var xhr = new XMLHttpRequest();
	xhr.onload = function(){
		if( xhr.readyState === 4 && xhr.status === 200){ //OK
    		// show活動內容
    		var activities = xhr.responseText.split("|");
    		var innerPage = activities[0]+activities[2]+activities[4];
    		var index 	  = activities[1]+activities[3]+activities[5];
    		$("#showRowUnitWrapper").html(innerPage);
    		$("#activity").html(index);
		}
	}
	var url = "show_activity.php?activity_date=" + activity_date;
	xhr.open("get",url, true);
	xhr.send(null);
}

// 自動輪播月曆模式
$(document).ready(function(){
	// 月曆預設於第一個模式
	autoIconLoop1();
	// 依序起跑
	setTimeout(function(){ icon1GO()}, 0);
	setTimeout(function(){ icon2GO()}, 5000);
	setTimeout(function(){ icon3GO()}, 10000);
	setTimeout(function(){ icon4GO()}, 15000);
	// 每20秒啟動一次，並設定定時器ID
	function icon1GO(){
		stop1 = setInterval(function(){ autoIconLoop1(); }, 20000);
	}
	function icon2GO(){
		stop2 = setInterval(function(){ autoIconLoop2(); }, 20000);
	}
	function icon3GO(){
		stop3 = setInterval(function(){ autoIconLoop3(); }, 20000);	
	}
	function icon4GO(){
		stop4 = setInterval(function(){ autoIconLoop4(); }, 20000);
	}

function autoIconLoop1(){
	$(".claContent").html("").css("font-size","16px");
	$(".sun").html("尋找星生命");
	$(".mon").html("末世決戰");
	$(".tue").html("");
	$(".wed").html("尋找星生命");
	$(".thu").html("");
	$(".fri").html("尋找星生命");
	$(".sat").html("末世決戰");
	$("#icon1").css("background-color","orange").fadeIn();
	$(".icons").not("#icon1").css("background-color","transparent");
};
function autoIconLoop2(){
	$(".claContent").html("").css("font-size","16px");
	$(".claContent:eq(5)").append("旋轉木馬");
	$(".claContent:eq(10)").append("VR體驗");
	$(".claContent:eq(15)").append("碰碰車");
	$(".claContent:eq(20)").append("摩天輪");
	$(".claContent:eq(25)").append("海盜船");
	$(".claContent:eq(30)").append("未來鐵道");
	$("#icon2").css("background-color","orange").fadeIn();
	$(".icons").not("#icon2").css("background-color","transparent");
};
function autoIconLoop3(){
	$(".claContent").html("").css("font-size","16px");
	$(".sun").html("9-22");
	$(".mon").html("10-22");
	$(".tue").html("休園");
	$(".wed").html("10-22");
	$(".thu").html("10-22");
	$(".fri").html("10-24");
	$(".sat").html("9-24");
	$("#icon3").css("background-color","orange").fadeIn();
	$(".icons").not("#icon3").css("background-color","transparent");
};
function autoIconLoop4(){
	$(".claContent").html("-").css("font-size","12px");
	for(var activity_date=1; activity_date<=31; activity_date++){
		var xhr = new XMLHttpRequest();
		xhr.onload = function(){
			if( xhr.readyState === 4 && xhr.status === 200){ //OK
    		// show活動內容
	    		for(var date=1;date<=31;date++){
	    			var index = date -1;
	    			$(".claContent").eq(date).html(xhr.responseText.split("|")[index]);
	    		}
			}
		}
		var url = "show_activity_on_calendar.php?activity_date=" + activity_date;
		xhr.open("get",url, true);
		xhr.send(null);
	}
	$("#icon4").css("background-color","orange").fadeIn();
	$(".icons").not("#icon4").css("background-color","transparent");
};

// 手動點選月曆模式時，停掉輪播
document.getElementById("icon1").onclick = manualIconShift1;
document.getElementById("icon2").onclick = manualIconShift2;
document.getElementById("icon3").onclick = manualIconShift3;
document.getElementById("icon4").onclick = manualIconShift4;

function manualIconShift1(){
	autoIconLoop1();
	stopShiftMode();
};
function manualIconShift2(){
	autoIconLoop2();
	stopShiftMode();
};
function manualIconShift3(){
	autoIconLoop3();
	stopShiftMode();
};
function manualIconShift4(){
	autoIconLoop4();
	stopShiftMode();
};
function stopShiftMode(){
	clearInterval(stop1);
	clearInterval(stop2);
	clearInterval(stop3);
	clearInterval(stop4);
};
});

//calendar---------------------------------------------------
	$(window).load(
	    function(){ajaxCallJsonP("http://api.openweathermap.org/data/2.5/weather?","6696918");}
	)
    function ajaxCallJsonP(url, cityID){
        console.log(url,cityID);
        var data=$.getJSON(url,{
            id:cityID,
            lang:"zh_TW",
            APPID:"9f77563bbcf008306ba9d8e72b57e524",
            units:"metric"
        });
        data.success(
                function(msg){
                    $("#result").append("<span id='temperature'>"+msg.main.temp.toFixed(1)+"°C</span>");
                    $("#result").append("<span id='weather'>"+msg.weather[0].description+"</span><br>");
                    $("#result").append($("<img style='width:70px; height:70px'>").attr("src","http://openweathermap.org/img/w/"+msg.weather[0].icon+".png"));
                    $("#result").append("<br><span id='source'>即時氣象來源：openweathermap.org</span>")
                }
            );
        data.error(
                function(msg){
                }
            );
    }
