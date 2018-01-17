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
			</li>
			<li class="navList">
				<a href="">劇場驗票</a>
				<span class="listcover"></span>
			</li>
			<li class="navList">
				<a href="back_facilityM.html" style="color: black;">設施管理</a>
				<span class="listcover" style="width: 100%;background-color: rgba(90, 230, 219,0.9);"></span>
			</li>
			<li class="navList">
				<a href="back_TheaterMang.">劇場管理</a>
				<span class="listcover"></span>
			</li>
			<li class="navList">
				<a href="back_activity.html">活動管理</a>
				<span class="listcover"></span>
			</li>
			<li class="navList">
				<a href="">會員管理</a>
				<span class="listcover"></span>
			</li>
			<li class="navList">
				<a href="">諮詢管理</a>
				<span class="listcover"></span>
			</li>
			<li class="navList">
				<a href="">權限管理</a>
				<span class="listcover"></span>
			</li>
		</ul>
	</header>
	<div class="loginBox mobileLoginBox">
			您好!<span id="managerId">最高管理員</span><span id="managerName">Manna</span>
			<a href="javascript:void(0)">登出</a>
	</div>


<!-- ===請由此複製============================================================= -->
	<div class="back_wrapper_right">
		<div class="b_content">
			<div class="b_sub_nav">
				<a href="javascript:void(0)" class="b_sn_btn" id="active" onclick="openCity(event,'facilityInfo')" >設施介紹管理</a>
				<a href="javascript:void(0)" class="b_sn_btn" onclick="openCity(event,'facilityTickets')" >設施上架管理</a>
			</div>
<!-- =====================請加內容至此====================-->
			<div class="b_inner_content">
	<!-- ===================1====================== -->
				<div id="facilityInfo" class="tabcontent">
					<div class="table">
					<div class="row">
						<div class="col col-title col-number">設施編號</div>
						<div class="col col-title">設施名稱</div>
						<div class="col col-title">主要照片</div>
						<div class="col col-title col-big">設施完整介紹</div>
						<div class="col col-title col-number">設施狀態</div>
						<div class="col col-title col-number">設施人潮</div>
						<div class="col col-title col-number">修改</div>
						<div class="col col-title">是否顯示至前台</div>
					</div>

<?php 
try {
	require_once("php/connectBooks.php");
	$sql = "select * from facility";
	$products = $pdo->query($sql);

	while($prodRow = $products->fetchObject()){
?>
					<div class="row">
						<div class="col col-number"><?php 
							echo $prodRow->facility_no ?></div><!-- 自動串號 -->
						<div class="col">
							<?php echo $prodRow->facility_name ?>
						</div>
						<div class="col">
							<img src="img/facilityInfo/<?php echo $prodRow->facility_mphoto ?>">
						</div>
						<div class="col col-article col-big">
							<?php echo $prodRow->facility_description?>
						</div>
						<div class="col col-number">
							<?php switch ($prodRow->facility_status) {
								case '0':
									echo "維修中";
									break;
								
								case '1':
									echo "正常";
									break;
								}
							?>
						</div>
						<div class="col col-number">
							<?php switch ($prodRow->facility_crowd) {
								case '1':
									echo "擁擠";
									break;
								
								case '2':
									echo "普通";
									break;

								case '3':
									echo "空曠";
									break;
								}
							?>
						</div>
						<!-- 隱藏欄位1 limit-->
						<div class="col" style="display: none"><?php echo $prodRow->facility_phrase ?></div>
						<div class="col" style="display: none"><?php echo $prodRow->facility_heart ?></div>
						<div class="col" style="display: none"><?php echo $prodRow->facility_suit ?></div>
						<div class="col" style="display: none"><?php echo $prodRow->facility_limit ?></div>
						<!-- 隱藏欄位1 limit-->
						<div class="col col-number">
							<div class="edit">EDIT</div>
						</div>
						<div class="col">
							<form name="already" action="update_facility_info.php" method="post" enctype="multipart/form-data">
							<input type="hidden" name="info_already" value="">
							<input type="hidden" name="facility_no" value="<?php echo $prodRow->facility_no ?>">
							<input type="file" name="facility_mphoto" style="display: none;">
							<?php 
								

								switch ($prodRow->info_already) {
								case '0':
									echo "
											<div class='btn' id='submit_true' data-already='1'>顯示</div>

											<div class='btn is-selected' data-already='0'>隱藏</div>";
									break;
								
								case '1':
									echo "<div class='btn is-selected' data-already='1'>顯示</div>
											<div class='btn' id='submit_true' data-already='0'>隱藏</div>";
									break;
								}
							?>
							</form>
						</div>
					</div>
<?php		
	}
} catch (PDOException $e) {
	echo "錯誤原因 : " , $e->getMessage() , "<br>";
	echo "錯誤行號 : " , $e->getLine() , "<br>";
	// echo "getCode : " , $e->getCode() , "<br>";
	// echo "異動失敗,請聯絡系統維護人員";
}
?> 				
				</div>
