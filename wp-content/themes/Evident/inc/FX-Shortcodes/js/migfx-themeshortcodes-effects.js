jQuery(document).ready(function(){


/*============================Carousel Init===================================================*/

jQuery(window).load(function(){
if (jQuery("#foo2").length > 0){
	jQuery(function($) {
    	$("#foo2").carouFredSel({
		width: "variable",
		responsive: true,
		height: "auto",
		items: {
			visible: 4,
			minimum: 3
		},
		scroll: 1,
		auto: 3500,
		prev: {
			button: "#prev2",
			key: "left"
		},
		next: {
			button: "#next2",
			key: "right"
		}
	});
	});

};

})
		



}) /*============= end of document ready =========================*/