<?php

/* 
 * Note: Options Typography is a child theme of Options Framework Theme
 * So all the functions from the parent theme are also inherited
 */
 
 /**
 * Returns an array of system fonts
 * Feel free to edit this, update the font fallbacks, etc.
 */

function options_typography_get_os_fonts() {
	// OS Font Defaults
	$os_faces = array(
		'Arial, sans-serif' => 'Arial',
		'"Avant Garde", sans-serif' => 'Avant Garde',
		'Cambria, Georgia, serif' => 'Cambria',
		'Copse, sans-serif' => 'Copse',
		'Garamond, "Hoefler Text", Times New Roman, Times, serif' => 'Garamond',
		'Georgia, serif' => 'Georgia',
		'"Helvetica Neue", Helvetica, sans-serif' => 'Helvetica Neue',
		'Tahoma, Geneva, sans-serif' => 'Tahoma'
	);
	return $os_faces;
}

/**
 * Returns a select list of Google fonts
 * Feel free to edit this, update the fallbacks, etc.
 */

function options_typography_get_google_fonts() {
	// Google Font Defaults
	$google_faces = array(
		'Arial, sans-serif' => 'Arial',
		'"Avant Garde", sans-serif' => 'Avant Garde',
		'Cambria, Georgia, serif' => 'Cambria',
		'Copse, sans-serif' => 'Copse',
		'Garamond, "Hoefler Text", Times New Roman, Times, serif' => 'Garamond',
		'Georgia, serif' => 'Georgia',
		'"Helvetica Neue", Helvetica, sans-serif' => 'Helvetica Neue',
		'Tahoma, Geneva, sans-serif' => 'Tahoma',
		'Droid Sans, sans-serif' => 'Droid Sans',
		'Droid Serif, serif' => 'Droid Serif',
		'Open Sans, sans-serif' => 'Open Sans',
		'Domine, serif' => 'Domine',
 		'Exo, sans-serif' => 'Exo',
 		'Gilda Display, serif' => 'Gilda Display',
 		'Anaheim, sans-serif' => 'Anaheim',
 		'Share Tech, sans-serif' => 'Share Tech',
		 'Sanchez, serif' => 'Sanchez',
 		'Playfair Display SC, serif' => 'Playfair Display SC',
 		'Cutive Mono, serif' => 'Cutive Mono',
		 'Unica One, cursive' => 'Unica One',
 		'Cagliostro, sans-serif' => 'Cagliostro',
 		'Montaga, serif' => 'Montaga',
 		'Julius Sans One, sans-serif' => 'Julius Sans One',
 		'Cinzel, serif' => 'Cinzel',
 		'Titillium Web, sans-serif' => 'Titillium Web',
 		'BenchNine, sans-serif' => 'BenchNine',
 		'Archivo Narrow, sans-serif' => 'Archivo Narrow',
 		'Montserrat Alternates, sans-serif' => 'Montserrat Alternates',
 		'Poiret One, cursive' => 'Poiret One',
 		'Alex Brush, cursive' => 'Alex Brush',
 		'Marcellus, serif' => 'Marcellus',
 		'Cinzel Decorative, cursive' => 'Cinzel Decorative',
 		'Varela Round, sans-serif' => 'Varela Round',
 		'Telex, sans-serif' => 'Telex',
 		'Average Sans, sans-serif' => 'Average Sans',
 		'Rochester, cursive' => 'Rochester',
 		'Overlock, cursive' => 'Overlock',
 		'Marcellus SC, serif' => 'Marcellus SC',
 		'Inika, serif' => 'Inika',
 		'Carme, sans-serif' => 'Carme',
 		'Cantata One, serif' => 'Cantata One',
 		'Rosario, sans-serif' => 'Rosario',
 		'Damion, cursive' => 'Damion',
 		'Felipa, cursive' => 'Felipa',
 		'Bilbo Swash Caps, cursive' => 'Bilbo Swash Caps',
		 'ABeeZee, sans-serif' => 'ABeeZee',
 		'Buenard, serif' => 'Buenard',
 		'Average, serif' => 'Average',
 		'Inder, sans-serif' => 'Inder',
 		'Merienda One, cursive' => 'Merienda One',
 		'Federo, sans-serif' => 'Federo',
 		'Josefin Sans, sans-serif' => 'Josefin Sans',
 		'Gudea, sans-serif' => 'Gudea',
 		'Linden Hill, serif' => 'Linden Hill',
 		'Coda, cursive' => 'Coda',
 		'Unna, serif' => 'Unna',
 		'Pompiere, cursive' => 'Pompiere',
 		'Duru Sans, sans-serif' => 'Duru Sans',
 		'Bree Serif, serif' => 'Bree Serif',
 		'Oxygen, sans-serif' => 'Oxygen',
 		'Oleo Script, cursive' => 'Oleo Script',
 		'Rosarivo, serif' => 'Rosarivo',
 		'Courgette, cursive' => 'Courgette',
 		'Corben, cursive' => 'Corben',
 		'Karla, sans-serif' => 'Karla',
 		'Comfortaa, cursive' => 'Comfortaa',
 		'Ovo, serif' => 'Ovo',
 		'Signika Negative, sans-serif' => 'Signika Negative',
 		'Questrial, sans-serif' => 'Questrial',
 		'Lato, sans-serif' => 'Lato',
		'Lora, serif' => 'Lora',

	);
	return $google_faces;
}


