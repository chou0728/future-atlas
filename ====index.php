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
	<link rel="icon" href="img/favicon.ico" />
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
        <a href="#page1" class="logo_a">
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

				<img class="map_border" src="img/secondSection/map_border.png" alt="map">

				<!-- ferris_wheel -->
				<div class="shadow ferris_wheel_shadow"></div>
				<img class="facility_icons ferris_wheel unchecked" data-facility="ferris_wheel" src="img/secondSection/ferris_wheel.png"
				    alt="ferris_wheel">

				<!-- roller_coaster -->
				<div class="shadow roller_coaster_shadow"></div>
				<img class="facility_icons roller_coaster unchecked" data-facility="roller_coaster" src="img/secondSection/roller_coaster.png"
				    alt="roller_coaster">

				<!-- blimp -->
				<div class="shadow blimp_shadow"></div>
				<img class="facility_icons  blimp unchecked" data-facility="blimp" src="img/secondSection/blimp.png" alt="blimp">

				<!-- disco -->
				<div class="shadow disco_shadow"></div>
				<img class="facility_icons disco unchecked" data-facility="disco" src="img/secondSection/disco.png" alt="disco">

				<!-- information -->
				<div class="shadow information_shadow"></div>
				<img class="facility_icons information unchecked" data-facility="information" src="img/secondSection/information.png" alt="information">

				<!-- theater -->
				<div class="shadow theater_shadow"></div>
				<img class="facility_icons theater unchecked" data-facility="theater" src="img/secondSection/theater.png" alt="theater">

				<!-- robot -->
				<div class="shadow robot_shadow"></div>
				<img class="facility_icons robot unchecked" data-facility="robot" src="img/secondSection/robot.png" alt="robot">

				<!-- time_travel -->
				<div class="shadow time_travel_shadow"></div>
				<img class="facility_icons time_travel unchecked" data-facility="time_travel" src="img/secondSection/time_travel.png" alt="time_travel">

				<!--設施資訊 -->
			</div>
			<div class="info">

				<button class="close"></button>
				<div class="info_container">


				






					<!-- =============== info_ferris_wheel =================== -->

						<!-- ===== php抓資料 ==== -->

				<?php
                   
                    
				   try {
					   require_once("connectBooks.php");
					   $sql = "SELECT * FROM `facility` WHERE facility_no = ?";
					   $facility_PDO = $pdo->prepare($sql);
					   $facility_PDO->bindValue(1,3); 
					   $facility_PDO->execute();
					   $facility_info = $facility_PDO->fetchObject();
					   
					   $sql = "SELECT ROUND(AVG(comment_grade),1) average_grade FROM `facility_comment` WHERE facility_no = ?";
					   $faci_grage_PDO = $pdo->prepare($sql);
					   $faci_grage_PDO->bindValue(1,3); 
					   $faci_grage_PDO->execute();
					   $facility_grade = $faci_grage_PDO->fetchObject();


			   ?>







					<div class="info_content info_ferris_wheel">

						<!-- 左邊圖 -->
						<div class="main_photo">
							<img src="img/secondSection/ferris_wheel_img.png" alt="">
						</div>
						<!-- 右邊標題跟介紹 -->
						<div class="main_content">
							<div class="title">
								<h2><?php echo $facility_info->facility_name ?></h2>
								<small><?php echo $facility_info->facility_subname ?></small>
							</div>
							<div class="information">
								<div class="parameter">
								
										<h5>設施人潮</h5>
										<p class="paraContent middleLinehight">

										<?php 

										$facility_status = $facility_info->facility_crowd;
										switch ($facility_status){
											case 1:
											$facility_status = "擁擠";
											echo $facility_status;
											break;
											
											case 2:
											$facility_status = "普通";
											echo $facility_status;
											break;

											case 3:
											$facility_status = "空曠";
											echo $facility_status;
											break;

											default:
											$facility_status = "更新中";
											echo $facility_status;
										};
										
										?>
											</p>
	
								</div>
								<div class="parameter faci_suit">

									<h5>適合對象</h5>
									<p class="paraContent middleLinehight">

									<?php echo $facility_info->facility_suit ?>
									</p>
								</div>

								<div class="parameter">
									<h5>限制</h5>
									<p class="paraContent middleLinehight">

									<?php echo $facility_info->facility_limit  ?>
									</p>
								</div>
								<div class="parameter">
									<h5>設施評價</h5>
									<p class="paraContent middleLinehight">
									<?php echo $facility_grade->average_grade ?>  分
									</p>
								</div>
							</div>
							<a class="open_iframe" href="#" data-no="3">了解更多</a>
						</div>

					</div>


					<?php
                

						} catch (PDOException $e) {
							echo "錯誤原因 : " , $e->getMessage() , "<br>";
							echo "錯誤行號 : " , $e->getLine() , "<br>";
							
						}
                	?>






					<!-- =============== info_roller_coaster =================== -->



					<!-- ===== php抓資料 ==== -->

				<?php
                   
                    
				   try {
					   require_once("connectBooks.php");
					   $sql = "SELECT * FROM `facility` WHERE facility_no = ?";
					   $facility_PDO = $pdo->prepare($sql);
					   $facility_PDO->bindValue(1,1); 
					   $facility_PDO->execute();
					   $facility_info = $facility_PDO->fetchObject();
					   
					   $sql = "SELECT ROUND(AVG(comment_grade),1) average_grade FROM `facility_comment` WHERE facility_no = ?";
					   $faci_grage_PDO = $pdo->prepare($sql);
					   $faci_grage_PDO->bindValue(1,1); 
					   $faci_grage_PDO->execute();
					   $facility_grade = $faci_grage_PDO->fetchObject();


				 ?>






					<div class="info_content info_roller_coaster">
						<!-- 左邊圖 -->
						<div class="main_photo">
							<img src="img/secondSection/roller_coaster_img.png" alt="">
						</div>
						<!-- 右邊標題跟介紹 -->
						<div class="main_content">
							<div class="title">
								<h2><?php echo $facility_info->facility_name ?></h2>
								<small><?php echo $facility_info->facility_subname ?></small>
							</div>
							<div class="information">


									<div class="parameter">
								
											<h5>設施人潮</h5>
											<p class="paraContent middleLinehight">
	
											<?php 

												$facility_status = $facility_info->facility_crowd;
												switch ($facility_status){
													case 1:
													$facility_status = "擁擠";
													echo $facility_status;
													break;
													
													case 2:
													$facility_status = "普通";
													echo $facility_status;
													break;

													case 3:
													$facility_status = "空曠";
													echo $facility_status;
													break;

													default:
													$facility_status = "更新中";
													echo $facility_status;
												};

												?>
											


											</p>
		
									</div>
								<div class="parameter faci_suit">

									<h5>適合對象</h5>
									<p class="paraContent middleLinehight">

									<?php echo $facility_info->facility_suit ?>
									</p>
								</div>

								<div class="parameter">
									<h5>限制</h5>
									<p class="paraContent middleLinehight">

									<?php echo $facility_info->facility_limit  ?>
									</p>
								</div>
								<div class="parameter">
									<h5>設施評價</h5>
									<p class="paraContent middleLinehight">

									<?php echo $facility_grade->average_grade ?>  分
									</p>
								</div>

							</div>
							<a class="open_iframe" href="#" data-no="1">了解更多</a>
						</div>
					</div>

					<?php
                

						} catch (PDOException $e) {
							echo "錯誤原因 : " , $e->getMessage() , "<br>";
							echo "錯誤行號 : " , $e->getLine() , "<br>";
							
						}
                	?>











					<!-- =============== info_blimp =================== -->

						<!-- ===== php抓資料 ==== -->

				<?php
                   
                    
				   try {
					   require_once("connectBooks.php");
					   $sql = "SELECT * FROM `facility` WHERE facility_no = ?";
					   $facility_PDO = $pdo->prepare($sql);
					   $facility_PDO->bindValue(1,5); 
					   $facility_PDO->execute();
					   $facility_info = $facility_PDO->fetchObject();
					   
					   $sql = "SELECT ROUND(AVG(comment_grade),1) average_grade FROM `facility_comment` WHERE facility_no = ?";
					   $faci_grage_PDO = $pdo->prepare($sql);
					   $faci_grage_PDO->bindValue(1,5); 
					   $faci_grage_PDO->execute();
					   $facility_grade = $faci_grage_PDO->fetchObject();


				 ?>





					<div class="info_content info_blimp">
						<!-- 左邊圖 -->
						<div class="main_photo">
							<img src="img/secondSection/blimp_img.png" alt="">
						</div>
						<!-- 右邊標題跟介紹 -->
						<div class="main_content">
							<div class="title">
								<h2><?php echo $facility_info->facility_name ?></h2>
								<small><?php echo $facility_info->facility_subname ?></small>
							</div>
							<div class="information">

									<div class="parameter">
								
											<h5>設施人潮</h5>
											<p class="paraContent middleLinehight">
	
											<?php 

													$facility_status = $facility_info->facility_crowd;
													switch ($facility_status){
														case 1:
														$facility_status = "擁擠";
														echo $facility_status;
														break;
														
														case 2:
														$facility_status = "普通";
														echo $facility_status;
														break;

														case 3:
														$facility_status = "空曠";
														echo $facility_status;
														break;

														default:
														$facility_status = "更新中";
														echo $facility_status;
													};

													?>	
											</p>
		
									</div>
								<div class="parameter faci_suit">

									<h5>適合對象</h5>
									<p class="paraContent middleLinehight">

									<?php echo $facility_info->facility_suit ?>
									</p>
								</div>

								<div class="parameter">
									<h5>限制</h5>
									<p class="paraContent middleLinehight">

									<?php echo $facility_info->facility_limit  ?>
									</p>
								</div>
								<div class="parameter">
									<h5>設施評價</h5>
									<p class="paraContent middleLinehight">

									<?php echo $facility_grade->average_grade ?>  分
									</p>
								</div>

							</div>
							<a class="open_iframe" href="#" data-no="5">了解更多</a>
						</div>
					</div>

					<?php
                

						} catch (PDOException $e) {
							echo "錯誤原因 : " , $e->getMessage() , "<br>";
							echo "錯誤行號 : " , $e->getLine() , "<br>";
							
						}
					?>










					<!-- =============== info_disco =================== -->


								<!-- ===== php抓資料 ==== -->

				<?php
                   
                    
				   try {
					   require_once("connectBooks.php");
					   $sql = "SELECT * FROM `facility` WHERE facility_no = ?";
					   $facility_PDO = $pdo->prepare($sql);
					   $facility_PDO->bindValue(1,8); 
					   $facility_PDO->execute();
					   $facility_info = $facility_PDO->fetchObject();
					   
					   $sql = "SELECT ROUND(AVG(comment_grade),1) average_grade FROM `facility_comment` WHERE facility_no = ?";
					   $faci_grage_PDO = $pdo->prepare($sql);
					   $faci_grage_PDO->bindValue(1,8); 
					   $faci_grage_PDO->execute();
					   $facility_grade = $faci_grage_PDO->fetchObject();


				 ?>



					<div class="info_content info_disco">
						<!-- 左邊圖 -->
						<div class="main_photo">
							<img src="img/secondSection/disco_img.jpg" alt="">
						</div>
						<!-- 右邊標題跟介紹 -->
						<div class="main_content">
							<div class="title">
								<h2><?php echo $facility_info->facility_name ?></h2>
								<small><?php echo $facility_info->facility_subname ?></small>
							</div>
							<div class="information">
									<div class="parameter">
								
											<h5>設施人潮</h5>
											<p class="paraContent middleLinehight">
	
											<?php 

													$facility_status = $facility_info->facility_crowd;
													switch ($facility_status){
														case 1:
														$facility_status = "擁擠";
														echo $facility_status;
														break;
														
														case 2:
														$facility_status = "普通";
														echo $facility_status;
														break;

														case 3:
														$facility_status = "空曠";
														echo $facility_status;
														break;

														default:
														$facility_status = "更新中";
														echo $facility_status;
													};

													?>	
											</p>
		
									</div>
								<div class="parameter faci_suit">

									<h5>適合對象</h5>
									<p class="paraContent middleLinehight">

									<?php echo $facility_info->facility_suit ?>
									</p>
								</div>

								<div class="parameter">
									<h5>限制</h5>
									<p class="paraContent middleLinehight">

									<?php echo $facility_info->facility_limit  ?>
									</p>
								</div>
								<div class="parameter">
									<h5>設施評價</h5>
									<p class="paraContent middleLinehight">

									<?php echo $facility_grade->average_grade ?>  分
									</p>
								</div>

							</div>
							<a class="open_iframe" href="#" data-no="8"> 了解更多</a>
						</div>
					</div>



					<?php
                

						} catch (PDOException $e) {
							echo "錯誤原因 : " , $e->getMessage() , "<br>";
							echo "錯誤行號 : " , $e->getLine() , "<br>";
							
						}
					?>








					<!-- =============== info_information =================== -->


						<!-- ===== php抓資料 ==== -->

				<?php
                   
                    
				   try {
					   require_once("connectBooks.php");
					   $sql = "SELECT * FROM `facility` WHERE facility_no = ?";
					   $facility_PDO = $pdo->prepare($sql);
					   $facility_PDO->bindValue(1,2); 
					   $facility_PDO->execute();
					   $facility_info = $facility_PDO->fetchObject();
					   
					   $sql = "SELECT ROUND(AVG(comment_grade),1) average_grade FROM `facility_comment` WHERE facility_no = ?";
					   $faci_grage_PDO = $pdo->prepare($sql);
					   $faci_grage_PDO->bindValue(1,2); 
					   $faci_grage_PDO->execute();
					   $facility_grade = $faci_grage_PDO->fetchObject();


				 ?>






					<div class="info_content info_information">
						<!-- 左邊圖 -->
						<div class="main_photo">
							<img src="img/secondSection/information_img.png" alt="">
						</div>
						<!-- 右邊標題跟介紹 -->
						<div class="main_content">
							<div class="title">
								<h2><?php echo $facility_info->facility_name ?></h2>
								<small><?php echo $facility_info->facility_subname ?></small>
							</div>
							<div class="information">
									<div class="parameter">
								
											<h5>設施人潮</h5>
											<p class="paraContent middleLinehight">
											<?php 

												$facility_status = $facility_info->facility_crowd;
												switch ($facility_status){
													case 1:
													$facility_status = "擁擠";
													echo $facility_status;
													break;
													
													case 2:
													$facility_status = "普通";
													echo $facility_status;
													break;

													case 3:
													$facility_status = "空曠";
													echo $facility_status;
													break;

													default:
													$facility_status = "更新中";
													echo $facility_status;
												};

											?>	
											</p>
		
									</div>
								<div class="parameter faci_suit">

									<h5>適合對象</h5>
									<p class="paraContent middleLinehight">

									<?php echo $facility_info->facility_suit ?>
									</p>
								</div>

								<div class="parameter">
									<h5>限制</h5>
									<p class="paraContent middleLinehight">

									<?php echo $facility_info->facility_limit  ?>
									</p>
								</div>
								<div class="parameter">
									<h5>設施評價</h5>
									<p class="paraContent middleLinehight">

									<?php echo $facility_grade->average_grade ?>  分
									</p>
								</div>

							</div>
							<a class="open_iframe" href="#" data-no="2">了解更多</a>
						</div>
					</div>


					<?php
                

						} catch (PDOException $e) {
							echo "錯誤原因 : " , $e->getMessage() , "<br>";
							echo "錯誤行號 : " , $e->getLine() , "<br>";
							
						}
					?>








					<!-- =============== info_theater =================== -->


							<!-- ===== php抓資料 ==== -->

				<?php
                   
                    
				   try {
					   require_once("connectBooks.php");
					   $sql = "SELECT * FROM `facility` WHERE facility_no = ?";
					   $facility_PDO = $pdo->prepare($sql);
					   $facility_PDO->bindValue(1,7); 
					   $facility_PDO->execute();
					   $facility_info = $facility_PDO->fetchObject();
					   
					   $sql = "SELECT ROUND(AVG(comment_grade),1) average_grade FROM `facility_comment` WHERE facility_no = ?";
					   $faci_grage_PDO = $pdo->prepare($sql);
					   $faci_grage_PDO->bindValue(1,7); 
					   $faci_grage_PDO->execute();
					   $facility_grade = $faci_grage_PDO->fetchObject();


				 ?>






					<div class="info_content info_theater">
						<!-- 左邊圖 -->
						<div class="main_photo">
							<img src="img/secondSection/theater_img.png" alt="">
						</div>
						<!-- 右邊標題跟介紹 -->
						<div class="main_content">
							<div class="title">
								<h2><?php echo $facility_info->facility_name ?></h2>
								<small><?php echo $facility_info->facility_subname ?></small>
							</div>
							<div class="information">
									<div class="parameter">
								
											<h5>設施人潮</h5>
											<p class="paraContent middleLinehight">
											<?php 

												$facility_status = $facility_info->facility_crowd;
												switch ($facility_status){
													case 1:
													$facility_status = "擁擠";
													echo $facility_status;
													break;
													
													case 2:
													$facility_status = "普通";
													echo $facility_status;
													break;

													case 3:
													$facility_status = "空曠";
													echo $facility_status;
													break;

													default:
													$facility_status = "更新中";
													echo $facility_status;
												};

												?>	
												
											</p>
		
									</div>
								<div class="parameter faci_suit">

									<h5>適合對象</h5>
									<p class="paraContent middleLinehight">

									<?php echo $facility_info->facility_suit ?>
									</p>
								</div>

								<div class="parameter">
									<h5>限制</h5>
									<p class="paraContent middleLinehight">

									<?php echo $facility_info->facility_limit  ?>
									</p>
								</div>
								<div class="parameter">
									<h5>設施評價</h5>
									<p class="paraContent middleLinehight">

									<?php echo $facility_grade->average_grade ?>  分
									</p>
								</div>

							</div>
							<a class="open_iframe" href="#" data-no="7">了解更多</a>
						</div>
					</div>


					<?php
                

						} catch (PDOException $e) {
							echo "錯誤原因 : " , $e->getMessage() , "<br>";
							echo "錯誤行號 : " , $e->getLine() , "<br>";
							
						}
					?>







					<!-- =============== info_robot =================== -->

	
								<!-- ===== php抓資料 ==== -->

				<?php
                   
                    
				   try {
					   require_once("connectBooks.php");
					   $sql = "SELECT * FROM `facility` WHERE facility_no = ?";
					   $facility_PDO = $pdo->prepare($sql);
					   $facility_PDO->bindValue(1,4); 
					   $facility_PDO->execute();
					   $facility_info = $facility_PDO->fetchObject();
					   
					   $sql = "SELECT ROUND(AVG(comment_grade),1) average_grade FROM `facility_comment` WHERE facility_no = ?";
					   $faci_grage_PDO = $pdo->prepare($sql);
					   $faci_grage_PDO->bindValue(1,4); 
					   $faci_grage_PDO->execute();
					   $facility_grade = $faci_grage_PDO->fetchObject();


				 ?>



					<div class="info_content info_robot">
						<!-- 左邊圖 -->
						<div class="main_photo">
							<img src="img/secondSection/robot_img.png" alt="">
						</div>
						<!-- 右邊標題跟介紹 -->
						<div class="main_content">
							<div class="title">
								<h2><?php echo $facility_info->facility_name ?></h2>
								<small><?php echo $facility_info->facility_subname ?></small>
							</div>
							<div class="information">
									<div class="parameter">
								
											<h5>設施人潮</h5>
											<p class="paraContent middleLinehight">
											<?php 

												$facility_status = $facility_info->facility_crowd;
												switch ($facility_status){
													case 1:
													$facility_status = "擁擠";
													echo $facility_status;
													break;
													
													case 2:
													$facility_status = "普通";
													echo $facility_status;
													break;

													case 3:
													$facility_status = "空曠";
													echo $facility_status;
													break;

													default:
													$facility_status = "更新中";
													echo $facility_status;
												};

												?>	
											</p>
		
									</div>
								<div class="parameter faci_suit">

									<h5>適合對象</h5>
									<p class="paraContent middleLinehight">

									<?php echo $facility_info->facility_suit ?>
									</p>
								</div>

								<div class="parameter">
									<h5>限制</h5>
									<p class="paraContent middleLinehight">

									<?php echo $facility_info->facility_limit  ?>
									</p>
								</div>
								<div class="parameter">
									<h5>設施評價</h5>
									<p class="paraContent middleLinehight">

									<?php echo $facility_grade->average_grade ?>  分
									</p>
								</div>

							</div>
							<a class="open_iframe" href="#" data-no="4">了解更多</a>
						</div>
					</div>



					<?php
                

						} catch (PDOException $e) {
							echo "錯誤原因 : " , $e->getMessage() , "<br>";
							echo "錯誤行號 : " , $e->getLine() , "<br>";
							
						}
					?>





					<!-- =============== info_time_travel =================== -->


										<!-- ===== php抓資料 ==== -->

				<?php
                   
                    
				   try {
					   require_once("connectBooks.php");
					   $sql = "SELECT * FROM `facility` WHERE facility_no = ?";
					   $facility_PDO = $pdo->prepare($sql);
					   $facility_PDO->bindValue(1,6); 
					   $facility_PDO->execute();
					   $facility_info = $facility_PDO->fetchObject();
					   
					   $sql = "SELECT ROUND(AVG(comment_grade),1) average_grade FROM `facility_comment` WHERE facility_no = ?";
					   $faci_grage_PDO = $pdo->prepare($sql);
					   $faci_grage_PDO->bindValue(1,6); 
					   $faci_grage_PDO->execute();
					   $facility_grade = $faci_grage_PDO->fetchObject();


				 ?>




					<div class="info_content info_time_travel">
						<!-- 左邊圖 -->
						<div class="main_photo">
							<img src="img/secondSection/time_travel_img.jpg" alt="">
						</div>
						<!-- 右邊標題跟介紹 -->
						<div class="main_content">
							<div class="title">
								<h2><?php echo $facility_info->facility_name ?></h2>
								<small><?php echo $facility_info->facility_subname ?></small>
							</div>
							<div class="information">
									<div class="parameter">
								
											<h5>設施人潮</h5>
											<p class="paraContent middleLinehight">
											<?php 

												$facility_status = $facility_info->facility_crowd;
												switch ($facility_status){
													case 1:
													$facility_status = "擁擠";
													echo $facility_status;
													break;
													
													case 2:
													$facility_status = "普通";
													echo $facility_status;
													break;

													case 3:
													$facility_status = "空曠";
													echo $facility_status;
													break;

													default:
													$facility_status = "更新中";
													echo $facility_status;
												};

												?>	
											</p>
		
									</div>
								<div class="parameter faci_suit">

									<h5>適合對象</h5>
									<p class="paraContent middleLinehight">

									<?php echo $facility_info->facility_suit ?>
									</p>
								</div>

								<div class="parameter">
									<h5>限制</h5>
									<p class="paraContent middleLinehight">

									<?php echo $facility_info->facility_limit  ?>
									</p>
								</div>
								<div class="parameter">
									<h5>設施評價</h5>
									<p class="paraContent middleLinehight">

									<?php echo $facility_grade->average_grade ?>  分
									</p>
								</div>

							</div>
							<a class="open_iframe" href="#" data-no="6">了解更多</a>
						</div>	

						<?php
                

							} catch (PDOException $e) {
								echo "錯誤原因 : " , $e->getMessage() , "<br>";
								echo "錯誤行號 : " , $e->getLine() , "<br>";
								
							}
						?>



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
							、720度全景環繞螢幕，<span>搭配精心策畫的節目內容，720度環繞，</span>座位會搭配影片有相應的動作 ，必定讓您留下難忘的體驗。
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
		        	<div class="highlight highlight1"></div>
		        	<div class="highlight highlight2"></div>
		        	<div class="highlight highlight3"></div>
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
					<img class="bar" src="img/fifthSection/bar2.png" alt="bar">

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
								<a class="change" href="facilityBuyTicket.php" >購買設施票券</a>
								<a class="change" href="Theaterbuyticket.php" >購買劇場票券</a>
							</div>
							
						</div>
					</div>



					<!-- 中間區塊 -->
					<div class="midBox">
						<!-- 第一塊前往樂園 -->
						<div class="midContent_1" id="midContent_1">
							<h3>*** INFO ***</h3>
							<div class="pic">
									<div class="map">
										<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3616.9010562788353!2d121.1903276150953!3d24.969480784002634!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x346823c1ec904dcb%3A0xcdc129d4455ce456!2z5ZyL56uL5Lit5aSu5aSn5a24!5e0!3m2!1szh-TW!2stw!4v1516799135037" width="400" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
									</div>
							</div>
							<hr>
							<div class="text">
								<p>樂園地址:桃園市中壢區中大路300號
								</p>
							</div>
						</div>
						<!-- 第二塊如何購票 -->
						<div class="midContent_2" id="midContent_2">
							<h3>*** INFO ***</h3>
							<div class="pic" ><img src="img/fifthSection/ticket.png"></div>
							<hr>
							<div class="text">
								<p>現場購票或是進入購買頁面進行購票。
								</p>
							</div>
						</div>
						<!-- 第三塊票券模式 -->
						<div class="midContent_3" id="midContent_3">
							<h3>*** INFO ***</h3>
							<div class="pic">
								<div class="right">
									<img src="img/fifthSection/qr.png">
								</div>
							</div>
							<hr>
							<div class="text">
								<p>我們的票券皆為電子票券，只要掃描 QRcord即可快樂遊玩。
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

				function changeBox(){
					if(this.textContent == "前往樂園"){
						content1.style.display="block";
						content2.style.display="none";
						content3.style.display="none";
					}else if(this.textContent == "如何購票"){
						content1.style.display="none";
						content2.style.display="block";
						content3.style.display="none";
					}else{
						content1.style.display="none";
						content2.style.display="none";
						content3.style.display="block";
					}
					
				}

			});


