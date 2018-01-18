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
    <title>設施票券明細</title>
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

            <?php

                                
                try {
                    require_once("connectBooks.php");
                    $sql = "SELECT c.facility_no,c.facility_name,b.order_date,a.order_no,b.original_total,b.discount,a.subtotal,(a.full_fare_num - a.full_fare_num_used) full_remain,(a.half_fare_num-a.half_fare_num_used) half_remain,a.full_fare_num_used,a.half_fare_num_used,a.full_fare_num,a.half_fare_num
                    FROM facility_order_item a JOIN facility_order b ON a.order_no = b.order_no JOIN facility c ON a.facility_no = c.facility_no
                    WHERE a.mem_id = ? AND a.order_no =? AND a.facility_no = ?";
                    $order_item_PDO = $pdo->prepare($sql);
                    $order_item_PDO->bindValue(1,$_COOKIE["mem_id"]);
                    $order_item_PDO->bindValue(2,$_COOKIE["order_no"]); 
                    $order_item_PDO->bindValue(3,$_COOKIE["facility_no"]);  
                    $order_item_PDO->execute();
                    $order_item = $order_item_PDO->fetchAll(PDO::FETCH_ASSOC);
                    
                    foreach( $order_item as $i=>$order_item_row){
            ?>




                <h2>設施名稱：<?php echo $order_item_row["facility_name"] ?></h2>
                <div class="info_ticket_QR">
                    
                    <img class="QR" src="https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=https://www.youtube.com/?<?php echo $order_item_row["order_no"] ?>.<?php echo $order_item_row["facility_no"] ?>"></img>
                    
                    <div class="ticket_info">
                        
                        <p>購買日期：<?php echo $order_item_row["order_date"] ?></p>
                        <p>訂單編號：<?php echo $order_item_row["order_no"] ?></p>
                        <p>訂單總金額：<?php echo $order_item_row["original_total"] ?></p>
                        <p>折扣金額：<?php echo $order_item_row["discount"] ?></p>
                        <p>折扣後總金額：<?php echo $order_item_row["subtotal"] ?></p>
                        <p>全票：<?php echo $order_item_row["full_fare_num"] ?>張　半票：<?php echo $order_item_row["half_fare_num"] ?>張　總計<?php echo $order_item_row["full_fare_num"] + $order_item_row["half_fare_num"] ?>張</p>
                    </div>
                </div>

            </div>
            <div class="info">
                <h2>使用狀況</h2>
                <div class="info_used_record">
                        <div class="records">
                            <h3>未使用票券</h3>
                            <div class="records_info">
                                <p>全票：<?php echo $order_item_row["full_remain"] ?>張</p>
                                <p>半票：<?php echo $order_item_row["half_remain"] ?>張</p>
                                <p>共：<?php echo $order_item_row["full_remain"] + $order_item_row["half_remain"] ?>張</p>
                            </div>
                            <h3>已使用張數</h3>
                            <div class="records_info">
                                <p>全票：<?php echo $order_item_row["full_fare_num_used"] ?>張</p>
                                <p>半票：<?php echo $order_item_row["half_fare_num_used"] ?>張</p>
                                <p>共：<?php echo $order_item_row["full_fare_num_used"] + $order_item_row["half_fare_num_used"] ?>張</p>
                            </div>
                        </div>
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