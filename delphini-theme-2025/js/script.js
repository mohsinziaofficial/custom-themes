jQuery( document ).ready(function() {
	jQuery("nav li").hover(
	function(){
		jQuery(this).children('ul').hide();
		jQuery(this).children('ul').slideDown('fast');
	},
	function () {
		jQuery('ul', this).slideUp('fast');            
	});
    jQuery(".search-icon-class").click(function(){
		jQuery(".RelatedSearchBox").fadeToggle();
	});
	
	jQuery(".RelatedSearchClose i").click(function(){
		jQuery(".RelatedSearchBox").fadeOut();
	});
jQuery(function () {
    jQuery(document).ready(function () {
        var initialLogoHeight = jQuery('.logo-image').height(); // Get the initial height of the logo
        var initialHeaderHeight = jQuery('.sticky-head-nav').outerHeight(); // Store initial header height

        // Set fixed height to prevent layout shifts
        jQuery('.sticky-head-nav').css('min-height', initialHeaderHeight + 'px');

        jQuery(window).on('scroll', function () {
            if (jQuery(this).scrollTop() > 30) {
                jQuery('.sticky-head-nav').addClass('scrolled'); // Add class for styling changes
                
                jQuery('.logo-image').css({
                    'height': '70px',
                    'transition': 'height 0.6s ease'
                });
            } else {
                jQuery('.sticky-head-nav').removeClass('scrolled'); // Remove class when scrolling back
                
                jQuery('.logo-image').css({
                    'height': initialLogoHeight + 'px',
                    'transition': 'height 0.6s ease'
                });
            }
        });
    });
});

});