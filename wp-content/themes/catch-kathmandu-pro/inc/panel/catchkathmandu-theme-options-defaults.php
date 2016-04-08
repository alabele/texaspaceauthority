<?php
/**
 * @package Catch Themes
 * @subpackage Catch_Kathmandu
 * @since Catch Kathmandu 1.0
 */


if ( ! function_exists( 'catchkathmandu_available_fonts' ) ) :
/**
 * Returns an array of fonts available to the theme.
 *
 * @since Catch Box Pro 1.0
 */
function catchkathmandu_available_fonts() {	

	return array(
		'arial-black'			=> '"Arial Black", Gadget, sans-serif',
		'allan'					=> 'Allan, sans-serif',
		'allerta'				=> 'Allerta, sans-serif',
		'amaranth'				=> 'Amaranth, sans-serif',
		'arial'					=> 'Arial, Helvetica, sans-serif',
		'bitter'				=> 'Bitter, sans-serif',
		'cabin'					=> 'Cabin, sans-serif',
		'cantarell'				=> 'Cantarell, sans-serif',
		'century-gothic'		=> '"Century Gothic", sans-serif',
		'courier-new'			=> '"Courier New", Courier, monospace',
		'crimson-text'			=> '"Crimson Text", sans-serif',
		'cuprum'				=> '"Cuprum", sans-serif',
		'dancing-script'		=> '"Dancing Script", sans-serif',
		'droid-sans'			=> '"Droid Sans", sans-serif',
		'droid-serif'			=> '"Droid Serif", sans-serif',
		'georgia'				=> 'Georgia, "Times New Roman", Times, serif',
		'helvetica'				=> 'Helvetica, "Helvetica Neue", Arial, sans-serif',
		'helvetica-neue'		=> '"Helvetica Neue",Helvetica,Arial,sans-serif',
		'istok-web'				=> '"Istok Web", sans-serif',
		'impact'				=> 'Impact, Charcoal, sans-serif',
		'lato'					=> '"Lato", sans-serif',
		'lucida-sans-unicode'	=> '"Lucida Sans Unicode", "Lucida Grande", sans-serif',
		'lucida-grande'			=> '"Lucida Grande", "Lucida Sans Unicode", sans-serif',
		'lobster'				=> 'Lobster, sans-serif',
		'lora'					=> '"Lora", serif',
		'monaco'				=> 'Monaco, Consolas, "Lucida Console", monospace, sans-serif',
		'nobile'				=> 'Nobile, sans-serif',
		'open-sans'				=> '"Open Sans", sans-serif',
		'oswald'				=> '"Oswald", sans-serif',
		'palatino'				=> 'Palatino, "Palatino Linotype", "Book Antiqua", serif',	
		'patua-one'				=> '"Patua One", sans-serif',
		'playfair-display'		=> '"Playfair Display", sans-serif',
		'pt-sans'				=> '"PT Sans", sans-serif',
		'pt-serif'				=> '"PT Serif", serif',
		'quattrocento-sans' 	=> '"Quattrocento Sans", sans-serif',
		'roboto'				=> 'Roboto, sans-serif',
		'sans-serif'			=> 'Sans Serif, Arial',
		'tahoma'				=> 'Tahoma, Geneva, sans-serif',
		'trebuchet-ms'			=> '"Trebuchet MS", "Helvetica", sans-serif',
		'times-new-roman'		=> '"Times New Roman", Times, serif',
		'ubuntu'				=> 'Ubuntu, sans-serif',
		'verdana'				=> 'Verdana, Geneva, sans-serif',
		'yanone-kaffeesatz' 	=> '"Yanone Kaffeesatz", sans-serif'
	);
	
}
endif;


/**
 * Set the default values for all the settings. If no user-defined values
 * is available for any setting, these defaults will be used.
 */
