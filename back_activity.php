<?php
ob_start();
session_start();
if(isset($_SESSION["login_success"])==false){
	header("location:manager_login.php");
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>FA後台</title>
	<!-- ======請複製==== -->
	<link rel="stylesheet" type="text/css" href="css/RESET.css">
	<link rel="stylesheet" type="text/css" href="css/11back_nav.css">
	<link rel="stylesheet" type="text/css" href="css/back_activity.css">
	<!-- ========== -->
</head>
<body>
<!-- ============================================================================== -->
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
                <a href="back_facilityM.php">設施管理</a>
                <span class="listcover"></span>
                
            </li>
            <li class="navList">
                <a href="back_TheaterMang.php">劇場管理</a>
                <span class="listcover"></span>
            </li>
            <li class="navList">
                <a href="back_activity.php" style="color:black;">活動管理</a>
                <span class="listcover" style="width: 100%;background-color: rgba(90, 230, 219,0.9);"></span>
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
<!-- ===NAV結束=== -->
<!-- ===右邊區塊固定格式=== -->
	<div class="back_wrapper_right">
		<div class="b_content">
			<div class="b_sub_nav">
				<!-- <a href="javascript:void(0)" class="b_sn_btn" onclick="openCity(event,'insert_activity')" id="active">新增活動</a> -->
                <!-- <a href="javascript:void(0)" class="b_sn_btn" onclick="openCity(event,'history_activity')">歷史活動</a> -->
			</div>
	<!-- ===========請加內容至此===========-->
	<div id="insert_activity" class="tabcontent">
	<h2 class="titleh2">新增活動</h2>
	<form action="insert_activity.php" method="post">
	<table>
		<tr>
			<th>編號</th>
			<th>名稱</th>
			<th>簡稱</th>
			<th>地點</th>
			<th>日期</th>
			<th>開始時間</th>
			<th>結束時間</th>
			<th>簡介</th>
			<th>設定</th>
		</tr>
		<tr>			
			<td name="activity_no">1</td>
			<td><input type="textarea" wrap="hard" name="activity_name" id="activity_name" placeholder="10字內" maxlength="10" size="10" rows="2" required></td>			
			<td><input type="textarea" wrap="hard" name="activity_short_name" id="activity_short_name" placeholder="5字內" maxlength="5" size="5" rows="2" required></td>
			<td>
				<select name="activity_location" required>
					<option value="未來大道">未來大道</option>
					<option value="明日之廳">明日之廳</option>
					<option value="國際會議中心">國際會議中心</option>
					<option value="演講廳">演講廳</option>
					<option value="貿易中心">貿易中心</option>
					<option value="空中花園">空中花園</option>
					<option value="旋轉餐廳">旋轉餐廳</option>
				</select>
			</td>
			<td><input type="date" name="activity_date" required></td>
			<td><input type="time" name="activity_start_time" required></td>
			<td><input type="time" name="activity_end_time" required></td>
			<td><input type="textarea" wrap="virtual" name="activity_intro" placeholder="15字內" maxlength="15" size="10" rows="3" required></td>
			<td><input type="reset" name="">
				<input type="submit" name="" value="上架">
			</td>
		</tr>
	</table>
	</form>
	</div>
	<!-- ===========請加內容至此===========-->
	<div id="history_activity" class="tabcontent">
	<h2 class="titleh2">歷史活動</h2>
	<div id="history_activity_table" class="show_as_table">
		<div class="show_as_row">
			<div class="date show_as_col">日期</div>
			<div class="name show_as_col">名稱</div>
			<div class="short show_as_col">簡稱</div>
			<div class="location show_as_col">地點</div>
			<div class="start show_as_col">開始時間</div>
			<div class="end show_as_col">結束時間</div>
			<div class="intro show_as_col">簡介</div>
			<div class="show_as_col">設定</div>
		</div>
	</div>
<?php
try {
	require_once("connectBooks.php");
	$sql = "select * from activity order by activity_date";
	$activity = $pdo->query($sql);
	while($activityRow = $activity->fetchObject()){
?>
<div class="show_as_table">
	<form action="update_activity.php" method="post">
		<div class="show_as_row">
			<div class="no show_as_col" style="display: none">
				<input type='hidden' name="no" value="<?php echo $activityRow->activity_no ?>">
			</div>
			<div class="date show_as_col">
				<input type='text' name="date" value="<?php echo $activityRow->activity_date ?>" class='data readOnlyStyle' readonly>
			</div>
			<div class="name show_as_col">
				<input type='text' name="name" value="<?php echo $activityRow->activity_name ?>" class='data readOnlyStyle' readonly>
			</div>
			<div class="short show_as_col">
				<input type='text' name="short" value="<?php echo $activityRow->activity_short_name ?>" class='data readOnlyStyle' readonly>
			</div>
			<div class="location show_as_col">
				<input type='text' name="location" value="<?php echo $activityRow->activity_location ?>" class='data readOnlyStyle' readonly>
			</div>
			<div class="start show_as_col">
				<input type='text' name="start" value="<?php echo $activityRow->activity_start_time ?>" class='data readOnlyStyle' readonly>
			</div>
			<div class="end show_as_col">
				<input type='text' name="end" value="<?php echo $activityRow->activity_end_time ?>" class='data readOnlyStyle' readonly>
			</div>
			<div class="intro show_as_col">
				<input type='text' name="intro" value="<?php echo $activityRow->activity_intro ?>" class='data readOnlyStyle' readonly></div>
			<div class="editBtn show_as_col">
				<div class="edit operating">修改</div>
				<div class="operating">
					<input type="submit" name="" value="送出">
				</div>
			</div>
		</div>
	</form>
</div>
<?php		
	}
} catch (PDOException $e) {
	echo "錯誤原因 : " , $e->getMessage() , "<br>";
	echo "錯誤行號 : " , $e->getLine() , "<br>";
}
?>
</table>
	</div>
	</div>
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
// 可修改歷史活動
	$(document).ready(function(){
		// 修改按鈕 切換修改和儲存
		$(".edit").click(function(){
			$(this).toggleClass("save");
			var $text = $(this).text();
			if($text=="修改"){
				$(this).html("確定");
			}else{
				$(this).html("修改");
			}
		});
		// 抓到修改第幾列的index值
		// 切換資料：改變外觀
		$(".edit").click(function(){
			var index = $(".edit").index(this) + 1;
			$(".date").eq(index).toggleClass("editStyle");
			$(".name").eq(index).toggleClass("editStyle");
			$(".short").eq(index).toggleClass("editStyle");
			$(".location").eq(index).toggleClass("editStyle");
			$(".start").eq(index).toggleClass("editStyle");
			$(".end").eq(index).toggleClass("editStyle");
			$(".intro").eq(index).toggleClass("editStyle");
		});
		// 切換資料：唯獨 改成 可修改
		$(".edit").click(function(){
		var index = $(".edit").index(this) + 1;
		var $date = $('.date').eq(index).children();
		    if ($date.attr('readonly')) {
		        $date.removeAttr('readonly');
		    } else {
		        $date.attr('readonly', true);
		    }
		var $name = $('.name').eq(index).children();;
		    if ($name.attr('readonly')) {
		        $name.removeAttr('readonly');
		    } else {
		        $name.attr('readonly', true);
		    }
		var $short = $('.short').eq(index).children();;
		    if ($short.attr('readonly')) {
		        $short.removeAttr('readonly');
		    } else {
		        $short.attr('readonly', true);
		    }
		var $location = $('.location').eq(index).children();;
		    if ($short.attr('readonly')) {
		        $short.removeAttr('readonly');
		    } else {
		        $short.attr('readonly', true);
		    }
		var $start = $('.start').eq(index).children();;
			if ($start.attr('readonly')) {
		        $start.removeAttr('readonly');
		    } else {
		        $start.attr('readonly', true);
		    }
		var $end = $('.end').eq(index).children();;
			if ($end.attr('readonly')) {
		        $end.removeAttr('readonly');
		    } else {
		        $end.attr('readonly', true);
		    }
		var $intro = $('.intro').eq(index).children();;
			if ($intro.attr('readonly')) {
		        $intro.removeAttr('readonly');
		    } else {
		        $intro.attr('readonly', true);
		    }
	});
	});

//tab 換頁
	function openCity (evt,list) {

	    var i, tabcontent, b_sn_btn;
	    tabcontent = document.getElementsByClassName("tabcontent");
	    for (i = 0; i < tabcontent.length; i++) {
	        tabcontent[i].style.display = "none";
	    }
	    b_sn_btn = document.getElementsByClassName("b_sn_btn");
	    for (i = 0; i < b_sn_btn.length; i++) {
	        b_sn_btn[i].className = b_sn_btn[i].className.replace(" active", "");
	        b_sn_btn[i].setAttribute("id","");
	    }
	    document.getElementById(list).style.display = "block";
	    evt.currentTarget.className += " active";

	    evt.currentTarget.setAttribute("id","active");
	}
	// Get the element with id="defaultOpen" and click on it
	// document.getElementById("active").click();
</script>
<!-- ===========請在最後加入=!!==============-->
    <div id="RWD-page"><span>驗票系統</span></div><!-- ===========請在最後加入=!!==============-->
</body>
</html>
