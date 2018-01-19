<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>FA後台</title>
	<!-- ======請複製==== -->
	<link rel="stylesheet" type="text/css" href="css/RESET.css">
	<link rel="stylesheet" type="text/css" href="css/11back_nav.css">
	<link rel="stylesheet" type="text/css" href="css/back_management_authority.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
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
				<a href="">設施管理</a>
				<span class="listcover"></span>
				<span class="spancover"></span>
			</li>
			<li class="navList">
				<a href="">劇場管理</a>
				<span class="listcover"></span>
				<span class="spancover"></span>
			</li>
			<li class="navList">
				<a href="">活動管理</a>
				<span class="listcover"></span>
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
<!-- ===NAV結束=========================================================================== -->
<!-- ===右邊區塊固定格式=============================================================== -->
	<div class="back_wrapper_right">
		<div class="b_content">
			<div class="b_sub_nav">
				<a href="javascript:void(0)" class="b_sn_btn">權限管理</a>
			</div>
			<!-- ===========請加內容至此===========-->
<div id="managerListWrapper">
	<h1>權限管理</h1>

	<div class="managerTHH">
		<div class="managerTH id">管理員編號</div>
		<div class="managerTH name">管理員帳號</div>
		<div class="managerTH psw">密碼</div>
		<div class="managerTH top">最高權限</div>
		<div class="managerTH status">狀態</div>
		<div class="managerTH setup">設定</div>
	</div>
<?php
try {
	require_once("connectBooks.php");
	$sql = "select * from backend_manager";
	$manager = $pdo->query($sql);
	while($managerRow = $manager->fetchObject()){
?>
<form action="update_management_authority_php.php">
	<div class="managerRow">
		<div class="managerTD id">
			<?php echo $managerRow->manager_id ?>
		</div>
		<div class="managerTD name"><input type="text" name="" value="<?php echo $managerRow->manager_name ?>" class="i_name readOnlyStyle" readonly></div>
		<div class="managerTD psw"><input type="text" name="" value="<?php echo $managerRow->password ?>" class="i_psw readOnlyStyle" readonly></div>
		<div class="managerTD top">
			<select name="" id="" class="i_top">
				<option value="最高">最高</option>
				<option value="一般">一般</option>
			</select>


<!-- 			<?php if(($managerRow->top_manager) == 1 ){
					echo "最高";
				}else{
					echo "一般";
				} ?> -->
		</div>
		<div class="managerTD status">
			<select name="" id="" class="i_status">
				<option value="啟用">啟用</option>
				<option value="停用">停用</option>
			</select>

<!-- 			<?php if(($managerRow->manager_status) == 1 ){
					echo "啟用";
				}else{
					echo "停用";
				} ?> -->
		</div>
		<div class="managerTD editBtn">
			<div class="edit operating">修改</div>
			<div class="save operating">儲存</div>
		</div>
	</div>
</form>
<?php		
	}
} catch (PDOException $e) {
	echo "錯誤原因 : " , $e->getMessage() , "<br>";
	echo "錯誤行號 : " , $e->getLine() , "<br>";
}
?>
	
	</div>


</div>
			<!-- ===========請加內容至此===========-->
		</div>
	</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$(".edit").click(function(){
		var index = $(".edit").index(this);
		$(".managerRow .i_name").eq(index).toggleClass("editStyle");
		$(".managerRow .i_psw").eq(index).toggleClass("editStyle");
	});
	$(".edit").click(function(){
		var index = $(".edit").index(this);
		var $name = $('.i_name').eq(index);
		    if ($name.attr('readonly')) {
		        $name.removeAttr('readonly');
		        console.log($name);
		    } else {
		        $name.attr('readonly', true);
		    }
		var $psw = $('.i_psw').eq(index);
		    if ($psw.attr('readonly')) {
		        $psw.removeAttr('readonly');
		    } else {
		        $psw.attr('readonly', true);
		    }
	});
});
</script>
</body>
</html>