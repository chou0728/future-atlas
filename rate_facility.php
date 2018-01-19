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
    <title>評價設施</title>
    <link rel="stylesheet" href="css/rate_facility.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <!-- header -->

    <div class="header">
        <ul class="ul_top">
            <li class="li_top">
                <a href="SignUp.html">註冊</a>
            </li>
            <li class="li_top">
                <a href="#" id="singUpBtn">登入</a>
            </li>
            <li class="li_top">
                <a href="input_cart.html">購物車</a>
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


    <!-- content -->

    <div class="wrapper">
        <div class="content">
            <div class="box info_area">
                <img src="/img/facilityInfo/sub_6365_LL.png" alt="宇宙雲霄飛車">
                <h2>設施名稱：宇宙雲霄飛車</h2>
            </div>
            <form class="box rate_area" action="#" method="get">
                <div class="rate_box stars">
               
                    <h2>給予評分</h2>
                    <fieldset class="rating">
                    <input type="radio" id="star5" name="rating" value="5" />
                    <label class="full" for="star5" title="五顆星"></label>

                    <!-- <input type="radio" id="star4half" name="rating" value="4 and a half" />
                    <label class="half" for="star4half" title="Pretty good - 4.5 stars"></label> -->

                    <input type="radio" id="star4" name="rating" value="4" />
                    <label class="full" for="star4" title="四顆星"></label>
<!-- 
                    <input type="radio" id="star3half" name="rating" value="3 and a half" />
                    <label class="half" for="star3half" title="Meh - 3.5 stars"></label> -->

                    <input type="radio" id="star3" name="rating" value="3" />
                    <label class="full" for="star3" title="三顆星"></label>

                    <!-- <input type="radio" id="star2half" name="rating" value="2 and a half" />
                    <label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label> -->

                    <input type="radio" id="star2" name="rating" value="2" />
                    <label class="full" for="star2" title="兩顆星"></label>

                    <!-- <input type="radio" id="star1half" name="rating" value="1 and a half" />
                    <label class="half" for="star1half" title="Meh - 1.5 stars"></label> -->

                    <input type="radio" id="star1" name="rating" value="1" />
                    <label class="full" for="star1" title="一顆星"></label>

                    <!-- <input type="radio" id="starhalf" name="rating" value="half" />
                    <label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label> -->
                </fieldset>
                </div>
                <div class="rate_box text_box">
                   <textarea name="rate_text" id="rate_text" cols="30" rows="10"></textarea>
                </div>
                <div class="rate_box buttons_box">
                    <input class="button" type="reset" name="reset" value="重填">
                    <input class="button" type="submit" name="submit" value="送出">

                </div>
            </form>
        </div>
    </div>
    <script src="js/00nav.js"></script>
    <!-- <script src="js/rate_facility.js"></script> -->

</body>

</html>