<div id="newfacilityInfo"></div>
				</div>
	<!-- ===================2====================== -->
				<div id="facilityTickets" class="tabcontent">
					<div class="table">
					<div class="row">
						<div class="col col-title col-number">設施編號</div>
						<div class="col col-title">設施名稱</div>
						<div class="col col-title">票券照片</div>
						<div class="col col-title col-big">設施簡介</div>
						<div class="col col-title col-number">全票票價</div>
						<div class="col col-title col-number">半票票價</div>
						<div class="col col-title col-number">修改</div>
						<div class="col col-title">是否上架</div>
					</div>

<?php 
try {
	require_once("php/connectBooks.php");
	$sql = "select * from facility";
	$products = $pdo->query($sql);

	while($prodRow = $products->fetchObject()){
?>
					<div class="row">
						<div class="col col-number"><?php 
							echo $prodRow->facility_no ?></div><!-- 自動串號 -->
						<div class="col">
							<?php echo $prodRow->facility_name ?>
						</div>
						<div class="col">
							<img src="img/facilityInfo/<?php echo $prodRow->facility_tphoto ?>">
						</div>
						<div class="col col-big">
							<?php echo $prodRow->facility_intro?>
						</div>
						<div class="col col-number">
							<?php echo $prodRow->full_fare ?>
						</div>
						<div class="col col-number">
							<?php echo $prodRow->half_fare ?>
						</div>
						<div class="col col-number">
							<div class="edit">EDIT</div>
						</div>
						<div class="col">
							<form>
							<?php switch ($prodRow->info_already) {
								case '0':
									echo "<div class='btn' data-already='1'>上架</div>

											<div class='btn is-selected' data-already='0'>下架</div>";
									break;
								
								case '1':
									echo "<div class='btn is-selected' data-already='1'>上架</div>

											<div class='btn' data-already='0'>下架</div>";
									break;
								}
							?>
							</form>
						</div>
					</div>
<?php		
	}
} catch (PDOException $e) {
	echo "錯誤原因 : " , $e->getMessage() , "<br>";
	echo "錯誤行號 : " , $e->getLine() , "<br>";
	// echo "getCode : " , $e->getCode() , "<br>";
	// echo "異動失敗,請聯絡系統維護人員";
}
?> 
					
				</div>
				</div>

				
			</div>
			<!-- ===========請加內容至此===========-->

