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
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<meta charset="UTF-8">
	<title>FA未來主題樂園</title>
	<link rel="stylesheet" type="text/css" href="css/RESET.css">
	<style type="text/css">
		*{
			text-decoration: none;
			box-sizing: border-box;
		}
		body{
			overflow: hidden;
		}
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
	/*	body.fadeout .section{
		  -webkit-transform:scale(1.5);
		  transform:scale(1.5);
		}*/

	</style>
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" type="text/css" href="css/01main.css">
	<link rel="stylesheet" type="text/css" href="css/01main_ferris_wheel.css">
	<link rel="stylesheet" type="text/css" href="css/02map.css">
	<link rel="stylesheet" type="text/css" href="css/03theater.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/earlyaccess/thabit.css">
	<link rel="stylesheet" type="text/css" href="css/04activity_calendar.css">
	<link rel="stylesheet" type="text/css" href="css/05ticket.css">
	<link rel="stylesheet" type="text/css" href="css/javascript.fullPage.css" />
</head>
<!-- 登入區 -->


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
                			echo "<a href='MembersOnly.html'>帳戶</a>";
                		}else{
                			echo "註冊";
                		}
                	?>
                </span>
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
        <a href="#page1" class="logo_a">
            <img src="img/LOGO.png" class="logo">
        </a>
        <ul class="ul_right">
            <li>
                <a href="#page2" id="NavClose">園區地圖</a>
            </li>
            <li>
                <a href="activity.php">活動月曆</a>
            </li>
            <li>
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


	<!-- 視差區-->
	<div id="fullpage">




		<section class="t_wrapper section" id="section0">

		<div id="mobileWelcome"><!-- 768以下ㄉ霓虹燈 -->
				<div class="fw_motobox" id="fw_wordbox">
					<div class="fw_motoword" id="fw_word">
							WELCOME TO <span>FUTURE</span>
					</div>
				</div>								
		</div>

		<img src="img/firstSection/banner1.png" class="mobileSizeBanner">

			<div class="silhouette">
					<div class="balloon"></div>
					<div class="balloon"></div>
					<div class="balloon"></div>
					<div class="balloon"></div>
				
				<div id="scene">
					<div data-depth="0.28">
						<img src="img/firstSection/machi2.png" class="machi">
					</div>
					<div data-depth="0.2">
						<img src="img/firstSection/machi.png" class="machi">
					</div>
					<div data-depth="0.15">
						<img src="img/firstSection/rocket.png" class="rocket">
					</div>
					<div data-depth="0.09">
						<img src="img/firstSection/roller.png" class="roller">
					</div>
					<div data-depth="0.04" class="fd">
						<!-- 高 -->
						<!-- ferrisWheel -->
						<div class="ferris_cover">
							<img src="img/firstSection/fw_bt.png" class="fw">
							<div id="ferrisWheel">
								<div id="wheel_s"></div>
								<div id="wheel_m"></div>
								<div id="wheel" class="rotating">

									<div id="spokes">
										<div class="spoke"></div>
										<div class="spoke"></div>
										<div class="spoke"></div>
										<div class="spoke"></div>
										<div class="spoke"></div>
										<div class="spoke"></div>
									</div>

									<div id="center">
										<div class="fw_motobox" id="fw_wordbox">
											<div class="fw_motoword" id="fw_word">
												WELCOME TO FUTURE
											</div>
										</div>
										<!-- 摩天輪上ㄉ霓虹燈 -->
									</div>

									<div id="cabins">

										<div class="cabinContainer">
											<div class="hingeOffset">
												<div class="hinge">
													<div class="cabin"></div>
												</div>
											</div>
											<div class="hingeOffset">
												<div class="hinge">
													<div class="cabin"></div>
												</div>
											</div>
										</div>

										<div class="cabinContainer">
											<div class="hingeOffset">
												<div class="hinge">
													<div class="cabin"></div>
												</div>
											</div>
											<div class="hingeOffset">
												<div class="hinge">
													<div class="cabin"></div>
												</div>
											</div>
										</div>

										<div class="cabinContainer">
											<div class="hingeOffset">
												<div class="hinge">
													<div class="cabin"></div>
												</div>
											</div>
											<div class="hingeOffset">
												<div class="hinge">
													<div class="cabin"></div>
												</div>
											</div>
										</div>

										<div class="cabinContainer">
											<div class="hingeOffset">
												<div class="hinge">
													<div class="cabin"></div>
												</div>
											</div>
											<div class="hingeOffset">
												<div class="hinge">
													<div class="cabin"></div>
												</div>
											</div>
										</div>

										<div class="cabinContainer">
											<div class="hingeOffset">
												<div class="hinge">
													<div class="cabin"></div>
												</div>
											</div>
											<div class="hingeOffset">
												<div class="hinge">
													<div class="cabin"></div>
												</div>
											</div>
										</div>

										<div class="cabinContainer">
											<div class="hingeOffset">
												<div class="hinge">
													<div class="cabin"></div>
												</div>
											</div>
											<div class="hingeOffset">
												<div class="hinge">
													<div class="cabin"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div id="base">
								</div>
							</div>
						</div>
						<!-- ferrisWheel END-->
					</div>

			<div data-depth="0.05" class="ed">
			<div class="e_canvas_cover">
			<canvas id="e_light"></canvas>
			</div>
			<div id="robo">
				<img src="img/firstSection/robo.png">
			</div>
			<img src="img/firstSection/entrance.png" class="entrance">
			<div class="mobileBannerOpenBtn"></div><!--在大門口的圓圈位置-->
			</div>

		</div><!-- scene END-->
		<div class="shipbox"><!-- 飛行船 --><!-- banner -->
			<img src="img/firstSection/flyship.png" class="flyship">
			<div class="banner"><!-- bannerbox+圖 --><!-- id="openBanner" -->
				<img src="img/firstSection/banner1.png">
			</div>
		</div><!-- banner end-->
		<div class="black_bar"></div>
		</div>
		<div id="all-page"></div><!-- banner叫出時背景-->
		</section>
		<!-- 視差區END-->


		<!-- 第二屏開始-->
		<section class="map_wrapper section" id="section1">

			<div class="map">

				<img class="map_border" src="img/secondSection/map_whole.png" alt="map">
				<div class="shadow ferris_wheel_shadow"></div>
				<img class="facility_icons ferris_wheel unchecked" data-facility="ferris_wheel" src="img/secondSection/ferris_wheel.png"
				    alt="">
				<div class="shadow roller_coaster_shadow"></div>
				<img class="facility_icons roller_coaster unchecked" data-facility="roller_coaster" src="img/secondSection/roller_coaster.png"
				    alt="">
				<div class="shadow _shadow"></div>
				<img class="facility_icons  unchecked" data-facility="" src="img/secondSection/.png" alt="">
				<div class="shadow coffee_cup_shadow"></div>
				<img class="facility_icons coffee_cup unchecked" data-facility="coffee_cup" src="img/secondSection/coffee_cup.png" alt="">
				<div class="shadow bumper_cars_shadow"></div>
				<img class="facility_icons bumper_cars unchecked" data-facility="bumper_cars" src="img/secondSection/bumper_cars.png" alt="">
				<div class="shadow theater_shadow"></div>
				<img class="facility_icons theater unchecked" data-facility="theater" src="img/secondSection/theater.png" alt="">

				<!--設施資訊 -->
			</div>
			<div class="info">

				<button class="close"></button>
				<div class="info_container">
					<div class="info_content info_ferris_wheel">

						<!-- 左邊圖 -->
						<div class="main_photo">
								<img src="img/secondSection/ferris_wheel_img.jpg" alt="">
						</div>
						<!-- 右邊標題跟介紹 -->

						<div class="main_content">
								<div class="title">
										<h2>FA摩天輪</h2>
										<small>FA FERRIS WHEEL</small>
									</div>
							<div class="information">
								<div class="parameter">
									<div class="paraContent">
										<h5>心跳指數</h5>
										<!-- <small>90下/分鐘</small> -->
										<svg width="100%" height="50px" viewBox="0 0 50 60" viewport="0 0 50 30" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
										    xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
											<defs></defs>
											<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
												<path class="beat-loader" d="M0.5,38.5 L16,38.5 L19,25.5 L24.5,57.5 L31.5,7.5 L37.5,46.5 L43,38.5 L53.5,38.5" id="Path-2"
												    stroke-width="1" sketch:type="MSShapeGroup"></path>
											</g>
										</svg>
										
									</div>
								</div>
								<div class="parameter">

										<h5>適合對象</h5>
									<p class="paraContent middleLinehight">
										
										想感受刺激者
									</p>
								</div>

								<div class="parameter">
										<h5>身高限制</h5>
									<p class="paraContent middleLinehight">
										
										130~200cm
									</p>
								</div>
								<div class="parameter">
										<h5>設施評價</h5>
										<p class="paraContent middleLinehight">
											4.5分
										</p>
									</div>
							</div>
							<a class="open_iframe" href="#" data-no="3">了解更多</a>
						</div>

					</div>
					<div class="info_content info_roller_coaster">
						<!-- 左邊圖 -->
						<div class="main_photo">
								<img src="img/secondSection/roller_coaster_img.jpg" alt="">
							</div>

							<!-- 右邊標題跟介紹 -->
							<div class="main_content">
								<div class="title">
									<h2>宇宙雲霄飛車</h2>
									<small>COSMOS ROLLER COASTER</small>
								</div>
								<div class="information">
									
	
										<div class="parameter">
											<div class="paraContent">
												<h5>心跳指數</h5>
												<!-- <small>90下/分鐘</small> -->
												<svg width="100%" height="50px" viewBox="0 0 50 60" viewport="0 0 50 30" version="1.1" xmlns="http://www.w3.org/2000/svg"
													xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
													<defs></defs>
													<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
														<path class="beat-loader" d="M0.5,38.5 L16,38.5 L19,25.5 L24.5,57.5 L31.5,7.5 L37.5,46.5 L43,38.5 L53.5,38.5" id="Path-2"
															stroke-width="1" sketch:type="MSShapeGroup"></path>
													</g>
												</svg>
	
											</div>
										</div>
										<div class="parameter">
	
											<h5>適合對象</h5>
											<p class="paraContent middleLinehight">
	
												想感受刺激者
											</p>
										</div>
	
										<div class="parameter">
												<h5>身高限制</h5>
											<p class="paraContent middleLinehight">
											
												130~200cm
											</p>
										</div>
										<div class="parameter">
												<h5>設施評價</h5>
											<p class="paraContent middleLinehight">
												
												4.5分
											</p>
										</div>
								
								</div>
								<a class="open_iframe" href="#">了解更多</a>
							</div>
					</div>
					<div class="info_content info_carousel">
						<!-- 左邊圖 -->
						<div class="main_photo">
								<img src="img/secondSection/ferris_wheel_img.jpg" alt="">
							</div>
							<!-- 右邊標題跟介紹 -->
							<div class="main_content">
								<div class="title">
									<h2>宇宙雲霄飛車</h2>
									<small>COSMOS ROLLER COASTER</small>
								</div>
								<div class="information">
									
	
										<div class="parameter">
											<div class="paraContent">
												<h5>心跳指數</h5>
												<!-- <small>90下/分鐘</small> -->
												<svg width="100%" height="50px" viewBox="0 0 50 60" viewport="0 0 50 30" version="1.1" xmlns="http://www.w3.org/2000/svg"
													xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
													<defs></defs>
													<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
														<path class="beat-loader" d="M0.5,38.5 L16,38.5 L19,25.5 L24.5,57.5 L31.5,7.5 L37.5,46.5 L43,38.5 L53.5,38.5" id="Path-2"
															stroke-width="1" sketch:type="MSShapeGroup"></path>
													</g>
												</svg>
	
											</div>
										</div>
										<div class="parameter">
	
											<h5>適合對象</h5>
											<p class="paraContent middleLinehight">
	
												想感受刺激者
											</p>
										</div>
	
										<div class="parameter">
												<h5>身高限制</h5>
											<p class="paraContent middleLinehight">
												
												130~200cm
											</p>
										</div>
										<div class="parameter">
												<h5>設施評價</h5>
											<p class="paraContent middleLinehight">
												
												4.5分
											</p>
										</div>
								
								</div>
								<a class="open_iframe" href="#">了解更多</a>
							</div>
					</div>
					<div class="info_content info_coffee_cup">
						<!-- 左邊圖 -->
						<div class="main_photo">
								<img src="img/secondSection/coffee_cup_img.jpg" alt="">
							</div>
							<!-- 右邊標題跟介紹 -->
							<div class="main_content">
								<div class="title">
									<h2>宇宙雲霄飛車</h2>
									<small>COSMOS ROLLER COASTER</small>
								</div>
								<div class="information">
									
	
										<div class="parameter">
											<div class="paraContent">
												<h5>心跳指數</h5>
												<!-- <small>90下/分鐘</small> -->
												<svg width="100%" height="50px" viewBox="0 0 50 60" viewport="0 0 50 30" version="1.1" xmlns="http://www.w3.org/2000/svg"
													xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
													<defs></defs>
													<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
														<path class="beat-loader" d="M0.5,38.5 L16,38.5 L19,25.5 L24.5,57.5 L31.5,7.5 L37.5,46.5 L43,38.5 L53.5,38.5" id="Path-2"
															stroke-width="1" sketch:type="MSShapeGroup"></path>
													</g>
												</svg>
	
											</div>
										</div>
										<div class="parameter">
	
											<h5>適合對象</h5>
											<p class="paraContent middleLinehight">
	
												想感受刺激者
											</p>
										</div>
	
										<div class="parameter">
												<h5>身高限制</h5>
											<p class="paraContent middleLinehight">
												
												130~200cm
											</p>
										</div>
										<div class="parameter">
												<h5>設施評價</h5>
											<p class="paraContent middleLinehight">
												
												4.5分
											</p>
										</div>
								
								</div>
								<a class="open_iframe" href="#">了解更多</a>
							</div>
					</div>
					<div class="info_content info_bumper_cars">
						<!-- 左邊圖 -->
						<div class="main_photo">
								<img src="img/secondSection/bumper_cars_img.jpg" alt="">
							</div>
							<!-- 右邊標題跟介紹 -->
							<div class="main_content">
								<div class="title">
									<h2></h2>
									<small>COSMOS ROLLER COASTER</small>
								</div>
								<div class="information">
									
	
										<div class="parameter">
											<div class="paraContent">
												<h5>心跳指數</h5>
												<!-- <small>90下/分鐘</small> -->
												<svg width="100%" height="50px" viewBox="0 0 50 60" viewport="0 0 50 30" version="1.1" xmlns="http://www.w3.org/2000/svg"
													xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
													<defs></defs>
													<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
														<path class="beat-loader" d="M0.5,38.5 L16,38.5 L19,25.5 L24.5,57.5 L31.5,7.5 L37.5,46.5 L43,38.5 L53.5,38.5" id="Path-2"
															stroke-width="1" sketch:type="MSShapeGroup"></path>
													</g>
												</svg>
	
											</div>
										</div>
										<div class="parameter">
	
											<h5>適合對象</h5>
											<p class="paraContent middleLinehight">
	
												想感受刺激者
											</p>
										</div>
	
										<div class="parameter">
												<h5>身高限制</h5>
											<p class="paraContent middleLinehight">
												
												130~200cm
											</p>
										</div>
										<div class="parameter">
												<h5>設施評價</h5>
											<p class="paraContent middleLinehight">
												
												4.5分
											</p>
										</div>
								
								</div>
								<a class="open_iframe" href="#">了解更多</a>
							</div>
					</div>
					<div class="info_content info_theater">
						<!-- 左邊圖 -->
						<div class="main_photo">
								<img src="img/secondSection/theater_img.png" alt="">
							</div>
							<!-- 右邊標題跟介紹 -->
							<div class="main_content">
								<div class="title">
									<h2>test~~~~~~~</h2>
									<small>COSMOS ROLLER COASTER</small>
								</div>
								<div class="information">
									
	
										<div class="parameter">
											<div class="paraContent">
												<h5>心跳指數</h5>
												<!-- <small>90下/分鐘</small> -->
												<svg width="100%" height="50px" viewBox="0 0 50 60" viewport="0 0 50 30" version="1.1" xmlns="http://www.w3.org/2000/svg"
													xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
													<defs></defs>
													<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
														<path class="beat-loader" d="M0.5,38.5 L16,38.5 L19,25.5 L24.5,57.5 L31.5,7.5 L37.5,46.5 L43,38.5 L53.5,38.5" id="Path-2"
															stroke-width="1" sketch:type="MSShapeGroup"></path>
													</g>
												</svg>
	
											</div>
										</div>
										<div class="parameter">
	
											<h5>適合對象</h5>
											<p class="paraContent middleLinehight">
	
												想感受刺激者
											</p>
										</div>
	
										<div class="parameter">
												<h5>身高限制</h5>
											<p class="paraContent middleLinehight">
												
												130~200cm
											</p>
										</div>
										<div class="parameter">
												<h5>設施評價</h5>
											<p class="paraContent middleLinehight">
												
												4.5分
											</p>
										</div>
								
								</div>
								<a class="open_iframe" href="#">了解更多</a>
							</div>
					</div>
				</div>
			</div>

		</section>


























		<!-- 第三屏開始-->
		<section class="theater_wrapper section" id="section2">
			<ul class="TheaterArea">
				<li class="Theater current" id="intro">
					<div class="cover"></div>
					<div class="label">File01</div>
					<div class="theaterInfo" id="info">
						<h2 class="theatertitle">劇場介紹</h2>
						<div class="theatercontent">
							FA未來劇場配備最先進的4DX體感技術
							、720度全景環繞螢幕，搭配精心策畫的節目內容，720度環繞，座位會搭配影片有相應的動作 ，必定讓您留下難忘的體驗。
						</div>
					</div>
				</li>
				<li class="Theater notcurrent">
					<div class="cover"></div>
					<div class="label">File02</div>
					<!-- <img src="img/thirdSection/spaceship.png" width="300px" height="300px;"> -->
					<div class="theaterInfo" id="info">
						<h2 class="theatertitle">尋找星生命</h2>
						<div class="theatercontent">
							廣大的宇宙中，到底有沒有外星人？
							跟著最先進的太空工作室，一窺宇宙前線，尋找外星新生命。
						</div>
						
					</div>
				</li>
				<li class="Theater notcurrent">
					<div class="cover"></div>
					<div class="label">File03</div>
					<!-- <img src="img/thirdSection/spaceman.png" width="300px" height="300px;"> -->
					<div class="theaterInfo" id="info">
						<h2 class="theatertitle">末世決戰</h2>
						<div class="theatercontent">
							傑克與瑪莉無意之間打開了宇宙通道，數以兆計的外星生物瞬間湧入地球，人類究竟該不該跟牠們成為朋友？
						</div>
					</div>
						
				</li>
				<li class="buy notcurrent">
					<!-- <div class="cover"></div> -->
					<a href="Theaterbuyticket.php">
						<span>立即購票</span>
					</a>
				</li>
				<!-- 前往購票按鈕 -->
			</ul>


		</section>
	<!-- 第四屏開始-->
	<section class="section" id="section3">
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
	                    <span>
	                    劇場時間
	                	</span>
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

		<div id="showActivityWrapper">
			<div id="activityClose">
				<i class="fa fa-times-circle"></i>
			</div>
		    <span id="activityDate">活動表</span>
		    <span id="activityDay"></span>
		    <div id="border_bottom"></div>
		    <div id="content">
		        <table id="activity">
		            <tr><th>10:00-14:00</th><td><a class="convert">詳情</a></td></tr>
		            <tr><td colspan="2">夢境遊行夢</td></tr>
		        </table>
		        <div id="weatherWrapper">
		        	<div id="result">園區天氣<br>
		        	</div>
    			</div>
		    </div>
		</div>
		</div>
	</section>



		<!-- 第五屏開始-->
		<section class="section" id="section4">
			<div class="ticket">

				<div class="cont">
					<!--中間灰色-->
					<img class="bar" src="img/fifthSection/bar.png" alt="bar">

					<!-- 左邊購買票卷 -->
					<div class="leftBox">
						<div class="leftContent">
							<h3>*** GET TICKET ***</h3>
							<div class="top_button">
								<button>前往樂園</button>
								<button>如何購票</button>
								<button>票券模式</button>
							</div>
							
							<div class="down_button">
								<button class="change" onclick=" location.href='facilityBuyTicket.php'">購買設施票券</button>
								<button class="change" onclick=" location.href='Theaterbuyticket.php'">購買劇場票券</button>
							</div>
							
						</div>
					</div>



					<!-- 中間區塊 -->
					<div class="midBox">
						<!-- 第一塊如何購票 -->
						<div class="midContent_1" id="midContent_1">
							<h3>*** INFO ***</h3>
							<div class="pic"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3616.9010562788353!2d121.1903276150953!3d24.969480784002634!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x346823c1ec904dcb%3A0xcdc129d4455ce456!2z5ZyL56uL5Lit5aSu5aSn5a24!5e0!3m2!1szh-TW!2stw!4v1516799135037" width="370" height="200" frameborder="0" style="border:0" allowfullscreen></iframe></div>
							<hr>
							<div class="text">
								<p>樂園位置
								</p>
							</div>
						</div>
						<!-- 第二塊票券模式 -->
						<div class="midContent_2" id="midContent_2">
							<h3>*** INFO ***</h3>
							<div class="pic" ><img src="img/fifthSection/ticket.png"></div>
							<hr>
							<div class="text">
								<p>現場購票或是進入購買頁面進行購票。
								</p>
							</div>
						</div>
						<!-- 第三塊票卷期限 -->
						<div class="midContent_3" id="midContent_3">
							<h3>*** INFO ***</h3>
							<div class="pic"></div>
							<hr>
							<div class="text">
								<p>我們的線上電子票券期限為
								</p>
							</div>
						</div>

					</div>



					<!-- 右邊區塊 -->
					<div class="rightBox">
						<h3>*** SCANNING ***</h3>
						<div class="visual1">
							<img src="img/qrcode.png" alt="QR">
						</div>

						<div class="visual2">
							<img class="circle" src="img/fifthSection/circle.png" alt="circle">

							<img src="img/fifthSection/phone.png" alt="phone">
						</div>
					</div>
				</div>
			</div>
	</section>
	
		</div>

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
				            <input type="reset" name="reset" value="重填">
				            <input type="submit" name="" id="submit" value="登入">
        				</div>
			</form>
		</div>

		<!-- ======================================= 設施01 ======================================= -->
