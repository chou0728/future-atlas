<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Theater progress</title>
    <!-- ======請複製==== -->
    <link rel="stylesheet" type="text/css" href="css/RESET.css">
    <link rel="stylesheet" type="text/css" href="css/11back_nav.css">
    <link rel="stylesheet" type="text/css" href="css/back_TheaterMang.css">
    <!-- ========== -->

</head>
<body>
    <!-- ============================================================================== -->
    <header>
        <h1 class="logo">
            <img src="img/LOGO.png" alt="FA">
            <span>後台管理系統</span>
        </h1>
        <ul class="nav">
            <li class="navList">
                <a href="">設施驗票</a>
                <span class="listcover"></span>
                <span class="spancover"></span>
            </li>
            <li class="navList">
                <a href="">劇場驗票</a>
                <span class="listcover"></span>
                <span class="spancover"></span>
            </li>
            <li class="navList">
                <a href="back_facilityM.html">設施管理</a>
                <span class="listcover"></span>
                <span class="spancover"></span>
            </li>
            <li class="navList">
                 <a href="back_theater_mang.php" style="color: black;">劇場管理
                </a>
                <span class="listcover" style="width: 100%;background-color: rgba(90, 230, 219,0.9);"></span>
                <span class="spancover"></span>
            </li>
            <li class="navList">
                <a href="">活動管理</a>
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
            您好!<span id="managerId">最高管理員</span><span id="managerName">Manna</span>
            <a href="javascript:void(0)">登出</a>
    </div>
