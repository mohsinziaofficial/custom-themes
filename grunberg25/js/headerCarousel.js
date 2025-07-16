document.addEventListener("DOMContentLoaded", function () {
  (function ($) {
    const images = [
      "https://grunberg25.je-hosting.co.uk/wp-content/uploads/2025/06/g-shape-1-scaled.png",
      "https://grunberg25.je-hosting.co.uk/wp-content/uploads/2025/06/g-shape-3-scaled.png",
      "https://grunberg25.je-hosting.co.uk/wp-content/uploads/2025/06/g-shape-11-scaled.png"
    ];

    const scrollDuration = 8000;
    const fadeDuration = 2000;

    const $main = $(".header-image-carousel");
    const $overlay = $('<div class="overlay-carousel"></div>').appendTo(
      ".image-carousel"
    );

    $main.css({
      position: "absolute",
      top: 0,
      left: 0,
      width: "100%",
      height: "100%",
      backgroundSize: "cover",
      backgroundRepeat: "no-repeat",
      backgroundPosition: "0% center",
      display: "block",
      opacity: 1,
      zIndex: 10,
    });

    $overlay.css({
      position: "absolute",
      top: 0,
      left: 0,
      width: "100%",
      height: "100%",
      backgroundSize: "cover",
      backgroundRepeat: "no-repeat",
      backgroundPosition: "0% center",
      display: "none",
      opacity: 0,
      zIndex: 15,
    });

    function easeInOut(t) {
      return t < 0.5 ? 2 * t * t : -1 + (4 - 2 * t) * t;
    }

    function scrollImage($el, duration, callback) {
      let start = null;

      function step(timestamp) {
        if (!start) start = timestamp;
        const elapsed = timestamp - start;
        const linearProgress = Math.min(elapsed / duration, 1);
        const easedProgress = easeInOut(linearProgress);
        const posPercent = easedProgress * 100;

        $el.css("background-position", `${posPercent}% center`);

        if (linearProgress < 1) {
          requestAnimationFrame(step);
        } else {
          if (callback) callback();
        }
      }

      requestAnimationFrame(step);
    }

    function fadeTransition(currentEl, nextEl, duration, callback) {
      currentEl.css("background-position", "100% center");
      nextEl.css("background-position", "0% center");

      nextEl.css({
        opacity: 0,
        display: "block",
        zIndex: 15,
      });

      currentEl.css({
        opacity: 1,
        display: "block",
        zIndex: 10,
      });

      $({ opacity: 0 }).animate(
        { opacity: 1 },
        {
          duration: duration,
          easing: "linear",
          step: function (now) {
            currentEl.css("opacity", 1 - now);
            nextEl.css("opacity", now);
          },
          complete: function () {
            currentEl.css({
              opacity: 0,
              display: "none",
              zIndex: 10,
            });

            nextEl.css({
              opacity: 1,
              display: "block",
              zIndex: 15,
              backgroundPosition: "0% center",
            });

            if (callback) callback();
          },
        }
      );
    }

    function transitionImages() {
      let currentEl = $main;
      let nextEl = $overlay;
      let currentImageIndex = 0;

      currentEl.css({
        backgroundImage: `url(${images[currentImageIndex]})`,
        backgroundPosition: "0% center",
        opacity: 1,
        display: "block",
      });
      nextEl.css({ display: "none", opacity: 0 });

      function loop() {
        let nextImageIndex = (currentImageIndex + 1) % images.length;

        nextEl.css({
          backgroundImage: `url(${images[nextImageIndex]})`,
          backgroundPosition: "0% center",
          opacity: 0,
          display: "none",
        });

        scrollImage(currentEl, scrollDuration, () => {
          fadeTransition(currentEl, nextEl, fadeDuration, () => {
            const temp = currentEl;
            currentEl = nextEl;
            nextEl = temp;
            currentImageIndex = nextImageIndex;
            nextEl.css({ opacity: 0, display: "none" });
            setTimeout(loop, 10);
          });
        });
      }

      loop();
    }

    transitionImages();
  })(jQuery);
});
