(function ($) {
	$(document).ready(function () {
    $('.current-menu-item a').addClass('no-line');
		// Check elements normally
		inViewport();
		imageParallax();
	});

	// Trigger inViewport when the page is fully loaded
	$(window).on('load', function () {
		inViewport();
	});
	
	// check on page scroll
	$(window).scroll(function () {
		inViewport();
	});
//  
  function inViewport() {
    $(
      '.heroSection .featuredImage div,' +
      '.aboutSection'
    ).each(function () {
      var divPos = $(this).offset().top,
        topOfWindow = $(window).scrollTop();
      if (divPos < topOfWindow + 800) {
        $(this).addClass('animate');
      }
    });

    $('.servicesSection .serviceItem').each(function () {
      var divPos = $(this).offset().top,
        topOfWindow = $(window).scrollTop();
      if (divPos < topOfWindow + 800) {
        $(this).addClass('animate');
      }
    });
  }

  function imageParallax() {
    const $image = $('.imageTilt img');
    const maxMovement = 20; // Maximum additional movement (from -100px to -120px)
    let isUpdating = false; // Throttle flag

    $(document).on('mousemove', function (event) {
      if (isUpdating) return; // Skip if an update is already in progress
      isUpdating = true; // Set flag to true

      requestAnimationFrame(() => {
        const windowWidth = $(window).width();
        const windowHeight = $(window).height();
        const mouseX = event.pageX;
        const mouseY = event.pageY;
        // Calculate the percentage of cursor position relative to the window size
        const moveX = (mouseX / windowWidth) * maxMovement; // Range: 0 to 20
        const moveY = (mouseY / windowHeight) * maxMovement; // Range: 0 to 20
        // Update the left and bottom properties within the range of -100px to -120px
        $image.css({
          'left': `-${100 + moveX}px`, // Fluctuates between -100px and -120px
          'bottom': `-${100 + moveY}px`, // Fluctuates between -100px and -120px
          'transition': 'none',
        });
        isUpdating = false; // Reset flag after update
      });
    });
  }
})(jQuery);
