document.addEventListener("DOMContentLoaded", function () {
  function adjustOpeningContentPadding() {
    var $container = jQuery(".OpeningContent .container");
    var windowHeight = jQuery(window).height();
    var contentHeight = $container.outerHeight();

    if (contentHeight > windowHeight) {
      $container.css("padding-bottom", "200px");
    } else {
      $container.css("padding-bottom", "");
    }
  }

  jQuery(document).ready(adjustOpeningContentPadding);
  jQuery(window).resize(adjustOpeningContentPadding);

  (function ($) {
    $(document).ready(function () {
      $("nav li").hover(
        function () {
          $(this).children("ul").hide();

          $(this).children("ul").slideDown("fast");
        },

        function () {
          $("ul", this).slideUp("fast");
        }
      );
    });

    function oneSidedContainer(selector) {
      const containerLeft = $("header .container").offset()?.left ?? 0;

      const newPadding = containerLeft + 20;

      $(selector).each(function () {
        this.style.setProperty("padding-left", newPadding + "px", "important");
      });
    }

    $(window)
      .resize(function () {
        oneSidedContainer(".left-container");
      })

      .trigger("resize");

    function headerHeight() {
      let imgHeight = $(".main-logo").height();

      let imgWidth = $(".main-logo").width();

      $(".image-carousel").height(imgHeight);

      $(".image-carousel").width(imgWidth);
    }

    $(window)
      .resize(function () {
        headerHeight();
      })

      .trigger("resize");

    function footerPadding() {
      let marginRight = $("header .container").css("margin-right");

      let marginValue = parseFloat(marginRight);

      let newPadding = marginValue + 20;

      $(".info-right").css({
        "padding-right": newPadding + "px",
      });
    }

    $(window)
      .resize(function () {
        footerPadding();
      })

      .trigger("resize");

    $(".award-logos-slider").slick({
      slidesToScroll: 1,

      autoplay: true,

      autoplaySpeed: 0,

      arrows: false,

      dots: false,

      speed: 3000,

      infinite: true,

      cssEase: "linear",

      pauseOnFocus: true,

      pauseOnHover: true,

      variableWidth: true,
    });

    // Sticky Panels

    gsap.registerPlugin(ScrollTrigger);

    let panels = gsap.utils.toArray(".panel");

    panels.forEach((panel, i) => {
      ScrollTrigger.create({
        trigger: panel,

        start: () =>
          panel.offsetHeight < window.innerHeight ? "top top" : "bottom bottom",

        pin: true,

        pinSpacing: false,
      });
    });

    // Homepage Counter

    function isInViewport(element) {
      var elementTop = element.offset().top;

      var elementBottom = elementTop + element.outerHeight();

      var viewportTop = $(window).scrollTop();

      var viewportBottom = viewportTop + $(window).height();

      return elementBottom > viewportTop && elementTop < viewportBottom;
    }

    function animateCounter($counter) {
      var target = parseFloat($counter.data("target"));

      var start = parseFloat($counter.text());

      var duration = 1500;

      var framesPerSecond = 60;

      var totalFrames = Math.round((duration / 1000) * framesPerSecond);

      var increment = (target - start) / totalFrames;

      var frame = 0;

      var decimals = (target.toString().split(".")[1] || "").length;

      var interval = setInterval(function () {
        frame++;

        var current = start + increment * frame;

        $counter.text(current.toFixed(decimals));

        if (frame >= totalFrames) {
          $counter.text(target.toFixed(decimals));

          clearInterval(interval);
        }
      }, 1000 / framesPerSecond);
    }

    var counters = $(".custom-counter");

    var animated = [];

    $(window).on("scroll load", function () {
      counters.each(function (index, element) {
        var $this = $(this);

        if (!animated[index] && isInViewport($this)) {
          animateCounter($this);

          animated[index] = true;
        }
      });
    });

    $(".testimonial-slider").slick({
      slidesToShow: 1,

      slidesToScroll: 1,

      autoplay: true,

      autoplaySpeed: 5000,

      arrows: true,

      dots: false,

      speed: 1000,
      prevArrow:
        '<button type="button" class="custom-arrow custom-prev"><i class="fa-solid fa-chevron-left"></i></button>',

      nextArrow:
        '<button type="button" class="custom-arrow custom-next"><i class="fa-solid fa-chevron-right"></i></button>',

      adaptiveHeight: true,
    });

    jQuery(".latestNewsCarousel").slick({
      infinite: false,

      slidesToShow: 2,

      slidesToScroll: 1,

      autoplay: true,

      autoplaySpeed: 3000,

      arrows: false,

      dots: true,

      responsive: [
        {
          breakpoint: 1080,

          settings: {
            slidesToShow: 2,
          },
        },

        {
          breakpoint: 768,

          settings: {
            slidesToShow: 1,
          },
        },
      ],
    });

    jQuery(".team-feature-section").slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      arrows: false,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
          },
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplaySpeed: 3000,
          },
        },
      ],
    });

    // if (

    //   window.location.pathname !== "/" &&

    //   window.location.pathname !== "/index.html"

    // ) {

    //   jQuery("div").each(function () {

    //     if (jQuery(this).attr("class") === "vc_row wpb_row vc_row-fluid") {

    //       jQuery(this).addClass("container");

    //     }

    //   });

    // }

    $(".FlyoutMenu .menu-item-has-children > a").after(
      '<span class="submenu-toggle"><i class="fa-solid fa-chevron-down"></i></span>'
    );

    // Toggle submenu when chevron is clicked
    $(document).on("click", ".FlyoutMenu li i", function (e) {
      e.preventDefault();
      e.stopPropagation(); // Prevent parent menu from closing

      var $this = $(this);

      var subMenu = $this
        .closest("li.menu-item-has-children")
        .children("ul.sub-menu");

      subMenu.slideToggle("fast");

      // Toggle chevron icon
      $this.toggleClass("fa-chevron-down fa-xmark");

      // Optional: Toggle an "active" class for styling
      $this.toggleClass("active");
    });

    // Open flyout menu
    $(document).on("click", "nav > i", function (e) {
      e.preventDefault();

      $(".FlyoutMenu").toggleClass("active");
      $(".FlyoutMenuOverlay").fadeToggle("fast");
    });

    // Close flyout menu when overlay is clicked
    $(document).on("click", ".FlyoutMenuOverlay", function (e) {
      e.preventDefault();

      $(".FlyoutMenu").removeClass("active");
      $(".FlyoutMenuOverlay").fadeOut("fast");
    });

    $(".submenu-toggle").on("click", function (e) {
      e.preventDefault(); // Prevent any default action
      e.stopPropagation(); // Stop the event from bubbling to the parent <a>

      var $parentItem = $(this).closest("li");

      // Toggle submenu visibility
      $parentItem.toggleClass("submenu-open");
      $parentItem.children(".sub-menu").slideToggle(300);

      // Optionally toggle the chevron icon
      $(this).find("i").toggleClass("fa-chevron-down fa-chevron-up");
    });

    // Accordion functionality

    document

      .querySelectorAll(".acf-accordion .accordion-header")

      .forEach((button) => {
        button.addEventListener("click", () => {
          const item = button.parentElement;

          const content = item.querySelector(".accordion-content");

          const isActive = item.classList.contains("active");

          if (isActive) {
            // Collapse

            content.style.maxHeight = null;

            item.classList.remove("active");
          } else {
            // Expand

            content.style.maxHeight = content.scrollHeight + "px";

            item.classList.add("active");
          }
        });
      });

    jQuery(".search").click(function () {
      jQuery(".searchBox").animate({ width: "toggle" });
      jQuery(".search .swapIcon").toggleClass("fa-magnifying-glass");
      jQuery(".search .swapIcon").toggleClass("fa-xmark");
    });

    // Work for us office carousel
    // const slides = document.querySelectorAll(".carousel-slide");
    // let current = 0;

    // function showNextSlide() {
    //   slides[current].classList.remove("active");
    //   current = (current + 1) % slides.length;
    //   slides[current].classList.add("active");
    // }

    // setInterval(showNextSlide, 4000);
  })(jQuery);
});
