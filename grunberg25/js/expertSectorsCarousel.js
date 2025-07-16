document.addEventListener("DOMContentLoaded", function () {
  (function ($) {
    const $container = $(".expert-sectors");
    const $originalItems = $(".expert-sectors .sector").clone();
    const itemHeight = 66; // Fixed height of non-active sectors
    const visibleItems = 9;
    const centerIndex = Math.floor(visibleItems / 2);

    // Setup carousel with ghost elements
    function setupCarousel() {
      $container.empty();

      const ghostTop = $originalItems
        .slice(-centerIndex)
        .clone()
        .addClass("ghost");
      const ghostBottom = $originalItems
        .slice(0, centerIndex)
        .clone()
        .addClass("ghost");

      $container.append(ghostTop, $originalItems, ghostBottom);

      scrollToIndex(centerIndex, false);
      updateActive();
      updateWrapperHeight();
    }

    function getAllItems() {
      return $container.children(".sector");
    }

    // Scroll to a specific index with animation toggle
    function scrollToIndex(index, animate = true) {
      const offset = -(index - centerIndex) * itemHeight;
      $container.css("transition", animate ? "transform 0.4s ease" : "none");
      $container.css("transform", `translateY(${offset}px)`);
    }

    // Set the height of the outer wrapper based on active item
    function updateWrapperHeight() {
      const $wrapper = $(".expert-sectors-wrapper");
      const $activeItem = getAllItems().eq(centerIndex);
      const activeHeight = $activeItem.outerHeight(true); // includes margin
      const newHeight = itemHeight * (visibleItems - 1) + activeHeight;
      $wrapper.height(newHeight);
    }

    // Update active item, opacity, and plus icon
    function updateActive() {
      const $items = getAllItems();
      $items.removeClass("active").find(".plus-link").remove();

      $items.each(function (i) {
        const $item = $(this);
        const distance = Math.abs(i - centerIndex);

        if (i === centerIndex) {
          $item.addClass("active");
          const plus = $("<a>")
            .addClass("plus-link")
            .attr("href", $item.data("url"))
            .text("+");
          $item.append(plus);
        }

        // Opacity falloff based on distance from center
        if (distance === 0) {
          $item.css("opacity", "1");
        } else if (distance === 1) {
          $item.css("opacity", "0.7");
        } else if (distance === 2) {
          $item.css("opacity", "0.5");
        } else {
          $item.css("opacity", "0.3");
        }
      });

      setTimeout(() => {
        updateWrapperHeight();
      }, 500);
    }

    // Handle clicking on items to scroll and loop
    function onItemClick(e) {
      const $items = getAllItems();
      const clicked = $(e.currentTarget);
      const index = $items.index(clicked);
      const shift = index - centerIndex;

      if (shift === 0) return;

      if (shift > 0) {
        scrollToIndex(index);
        setTimeout(() => {
          for (let i = 0; i < shift; i++) {
            $container.append($container.children().first());
          }
          scrollToIndex(centerIndex, false);
          updateActive();
        }, 400);
      } else {
        for (let i = 0; i < Math.abs(shift); i++) {
          $container.prepend($container.children().last());
        }
        scrollToIndex(centerIndex - shift, false);
        requestAnimationFrame(() => {
          scrollToIndex(centerIndex, true);
        });
        setTimeout(() => {
          updateActive();
        }, 400);
      }
    }

    // Optional: Auto-scroll every few seconds
    let autoScrollInterval = setInterval(() => {
      const $items = getAllItems();
      const $next = $items.eq(centerIndex + 1);
      $next.trigger("click");
    }, 6000);

    // Initialize
    setupCarousel();
    $container.on("click", ".sector", onItemClick);
  })(jQuery);
});