<!-- ===NAV結束=========================================================================== -->
    <!-- ===右邊區塊固定格式=============================================================== -->
    <div class="back_wrapper_right">
        <div class="b_content">
            <div class="b_sub_nav">
                <a href="javascript:void(0)" class="b_sn_btn" onclick="openCity(event,'TheaterMang')" id="active">劇場節目</a>
                <a href="javascript:void(0)" class="b_sn_btn" onclick="openCity(event,'theater_session_List')">劇場場次清單</a>
                <a href="javascript:void(0)" class="b_sn_btn" onclick="openCity(event,'theater_order_List')">劇場票劵訂單</a>
            </div>

            <!-- 劇場節目 -->
            <div id="TheaterMang" class="tabcontent">
                <span onclick="this.parentElement.style.display='none'" class="topright"></span>
                
                    <h2 class="titleh2" align="center">劇場節目</h2>
                    <table>
                        <!-- <button onclick="Newprogram()"  class="Newprogram" >新增</button> -->
                        <tr>
                            <th>節目編號</th>
                            <th>節目名稱</th>
                            <th>節目介紹</th>
                            <th>節目圖片</th>
                            <th>票價</th>
                            <th>節目狀態</th>
                            <th>儲存</th> 
                        </tr>
                        <?php 
                            try {
                                require_once("php/connectBooks.php");
                                // require_once("connectbd103g3.php");
                                $recPerPage=50;
                                $start = 0;
                                
                                $sql = "select * from theater_program ";
                                $theater_program = $pdo->query($sql);

                                $total_count = $theater_program -> rowCount();  

                                $total_pages = ceil($total_count / $recPerPage ) ;
                                if(isset($_GET["page"])){
                                     $page = $_GET["page"];
                                }else{
                                    $page=1;
                                }
                                //一打開停留在第一頁
                                $start = ($page-1) * $recPerPage;

                                $sql = "select * from theater_program limit $start,$recPerPage ";
                                $theater_program = $pdo->query($sql);
                                // echo $total_pages;       
                                //跑迴圈，印出資料
                                foreach( $theater_program as $i=>$prodRow){
                                ?>
                                <form method="get" action="php/updateTheaterMang.php" align="center" enctype="multipart/form-data">

                                <input type="hidden" name="program_no" value="<?php echo  $prodRow["program_no"] ?>">
                                <tr>
                                    <td><?php echo  $prodRow["program_no"] ?>
                                    </td>  
                                    <td>
                                        <input type="text" size=6 value="<?php echo  $prodRow["program_name"] ?>" name="program_name">
                                    </td>
                                    <td >
                                        <input type="text" size=50  name="program_intro" value="<?php echo  $prodRow["program_intro"]?>">
                                    </td>
                                    <td>
                                        <input type="file" name="program_photo" multiple>
                                    </td>
                                    <td>
                                        <input type="number" style="width:50px;" value="<?php echo  $prodRow["program_fare"] ?>" name="program_fare">
                                    </td>
                                    <td>
                                        <?php
                                        $stat=$prodRow['program_status'];
                                        $selected_a = ($stat == '1') ? 'selected' : '' ;
                                        $selected_b = ($stat == '0') ? 'selected' : '' ;
                                        ?>
                                        <select name="program_status"> 
                                        <option 
                                            <?php echo $selected_a; ?> value='1'>上架
                                        </option> 
                                        <option 
                                            <?php echo $selected_b; ?> value='0'>下架</option> 
                                        </select>    
                                    </td>
                                    <td>
                                        <input type="submit" style="font-family:微軟正黑體;" value="儲存">
                                    </td>
                                </tr>
                                </form>
                            <?php       
                                }
                            ?>
                            <?php
                            } catch (PDOException $e) {
                                echo "錯誤原因 : " , $e->getMessage() , "<br>";
                                echo "錯誤行號 : " , $e->getLine() , "<br>";
                                // echo "getCode : " , $e->getCode() , "<br>";
                                // echo "異動失敗,請聯絡系統維護人員";
                            }
                        ?>        
                    </table>
                    <!-- <div class="okcancel"  >
                        <button class="OKbtn">
                            儲存
                        </button>
                        <button class="cancelbtn">
                            取消
                        </button>
                    </div> -->
                
            </div>
            <div id="theater_session_List" class="tabcontent">
                <span onclick="this.parentElement.style.display='none'" class="topright"></span>
                <!-- 劇場場次清單 -->
                
                    <h2 class="titleh2" align="center">劇場場次清單</h2>
                    
                       <!--  <button onclick="searchSession"  class="searchSession">查詢</button> -->
                        <div class="programNoSerch" align="center">
                             節目編號:<input type="text" value="1" name="programNo" id="programNo">
                            <button  class="searchOrderList" onclick="showSessionList()">查詢</button>
                            <!-- <div id="showPanel"></div> -->
                        </div>
                    <table class="TheaterSessionListTable" id="TheaterSessionListTable">   
                        <tr>
                            <th>場次編號</th>
                            <th>節目編號</th>
                            <th>場次時間</th>
                            <th>演出日期</th>
                            <th>總票數</th>
                            <th>剩餘票數</th>
                            <th>修改</th>
                        </tr>
                        <?php 
                            try {

                                require_once("php/connectBooks.php");
                                //利用programNo查尋sessionList

                                // require_once("connectbd103g3.php");
                                // $recPerPage=100;
                                // $start = 0;
                                
                                // $sql = "select * from theater_session_list  ";
                                // $theater_session_list= $pdo->query($sql);

                                // $total_count = $theater_session_list -> rowCount();  

                                // $total_pages = ceil($total_count / $recPerPage ) ;
                                // if(isset($_GET["page"])){
                                //      $page = $_GET["page"];
                                // }else{
                                //     $page=1;
                                // }
                                //一打開停留在第一頁
                                //$start = ($page-1) * $recPerPage;

                                $sql = "select * from theater_session_list ";
                                $theater_session_list = $pdo->query($sql);
                                // echo $total_pages; 
                                    
                                //跑迴圈，印出資料
                                foreach( $theater_session_list as $i=>$prodRow){
                        ?>       
                                <form method="get" action="php/update_theater_session_List.php" align="center" >

                                <input type="hidden" name="session_no" value="<?php echo  $prodRow["session_no"] ?>">  
                                <tr>
                                    <td><?php echo  $prodRow["session_no"] ?>
                                    </td>  
                                    <td>
                                        <?php echo  $prodRow["program_no"] ?>
                                    </td>
                                    <td >
                                        <?php echo  $prodRow["session_time"] ?>
                                    </td>
                                    <td><?php echo  $prodRow["time_date"] ?>
                                    </td>
                                    <td>
                                        <input type="number" style="width:50px;" value="<?php echo  $prodRow["total_ticket"] ?>" name="total_ticket">
                                    </td>
                                    <td> 
                                        <input type="number" style="width:50px;" value="<?php echo  $prodRow["last_ticket"] ?>"  name="last_ticket">   
                                    </td>
                                    <td> <input type="submit" style="font-family:微軟正黑體;" value="修改"></td>
                                </tr>
                                </form> 
                            <?php       
                                }
                            } catch (PDOException $e) {
                                echo "錯誤原因 : " , $e->getMessage() , "<br>";
                                echo "錯誤行號 : " , $e->getLine() , "<br>";
                                // echo "getCode : " , $e->getCode() , "<br>";
                                // echo "異動失敗,請聯絡系統維護人員";
                            }
                        ?> 
                    </table>
                
            </div>

            <div id="theater_order_List" class="tabcontent">
                <!-- 劇場票劵訂單 -->
                <span onclick="this.parentElement.style.display='none'" class="topright"></span>
                <form method="get" action="" align="center" enctype="multipart/form-data">
                    <h2 class="titleh2">劇場票劵訂單</h2>
                    <table class="TheaterOrderListTable" id='TheaterOrderListTable'>
                        會員ID:<input type="text" value="1" id='member_id'>
                            <button onclick="searchOrderList()"  class="searchOrderList">查詢</button>
                            <div id="showPanel"></div>
                        <tr>
                            <th>訂單編號</th>
                            <th>場次編號</th>
                            <th>會員ID</th>
                            <th>購買張數</th>
                            <th>已使用張數</th>
                            <th>訂購日期</th>
                            <th>原始總額</th>
                            <th>積分折扣</th>
                            <th>信用卡卡號</th>
                        </tr>
                        <?php 
                            try {
                                require_once("php/connectBooks.php");
                                // require_once("connectbd103g3.php");
                                $recPerPage=100;
                                $start = 0;
                                
                                $sql = "select * from theater_order_list ";
                                $theater_order_list= $pdo->query($sql);

                                $total_count = $theater_order_list-> rowCount();  

                                $total_pages = ceil($total_count / $recPerPage ) ;
                                if(isset($_GET["page"])){
                                     $page = $_GET["page"];
                                }else{
                                    $page=1;
                                }
                                //一打開停留在第一頁
                                $start = ($page-1) * $recPerPage;

                                $sql = "select * from theater_order_list limit $start,$recPerPage ";
                                $theater_order_list = $pdo->query($sql);
                                // echo $total_pages;       
                                //跑迴圈，印出資料
                                foreach( $theater_order_list as $i=>$prodRow){
                                ?>
                                <tr>
                                    <td><?php echo  $prodRow["theaterticket_no"] ?>
                                    </td>  
                                    <td>
                                        <?php echo  $prodRow["session_no"] ?>
                                    </td>
                                    <td >
                                        <?php echo  $prodRow["member_id"] ?>
                                    </td>
                                    <td><?php echo  $prodRow["number_purchase"] ?>
                                    </td>
                                    <td>
                                        <?php echo  $prodRow["used_ticket"] ?>
                                    </td>
                                    <td> 
                                        <?php echo  $prodRow["order_date"] ?>  
                                    </td>
                                    <td> 
                                        <?php echo  $prodRow["original_amount"] ?>  
                                    </td>
                                    <td> 
                                        <?php echo  $prodRow["points_discount"] ?>  
                                    </td>
                                    <td> 
                                        <?php echo  $prodRow["credit_card"] ?>  
                                    </td>
                                    <!-- <td><a href="#">修改</a></td> -->
                                </tr>
                            <?php       
                                }
                            ?>
                            <?php
                            } catch (PDOException $e) {
                                echo "錯誤原因 : " , $e->getMessage() , "<br>";
                                echo "錯誤行號 : " , $e->getLine() , "<br>";
                                // echo "getCode : " , $e->getCode() , "<br>";
                                // echo "異動失敗,請聯絡系統維護人員";
                            }
                        ?>
                        
                    </table>
                </form> 
            </div>
        </div>
    </div>
    <script>
        //tab 換頁
        function openCity (evt,list) {

            var i, tabcontent, b_sn_btn;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            b_sn_btn = document.getElementsByClassName("b_sn_btn");
            for (i = 0; i < b_sn_btn.length; i++) {
                b_sn_btn[i].className = b_sn_btn[i].className.replace(" active", "");
                b_sn_btn[i].setAttribute("id","");
            }
            document.getElementById(list).style.display = "block";
            evt.currentTarget.className += " active";

            evt.currentTarget.setAttribute("id","active");
        }
        // Get the element with id="defaultOpen" and click on it
        document.getElementById("active").click();

        //傳送節目編號
        function showSessionList() {
            var xhr = new XMLHttpRequest();
            xhr.onload=function (){
                if( xhr.status == 200 ){
                    //console.log( xhr.responseText );  
                    //modify_here  TheaterSessionListTable
                    document.getElementById("TheaterSessionListTable").innerHTML = xhr.responseText;
                }else{
                    alert( xhr.status );
                }
            }//xhr.onreadystatechange
          
            var url = "php/get_program_no.php?programNo=" + document.getElementById("programNo").value;
            xhr.open("Get", url, true);
            xhr.send( null );
        }

        //傳送會員ID  搜尋完，會跳到劇場節目內籤??
        function searchOrderList(){
            var xhr = new XMLHttpRequest();
            xhr.onload=function (){
                if( xhr.status == 200 ){
                    //console.log( xhr.responseText );  
                    //modify_here  TheaterSessionListTable
                    document.getElementById("showPanel").innerHTML = xhr.responseText;
                }else{
                    alert( xhr.status );
                }
            }//xhr.onreadystatechange
          
            var url = "php/search_member_id.php?member_id=" + document.getElementById("member_id").value;
            xhr.open("Get", url, true);
            xhr.send( null );
        }
    </script>
</body>
</html>