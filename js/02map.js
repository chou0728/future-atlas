$(document).ready(function () {

	

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


	$('.facility_icons').on("click", function checkedFacility() {
		var facility = $(this).attr("data-facility");
		var checked_facility = $(this);
		var screen_width = document.documentElement.clientWidth;
		
		infoShowup();

		if (screen.width <= 414) {
			// alert("手機");
			mapSmall_phone();
			$('.close').on("click", function () {
				mapBig_phone();
				checked_facility.attr("src", "img/secondSection/" + facility + ".png");
				checked_facility.on('mouseout', hoverUnchangeImg);
	
			});
		} else if (screen_width <= 1024 && 415 <= screen_width) {
			// alert("平板");
			$('.close').on("click", function () {
				mapBig_pad();
				checked_facility.attr("src", "img/secondSection/" + facility + ".png");
				checked_facility.on('mouseout', hoverUnchangeImg);
	
			});
		} else {
			// alert("PC");
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

		function mapSmall_phone() {
			$('.info').animate({
				top: "35%"
			}, 350);
			$('.map').css('transform', 'scale(' + 2.5+ ')');
			if(facility=="ferris_wheel"){
				$('.map').animate({
					top: '30%',
					left: '-30%'
				}, 350);
			}else if(facility=="roller_coaster"){
				$('.map').animate({
					top: '20%',
					left: '76%'
				}, 350);
			}
			else if(facility=="carousel"){
				$('.map').animate({
					top: '15%',
					left: '16%'
				}, 350);
			}
			else if(facility=="coffee_cup"){
				$('.map').animate({
					top: '8%',
					left: '58%'
				}, 350);
			}
			else if(facility=="bumper_cars"){
				$('.map').animate({
					top: '15%',
					left: '-25%'
				}, 350);
			}
			else if(facility=="theater"){
				$('.map').animate({
					top: '15%',
					left: '-80%'
				}, 350);
			}
			
			
		};

		function mapSmall_pad() {
			$('.map').css('transform', 'scale(' + 2.5+ ')');
			if(facility=="ferris_wheel"){
				$('.map').animate({
					left: '-30%'
				}, 350);
			}
			
			$('.info').animate({
				top: "50%"
			}, 350);
		};
		function mapSmall_pc() {
			$('.map').css('transform', 'scale(' + 0.4 + ')');
			$('.map').animate({
				top: '-20%'
			}, 350);
			$('.info').animate({
				top: "50%"
			}, 350);
		};

		

		


		function mapBig_phone() {
			$('.map').css('transform', 'scale(' + 0.9 + ') translateY(-'+ 50+ '%)');
			$('.map').animate({
				top: '50%',
				left: '0%'
			}, 350);
			$('.info').animate({
				top: "150%"
			}, 350);
		};
		function mapBig_pad() {
			$('.map').css('transform', 'scale(' + 0.9 + ')');
			$('.map').animate({
				top: '0%'
			}, 350);
			$('.info').animate({
				top: "150%"
			}, 350);
		};
		function mapBig_pc() {
			$('.map').css('transform', 'scale(' + 0.9 + ')');
			$('.map').animate({
				top: '0%'
			}, 350);
			$('.info').animate({
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





});