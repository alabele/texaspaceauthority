jQuery(document).ready(function($) {

	// Code editor
	var gn_custom_editor = CodeMirror.fromTextArea(document.getElementById("migfx-themeshortcodes-custom-css"), {});

	// Tables
	$('.migfx-themeshortcodes-table-shortcodes tr:even, .migfx-themeshortcodes-table-demos tr:even').addClass('even');

	// Tabs
	$('#migfx-themeshortcodes-wrapper .migfx-themeshortcodes-pane:first').show();
	$('#migfx-themeshortcodes-tabs a').click(function() {
		$('.migfx-themeshortcodes-message').hide();
		$('#migfx-themeshortcodes-tabs a').removeClass('migfx-themeshortcodes-current');
		$(this).addClass('migfx-themeshortcodes-current');
		$('#migfx-themeshortcodes-wrapper .migfx-themeshortcodes-pane').hide();
		$('#migfx-themeshortcodes-wrapper .migfx-themeshortcodes-pane').eq($(this).index()).show();
		gn_custom_editor.refresh();
	});

	// Ajaxify settings form
	$('#migfx-themeshortcodes-form-save-settings').ajaxForm({
		beforeSubmit: function() {
			$('#migfx-themeshortcodes-form-save-settings .migfx-themeshortcodes-spin').show();
			$('#migfx-themeshortcodes-form-save-settings .migfx-themeshortcodes-submit').attr('disabled', true);
		},
		success: function() {
			$('#migfx-themeshortcodes-form-save-settings .migfx-themeshortcodes-spin').hide();
			$('#migfx-themeshortcodes-form-save-settings .migfx-themeshortcodes-submit').attr('disabled', false);
		}
	});

	// Ajaxify custom CSS form
	$('#migfx-themeshortcodes-form-save-custom-css').ajaxForm({
		beforeSubmit: function() {
			$('#migfx-themeshortcodes-form-save-custom-css .migfx-themeshortcodes-spin').show();
			$('#migfx-themeshortcodes-form-save-custom-css .migfx-themeshortcodes-submit').attr('disabled', true);
		},
		success: function() {
			$('#migfx-themeshortcodes-form-save-custom-css .migfx-themeshortcodes-spin').hide();
			$('#migfx-themeshortcodes-form-save-custom-css .migfx-themeshortcodes-submit').attr('disabled', false);
		}
	});

	// Auto-open tab by link with hash
	if ( strpos( document.location.hash, '#tab-' ) !== false )
		$('#migfx-themeshortcodes-tabs a:eq(' + document.location.hash.replace('#tab-','') + ')').trigger('click');

});

// ########## Strpos tool ##########

function strpos( haystack, needle, offset) {
	var i = haystack.indexOf( needle, offset );
	return i >= 0 ? i : false;
}