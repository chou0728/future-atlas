<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FA未來主題樂園--設施介紹--</title>
	<link rel="shortcut icon" href="">
	<link rel="stylesheet" type="text/css" href="css/RESET.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/facilityInfo_main.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<style type="text/css">
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
		<!-- header -->
	
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
                			echo $_SESSION["mem_nick"]."你好!";
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
             <a href="input_cart.html">
                <img id="cartimgid" src="img/cart/wallet_0.png">
                <span id="howmanytickets">0</span>
            </a>
                <div id="showCartContent">購物車內容
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
        <a href="index.php" class="logo_a">
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


<section class="fi_wrapper">
		<h1 style="display: none;">設施總覽</h1>
		<!-- icon absolute-->
	<div class="icon_subnav">

		<div class="i_info" data-category="0">
			<a href="javascript:void(0)"><img src="img/facilityInfo/VR.png" alt="VR"></a>
				<div class="i_box">
					<div class="i_line"></div>
					<div class="i_line2"></div>
					<p>使用VR虛擬實境設備</p>
				</div>
		</div>

		<div class="i_info" data-category="1">
			<a href="javascript:void(0)"><img src="img/facilityInfo/heart305.png" alt="hard"></a>
				<div class="i_box">
					<div class="i_line"></div>
					<div class="i_line2"></div>
					<p>刺激的遊樂設施</p>
				</div>
		</div>

		<div class="i_info" data-category="2">
			<a href="javascript:void(0)"><img src="img/facilityInfo/child.png" alt="child"></a>
				<div class="i_box">
					<div class="i_line"></div>
					<div class="i_line2"></div>
					<p>適合兒童遊玩之設施</p>
				</div>
		</div>

		<div class="i_info" data-category="3">
			<a href="javascript:void(0)"><img src="img/facilityInfo/love.png" alt="couple"></a>
				<div class="i_box">
					<div class="i_line"></div>
					<div class="i_line2"></div>
					<p>適合情侶共同遊樂的設施</p>
				</div>
		</div>

		<div class="i_info" data-category="4">
			<a href="javascript:void(0)"><img src="img/facilityInfo/umbrella.png" alt="umbrella"></a>
				<div class="i_box">
					<div class="i_line"></div>
					<div class="i_line2"></div>
					<p>下雨天也能暢玩之設施</p>
				</div>
		</div>
		<div class="i_info" data-category="5">
			<a href="javascript:void(0)"><img src="img/facilityInfo/all.png" alt="all"></a>
				<div class="i_box">
					<div class="i_line"></div>
					<div class="i_line2"></div>
					<p>全部設施</p>
				</div>
		</div>


	</div>
	<!-- icon end-->

	<!--設施區塊-->
	<section class="fi_panel">
		<div class="f_box" data-category="1" data-no="0"><!-- 0:VR,1:刺激,2:兒童,3:情侶,4:雨天 -->
		<div class="bcover_border">
			<div class="f_mainphoto">
				<a href="javascript:void(0)">
					<img src="img/facilityInfo/sub_6365_LL.png" alt="rollerimg">
				</a>
				<div class="fi_caution">
					<a href="javascript:void(0)">Information<span>!</span></a>
				</div>
				</div>
			<a href="javascript:void(0)" class="bigA">
				<h2>宇宙雲霄飛車</h2>
				<div class="points">
					<img src="img/facilityInfo/star-dami.png" alt="">
					<img src="img/facilityInfo/star-dami.png" alt="">
					<img src="img/facilityInfo/star-dami.png" alt="">
					<img src="img/facilityInfo/star-dami.png" alt="">
					<img src="img/facilityInfo/star-dami.png" alt="">
					<span>(0)</span>
				</div>
				<div class="mobile375_points">
					分數:<span>0/5</span>
				</div>

				<div class="category">
					<img src="img/facilityInfo/heart305.png">
				</div>
				
				<div class="marquee_crowds" style="background-color: #712828;">
					<div class="marquee" data-marquee="目前狀態:擁擠"></div>
				</div>
			</a>
			</div>
		</div>

		<div class="f_box" data-category="234" data-no="1">
			<div class="bcover_border">
			<div class="f_mainphoto">
				<a href="javascript:void(0)">
					<img src="img/facilityInfo/ferris.jpg" alt="rollerimg">
				</a>
				<div class="fi_caution"><a href="javascript:void(0)">Information<span>!</span></a></div>
			</div>
			<a href="javascript:void(0)" class="bigA">
				<h2>FA摩天輪</h2>
				<div class="points">
					<img src="img/facilityInfo/star-dami.png" alt="">
					<img src="img/facilityInfo/star-dami.png" alt="">
					<img src="img/facilityInfo/star-dami.png" alt="">
					<img src="img/facilityInfo/star-dami.png" alt="">
					<img src="img/facilityInfo/star-dami.png" alt="">
					<span>(0)</span>
				</div>
				<div class="mobile375_points">
					分數:<span>0/5</span>
				</div>
				<div class="category">
					<img src="img/facilityInfo/child.png">
					<img src="img/facilityInfo/love.png">
					<img src="img/facilityInfo/umbrella.png">
				</div>
				<div class="marquee_crowds" style="background-color: #712828;">
					<div class="marquee" data-marquee="目前狀態:擁擠"></div>
				</div>
			</a>
			</div>
		</div>


		<div class="f_box" data-category="234" data-no="2">
			<div class="bcover_border">
			<div class="f_mainphoto">
				<a href="javascript:void(0)">
					<img src="img/facilityInfo/flying island.jpg" alt="flying islandimg">
				</a>
				<div class="fi_caution"><a href="javascript:void(0)">Information<span>!</span></a></div>
			</div>
			<a href="javascript:void(0)" class="bigA">
				<h2>特區飛碟</h2>
				<div class="points">
					<img src="img/facilityInfo/star-dami.png" alt="">
					<img src="img/facilityInfo/star-dami.png" alt="">
					<img src="img/facilityInfo/star-dami.png" alt="">
					<img src="img/facilityInfo/star-dami.png" alt="">
					<img src="img/facilityInfo/star-dami.png" alt="">
					<span>(0)</span>
				</div>
				<div class="mobile375_points">
					分數:<span>0/5</span>
				</div>
				<div class="category">
					<img src="img/facilityInfo/child.png">
					<img src="img/facilityInfo/love.png">
					<img src="img/facilityInfo/umbrella.png">
				</div>
				<div class="marquee_crowds" style="background-color: #8D681A;">
					<div class="marquee" data-marquee="目前狀態:普通"></div>
				</div>
			</a>
			</div>	
		</div>

		<div class="f_box" data-category="234" data-no="3">
			<div class="bcover_border">
			<div class="f_mainphoto">
			  <a href="iframe_02.html">
				<img src="img/facilityInfo/210.jpg" alt="station">
			  </a>
				<div class="fi_caution"><a href="javascript:void(0)">Information<span>!</span></a></div>
			</div>
			<a href="javascript:void(0)" class="bigA">
				<h2>未來中心</h2>
				<div class="points"><!-- 休息/美食街/諮詢中心 -->
					<img src="img/facilityInfo/star-dami.png" alt="">
					<img src="img/facilityInfo/star-dami.png" alt="">
					<img src="img/facilityInfo/star-dami.png" alt="">
					<img src="img/facilityInfo/star-dami.png" alt="">
					<img src="img/facilityInfo/star-dami.png" alt="">
					<span>(0)</span>
				</div>
				<div class="mobile375_points">
					分數:<span>0/5</span>
				</div>
				<div class="category">
					<img src="img/facilityInfo/child.png">
					<img src="img/facilityInfo/love.png">
					<img src="img/facilityInfo/umbrella.png">
				</div>
				<div class="marquee_crowds" style="background-color: #50CCC2;">
					<div class="marquee" data-marquee="目前狀態:空曠"></div>
				</div>
			</a>
		</div>
		</div>

		<div class="f_box" data-category="04" data-no="4">
			<div class="bcover_border">
			<div class="f_mainphoto">
				<img src="img/facilityInfo/gd.png" alt="gdvrimg">
				<div class="fi_caution"><a href="javascript:void(0)">Information<span>!</span></a></div>
			</div>
			<a href="javascript:void(0)" class="bigA">
				<h2>VR機器人戰鬥</h2>
				<div class="points">
					<img src="img/facilityInfo/star-dami.png" alt="">
					<img src="img/facilityInfo/star-dami.png" alt="">
					<img src="img/facilityInfo/star-dami.png" alt="">
					<img src="img/facilityInfo/star-dami.png" alt="">
					<img src="img/facilityInfo/star-dami.png" alt="">
					<span>(0)</span>
				</div>
				<div class="mobile375_points">
					分數:<span>0/5</span>
				</div>
				<div class="category">
					<img src="img/facilityInfo/VR.png">
					<img src="img/facilityInfo/umbrella.png">
				</div>
				<div class="marquee_crowds" style="background-color: #50CCC2;">
					<div class="marquee" data-marquee="目前狀態:空曠"></div>
				</div>
			</a>
		</div>
		</div>

		<div class="f_box"  data-category="04" data-no="5">
			<div class="bcover_border">
			<div class="f_mainphoto">
				<img src="img/facilityInfo/dami.jpg" alt="dami">
				<div class="fi_caution"><a href="javascript:void(0)">Information<span>!</span></a></div>
			</div>
			<a href="javascript:void(0)" class="bigA">
				<h2>404VR雲霄飛車</h2>
				<div class="points">
					<img src="img/facilityInfo/star-dami.png" alt="">
					<img src="img/facilityInfo/star-dami.png" alt="">
					<img src="img/facilityInfo/star-dami.png" alt="">
					<img src="img/facilityInfo/star-dami.png" alt="">
					<img src="img/facilityInfo/star-dami.png" alt="">
					<span>(0)</span>
				</div>
				<div class="mobile375_points">
					分數:<span>0/5</span>
				</div>
			</a>
		</div>
		</div>

		<div class="f_box"  data-category="23" data-no="6">
			<div class="bcover_border">
			<div class="f_mainphoto">
				<img src="img/facilityInfo/dami.jpg" alt="dami">
			</div>
			<h2>404飛行船</h2>
			<div class="points">
				<img src="img/facilityInfo/star-dami.png" alt="">
				<img src="img/facilityInfo/star-dami.png" alt="">
				<img src="img/facilityInfo/star-dami.png" alt="">
				<img src="img/facilityInfo/star-dami.png" alt="">
				<img src="img/facilityInfo/star-dami.png" alt="">
				<span>(0)</span>
			</div>
		</div>
		</div>

		<div class="f_box"  data-category="04" data-no="7">
			<div class="bcover_border">
			<div class="f_mainphoto">
				<img src="img/facilityInfo/dami.jpg" alt="dami">
			</div>
			<h2>404劇場</h2>
			<div class="points">
				<img src="img/facilityInfo/star-dami.png" alt="">
				<img src="img/facilityInfo/star-dami.png" alt="">
				<img src="img/facilityInfo/star-dami.png" alt="">
				<img src="img/facilityInfo/star-dami.png" alt="">
				<img src="img/facilityInfo/star-dami.png" alt="">
				<span>(0)</span>
			</div>
		</div>
	</div>
	</div>
