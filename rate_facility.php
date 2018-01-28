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
    <title>FA未來主題樂園 | 評價設施</title>
    <link rel="icon" href="img/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="css/RESET.css">
    <link rel="stylesheet" href="css/rate_facility.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                            echo "'register.php'";
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


    <!-- content -->

    <div class="wrapper">
        <div class="content">
            <div class="box info_area">


            <?php

                                
                try {
                    require_once("connectBooks.php");
                    $sql = "SELECT facility_name,facility_mphoto FROM facility  WHERE facility_no = ?;";
                    $order_item_PDO = $pdo->prepare($sql);
                    $order_item_PDO->bindValue(1,$_REQUEST["facility_no"]);  
                    $order_item_PDO->execute();
                    $order_item = $order_item_PDO->fetchAll(PDO::FETCH_ASSOC);
                    
                    foreach( $order_item as $i=>$order_item_row){
            ?>


                <img src="img/facilityInfo/<?php echo $order_item_row["facility_mphoto"] ?>">
                <h2>設施名稱：<?php echo $order_item_row["facility_name"] ?></h2>
            </div>
            
            <?php
                    }

                    } catch (PDOException $e) {
                        echo "錯誤原因 : " , $e->getMessage() , "<br>";
                        echo "錯誤行號 : " , $e->getLine() , "<br>";
                    }
            ?>





            <form class="box rate_area" action="update_rate.php" method="get">
                <div class="rate_box stars">
               
                    <h2>給予評分</h2>
                    <fieldset class="rating">
                    <input type="radio" id="star5" name="comment_grade" value="5" />
                    <label class="full" for="star5" title="五顆星"></label>


                    <input type="radio" id="star4" name="comment_grade" value="4" />
                    <label class="full" for="star4" title="四顆星"></label>


                    <input type="radio" id="star3" name="comment_grade" value="3" />
                    <label class="full" for="star3" title="三顆星"></label>


                    <input type="radio" id="star2" name="comment_grade" value="2" />
                    <label class="full" for="star2" title="兩顆星"></label>


                    <input type="radio" id="star1" name="comment_grade" value="1" />
                    <label class="full" for="star1" title="一顆星"></label>



                </fieldset>
                </div>

                <!-- 評價內容、評價時間帶過去php(直接用form) -->
                <div class="rate_box text_box">
                    <?php 
                   date_default_timezone_set('Asia/Taipei');
                   $now_time = date('Y-m-d H:i:s');
                   if(isset($_REQUEST["comment_content"])){ //如果存在
                        $comment_content = $_REQUEST["comment_content"];
                   }else{//如果不存在
                         $comment_content = "";
                   }    
                   ?>


                   <textarea name="comment_content" id="rate_text" cols="30" rows="10" placeholder="請留下您寶貴的意見或感想!"><?php echo $comment_content?></textarea>
                   
                   <input type="hidden" name="comment_timestamp" value="<?php echo $now_time?>">
                   <input type="hidden" name="order_no" value="<?php echo $_REQUEST["order_no"]?>">
                   <input type="hidden" name="facility_no" value="<?php echo $_REQUEST["facility_no"]?>">
                </div>
                <div class="rate_box buttons_box">
                    <input class="button" type="reset" name="reset" value="重填">
                    <input class="button" type="submit" name="submit" value="送出">

                </div>
            </form>
        </div>
    </div>
    <script src="js/00nav.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!-- <script src="js/rate_facility.js"></script> -->

    <script>
    $(document).ready(function(){

        


        $("input[name='submit']").on('click',function(){
            

            if (!$("input[name='comment_grade']:checked").val()) {//沒給評價分數
                
                alert('未給評價分數!');
            }else if(!$("#rate_text").val()){//沒給評價內容
               
                alert('未給評價內容!');
            }else{
                alert('評價成功　恭喜獲得10點積分! 可繼續評價其他設施');
            }


        });
       

    });
    
    
    </script>

</body>

</html>