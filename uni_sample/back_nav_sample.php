<!-- ===========1.加上session_start=========== -->
<?php
ob_start();
session_start();
?>
<!-- ===========1 end=========== -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>FA後台</title>
	<!-- ======請複製==== -->
	<link rel="stylesheet" type="text/css" href="css/RESET.css">
	<link rel="stylesheet" type="text/css" href="css/11back_nav.css">
	<!-- ========== -->
</head>
<body>
<!-- ====================2.導覽列請替換===================== -->
	<header>
		<h1 class="logo">
			<img src="img/LOGO.png" alt="FA">
			<span>後台管理系統</span>
		</h1>
		<ul class="nav">
			<li class="navList">
				<a href="back_check_facility_tickets.php">設施驗票</a>
				<span class="listcover"></span>
			</li>
			<li class="navList">
				<a href="back_check_theater_tickets.php">劇場驗票</a>
				<span class="listcover"></span>
			</li>
			<li class="navList">
				<a href="back_facilityM.php">設施管理</a>
				<span class="listcover"></span>
			</li>
			<li class="navList">
				<a href="back_theater_mang.php">劇場管理</a>
				<span class="listcover"></span>
			</li>
			<li class="navList">
				<a href="back_activity.php">活動管理</a>
				<span class="listcover"></span>
			</li>
			<li class="navList">
				<a href="back_member.php">會員管理</a>
				<span class="listcover"></span>
			</li>
			<li class="navList">
				<a href="">諮詢管理</a>
				<span class="listcover"></span>
			</li>
			<li class="navList"
			<?php
				if( $_SESSION["top_manager"] != 1){
					echo " style='display:none;'";
				}
			?>
			>
				<a href="back_management_authority.php">權限管理</a>
				<span class="listcover"></span>
			</li>
		</ul>
	</header>
	<div class="loginBox mobileLoginBox">
			您好!<span id="managerId">
				<?php
					if($_SESSION["top_manager"] == 1){
						echo "最高管理員";
					}else{
						echo "管理員";
					}
				?>
			</span><span id="managerName"><?php echo $_SESSION["manager_name"]; ?></span>
			<a href="manager_logout.php">登出</a>
	</div>
<!-- ===========================NAV結束==================================== -->
<!-- ===右邊區塊固定格式=============================================================== -->
	<div class="back_wrapper_right">
		<div class="b_content">
			<div class="b_sub_nav">
				<a href="javascript:void(0)" class="b_sn_btn">subNav01</a>
				<a href="javascript:void(0)" class="b_sn_btn">subNav01</a>
				<a href="javascript:void(0)" class="b_sn_btn">subNav01</a>
			</div>
			<!-- ===========請加內容至此===========-->
			<!-- ===========請加內容至此===========-->
		</div>
	</div>
</body>
</html>