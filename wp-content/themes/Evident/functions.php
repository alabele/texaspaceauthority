<?php
	$themeprefix = 'evident_';
	$metaboxprefix = 'mig_';
	$adminoptions = get_option(''.$themeprefix.'theme_options');
	
 	

/* ------------------------ Required Files ------------------------------------------------ */
/**********************************************************************************************/
	require_once('inc/arrays.php');
	require_once('inc/themeadmin.php');
	require_once('inc/fonts.php');
	require_once('inc/post-types.php');
	require_once('inc/meta-boxes.php');
	require_once('inc/widgets.php');
	require_once('inc/tipsy-social-icons/social-icons.php');
	require_once('inc/latest-tweet/latest-tweet.php');
	require_once('inc/plugins/plugin-activation.php');
	require_once('inc/slideshow.php');
	require_once('inc/FX-Shortcodes/fx-shortcodes.php');
	require_once('inc/background-select.php');
	require_once('inc/widgets/flickr/index.php');
	require_once('inc/page_title.php');
	require_once('inc/FX-Shortcodes/shortcodes/zshortcodes.php');

	
	

	
	

/* ------------------------ Theme Support ------------------------------------------------ */
/**********************************************************************************************/
	if ( function_exists( 'add_theme_support' ) ) { 
	add_theme_support( 'post-thumbnails' );
	}

	
/* ------------------------ Image sizes ------------------------------------------------ */
/**********************************************************************************************/
	
	

	set_post_thumbnail_size( 196, 110, true );  
	add_image_size('carouselimg', 300, 205, true);
	add_image_size('square', 170, 170, true);
	add_image_size('square', 350, 350, true);
	add_image_size('mediumsquare', 450, 450, true);
	add_image_size('bigsquare', 530, 530, true);
	add_image_size('landscape', 330, 187, true);
	add_image_size('mediumlandscape', 594, 337, true);
	add_image_size('biglandscape', 832, 472, true);

	
/* ------------------------ Menu ------------------------------------------------ */
/**********************************************************************************************/
	if ( function_exists( 'register_nav_menu' ) ) {
		register_nav_menu( 'primary', __('Primary Menu') );
		
		
		register_nav_menu( 'secondary', __('Top Menu') );

	}

/* ------------------------ Scripts and Styles ------------------------------------------------ */
/**********************************************************************************************/


	//---------Styles ----------------
	require_once('css/dynamic-styles.php');
	
	if(!is_admin()&& function_exists('wp_register_style')){
	wp_register_style( 'basic-layout', get_template_directory_uri().'/css/basic-layout.css');
	wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/css/flexslider.css' );
	wp_enqueue_style('basic-layout');
	wp_enqueue_style( 'prettyPhotocss', get_template_directory_uri() . '/inc/prettyPhoto/css/prettyPhoto.css' );
	wp_register_style('customcss', get_template_directory_uri() . '/css/custom.css');
	wp_enqueue_style('customcss');
	wp_register_style('fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css');
	wp_enqueue_style('fontawesome');
	
	};
	
	wp_enqueue_style( 'genericstyles', get_template_directory_uri() . '/css/generic.css' );	
	
	
	
	//---------Scripts ---------------
	
	wp_enqueue_script('jquery');
	
	if(!is_admin() && function_exists('wp_register_script')){
	wp_register_script( 'theme-scripts', get_template_directory_uri() .' /js/mig-theme-scripts.js' );
	wp_enqueue_script( 'theme-scripts');
	wp_register_script('prettyPhoto', get_template_directory_uri(). '/inc/prettyPhoto/jquery.prettyPhoto.js');
	wp_enqueue_script('prettyPhoto');
	wp_register_script('tinynav', get_template_directory_uri(). '/js/tinynav.min.js');
	wp_enqueue_script('tinynav');
	wp_register_script('modernizr', get_template_directory_uri(). '/js/modernizr.js');
	wp_enqueue_script('modernizr');
	wp_enqueue_script( 'caroufredsel', get_template_directory_uri() . '/js/jquery.carouFredSel-6.1.0-packed.js');
	wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js');
	wp_enqueue_script( 'isotope', get_template_directory_uri() . '/js/jquery.isotope.min.js');
	
	
	
	
	
	
		

		if(function_exists('add_action')){
		add_action('after_setup_theme', 'load_dynamic_styles');
		}
		
		
		if(!function_exists('load_dynamic_styles')) {
			function load_dynamic_styles() {
			add_action('wp_head', 'dynamic_styles');
			}
		}
	};
	
	
	