<!-- -s- -->
		<div class="f_box"  data-category="04" data-no="8">
			<div class="bcover_border">
			<div class="f_mainphoto">
				<img src="img/facilityInfo/dami.jpg" alt="dami">
			</div>
			<h2>404</h2>
			<div class="points">
				<img src="img/facilityInfo/star-dami.png" alt="">
				<img src="img/facilityInfo/star-dami.png" alt="">
				<img src="img/facilityInfo/star-dami.png" alt="">
				<img src="img/facilityInfo/star-dami.png" alt="">
				<img src="img/facilityInfo/star-dami.png" alt="">
				<span>(0)</span>
			</div>
		</div>
		</div>
		
	</section>


<!-- ======================================= 設施01 ======================================= -->
	<div class="facilityBox fadeout" id="facility01">
		<section class="lightbox_wrapper">
			<span class="file shuffle">FacilityInfo_01</span>
			<div class="main_photo">
				<img src="img/facilityInfo/sub_6365_LL.png">
				<h2 class="title">宇宙雲霄飛車</h2>
				<span class="subTitle">COSMOS ROLLER COASTER</span>
			</div>
			<div class="content">
				

				<div class="inlineB paraLeft">
					<ul>
						<li>全長<span>1250</span>公尺</li>
						<li>速度最高<span>92</span>公里/小時</li>
						<li>高度最高<span>32</span>公尺</li>
					</ul>
				</div>

				<div class="inlineB paraRight">

					<div class="parameter">
						<div class="paraContent">
							<span>心跳指數</span>
							
							<svg viewBox="0 0 54 64" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns"><defs></defs>
							  <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
							    <path class="beat-loader" d="M0.5,38.5 L16,38.5 L19,25.5 L24.5,57.5 L31.5,7.5 L37.5,46.5 L43,38.5 L53.5,38.5" id="Path-2" stroke-width="1" sketch:type="MSShapeGroup"></path>
							  </g>
							</svg>
							<div class="heartbeat">120下/1min</div>
						</div>
					</div>

					<div class="parameter">
						
						<p class="paraContent middleLinehight">
							<span>適合對象</span>
							想感受刺激的人
						</p>
					</div>

					<div class="parameter">	
						<p class="paraContent middleLinehight">
							<span>身高限制</span>
							130cm~200cm
						</p>
					</div>
				</div>
			</div>

			<div class="hr">
				<div class="trai"></div>	
			</div>
			<a href="facilityBuyTicket.html" id="getTicket">立即前往購票</a>
			<div class="content">
			<div class="scoreTitle">設施介紹</div>		
				<p class="info">
					雲霄飛車是一種機動遊樂設施，常見於遊樂園和主題樂園中。Thompson是第一個註冊雲霄飛車相關專利技術的人（1865年1月20日），並曾製造過十數個雲霄飛車設施，因此被譽稱為「重力之父」。一個基本的雲霄飛車構造中，包含了爬昇、滑落、倒轉，其軌道的設計不一定是一個完整的迴圈，也可以設計為車體在軌道上的運行方式為來回移動。
					
				</p>
			</div>


			<div class="content">
				<div class="scoreTitle">設施評價</div>
				<div class="scoreContainer">
					<ul>
						<li class="scoreAverage">總平均<span>4.5</span>分</li>
						<li class="star">★★★★★</li>
						<li class="kai">總評分次數<span>1583</span>次</li>
					</ul>
				</div>
				<div id="comment">
					<div class="memcommentBox">
						<span class="memName">FutureAttak</span>
						<span class="memScore">★★★★★</span>
						<span class="memComment">noComment</span>
					</div>
					<div class="memcommentBox">
						<span class="memName">5-0DX</span>
						<span class="memScore">★★★★★</span>
						<span class="memComment">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed dtempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</span>
					</div>
					<div class="memcommentBox">
						<span class="memName">T'Vulcia</span>
						<span class="memScore">★★★★★</span>
						<span class="memComment">Great!</span>
					</div>
					<div class="memcommentBox">
						<span class="memName">T'Vulcia</span>
						<span class="memScore">★★★★★</span>
						<span class="memComment">Great!</span>
					</div>
					<div class="memcommentBox">
						<span class="memName">T'Vulcia</span>
						<span class="memScore">★★★★★</span>
						<span class="memComment">Great!</span>
					</div>
					<div class="memcommentBox">
						<span class="memName">Au'Vhadu</span>
						<span class="memScore">★★★★★</span>
						<span class="memComment">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmo tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</span>
					</div>
				</div>
			</div>
		</section>
	</div>
