<?php
ob_start();
session_start();
setcookie("order_no","",time()-3600);
setcookie("mem_id","",time()-3600);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>FA後台</title>
<!-- ======請複製==== -->
<link rel="stylesheet" type="text/css" href="css/RESET.css">
<link rel="stylesheet" type="text/css" href="css/header.css">
<!-- ========== -->
<style type="text/css">
*{
	/*outline: 1px solid red;*/
	box-sizing: border-box;
	font-family: 微軟正黑體;
}
body{
	background-color: #222;
	position: relative;
}
#fullBlack{
    position: fixed;
    top:0;
    left: 0;
    width: 100%;
    height: 100%;
    background: repeating-linear-gradient(transparent 0px, transparent 1px,transparent 1px, transparent 3px,rgba(0,0, 0,0.5) 3px, rgba(0, 0, 0,0.8) 4px);
    background-color: rgba(0,0,0,0.5);
    /*display: none;*/
}
#lightBox{
  width: 450px;
  height: 250px;
  border: 2px solid rgba(55,255,243,0.8);
  box-shadow: 0 0 1px rgba(55,255,243,0.8),0 0 3px rgba(55,255,243,0.5),0 0 5px rgba(55,255,243,0.3);
  background-color: black;
  position: fixed;
  top:50%;
  left: 50%;
  padding: 15px;
  transform: translate(-50%,-50%);
  text-align: center;

}

#lightBox .msg{
	padding: 15% 10%;
	height: 85%;
	color: azure;
	line-height: 24px;
}
#lightBox a{
  /*margin: 0 30px;*/
  letter-spacing: 2px;
  padding: 5px 20px;
  background-color: black;
  color: rgb(55,255,243);
  border: 1px solid rgba(55,255,243,0.8);
  box-shadow: 0 0 1px rgba(55,255,243,0.8),0 0 3px rgba(55,255,243,0.5),0 0 5px rgba(55,255,243,0.3);
}
</style>
</head>
<body>
<div class="nav">
    <div class="ul_box">
        <ul class="ul_left">
            <li>
                <a href="Theaterbuyticket.php">劇場購票</a>
            </li>
            <li>
                <a href="facilityBuyTicket.php">設施購票</a>
            </li>
            <li>
                <a href="facilityInfo.php">設施介紹</a>
            </li>
        </ul>
        <h1 style="display: none">FutureAtlas_未來主題樂園</h1>
        <a href="index.php" class="logo_a">
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

  // 產生要傳送給驗票介面的cookie
  setcookie('order_id',$pure_no);
  setcookie('mem_no',$mem_id);
?>

<div id="fullBlack">
	<div id="lightBox">
		<p class="msg"><?php echo "購票成功！<br>您的訂單編號為：".$pure_no; ?></p>
		<a href="see_tickets.php" id="confirm">確認</a>
	</div>
</div>

<?php

	header("refresh:3; url=see_tickets.php");

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
// 確認結帳後,清空localStorage儲存票券資料
$(document).ready(function(){
  var storage = localStorage;
  storage.removeItem("facility_ticket_list");
  for(var i=11;i>=0;i--){
    storage.removeItem(i);
    console.log("清除2");
  }
});
</script>
</body>
</html>