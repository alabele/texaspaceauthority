jQuery(document).ready(function($) {

	// Frame
	$('.migfx-themeshortcodes-frame-align-center, .migfx-themeshortcodes-frame-align-none').each(function() {
		var frame_width = $(this).find('img').width();
		$(this).css('width', frame_width + 12);
	});

	// Spoiler
	$('.migfx-themeshortcodes-spoiler .migfx-themeshortcodes-spoiler-title').click(function() {

		var // Spoiler elements
		spoiler = $(this).parent('.migfx-themeshortcodes-spoiler').filter(':first'),
		title = spoiler.children('.migfx-themeshortcodes-spoiler-title'),
		content = spoiler.children('.migfx-themeshortcodes-spoiler-content'),
		isAccordion = ( spoiler.parent('.migfx-themeshortcodes-accordion').length > 0 ) ? true : false;

		if ( spoiler.hasClass('migfx-themeshortcodes-spoiler-open') ) {
			if ( !isAccordion ) {
				content.hide(200);
				spoiler.removeClass('migfx-themeshortcodes-spoiler-open');
			}
		}
		else {
			spoiler.parent('.migfx-themeshortcodes-accordion').children('.migfx-themeshortcodes-spoiler').removeClass('migfx-themeshortcodes-spoiler-open');
			spoiler.parent('.migfx-themeshortcodes-accordion').find('.migfx-themeshortcodes-spoiler-content').hide(200);
			content.show(100);
			spoiler.addClass('migfx-themeshortcodes-spoiler-open');
		}
	});

	// Tabs
	$('.migfx-themeshortcodes-tabs-nav').delegate('span:not(.migfx-themeshortcodes-tabs-current)', 'click', function() {
		$(this).addClass('migfx-themeshortcodes-tabs-current').siblings().removeClass('migfx-themeshortcodes-tabs-current')
		.parents('.migfx-themeshortcodes-tabs').find('.migfx-themeshortcodes-tabs-pane').hide().eq($(this).index()).show();
	});
	$('.migfx-themeshortcodes-tabs-pane').hide();
	$('.migfx-themeshortcodes-tabs-nav span:first-child').addClass('migfx-themeshortcodes-tabs-current');
	$('.migfx-themeshortcodes-tabs-panes .migfx-themeshortcodes-tabs-pane:first-child').show();

	// Tables
	$('.migfx-themeshortcodes-table tr:even').addClass('migfx-themeshortcodes-even');

});

function mycarousel_initCallback(carousel) {

	// Disable autoscrolling if the user clicks the prev or next button.
	carousel.buttonNext.bind('click', function() {
		carousel.startAuto(0);
	});

	carousel.buttonPrev.bind('click', function() {
		carousel.startAuto(0);
	});

	// Pause autoscrolling if the user moves with the cursor over the clip.
	carousel.clip.hover(function() {
		carousel.stopAuto();
	}, function() {
		carousel.startAuto();
	});
}