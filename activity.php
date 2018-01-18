<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<title>activity</title>
<link rel="stylesheet" type="text/css" href="css/activity_calendar.css">
<link rel="stylesheet" type="text/css" href="css/header.css">
<link rel="stylesheet" type="text/css" href="css/login.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<script src="js/modernizr.custom.97074.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
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
	position: fixed;
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
</head>
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
                			echo "<a href='MembersOnly.html'>我的資料</a>";
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
                <img src=<?php
                		if(isset($_SESSION['mem_id'])===true){
                			echo 'img/member/member_2.png';
                		}else{
                			echo 'img/member/member_1.png';
                		}
					?>>
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
                <a href="facilityBuyTicket.php">設施購票</a>
            </li>
            <li>
                <a href="facilityInfo.php">設施介紹</a>
            </li>
        </ul>
        <h1 style="display: none">FutureAtlas_未來主題樂園</h1>
        <a href="====index.php" class="logo_a">
            <img src="img/LOGO.png" class="logo">
        </a>
        <ul class="ul_right">
            <li>
                <a href="#page2" id="NavClose">園區地圖</a>
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

<div id="wrapper">

	<div id="calWrapper">
		<div id="calRight">
			<div id="showToday">
	            <div id="prevMonth">
	                <i class="fa fa-caret-up"></i>
	            </div>
	            <div id="showMonth"></div>
	            <div id="nextMonth">
	                <i class="fa fa-caret-down"></i>
	            </div>
	        </div>
		    <div id="icons">
	            <ul id="selectActivityClass">
	                <li id="icon1" class="icons">
	                    <img src="img/forthSection/theater.png" alt="劇場" title="劇場">
	                    <span>劇場時間</span>
	                </li>
	                <li id="icon2" class="icons">
	                    <img src="img/forthSection/outoforder.png" alt="維修月曆" title="維修月曆">
	                    <span>設施維修</span>
	                </li>
	                <li id="icon3" class="icons">
	                    <img src="img/forthSection/party.png" alt="開園時間" title="開園時間">
	                    <span>營業時間</span>
	                </li>
	                <li id="icon4" class="icons">
	                    <img src="img/forthSection/lecture.png" alt="展覽" title="展覽"><span>展覽時間</span>
	                </li>
	            </ul>
		    </div>
		        <div id="backToToday" style="display: none">回到今日</div>
		        <div id="clearCal" style="display: none">清空月曆</div>
		    </div>

		<div id="cal">
		    <table id="mycal" border="0" cellspacing="0" cellpadding="5">
		        <tr id="dayRow" fontColor="black" cellspacing="10">

		            <td>SUN</td>
		            <td>MON</td>
		            <td>TUE</td>
		            <td>WED</td>
		            <td>THU</td>
		            <td>FRI</td>
		            <td>SAT</td>
		        </tr>
		        <tr>
		            <td class="daysHere"></td>
		            <td class="daysHere"></td>
		            <td class="daysHere"></td>
		            <td class="daysHere"></td>
		            <td class="daysHere"></td>
		            <td class="daysHere"></td>
		            <td class="daysHere"></td>
		        </tr>
		        <tr>
		        	<td class="claContent sun"></td>
		        	<td class="claContent mon"></td>
		        	<td class="claContent tue"></td>
		        	<td class="claContent wed"></td>
		        	<td class="claContent thu"></td>
		        	<td class="claContent fri"></td>
		        	<td class="claContent sat"></td>
		        </tr>
		        <tr>
		            <td class="daysHere"></td>
		            <td class="daysHere"></td>
		            <td class="daysHere"></td>
		            <td class="daysHere"></td>
		            <td class="daysHere"></td>
		            <td class="daysHere"></td>
		            <td class="daysHere"></td>
		        </tr>
		        <tr>
		        	<td class="claContent sun"></td>
		        	<td class="claContent mon"></td>
		        	<td class="claContent tue"></td>
		        	<td class="claContent wed"></td>
		        	<td class="claContent thu"></td>
		        	<td class="claContent fri"></td>
		        	<td class="claContent sat"></td>
		        </tr>
		        <tr>
		            <td class="daysHere"></td>
		            <td class="daysHere"></td>
		            <td class="daysHere"></td>
		            <td class="daysHere"></td>
		            <td class="daysHere"></td>
		            <td class="daysHere"></td>
		            <td class="daysHere"></td>
		        </tr>
		        <tr>
		        	<td class="claContent sun"></td>
		        	<td class="claContent mon"></td>
		        	<td class="claContent tue"></td>
		        	<td class="claContent wed"></td>
		        	<td class="claContent thu"></td>
		        	<td class="claContent fri"></td>
		        	<td class="claContent sat"></td>
		        </tr>
		        <tr>
		            <td class="daysHere"></td>
		            <td class="daysHere"></td>
		            <td class="daysHere"></td>
		            <td class="daysHere"></td>
		            <td class="daysHere"></td>
		            <td class="daysHere"></td>
		            <td class="daysHere"></td>
		        </tr>
		        <tr>
		        	<td class="claContent sun"></td>
		        	<td class="claContent mon"></td>
		        	<td class="claContent tue"></td>
		        	<td class="claContent wed"></td>
		        	<td class="claContent thu"></td>
		        	<td class="claContent fri"></td>
		        	<td class="claContent sat"></td>
		        </tr>
		        <tr>
		            <td class="daysHere"></td>
		            <td class="daysHere"></td>
		            <td class="daysHere"></td>
		            <td class="daysHere"></td>
		            <td class="daysHere"></td>
		            <td class="daysHere"></td>
		            <td class="daysHere"></td>
		        </tr>
		        <tr>
		        	<td class="claContent sun"></td>
		        	<td class="claContent mon"></td>
		        	<td class="claContent tue"></td>
		        	<td class="claContent wed"></td>
		        	<td class="claContent thu"></td>
		        	<td class="claContent fri"></td>
		        	<td class="claContent sat"></td>
		        </tr>
		        <tr>
		            <td class="daysHere"></td>
		            <td class="daysHere"></td>
		            <td class="daysHere"></td>
		            <td class="daysHere"></td>
		            <td class="daysHere"></td>
		            <td class="daysHere"></td>
		            <td class="daysHere"></td>
		        </tr>
		        <tr>
		        	<td class="claContent sun"></td>
		        	<td class="claContent mon"></td>
		        	<td class="claContent tue"></td>
		        	<td class="claContent wed"></td>
		        	<td class="claContent thu"></td>
		        	<td class="claContent fri"></td>
		        	<td class="claContent sat"></td>
		        </tr>
		    </table>
		</div>
	</div>

