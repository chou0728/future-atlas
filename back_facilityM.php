<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/RESET.css">
	<link rel="stylesheet" href="css/11back_nav.css">
	<link rel="stylesheet" href="css/back_facility_M.css">
</head>
<body>
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
				<a href="back_facilityM.html" style="color: black;">設施管理</a>
				<span class="listcover" style="width: 100%;background-color: rgba(90, 230, 219,0.9);"></span>
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
			您好!<span id="managerId">最高管理員</span><span id="managerName">Manna</span>
			<a href="javascript:void(0)">登出</a>
	</div>


<!-- ===請由此複製=============================================================== -->
	<div class="back_wrapper_right">
		<div class="b_content">
			<div class="b_sub_nav">
				<a href="javascript:void(0)" class="b_sn_btn" id="active" onclick="openCity(event,'facilityInfo')" >設施介紹管理</a>
				<a href="javascript:void(0)" class="b_sn_btn" onclick="openCity(event,'facilityTickets')" >設施上架管理</a>
			</div>
			<!-- ===========請加內容至此===========-->
			<div class="b_inner_content">
				<div id="facilityInfo" class="tabcontent">
					<div class="row">
						<div class="col col-title">設施編號</div>
						<div class="col col-title">設施名稱</div>
						<div class="col col-title">主要照片</div>
						<div class="col col-title">設施完整介紹</div>
						<div class="col col-title">設施狀態</div>
						<div class="col col-title">設施人潮</div>
					</div>
					<div class="row">
						<div class="col"></div><!-- 自動串號 -->
						<div class="col">
							<input type="text" name="facility_name" value="<?php 
							echo '設施人潮';

							?>">
						</div>
						<div class="col">
							<input type="text" name="facility_mphoto" value="<?php 
							echo '';

							?>">
						</div>
						<div class="col">
							<input type="text" name="facility_description" value="<?php 
							echo '';

							?>">
						</div>
						<div class="col">
							<input type="text" name="facility_status" value="<?php 
							echo '';

							?>">
						</div>
						<div class="col"></div>
					</div>
				</div>
				<div id="facilityTickets" class="tabcontent">
					
				</div>
			</div>
			<!-- ===========請加內容至此===========-->
		</div>
	</div>

	<script>
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
</body>
</html>