<?php
ob_start();
session_start();
//請複製:當無登入時會自動跳轉至登入頁面



if(!isset($_SESSION["login_success"])){
    header("location:manager_login.php");
    exit;
}
   
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FA後台管理系統 | 劇場驗票</title>
    <link rel="icon" href="img/favicon_back.ico" />
    <link rel="stylesheet" type="text/css" href="css/RESET.css">
    <link rel="stylesheet" type="text/css" href="css/11back_nav.css">
    <link rel="stylesheet" type="text/css" href="css/check_theater_tickets.css">

</head>

<body>
    <!-- ==== header ==== -->

    <!-- ==== header ==== -->
    <header>
        <img src="img/back_menu_default.png" id="ham">
        <h1 class="logo">
            <img src="img/LOGO.png" alt="FA">
            <span>後台管理系統</span>
        </h1>
        <ul class="nav">
            <li class="navList">
                <a href="back_check_facility_tickets.php">設施驗票 </a>
                <span class="listcover"></span>
            </li>
            <li class="navList">
                <a href="back_check_theater_tickets.php" style="color: black;">劇場驗票</a>
                <span class="listcover" style="width: 100%;background-color: rgba(90, 230, 219,0.9);"></span>
            </li>
            <li class="navList">
                <a href="back_facilityM.php">設施管理</a>
                <span class="listcover"></span>

            </li>
            <li class="navList">
                <a href="back_TheaterMang.php">劇場管理</a>
                <span class="listcover"></span>
            </li>
            <li class="navList">
                <a href="back_activity.php">活動管理</a>
                <span class="listcover"></span>
            </li>
            <li class="navList">
                <a href="back_member.php">會員管理</a>
                <span class="listcover"></span>
            </li>
            <li class="navList">
                <a href="">諮詢管理</a>
                <span class="listcover"></span>
            </li>
            <li class="navList" <?php if($_SESSION[ "top_manager"]==0) { echo "style='display:none;'"; } ?>>
                <a href="back_management_authority.php">權限管理</a>
                <span class="listcover"></span>
            </li>
        </ul>
    </header>
    <div class="loginBox mobileLoginBox">
        <span id="hello">您好!</span>
        <span id="managerId">
            <?php
        			if($_SESSION["top_manager"] == 1){
						echo "最高管理員";
					}else{
						echo "管理員";
					}
				?>
        </span>
        <span id="managerName">
            <?php echo $_SESSION["manager_name"]; ?>
        </span>
        <a href="manager_logout.php">登出</a>
    </div>


    <!-- === content ==== -->
    <div class="b_content">
        <div id="check_tickets" class="tabcontent check_tickets_wrapper">
            <div class="content">
                <div class="info theater_info">

                    <!-- 用完跳出的遮罩 -->
                    <div id="used_up">
                        <span>已全數用盡</span>
                    </div>

                    <h2>節目名稱：
                        <span id="program_name"></span>
                    </h2>

                    <div class="photo" id="program_photo">
                    </div>

                    <div class="select_amount">
                        <div>
                            <span>可用：</span>
                            <input id="remain_num" type="number" min="0">
                            <span>張</span>
                        </div>
                    </div>
                    <div class="button_area">
                        <button id="submit">確定註記</button>
                        <button id="reset">重選數量</button>
                    </div>


                </div>
                <div class="info tickets_info">

                    <h2>票券資訊</h2>
                    <div class="info_used_record" id="used_record">

                        <div class="number">
                            <h3>票券編號：
                                <span id="theater_ticket_no"></span>
                            </h3>
                            <h3>場次編號：
                                <span id="session_no"></span>
                            </h3>
                        </div>

                        <div class="time">
                            <h3>日期：
                                <span id="program_date"></span>

                            </h3>
                            <h3>時間：
                                <span id="program_time"> </span>
                            </h3>
                        </div>
                        <div class="records_info">

                            <h3>未用票券：
                                <span id="unused_num">1</span>　張</h3>
                            <h3>已用票券：
                                <span id="used_num">1</span>　張</h3>

                        </div>



                    </div>


                </div>
            </div>
        </div>

        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

        <script>
            window.addEventListener('load', initial);

            function initial() {

                var used_record = document.getElementById('used_record');
                var submit = document.getElementById('submit');

                var input_remain = document.getElementById('remain_num');

                var program_name_span = document.getElementById('program_name');
                var program_photo_div = document.getElementById('program_photo');
                var theater_ticket_no_span = document.getElementById('theater_ticket_no');
                var session_no_span = document.getElementById('session_no');
                var program_date_span = document.getElementById('program_date');
                var program_time_span = document.getElementById('program_time');
                var unused_num_span = document.getElementById('unused_num'); //剩下的
                var used_num_span = document.getElementById('used_num');


                getURL();
                resetButton();
                submitButton();


                function getURL() { //到時候要帶值進url
                    var href = location.href;

                    
                    // href = href + '?1.9.1'; //第一個數字是theater_ticket_no，第二個為session_no，第三個為program_no

                    var index = href.indexOf('?'); //先判斷?的位置在哪(indexOf)
                    var key_str = href.substr(index + 1); //從index往後一個位置開始取字串到最後
                    var key_array = key_str.split("."); //將取回的字串分割成陣列
                    theater_ticket_no = key_array[0]; //讓order_no變成全域
                    session_no = key_array[1]; //讓facility_no變成全域
                    program_no = key_array[2];

                    theater_ticket_no_span.innerHTML = theater_ticket_no;
                    session_no_span.innerHTML = session_no;

                    localStorage.setItem('theater_ticket_no', theater_ticket_no);
                    localStorage.setItem('session_no', session_no);
                    localStorage.setItem('program_no', program_no);


                    getOrder();




                };

                function getOrder() {

                    var xhr = new XMLHttpRequest();


                    xhr.onload = function () {


                        if (xhr.status == 200) {

                            //將json轉成物件並取得資料
                            var order_item = JSON.parse(xhr.responseText);

                            console.log(order_item);

                            var program_name = order_item.program_name.trim(); //節目名稱
                            var photo = order_item.program_photo.trim(); //節目照片
                            var photo_url = 'img/theater_page/' + photo.trim(); //節目照片url
                            var number_purchase = parseInt(order_item.number_purchase); //原始購買張數
                            var used_ticket = parseInt(order_item.used_ticket); //已使用的張數
                            var time_date = order_item.time_date.trim(); //演出日期
                            var session_time = order_item.session_time.trim(); //演出時間


                            //算出剩餘票數
                            remain_num = number_purchase - used_ticket;

                            //將資料放入節點中
                            program_name_span.innerHTML = program_name; //節目名稱
                            program_photo_div.style.backgroundImage = "url(" + photo_url + ")"; //節目照片
                            input_remain.value = remain_num; //可註記張數
                            input_remain.setAttribute('max', remain_num);
                            program_date_span.innerHTML = time_date; ///演出日期
                            program_time_span.innerHTML = session_time; //演出時間
                            unused_num_span.innerHTML = remain_num; //未使用(剩餘)
                            used_num_span.innerHTML = used_ticket; //已使用
                            usedUp();
                            recordInitialAmount();

                        } else {
                            alert(xhr.status);
                        }

                    }
                    var theater_ticket_no = localStorage.getItem('theater_ticket_no');
                    var session_no = localStorage.getItem('session_no');
                    var program_no = localStorage.getItem('program_no');

                    var url = "fetch_from(theater_order_list).php?theater_ticket_no=" + theater_ticket_no +
                        "&session_no=" +
                        session_no + "&program_no=" + program_no;
                    xhr.open("Get", url, true);
                    xhr.send(null);

                    function recordInitialAmount() {
                        remain_num = document.getElementById('remain_num');
                        initial_remain_num = remain_num.value;
                        

                    }; //recordInitialAmount() 



                }; //getOrder()


                function usedUp() {
                    var used_up = document.getElementById('used_up');
                    if (input_remain.value == 0) {
                        used_up.style.display = "block";

                    } else {
                        used_up.style.display = "none";
                    }
                } //usedUp()



                function updateOrder() {

                    var xhr2 = new XMLHttpRequest();
                    xhr2.onload = function () {


                        if (xhr2.status == 200) {


                            var message = xhr2.responseText;
                            alert(message);


                        } else {
                            alert(xhr2.status);
                        }

                    }

                    var origin_used_amount = used_num.innerHTML; //原本已經使用的張數
                    var now_want_used = document.getElementById('remain_num').value; //現在要註記的張數
                    var new_used = parseInt(origin_used_amount) + parseInt(now_want_used); //新的已使用張數



                    var theater_ticket_no = localStorage.getItem('theater_ticket_no');
                    var session_no = localStorage.getItem('session_no');
                    var program_no = localStorage.getItem('program_no');

                    var url = "update_order(theater_order_list).php?theater_ticket_no=" + theater_ticket_no +
                        "&session_no=" +
                        session_no +
                        "&program_no=" + program_no + "&now_used=" + new_used;
                    xhr2.open("Get", url, false); //false是指這個function要先做完才去做其他的function
                    xhr2.send(null);





                }; //updateOrder()

                function submitButton() {


                    submit.addEventListener('click', updateOrder);
                    submit.addEventListener('click', getOrder);

                    // function recored() {

                    //     var full = parseInt(full_num.value, 10);
                    //     var half = parseInt(half_num.value, 10);
                    //     var total = full + half;

                    //     //創造2個p節點
                    //     var p1 = document.createElement("p");
                    //     var p2 = document.createElement("p");
                    //     p1.innerHTML = "時間：2018/1/1 10:00　am";
                    //     p2.innerHTML = "註記張數：全票" + full + "張　半票" + half + "張　共" + total + "張";

                    //     //創造一個div節點，並給予class名稱
                    //     var records = document.createElement("div");
                    //     records.setAttribute('class', 'records');

                    //     //div節點加進去父層used_record_wrapper
                    //     used_record.appendChild(records);

                    //     //把2個p節點加進去父層div節點
                    //     records.appendChild(p1);
                    //     records.appendChild(p2);

                    // }

                }; //submitButton()




                function resetButton() {

                    //reset按下後重新抓回原始值
                    var reset = document.getElementById('reset');
                    reset.addEventListener('click', function () {
                        remain_num.value = initial_remain_num;
                    });

                }; //resetButton()








            } //initial()
        </script>


</body>

</html>