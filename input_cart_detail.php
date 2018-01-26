<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<title>FA未來主題樂園 | 購物車-確認訂單明細</title>
<link rel="icon" href="img/favicon.ico" />
<script src="js/cart_detail.js"></script>
<link rel="stylesheet" type="text/css" href="css/header.css">
<link rel="stylesheet" type="text/css" href="css/cart.css">
<link rel="stylesheet" type="text/css" href="css/cart_detail.css">
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
}
</style>
<body>
<div class="nav">
    <div class="ul_box">
        <ul class="ul_left">
            <li>
                <img src="img/hover-tri.png" class="nav_hover">
                <a href="Theaterbuyticket.php">劇場購票</a>
            </li>
            <li>
                <img src="img/hover-tri.png" class="nav_hover">
                <a href="facilityBuyTicket.php">設施購票</a>
            </li>
            <li>
                <img src="img/hover-tri-now.png" class="nav_here">
                <a href="facilityInfo.php" style="color: rgb(55,222,255);font-weight: bold;">設施介紹</a>
            </li>
        </ul>
        <h1 style="display: none">FutureAtlas_未來主題樂園</h1>
        <a href="====index.php" class="logo_a">
            <img src="img/LOGO.png" class="logo">
        </a>
        <ul class="ul_right">
            <li>
                <img src="img/hover-tri.png" class="nav_hover">
                <a href="====index.php#page2" id="NavClose">園區地圖</a>
            </li>
            <li>
                <img src="img/hover-tri.png" class="nav_hover">
                <a href="activity.php">活動月曆</a>
            </li>
            <li>
                <img src="img/hover-tri.png" class="nav_hover">
                <a href="robot.php">諮詢專區</a>
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

<!-- 輸出會員資訊 -->
<div id="detailWrapper">
	<h1 id="title">確認訂單明細</h1>
	<table id="member_info" cellspacing="0">
		<tr><th colspan="2" class="tbtitle">會員資訊</th>
		</tr>
		<tr>
			<td><div class="mem_info">暱稱</div><div id="mem_nick" class="mem_info_content"></div></td>
		</tr>
		<tr>
			<td><div class="mem_info">信箱</div><div id="mem_mail" class="mem_info_content"></div></td>
		</tr>
		<tr>
			<td><div class="mem_info">積分</div><div id="mem_points" class="mem_info_content"></div></td>
		</tr>
	</table>

	<!-- 購票明細 -->
	<table id="ticket_rows">
		<tr><th colspan="8" class="tbtitle" id="detail_row_title" style="font-size: 24px;">訂單明細</th></tr>
		<tr id="ticket_row">
			<th id="fn_th">編號</th>
			<th id="fname_th">設施名稱</th>
			<th id="tt_th">票種</th>
			<th id="fare_th">票價</th>
			<th id="tn_th" style='text-align: right'>張數</th>
			<th id="subtotal_th" colspan="3" style='text-align: right'>小計</th>
		</tr>
		<tr id="input_discount"><th colspan="8" class="title">選擇是否使用積分</th></tr>
		<tr>
			<td style="width: 350px; text-align: right" colspan="6" id="discount_input">
				使用積分<input type="number" id="points" min="0" value="0">
					<div id="points_remain">(剩餘點數：
						<span id="points_remain_input"></span>)點
					</div>
			</td>
			<td id="discount" colspan="6">0</td>
		</tr>
		<tr id="cart_total_row">
			<td colspan="6">結帳金額：</td>
			<td name="total" id="total" colspan="6"></td>
		</tr>
	</table>
	<!--輸入信用卡 -->
	<div id="pay_info">
		<form action="facility_order_save_database.php" method="post">
		<div class="tbtitle">輸入信用卡</div>
			<div id="credit_input_area" colspan="2">信用卡卡號
		<div>
			<div class="credit_card" name="credit_card" id="credit_card">
				<input type="text" size="4" minlength="4" maxlength="4" id="credit_card1" name="credit_card1" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')" required>-
				<input type="text" size="4" minlength="4" maxlength="4" id="credit_card2" name="credit_card2" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')" required>-
				<input type="text" size="4" minlength="4" maxlength="4" id="credit_card3" name="credit_card3" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')" required>-
				<input type="text" size="4" minlength="4" maxlength="4" id="credit_card4" name="credit_card4" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')" required>
			</div>
		<div>
			<div>到期年月 / 驗證碼</div>
		</div>
		<div>
			<div>
				<input type="text" maxlength="2" id="credit_card5" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')" required>/
				<input type="text" maxlength="2" id="credit_card6" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')" required>
				<input type="text" maxlength="3" id="credit_card7" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')" required></div>
			</div>
		</div>
		</div>
			<div id="declareWrapper">
				<div id="declareTitle">線上信用卡交易隱私權聲明</div>
					<div id="declareContent">
						為讓您安心使用本行手機信用卡服務，本行在此聲明尊重並依法保護您個人的隱私權，特
						此向您說明本服務的隱私權保護政策如下：<br>
						<b>信用卡資料之運用政策</b><br>
						您於本服務所輸入的信用卡資料，將不會提供給第三人，其申請本服務過程係由
						本服務適用裝置，將卡片號碼透過國際組織提供予本行驗證，卡片交易資訊則係
						透過 Visa、MasterCard 等國際組織處理，卡片號碼與交易明細皆不儲存於適用裝
						置，保護您的個人與信用卡資料。<br>
						<b>本服務與第三者共用個人資料之政策</b><br>
						本服務絕對不會任意出售、交換、出租或以其他變相之方式，將您的個人與信用
						卡資料揭露予其他團體或個人。惟有下列二種情形，本服務會與第三人共用您的
						個人、信用卡資料：<br>
						<b>經過您的事前同意或授權允許時。</b><br>
						司法單位或其他主管機關經合法正式的程序要求時。<br>
						<b>網站隱私權政策的修改</b><br>
						本行將視需要隨時修改本服務所提供的隱私權保護聲明，以落實保障您的隱私權。
						建議您再次來訪時，可重新瞭解我們新的隱私權政策及其改變。<br>
						<b>消費者聯絡資訊</b>
						本服務為保護使用者個人資料、維護隱私權，特訂定本隱私權保護政策，若您對
						於本隱私權保護政策、或與個人資料有關之相關事項有任何疑問時，皆可利用本
						網站”聯絡我們” 項目與本行聯絡，本行將提供最完整的說明。
					</div>
				</div>
				<!-- 隱藏欄位區 -->
				<input type="hidden" name="mem_id_hidden" id="mem_id_hidden">
				<input type="hidden" name="total_hidden" id="total_hidden">
				<input type="hidden" name="cart_sub_total_hidden" id="cart_sub_total_hidden">
				<input type="hidden" name="creditcard_num_hidden" id="creditcard_num_hidden">
				<input type="hidden" name="discount_hidden" id="discount_hidden">
				<input type="hidden" name="order_date" id="order_date">
				<input type="hidden" name="sql_order_item" id="sql_order_item">
				<!-- 隱藏欄位區 end -->
	</div>						
						

