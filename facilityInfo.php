<?php
ob_start();
session_start();
if(isset($_SESSION["login_error"]) === true){
	echo "<script>alert('帳密錯誤！請新登入');</script>";
	unset($_SESSION["login_error"]);
	header("Refresh:0");
}else if(isset($_SESSION["log_register"])===true){
	echo "<script>alert('註冊成功，歡迎你~~');</script>";
	unset($_SESSION["log_register"]);
	header("Refresh:0");
}else if(isset($_SESSION["no_login"])==true){
	echo "<script>alert('立即成為會員，買票後即可評價(評價可獲得積分喔!)');</script>";
	unset($_SESSION["no_login"]);
	header("Refresh:0");
}else if(isset($_SESSION["is_comment"])==true){
	echo "<script>alert('目前對此設施都評價過囉!購買且使用新票券後即可再評價');</script>";
	unset($_SESSION["is_comment"]);
	header("Refresh:0");
}else if(isset($_SESSION["is_comment_two"])==true){
	echo "<script>alert('此設施已評價過!');</script>";
	unset($_SESSION["is_comment_two"]);
	header("Refresh:0");
}else if(isset($_SESSION["no_getticket"])==true){
	echo "<script>alert('沒有買過此設施票券喔!');</script>";
	unset($_SESSION["no_getticket"]);
	header("Refresh:0");
}
?>
<!DOCTYPE html>
<meta charset="utf-8">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FA未來主題樂園 | 設施介紹</title>
	<link rel="icon" href="img/favicon.ico" />
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
        <a href="====index.php" class="logo_a">
            <img src="img/LOGO.png" class="logo">
        </a>
        <ul class="ul_right">
            <li>
                <a href="====index.php#page2" id="NavClose">園區地圖</a>
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

<?php 
try {
	require_once("php/connectBooks.php");
	$sql = "select * from facility where info_already=1";
	$products = $pdo->query($sql);
	$a = 0;//data-category寫死
	$a_icon = 0;
	while($prodRow = $products->fetchObject()){
	switch ($prodRow->facility_no) {
		case '1':
			$a = "1";
			$a_icon = "<img src='img/facilityInfo/heart305.png'>";
			break;
		case '2':
			$a = "234";
			$a_icon = "<img src='img/facilityInfo/child.png'><img src='img/facilityInfo/love.png'><img src='img/facilityInfo/umbrella.png'>";
			break;
		case '3':
			$a = "234";
			$a_icon = "<img src='img/facilityInfo/child.png'><img src='img/facilityInfo/love.png'><img src='img/facilityInfo/umbrella.png'>";
			break;
		case '4':
			$a = "014";
			$a_icon = "<img src='img/facilityInfo/VR.png'><img src='img/facilityInfo/heart305.png'><img src='img/facilityInfo/umbrella.png'>";
			break;
		case '5':
			$a = "23";
			$a_icon = "<img src='img/facilityInfo/child.png'><img src='img/facilityInfo/love.png'>";
			break;
		case '6':
			$a = "014";
			$a_icon = "<img src='img/facilityInfo/VR.png'><img src='img/facilityInfo/heart305.png'><img src='img/facilityInfo/umbrella.png'>";
			break;
		case '7':
			$a = "234";
			$a_icon = "<img src='img/facilityInfo/child.png'><img src='img/facilityInfo/love.png'><img src='img/facilityInfo/umbrella.png'>";
			break;
		case '8':
			$a = "34";
			$a_icon = "<img src='img/facilityInfo/love.png'><img src='img/facilityInfo/umbrella.png'>";
			break;
		case '9':
			$a = "4";
			$a_icon = "<img src='img/facilityInfo/umbrella.png'>";
			break;
		default:
			$a = "0123";
			$a_icon = "<img src='img/facilityInfo/VR.png'><img src='img/facilityInfo/heart305.png'><img src='img/facilityInfo/child.png'><img src='img/facilityInfo/love.png'>";
			break;
	}
		
?>
		<div class="f_box" data-category="<?php echo $a ?>" data-no="<?php echo $prodRow->facility_no ?>"><!-- 0:VR,1:刺激,2:兒童,3:情侶,4:雨天 -->
		<div class="bcover_border">
			<div class="f_mainphoto">
					<img src="img/facilityInfo/<?php echo $prodRow->facility_mphoto ?>" alt="<?php echo $prodRow->facility_name ?>img">
				<div class="fi_caution">
					<a href="javascript:void(0)">Information<span>!</span></a>
				</div>
				</div>
			<div href="javascript:void(0)" class="bigA">
				<h2><?php echo $prodRow->facility_name ?></h2>
				<div class="points">
					<div class="points_cover">
						<?php
							$_facility_no = $prodRow->facility_no;
							$sql = "select comment_grade from facility_comment where facility_no = $_facility_no";
							$rating = $pdo->query($sql);
							$b = 0;//數量
							$r = 0;//分數
							$av = 0;//平均分數
							$width = 0;//腥腥用
							while($ratingRow= $rating->fetchObject()){
								if(isset($ratingRow->comment_grade)){
									$b++;
									$r = $r + $ratingRow->comment_grade;
								}
							}
							if($r != 0){
										$av = $r/$b;
										$width = $av*20;
								}else{
									$width = 0;
								}
						 ?>


						<span class="points_bar_bo">
						<span class="points_bar" style="width:<?php echo $width ?>%;"></span>

						<img src="img/facilityInfo/ratingCover_g.png" alt="cover">
					</div>
				</div>
				<div class="mobile375_points">
					分數:<span><?php echo $av ?>/5</span>
				</div>

				<div class="category">
					<?php echo $a_icon ?>
				</div>
				
				<div class="marquee_crowds" style="<?php switch($prodRow->facility_crowd){
					case '1':
						echo 'background-color: #712828';
					break;
					case '2':
						echo 'background-color: #8D681A';
					break;
					case '3':
						echo 'background-color: #50CCC2';
					break;

				} ?>">
					<div class="marquee" data-marquee="目前狀態:<?php switch($prodRow->facility_crowd){
					case '1':
						echo '擁擠';
					break;
					case '2':
						echo "普通";
					break;
					case '3':
						echo "空曠";
					break;

				} ?>"></div>
				</div>
			</div>
			</div>
		</div>
