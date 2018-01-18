<?php
ob_start();
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>有效設施票券</title>
    <link rel="stylesheet" href="css/vaild_facility_tickets.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/login.css">

</head>

<body>
    <!-- header -->

    <body>
            <!-- header -->
            <div class="header">
                <ul class="ul_top">
                    <div class="lever">
                        <img src="img/Usericon1.png">
                    </div>
                    <li class="li_top">
                        <a href=<?php
                            if(isset($_SESSION["mem_id"])===true){
                                echo "'javascript:void(0)'";
                            }else{
                                echo "'SignUp.html'";
                            }
                        ?> id="registerUser">
                            <img src="img/member/member_0.png">
                            <span class="register">
                                <?php
                                    if(isset($_SESSION["mem_id"])===true){
                                        echo $_SESSION["mem_nick"]."你好!";
                                    }else{
                                        echo "註冊";
                                    }
                                ?>
                            </span>
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
                                        echo"登出";
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
                            <div id="showCartContent">預覽購物車
                                <table id="showCartContenttb"></table>
                            </div>
                    </li>
                </ul>
            </div>
            <div class="nav">
                <div class="ul_box">
                    <ul class="ul_left">
                        <li>
                            <a href="Theaterbuyticket.html">劇場購票</a>
                        </li>
                        <li>
                            <a href="facilityBuyTicket.html">設施購票</a>
                        </li>
                        <li>
                            <a href="facilityInfo.html">設施介紹</a>
                        </li>
                    </ul>
                    <h1 style="display: none">FutureAtlas_未來主題樂園</h1>
                    <a href="index.html#page1" class="logo_a">
                        <img src="img/LOGO.png" class="logo">
                    </a>
                    <ul class="ul_right">
                        <li>
                            <a href="index.html#page2">園區地圖</a>
                        </li>
                        <li>
                            <a href="activity.html">活動月曆</a>
                        </li>
                        <li>
                            <a href="robot.html">諮詢專區</a>
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
    <!-- content -->
    <div class="wrapper">
        <div class="content">
            <div class="info QR_info">
                <h2>可使用數量</h2>
                <div class="info_ticket_QR">
                    <div class="QR">
                        <img id="QR_code" src="../img/qrcode.jpg" alt="QR_code">
                    </div>
                    <div class="ticket_info">
                        <p>設施名稱：宇宙雲霄飛車</p>
                        <p>訂單編號：0001</p>
                        <p>全票：2張　半票:1張　共3張</p>
                    </div>
                </div>

            </div>
            <div class="info">
                <h2>使用紀錄</h2>
                <div class="info_used_record">
                        <div class="records">
                                <p>時間：2018/1/1 10:00　am</p>
                                <p>註記張數：全票1張 半票1張　共2張</p>
                                <p>註記人員：李小明</p>
                        </div>
                        <div class="records">
                                <p>時間：2018/1/1 10:00　am</p>
                                <p>註記張數：全票1張 半票1張　共2張</p>
                                <p>註記人員：李小明</p>
                        </div>
                        <div class="records">
                                <p>時間：2018/1/1 10:00　am</p>
                                <p>註記張數：全票1張 半票1張　共2張</p>
                                <p>註記人員：李小明</p>
                        </div>
                       
                    
                </div>

            </div>
        </div>
    </div>

    <script src="js/00nav.js"></script>
    <!-- <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
    <script>

        // 為什麼只能執行一次呢??

        var QR_code = document.getElementById('QR_code');
        QR_code.addEventListener('click',function(){
            this.style.width = "200%";
            this.style.left = "120%";
            this.style.top = "80%";
            this.addEventListener('click',function(){
                this.style.width = "80%";
                this.style.left = "50%";
            this.style.top = "50%";
            });
        });

        
    </script>
</body>

</html>