<?php 
ob_start();
session_start();
try{
	require_once("php/connectBooks.php");
	$mem_id = $_REQUEST["mem_id_hidden"];
	$subtotal = $_REQUEST["cart_sub_total_hidden"];
	$discount = $_REQUEST["discount_hidden"];
	$credit_card_num = $_REQUEST["credit_card1"].$_REQUEST["credit_card2"].$_REQUEST["credit_card3"].$_REQUEST["credit_card4"];
	$order_date = "2018-01-16";
	echo "mem_id:".$mem_id."<br>";
	echo "subtotal:".$subtotal."<br>";
	echo "discount:".$discount."<br>";
	echo "credit_card_num:".$credit_card_num."<br>";

	$sql = "insert into facility_order (member_id, order_date, original_total, discount, creditcard_num)
values (:mem_id,:order_date,:subtotal, :discount, :credit_card_num);";
	
	$order = $pdo->prepare($sql);
	$order -> bindParam(":memId",$mem_id);
	$order -> bindParam(":order_date",$order_date);
	$order -> bindParam(":subtotal",$subtotal);
	$order -> bindParam(":discount",$discount);
	$order -> bindParam(":credit_card_num",$credit_card_num);
	$order -> execute();
	echo "購買成功！請前往會員專區查看<br>系統將於 3秒後自動跳轉，若未自動跳轉請按<a href='MembersOnly.html'>會員專區</a>";
	header("refresh:5;url:MembersOnly.html");
}catch(PDOException $ex){ //php error
	echo "資料庫操作失敗,原因：",$ex->getMessage(),"<br>";
	echo "行號：",$ex->getLine(),"<br>";
}
?>