<div id="button">
	<a href="input_cart.php" class="highlight" id="backToShop"><input type="button" name="" value="上一步"></a>
	<a class="highlight"><input type="submit" name="" id="nextStep" class="highlight" value="確認結帳"></a>
</div>
</form>
<script src="js/00nav.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
window.addEventListener("load",showMemberInfo);
window.addEventListener("load",bindToHiddenName);
function showMemberInfo(){
	// 連線資料庫取得會員資料
	var storage = localStorage;
	var mem_id = storage.getItem("mem_id");
	var xhr = new XMLHttpRequest();
	xhr.onload = function (){
	if( xhr.status == 200){ //OK
	    if( xhr.responsetText == "sqlerror"){
	        alert("Server端無法正常運作");
	    }else{
	    //show會員資料
	    document.getElementById("mem_nick").innerHTML = xhr.responseText.split("/")[0];
	    document.getElementById("mem_mail").innerHTML = xhr.responseText.split("/")[1];
	    document.getElementById("mem_points").innerHTML = parseInt(xhr.responseText.split("/")[2]);
	    }
	    }
	}
	var url = "show_member_info.php?mem_id=" + mem_id;
	xhr.open("get",url, true);
	xhr.send(null);
}

document.getElementById("credit_card1").addEventListener("change",checkLength);
document.getElementById("credit_card2").addEventListener("change",checkLength);
document.getElementById("credit_card3").addEventListener("change",checkLength);
document.getElementById("credit_card4").addEventListener("change",checkLength);
document.getElementById("credit_card5").addEventListener("change",checkMonth);
document.getElementById("credit_card6").addEventListener("change",checkYear);
document.getElementById("credit_card7").addEventListener("change",checkVerify);
function checkLength(){
	var num = $(this).val();
	var id  = $(this).attr("id").substr(-1);
	if(num < 1000){
		alert("數字長度不對！請重新輸入");
		$(this).val("");
		$("#nextStep").click(function(){
			alert("請確認信用卡為十六碼。");
		})
	}
}
function checkMonth(){
	var month = $(this).val();
	var month_array = ["01","02","03","04","05","06","07","08","09","10","11","12"];
	if( month_array.indexOf(month) < 0 ){
		alert("到期月錯誤！請重新輸入");
		$(this).val("");
	}
}

function checkYear(){
	var year = $(this).val();
	var year_array = [];
	var d = new Date();
	var y = d.getFullYear()
	for(var i=0 ; i<10 ; i++){
		year_array[i] = (y+i).toString().substr(2,2);
		console.log(year_array[i]);
	}
	if( year_array.indexOf(year) < 0 ){
		alert("到期年錯誤！請重新輸入");
		$(this).val("");
	}
}

function checkVerify(){
	var num = $(this).val();
	var id  = $(this).attr("id").substr(-1);
	if(num < 100){
		alert("驗證碼長度不對！請重新輸入");
		$(this).val("");
		$("#nextStep").click(function(){
			alert("請確認驗證碼格式。");
		})
	}
}

function bindToHiddenName(){
	document.getElementById("cart_sub_total_hidden").value = document.getElementById("cart_sub_total").innerHTML;
	document.getElementById("credit_card7").onchange = function(){
		document.getElementById("discount_hidden").value = document.getElementById("points").value;
		var creditcard_num = document.getElementById("credit_card1").value+
						 document.getElementById("credit_card2").value+
						 document.getElementById("credit_card3").value+
						 document.getElementById("credit_card4").value;
		document.getElementById("creditcard_num_hidden").value = creditcard_num;
	}
}
</script>
</body>
</html>