function MapNavinit(){//園區地圖nav指示
	nav_here = document.getElementById("nav_here");
	nav_here.onclick = MapNavColor;
	if(location.hash == "#page2"){
		nav_here.children[1].style.color = "rgb(55,222,255)";
		nav_here.children[1].style.fontWeight = "900";
		nav_here.children[0].src="img/hover-tri-now.png";
		nav_here.children[0].className="nav_here";
	}
	document.addEventListener('mousewheel',MapNavColorOff);
}
function MapNavColor(){
	nav_here.children[1].style.color = "rgb(55,222,255)";
	nav_here.children[1].style.fontWeight = "900";
	nav_here.children[0].src="img/hover-tri-now.png";
	nav_here.children[0].className="nav_here";

}
function MapNavColorOff(){
	if(location.hash == "#page2"){
		nav_here.children[1].style.color = "rgb(55,222,255)";
		nav_here.children[1].style.fontWeight = "900";
		nav_here.children[0].src="img/hover-tri-now.png";
		nav_here.children[0].className="nav_here";
	}else{
		nav_here.children[1].style.color = "";
		nav_here.children[1].style.fontWeight = "";
		nav_here.children[0].src="img/hover-tri.png";
		nav_here.children[0].className="nav_hover";
	}
	
}
window.addEventListener('load',MapNavinit);









</script>

</body>

</html>