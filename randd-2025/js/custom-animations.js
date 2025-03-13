(function($) {
  
  $(document).ready(function() {
    // Check elements normally
    inViewport();
    
    // Trigger inViewport when the page is fully loaded
    $(window).on('load', function () {
      inViewport();
    });
    
    // check on page scroll
    $(window).scroll(function() {
      inViewport();
    });
    
  });
  
  function inViewport() {
    
    $(
      '.header-menu,' +
      '.page-hero .bg-and-news .left,' +
      '.page-hero .bg-and-news .right,' +
      '.custom-title span,' +
      '.custom-tag-line,' +
      '.post-custom-title,' +
      '.post-content-top,' + 
      '.post-wrap,' +
      '.SliderInner,' +
      '.news-row .big-article,' +
      '.post-page .article-date'
    ).each(function() {
      var divPos = $(this).offset().top,
          topOfWindow = $(window).scrollTop();
      
      if( divPos < topOfWindow + 1000 ) {
        $(this).addClass('animate');
      }
    });
    
    $('.news-row .remaining-articles').each(function() {
      var divPos = $(this).offset().top,
          topOfWindow = $(window).scrollTop();
      
      if( divPos < topOfWindow + 1000 ) {
        $(this).children('article').addClass('animate');
      }
    });
    
    if ($(window).width() < 900) {
      $('.page-hero .container .text-overlay').each(function() {
        var divPos = $(this).offset().top,
          topOfWindow = $(window).scrollTop();
        
        if( divPos < topOfWindow + 1000 ) {
          $(this).addClass('animate');
        }
      });
      $('.post-wrap').each(function() {
        var divPos = $(this).offset().top,
          topOfWindow = $(window).scrollTop();
        
        if( divPos < topOfWindow + 1900 ) {
          $(this).addClass('animate');
        }
      });
    }
    
  }
  
})(jQuery);