/* ------------------------ Sidebars ------------------------------------------------ */
/**********************************************************************************************/

if ( function_exists('register_sidebar') ) {
	

	register_sidebar( array (
		'name' => __('Main Sidebar'),
		'id' => 'main-sidebar',
		'description' => __('Main widget area.'),
		'before_widget' => '<div class="sidebar-widget">',
		'after_widget' => '</div>',
		'before_title' => '<div class="mwtitle"><h4>',
		'after_title' => '</h4></div>',
	));

	register_sidebar( array (
		'name' => __('Footer Column 1'),
		'id' => 'footer1',
		'description' => __('Footer widget area.'),
		'before_widget' => '<div  class="footer-widget">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="fwtitle headerbold"><span>',
		'after_title' => '</span></h4>',
	));

	register_sidebar( array (
		'name' => __('Footer Column 2'),
		'id' => 'footer2',
		'description' => __('Footer widget area.'),
		'before_widget' => '<div  class="footer-widget">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="fwtitle headerbold">',
		'after_title' => '</h4>',
	));

	register_sidebar( array (
		'name' => __('Footer Column 3'),
		'id' => 'footer3',
		'description' => __('Footer widget area.'),
		'before_widget' => '<div  class="footer-widget">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="fwtitle headerbold">',
		'after_title' => '</h4>',
	));


	register_sidebar( array (
		'name' => __('Footer Column 4'),
		'id' => 'footer4',
		'description' => __('Footer widget area.'),
		'before_widget' => '<div  class="last-footer-widget">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="fwtitle headerbold">',
		'after_title' => '</h4>',
	));
	
	
}
/* ------------------------ OTHERS ------------------------------------------------ */
/**********************************************************************************************/

/*======================== Tag Cloud Widget =========================*/

	function custom_tag_cloud_widget($args) {
	$args['largest'] = 12; //largest tag
	$args['smallest'] = 12; //smallest tag
	$args['unit'] = 'px'; //tag font unit
	return $args;
	}
	
	add_filter( 'widget_tag_cloud_args', 'custom_tag_cloud_widget' );

/*============== Google Analytics ============== */

if(!function_exists('google_analytics')) {
	function google_analytics(){
		global $themeprefix;
		$adminoptions = get_option(''.$themeprefix.'theme_options');
		echo stripslashes($adminoptions[''.$themeprefix.'google_analytics']);
		};

	add_action('wp_footer', 'google_analytics');
	
}

/*============== Breadcrumb ============== */
if(!function_exists('the_breadcrumb')) {
	function the_breadcrumb() {
    	if (!is_home()) {
        	echo '<a href="';
        	echo get_option('home');
            	echo '">';
        	bloginfo('name');
        	echo "</a> » ";
        	if (is_category() || is_single()) {
            	the_category('title_li=');
            	if (is_single()) {
                	echo " » ";
                	the_title();
            	}
        	} elseif (is_page()) {
            echo the_title();
        	}
    	}
	}  
	
}


/*================================= Pagination ====================================*/ 	

if(!function_exists('mig_pagination')) {
function mig_pagination() {
global $wp_query;

$big = 999999999; // need an unlikely integer

echo paginate_links( array(
	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	'format' => '?paged=%#%',
	'current' => max( 1, get_query_var('paged') ),
	'total' => $wp_query->max_num_pages
) );
}

}

/*=========== Fix extra P ===================*/

add_filter('the_content', 'do_shortcode', 7);	


/*========================== Google Fonts ===========================*/

mig_google_fonts();

/*====================Fix rel W3C validation==================*/
	add_filter( 'the_category', 'add_nofollow_cat' );  function add_nofollow_cat( $text ) { $text = str_replace('rel="category"', "", $text); return $text; }
	


/*============================== View more link ================================*/

	function mig_MoreLink($link) {
    $link = '<span class="mig-more-link clearfix"><a href="'.get_permalink().'"><span class="more-plus">View More</span></a></span>';
    return $link;
	}
 
	add_filter('the_content_more_link', 'mig_MoreLink');
	
	
/*=================== Hide editor of some custom post types=========================*/
add_action('admin_head', 'hide_editor');

function hide_editor() {
	if(get_post_type() == 'slideshow' or get_post_type() == 'gallery') {
	?>
	<style type="text/css">
	#postdivrich { display:none; }
	</style>
	<?php
	}
}
?>