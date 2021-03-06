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
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FA後台管理系統 | 諮詢管理</title>
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
					<div id="align-right"><input type="button" value="新增問答" id="new_qa"></div>
					<div class="table">
						<div class="row">
							<div class="col col-title col-no">編號</div>
							<div class="col col-title col-middle">關鍵字</div>
							<div class="col col-title col-big">答案</div>
							<div class="col col-title col-small">儲存</div>
							<div class="col col-title col-small">刪除</div>
						</div>
<?php 
try {
	require_once("php/connectBooks.php");
	$sql = "select * from question_and_answer where unsolved_question is null order by key_word_no DESC ";
	$qa = $pdo->query($sql);

	while($qaRow = $qa->fetchObject()){
?>						
					
						<div class="row">
								<div class="col col-no"><?php echo $qaRow->key_word_no; ?></div>
								<div class="col col-middle"><input type="text" name="key_word" value="<?php echo $qaRow->key_word; ?>"></div>
								<div class="col col-big"><input type="text" name="answer" value="<?php echo $qaRow->answer; ?>"></div>
								<div class="col col-small"><input type="button" value="儲存" class="save_qa"></div>
								<div class="col col-small"><input type="button" value="刪除" class="del_qa"></div>
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
							<div class="col col-title col-no">刪除</div>
						</div>
<?php 
try {
	require_once("php/connectBooks.php");
	$sql = "select * from question_and_answer where unsolved_question is not null order by key_word_no DESC ";
	$qa = $pdo->query($sql);

	while($qaRow = $qa->fetchObject()){
?>

						<div class="row">
							<div class="col col-no"><?php echo $qaRow->key_word_no; ?></div>
							<div class="col col-middle"><?php echo $qaRow->unsolved_question; ?></div>
							<div class="col col-middle"><input type="text" name="key_word" value="<?php echo $qaRow->key_word; ?>"></div>
							<div class="col col-big"><input type="text" name="answer" value="<?php echo $qaRow->answer; ?>"></div>
							<div class="col col-small"><input type="button" value="儲存" class="save_unqa"></div>
							<div class="col col-small"><input type="button" value="刪除" class="del_unqa"></div>
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


	function init(){
		var new_qa = document.getElementById('new_qa');
		new_qa.addEventListener('click',function(){
			location.href="update_robot.php?new=1";//update_robot.php判斷是否為delet;
		});
		var save_qa = document.getElementsByClassName('save_qa');
		var del_qa = document.getElementsByClassName('del_qa');
		var save_unqa = document.getElementsByClassName('save_unqa');
		var del_unqa =  document.getElementsByClassName('del_unqa');
		for(var i=0;i<save_qa.length;i++){
			save_qa[i].addEventListener('click',update_qa);
			del_qa[i].addEventListener('click',update_qa);
		}
		for(var i=0;i<save_unqa.length;i++){
			save_unqa[i].addEventListener('click',update_unqa);
			del_unqa[i].addEventListener('click',update_unqa);
		}
	}

	function update_qa(){//
		var key_word_no = this.parentElement.parentElement.children[0].innerText;
		var key_word = this.parentElement.parentElement.children[1].children[0].value;
		var answer = this.parentElement.parentElement.children[2].children[0].value;
		if(this.className=="save_qa"){//如果是要更動內容
			location.href="update_robot.php?key_word_no="+key_word_no+"&key_word="+key_word+"&answer="+answer;
		}else{//如果是要刪除整列
			location.href="update_robot.php?key_word_no="+key_word_no+"&del=1";//update_robot.php判斷是否為delet;
		}
		
	}
	function update_unqa(){//unsolved_qa
		var key_word_no = this.parentElement.parentElement.children[0].innerText;
		var unsolved_question = "notnull";//update_robot.php判斷是否為unsolved_qa
		var key_word = this.parentElement.parentElement.children[2].children[0].value;
		var answer = this.parentElement.parentElement.children[3].children[0].value;
		if(this.className=="save_unqa"){//如果是要更動內容
			location.href="update_robot.php?unsolved_question="+unsolved_question+"&key_word_no="+key_word_no+"&key_word="+key_word+"&answer="+answer;
		}else{
			location.href="update_robot.php?key_word_no="+key_word_no+"&del=1";
		}
	}

window.addEventListener('load',init);

</script>
</body>
</html>