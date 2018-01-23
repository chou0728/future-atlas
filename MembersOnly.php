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


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FA未來主題樂園|會員專區</title>
    <link rel="stylesheet" type="text/css" href="css/RESET.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" href="css/MembersOnly.css">
    <style type="text/css">
        
        body::after,.facilityBox::after{
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color:#000;  /* 背景カラー */
            z-index: 9999;  /* 一番手前に */
            pointer-events: none;  /* 他の要素にアクセス可能にするためにポインターイベントは無効に */
            opacity: 0;  /* 初期値 : 透過状態 */
            -webkit-transition: opacity .4s ease;  /* アニメーション時間は 0.8秒 */
            transition: opacity .4s ease;
        }
        body.fadeout::after {
            opacity: 1;
        }
        .fadeout::after{
            opacity: 1;
        }
        #all-page{
            position: absolute;
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
</head>

<body class="fadeout">
        <!-- header -->
    
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
        <a href="====index.php" class="logo_a">
            <img src="img/LOGO.png" class="logo">
        </a>
        <ul class="ul_right">
            <li>
                <a href="====index.php#page2" id="NavClose">園區地圖</a>
            </li>
            <li>
                <a href="activity.php">活動月曆</a>
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

    <!-- header end-->

    <!-- header end-->

    <div class="MembersBox">
        <div class="content"> 
            
            <div class="buttonArea">
                <a href="" class="myinfo">查看會員資料</a>
                <a href="" class="myticket">查看票券</a>
            </div>


                <!-- 暱稱 -->
                <div class="nameBox_value_place">

                    <div class="bar"></div>

                    <div class="nameBox">
                            <img class="imgrotate" src="img/memberOnly/memberOnly2.png" alt="我的資料">
                            <p class="place" id="mem_nick_title">
                               會員資料
                            </p>
                    </div>

                    <div class="table">
                        <table>
                            <tr><th>暱稱 ：</th><td><p class="place_value mem_nick">null</p></td></tr>
                            <tr><th>帳號 ：</th><td><p class="place_value mem_name">null</p></td></tr>
                            <tr><th>積分 ：</th><td><p class="place_value mem_points">null</p></td></tr>
                            <tr><th>信箱 ：</th><td><p class="place_value mem_mail">null</p></td></tr>
                            <tr><th>電話 ：</th><td><p class="place_value mem_phone">null</p></td></tr>
                        </table>   
                    </div>
                        

                </div>
                    
               

                <!-- 帳號 -->
               <!--  <div class="nameBox">
                    <div class="nameBox_value">
                        <img src="img/memberOnly/memberOnly2.png" alt="帳號">
                        <p class="place" id="mem_name_title">帳號</p>
                    </div>
                    <div class="nameBox_value_place">
                        <p class="place_value mem_name">null</p>
                    </div>
                </div> -->
                
                <!-- 密碼 -->
                <!-- <div class="nameBox">
                    <div class="nameBox_value">
                        <img src="img/memberOnly/memberOnly2.png" alt="密碼">
                        <p class="place" id="mem_password_title">密碼</p>
                    </div>
                    <div class="nameBox_value_place">
                        <p class="place_value password">null</p>
                    </div>
                </div> -->

                <!--積分-->
                <!-- <div class="nameBox">
                    <div class="nameBox_value">
                        <img src="img/memberOnly/memberOnly2.png" alt="積分">
                        <p class="place" id="mem_points_title">積分</p>
                    </div>
                    <div class="nameBox_value_place">
                        <p class="place_value mem_points">null</p>
                    </div>
                </div> -->

                <!-- 信箱 -->
                <!-- <div class="nameBox">
                    <div class="nameBox_value">
                        <img src="img/memberOnly/memberOnly2.png" alt="信箱">
                        <p class="place" class="mem_mail_title">信箱</p>
                    </div>
                    <div class="nameBox_value_place">
                        <p class="place_value mem_mail">null</p>
                    </div>
                </div> -->

                <!-- 電話 -->
                <!-- <div class="nameBox">
                    <div class="nameBox_value">
                        <img src="img/memberOnly/memberOnly2.png" alt="電話">
                        <p class="place" id="mem_phone_title">電話</p>
                    </div>
                    <div class="nameBox_value_place">
                        <p class="place_value mem_phone">null</p>
                    </div>  
                </div>    -->



                
                <!-- 表格 -->
                <!-- <table width="100%" cellpadding="20" >
                    <tr><th width="20%">暱稱</th><td width="80%"> <p class="place_value mem_nick">null</p></td></tr>
                    <tr><th>帳號</th><td><p class="place_value mem_name">null</p></td></tr>
                    <tr><th>密碼</th><td><p class="place_value password">null</p></td></tr>
                    <tr><th>積分</th><td><p class="place_value mem_points">null</p></td></tr>
                    <tr><th>信箱</th><td><p class="place_value mem_mail">null</p></td></tr>
                    <tr><th>電話</th><td><p class="place_value mem_phone">null</p></td></tr>
                </table> -->   

            </div>
                




            

        <!-- <div class="content"> 
                <h2>我的票券</h2>
                <h3>尚未使用：設施</h3>
                
            <table border="2" cellpadding="20" style="border:2px #5F9EA0 solid">
                
                <tr><th>訂單編號</th><th>設施名稱</th><th>票種</th><th>張數</th><th>使用期限</th><th>入場出示QRcode</th></tr>
                <tr><th rowspan="3">FF171210</th><td>雲霄飛車</td><td>全票</td><td>一張</td><td>2018-12-01</td></tr> 
                <tr><td>雲霄飛車</td><td>半票</td><td>一張</td><td>2018-12-01</td></tr>
                <tr><td>飛入蟲洞</td><td>半票</td><td>一張</td><td>2018-12-01</td></tr>
                    
             </table>
        </div>


        <div class="content"> 
            <h3>尚未使用：劇院</h3>
            <table border="1" cellpadding="20" style="border:2px #5F9EA0 solid">
                <tr><th>訂單編號</th><th>節目名稱</th><th>張數</th><th>場次時間</th><th>入場出示QRcode</th></tr>
                <tr><th >FF171201</th><td>科幻劇</td><td>10</td><td>2018-12-01</td></tr> 
             </table>
        </div>

        <div class="content"> 
            <h3>歷史票卷</h3>
            <table border="1" cellpadding="20" style="border:2px #5F9EA0 solid">
                <tr><th rowspan="3">FF171201</th><td>雲霄飛車</td><td>全票</td><td>一張</td><td>2018-12-01</td></tr> 
                <tr><td>雲霄飛車</td><td>半票</td><td>一張</td><td>2018-12-01</td></tr>
                <tr><td>飛入蟲洞</td><td>半票</td><td>一張</td><td>2018-12-01</td></tr>
                <tr><th rowspan="2">FF171201</th><td>雲霄飛車</td><td>全票</td><td>一張</td><td>2018-12-01</td></tr> 
                <tr><td>雲霄飛車</td><td>半票</td><td>一張</td><td>2018-12-01</td></tr>
                
             </table>
        </div> -->




