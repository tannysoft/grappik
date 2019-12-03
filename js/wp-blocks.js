// https://www.advancedcustomfields.com/resources/adding-custom-javascript-fields/

$(document).ready(function() {
  var initializeBlock = function($block) {
    $block.find(".s-slider").flickity({
      cellAlign: "left",
      contain: true,
      wrapAround: true,
      imagesLoaded: true,
      dragThreshold: 3
    });
  };
  if (window.acf) {
    window.acf.addAction("render_block_preview/type=post-slider", initializeBlock);
  }
});