<!-- ======================================= 設施02 ======================================= -->
	<div class="facilityBox fadeout" id="facility02">
		<section class="lightbox_wrapper">
			<span class="file shuffle">FacilityInfo_02</span>
			<div class="main_photo">
				<img src="img/facilityInfo/sub_6365_LL.png">
				<h2 class="title">宇宙雲霄飛車2</h2>
				<span class="subTitle">COSMOS ROLLER COASTER</span>
			</div>
			<div class="content">
				

				<div class="inlineB paraLeft">
					<ul>
						<li>全長<span>1250</span>公尺</li>
						<li>速度最高<span>92</span>公里/小時</li>
						<li>高度最高<span>32</span>公尺</li>
					</ul>
				</div>

				<div class="inlineB paraRight">

					<div class="parameter">
						<div class="paraContent">
							<span>心跳指數</span>
							
							<svg viewBox="0 0 54 64" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns"><defs></defs>
							  <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
							    <path class="beat-loader" d="M0.5,38.5 L16,38.5 L19,25.5 L24.5,57.5 L31.5,7.5 L37.5,46.5 L43,38.5 L53.5,38.5" id="Path-2" stroke-width="1" sketch:type="MSShapeGroup"></path>
							  </g>
							</svg>
							<div class="heartbeat">120下/1min</div>
						</div>
					</div>

					<div class="parameter">
						
						<p class="paraContent middleLinehight">
							<span>適合對象</span>
							想感受刺激的人
						</p>
					</div>

					<div class="parameter">	
						<p class="paraContent middleLinehight">
							<span>身高限制</span>
							130cm~200cm
						</p>
					</div>
				</div>
			</div>

			<div class="hr">
				<div class="trai"></div>	
			</div>
			<a href="facilityBuyTicket.html" id="getTicket">立即前往購票</a>
			<div class="content">
			<div class="scoreTitle">設施介紹</div>		
				<p class="info">
					雲霄飛車是一種機動遊樂設施，常見於遊樂園和主題樂園中。Thompson是第一個註冊雲霄飛車相關專利技術的人（1865年1月20日），並曾製造過十數個雲霄飛車設施，因此被譽稱為「重力之父」。一個基本的雲霄飛車構造中，包含了爬昇、滑落、倒轉，其軌道的設計不一定是一個完整的迴圈，也可以設計為車體在軌道上的運行方式為來回移動。
					
				</p>
			</div>


			<div class="content">
				<div class="scoreTitle">設施評價</div>
				<div class="scoreContainer">
					<ul>
						<li class="scoreAverage">總平均<span>4.5</span>分</li>
						<li class="star">★★★★★</li>
						<li class="kai">總評分次數<span>1583</span>次</li>
					</ul>
				</div>
				<div id="comment">
					<div class="memcommentBox">
						<span class="memName">FutureAttak</span>
						<span class="memScore">★★★★★</span>
						<span class="memComment">noComment</span>
					</div>
					<div class="memcommentBox">
						<span class="memName">5-0DX</span>
						<span class="memScore">★★★★★</span>
						<span class="memComment">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed dtempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</span>
					</div>
					<div class="memcommentBox">
						<span class="memName">T'Vulcia</span>
						<span class="memScore">★★★★★</span>
						<span class="memComment">Great!</span>
					</div>
					<div class="memcommentBox">
						<span class="memName">T'Vulcia</span>
						<span class="memScore">★★★★★</span>
						<span class="memComment">Great!</span>
					</div>
					<div class="memcommentBox">
						<span class="memName">T'Vulcia</span>
						<span class="memScore">★★★★★</span>
						<span class="memComment">Great!</span>
					</div>
					<div class="memcommentBox">
						<span class="memName">Au'Vhadu</span>
						<span class="memScore">★★★★★</span>
						<span class="memComment">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmo tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</span>
					</div>
				</div>
			</div>
		</section>
	</div>
