<?php 
ob_start();
session_start();
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

	echo "購買成功！您的訂單編號為：".$pure_no;
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