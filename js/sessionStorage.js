//儲存到sessionStorage
var storage = sessionStorage;

//用節目名稱來分日期
//抓取日期
var programName = "尋找星生命";
// document.getElementById("quantity").onchange = function() {myFunction()};
$(document).ready(function(){
	var today = new Date();
	var todayMonth = today.getMonth()+1;
	var todayYear = today.getFullYear();
	var todayDay = today.getDay();
	var print = parseInt(today.toString().substr(9,2));
	var day = ["(日)","(一)","(二)","(三)","(四)","(五)","(六)"];

	// 尋找星生命
	for(var i = 1 ; i <= 14 ; i++){
		var today = new Date(todayYear+"-"+todayMonth+"-"+(print+i)).toString().substr(0,3);
		var Vtoday = (todayYear+"-"+todayMonth+"-"+(print+i)).toString()
		if( today != "Mon" && today != "Tue" && today != "Thu" && today != "Sat"){
			$("select#theater1").append("<option value="+Vtoday+">"+new Date(todayYear+"-"+todayMonth+"-"+(print+i)).toString().substr(4,6)+"　"+day[(todayDay+i)%7]+"</option>");
		}
	}
	// 末世決戰
	for(var i = 1 ; i <= 14 ; i++){
		var today = new Date(todayYear+"-"+todayMonth+"-"+(print+i)).toString().substr(0,3);
		var Vtoday = (todayYear+"-"+todayMonth+"-"+(print+i)).toString();
		if( today != "Sun" && today != "Mon" && today != "Wed" && today != "Thu" && today != "Fri"){
			$("select#theater2").append("<option value="+Vtoday+">"+new Date(todayYear+"-"+todayMonth+"-"+(print+i)).toString().substr(4,6)+"　"+day[(todayDay+i)%7]+"</option>");
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
function changeQuantity() {
    //數量改變，改變總額
    quantity_value = Number(document.getElementById('quantity').value);
    total = quantity_value * 500;
    document.getElementById('total').innerHTML = total;

    //改變數量之後，直接存到sessionStorage 
    storage.setItem("theater_quantity", quantity_value);

    storage.setItem("theater_total", total);

    // var theater_quantity =document.getElementById("quantity").value;
    // storage.setItem("theater_quantity",theater_quantity);
}