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
    <title>Booking details</title>
    <link rel="stylesheet" type="text/css" href="css/RESET.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/Booking_details.css">
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <!--<script src="js/Booking_details.js"></script> -->
</head>

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
    <!-- header end-->

    <div class="container">
        <h1 class="Bookingh1">劇場購票明細</h1>
        <div class="memberinfosection">
            <h2 class="Bookingh2">會員資訊</h2>
            <div class="memberinfo">
            <?php 
                $mem_id =$_SESSION["mem_id"];
                require_once("php/connectBooks.php");
                $sql ="select * from member where mem_id=$mem_id";
                $member= $pdo->query( $sql );
                if( $member->rowCount()==0){
                    echo "<center>查無此會員資料</center>";
                }else{
                    $prodRow = $member->fetchObject();
                }
            ?>    
                <p>會員帳號:<?php echo $mem_id ?></p>
                <p>Email:<?php echo $prodRow->mem_mail?></p>
                <p>積分:<?php echo $prodRow->mem_points ?></p>
            </div>
        </div>

        <div class="orderlistsection">
            <h2 class="Bookingh2">購票明細</h2>
            <table>
                <tr>
                    <td>節目名稱</td>
                    <td id="program_name"></td>
                </tr>
                <tr>
                    <td>節目日期</td>
                    <td id="Time_date"></td>
                </tr>
                <tr>
                    <td>場次</td>
                    <td id="Time_Event"></td>
                </tr>
                <tr>
                    <td>數量</td>
                    <td id="unused_ ticket"></td>
                </tr>
                <tr>
                    <td>票價</td>
                    <td>500</td>
                </tr>
                <tr>
                    <td>小計</td>
                    <td id="unpoints_total"></td>
                </tr>
                <tr>
                    <td>
                        <input type="radio" name="Scorepoints" value="0" onchange="Userpoints()">不使用積分
                        <br>
                        <input type="radio" name="Scorepoints" value="1" checked onchange="Userpoints()">使用積分
                        <input type="text" id="Scorenumber" value="100" size=10 style="font-size:16px;" onchange="changeScoreNumber()">
                    </td>
                    <td style="padding-top: 40px;"id="integral"> 
                    </td>
                </tr>
                <tr>
                    <td>總計:</td>
                    <td id="total"></td>
                </tr>
            </table>
            <!-- <table>
                    <tr style="font-weight: bold;">
                        <td>節目名稱</td>
                        <td>節目日期</td>
                        <td>場次</td>
                        <td>數量</td>
                        <td>單價</td>
                        <td>小計</td>
                    </tr>
                    <tr>
                        <td id="program_name"></td>
                        <td id="Time_date"></td>
                        <td id="Time_Event"></td>
                        <td id="unused_ ticket"></td>
                        <td>500元</td>
                        <td id="unpoints_total"></td>
                    </tr>

                    <tr>
                        <td>目前積分:1000元</td>
                        <td colspan="2">
                            <input type="radio" name="Scorepoints" value="0" onchange="Userpoints()">不使用積分
                            <br>
                            <input type="radio" name="Scorepoints" value="1" checked onchange="Userpoints()">使用積分</td>
                        <td colspan="2" style="padding-top: 40px;">
                            <input type="text" id="Scorenumber" value="500" size=10 style="font-size:16px;" onchange="changeScoreNumber()">
                        </td>
                        <td style="padding-top: 40px;" id="integral"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>總計:</td>
                        <td id="total">
                        </td>
                    </tr>
                </table> -->
        </div>

        <h2 class="Bookingh2">輸入信用卡</h2>
        <div class="creditCardinfo">
            <p>信用卡號碼</p>
            <p style="font-size:10px;">
                <input type="text" style="width:50px;" id="Card1" class="inputs" maxlength="4" onchange="creditCard()"  onkeyup="this.value=this.value.replace(/[^0-9]/g,'')">-
                <input type="text" style="width:50px;" id="Card2" class="inputs" maxlength="4"  onchange="creditCard()"  onkeyup="this.value=this.value.replace(/[^0-9]/g,'')">-
                <input type="text" style="width:50px;" id="Card3" class="inputs" maxlength="4"  onchange="creditCard()"  onkeyup="this.value=this.value.replace(/[^0-9]/g,'')">-
                <input type="text" style="width:50px;" id="Card4" class="inputs" maxlength="4"  onchange="creditCard()"  onkeyup="this.value=this.value.replace(/[^0-9]/g,'')">
            </p>
            <p>到期日</p>
            <p style="font-size:5px;">
                <input type="text" style="width:40px;"  maxlength="2" class="inputs" onchange="creditCard()" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')"> /
                <input type="text" style="width:40px;"  maxlength="2" class="inputs" onchange="creditCard()" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')">
            </p>
            <!-- size是設定input大小 -->
            <p>驗證碼</p>
            <p>
                <input type="text" style="width:40px;"  maxlength="3"  onchange="creditCard()" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')">
            </p>
        </div>

        <div class="yesmodifyBtn">
            <a href="buyTTicket.php">上一步</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="javascript: return false;" id="Checked" onclick="ajax_post()">結帳</a>   
        </div>
    </div>

    <!-- 測試傳到php -->
    <!-- <button  onclick="ajax_post()">php</button> -->
    
    <!-- 顯示資料有到php -->
    <div id="status" style="color:white;"> 
    </div>
    

    <script type="text/javascript">
      

        var storage = sessionStorage;
        //儲存信用卡資訊
        var CardInfo;

        //從sessionStorage，取出節目名稱
        var programName = storage.getItem('programName');
        document.getElementById('program_name').innerText = programName;

        //從sessionStorage，取出節目日期
        var programDate = storage.getItem('programDate');
        document.getElementById('Time_date').innerText = programDate;

        //從sessionStorage，取出節目場次
        var programTime = storage.getItem('programTime');
        document.getElementById('Time_Event').innerText = programTime;

        //從sessionStorage，取出數量
        var theater_quantity = storage.getItem('theater_quantity');
        document.getElementById('unused_ ticket').innerText = theater_quantity;

        //從sessionStorage，取出小計
        var theater_total = storage.getItem('theater_total');
        document.getElementById('unpoints_total').innerText = theater_total + "元";

        //取出使用者輸入的積分
        var Scorenumber = Number(document.getElementById('Scorenumber').value);

       

        //id是integral的欄位之預設值
        document.getElementById('integral').innerHTML = "-" + Scorenumber + "元";

        //小計減掉積分,應付金額
        total = theater_total - Scorenumber;
        document.getElementById('total').innerHTML = total + "元";

        //判斷是否使用積分
        function Userpoints() {
            var Scorepoints = document.querySelector('input[name="Scorepoints"]:checked').value;
            if (Scorepoints == 1) {
                //關閉使用者可以輸入的欄位(id是userpoints)
                document.getElementById('Scorenumber').disabled = false;
                var Scorenumber = Number(document.getElementById('Scorenumber').value);
                //id是integral的欄位之預設值
                document.getElementById('integral').innerHTML = "-" + Scorenumber + "元";
            } else {
                //讓使用者不能輸入
                document.getElementById('Scorenumber').value = 0;
                //直接改成0元
                document.getElementById('integral').innerHTML = 0 + "元";
                //關閉使用者可以輸入的欄位(id是userpoints)
                document.getElementById('Scorenumber').disabled = true;
            }
        }

        //扣掉積分
        //抓取回會員積分
        var totalScoreNumber = <?php echo $prodRow->mem_points ?>;
        function changeScoreNumber() {
            var theater_total = storage.getItem('theater_total');

            var Scorenumber = Number(document.getElementById('Scorenumber').value);
            if(Scorenumber<0){
                Scorenumber= 0;
                document.getElementById('Scorenumber').value="0";
            }
            if(Scorenumber>totalScoreNumber){
                alert("超出你的積分，請重新輸入積分");
                document.getElementById('Scorenumber').value=totalScoreNumber;
               Scorenumber = totalScoreNumber;
            }
            //值要連動到id是integral的欄位
            document.getElementById('integral').innerHTML = "-" + Scorenumber + "元";

            //小計減掉積分,應付金額
            total = theater_total - Scorenumber;
            document.getElementById('total').innerHTML = total + "元";
        }
        //自動跳下一個欄位
        $(".inputs").keyup(function () {
            if (this.value.length == this.maxLength) {
              $(this).next('.inputs').focus();
            }
        });
        //儲存信用卡號碼
        function  creditCard(){
            
            CardInfo = document.getElementById('Card1').value+"-";
            CardInfo += document.getElementById('Card2').value+"-";
            CardInfo += document.getElementById('Card3').value+"-";
            CardInfo += document.getElementById('Card4').value;
            // CardInfo += document.getElementById('Card5').value+"-";
            // CardInfo += document.getElementById('Card6').value+"-";
            // CardInfo += document.getElementById('Card7').value+"-";
            storage.setItem("CardInfo", CardInfo);    
        }
        var localstorage = localStorage;
        var mem_id = localstorage.getItem("mem_id");
        //資料傳送到php
        function ajax_post(){
            // Create our XMLHttpRequest object
            //產生XMLHttpRequest物件
            
            var hr = new XMLHttpRequest();
            // Create some variables we need to send to our PHP file
            //把 vars裡面資輛傳到my_parse_file.php檔案(設定參數)
            var url = "php/my_parse_file.php";
            var vars = "mem_id=" + mem_id+
                       "&programName="+programName+
                       "&programDate="+programDate+
                       "&programTime="+programTime+
                       "&theater_quantity="+theater_quantity+
                       "&theater_total="+theater_total+
                       "&Scorenumber="+Scorenumber+
                       "&CardInfo="+ CardInfo;
            //利用POST方式傳遞
            // open() 的第一個參數是 HTTP request 的方法
            //第二個參數是請求頁面的 URL
            //第三個參數決定此 request是否不同步進行，
            //如果設定為 TRUE則即使伺服器尚未傳回資料也會繼續執行其餘的程式
            hr.open("POST", url, true);
            //setRequestHeader()設定內容類型
            //若發送表單類型資料，必須設置請求標頭'Content-Type'為'application/x-www-form-urlencoded'
            hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            // Access the onreadystatechange event for the XMLHttpRequest object
            //註冊callback function
            //200 OK
            hr.onreadystatechange = function() {
                if(hr.readyState == 4 && hr.status == 200) {
                    var return_data = hr.responseText;
                    // document.getElementById("status").innerHTML = return_data;
                    
                    alert(return_data);
                    setTimeout(function(){
                        console.log('Hi...');
                        location.href="MembersOnly.html";
                    },2000)
                }
            }
            // Send the data to PHP now... and wait for response to update the status div
            //送出資料
            //send() 的參數在以 POST 發出 request 時，可以是任何想傳給伺服器的東西
            hr.send(vars); // Actually execute the request
            //顯示目前狀態(還在連線中)
            document.getElementById("status").innerHTML = "processing...";
        }
    </script>
    <!-- 導覽列 -->
    <script src="js/00nav.js"></script>
</body>

</html>