<!-- ======================================= 設施03 ======================================= -->
	<div class="facilityBox fadeout" id="facility03">
		<section class="lightbox_wrapper">
			<span class="file shuffle">FacilityInfo_03</span>
			<div class="main_photo">
				<img src="img/facilityInfo/sub_6365_LL.png">
				<h2 class="title">宇宙雲霄飛車3</h2>
				<span class="subTitle">COSMOS ROLLER COASTER</span>
			</div>
			<div class="content">
				

				<div class="inlineB paraLeft">
					<ul>
						<li>全長<span>1250</span>公尺</li>
						<li>速度最高<span>92</span>公里/小時</li>
						<li>高度最高<span>32</span>公尺</li>
					</ul>
				</div>

				<div class="inlineB paraRight">

					<div class="parameter">
						<div class="paraContent">
							<span>心跳指數</span>
							
							<svg viewBox="0 0 54 64" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns"><defs></defs>
							  <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
							    <path class="beat-loader" d="M0.5,38.5 L16,38.5 L19,25.5 L24.5,57.5 L31.5,7.5 L37.5,46.5 L43,38.5 L53.5,38.5" id="Path-2" stroke-width="1" sketch:type="MSShapeGroup"></path>
							  </g>
							</svg>
							<div class="heartbeat">120下/1min</div>
						</div>
					</div>

					<div class="parameter">
						
						<p class="paraContent middleLinehight">
							<span>適合對象</span>
							想感受刺激的人
						</p>
					</div>

					<div class="parameter">	
						<p class="paraContent middleLinehight">
							<span>身高限制</span>
							130cm~200cm
						</p>
					</div>
				</div>
			</div>

			<div class="hr">
				<div class="trai"></div>	
			</div>
			<a href="facilityBuyTicket.html" id="getTicket">立即前往購票</a>
			<div class="content">
			<div class="scoreTitle">設施介紹</div>		
				<p class="info">
					雲霄飛車是一種機動遊樂設施，常見於遊樂園和主題樂園中。Thompson是第一個註冊雲霄飛車相關專利技術的人（1865年1月20日），並曾製造過十數個雲霄飛車設施，因此被譽稱為「重力之父」。一個基本的雲霄飛車構造中，包含了爬昇、滑落、倒轉，其軌道的設計不一定是一個完整的迴圈，也可以設計為車體在軌道上的運行方式為來回移動。
					
				</p>
			</div>


			<div class="content">
				<div class="scoreTitle">設施評價</div>
				<div class="scoreContainer">
					<ul>
						<li class="scoreAverage">總平均<span>4.5</span>分</li>
						<li class="star">★★★★★</li>
						<li class="kai">總評分次數<span>1583</span>次</li>
					</ul>
				</div>
				<div id="comment">
					<div class="memcommentBox">
						<span class="memName">FutureAttak</span>
						<span class="memScore">★★★★★</span>
						<span class="memComment">noComment</span>
					</div>
					<div class="memcommentBox">
						<span class="memName">5-0DX</span>
						<span class="memScore">★★★★★</span>
						<span class="memComment">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed dtempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</span>
					</div>
					<div class="memcommentBox">
						<span class="memName">T'Vulcia</span>
						<span class="memScore">★★★★★</span>
						<span class="memComment">Great!</span>
					</div>
					<div class="memcommentBox">
						<span class="memName">T'Vulcia</span>
						<span class="memScore">★★★★★</span>
						<span class="memComment">Great!</span>
					</div>
					<div class="memcommentBox">
						<span class="memName">T'Vulcia</span>
						<span class="memScore">★★★★★</span>
						<span class="memComment">Great!</span>
					</div>
					<div class="memcommentBox">
						<span class="memName">Au'Vhadu</span>
						<span class="memScore">★★★★★</span>
						<span class="memComment">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmo tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</span>
					</div>
				</div>
			</div>
		</section>
	</div>
