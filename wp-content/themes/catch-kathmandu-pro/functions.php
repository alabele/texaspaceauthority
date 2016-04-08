<?php
/**
 * Catch Kathmandu Pro functions and definitions
 *
 * @package Catch Themes
 * @subpackage Catch Kathmandu
 * @since Catch Kathmandu 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Catch Kathmandu 1.0
 */
if ( ! isset( $content_width ) ) {
	$content_width = 750;
}


if ( ! function_exists( 'catchkathmandu_content_width' ) ) :
/**
 * Change the content width based on the Theme Settings and Page/Post Settings
 *
 * @since Catch Kathmandu 4.0
 */
function catchkathmandu_content_width() {
	//Getting Ready to load data from Theme Options Panel
	global $post, $wp_query, $content_width, $catchkathmandu_options_settings;
	$options = $catchkathmandu_options_settings;
	$themeoption_layout = $options['sidebar_layout'];
	
	// Front page displays in Reading Settings
	$page_on_front = get_option('page_on_front') ;
	$page_for_posts = get_option('page_for_posts');

	// Get Page ID outside Loop
	$page_id = $wp_query->get_queried_object_id();

	// Blog Page setting in Reading Settings
	if ( $page_id == $page_for_posts ) {
		$layout = get_post_meta( $page_for_posts,'catchkathmandu-sidebarlayout', true );
	}
	elseif ( $post)  {
		if ( is_attachment() ) {
			$parent = $post->post_parent;
			$layout = get_post_meta( $parent,'catchkathmandu-sidebarlayout', true );
		} else {
			$layout = get_post_meta( $post->ID,'catchkathmandu-sidebarlayout', true );
		}
	}

	if ( empty( $layout ) || ( !is_page() && !is_single() ) ) {
		$layout = 'default';
	}

	// Theme Columns: Defaul width sidebars
	if ( ( $layout == 'no-sidebar-full-width' ) || ( $layout=='default' && $themeoption_layout == 'no-sidebar-full-width' ) ) {
		$content_width = 1180;
	}
	
}
endif; // catchkathmandu_content_width

add_action( 'template_redirect', 'catchkathmandu_content_width' );


if ( ! function_exists( 'catchkathmandu_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since Catch Kathmandu 1.0
 */
function catchkathmandu_setup() {
				
	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on Catch Kathmandu, use a find and replace
	 * to change 'catch-kathmandu' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'catch-kathmandu', get_template_directory() . '/languages' );	
	
	/**
	 * Add callback for custom TinyMCE editor stylesheets. (editor-style.css)
	 * @see http://codex.wordpress.org/Function_Reference/add_editor_style
	 */
	add_editor_style();	
	
	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/*
	* Let WordPress manage the document title.
	* By adding theme support, we declare that this theme does not use a
	* hard-coded <title> tag in the document head, and expect WordPress to
	* provide it for us.
	*/
	add_theme_support( 'title-tag' );	
	
	/**
	 * Theme Options Defaults
	 */	
	require( get_template_directory() . '/inc/panel/catchkathmandu-theme-options-defaults.php' );	

	/**
	 * Custom Theme Options
	 */
	require( get_template_directory() . '/inc/panel/theme-options.php' );	
	
	/**
	 * Custom functions that act independently of the theme templates
	 */
	require( get_template_directory() . '/inc/catchkathmandu-functions.php' );	
	
	/**
	 * Metabox
	 */
	require( get_template_directory() . '/inc/catchkathmandu-metabox.php' );

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Register Sidebar and Widget.
	 */
	require( get_template_directory() . '/inc/catchkathmandu-widgets.php' );
	
	//Getting Ready to load data from Theme Options Panel
	global $catchkathmandu_options_settings;
   	$options = $catchkathmandu_options_settings;		
	
	/**
	 * Load up our new theme update notifier.
	 */	
	if ( $options[ 'disable_notifier' ] == '0' ) {	 
		require( get_template_directory() . '/inc/catchthemes-update-notifier.php' );	
	}
	
	/*
	 * This theme supports custom background color and image, and here
	 * 
	 */	
	add_theme_support( 'custom-background', array( 'wp-head-callback' => 'catchkathmandu_background_callback' ) );

	/**
     * This feature enables custom-menus support for a theme.
     * @see http://codex.wordpress.org/Function_Reference/register_nav_menus
     */		
	register_nav_menus(array(
		'primary' 	=> __( 'Primary Menu', 'catch-kathmandu' ),
	   	'secondary'	=> __( 'Secondary Menu', 'catch-kathmandu' ),
		'footer'	=> __( 'Footer Menu', 'catch-kathmandu' )
	) );
	
	/**
	 * Custom Menus Functions.
	 */
	require( get_template_directory() . '/inc/catchkathmandu-menus.php' );	

	/**
	 * Add support for the Aside Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio' ) );
	
	/**
     * This feature enables Jetpack plugin Infinite Scroll
     */		
    add_theme_support( 'infinite-scroll', array(
		'type'           => 'click',										
        'container'      => 'content',
        'footer_widgets' => array( 'sidebar-2', 'sidebar-3', 'sidebar-4' ),
        'footer'         => 'page'
    ) );
	
	/**
	 * Enable support for Post Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'slider', 1280, 550, true); //Featured Post Slider Image
	add_image_size( 'featured', 750, 499, true); //Featured Image
	add_image_size( 'small-featured', 360, 240, true); //Small Featured Image

	//Redirect to Theme Options Page on Activation
	global $pagenow;
	if ( is_admin() && isset($_GET['activated'] ) && $pagenow =="themes.php" ) {
		wp_redirect( 'themes.php?page=theme_options' );
	}		

}
endif; // catchkathmandu_setup
add_action( 'after_setup_theme', 'catchkathmandu_setup' );


/**
 * Implement the Custom Header feature
 */
require( get_template_directory() . '/inc/custom-header.php' );


function catchkathmandu_background_callback() {

	/* Get the background image. */
	$image = get_background_image();

	/* If there's an image, just call the normal WordPress callback. We won't do anything here. */
	if ( !empty( $image ) ) {
		_custom_background_cb();
		return;
	}

	/* Get the background color. */
	$color = get_background_color();

	/* If no background color, return. */
	if ( empty( $color ) )
		return;

	/* Use 'background' instead of 'background-color'. */
	$style = "background: #{$color};";

?>
<style type="text/css">body { <?php echo trim( $style ); ?> }</style>
<?php
}


/**
 * Add Support for WooCommerce Plugin
 */	
if ( class_exists( 'woocommerce' ) ) { 
	add_theme_support( 'woocommerce' );			
    require( get_template_directory() . '/inc/catchkathmandu-woocommerce.php' );
}


/**
 * Add Support for mqTranslate and qTranslate Plugin
 */	
if ( in_array( 'qtranslate/qtranslate.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) || in_array( 'mqtranslate/mqtranslate.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) { 
	require( get_template_directory() . '/inc/catchkathmandu-qtranslate.php' );
}


/**
 * Add Support for WPML, qTranslate X & Polylang Plugin
 */	
if ( defined( 'ICL_SITEPRESS_VERSION' ) || defined( 'QTX_VERSION' ) || class_exists( 'Polylang' ) ) {
	require( get_template_directory() . '/inc/catchkathmandu-wpml.php' );
}