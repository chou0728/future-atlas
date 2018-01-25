<?php
ob_start();
session_start();
if(isset($_SESSION["login_error"])==true){
	unset($_SESSION["login_error"]);
	echo "<script>alert('管理員帳密錯誤。');</script>";
}if(isset($_SESSION["banned"])==true){
	unset($_SESSION["banned"]);
	echo "<script>alert('此帳號已被停權。');</script>";
}


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>FA後台管理系統 | 登入</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link rel="stylesheet" type="text/css" href="css/header.css">
<style type="text/css">
*{
	margin:0;
	padding:0;
	font-size: 0;
	color: white;
	font-family: 微軟正黑體;
	/*outline: 1px solid red;*/
}

.bgi{
	position: fixed;
	top:0;
	left:0;
	width: 100%;
	height: 100%;
	z-index: -100;
	filter: brightness(0.4) blur(1.5px) sepia(0.1);
}

#loginWrapper{
	width: 370px;
	margin: 50px auto 0 auto;
	text-align: center;
	padding: 20px;
	padding-bottom: 40px;
	margin-top: 200px;
	background-color: rgba(11,51,50,0.8);
	box-shadow: 0 0 1px rgba(55,255,243,0.8),0 0 3px rgba(55,255,243,0.5),0 0 5px rgba(55,255,243,0.3);
}
#loginTitle{
	font-size: 28px;
	margin: 20px auto;
	color: azure;
	font-weight: normal;
}
.inputDiv{
	margin: 20px auto;
	position: relative;
	width: 80%;
	text-align: center;
}
.inputTitle{
	font-size: 16px;
	display: inline-block;
	position: relative;
	color: azure;
}
.inputDiv input{
	color: #222;
	width: 65%;
	height: 26px;
	font-size: 16px;
	background-color: #cdcdcd;
	border-radius: 10px;
	text-indent: 20px;
	box-shadow: none;
	border: none;
	outline: none;
	font-weight: 200;
}
@media screen and (max-width: 767px){
	#loginWrapper{
		width: 80%;
	}#loginTitle{
		font-size: 28px;
		margin-bottom: 40px;
	}
	.inputTitle{
		display: block;
		position: absolute;
		left: 10px;
	}.inputDiv{
		width: 100%;
	}
	.inputDiv input{
		width: 75%;
		display: block;
		margin: 0 auto;
	}
}
@media screen and (min-width: 768px) and (max-width: 1200px){
	#loginWrapper{
		width: 40%;
	}
}
@media screen and (min-width: 1200px){

}
		/*統一按鈕外觀*/
		.btn{
			font-size: 16px;
			display: block;
			width: 90px;/*依照自己頁面的需求自行調整*/
			height: 35px;/*依照自己頁面的需求自行調整*/
			text-align: center;/*文字置中*/
			line-height: 35px;/*與height等高:文字置中*/
			background-color: rgb(255, 193, 22);
			color: #444;
			position: relative;
			transition: background-color .2s linear;
			border: none;
			outline: none;
			display: inline-block;
			cursor: pointer;
			margin: 15px 0 20px 0;
		}.btn:nth-of-type(2){
			margin-left: 20px;
		}
		.btn:after{
			content: "";
			position: absolute;
			top:50%;
			left: 50%;
			transform: translate(-50%,-50%);
			width: 100%;
			height: 100%;
			border: 2px solid rgba(255, 193, 22,0.6);
			transition: all .2s linear;
		}
		.btn:hover{
			background-color: rgba(255, 193, 22,0.9);
			color: black;
		}
		.btn:hover:after{
			width: 108%;
			height: 125%;
			border: 2px solid rgba(255, 193, 22,0.8);
		}
@media screen and (max-width: 767px){
	.btn{
		width: 100px;
		/*display: block;*/
		margin: 10px auto;
	}
}
@media screen and (min-width: 768px) and (max-width: 1200px){
	.btn:nth-of-type(2){
			margin-left: 10px;
		}
}
@media screen and (min-width: 1200px){
	.btn:nth-of-type(2){
			margin-left: 10px;
		}
}#hint{
	width: 200px;
	font-size: 16px;
	color: red;
	position: absolute;
	top: 0;
	left: 200px;
}
</style>
</head>
<body>



<?php

//抓到是從哪邊進來的並帶到url給manager_login_php.php

	$filename =  $_REQUEST["filename"];

?>


<div class="nav">
    <div class="ul_box">
        <h1 style="display: none">FutureAtlas_未來主題樂園</h1>
        <a href="index.html#page1" class="logo_a">
            <img src="img/LOGO.png" class="logo">
        </a>
    </div>
</div>
<img src="img/manager_login_bg.jpg" class="bgi">
<div id="loginWrapper">
<div id="loginTitle">管理員登入</div>






<form action="manager_login_php.php?filename=<?php echo $filename ?>" method="post">
	<div class="inputDiv">
		<div class="inputTitle">
		</div>
		<input type="text" name="manager_name" maxlength="20" placeholder="管理員帳號" required>
	</div>
	<div class="inputDiv">
		<div class="inputTitle"></div>
		<input type="password" name="password" maxlength="20" placeholder="管理員密碼" required>
	</div>
	<div id="btn">
		<input type="reset" class="btn" name="" value="重設">
		<input type="submit" class="btn" name="" value="確認">
	</div>
</form>
</div>
<script type="text/javascript">
// 若登出，將manager_id存為0
window.onload = function(){
	var storage = localStorage;
	storage.setItem("manager_id",0);
}
</script>
</body>
</html>
