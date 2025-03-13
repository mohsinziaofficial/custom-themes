

jQuery( document ).ready(function() {
	
//	jQuery('#search-input').focus(function() {
//		jQuery(this).animate({width: '200px'}, 500);
//	});
//
//	jQuery('#search-input').blur(function() {
//		jQuery(this).animate({width: '100px'}, 500);
//	});

	
	
	jQuery('.AboutImg').slick({
		infinite: true,
		slidesToShow: 3,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 0,
		speed: 5000,
		cssEase: "linear",
		pauseOnHover: false,
		arrows: false,
		dots: false,
		touchMove: false,
		swipeToSlide: false,
		swipe: false,
		pauseOnFocus: false,
		focusOnSelect: false,
		vertical: true,
	});
	
	jQuery('.Perks').slick({
		infinite: true,
		slidesToShow: 3,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 0,
		speed: 5000,
		cssEase: "linear",
		pauseOnHover: false,
		arrows: false,
		dots: false,
		touchMove: false,
		swipeToSlide: false,
		swipe: false,
		pauseOnFocus: false,
		focusOnSelect: false,
		nextArrow: '<div class="nextArrow"><i class="fa-solid fa-chevron-right"></i></div>',
		prevArrow: '<div class="prevArrow"><i class="fa-solid fa-chevron-left"></i></div>',		
	});
	
	jQuery('.FeaturedBoxesWrap').slick({
		slidesToShow: 4,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 2000,
		infinite: true,
		nextArrow: '<div class="nextArrow"><i class="fa-solid fa-chevron-right"></i></div>',
		prevArrow: '<div class="prevArrow"><i class="fa-solid fa-chevron-left"></i></div>',
		responsive: [
		{
			breakpoint: 812,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: false,
				}
			},
		]
	});
	
	jQuery('.IconTextSlider').slick({
		slidesToShow: 4,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 2000,
		infinite: true,
		nextArrow: '<div class="nextArrow"><i class="fa-solid fa-chevron-right"></i></div>',
		prevArrow: '<div class="prevArrow"><i class="fa-solid fa-chevron-left"></i></div>',
		adaptiveHeight: true,
	});
	
	jQuery('.IconTextSliderTwo').slick({
		slidesToShow: 2,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 2000,
		infinite: true,
		nextArrow: '<div class="nextArrow"><i class="fa-solid fa-chevron-right"></i></div>',
		prevArrow: '<div class="prevArrow"><i class="fa-solid fa-chevron-left"></i></div>',
		adaptiveHeight: true,
	});
	
	jQuery('.TestimonialInner').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 5000,
		infinite: true,
		dots: true,
		arrows: false,
		pauseOnHover: true,
	});
	
	jQuery('.PlatformSlide').slick({
		infinite: true,
		slidesToShow: 5,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 0,
		speed: 5000,
		cssEase: "linear",
		pauseOnHover: false,
		arrows: false,
		dots: false,
		touchMove: false,
		swipeToSlide: false,
		swipe: false,
		pauseOnFocus: false,
		focusOnSelect: false,
		responsive: [
		{
			breakpoint: 812,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: false,
				}
		},
		{
			breakpoint: 1024,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 1,
				arrows: false,
				}
		},
			
		]
	});
	jQuery('.IntergrationPageWrap .integrationUL').slick({
		infinite: true,
		slidesToShow: 4,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 0,
		speed: 5000,
		cssEase: "linear",
		pauseOnHover: false,
		arrows: false,
		dots: false,
		touchMove: false,
		swipeToSlide: false,
		swipe: false,
		pauseOnFocus: false,
		focusOnSelect: false,
	});
	

	jQuery( ".menu-item-has-children" ).hover(function() {
		jQuery(".sub-menu", this).slideToggle("fast");
	});
	
	
	
	jQuery( ".MenuCross" ).click(function() {
		jQuery( ".FlyoutMenu" ).toggleClass( "displayed" );
	});
	jQuery( ".MobileMenu" ).click(function() {
		jQuery( ".FlyoutMenu" ).toggleClass( "displayed" );
	});
	
	
	jQuery( ".FlyoutMenu .menu-item-has-children > a" ).after( '<i class="fas fa-chevron-down"></i>' );
	
	
	jQuery('.FlyoutMenu .sub-menu').hide();
	
	
	jQuery(".FlyoutMenu .menu-item-has-children i").click(function() {		
		jQuerythis = jQuery(this); 
		jQuerythis.siblings("ul").slideToggle("fast");
	});
	jQuery(".FlyoutMenu .menu-item-has-children i").click(function(e) {
		e.stopPropagation(); //Stops parent menu closing when child is clicked
	});

	
});