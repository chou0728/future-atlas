var storage = localSession;
window.addEventListener("load", function(){
	var facility_list = storage.getItem("facility_list");
	var facility_no = facility_list.slice(0,-1).split(",");// ["1","2","3"]

	ticket_rows = document.createElement("rows");
	newTable = document.createElement("table");

	cart_total = 0;

	//每購買一個品項，就呼叫函數createCartList新增一個tr
	for(var key in facility_no){
		var item_info = storage.getItem(facility_no[key]);

		create_cart_list(facility_no[key],item_info);
		
		var full_fare = parseInt(item_info.split("|")[0]);
		var half_fare = parseInt(item_info.split("|")[1]);
		var full_fare_num = parseInt(item_info.split("|")[2]);
		var half_fare_num = parseInt(item_info.split("|")[3]);
		var full_subtotal = full_fare * full_fare_num;
		var half_subtotal = half_fare * half_fare_num;
		
		cart_total += (full_subtotal + half_subtotal);
	}
	document.getElementById("cart_total").innerHTML = cart_total;
	ticket_rows.appendChild(rows);
	document.getElementById("cart_list").appendChild(ticket_rows);
});
function create_cart_list(item_key, item_info){
	var facility_no = item_key;
	// var facility_icon = "img/"; 等設施圖片出來

	var full_fare = parseInt(item_info.split("|")[0]);
	var half_fare = parseInt(item_info.split("|")[1]);
	var full_fare_num = parseInt(item_info.split("|")[2]);
	var half_fare_num = parseInt(item_info.split("|")[3]);
	var full_subtotal = full_fare * full_fare_num;
	var half_subtotal = half_fare * half_fare_num;

	// 要先判斷全票半票當中是否有任何為0

	// 建立票券tr
	var facility_tr = document.createElement("tr");
	facility_tr.className = "facility_tr";

	newTable.appendChild(facility_tr);

	// 第一個td:票券序號
	var auto_no = document.createElement("td");
	auto_noinnerText = "序號";
	auto_no.appendChild(facility_tr);

	// 第二個td:設施icon

	// 第三個td:設施名稱
	var facility_name = document.createElement("td");

	// 第四個td:票種
	var ful_fare_name = document.createElement("td");

	// 第五個:使用期限
	var expire_date = document.createElement("td");

	// 第六個:單價
	var ful_fare = document.createElement("td");

	// 第七個:數量
	var ful_fare_num = document.createElement("td");

	// 第八個:小計
	var full_subtotal = document.createElement("td");

}