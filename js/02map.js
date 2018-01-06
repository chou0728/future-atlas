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
		mapSmall();
		offMouseout();
		infoShowup();

		function offMouseout() {
			checked_facility.off('mouseout',hoverUnchangeImg);
			checked_facility.removeClass('unchecked');
			checked_facility.attr("src", "img/secondSection/" + facility + "_hover.png");
		};

		function infoShowup() {
			$('.info_content').css('display', 'none');
			$('.info_' + facility).css('display', 'block');
		};

		function mapSmall() {
			$('.map').css('transform', 'scale(' + 0.4 + ')');
			$('.map').animate({
				top: '-20%'
			}, 350);
			$('.info').animate({
				top: "50%"
			}, 350);
		};
		function mapBig() {
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
		
		$('.close').on("click", function () {
		  mapBig();
		  checked_facility.attr("src", "img/secondSection/" + facility + ".png");
		  checked_facility.on('mouseout', hoverUnchangeImg);
		
		});
		

	});
	
	
	$('.open_iframe').on("click",function(){
		openIframe();

		function openIframe(){
			var body = document.getElementsByTagName("body")[0];
			var iframe = document.getElementById('facility01');
			var close = document.getElementById('close');
			// body.style.overflow = "hidden";
			iframe.style.height = "100%";
			iframe.style.opacity = "1";
			close.style.display = "block";
			close.onclick = closeIframe;
		
		}
		
		function closeIframe(){
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