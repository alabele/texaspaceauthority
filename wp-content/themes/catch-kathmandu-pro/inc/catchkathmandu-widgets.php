<?php
/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since Catch Kathmandu 1.0
 */
function catchkathmandu_widgets_init() {
	
	// Register Custom Widgets
	register_widget( 'catchkathmandu_social_widget' );
	register_widget( 'catchkathmandu_adspace_widget' );
	register_widget( 'catchkathmandu_featued_widget' );
	register_widget( 'catchkathmandu_page_widget' );
	register_widget( 'catchkathmandu_post_widget' );
	register_widget( 'catchkathmandu_about_widget' );
	
	//Main Sidebar
	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'catch-kathmandu' ),
		'id' => 'sidebar-1',
		'description'   	=> __( 'Shows the Widgets at the side of Content', 'catch-kathmandu' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	
	//Header Top Sidebar
	register_sidebar( array(
		'name' => __( 'Header Top Sidebar', 'catch-kathmandu' ),
		'id' => 'sidebar-header-top',
		'description'   	=> __( 'Shows the Widgets at the Top of Header', 'catch-kathmandu' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	
	//Header Right Sidebar
	register_sidebar( array(
		'name' => __( 'Header Right Sidebar', 'catch-kathmandu' ),
		'id' => 'sidebar-header-right',
		'description'   	=> __( 'Shows the Widgets at the Top Right Side of Header', 'catch-kathmandu' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	//Optional Sidebar for Hompeage instead of main sidebar
	register_sidebar( array(
		'name' 				=> __( 'Optional Homepage Sidebar', 'catch-kathmandu' ),
		'id' 				=> 'sidebar-optional-homepage',
		'description'		=> __( 'This is Optional Sidebar for Homepage', 'catch-kathmandu' ),
		'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget' 		=> "</aside>",
		'before_title' 		=> '<h3 class="widget-title">',
		'after_title' 		=> '</h3>'
	) );	
	
	//Optional Sidebar for Archive instead of main sidebar
	register_sidebar( array(
		'name' 				=> __( 'Optional Archive Sidebar', 'catch-kathmandu' ),
		'id' 				=> 'sidebar-optional-archive',
		'description'		=> __( 'This is Optional Sidebar for Archive', 'catch-kathmandu' ),
		'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget' 		=> "</aside>",
		'before_title' 		=> '<h3 class="widget-title">',
		'after_title' 		=> '</h3>'
	) );
	
	//Optional Sidebar for Page instead of main sidebar
	register_sidebar( array(
		'name' 				=> __( 'Optional Page Sidebar', 'catch-kathmandu' ),
		'id' 				=> 'sidebar-optional-page',
		'description'		=> __( 'This is Optional Sidebar for Page', 'catch-kathmandu' ),
		'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget' 		=> "</aside>",
		'before_title' 		=> '<h3 class="widget-title">',
		'after_title' 		=> '</h3>'
	) );
	
	//Optional Sidebar for Post instead of main sidebar
	register_sidebar( array(
		'name' 				=> __( 'Optional Post Sidebar', 'catch-kathmandu' ),
		'id' 				=> 'sidebar-optional-post',
		'description'		=> __( 'This is Optional Sidebar for Post', 'catch-kathmandu' ),
		'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget' 		=> "</aside>",
		'before_title' 		=> '<h3 class="widget-title">',
		'after_title' 		=> '</h3>'
	) );	
	
	//Optional Sidebar one for page and post
	register_sidebar( array(
		'name' 				=> __( 'Optional Sidebar One', 'catch-kathmandu' ),
		'id' 				=> 'sidebar-optional-one',
		'description'		=> __( 'This is Optional Sidebar One', 'catch-kathmandu' ),
		'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget' 		=> "</aside>",
		'before_title' 		=> '<h3 class="widget-title">',
		'after_title' 		=> '</h3>'
	) );
	
	//Optional Sidebar two for page and post
	register_sidebar( array(
		'name' 				=> __( 'Optional Sidebar Two', 'catch-kathmandu' ),
		'id' 				=> 'sidebar-optional-two',
		'description'		=> __( 'This is Optional Sidebar Two', 'catch-kathmandu' ),
		'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget' 		=> "</aside>",
		'before_title' 		=> '<h3 class="widget-title">',
		'after_title' 		=> '</h3>'
	) );	
	
	//Optional Sidebar Three for page and post
	register_sidebar( array(
		'name' 				=> __( 'Optional Sidebar Three', 'catch-kathmandu' ),
		'id' 				=> 'sidebar-optional-three',
		'description'		=> __( 'This is Optional Sidebar Three', 'catch-kathmandu' ),
		'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget' 		=> "</aside>",
		'before_title' 		=> '<h3 class="widget-title">',
		'after_title' 		=> '</h3>'
	) );		
			
	// WooCommerce Sidebar
	if ( class_exists( 'Woocommerce' ) ) {
		register_sidebar( array(
			'name'				=> __( 'WooCommerce Sidebar', 'catch-kathmandu' ),
			'id'				=> 'catchkathmandu_woocommerce_sidebar',
			'description'		=> __( 'This is Optional WooCommerce Sidebar', 'catch-kathmandu' ),
			'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
			'after_widget' 		=> "</aside>",
			'before_title' 		=> '<h3 class="widget-title">',
			'after_title' 		=> '</h3>'
		) );
	}		
	
	//Footer One Sidebar
	register_sidebar( array(
		'name' => __( 'Footer Area One', 'catch-kathmandu' ),
		'id' => 'sidebar-2',
		'description' => __( 'An optional widget area for your site footer', 'catch-kathmandu' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	//Footer Two Sidebar
	register_sidebar( array(
		'name' => __( 'Footer Area Two', 'catch-kathmandu' ),
		'id' => 'sidebar-3',
		'description' => __( 'An optional widget area for your site footer', 'catch-kathmandu' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	//Footer Three Sidebar
	register_sidebar( array(
		'name' => __( 'Footer Area Three', 'catch-kathmandu' ),
		'id' => 'sidebar-4',
		'description' => __( 'An optional widget area for your site footer', 'catch-kathmandu' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	
	//Footer Four Sidebar
	register_sidebar( array(
		'name' => __( 'Footer Area Four', 'catch-kathmandu' ),
		'id' => 'sidebar-5',
		'description' => __( 'An optional widget area for your site footer', 'catch-kathmandu' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );		
	
	// Registering 404 Error Page Content
	register_sidebar( array(
		'name'					=> __( '404 Page Not Found Content', 'catch-kathmandu' ),
		'id' 					=> 'sidebar-notfound',
		'description'			=> __( 'Replaces the default 404 Page Not Found Content', 'catch-kathmandu' ),
		'before_widget'			=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'			=> '</aside>',
		'before_title'			=> '<h2 class="widget-title">',
		'after_title'			=> '</h2>',
	) );		
	
}
add_action( 'widgets_init', 'catchkathmandu_widgets_init' );


/**
 * Makes a custom Widget for Displaying Social Icons
 *
 * Learn more: http://codex.wordpress.org/Widgets_API#Developing_Widgets
 *
 * @package Catch Themes
 * @subpackage Catch_Kathmandu
 * @since Catch Kathmandu 1.0
 */
class catchkathmandu_social_widget extends WP_Widget {
	
	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'widget_catchkathmandu_social_widget', // Base ID
			__( 'CT: Social Widget', 'catch-kathmandu' ), // Name
			array( 'description' => __( 'Use this widget to add Social Icons from Social Icons Settings as a widget.', 'catch-kathmandu' ) ) // Args
		);
	}

	/**
	 * Creates the form for the widget in the back-end which includes the Title , adcode, image, alt
	 * $instance Current settings
	 */
	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
		$title = esc_attr( $instance[ 'title' ] );
		?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title (optional):','catch-kathmandu'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
        </p>
        <?php
	}
	
	/**
	 * update the particular instant  
	 * 
	 * This function should check that $new_instance is set correctly.
	 * The newly calculated value of $instance should be returned.
	 * If "false" is returned, the instance won't be saved/updated.
	 *
	 * $new_instance New settings for this instance as input by the user via form()
	 * $old_instance Old settings for this instance
	 * Settings to save or bool false to cancel saving
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		
		return $instance;
	}	
	
	/**
	 * Displays the Widget in the front-end.
	 * 
	 * $args Display arguments including before_title, after_title, before_widget, and after_widget.
	 * $instance The settings for the particular instance of the widget
	 */
	function widget( $args, $instance ) {
		extract( $args );
		extract( $instance );
		$title = !empty( $instance['title'] ) ? $instance[ 'title' ] : '';
			
		echo $before_widget;
		if ( $title != '' ) {
			echo $before_title . apply_filters( 'widget_title', $title, $instance, $this->id_base ) . $after_title;
		} 

		catchkathmandu_social_networks();
		
		echo $after_widget;
	}

}


/**
 * Makes a custom Widget for Displaying Ads
 *
 * Learn more: http://codex.wordpress.org/Widgets_API#Developing_Widgets
 *
 * @package Catch Themes
 * @subpackage Catch_Kathmandu
 * @since Catch Kathmandu 1.0
 */
class catchkathmandu_adspace_widget extends WP_Widget {
	
	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'widget_catchkathmandu_adspace_widget', // Base ID
			__( 'CT: Advertisement', 'catch-kathmandu' ), // Name
			array( 'description' => __( 'Use this widget to add any type of Advertisement as a widget.', 'catch-kathmandu' ) ) // Args
		);
	}

	/**
	 * Creates the form for the widget in the back-end which includes the Title , adcode, image, alt
	 * $instance Current settings
	 */
	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'adcode' => '', 'image' => '', 'href' => '', 'target' => '0', 'alt' => '' ) );
		$title = esc_attr( $instance[ 'title' ] );
		$adcode = esc_textarea( $instance[ 'adcode' ] );
		$image = esc_url( $instance[ 'image' ] );
		$href = esc_url( $instance[ 'href' ] );
		$target = $instance['target'] ? 'checked="checked"' : '';
		$alt = esc_attr( $instance[ 'alt' ] );
		?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title (optional):','catch-kathmandu'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
        </p>
        <?php if ( current_user_can( 'unfiltered_html' ) ) : // Only show it to users who can edit it ?>
            <p>
                <label for="<?php echo $this->get_field_id('adcode'); ?>"><?php _e('Advertisement Code:','catch-kathmandu'); ?></label>
                <textarea name="<?php echo $this->get_field_name('adcode'); ?>" class="widefat" id="<?php echo $this->get_field_id('adcode'); ?>"><?php echo $adcode; ?></textarea>
            </p>
            <p><strong>or</strong></p>
        <?php endif; ?>
        <p>
            <label for="<?php echo $this->get_field_id('image'); ?>"><?php _e('Image Url:','catch-kathmandu'); ?></label>
        <input type="text" name="<?php echo $this->get_field_name('image'); ?>" value="<?php echo $image; ?>" class="widefat" id="<?php echo $this->get_field_id('image'); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('href'); ?>"><?php _e('Link URL:','catch-kathmandu'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('href'); ?>" value="<?php echo esc_url( $href ); ?>" class="widefat" id="<?php echo $this->get_field_id('href'); ?>" />
        </p>
		<p>
			<input class="checkbox" type="checkbox" <?php echo $target; ?> id="<?php echo $this->get_field_id('target'); ?>" name="<?php echo $this->get_field_name('target'); ?>" /> <label for="<?php echo $this->get_field_id('target'); ?>"><?php _e( 'Open Link in New Window', 'catch-kathmandu' ); ?></label>
		</p>        
        <p>
            <label for="<?php echo $this->get_field_id('alt'); ?>"><?php _e('Alt text:','catch-kathmandu'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('alt'); ?>" value="<?php echo $alt; ?>" class="widefat" id="<?php echo $this->get_field_id('alt'); ?>" />
        </p>
        <?php
	}
	
	/**
	 * update the particular instant  
	 * 
	 * This function should check that $new_instance is set correctly.
	 * The newly calculated value of $instance should be returned.
	 * If "false" is returned, the instance won't be saved/updated.
	 *
	 * $new_instance New settings for this instance as input by the user via form()
	 * $old_instance Old settings for this instance
	 * Settings to save or bool false to cancel saving
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['adcode'] = wp_kses_stripslashes($new_instance['adcode']);
		$instance['image'] = esc_url_raw($new_instance['image']);
		$instance['href'] = esc_url_raw($new_instance['href']);
		$instance[ 'target' ] = isset( $new_instance[ 'target' ] ) ? 1 : 0;
		$instance['alt'] = sanitize_text_field($new_instance['alt']);
		
		return $instance;
	}	
	
	/**
	 * Displays the Widget in the front-end.
	 * 
	 * $args Display arguments including before_title, after_title, before_widget, and after_widget.
	 * $instance The settings for the particular instance of the widget
	 */
	function widget( $args, $instance ) {
		extract( $args );
		extract( $instance );
		$title = !empty( $instance['title'] ) ? $instance[ 'title' ] : '';
		$adcode = !empty( $instance['adcode'] ) ? $instance[ 'adcode' ] : '';
		$image = !empty( $instance['image'] ) ? $instance[ 'image' ] : '';
		$href = !empty( $instance['href'] ) ? $instance[ 'href' ] : '';
		$target = !empty( $instance[ 'target' ] ) ? 'true' : 'false';
		$alt = !empty( $instance['alt'] ) ? $instance[ 'alt' ] : '';

		if ( $target == "true" ) :
			$base = '_blank'; 	
		else:
			$base = '_self'; 	
		endif;	
			
		echo $before_widget;
		if ( $title != '' ) {
			echo $before_title . apply_filters( 'widget_title', $title, $instance, $this->id_base ) . $after_title;
		} 

		if ( $adcode != '' ) {
			echo $adcode;
		}
		elseif ( $image != '' ) {
        	echo '<a href="'.$href.'" target="'.$base.'"><img src="'. $image.'" alt="'.$alt.'" /></a>';
		}
		else {
			_e( 'Add Advertisement Code or Image URL', 'catch-kathmandu' );
		}
		echo $after_widget;
	}

} 


/**
 * Makes a custom Widget for Displaying Advertisement
 *
 * Learn more: http://codex.wordpress.org/Widgets_API#Developing_Widgets
 *
 * @package Catch Themes
 * @subpackage Catch_Kathmandu
 * @since Catch Kathmandu 1.0
 */
class catchkathmandu_featued_widget extends WP_Widget {
	
	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'widget_catchkathmandu_featued_widget', // Base ID
			__( 'CT: Featured Content', 'catch-kathmandu' ), // Name
			array( 'description' => __( 'Use this widget to add Featured Content as a widget.', 'catch-kathmandu' ) ) // Args
		);
	}

	/**
	 * Creates the form for the widget in the back-end which includes the Title , adcode, image, alt
	 * $instance Current settings
	 */
	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'content' => '', 'image' => '', 'href' => '', 'target' => '0', 'image_position' => 'above' ) );
		$title = esc_attr( $instance[ 'title' ] );
		$content = esc_textarea( $instance[ 'content' ] );
		$image = esc_url( $instance[ 'image' ] );
		$href = esc_url( $instance[ 'href' ] );
		$target = $instance['target'] ? 'checked="checked"' : '';
		$image_position = $instance[ 'image_position' ];
		?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','catch-kathmandu'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
        </p>
        <?php if ( current_user_can( 'unfiltered_html' ) ) : // Only show it to users who can edit it ?>
            <p>
                <label for="<?php echo $this->get_field_id('content'); ?>"><?php _e('Content:','catch-kathmandu'); ?></label>
                <textarea name="<?php echo $this->get_field_name('content'); ?>" class="widefat" id="<?php echo $this->get_field_id('content'); ?>"><?php echo $content; ?></textarea>
            </p>
        <?php endif; ?>
        <p>
            <label for="<?php echo $this->get_field_id('image'); ?>"><?php _e('Image Url:','catch-kathmandu'); ?></label>
        <input type="text" name="<?php echo $this->get_field_name('image'); ?>" value="<?php echo $image; ?>" class="widefat" id="<?php echo $this->get_field_id('image'); ?>" />
        </p>


		<p>
			<input class="checkbox" type="checkbox" <?php echo $target; ?> id="<?php echo $this->get_field_id('target'); ?>" name="<?php echo $this->get_field_name('target'); ?>" /> <label for="<?php echo $this->get_field_id('target'); ?>"><?php _e( 'Open Link in New Window', 'catch-kathmandu' ); ?></label>
		</p>
 

	    <?php if( $image_position == 'above' ) { ?>  
		<p> 
		    <input type="radio" id="<?php echo $this->get_field_id( 'image_position' ); ?>" name="<?php echo $this->get_field_name( 'image_position' ); ?>" value="above" checked /><?php _e( 'Show Image Before Title', 'catch-kathmandu' );?><br />  
		    <input type="radio" id="<?php echo $this->get_field_id( 'image_position' ); ?>" name="<?php echo $this->get_field_name( 'image_position' ); ?>" value="below" /><?php _e( 'Show Image After Title', 'catch-kathmandu' );?><br />              
		</p>  
		<?php } else { ?> 
		<p>   
		    <input type="radio" id="<?php echo $this->get_field_id( 'image_position' ); ?>" name="<?php echo $this->get_field_name( 'image_position' ); ?>" value="above" /><?php _e( 'Show Image Before Title', 'catch-kathmandu' );?><br />  
		    <input type="radio" id="<?php echo $this->get_field_id( 'image_position' ); ?>" name="<?php echo $this->get_field_name( 'image_position' ); ?>" value="below" checked /><?php _e( 'Show Image After Title', 'catch-kathmandu' );?><br />              
		</p>  
		<?php } ?>  
        
        <p>
            <label for="<?php echo $this->get_field_id('href'); ?>"><?php _e('Link URL:','catch-kathmandu'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('href'); ?>" value="<?php echo esc_url( $href ); ?>" class="widefat" id="<?php echo $this->get_field_id('href'); ?>" />
        </p>
        <?php
	}
	
	/**
	 * update the particular instant  
	 * 
	 * This function should check that $new_instance is set correctly.
	 * The newly calculated value of $instance should be returned.
	 * If "false" is returned, the instance won't be saved/updated.
	 *
	 * $new_instance New settings for this instance as input by the user via form()
	 * $old_instance Old settings for this instance
	 * Settings to save or bool false to cancel saving
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['content'] = wp_kses_stripslashes($new_instance['content']);
		$instance['image'] = esc_url_raw($new_instance['image']);
		$instance['href'] = esc_url_raw($new_instance['href']);
		$instance[ 'target' ] = isset( $new_instance[ 'target' ] ) ? 1 : 0;
		$instance[ 'image_position' ] = $new_instance[ 'image_position' ];
		
		return $instance;
	}	
	
	/**
	 * Displays the Widget in the front-end.
	 * 
	 * $args Display arguments including before_title, after_title, before_widget, and after_widget.
	 * $instance The settings for the particular instance of the widget
	 */
	function widget( $args, $instance ) {
		extract( $args );
		extract( $instance );
		$title = !empty( $instance['title'] ) ? $instance[ 'title' ] : '';
		$content = !empty( $instance['content'] ) ? $instance[ 'content' ] : '';
		$image = !empty( $instance['image'] ) ? $instance[ 'image' ] : '';
		$href = !empty( $instance['href'] ) ? $instance[ 'href' ] : '';
		$target = !empty( $instance[ 'target' ] ) ? 'true' : 'false';
		$image_position = isset( $instance[ 'image_position' ] ) ? $instance[ 'image_position' ] : 'above' ;

		
		if ( $target == "true" ) :
			$base = '_blank'; 	
		else:
			$base = '_self'; 	
		endif;		
		
		// Title
		if ( !empty( $title ) ) :
			$finaltitle = $before_title;
			if ( !empty( $href ) ) {
				$finaltitle .= '<a title="'.$title.'" href="'.$href .'" target="'.$base.'">'.$title.'</a>'; 
			}
			else {
				$finaltitle .= $title;
			}
			$finaltitle .= $after_title;
		
		else:
			$finaltitle = ''; 
		endif;
		

		// Image 
		if ( !empty( $image ) ) :
			$finalmage = '<figure class="widget-feat-content">';
			if ( !empty( $href ) ) {
				$finalmage .= '<a title="'.$title.'" href="'.$href .'" target="'.$base.'"><img class="wp-post-image" alt="'.$title.'" src="'.esc_url( $image ).'" /></a>'; 
			}
			else {
				$finalmage .= '<img class="wp-post-image" alt="'.$title.'" src="'.esc_url( $image ).'" />';
			}
			$finalmage .= '</figure>';
		else:
			$finalmage = '';
		endif;


		if ( $content != '' ) {
			$finalcontent = '<div class="textwidget feat-content">'.$content.'</div>';
		} else {
			$finalcontent = '';
		}
		
		//Print it
		echo $before_widget;
		
		
		if ( $image_position == 'above' ) {
			echo $finalmage;
			echo $finaltitle;
		}
		else {
			echo $finaltitle;
			echo $finalmage;
		}
		
		echo $finalcontent;
		
		echo $after_widget;
	}

} 


/**
 * Makes a custom Widget for Featured Page
 *
 * Learn more: http://codex.wordpress.org/Widgets_API#Developing_Widgets
 *
 * @package Catch Themes
 * @subpackage Catch_Kathmandu
 * @since Catch Kathmandu 1.0
 */
class catchkathmandu_page_widget extends WP_Widget {
		
	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'widget_catchkathmandu_page_widget', // Base ID
			__( 'CT: Featured Page', 'catch-kathmandu' ), // Name
			array( 'description' => __( 'Use this widget to add Page as a widget.', 'catch-kathmandu' ) ) // Args
		);
	}
	
	/**
	 * Creates the form for the widget in the back-end which includes the Title , adcode, image, alt
	 * $instance Current settings
	 */
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => '', 'page_id' => '', 'image' => 'small', 'image_position' => true );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
        	
		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title (Optional): Add in the Title to replace the Page Title', 'catch-kathmandu'); ?></label><br />
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" class="widefat" type="text" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'page_id' ); ?>"><?php _e( 'Page', 'catch-kathmandu' ); ?>:</label><br />
			<?php wp_dropdown_pages( array( 'name' => $this->get_field_name( 'page_id' ), 'selected' => $instance['page_id'] ) ); ?>
		</p>
        
		<!-- Image: Select Box -->
		<p>
			<label for="<?php echo $this->get_field_id( 'image' ); ?>"><?php _e('Image:', 'catch-kathmandu'); ?></label> 
			<select id="<?php echo $this->get_field_id( 'image' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'image' ); ?>">
				<option value="small" <?php if ( 'small' == $instance['image'] ) echo 'selected="selected"'; ?>><?php _e( 'Show Small Image Size', 'catch-kathmandu' ); ?></option>
                <option value="featured" <?php if ( 'featured' == $instance['image'] ) echo 'selected="selected"'; ?>><?php _e( 'Show Featured Image Size', 'catch-kathmandu' ); ?></option>
				<option value="slider" <?php if ( 'slider' == $instance['image'] ) echo 'selected="selected"'; ?>><?php _e( 'Show Slider Image Size', 'catch-kathmandu' ); ?></option>
                <option value="full" <?php if ( 'full' == $instance['image'] ) echo 'selected="selected"'; ?>><?php _e( 'Show Full Size Image Size', 'catch-kathmandu' ); ?></option>
                <option value="disable" <?php if ( 'disable' == $instance['image'] ) echo 'selected="selected"'; ?>><?php _e( 'Disable Image', 'catch-kathmandu' ); ?></option>
			</select>
		</p>              
    
		<!-- Image Position? Checkbox -->
		<p>
			<input class="checkbox" type="checkbox" <?php checked(isset( $instance['image_position']) ? $instance['image_position'] : 0  ); ?> id="<?php echo $this->get_field_id( 'image_position' ); ?>" name="<?php echo $this->get_field_name( 'image_position' ); ?>" /> 
			<label for="<?php echo $this->get_field_id( 'image_position' ); ?>"><?php _e('Move Image After Title?', 'catch-kathmandu'); ?></label>
		</p> 
                                
	<?php
	}	
	
	/**
	 * update the particular instant  
	 * 
	 * This function should check that $new_instance is set correctly.
	 * The newly calculated value of $instance should be returned.
	 * If "false" is returned, the instance won't be saved/updated.
	 *
	 * $new_instance New settings for this instance as input by the user via form()
	 * $old_instance Old settings for this instance
	 * Settings to save or bool false to cancel saving
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
		$instance[ 'page_id' ] = absint( $new_instance[ 'page_id' ] );
		$instance[ 'image' ] = $new_instance[ 'image' ];
		$instance['image_position'] = isset($new_instance['image_position']);
	
		return $instance;
	}	
	
	/**
	 * Displays the Widget in the front-end.
	 * 
	 * $args Display arguments including before_title, after_title, before_widget, and after_widget.
	 * $instance The settings for the particular instance of the widget
	 */	
	function widget( $args, $instance ) {
 		extract( $args );
 		global $post;
		
 		$title = isset( $instance[ 'title' ] ) ? apply_filters('widget_title', $instance['title'] ) : '';
 		$page_id = isset( $instance[ 'page_id' ] ) ? $instance[ 'page_id' ] : '';
 		$image = $instance[ 'image' ];
		$image_position = isset( $instance['image_position'] ) ? $instance['image_position'] : false;

 		if( $page_id ) {
 			$the_query = new WP_Query( 'page_id='.$page_id );
 			while( $the_query->have_posts() ):$the_query->the_post();
 			
				// Title
				$finaltitle = $before_title;
				
				$page_name = the_title( '', '', false );
				
				if ( !empty( $title ) ) {
					$finaltitle .= '<a title="'.$title.'" href="' . get_permalink() . '">'.$title.'</a>'; 
					$showtitle = $title;
				}
				else {
					$finaltitle .= '<a title="'.$page_name.'" href="' . get_permalink() . '">'.$page_name.'</a>'; 
					$showtitle = $page_name;
				}
				$finaltitle .= $after_title;
				
				// Image
				if ( has_post_thumbnail() && $image != "disable" ) {
					$finalmage = '<figure class="widget-feat-content"><a href="' . get_permalink() . '" title="'.$showtitle.'">';
					
					if ( $image == "small" ) {
	 					$finalmage .= get_the_post_thumbnail( $post->ID, 'small-featured', array( 'title' => esc_attr( $showtitle ), 'alt' => esc_attr( $showtitle ) ) );
	 				}
					elseif ( $image == "featured" ) {
	 					$finalmage .= get_the_post_thumbnail( $post->ID, 'featured', array( 'title' => esc_attr( $showtitle ), 'alt' => esc_attr( $showtitle ) ) );
	 				}
					elseif ( $image == "slider" ) {
	 					$finalmage .= get_the_post_thumbnail( $post->ID, 'slider', array( 'title' => esc_attr( $showtitle ), 'alt' => esc_attr( $showtitle ) ) );
	 				}
					else {
						$finalmage .= get_the_post_thumbnail( $post->ID, 'full', array( 'title' => esc_attr( $showtitle ), 'alt' => esc_attr( $showtitle ) ) );
					}
	 			
					$finalmage .= '</a></figure>';
				}
				else $finalmage = '';
				
				
				echo $before_widget;
				
				if ( $image_position == "true" ) {
					echo $finaltitle;
					echo $finalmage;
					
				}
				else {
					echo $finalmage;
					echo $finaltitle;
				}
				
				//Get Excerpt
				$catchkathmandu_excerpt = get_the_excerpt();
				
				//More Tag
				global $catchkathmandu_options_settings;
				$options = $catchkathmandu_options_settings;
				$moretag = $options[ 'more_tag_text' ];
				
				if ( !empty( $catchkathmandu_excerpt ) ) : ?>
                    <div class="textwidget feat-page entry-summary">
                        <?php the_excerpt(); ?>
                    </div><!-- .entry-summary -->     
				<?php else : ?>
                    <div class="textwidget feat-page entry-content">
                        <?php the_content( $moretag ); ?>
                    </div><!-- .entry-content -->
                <?php endif; ?>
				
                <?php echo $after_widget;
				
	 		endwhile;
	 		// Reset Post Data
	 		wp_reset_postdata();
 		}	
 	}	
	
}


/**
 * Makes a custom Widget for Featured Post
 *
 * Learn more: http://codex.wordpress.org/Widgets_API#Developing_Widgets
 *
 * @package Catch Themes
 * @subpackage Catch_Kathmandu
 * @since Catch Kathmandu 1.0
 */
class catchkathmandu_post_widget extends WP_Widget {
		
	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'widget_catchkathmandu_post_widget', // Base ID
			__( 'CT: Featured Post', 'catch-kathmandu' ), // Name
			array( 'description' => __( 'Use this widget to add Post as a widget.', 'catch-kathmandu' ) ) // Args
		);
	}
	
	/**
	 * Creates the form for the widget in the back-end which includes the Title , adcode, image, alt
	 * $instance Current settings
	 */
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => '', 'post_id' => '0', 'image' => 'small', 'image_position' => true );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
        	
		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title (Optional): Add in the Title to replace the Page Title', 'catch-kathmandu'); ?></label><br />
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" class="widefat" type="text" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'post_id' ); ?>"><?php _e( 'Post ID', 'catch-kathmandu' ); ?>:</label>
            <input id="<?php echo $this->get_field_id( 'post_id' ); ?>" class="widefat" type="text" name="<?php echo $this->get_field_name( 'post_id' ); ?>" value="<?php echo $instance['post_id']; ?>" />
		</p>
        
		<!-- Image: Select Box -->
		<p>
			<label for="<?php echo $this->get_field_id( 'image' ); ?>"><?php _e('Image:', 'catch-kathmandu'); ?></label> 
			<select id="<?php echo $this->get_field_id( 'image' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'image' ); ?>">
				<option value="small" <?php if ( 'small' == $instance['image'] ) echo 'selected="selected"'; ?>><?php _e( 'Show Small Image Size', 'catch-kathmandu' ); ?></option>
                <option value="featured" <?php if ( 'featured' == $instance['image'] ) echo 'selected="selected"'; ?>><?php _e( 'Show Featured Image Size', 'catch-kathmandu' ); ?></option>
				<option value="slider" <?php if ( 'slider' == $instance['image'] ) echo 'selected="selected"'; ?>><?php _e( 'Show Slider Image Size', 'catch-kathmandu' ); ?></option>
                <option value="full" <?php if ( 'full' == $instance['image'] ) echo 'selected="selected"'; ?>><?php _e( 'Show Full Size Image Size', 'catch-kathmandu' ); ?></option>
                <option value="disable" <?php if ( 'disable' == $instance['image'] ) echo 'selected="selected"'; ?>><?php _e( 'Disable Image', 'catch-kathmandu' ); ?></option>
			</select>
		</p>              
    
		<!-- Image Position? Checkbox -->
		<p>
			<input class="checkbox" type="checkbox" <?php checked(isset( $instance['image_position']) ? $instance['image_position'] : 0  ); ?> id="<?php echo $this->get_field_id( 'image_position' ); ?>" name="<?php echo $this->get_field_name( 'image_position' ); ?>" /> 
			<label for="<?php echo $this->get_field_id( 'image_position' ); ?>"><?php _e('Move Image After Title?', 'catch-kathmandu'); ?></label>
		</p> 
                                
	<?php
	}	
	
	/**
	 * update the particular instant  
	 * 
	 * This function should check that $new_instance is set correctly.
	 * The newly calculated value of $instance should be returned.
	 * If "false" is returned, the instance won't be saved/updated.
	 *
	 * $new_instance New settings for this instance as input by the user via form()
	 * $old_instance Old settings for this instance
	 * Settings to save or bool false to cancel saving
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
		$instance[ 'post_id' ] = absint( $new_instance[ 'post_id' ] );
		$instance[ 'image' ] = $new_instance[ 'image' ];
		$instance['image_position'] = isset($new_instance['image_position']);
	
		return $instance;
	}	
	
	/**
	 * Displays the Widget in the front-end.
	 * 
	 * $args Display arguments including before_title, after_title, before_widget, and after_widget.
	 * $instance The settings for the particular instance of the widget
	 */	
	function widget( $args, $instance ) {
 		extract( $args );
 		global $post;
		
 		$title = isset( $instance[ 'title' ] ) ? apply_filters('widget_title', $instance['title'] ) : '';
 		$post_id = isset( $instance[ 'post_id' ] ) ? $instance[ 'post_id' ] : '';
 		$image = $instance[ 'image' ];
		$image_position = isset( $instance['image_position'] ) ? $instance['image_position'] : false;

 		if( $post_id ) {
 			$the_query = new WP_Query( 'p='.$post_id );
 			while( $the_query->have_posts() ):$the_query->the_post();
		
				// Title
				$finaltitle = $before_title;
				
				$page_name = the_title( '', '', false );
				
				if ( !empty( $title ) ) {
					$finaltitle .= '<a title="'.$title.'" href="' . get_permalink() . '">'.$title.'</a>'; 
					$showtitle = $title;
				}
				else {
					$finaltitle .= '<a title="'.$page_name.'" href="' . get_permalink() . '">'.$page_name.'</a>'; 
					$showtitle = $page_name;
				}
				$finaltitle .= $after_title;
				
				// Image
				if ( has_post_thumbnail() && $image != "disable" ) {
					$finalmage = '<figure class="widget-feat-content"><a href="' . get_permalink() . '" title="'.$showtitle.'">';
					
					if ( $image == "small" ) {
	 					$finalmage .= get_the_post_thumbnail( $post->ID, 'small-featured', array( 'title' => esc_attr( $showtitle ), 'alt' => esc_attr( $showtitle ) ) );
	 				}
					elseif ( $image == "featured" ) {
	 					$finalmage .= get_the_post_thumbnail( $post->ID, 'featured', array( 'title' => esc_attr( $showtitle ), 'alt' => esc_attr( $showtitle ) ) );
	 				}
					elseif ( $image == "slider" ) {
	 					$finalmage .= get_the_post_thumbnail( $post->ID, 'slider', array( 'title' => esc_attr( $showtitle ), 'alt' => esc_attr( $showtitle ) ) );
	 				}
					else {
						$finalmage .= get_the_post_thumbnail( $post->ID, 'full', array( 'title' => esc_attr( $showtitle ), 'alt' => esc_attr( $showtitle ) ) );
					}
	 			
					$finalmage .= '</a></figure>';
				}
				else $finalmage = '';
				
				
				echo $before_widget;
				
				if ( $image_position == "true" ) {
					echo $finaltitle;
					echo $finalmage;
					
				}
				else {
					echo $finalmage;
					echo $finaltitle;
				}
				
				//Get Excerpt
				$catchkathmandu_excerpt = get_the_excerpt();
				
				//More Tag
				global $catchkathmandu_options_settings;
				$options = $catchkathmandu_options_settings;
				$moretag = $options[ 'more_tag_text' ];
				
				//Content
				if ( !empty( $catchkathmandu_excerpt ) ) : ?>
                    <div class="textwidget feat-page entry-summary">
                        <?php the_excerpt(); ?>
                    </div><!-- .entry-summary -->     
				<?php else : ?>
                    <div class="textwidget feat-page entry-content">
                        <?php the_content( $moretag ); ?>
                    </div><!-- .entry-content -->
                <?php endif; ?>
				
                <?php echo $after_widget;
				
	 		endwhile;
	 		// Reset Post Data
	 		wp_reset_postdata();
 		}	
 	}	
	
}


