(function($) {
  
  $(document).ready(function() {
    
    //services slider
    serviceSlider();
    
    $('.search-icon i').click(function() {
      $('.search-form-popup').addClass('show');
      $('.search-form-popup .popup-overlay').addClass('animate');
      $('.search-form-popup .search-form-div').addClass('animate');
    });
    
    $('.search-form-popup .search-form-div .popup-close-btn span').click(function() {
      $('.search-form-popup').removeClass('show');
    });

  });
    
  function serviceSlider() {
    
		var sliderSettings = {
      slidesToShow: 4,
      slidesToScroll: 1,
//      autoplay: true,
      centerMode: true,
      speed: 1000,
      autoplaySpeed: 5000,
      infinite: true,
      dots: false,
      arrows: false,
      pauseOnHover: true,
      swipe: true,
      touchThreshold: 100,
      responsive: [
        {
            breakpoint: 1300,
            settings: {
              slidesToShow: 3,
            }
        },
        {
            breakpoint: 1000,
            settings: {
              slidesToShow: 2,
//              arrows: false,
            }
        },
        {
            breakpoint: 700,
            settings: {
              slidesToShow: 1,
            }
        },
        {
            breakpoint: 400,
            settings: {
              slidesToShow: 1,
              arrows: false,
            }
        },
      ]
    };


		// Start slider when page is loaded fully
		$(window).on('load', function() {
			// assigning the settiings to slick slider
		    $('.SliderInner').slick(sliderSettings);
		});
  }

})(jQuery);





