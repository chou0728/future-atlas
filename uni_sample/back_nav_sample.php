<!-- ===========1.加上session_start=========== -->
<?php
ob_start();
session_start();
//請複製:當無登入時會自動跳轉至登入頁面
if(isset($_SESSION["login_success"])==false){
    header("location:manager_login.php");
    exit;
}
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
        <img src="img/back_menu_default.png" id="ham">
        <h1 class="logo">
            <img src="img/LOGO.png" alt="FA">
            <span>後台管理系統</span>
        </h1>
        <ul class="nav">
            <li class="navList">
                <a href="back_check_facility_tickets.php">設施驗票 </a>
                <span class="listcover"></span>
            </li>
            <li class="navList">
                <a href="back_check_theater_tickets.php">劇場驗票</a>
                <span class="listcover"></span>
            </li>
            <li class="navList">
                <a href="back_facilityM.php" style="color: black;">設施管理</a>
                <span class="listcover"  style="width: 100%;background-color: rgba(90, 230, 219,0.9);"></span>
                
            </li>
            <li class="navList">
                <a href="back_TheaterMang.php">劇場管理</a>
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
            <li class="navList"<?php
            	if($_SESSION["top_manager"]==0) {
					echo "style='display:none;'";
				}
			?>>
                <a href="back_management_authority.php">權限管理</a>
                <span class="listcover"></span>
            </li>
        </ul>
    </header>
    <div class="loginBox mobileLoginBox">
        <span id="hello">您好!</span>
        <span id="managerId"><?php
        			if($_SESSION["top_manager"] == 1){
						echo "最高管理員";
					}else{
						echo "管理員";
					}
				?></span>
        <span id="managerName"><?php echo $_SESSION["manager_name"]; ?></span>
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

<!-- ===========請在最後加入!!===============-->
<!-- ===========請在最後加入!!===============-->
<!-- ===========請在最後加入!!===============-->
<!-- ===========請在最後加入=!!==============-->
	<div id="RWD-page"><span>驗票系統</span></div><!-- ===========請在最後加入=!!==============-->
</body>
</html>