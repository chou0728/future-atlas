var storage = localStorage;
var today = new Date();
// var todayYear = today.getFullYear();
var expire_date = today.setDate(373);
var member_id = "Sara168";
var member_email = "Sara168@gmail.com";
var member_points = 50;
var length = document.getElementsByClassName("sub_total").length;


window.onload = function(){
	for( i = 6 ; i > 0 ; i--){
		var fn = i;
		if( storage.getItem(i) != null ){
			var info = storage.getItem(i).split("/");
			var full_fare_num = info[1];
			if( full_fare_num > 0 ){
				var full_fare = info[0];
				var full_fare_subtotal = full_fare * full_fare_num;			
				$("#ticket_row").after("<tr><td>"+fn+"</td><td>"+"設施icon"+"</td><td>"+"設施名稱"+"</td><td>"+"全票"+"</td><td>"+expire_date+"</td><td>"+full_fare_num+"</td><td>"+full_fare+"</td><td class='sub_total'>"+full_fare_subtotal+"</td></tr>");
			}
			var half_fare_num = info[3];
			if( half_fare_num > 0){
				var half_fare = info[2];
				var half_fare_subtotal = half_fare * half_fare_num;
				$("#ticket_row").after("<tr><td>"+fn+"</td><td>"+"設施icon"+"</td><td>"+"設施名稱"+"</td><td>"+"半票"+"</td><td>"+expire_date+"</td><td>"+half_fare_num+"</td><td>"+half_fare+"</td><td class='sub_total'>"+half_fare_subtotal+"</td></tr>");
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


var points_confirm = document.getElementById("points_confirm");
points_confirm.addEventListener("click",output_total);

function output_total(){
	total = initial_total;
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
		document.getElementsByClassName("points")[1].style.backgroundColor = "yellow";
	}
}

// 使用者輸入積點
document.getElementsByClassName("points")[1].onfocus = function(){
	document.getElementsByClassName("points")[1].style.backgroundColor = "yellow";
	$("#points_remain").css("opacity","1");
}

// 使用者勾選使用積點
document.getElementsByClassName("points")[0].onchange = function(){
	document.getElementsByClassName("points")[1].focus();
	document.getElementsByClassName("points")[1].style.backgroundColor = "yellow";
}
// 使用者勾選不使用積點
document.getElementsByClassName("points")[2].onchange = function(){
	discount = 0;
	document.getElementById("discount").innerHTML = discount;
	document.getElementsByClassName("points")[1].value = "";
	document.getElementsByClassName("points")[1].blur();
	document.getElementsByClassName("points")[1].style.backgroundColor = "transparent";
	document.getElementById("total").innerHTML = initial_total;
	$("#points_remain_input").html(discount);
	$("#points_remain").css("opacity","0");

}

$("#member_id").html(member_id);
$("#member_email").html(member_email);
$("#member_points").html(member_points);

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
