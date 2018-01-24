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




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FA未來主題樂園 | 諮詢專區</title>
    <link rel="icon" href="img/favicon.ico" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/RESET.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" href="css/robot_new.css">
    <title>Robot Talk</title>
    <style>
        * {
            box-sizing: border-box;
        }
    </style>

</head>

<body>
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
                			echo "<a href='MembersOnly.html'>帳戶</a>";
                		}else{
                			echo "註冊";
                		}
                	?>
                </span>
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
        <a href="#page1" class="logo_a">
            <img src="img/LOGO.png" class="logo">
        </a>
        <ul class="ul_right">
            <li>
                <a href="#page2" id="NavClose">園區地圖</a>
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


        <div class="navOpenBtn">
            <!-- RWD left btn-->
            <div class="ham"></div>
            <div class="ham"></div>
            <div class="ham"></div>
            <div class="ham"></div>
        </div>
    </div>
    <div class="headerOpenBtn">
        <!-- RWD right btn-->
        <img src="img/memberBtnM.png" class="memIcon">
        <img src="img/ticketicon.png" class="ticketIcon">
        <div class="blueScreen"></div>
    </div>
    <div class="wrapper">
        <!-- <img class="frame" src="img/robot_page/frame.png" alt=""> -->
        <img class="robot" src="img/robot_page/robot2.png" alt="">

        <div class="conversation">

            <p id="robot_greet"></p>
            <p id="user_message"></p>
            <p id="robot_answer"></p>


            <!-- <img class="chat_area" src="img/robot_page/chat_block.png" alt=""> -->
            <!-- <img class="brackets" src="img/robot_page/brackets.png" alt=""> -->
            <div class="input_area">
                <input type="text" id="input_box" placeholder="請在這輸入您的疑問">
                <!-- <button class="submit">送出</button> -->
            </div>

        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="js/00nav.js"></script>
    <script>
        var message = "您好，我是Future Atlas的守護者，有什麼我能協助您的?";
        var input_box = document.getElementById("input_box");
        initIdentityResults(0);

        function initIdentityResults(i) {
            $("#robot_greet").addClass("cursor").text(message.substring(0, i));
            if (i < message.length) {
                setTimeout(function () {
                    initIdentityResults(i + 1);
                }, 100);
            }

        }


        $("#input_box").on('keydown', function (e) {
            if (e.which == 13 || e.keyCode == 13) {
                $("#robot_greet").removeClass("cursor");
                var user_text = $("#input_box").val();
                getAnswer();
                // initIdentityResults_user(0);
                clearInputbox();


                function getAnswer() {

                    var xhr = new XMLHttpRequest();
                    xhr.onload = function () {

                        if (xhr.status == 200) {

                            var answer = xhr.responseText;
                            initIdentityResults_user(0);

                            function initIdentityResults_user(i) {
                                $("#user_message").addClass("cursor").text(user_text.substring(0, i));
                                if (i < user_text.length) {
                                    setTimeout(function () {
                                        initIdentityResults_user(i + 1);
                                    }, 100);
                                } else {
                                    $("#user_message").removeClass("cursor");
                                    var robot_answer = answer;
                                    initIdentityResults_robot_answer(0);

                                    function initIdentityResults_robot_answer(i) {
                                        $("#robot_answer").addClass("cursor").text(robot_answer.substring(0,
                                            i));
                                        if (i < robot_answer.length) {
                                            setTimeout(function () {
                                                initIdentityResults_robot_answer(i + 1);
                                            }, 100);
                                        }

                                    }
                                }

                            }
                        } else {
                            alert(xhr.status);
                        }



                    } // xhr.onload

                    //設定好所要連結的程式
                    var url = "question_and_answer.php";
                    xhr.open("post", url, true);

                    //送出資料
                    var data_info = "user_text=" + user_text;
                    xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
                    xhr.send( data_info );






                } // function getAnswer()


                function clearInputbox() {
                    $("#input_box").val("");
                }



            } //if (e.which == 13 || e.keyCode == 13){}

        }); //$("#input_box").on('keydown', function (e) {})





            	//-登入-----------------------------------
			window.addEventListener("load",openLoginBox);
			function openLoginBox() {

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


</body>


</html>