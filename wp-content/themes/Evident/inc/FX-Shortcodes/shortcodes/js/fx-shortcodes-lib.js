jQuery(document).ready(function($) {

	$(".fx-tabs").tabs();
	
	$(".fx-toggle").each( function () {
		if($(this).attr('data-id') == 'closed') {
			$(this).accordion({ header: '.fx-toggle-title', collapsible: true, active: false  });
		} else {
			$(this).accordion({ header: '.fx-toggle-title', collapsible: true});
		}
	});
	
	
});