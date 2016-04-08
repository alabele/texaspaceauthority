<?php
/**
 * This functions makes the theme compatible with qTranslate Plugin
 *
 *
 * @package Catch Themes
 * @subpackage Catch Kathmandu
 * @since Catch Kathmandu 2.0
 */

if ( ! function_exists( 'catchkathmandu_menuitem' ) ) :
/**
 * Template for Converting Home link in Custom Menu
 *
 * To override this in a child theme
 * simply create your own catchkathmandu_menuitem(), and that function will be used instead.
 *
 * @since Catch Kathmandu Pro 2.0
 */
function catchkathmandu_menuitem( $menu_item ) {
	// convert local URLs in custom menu items	
	if ( $menu_item->type == 'custom' && stripos($menu_item->url, get_site_url()) !== false) {
		$menu_item->url = qtrans_convertURL($menu_item->url);
	}     
		return $menu_item;
} // catchkathmandu_menuitem
endif;

add_filter( 'wp_setup_nav_menu_item' , 'catchkathmandu_menuitem', 0 );


if ( ! function_exists( 'catchkathmandu_qtranslate_invalidcache' ) ) :
/**
 * Template for Clearing qtranslate Invalid Cache
 *
 * To override this in a child theme
 * simply create your own catchkathmandu_qtranslate_invalidcache(), and that function will be used instead.
 *
 * @since Catch Kathmandu Pro 2.0
 */
function catchkathmandu_qtranslate_invalidcache() {
	delete_transient( 'catchkathmandu_post_sliders' );
	delete_transient( 'catchkathmandu_page_sliders' );
	delete_transient( 'catchkathmandu_category_sliders' );
	delete_transient( 'catchkathmandu_image_sliders' );
	delete_transient( 'catchkathmandu_homepage_headline' );
	delete_transient( 'catchkathmandu_featured_content' );
	delete_transient( 'catchkathmandu_footer_content' );	
	delete_transient( 'catchkathmandu_footercode' );
	delete_transient( 'catchkathmandu_featured_image' );
	
} // catchkathmandu_qtranslate_invalidcache
endif;

add_action( 'after_setup_theme', 'catchkathmandu_qtranslate_invalidcache' );
