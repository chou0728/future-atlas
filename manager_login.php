<?php
ob_start();
session_start();
if(isset($_SESSION["login_error"])==true){
	unset($_SESSION["login_error"]);
	echo "<script>alert('管理員帳密錯誤。');</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>manager_login</title>
<link rel="stylesheet" type="text/css" href="css/header.css">
<style type="text/css">
body{
	background-color: #222;
}
*{
	margin:0;
	padding:0;
	font-size: 0;
	color: white;
	font-family: 微軟正黑體;
}
#loginWrapper{
	width: 35%;
	margin: 50px auto 0 auto;
	text-align: center;
	padding: 20px;
	padding-bottom: 40px;
	margin-top: 100px;
	background-color: #555;
}
#loginTitle{
	font-size: 36px;
	margin: 20px auto;
}
.inputDiv{
	margin: 20px auto;
	position: relative;
	width: 70%;
}
.inputTitle{
	font-size: 16px;
	display: inline-block;
	position: relative;
}
.inputDiv input{
	color: #222;
	width: 50%;
	height: 23px;
	font-size: 16px;
	background-color: #dedede;
	border-radius: 10px;
	text-indent: 20px;
	box-shadow: none;
	border: none;
	outline: none;
}
@media screen and (max-width: 767px){
	#loginWrapper{
		width: 70%;
	}.inputTitle{
		position: absolute;
		top: 0;
		left: 20px;
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
			width: 150px;/*依照自己頁面的需求自行調整*/
			height: 35px;/*依照自己頁面的需求自行調整*/
			text-align: center;/*文字置中*/
			line-height: 35px;/*與height等高:文字置中*/
			background-color: rgb(255, 193, 22);
			color: white;
			position: relative;
			transition: background-color .2s linear;
			border: none;
			outline: none;
			display: inline-block;
			cursor: pointer;
		}.btn:nth-of-type(2){
			margin-left: 10px;
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
		display: block;
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

<div class="nav">
    <div class="ul_box">
        <h1 style="display: none">FutureAtlas_未來主題樂園</h1>
        <a href="index.html#page1" class="logo_a">
            <img src="img/LOGO.png" class="logo">
        </a>
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

<div id="loginWrapper">
<div id="loginTitle">管理員登入</div>
<form action="manager_login_php.php" method="post">
	<div class="inputDiv">
		<div class="inputTitle">帳號：
			<div id="hint">
				<?php
					if(isset($_SESSION["banned"]) == true){
						echo "此帳號已被停權";
						unset($_SESSION["banned"]);
					}
				?>
			</div>
		</div>
		<input type="text" name="manager_name" required>
	</div>
	<div class="inputDiv">
		<div class="inputTitle">密碼：</div>
		<input type="password" name="password" required>
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
