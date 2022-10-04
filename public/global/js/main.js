$(document).ready(function () {
	'use strict';
	// ==================== Start Navbar =====================
	let fixed = true;

	function getScroll() {
		if (window.scrollY > 100) {
			if (fixed) {
				$('nav.navbar').addClass('fixed-top nav-fixed');
				fixed = false;
			}
		} else {
			$('nav.navbar').removeClass('fixed-top nav-fixed');
			fixed = true;
		}
	}

	$(window).on('scroll', function () {
		getScroll();
	});
	getScroll();

	// Open And Close Navbar In Mobile
	const navbarMobile = $('.navbar-collapse');
	$('#open-nav').on('click', function () {
		navbarMobile.addClass('open');
	});
	$('#close-nav').on('click', function () {
		navbarMobile.removeClass('open');
	});
	// ==================== End Navbar =====================

	// ==================== Start Client Slider =====================
	let owl = $('.clients-carousel');
	owl.owlCarousel({
		nav: !0,
		loop: !0,
		margin: 10,
		autoplay: !0,
		autoplayTimeout: 2e3,
		responsive: {
			0: { items: 1 },
			576: { items: 2 },
			768: { items: 3 },
			992: { items: 4 },
		},
	});
	// ==================== End Client Slider =====================
  // ==================== Start Project Description =====================
  $('.show-project').on('click', function () {
    let projectText = $(this).siblings('.project-text');
    projectText.toggleClass('show');
    if (projectText.hasClass('show')) {
      $(this).text('Show Less');
    } else {
      $(this).text('Show More');
    }
  });
  // ==================== End Project Description =====================
});
