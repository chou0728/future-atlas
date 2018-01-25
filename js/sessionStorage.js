//儲存到sessionStorage
var storage = sessionStorage;

//用節目名稱來分日期
//抓取日期
// document.getElementById("quantity").onchange = function() {myFunction()};
$(document).ready(function(){
	var today = new Date();
	var todayMonth = today.getMonth()+1; //幾月
	var todayYear = today.getFullYear();  //西元
	var todayDay = today.getDay();  //幾號
	var print = parseInt(today.toString().substr(8,2));
	var day = ["(日)","(一)","(二)","(三)","(四)","(五)","(六)"];

	for(var i = 0; i <= 14 ; i++){
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
		if( today != "Sun" && today != "Tue" && today != "Wed" && today != "Thu" && today != "Fri"){
			$("select#theater2").append("<option value="+Vtoday+" >"+todayYear+"-"+tMonth+"-"+ttoday+"</option>");
		}
	}
});							 																														  																													 
var programName = "尋找星生命";
var programDate;
var programTime;
var quantity = 1;
var total = 100;

//改變節目名稱之後，直接存到sessionStorage 
function changeTheaterName() {
    // document.querySelector('input[name="programName"]:checked').value;

    //儲存到sessionStorage
     programName = document.querySelector('input[name="programName"]:checked').value;
    //storage.setItem("programName", programName);
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
    programName = document.querySelector('input[name="programName"]:checked').value;
    //用節目名稱來分日期
	if(programName == "尋找星生命"){
		programDate = document.getElementById("theater1").value;
	} else {
		programDate = document.getElementById("theater2").value;	
	}
	//要保留	 														  
    //storage.setItem("programDate", programDate);

    //判斷當天購票出現場次
    // generate programTime  select options
	var d = new Date();
	var n = d.getDate();
	//var dayTime = new Date();
	t = document.getElementById("programTime");
	len = t.options.length;
	// 2018-01-22
	// if programDate not today
	// if length != 5
	//   length = 0
	//   append 11,14,15,19
	// else
	var month = d.getMonth()+1;
	var today= d.getFullYear()+'-'+month+'-'+n;
	//alert("programDate:"+programDate);
	//alert("today:"+today);
	if(programDate != today){
		if( len != 5){
			t.length = 0;
			$("select#programTime").append("<option value=場次>場次</option>");
			$("select#programTime").append("<option value=11:00>11:00</option>");
			$("select#programTime").append("<option value=14:00>14:00</option>");
			$("select#programTime").append("<option value=15:00>15:00</option>");
			$("select#programTime").append("<option value=19:00>19:00</option>");
		}
	} else {
	// length = 0
		t.length = 0;
	// get current time
		var hour = d.getHours();
		$("select#programTime").append("<option value=場次>場次</option>");
		if(hour < 11){
			$("select#programTime").append("<option value=11:00>11:00</option>");
		}
		if(hour < 14){
			$("select#programTime").append("<option value=14:00>14:00</option>");
		}
		if(hour < 15){
			$("select#programTime").append("<option value=15:00>15:00</option>");
		}
		if(hour < 19){
			$("select#programTime").append("<option value=19:00>19:00</option>");
		}	
	}
}

//改變場次之後，直接存到sessionStorage
function changeEvent(e) {
    //抓取使用者選的值
    var e = document.getElementById("programTime");
    programTime = e.options[e.selectedIndex].value;
    //儲存到sessionStorage
    // var storage = sessionStorage;
    //storage.setItem("programTime", programTime);

}

//改變數量之後，直接存到sessionStorage 
//var quantity_value = 1;
function changeQuantity() {
    //數量改變，改變總額
    quantity= Number(document.getElementById('quantity').value);
    if(quantity<0){
    	quantity= 0;
    	document.getElementById('quantity').value="0";
    }

    //呼叫ajax_CheckTicket
    ajax_CheckTicket();


    //total = quantity_value * 500;
    //document.getElementById('total').innerHTML = total+"元";

    //改變數量之後，直接存到sessionStorage 
    //storage.setItem("theater_quantity", quantity_value);
    //storage.setItem("theater_total", total);

    // var theater_quantity =document.getElementById("quantity").value;
    // storage.setItem("theater_quantity",theater_quantity);
}
	 
 //檢查剩餘票數是否足夠
function ajax_CheckTicket(){
            // Create our XMLHttpRequest object
            //產生XMLHttpRequest物件

        	// var programName = storage.getItem('programName');
        	// var programDate = storage.getItem('programDate');
        	// var programTime = storage.getItem('programTime');
        	programName = document.querySelector('input[name="programName"]:checked').value;
        	//用節目名稱來分日期
			if(programName == "尋找星生命"){
				 programDate = document.getElementById("theater1").value;
			} else {
				 programDate = document.getElementById("theater2").value;	
			}
			//抓取場次
        	var e = document.getElementById("programTime");
    		programTime = e.options[e.selectedIndex].value;
			//alert("programName:"+programName+" programDate:"+programDate+"  programTime:"+programTime);

            var hr = new XMLHttpRequest();
            // Create some variables we need to send to our PHP file
            //把 vars裡面資輛傳到my_parse_file.php檔案(設定參數)
            var url = "php/checkTicket.php";
            var vars = "programName="+programName+
                       "&programDate="+programDate+
                       "&programTime="+programTime;
					   //alert(vars);
            //利用POST方式傳遞
            // open() 的第一個參數是 HTTP request 的方法
            //第二個參數是請求頁面的 URL
            //第三個參數決定此 request是否不同步進行，
            //如果設定為 TRUE則即使伺服器尚未傳回資料也會繼續執行其餘的程式
            hr.open("POST", url, true);
            //setRequestHeader()設定內容類型
            //若發送表單類型資料，必須設置請求標頭'Content-Type'為'application/x-www-form-urlencoded'
            hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            // Access the onreadystatechange event for the XMLHttpRequest object
            //註冊callback function
            //200 OK
			quantity = Number(document.getElementById('quantity').value);	
            hr.onreadystatechange = function() {
                if(hr.readyState == 4 && hr.status == 200) {
                    //return_data = hr.responseText;
                    // document.getElementById("status").innerHTML = return_data;
					var ticket = Number(JSON.parse(hr.responseText));
					if(ticket < quantity){
						alert("票券剩餘 "+ticket+"張");	
						quantity = ticket;
					} 
					total = quantity * 100;
					document.getElementById('quantity').value = quantity;
					document.getElementById('total').innerHTML = total+"元";

					//改變數量之後，直接存到sessionStorage 
					//storage.setItem("theater_quantity", quantity);

					//storage.setItem("theater_total", total);
							//return return_data;
                    // setTimeout(function(){
                    //     location.href="back_TheaterMang.php";
                    // },2000)
                }
            }
            // Send the data to PHP now... and wait for response to update the status div
            //送出資料
            //send() 的參數在以 POST 發出 request 時，可以是任何想傳給伺服器的東西
            hr.send(vars); // Actually execute the request
            //顯示目前狀態(還在連線中)
            //document.getElementById("status").innerHTML = "processing...";
}

//寫進sessionstorage
function setStorage(){
    storage.setItem("programName", programName);
	storage.setItem("programDate", programDate);
	storage.setItem("programTime", programTime);
	storage.setItem("theater_quantity", quantity);
	storage.setItem("theater_total", total);
	//aler(111);
	window.location.href='Booking_details.php';

}