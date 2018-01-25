<!-- 請先將網站另存成PHP/可參考index.php-->
<!-- 請參照header_sample更新導覽列html -->

<!-- ↓然後在最前面加上這ㄍ -->
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



<!--↓CSS部分請補上這段 -->
<link rel="stylesheet" type="text/css" href="css/login.css">
<style type="text/css">
	#all-page{
			position: fixed;
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





<!--↓HTML部分請補上這段 -->

<div id="all-page"></div><!-- 叫出時背景-->
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





<!--↓js部分請補上這段 -->
<script type="text/javascript">
	//-登入-----------------------------------
			window.onload = function () {

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
				
				
			}

function loginss(){
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
window.addEventListener("load",loginss);
</script>


<!-- 總結:如果改成php後有一些奇怪的事情發生，請先檢查自己的ｈｔｍｌ架構 -->