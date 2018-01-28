<?php
ob_start();
session_start();
$pre_url=$_SERVER['HTTP_REFERER'];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>FA未來主題樂園 | 會員註冊</title>
<link rel="icon" href="img/favicon.ico" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/header.css">
<style type="text/css">
</style>
</head>
<style type="text/css">
*{
	font-family: 微軟正黑體;
	color: azure;
	/*outline: 1px solid red;*/
	margin: 0;
}
body{
	user-select: none;
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

#signupwrapper{
	width: 320px;
	height: 480px;
	margin : 130px auto 0 auto;
	background-color: rgba(11,51,50,0.7);
	box-shadow: 0 0 1px rgba(55,255,243,0.8),0 0 3px rgba(55,255,243,0.5),0 0 5px rgba(55,255,243,0.3);
	text-align: center;
	padding: 20px;
}.title{
	font-size: 28px;
	margin: 20px auto 0 auto;
}
.subtitle{
	font-size: 14px;
	color: #dedede;
}
.inputdiv{
	width: 95%;
	height: 30px;
	position: relative;
	margin: 20px auto 10px auto;
}.inputTitle,.inputbox,.hint{
	vertical-align: middle;
}
.inputTitle{
	display: inline-block;
	width: 15%;
	height:100%;
	font-size: 16px;
	text-align: left;
}.inputbox{
	display: inline-block;
	float: right;
	width: 85%;
	height:100%;
}.inputbox input:first-child{
	color: #222;
	width: 100%;
	height: 23px;
	font-size: 16px;
	background-color: #cdcdcd;
	border-radius: 10px;
	text-indent: 20px;
	box-shadow: none;
	border: none;
	outline: none;
	margin: 0 auto;
}
.hint{
	font-size: 12px;
	color: #ffc116;
	height: 30px;
	position: absolute;
	right: 5%;
}
.hint:nth-of-child(2){
	right:10%;
}
.float_right{
	color: azure;
	font-size: 12px;
	line-height: 35px;
	width: 35px;
	height: 35px;
	position: absolute;
	top: 15px;
	right: 4%;
	border-radius: 100%;
	cursor: pointer;
}.float_right_gray_back{
	background-color: #999;
}
#btn{
	margin: 25px 0;
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
			color: #444;
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

@media screen and (max-width: 413px){
	#signupwrapper{
		width: 80%;
		height:500px;
		margin-top: 80px;
	}
	.btn{
		width: 100px;
		margin: 0;
	}
}


.fa{
	transform: scale(1);
	position: relative;
	top:3px;
	right:-10px;
	color: #ff6600;
}
.ps_show{
	visibility: visible;
}
.ps_hidden{
	visibility: hidden;
}
.ps_verify{
	position: absolute;
	top:0;
	left: 20%;
	visibility: hidden;
	width: 256px;
	height: 23px;
	float: right;
	color: #222;
	font-size: 16px;
	background-color: #cdcdcd;
	border-radius: 10px;
	text-indent: 20px;
	box-shadow: none;
	border: none;
	outline: none;
	margin: 0 auto;
}.ps_verify_show{
	visibility: visible;
}.show_icon{
	position: absolute;
	top:3px;
	right:-5px;
	width: 100px;
	color: #ff6600;
}



</style>
<body>

<!-- ==========================PHP部分更改到此/以下只需追加園區地圖id====================== -->

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
            	<img src="img/hover-tri.png" class="nav_hover">
                <a href="facilityInfo.php">設施介紹</a>
            </li>
        </ul>
        <h1 style="display: none">FutureAtlas_未來主題樂園</h1>
        <a href="home.php" class="logo_a">
            <img src="img/LOGO.png" class="logo">
        </a>
        <ul class="ul_right">
            <li id="nav_here">
            	<img src="img/hover-tri.png" class="nav_hover">
                <a href="#page2" id="NavClose">園區地圖</a>
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

<img src="img/register_bg.jpg" class="bgi">

<div id="signupwrapper">
<div class="title">註冊會員</div>
<div class="subtitle">立即享受50分積分，可<span style="color:white">折抵票券消費</span>！<br>對設施進行評價後可得到積分，繼續玩透透！</div>

<form action="registerheadforindex.php" method="post">

<div class="inputdiv">
	<div class="inputTitle">帳號</div>
	<div class="inputbox">
		<input type="text" name="mem_name" id="mem_name" maxlength="20" placeholder="6-20字英數" required>
		<div class="hint" id="check_mem_id_hint_check" style="color: #ff6600">請輸入帳號</div>
	</div>
</div>
<div class="inputdiv">
	<div class="inputTitle">暱稱</div>
	<div class="inputbox">
		<input type="text" name="mem_nick" id="mem_nick" placeholder="英數最多20字" required>
	</div>
