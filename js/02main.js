$(document).ready(function () {





	var hoverChangeImg = function () {
		var facility = $(this).attr("data-facility");
		$(this).attr('src', 'img/secondSection/' + facility + '_hover.png');
	};

	var hoverUnchangeImg = function () {
		var facility = $(this).attr("data-facility");
		$(this).attr('src', 'img/secondSection/' + facility + '.png');
	};
	$('.facility_icons').on("mouseover", hoverChangeImg);

	$('.facility_icons').on('mouseout', hoverUnchangeImg);



	$('.facility_icons').on("click", function checkedFacility() {
		var facility = $(this).attr("data-facility");
		// var checked_facility = $(this);
		// alert($('.facility_icons').index(this));
		var facility_index = $('.facility_icons').index(this);

		mapSmall();
		infoShowup();


		switch (facility_index) {
			case 0:
				$('.ferris_wheel').off('mouseout',hoverUnchangeImg);
				$('.ferris_wheel').attr("src", "img/secondSection/ferris_wheel_hover.png");
				$('.close').on("click", function () {
					mapBig();
					$('.ferris_wheel').attr("src", "img/secondSection/ferris_wheel.png");
				$('.ferris_wheel').on('mouseout', hoverUnchangeImg);
				});
				
				break;

			case 1:
				$('.roller_coaster').off('mouseout',hoverUnchangeImg);
				$('.roller_coaster').attr("src", "img/secondSection/roller_coaster_hover.png");
				$('.close').on("click", function () {
					mapBig();
					$('.roller_coaster').attr("src", "img/secondSection/roller_coaster.png");
				$('.roller_coaster').on('mouseout', hoverUnchangeImg);
				});
				break;
			case 2:
				$('.carousel').off('mouseout',hoverUnchangeImg);
				$('.carousel').attr("src", "img/secondSection/carousel_hover.png");
				$('.close').on("click", function () {
					mapBig();
					$('.carousel').attr("src", "img/secondSection/carousel.png");
				$('.carousel').on('mouseout', hoverUnchangeImg);
				});
				break;
			case 3:
				$('.coffee_cup').off('mouseout',hoverUnchangeImg);
				$('.coffee_cup').attr("src", "img/secondSection/coffee_cup_hover.png");
				$('.close').on("click", function () {
					mapBig();
					$('.coffee_cup').attr("src", "img/secondSection/coffee_cup.png");
				$('.coffee_cup').on('mouseout', hoverUnchangeImg);
				});
				break;
			case 4:
				$('.bumper_cars').off('mouseout',hoverUnchangeImg);
				$('.bumper_cars').attr("src", "img/secondSection/bumper_cars_hover.png");
				$('.close').on("click", function () {
					mapBig();
					$('.bumper_cars').attr("src", "img/secondSection/bumper_cars.png");
				$('.bumper_cars').on('mouseout', hoverUnchangeImg);
				});
				break;
				case 5:
				$('.theater').off('mouseout',hoverUnchangeImg);
				$('.theater').attr("src", "img/secondSection/theater_hover.png");
				$('.close').on("click", function () {
					mapBig();
					$('.theater').attr("src", "img/secondSection/theater.png");
				$('.theater').on('mouseout', hoverUnchangeImg);
				});
				break;
		}

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

		// function offMouseout() {
		// 	checked_facility.off('mouseout');
		// 	checked_facility.removeClass('unchecked');
		// 	checked_facility.attr("src", "img/secondSection/" + facility + "_hover.png");
		// };

		function infoShowup() {
			$('.info_content').css('display', 'none');
			$('.info_' + facility).css('display', 'block');
		};


		// $('.close').on("click", function () {
		// 	mapBig();
		// 	checked_facility.attr("src", "img/secondSection/" + facility + ".png");
		// });

	});

























	// $('.facility_icons').on("click", function checkedFacility() {
	// 	var facility = $(this).attr("data-facility");
	// 	var checked_facility = $(this);
	// 	mapSmall();
	// 	offMouseout();
	// 	infoShowup();

	// 	function offMouseout() {
	// 		checked_facility.off('mouseout');
	// 		checked_facility.removeClass('unchecked');
	// 		checked_facility.attr("src", "img/secondSection/" + facility + "_hover.png");
	// 	};

	// 	function infoShowup() {
	// 		$('.info_content').css('display', 'none');
	// 		$('.info_' + facility).css('display', 'block');
	// 	};

	// 	function mapSmall() {
	// 		$('.map').css('transform', 'scale(' + 0.4 + ')');
	// 		$('.map').animate({
	// 			top: '-20%'
	// 		}, 350);
	// 		$('.info').animate({
	// 			top: "50%"
	// 		}, 350);
	// 	};
	// 	function mapBig() {
	// 	  $('.map').css('transform', 'scale(' + 0.9 + ')');
	// 	  $('.map').animate({
	// 		  top: '0%'
	// 	  }, 350);
	// 	  $('.info').animate({
	// 		  top: "150%"
	// 	  }, 350);
	//   };

	// 	$('.unchecked').on('click', function () {
	// 		checked_facility.addClass('unchecked');
	// 		checked_facility.attr("src", "img/secondSection/" + facility + ".png");
	// 		checked_facility.on('mouseout', hoverUnchangeImg);
	// 		checked_facility.on('mouseover', hoverChangeImg);

	// 	});

	// 	$('.close').on("click", function () {
	// 	  mapBig();
	// 	  checked_facility.attr("src", "img/secondSection/" + facility + ".png");
	// 	});
	// });






});