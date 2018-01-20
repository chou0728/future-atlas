<?php
  ob_start();
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/RESET.css">
  <link rel="stylesheet" type="text/css" href="css/header.css">
  <link rel="stylesheet" href="css/Theaterinfo.css" />
  <link rel="stylesheet" type="text/css" href="css/login.css">
  <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
  <script src="js/TheaterInfo.js"></script>
  <title>Theaterinfo</title>
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
                    <a href="Theaterbuyticket.php">劇場購票</a>
                </li>
                <li>
                    <a href="facilityBuyTicket.php">設施購票</a>
                </li>
                <li>
                    <a href="facilityInfo.php">設施介紹</a>
                </li>
            </ul>
            <h1 style="display: none">FutureAtlas_未來主題樂園</h1>
            <a href="#page1" class="logo_a">
                <img src="img/LOGO.png" class="logo">
            </a>
            <ul class="ul_right">
                <li>
                    <a href="#page2" id="NavClose">園區地圖</a><!-- ===請追加ID=== -->
                </li>
                <li>
                    <a href="activity.php">活動月曆</a>
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
          <img src="img/theater_page/Recycle_arrows_3.png" style="width:40px; height:30px;" class="Recycle_arrows">
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
        <a href="buyTTicket.php">立即購買</a>
      </div>
  </div>
  <!-- 導覽列 -->
	<script src="js/00nav.js"></script>
  
</body>
</html>