<?php		
	}
} catch (PDOException $e) {
	echo "錯誤原因 : " , $e->getMessage() , "<br>";
	echo "錯誤行號 : " , $e->getLine() , "<br>";
	// echo "getCode : " , $e->getCode() , "<br>";
	// echo "異動失敗,請聯絡系統維護人員";
}
?>
<!-- -s- -->
	</section>


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
			<div id="noticket">此設施不需購票</div>
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

	<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
	<script src="js/facilityInfo_main.js"></script>
	<script src="js/00nav.js"></script>
	<script src="js/page_load_unload.js"></script>
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
			window.addEventListener('load', login, false);




//--AJAX
function ajax_init(){
	var bcover_border = document.getElementsByClassName("bcover_border");
	for(var a =0;a<bcover_border.length;a++){
		bcover_border[a].addEventListener("click",ajax_lightbox,false);
	}
}



window.addEventListener('load',ajax_init);
function ajax_lightbox(e) {
	var body = document.getElementsByTagName("body")[0];
	lightBoxF = document.getElementById('facility01');
	var close = document.getElementById('close');
	body.style.overflow = "hidden";
	lightBoxF.style.height = "100vh";
	lightBoxF.style.opacity = "1";
	close.style.display = "block";
	close.onclick = closelightBoxF;
	var f_no = e.currentTarget.parentElement.dataset.no;

        var xhr = new XMLHttpRequest();
        xhr.onload = function () {

            if (xhr.status == 200) {
                var show_facility_JSON = document.getElementById("show_facility_JSON");
                var main_photo = document.getElementById('main_photo');
                var title = document.getElementsByClassName('title')[0];
                var subTitle = document.getElementsByClassName('subTitle')[0];
                var paraLeft = document.getElementsByClassName('paraLeft')[0];
                var heartbeat = document.getElementsByClassName('heartbeat')[0];
                var suit = document.getElementsByClassName('suit')[0];
                var limit = document.getElementsByClassName('limit')[0];
                var getTicket = document.getElementById("getTicket");
                var noTicket = document.getElementById("noticket");
                var info = document.getElementsByClassName('info')[0];
                var scoreAverage = document.getElementsByClassName('scoreAverage')[0];
                var counts = document.getElementsByClassName('kai')[0];
                var comment = document.getElementById("comment");
                var star_points_bar = document.getElementById('star_points_bar');
                var goComment = document.getElementById('goComment');
                var facility = JSON.parse(xhr.responseText);//將透過ajax傳回來的json型態的資料轉換成js的物件
                console.log(facility.ta_no);

                main_photo.innerHTML = "<img src='img/facilityInfo/"+facility.facility_mphoto+"'>";
                title.innerText = facility.facility_name;
                subTitle.innerText = facility.facility_subname;//透過物件的操作就可以帶值進去span中(SQL中欄位名稱直接變屬性)
                paraLeft.innerHTML = facility.facility_phrase;
                heartbeat.innerText = facility.facility_heart;
                suit.innerHTML = "<span>適合對象</span>"+facility.facility_suit;
                limit.innerHTML = "<span>限制</span>"+facility.facility_limit;
                if(facility.ta_no==0&&(facility.facility_no)==7){
                		getTicket.style.display="";
                		noTicket.style.display="none";
						getTicket.href = "Theaterbuyticket.php";
				}else if(facility.ta_no==0){
						getTicket.style.display="none";
						noTicket.style.display="inline-block";	
				}else{
						getTicket.style.display="";
						noTicket.style.display="none";
						getTicket.innerHTML = "立即前往購票";
				}

				info.innerText = facility.facility_description;
				if(facility.av == 0){
					scoreAverage.innerHTML = "總平均<span>"+facility.av.toFixed(0)+"</span>分";
				}else if(facility.av.toFixed(1).split(".")[1]==0){
					scoreAverage.innerHTML = "總平均<span>"+facility.av.toFixed(0)+"</span>分";
				}else{
					scoreAverage.innerHTML = "總平均<span>"+facility.av.toFixed(1)+"</span>分";
				}
				counts.innerHTML = "總評分次數<span>"+facility.counts+"</span>次";
				
				comment.innerHTML = facility.comment;
				star_points_bar.style.width = facility.width + "%";
				goComment.dataset.facilityNo = facility.facility_no;
				               


			} else{
				alert(xhr.status);
				            
				  }

		}

        var url = "ajax_facility_info.php?facility_no="+f_no;
        xhr.open("Get", url, true);
        xhr.send(null);

    };

</script>
	
</body>
</html>