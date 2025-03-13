(function($) {
  
  $(document).ready(function() {
    
    navMenuAnimiations();
    
    customSlickSlider();
    
    addAnimation();

  });
  
  function navMenuAnimiations() {
    
    $("nav li").hover(
    function(){
      $(this).children('ul').hide();
      $(this).children('ul').fadeIn('fast');
    },
    function () {
      $('ul', this).fadeOut('fast');            
    });

    $('nav .sub-menu .menu-item-has-children > a').after('<i class="fa-solid fa-chevron-right"></i>');
    $( ".menu > li.has-sub-menu > a" ).after( '<i class="fa-solid fa-chevron-down"></i>' );
    
  }
  
  function customSlickSlider() {

    var sliderSlickSettings = {
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 5000,
      infinite: true,
      dots: true,
      arrows: false,
      pauseOnHover: false,
    };

    var testimonialSliderSettings = {
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: false,
      autoplaySpeed: 7000,
      infinite: true,
      nextArrow: '<div class="nextArrow"><img class="Arrow" src="/wp-content/themes/clc-theme-2025/img/RightArrow.png" alt="Right"></div>',
      prevArrow: '<div class="prevArrow"><img class="Arrow" src="/wp-content/themes/clc-theme-2025/img/LeftArrow.png" alt="Left"></div>',
      pauseOnHover: false,
    };

    $('.SliderInner').slick(sliderSlickSettings);
    
    $('.TestimonialInner').slick(testimonialSliderSettings);

    // hide the dots if number of slides greater than 20
    var dots = $('.slick-dots').children().length;
    if(dots <=1 || dots > 20) {
      $('.slick-dots').hide();
    }
    
  }

  function isVisible(elment) {
    
    // Confirm that elment is defined and has an offset
    if (!elment || $(elment).length === 0) {
        console.warn('Element does not exist:', elment);
        return false;
    }
    
    var vpH = $(window).height(); // Viewport Height
    var st = $(window).scrollTop(); // Scroll Top
    var y = $(elment).offset().top;

    return y <= (vpH + st);
  }
  
  
  function addAnimation () {
    
    $(window).scroll(function () {

      if ( isVisible ( $('.FooterForm' ) ) ) {
        $('.FooterForm').addClass('animate__animated animate__fadeInUp');
      }

      if ( isVisible ( $('.footerTop' ) ) ) {
        $('.footerTop').addClass('animate__animated animate__fadeInUp');
      }

      if ( isVisible ( $('.insights-wrapper' ) ) ) {
        $('.insights-wrapper').addClass('animate__animated animate__fadeInUp');
      } 

    });
    
  }
  
})(jQuery);