global $catchkathmandu_options_defaults;
$catchkathmandu_options_defaults = array(
	'disable_responsive'					=> '0',
	'enable_menus'							=> '0',
	'fav_icon'								=> get_template_directory_uri().'/images/favicon.ico',
 	'remove_favicon'						=> '0',
	'web_clip'								=> get_template_directory_uri().'/images/apple-touch-icon.png',
 	'remove_web_clip'						=> '1',
	'site_title_above'						=> '0',
	'homepage_headline'						=> 'Catch Kathmandu Pro is a Premium Responsive WordPress Theme',
	'homepage_subheadline'					=> 'It is Simple, Clean and Responsive WordPress Theme which automatically adapts to the screen\'s size.',
	'homepage_headline_button'				=> 'Buy Now',
	'homepage_headline_url'					=> 'http://catchthemes.com/themes/catch-kathmandu-pro',
	'homepage_headline_target'				=> '1',
	'reset_featured_image'					=> '2',
	'featured_header_image'					=> get_template_directory_uri().'/images/demo/panaromic-nagarkot-view-1280x400.jpg',
	'featured_header_image_position'		=> 'before-menu',
	'enable_featured_header_image'			=> 'disable',
	'page_featured_image'					=> 'full',
	'featured_header_image_url'				=> '',
	'featured_header_image_alt'				=> '',
	'featured_header_image_base'			=> '0',
 	'disable_header_right_sidebar'			=> '0',
	'color_scheme'							=> 'light',
	'header_background'						=> '#fff',
	'content_background'					=> '#fff',
	'footer_sidebar_background'				=> '#fafafa',
	'footer_background'						=> '#3a3d41',
	'title_color'							=> '#222',
	'title_hover_color'						=> '#0088cc',
	'meta_color'							=> '#757575',
	'text_color'							=> '#404040',
	'link_color'							=> '#0088cc',
	'widget_title_color'					=> '#404040',
	'widget_color'							=> '#fff',
	'widget_link_color'						=> '#757575',
	'scrollup_bg_color'						=> '#000',
	'scrollup_text_color'					=> '#fff',
	'reset_color'							=> '2',
	'pagination_pages_color'				=> '#555',
	'pagination_bg_color'					=> '#21759b',
	'pagination_text_color'					=> '#ddd',
	'pagination_active_bg_color'			=> '#1b5f7d',
	'pagination_active_text_color'			=> '#fff',	
	'reset_pagination_color'				=> '2',
	'slider_background'						=> '#21759b',
	'slider_border'							=> '#1b5f7d',
	'slider_controller'						=> '#21759b',
	'slider_controller_text'				=> '#fff',
	'slider_content_bg_color'				=> '#21759b',
	'slider_content_text_color'				=> '#fff',
	'reset_slider_color'					=> '2',	
	'home_headline_background'				=> '#21759b',
	'home_headline'							=> '#fff',
	'home_headline_border'					=> '#1b5f7d',
	'home_headline_button_bg'				=> '#9bc23c',
	'home_headline_button'					=> '#fff',
	'home_headline_button_bg_hover'			=> '#87ae28',
	'home_headline_button_hover'			=> '#fff',
	'home_headline_button_border'			=> '#fff',
	'reset_home_headline_color'				=> '2',
	'menu_background'						=> 'transparent',
	'menu_color'							=> '#333',
	'hover_active_color'					=> '#1b5f7d',
	'hover_active_text_color'				=> '#fff',
	'sub_menu_bg_color'						=> '#2581aa',
	'sub_menu_text_color'					=> '#fff',
	'secondary_menu_background'				=> '#2581aa',
	'secondary_menu_color'					=> '#fff',
	'secondary_hover_active_color'			=> '#1b5f7d',
	'secondary_hover_active_text_color'		=> '#fff',
	'secondary_sub_menu_bg_color'			=> '#2581aa',
	'secondary_sub_menu_text_color'			=> '#fff',
	'footer_menu_background'				=> '#1b5f7d',
	'footer_menu_color'						=> '#ccc',
	'footer_hover_active_color'				=> '#1b5f7d',
	'footer_hover_active_text_color'		=> '#fff',
	'footer_sub_menu_bg_color'				=> '#2581aa',
	'footer_sub_menu_text_color'			=> '#fff',	
	'reset_menu_color'						=> '2',
	'body_font'								=> 'sans-serif',
	'title_font'							=> 'sans-serif',
	'tagline_font'							=> 'sans-serif',
	'content_tittle_font'					=> 'sans-serif',
	'content_font'							=> 'sans-serif',
	'headings_font'							=> 'sans-serif',
	'reset_typography'						=> '2',	
	'commenting_setting'					=> 'default',
	'commenting_disable_url'				=> '0',	
	'custom_css'							=> '',	
	'disable_notifier'						=> '0',
	'disable_scrollup'						=> '0',
	'sidebar_layout'						=> 'right-sidebar',
	'content_layout'						=> 'full',
	'featured_image'						=> 'featured',
	'reset_layout'							=> '2',
	'more_tag_text'							=> __( 'Continue Reading &rarr;', 'catch-kathmandu' ),
	'reset_moretag'							=> '2',
	'excerpt_length'						=> 30,
 	'search_display_text'					=> __( 'Search &hellip;', 'catch-kathmandu' ),
	'feed_url'								=> '',
	'display_homepage_headline'				=> 'homepage',
	'disable_homepage_headline'				=> '0',
	'disable_homepage_subheadline'			=> '0',
	'disable_homepage_button'				=> '0',
	'disable_homepage_featured'				=> '0',
	'homepage_featured_type'				=> 'featured-content-demo',
	'homepage_featured_category'			=> array(),
	'featured_content_page'					=> array(),
	'featured_content_post'					=> array(),	
	'homepage_featured_headline'			=> '',
	'homepage_featured_qty'					=> 4,
	'homepage_featured_layout'				=> 'four-columns',
	'homepage_featured_image'				=> array(),
	'homepage_featured_url'					=> array(),
	'homepage_featured_base'				=> array(),
	'homepage_featured_title'				=> array(),
	'homepage_featured_content'				=> array(),
	'enable_posts_home'						=> '0',
	'move_posts_home'						=> '0',
 	'front_page_category'					=> array(),
	'select_slider_type'					=> 'demo-slider',
	'enable_slider'							=> 'enable-slider-homepage',
 	'featured_slider'						=> array(),
	'featured_slider_page'					=> array(),	
	'slider_category'						=> array(),
	'featured_image_slider_image'			=> array(),
	'featured_image_slider_link' 			=> array(),
	'featured_image_slider_base'			=> array(),
	'featured_image_slider_title' 			=> array(),
	'featured_image_slider_content' 		=> array(),
	'slider_qty'							=> 4,
 	'transition_effect'						=> 'fade',
 	'transition_delay'						=> 4,
 	'transition_duration'					=> 1,	
	'exclude_slider_post'					=> 0,
 	'social_facebook'						=> '',
 	'social_twitter'						=> '',
 	'social_googleplus'						=> '',
 	'social_pinterest'						=> '',
 	'social_youtube'						=> '',
 	'social_vimeo'							=> '',
 	'social_linkedin'						=> '',
 	'social_slideshare'						=> '',
 	'social_foursquare'						=> '',
 	'social_flickr'							=> '',
 	'social_tumblr'							=> '',
 	'social_deviantart'						=> '',
 	'social_dribbble'						=> '',
 	'social_myspace'						=> '',
 	'social_wordpress'						=> '',
 	'social_rss'							=> '',
 	'social_delicious'						=> '',
 	'social_lastfm'							=> '',
	'social_instagram'						=> '',
	'social_github'							=> '',
	'social_vkontakte'						=> '',
	'social_myworld'						=> '',
	'social_odnoklassniki'					=> '',
	'social_goodreads'						=> '',
	'social_skype'							=> '',
	'social_soundcloud'						=> '',
	'social_email'							=> '',
	'social_contact'						=> '',
	'social_xing'							=> '',
	'social_meetup'							=> '',
	'social_custom_qty'						=> 1,
	'social_custom_name'					=> array(),
	'social_custom_image'					=> array(),
	'social_custom_url'						=> array(),
 	'google_verification'					=> '',
 	'yahoo_verification'					=> '',
 	'bing_verification'						=> '',
 	'analytic_header'						=> '',
 	'analytic_footer'						=> '',
	'footer_code'							=> '<div class="copyright">'. esc_attr__( 'Copyright', 'catch-kathmandu' ) . ' &copy; [the-year]&nbsp;[site-link]. '. esc_attr__( 'All Rights Reserved', 'catch-kathmandu' ) . '.</div><div class="powered">[theme-link]</div>',
	'reset_footer'							=> '2'
);
global $catchkathmandu_options_settings;
$catchkathmandu_options_settings = catchkathmandu_options_set_defaults( $catchkathmandu_options_defaults );

