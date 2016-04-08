<?php

	// Start WordPress
	require( '../../../../../../wp-load.php' );

	// Capability check
	if ( !current_user_can( 'author' ) && !current_user_can( 'editor' ) && !current_user_can( 'administrator' ) )
		die( 'Access denied' );

	// Param check
	if ( empty( $_GET['shortcode'] ) )
		die( 'Shortcode not specified' );

	$shortcode = migfx_themeshortcodes_shortcodes( $_GET['shortcode'] );

	// Shortcode has atts
	if ( count( $shortcode['atts'] ) && $shortcode['atts'] ) {
		foreach ( $shortcode['atts'] as $attr_name => $attr_info ) {
			$return .= '<p style="clear: both;">';
			$return .= '<label for="migfx-themeshortcodes-generator-attr-' . $attr_name . '">' . $attr_info['desc'] . '</label>';

			// Select
			if ( count( $attr_info['values'] ) && $attr_info['values'] ) {
				$return .= '<select name="' . $attr_name . '" id="migfx-themeshortcodes-generator-attr-' . $attr_name . '" class="migfx-themeshortcodes-generator-attr">';
				foreach ( $attr_info['values'] as $attr_value ) {
					$attr_value_selected = ( $attr_info['default'] == $attr_value ) ? ' selected="selected"' : '';
						if($attr_info['type'] == 'page_list'){
					$return .= '<option' . $attr_value_selected . '>' . $attr_value->post_name . ' ('.$attr_value->ID.') '. '</option>';
						}
						elseif($attr_info['type'] == 'categorie_list'){
					$return .= '<option' . $attr_value_selected . '>' . $attr_value->slug . '</option>';
						}
						elseif($attr_info['type'] == 'taxonomie_list'){
					$return .= '<option' . $attr_value_selected . '>' . $attr_value->slug . '</option>';
						}
						elseif($attr_info['type'] == 'post_type'){
					$return .= '<option' . $attr_value_selected . '>' . $attr_value . '</option>';
						}
						else {
					$return .= '<option' . $attr_value_selected . '>' . $attr_value. '</option>';		
						}
				}
				$return .= '</select>';
				$return .= '<small style="text-align:right; font-style: italic; display:block; margin-right:60px; color: #777; font-family:arial; font-size:11px;">'.$attr_info['help'].'</small>';
			}

			// Text & color input
			else {

				// Color picker
				if ( $attr_info['type'] == 'color' ) {
					$return .= '<span class="migfx-themeshortcodes-generator-select-color"><span class="migfx-themeshortcodes-generator-select-color-wheel"></span><input type="text" name="' . $attr_name . '" value="' . $attr_info['default'] . '" id="migfx-themeshortcodes-generator-attr-' . $attr_name . '" class="migfx-themeshortcodes-generator-attr migfx-themeshortcodes-generator-select-color-value" /></span>';
				}
				
				elseif ( $attr_info['type'] == 'info' ) {
					$return .= '<span class="migfx-themeshortcodes-generator-info">'.$attr_info["alert"].'</span>';
				}
				
				elseif ( $attr_info['type'] == 'divider' ) {
					$return .= '<div class="migfx-themeshortcodes-divider" style="clear: both;"></div>';
				}
				

				// Text input
				else {
					$return .= '<input type="text" name="' . $attr_name . '" value="' . $attr_info['default'] . '" id="migfx-themeshortcodes-generator-attr-' . $attr_name . '" class="migfx-themeshortcodes-generator-attr" />';
				}
			}
			$return .= '</p>';
			$return .= '<small style="text-align:right; font-style: italic; display:block; margin-right:60px; color: #777; font-family:arial; font-size:11px;">'.$attr_info['help'].'</small>';
		}
	}

	// Single shortcode (not closed)
	if ( $shortcode['type'] == 'single' ) {
		$return .= '<input type="hidden" name="migfx-themeshortcodes-generator-content" id="migfx-themeshortcodes-generator-content" value="false" />';
	}

	// Wrapping shortcode
	else {
		$return .= '<p><label>' . __( 'Content', 'migfx-themeshortcodes' ) . '</label><input type="text" name="migfx-themeshortcodes-generator-content" id="migfx-themeshortcodes-generator-content" value="' . $shortcode['content'] . '" /></p>';
	}

	$return .= '<p><a href="#" class="button-primary" id="migfx-themeshortcodes-generator-insert">' . __( 'Insert', 'migfx-themeshortcodes' ) . '</a> ';
	

	$return .= '<input type="hidden" name="migfx-themeshortcodes-generator-result" id="migfx-themeshortcodes-generator-result" value="" />';

	echo $return;
?>