<div class="facilityBox fadeout" id="facility01">
		<section class="lightbox_wrapper">
			<div class="main_photo">
				<span id="main_photo"></span>
				<h2 class="title"></h2>
				<span class="subTitle"></span>
			</div>
			<div class="content">
				

				<div class="inlineB paraLeft">
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
							<div class="heartbeat"></div>
						</div>
					</div>

					<div class="parameter">
						
						<p class="paraContent middleLinehight suit">
						</p>
					</div>

					<div class="parameter">	
						<p class="paraContent middleLinehight limit">
						</p>
					</div>
				</div>
			</div>

			<div class="hr">
				<div class="trai"></div>	
			</div>
			<a href="" id="getTicket">立即前往購票</a>
			<div class="content">
			<div class="scoreTitle">設施介紹</div>		
				<p class="info">
				</p>
			</div>


			<div class="content">
				<div class="scoreTitle">設施評價</div>
				<div class="scoreContainer">
					<ul>
						<li class="scoreAverage"></li>
						<li class="star">
								<div class="points_cover">
									<span class="points_bar_bo">
									<span class="points_bar" id="star_points_bar"></span>

									<img src="img/facilityInfo/ratingCover_g.png" alt="cover">
								</div>
						</li>
						<li class="kai"></li>
						<li id="goComment" data-facilityNo="">前往評價</li>
					</ul>
				</div>
				<div id="comment">
					<div class="memcommentBox">
						<span class="memName">FutureAttak</span>
						<span class="memScore">★★★★★</span>
						<span class="memComment">noComment</span>
					</div>
				</div>
			</div>
		</section>
	</div>
