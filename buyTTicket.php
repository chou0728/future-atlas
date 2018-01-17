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
    <link rel="stylesheet" type="text/css" href="css/RESET.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>						
    <link rel="stylesheet" type="text/css" href="css/login.css">								 
    <link rel="stylesheet" href="css/buyTTicket.css" />
    <script src="js/sessionStorage.js"></script>
    <title>buyTTicket</title>
</head>
<body>
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
    <!-- header end-->
    
    <!-- 購買票劵 -->
    <div class="buyticketarea">
       <!--  <h2>購買票劵</h2> -->
        <h2 class="verticalh2">購買票劵</h2>
        <form name="form" action="" method="get">  
            <table>
                <tr>
                    <td>節目名稱</td>
                    <td>
                        <input type="radio" name="programName" value="尋找星生命" checked onchange="changeTheaterName()">尋找星生命
                        <br>
                        <input type="radio" name="programName" value="末世決戰" onchange="changeTheaterName()">末世決戰
                    </td>
                </tr>
                <tr>
                    <td>節目日期</td>
                    <td>
                      <!-- <input type="date" id="programDate" name="programdate" required onchange="changeDate()" style="font-size:23px;">-->
    				 <select id="theater1" onchange="changeDate()" style="font-size:23px;">
    					<option>尋找星生命</option>
    				 </select>
    				 <select id="theater2" onchange="changeDate()" style="font-size:23px;">
    					<option>末世決戰</option>
    				 </select>				  
                    </td>
                </tr>
                <tr>
                    <td>場次</td>
                    <td>
                        <select id="programTime" onchange="changeEvent()" style="width:140px; font-size:23px;">
                            <option value="場次">場次</option>
                            <option value="11:00">11:00</option>
                            <option value="14:00">14:00</option>
                            <option value="15:00">15:00</option>
                            <option value="19:00">19:00</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>票價</td>
                    <td>500元</td>
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
                        500元
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div class="buyTTicketBtn">
            <a href="Theaterbuyticket.php" class="Previouspage">上一步</a>
            <a href="javascript: return false;" onclick="checkLogin()" class="buyticket">確認購買</a>
    </div>
    <!-- 會員登入燈箱 -->
    <div id="all-page"></div><!-- 叫出時背景-->
    <div id="lightBox">
    <div id="cancel">
        <div class="leftLine"></div>
        <div class="rightLine"></div>
    </div>
        
        <form class="singUp" action="loginheadforindex.php" method="post">
            <h2>會員登入</h2>
            <div class="text">
                會員帳號：<input type="text" name="memName" id="memId" value="" required placeholder="輸入帳號">
                <br>
                會員密碼：<input type="password" name="memPsw"  id="memPsw" value="" required placeholder="輸入密碼">
                <br>
            </div>
            <div class="btn">
                <input type="submit" name="" id="submit" value="登入">
                <input type="reset" name="reset" value="RESET">
            </div>
        </form>
</div>
    <script src="js/00nav.js"></script>
    <script type="text/javascript">
            window.onload=function (){
                var storage = localStorage;
                    storage.setItem("mem_id",<?php if(isset($_SESSION["mem_id"])===true){echo $_SESSION["mem_id"];}else{echo "0";} ?>);
            };
    </script>
</html>