function catchkathmandu_options_set_defaults( $catchkathmandu_options_defaults ) {
	$catchkathmandu_options_settings = array_merge( $catchkathmandu_options_defaults, (array) get_option( 'catchkathmandu_options', array() ) );
	return $catchkathmandu_options_settings;
}


/**
 * Returns the current year.
 *
 * @uses date() Gets the current year.
 * @return string
 */
function catchkathmandu_the_year() {
	return date( __( 'Y', 'catch-kathmandu' ) );
}


/**
 * Returns a link back to the site.
 *
 * @uses get_bloginfo() Gets the site link
 * @return string
 */
function catchkathmandu_site_link() {
	return '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" ><span>' . get_bloginfo( 'name', 'display' ) . '</span></a>';
}


/**
 * Returns a link to Theme Shop.
 *
 * @return string
 */
function catchkathmandu_shop_link() {
	return '<a href="'. esc_url( __( 'http://catchthemes.com', 'catch-kathmandu' ) ) . '" target="_blank" title="' . esc_attr__( 'Catch Themes', 'catch-kathmandu' ) . '"><span>' . __( 'Catch Themes', 'catch-kathmandu' ) . '</span></a>';
}

/**
 * Returns a link to WordPress.org.
 *
 * @return string
 */
function catchkathmandu_wp_link() {
	return '<a href="http://wordpress.org" target="_blank" title="' . esc_attr__( 'WordPress', 'catch-kathmandu' ) . '"><span>' . __( 'WordPress', 'catch-kathmandu' ) . '</span></a>';
}

/**
 * Returns a link to Catch Kathmandu Pro
 *
 * @return string
 */
function catchkathmandu_theme_link() {
	return '<a href="http://catchthemes.com/themes/catch-kathmandu-pro" target="_blank" title="' . esc_attr__( 'Catch Kathmandu Pro', 'catch-kathmandu' ) . '"><span>' . __( 'Theme: Catch Kathmandu Pro', 'catch-kathmandu' ) . '</span></a>';
}