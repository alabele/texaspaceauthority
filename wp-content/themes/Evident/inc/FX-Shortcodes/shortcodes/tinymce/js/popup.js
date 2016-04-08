
// start the popup specefic scripts
// safe to use $
jQuery(document).ready(function($) {
    var fxs = {
    	loadVals: function()
    	{
    		var shortcode = $('#_fx_shortcode').text(),
    			uShortcode = shortcode;
    		
    		// fill in the gaps eg {{param}}
    		$('.fx-input').each(function() {
    			var input = $(this),
    				id = input.attr('id'),
    				id = id.replace('fx_', ''),		// gets rid of the fx_ prefix
    				re = new RegExp("{{"+id+"}}","g");
    				
    			uShortcode = uShortcode.replace(re, input.val());
    		});
    		
    		// adds the filled-in shortcode as hidden input
    		$('#_fx_ushortcode').remove();
    		$('#fx-sc-form-table').prepend('<div id="_fx_ushortcode" class="hidden">' + uShortcode + '</div>');
    	},
    	cLoadVals: function()
    	{
    		var shortcode = $('#_fx_cshortcode').text(),
    			pShortcode = '';
    			shortcodes = '';
    		
    		// fill in the gaps eg {{param}}
    		$('.child-clone-row').each(function() {
    			var row = $(this),
    				rShortcode = shortcode;
    			
    			$('.fx-cinput', this).each(function() {
    				var input = $(this),
    					id = input.attr('id'),
    					id = id.replace('fx_', '')		// gets rid of the fx_ prefix
    					re = new RegExp("{{"+id+"}}","g");
    					
    				rShortcode = rShortcode.replace(re, input.val());
    			});
    	
    			shortcodes = shortcodes + rShortcode + "\n";
    		});
    		
    		// adds the filled-in shortcode as hidden input
    		$('#_fx_cshortcodes').remove();
    		$('.child-clone-rows').prepend('<div id="_fx_cshortcodes" class="hidden">' + shortcodes + '</div>');
    		
    		// add to parent shortcode
    		this.loadVals();
    		pShortcode = $('#_fx_ushortcode').text().replace('{{child_shortcode}}', shortcodes);
    		
    		// add updated parent shortcode
    		$('#_fx_ushortcode').remove();
    		$('#fx-sc-form-table').prepend('<div id="_fx_ushortcode" class="hidden">' + pShortcode + '</div>');
    	},
    	children: function()
    	{
    		// assign the cloning plugin
    		$('.child-clone-rows').appendo({
    			subSelect: '> div.child-clone-row:last-child',
    			allowDelete: false,
    			focusFirst: false
    		});
    		
    		// remove button
    		$('.child-clone-row-remove').live('click', function() {
    			var	btn = $(this),
    				row = btn.parent();
    			
    			if( $('.child-clone-row').size() > 1 )
    			{
    				row.remove();
    			}
    			else
    			{
    				alert('You need a minimum of one row');
    			}
    			
    			return false;
    		});
    		
    		// assign jUI sortable
    		$( ".child-clone-rows" ).sortable({
				placeholder: "sortable-placeholder",
				items: '.child-clone-row'
				
			});
    	},
    	resizeTB: function()
    	{
			var	ajaxCont = $('#TB_ajaxContent'),
				tbWindow = $('#TB_window'),
				fxPopup = $('#fx-popup');

            tbWindow.css({
                height: fxPopup.outerHeight() + 50,
                width: fxPopup.outerWidth(),
                marginLeft: -(fxPopup.outerWidth()/2)
            });

			ajaxCont.css({
				paddingTop: 0,
				paddingLeft: 0,
				paddingRight: 0,
				height: (tbWindow.outerHeight()-47),
				overflow: 'auto', // IMPORTANT
				width: fxPopup.outerWidth()
			});
			
			$('#fx-popup').addClass('no_preview');
    	},
    	load: function()
    	{
    		var	fxs = this,
    			popup = $('#fx-popup'),
    			form = $('#fx-sc-form', popup),
    			shortcode = $('#_fx_shortcode', form).text(),
    			popupType = $('#_fx_popup', form).text(),
    			uShortcode = '';
    		
    		// resize TB
    		fxs.resizeTB();
    		$(window).resize(function() { fxs.resizeTB() });
    		
    		// initialise
    		fxs.loadVals();
    		fxs.children();
    		fxs.cLoadVals();
    		
    		// update on children value change
    		$('.fx-cinput', form).live('change', function() {
    			fxs.cLoadVals();
    		});
    		
    		// update on value change
    		$('.fx-input', form).change(function() {
    			fxs.loadVals();
    		});
    		
    		// when insert is clicked
    		$('.fx-insert', form).click(function() {    		 			
    			if(window.tinyMCE)
				{
					window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, $('#_fx_ushortcode', form).html());
					tb_remove();
				}
    		});
    	}
	}
    
    // run
    $('#fx-popup').livequery( function() { fxs.load(); } );
});