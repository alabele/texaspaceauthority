<?php
/**
 * This functions makes the theme compatible with WPML Plugin
 *
 *
 * @package Catch Themes
 * @subpackage Catch Kathmandu
 * @since Catch Kathmandu 2.0
 */
 

if ( ! function_exists( 'catchkathmandu_wpml_invalidcache' ) ) :
/**
 * Template for Clearing WPML Invalid Cache
 *
 * To override this in a child theme
 * simply create your own catchkathmandu_wpml_invalidcache(), and that function will be used instead.
 *
 * @since Catch Kathmandu Pro 2.0
 */
function catchkathmandu_wpml_invalidcache() {
	delete_transient( 'catchkathmandu_post_sliders' );
	delete_transient( 'catchkathmandu_page_sliders' );
	delete_transient( 'catchkathmandu_category_sliders' );
	delete_transient( 'catchkathmandu_image_sliders' );
	delete_transient( 'catchkathmandu_homepage_headline' );
	delete_transient( 'catchkathmandu_featured_content' );
	delete_transient( 'catchkathmandu_footer_content' );	
	delete_transient( 'catchkathmandu_footercode' );
	delete_transient( 'catchkathmandu_featured_image' );

} // catchkathmandu_wpml_invalidcache
endif;

add_action( 'after_setup_theme', 'catchkathmandu_wpml_invalidcache' );
