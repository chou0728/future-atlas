

	window.addEventListener('load',mapControl);
	// ================================================= 設施詳細介紹燈箱 =========================================
		

	window.addEventListener('load',ajax_init);


	function ajax_init(){
		var open_iframe = document.getElementsByClassName("open_iframe");
		for(var a =0;a<open_iframe.length;a++){
			open_iframe[a].addEventListener("click",ajax_lightbox,false);
		}
	}

	function ajax_lightbox(e) {

		
		var body = document.getElementsByTagName("body")[0];
		lightBoxF = document.getElementById('facility01');
		var close = document.getElementById('close');
		body.style.overflow = "hidden";
		lightBoxF.style.height = "100vh";
		lightBoxF.style.opacity = "1";
		close.style.display = "block";
		// close.onclick = closelightBoxF;
		var f_no = e.currentTarget.dataset.no;
		
	
			var xhr = new XMLHttpRequest();
			xhr.onload = function () {
	
				if (xhr.status == 200) {
					
					var main_photo = document.getElementById('main_photo');
					var title = document.getElementsByClassName('title')[6];
					var subTitle = document.getElementsByClassName('subTitle')[0];
					var paraLeft = document.getElementsByClassName('paraLeft')[0];
					var heartbeat = document.getElementsByClassName('heartbeat')[0];
					var suit = document.getElementsByClassName('suit')[0];
					var limit = document.getElementsByClassName('limit')[0];
					var getTicket = document.getElementById("getTicket");
					var info = document.getElementsByClassName('info')[1];
					var scoreAverage = document.getElementsByClassName('scoreAverage')[0];
					var counts = document.getElementsByClassName('kai')[0];
					var comment = document.getElementById("comment");
					var star_points_bar = document.getElementById('star_points_bar');
					var goComment = document.getElementById('goComment');
					var facility = JSON.parse(xhr.responseText);//將透過ajax傳回來的json型態的資料轉換成js的物件
	
	
					main_photo.innerHTML = "<img src='img/facilityInfo/"+facility.facility_mphoto+"'>";
					title.innerText = facility.facility_name;
					subTitle.innerText = facility.facility_subname;//透過物件的操作就可以帶值進去span中(SQL中欄位名稱直接變屬性)
					paraLeft.innerHTML = facility.facility_phrase;
					heartbeat.innerText = facility.facility_heart;
					suit.innerHTML = "<span>適合對象</span>"+facility.facility_suit;
					limit.innerHTML = "<span>限制</span>"+facility.facility_limit;
					if((facility.facility_no)==7){
							getTicket.href = "Theaterbuyticket.php";
						}else{
							getTicket.href = "facilityBuyTicket.php";
						}
					info.innerText = facility.facility_description;
					if(facility.av == 0){
						scoreAverage.innerHTML = "總平均<span>"+facility.av.toFixed(0)+"</span>分";
					}else if(facility.av.toFixed(1).split(".")[1]==0){
						scoreAverage.innerHTML = "總平均<span>"+facility.av.toFixed(0)+"</span>分";
					}else{
						scoreAverage.innerHTML = "總平均<span>"+facility.av.toFixed(1)+"</span>分";
					}
					counts.innerHTML = "總評分次數<span>"+facility.counts+"</span>次";
					
					comment.innerHTML = facility.comment;
					star_points_bar.style.width = facility.width + "%";
					goComment.dataset.facilityNo = facility.facility_no;
								   
	
	
				} else{
					alert(xhr.status);
								
					  }
	
			}
	
			var url = "ajax_facility_info.php?facility_no="+f_no;
			xhr.open("Get", url, true);
			xhr.send(null);
	
		};





