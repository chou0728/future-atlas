<?php
ob_start();
session_start();
if(isset($_SESSION["login_error"]) === true){
	echo "<script>alert('帳密錯誤！請新登入');</script>";
	unset($_SESSION["login_error"]);
}else if(isset($_SESSION["log_register"])===true){
	echo "<script>alert('註冊成功，歡迎你~~');</script>";
	unset($_SESSION["log_register"]);
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<title>FA未來樂園 | 活動查詢</title>
<link rel="icon" href="img/favicon.ico" />
<link rel="stylesheet" type="text/css" href="css/activity_calendar.css">
<link rel="stylesheet" type="text/css" href="css/header.css">
<link rel="stylesheet" type="text/css" href="css/footer.css">
<link rel="stylesheet" type="text/css" href="css/login.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
body::after,.facilityBox::after{
	content: '';
	position: fixed;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background-color:#000;  /* 背景カラー */
	z-index: 9999;  /* 一番手前に */
	pointer-events: none;  /* 他の要素にアクセス可能にするためにポインターイベントは無効に */
	opacity: 0;  /* 初期値 : 透過状態 */
	-webkit-transition: opacity .4s ease;  /* アニメーション時間は 0.8秒 */
	transition: opacity .4s ease;
}
body.fadeout::after {
		opacity: 1;
}
.fadeout::after{
	opacity: 1;
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
<body class="fadeout">
<div class="header">
    <ul class="ul_top">
        <li class="li_top">
            <a href=<?php
            	if(isset($_SESSION["mem_id"])===true){
                			echo "'javascript:void(0)'";
                		}else{
                			echo "'register.html'";
                		}
            ?> id="registerUser">
                <img src=<?php
                		if(isset($_SESSION['mem_id'])===true){
                			echo 'img/member/member_3.png';
                		}else{
                			echo 'img/member/member_0.png';
                		}
					?>
                >
                <span class="register">
                	<?php
                		if(isset($_SESSION["mem_id"])===true){
                			echo "<a href='MembersOnly.php'>帳戶</a>";
                		}else{
                			echo "註冊";
                		}
                	?>
                </span>
        </li>
        <li class="li_top" <?php if(!isset($_SESSION["mem_id"])){
        						echo "style='display: none';";
        						}?>>
        	<a href="see_tickets.php" class="tkt">
        		<img src="img/member/qr-code-scan.png">
        		<span>票券</span>
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
                			echo"<a href='logoutheadforindex.php'>登出</a>";
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
        </li>
    </ul>
</div>
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
        <a href="====index.php" class="logo_a">
            <img src="img/LOGO.png" class="logo">
        </a>
        <ul class="ul_right">
            <li>
            	<img src="img/hover-tri.png" class="nav_hover">
                <a href="====index.php#page2" id="NavClose">園區地圖</a>
            </li>
            <li>
            	<img src="img/hover-tri-now.png" class="nav_here">
                <a href="activity.php" style="color: rgb(55,222,255);font-weight: bold;">活動月曆</a>
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

<div id="smallCal">
<!-- main codes start -->
    <div class="signboard outer">
        <div class="signboard front inner anim04c">
            <li class="year anim04c">
                <span></span>
            </li>
            <ul class="calendarMain anim04c">
                <li class="month anim04c">
                    <span></span>
                </li>
                <li class="date anim04c">
                    <span></span>
                </li>
                <li class="day anim04c">
                    <span></span>
                </li>
            </ul>
            <li class="clock minute anim04c">
                <span></span>
            </li>
            <li class="calendarNormal date2 anim04c">
                <span></span>
            </li>
        </div>
        <div class="signboard left inner anim04c">
            <li class="clock hour anim04c">
                <span></span>
            </li>
            <li class="calendarNormal day2 anim04c">
                <span></span>
            </li>
        </div>
        <div class="signboard right inner anim04c">
            <li class="clock second anim04c">
                <span></span>
            </li>
            <li class="calendarNormal month2 anim04c">
                <span></span>
            </li>
        </div>
    </div>
    <!-- main codes end -->

</div>

<div id="wrapper">
	<div class="back"></div>
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

    <div id="showDate">
    	<span id="activityDate" style="font-size: 32px">今日</span>
    	<span id="activityDay"></span>
    	<span class="blocktitle">活動一覽</span>
		<div id="shiftMode">
		</div>
    </div>
    <div class="actHr"></div>
    <div id="showRow">
    	<div id="showRowUnitWrapper" style="font-size: 16px;">
    	</div>
    </div>

    
    <div class="actHr"></div>
    <!-- 整個活動剪影區塊 -->
	<div class="recommendAct" id="rotatescrollWrapper">
		<div class="blocktitle" style="text-align: left;"><span style="font-size:32px">活動剪影</span></div>
		<!-- 輪播圓形 -->
		<div id="rotatescroll">
			<div class="viewport">
				<ul class="overview">
					<li><a href=""><img src="img/activity/hdr1_s.jpg"></a></li>
					<li><a href=""><img src="img/activity/hdr2_s.jpg"></a></li>
					<li><a href=""><img src="img/activity/hdr3_s.jpg"></a></li>
					<li><a href=""><img src="img/activity/hdr4_s.jpg"></a></li>
					<li><a href=""><img src="img/activity/hdr5_s.jpg"></a></li>
				</ul>
			</div>
		<div class="dot"></div>
		<div class="overlay"></div>
		<div class="thumb"></div>
		</div>

		<!-- 右方輪播方塊區 -->
		<div id="rotatescrollBox">
			<!-- 遮罩圖片 -->
			<img src="img/activity/rotatescrollBox.png" class="tvbox">
			<!-- 輪播500% -->
			<div id="rotatescrollBoxWrapper">
				<!-- 輪播單位 -->
				<div class="rotatescrollBox">星際大戰變裝秀</div>
				<div class="rotatescrollBox">機器人大賞</div>
				<div class="rotatescrollBox">全新AR眼鏡發表會</div>
				<div class="rotatescrollBox">智慧居家展</div>
				<div class="rotatescrollBox">天文科學營</div>
			</div>
		</div>
	</div>

	<div class="actHr"></div>
	<div class="recommendAct">
		<div class="blocktitle">推薦活動</div>
	
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
	</div>
</div>

<!-- 登入燈箱 -->
<div id="all-page"></div><!-- 叫出時背景-->
		<div id="lightBox">
			<div id="cancel">
				<div class="leftLine"></div>
				<div class="rightLine"></div>
			</div>
			<!-- <img class="bar" src="img/bar.png" alt="bar"> -->
			<form class="singUp" action="loginheadforindex.php" method="post">
				<h2>會員登入</h2>
				<div class="text">
					帳號：<input type="text" name="memName" id="memId" value="" required placeholder="輸入帳號">
					<br>
					密碼：<input type="password" name="memPsw"  id="memPsw" value="" required placeholder="輸入密碼">
					<br>
				</div>
				        <div class="btn">
				            <input type="reset" name="reset" value="重填">
				            <input type="submit" name="" id="submit" value="登入">
        				</div>
			</form>
		</div>
		<!-- 登入燈箱 ==end============-->
<script src="js/00nav.js"></script>
<script type="text/javascript" src="js/04calendar.js"></script>
<script src="js/jquery.hoverdir.js"></script>
<script src="js/modernizr.custom.97074.js"></script>
<script src="js/jquery.tinycircleslider.min.js"></script>
<script src="js/page_load_unload.js"></script>
<script>
	// 套件：小月曆
	$(document).ready(function () {
		var monthNames = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ]; 
		var dayNames= [ "Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday" ];
		var newDate = new Date();
		newDate.setDate(newDate.getDate());
	
		setInterval( function() {
			var hours = new Date().getHours();
			$(".hour").html(( hours < 10 ? "0" : "" ) + hours);
		    var seconds = new Date().getSeconds();
			$(".second").html(( seconds < 10 ? "0" : "" ) + seconds);
		    var minutes = new Date().getMinutes();
			$(".minute").html(( minutes < 10 ? "0" : "" ) + minutes);
		    
		    $(".month span,.month2 span").text(monthNames[newDate.getMonth()]);
		    $(".date span,.date2 span").text(newDate.getDate());
		    $(".day span,.day2 span").text(dayNames[newDate.getDay()]);
		    $(".year span").html(newDate.getFullYear());
		}, 1000);	
		// 	$(".outer").on({
		// 	    mousedown:function(){
		// 	        $(".dribbble").css("opacity","1");
		// 	    },
		// 	    mouseup:function(){
		// 	        $(".dribbble").css("opacity","0");
		// 	    }
		// });
	});

	// 套件：活動剪影
	$(document).ready(function()
	{
		$('#rotatescroll').tinycircleslider({ interval: true, dotsSnap: true, dotsHide: true });
			setInterval(rotatescrollBoxWrapper_translate,100);
	});

	function rotatescrollBoxWrapper_translate(){
		var thumb   = document.getElementsByClassName("thumb")[0];
		var thumb_x = thumb.offsetLeft;
		var thumb_y = thumb.offsetTop;
		var wrpper = document.getElementById("rotatescrollBoxWrapper");
		var left = -500;
		// 五個移動位置相對於父層的座標：
		// (1)100,-40(2)233,57(3),182,214(4)18,214(5)-33,57
		if( thumb_x > 230){
			// 二
			wrpper.style.left = (left * 1)+"%";
		}else if( thumb_x > 180 && thumb_x < 185 && thumb_y > 210){
			// 三
			wrpper.style.left = (left * 2)+"%";
		}else if( thumb_x > 95 && thumb_x < 105 && thumb_y < -35){
			// 一
			wrpper.style.left = (left * 0) +"%";
		}else if( thumb_x > 15 && thumb_x < 22 && thumb_y > 210){
			// 四
			wrpper.style.left = (left * 3) +"%";
		}else if( thumb_x > -40 && thumb_x < -30){
			// 五
			wrpper.style.left = (left * 4) +"%";
		}

	}
	// 套件：方塊區hover效果
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