<!-- ===========燈箱======================================-->
<div id="lightBox">

		<div class="lightBox-row lightBox-title">修改設施介紹資料</div>
		<form action="update_facility_info.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="info_already" value="3">
			<input type="hidden" name="facility_no" value="">
			<div class="lightBox-row">
				<span class="subtitle">設施編號：</span>
				<span id="facility_no"></span>
			</div>
			<div class="lightBox-row">
				<span class="subtitle">設施名稱：</span>
				<input type="text" name="facility_name" id="facility_name" value="" maxlength="10">
				<span class="caution">*最多10字</span>
			</div>
			<div class="lightBox-row">
				<span class="subtitle">主要照片：</span>
				<input type="hidden" name="MAX_FILE_SIZE" value="5242880">
				<input type="file" name="facility_mphoto" id="fm">
				<span class="caution">*檔名最多20字/檔案最大5M</span>
			</div>
			<div class="lightBox-row mphoto">
				<input type="button" name="" value="切換預覽" id="change-type">
				<div class="mphoto-img">
					<img src="" id="facility_mphoto">
				</div>
			</div>
			<div class="lightBox-row">
				<span class="subtitle">行銷用語：</span>
				<textarea name="facility_phrase" maxlength="200" id="facility_phrase"></textarea>
			</div>
			<div class="lightBox-row">
				<span class="subtitle">心跳指數：</span>
				<input type="text" name="facility_heart" id="facility_heart" value="" maxlength="10">
			</div>
			<div class="lightBox-row">
				<span class="subtitle">適合對象：</span>
				<input type="text" name="facility_suit" id="facility_suit" value="" maxlength="15">
			</div>
			<div class="lightBox-row">
				<span class="subtitle">限制：</span>
				<input type="text" name="facility_limit" id="facility_limit" value="" maxlength="15">
			</div>
			<div class="lightBox-row">
				<span class="subtitle">完整介紹：</span>
				<textarea name="facility_description" maxlength="200" id="facility_description"></textarea>
				<span class="caution">*最多200字</span>
			</div>
			<div class="lightBox-row">
				<span class="subtitle">設施狀態：</span>
				<select id="facility_status" name="facility_status">
					<option value="1">正常</option>
					<option value="0">維修中</option>
				</select>
			</div>
			<div class="lightBox-row">
				<span class="subtitle">設施人潮：</span>
				<select id="facility_crowd" name="facility_crowd">
					<option value="1">擁擠</option>
					<option value="2">普通</option>
					<option value="3">空曠</option>
				</select>
			</div>
			<div class="lightBox-row lightBox-submit">
				<input type="button" name="" value="清除修改" id="reset">
				<input type="submit" name="" value="確認修改">
			</div>
		</form>
</div>
		</div>
	</div>

<script>
//---換分頁
        function openCity (evt,list) {

            var i, tabcontent, b_sn_btn;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            b_sn_btn = document.getElementsByClassName("b_sn_btn");
            for (i = 0; i < b_sn_btn.length; i++) {
                b_sn_btn[i].setAttribute("id","");
            }
            document.getElementById(list).style.display = "block";

            evt.currentTarget.setAttribute("id","active");
        }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("active").click();