<!-- ======================================= 設施 ======================================= -->
		
		<div id="close">
			<img src="img/facilityInfo/close.png">
		</div>

		<!-- LOADING畫面 -->

<!-- 	<div id="loading">
			<div class="loading">Loading</div>
		</div> -->


		<script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<!-- <script src="https://code.jquery.com/jquery-3.2.1.js"></script> -->
		<script src="js/javascript.fullPage.js"></script>
		<script src="js/00nav.js"></script>
		<script src="js/01main.js"></script>
		<script src="js/02map.js"></script>
		<script src="js/04calendar.js"></script>
		<script src="js/page_load_unload.js"></script>
		<script>
			// FULLPAGE------------------------------------------
			fullpage.initialize('#fullpage', {
				anchors: ['page1', 'page2', 'page3', 'page4', 'page5'],
				css3: true,
				navigation: true,
				navigationTooltips: ['page1', 'page2', 'page3', 'page4', 'page5']
			});

			// LOADING畫面js--------------------------------------
			// var originTime = new Date().getTime();

			// function loading(){
			// 	var now = new Date().getTime();
			// 	console.log(originTime,now);
			// if (now-originTime<=2000) {
			//   	setTimeout('stopload()',3000-(now-originTime));
			//     return;
			//   } else {
			//     stopload();
			//   }
			// }
			// setTimeout('stopload()',3300);

			// function stopload(){
			// 	loading = document.getElementById('loading');
			// 	loading.style.opacity="0";
			// 	setTimeout("loadDisplay()",600);
			// 	if(location.hash=="#page1"||location.hash==""){
			// 		e_light();
			// 	}

			// 	//canvas重新讀取:因scrollbar寬度影響需要resize
			// }
			// function loadDisplay(){
			// 	if(loading.style.opacity== 0){
			// 		loading.style.display="none";
			// 	}
			// }
			// window.addEventListener('load', loading);

			//theater---------------------------------------------------
			//theater---------------------------------------------------
			$(document).ready(function () {
				var pic = new Array("img/thirdSection/Theater_seat.jpg", "img/thirdSection/dome_theater.png");
				var a = 0;
				$(".Theater").click(function () {
					$(this).removeClass('notcurrent').addClass('current');
					$(".Theater").not(this).removeClass('current').addClass('notcurrent');
				});

				// 滑鼠滑進 圖 停止輪播
				$("#intro.current").mouseleave(function () {
					time = setInterval(function () {
						$("#intro.current").css('background-image', 'url("' + pic[a %= 2] + '")');
						a++;
					}, 2800);
				});
				$("#intro.current").mouseenter(function () {
					clearInterval(time);
				});

				// 圖自動播放
				time = setInterval(function () {
					$("#intro.current").css('background-image', 'url("' + pic[a %= 2] + '")');
					a++;
				}, 2800);
			});
			//-登入-----------------------------------
			window.onload = function () {
				document.getElementsByTagName("body")[0].style.overflow = "hidden";// !!BUG

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
						bannerMousewheelClose();//首頁才需要
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




		// <!-- 點擊變換中間內容 -->
	
			window.addEventListener('load',function(){
				// 選取button
				let btns = document.querySelectorAll('.top_button button');
				// 把每個button註冊click事件，事件發生時呼叫changeBox。
				for(let i of btns){
					i.addEventListener('click',changeBox);
				}
				// 中間內容
				let content1 = document.getElementById("midContent_1");
				let content2 = document.getElementById("midContent_2");
				let content3 = document.getElementById("midContent_3");
				let pic1 = querySelector('.pic');
				function changeBox(){

					if(this.textContent == "前往樂園"){
						content1.style.opacity="1";
						content2.style.opacity="0";
						content3.style.opacity="0";
					}else if(this.textContent == "如何購票"){
						content1.style.opacity="0";
						content2.style.opacity="1";
						content3.style.opacity="0";
					}else{
						content1.style.opacity="0";
						content2.style.opacity="0";
						content3.style.opacity="1";
					}
					
				}

			});
		

// ================================================= 設施詳細介紹燈箱 =========================================
		

		


	



















		</script>

</body>

</html>