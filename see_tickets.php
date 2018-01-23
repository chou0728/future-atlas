

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
    <title>設施票券</title>
    <link rel="stylesheet" href="css/see_tickets.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/login.css">	
    <!-- <script src="js/see_tickets.js"></script> -->
    
    <style>
    body{
            
            background:#000;       
    }
    </style>
</head>

<body>
    <!-- header -->
    <body class="fadeout">
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
            <div class="tickets_area">
                <h2>設施票券</h2>

                <?php
                   
                    
                    try {
                        require_once("connectBooks.php");
                        $sql = "SELECT c.facility_name,b.order_date,a.facility_no,a.comment_status,a.order_no,(a.full_fare_num - a.full_fare_num_used) full_remain,(a.half_fare_num-a.half_fare_num_used) half_remain,a.full_fare_num_used,a.half_fare_num_used
                        FROM facility_order_item a JOIN facility_order b ON a.order_no = b.order_no JOIN facility c ON a.facility_no = c.facility_no
                        WHERE a.mem_id = ?";
                        $order_item_PDO = $pdo->prepare($sql);
                        $order_item_PDO->bindValue(1,$_SESSION["mem_id"]); 
                        $order_item_PDO->execute();
                        $order_item = $order_item_PDO->fetchAll(PDO::FETCH_ASSOC);

                        foreach( $order_item as $i=>$order_item_row){
                        
                        
                ?>


                <div class="tickets">
                    <!-- 設施QR code要帶1.訂單編號 2.設施編號 3.會員ID-->
                    <img class="QR_code" src="https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=http://140.115.236.72/demo-projects/BD103/BD103G3/back_check_facility_tickets.php?<?php echo $order_item_row["order_no"] ?>.<?php echo $order_item_row["facility_no"] ?>.<?php echo $_SESSION["mem_id"] ?>"></img>
                    <div class="ticket_info">
                        
                        <p>設施名稱：
                            <span class="faci_name"><?php echo $order_item_row["facility_name"] ?></span>
                        </p>
                        <p>購買日期：
                            <span class="date"><?php echo $order_item_row["order_date"] ?></span>
                        </p>
                        <p>訂單編號：
                            <span class="order_num"><?php echo $order_item_row["order_no"] ?></span>
                        </p>
                        <p>未使用：
                            <span class="unused"><?php echo $order_item_row["full_remain"] + $order_item_row["half_remain"] ?>張</span>　已使用：
                            <span class="used"><?php echo $order_item_row["full_fare_num_used"] + $order_item_row["half_fare_num_used"] ?>張</span>
                        </p>
                        <div class="button_area">
                            <a class="more_info" href="facility_tickets_detail.php?order_no=<?php echo $order_item_row["order_no"] ?>&facility_no=<?php echo $order_item_row["facility_no"] ?>">詳細資訊</a>
                            <a class="rate_faci" data-order-no="<?php echo $order_item_row["order_no"] ?>" data-facility-no="<?php echo $order_item_row["facility_no"] ?>" data-comment-status="<?php echo $order_item_row["comment_status"] ?>">評價設施</a>



                        </div>

                    </div>
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

                    <!-- <iframe src="vaild_facility_tickets.html" frameborder="0" id="vaild_facility_tickets" name="vaild_facility_tickets"></iframe> -->
            </div>
            <div class="tickets_area">
                <h2>劇場票券</h2>

                <?php

                    
                    try {
                        require_once("connectBooks.php");
                        $sql = "SELECT b.program_name,b.program_no,c.session_no, c.time_date,c.session_time,a.theater_ticket_no,a.number_purchase,a.used_ticket
                                FROM theater_order_list a JOIN theater_program b ON a.program_no = b.program_no JOIN theater_session_list c ON a.session_no = c.session_no
                                WHERE a.mem_id = ?;";
                        $order_item_PDO = $pdo->prepare($sql);
                        $order_item_PDO->bindValue(1,$_SESSION["mem_id"]); //先寫死
                        $order_item_PDO->execute();
                        $order_item = $order_item_PDO->fetchAll(PDO::FETCH_ASSOC);

                        foreach( $order_item as $i=>$order_item_row){

                ?>



                    <div class="tickets">
                        <!-- 劇場QR code要帶1.票券編號 2.場次編號 3.節目編號 -->
                        <img class="QR_code" src="https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=http://140.115.236.72/demo-projects/BD103/BD103G3/back_check_theater_tickets.php?<?php echo $order_item_row["theater_ticket_no"] ?>.<?php echo $order_item_row["session_no"] ?>.<?php echo $order_item_row["program_no"] ?>"></img>
                        
                        <div class="ticket_info">
                            
                            <p>劇名：
                                <span class="program_name"><?php echo $order_item_row["program_name"] ?></span>
                            </p>
                            <p>演出時間：
                                <span class="perform_date"><?php echo $order_item_row["time_date"] ?></span>
                                <span class="perform_time">　<?php echo $order_item_row["session_time"] ?></span>
                            </p>
                            <p>票券編號：
                                <span class="theaterticket_no"><?php echo $order_item_row["theater_ticket_no"] ?></span>
                            </p>

                            <p>未使用：
                                <span class="unused"><?php echo $order_item_row["number_purchase"] ?>張</span>　已使用：
                                <span class="used"><?php echo $order_item_row["used_ticket"] ?>張</span>
                            </p>
                            <a class="more_info_theater" href="theater_tickets_detail.php?theater_ticket_no=<?php echo $order_item_row["theater_ticket_no"] ?>&session_no=<?php echo $order_item_row["session_no"] ?>&program_no=<?php echo $order_item_row["program_no"] ?>" >詳細資訊</a>
                        </div>
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

 <!-- <script src="js/00nav.js"></script> -->
<script>
window.onload = function(){


checkRateOrNot();


function checkRateOrNot(){

    var rate_faci = document.getElementsByClassName('rate_faci');

    for (let i = 0; i < rate_faci.length; i++){

        var comment_status = rate_faci[i].getAttribute('data-comment-status');
        

        if(comment_status==0){//尚未評價

            
            rate_faci[i].addEventListener('click',function(){ //click後連結至評價頁

                let order_no = this.getAttribute('data-order-no');
                let facility_no = this.getAttribute('data-facility-no');
                window.location  = "rate_facility.php?order_no="+ order_no + "&facility_no="+ facility_no;
                
            });


        }else{//已評價
            rate_faci[i].innerHTML = "已評價";
            rate_faci[i].addEventListener('click',function(){
               alert("您已評價過");
            })
        }


    }

}

};

</script>

</body>






</html>