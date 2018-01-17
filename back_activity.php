<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>FA後台</title>
	<!-- ======請複製==== -->
	<link rel="stylesheet" type="text/css" href="css/RESET.css">
	<link rel="stylesheet" type="text/css" href="css/11back_nav.css">
	<link rel="stylesheet" type="text/css" href="css/back_activity.css">
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
				<a href="back_check_facility_tickets.html">設施驗票</a>
				<span class="listcover"></span>
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
				<a href="back_activity.html" style="color: black;">活動管理</a>
				<span class="listcover" style="width: 100%;background-color: rgba(90, 230, 219,0.9);"></span>
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
				<a href="javascript:void(0)" class="b_sn_btn" onclick="openCity(event,'insert_activity')" id="active">新增活動</a>
                <a href="javascript:void(0)" class="b_sn_btn" onclick="openCity(event,'history_activity')">歷史活動</a>
			</div>
	<!-- ===========請加內容至此===========-->
	<div id="insert_activity" class="tabcontent">
	<h2 class="titleh2">新增活動</h2>
	<form action="insert_activity.php" method="post">
	<table>
		<tr>
			<th>編號</th>
			<th>活動名稱</th>
			<th>活動簡稱</th>
			<th>活動地點</th>
			<th>活動日期</th>
			<th>開始時間</th>
			<th>結束時間</th>
			<th>活動簡介</th>
			<!-- <th id="activity_filename">圖片檔名</th> -->
			<th>設定</th>
		</tr>
		<tr>			
			<td name="activity_no">1</td>
			<td><input type="textarea" wrap="virtual" name="activity_name" id="activity_name" placeholder="10字內" size="10" rows="2" required></td>			
			<td><input type="textarea" wrap="virtual" name="activity_short_name" id="activity_short_name" placeholder="5字內" size="5" rows="2" required></td>
			<td>
				<select name="activity_location" required>
					<option value="未來大道">未來大道</option>
					<option value="明日之廳">明日之廳</option>
					<option value="國際會議中心">國際會議中心</option>
					<option value="演講廳">演講廳</option>
					<option value="貿易中心">貿易中心</option>
					<option value="空中花園">空中花園</option>
					<option value="旋轉餐廳">旋轉餐廳</option>
				</select>
			</td>
			<td><input type="date" name="activity_date" required></td>
			<td><input type="time" name="activity_start_time" required></td>
			<td><input type="time" name="activity_end_time" required></td>
			<td><input type="textarea" wrap="virtual" name="activity_intro" placeholder="15字內" size="10" rows="3" required></td>
			<!-- <td><input type="file" name="activity_filename"></td> -->
			<td><input type="reset" name="">
				<input type="submit" name="" value="上架">
			</td>
		</tr>
	</table>
	</form>
	</div>
	<!-- ===========請加內容至此===========-->
	<div id="history_activity" class="tabcontent">
	<h2 class="titleh2">歷史活動</h2>
	<form action="back_activity.php" method="post">
	<table>
		<tr>
			<th>編號</th>
			<th>活動名稱</th>
			<th>活動簡稱</th>
			<th>活動地點</th>
			<th>活動日期</th>
			<th>開始時間</th>
			<th>結束時間</th>
			<th>活動簡介</th>
			<th>設定</th>
		</tr>
		<tr>			
			<td class="b_activity_no"></td>
			<td class="b_activity_name"></td>			
			<td class="b_activity_short_name"></td>
			<td class="b_activity_location"></td>
			<td class="b_activity_date"></td>
			<td class="b_activity_start_time"></td>
			<td class="b_activity_end_time"></td>
			<td class="b_activity_intro"></td>
			<td><input type="reset" name="" value="修改"><br>
				<input type="submit" value="確定"><br>
				<input type="button" name="" value="刪除">
			</td>
		</tr>
	</table>
	</form>
		</div>
	</div>
<script>
		// 調出歷史資料
		document.getElementsByClassName("b_sn_btn")[1].addEventListener("click",history_activity);
		function history_activity(){
			var xhr = XMLHttpRequest();
			xhr.onload = function (){
    			if( xhr.status == 200){ //OK}
    				
				}
			}
		}
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
    </script>
</body>
</html>