</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/page_load_unload.js"></script>
<script src="js/00nav.js"></script>
<script type="text/javascript">
window.addEventListener("load",show_member_info);
function show_member_info(){
    // 連線資料庫取得會員資料
    var storage = localStorage;
    var mem_id = storage.getItem("mem_id");
    var xhr = new XMLHttpRequest();
    xhr.onload = function (){
    if( xhr.status == 200){ //OK
        //show會員資料
        $(".mem_nick").html(xhr.responseText.split("/")[0]);
        $(".mem_mail").html(xhr.responseText.split("/")[1]);
        $(".mem_points").html(xhr.responseText.split("/")[2]);
        $(".mem_name").html(xhr.responseText.split("/")[3]);
        $(".mem_phone").html(xhr.responseText.split("/")[5]);
        }
    }
    var url = "show_member_info.php?mem_id=" + mem_id;
    xhr.open("get",url, true);
    xhr.send(null);
};

    // 載入時執行函式
    window.addEventListener("load", myFunction);

    function myFunction(){
        // 載入時執行函式將 nameBox加入一個 id 叫 rotate。
        document.getElementsByClassName("nameBox")[0].setAttribute("id","rotate");

        // 載入時bar的寬度長為100%
        document.getElementsByClassName("bar")[0].style.width="100%";
        // 載入時table的高度長為100%
        document.getElementsByClassName("table")[0].style.height="100%";
    }


</script>


</body>
</html>