<!-- ======================================= 設施04 ======================================= -->
	<div class="facilityBox fadeout" id="facility04">
		<section class="lightbox_wrapper">
			<span class="file shuffle">FacilityInfo_04</span>
			<div class="main_photo">
				<img src="img/facilityInfo/sub_6365_LL.png">
				<h2 class="title">宇宙雲霄飛車4</h2>
				<span class="subTitle">COSMOS ROLLER COASTER</span>
			</div>
			<div class="content">
				

				<div class="inlineB paraLeft">
					<ul>
						<li>全長<span>1250</span>公尺</li>
						<li>速度最高<span>92</span>公里/小時</li>
						<li>高度最高<span>32</span>公尺</li>
					</ul>
				</div>

				<div class="inlineB paraRight">

					<div class="parameter">
						<div class="paraContent">
							<span>心跳指數</span>
							
							<svg viewBox="0 0 54 64" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns"><defs></defs>
							  <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
							    <path class="beat-loader" d="M0.5,38.5 L16,38.5 L19,25.5 L24.5,57.5 L31.5,7.5 L37.5,46.5 L43,38.5 L53.5,38.5" id="Path-2" stroke-width="1" sketch:type="MSShapeGroup"></path>
							  </g>
							</svg>
							<div class="heartbeat">120下/1min</div>
						</div>
					</div>

					<div class="parameter">
						
						<p class="paraContent middleLinehight">
							<span>適合對象</span>
							想感受刺激的人
						</p>
					</div>

					<div class="parameter">	
						<p class="paraContent middleLinehight">
							<span>身高限制</span>
							130cm~200cm
						</p>
					</div>
				</div>
			</div>

			<div class="hr">
				<div class="trai"></div>	
			</div>
			<a href="facilityBuyTicket.html" id="getTicket">立即前往購票</a>
			<div class="content">
			<div class="scoreTitle">設施介紹</div>		
				<p class="info">
					雲霄飛車是一種機動遊樂設施，常見於遊樂園和主題樂園中。Thompson是第一個註冊雲霄飛車相關專利技術的人（1865年1月20日），並曾製造過十數個雲霄飛車設施，因此被譽稱為「重力之父」。一個基本的雲霄飛車構造中，包含了爬昇、滑落、倒轉，其軌道的設計不一定是一個完整的迴圈，也可以設計為車體在軌道上的運行方式為來回移動。
					
				</p>
			</div>


			<div class="content">
				<div class="scoreTitle">設施評價</div>
				<div class="scoreContainer">
					<ul>
						<li class="scoreAverage">總平均<span>4.5</span>分</li>
						<li class="star">★★★★★</li>
						<li class="kai">總評分次數<span>1583</span>次</li>
					</ul>
				</div>
				<div id="comment">
					<div class="memcommentBox">
						<span class="memName">FutureAttak</span>
						<span class="memScore">★★★★★</span>
						<span class="memComment">noComment</span>
					</div>
					<div class="memcommentBox">
						<span class="memName">5-0DX</span>
						<span class="memScore">★★★★★</span>
						<span class="memComment">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed dtempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</span>
					</div>
					<div class="memcommentBox">
						<span class="memName">T'Vulcia</span>
						<span class="memScore">★★★★★</span>
						<span class="memComment">Great!</span>
					</div>
					<div class="memcommentBox">
						<span class="memName">T'Vulcia</span>
						<span class="memScore">★★★★★</span>
						<span class="memComment">Great!</span>
					</div>
					<div class="memcommentBox">
						<span class="memName">T'Vulcia</span>
						<span class="memScore">★★★★★</span>
						<span class="memComment">Great!</span>
					</div>
					<div class="memcommentBox">
						<span class="memName">Au'Vhadu</span>
						<span class="memScore">★★★★★</span>
						<span class="memComment">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmo tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</span>
					</div>
				</div>
			</div>
		</section>
	</div>
