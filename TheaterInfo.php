<?php
  ob_start();
  session_start();
  if(isset($_SESSION["login_error"]) === true){
    echo "<script>alert('帳密錯誤！請新登入');</script>";
    unset($_SESSION["login_error"]);
}else if(isset($_SESSION["log_register"])===true){
    echo "<script>alert('註冊成功，歡迎你~~');</script>";
    unset($_SESSION["log_register"]);
}
  $_SESSION["php_self"] = $_SERVER["PHP_SELF"];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FA未來主題樂園 | 劇場購票-劇場節目介紹</title>
  <link rel="icon" href="img/favicon.ico" />
  <link rel="stylesheet" type="text/css" href="css/RESET.css">
  <link rel="stylesheet" type="text/css" href="css/header.css">
  <link rel="stylesheet" href="css/Theaterinfo.css" />
  <link rel="stylesheet" type="text/css" href="css/login.css">
  <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
  <script src="js/page_load_unload.js"></script>
  <script src="js/TheaterInfo.js"></script>
  <title>Theaterinfo</title>
  <style type="text/css">
      #all-page{
          position: fixed;
          top:0;
          left: 0;
          width: 100%;
          height: 100%;
          background: repeating-linear-gradient(transparent 0px, transparent 1px,transparent 1px, transparent 3px,rgba(0,0, 0,0.5) 3px, rgba(0, 0, 0,0.8) 4px);
          background-color: #222;
          display: none;
          opacity: 0.7;
        }
    </style>
