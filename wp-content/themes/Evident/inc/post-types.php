<?php 

// Create Custom Post Type for Members
	
	function mig_register_member_post() {
		$labels = array(
			'name' 				=> _x( 'Members', 'post type general name' ),
			'singular_name'		=> _x( 'Member', 'post type singular name' ),
			'add_new' 			=> __( 'Add New' ),
			'add_new_item' 		=> __( 'Add New Member' ),
			'edit_item' 		=> __( 'Edit Member' ),
			'new_item' 			=> __( 'New Member' ),
			'view_item' 		=> __( 'View Member' ),
			'search_items' 		=> __( 'Search Member' ),
			'not_found' 		=> __( 'Member not found' ),
			'not_found_in_trash'=> __( 'Member not found in trash' ),
			'parent_item_colon' => __( 'Member' ),
			'menu_name'			=> __( 'Members' ),
			
		);
		
		$taxonomies = array('category');
		
		$supports = array('title','editor', 'excerpt', 'thumbnail');
		
		$post_type_args = array(
			'labels' 			=> $labels,
			'singular_label' 	=> __('Member'),
			'public' 			=> true,
			'show_ui' 			=> true,
			'publicly_queryable'=> true,
			'query_var'			=> true,
			'capability_type' 	=> 'post',
			'has_archive' 		=> false,
			'hierarchical' 		=> false,
			'rewrite' 			=> array('slug' => 'members', 'with_front' => false ),
			'supports' 			=> $supports,
			'menu_position' 	=> 28, 
			'menu_icon' 		=> get_template_directory_uri() . '/icons/members.png',
			'taxonomies'		=> $taxonomies
		 );
		 register_post_type('members',$post_type_args);
	}
	add_action('init', 'mig_register_member_post');
	
// Create Custom Post Type for Portfolio
	
	function mig_register_portfolio_post() {
		$labels = array(
			'name' 				=> _x( 'Portfolio', 'post type general name' ),
			'singular_name'		=> _x( 'Portfolio', 'post type singular name' ),
			'add_new' 			=> __( 'Add New' ),
			'add_new_item' 		=> __( 'Add New Project' ),
			'edit_item' 		=> __( 'Edit Project' ),
			'new_item' 			=> __( 'New Project' ),
			'view_item' 		=> __( 'View Project' ),
			'search_items' 		=> __( 'Search Project' ),
			'not_found' 		=> __( 'Project not found' ),
			'not_found_in_trash'=> __( 'Project not found in trash' ),
			'parent_item_colon' => __( 'Portfolio' ),
			'menu_name'			=> __( 'Portfolio' ),
			
		);
		
		$taxonomies = array('');
		
		$supports = array('title','editor', 'excerpt', 'comments', 'thumbnail');
		
		$post_type_args = array(
			'labels' 			=> $labels,
			'singular_label' 	=> __('Portfolio'),
			'public' 			=> true,
			'show_ui' 			=> true,
			'publicly_queryable'=> true,
			'query_var'			=> true,
			'capability_type' 	=> 'post',
			'has_archive' 		=> false,
			'hierarchical' 		=> false,
			'rewrite' 			=> array('slug' => 'portfolio', 'with_front' => false ),
			'supports' 			=> $supports,
			'menu_position' 	=> 28, 
			'menu_icon' 		=> get_template_directory_uri() . '/icons/portfolio.png',
			'taxonomies'		=> $taxonomies
		 );
		 register_post_type('portfolio',$post_type_args);
	}
	add_action('init', 'mig_register_portfolio_post');
	
	
		
	// Create Custom Post Type for the Gallery
	
	function mig_register_gallery_post() {
		$labels = array(
			'name' 				=> _x( 'Gallery', 'post type general name' ),
			'singular_name'		=> _x( 'Gallery', 'post type singular name' ),
			'add_new' 			=> __( 'Add New' ),
			'add_new_item' 		=> __( 'Add New Image' ),
			'edit_item' 		=> __( 'Edit Image' ),
			'new_item' 			=> __( 'New Image' ),
			'view_item' 		=> __( 'View Image' ),
			'search_items' 		=> __( 'Search Image' ),
			'not_found' 		=> __( 'Image not found' ),
			'not_found_in_trash'=> __( 'Image not found in trash' ),
			'parent_item_colon' => __( 'Image' ),
			'menu_name'			=> __( 'Gallery' ),
			
		);
		
		$taxonomies = array('category');
		
		$supports = array('title','editor', 'thumbnail');
		
		$post_type_args = array(
			'labels' 			=> $labels,
			'singular_label' 	=> __('Gallery'),
			'public' 			=> true,
			'show_ui' 			=> true,
			'publicly_queryable'=> true,
			'query_var'			=> true,
			'capability_type' 	=> 'post',
			'has_archive' 		=> false,
			'hierarchical' 		=> false,
			'rewrite' 			=> array('slug' => 'Gallery', 'with_front' => false ),
			'supports' 			=> $supports,
			'menu_position' 	=> 31, 
			'menu_icon' 		=> get_template_directory_uri() . '/icons/gallery.png',
			'taxonomies'		=> $taxonomies,
			'exclude_from_search' => true,
			
		 );
		 register_post_type('gallery',$post_type_args);
	}
	add_action('init', 'mig_register_gallery_post');
	
	// Create Custom Post Type for the Slideshow
	
	function mig_register_slideshow_post() {
		$labels = array(
			'name' 				=> _x( 'Slideshow', 'post type general name' ),
			'singular_name'		=> _x( 'Slideshow', 'post type singular name' ),
			'add_new' 			=> __( 'Add New' ),
			'add_new_item' 		=> __( 'Add New' ),
			'edit_item' 		=> __( 'Edit' ),
			'new_item' 			=> __( 'New' ),
			'view_item' 		=> __( 'View' ),
			'search_items' 		=> __( 'Search' ),
			'not_found' 		=> __( 'Not found' ),
			'not_found_in_trash'=> __( 'Not found in trash' ),
			'parent_item_colon' => __( 'Slide' ),
			'menu_name'			=> __( 'Slideshow' ),
			
		);
		
		$taxonomies = array('');
		
		$supports = array('title', 'editor');
		
		$post_type_args = array(
			'labels' 			=> $labels,
			'singular_label' 	=> __('Slideshow'),
			'public' 			=> true,
			'show_ui' 			=> true,
			'publicly_queryable'=> true,
			'query_var'			=> true,
			'capability_type' 	=> 'post',
			'has_archive' 		=> false,
			'hierarchical' 		=> false,
			'rewrite' 			=> array('slug' => 'Slideshow', 'with_front' => false ),
			'supports' 			=> $supports,
			'menu_position' 	=> 32, 
			'menu_icon' 		=> get_template_directory_uri() . '/icons/slideshow.png',
			'taxonomies'		=> $taxonomies,
			'exclude_from_search' => true,
			
		 );
		 register_post_type('Slideshow',$post_type_args);
	}
	add_action('init', 'mig_register_slideshow_post');
	
?>
<?php 
/*=========================== Taxonomies ================================= */

register_taxonomy(

	'portfolio_category', 
	'portfolio', 
	array('hierarchical' => true, 'label' => 'Categories', 'query_var' => true, 'rewrite' => true)
);
?>