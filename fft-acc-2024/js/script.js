(function($) {
  
  $(document).ready(function($) {
    
    // Initial check
    checkWidth();
    
    // Check on resize
    $(window).resize(checkWidth);
    
    menuSettings(); // desktop and mobile menu functionality
    
    animations_on_page_load(); // animations on page load
    
    inViewport() // check normally
    
    // check on page scroll
    $(window).scroll(function() {
     inViewport();
    });
    
    // check on window resizing
    $(window).resize(function() {
     inViewport();
    });
    
    // flip image animation
    flipImage();
    
    // custom accordion
    customAccordion();
    
    //services slider
    serviceSlider();

  });
  
  function menuSettings() {
    // desktop menu drop down
    $("nav li").hover(
      function(){
        $(this).children('ul').hide();
        $(this).children('ul').slideDown('fast');
      },
      function() {
        $('ul', this).slideUp('fast');
      }
    );

    // for search bar
    $('.search-icon').click(
      function() {
        $('form').toggleClass('showSearchForm');
    });
    
    // for mobile menu hover
    $('#rmp-menu-768 > li:last-child').hide();
    $('#rmp-menu-768 .current-menu-item').css({ 'background-color' : 'var(--yellow)' });
    $('#rmp-menu-768 .current-menu-item .rmp-menu-subarrow').css({ 'color' : 'var(--black)' });
    
    $('#rmp-menu-768 .rmp-menu-item').hover(
      function() {
        $(this).css({ 'background-color' : 'var(--yellow)' });
        $(this).find('.rmp-menu-subarrow').css({ 'color' : 'var(--black)' });
    },
      function() {
        $(this).css({ 'background-color' : 'transparent' });        
        $(this).find('.rmp-menu-subarrow').css({ 'color' : 'var(--white)' });
        $('#rmp-menu-768 .current-menu-item').css({ 'background-color' : 'var(--yellow)' });
        $('#rmp-menu-768 .current-menu-item .rmp-menu-subarrow').css({ 'color' : 'var(--black)' });
    });
  }
  
  function inViewport() {

    $('.cubes-top-left, .cubes-bottom-right').each(function() {
      var divPos = $(this).offset().top,
         topOfWindow = $(window).scrollTop();

     if( divPos < topOfWindow + 800 ) {
       $(this).addClass('animate');
     }
     else {
       $(this).removeClass('animate');
     }
    });
    
  }

  function flipImage() {
    
    $('.flip-bullet > p').hover(
      function () {
        $('.flip-card-inner').addClass('flip');
        $(this).next('.flip-content').addClass('show-flip-content');
      },
      function() {
        $('.flip-card-inner').removeClass('flip');
        $(this).next('.flip-content').removeClass('show-flip-content');
      }
    );
    
  }

  function animations_on_page_load() {
    
    // home page
    $('.hero-img').addClass('animate');
    $('.hero .overlay .intro-area').addClass('animate');
    $('.hero .overlay .intro-area .yellow-bg-button').addClass('animate');
    
    setTimeout(function() {
      $('.hero .overlay .intro-area .yellow-bg-button').removeClass('animation-delay');
    }, 2000);
    
    
    // inner pages
    $('.inner-page-top .title').addClass('animate');
    $('.inner-page-top img.img-top').addClass('animate');
    $('.team-single-page .single-team-bg').addClass('animate');

  }
  
  function checkWidth() {
    if ($(window).width() < 1024) {
      $('.strong-content.strong-grid').removeClass('columns-3');
      $('.strong-content.strong-grid').addClass('columns-2');
    } else {
      $('.strong-content.strong-grid').addClass('columns-3');
      $('.strong-content.strong-grid').removeClass('columns-2');
    }
  }
  
  function customAccordion() {
    if($(window).width() <= 1024) {
      $('.flip-bullet').click(function() {
        // Hide all .flip-content elements first but not the one in clicked .flip-bullet
        $('.flip-content').not($(this).children('.flip-content')).hide('slow');
        $('.flip-bullet p').not($(this).children('p')).removeClass('animate');
        $(this).children('.flip-content').toggle('slow');
        $(this).children('p').toggleClass('animate');
      });
    }
  }
  
  function serviceSlider() {
    // single-flip-slider slick slider settings in a variable
		var sliderSettings = {
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplay: false,
      speed: 1000,
      autoplaySpeed: 5000,
      infinite: true,
      dots: false,
      arrows: true,
      pauseOnHover: true,
      swipe: true,
      touchThreshold: 100,
      responsive: [
        {
            breakpoint: 1000,
            settings: {
              slidesToShow: 2,
            }
        },
        {
            breakpoint: 900,
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
		    $('.single-flip-slider').slick(sliderSettings);
		});
  }

})(jQuery);





