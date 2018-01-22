<?php
ob_start();
session_start();
//請複製:當無登入時會自動跳轉至登入頁面
if(isset($_SESSION["login_success"])==false){
    header("location:manager_login.php");
    exit;
}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FA 後台</title>
    <link rel="stylesheet" type="text/css" href="css/RESET.css">
    <link rel="stylesheet" type="text/css" href="css/11back_nav.css">
    <link rel="stylesheet" href="css/check_tickets_facility.css">
    <link rel="stylesheet" href="css/choose_facility.css">
    <link rel="stylesheet" href="css/choose_facility_rwd.css">
</head>

<body>
    <!-- ==== header ==== -->
    <header>
        <img src="img/back_menu_default.png" id="ham">
        <h1 class="logo">
            <img src="img/LOGO.png" alt="FA">
            <span>後台管理系統</span>
        </h1>
        <ul class="nav">
            <li class="navList">
                <a href="back_check_facility_tickets.php"  style="color: black;">設施驗票 </a>
                <span class="listcover"  style="width: 100%;background-color: rgba(90, 230, 219,0.9);"></span>
            </li>
            <li class="navList">
                <a href="back_check_theater_tickets.php">劇場驗票</a>
                <span class="listcover"></span>
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
            <li class="navList"<?php
            	if($_SESSION["top_manager"]==0) {
					echo "style='display:none;'";
				}
			?>>
                <a href="back_management_authority.php">權限管理</a>
                <span class="listcover"></span>
            </li>
        </ul>
    </header>
    <div class="loginBox mobileLoginBox">
        <span id="hello">您好!</span>
        <span id="managerId"><?php
        			if($_SESSION["top_manager"] == 1){
						echo "最高管理員";
					}else{
						echo "管理員";
					}
				?></span>
        <span id="managerName"><?php echo $_SESSION["manager_name"]; ?></span>
        <a href="manager_logout.php">登出</a>
    </div>
    <!-- === content ==== -->
    <div class="back_wrapper_right">
        <div class="b_content">
            <!-- nav -->
            <!-- <div class="b_sub_nav">
                <a href="javascript:void(0)" class="b_sn_btn" id="active">選擇所在設施</a>
                <a href="javascript:void(0)" class="b_sn_btn"> 設施驗票</a>
            </div> -->
            <!-- ============== 選擇所在設施 ============== -->
            <!-- <div id="choose_facility" class="tabcontent choose_facility_wrapper">
                <h1>選擇所在設施</h1>
                <div class="content">
                    <div class="icon_wrapper">
                        <a class="facility_icon facility_01" data-title="宇宙雲霄飛車" data-facility="roller_coaster">
                            <p class="facility_name">宇宙雲霄飛車</p>
                        </a>
                        <a class="facility_icon facility_02" data-title="AAA設施" data-facility="">
                            <p class="facility_name">宇宙雲霄飛車</p>
                        </a>
                        <a class="facility_icon facility_03" data-title="BBB設施" data-facility="">
                            <p class="facility_name">宇宙雲霄飛車</p>
                        </a>
                    </div>
                    <div class="icon_wrapper">
                        <a class="facility_icon facility_04" data-title="CCC設施" data-facility="">
                            <p class="facility_name">宇宙雲霄飛車</p>
                        </a>
                        <a class="facility_icon facility_05" data-title="DDD設施" data-facility="">
                            <p class="facility_name">宇宙雲霄飛車</p>
                        </a>
                        <a class="facility_icon facility_06" data-title="EEE設施" data-facility="">
                            <p class="facility_name">宇宙雲霄飛車</p>
                        </a>
                    </div> -->
            <!-- ========== 點選後顯示所在設施 ========== -->
            <!-- <div class="show_where_now">
                        <img src="" id="show_where_photo">
                        <button id="rechoose">重選設施</button>
                    </div>
                </div>
            </div> -->


            <!-- 設施驗票 -->

            <div id="check_tickets" class="tabcontent check_tickets_wrapper">
                <div class="content">

                    <div class="info used_facility_info">
                        <div id="used_up">
                            <span>已全數用盡</span>
                        </div>

                        <h2>設施名稱：
                            <span id="faci_name"></span>
                        </h2>
                        <div class="photo" id="faci_photo">
                        </div>
                        <div class="select_amount">
                            <div>
                                <span>全票：</span>
                                <input id="full_num" type="number" min="0">
                                <span>張</span>
                            </div>
                            <div>
                                <span>半票：</span>
                                <input id="half_num" type="number" min="0">
                                <span>張</span>
                            </div>
                        </div>
                        <div class="button_area">
                            <button id="submit">確定註記</button>
                            <button id="reset">重選數量</button>
                        </div>
                    </div>
                    <div class="info">
                        <h2>票券資訊</h2>
                        <div class="info_used_record" id="used_record">
                            <div class="records">
                                <h3>訂單編號：1</h3>
                                <h3>未使用票券</h3>
                                <div class="records_info">
                                    <p>全票：<span id="unused_full"></span>張</p>
                                     <p>半票：<span id="unused_half"></span>張</p>
                                     <p>共：<span id="unused_sum"></span>張</p>
                                </div>
                                <h3>已使用張數</h3>
                                <div class="records_info">
                                    <p>全票：<span id="used_full"></span>張</p>
                                     <p>半票：<span id="used_half"></span>張</p>
                                    <p>共：<span id="used_sum"></span>張</p>
                                </div>
                                
                                
                            </div>
                            <!-- <div class="records">
                                <p>時間：2018/1/1 10:00　am</p>
                                <p>註記張數：全票1張 半票1張　共2張</p>
                                <p>註記人員：李小明</p>
                            </div> -->
                        </div>
                    </div>
                    <!-- <div id="light_box_back">

                    </div>
                    <div id="light_box">
                        <div class="check_info">
                            註記張數：全票1張 半票1張　共2張
                        </div>
                        <div class="button_area">
                            <button id="cancel">取消</button>
                            <button id="forsure">確定</button>
                        </div>

                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!-- <script src="js/back_check_facility_tickets.js"></script> -->
    <script type="text/javascript">
        window.addEventListener('load', initial);

        function initial() {

            var used_record = document.getElementById('used_record');
            var submit = document.getElementById('submit');

            var input_full = document.getElementById('full_num');
            var input_hald = document.getElementById('half_num');

            var unused_full = document.getElementById('unused_full');
            var unused_half = document.getElementById('unused_half');
            var unused_sum = document.getElementById('unused_sum');
            var used_full = document.getElementById('used_full');
            var used_half = document.getElementById('used_half');
            var used_sum = document.getElementById('used_sum');







            getURL();
            recordInitialAmount();
            resetButton();
            submitButton();
            setLocalStorage();



            function getURL() { //到時候要帶值進url
                var href = location.href;
                href = href + '?1&2'; //第一個數字是order_no，第二個為facility_no
                var index = href.indexOf('?'); //先判斷?的位置在哪(indexOf)
                var key_str = href.substr(index + 1); //從index往後一個位置開始取字串到最後
                var key_array = key_str.split("&"); //將取回的字串分割成陣列
                order_no = key_array[0]; //讓order_no變成全域
                facility_no = key_array[1]; //讓facility_no變成全域

                getOrder();
                getFacility();
                // var url_order_no = href.substr(-1);
                // alert(url_order_no);
            };

            function getOrder() {

                var xhr = new XMLHttpRequest();


                xhr.onload = function () {


                    if (xhr.status == 200) {

                        //將json轉成物件並取得資料
                        var order_item = JSON.parse(xhr.responseText);

                        console.log(order_item);

                        var full_fare_num = parseInt(order_item.full_fare_num);
                        var half_fare_num = parseInt(order_item.half_fare_num);
                        var full_fare_num_used = parseInt(order_item.full_fare_num_used);
                        var half_fare_num_used = parseInt(order_item.half_fare_num_used);
                        var facility_name = order_item.facility_name;

                        //算出剩餘票數
                        remain_full = full_fare_num - full_fare_num_used;
                        remain_half = half_fare_num - half_fare_num_used;

                        //將資料放入節點中

                        input_full.value = remain_full;
                        input_hald.value = remain_half;
                        input_full.setAttribute('max', remain_full);
                        input_hald.setAttribute('max', remain_half);
                        unused_full.innerHTML = remain_full;
                        unused_half.innerHTML = remain_half;
                        unused_sum.innerHTML = remain_full + remain_half;
                        used_full.innerHTML = full_fare_num_used;
                        used_half.innerHTML = half_fare_num_used;
                        used_sum.innerHTML = full_fare_num_used + half_fare_num_used;

                        var faci_name = document.getElementById('faci_name');
                        faci_name.innerHTML = facility_name;

                        initial_full_num = remain_full; //初始票價
                        initial_half_num = remain_half;

                        usedUp();

                    } else {
                        alert(xhr.status);
                    }

                }
                var determine = 'getOrder';
                var url = "fetch_from(facility_order_item).php?order_no=" + order_no + "&facility_no=" + facility_no  + "&determine=" + determine;
                xhr.open("Get", url, true);
                xhr.send();
            };

            function usedUp() {
                var used_up = document.getElementById('used_up');
                if (input_full.value == 0 && input_hald.value == 0) {
                    used_up.style.display = "block";
                    alert('use up');
                } else {
                    used_up.style.display = "none";
                }
            }




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
                var origin_used_amount_full = used_full.innerHTML;
                var origin_used_amount_half = used_half.innerHTML;
                var now_want_used_full = document.getElementById('full_num').value;
                var now_want_used_half = document.getElementById('half_num').value;
                var new_used_full = parseInt(origin_used_amount_full) + parseInt(now_want_used_full);
                var new_used_half = parseInt(origin_used_amount_half) + parseInt(now_want_used_half);

                var url = "update_order(facility_order_item).php?order_no=" + order_no + "&facility_no=" + facility_no +
                    "&now_used_full=" + new_used_full + "&now_used_half=" + new_used_half;
                xhr2.open("Get", url, false); //false是指這個function要先做完才去做其他的function
                xhr2.send();

                
                
                

            };


            function submitButton() {


                // submit.addEventListener('click', recored);
                submit.addEventListener('click', updateOrder);
                submit.addEventListener('click', getOrder);

                function recored() {
                    var full = parseInt(full_num.value, 10);
                    var half = parseInt(half_num.value, 10);
                    var total = full + half;

                    //創造2個p節點
                    var p1 = document.createElement("p");
                    var p2 = document.createElement("p");
                    p1.innerHTML = "時間：2018/1/1 10:00　am";
                    p2.innerHTML = "註記張數：全票" + full + "張　半票" + half + "張　共" + total + "張";

                    //創造一個div節點，並給予class名稱
                    var records = document.createElement("div");
                    records.setAttribute('class', 'records');

                    //div節點加進去父層used_record_wrapper
                    used_record.appendChild(records);

                    //把2個p節點加進去父層div節點
                    records.appendChild(p1);
                    records.appendChild(p2);

                }

            };

            function getFacility() {
                var xhr3 = new XMLHttpRequest();


                xhr3.onload = function () {


                    if (xhr3.status == 200) {


                        var photo = xhr3.responseText;
                        var photo_url = 'img/facilityInfo/' + photo.trim();
                        //將資料放入節點中
                        var faci_photo = document.getElementById('faci_photo');
                        faci_photo.style.backgroundImage = "url(" + photo_url + ")";



                    } else {
                        alert(xhr3.status);
                    }

                }

                var url = "fetch_from(facility).php?facility_no=" + facility_no;
                xhr3.open("Get", url, true);
                xhr3.send();
            }

            function recordInitialAmount() {
                full_num = document.getElementById('full_num');
                half_num = document.getElementById('half_num');
                initial_full_num = full_num.value;
                initial_half_num = half_num.value;
            };

            function resetButton() {
                //reset按下後重新抓回原始值
                var reset = document.getElementById('reset');
                reset.addEventListener('click', function () {
                    full_num.value = initial_full_num;
                    half_num.value = initial_half_num;
                });
            };





            function setLocalStorage() {
                var facility_icon = document.getElementsByClassName('facility_icon');

                for (var i = 0; i < facility_icon.length; i++) {
                    facility_icon[i].addEventListener('click', storeNowFacility);

                    function storeNowFacility() {
                        now_facility_chinese = this.getAttribute('data-title');
                        now_facility_english = this.getAttribute('data-facility');
                        localStorage.setItem('now_facility_chinese', now_facility_chinese);
                        localStorage.setItem('now_facility_english', now_facility_english);
                    }


                }

            };




        };
    </script>
</body>

</html>