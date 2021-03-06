<?php

// loads the shortcodes class, wordpress is loaded with it
require_once( 'shortcodes.class.php' );

// get popup type
$popup = trim( $_GET['popup'] );
$shortcode = new fx_shortcodes( $popup );

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head></head>
<body>
<div id="fx-popup">

	<div id="fx-shortcode-wrap">
		
		<div id="fx-sc-form-wrap">
		
			<div id="fx-sc-form-head">
			
				<?php echo $shortcode->popup_title; ?>
			
			</div>
			<!-- /#fx-sc-form-head -->
			
			<form method="post" id="fx-sc-form">
			
				<table id="fx-sc-form-table">
				
					<?php echo $shortcode->output; ?>
					
					<tbody>
						<tr class="form-row">
							<?php if( ! $shortcode->has_child ) : ?><td class="label">&nbsp;</td><?php endif; ?>
							<td class="field"><a href="#" class="button-primary fx-insert">Insert Shortcode</a></td>							
						</tr>
					</tbody>
				
				</table>
				<!-- /#fx-sc-form-table -->
				
			</form>
			<!-- /#fx-sc-form -->
		
		</div>
		<!-- /#fx-sc-form-wrap -->
		
		<div class="clear"></div>
		
	</div>
	<!-- /#fx-shortcode-wrap -->

</div>
<!-- /#fx-popup -->

</body>
</html>