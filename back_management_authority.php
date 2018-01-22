<?php
ob_start();
session_start();
//請複製:當無登入時會自動跳轉至登入頁面
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
	<link rel="stylesheet" type="text/css" href="css/back_management_authority.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
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
                <a href="back_management_authority.php" style="color:black;">權限管理</a>
                <span class="listcover" style="width: 100%;background-color: rgba(90, 230, 219,0.9);"></span>
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
<!-- ===NAV結束=========================================================================== -->
<!-- ===右邊區塊固定格式=============================================================== -->
	<div class="back_wrapper_right">
		<div class="b_content">
			<div class="b_sub_nav">
				<a href="javascript:void(0)" class="b_sn_btn"  id="active">權限管理</a>
			</div>
			<!-- ===========請加內容至此===========-->
<div id="managerListWrapper">
	<h2>權限管理</h2>

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
	<!-- 隱藏欄位區 -->
	<input type="hidden" name="i_id_hidden" value="<?php echo $managerRow->manager_id ?>">
	<input type="hidden" name="i_name_hidden" class="i_name_hidden">
	<input type="hidden" name="i_psw_hidden" class="i_psw_hidden">
	<input type="hidden" name="i_top_hidden" class="i_top_hidden">
	<input type="hidden" name="i_status_hidden" class="i_status_hidden">
	<!-- 隱藏欄位區 -->
	<div class="managerRow">
		<div class="managerTD id">
			<?php echo $managerRow->manager_id ?>
		</div>
		<div class="managerTD name">
			<input type="text" name="" value="<?php echo $managerRow->manager_name ?>" class="i_name readOnlyStyle" readonly>
		</div>
		<div class="managerTD psw">
			<input type="text" name="" value="<?php echo $managerRow->password ?>" class="i_psw readOnlyStyle" readonly>
		</div>
		<div class="managerTD top">
			<select name="" id="" class="i_top data readOnlyStyle" disabled>
				<option value="最高"	<?php if(($managerRow->top_manager) == 1 ){
										echo "selected";
									} ?>>最高</option>
				<option value="一般"<?php if(($managerRow->top_manager) != 1 ){
										echo "selected";
									} ?>>一般</option>
			</select>
		</div>
		<div class="managerTD status">
			<select name="" id="" class="i_status data readOnlyStyle" disabled>
				<option value="啟用"<?php if(($managerRow->manager_status) == 1 ){
										echo "selected";
									} ?>>啟用</option>
				<option value="停用"<?php if(($managerRow->manager_status) != 1 ){
										echo "selected";
									} ?>>停用</option>
			</select>
		</div>
		<div class="managerTD editBtn">
			<div class="edit operating">修改</div>
			<div class="operating">
				<input type="submit" name="" value="送出">
			</div>
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
	// 按下儲存按鈕 將新的value值送進隱藏欄位
		// 修改帳號
		$(".managerRow .i_name").change(function(){
			var index = $(".i_name").index(this);
			var new_name = "default value";
			new_name = $(".managerRow .i_name").eq(index).val();
			$(".i_name_hidden").eq(index).val(new_name);
		});
		// 修改密碼
		$(".managerRow .i_psw").change(function(){
			var index = $(".i_psw").index(this);
			var new_name = "default value";
			new_name = $(".managerRow .i_psw").eq(index).val();
			$(".i_psw_hidden").eq(index).val(new_name);
		});
		// 修改權限
		$(".managerRow .i_top").change(function(){
			var index = $(".i_top").index(this);
			var new_name = "default value";
			new_name = $(".managerRow .i_top").eq(index).val();
			if(new_name=="最高"){
				new_name = 1;
			}else{
				new_name = 0;
			}
			$(".i_top_hidden").eq(index).val(new_name);
		});
		// 修改狀態
		$(".managerRow .i_status").change(function(){
			var index = $(".i_status").index(this);
			var new_name = "default value";
			new_name = $(".managerRow .i_status").eq(index).val();
			if(new_name=="啟用"){
				new_name = 1;
			}else{
				new_name = 0;
			}
			$(".i_status_hidden").eq(index).val(new_name);
		});
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
	// 切換資料 修改與唯獨
	$(".edit").click(function(){
		var index = $(".edit").index(this);
		$(".managerRow .i_name").eq(index).toggleClass("editStyle");
		$(".managerRow .i_psw").eq(index).toggleClass("editStyle");
		$(".managerRow .i_top").eq(index).toggleClass("editStyle");
		$(".managerRow .i_status").eq(index).toggleClass("editStyle");
	});
	$(".edit").click(function(){
		var index = $(".edit").index(this);
		var $name = $('.i_name').eq(index);
		    if ($name.attr('readonly')) {
		        $name.removeAttr('readonly');
		    } else {
		        $name.attr('readonly', true);
		    }
		var $psw = $('.i_psw').eq(index);
		    if ($psw.attr('readonly')) {
		        $psw.removeAttr('readonly');
		    } else {
		        $psw.attr('readonly', true);
		    }
		var $top = $('.i_top').eq(index);
		    if ($top.attr('disabled')) {
		        $top.removeAttr('disabled');
		    } else {
		        $top.attr('disabled', true);
		    }
		var $status = $('.i_status').eq(index);
			if ($status.attr('disabled')) {
		        $status.removeAttr('disabled');
		    } else {
		        $status.attr('disabled', true);
		    }
	});
});
</script>
</body>
</html>