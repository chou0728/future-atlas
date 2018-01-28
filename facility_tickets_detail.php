
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
    <title>FA未來主題樂園 | 查看票券-設施票券明細</title>
    <link rel="icon" href="img/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="css/RESET.css">
    <link rel="stylesheet" href="css/vaild_facility_tickets.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/login.css">
   

</head>

<body>
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
            <img src="img/hover-tri.png" class="nav_hover">
            <a href="Theaterbuyticket.php">劇場購票</a>
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


    <!-- content -->
    
    
    <div class="wrapper">
    <div class="qr_back_cover"></div>
        <div class="content">
            <div class="info QR_info">

            <?php

                                
                try {
                    require_once("connectBooks.php");
                    $sql = "SELECT c.facility_no,c.facility_name,b.order_date,a.order_no,b.original_total,b.discount,a.subtotal,(a.full_fare_num - a.full_fare_num_used) full_remain,(a.half_fare_num-a.half_fare_num_used) half_remain,a.full_fare_num_used,a.half_fare_num_used,a.full_fare_num,a.half_fare_num
                    FROM facility_order_item a JOIN facility_order b ON a.order_no = b.order_no JOIN facility c ON a.facility_no = c.facility_no
                    WHERE a.mem_id = ? AND a.order_no =? AND a.facility_no = ?";
                    $order_item_PDO = $pdo->prepare($sql);
                    $order_item_PDO->bindValue(1,$_SESSION["mem_id"]);
                    $order_item_PDO->bindValue(2,$_REQUEST["order_no"]); 
                    $order_item_PDO->bindValue(3,$_REQUEST["facility_no"]);  
                    $order_item_PDO->execute();
                    $order_item = $order_item_PDO->fetchAll(PDO::FETCH_ASSOC);
                    
                    foreach( $order_item as $i=>$order_item_row){
            ?>




                <h2>設施名稱：<?php echo $order_item_row["facility_name"] ?></h2>
                <div class="info_ticket_QR">
                <div class="QR">                   
                    <img src="https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=http://140.115.236.72/demo-projects/BD103/BD103G3/back_check_facility_tickets.php?<?php echo $order_item_row["order_no"] ?>.<?php echo $order_item_row["facility_no"] ?>.<?php echo $_SESSION["mem_id"] ?>.ticket=faci"></img>
                    <div class="ticket_used_up">已全數用盡</div>
                </div>    
                    <div class="ticket_info">
                        
                        <p>購買日期：<?php echo $order_item_row["order_date"] ?></p>
                        <p>訂單編號：<?php echo $order_item_row["order_no"] ?></p>
                        <p>訂單總額：<?php echo $order_item_row["original_total"] ?></p>
                        <p>全票：<?php echo $order_item_row["full_fare_num"] ?>張　半票：<?php echo $order_item_row["half_fare_num"] ?>張　共<?php echo $order_item_row["full_fare_num"] + $order_item_row["half_fare_num"] ?>張</p>
                        
                    </div>
                </div>

            </div>
            <div class="info" id="info_last">
                <h2>使用狀況</h2>
                <div class="info_used_record">
                        <div class="records">
                            <h3>未使用票券</h3>
                            <div class="records_info">
                                <p>全票：<?php echo $order_item_row["full_remain"] ?>張<span>/</span></p>
                                <p>半票：<?php echo $order_item_row["half_remain"] ?>張<span>/</span></p>
                                <p class="unused">共：<?php echo $order_item_row["full_remain"] + $order_item_row["half_remain"] ?>張</p>
                            </div>
                            <h3>已使用張數</h3>
                            <div class="records_info">
                                <p>全票：<?php echo $order_item_row["full_fare_num_used"] ?>張<span>/</span></p>
                                <p>半票：<?php echo $order_item_row["half_fare_num_used"] ?>張<span>/</span></p>
                                <p>共：<?php echo $order_item_row["full_fare_num_used"] + $order_item_row["half_fare_num_used"] ?>張</p>
                            </div>
                        </div>
                         <a href="see_tickets.php" class="backbtn">回到查看票券</a>
                </div>
            

                <?php
                    }

                    } catch (PDOException $e) {
                        echo "錯誤原因 : " , $e->getMessage() , "<br>";
                        echo "錯誤行號 : " , $e->getLine() , "<br>";
                    }
                ?>




            </div>
        </div>
    </div>

    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/00nav.js"></script>
    <script>

// window.onload = function(){



 //    var screen_width = document.documentElement.clientWidth;

 //            if (screen.width <= 414){
 //                scaleQR();
 //            };

            
 //            function scaleQR(){
 //                $('.QR').on('click',function(){
 //                    $(this).toggleClass('is-large');
 //                    $('.qr_back_cover').toggleClass('is-cover');
 //                    $('body').toggleClass('stop-scrolling');
 //                });
 //            }



 // };

 window.addEventListener('load',checkUsedUp);

        
        
        function checkUsedUp(){
            var unused_amount = document.getElementsByClassName('unused');
              var ticket_used_up = document.getElementsByClassName('ticket_used_up');
              for (let i = 0; i < unused_amount.length; i++){

                    if(unused_amount[i].innerHTML == "共：0張"){//用盡後不給放大
                        ticket_used_up[i].style.display = "block";
                        
                    }else{
                        init_ftd();
                    }


            }
        }

        function init_ftd(){
            var QR_code = document.getElementsByClassName("QR")[0];
                 QR_code.addEventListener('click',function(){
                    if(this.id !="QR"){
                        this.setAttribute("id","QR");
                    }else{
                        this.setAttribute("id","");
                    }
            });


        }
        


        
        
    </script>
</body>

</html>