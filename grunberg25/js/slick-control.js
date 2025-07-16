jQuery(function($) {
  function injectLeftContainerInner() {
    $(".left-container").each(function () {
      if (!$(this).find('.left-container-inner').length) {
        $(this).wrapInner('<div class="left-container-inner"></div>');
      }
    });
  }

  function oneSidedContainer() {
    let marginLeft = $("header .container").css("margin-left");
    let marginValue = parseFloat(marginLeft) || 0;
    let newPadding = marginValue + 20;

    $(".left-container .left-container-inner").css({
      "padding-left": newPadding + "px"
    });
  }

  function updateLayout() {
    injectLeftContainerInner();
    oneSidedContainer();
  }

  const targetNode = document.body;

  const observer = new MutationObserver(function(mutationsList) {
    for (let mutation of mutationsList) {
      if (mutation.type === 'childList' || mutation.type === 'attributes') {
        if (document.querySelector('.testimonial-slider.slick-initialized')) {
          observer.disconnect();
          updateLayout();
        }
      }
    }
  });

  observer.observe(targetNode, {
    childList: true,
    subtree: true,
    attributes: true,
    attributeFilter: ['class']
  });

  $(window).on("resize", updateLayout);
});