<!-- ======================================= 設施05 ======================================= -->
	<div class="facilityBox fadeout" id="facility05">
		<section class="lightbox_wrapper">
			<span class="file shuffle">FacilityInfo_05</span>
			<div class="main_photo">
				<img src="img/facilityInfo/sub_6365_LL.png">
				<h2 class="title">宇宙雲霄飛車5</h2>
				<span class="subTitle">COSMOS ROLLER COASTER</span>
			</div>
			<div class="content">
				

				<div class="inlineB paraLeft">
					<ul>
						<li>全長<span>1250</span>公尺</li>
						<li>速度最高<span>92</span>公里/小時</li>
						<li>高度最高<span>32</span>公尺</li>
					</ul>
				</div>

				<div class="inlineB paraRight">

					<div class="parameter">
						<div class="paraContent">
							<span>心跳指數</span>
							
							<svg viewBox="0 0 54 64" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns"><defs></defs>
							  <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
							    <path class="beat-loader" d="M0.5,38.5 L16,38.5 L19,25.5 L24.5,57.5 L31.5,7.5 L37.5,46.5 L43,38.5 L53.5,38.5" id="Path-2" stroke-width="1" sketch:type="MSShapeGroup"></path>
							  </g>
							</svg>
							<div class="heartbeat">120下/1min</div>
						</div>
					</div>

					<div class="parameter">
						
						<p class="paraContent middleLinehight">
							<span>適合對象</span>
							想感受刺激的人
						</p>
					</div>

					<div class="parameter">	
						<p class="paraContent middleLinehight">
							<span>身高限制</span>
							130cm~200cm
						</p>
					</div>
				</div>
			</div>

			<div class="hr">
				<div class="trai"></div>	
			</div>
			<a href="facilityBuyTicket.html" id="getTicket">立即前往購票</a>
			<div class="content">
			<div class="scoreTitle">設施介紹</div>		
				<p class="info">
					雲霄飛車是一種機動遊樂設施，常見於遊樂園和主題樂園中。Thompson是第一個註冊雲霄飛車相關專利技術的人（1865年1月20日），並曾製造過十數個雲霄飛車設施，因此被譽稱為「重力之父」。一個基本的雲霄飛車構造中，包含了爬昇、滑落、倒轉，其軌道的設計不一定是一個完整的迴圈，也可以設計為車體在軌道上的運行方式為來回移動。
					
				</p>
			</div>


			<div class="content">
				<div class="scoreTitle">設施評價</div>
				<div class="scoreContainer">
					<ul>
						<li class="scoreAverage">總平均<span>4.5</span>分</li>
						<li class="star">★★★★★</li>
						<li class="kai">總評分次數<span>1583</span>次</li>
					</ul>
				</div>
				<div id="comment">
					<div class="memcommentBox">
						<span class="memName">FutureAttak</span>
						<span class="memScore">★★★★★</span>
						<span class="memComment">noComment</span>
					</div>
					<div class="memcommentBox">
						<span class="memName">5-0DX</span>
						<span class="memScore">★★★★★</span>
						<span class="memComment">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed dtempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</span>
					</div>
					<div class="memcommentBox">
						<span class="memName">T'Vulcia</span>
						<span class="memScore">★★★★★</span>
						<span class="memComment">Great!</span>
					</div>
					<div class="memcommentBox">
						<span class="memName">T'Vulcia</span>
						<span class="memScore">★★★★★</span>
						<span class="memComment">Great!</span>
					</div>
					<div class="memcommentBox">
						<span class="memName">T'Vulcia</span>
						<span class="memScore">★★★★★</span>
						<span class="memComment">Great!</span>
					</div>
					<div class="memcommentBox">
						<span class="memName">Au'Vhadu</span>
						<span class="memScore">★★★★★</span>
						<span class="memComment">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmo tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</span>
					</div>
				</div>
			</div>
		</section>
	</div>
</section>
	<div id="close"><img src="img/facilityInfo/close.png"></div>

	<div id="all-page"></div><!-- login登箱叫出時背景-->
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

	<script src="https://code.jquery.com/jquery-3.2.1.js" defer></script>
	<script src="js/facilityInfo_main.js" defer></script>
	<script src="js/00nav.js" defer></script>
	<script src="js/page_load_unload.js" defer></script>
	<script type="text/javascript">
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
				
				
			}
			window.addEventListener('load', login, false);
	</script>
</body>
</html>