/* 
 * Outputs the selected option panel styles inline into the <head>
 */
 
function options_typography_styles() {
 	
 	// It's helpful to include an option to disable styles.  If this is selected
 	// no inline styles will be outputted into the <head>
 	
 	
		
		
		
		if ( of_get_option( 'main-titles-font' ) ) {
			$input = of_get_option( 'main-titles-font' );
			$output .= options_typography_font_styles( of_get_option( 'main-titles-font' ) , '.main-titles-font');
		}
		
		if ( of_get_option( 'secondary-titles-font' ) ) {
			$input = of_get_option( 'secondary-titles-font' );
			$output .= options_typography_font_styles( of_get_option( 'secondary-titles-font' ) , '.secondary-titles-font');
		}
		
		if ( of_get_option( 'content-font' ) ) {
			$input = of_get_option( 'content-font' );
			$output .= options_typography_font_styles( of_get_option( 'content-font' ) , '.content-font');
		}
		
		
	
}
add_action('wp_head', 'options_typography_styles');

/* 
 * Returns a typography option in a format that can be outputted as inline CSS
 */
 
function options_typography_font_styles($option, $selectors) {
		$output = $selectors . ' {';
		$output .= ' color:' . $option['color'] .'; ';
		$output .= 'font-family:' . $option['face'] . '; ';
		$output .= 'font-weight:' . $option['style'] . '; ';
		$output .= 'font-size:' . $option['size'] . '; ';
		$output .= '}';
		$output .= "\n";
		return $output;
}

/**
 * Checks font options to see if a Google font is selected.
 * If so, options_typography_enqueue_google_font is called to enqueue the font.
 * Ensures that each Google font is only enqueued once.
 */
 
if ( !function_exists( 'options_typography_google_fonts' ) ) {
	function options_typography_google_fonts() {
		$all_google_fonts = array_keys( options_typography_get_google_fonts() );
		// Define all the options that possibly have a unique Google font
		$google_font_main_title = of_get_option('main-titles-font', 'Open Sans, sans-serif');
		$google_font_secondary_title = of_get_option('secondary-titles-font', 'Open Sans, sans-serif');
		$google_font_content_font = of_get_option('content-font', 'Open Sans, sans-serif');
		// Get the font face for each option and put it in an array
		$selected_fonts = array(
			$google_font_main_title['face'],
			$google_font_secondary_title['face'],
			$google_font_content_font['face'],
			 );
		// Remove any duplicates in the list
		$selected_fonts = array_unique($selected_fonts);
		// Check each of the unique fonts against the defined Google fonts
		// If it is a Google font, go ahead and call the function to enqueue it
		foreach ( $selected_fonts as $font ) {
			if ( in_array( $font, $all_google_fonts ) ) {
				options_typography_enqueue_google_font($font);
			}
		}
	}
}

add_action( 'wp_enqueue_scripts', 'options_typography_google_fonts' );

/**
 * Enqueues the Google $font that is passed
 */
 
function options_typography_enqueue_google_font($font) {
	$font = explode(',', $font);
	$font = $font[0];
	// Certain Google fonts need slight tweaks in order to load properly
	// Like our friend "Raleway"
	if ( $font == 'Raleway' )
		$font = 'Raleway:100';
	$font = str_replace(" ", "+", $font);
	wp_enqueue_style( "options_typography_$font", "http://fonts.googleapis.com/css?family=$font", false, null, 'all' );
}
