
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
    <title>FA未來主題樂園 | 查看票券-劇場票券明細</title>
    <link rel="icon" href="img/favicon.ico" />
    <link rel="stylesheet" href="css/vaild_theater_tickets.css">
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
        <a href="home.php" class="logo_a">
            <img src="img/LOGO.png" class="logo">
        </a>
        <ul class="ul_right">
            <li>
                <a href="home.php#page2" id="NavClose">園區地圖</a>
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



    <!-- content -->
    
    
    <div class="wrapper">
    <div class="qr_back_cover"></div>
        <div class="content">
            <div class="info QR_info">

            <?php

                                
                try {
                    require_once("connectBooks.php");
                    $sql = "SELECT b.program_name,a.order_date,a.theater_ticket_no,a.original_amount,a.points_discount,b.program_no,c.session_no, c.time_date,c.session_time,a.number_purchase,a.used_ticket,(a.number_purchase - a.used_ticket) remain_ticket,(a.original_amount - a.points_discount) subtotal
                    FROM theater_order_list a JOIN theater_program b ON a.program_no = b.program_no JOIN theater_session_list c ON a.session_no = c.session_no
                    WHERE a.mem_id = ? AND a.theater_ticket_no =? AND a.session_no = ? AND a.program_no = ?";
                    $order_item_PDO = $pdo->prepare($sql);
                    $order_item_PDO->bindValue(1,$_SESSION["mem_id"]);
                    $order_item_PDO->bindValue(2,$_REQUEST["theater_ticket_no"]); 
                    $order_item_PDO->bindValue(3,$_REQUEST["session_no"]);  
                    $order_item_PDO->bindValue(4,$_REQUEST["program_no"]); 
                    $order_item_PDO->execute();
                    $order_item = $order_item_PDO->fetchAll(PDO::FETCH_ASSOC);
                    
                    foreach( $order_item as $i=>$order_item_row){
            ?>




                <h2>節目名稱：<?php echo $order_item_row["program_name"] ?></h2>
                <div class="info_ticket_QR">
                    
                <img class="QR" src="https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=http://140.115.236.72/demo-projects/BD103/BD103G3/back_check_theater_tickets.php?<?php echo $order_item_row["theater_ticket_no"] ?>.<?php echo $order_item_row["session_no"] ?>.<?php echo $order_item_row["program_no"] ?>.ticket=theater"></img>
                    
                    <div class="ticket_info">
                        
                        
                        <p>購買日期：<?php echo $order_item_row["order_date"] ?> </p>
                        <p>訂單編號：<?php echo $order_item_row["theater_ticket_no"] ?></p>
                        <p>訂單總額：<?php echo $order_item_row["original_amount"] ?></p>
                        <p>票券數量：<?php echo $order_item_row["number_purchase"] ?>張</p>
                        <p>節目時間：<?php echo $order_item_row["time_date"] ?>　<?php echo $order_item_row["session_time"] ?></p>
                    </div>
                </div>

            </div>
            <div class="info" id="info_last">
                <h2>使用狀況</h2>
                <div class="info_used_record">
                        <div class="records">
                            <p>未使用：<?php echo $order_item_row["remain_ticket"] ?>張</p>
                            
                            <p>已使用：<?php echo $order_item_row["used_ticket"] ?>張</p>
                            
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
    window.onload = function(){



        var screen_width = document.documentElement.clientWidth;

                if (screen.width <= 414){
                    scaleQR();
                };

                
                function scaleQR(){
                    $('.QR').on('click',function(){
                        $(this).toggleClass('is-large');
                        $('.qr_back_cover').toggleClass('is-cover');
                        $('body').toggleClass('stop-scrolling');
                    });
                }



        };
    
    
    
    
    </script>
</body>

</html>