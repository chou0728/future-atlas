<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/RESET.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/facilityBuyTicket.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<style type="text/css">
		body::after {
			  content: '';
			  position: fixed;
			  top: 0;
			  left: 0;
			  width: 100%;
			  height: 100%;
			  overflow: hidden;
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
</head>
<body class="fadeout">
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
                			echo "'SignUp.html'";
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
                <a href="facilityBuyTicket.html">設施購票</a>
            </li>
            <li>
                <a href="facilityInfo.html">設施介紹</a>
            </li>
        </ul>
        <h1 style="display: none">FutureAtlas_未來主題樂園</h1>
        <a href="index.html#page1" class="logo_a">
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

    <!-- header end-->
<div class="fbtWrapper">

<?php 
try {
	require_once("php/connectBooks.php");
	$sql = "select * from facility where ticket_already=1";
	$products = $pdo->query($sql);
$a = 0;
	while($prodRow = $products->fetchObject()){
		
?>
	<!-- /////01-->
	<div class="ticketbox">
		<div class="ticketTitlebox">
			<div class="ticket">
				<figure class="front">
					<img src="img/facilityBuyTicket/launched-rocket.png" class="icon">
				</figure>
				<figure class="back"><?php echo $prodRow->facility_no ?></figure>
			</div>
			<h2 class="ticketTitle"><?php echo $prodRow->facility_name ?></h2>
		</div>

	
		<div class="f_img">
			<img src="img/facilityInfo/<?php echo $prodRow->facility_tphoto ?>"><span class="cover"></span>
		</div>
		<div class="shortInfo">
			<?php echo $prodRow->facility_intro ?>
		</div>

		<div class="adult" data-val="<?php echo $prodRow->full_fare ?>">
			<span>全票</span><span class="price"><?php echo $prodRow->full_fare ?>元/1張</span>
			<div class='ctrl'>
				 <div class='ctrl-button ctrl-button-decrement'>-</div>
					  <div class='ctrl-counter'>
					  	<input class='ctrl-counter-input' maxlength='3' type='text' value='0' data-no="<?php echo $a ?>" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')">
					  </div>
					  <div class='ctrl-button ctrl-button-increment'>+</div>
				</div>
		</div>

		<div class="child" data-val="<?php echo $prodRow->half_fare ?>">
			<span>半票</span><span class="price"><?php echo $prodRow->half_fare ?>元/1張</span>
			<div class='ctrl'>
				 <div class='ctrl-button ctrl-button-decrement'>-</div>
					  <div class='ctrl-counter'>
					  	<input class='ctrl-counter-input' maxlength='3' type='text' value='0' data-no="<?php echo $a+1 ?>" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')">	
					  </div>
					<div class='ctrl-button ctrl-button-increment'>+</div>
				</div>
		</div>
		<div class="f_submit" data-fn="<?php echo $prodRow->facility_no ?>">
			加入購物車
		</div>
	</div>

<?php
$a+=2;	
	}
} catch (PDOException $e) {
	echo "錯誤原因 : " , $e->getMessage() , "<br>";
	echo "錯誤行號 : " , $e->getLine() , "<br>";
	// echo "getCode : " , $e->getCode() , "<br>";
	// echo "異動失敗,請聯絡系統維護人員";
}
?> 
	<!-- /////02-->
<!-- 		<div class="ticketbox">
		<div class="ticketTitlebox">
			<div class="ticket">
				<figure class="front">
					<img src="img/facilityBuyTicket/launched-rocket.png" class="icon">
				</figure>
				<figure class="back">2</figure>
			</div>
			<h2 class="ticketTitle">FA摩天輪</h2>
		</div>

	
		<div class="f_img">
			<img src="img/facilityBuyTicket/p_01.jpg"><span class="cover"></span>
		</div>
		<div class="shortInfo">
			高空一覽未來的樣貌
		</div>

		<div class="adult" data-val="185">
			<span>全票</span><span class="price">185元/1張</span>
			<div class='ctrl'>
				 <div class='ctrl-button ctrl-button-decrement'>-</div>
					  <div class='ctrl-counter'>
					  	<input class='ctrl-counter-input' maxlength='3' type='text' value='0' data-no="2">
					  </div>
					  <div class='ctrl-button ctrl-button-increment'>+</div>
				</div>
			</div>

		<div class="child" data-val="100">
			<span>半票</span><span class="price">100元/1張</span>
			<div class='ctrl'>
				 <div class='ctrl-button ctrl-button-decrement'>-</div>
					  <div class='ctrl-counter'>
					  	<input class='ctrl-counter-input' maxlength='3' type='text' value='0' data-no="3">	
					  </div>
					<div class='ctrl-button ctrl-button-increment'>+</div>
				</div>
		</div>
		<div class="f_submit" data-fn="2">
			加入購物車
		</div>
	</div> -->
	<!-- /////03-->
<!-- 		<div class="ticketbox">
		<div class="ticketTitlebox">
			<div class="ticket">
				<figure class="front">
					<img src="img/facilityBuyTicket/launched-rocket.png" class="icon">
				</figure>
				<figure class="back">3</figure>
			</div>
			<h2 class="ticketTitle">宇宙雲霄飛車</h2>
		</div>

	
		<div class="f_img">
			<img src="img/facilityBuyTicket/p_01.jpg"><span class="cover"></span>
		</div>
		<div class="shortInfo">
			史上最快最高的宇宙雲霄飛車
		</div>

		<div class="adult" data-val="200">
			<span>全票</span><span class="price">200元/1張</span>
			<div class='ctrl'>
				 <div class='ctrl-button ctrl-button-decrement'>-</div>
					  <div class='ctrl-counter'>
					  	<input class='ctrl-counter-input' maxlength='3' type='text' value='0' data-no="4">
					  </div>
					  <div class='ctrl-button ctrl-button-increment'>+</div>
				</div>
			</div>

		<div class="child" data-val="95">
			<span>半票</span><span class="price">95元/1張</span>
			<div class='ctrl'>
				 <div class='ctrl-button ctrl-button-decrement'>-</div>
					  <div class='ctrl-counter'>
					  	<input class='ctrl-counter-input' maxlength='3' type='text' value='0' data-no="5">	
					  </div>
					<div class='ctrl-button ctrl-button-increment'>+</div>
				</div>
		</div>
		<div class="f_submit" data-fn="3">
			加入購物車
		</div>
	</div> -->
	<!-- /////04-->
<!-- 	<div class="ticketbox">
		<div class="ticketTitlebox">
			<div class="ticket">
				<figure class="front">
					<img src="img/facilityBuyTicket/launched-rocket.png" class="icon">
				</figure>
				<figure class="back">4</figure>
			</div>
			<h2 class="ticketTitle">宇宙雲霄飛車</h2>
		</div>

	
		<div class="f_img">
			<img src="img/facilityBuyTicket/p_01.jpg"><span class="cover"></span>
		</div>
		<div class="shortInfo">
			史上最快最高的宇宙雲霄飛車
		</div>

		<div class="adult" data-val="160">
			<span>全票</span><span class="price">160元/1張</span>
			<div class='ctrl'>
				 <div class='ctrl-button ctrl-button-decrement'>-</div>
					  <div class='ctrl-counter'>
					  	<input class='ctrl-counter-input' maxlength='3' type='text' value='0' data-no="6">
					  </div>
					  <div class='ctrl-button ctrl-button-increment'>+</div>
				</div>
			</div>

		<div class="child" data-val="75">
			<span>半票</span><span class="price">75元/1張</span>
			<div class='ctrl'>
				 <div class='ctrl-button ctrl-button-decrement'>-</div>
					  <div class='ctrl-counter'>
					  	<input class='ctrl-counter-input' maxlength='3' type='text' value='0' data-no="7">	
					  </div>
					<div class='ctrl-button ctrl-button-increment'>+</div>
				</div>
		</div>
		<div class="f_submit" data-fn="4">
			加入購物車
		</div>
	</div> -->
	<!-- /////5-->
<!-- 		<div class="ticketbox">
		<div class="ticketTitlebox">
			<div class="ticket">
				<figure class="front">
					<img src="img/facilityBuyTicket/launched-rocket.png" class="icon">
				</figure>
				<figure class="back">5</figure>
			</div>
			<h2 class="ticketTitle">宇宙雲霄飛車</h2>
		</div>

	
		<div class="f_img">
			<img src="img/facilityBuyTicket/p_01.jpg"><span class="cover"></span>
		</div>
		<div class="shortInfo">
			史上最快最高的宇宙雲霄飛車
		</div>

		<div class="adult" data-val="160">
			<span>全票</span><span class="price">160元/1張</span>
			<div class='ctrl'>
				 <div class='ctrl-button ctrl-button-decrement'>-</div>
					  <div class='ctrl-counter'>
					  	<input class='ctrl-counter-input' maxlength='3' type='text' value='0' data-no="8">
					  </div>
					  <div class='ctrl-button ctrl-button-increment'>+</div>
				</div>
			</div>

		<div class="child" data-val="80">
			<span>半票</span><span class="price">80元/1張</span>
			<div class='ctrl'>
				 <div class='ctrl-button ctrl-button-decrement'>-</div>
					  <div class='ctrl-counter'>
					  	<input class='ctrl-counter-input' maxlength='3' type='text' value='0' data-no="9">	
					  </div>
					<div class='ctrl-button ctrl-button-increment'>+</div>
				</div>
		</div>
		<div class="f_submit" data-fn="5">
			加入購物車
		</div>
	</div> -->
	<!-- /////06-->
<!-- 			<div class="ticketbox">
		<div class="ticketTitlebox">
			<div class="ticket">
				<figure class="front">
					<img src="img/facilityBuyTicket/launched-rocket.png" class="icon">
				</figure>
				<figure class="back">6</figure>
			</div>
			<h2 class="ticketTitle">宇宙雲霄飛車</h2>
		</div>

	
		<div class="f_img">
			<img src="img/facilityBuyTicket/p_01.jpg"><span class="cover"></span>
		</div>
		<div class="shortInfo">
			史上最快最高的宇宙雲霄飛車
		</div>

		<div class="adult" data-val="290">
			<span>全票</span><span class="price">290元/1張</span>
			<div class='ctrl'>
				 <div class='ctrl-button ctrl-button-decrement'>-</div>
					  <div class='ctrl-counter'>
					  	<input class='ctrl-counter-input' maxlength='3' type='text' value='0' data-no="10">
					  </div>
					  <div class='ctrl-button ctrl-button-increment'>+</div>
			</div>
		</div>

		<div class="child" data-val="110">
			<span>半票</span><span class="price">110元/1張</span>
			<div class='ctrl'>
				<div class='ctrl-button ctrl-button-decrement'>-</div>
					  <div class='ctrl-counter'>
					  	<input class='ctrl-counter-input' maxlength='3' type='text' value='0' data-no="11">	
					  </div>
				<div class='ctrl-button ctrl-button-increment'>+</div>
			</div>
		</div>
		<div class="f_submit" data-fn="6">
			加入購物車
		</div>
	</div> -->
	<!-- /////-->
	<div id="fullBlack">
		<div class="confirmLightbox">
			<p class="content"></p>
			<a href="javascript:void(0)" id="nope">取消</a>
			<a href="javascript:void(0)" id="confirm">確認</a>		
		</div>
	</div>
</div>

<div id="all-page"></div><!-- banner叫出時背景-->
		<!-- 登入燈箱 ==============-->
		<div id="lightBox">
			<div id="cancel">
				<div class="leftLine"></div>
				<div class="rightLine"></div>
			</div>
			<!-- <img class="bar" src="img/bar.png" alt="bar"> -->
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
		<!-- 登入燈箱 ==============-->

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/page_load_unload.js"></script>
<!-- <script src="js/00nav.js"></script> -->
<script type="text/javascript">
function init(){
	//-INPUT NUMBER
	var decrement = document.querySelectorAll('.ctrl-button-decrement');
	var container = document.querySelectorAll('.ctrl-counter');
	var input = document.querySelectorAll('.ctrl-counter-input');
	var increment = document.querySelectorAll('.ctrl-button-increment');
	var val = [];
	
		for(var i = 0; i<input.length;i++ ){
			decrement[i].addEventListener('click',decrementA);
			increment[i].addEventListener('click',incrementA);
			input[i].addEventListener("change",typeMode);
		}

	//減
	function decrementA(){
		var a = this.nextElementSibling.children[0].dataset.no;//抓到第幾個input的data-id
			val[a] = input[a].value;
			if(val[a]>0){
				val[a] = parseInt(val[a] -1);
				input[a].value = val[a];
				
			}else{
				val[a] = 0;
			}
	}
	//加
	function incrementA(){
		var b = this.previousElementSibling.children[0].dataset.no;
			val[b] = input[b].value;
			if(val[b]<99){
				val[b]++;
				input[b].value = val[b];

			}else{
				val[b] = 99;
			}
		
		}
	//change時
	function typeMode(){
		var val = this.value;
		if(val>99){
			this.value = 99;
		}else if(val<0){
			this.value = 0;
		}
	}
}


	function l_storage(){
		storage = localStorage;
		console.log(storage.getItem("facility_ticket_list"));
		if(storage.getItem("facility_ticket_list")){
			facility_ticket_list = storage.getItem("facility_ticket_list");
		}else{
			facility_ticket_list="";
		}
		var f_submit = document.querySelectorAll('.f_submit');
		for(var i =0; i<f_submit.length;i++){
			f_submit[i].addEventListener('click',saveToStorage);
		}

	function saveToStorage(){
		
		fn = this.dataset.fn;/*設施編號*/
		_this = this;
		var ad = this.previousElementSibling.previousElementSibling.children[2].children[1].children[0].value;/*全票張數*/
		var adp = this.previousElementSibling.previousElementSibling.dataset.val;/*全票價格*/
		var cd = this.previousElementSibling.children[2].children[1].children[0].value;/*半票張數*/
		var cdp = this.previousElementSibling.dataset.val;/*半票價格*/
		var fname = this.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.children[1].innerText;
		var addToCart = adp+"/"+ad+"/"+cdp+"/"+cd+"/"+fname;
		if(ad!=0||cd!=0){//判斷全票半票皆不為0張
			storage.setItem(fn,addToCart);
			
				if(facility_ticket_list.indexOf(fn)==-1){
					facility_ticket_list += fn+"/" ;
					storage.setItem("facility_ticket_list", facility_ticket_list);
					setTimeout(changeCartImg,50);
				}
				
		}else if(ad==0&&cd==0){
			console.log(facility_ticket_list.indexOf(fn));
			if(facility_ticket_list.indexOf(fn)!=-1){
				cautionMessage();
			}
			
		}
	}
}

	function cautionMessage(){
		fullBlack = document.getElementById("fullBlack");
		var confirm = document.getElementById("confirm");
		var nope = document.getElementById("nope");
		var content = document.getElementsByClassName("content")[0];
		var inner = _this.parentElement.children[0].children[1].innerHTML;
		fullBlack.style.display = "block";
		//跳出確認視窗
		content.innerHTML = "確定取消購物車內【"+inner+"】的票券嗎?";
		confirm.onclick = clearFromStorage;
		nope.onclick = closeMessage;

	}
	function clearFromStorage(){
		no = storage.getItem("facility_ticket_list").replace(fn+"/","");
		storage.setItem("facility_ticket_list", no);
		facility_ticket_list = storage.getItem("facility_ticket_list");
		storage.removeItem(fn);
		closeMessage();
		//確認後清除單筆購物車內容
		var newlevel = Math.floor((facility_ticket_list.split("/").length-1)/2);
        var aa = document.getElementById("cartimgid").src.substr(-5,1);
        aa = newlevel;
        document.getElementById("cartimgid").src = "img/cart/wallet_"+aa+".png";
        document.getElementById("howmanytickets").innerHTML = facility_ticket_list.split("/").length-1;
	}


	function closeMessage(){
		fullBlack.style.display = "none";
	}
	
	function changeCartImg(){
		var newlevel = Math.floor((facility_ticket_list.split("/").length-1)/2);
        var aa = document.getElementById("cartimgid").src.substr(-5,1);
        aa = newlevel;
        document.getElementById("cartimgid").src = "img/cart/wallet_"+aa+".png";
        document.getElementById("howmanytickets").innerHTML = facility_ticket_list.split("/").length-1;
        console.log(facility_ticket_list.split("/").length-1);
        clearTimeout(changeCartImg);
	}
window.addEventListener('load',init);
window.addEventListener('load',l_storage);
//-導覽列RWD-----------------------------------
//-導覽列RWD-----------------------------------
			function navOpen(){
				var headerOpenBtn = document.getElementsByClassName("headerOpenBtn")[0];
				headerOpenBtn.addEventListener("click",headerAppearClose);
				

				var navOpenBtn = document.getElementsByClassName("navOpenBtn")[0];
				navOpenBtn.addEventListener("click",navAppearClose);
				

				var logoBtn = document.getElementsByClassName("logo")[0];
				logoBtn.addEventListener("click",allNavClose);
				
			}
			function headerAppearClose(){
					var header = document.getElementsByClassName("header")[0];
					var li_top = document.getElementsByClassName("li_top");
					var ul_box = document.getElementsByClassName("ul_box")[0];

					if(ul_box.id =="navAppear" && header.id !="headerAppear"){
						header.setAttribute("id","headerAppear");
						for(var i =0;i<li_top.length;i++){
							li_top[i].setAttribute("id","liAppear");
						}
						ul_box.id="";

					}else if(header.id !="headerAppear"&&header.id !="navAppear"){
						header.setAttribute("id","headerAppear");
						for(var i =0;i<li_top.length;i++){
							li_top[i].setAttribute("id","liAppear");
						}
					}else{
						header.id="";
						for(var i =0;i<li_top.length;i++){
							li_top[i].id="";
						}

					

					
					}	
			}
			function navAppearClose(){
				var header = document.getElementsByClassName("header")[0];
				var li_top = document.getElementsByClassName("li_top");
				var ul_box = document.getElementsByClassName("ul_box")[0];
					if(ul_box.id !="navAppear" && header.id !="headerAppear"){
						ul_box.setAttribute("id","navAppear");
						
					}else if(ul_box.id !="navAppear" && header.id =="headerAppear"){
						ul_box.setAttribute("id","navAppear");
						header.id="";
						for(var i =0;i<li_top.length;i++){
							li_top[i].id="";
						}

					}else{
						ul_box.id="";

					}
			}
			function allNavClose(){
				var header = document.getElementsByClassName("header")[0];
				var li_top = document.getElementsByClassName("li_top");
				var ul_box = document.getElementsByClassName("ul_box")[0];

						for(var i =0;i<li_top.length;i++){
							li_top[i].id="";
						}
						ul_box.id="";
						header.id="";

			}

			// 原始購物車外觀
			function iniCart(){
				var storage = localStorage;
				var facility_ticket_list = storage.getItem("facility_ticket_list");
				if(facility_ticket_list != null){
		        	var iniCart = Math.floor((facility_ticket_list.split("/").length-1)/2);
		        	var aa = document.getElementById("cartimgid").src.substr(-5,1);
		        	aa = iniCart;
			        document.getElementById("cartimgid").src = "img/cart/wallet_"+iniCart+".png";
			        document.getElementById("howmanytickets").innerHTML = facility_ticket_list.split("/").length-1;
		        }
			}
			window.addEventListener('load',iniCart);
			window.addEventListener('load',navOpen);
			window.addEventListener('resize',allNavClose);
//-登入-----------------------------------
			function login() {

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
window.addEventListener('load',login);    

</script>
</html>