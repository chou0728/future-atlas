<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>FA 後台</title>
    <link rel="stylesheet" type="text/css" href="css/RESET.css">
    <link rel="stylesheet" type="text/css" href="css/11back_nav.css">
    <link rel="stylesheet" href="css/check_tickets_facility.css">
    <link rel="stylesheet" href="css/choose_facility.css">
</head>

<body>
    <!-- ==== header ==== -->
    <header>
        <h1 class="logo">
            <img src="img/LOGO.png" alt="FA">
            <span>後台管理系統</span>
        </h1>
        <ul class="nav">
            <li class="navList">
                <a href="back_check_facility_tickets.html" style="color: black;">設施驗票</a>
                <span class="listcover" style="width: 100%;background-color: rgba(90, 230, 219,0.9);"></span>
                <span class="spancover"></span>
            </li>
            <li class="navList">
                <a href="back_check_theater_tickets.html">劇場驗票</a>
                <span class="listcover"></span>
                <span class="spancover"></span>
            </li>
            <li class="navList">
                <a href="back_facilityM.html">設施管理</a>
                <span class="listcover"></span>
                <span class="spancover"></span>
            </li>
            <li class="navList">
                <a href="back_TheaterMang.html">劇場管理</a>
                <span class="listcover"></span>
                <span class="spancover"></span>
            </li>
            <li class="navList">
                <a href="back_activity.html">活動管理</a>
                <span class="listcover"></span>
                <span class="spancover"></span>
            </li>
            <li class="navList">
                <a href="">會員管理</a>
                <span class="listcover"></span>
                <span class="spancover"></span>
            </li>
            <li class="navList">
                <a href="">諮詢管理</a>
                <span class="listcover"></span>
                <span class="spancover"></span>
            </li>
            <li class="navList">
                <a href="">權限管理</a>
                <span class="listcover"></span>
                <span class="spancover"></span>
            </li>
        </ul>
    </header>
    <div class="loginBox mobileLoginBox">
        您好!
        <span id="managerId">最高管理員</span>
        <span id="managerName">Manna</span>
        <a href="javascript:void(0)">登出</a>
    </div>
    <!-- === content ==== -->
    <div class="back_wrapper_right">
        <div class="b_content">
            <!-- nav -->
            <div class="b_sub_nav">
                <a href="javascript:void(0)" class="b_sn_btn" id="active">選擇所在設施</a>
                <a href="javascript:void(0)" class="b_sn_btn"> 設施驗票</a>
            </div>
            <!-- ============== 選擇所在設施 ============== -->
            <div id="choose_facility" class="tabcontent choose_facility_wrapper">
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
                    </div>
                    <!-- ========== 點選後顯示所在設施 ========== -->
                    <div class="show_where_now">
                        <img src="" id="show_where_photo">
                        <button id="rechoose">重選設施</button>
                    </div>
                </div>
            </div>
            <!-- 設施驗票 -->
            <div id="check_tickets" class="tabcontent check_tickets_wrapper">
                <div class="content">
                    <div class="info used_facility_info">
                        <h2>設施名稱：宇宙摩天輪</h2>
                        <div class="photo">
                        </div>
                        <div class="select_amount">
                            <div>
                                <span>全票：</span>

                                <?php
                                      try{
                                        require_once("connectBooks.php");
                                        $sql = "select * from facility_order_item where order_no = ?;";
                                        $facility_order = $pdo->prepare($sql);
                                        $facility_order->bindValue(1,1); 
                                        // 這個 1 到時候要從QR code帶入的資料拿，現在先寫死 (order_no)
                                        $facility_order->execute();

                                        if( $facility_order->rowCount() == 0 ){ //找不到
                                          //傳回沒有的訊息
                                          
                                          echo "查無此票券";
                                        }else{ //找得到

                                           //取回該訂單的全部資料
                                          $order_item = $facility_order->fetchObject();

                                          //取回該筆訂單中全票數量欄位的資料
                                          $full_fare_num = $order_item->full_fare_num;
                                          
                                          //取回該筆訂單中半票數量欄位的資料
                                          $half_fare_num = $order_item->half_fare_num;

                                          
                                          echo "<input id='full_num' type='number' value='$full_fare_num' min='0'>";
                                          echo "<span>張</span>";
                                          echo "</div>";
                                          echo "<div>";
                                          echo "<span>半票：</span>";
                                          echo "<input id='half_num' type='number' value='$half_fare_num' min='0'>";
                                          echo "<span>張</span>";
                                          
                                        } 
                                        
                                      }catch(PDOException $e){
                                        echo $e->getMessage();
                                      }
                                  ?>

                            </div>
                        </div>
                        <div class="button_area">
                            <button id="submit">確定註記</button>
                            <button id="reset">重選數量</button>
                        </div>
                    </div>
                    <div class="info" >
                        <h2>註記紀錄</h2>
                        <div class="info_used_record" id="used_record">
                            <!-- <div class="records">
                                <p>時間：2018/1/1 10:00　am</p>
                                <p>註記張數：全票1張 半票1張　共2張</p>
                                
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
    <script src="js/back_check_facility_tickets.js"></script>
    <script type="text/javascript">
      
      window.onload = record_amount;

      function record_amount(){
         full_num = document.getElementById('full_num');
         half_num = document.getElementById('half_num');
        initial_full_num = full_num.value;
        initial_half_num = half_num.value;
      };

      //reset按下後重新抓回原始值
      var reset = document.getElementById('reset');
      reset.addEventListener('click',function(){
        full_num.value = initial_full_num;
        half_num.value = initial_half_num;
      });


      var used_record = document.getElementById('used_record');

      var submit = document.getElementById('submit');
      submit.addEventListener('click',function(){
            
          var full  = parseInt(full_num.value, 10);
          var half = parseInt(half_num.value, 10);
          var total = full + half;


            //創造2個p節點
            var p1 = document.createElement("p"); 
            var p2 = document.createElement("p");
            p1.innerHTML = "時間：2018/1/1 10:00　am";
            p2.innerHTML = "註記張數：全票"+ full + "張　半票" + half + "張　共" + total + "張";

            //創造一個div節點，並給予class名稱
            var records = document.createElement("div"); 
            records.setAttribute('class','records');

            //div節點加進去父層used_record_wrapper
            used_record.appendChild(records);

            //把2個p節點加進去父層div節點
            records.appendChild(p1);
            records.appendChild(p2);

            



      });

    </script>
</body>

</html>