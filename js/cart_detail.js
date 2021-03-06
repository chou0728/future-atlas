var length = document.getElementsByClassName("sub_total").length;
var storage = localStorage;
window.addEventListener("load",init);
function init(){
	// 產生購票明細
	for( i = 10 ; i > 0 ; i--){
		var fn = i;
		if( storage.getItem(i) != null ){
			var info = storage.getItem(i).split("/");
			var full_fare_num = info[1];
			if( full_fare_num > 0 ){
				var full_fare = info[0];
				var full_fare_subtotal = full_fare * full_fare_num;
				$("#ticket_row").after("<tr><td style='text-align:center;'>"+fn+"</td><td class='facility_name'>"+info[4]+"</td><td style='text-align:center;'>"+"全票"+"</td><td style='text-align:right;'>"+full_fare+"</td><td>"+full_fare_num+"</td><td class='sub_total' colspan='3'>"+full_fare_subtotal+"</td></tr>");
			}
			var half_fare_num = info[3];
			if( half_fare_num > 0){
				var half_fare = info[2];
				var half_fare_subtotal = half_fare * half_fare_num;
				$("#ticket_row").after("<tr><td style='text-align:center;'>"+fn+"</td><td class='facility_name'>"+info[4]+"</td><td style='text-align:center;'>"+"半票"+"</td><td style='text-align:right;'>"+half_fare+"</td><td>"+half_fare_num+"</td><td class='sub_total' colspan='3'>"+half_fare_subtotal+"</td></tr>");
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

// 確認結帳,形成訂單副檔sql指令
	var sql_order_item = "insert into facility_order_item (order_no, facility_no, mem_id, facility_name, full_fare_num, full_fare_num_used, half_fare_num, half_fare_num_used, subtotal, comment_content, comment_grade, comment_timestamp) values ";
	for(var i=1;i<11;i++)
	if(storage.getItem(i) != null){
		info = storage.getItem(i).split("/");
		if(info[1] != 0 || info[3] != 0){
			var info = storage.getItem(i).split("/");
			var subtotal = info[0]*info[1] + info[2]*info[3];
			// (2,2,"碰碰車",5,0,5,0,800,"尚未評分",0,"2018-01-16-20-20-20"),
			var sql_increment = "/,"+i+","+storage.getItem("mem_id")+","+"'"+info[4]+"'"+","+info[1]+",0,"+info[3]+",0,"+subtotal+",'尚未評分',0,'0000-00-00-00-00-00'),";
			sql_order_item += sql_increment;
		}
	}
	// console.log(sql_order_item);
	document.getElementById("sql_order_item").value = (sql_order_item.substring(0, sql_order_item.length-1)+";");
};

// 使用者輸入積點
$(document).ready(function(){
	$("#points").change(function(){
		$(this).val();
		total = initial_total;
		var member_points = document.getElementById("mem_points").innerHTML;
		var discount = parseInt(document.getElementById("points").value);
		if( discount <= member_points && discount > 0 && discount != null && discount <= total){
			document.getElementById("discount").innerHTML = "-"+discount;
			total = total - discount;
			document.getElementById("total").innerText = total;
			$("#points_remain_input").html(member_points-discount);
			$("#points_remain").css("display","block");
		}else if( discount < 0){
			alert("不能為負數唷！請重新輸入");
			total = initial_total;
			document.getElementById("discount").innerHTML = 0;
			document.getElementById("points").value = 0;
			document.getElementById("total").innerHTML = total;
		}else if( discount > total){
			alert("不能超過結帳金額。請重新輸入");
			document.getElementById("discount").innerHTML = 0;
			document.getElementById("points").value = 0;
			document.getElementById("total").innerHTML = total;
		}else if( discount > member_points){
			alert("您沒有這麼多積分唷。請重新輸入");
			total = initial_total;
			document.getElementById("discount").innerHTML = 0;
			document.getElementById("points").value = 0;
			document.getElementById("total").innerHTML = total;
		}
	});
	$(".points").eq(0).blur(function(){
		discount = 0;
		$("#discount").html(discount);
		$(".points").eq(2).val("");
		$(".points").eq(2).blur();
		$(".points").eq(2).css("background-color","white");
		$("#total").html(initial_total);
		$("#points_remain_input").html(discount);
	});
});