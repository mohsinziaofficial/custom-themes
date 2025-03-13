jQuery(document).ready(function() {
  jQuery( ".menu .has-sub-menu > a" ).after( '<i class="fa-solid fa-caret-down"></i>' );
  animateInnerPageHero();
  searchBarPlaceholder();
  enableFirstBulletPoint();
});

// animate Inner Page Hero section
function animateInnerPageHero() {
  jQuery(".inner-page-hero .left, .inner-page-hero .right").css({
    'opacity' : '1',
    'transition' : 'opacity 1s linear'
  });
}

// add 'search here...' placeholder
function searchBarPlaceholder() {
  jQuery(".searchform :text").addClass("search-query"); //same as jQuery(".searchform input[type=text]").addClass("search-query");
  jQuery(".search-query").attr("placeholder", "Search here..."); //same as jQuery(".searchform input[type=text]").addClass("search-query");
}

// to fix and shrink the header menu on scroll
jQuery(window).scroll(function () {
//  console.log("Position: " + jQuery(window).scrollTop());
  if (jQuery(window).scrollTop() >= 64) {
    jQuery('header').addClass("pre-header-fixed shrink-header");
  }
  else {    
    jQuery('header').removeClass("pre-header-fixed shrink-header");
  }
});

//var parent_height = jQuery('.animListSectionPink').height();

function enableFirstBulletPoint() {
  jQuery('.animListSection .listTitle.firstTitle').children('.contentBox').addClass('show');
}

// for bullet points on home page and product page
jQuery(".animListSection .listTitle").hover(
	function(){
    jQuery('.animListSection .listTitle.firstTitle').children('.contentBox').removeClass('show');
    jQuery('.animListSection .listTitle').removeClass('firstTitle');
		jQuery(this).children('.contentBox').addClass('show');
    
//    var height_diff = parent_height - jQuery(this).children('.contentBox').height();
//    height_diff = -height_diff;
//    jQuery('.animListSectionPink').height(parent_height + height_diff + 400); //extend the height of the area according to the height of contentBox.
	},
	function () {
		jQuery('.contentBox', this).removeClass('show');
});