// ======================= mapControl ===============================

	function mapControl(){

		
		var hoverChangeImg = function () {
			var facility = $(this).attr("data-facility");
			$(this).attr('src', 'img/secondSection/' + facility + '_hover.png');
		};
	
		var hoverUnchangeImg = function () {
			var facility = $(this).attr("data-facility");
			$(this).attr('src', 'img/secondSection/' + facility + '.png');
		};
		$('.unchecked').on("mouseover", hoverChangeImg);
	
		$('.unchecked').on('mouseout', hoverUnchangeImg);
		
		//頁面一載入就要預設開啟某個設施的資訊和亮該設施

		$('.info_content').css('display', 'none');
		$('.info_ferris_wheel').css('display', 'block');
		$('.ferris_wheel').attr("src", "img/secondSection/ferris_wheel_hover.png");





	
		$('.facility_icons').on("click", function checkedFacility() {
			var facility = $(this).attr("data-facility");
			var checked_facility = $(this);
			var screen_width = document.documentElement.clientWidth;
			
			
	
			if (screen.width <= 414) {
				// alert("手機");
				$('.ferris_wheel').attr("src", "img/secondSection/ferris_wheel.png");
				infoShowup();
				offMouseout();
				
			} else if (screen_width <= 767 && 415 <= screen_width) {
				// alert("平板1");
				$('.ferris_wheel').attr("src", "img/secondSection/ferris_wheel.png");
				infoShowup();
				offMouseout();
			} else if (screen_width <= 1023 && 768 <= screen_width) {
				// alert("平板2");
				infoShowup();
				mapSmall_pad();
				offMouseout();
				$('.close').on("click", function () {
					mapBig_pad();
					checked_facility.attr("src", "img/secondSection/" + facility + ".png");
					checked_facility.on('mouseout', hoverUnchangeImg);
		
				});
			}else if(screen_width >1024) {
				// alert("PC");
				infoShowup();
				mapSmall_pc();
				offMouseout();
				$('.close').on("click", function () {
					mapBig_pc();
					checked_facility.attr("src", "img/secondSection/" + facility + ".png");
					checked_facility.on('mouseout', hoverUnchangeImg);

		
				});
				
			}
			
	
	
			function offMouseout() {
				checked_facility.off('mouseout', hoverUnchangeImg);
				checked_facility.removeClass('unchecked');
				checked_facility.attr("src", "img/secondSection/" + facility + "_hover.png");
			};
	
			function infoShowup() {
				$('.info_content').css('display', 'none');
				$('.info_' + facility).css('display', 'block');
			};
	
			// function mapSmall_phone() {
			// 	$('.info').stop().animate({
			// 		top: "35%"
			// 	}, 350);
			// 	$('.map').css('transform', 'scale(' + 2.5+ ')');
			// 	if(facility=="ferris_wheel"){
			// 		$('.map').stop().animate({
			// 			top: '30%',
			// 			left: '-30%'
			// 		}, 400);
			// 	}else if(facility=="roller_coaster"){
			// 		$('.map').stop().animate({
			// 			top: '20%',
			// 			left: '76%'
			// 		}, 350);
			// 	}
			// 	else if(facility=="carousel"){
			// 		$('.map').stop().animate({
			// 			top: '15%',
			// 			left: '16%'
			// 		}, 350);
			// 	}
			// 	else if(facility=="coffee_cup"){
			// 		$('.map').stop().animate({
			// 			top: '8%',
			// 			left: '58%'
			// 		}, 350);
			// 	}
			// 	else if(facility=="bumper_cars"){
			// 		$('.map').stop().animate({
			// 			top: '15%',
			// 			left: '-25%'
			// 		}, 350);
			// 	}
			// 	else if(facility=="theater"){
			// 		$('.map').stop().animate({
			// 			top: '15%',
			// 			left: '-80%'
			// 		}, 350);
			// 	}
				
				
			// };
	
			function mapSmall_pad() {
				$('.map').css('transform', 'scale(' + 1+ ')');
				
					$('.map').stop().animate({
						top: '10%'
					}, 350);
				
				
				$('.info').stop().animate({
					top: "50%"
				}, 350);
			};
			function mapSmall_pc() {
				$('.map').css('transform', 'scale(' + 0.4 + ')');
				$('.map').stop().animate({
					top: '-20%'
				}, 350);
				$('.info').stop().animate({
					top: "50%"
				}, 350);
			};
	
			
	
			
	
	
			// function mapBig_phone() {
			// 	$('.map').css('transform', 'scale(' + 0.9 + ') translateY(-'+ 50+ '%)');
			// 	$('.map').stop().animate({
			// 		top: '50%',
			// 		left: '0%'
			// 	}, 350);
			// 	$('.info').stop().animate({
			// 		top: "150%"
			// 	}, 350);
			// };
			function mapBig_pad() {
				$('.map').css('transform', 'scale(' + 0.9 + ')');
				$('.map').stop().animate({
					top: '30%'
				}, 350);
				$('.info').stop().animate({
					top: "150%"
				}, 350);
			};
			function mapBig_pc() {
				$('.map').css('transform', 'scale(' + 0.9 + ')');
				$('.map').stop().animate({
					top: '0%'
				}, 350);
				$('.info').stop().animate({
					top: "150%"
				}, 350);
			};
	
			$('.unchecked').on('click', function () {
				checked_facility.addClass('unchecked');
				checked_facility.attr("src", "img/secondSection/" + facility + ".png");
				checked_facility.on('mouseout', hoverUnchangeImg);
				checked_facility.on('mouseover', hoverChangeImg);
	
			});
	
			
	
	
		});
	
	
		$('.open_iframe').on("click", function () {
			openIframe();
	
			function openIframe() {
				var body = document.getElementsByTagName("body")[0];
				var iframe = document.getElementById('facility01');
				var close = document.getElementById('close');
				// body.style.overflow = "hidden";
				iframe.style.height = "100%";
				iframe.style.opacity = "1";
				close.style.display = "block";
				close.onclick = closeIframe;
	
			}
	
			function closeIframe() {
				var body = document.getElementsByTagName("body")[0];
				var iframe = document.getElementById('facility01');
				var close = document.getElementById('close');
				iframe.style.height = "0";
				iframe.style.opacity = "0";
				close.style.display = "none";
				// body.style.overflow = "auto";
			}
	
	
		})

	}

	


	








