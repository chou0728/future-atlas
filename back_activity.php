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
		<h1 class="logo">
			<img src="img/LOGO.png" alt="FA">
			<span>後台管理系統</span>
		</h1>
		<ul class="nav">
			<li class="navList">
				<a href="back_check_facility_tickets.html">設施驗票</a>
				<span class="listcover"></span>
				<span class="spancover"></span>
			</li>
			<li class="navList">
				<a href="back_check_theater_tickets.html">劇場驗票</a>
				<span class="listcover"></span>
				<span class="spancover"></span>
			</li>
			<li class="navList">
				<a href="back_facilityM.php">設施管理</a>
				<span class="listcover"></span>
				<span class="spancover"></span>
			</li>
			<li class="navList">
				<a href="back_TheaterMang.php">劇場管理</a>
				<span class="listcover"></span>
				<span class="spancover"></span>
			</li>
			<li class="navList">
				<a href="back_activity.php" style="color: black;">活動管理</a>
				<span class="listcover" style="width: 100%;background-color: rgba(90, 230, 219,0.9);"></span>
				<span class="spancover"></span>
			</li>
			<li class="navList">
				<a href="">會員管理</a>
				<span class="listcover"></span>
				<span class="spancover"></span>
			</li>
			<li class="navList">
				<a href="">諮詢管理</a>
				<span class="listcover"></span>
				<span class="spancover"></span>
			</li>
			<li class="navList">
				<a href="">權限管理</a>
				<span class="listcover"></span>
				<span class="spancover"></span>
			</li>
		</ul>
	</header>
	<div class="loginBox mobileLoginBox">
			您好!<span id="managerId">最高管理員</span><span id="managerName">Manna</span>
			<a href="javascript:void(0)">登出</a>
	</div>
<!-- ===NAV結束=== -->
<!-- ===右邊區塊固定格式=== -->
	<div class="back_wrapper_right">
		<div class="b_content">
			<div class="b_sub_nav">
				<a href="javascript:void(0)" class="b_sn_btn" onclick="openCity(event,'insert_activity')" id="active">新增活動</a>
                <a href="javascript:void(0)" class="b_sn_btn" onclick="openCity(event,'history_activity')">歷史活動</a>
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
			<td><input type="textarea" wrap="virtual" name="activity_name" id="activity_name" placeholder="10字內" maxlength="10" size="10" rows="2" required></td>			
			<td><input type="textarea" wrap="virtual" name="activity_short_name" id="activity_short_name" placeholder="5字內" maxlength="5" size="5" rows="2" required></td>
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
	<table id="history_activity_table">
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
<?php
try {
	require_once("connectBooks.php");
	$sql = "select * from activity order by activity_no";
	$activity = $pdo->query($sql);
	while($activityRow = $activity->fetchObject()){
?>
	<form action="activityUpdate.php" method="post">
		<tr>
			<td><input type="text" cols="5" class="no readOnlyStyle" name="activity_no" value="<?php echo $activityRow->activity_no ?>"></td>
			<td><input type='text' name="activity_name" value="<?php echo $activityRow->activity_name ?>" cols="5" class='data readOnlyStyle' readonly></td>
			<td><input type='text' name="activity_short_name" value="<?php echo $activityRow->activity_short_name ?>" class='data readOnlyStyle' readonly></td>
			<td><input type='text' name="activity_location" value="<?php echo $activityRow->activity_location ?>" cols="5" class='data readOnlyStyle' readonly></td>
			<td><input type='text' name="activity_date" value="<?php echo $activityRow->activity_date ?>" cols="5" class='data readOnlyStyle' readonly></td>
			<td><input type='text' name="activity_start_time" value="<?php echo $activityRow->activity_start_time ?>" class='data readOnlyStyle' readonly></td>
			<td><input type='text' name="activity_end_time" value="<?php echo $activityRow->activity_end_time ?>" cols="5" class='data readOnlyStyle' readonly></td>
			<td><input type='text' name="activity_intro" value="<?php echo $activityRow->activity_intro ?>" cols="5" class='data readOnlyStyle' readonly></td>
			<td><input class="input_btn" name="" value="修改" class="switchMode">
				<input class="input_btn" type="submit" name="" value="儲存">
			</td>
		</tr>
	</form>
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
		$(".switchMode").click(function(){
			$(".data").toggleClass("editStyle");
		})
		$('.switchMode').click(function() {
	    var $data = $('.data');
	    var $switchMode = $('.switchMode');
	    if ($data.attr('readonly')) {
	        $data.removeAttr('readonly');
	    } else {
	        $data.attr('readonly', true);
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
	document.getElementById("active").click();
</script>
</body>
</html>
