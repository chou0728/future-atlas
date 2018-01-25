<!-- ===========1.加上session_start=========== -->
<?php
ob_start();
session_start();
// 請複製:當無登入時會自動跳轉至登入頁面
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
    <title>FA後台</title>
    <!-- ======請複製==== -->
    <link rel="stylesheet" type="text/css" href="css/RESET.css">
    <link rel="stylesheet" type="text/css" href="css/11back_nav.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="css/back_TheaterMang.css">
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
                <a href="back_TheaterMang.php" >劇場管理
                </a>
                <span class="listcover"></span>
                <!-- <span class="spancover"></span> -->
            </li>
            <li class="navList">
                <a href="back_activity.php">活動管理</a>
                <span class="listcover"></span>
            </li>
            <li class="navList">
                <a href="back_member.php" style="color: black;">會員管理</a>
                <span class="listcover" style="width: 100%;background-color: rgba(90, 230, 219,0.9);"></span>
                
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
        <div class="b_content">
            <div class="b_sub_nav">
                <a href="javascript:void(0)" class="b_sn_btn" onclick="openCity(event,'member')" id="active">會員管理</a>
                <!-- <a href="javascript:void(0)" class="b_sn_btn" onclick="openCity(event,'theater_session_List')">劇場場次清單</a>
                <a href="javascript:void(0)" class="b_sn_btn" onclick="openCity(event,'theater_order_List')">劇場票劵訂單</a> -->
            </div>

            <!-- 劇場節目 -->
            <div id="member" class="tabcontent">
                <span onclick="this.parentElement.style.display='none'" class="topright"></span>
                
                    <h2 class="titleh2" align="center">會員管理</h2>
                    <table>
                        <!-- <button onclick="Newprogram()"  class="Newprogram" >新增</button> -->
                        <tr class="Field_title">
                            <th>會員ID</th>
                            <th>帳號</th>
                            <th>密碼</th>
                            <th>暱稱</th>
                            <th>積分</th>
                            <th>留言權限</th>
                            <th>信箱</th>
                            <th>電話</th>  
                        </tr>
                        <?php 
                            try {
                                require_once("connectBooks.php");
                                // require_once("connectbd103g3.php");
                                // $recPerPage=50;
                                // $start = 0;
                                
                                // $sql = "select * from member ";
                                // $theater_program = $pdo->query($sql);

                                // $total_count = $theater_program -> rowCount();  

                                // $total_pages = ceil($total_count / $recPerPage ) ;
                                // if(isset($_GET["page"])){
                                //      $page = $_GET["page"];
                                // }else{
                                //     $page=1;
                                // }
                                //一打開停留在第一頁
                                // $start = ($page-1) * $recPerPage;

                                $sql = "select * from member  ";
                                $member= $pdo->query($sql);
                                // echo $total_pages;       
                                //跑迴圈，印出資料
                                foreach( $member as $i=>$memberRow){

                                    $mem_permissions = $memberRow["mem_permissions"];

                                     if ($mem_permissions ==1){
                                        $mem_permissions="可評價";
                                     }else{
                                        $mem_permissions="不可評價";
                                     }

                                ?>


                                <!-- <form method="post"   align="center" enctype="multipart/form-data"> -->

                                <!-- <input type="hidden" id="program_no" name="program_no" value="<?php echo  $prodRow["program_no"] ?>"> -->
                                <tr class="Field_value">
                                    <td><?php echo  $memberRow["mem_id"] ?>
                                    </td>  
                                    <td>
                                        <?php echo  $memberRow["mem_name"] ?>
                                    </td>
                                    <td >
                                        <?php echo  $memberRow["password"] ?>
                                    </td>
                                    <td>
                                        <?php echo  $memberRow["mem_nick"] ?>
                                    </td>
                                    <td>
                                       <?php echo  $memberRow["mem_points"] ?>
                                    </td>
                                    <td>
                                       <?php echo  $mem_permissions ?>    
                                    </td>
                                   	<td>
                                  		<?php echo  $memberRow["mem_mail"] ?>
                                    </td>
                                    <td>
										<?php echo  $memberRow["mem_phone"] ?>
                                    </td>
                                </tr>
                                <!-- </form> -->
                                
                            <?php       
                                }
                            /*?>*/
                            /*<?php*/
                            } catch (PDOException $e) {
                                echo "錯誤原因 : " , $e->getMessage() , "<br>";
                                echo "錯誤行號 : " , $e->getLine() , "<br>";
                                // echo "getCode : " , $e->getCode() , "<br>";
                                // echo "異動失敗,請聯絡系統維護人員";
                            }
                        ?>        
                    </table>              
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

   
    </script>
    <!-- ===========請在最後加入!!===============-->
<!-- ===========請在最後加入!!===============-->
<!-- ===========請在最後加入!!===============-->
<!-- ===========請在最後加入=!!==============-->
    <div id="RWD-page"><span>驗票系統</span></div><!-- ===========請在最後加入=!!==============-->
</body>
</html>