</head>
<body class="fadeout">
    <div class="header">
      <ul class="ul_top">
          <li class="li_top">
            <a href=<?php
              if(isset($_SESSION["mem_id"])===true){
                      echo "'javascript:void(0)'";
                    }else{
                      echo "'register.php'";
                    }
                ?> id="registerUser">
                <img src=<?php
                    if(isset($_SESSION['mem_id'])===true){
                      echo 'img/member/member_3.png';
                    }else{
                      echo 'img/member/member_0.png';
                    }
                ?>
                >
                <span class="register">
                  <?php
                    if(isset($_SESSION["mem_id"])===true){
                      echo "<a href='MembersOnly.php'>帳戶</a>";
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
                              echo"<a href='logoutheadforindex.php'>登出</a>";
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
          </li>
      </ul>
    </div>
    <div class="nav">
        <div class="ul_box">
            <ul class="ul_left">
                <li>
                    <img src="img/hover-tri-now.png" class="nav_here">
                    <a href="Theaterbuyticket.php" style="color: rgb(55,222,255);font-weight: bold;">劇場購票</a>
                </li>
                <li>
                    <img src="img/hover-tri.png" class="nav_hover">
                    <a href="facilityBuyTicket.php">設施購票</a>
                </li>
                <li>
                    <img src="img/hover-tri.png" class="nav_hover">
                    <a href="facilityInfo.php">設施介紹</a>
                </li>
            </ul>
            <h1 style="display: none">FutureAtlas_未來主題樂園</h1>
            <a href="home.php" class="logo_a">
                <img src="img/LOGO.png" class="logo">
            </a>
            <ul class="ul_right">
                <li>
                    <img src="img/hover-tri.png" class="nav_hover">
                    <a href="home.php#page2" id="NavClose">園區地圖</a><!-- ===請追加ID=== -->
                </li>
                <li>
                    <img src="img/hover-tri.png" class="nav_hover">
                    <a href="activity.php">活動月曆</a>
                </li>
                <li>
                    <img src="img/hover-tri.png" class="nav_hover">
                    <a href="robot.php">諮詢專區</a>
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
      <!-- 小導覽列 -->
      <div class="menuTheaterbuyticket">
        <div class="Menu" >
          <div class="progressinfoMenu sq-one">
            <div class="progressinfotriangle">
            </div>
            <a href="TheaterInfo.php">節目介紹</a>
          </div> 
          <div class="buyticketMenu sq-two">
            <div class="buytickettriangle">
            </div>
            <a href="Theaterbuyticket.php">購買劇場票劵</a>
          </div> 
        </div>
      
        <div class="Menu">
          <!-- 可以按箭頭轉換順續 -->
          <img src="img/theater_page/Recycle_arrows_3.png" style="width: 40px;" class="Recycle_arrows">
          <!-- 可以變換標題 -->
          <h2 class="Menutitle" >節目介紹</h2>
        </div> 
        <div class="Menu">
          <!-- 畫線 -->
          <canvas id="canvas" width="300" height="300"  class="toprightcanvas">
          </canvas>
          <!-- <hr size="8px" align="center" width="15%" style="background-color:#35ffba" >
          <hr size="8px" align="center" width="15%" style="background-color:#35ffba" class="hrRotate">
          <hr size="8px" align="center" width="15%" style="background-color:#35ffba" class="hrRotate2"> -->
          <!-- 太空人 -->
          <!-- <img src="img/theater_page/spaceman_2.png"  class="spaceman"> -->
          <!-- 星球 -->
          <img src="img/theater_page/Neptune.png" style="width:400px; height:400px;" class="planet" >
        </div>
      </div>
      

      <!--  第一個節目 -->
      <div class="programone">
        <h2 class="programonetitle">尋找星生命</h2>
        <span class="programoneline" id="programoneline"></span>
       <!--  <hr size="8px" align="center" width="48%" style="background-color:#35ffba" class="programoneHr" > -->
        <?php
            require_once("php/connectBooks.php");
            $sql = "select * from theater_program where program_no=1";
            $theater_program = $pdo->query( $sql );
            if( $theater_program->rowCount()==0){
              echo "<center>查無此節目資料</center>";
            }else{
              $prodRow = $theater_program->fetchObject();
              $program_intro = $prodRow->program_intro;
            }
        ?>
        <p class="programonecontent">
          <?php echo $program_intro ?>
          <!-- 廣大的宇宙中，到底有沒有外星人？跟著最先進的太空工作室，一窺宇宙前線，尋找外星新生命。 -->
        </p>
        <span class="programoneline2" id="programoneline2"></span>
        <!-- <hr size="10px" align="center" width="48%" style="background-color:#35ffba" class="programoneHr2" > -->
        <img src="img/theater_page/spaceship_2.png" class="spaceship">

        <!-- <img src="img/theater_page/spaceship_1.png" class="spaceship2"> -->

        <img src="img/theater_page/earth-_remove_the_background.gif"  style="" class="programtwoimg2">

        <!-- <img src="img/theater_page/mars-remove_the_background.gif"  style="width:100px; height:100px;" class="programtwoimg3" id="programtwoimg3"> -->
      </div>

      <!-- 第二個節目 -->
      <div class="programtwo">
        <h2 class="programtwotitle">末世決戰</h2>
        <?php
            require_once("php/connectBooks.php");
            $sql = "select * from theater_program where program_no=2";
            $theater_program = $pdo->query( $sql );
            if( $theater_program->rowCount()==0){
              echo "<center>查無此節目資料</center>";
            }else{
              $prodRow = $theater_program->fetchObject();
              $program_intro = $prodRow->program_intro;
            }
        ?>
        <p class="programtwocontent">
          傑克與瑪莉無意之間打開了宇宙通道，數以兆計的外星生物瞬間湧入地球，人類究竟該不該跟牠們成為朋友
        </p>
        <span class="programtwospan" ></span>
        <span class="programtwospan2"></span>
        <span class="programtwospanmobie"></span>
        <span class="programtwospanmobie2"></span>
        <hr size="8px" align="center" width="35%"  class="programtwoHr" >
        <hr size="8px" align="center" width="35%"  class="programtwoHr2" >
        <img src="img/theater_page/StarWars_BB-8.png"  style="width:300px; height:300px;" class="programtwoimg">
        
      </div>
      
      <!-- 立即購買按鈕 -->
      <div class="buyticketBtn">
        <a href="javascript:void(0)" onclick="checkLogin()" >立即購買</a>
      </div>
  </div>
  
<div id="all-page"></div><!-- 叫出時背景-->
        <!-- 登入燈箱 ==============-->
        <div id="lightBox">
            <div id="cancel">
                <div class="leftLine"></div>
                <div class="rightLine"></div>
            </div>
            <!-- <img class="bar" src="img/bar.png" alt="bar"> -->
            <form class="singUp" action="loginheadforindex.php" method="post">
                <h2>會員登入</h2>
                <div class="text">
                    帳號：<input type="text" name="memName" id="memId" value="" required placeholder="輸入帳號">
                    <br>
                    密碼：<input type="password" name="memPsw"  id="memPsw" value="" required placeholder="輸入密碼">
                    <br>
                </div>
                        <div class="btn">
                            <input type="reset" name="reset" value="重填">
                            <input type="submit" name="" id="submit" value="登入">
                        </div>
            </form>
            <div id="orRegister">
              <span>還沒有帳號嗎？<a href="register.html">註冊</a>一個吧！</span>
            </div>
        </div>
        <!-- 登入燈箱 ==end============-->



    <!--登入/註冊燈箱 -->
    <script type="text/javascript">
      //-登入-----------------------------------
          window.onload = function () {

            // ==============================存取會員ID開始=================
            var storage = localStorage;
            storage.setItem("mem_id",<?php if(isset($_SESSION["mem_id"])===true){echo $_SESSION["mem_id"];}else{echo "0";} ?>);
          // ==============================存取會員ID結束=================



          // =================登入/註冊開始==================================
            var storage = localStorage;
            /*註冊登入按鈕*/
            var singUpBtn = document.getElementById('singUpBtn');

            /*註冊燈箱*/
            var lightBox = document.getElementById('lightBox');

            /*註冊燈箱關閉按鈕*/
            var cancel = document.getElementById('cancel');

            /*建立登入按鈕點擊事件聆聽功能*/
            singUpBtn.addEventListener('click', showLogin, false);



            /*建立關閉登入燈箱按鈕點擊事件聆聽功能*/
            cancel.addEventListener('click', closeLogin, false);


            /*點案登入show出登入燈箱 以及判斷登出按鈕*/
            function showLogin() {
              console.log(singUpBtn.innerText);
              /*如果singUpBtn為登入時*/
              fullCover = document.getElementById('all-page');/*叫出燈箱時的墊背*/
              if(singUpBtn.innerText.indexOf("登入") != -1){
                /*show出燈箱*/
                lightBox.style.opacity = 1;
                fullCover.style.display="block";
                lightBox.style.visibility = 'visible'
                lightBox.style.display = "block";
                allNavClose();
              }
            }
            


            /*點案登入關閉登入燈箱*/
            function closeLogin() {
              lightBox.style.opacity = 0;
              lightBox.style.visibility = 'hidden';
              fullCover.style.display="";
            }
            
            
          }

    function loginss(){
        // 若登入，將mem_id存入localStorage
        var storage = localStorage;
        storage.setItem("mem_id",
            <?php
                if(isset($_SESSION["mem_id"])===true){
                    echo $_SESSION["mem_id"];
                }else{
                    echo "0";
                    // 若未登入，mem_id為0
                }
            ?>
            );
    }
    //window.addEventListener("load",loginss);
    // =================登入/註冊結束=================================
    </script>

  <!-- 導覽列 -->
	<script src="js/00nav.js"></script>
  
</body>
</html>