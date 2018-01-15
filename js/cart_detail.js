var length = document.getElementsByClassName("sub_total").length;
var storage = localStorage;
window.addEventListener("load",init);
function init(){
	// 產生購票明細
	for( i = 6 ; i > 0 ; i--){
		var fn = i;
		if( storage.getItem(i) != null ){
			var info = storage.getItem(i).split("/");
			var full_fare_num = info[1];
			if( full_fare_num > 0 ){
				var full_fare = info[0];
				var full_fare_subtotal = full_fare * full_fare_num;			
				$("#ticket_row").after("<tr><td style='text-align:center;'>"+fn+"</td><td class='facility_name facility_name_"+fn+"'></td><td style='text-align:center;'>"+"全票"+"</td><td style='text-align:right;'>"+full_fare+"</td><td>"+full_fare_num+"</td><td class='sub_total' colspan='2'>"+full_fare_subtotal+"</td></tr>");
				// show_facility_name(fn);
			}
			var half_fare_num = info[3];
			if( half_fare_num > 0){
				var half_fare = info[2];
				var half_fare_subtotal = half_fare * half_fare_num;
				$("#ticket_row").after("<tr><td style='text-align:center;'>"+fn+"</td><td class='facility_name facility_name_"+fn+"'></td><td style='text-align:center;'>"+"半票"+"</td><td style='text-align:right;'>"+half_fare+"</td><td>"+half_fare_num+"</td><td class='sub_total' colspan='2'>"+half_fare_subtotal+"</td></tr>");
				// show_facility_name(fn);
			}
		}
	}
	var length = document.getElementsByClassName("sub_total").length;
	total = 0;
	for( i = 0 ; i < length ; i++){
		var sub_total = parseInt(document.getElementsByClassName("sub_total")[i].innerHTML);
		total += sub_total;
		initial_total = total;
	}
		$("#input_discount").before("<tr id='cart_total_row'><td colspan='7'>"+"總計："+"</td><td name='cart_sub_total' id='cart_sub_total'>"+total+"</td></tr>");	
		document.getElementById("cart_sub_total").innerHTML = total;
		document.getElementById("total").innerHTML = total;
		document.getElementById("total_hidden").innerHTML = total;

var points_confirm = document.getElementById("points_confirm");
points_confirm.addEventListener("click",output_total);

// function show_facility_name(fn){
// 	var facility_no = fn;
// 	var xhr = new XMLHttpRequest();
// 	xhr.onload = function (){
// 	if( xhr.status == 200){ //OK
// 	    if( xhr.responsetText == "sqlerror"){
// 	        alert("Server端無法正常運作");
// 	    }else{
// 	    for(var i =0; i<2;i++){
// 	    	document.getElementsByClassName("facility_name_"+fn)[i].innerHTML = xhr.responseText;	
// 	    }
// 	    }
// 	    }
// 	}
// 	var url = "../show_facility_name.php?facility_no=" + facility_no;
// 	xhr.open("get",url, true);
// 	xhr.send(null);
// }

function output_total(){
	total = initial_total;
	var member_points = document.getElementById("mem_points").innerHTML;
	var discount = parseInt(document.getElementById("points").value);
	if( discount <= member_points && discount > 0 && discount != null){
		document.getElementsByClassName("points")[1].blur();
		document.getElementsByClassName("points")[1].style.backgroundColor = "transparent";
		document.getElementById("discount").innerHTML = "-"+discount;
		total = total - discount;
		document.getElementById("total").innerText = total;
		$("#points_remain_input").html(member_points-discount);
		$("#points_remain").css("display","block");
	}else if( discount < 0){
		alert("不能為負數唷!");
		total = initial_total;
		document.getElementById("discount").innerHTML = 0;
		document.getElementById("total").innerHTML = total;
	}else if( discount > member_points){
		alert("您沒有這麼多積分唷! 請重新輸入");
		total = initial_total;
		document.getElementById("discount").innerHTML = 0;
		document.getElementsByClassName("points")[1].value = 0;
		document.getElementById("total").innerHTML = total;
	}else{
		alert("您還沒有輸入積分唷!");
		document.getElementsByClassName("points")[1].focus();
		document.getElementsByClassName("points")[1].style.backgroundColor = "navy";
	}
}

// 原始購物車外觀
	var facility_ticket_list = storage.getItem("facility_ticket_list");
	var iniCart = Math.floor((facility_ticket_list.split("/").length-1)/2);
	var aa = document.getElementById("cartimgid").src.substr(-5,1);
	aa = iniCart;
	document.getElementById("cartimgid").src = "img/cart/wallet_"+iniCart+".png";
	document.getElementById("howmanytickets").innerHTML = facility_ticket_list.split("/").length-1;

// 使用者輸入積點
document.getElementsByClassName("points")[2].onfocus = function(){
	document.getElementsByClassName("points")[2].style.backgroundColor = "rgba(100,255,243,0.6)";
	$("#points_remain").css("opacity","1");
}

// 使用者勾選使用積點
document.getElementsByClassName("points")[1].onchange = function(){
	document.getElementsByClassName("points")[2].focus();
	document.getElementsByClassName("points")[2].style.backgroundColor = "navy";
}
// 使用者勾選不使用積點
document.getElementsByClassName("points")[0].onchange = function(){
	discount = 0;
	document.getElementById("discount").innerHTML = discount;
	document.getElementsByClassName("points")[2].value = "";
	document.getElementsByClassName("points")[2].blur();
	document.getElementsByClassName("points")[2].style.backgroundColor = "transparent";
	document.getElementById("total").innerHTML = initial_total;
	$("#points_remain_input").html(discount);
	$("#points_remain").css("opacity","0");

}
// 確認結帳,清空localStorage儲存票券資料
$("#nextStep").click(function(){
	storage.removeItem("facility_ticket_list");
	for(var i=1;i=6;i++){
		storage.removeItem(i);
	}
});
};

function setBlur(obj,target2)
 	{
    	var target =document.getElementById(target2);
    		if( obj.value.length ==obj.getAttribute('maxlength'))
    		{
				target.focus();
			}
				return;
	}