<div id="scrollIcon">
	<div id="toCal">
		<i class="fa fa-calendar-o"></i>
		<span>看月曆</span>
	</div>
	<div id="toActivity">
		<i class="fa fa-calendar-check-o"></i>
		<span>看活動</span>		
	</div>
</div>

    <div id="showDate">
    	<span id="activityDate" style="font-size: 32px">今日</span>
    	<span id="activityDay"></span>活動一覽
		<div id="shiftMode">
			<!-- <div id="switchBlock" class="inline_src"></div> -->
		</div>
    </div>
    <div class="actHr"></div>
    <div id="showRow">
    	<div id="showRowUnitWrapper" style="font-size: 16px;">
<!-- 	    <div class="showRowText">活動名稱稱</div>
	    	<div class="showRowText">活動地點點</div>
	    	<div class="showRowText">00:00-00:00</div>
	    	<div class="showRowText">活動介紹(15字內不然沒人看)</div> -->
    	</div>
    </div>

    
    <div class="actHr"></div>
	<div class="recommendAct">推薦活動</div>
	<ul id="da-thumbs" class="da-thumbs">
	<li class="block-mode">
		<a href="javascript:void(0)">
			<img src="img/activity/1.jpg" />
			<div><span>劇場演出<br>10:00-11:30<br>未來劇場</span></div>
		</a>
	</li>
	<li class="block-mode">
		<a href="javascript:void(0)">
			<img src="img/activity/2.jpg" />
			<div><span>劇場演出<br>10:00-11:30<br>未來劇場</span></div>
		</a>
	</li>
	<li class="block-mode">
		<a href="javascript:void(0)">
			<img src="img/activity/3.jpg" />
			<div><span>劇場演出<br>10:00-11:30<br>未來劇場</span></div>
		</a>
	</li>
	<li class="block-mode">
		<a href="javascript:void(0)">
			<img src="img/activity/4.jpg" />
			<div><span>劇場演出<br>10:00-11:30<br>未來劇場</span></div>
		</a>
	</li>
	<li class="block-mode">
		<a href="javascript:void(0)">
			<img src="img/activity/5.jpg" />
			<div><span>劇場演出<br>10:00-11:30<br>未來劇場</span></div>
		</a>
	</li>
	<li class="block-mode">
		<a href="javascript:void(0)">
			<img src="img/activity/6.jpg" />
			<div><span>劇場演出<br>10:00-11:30<br>未來劇場</span></div>
		</a>
	</li>
	<li class="block-mode">
		<a href="javascript:void(0)">
			<img src="img/activity/7.jpg" />
			<div><span>劇場演出<br>10:00-11:30<br>未來劇場</span></div>
		</a>
	</li>
	<li class="block-mode">
		<a href="javascript:void(0)">
			<img src="img/activity/8.jpg" />
			<div><span>Natalie & Justin Cleaning by Justin Younger</span></div>
		</a>
	</li>
	</ul>
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
				會員帳號：<input type="text" name="memName" id="memId" value="" required placeholder="輸入帳號" style="font-size: 16px">
				<br>
				會員密碼：<input type="password" name="memPsw"  id="memPsw" value="" required placeholder="輸入密碼" style="font-size: 16px">
				<br>
			</div>
			<div class="btn">
				<input type="submit" name="" id="submit" value="登入">
				<input type="reset" name="reset" value="RESET">
        	</div>
		</form>
