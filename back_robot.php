<?php
ob_start();
session_start();
if(isset($_SESSION["top_manager"])===false||isset($_SESSION["manager_name"])===false){
	header("location:manager_login.php");
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>FA後台管理系統 | 設施管理</title>
	<link rel="icon" href="img/favicon_back.ico" />
	<link rel="stylesheet" href="css/RESET.css">
	<link rel="stylesheet" href="css/back_robot.css">
	<link rel="stylesheet" href="css/11back_nav.css">
</head>
<body>
	 <header>
        <img src="img/back_menu_default.png" id="ham">
        <h1 class="logo">
            <img src="img/LOGO.png" alt="FA">
            <span>FA後台管理系統</span>
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
                <a href="back_robot.php" style="color: black;">諮詢管理</a>
                <span class="listcover" style="width: 100%;background-color: rgba(90, 230, 219,0.9);"></span>
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


<!-- ===請由此複製============================================================= -->
	<div class="back_wrapper_right">
		<div class="b_content">
			<div class="b_sub_nav">
				<a href="javascript:void(0)" class="b_sn_btn" id="active" onclick="openCity(event,'robot_qa')" >諮詢問答管理</a>
				<a href="javascript:void(0)" class="b_sn_btn" onclick="openCity(event,'robot_usqa')">待回答問題</a>
			</div>
<!-- =====================請加內容至此====================-->
			<div class="b_inner_content" id="not-check-ticket">
	<!-- ===================1====================== -->
				<div id="robot_qa" class="tabcontent">
					<div class="table">
						<div class="row">
							<div class="col col-title col-no">編號</div>
							<div class="col col-title col-middle">關鍵字</div>
							<div class="col col-title col-big">答案</div>
							<div class="col col-title col-small">儲存</div>
						</div>
<?php 
try {
	require_once("php/connectBooks.php");
	$sql = "select * from question_and_answer where unsolved_question is null";
	$qa = $pdo->query($sql);

	while($qaRow = $qa->fetchObject()){
?>						
					
						<div class="row">
								<div class="col col-no"><?php echo $qaRow->key_word_no; ?></div>
								<div class="col col-middle"><input type="text" name="key_word" value="<?php echo $qaRow->key_word; ?>"></div>
								<div class="col col-big"><input type="text" name="answer" value="<?php echo $qaRow->answer; ?>"></div>
								<div class="col col-small"><input type="submit" value="儲存"></div>
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
					</div>
				</div>
			</div>



			<div id="robot_usqa" class="tabcontent">
					<div class="table">
						<div class="row">
							<div class="col col-title col-no">編號</div>
							<div class="col col-title col-middle">待回答問題</div>
							<div class="col col-title col-middle">設定關鍵字</div>
							<div class="col col-title col-big">設定答案</div>
							<div class="col col-title col-small">儲存</div>
						</div>
<?php 
try {
	require_once("php/connectBooks.php");
	$sql = "select * from question_and_answer where unsolved_question is not null";
	$qa = $pdo->query($sql);

	while($qaRow = $qa->fetchObject()){
?>

						<div class="row">
							<div class="col col-no"><?php echo $qaRow->key_word_no; ?></div>
							<div class="col col-middle"><?php echo $qaRow->unsolved_question; ?></div>
							<div class="col col-middle"><input type="text" name="key_word" value="<?php echo $qaRow->key_word; ?>"></div>
							<div class="col col-big"><input type="text" name="answer" value="<?php echo $qaRow->answer; ?>"></div>
							<div class="col col-small"><input type="submit" value="儲存"></div>
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
					</div>
				</div>
			</div>
					
<div id="RWD-page"><span>驗票系統</span></div><!-- ===========RWD用cover===============-->
<script type="text/javascript" src="js/11back_nav.js"></script>
<script>
//---換分頁
        function openCity (evt,list) {

            var i, tabcontent;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            b_sn_btn = document.getElementsByClassName("b_sn_btn");
            for (i = 0; i < b_sn_btn.length; i++) {
                b_sn_btn[i].setAttribute("id","");
            }
            document.getElementById(list).style.display = "block";

            evt.currentTarget.setAttribute("id","active");
        }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("active").click();

// function checkthe
</script>
</body>
</html>