//---燈箱
function init(){
	var edit = document.getElementsByClassName('edit');
	for(i=0;i<edit.length;i++){
		edit[i].onclick = openLightBox;
	}
	// var reset = document.getElementById("reset");
	// reset.onclick = resetLightBox;
	var changeType = document.getElementById("change-type");
	changeType.onclick = changeImgType;

	var fm = document.getElementById("fm");
	fm.onchange = showImg;

	var submit_true = document.getElementById("submit_true");
	submit_true.onclick = frontAppear;


}
window.addEventListener("load",init);
function frontAppear(){
	var already = document.getElementsByName("already")[0];
	var submit_true = document.getElementById("submit_true");
	var info_already = document.getElementsByName("info_already")[0];
	var dami_mphoto = document.getElementsByName("facility_mphoto")[0];
	info_already.value = submit_true.dataset.already;
	dami_mphoto.value = "";
	already.submit();
}
function openLightBox(){	
	var no = this.parentElement.parentElement.children[0].innerText;
	var name = this.parentElement.parentElement.children[1].innerText;
	mphoto = this.parentElement.parentElement.children[2].innerHTML.split('"')[1];
	var description= this.parentElement.parentElement.children[3].innerText;
	var status = this.parentElement.parentElement.children[4].innerText;
	var crowds = this.parentElement.parentElement.children[5].innerText;
	var phrase = this.parentElement.parentElement.children[6].innerHTML;
	var heart = this.parentElement.parentElement.children[7].innerText;
	var suit = this.parentElement.parentElement.children[8].innerText;
	var limit = this.parentElement.parentElement.children[9].innerText;
	lightBox= document.getElementById("lightBox");
	facility_no = document.getElementById("facility_no");
	facility_name = document.getElementById("facility_name");
	facility_no_input = document.getElementsByName("facility_no")[1];
	facility_mphoto = document.getElementById("facility_mphoto");
	fm = document.getElementById("fm");//file
	facility_description = document.getElementById("facility_description");
	facility_status = document.getElementById("facility_status");
	facility_crowd = document.getElementById("facility_crowd");
	facility_phrase = document.getElementById("facility_phrase");
	facility_heart = document.getElementById("facility_heart");
	facility_suit = document.getElementById("facility_suit");
	facility_limit = document.getElementById("facility_limit");

	//resetLightBox用

	_facility_no = no;
	_facility_name = name;
	_facility_mphoto = mphoto;
	_facility_description = description;
	_status = status;
	_crowds = crowds;
	_facility_phrase = phrase;
	_facility_heart  = heart;
	_facility_suit = suit;
	_facility_limit = limit;

	facility_no_input.value = no;
	facility_no.innerHTML = no;
	facility_name.value = name;
	facility_mphoto.src = mphoto;
	fm.filename = mphoto;
	facility_phrase.value = phrase;
	facility_heart.value  = heart;
	facility_suit.value = suit;
	facility_limit.value = limit;
	facility_description.value = description;
	switch(status){
		case "正常":
		facility_status.options[0].selected=true;
		break;
		case "維修中":
		facility_status.options[1].selected=true;
		break;

	}
	switch(crowds){
		case "擁擠":
		facility_crowd.options[0].selected=true;
		break;
		case "普通":
		facility_crowd.options[1].selected=true;
		break;
		case "空曠":
		facility_crowd.options[2].selected=true;
		break;
	}
	lightBox.style.display = "block";	
}

// function resetLightBox(){
// 	facility_no.innerHTML= _facility_no;
// 	facility_name.value = _facility_name;
// 	facility_mphoto.src = _facility_mphoto;
// 	facility_no_input.value = _facility_no;
// 	facility_description.value = _facility_description;
// 	fm.value = "";
// 	switch(_status){
// 		case "正常":
// 		facility_status.options[0].selected=true;
// 		break;
// 		case "維修中":
// 		facility_status.options[1].selected=true;
// 		break;

// 	}
// 	switch(_crowds){
// 		case "擁擠":
// 		facility_crowd.options[0].selected=true;
// 		break;
// 		case "普通":
// 		facility_crowd.options[1].selected=true;
// 		break;
// 		case "空曠":
// 		facility_crowd.options[2].selected=true;
// 		break;
// 	}
// }
function closeLightBox(){
	lightBox.style.display = "none";
}
function changeImgType(){
	var lightBoxRow = document.getElementsByClassName('lightBox-row')[4];
	if(lightBoxRow.className.indexOf("mphoto")!=-1){
		lightBoxRow.className = lightBoxRow.className.replace("mphoto","mlb");
	}else{
		lightBoxRow.className = lightBoxRow.className.replace("mlb","mphoto");
	}
	
}
function showImg(){
	var reader = new FileReader();
	reader.onload = function(){
		var dataURL = reader.result;
		facility_mphoto.src= dataURL;
	};
	reader.readAsDataURL(this.files[0]);
}
// function checkthe
</script>

</body>
</html>