</div>
<div class="inputdiv">
	<div class="inputTitle">密碼</div>
	<div class="inputbox">
		<input type="password" class="ps_show" name="password" id="mem_password" maxlength="20" required>
		<input type="text" class="ps_verify" id="mem_password_text" maxlength="20">
		<div id="check_mem_id" class="float_right">
			<i class="fa fa-eye-slash" id="see_psw"></i>
		</div>
	</div>
</div>
<div class="inputdiv">
	<div class="inputbox">
		<input type="password" class="ps_show" id="mem_password_verify" maxlength="20" placeholder="再次輸入密碼" required>
		<input type="text" class="ps_verify" id="mem_password_verify_text" maxlength="20">
	</div>
</div>
<div class="inputdiv">
	<div class="inputTitle">信箱</div>
	<div class="inputbox">
		<input type="email" name="mem_mail" required></div>
</div>
<div class="inputdiv">
	<div class="inputTitle">手機</div>
	<div class="inputbox">
		<input type="text" name="mem_phone" id="mem_phone" maxlength="10" placeholder="格式：0912345678" required>
	</div>
</div>
<div id="btn">
	<input type="reset" value="重填" class="btn">
	<input type="submit" value="送出" class="btn">
</div>
</form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	// 密碼值存入text欄位	
	$("#mem_password").change(function(){
		var psw = $(this).val();
		$("#mem_password_text").val(psw);
	});
	$("#mem_password_verify").change(function(){
		var psw_verify = $(this).val();
		$("#mem_password_verify_text").val(psw_verify);
	});
	// 看密碼
	$("#see_psw").mouseenter(function(){
		$(".ps_show").addClass("ps_hidden");
		$(".ps_verify").addClass("ps_verify_show");
		if($(this).hasClass("fa-eye-slash")){
			$(this).removeClass("fa-eye-slash").addClass("fa-eye");
		}else{
			$(this).removeClass("fa-eye").addClass("fa-eye-slash");
		}
		$(".fa").css("color","#35ffea").css("filter","brightness(2)");
	});
	$("#see_psw").mouseleave(function(){
		$(".ps_show").removeClass("ps_hidden");
		$(".ps_verify").removeClass("ps_verify_show");
		if($(this).hasClass("fa-eye-slash")){
			$(this).removeClass("fa-eye-slash").addClass("fa-eye");
		}else{
			$(this).removeClass("fa-eye").addClass("fa-eye-slash");
		}
		$(".fa").css("color","#ff6600").css("filter","brightness(1)");;
	});
})
// 密碼驗證正確
document.getElementById("mem_password_verify").addEventListener("blur",verify_password);
function verify_password(){
	var mem_password		= document.getElementById("mem_password").value;
	var mem_password_verify = document.getElementById("mem_password_verify").value; 
	if(mem_password != mem_password_verify){
		alert("兩次密碼要一樣唷！");
		document.getElementById("mem_password_verify").value = "";
	}
}
// 判斷這個帳號是不是有人用過
document.getElementById("mem_name").addEventListener("keyup",check_mem_Name);
function check_mem_Name(){
	var mem_name = document.getElementById("mem_name").value;
	var xhr = new XMLHttpRequest();
	xhr.onload = function(){
		if( xhr.readyState === 4 && xhr.status === 200){ //OK
			if 		(xhr.responseText="帳號可使用"){
				document.getElementById("check_mem_id_hint_check").innerHTML = xhr.responseText;
			}else if(xhr.responseText="帳號已使用"){
				document.getElementById("check_mem_id_hint_cross").innerHTML = xhr.responseText;
				document.getElementById("mem_name").value = "";
			}
		}
	}
	var url = "check_mem_name_duplicate.php?mem_name=" + mem_name;
	xhr.open("get",url, true);
	xhr.send(null);
}
// 帳號、密碼、暱稱正規表達式
document.getElementById("mem_name").onchange = function(){
	var pattern = new RegExp('[^A-Za-z0-9_]');
	var str = document.getElementById("mem_name").value;
	if(str.match(pattern)){
	    alert("格式錯誤，不能含有特殊字元及空白");
	    document.getElementById("mem_name").value = "";
	}
}
document.getElementById("mem_password").onchange = function(){
	var pattern = new RegExp('[^A-Za-z0-9_]');
	var str = document.getElementById("mem_password").value;
	if(str.match(pattern)){
	    alert("格式錯誤，不能含有特殊字元及空白");
	}
}
document.getElementById("mem_nick").onchange = function(){
	var pattern = new RegExp('[^A-Za-z0-9_]');
	var str = document.getElementById("mem_nick").value;
	if(str.match(pattern)){
	    alert("格式錯誤，不能含有特殊字元及空白");
	    document.getElementById("mem_mem_nickname").value = "";
	}
}
// 手機正規表達式
document.getElementById("mem_phone").onchange = function(){
	var pattern = new RegExp(/^09\d{8}$/);
	var str = document.getElementById("mem_phone").value;
	if(!str.match(pattern)){
	    alert("手機格式錯誤。");
	    document.getElementById("mem_phone").value = "";
	}
}
</script>
</body>
</html>