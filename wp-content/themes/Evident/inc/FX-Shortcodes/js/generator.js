jQuery(document).ready(function($) {

	// Apply chosen
	$('#migfx-themeshortcodes-generator-select').chosen({
		no_results_text: $('#migfx-themeshortcodes-generator-select').attr('data-no-results-text'),
		allow_single_deselect: true
	});

	// Select shortcode
	$('#migfx-themeshortcodes-generator-select').live( "change", function() {
		var queried_shortcode = $('#migfx-themeshortcodes-generator-select').find(':selected').val();
		$('#migfx-themeshortcodes-generator-settings').addClass('migfx-themeshortcodes-loading-animation');
		$('#migfx-themeshortcodes-generator-settings').load($('#migfx-themeshortcodes-generator-url').val() + '/lib/generator.php?shortcode=' + queried_shortcode, function() {
			$('#migfx-themeshortcodes-generator-settings').removeClass('migfx-themeshortcodes-loading-animation');

			// Init color pickers
			$('.migfx-themeshortcodes-generator-select-color').each(function(index) {
				$(this).find('.migfx-themeshortcodes-generator-select-color-wheel').filter(':first').farbtastic('.migfx-themeshortcodes-generator-select-color-value:eq(' + index + ')');
				$(this).find('.migfx-themeshortcodes-generator-select-color-value').focus(function() {
					$('.migfx-themeshortcodes-generator-select-color-wheel:eq(' + index + ')').show();
				});
				$(this).find('.migfx-themeshortcodes-generator-select-color-value').blur(function() {
					$('.migfx-themeshortcodes-generator-select-color-wheel:eq(' + index + ')').hide();
				});
			});
		});
	});

	// Insert shortcode
	$('#migfx-themeshortcodes-generator-insert').live('click', function(event) {
		var queried_shortcode = $('#migfx-themeshortcodes-generator-select').find(':selected').val();
		var migfx_themeshortcodes_compatibility_mode_prefix = $('#migfx-themeshortcodes-compatibility-mode-prefix').val();
		$('#migfx-themeshortcodes-generator-result').val('[' + migfx_themeshortcodes_compatibility_mode_prefix + queried_shortcode);
		$('#migfx-themeshortcodes-generator-settings .migfx-themeshortcodes-generator-attr').each(function() {
			if ( $(this).val() !== '' ) {
				$("#migfx-themeshortcodes-generator-result").val( $("#migfx-themeshortcodes-generator-result").val() + " " + $(this).attr('name') + "='" + $(this).val() + "'" );
			}
		});
		$('#migfx-themeshortcodes-generator-result').val($('#migfx-themeshortcodes-generator-result').val() + ']');

		// wrap shortcode
		if ( $('#migfx-themeshortcodes-generator-content').val() != 'false' ) {
			$('#migfx-themeshortcodes-generator-result').val($('#migfx-themeshortcodes-generator-result').val() + $('#migfx-themeshortcodes-generator-content').val() + '[/' + migfx_themeshortcodes_compatibility_mode_prefix + queried_shortcode + ']');
		}

		var shortcode = jQuery('#migfx-themeshortcodes-generator-result').val();

		// Insert into widget
		if ( typeof window.migfx_themeshortcodes_generator_target !== 'undefined' ) {
			jQuery('textarea#' + window.migfx_themeshortcodes_generator_target).val( jQuery('textarea#' + window.migfx_themeshortcodes_generator_target).val() + shortcode);
			tb_remove();
		}

		// Insert into editor
		else {
			window.send_to_editor(shortcode);
		}

		// Prevent default action
		event.preventDefault();
		return false;
	});

	// Widget insertion button click
	jQuery('a[data-page="widget"]').live('click',function(event) {
		window.migfx_themeshortcodes_generator_target = jQuery(this).attr('data-target');
	});

});