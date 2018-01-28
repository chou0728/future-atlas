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
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/RESET.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
	<script src="js/jquery.min.js"></script>						
    <link rel="stylesheet" type="text/css" href="css/login.css">	
    <link rel="stylesheet" type="text/css" href="css/buyTTicket.css" />
    <script src="js/sessionStorage.js"></script>
    <title>FA未來主題樂園 | 劇場購票-選購劇場票劵</title>
    <link rel="icon" href="img/favicon.ico" />
</head>
<body>
    <div class="header">
        <ul class="ul_top">
            <li class="li_top">
                <a href=<?php
                    if(isset($_SESSION["mem_id"])===true){
                        echo "'javascript:void(0)'";
                    }else{
                        echo "'SignUp.html'";
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
                                echo "<a href='MembersOnly.php'>帳戶</a>";
                            }else{
                                echo "註冊";
                            }
                        ?>
                    </span>
                </a>
            </li>
            <li class="li_top" <?php if(!isset($_SESSION["mem_id"])){
                                echo "style='display: none';";
                                }?>>
                <a href="see_tickets.php" class="tkt">
                    <img src="img/member/qr-code-scan.png">
                    <span>票券</span>
                </a>
            </li>
            <li class="li_top">
                <a href=<?php
                            if(isset($_SESSION["mem_id"])===true){
                                echo"'logoutheadforindex.php'";
                            }else{
                                echo"'javascript:void(0)'";
                            }
                        ?> id="singUpBtn">
                    <img src="img/member/member_1.png">
                    <span class="login">
                        <?php
                            if(isset($_SESSION["mem_id"])===true){
                                echo"<a href='logoutheadforindex.php?ismp=0'>登出</a>";
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
                    <img src="img/hover-tri-now.png" class="nav_here">
                    <a href="Theaterbuyticket.php" style="color: rgb(55,222,255);font-weight: bold;">劇場購票</a>
                </li>
                <li>
                    <img src="img/hover-tri.png" class="nav_hover">
                    <a href="facilityBuyTicket.php">設施購票</a>
                </li>
                <li>
                    <img src="img/hover-tri.png" class="nav_hover">
                    <a href="facilityInfo.php">設施介紹</a>
                </li>
            </ul>
            <h1 style="display: none">FutureAtlas_未來主題樂園</h1>
            <a href="home.php" class="logo_a">
                <img src="img/LOGO.png" class="logo">
            </a>
            <ul class="ul_right">
                <li>
                    <img src="img/hover-tri.png" class="nav_hover">
                    <a href="home.php#page2" id="NavClose">園區地圖</a>
                </li>
                <li>
                    <img src="img/hover-tri.png" class="nav_hover">
                    <a href="activity.php">活動月曆</a>
                </li>
                <li>
                    <img src="img/hover-tri.png" class="nav_hover">
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
    
    <!-- 購買票劵 -->
    <div class="buyticketarea">
       <!--  <h2>購買票劵</h2> -->
        <!-- <h2 class="verticalh2">購買票劵</h2> -->
        <form name="form" action="" method="get">  
            <table>
                <tr>
                    <td>節目名稱</td>
                    <td>
                        <input type="radio" id="programName1" name="programName" value="尋找星生命" checked onchange="changeTheaterName()">
                        <label for="programName1">尋找星生命</label>
                        <br>
                        <input type="radio" id="programName2" name="programName" value="末世決戰" onchange="changeTheaterName()">
                        <label for="programName2">末世決戰</label>
                    </td>
                </tr>
                <tr>
                    <td>節目日期</td>
                    <td>
                      <!-- <input type="date" id="programDate" name="programdate" required onchange="changeDate()" style="font-size:23px;">-->
    				 <select id="theater1" onchange="changeDate()" style="font-size:23px;">
    					<option>請選擇日期</option>
    				 </select>
    				 <select id="theater2" onchange="changeDate()" style="font-size:23px;">
    					<option>請選擇日期</option>
    				 </select>				  
                    </td>
                </tr>
                <tr>
                    <td>場次</td>
                    <td>
                        <select id="programTime" onchange="changeEvent()" style="width:140px; font-size:23px;">
                            <option >請選擇場次</option>
                            <option value="11:00">11:00</option>
                            <option value="14:00">14:00</option>
                            <option value="15:00">15:00</option>
                            <option value="19:00">19:00</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>票價</td>
                    <td>100元</td>
                </tr>
                <tr>
                    <td>張數</td>
                    <td>
                        <!-- <input type="number" min="1" name="ticketNum" value="1"> -->
                    <input style="width:60px;font-size:23px;" type="number" id="quantity" value="1" min="1" onchange="changeQuantity()" />
                    </td>
                </tr>
                <tr>
                    <td>總共金額</td>
                    <td id="total">
                        100元
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div class="buyTTicketBtn">
            <a href="Theaterbuyticket.php" class="Previouspage">上一步</a>
            <a href="javascript:void(0);" onClick="setStorage()" class="buyticket" >確認購買</a>      
    </div>
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
            <div id="orRegister">
              <span>還沒有帳號嗎？<a href="register.html">註冊</a>一個吧！</span>
            </div>
        </div>
        <!-- 登入燈箱 ==end============-->

    <script src="js/00nav.js"></script>
    <!--↓js部分請補上這段 -->
    <script type="text/javascript">
       
        //-登入-----------------------------------
        window.onload = function (){
             loginss();
             //var buyticket = document.getElementsByClassName('buyticket');
             //buyticket[0].onclick=ajax_CheckTicket;

             // ==============================存取會員ID開始=================
            var storage = localStorage;
            storage.setItem("mem_id",<?php if(isset($_SESSION["mem_id"])===true){echo $_SESSION["mem_id"];}else{echo "0";} ?>);

            // ==============================存取會員ID結束=================

            // =================登入/註冊開始==================================

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
                // window.addEventListener("load",loginss);
            // =================登入/註冊結束=================================
         // ===============檢查剩餘票數開始==================================
            // function ajax_CheckTicket(){
            //     // Create our XMLHttpRequest object
            //     //產生XMLHttpRequest物件
            //     var storage = sessionStorage;
            //     var programName = storage.getItem('programName');
            //     var programDate = storage.getItem('programDate');
            //     var programTime = storage.getItem('programTime');
            //     var hr = new XMLHttpRequest();
            //     // Create some variables we need to send to our PHP file
            //     //把 vars裡面資輛傳到my_parse_file.php檔案(設定參數)
            //     var url = "php/checkTicket.php";
            //     var vars = "programName="+programName+
            //                "&programDate="+programDate+
            //                "&programTime="+programTime;
            //                //alert(vars);
            //     //利用POST方式傳遞
            //     // open() 的第一個參數是 HTTP request 的方法
            //     //第二個參數是請求頁面的 URL
            //     //第三個參數決定此 request是否不同步進行，
            //     //如果設定為 TRUE則即使伺服器尚未傳回資料也會繼續執行其餘的程式
            //     hr.open("POST", url, true);
            //     //setRequestHeader()設定內容類型
            //     //若發送表單類型資料，必須設置請求標頭'Content-Type'為'application/x-www-form-urlencoded'
            //     hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            //     var quantity = Number(storage.getItem('theater_quantity'));

            //     hr.onreadystatechange =function (){
            //          if(hr.readyState == 4 && hr.status == 200){
            //             //return_data = hr.responseText;
            //             //console.log(hr.responseText);
            //             // document.getElementById("status").innerHTML = return_data;
            //             var ticket = parseInt(JSON.parse(hr.responseText));
            //             if(quantity <= ticket ){
            //                 window.location.href='Booking_details.php';
            //                 //alert(111);
            //             }else{
            //                 alert("本場次票券剩餘 "+ticket+"張");
            //             }
            //          }
            //     }
            //      hr.send(vars); // Actually execute the request
            // } 

        }  

    </script>

</body>
</html>