$( document ).ready(function() {

	var itemName;
	const pagetitle = document.title;
	
	document.querySelectorAll('.service-list .service-item').forEach(function(item) {
		itemName = item.getAttribute("name");		
		if(pagetitle.toLowerCase().includes(itemName.toLowerCase())) {
			item.remove();
		}
	});

	
//	$( "#Menu" ).click(function() {
//		$( ".MainMenu" ).toggleClass( "displayed" );
//		$( this ).toggleClass( "cross" );
//	});
//	
//	
	$( "#header-nav .menu-item-has-children > a" ).after( '<i class="fas fa-chevron-down"></i>' );
//	$( ".MobileNav .menu-item-has-children > a" ).after( '<i class="fas fa-chevron-down"></i>' );
//	
//	$('.MenuNav .sub-menu').hide();
//	$('.MobileNav .sub-menu').hide();
//	
//	$( ".MenuNav .menu-item-has-children" ).hover(function() {
//		$(".sub-menu", this).slideToggle("fast");
//	});
//	
//	
//	$( ".MobileNav .menu-item-has-children" ).click(function() {
//	  	$(".sub-menu", this).slideToggle("fast");
//	});
//	
//	$( ".MobileIcon" ).click(function() {
//	  	$(".MobileNav").slideToggle("fast");
//	});
	
	
	function myFunction(x) {
	  if (x.matches) { // If media query matches
		
	  }
	}

	var x = window.matchMedia("(max-width: 700px)")
	myFunction(x) // Call listener function at run time
	x.addListener(myFunction) // Attach listener function on state changes
	
});