</div>
<!-- 登入燈箱 -->
<script src="js/00nav.js"></script>
<script type="text/javascript" src="js/04calendar.js"></script>

</script>
<script type="text/javascript">
	// 塊狀 or 條列模式
	$(document).ready(function(){
		$("#switchBlock").click(function(){
			$(".block-mode").toggleClass("li-block-mode");
			$("#da-thumbs li a img").toggleClass("hahaha");
			$(this).toggleClass("block_src");
		});
	});
</script>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.hoverdir.js"></script>	
<script type="text/javascript">
	$(function() {

		$(' #da-thumbs > li ').each( function() { $(this).hoverdir({
			hoverDelay : 75
		}); } );

	});

$(document).ready(function(){
	// 於月曆&活動之間滾動
	$("#toCal").click(function(){
		$("html,body").animate({scrollTop:$("#wrapper").offset().top}, 400);
	});
	$(".daysHere").click(function(){
		$("html,body").animate({scrollTop:$("#activityDay").offset().top}, 400);
	});
	$("#toActivity").click(function(){
		$("html,body").animate({scrollTop:$("#mycal tr:last-child").offset().top}, 400);
	});

	// 若登入改變會員panel顯示
	var storage = localStorage;
	if( storage.getItem("mem_id") > 0){
		// 已經登入
		$("#nextStep").attr("href","input_cart_detail.html");
		$(".login").text("登出");
		$(".login").prev().attr("src","img/member/member_2.png");
	}
});

	//-登入-----------------------------------
			window.addEventListener("load",openLoginBox);
			function openLoginBox() {

				var storage = localStorage;
				/*註冊登入按鈕*/
				var singUpBtn = document.getElementById('singUpBtn');

				/*註冊燈箱*/
				var lightBox = document.getElementById('lightBox');

				/*註冊燈箱關閉按鈕*/
				var cancel = document.getElementById('cancel');

				/*建立登入按鈕點擊事件聆聽功能*/
				singUpBtn.addEventListener('click', showLogin, false);



				/*建立關閉登入燈箱按鈕點擊事件聆聽功能*/
				cancel.addEventListener('click', closeLogin, false);


				/*點案登入show出登入燈箱 以及判斷登出按鈕*/
				function showLogin() {
					console.log(singUpBtn.innerText);
					/*如果singUpBtn為登入時*/
					fullCover = document.getElementById('all-page');/*叫出燈箱時的墊背*/
					if(singUpBtn.innerText.indexOf("登入") != -1){
						/*show出燈箱*/
						lightBox.style.opacity = 1;
						fullCover.style.display="block";
						lightBox.style.visibility = 'visible'
						lightBox.style.display = "block";
						allNavClose();
					}
				}
				


				/*點案登入關閉登入燈箱*/
				function closeLogin() {
					lightBox.style.opacity = 0;
					lightBox.style.visibility = 'hidden';
					fullCover.style.display="";
				}
				
				
			}

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