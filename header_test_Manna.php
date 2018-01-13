<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>header_test_Manna</title>
<link rel="stylesheet" type="text/css" href="css/header.css">
<!-- <link rel="stylesheet" type="text/css" href="css/homepag.css"> -->

<style type="text/css">
body{
	background-color: #fefefe;
}
.li_top:nth-child(3) img{
	width: 40px;
}
</style>
</head>
<body>
<?php
if($_SESSION["mem_id"] != null){
	$memName = $_REQUEST["mem_name"];
	$memNick = $_REQUEST["mem_nick"];
	$memPsw = $_REQUEST["mem_password"];
	$memMail = $_REQUEST["mem_mail"];
	$memPhone = $_REQUEST["mem_phone"];

try {
	require_once("php/connectBooks.php");
	$sql = "insert into member (mem_name,mem_nick,password,mem_mail,mem_phone) values (:mem_name,:mem_nick,:password,:mem_mail,:mem_phone)";
	$pdoStatment = $pdo->prepare($sql);
	$pdoStatment->bindParam(":mem_name",$memName);
	$pdoStatment->bindParam(":mem_nick",$memNick);
	$pdoStatment->bindParam(":password",$memPsw);
	$pdoStatment->bindParam(":mem_mail",$memMail);
	$pdoStatment->bindParam(":mem_phone",$memPhone);
	$pdoStatment->execute();

} catch (PDOException $e) {
	echo "錯誤原因 : " , $e->getMessage() , "<br>";
	echo "錯誤行號 : " , $e->getLine() , "<br>";

}
}
?>
<div class="header">
	<ul class="ul_top">
		<li class="li_top">
			<a href="SignUp.html" id="registerUser">註冊</a>
		</li>
		<li class="li_top">
			<a href="#" id="singUpBtn"><?php echo $memName ?></a>
		</li>
		<li class="li_top">
			<a href="input_cart.html">
				<img src="img/cart/wallet_0.png">
			</a>
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
		<a href="index.html#page1">
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
<table>
	<tr>
		<td><?php echo $memName ?></td>
		<td><?php echo	$memNick ?></td>
		<td><?php echo $memPsw ?></td>
		<td><?php echo $memMail ?></td>
		<td><?php echo $memPhone ?></td>
	</tr>
</table>
<script type="text/javascript">
var storage = localStorage;
storage.setItem("memMail",<?php echo $memName ?>);
</script>
<!-- <script src="js/00nav.js"></script> -->
</body>
</html>