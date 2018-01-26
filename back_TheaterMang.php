<!-- ===========1.加上session_start=========== -->
<?php
ob_start();
session_start();
//請複製:當無登入時會自動跳轉至登入頁面
if(isset($_SESSION["login_success"])==false){
    header("location:manager_login.php");
    exit;
}
?>

<!-- ===========1 end=========== -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FA後台管理系統 | 劇場管理</title>
    <link rel="icon" href="img/favicon_back.ico" />
    <!-- ======請複製==== -->
    <link rel="stylesheet" type="text/css" href="css/RESET.css">
    <link rel="stylesheet" type="text/css" href="css/11back_nav.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="css/back_TheaterMang.css">
    <script src="js/jquery.min.js"></script>
    <!-- ========== -->

</head>
<body>
    <!-- ====================2.導覽列請替換===================== -->
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
                <a href="back_check_theater_tickets.php">劇場驗票</a>
                <span class="listcover"></span>
            </li>
            <li class="navList">
                <a href="back_facilityM.php" >設施管理</a>
                <span class="listcover"></span>
                
            </li>
            <li class="navList">
                <a href="back_TheaterMang.php" style="color: black;">劇場管理
                </a>
                <span class="listcover" style="width: 100%;background-color: rgba(90, 230, 219,0.9);"></span>
                <!-- <span class="spancover"></span> -->
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
                <a href="back_robot.php">諮詢管理</a>
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
<!-- ===========================NAV結束==================================== -->
    <!-- ===右邊區塊固定格式=============================================================== -->
    <div class="back_wrapper_right">
        <div class="b_content"  id="not-check-ticket">
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
                        <tr class="Field_title">
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
                                <form method="post"   align="center" enctype="multipart/form-data">

                                <input type="hidden" id="program_no" name="program_no" value="<?php echo  $prodRow["program_no"] ?>">
                                <tr class="Field_value">
                                    <td><?php echo  $prodRow["program_no"] ?>
                                    </td>  
                                    <td>
                                        <input type="text" id="program_name" name="program_name" size=6 value="<?php echo  $prodRow["program_name"] ?>">
                                    </td>
                                    <td >
                                        <textarea id="program_intro" name="program_intro" rows="4" cols="30" maxlength="60"  ><?php echo  $prodRow["program_intro"]?></textarea>
                                        
                                    </td>
                                    <td>
                                        <?php echo  $prodRow["program_photo"]?>
                                    </td>
                                    <td>
                                        <input type="number" id="program_fare" name="program_fare" style="width:50px;" value="<?php echo  $prodRow["program_fare"] ?>">
                                    </td>
                                    <td>
                                        <?php
                                        $stat=$prodRow['program_status'];
                                        $selected_a = ($stat == '1') ? 'selected' : '' ;
                                        $selected_b = ($stat == '0') ? 'selected' : '' ;
                                        ?>
                                        <select id="program_status" name="program_status"> 
                                        <option 
                                            <?php echo $selected_a; ?> value='1'>上架
                                        </option> 
                                        <option 
                                            <?php echo $selected_b; ?> value='0'>下架</option> 
                                        </select>    
                                    </td>
                                   <td>
                                    <input type="button" href="javascript: return false;" id="Checked" onclick="ajax_UpdateProgram()" value="儲存"></input>   
                                   <!-- <button href="javascript: return false;" id="Checked" onclick="ajax_UpdateProgram()">儲存</button>  -->  
                                 <!-- <input type="submit" style="font-family:微軟正黑體;" value="儲存"> -->
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

            <!-- 劇場場次清單 -->
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
                        <tr class="Field_title">
                            <th>場次編號</th>
                            <th>節目編號</th>
                            <th>場次時間</th>
                            <th>演出日期</th>
                            <th>總票數</th>
                            <th>剩餘票數</th>
                            <!-- <th>修改</th> -->
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
                                <!-- <form method="get" action="php/update_theater_session_List.php" align="center" > -->

                                <tr class="Field_value">
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
                                        <?php echo  $prodRow["total_ticket"] ?>
                                    </td>
                                    <td> 
                                        <?php echo  $prodRow["last_ticket"] ?>   
                                    </td>
                                    <!-- <td> <input type="submit" style="font-family:微軟正黑體;" value="修改"></td> -->
                                </tr>
                                <!-- + -->
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

            <!-- 劇場票劵訂單 -->
            <div id="theater_order_List" class="tabcontent">
                <!-- 劇場票劵訂單 -->
                <span onclick="this.parentElement.style.display='none'" class="topright"></span>
                <form method="get" action="" align="center" enctype="multipart/form-data">
                    <h2 class="titleh2">劇場票劵訂單</h2>
                    <table class="TheaterOrderListTable" id='TheaterOrderListTable'>
                        會員帳號:<input type="text" value="" id='mem_name'>
                            <!-- button類型要改成type="button"，預設type="submit" -->
                            <button type="button" onclick="searchOrderList()"  class="searchOrderList">查詢</button>
                            <div id="showPanel"></div>
                        <tr class="Field_title">
                            <th>訂單編號</th>
                            <th>場次編號</th>
                            <th>會員帳號</th>
                            <th>購買張數</th>
                            <th>已使用張數</th>
                            <th>訂購日期</th>
                            <th>原始總額</th>
                            <th>積分折扣</th>
                            <th>信用卡卡號</th>
                            <th>節目編號</th>
                        </tr>
                        <?php 
                            try {
                                require_once("php/connectBooks.php");
                                // require_once("connectbd103g3.php");
                                $recPerPage=1000;
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

                                //$sql = "select * from theater_order_list limit $start,$recPerPage ";
                                //搜尋會員姓名
                                $sql = "select t.theater_ticket_no,t.session_no,t.mem_id,t.number_purchase,t.used_ticket,
                                    t.order_date,t.original_amount,t.points_discount,t.credit_card,t.program_no,m.mem_name from theater_order_list t join member m  on t.mem_id=m.mem_id ORDER BY theater_ticket_no
                                 limit $start,$recPerPage ";                                
                                $theater_order_list = $pdo->query($sql);
                                // echo $total_pages;       
                                //跑迴圈，印出資料
                                foreach( $theater_order_list as $i=>$prodRow){
                                ?>
                                <tr class="Field_value">
                                    <td><?php echo  $prodRow["theater_ticket_no"] ?>
                                    </td>  
                                    <td>
                                        <?php echo  $prodRow["session_no"] ?>
                                    </td>
                                    <td >
                                        <?php echo  $prodRow["mem_name"] ?>
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
                                    <td> 
                                        <?php echo  $prodRow["program_no"] ?>  
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
                    document.getElementById("TheaterSessionListTable").innerHTML = xhr.responseText;
                }else{
                    alert( xhr.status );
                }
            }//xhr.onreadystatechange
          
            var url = "php/get_program_no.php?programNo=" + document.getElementById("programNo").value;
            xhr.open("Get", url, true);
            xhr.send( null );
        }

        //傳送會員ID  
        function searchOrderList(){
            var xhr = new XMLHttpRequest();
            xhr.onload=function (){
                if( xhr.status == 200 ){
                    document.getElementById("TheaterOrderListTable").innerHTML = xhr.responseText;
                }else{
                    alert( xhr.status );
                }
            }//xhr.onreadystatechange
          
            var url = "php/search_member_id.php?mem_name=" + document.getElementById("mem_name").value;
            xhr.open("Get", url, true);
            xhr.send( null );
        }
                //資料傳送到php
        function ajax_UpdateProgram(){
            // Create our XMLHttpRequest object
            //產生XMLHttpRequest物件
            var program_no = document.getElementById("program_no").value;
            var program_name = document.getElementById("program_name").value;
            var program_intro = document.getElementById("program_intro").value;
           // var program_photo = document.getElementById("program_photo").value;
            var program_fare = document.getElementById("program_fare").value;
            var program_status = document.getElementById("program_status").value;
            
            var hr = new XMLHttpRequest();
            // Create some variables we need to send to our PHP file
            //把 vars裡面資輛傳到my_parse_file.php檔案(設定參數)
            var url = "php/updateTheaterMang.php";
            var vars = "program_no=" + program_no+
                       "&program_name="+program_name+
                       "&program_intro="+program_intro+
                     //  "&program_photo="+program_photo+
                       "&program_fare="+program_fare+
                       "&program_status="+program_status;
                       //console.log(vars)
                      // alert(vars);
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
                    // setTimeout(function(){
                    //     location.href="back_TheaterMang.php";
                    // },2000)
                }
            }
            // Send the data to PHP now... and wait for response to update the status div
            //送出資料
            //send() 的參數在以 POST 發出 request 時，可以是任何想傳給伺服器的東西
            hr.send(vars); // Actually execute the request
            //顯示目前狀態(還在連線中)
            //document.getElementById("status").innerHTML = "processing...";
        }

    </script>
    <!-- ===========請在最後加入!!===============-->
<!-- ===========請在最後加入!!===============-->
<!-- ===========請在最後加入!!===============-->
<!-- ===========請在最後加入=!!==============-->
    <div id="RWD-page"><span>驗票系統</span></div><!-- ===========請在最後加入=!!==============-->
</body>
</html>