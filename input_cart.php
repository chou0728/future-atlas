<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/header.css">
<link rel="stylesheet" type="text/css" href="css/login.css">
<link rel="stylesheet" type="text/css" href="css/cart.css">
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
#all-page{
	position: absolute;
	top:0;
	left: 0;
	width: 100%;
	height: 100%;
	background: repeating-linear-gradient(transparent 0px, transparent 1px,transparent 1px, transparent 3px,rgba(0,0, 0,0.5) 3px, rgba(0, 0, 0,0.8) 4px);
	background-color: #222;
	display: none;
	opacity: 0.7;
}
</style>
<link rel="stylesheet" type="text/css" href="css/login.css">
<title>檢視購物車</title>
<body>
<div class="header">
    <ul class="ul_top">
        <div class="lever">
            <img src="img/Usericon1.png">
        </div>
        <li class="li_top">
            <a href=<?php
                if(isset($_SESSION["mem_id"])===true){
                            echo "'javascript:void(0)'";
                        }else{
                            echo "'register.html'";
                        }
            ?> id="registerUser">
                <img src="img/member/member_0.png">
                <span class="register">
                    <?php
                        if(isset($_SESSION["mem_id"])===true){
                            echo "會員專區";
                        }else{
                            echo "註冊";
                        }
                    ?>
                </span>
            </a>
        </li>
        <li class="li_top">
            <a href=<?php
                        if(isset($_SESSION["mem_id"])===true){
                            echo"'logoutheadforindex.php'";
                        }else{
                            echo"'javascript:void(0)'";
                        }
                    ?> id="singUpBtn">
                <img src="img/member/member_1.png">
                <span class="login">
                    <?php
                        if(isset($_SESSION["mem_id"])===true){
                            echo"登出";
                        }else{
                            echo"登入";
                        }
                    ?>
                </span>
            </a>
        </li>
        <li class="li_top">
             <a href="input_cart.php">
                <img id="cartimgid" src="img/cart/wallet_0.png">
                <span id="howmanytickets">0</span>
            </a>
                <div id="showCartContent">預覽購物車
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
        <a href="====index.php" class="logo_a">
            <img src="img/LOGO.png" class="logo">
        </a>
        <ul class="ul_right">
            <li>
                <a href="index.html#page2" id="NavClose">園區地圖</a>
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
	<!-- 登入燈箱 -->
<div id="all-page"></div><!-- 叫出時背景-->
<div id="lightBox">
	<div id="cancel">
		<div class="leftLine"></div>
		<div class="rightLine"></div>
	</div>
		
		<form class="singUp" action="loginheadforindex.php" method="post">
			<h2>會員登入</h2>
			<div class="text">
				會員帳號：<input type="text" name="memName" id="memId" value="" required placeholder="輸入帳號">
				<br>
				會員密碼：<input type="password" name="memPsw"  id="memPsw" value="" required placeholder="輸入密碼">
				<br>
			</div>
			<div class="btn">
				<input type="submit" name="" id="submit" value="登入">
				<input type="reset" name="reset" value="RESET">
        	</div>
		</form>
</div>
	<!-- login box end-->

<div id="cartWrapper">
	<div id="cartTitle">您的購物車</div>
	<form>
		<table id="cartContent" border="1" cellspacing="0">
			<tr id="cart_header">
				<th id="fn_th">設施編號</th>
				<th id="icon_th">圖示</th>
				<th id="fname_th">設施名稱</th>
				<th id="tt_th">票種</th>
				<th id="fare_th">票價</th>
				<th id="tn_th" style='text-align: right'>張數</th>
				<th id="subtotal_th" style='text-align: right'>小計</th
				>
				<th colspan="2"></th>
			</tr>
		</table>
	<div id="button">
		<a href="facilityBuyTicket.php" class="highlight" id="backToShop">繼續購物</a>
		<a href="" id="nextStep" class="highlight">下一步</a>
	</div>
	</form>
</div>
<script src="js/00nav.js"></script>
<script type="text/javascript" src="js/cart.js" async></script>
<script type="text/javascript">
function loginss(){
    // 若登入，將mem_id存入localStorage
    var storage = localStorage;
    storage.setItem("mem_id",
        <?php
            if(isset($_SESSION["mem_id"])===true){
                echo $_SESSION["mem_id"];
            }else{
                echo "0";
                // 若未登入，mem_id為0
            }
        ?>
        );
}
window.addEventListener("load",loginss);
</script>
</body>
</html>