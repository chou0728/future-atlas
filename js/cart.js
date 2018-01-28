var storage = localStorage;
var expire_date = "2018/12/31";

window.onload = function(){

	for( i = 1 ; i < 11 ; i++){
		var fn = i;
		if( storage.getItem(i) != null ){
			var info = storage.getItem(i).split("/");
			var full_fare_num = info[1];
			if( full_fare_num > 0 ){
				var full_fare = info[0];
				var full_fare_subtotal = full_fare * full_fare_num;			
				$("table#cartContent").append("<tr id='full_"+fn+"'><td class='fn_id'>"+fn+"</td><td class='icon_td'><img src='img/facilityIcon/"+fn+"icon.png'></td><td class='facility_name_hidden'></td><td class='facility_name'>"+info[4]+"</td><td class='full_td'>全票</td><td class='fare_td' id='full_fare_id_"+fn+"'>"+full_fare+"</td><td class='ctrl_td'><div class='ctrl_div'><div class='ctrl-button ctrl-button-decrement' id='full_decrement_"+fn+"'>-</div><div class='ctrl-counter'><input class='ctrl-counter-input' maxlength='3' type='text' onkeyup='this.value=this.value.replace(/[^0-9]/g,'')' value="+full_fare_num+" id='full_fare_num_id_"+fn+"'></div><div class='ctrl-button ctrl-button-increment' id='full_increment_"+fn+"'>+</div></div><span class='hidden_num'>"+full_fare_num+"</span></td><td class='sub_total' id='full_fare_subtotal_id_"+fn+"'>"+full_fare_subtotal+"</td><td class='delete_btn_td'><button class='delete_btn' id='full_fare_delete_btn_id_"+fn+"'>Ｘ</button></td></tr>");

				document.getElementById("full_fare_num_id_"+fn).onchange = changeNum;
				document.getElementById("full_decrement_"+fn).onclick = minusNumPanel;
				document.getElementById("full_increment_"+fn).onclick = addNumPanel;
				document.getElementById("full_fare_delete_btn_id_"+fn).addEventListener("click",deleteRowByClick);
				document.getElementById("full_fare_delete_btn_id_"+fn).addEventListener("click",changeCartOutlook);
			}
			var half_fare_num = info[3];
			if( half_fare_num > 0){
				var half_fare = info[2];
				var half_fare_subtotal = half_fare * half_fare_num;
				$("table#cartContent").append("<tr id='half_"+fn+"'><td class='fn_id'>"+fn+"</td><td class='icon_td'><img src='img/facilityIcon/"+fn+"icon.png'></td><td class='facility_name_hidden'></td><td class='facility_name'>"+info[4]+"</td><td class='half_td'>半票</td><td class='fare_td' id='half_fare_id_"+fn+"'>"+half_fare+"</td><td class='ctrl_td'><div class='ctrl_div'><div class='ctrl-button ctrl-button-decrement' id='half_decrement_"+fn+"'>-</div><div class='ctrl-counter'><input class='ctrl-counter-input' maxlength='3' type='text' onkeyup='this.value=this.value.replace(/[^0-9]/g,'')' value="+half_fare_num+" id='half_fare_num_id_"+fn+"'></div><div class='ctrl-button ctrl-button-increment' id='half_increment_"+fn+"'>+</div></div><span class='hidden_num'>"+half_fare_num+"</span></td><td class='sub_total' id='half_fare_subtotal_id_"+fn+"'>"+half_fare_subtotal+"</td><td class='delete_btn_td'><button class='delete_btn' id='half_fare_delete_btn_id_"+fn+"'>Ｘ</button></td></tr>");

				document.getElementById("half_fare_num_id_"+fn).onchange = changeNum;
				document.getElementById("half_decrement_"+fn).onclick = minusNumPanel;
				document.getElementById("half_increment_"+fn).onclick = addNumPanel;
				document.getElementById("half_fare_delete_btn_id_"+fn).addEventListener("click",deleteRowByClick);
				document.getElementById("half_fare_delete_btn_id_"+fn).addEventListener("click",changeCartOutlook);
			}
		}
	}
	// 加總
	var length = document.getElementsByClassName("sub_total").length;
	var total = 0;
	for( i = 0 ; i < length ; i++){
		var sub_total = parseInt(document.getElementsByClassName("sub_total")[i].innerHTML);
		total += sub_total;
	}
		$("table#cartContent").append("<tr id='cart_total_row'><td colspan='6' id='cart_total_prev'>"+"總計："+"</td><td name='cart_total' id='cart_total' colspan='1'>"+total+"</td><td class='delete_btn_td'></td></tr>");
		document.getElementById("cart_total").innerHTML = total;

// 原始購物車外觀
	if( storage.getItem("facility_ticket_list") != null){
		var facility_ticket_list = storage.getItem("facility_ticket_list");
		var iniCart = Math.floor((facility_ticket_list.split("/").length-1)/2);
		var aa = document.getElementById("cartimgid").src.substr(-5,1);
		aa = iniCart;
		document.getElementById("cartimgid").src = "img/cart/wallet_"+iniCart+".png";
		document.getElementById("howmanytickets").innerHTML = facility_ticket_list.split("/").length-1;
	}

// 變動購物車外觀
function changeCartOutlook(){
	var facility_ticket_list = storage.getItem("facility_ticket_list");
	var newCart = Math.floor((facility_ticket_list.split("/").length-1)/2);
	var aa = document.getElementById("cartimgid").src.substr(-5,1);
	// console.log(aa,newCart);
	document.getElementById("cartimgid").src = "img/cart/wallet_"+newCart+".png";
	document.getElementById("howmanytickets").innerHTML = facility_ticket_list.split("/").length-1;	
}

// 加減控制盤
function addNumPanel(){
	// 單價
	var fare_id = this.previousElementSibling.children[0].id.replace('_num','');//價錢的id
	var fare = parseInt(document.getElementById(fare_id).innerHTML);//價錢
	
	// 新數量
	var newNum = this.previousElementSibling.children[0].value;
	newNum++;
	this.previousElementSibling.children[0].value = newNum;
	// 新subtotal
	document.getElementById(fare_id.replace('_id','_subtotal_id')).innerHTML = fare*newNum;
	showSubTotal();

	// 更改localStorage內容
	// 修改為全票
	if( this.id.search("full") == 0){
		var cc = storage.getItem(this.id.substr(this.id.length-1,1)).split("/");
		cc[1] = newNum;
		storage.setItem(this.id.substr(this.id.length-1,1),cc.join("/"));
	}
	// 修改為半票
	else{
		var cc = storage.getItem(this.id.substr(this.id.length-1,1)).split("/");
		cc[3] = newNum;
		storage.setItem(this.id.substr(this.id.length-1,1),cc.join("/"));
	}
}
function minusNumPanel(){
	// 單價
	var fare_id = this.nextElementSibling.children[0].id.replace('_num','');//價錢的id
	var fare = parseInt(document.getElementById(fare_id).innerHTML);//價錢
	
	// 新數量
	var newNum = this.nextElementSibling.children[0].value;
	newNum--;
	this.nextElementSibling.children[0].value = newNum;
			if( newNum > 0){
				// 新subtotal
				document.getElementById(fare_id.replace('_id','_subtotal_id')).innerHTML = fare*newNum;
				showSubTotal();

				// 更改localStorage內容
				// 修改為全票
				if( this.id.search("full") == 0){
					var cc = localStorage.getItem(this.id.substr(this.id.length-1,1)).split("/");
					cc[1] = newNum;
					localStorage.setItem(this.id.substr(this.id.length-1,1),cc.join("/"));
				}
				// 修改為半票
				else{
					var cc = localStorage.getItem(this.id.substr(this.id.length-1,1)).split("/");
					cc[3] = newNum;
					localStorage.setItem(this.id.substr(this.id.length-1,1),cc.join("/"));
				}
			}else if( newNum < 1){
				var confirm_status = confirm("您確定要刪除這張票券？");
				if( confirm_status == true){
					var delete_row_id = this.id.replace("_decrement","");
					document.getElementById(delete_row_id).remove();
				}else{
					newNum = 1;
					this.nextElementSibling.children[0].value = 1;
				}
			}
	// 檢查facility_list
	var storage = localStorage;
	var dd = this.id.substr(-1,1);
	var fn = storage.getItem(dd).split("/")[1];
	var hn = storage.getItem(dd).split("/")[3];
	if(fn == 0 && hn == 0 ){
		var ee = storage.getItem("facility_ticket_list").replace(dd+"/","");
		storage.setItem("facility_ticket_list", ee);
	}
}

function changeNum(){
		// 單價
		var aa = this.id.replace('_num','');
		var fare = parseInt(document.getElementById(aa).innerHTML);
		// 新數量
		var num = this.value;
			if( num > 0){
				// 新subtotal
				document.getElementById(this.id.replace('num','subtotal')).innerHTML = fare*num;
				showSubTotal();

				// 更改localStorage內容
				// 修改為全票
				if( this.id.search("full") == 0){
					var cc = storage.getItem(this.id.substr(this.id.length-1,1)).split("/");
					cc[1] = this.value;
					storage.setItem(this.id.substr(this.id.length-1,1),cc.join("/"));
				}
				// 修改為半票
				else{
					var cc = storage.getItem(this.id.substr(this.id.length-1,1)).split("/");
					cc[3] = this.value;
					storage.setItem(this.id.substr(this.id.length-1,1),cc.join("/"));
				}
			}else{
				var confirm_status = confirm("您確定要刪除？");
				if( confirm_status == true){
					var ff = this.id.replace("_fare_num_id","");
					document.getElementById(ff).remove();
				}else{
					this.value = 1;
				}
			}
			
}

function deleteRow(changeTOZero,event){
event.preventDefault();
	if( changeTOZero != null){
		var temp1 = changeTOZero.replace("_decrement","");
		document.getElementById(temp1).remove();
			// 清除localstorage
			// 修改為全票
			if( temp1.search("full") == 0){
				var cc = storage.getItem(temp1.substr(temp1.length-1,1)).split("/");
				cc[1] = 0;
				console.log(cc);
				storage.setItem(temp1.substr(temp1.length-1,1), cc.join("/"));

				// if(cc[1] == 0 && cc[3] == 0){
					// storage.removeItem(temp1.substr(temp1.length-1,1));
				// }
			}
			// 修改為半票
			else{
				var cc = storage.getItem(temp1.substr(temp1.length-1,1)).split("/");
				cc[3] = 0;
				storage.setItem(temp1.substr(temp1.length-1,1), cc.join("/"));

				if(cc[1] == 0 && cc[3] == 0){
					storage.removeItem(temp1.substr(temp1.length-1,1));
				}
			}
	}else{
		var cc = this.id.replace("_fare_num_id","");
		
	}
	showSubTotal();
}

function deleteRowByClick(){
	var temp2 = this.id.replace("_fare_delete_btn_id","");
	document.getElementById(temp2).remove();
	// 修改為全票
	if( this.id.search("full") == 0){
		var cc = storage.getItem(this.id.substr(this.id.length-1,1)).split("/");
		cc[1] = 0;
		storage.setItem(this.id.substr(this.id.length-1,1),cc.join("/"));
	}
	// 修改為半票
	else{
		var cc = storage.getItem(this.id.substr(this.id.length-1,1)).split("/");
		cc[3] = 0;
		storage.setItem(this.id.substr(this.id.length-1,1),cc.join("/"));
	}
	showSubTotal();
	// 若全半票都為0，則將該設施票券從list刪除
	var facilityNo = temp2.substr(-1);
	var deleteFullNum = parseInt(storage.getItem(facilityNo).split("/")[1]);
	var deleteHalfNum = parseInt(storage.getItem(facilityNo).split("/")[3]);
	if( deleteFullNum == 0 && deleteHalfNum == 0){
		var temp3 = storage.getItem("facility_ticket_list").replace(facilityNo+"/","");
		storage.setItem("facility_ticket_list",temp3);
		changeCartOutlook();
	}
}

function showSubTotal(){
	// 重新計算總額
	var length = document.getElementsByClassName("sub_total").length;
	var total = 0;
	for( i = 0 ; i < length ; i++){
		var sub_total = parseInt(document.getElementsByClassName("sub_total")[i].innerHTML);
			total += sub_total;
	}
	document.getElementById("cart_total").innerHTML = total;
}

				/*註冊登入按鈕*/
				var singUpBtn = document.getElementById('singUpBtn');
				/*註冊燈箱*/
				var lightBox = document.getElementById('lightBox');
				/*註冊燈箱關閉按鈕*/
				var cancel = document.getElementById('cancel');
				/*建立登入按鈕點擊事件聆聽功能*/
				singUpBtn.addEventListener('click', showLogin, false);


				/*建立關閉登入燈箱按鈕點擊事件聆聽功能*/
				cancel.addEventListener('click', closeLogin, false);

				/*點案登入show出登入燈箱 以及判斷登出按鈕*/
				function showLogin() {
					// console.log(singUpBtn.innerText);
					/*如果singUpBtn為登入時*/
					fullCover = document.getElementById('all-page');/*叫出燈箱時的墊背*/
					if(singUpBtn.innerText.indexOf("登入") != -1){
						/*show出燈箱*/
						lightBox.style.opacity = 1;
						fullCover.style.display="block";
						lightBox.style.visibility = 'visible'
						lightBox.style.display = "block";
						allNavClose();
					}
				}
				
				/*點案登入關閉登入燈箱*/
				function closeLogin() {
					lightBox.style.opacity = 0;
					lightBox.style.visibility = 'hidden';
					fullCover.style.display="";
				}
};

document.getElementById("nextStep").addEventListener("click",loginOrNot);
function loginOrNot(){
	if(storage.getItem("facility_ticket_list") == null){
		alert("您還沒有挑選任何票券唷！");
	}else if( storage.getItem("mem_id") > 0){
		// 已經登入 
		$("#nextStep").attr("href","input_cart_detail.php");
		$(".login").prev().attr("src","img/member/member_2.png");
	}else{
		// 尚未登入
		$("#nextStep").removeAttr("href");
		alert("請先登入~~");
		fullCover = document.getElementById('all-page');/*叫出燈箱時的墊背*/
		lightBox.style.opacity = 1;
		fullCover.style.display="block";
		lightBox.style.visibility = 'visible'
		lightBox.style.display = "block";
	}
}