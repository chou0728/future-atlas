<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/RESET.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/BookingDone.css">
    <title>BookingDone</title>
    
</head>

<body>
   <!-- header -->
    <div class="header">
        <ul class="ul_top">
            <li class="li_top">
                <a href="SignUp.html" id="registerUser">註冊</a>
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
    
    <div class="container">
        <h1 class="Bookingh1">劇場訂票明細<br>(購買成功)</h1>
        <h2 class="Bookingh2">會員資訊</h2>
        <div class="memberinfo">
            <p>帳號:Leon wang</p>
            <p>Email:Leon wang@gmail.com</p>
        </div>

        <h2 class="Bookingh2">訂單訊息</h2>
        <div class="orderinfo">
            <p>訂票編號:CXXXXXXX</p>
            <p>訂票日期:
                <span id="orderdate"></span>
            </p>
        </div>
        <!-- <table font-weight: bold;>
            <tr>
                <td>訂票日期:</td>
                <td id="orderdate"></td>
            </tr>
        </table> -->
        <div class="orderlistsection">
            <h2 class="Bookingh2">訂票明細</h2>
            <table>
                <tr>
                    <td>節目名稱</td>
                    <td id="program_name">尋找星球</td>
                </tr>
                <tr>
                    <td>節目日期</td>
                    <td id="Time_date">xxxx-xx-xx</td>
                </tr>
                <tr>
                    <td>場次</td>
                    <td id="Time_Event">xx:xx</td>
                </tr>
                <tr>
                    <td>數量</td>
                    <td id="unused_ ticket">xx</td>
                </tr>
                <tr>
                    <td>單價</td>
                    <td>500</td>
                </tr>
                <tr>
                    <td>小計</td>
                    <td id="unpoints_total">xx</td>
                </tr>
                <tr>
                    <td>
                        <input type="radio" name="Scorepoints" value="0" onchange="Userpoints()">不使用積分
                        <br>
                        <input type="radio" name="Scorepoints" value="1" checked onchange="Userpoints()">使用積分
                        <!-- <input type="text" id="Scorenumber" value="500" size=10 style="font-size:16px;" onchange="changeScoreNumber()"> -->
                    </td>
                    <td style="padding-top: 40px;" id="integral">xx
                    </td>
                </tr>
                <tr>
                    <td>總計:</td>
                    <td id="total">xx</td>
                </tr>
            </table>
        </div> 
    </div>
    
    <script src="js/00nav.js"></script>
    <script>
        var now = new Date();
        var year = now.getFullYear();
        var month = now.getMonth() + 1; // getMonth() is zero-based
        var day = now.getDate();
        // var date= now.getYear() + "-" + now.getMonth() + "-" + now.getDate();
        document.getElementById('orderdate').innerText = year + "-" + month + "-" + day;
    </script>
</body>

</html>