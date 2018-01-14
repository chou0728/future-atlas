<?php
ob_start();
session_start();
echo '<script type="text/javascript">

var storage = localStorage;
var expire_date = "2018/12/31";
function ini(){
	for( i = 1 ; i < 7 ; i++){
		var fn = i;
		if( storage.getItem(i) != null ){
			var info = storage.getItem(i).split("/");
			var full_fare_num = info[1];
			if( full_fare_num > 0 ){
				var full_fare = info[0];
				var full_fare_subtotal = full_fare * full_fare_num;			
				$("table#cartContent").append("<tr id='full_"+fn+"'><td class='fn_id'>"+fn+"</td><td class='icon_td'>設施icon</td><td>設施名稱</td><td class='full_td'>全票</td><td id='full_fare_id_"+fn+"'>"+full_fare+"</td><td><div class='ctrl'><div class='ctrl-button ctrl-button-decrement' id='full_decrement_"+fn+"'>-</div><div class='ctrl-counter'><input class='ctrl-counter-input' maxlength='3' type='text' value="+full_fare_num+" id='full_fare_num_id_"+fn+"'></div><div class='ctrl-button ctrl-button-increment' id='full_increment_"+fn+"'>+</div></td><td class='sub_total' id='full_fare_subtotal_id_"+fn+"'>"+full_fare_subtotal+"</td><td class='delete_btn_td'><button class='delete_btn' id='full_fare_delete_btn_id_"+fn+"'>Ｘ</button></td></tr>");

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
				$("table#cartContent").append("<tr id='half_"+fn+"'><td class='fn_id'>"+fn+"</td><td class='icon_td'>設施icon</td><td>設施名稱</td><td class='half_td'>半票</td><td id='half_fare_id_"+fn+"'>"+half_fare+"</td><td><div class='ctrl'><div class='ctrl-button ctrl-button-decrement' id='half_decrement_"+fn+"'>-</div><div class='ctrl-counter'><input class='ctrl-counter-input' maxlength='3' type='text' value="+half_fare_num+" id='half_fare_num_id_"+fn+"'></div><div class='ctrl-button ctrl-button-increment' id='half_increment_"+fn+"'>+</div></td><td class='sub_total' id='half_fare_subtotal_id_"+fn+"'>"+half_fare_subtotal+"</td><td class='delete_btn_td'><button class='delete_btn' id='half_fare_delete_btn_id_"+fn+"'>Ｘ</button></td></tr>");

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
		$("table#cartContent").append("<tr id='cart_total_row'><td colspan='6' id='cart_total_prev'>"+"總計："+"</td><td name='cart_total' id='cart_total' colspan='2'>"+total+"</td><td></td></tr>");	
		document.getElementById("cart_total").innerHTML = total;

// 原始購物車外觀
	var facility_ticket_list = storage.getItem("facility_ticket_list");
	var iniCart = Math.floor((facility_ticket_list.split("/").length-1)/2);
	var aa = document.getElementById("cartimgid").src.substr(-5,1);
	aa = iniCart;
	document.getElementById("cartimgid").src = "img/cart/wallet_"+iniCart+".png";
	document.getElementById("howmanytickets").innerHTML = facility_ticket_list.split("/").length-1;

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
			}else if( newNum < 1){
				var confirm_status = confirm("您確定要刪除這張票券？");
				if( confirm_status == true){
					var delete_row_id = this.id;
					deleteRow(delete_row_id);
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
			if( num != 0){
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
					var ff = this.id.replace("decrement","fare_num_id");
					deleteRow(ff);
				}else{
					this.value = 1;
				}
			}
}

function deleteRow(changeTOZero){
	if( changeTOZero != null){
		var temp1 = changeTOZero.replace("_decrement","");
		document.getElementById(temp1).remove();
			// 清除localstorage
			// 修改為全票
			if( temp1.search("full") == 0){
				var cc = storage.getItem(temp1.substr(temp1.length-1,1)).split("/");
				cc[1] = 0;
				storage.setItem(temp1.substr(temp1.length-1,1),cc.join("/"));
			}
			// 修改為半票
			else{
				var cc = storage.getItem(temp1.substr(temp1.length-1,1)).split("/");
				cc[3] = 0;
				storage.setItem(temp1.substr(temp1.length-1,1),cc.join("/"));
			}
	}else{
		var cc = this.id.replace("_fare_num_id","");
		console.log(cc);
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

loginOrNot();
function loginOrNot(){
	if(storage.getItem("facility_ticket_list").search("/") < 0){
		$("#nextStep").attr("href","facilityBuyTicket.html");
		$("#nextStep").click(function(){
			alert("您還沒有購買任何票券唷！");
		});
	}else if( <?php echo isset($_SESSION["mem_id"]) === true?>){
		// 已經登入 
		$("#nextStep").attr("href","input_cart_detail.php");
	}else{
		// 尚未登入
		$("#nextStep").attr("href","http://www.w3school.com.cn/jsref/met_win_confirm.asp");
	}
}
};


</script>";
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/header.css">
<link rel="stylesheet" type="text/css" href="css/cart.css">
<style type="text/css">
body{
	position: relative;
}
body{
	background: black;
}
body::-webkit-scrollbar {
    width: 10px;
}
body::-webkit-scrollbar-track {
	-webkit-border-radius: 10px;
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    background-color: rgb(0,5,50);
}
body::-webkit-scrollbar-thumb {
  background-color: rgba(100,255,243,1);
 /* outline: 1px solid rgba(100,255,243,1);*/
}
</style>
<title>檢視購物車</title>
<script type="text/javascript" async>

</script>
<body>
<div class="header">
    <ul class="ul_top">
        <div class="lever">
            <img src="img/Usericon1.png">
        </div>
        <li class="li_top">
            <a href=<?php
            	if(isset($_SESSION["mem_id"])===true){
                			echo "'javascript:void(0)'";
                		}else{
                			echo "'SignUp.html'";
                		}
            ?> id="registerUser">
                <img src="img/member/member_0.png">
                <span class="register">
                	<?php
                		if(isset($_SESSION["mem_id"])===true){
                			echo $_SESSION["mem_nick"]."你好!";
                		}else{
                			echo "註冊";
                		}
                	?>
                </span>
            </a>
        </li>
        <li class="li_top">
            <a href=<?php
                		if(isset($_SESSION["mem_id"])===true){
                			echo"'logoutheadforindex.php'";
                		}else{
                			echo"'javascript:void(0)'";
                		}
                	?> id="singUpBtn">
                <img src="img/member/member_1.png">
                <span class="login">
                	<?php
                		if(isset($_SESSION["mem_id"])===true){
                			echo"登出";
                		}else{
                			echo"登入";
                		}
                	?>
                </span>
            </a>
        </li>
        <li class="li_top">
             <a href="input_cart.html">
                <img id="cartimgid" src="img/cart/wallet_0.png">
                <span id="howmanytickets">0</span>
            </a>
                <div id="showCartContent">預覽購物車
                    <table id="showCartContenttb"></table>
                </div>
        </li>
    </ul>
</div>
<div class="nav">
    <div class="ul_box">
        <ul class="ul_left">
            <li>
                <a href="Theaterbuyticket.html">劇場購票</a>
            </li>
            <li>
                <a href="facilityBuyTicket.php">設施購票</a>
            </li>
            <li>
                <a href="facilityInfo.html">設施介紹</a>
            </li>
        </ul>
        <h1 style="display: none">FutureAtlas_未來主題樂園</h1>
        <a href="index.php" class="logo_a">
            <img src="img/LOGO.png" class="logo">
        </a>
        <ul class="ul_right">
            <li>
                <a href="#page2">園區地圖</a>
            </li>
            <li>
                <a href="activity.html">活動月曆</a>
            </li>
            <li>
                <a href="robot.html">諮詢專區</a>
            </li>
        </ul>
    </div>
    <div class="navOpenBtn"><!-- RWD left btn-->
        <div class="ham"></div>
        <div class="ham"></div>
        <div class="ham"></div>
        <div class="ham"></div>
    </div>
</div>
<div class="headerOpenBtn"><!-- RWD right btn-->
    <img src="img/Usericon1.png" class="memIcon">
    <img src="img/Usericon.png" class="memIcon">
    
</div>

    <!-- header end-->

<div id="cartWrapper">
	<div id="cartTitle">您的購物車</div>
	<form>
		<table id="cartContent" border="1" cellspacing="0">
			<tr id="cart_header">
				<th id="fn_th">設施編號</th>
				<th id="icon_th">圖示</th>
				<th id="fname_th">設施名稱</th>
				<th id="tt_th">票種</th>
				<th id="fare_th">票價</th>
				<th id="tn_th" style='text-align: right'>張數</th>
				<th id="subtotal_th" style='text-align: right'>小計</th
				>
				<th colspan="2"></th>
			</tr>
		</table>
	<div id="button">
		<a href="facilityBuyTicket.html" class="highlight" id="backToShop">繼續購物</a>
		<a href="" id="nextStep" class="highlight">下一步</a>
	</div>
	</form>
</div>
<script src="js/00nav.js" async></script>
</body>
</html>