/**
 * Makes a custom Widget for About
 *
 * Learn more: http://codex.wordpress.org/Widgets_API#Developing_Widgets
 *
 * @package Catch Themes
 * @subpackage Catch Kathmandu
 * @since Catch Kathmandu 1.0
 */
class catchkathmandu_about_widget extends WP_Widget {
		
	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'widget_catchkathmandu_about_widget', // Base ID
			__( 'CT: About Profile', 'catch-kathmandu' ), // Name
			array( 'description' => __( 'Use this widget to add About Text with Image.', 'catch-kathmandu' ) ) // Args
		);
	}
	
	/**
	 * Creates the form for the widget in the back-end which includes the Title , adcode, image, alt
	 * $instance Current settings
	 */
	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'abouttext' => '', 'image' => '', 'href' => '', 'target' => '0', 'alt' => '' ) );
		$title = esc_attr( $instance[ 'title' ] );
		$abouttext = esc_textarea( $instance[ 'abouttext' ] );
		$image = esc_url( $instance[ 'image' ] );
		$href = esc_url( $instance[ 'href' ] );
		$target = $instance['target'] ? 'checked="checked"' : '';
		$alt = esc_attr( $instance[ 'alt' ] );
		?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title (optional):','catch-kathmandu'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
        </p>
        <?php if ( current_user_can( 'unfiltered_html' ) ) : // Only show it to users who can edit it ?>
            <p>
                <label for="<?php echo $this->get_field_id('abouttext'); ?>"><?php _e('Short Description:','catch-kathmandu'); ?></label>
                <textarea name="<?php echo $this->get_field_name('abouttext'); ?>" class="widefat" id="<?php echo $this->get_field_id('abouttext'); ?>"><?php echo $abouttext; ?></textarea>
            </p>
            <p><strong>or</strong></p>
        <?php endif; ?>
        <p>
            <label for="<?php echo $this->get_field_id('image'); ?>"><?php _e('Image Url:','catch-kathmandu'); ?></label>
        <input type="text" name="<?php echo $this->get_field_name('image'); ?>" value="<?php echo $image; ?>" class="widefat" id="<?php echo $this->get_field_id('image'); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('href'); ?>"><?php _e('Link URL:','catch-kathmandu'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('href'); ?>" value="<?php echo esc_url( $href ); ?>" class="widefat" id="<?php echo $this->get_field_id('href'); ?>" />
        </p>
		<p>
			<input class="checkbox" type="checkbox" <?php echo $target; ?> id="<?php echo $this->get_field_id('target'); ?>" name="<?php echo $this->get_field_name('target'); ?>" /> <label for="<?php echo $this->get_field_id('target'); ?>"><?php _e( 'Open Link in New Window', 'catch-kathmandu' ); ?></label>
		</p>        
        <p>
            <label for="<?php echo $this->get_field_id('alt'); ?>"><?php _e('Alt text:','catch-kathmandu'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('alt'); ?>" value="<?php echo $alt; ?>" class="widefat" id="<?php echo $this->get_field_id('alt'); ?>" />
        </p>
        <?php
	}
	
	/**
	 * update the particular instant  
	 * 
	 * This function should check that $new_instance is set correctly.
	 * The newly calculated value of $instance should be returned.
	 * If "false" is returned, the instance won't be saved/updated.
	 *
	 * $new_instance New settings for this instance as input by the user via form()
	 * $old_instance Old settings for this instance
	 * Settings to save or bool false to cancel saving
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['abouttext'] = wp_kses_stripslashes($new_instance['abouttext']);
		$instance['image'] = esc_url_raw($new_instance['image']);
		$instance['href'] = esc_url_raw($new_instance['href']);
		$instance[ 'target' ] = isset( $new_instance[ 'target' ] ) ? 1 : 0;
		$instance['alt'] = sanitize_text_field($new_instance['alt']);
		
		return $instance;
	}	
	
	/**
	 * Displays the Widget in the front-end.
	 * 
	 * $args Display arguments including before_title, after_title, before_widget, and after_widget.
	 * $instance The settings for the particular instance of the widget
	 */
	function widget( $args, $instance ) {
		extract( $args );
		extract( $instance );
		$title = !empty( $instance['title'] ) ? $instance[ 'title' ] : '';
		$abouttext = !empty( $instance['abouttext'] ) ? $instance[ 'abouttext' ] : '';
		$image = !empty( $instance['image'] ) ? $instance[ 'image' ] : '';
		$href = !empty( $instance['href'] ) ? $instance[ 'href' ] : '';
		$target = !empty( $instance[ 'target' ] ) ? 'true' : 'false';
		$alt = !empty( $instance['alt'] ) ? $instance[ 'alt' ] : '';

		if ( $target == "true" ) :
			$base = '_blank'; 	
		else:
			$base = '_self'; 	
		endif;	
			
		echo $before_widget;

		if ( !empty( $href ) ) {
			$linkopening = '<a href="'.$href.'" target="'.$base.'">';
			$linkclosing = '</a>';
		}
		else {
			$linkopening = '';
			$linkclosing = '';
		}
		
		if ( $title != '' ) {
			echo $before_title . $linkopening . apply_filters( 'widget_title', $title, $instance, $this->id_base ) . $linkclosing . $after_title;
		} 
		
		if ( !empty( $image ) ) {
        	echo '<figure class="wp-post-image about-image">'. $linkopening . '<img class="about-img" src="'. $image.'" alt="'.$alt.'" />' . $linkclosing . '</figure>';
		}			
		
		if ( !empty( $abouttext ) ) {
			echo '<div class="textwidget feat-content">' . $abouttext . '</div>';
		}
		
		echo $after_widget;
	}

} 