<?php

/*-----------------------------------------------------------------------------------*/
/*	Column Shortcodes
/*-----------------------------------------------------------------------------------*/

if (!function_exists('fx_one_third')) {
	function fx_one_third( $atts, $content = null ) {
	   return '<div class="fx-one-third">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('fx_one_third', 'fx_one_third');
}

if (!function_exists('fx_one_third_last')) {
	function fx_one_third_last( $atts, $content = null ) {
	   return '<div class="fx-one-third fx-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
	add_shortcode('fx_one_third_last', 'fx_one_third_last');
}

if (!function_exists('fx_two_third')) {
	function fx_two_third( $atts, $content = null ) {
	   return '<div class="fx-two-third">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('fx_two_third', 'fx_two_third');
}

if (!function_exists('fx_two_third_last')) {
	function fx_two_third_last( $atts, $content = null ) {
	   return '<div class="fx-two-third fx-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
	add_shortcode('fx_two_third_last', 'fx_two_third_last');
}

if (!function_exists('fx_one_half')) {
	function fx_one_half( $atts, $content = null ) {
	   return '<div class="fx-one-half">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('fx_one_half', 'fx_one_half');
}

if (!function_exists('fx_one_half_last')) {
	function fx_one_half_last( $atts, $content = null ) {
	   return '<div class="fx-one-half fx-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
	add_shortcode('fx_one_half_last', 'fx_one_half_last');
}

if (!function_exists('fx_one_fourth')) {
	function fx_one_fourth( $atts, $content = null ) {
	   return '<div class="fx-one-fourth">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('fx_one_fourth', 'fx_one_fourth');
}

if (!function_exists('fx_one_fourth_last')) {
	function fx_one_fourth_last( $atts, $content = null ) {
	   return '<div class="fx-one-fourth fx-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
	add_shortcode('fx_one_fourth_last', 'fx_one_fourth_last');
}

if (!function_exists('fx_three_fourth')) {
	function fx_three_fourth( $atts, $content = null ) {
	   return '<div class="fx-three-fourth">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('fx_three_fourth', 'fx_three_fourth');
}

if (!function_exists('fx_three_fourth_last')) {
	function fx_three_fourth_last( $atts, $content = null ) {
	   return '<div class="fx-three-fourth fx-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
	add_shortcode('fx_three_fourth_last', 'fx_three_fourth_last');
}

if (!function_exists('fx_one_fifth')) {
	function fx_one_fifth( $atts, $content = null ) {
	   return '<div class="fx-one-fifth">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('fx_one_fifth', 'fx_one_fifth');
}

if (!function_exists('fx_one_fifth_last')) {
	function fx_one_fifth_last( $atts, $content = null ) {
	   return '<div class="fx-one-fifth fx-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
	add_shortcode('fx_one_fifth_last', 'fx_one_fifth_last');
}

if (!function_exists('fx_two_fifth')) {
	function fx_two_fifth( $atts, $content = null ) {
	   return '<div class="fx-two-fifth">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('fx_two_fifth', 'fx_two_fifth');
}

if (!function_exists('fx_two_fifth_last')) {
	function fx_two_fifth_last( $atts, $content = null ) {
	   return '<div class="fx-two-fifth fx-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
	add_shortcode('fx_two_fifth_last', 'fx_two_fifth_last');
}

if (!function_exists('fx_three_fifth')) {
	function fx_three_fifth( $atts, $content = null ) {
	   return '<div class="fx-three-fifth">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('fx_three_fifth', 'fx_three_fifth');
}

if (!function_exists('fx_three_fifth_last')) {
	function fx_three_fifth_last( $atts, $content = null ) {
	   return '<div class="fx-three-fifth fx-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
	add_shortcode('fx_three_fifth_last', 'fx_three_fifth_last');
}

if (!function_exists('fx_four_fifth')) {
	function fx_four_fifth( $atts, $content = null ) {
	   return '<div class="fx-four-fifth">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('fx_four_fifth', 'fx_four_fifth');
}

if (!function_exists('fx_four_fifth_last')) {
	function fx_four_fifth_last( $atts, $content = null ) {
	   return '<div class="fx-four-fifth fx-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
	add_shortcode('fx_four_fifth_last', 'fx_four_fifth_last');
}

if (!function_exists('fx_one_sixth')) {
	function fx_one_sixth( $atts, $content = null ) {
	   return '<div class="fx-one-sixth">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('fx_one_sixth', 'fx_one_sixth');
}

if (!function_exists('fx_one_sixth_last')) {
	function fx_one_sixth_last( $atts, $content = null ) {
	   return '<div class="fx-one-sixth fx-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
	add_shortcode('fx_one_sixth_last', 'fx_one_sixth_last');
}

if (!function_exists('fx_five_sixth')) {
	function fx_five_sixth( $atts, $content = null ) {
	   return '<div class="fx-five-sixth">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('fx_five_sixth', 'fx_five_sixth');
}

if (!function_exists('fx_five_sixth_last')) {
	function fx_five_sixth_last( $atts, $content = null ) {
	   return '<div class="fx-five-sixth fx-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
	add_shortcode('fx_five_sixth_last', 'fx_five_sixth_last');
}


/*-----------------------------------------------------------------------------------*/
/*	Buttons
/*-----------------------------------------------------------------------------------*/

if (!function_exists('fx_button')) {
	function fx_button( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'url' => '#',
			'target' => '_self',
			'style' => 'grey',
			'size' => 'small',
			'type' => 'round'
	    ), $atts));
		
	   return '<a target="'.$target.'" class="fx-button '.$size.' '.$style.' '. $type .'" href="'.$url.'">' . do_shortcode($content) . '</a>';
	}
	add_shortcode('fx_button', 'fx_button');
}


/*-----------------------------------------------------------------------------------*/
/*	Alerts
/*-----------------------------------------------------------------------------------*/

if (!function_exists('fx_alert')) {
	function fx_alert( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'style'   => 'white'
	    ), $atts));
		
	   return '<div class="fx-alert '.$style.'">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('fx_alert', 'fx_alert');
}


/*-----------------------------------------------------------------------------------*/
/*	Toggle Shortcodes
/*-----------------------------------------------------------------------------------*/

if (!function_exists('fx_toggle')) {
	function fx_toggle( $atts, $content = null ) {
	    extract(shortcode_atts(array(
			'title'    	 => 'Title goes here',
			'state'		 => 'open'
	    ), $atts));
	
		return "<div data-id='".$state."' class=\"fx-toggle\"><span class=\"fx-toggle-title\">". $title ."</span><div class=\"fx-toggle-inner\">". do_shortcode($content) ."</div></div>";
	}
	add_shortcode('fx_toggle', 'fx_toggle');
}


/*-----------------------------------------------------------------------------------*/
/*	Tabs Shortcodes
/*-----------------------------------------------------------------------------------*/

if (!function_exists('fx_tabs')) {
	function fx_tabs( $atts, $content = null ) {
		$defaults = array();
		extract( shortcode_atts( $defaults, $atts ) );
		
		STATIC $i = 0;
		$i++;

		// Extract the tab titles for use in the tab widget.
		preg_match_all( '/tab title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );
		
		$tab_titles = array();
		if( isset($matches[1]) ){ $tab_titles = $matches[1]; }
		
		$output = '';
		
		if( count($tab_titles) ){
		    $output .= '<div id="fx-tabs-'. $i .'" class="fx-tabs"><div class="fx-tab-inner">';
			$output .= '<ul class="fx-nav fx-clearfix">';
			
			foreach( $tab_titles as $tab ){
				$output .= '<li><a href="#fx-tab-'. sanitize_title( $tab[0] ) .'">' . $tab[0] . '</a></li>';
			}
		    
		    $output .= '</ul>';
		    $output .= do_shortcode( $content );
		    $output .= '</div></div>';
		} else {
			$output .= do_shortcode( $content );
		}
		
		return $output;
	}
	add_shortcode( 'fx_tabs', 'fx_tabs' );
}

if (!function_exists('fx_tab')) {
	function fx_tab( $atts, $content = null ) {
		$defaults = array( 'title' => 'Tab' );
		extract( shortcode_atts( $defaults, $atts ) );
		
		return '<div id="fx-tab-'. sanitize_title( $title ) .'" class="fx-tab">'. do_shortcode( $content ) .'</div>';
	}
	add_shortcode( 'fx_tab', 'fx_tab' );
}

?>