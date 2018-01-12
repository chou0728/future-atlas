//儲存到sessionStorage
var storage = sessionStorage;

//用節目名稱來分日期
//抓取日期
var programName = "尋找星生命";
// document.getElementById("quantity").onchange = function() {myFunction()};
$(document).ready(function(){
	var today = new Date();
	var todayMonth = today.getMonth()+1; //幾月
	var todayYear = today.getFullYear();  //西元
	var todayDay = today.getDay();  //幾號
	var print = parseInt(today.toString().substr(8,2));
	var day = ["(日)","(一)","(二)","(三)","(四)","(五)","(六)"];

	for(var i = 1 ; i <= 14 ; i++){
		if( todayMonth == 1 && (print+i) > 31){
			print -= 31;
			todayMonth++;
		}
		if( todayYear%4 != 0 && todayMonth == 2 && (print+i) > 28){
			print -= 28;
			todayMonth++;
		}
		if( todayYear%4 == 0 && todayMonth == 2 && (print+i) > 29){
			print -= 29;
			todayMonth++;
		}
		if( todayMonth == 3 && (print+i) > 31){
			print -= 31;
			todayMonth++;
		}
		if( todayMonth == 4 && (print+i) > 30){
			print -= 30;
			todayMonth++;
		}
		if( todayMonth == 5 && (print+i) > 31){
			print -= 31;
			todayMonth++;
		}
		if( todayMonth == 6 && (print+i) > 30){
			print -= 30;
			todayMonth++;
		}
		if( todayMonth == 7 && (print+i) > 31){
			print -= 31;
			todayMonth++;
		}
		if( todayMonth == 8 && (print+i) > 31){
			print -= 31;
			todayMonth++;
		}
		if( todayMonth == 9 && (print+i) > 30){
			print -= 30;
			todayMonth++;
		}
		if( todayMonth == 10 && (print+i) > 31){
			print -= 31;
			todayMonth++;
		}
		if( todayMonth == 11 && (print+i) > 30){
			print -= 30;
			todayMonth++;
		}
		if( todayMonth == 12 && (print+i) > 31){
			print -= 31;
			todayMonth -= 11;
			todayYear++
		}
		var today = new Date(todayYear+"-"+todayMonth+"-"+(print+i)).toString().substr(0,3);
		var Vtoday = (todayYear+"-"+todayMonth+"-"+(print+i)).toString();
		var tMonth = todayMonth;
		//如果月份小於10，前面加0
		if(tMonth<10){
			tMonth = "0"+tMonth;
		}
		//如果日小於10，前面加0
		var ttoday = (print+i);
		if(ttoday<10){
			ttoday = "0" +ttoday;
		}
		// 尋找星生命
		if( today != "Mon" && today != "Tue" && today != "Thu" && today != "Sat"){
			$("select#theater1").append("<option value="+Vtoday+" >"+todayYear+"-"+tMonth+"-"+ttoday+"</option>");
			// $("select#theater1").append("<option value="+Vtoday+" >"+new Date(todayYear+"-"+todayMonth+"-"+(print+i)).toString().substr(4,6)+"　"+"</option>");
		}
		// 末世決戰
		if( today != "Sun" && today != "Mon" && today != "Wed" && today != "Thu" && today != "Fri"){
			$("select#theater2").append("<option value="+Vtoday+" >"+todayYear+"-"+tMonth+"-"+ttoday+"</option>");
		}
	}
});							 																														  																													 

//改變節目名稱之後，直接存到sessionStorage 
function changeTheaterName() {
    // document.querySelector('input[name="programName"]:checked').value;

    //儲存到sessionStorage
    var programName = document.querySelector('input[name="programName"]:checked').value;
    storage.setItem("programName", programName);
	if(programName == "尋找星生命"){
		$('#theater1').show();
		$('#theater2').hide();
	} else {
		$('#theater1').hide();
		$('#theater2').show();	
	}								  																							
}

//改變日期之後，直接存到sessionStorage
function changeDate() {
    // document.getElementById("programdate").value;

    //儲存到sessionStorage
    //一開始抓日期
    //var programDate = document.getElementById("programDate").value;
    //用節目名稱來分日期
	if(programName == "尋找星生命"){
		var programDate = document.getElementById("theater1").value;
	} else {
		var programDate = document.getElementById("theater2").value;	
	}
	//要保留	 														  
    storage.setItem("programDate", programDate);

}

//改變場次之後，直接存到sessionStorage
function changeEvent(e) {
    //抓取使用者選的值
    var e = document.getElementById("programTime");
    var programTime = e.options[e.selectedIndex].value;
    //儲存到sessionStorage
    // var storage = sessionStorage;
    storage.setItem("programTime", programTime);

}

//改變數量之後，直接存到sessionStorage 
var quantity_value = 1;
function changeQuantity() {
    //數量改變，改變總額
    quantity_value = Number(document.getElementById('quantity').value);
    if(quantity_value<0){
    	quantity_value= 0;
    	document.getElementById('quantity').value="0";
    }
    total = quantity_value * 500;
    document.getElementById('total').innerHTML = total+"元";

    //改變數量之後，直接存到sessionStorage 
    storage.setItem("theater_quantity", quantity_value);

    storage.setItem("theater_total", total);

    // var theater_quantity =document.getElementById("quantity").value;
    // storage.setItem("theater_quantity",theater_quantity);
}
	//判斷是否有登入
    //跳去登入頁面?
    var loginFlag = true;
    function checkLogin(){
    	//如果張數為0，就不會跳到下一頁
    	if(quantity_value == 0){
    		return ;
    	}
        if(loginFlag == true){
            window.location.href='Booking_details.html';
        }else{
            //登入頁面
            window.location.href='http://www.cwb.gov.tw/V7/index.htm';
            }
        }