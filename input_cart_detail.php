<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<title>input_cart_detail</title>
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
 /* outline: 1px solid rgba(100,255,243,1);*/
}
</style>
<body>
<div class="header">
    <ul class="ul_top">
        <div class="lever">
            <img src="img/Usericon1.png">
        </div>
        <li class="li_top">
            <a href="SignUp.html" id="registerUser">
                <img src="img/member/member_0.png">
                <span class="register">註冊</span>
            </a>
        </li>
        <li class="li_top">
            <a href="#" id="singUpBtn">
                <img src="img/member/member_1.png">
                <span class="login">登入</span>
            </a>
        </li>
        <li class="li_top">
             <a href="input_cart.html">
                <img id="cartimgid" src="img/cart/wallet_0.png">
                <span id="howmanytickets">0</span>
            </a>
                <div id="showCartContent">購物車內容
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
                <a href="facilityBuyTicket.html">設施購票</a>
            </li>
            <li>
                <a href="facilityInfo.html">設施介紹</a>
            </li>
        </ul>
        <h1 style="display: none">FutureAtlas_未來主題樂園</h1>
        <a href="index.html#page1" class="logo_a">
            <img src="img/LOGO.png" class="logo">
        </a>
        <ul class="ul_right">
            <li>
                <a href="index.html#page2">園區地圖</a>
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
<!-- 會員資訊 -->
<?php
$mem_id = ?>
<script>
	var memId = localStorage; storage.getItem("memId");
</script>

<?php
try {
	require_once("php/connectBooks.php");
	$sql = "select * from member where mem_id = :mem_id";
	$statement = $pdo -> prepare($sql);
	$statement->bindParam("mem_id",$mem_id);

} catch (Exception $e) {
	
}

?>
<div id="detailWrapper">
	<h1 id="title">確認訂單明細</h1>
	<table id="member_info" cellspacing="0">
		<tr><th colspan="2" class="tbtitle">會員資訊</th></tr>
		<tr>
			<td>暱稱</td><td id="member_id"><?php echo $mem_nick ?></td>
		</tr>
		<tr>
			<td>Email</td><td id="member_email"><?php echo $mem_email ?></td>
		</tr>
		<tr>
			<td>積分</td><td id="member_points"><?php echo $mem_points ?></td>
		</tr>
	</table>

	<!-- 購票明細 -->
	<table id="ticket_rows" cellspacing="0">
		<tr><th colspan="8" class="tbtitle" id="detail_row_title" style="font-size: 24px;">訂單明細</th></tr>
		<tr id="ticket_row">
			<th id="fn_th">設施編號</th>
			<th id="icon_th">圖示</th>
			<th id="fname_th">設施名稱</th>
			<th id="tt_th">票種</th>
			<th id="fare_th">票價</th>
			<th id="tn_th" style='text-align: right'>張數</th>
			<th id="subtotal_th" style='text-align: right' colspan="2">小計</th
			>
		</tr>
		<tr id="input_discount"><th colspan="8" class="title">選擇是否使用積分</th></tr>
		<tr>
			<td style="width: 350px; text-align: right" colspan="7" id="discount_input">
				<input type="radio" name="points" class="points"> 之後再使用
				<input type="radio" name="points" class="points"> 使用
				<input type="number" id="points" class="points" min="0"> 點
				<div id="points_confirm">確定</div>
					<div id="points_remain">(剩餘點數：
						<span id="points_remain_input"></span>)點
					</div>
			</td>
			<td id="discount">0</td>
		</tr>
		<tr id="cart_total_row">
			<td colspan="7">結帳金額：</td>
			<td name="total" id="total"></td>
		</tr>
	</table>


	<!--輸入信用卡 -->
	<table id="pay_info">
		<tr>
			<th class="tbtitle" colspan="2">輸入信用卡</th>
			<td rowspan="5" colspan="3">
				<div id="declareWrapper">
					<div id="declareTitle">
						線上信用卡交易隱私權聲明
					</div>	
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
			</td>
		</tr>
		<tr><td colspan="2">信用卡卡號</td></tr>
		<tr>
			<td colspan="2" class="credit_card" name="credit_card" id="credit_card">
				<input type="text" maxlength="4" id="credit_card1" onkeyup="setBlur(this,'credit_card2');this.value=this.value.replace(/[^0-9]/g,'')">-
				<input type="text" maxlength="4" id="credit_card2" onkeyup="setBlur(this,'credit_card3');this.value=this.value.replace(/[^0-9]/g,'')">-
				<input type="text" maxlength="4" id="credit_card3" onkeyup="setBlur(this,'credit_card4');this.value=this.value.replace(/[^0-9]/g,'')">-
				<input type="text" maxlength="4" id="credit_card4" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')">
			</td>
		<tr>
			<td>到期年月</td><td>驗證碼</td>
		</tr>
		<tr>
			<td>
				<input type="text" maxlength="2" min="1" max="12" id="credit_card5" onkeyup="setBlur(this,'credit_card6');this.value=this.value.replace(/[^0-9]/g,'')">/
				<input type="text" maxlength="2" id="credit_card6" onkeyup="setBlur(this,'credit_card7');this.value=this.value.replace(/[^0-9]/g,'')">
			<td>
				<input type="text" maxlength="3" id="credit_card7" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')"></td>
			</td>
		</tr>
		</tr>
	</table>
</div>

<div id="button">
	<a href="input_cart.html" class="highlight" id="backToShop">上一步</a>
	<a href="MembersOnly.html" id="nextStep" class="highlight">確認結帳</a>
</div>
<script src="js/00nav.js"></script>
</body>
</html>