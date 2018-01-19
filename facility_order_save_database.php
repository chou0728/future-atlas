<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>FA後台</title>
	<!-- ======請複製==== -->
	<link rel="stylesheet" type="text/css" href="css/RESET.css">
	<link rel="stylesheet" type="text/css" href="css/11back_nav.css">
	<!-- ========== -->
<style type="text/css">


</style>
</head>
<body>
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
        <a href="#page1" class="logo_a">
            <img src="img/LOGO.png" class="logo">
        </a>
        <ul class="ul_right">
            <li>
                <a href="#page2" id="NavClose">園區地圖</a><!-- ===請追加ID=== -->
            </li>
            <li>
                <a href="activity.php">活動月曆</a>
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


<?php
try{
	require_once("php/connectBooks.php");
	//啟動交易管理
	// $pdo->beginTransaction();

	$mem_id = $_SESSION["mem_id"];
	$subtotal = $_REQUEST["cart_sub_total_hidden"];
	$discount = $_REQUEST["discount_hidden"];
	$credit_card_num = $_REQUEST["credit_card1"].$_REQUEST["credit_card2"].$_REQUEST["credit_card3"].$_REQUEST["credit_card4"];
	$order_date = date("Y"."/"."m"."/"."d");
	// 訂單主檔
	$sql_order = "insert into facility_order (member_id, order_date, original_total, discount, creditcard_num)
values (:mem_id,:order_date,:subtotal, :discount, :credit_card_num);";
	
	$order = $pdo->prepare($sql_order);
	$order -> bindParam(":mem_id",$mem_id);
	$order -> bindParam(":order_date",$order_date);
	$order -> bindParam(":subtotal",$subtotal);
	$order -> bindParam(":discount",$discount);
	$order -> bindParam(":credit_card_num",$credit_card_num);
	$order -> execute();
	
	$order_no = "(".$pdo->lastInsertId();
	$pure_no = $pdo->lastInsertId();
	// 訂單副檔
	$newStr = explode('/',$_REQUEST["sql_order_item"]);
	$sql_order_item = implode($order_no, $newStr);
	$ul4 = -(strlen($sql_order_item));
	$orderItems = $pdo -> prepare($sql_order_item);
	$orderItems -> bindParam(":order_no",$order_no);
	$orderItems -> execute();
?>
	
	<div id="lightBox">
		<div class="msg">
			<? echo "購買成功！您的訂單編號為：".$pure_no; ?>	
		</div>
	</div>

<?php

	header("refresh:5; url=MembersOnly.html");

	// 扣除會員積分
	$sql_discount = "update member set mem_points = mem_points - :discount where mem_id = :mem_id";
	$member = $pdo->prepare($sql_discount);
	$member -> bindParam(":discount",$discount);
	$member -> bindParam(":mem_id",$mem_id);
	$member -> execute();
}catch(PDOException $ex){ //php error
	echo "資料庫操作失敗,原因：",$ex->getMessage(),"<br>";
	echo "行號：",$ex->getLine(),"<br>";
}
?>
</body>
</html>