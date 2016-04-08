<?php
/**
 * Catch Kathmandu Theme Options
 *
 * @package Catch Themes
 * @subpackage Catch Kathmandu
 * @since Catch Kathmandu 1.0
 */
add_action( 'admin_init', 'catchkathmandu_register_settings' );
add_action( 'admin_menu', 'catchkathmandu_options_menu' );


/**
 * Enqueue admin script and styles
 *
 * @uses wp_register_script, wp_enqueue_script, wp_enqueue_media and wp_enqueue_style
 * @Calling jquery, jquery-ui-tabs,jquery-cookie, jquery-ui-sortable, jquery-ui-draggable, wp-color-picker
 */
function catchkathmandu_admin_scripts() {
    //jQuery Cookie
    wp_register_script( 'jquery-cookie', get_template_directory_uri() . '/inc/panel/js/jquery.cookie.min.js', array( 'jquery' ), '1.0', true );
    
    wp_enqueue_script( 'catchkathmandu_admin', get_template_directory_uri().'/inc/panel/js/admin.min.js', array( 'jquery', 'jquery-ui-tabs', 'jquery-cookie', 'jquery-ui-sortable', 'jquery-ui-draggable', 'wp-color-picker' ) );
    
    //For Media Uploader Box
    wp_enqueue_media();
    
    wp_enqueue_script( 'catchkathmandu_upload', get_template_directory_uri().'/inc/panel/js/add_image_scripts.min.js', array( 'jquery' ) );
    
    wp_enqueue_style( 'catchkathmandu_admin_style',get_template_directory_uri().'/inc/panel/admin.min.css', array( 'wp-color-picker' ), '1.0', 'screen' );

}
add_action('admin_print_styles-appearance_page_theme_options', 'catchkathmandu_admin_scripts');


/*
 * Create a function for Theme Options Page
 *
 * @uses add_menu_page
 * @add action admin_menu 
 */
function catchkathmandu_options_menu() {

    add_theme_page( 
        __( 'Theme Options', 'catch-kathmandu' ),           // Name of page
        __( 'Theme Options', 'catch-kathmandu' ),           // Label in menu
        'edit_theme_options',                           // Capability required
        'theme_options',                                // Menu slug, used to uniquely identify the page
        'catchkathmandu_theme_options_do_page'             // Function that renders the options page
    );  

}


/*
 * Register options and validation callbacks
 *
 * @uses register_setting
 * @action admin_init
 */
function catchkathmandu_register_settings() {
    register_setting( 'catchkathmandu_options', 'catchkathmandu_options', 'catchkathmandu_theme_options_validate' );
}


/*
 * Render Catch Kathmandu Theme Options page
 *
 * @uses settings_fields, get_option, bloginfo
 * @Settings Updated
 */
function catchkathmandu_theme_options_do_page() {
    if (!isset($_REQUEST['settings-updated']))
        $_REQUEST['settings-updated'] = false;
    ?>
    
    <div id="catchthemes" class="wrap">
        
        <form method="post" action="options.php">
            <?php
                settings_fields( 'catchkathmandu_options' );
                global $catchkathmandu_options_settings, $catchkathmandu_options_defaults;
                $options    = $catchkathmandu_options_settings;
                $defaults   = $catchkathmandu_options_defaults;
            ?>   
            <?php if (false !== $_REQUEST['settings-updated']) : ?>
                <div class="updated fade"><p><strong><?php _e('Options Saved', 'catch-kathmandu'); ?></strong></p></div>
            <?php endif; ?>            
            
            <div id="theme-option-header">
                <div id="theme-option-title">
                    <h2 class="title"><?php _e( 'Theme Options By', 'catch-kathmandu' ); ?></h2>
                    <h2 class="logo">
                        <a href="<?php echo esc_url( __( 'http://catchthemes.com/', 'catch-kathmandu' ) ); ?>" title="<?php esc_attr_e( 'Catch Themes', 'catch-kathmandu' ); ?>" target="_blank">
                            <img src="<?php echo get_template_directory_uri().'/inc/panel/images/catch-themes.png'; ?>" alt="<?php _e( 'Catch Themes', 'catch-kathmandu' ); ?>" />
                        </a>
                    </h2>
                </div><!-- #theme-option-title -->
            
                <div id="theme-support">
                    <ul>
                        <li><a class="button" href="<?php echo esc_url(__('http://catchthemes.com/support/','catch-kathmandu')); ?>" title="<?php esc_attr_e('Support', 'catch-kathmandu'); ?>" target="_blank"><?php printf(__('Support','catch-kathmandu')); ?></a></li>
                        <li><a class="button" href="<?php echo esc_url(__('http://catchthemes.com/theme-instructions/catch-kathmandu-pro/','catch-kathmandu')); ?>" title="<?php esc_attr_e('Theme Instruction', 'catch-kathmandu'); ?>" target="_blank"><?php printf(__('Theme Instruction','catch-kathmandu')); ?></a></li>
                        <li><a class="button" href="<?php echo esc_url(__('https://www.facebook.com/catchthemes/','catch-kathmandu')); ?>" title="<?php esc_attr_e('Like Catch Themes on Facebook', 'catch-kathmandu'); ?>" target="_blank"><?php printf(__('Facebook','catch-kathmandu')); ?></a></li>
                        <li><a class="button" href="<?php echo esc_url(__('https://twitter.com/catchthemes/','catch-kathmandu')); ?>" title="<?php esc_attr_e('Follow Catch Themes on Twitter', 'catch-kathmandu'); ?>" target="_blank"><?php printf(__('Twitter','catch-kathmandu')); ?></a></li>
                        <li><a class="button" href="<?php echo esc_url(__('http://wordpress.org/support/view/theme-reviews/catch-kathmandu','catch-kathmandu')); ?>" title="<?php esc_attr_e('Rate us 5 Star on WordPress', 'catch-kathmandu'); ?>" target="_blank"><?php printf(__('5 Star Rating','catch-kathmandu')); ?></a></li>
                    </ul>
                </div><!-- #theme-support --> 
                 
            </div><!-- #theme-option-header -->              
 
            
            <div id="catchkathmandu_ad_tabs">
                <ul class="tabNavigation" id="mainNav">
                    <li><a href="#themeoptions"><?php _e( 'Theme Options', 'catch-kathmandu' );?></a></li>
                    <li><a href="#coloroptions"><?php _e( 'Color Options', 'catch-kathmandu' );?></a></li>
                    <li><a href="#contentsettings"><?php _e( 'Featured Content', 'catch-kathmandu' );?></a></li>
                    <li><a href="#slidersettings"><?php _e( 'Featured Slider', 'catch-kathmandu' );?></a></li>
                    <li><a href="#sociallinks"><?php _e( 'Social Links', 'catch-kathmandu' );?></a></li>
                    <li><a href="#webmaster"><?php _e( 'Webmaster Tools', 'catch-kathmandu' );?></a></li>
                </ul><!-- .tabsNavigation #mainNav -->
                   
                   
                <!-- Theme Options -->
                <div id="themeoptions">
                    <div id="homepage-settings" class="option-container">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Homepage / Frontpage Settings', 'catch-kathmandu' ); ?></a></h3>
                        <div class="option-content inside">
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Enable Latest Posts?', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                    <input type='hidden' value='0' name='catchkathmandu_options[enable_posts_home]'>
                                    <input type="checkbox" id="headerlogo" name="catchkathmandu_options[enable_posts_home]" value="1" <?php checked( '1', $options['enable_posts_home'] ); ?> /> <?php _e( 'Check to Enable', 'catch-kathmandu'); ?>
                                </div>
                            </div><!-- .row -->
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Add Page instead of Latest Posts', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                    <a class="button" href="<?php echo esc_url( admin_url( 'options-reading.php' ) ) ; ?>" title="<?php esc_attr_e( 'Click Here to Set Static Front Page Instead of Latest Posts', 'catch-kathmandu' ); ?>" target="_blank"><?php _e( 'Click Here to Set Static Front Page Instead of Latest Posts', 'catch-kathmandu' );?></a>
                                </div>
                            </div><!-- .row -->
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Homepage posts categories:', 'catch-kathmandu' ); ?>
                                    <p><small><?php _e( 'Only posts that belong to the categories selected here will be displayed on the front page.', 'catch-kathmandu' ); ?></small></p>
                                </div>
                                <div class="col col-2">
                                    <select name="catchkathmandu_options[front_page_category][]" id="frontpage_posts_cats" multiple="multiple" class="select-multiple">
                                        <option value="0" <?php if ( empty( $options['front_page_category'] ) ) { echo 'selected="selected"'; } ?>><?php _e( '--Disabled--', 'catch-kathmandu' ); ?></option>
                                        <?php /* Get the list of categories */  
                                            $categories = get_categories();
                                            if( empty( $options[ 'front_page_category' ] ) ) {
                                                $options[ 'front_page_category' ] = array();
                                            }
                                            foreach ( $categories as $category) :
                                        ?>
                                        <option value="<?php echo $category->cat_ID; ?>" <?php if ( in_array( $category->cat_ID, $options['front_page_category'] ) ) {echo 'selected="selected"';}?>><?php echo $category->cat_name; ?></option>
                                        <?php endforeach; ?>
                                    </select><br />
                                    <span class="description"><?php _e( 'You may select multiple categories by holding down the CTRL key.', 'catch-kathmandu' ); ?></span>
                                </div>
                            </div><!-- .row -->                            
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Move above Homepage Featured Content?', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                    <input type='hidden' value='0' name='catchkathmandu_options[move_posts_home]'>
                                    <input type="checkbox" id="headerlogo" name="catchkathmandu_options[move_posts_home]" value="1" <?php checked( '1', $options['move_posts_home'] ); ?> /> <?php _e( 'Check to Move', 'catch-kathmandu'); ?>
                                </div>
                            </div><!-- .row -->
                            <div class="row">
                                <input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save Changes', 'catch-kathmandu' ); ?>" />
                            </div><!-- .row --> 
                        </div><!-- .option-content -->
                    </div><!-- .option-container -->

                    <div id="homepage-headline-options" class="option-container">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Promotion Headline Options', 'catch-kathmandu' ); ?></a></h3>
                        <div class="option-content inside">
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Enable Promotion Headline on', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                    <label title="<?php _e( 'Homepage/Frontpage', 'catch-kathmandu' ); ?>" class="box">
                                        <input type="radio" name="catchkathmandu_options[display_homepage_headline]" id="homepage" <?php checked($options['display_homepage_headline'], 'homepage'); ?> value="homepage"  />
                                        <?php _e( 'Homepage/Frontpage', 'catch-kathmandu' ); ?>
                                    </label>

                                    <label title="<?php _e( 'Entire Site', 'catch-kathmandu' ); ?>" class="box">
                                        <input type="radio" name="catchkathmandu_options[display_homepage_headline]" id="entire-site" <?php checked($options['display_homepage_headline'], 'entire-site'); ?> value="entire-site"  />
                                        <?php _e( 'Entire Site', 'catch-kathmandu' ); ?>
                                    </label>

                                    <label title="<?php _e( 'Disable', 'catch-kathmandu' ); ?>" class="box">
                                        <input type="radio" name="catchkathmandu_options[display_homepage_headline]" id="disabled" <?php checked($options['display_homepage_headline'], 'disabled'); ?> value="disabled"  />
                                        <?php _e( 'Disable', 'catch-kathmandu' ); ?>
                                    </label>
                                </div>
                            </div><!-- .row -->

                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Promotion Headline Text', 'catch-kathmandu' ); ?>
                                    <p><small><?php _e( 'The appropriate length for Headine is around 10 words.', 'catch-kathmandu' ); ?></small></p>
                                </div>
                                <div class="col col-2">
                                    <textarea class="textarea input-bg" name="catchkathmandu_options[homepage_headline]" cols="70" rows="3"><?php echo esc_textarea( $options[ 'homepage_headline' ] ); ?></textarea>
                                </div>
                            </div><!-- .row -->        
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Promotion Subheadline Text', 'catch-kathmandu' ); ?>
                                    <p><small><?php _e( 'The appropriate length for Headine is around 15 words.', 'catch-kathmandu' ); ?></small></p>
                                </div>
                                <div class="col col-2">
                                    <textarea class="textarea input-bg" name="catchkathmandu_options[homepage_subheadline]" cols="70" rows="3"><?php echo esc_textarea( $options[ 'homepage_subheadline' ] ); ?></textarea>
                                </div>
                            </div><!-- .row -->                                
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Promotion Headline Button Text', 'catch-kathmandu' ); ?>
                                    <p><small><?php _e( 'The appropriate length for Headine is around 3 words.', 'catch-kathmandu' ); ?></small></p>
                                </div>
                                <div class="col col-2">
                                    <input type="text" size="45" name="catchkathmandu_options[homepage_headline_button]" value="<?php echo esc_attr( $options[ 'homepage_headline_button' ] ); ?>" />
                                </div>
                            </div><!-- .row -->
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Promotion Headline Link', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                    <input type="text" size="70" name="catchkathmandu_options[homepage_headline_url]" value="<?php echo esc_url( $options[ 'homepage_headline_url' ] ); ?>" />
                                </div>
                            </div><!-- .row --> 
                            
                                <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Target. Open Link in New Window? ', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                    <input type='hidden' value='0' name='catchkathmandu_options[homepage_headline_target]'>
                                    <input type="checkbox" id="headline_target" name="catchkathmandu_options[homepage_headline_target]" value="1" <?php checked( '1', $options['homepage_headline_target'] ); ?> /> <?php _e('Check to open in new window', 'catch-kathmandu'); ?>
                                </div>
                            </div><!-- .row -->                         
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Disable Promotion Headline?', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                    <input type='hidden' value='0' name='catchkathmandu_options[disable_homepage_headline]'>
                                    <input type="checkbox" id="homepage-headline" name="catchkathmandu_options[disable_homepage_headline]" value="1" <?php checked( '1', $options['disable_homepage_headline'] ); ?> /> <?php _e( 'Check to disable', 'catch-kathmandu'); ?>
                                </div>
                            </div><!-- .row -->                   
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Disable Promotion Subheadline?', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                    <input type='hidden' value='0' name='catchkathmandu_options[disable_homepage_subheadline]'>
                                    <input type="checkbox" id="homepage-subheadline" name="catchkathmandu_options[disable_homepage_subheadline]" value="1" <?php checked( '1', $options['disable_homepage_subheadline'] ); ?> /> <?php _e( 'Check to disable', 'catch-kathmandu'); ?>
                                </div>
                            </div><!-- .row -->
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Disable Promotion Headline Button?', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                    <input type='hidden' value='0' name='catchkathmandu_options[disable_homepage_button]'>
                                    <input type="checkbox" id="homepage-botton" name="catchkathmandu_options[disable_homepage_button]" value="1" <?php checked( '1', $options['disable_homepage_button'] ); ?> /> <?php _e( 'Check to disable', 'catch-kathmandu'); ?>
                                </div>
                            </div><!-- .row -->                                             
                            <div class="row">
                                <input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save Changes', 'catch-kathmandu' ); ?>" />
                            </div><!-- .row -->
                        </div><!-- .option-content -->
                    </div><!-- .option-container -->
                
                    <div id="responsive-design" class="option-container">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Responsive Design', 'catch-kathmandu' ); ?></a></h3>
                        <div class="option-content inside">
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Disable Responsive Design?', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                    <input type='hidden' value='0' name='catchkathmandu_options[disable_responsive]'>
                                    <input type="checkbox" id="headerlogo" name="catchkathmandu_options[disable_responsive]" value="1" <?php checked( '1', $options['disable_responsive'] ); ?> /> <?php _e('Check to disable', 'catch-kathmandu'); ?>
                                </div>
                            </div><!-- .row -->
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Enable Secondary & Footer Menu in Mobile Devices?', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                    <input type='hidden' value='0' name='catchkathmandu_options[enable_menus]'>
                                    <input type="checkbox" id="headerlogo" name="catchkathmandu_options[enable_menus]" value="1" <?php checked( '1', $options['enable_menus'] ); ?> /> <?php _e('Check to enable', 'catch-kathmandu'); ?>
                                </div>
                            </div><!-- .row -->
                            <div class="row">
                                <input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save Changes', 'catch-kathmandu' ); ?>" />
                            </div><!-- .row -->
                        </div><!-- .option-content --> 
                    </div><!-- .option-container --> 
                       
                    <div id="fav-icons" class="option-container">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Favicon', 'catch-kathmandu' ); ?></a></h3>
                        <div class="option-content inside">
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Disable Favicon?', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                    <input type='hidden' value='0' name='catchkathmandu_options[remove_favicon]'>
                                    <input type="checkbox" id="favicon" name="catchkathmandu_options[remove_favicon]" value="1" <?php checked( '1', $options['remove_favicon'] ); ?> /> <?php _e('Check to disable', 'catch-kathmandu'); ?>
                                </div>
                            </div><!-- .row -->
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Fav Icon URL:', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                    <?php if ( !empty ( $options[ 'fav_icon' ] ) ) { ?>
                                        <input class="upload-url" size="65" type="text" name="catchkathmandu_options[fav_icon]" value="<?php echo esc_url( $options [ 'fav_icon' ] ); ?>" />
                                    <?php } else { ?>
                                        <input class="upload-url" size="65" type="text" name="catchkathmandu_options[fav_icon]" value="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" alt="fav" />
                                    <?php }  ?>
                                    <input ref="<?php esc_attr_e( 'Insert as Fav Icon','catch-kathmandu' );?>" class="catchkathmandu_upload_image button" name="wsl-image-add" type="button" value="<?php esc_attr_e( 'Change Fav Icon','catch-kathmandu' );?>" />
                                </div>
                            </div><!-- .row -->                            
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Preview', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">                        
                                    <?php 
                                        if ( !empty( $options[ 'fav_icon' ] ) ) { 
                                            echo '<img src="'.esc_url( $options[ 'fav_icon' ] ).'" alt="fav" />';
                                        } else {
                                            echo '<img src="'. get_template_directory_uri().'/images/favicon.ico" alt="fav" />';
                                        }
                                    ?>
                                </div>
                            </div><!-- .row -->
                            <div class="row">
                                <input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save Changes', 'catch-kathmandu' ); ?>" />
                            </div><!-- .row -->      
                        </div><!-- .option-content -->
                    </div><!-- .option-container --> 
                              
                    <div id="webclip-icon" class="option-container">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Web Clip Icon Options', 'catch-kathmandu' ); ?></a></h3>
                        <div class="option-content inside">
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Disable Web Clip Icon?', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                    <input type='hidden' value='0' name='catchkathmandu_options[remove_web_clip]'>
                                    <input type="checkbox" id="favicon" name="catchkathmandu_options[remove_web_clip]" value="1" <?php checked( '1', $options['remove_web_clip'] ); ?> /> <?php _e('Check to disable', 'catch-kathmandu'); ?>
                                </div>
                            </div><!-- .row -->
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Web Clip Icon URL:', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                    <?php if ( !empty ( $options[ 'web_clip' ] ) ) { ?>
                                        <input class="upload-url" size="65" type="text" name="catchkathmandu_options[web_clip]" value="<?php echo esc_url( $options [ 'web_clip' ] ); ?>" class="upload" />
                                    <?php } else { ?>
                                        <input size="65" type="text" name="catchkathmandu_options[web_clip]" value="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon.png" alt="fav" />
                                    <?php }  ?> 
                                    <input ref="<?php esc_attr_e( 'Insert as Web Clip Icon','catch-kathmandu' );?>"  class="catchkathmandu_upload_image button" name="wsl-image-add" type="button" value="<?php esc_attr_e( 'Change Web Clip Icon','catch-kathmandu' );?>" />
                                </div>
                            </div><!-- .row -->
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Preview', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">    
                                    <?php 
                                    if ( !empty( $options[ 'web_clip' ] ) ) { 
                                        echo '<img src="'.esc_url( $options[ 'web_clip' ] ).'" alt="Web Clip Icon" />';
                                    } else {
                                        echo '<img src="'. get_template_directory_uri().'/images/apple-touch-icon.png" alt="Web Clip Icon" />';
                                    }
                                    ?>
                                </div>
                            </div><!-- .row -->
                            <div class="row">
                                <?php esc_attr_e( 'Note: Web Clip Icon for Apple devices. Recommended Size - Width 144px and Height 144px height, which will support High Resolution Devices like iPad Retina.', 'catch-kathmandu' ); ?>
                            </div><!-- .row -->
                            <div class="row">
                                <input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save Changes', 'catch-kathmandu' ); ?>" />
                            </div><!-- .row -->
                        </div><!-- .option-content -->
                    </div><!-- .option-container -->                    
                                        
                    <div id="header-options" class="option-container">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Header Options', 'catch-kathmandu' ); ?></a></h3>
                        <div class="option-content inside">
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Custom Header: Logo & Site Details', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                    <a class="button" href="<?php echo admin_url('themes.php?page=custom-header'); ?>"><?php _e('Click Here to Add/Replace Header Logo & Site Details', 'catch-kathmandu'); ?></a>
                                </div>
                            </div><!-- .row -->         
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Move Site Title & Description', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                    <input type='hidden' value='0' name='catchkathmandu_options[site_title_above]'>
                                    <input type="checkbox" id="site-title" name="catchkathmandu_options[site_title_above]" value="1" <?php checked( '1', $options['site_title_above'] ); ?> /> <?php _e('Check to move before Logo', 'catch-kathmandu'); ?>
                                </div>
                            </div><!-- .row -->  
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Disable Header Right Sidebar?', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                    <input type='hidden' value='0' name='catchkathmandu_options[disable_header_right_sidebar]'>
                                    <input type="checkbox" id="headerlogo" name="catchkathmandu_options[disable_header_right_sidebar]" value="1" <?php checked( '1', $options['disable_header_right_sidebar'] ); ?> /> <?php _e('Check to Disable', 'catch-kathmandu'); ?>
                                </div>
                            </div><!-- .row -->                              
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Header Right Sidebar', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                    <a class="button" href="<?php echo esc_url( admin_url( 'widgets.php' ) ) ; ?>" title="<?php esc_attr_e( 'Widgets', 'catch-kathmandu' ); ?>"><?php _e( 'Click Here to Add/Replace Widgets', 'catch-kathmandu' );?></a>
                                </div>
                            </div><!-- .row -->
                            <div class="row">
                                <input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save Changes', 'catch-kathmandu' ); ?>" />
                            </div><!-- .row -->  
                        </div><!-- .option-content -->
                    </div><!-- .option-container --> 
                                       
                    <div id="header-featured-image" class="option-container">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Header Featured Image Options', 'catch-kathmandu' ); ?></a></h3>
                        <div class="option-content inside">
                            <div class="row">
                                <div class="col col-header">
                                    <?php _e( 'Enable Featured Header Image', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-options">
                                    <label title="enable-header-homepage">
                                    <input type="radio" name="catchkathmandu_options[enable_featured_header_image]" id="enable-header-homepage" <?php checked($options['enable_featured_header_image'], 'homepage'); ?> value="homepage"  />
                                    <?php _e( 'Homepage', 'catch-kathmandu' ); ?>
                                    </label>
                                    
                                    <label title="enable-header-homepage">
                                    <input type="radio" name="catchkathmandu_options[enable_featured_header_image]" id="enable-header-exclude-homepage" <?php checked($options['enable_featured_header_image'], 'excludehome'); ?> value="excludehome"  />
                                    <?php _e( 'Excluding Homepage', 'catch-kathmandu' ); ?>
                                    </label>                                            
          
                                    <label title="enable-header-allpage">
                                    <input type="radio" name="catchkathmandu_options[enable_featured_header_image]" id="enable-header-allpage" <?php checked($options['enable_featured_header_image'], 'allpage'); ?> value="allpage"  />
                                     <?php _e( 'Entire Site', 'catch-kathmandu' ); ?>
                                    </label>
                                    
                                    <label title="enable-header-postpage">
                                    <input type="radio" name="catchkathmandu_options[enable_featured_header_image]" id="enable-header-postpage" <?php checked($options['enable_featured_header_image'], 'postpage'); ?> value="postpage"  />
                                     <?php _e( 'Entire Site, Page/Post Featured Image', 'catch-kathmandu' ); ?>
                                    </label> 
                                    
                                    <label title="enable-header-pagespostes">
                                    <input type="radio" name="catchkathmandu_options[enable_featured_header_image]" id="enable-header-pagespostes" <?php checked($options['enable_featured_header_image'], 'pagespostes'); ?> value="pagespostes"  />
                                     <?php _e( 'Pages & Posts', 'catch-kathmandu' ); ?>
                                    </label> 
                                    
                                    <label title="disable-header">
                                    <input type="radio" name="catchkathmandu_options[enable_featured_header_image]" id="disable-header" <?php checked($options['enable_featured_header_image'], 'disable'); ?> value="disable" />
                                     <?php _e( 'Disable', 'catch-kathmandu' ); ?>
                                    </label> 
                                </div>
                            </div><!-- .row -->
                            <div class="row">
                                <div class="col col-header">
                                    <?php _e( 'Page/Post Featured Image Size', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-options">
                                    <label title="featured-image"><input type="radio" name="catchkathmandu_options[page_featured_image]" id="image-full" <?php checked($options['page_featured_image'], 'full'); ?> value="full"  />
                                    <?php _e( 'Full Image', 'catch-kathmandu' ); ?>
                                    </label>   
                                    
                                    <label title="featured-image"><input type="radio" name="catchkathmandu_options[page_featured_image]" id="content-image-slider" <?php checked($options['page_featured_image'], 'slider'); ?> value="slider"  />
                                    <?php _e( 'Slider Image', 'catch-kathmandu' ); ?>
                                    </label>   
                                    
                                    <label title="featured-image"><input type="radio" name="catchkathmandu_options[page_featured_image]" id="image-featured" <?php checked($options['page_featured_image'], 'featured'); ?> value="featured"  />
                                    <?php _e( 'Featured Image', 'catch-kathmandu' ); ?>
                                    </label>
                                </div>
                            </div><!-- .row -->  
                            <div class="row">
                                <div class="col col-header">
                                    <?php _e( 'Featured HeaderImage Position', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-options">
                                    <label title="before-menu"><input type="radio" name="catchkathmandu_options[featured_header_image_position]" id="before-menu" <?php checked($options['featured_header_image_position'], 'before-menu'); ?> value="before-menu"  />
                                    <?php _e( 'Before Menu', 'catch-kathmandu' ); ?>
                                    </label>
                                    
                                    <label title="after-menu"><input type="radio" name="catchkathmandu_options[featured_header_image_position]" id="after-menu" <?php checked($options['featured_header_image_position'], 'after-menu'); ?> value="after-menu"  />
                                    <?php _e( 'After Menu', 'catch-kathmandu' ); ?>
                                    </label> 
                                    
                                    <label title="before-header"><input type="radio" name="catchkathmandu_options[featured_header_image_position]" id="before-header" <?php checked($options['featured_header_image_position'], 'before-header'); ?> value="before-header"  />
                                    <?php _e( 'Before Header', 'catch-kathmandu' ); ?>
                                    </label> 
                                    
                                    <label title="after-sidebartop"><input type="radio" name="catchkathmandu_options[featured_header_image_position]" id="after-sidebartop" <?php checked($options['featured_header_image_position'], 'after-sidebartop'); ?> value="after-sidebartop"  />
                                    <?php _e( 'After Top Sidebar', 'catch-kathmandu' ); ?>
                                    </label> 
                                </div>
                            </div><!-- .row -->                        
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Featured Header Image URL', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">         
                                    <input class="upload-url" size="65" type="text" name="catchkathmandu_options[featured_header_image]" value="<?php echo esc_url( $options [ 'featured_header_image' ] ); ?>" /> <input ref="<?php esc_attr_e( 'Insert as Featured Header Image','catch-kathmandu' );?>"  class="catchkathmandu_upload_image button" name="wsl-image-add" type="button" value="<?php esc_attr_e( 'Change Image','catch-kathmandu' );?>" />
                                </div>
                            </div><!-- .row -->
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Featured Header Image Alt/Title Tag', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">         
                                    <input class="upload-url" size="65" type="text" name="catchkathmandu_options[featured_header_image_alt]" value="<?php echo esc_attr( $options [ 'featured_header_image_alt' ] ); ?>" />
                                </div>
                            </div><!-- .row -->
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Featured Header Image Link URL', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">         
                                    <input type="text" size="65" name="catchkathmandu_options[featured_header_image_url]" value="<?php echo esc_url( $options [ 'featured_header_image_url' ] ); ?>" />
                                </div>
                            </div><!-- .row -->                            
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Target. Open Link in New Window?', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">         
                                    <input type="hidden" value="0" name="catchkathmandu_options[featured_header_image_base]"> 
                                    <input type="checkbox" id="header-image-base" name="catchkathmandu_options[featured_header_image_base]" value="1" <?php checked( '1', $options['featured_header_image_base'] ); ?> /> <?php _e('Check to open in new window', 'catch-kathmandu'); ?>
                                </div>
                            </div><!-- .row -->
                            <div class="row">
                                <div class="col col-1">
                                    <?php if( $options[ 'reset_featured_image' ] == "1" ) { $options[ 'reset_featured_image' ] = "0"; } ?>
                                    <?php _e( 'Reset Header Featured Image Options?', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">         
                                    <input type='hidden' value='0' name='catchkathmandu_options[reset_featured_image]'>
                                    <input type="checkbox" id="headerlogo" name="catchkathmandu_options[reset_featured_image]" value="1" <?php checked( '1', $options['reset_featured_image'] ); ?> /> <?php _e('Check to reset', 'catch-kathmandu'); ?>
                                </div>
                            </div><!-- .row -->                                                         
                            <div class="row">
                                <input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save Changes', 'catch-kathmandu' ); ?>" />
                            </div><!-- .row --> 
                        </div><!-- .option-content --> 
                    </div><!-- .option-container -->    
                    
                    <div id="content-featured-image" class="option-container">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Content Featured Image Options', 'catch-kathmandu' ); ?></a></h3>
                        <div class="option-content inside">
                            <div class="row">
                                <div class="col col-header">
                                    <?php _e( 'Content Featured Image Size', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-options">
                                    <label title="featured-image"><input type="radio" name="catchkathmandu_options[featured_image]" id="image-featured" <?php checked($options['featured_image'], 'featured'); ?> value="featured"  />
                                    <?php _e( 'Featured Image', 'catch-kathmandu' ); ?>
                                    </label>  
                                    
                                    <label title="featured-image"><input type="radio" name="catchkathmandu_options[featured_image]" id="image-full" <?php checked($options['featured_image'], 'full'); ?> value="full"  />
                                    <?php _e( 'Full Image', 'catch-kathmandu' ); ?>
                                    </label>   
                                    
                                    <label title="featured-image"><input type="radio" name="catchkathmandu_options[featured_image]" id="content-image-slider" <?php checked($options['featured_image'], 'slider'); ?> value="slider"  />
                                    <?php _e( 'Slider Image', 'catch-kathmandu' ); ?>
                                    </label>   
                                    
                                    <label title="featured-image"><input type="radio" name="catchkathmandu_options[featured_image]" id="disable-image-slider" <?php checked($options['featured_image'], 'disable'); ?> value="disable"  />
                                    <?php _e( 'Disable Image', 'catch-kathmandu' ); ?>
                                    </label>
                                </div>
                            </div><!-- .row -->                                                         
                            <div class="row">
                                <input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save Changes', 'catch-kathmandu' ); ?>" />
                            </div><!-- .row -->
                        </div><!-- .option-content -->
                    </div><!-- .option-container -->   
                  
                    <div id="layout-options" class="option-container">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Layout Options', 'catch-kathmandu' ); ?></a></h3>
                        <div class="option-content inside">
                            <div class="row">
                                <div class="col col-header">
                                    <?php _e( 'Sidebar Layout Options', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-options">
                                    <label title="right-sidebar" class="box first"><img src="<?php echo get_template_directory_uri(); ?>/inc/panel/images/right-sidebar.png" alt="Right Sidebar" /><br />
                                    <input type="radio" name="catchkathmandu_options[sidebar_layout]" id="right-sidebar" <?php checked($options['sidebar_layout'], 'right-sidebar'); ?> value="right-sidebar"  />
                                    <?php _e( 'Right Sidebar', 'catch-kathmandu' ); ?>
                                    </label>  
                                    
                                    <label title="left-Sidebar" class="box"><img src="<?php echo get_template_directory_uri(); ?>/inc/panel/images/left-sidebar.png" alt="Left Sidebar" /><br />
                                    <input type="radio" name="catchkathmandu_options[sidebar_layout]" id="left-sidebar" <?php checked($options['sidebar_layout'], 'left-sidebar'); ?> value="left-sidebar"  />
                                    <?php _e( 'Left Sidebar', 'catch-kathmandu' ); ?>
                                    </label>   
                                    
                                    <label title="no-sidebar" class="box"><img src="<?php echo get_template_directory_uri(); ?>/inc/panel/images/no-sidebar.png" alt="No Sidebar" /><br />
                                    <input type="radio" name="catchkathmandu_options[sidebar_layout]" id="no-sidebar" <?php checked($options['sidebar_layout'], 'no-sidebar'); ?> value="no-sidebar"  />
                                    <?php _e( 'No Sidebar', 'catch-kathmandu' ); ?>
                                    </label>
                                    
                                    <label title="no-sidebar-full-width" class="box"><img src="<?php echo get_template_directory_uri(); ?>/inc/panel/images/no-sidebar-fullwidth.png" alt="No Sidebar, Full Width" /><br />
                                    <input type="radio" name="catchkathmandu_options[sidebar_layout]" id="no-sidebar-full-width" <?php checked($options['sidebar_layout'], 'no-sidebar-full-width'); ?> value="no-sidebar-full-width"  />
                                    <?php _e( 'No Sidebar, Full Width', 'catch-kathmandu' ); ?>
                                    </label>
                                    
                                    <label title="no-sidebar-one-column" class="box"><img src="<?php echo get_template_directory_uri(); ?>/inc/panel/images/one-column.png" alt="No Sidebar, One Column" /><br />
                                    <input type="radio" name="catchkathmandu_options[sidebar_layout]" id="no-sidebar-one-column" <?php checked($options['sidebar_layout'], 'no-sidebar-one-column'); ?> value="no-sidebar-one-column"  />
                                    <?php _e( 'No Sidebar, One Column', 'catch-kathmandu' ); ?>
                                    </label> 
                                </div>
                            </div><!-- .row -->                                             
                            <div class="row">
                                <div class="col col-header">
                                    <?php _e( 'Content Layout', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-options">                                                                                                         
                                    <label title="content-full"><input type="radio" name="catchkathmandu_options[content_layout]" id="content-full" <?php checked($options['content_layout'], 'full'); ?> value="full"  />
                                    <?php _e( 'Full Content Display', 'catch-kathmandu' ); ?>
                                    </label>   
                                    
                                    <label title="content-excerpt"><input type="radio" name="catchkathmandu_options[content_layout]" id="content-excerpt" <?php checked($options['content_layout'], 'excerpt'); ?> value="excerpt"  />
                                    <?php _e( 'Excerpt/Blog Display', 'catch-kathmandu' ); ?>
                                    </label>                                    
                                </div>
                            </div><!-- .row --> 
                            <div class="row">
                                <div class="col col-header">
                                    <?php if( $options[ 'reset_layout' ] == "1" ) { $options[ 'reset_layout' ] = "0"; } ?>
                                    <?php _e( 'Reset Layout?', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-options">         
                                    <input type='hidden' value='0' name='catchkathmandu_options[reset_layout]'>
                                    <input type="checkbox" id="headerlogo" name="catchkathmandu_options[reset_layout]" value="1" <?php checked( '1', $options['reset_layout'] ); ?> /> <?php _e('Check to reset', 'catch-kathmandu'); ?>
                                </div>
                            </div><!-- .row -->                                                         
                            <div class="row">
                                <input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save Changes', 'catch-kathmandu' ); ?>" />
                            </div><!-- .row -->                             
                        </div><!-- .option-content -->
                    </div><!-- .option-container -->                                               
                                          
                    <?php
                    /**
                      * Renders the Font Family Option.
                      *
                      * @since Catch Kathmandu Pro 1.0
                      */
                      
                      //Getting Font Available
                      $fonts = catchkathmandu_available_fonts();
                      
                    ?>
                    <div id="font-family-options" class="option-container">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Font Family Options', 'catch-kathmandu' ); ?></a></h3>
                        <div class="option-content inside"> 
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Default Font Family', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">         
                                    <select name="catchkathmandu_options[body_font]">
                                        <?php foreach( $fonts as $name => $family ) : ?>
                                            <option value="<?php echo $name; ?>" <?php selected( $name, $options[ 'body_font' ] ); ?>><?php echo str_replace( '"', '', $family ); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div><!-- .row -->
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Site Title Font Family', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">         
                                    <select name="catchkathmandu_options[title_font]">
                                        <?php foreach( $fonts as $name => $family ) : ?>
                                            <option value="<?php echo $name; ?>" <?php selected( $name, $options[ 'title_font' ] ); ?>><?php echo str_replace( '"', '', $family ); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div><!-- .row -->
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Site Tagline Font Family', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">         
                                    <select name="catchkathmandu_options[tagline_font]">
                                        <?php foreach( $fonts as $name => $family ) : ?>
                                            <option value="<?php echo $name; ?>" <?php selected( $name, $options[ 'tagline_font' ] ); ?>><?php echo str_replace( '"', '', $family ); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div><!-- .row -->
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Content Title Font Family', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">         
                                    <select name="catchkathmandu_options[content_tittle_font]">
                                        <?php foreach( $fonts as $name => $family ) : ?>
                                            <option value="<?php echo $name; ?>" <?php selected( $name, $options[ 'content_tittle_font' ] ); ?>><?php echo str_replace( '"', '', $family ); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div><!-- .row -->  
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Content Body Font Family', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">         
                                    <select name="catchkathmandu_options[content_font]">
                                        <?php foreach( $fonts as $name => $family ) : ?>
                                            <option value="<?php echo $name; ?>" <?php selected( $name, $options[ 'content_font' ] ); ?>><?php echo str_replace( '"', '', $family ); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div><!-- .row -->   
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Headings Tags from h1 to h6 Font Family', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">         
                                    <select name="catchkathmandu_options[headings_font]">
                                        <?php foreach( $fonts as $name => $family ) : ?>
                                            <option value="<?php echo $name; ?>" <?php selected( $name, $options[ 'headings_font' ] ); ?>><?php echo str_replace( '"', '', $family ); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div><!-- .row -->
                            <div class="row">
                                <div class="col col-1">
                                    <?php if( $options[ 'reset_typography' ] == "1" ) { $options[ 'reset_typography' ] = "0"; } ?>
                                    <?php _e( 'Reset Fonts?', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">         
                                    <input type='hidden' value='0' name='catchkathmandu_options[reset_typography]'>
                                    <input type="checkbox" id="reset_family" name="catchkathmandu_options[reset_typography]" value="1" <?php checked( '1', $options['reset_typography'] ); ?> /> <?php _e('Check to reset', 'catch-kathmandu'); ?>
                                </div>
                            </div><!-- .row -->                                                         
                            <div class="row">
                                <input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save Changes', 'catch-kathmandu' ); ?>" />
                            </div><!-- .row -->
                        </div><!-- .option-content -->
                    </div><!-- .option-container -->                                 
 
                    <div id="search-settings" class="option-container">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Search Text Settings', 'catch-kathmandu' ); ?></a></h3>
                        <div class="option-content inside">
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Default Display Text in Search', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">  
                                    <input type="text" size="45" name="catchkathmandu_options[search_display_text]" value="<?php echo esc_attr( $options[ 'search_display_text'] ); ?>" />
                                </div>
                            </div><!-- .row -->                                                         
                            <div class="row">
                                <input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save Changes', 'catch-kathmandu' ); ?>" />
                            </div><!-- .row -->
                        </div><!-- .option-content -->
                    </div><!-- .option-container --> 
                                        
                    <div id="excerpt-more-tag" class="option-container">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Excerpt / More Tag Settings', 'catch-kathmandu' ); ?></a></h3>
                        <div class="option-content inside">
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'More Tag Text', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">  
                                    <input type="text" size="45" name="catchkathmandu_options[more_tag_text]" value="<?php echo esc_attr( $options[ 'more_tag_text' ] ); ?>" />
                                </div>
                            </div><!-- .row -->
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Excerpt length(words)', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">  
                                    <input type="text" size="3" name="catchkathmandu_options[excerpt_length]" value="<?php echo intval( $options[ 'excerpt_length' ] ); ?>" />
                                </div>
                            </div><!-- .row -->                           
                            <div class="row">
                                <div class="col col-1">
                                    <?php if( $options[ 'reset_moretag' ] == "1" ) { $options[ 'reset_moretag' ] = "0"; } ?>
                                    <?php _e( 'Reset Excerpt?', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">         
                                    <input type='hidden' value='0' name='catchkathmandu_options[reset_moretag]'>
                                    <input type="checkbox" id="headerlogo" name="catchkathmandu_options[reset_moretag]" value="1" <?php checked( '1', $options['reset_moretag'] ); ?> /> <?php _e('Check to reset', 'catch-kathmandu'); ?>
                                </div>
                            </div><!-- .row -->                                                         
                            <div class="row">
                                <input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save Changes', 'catch-kathmandu' ); ?>" />
                            </div><!-- .row -->
                        </div><!-- .option-content -->
                    </div><!-- .option-container --> 
                    
                    <div id="feed-redirect" class="option-container">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Feed Redirect', 'catch-kathmandu' ); ?></a></h3>
                        <div class="option-content inside">
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Feed Redirect URL', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">  
                                    <input type="text" size="70" name="catchkathmandu_options[feed_url]" value="<?php echo esc_attr( $options[ 'feed_url' ] ); ?>" /> <?php _e( 'Add in the Feedburner URL', 'catch-kathmandu' ); ?>
                                </div>
                            </div><!-- .row --> 
                            <div class="row">
                                <input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save Changes', 'catch-kathmandu' ); ?>" />
                            </div><!-- .row -->
                        </div><!-- .option-content -->
                    </div><!-- .option-container --> 
                    
                    <div id="comments-options" class="option-container">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Comments Options', 'catch-kathmandu' ); ?></a></h3>
                        <div class="option-content inside">
                            <div class="row">
                                <div class="col col-header">
                                    <?php _e( 'Disable Comment?', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-options">
                                    <label title="commenting-setting"><input type="radio" name="catchkathmandu_options[commenting_setting]" id="default" <?php checked($options['commenting_setting'], 'default'); ?> value="default"  />
                                    <?php _e( 'Use WordPress Settings', 'catch-kathmandu' ); ?>
                                    </label>  
                                            
                                    <label title="commenting-setting"><input type="radio" name="catchkathmandu_options[commenting_setting]" id="page" <?php checked($options['commenting_setting'], 'page'); ?> value="page"  />
                                    <?php _e( 'Disable in Pages', 'catch-kathmandu' ); ?>
                                    </label>   
                                            
                                    <label title="commenting-setting" ><input type="radio" name="catchkathmandu_options[commenting_setting]" id="disable" <?php checked($options['commenting_setting'], 'disable'); ?> value="disable"  />
                                    <?php _e( 'Disable Completely', 'catch-kathmandu' ); ?>
                                    </label>  
                                </div>
                            </div><!-- .row --> 
                            <div class="row">
                                <div class="col col-header">
                                    <?php _e( 'Disable Website Field?', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-options">
                                    <input type='hidden' value='0' name='catchkathmandu_options[commenting_disable_url]'>
                                    <input type="checkbox" id="comment-disable-url" name="catchkathmandu_options[commenting_disable_url]" value="1" <?php checked( '1', $options['commenting_disable_url'] ); ?> /> <?php _e('Check to disable', 'catch-kathmandu'); ?>
                                </div>
                            </div><!-- .row --> 
                                    
                            <div class="row">
                                <input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save Changes', 'catch-kathmandu' ); ?>" />
                            </div><!-- .row -->
                        </div><!-- .option-content -->
                    </div><!-- .option-container -->

                    <div id="footer-editor-option" class="option-container">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Footer Editor Option', 'catch-kathmandu' ); ?></a></h3>
                        <div class="option-content inside">
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Footer Editor', 'catch-kathmandu' ); ?>
                                    <p>
                                        <small><?php _e( 'You can add custom <acronym title="Hypertext Markup Language">HTML</acronym> and/or shortcodes, which will be automatically inserted into your theme.<br />Some shorcodes: [the-year], [site-link], [wp-link], [shop-link]  for current year, your site link, wordpress site link, Catch Themes shop link respectively.', 'catch-kathmandu' ); ?></small>
                                    </p>
                                </div>
                                <div class="col col-2">
                                    <?php 
                                    $settings = array(
                                            'wpautop'               => false,
                                            'media_buttons'         => false,  // Don't show upload botton  
                                            'textarea_name'         => 'catchkathmandu_options[footer_code]',
                                            'tinymce'               => false,  // Don't use TinyMCE in a meta box.
                                            'textarea_rows'         => 3
                                        );
                                    wp_editor( esc_textarea( $options[ 'footer_code' ] ), 'catchkathmandu_options_footer_code', $settings ); ?>
                                </div>
                            </div><!-- .row --> 
                            <div class="row">
                                <div class="col col-1">
                                    <?php if( $options[ 'reset_footer' ] == "1" ) { $options[ 'reset_footer' ] = "0"; } ?>
                                    <?php _e( 'Reset Footer?', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">         
                                    <input type='hidden' value='0' name='catchkathmandu_options[reset_footer]'>
                                    <input type="checkbox" id="headerlogo" name="catchkathmandu_options[reset_footer]" value="1" <?php checked( '1', $options['reset_footer'] ); ?> /> <?php _e('Check to reset', 'catch-kathmandu'); ?>
                                </div>
                            </div><!-- .row -->                                                         
                            <div class="row">
                                <input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save Changes', 'catch-kathmandu' ); ?>" />
                            </div><!-- .row -->
                        </div><!-- .option-content -->
                    </div><!-- .option-container -->       
                    
                    <div id="custom-css" class="option-container">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Custom CSS', 'catch-kathmandu' ); ?></a></h3>
                        <div class="option-content inside"> 
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Enter your custom CSS styles.', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2"> 
                                    <textarea name="catchkathmandu_options[custom_css]" id="custom-css" cols="80" rows="10"><?php echo esc_attr( $options[ 'custom_css' ] ); ?></textarea>
                                </div>
                            </div><!-- .row --> 
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'CSS Tutorial from W3Schools.', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2"> 
                                    <a class="button" href="<?php echo esc_url( __( 'http://www.w3schools.com/css/default.asp','catch-kathmandu' ) ); ?>" title="<?php esc_attr_e( 'CSS Tutorial', 'catch-kathmandu' ); ?>" target="_blank"><?php _e( 'Click Here to Read', 'catch-kathmandu' );?></a>
                                </div>
                            </div><!-- .row -->                            
                            <div class="row">
                                <input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save Changes', 'catch-kathmandu' ); ?>" />
                            </div><!-- .row -->
                        </div><!-- .option-content -->
                    </div><!-- .option-container --> 

                    <div id="scrollup" class="option-container">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Scroll Up', 'catch-kathmandu' ); ?></a></h3>
                        <div class="option-content inside">
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Disable Scroll Up?', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                    <input type='hidden' value='0' name='catchkathmandu_options[disable_scrollup]'>
                                    <input type="checkbox" id="notifier" name="catchkathmandu_options[disable_scrollup]" value="1" <?php checked( '1', $options['disable_scrollup'] ); ?> /> <?php _e('Check to disable', 'catch-kathmandu'); ?>
                                </div>
                            </div><!-- .row -->
                            <div class="row">
                                <input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save Changes', 'catch-kathmandu' ); ?>" />
                            </div><!-- .row -->
                        </div><!-- .option-content --> 
                    </div><!-- .option-container --> 
                                        
                    <div id="update-notifier" class="option-container">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Update Notifier', 'catch-kathmandu' ); ?></a></h3>
                        <div class="option-content inside">
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Disable Update Notifier?', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                    <input type='hidden' value='0' name='catchkathmandu_options[disable_notifier]'>
                                    <input type="checkbox" id="notifier" name="catchkathmandu_options[disable_notifier]" value="1" <?php checked( '1', $options['disable_notifier'] ); ?> /> <?php _e('Check to disable', 'catch-kathmandu'); ?>
                                </div>
                            </div><!-- .row -->
                            <div class="row">
                                <input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save Changes', 'catch-kathmandu' ); ?>" />
                            </div><!-- .row -->
                        </div><!-- .option-content --> 
                    </div><!-- .option-container -->                     
                                       
                </div><!-- #themeoptions -->  
                
                <!-- Color Options -->
                <div id="coloroptions">                    
                
                    <div id="color-scheme" class="option-container">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Color Scheme', 'catch-kathmandu' ); ?></a></h3>
                        <div class="option-content inside">
                            <div class="row">
                                <div class="col col-header">
                                    <?php _e( 'Default Color Scheme', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-options">
                                    <label title="color-light" class="box first"><img src="<?php echo get_template_directory_uri(); ?>/inc/panel/images/light.png" alt="color-light" /><br />
                                    <input type="radio" name="catchkathmandu_options[color_scheme]" id="color-light" <?php checked($options['color_scheme'], 'light'); ?> value="light"  />
                                    <?php _e( 'Light', 'catch-kathmandu' ); ?>
                                    </label>
                                    <label title="color-dark" class="box"><img src="<?php echo get_template_directory_uri(); ?>/inc/panel/images/dark.png" alt="color-dark" /><br />
                                    <input type="radio" name="catchkathmandu_options[color_scheme]" id="color-dark" <?php checked($options['color_scheme'], 'dark'); ?> value="dark"  />
                                    <?php _e( 'Dark', 'catch-kathmandu' ); ?>
                                    </label>    
                                </div>
                            </div><!-- .row --> 
                            <div class="row">
                                <input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save Changes', 'catch-kathmandu' ); ?>" />
                            </div><!-- .row -->                              
                        </div><!-- .option-content -->
                    </div><!-- #color-scheme -->
                    
                    <div id="color-menus" class="option-container">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Menus Color Options', 'catch-kathmandu' ); ?></a></h3>
                        <div class="option-content inside">
                            <div id="primary-menu-color" class="repeat-content-wrap">
                                <h2 class="title"><?php _e( 'Primary Menu Color Options', 'catch-kathmandu' ); ?></h2>
                                <div class="row">
                                    <div class="col col-1">
                                         <?php _e( 'Menu Background Color:', 'catch-kathmandu' ); ?>
                                    </div>
                                    <div class="col col-2">                           
                                        <input type="text" class="catchkathmandu_color_picker" name="catchkathmandu_options[menu_background]" size="8" value="<?php echo ( isset( $options[ 'menu_background' ] ) ) ? esc_attr( $options[ 'menu_background' ] ) : '#3a3d41'; ?>" data-default-color="<?php echo esc_attr( $defaults[ 'menu_background' ] ); ?>" />
                                    </div>
                                </div><!-- .row -->                          
                                <div class="row">
                                    <div class="col col-1">
                                         <?php _e( 'Menu Text Color:', 'catch-kathmandu' ); ?>
                                    </div>
                                    <div class="col col-2">                           
                                        <input type="text" class="catchkathmandu_color_picker" name="catchkathmandu_options[menu_color]" size="8" value="<?php echo ( isset( $options[ 'menu_color' ] ) ) ? esc_attr( $options[ 'menu_color' ] ) : '#eee'; ?>" data-default-color="<?php echo esc_attr( $defaults[ 'menu_color' ] ); ?>" />
                                    </div>
                                </div><!-- .row -->     
                                <div class="row">
                                    <div class="col col-1">
                                         <?php _e( 'Menu Hover & Active Background Color:', 'catch-kathmandu' ); ?>
                                    </div>
                                    <div class="col col-2">                           
                                        <input type="text" class="catchkathmandu_color_picker" name="catchkathmandu_options[hover_active_color]" size="8" value="<?php echo ( isset( $options[ 'hover_active_color' ] ) ) ? esc_attr( $options[ 'hover_active_color' ] ) : '#000'; ?>" data-default-color="<?php echo esc_attr( $defaults[ 'hover_active_color' ] ); ?>" />
                                    </div>
                                </div><!-- .row -->                                     
                                <div class="row">
                                    <div class="col col-1">
                                         <?php _e( 'Menu Hover & Active Text Color:', 'catch-kathmandu' ); ?>
                                    </div>
                                    <div class="col col-2">                           
                                        <input type="text" class="catchkathmandu_color_picker" name="catchkathmandu_options[hover_active_text_color]" size="8" value="<?php echo ( isset( $options[ 'hover_active_text_color' ] ) ) ? esc_attr( $options[ 'hover_active_text_color' ] ) : '#eee'; ?>" data-default-color="<?php echo esc_attr( $defaults[ 'hover_active_text_color' ] ); ?>" />
                                    </div>
                                </div><!-- .row -->                              
                                <div class="row">
                                    <div class="col col-1">
                                         <?php _e( 'Sub-Menu Background Color:', 'catch-kathmandu' ); ?>
                                    </div>
                                    <div class="col col-2">                           
                                        <input type="text" class="catchkathmandu_color_picker" name="catchkathmandu_options[sub_menu_bg_color]" size="8" value="<?php echo ( isset( $options[ 'sub_menu_bg_color' ] ) ) ? esc_attr( $options[ 'sub_menu_bg_color' ] ) : '#2581aa'; ?>" data-default-color="<?php echo esc_attr( $defaults[ 'sub_menu_bg_color' ] ); ?>" />
                                    </div>
                                </div><!-- .row -->                                  
                                <div class="row">
                                    <div class="col col-1">
                                         <?php _e( 'Sub-Menu Text Color:', 'catch-kathmandu' ); ?>
                                    </div>
                                    <div class="col col-2">                           
                                        <input type="text" class="catchkathmandu_color_picker" name="catchkathmandu_options[sub_menu_text_color]" size="8" value="<?php echo ( isset( $options[ 'sub_menu_text_color' ] ) ) ? esc_attr( $options[ 'sub_menu_text_color' ] ) : '#fff'; ?>" data-default-color="<?php echo esc_attr( $defaults[ 'sub_menu_text_color' ] ); ?>" />
                                    </div>
                                </div><!-- .row --> 
                            </div><!-- .repeat-content-wrap -->
                            
                            <div id="secondary-menu-color" class="repeat-content-wrap">
                                <h2 class="title"><?php _e( 'Secondary Menu Color Options', 'catch-kathmandu' ); ?></h2>
                                <div class="row">
                                    <div class="col col-1">
                                         <?php _e( 'Menu Background Color:', 'catch-kathmandu' ); ?>
                                    </div>
                                    <div class="col col-2">                           
                                        <input type="text" class="catchkathmandu_color_picker" name="catchkathmandu_options[secondary_menu_background]" size="8" value="<?php echo ( isset( $options[ 'secondary_menu_background' ] ) ) ? esc_attr( $options[ 'secondary_menu_background' ] ) : '#2581aa'; ?>" data-default-color="<?php echo esc_attr( $defaults[ 'secondary_menu_background' ] ); ?>" />
                                    </div>
                                </div><!-- .row -->                          
                                <div class="row">
                                    <div class="col col-1">
                                         <?php _e( 'Menu Text Color:', 'catch-kathmandu' ); ?>
                                    </div>
                                    <div class="col col-2">                           
                                        <input type="text" class="catchkathmandu_color_picker" name="catchkathmandu_options[secondary_menu_color]" size="8" value="<?php echo ( isset( $options[ 'secondary_menu_color' ] ) ) ? esc_attr( $options[ 'secondary_menu_color' ] ) : '#fff'; ?>" data-default-color="<?php echo esc_attr( $defaults[ 'secondary_menu_color' ] ); ?>" />
                                    </div>
                                </div><!-- .row -->     
                                <div class="row">
                                    <div class="col col-1">
                                         <?php _e( 'Menu Hover & Active Background Color:', 'catch-kathmandu' ); ?>
                                    </div>
                                    <div class="col col-2">                           
                                        <input type="text" class="catchkathmandu_color_picker" name="catchkathmandu_options[secondary_hover_active_color]" size="8" value="<?php echo ( isset( $options[ 'secondary_hover_active_color' ] ) ) ? esc_attr( $options[ 'secondary_hover_active_color' ] ) : '#1b5f7d'; ?>" data-default-color="<?php echo esc_attr( $defaults[ 'secondary_hover_active_color' ] ); ?>" />
                                    </div>
                                </div><!-- .row -->                                     
                                <div class="row">
                                    <div class="col col-1">
                                         <?php _e( 'Menu Hover & Active Text Color:', 'catch-kathmandu' ); ?>
                                    </div>
                                    <div class="col col-2">                           
                                        <input type="text" class="catchkathmandu_color_picker" name="catchkathmandu_options[secondary_hover_active_text_color]" size="8" value="<?php echo ( isset( $options[ 'secondary_hover_active_text_color' ] ) ) ? esc_attr( $options[ 'secondary_hover_active_text_color' ] ) : '#fff'; ?>" data-default-color="<?php echo esc_attr( $defaults[ 'secondary_hover_active_text_color' ] ); ?>" />
                                    </div>
                                </div><!-- .row -->                              
                                <div class="row">
                                    <div class="col col-1">
                                         <?php _e( 'Sub-Menu Background Color:', 'catch-kathmandu' ); ?>
                                    </div>
                                    <div class="col col-2">                           
                                        <input type="text" class="catchkathmandu_color_picker" name="catchkathmandu_options[secondary_sub_menu_bg_color]" size="8" value="<?php echo ( isset( $options[ 'secondary_sub_menu_bg_color' ] ) ) ? esc_attr( $options[ 'secondary_sub_menu_bg_color' ] ) : '#2581aa'; ?>" data-default-color="<?php echo esc_attr( $defaults[ 'secondary_sub_menu_bg_color' ] ); ?>" />
                                    </div>
                                </div><!-- .row -->                                  
                                <div class="row">
                                    <div class="col col-1">
                                         <?php _e( 'Sub-Menu Text Color:', 'catch-kathmandu' ); ?>
                                    </div>
                                    <div class="col col-2">                           
                                        <input type="text" class="catchkathmandu_color_picker" name="catchkathmandu_options[secondary_sub_menu_text_color]" size="8" value="<?php echo ( isset( $options[ 'secondary_sub_menu_text_color' ] ) ) ? esc_attr( $options[ 'secondary_sub_menu_text_color' ] ) : '#fff'; ?>" data-default-color="<?php echo esc_attr( $defaults[ 'secondary_sub_menu_text_color' ] ); ?>" />
                                    </div>
                                </div><!-- .row --> 
                            </div><!-- .repeat-content-wrap -->
                                                               
                            <div id="footer-menu-color" class="repeat-content-wrap">
                                <h2 class="title"><?php _e( 'Footer Menu Color Options', 'catch-kathmandu' ); ?></h2>
                                <div class="row">
                                    <div class="col col-1">
                                         <?php _e( 'Menu Background Color:', 'catch-kathmandu' ); ?>
                                    </div>
                                    <div class="col col-2">                           
                                        <input type="text" class="catchkathmandu_color_picker" name="catchkathmandu_options[footer_menu_background]" size="8" value="<?php echo ( isset( $options[ 'footer_menu_background' ] ) ) ? esc_attr( $options[ 'footer_menu_background' ] ) : '#1b5f7d'; ?>" data-default-color="<?php echo esc_attr( $defaults[ 'footer_menu_background' ] ); ?>" />
                                    </div>
                                </div><!-- .row -->                          
                                <div class="row">
                                    <div class="col col-1">
                                         <?php _e( 'Menu Text Color:', 'catch-kathmandu' ); ?>
                                    </div>
                                    <div class="col col-2">                           
                                        <input type="text" class="catchkathmandu_color_picker" name="catchkathmandu_options[footer_menu_color]" size="8" value="<?php echo ( isset( $options[ 'footer_menu_color' ] ) ) ? esc_attr( $options[ 'footer_menu_color' ] ) : '#ccc'; ?>" data-default-color="<?php echo esc_attr( $defaults[ 'footer_menu_color' ] ); ?>" />
                                    </div>
                                </div><!-- .row -->     
                                <div class="row">
                                    <div class="col col-1">
                                         <?php _e( 'Menu Hover & Active Background Color:', 'catch-kathmandu' ); ?>
                                    </div>
                                    <div class="col col-2">                           
                                        <input type="text" class="catchkathmandu_color_picker" name="catchkathmandu_options[footer_hover_active_color]" size="8" value="<?php echo ( isset( $options[ 'footer_hover_active_color' ] ) ) ? esc_attr( $options[ 'footer_hover_active_color' ] ) : '#1bfF7d'; ?>" data-default-color="<?php echo esc_attr( $defaults[ 'footer_hover_active_color' ] ); ?>" />
                                    </div>
                                </div><!-- .row -->                                     
                                <div class="row">
                                    <div class="col col-1">
                                         <?php _e( 'Menu Hover & Active Text Color:', 'catch-kathmandu' ); ?>
                                    </div>
                                    <div class="col col-2">                           
                                        <input type="text" class="catchkathmandu_color_picker" name="catchkathmandu_options[footer_hover_active_text_color]" size="8" value="<?php echo ( isset( $options[ 'footer_hover_active_text_color' ] ) ) ? esc_attr( $options[ 'footer_hover_active_text_color' ] ) : '#fff'; ?>" data-default-color="<?php echo esc_attr( $defaults[ 'footer_hover_active_text_color' ] ); ?>" />
                                    </div>
                                </div><!-- .row -->                              
                                <div class="row">
                                    <div class="col col-1">
                                         <?php _e( 'Sub-Menu Background Color:', 'catch-kathmandu' ); ?>
                                    </div>
                                    <div class="col col-2">                           
                                        <input type="text" class="catchkathmandu_color_picker" name="catchkathmandu_options[footer_sub_menu_bg_color]" size="8" value="<?php echo ( isset( $options[ 'footer_sub_menu_bg_color' ] ) ) ? esc_attr( $options[ 'footer_sub_menu_bg_color' ] ) : '#2581aa'; ?>" data-default-color="<?php echo esc_attr( $defaults[ 'footer_sub_menu_bg_color' ] ); ?>" />
                                    </div>
                                </div><!-- .row -->                                  
                                <div class="row">
                                    <div class="col col-1">
                                         <?php _e( 'Sub-Menu Text Color:', 'catch-kathmandu' ); ?>
                                    </div>
                                    <div class="col col-2">                           
                                        <input type="text" class="catchkathmandu_color_picker" name="catchkathmandu_options[footer_sub_menu_text_color]" size="8" value="<?php echo ( isset( $options[ 'footer_sub_menu_text_color' ] ) ) ? esc_attr( $options[ 'footer_sub_menu_text_color' ] ) : '#fff'; ?>" data-default-color="<?php echo esc_attr( $defaults[ 'footer_sub_menu_text_color' ] ); ?>" />
                                    </div>
                                </div><!-- .row -->   
                            </div><!-- .repeat-content-wrap -->
                            <div class="row">
                                <div class="col col-1">
                                    <?php if( $options[ 'reset_menu_color' ] == "1" ) { $options[ 'reset_menu_color' ] = "0"; } ?>
                                    <?php _e( 'Reset Menu Color?', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">         
                                    <input type='hidden' value='0' name='catchkathmandu_options[reset_menu_color]'>
                                    <input type="checkbox" id="headerlogo" name="catchkathmandu_options[reset_menu_color]" value="1" <?php checked( '1', $options['reset_menu_color'] ); ?> /> <?php _e('Check to reset', 'catch-kathmandu'); ?>
                                </div>
                            </div><!-- .row -->  
                            <div class="row">
                                <input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save Changes', 'catch-kathmandu' ); ?>" />
                            </div><!-- .row -->                                                                                    
                        </div><!-- .option-content -->
                    </div><!-- #color-menus --> 
                    
                    <?php if ( function_exists( 'wp_pagenavi' ) || function_exists( 'wp_page_numbers' ) ) : ?> 
                        <div id="color-pagination" class="option-container">
                            <h3 class="option-toggle"><a href="#"><?php _e( 'Pagination Color Options', 'catch-kathmandu' ); ?></a></h3>
                            <div class="option-content inside">
                                <div class="row">
                                    <div class="col col-1">
                                         <?php _e( 'Pages Color:', 'catch-kathmandu' ); ?>
                                    </div>
                                    <div class="col col-2">                           
                                        <input type="text" class="catchkathmandu_color_picker" name="catchkathmandu_options[pagination_pages_color]" size="8" value="<?php echo ( isset( $options[ 'pagination_pages_color' ] ) ) ? esc_attr( $options[ 'pagination_pages_color' ] ) : '#555'; ?>" data-default-color="<?php echo esc_attr( $defaults[ 'pagination_pages_color' ] ); ?>" />
                                    </div>
                                </div><!-- .row --> 
                                <div class="row">
                                    <div class="col col-1">
                                         <?php _e( 'Pages Box Background Color:', 'catch-kathmandu' ); ?>
                                    </div>
                                    <div class="col col-2">                           
                                        <input type="text" class="catchkathmandu_color_picker" name="catchkathmandu_options[pagination_bg_color]" size="8" value="<?php echo ( isset( $options[ 'pagination_bg_color' ] ) ) ? esc_attr( $options[ 'pagination_bg_color' ] ) : '#21759b'; ?>" data-default-color="<?php echo esc_attr( $defaults[ 'pagination_bg_color' ] ); ?>" />
                                    </div>
                                </div><!-- .row --> 
                                 <div class="row">
                                    <div class="col col-1">
                                         <?php _e( 'Pages Box Text Color:', 'catch-kathmandu' ); ?>
                                    </div>
                                    <div class="col col-2">                           
                                        <input type="text" class="catchkathmandu_color_picker" name="catchkathmandu_options[pagination_text_color]" size="8" value="<?php echo ( isset( $options[ 'pagination_text_color' ] ) ) ? esc_attr( $options[ 'pagination_text_color' ] ) : '#ddd'; ?>" data-default-color="<?php echo esc_attr( $defaults[ 'pagination_text_color' ] ); ?>" />
                                    </div>
                                </div><!-- .row --> 
                                <div class="row">
                                    <div class="col col-1">
                                         <?php _e( 'Pages Box Hover/Active Background Color:', 'catch-kathmandu' ); ?>
                                    </div>
                                    <div class="col col-2">                           
                                        <input type="text" class="catchkathmandu_color_picker" name="catchkathmandu_options[pagination_active_bg_color]" size="8" value="<?php echo ( isset( $options[ 'pagination_active_bg_color' ] ) ) ? esc_attr( $options[ 'pagination_active_bg_color' ] ) : '#1b5f7d'; ?>" data-default-color="<?php echo esc_attr( $defaults[ 'pagination_active_bg_color' ] ); ?>" />
                                    </div>
                                </div><!-- .row --> 
                                <div class="row">
                                    <div class="col col-1">
                                         <?php _e( 'Pages Box Hover/Active Text Color:', 'catch-kathmandu' ); ?>
                                    </div>
                                    <div class="col col-2">                           
                                        <input type="text" class="catchkathmandu_color_picker" name="catchkathmandu_options[pagination_active_text_color]" size="8" value="<?php echo ( isset( $options[ 'pagination_active_text_color' ] ) ) ? esc_attr( $options[ 'pagination_active_text_color' ] ) : '#fff'; ?>" data-default-color="<?php echo esc_attr( $defaults[ 'pagination_active_text_color' ] ); ?>" />
                                    </div>
                                </div><!-- .row -->                                                                                                                                
                                <div class="row">
                                    <div class="col col-1">
                                        <?php if( $options[ 'reset_pagination_color' ] == "1" ) { $options[ 'reset_pagination_color' ] = "0"; } ?>
                                        <?php _e( 'Reset Pagination Color?', 'catch-kathmandu' ); ?>
                                    </div>
                                    <div class="col col-2">         
                                        <input type='hidden' value='0' name='catchkathmandu_options[reset_pagination_color]'>
                                        <input type="checkbox" id="headerlogo" name="catchkathmandu_options[reset_pagination_color]" value="1" <?php checked( '1', $options['reset_pagination_color'] ); ?> /> <?php _e('Check to reset', 'catch-kathmandu'); ?>
                                    </div>
                                </div><!-- .row -->  
                                <div class="row">
                                    <input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save Changes', 'catch-kathmandu' ); ?>" />
                                </div><!-- .row -->                                                                                    
                            </div><!-- .option-content -->                                                                       
                        </div><!-- #color-pagination --> 
                    <?php endif; ?>
                                    
                    <div id="color-slider" class="option-container">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Slider Color Options', 'catch-kathmandu' ); ?></a></h3>
                        <div class="option-content inside">
                            <div class="row">
                                <div class="col col-1">
                                     <?php _e( 'Slider Background Color:', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">                           
                                    <input type="text" class="catchkathmandu_color_picker" name="catchkathmandu_options[slider_background]" size="8" value="<?php echo ( isset( $options[ 'slider_background' ] ) ) ? esc_attr( $options[ 'slider_background' ] ) : '#21759b'; ?>" data-default-color="<?php echo esc_attr( $defaults[ 'slider_background' ] ); ?>" />
                                </div>
                            </div><!-- .row --> 
                            <div class="row">
                                <div class="col col-1">
                                     <?php _e( 'Slider Border Bottom Color:', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">                           
                                    <input type="text" class="catchkathmandu_color_picker" name="catchkathmandu_options[slider_border]" size="8" value="<?php echo ( isset( $options[ 'slider_border' ] ) ) ? esc_attr( $options[ 'slider_border' ] ) : '#1b5f7d'; ?>" data-default-color="<?php echo esc_attr( $defaults[ 'slider_border' ] ); ?>" />
                                </div>
                            </div><!-- .row --> 
                            <div class="row">
                                <div class="col col-1">
                                     <?php _e( 'Slider Controller Background Color:', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">                           
                                    <input type="text" class="catchkathmandu_color_picker" name="catchkathmandu_options[slider_controller]" size="8" value="<?php echo ( isset( $options[ 'slider_controller' ] ) ) ? esc_attr( $options[ 'slider_controller' ] ) : '#21759b'; ?>" data-default-color="<?php echo esc_attr( $defaults[ 'slider_controller' ] ); ?>" />
                                </div>
                            </div><!-- .row --> 
                            <div class="row">
                                <div class="col col-1">
                                     <?php _e( 'Slider Controller Arrow Color:', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">                           
                                    <input type="text" class="catchkathmandu_color_picker" name="catchkathmandu_options[slider_controller_text]" size="8" value="<?php echo ( isset( $options[ 'slider_controller_text' ] ) ) ? esc_attr( $options[ 'slider_controller_text' ] ) : '#fff'; ?>" data-default-color="<?php echo esc_attr( $defaults[ 'slider_controller_text' ] ); ?>" />
                                </div>
                            </div><!-- .row --> 
                            <div class="row">
                                <div class="col col-1">
                                     <?php _e( 'Slider Content Background Color:', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">                           
                                    <input type="text" class="catchkathmandu_color_picker" name="catchkathmandu_options[slider_content_bg_color]" size="8" value="<?php echo ( isset( $options[ 'slider_content_bg_color' ] ) ) ? esc_attr( $options[ 'slider_content_bg_color' ] ) : '#21759b'; ?>" data-default-color="<?php echo esc_attr( $defaults[ 'slider_content_bg_color' ] ); ?>" />
                                </div>
                            </div><!-- .row -->                                                                                   
                            <div class="row">
                                <div class="col col-1">
                                     <?php _e( 'Slider Content Text Color:', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">                           
                                    <input type="text" class="catchkathmandu_color_picker" name="catchkathmandu_options[slider_content_text_color]" size="8" value="<?php echo ( isset( $options[ 'slider_content_text_color' ] ) ) ? esc_attr( $options[ 'slider_content_text_color' ] ) : '#fff'; ?>" data-default-color="<?php echo esc_attr( $defaults[ 'slider_content_text_color' ] ); ?>" />
                                </div>
                            </div><!-- .row --> 
                            <div class="row">
                                <div class="col col-1">
                                    <?php if( $options[ 'reset_slider_color' ] == "1" ) { $options[ 'reset_slider_color' ] = "0"; } ?>
                                    <?php _e( 'Reset Slider Color?', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">         
                                    <input type='hidden' value='0' name='catchkathmandu_options[reset_slider_color]'>
                                    <input type="checkbox" id="headerlogo" name="catchkathmandu_options[reset_slider_color]" value="1" <?php checked( '1', $options['reset_slider_color'] ); ?> /> <?php _e('Check to reset', 'catch-kathmandu'); ?>
                                </div>
                            </div><!-- .row -->  
                            <div class="row">
                                <input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save Changes', 'catch-kathmandu' ); ?>" />
                            </div><!-- .row -->                                                                                    
                        </div><!-- .option-content -->                                                                       
                    </div><!-- #color-slider --> 

                    <div id="color-headlines" class="option-container">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Homepage Headline Color Options', 'catch-kathmandu' ); ?></a></h3>
                        <div class="option-content inside">
                            <div class="row">
                                <div class="col col-1">
                                     <?php _e( 'Background Color:', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">                           
                                    <input type="text" class="catchkathmandu_color_picker" name="catchkathmandu_options[home_headline_background]" size="8" value="<?php echo ( isset( $options[ 'home_headline_background' ] ) ) ? esc_attr( $options[ 'home_headline_background' ] ) : '#21759b'; ?>" data-default-color="<?php echo esc_attr( $defaults[ 'home_headline_background' ] ); ?>" />
                                </div>
                            </div><!-- .row -->                                                            
                            <div class="row">
                                <div class="col col-1">
                                     <?php _e( 'Text Color:', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">                           
                                    <input type="text" class="catchkathmandu_color_picker" name="catchkathmandu_options[home_headline]" size="8" value="<?php echo ( isset( $options[ 'home_headline' ] ) ) ? esc_attr( $options[ 'home_headline' ] ) : '#fff'; ?>" data-default-color="<?php echo esc_attr( $defaults[ 'home_headline' ] ); ?>" />
                                </div>
                            </div><!-- .row -->                         
                            <div class="row">
                                <div class="col col-1">
                                     <?php _e( 'Border Bottom Color:', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">                           
                                    <input type="text" class="catchkathmandu_color_picker" name="catchkathmandu_options[home_headline_border]" size="8" value="<?php echo ( isset( $options[ 'home_headline_border' ] ) ) ? esc_attr( $options[ 'home_headline_border' ] ) : '#1b5f7d'; ?>" data-default-color="<?php echo esc_attr( $defaults[ 'home_headline_border' ] ); ?>" />
                                </div>
                            </div><!-- .row --> 
                            <div class="row">
                                <div class="col col-1">
                                     <?php _e( 'Button Background Color:', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">                           
                                    <input type="text" class="catchkathmandu_color_picker" name="catchkathmandu_options[home_headline_button_bg]" size="8" value="<?php echo ( isset( $options[ 'home_headline_button_bg' ] ) ) ? esc_attr( $options[ 'home_headline_button_bg' ] ) : '#9bc23c'; ?>" data-default-color="<?php echo esc_attr( $defaults[ 'home_headline_button_bg' ] ); ?>" />
                                </div>
                            </div><!-- .row -->    
                            <div class="row">
                                <div class="col col-1">
                                     <?php _e( 'Button Text Color:', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">                           
                                    <input type="text" class="catchkathmandu_color_picker" name="catchkathmandu_options[home_headline_button]" size="8" value="<?php echo ( isset( $options[ 'home_headline_button' ] ) ) ? esc_attr( $options[ 'home_headline_button' ] ) : '#fff'; ?>" data-default-color="<?php echo esc_attr( $defaults[ 'home_headline_button' ] ); ?>" />
                                </div>
                            </div><!-- .row --> 
                        
                            <div class="row">
                                <div class="col col-1">
                                     <?php _e( 'Button Hover Background Color:', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">                           
                                    <input type="text" class="catchkathmandu_color_picker" name="catchkathmandu_options[home_headline_button_bg_hover]" size="8" value="<?php echo ( isset( $options[ 'home_headline_button_bg_hover' ] ) ) ? esc_attr( $options[ 'home_headline_button_bg_hover' ] ) : '#87ae28'; ?>" data-default-color="<?php echo esc_attr( $defaults[ 'home_headline_button_bg_hover' ] ); ?>" />
                                </div>
                            </div><!-- .row -->  
                            <div class="row">
                                <div class="col col-1">
                                     <?php _e( 'Button Hover Text Color:', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">                           
                                    <input type="text" class="catchkathmandu_color_picker" name="catchkathmandu_options[home_headline_button_hover]" size="8" value="<?php echo ( isset( $options[ 'home_headline_button_hover' ] ) ) ? esc_attr( $options[ 'home_headline_button_hover' ] ) : '#fff'; ?>" data-default-color="<?php echo esc_attr( $defaults[ 'home_headline_button_hover' ] ); ?>" />
                                </div>
                            </div><!-- .row -->                                                                                                              
                            <div class="row">
                                <div class="col col-1">
                                     <?php _e( 'Button Border Color:', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">                           
                                    <input type="text" class="catchkathmandu_color_picker" name="catchkathmandu_options[home_headline_button_border]" size="8" value="<?php echo ( isset( $options[ 'home_headline_button_border' ] ) ) ? esc_attr( $options[ 'home_headline_button_border' ] ) : '#404040'; ?>" data-default-color="<?php echo esc_attr( $defaults[ 'home_headline_button_border' ] ); ?>" />
                                </div>
                            </div><!-- .row -->                         
                            <div class="row">
                                <div class="col col-1">
                                    <?php if( $options[ 'reset_home_headline_color' ] == "1" ) { $options[ 'reset_home_headline_color' ] = "0"; } ?>
                                    <?php _e( 'Reset Homepage Headline Color?', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">         
                                    <input type='hidden' value='0' name='catchkathmandu_options[reset_home_headline_color]'>
                                    <input type="checkbox" id="headerlogo" name="catchkathmandu_options[reset_home_headline_color]" value="1" <?php checked( '1', $options['reset_home_headline_color'] ); ?> /> <?php _e('Check to reset', 'catch-kathmandu'); ?>
                                </div>
                            </div><!-- .row -->  
                            <div class="row">
                                <input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save Changes', 'catch-kathmandu' ); ?>" />
                            </div><!-- .row -->                                                                                    
                        </div><!-- .option-content -->                                                                       
                    </div><!-- #color-headlines --> 
                    
                         
                    <div id="individual-color-options" class="option-container">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Site Color Options', 'catch-kathmandu' ); ?></a></h3>
                        <div class="option-content inside">                         
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Custom Background Color:', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">                           
                                    <a class="button" href="<?php echo admin_url('themes.php?page=custom-background'); ?>">
                                        <?php _e( 'Click Here to change Background Color/Image', 'catch-kathmandu' ); ?>
                                    </a>
                                </div>
                            </div><!-- .row -->
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Header Background Color:', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">                           
                                    <input type="text" class="catchkathmandu_color_picker" name="catchkathmandu_options[header_background]" size="8" value="<?php echo ( isset( $options[ 'header_background' ] ) ) ? esc_attr( $options[ 'header_background' ] ) : '#fff'; ?>" data-default-color="<?php echo esc_attr( $defaults[ 'header_background' ] ); ?>" />
                                </div>
                            </div><!-- .row -->                                   
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Content Background Color:', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">                           
                                    <input type="text" class="catchkathmandu_color_picker" name="catchkathmandu_options[content_background]" size="8" value="<?php echo ( isset( $options[ 'content_background' ] ) ) ? esc_attr( $options[ 'content_background' ] ) : '#fff'; ?>" data-default-color="<?php echo esc_attr( $defaults[ 'content_background' ] ); ?>" />
                                </div>
                            </div><!-- .row -->                                   
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Footer Background Sidebar Color: ', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">                           
                                    <input type="text" class="catchkathmandu_color_picker" name="catchkathmandu_options[footer_sidebar_background]" size="8" value="<?php echo ( isset( $options[ 'footer_sidebar_background' ] ) ) ? esc_attr( $options[ 'footer_sidebar_background' ] ) : '#fafafa'; ?>" data-default-color="<?php echo esc_attr( $defaults[ 'footer_sidebar_background' ] ); ?>" />
                                </div>
                            </div><!-- .row -->                                     
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Footer Background Color: ', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">                           
                                    <input type="text" class="catchkathmandu_color_picker" name="catchkathmandu_options[footer_background]" size="8" value="<?php echo ( isset( $options[ 'footer_background' ] ) ) ? esc_attr( $options[ 'footer_background' ] ) : '#3a3d41'; ?>" data-default-color="<?php echo esc_attr( $defaults[ 'footer_background' ] ); ?>" />
                                </div>
                            </div><!-- .row -->                                    
                            <div class="row">
                                <div class="col col-1">
                                     <?php _e( 'Custom Header: ', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">                           
                                    <a class="button" href="<?php echo admin_url('themes.php?page=custom-header'); ?>">
                                        <?php _e( 'Click Here to change Site Title and Tagline Color', 'catch-kathmandu' ); ?>
                                    </a>
                                </div>
                            </div><!-- .row -->      
                            <div class="row">
                                <div class="col col-1">
                                     <?php _e( 'Title Color:', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">                           
                                    <input type="text" class="catchkathmandu_color_picker" name="catchkathmandu_options[title_color]" size="8" value="<?php echo ( isset( $options[ 'title_color' ] ) ) ? esc_attr( $options[ 'title_color' ] ) : '#333'; ?>" data-default-color="<?php echo esc_attr( $defaults[ 'title_color' ] ); ?>" />
                                </div>
                            </div><!-- .row -->  
                            <div class="row">
                                <div class="col col-1">
                                     <?php _e( 'Title Hover Color:', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">                           
                                    <input type="text" class="catchkathmandu_color_picker" name="catchkathmandu_options[title_hover_color]" size="8" value="<?php echo ( isset( $options[ 'title_hover_color' ] ) ) ? esc_attr( $options[ 'title_hover_color' ] ) : '#0088cc'; ?>" data-default-color="<?php echo esc_attr( $defaults[ 'title_hover_color' ] ); ?>" />
                                </div>
                            </div><!-- .row -->                      
                            <div class="row">
                                <div class="col col-1">
                                     <?php _e( 'Meta Description Color:', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">                           
                                    <input type="text" class="catchkathmandu_color_picker" name="catchkathmandu_options[meta_color]" size="8" value="<?php echo ( isset( $options[ 'meta_color' ] ) ) ? esc_attr( $options[ 'meta_color' ] ) : '#757575'; ?>" data-default-color="<?php echo esc_attr( $defaults[ 'meta_color' ] ); ?>" />
                                </div>
                            </div><!-- .row --> 
                            <div class="row">
                                <div class="col col-1">
                                     <?php _e( 'Text Color:', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">                           
                                    <input type="text" class="catchkathmandu_color_picker" name="catchkathmandu_options[text_color]" size="8" value="<?php echo ( isset( $options[ 'text_color' ] ) ) ? esc_attr( $options[ 'text_color' ] ) : '#404040'; ?>" data-default-color="<?php echo esc_attr( $defaults[ 'text_color' ] ); ?>" />
                                </div>
                            </div><!-- .row -->                                              
                            <div class="row">
                                <div class="col col-1">
                                     <?php _e( 'Link Color:', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">                           
                                    <input type="text" class="catchkathmandu_color_picker" name="catchkathmandu_options[link_color]" size="8" value="<?php echo ( isset( $options[ 'link_color' ] ) ) ? esc_attr( $options[ 'link_color' ] ) : '#404040'; ?>" data-default-color="<?php echo esc_attr( $defaults[ 'link_color' ] ); ?>" />
                                </div>
                            </div><!-- .row -->         
                            <div class="row">
                                <div class="col col-1">
                                     <?php _e( 'Sidebar Widget Title Color:', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">                           
                                    <input type="text" class="catchkathmandu_color_picker" name="catchkathmandu_options[widget_title_color]" size="8" value="<?php echo ( isset( $options[ 'widget_title_color' ] ) ) ? esc_attr( $options[ 'widget_title_color' ] ) : '#404040'; ?>" data-default-color="<?php echo esc_attr( $defaults[ 'widget_title_color' ] ); ?>" />
                                </div>
                            </div><!-- .row -->                                    
                            <div class="row">
                                <div class="col col-1">
                                     <?php _e( 'Sidebar Widget Text Color:', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">                           
                                    <input type="text" class="catchkathmandu_color_picker" name="catchkathmandu_options[widget_color]" size="8" value="<?php echo ( isset( $options[ 'widget_color' ] ) ) ? esc_attr( $options[ 'widget_color' ] ) : '#404040'; ?>" data-default-color="<?php echo esc_attr( $defaults[ 'widget_color' ] ); ?>" />
                                </div>
                            </div><!-- .row -->                                     
                            <div class="row">
                                <div class="col col-1">
                                     <?php _e( 'Sidebar Widget Link Color:', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">                           
                                    <input type="text" class="catchkathmandu_color_picker" name="catchkathmandu_options[widget_link_color]" size="8" value="<?php echo ( isset( $options[ 'widget_link_color' ] ) ) ? esc_attr( $options[ 'widget_link_color' ] ) : '#757575'; ?>" data-default-color="<?php echo esc_attr( $defaults[ 'widget_link_color' ] ); ?>" />
                                </div>
                            </div><!-- .row -->                                                     
                            <div class="row">
                                <div class="col col-1">
                                     <?php _e( 'Scroll Up Background Color:', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">                           
                                    <input type="text" class="catchkathmandu_color_picker" name="catchkathmandu_options[scrollup_bg_color]" size="8" value="<?php echo ( isset( $options[ 'scrollup_bg_color' ] ) ) ? esc_attr( $options[ 'scrollup_bg_color' ] ) : '#000'; ?>" data-default-color="<?php echo esc_attr( $defaults[ 'scrollup_bg_color' ] ); ?>" />
                                </div>
                            </div><!-- .row -->                                                                 
                            <div class="row">
                                <div class="col col-1">
                                     <?php _e( 'Scroll Up Text Color:', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">                           
                                    <input type="text" class="catchkathmandu_color_picker" name="catchkathmandu_options[scrollup_text_color]" size="8" value="<?php echo ( isset( $options[ 'scrollup_text_color' ] ) ) ? esc_attr( $options[ 'scrollup_text_color' ] ) : '#fff'; ?>" data-default-color="<?php echo esc_attr( $defaults[ 'scrollup_text_color' ] ); ?>" />
                                </div>
                            </div><!-- .row -->                             
                             
                            <div class="row">
                                <div class="col col-1">
                                    <?php if( $options[ 'reset_color' ] == "1" ) { $options[ 'reset_color' ] = "0"; } ?>
                                    <?php _e( 'Reset Site Color?', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">         
                                    <input type='hidden' value='0' name='catchkathmandu_options[reset_color]'>
                                    <input type="checkbox" id="headerlogo" name="catchkathmandu_options[reset_color]" value="1" <?php checked( '1', $options['reset_color'] ); ?> /> <?php _e('Check to reset', 'catch-kathmandu'); ?>
                                </div>
                            </div><!-- .row -->                                                                    
                            <div class="row">
                                <input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save Changes', 'catch-kathmandu' ); ?>" />
                            </div><!-- .row -->                          
                        </div><!-- .option-content -->
                    </div><!-- .option-container -->
                                 
                     
                </div><!-- #coloroptions -->

                <div id="contentsettings">
                        <div id="homepage-featured-content" class="option-container">
                            <h3 class="option-toggle"><a href="#"><?php _e( 'Featured Content Options', 'catch-kathmandu' ); ?></a></h3>
                            <div class="option-content inside">
                                <div class="row">
                                    <div class="col col-header">
                                        <?php _e( 'Select Content Type', 'catch-kathmandu' ); ?>
                                    </div>
                                    <div class="col col-options">
                                        <?php 
                                        $featured_content_types = array(
                                                                    'featured-content-demo' => __( 'Demo Content', 'catch-kathmandu' ),
                                                                    'featured-content-post' => __( 'Post Content', 'catch-kathmandu' ),
                                                                    'featured-content-page' => __( 'Page Content', 'catch-kathmandu' ),
                                                                    'featured-content-category' => __( 'Category Content', 'catch-kathmandu' ),
                                                                    'featured-content-image' => __( 'Image Content', 'catch-kathmandu' ),
                                                                );
                                        foreach( $featured_content_types as $key => $value ) : ?>
                                            <label title="<?php echo $value; ?>">
                                                <input type="radio" name="catchkathmandu_options[homepage_featured_type]" id="<?php echo $key; ?>" <?php checked($options['homepage_featured_type'], $key ); ?> value="<?php echo $key; ?>"  />
                                                <?php echo $value; ?>
                                            </label>
                                        <?php endforeach; ?>
                                    </div>
                                </div><!-- .row -->
                               
                                <div class="row">
                                    <div class="col col-header">
                                        <?php _e( 'Enable Content', 'catch-kathmandu' ); ?>
                                    </div>
                                    <div class="col col-options">
                                        <label title="<?php _e( 'Homepage', 'catch-kathmandu' ); ?>">
                                            <input type="radio" name="catchkathmandu_options[disable_homepage_featured]" id="homepage" <?php checked($options['disable_homepage_featured'], '0'); ?> value="0"  />
                                            <?php _e( 'Homepage', 'catch-kathmandu' ); ?>
                                        </label>

                                        <label title="<?php _e( 'Entire Site', 'catch-kathmandu' ); ?>">
                                            <input type="radio" name="catchkathmandu_options[disable_homepage_featured]" id="entire-site" <?php checked($options['disable_homepage_featured'], '2'); ?> value="2"  />
                                            <?php _e( 'Entire Site', 'catch-kathmandu' ); ?>
                                        </label>

                                        <label title="<?php _e( 'Disable', 'catch-kathmandu' ); ?>">
                                            <input type="radio" name="catchkathmandu_options[disable_homepage_featured]" id="disabled" <?php checked($options['disable_homepage_featured'], '1'); ?> value="1"  />
                                            <?php _e( 'Disable', 'catch-kathmandu' ); ?>
                                        </label>
                                    </div>
                                </div><!-- .row -->

                                <div class="row">
                                    <div class="col col-1">
                                        <?php _e( 'Headline', 'catch-kathmandu' ); ?>
                                    </div>
                                    <div class="col col-2">
                                        <input type="text" size="65" name="catchkathmandu_options[homepage_featured_headline]" value="<?php echo esc_attr( $options[ 'homepage_featured_headline' ] ); ?>" /> <?php _e( 'Leave empty if you want to remove headline', 'catch-kathmandu' ); ?>
                                    </div>
                                </div><!-- .row -->
                                
                                <div class="row">
                                    <div class="col col-1">
                                        <?php _e( 'Number of Featured Content', 'catch-kathmandu' ); ?>
                                    </div>
                                    <div class="col col-2">
                                        <input type="text" size="2" name="catchkathmandu_options[homepage_featured_qty]" value="<?php echo intval( $options[ 'homepage_featured_qty' ] ); ?>" size="2" />
                                    </div>
                                </div><!-- .row -->
                                
                                <div class="row">                            
                                    <div class="col col-header">
                                        <?php _e( 'Featured Content Layout', 'catch-kathmandu' ); ?>
                                    </div>
                                    <div class="col col-options">  
                                        <label title="three-columns" class="box first">
                                        <input type="radio" name="catchkathmandu_options[homepage_featured_layout]" id="three-columns" <?php checked($options['homepage_featured_layout'], 'three-columns'); ?> value="three-columns"  />
                                        <?php _e( '3 Columns', 'catch-kathmandu' ); ?>
                                        </label>
                                        
                                        <label title="four-columns" class="box">
                                        <input type="radio" name="catchkathmandu_options[homepage_featured_layout]" id="four-columns" <?php checked($options['homepage_featured_layout'], 'four-columns'); ?> value="four-columns"  />
                                        <?php _e( '4 Columns', 'catch-kathmandu' ); ?>
                                        </label>                            
                                    
                                    </div>
                                </div><!-- .row -->

                                <div class="row">
                                    <input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save Changes', 'catch-kathmandu' ); ?>" />
                                </div><!-- .row -->
                            </div><!-- .option-content -->
                        </div><!-- .option-container -->
                        <div class="option-container post-content">
                            <h3 class="option-toggle"><a href="#"><?php _e( 'Featured Post Content Options', 'catch-kathmandu' ); ?></a></h3>
                            <div class="option-content inside">
                                <?php for ( $i = 1; $i <= $options[ 'homepage_featured_qty' ]; $i++ ): ?> 
                                    <div class="row"> 
                                        <div class="col col-1">
                                            <?php printf( esc_attr__( 'Featured Post Content #%s', 'catch-kathmandu' ), $i ); ?>
                                        </div>
                                        <div class="col col-2">
                                            <input type="text" name="catchkathmandu_options[featured_content_post][<?php echo absint( $i ); ?>]" value="<?php if( array_key_exists( 'featured_content_post', $options ) && array_key_exists( $i, $options[ 'featured_content_post' ] ) ) echo absint( $options[ 'featured_content_post' ][ $i ] ); ?>" />
                                        <?php if( isset( $options[ 'featured_content_post' ][ $i ] ) && $options[ 'featured_content_post' ][ $i ] > 0 ) : ?>
                                                <a href="<?php bloginfo ( 'url' );?>/wp-admin/post.php?post=<?php if( array_key_exists ( 'featured_content_post', $options ) && array_key_exists ( $i, $options[ 'featured_content_post' ] ) ) echo absint( $options[ 'featured_content_post' ][ $i ] ); ?>&action=edit" class="button" title="<?php esc_attr_e('Click Here To Edit'); ?>" target="_blank"><?php _e( 'Click Here To Edit', 'catch-kathmandu' ); ?></a>
                                            <?php endif; ?>
                                        </div>
                                    </div><!-- .row -->
                                    <?php endfor; ?>
                                
                                <div class="row">
                                    <input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save Changes', 'catch-kathmandu' ); ?>" />
                                </div><!-- .row -->
                            </div><!-- .option-content -->
                        </div><!-- .option-container -->

                        <div class="option-container page-content">
                            <h3 class="option-toggle"><a href="#"><?php _e( 'Featured Page Content Options', 'catch-kathmandu' ); ?></a></h3>
                            <div class="option-content inside">
                               <?php for ( $i = 1; $i <= $options[ 'homepage_featured_qty' ]; $i++ ): ?> 
                                    <div class="row">
                                            <div class="col col-1">
                                                <?php printf( esc_attr__( 'Featured Page Content #%s', 'catch-kathmandu' ), $i ); ?>
                                            </div>
                                            <div class="col col-2">
                                                 <?php
                                                    $catchkathmandu_name = 'catchkathmandu_options[featured_content_page][' . absint( $i ) . ']'; 
                                                    $catchkathmandu_args = array(
                                                                    'depth'             => 0,
                                                                    'child_of'          => 0,
                                                                    'selected'          => ( isset( $options[ 'featured_content_page' ][ $i ] ) && $options[ 'featured_content_page' ][ $i ] > 0 ) ? $options[ 'featured_content_page' ][ $i ] : '',
                                                                    'echo'              => 1,
                                                                    'name'              => $catchkathmandu_name,
                                                                    'id'                => $catchkathmandu_name,
                                                                    'show_option_none' => '--Select One--',
                                                                );
                                                   wp_dropdown_pages( $catchkathmandu_args ); 
                                                ?>
                                                <?php if( isset( $options[ 'featured_content_page' ][ $i ] ) && $options[ 'featured_content_page' ][ $i ] > 0 ) : ?>
                                                    <a href="<?php bloginfo ( 'url' );?>/wp-admin/post.php?post=<?php if( array_key_exists ( 'featured_content_page', $options ) && array_key_exists ( $i, $options[ 'featured_content_page' ] ) ) echo absint( $options[ 'featured_content_page' ][ $i ] ); ?>&action=edit" class="button" title="<?php esc_attr_e('Click Here To Edit'); ?>" target="_blank"><?php _e( 'Click Here To Edit', 'catch-kathmandu' ); ?></a>
                                                <?php endif; ?>
                                            </div>
                                        </div><!-- .row -->
                                <?php endfor; ?>
                                
                                <div class="row">
                                    <input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save Changes', 'catch-kathmandu' ); ?>" />
                                </div><!-- .row -->
                            </div><!-- .option-content -->
                        </div><!-- .option-container -->
                            
                        <div class="option-container category-content">
                            <h3 class="option-toggle"><a href="#"><?php _e( 'Featured Category Content Options', 'catch-kathmandu' ); ?></a></h3>
                            <div class="option-content inside">
                                <div class="row">
                                    <div class="col col-1 featured-content-category">
                                        <?php _e( 'Select Featured Content Categories', 'catch-kathmandu' ); ?>
                                        <p><small><?php _e( 'Use this only is you want to display posts from Specific Categories in Featured Content', 'catch-kathmandu' ); ?></small></p>
                                    </div>
                                    <div class="col col-2 featured-content-category"> 
                                        <select name="catchkathmandu_options[featured_content_category][]" id="frontpage_posts_cats" multiple="multiple" class="select-multiple">
                                            <option value="0" <?php if ( empty( $options['featured_content_category'] ) ) { selected( true, true ); } ?>><?php _e( '--Disabled--', 'catch-kathmandu' ); ?></option>
                                            <?php /* Get the list of categories */ 
                                                if( empty( $options[ 'featured_content_category' ] ) ) {
                                                    $options[ 'featured_content_category' ] = array();
                                                }
                                                $categories = get_categories();
                                                foreach ( $categories as $category) :
                                            ?>
                                            <option value="<?php echo $category->cat_ID; ?>" <?php if ( in_array( $category->cat_ID, $options['featured_content_category'] ) ) {echo 'selected="selected"';}?>><?php echo $category->cat_name; ?></option>
                                            <?php endforeach; ?>
                                        </select><br />
                                        <span class="description"><?php _e( 'You may select multiple categories by holding down the CTRL key.', 'catch-kathmandu' ); ?></span>
                                    </div>
                                </div><!-- .row -->

                                <div class="row">
                                    <input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save Changes', 'catch-kathmandu' ); ?>" />
                                </div><!-- .row -->
                            </div><!-- .option-content -->
                        </div><!-- .option-container -->

                        <div class="option-container image-content">
                            <h3 class="option-toggle"><a href="#"><?php _e( 'Featured Image Content Options', 'catch-kathmandu' ); ?></a></h3>
                            <div class="option-content inside">
                                <?php for ( $i = 1; $i <= $options[ 'homepage_featured_qty' ]; $i++ ): ?>
                                    <div class="repeat-content-wrap featured-content-image">
                                        <h2 class="title"><?php printf( esc_attr__( 'Featured Image Content #%s', 'catch-kathmandu' ), $i ); ?></h2>
                                        <div class="row">
                                            <div class="col col-1">
                                                <?php _e( 'Image', 'catch-kathmandu' ); ?>
                                            </div>
                                            <div class="col col-2">
                                                <input class="upload-url" size="70" type="text" name="catchkathmandu_options[homepage_featured_image][<?php echo $i; ?>]" value="<?php if( array_key_exists( 'homepage_featured_image', $options ) && array_key_exists( $i, $options[ 'homepage_featured_image' ] ) ) echo esc_url( $options[ 'homepage_featured_image' ][ $i ] ); ?>" />
                                                <input ref="<?php printf( esc_attr__( 'Insert as Featured Content Image #%s', 'catch-kathmandu' ), $i ); ?>"  class="catchkathmandu_upload_image button" name="wsl-image-add" type="button" value="<?php if( array_key_exists( 'homepage_featured_image', $options ) && array_key_exists( $i, $options[ 'homepage_featured_image' ] ) ) { esc_attr_e( 'Change Image','catch-kathmandu' ); } else { esc_attr_e( 'Add Image','catch-kathmandu' ); } ?>" />
                                            </div>
                                        </div><!-- .row -->
                                        <div class="row">
                                            <div class="col col-1">
                                                <?php _e( 'Link URL', 'catch-kathmandu' ); ?>
                                            </div>
                                            <div class="col col-2">
                                                <input type="text" size="70" name="catchkathmandu_options[homepage_featured_url][<?php echo absint( $i ); ?>]" value="<?php if( array_key_exists( 'homepage_featured_url', $options ) && array_key_exists( $i, $options[ 'homepage_featured_url' ] ) ) echo esc_url( $options[ 'homepage_featured_url' ][ $i ] ); ?>" /> <?php _e( 'Add in the Target URL for the content', 'catch-kathmandu' ); ?>
                                            </div>
                                        </div><!-- .row -->                                   
                                        <div class="row">
                                            <div class="col col-1">
                                                <?php _e( 'Target. Open Link in New Window?', 'catch-kathmandu' ); ?>
                                            </div>
                                            <div class="col col-2">
                                                <input type='hidden' value='0' name='catchkathmandu_options[homepage_featured_base][<?php echo absint( $i ); ?>]'>
                                                <input type="checkbox" name="catchkathmandu_options[homepage_featured_base][<?php echo absint( $i ); ?>]" value="1" <?php if( array_key_exists( 'homepage_featured_base', $options ) && array_key_exists( $i, $options[ 'homepage_featured_base' ] ) ) checked( '1', $options[ 'homepage_featured_base' ][ $i ] ); ?> /> <?php _e( 'Check to open in new window', 'catch-kathmandu' ); ?>
                                            </div>
                                        </div><!-- .row -->                
                                        <div class="row">
                                            <div class="col col-1">
                                                <?php _e( 'Title', 'catch-kathmandu' ); ?>
                                            </div>
                                            <div class="col col-2">
                                                <input type="text" size="70" name="catchkathmandu_options[homepage_featured_title][<?php echo absint( $i ); ?>]" value="<?php if( array_key_exists( 'homepage_featured_title', $options ) && array_key_exists( $i, $options[ 'homepage_featured_title' ] ) ) echo esc_attr( $options[ 'homepage_featured_title' ][ $i ] ); ?>" /> <?php _e( 'Leave empty if you want to remove title', 'catch-kathmandu' ); ?>
                                            </div>
                                        </div><!-- .row -->                                  
                                        <div class="row">
                                            <div class="col col-1">
                                                <?php _e( 'Content', 'catch-kathmandu' ); ?>
                                                 <p><small><?php _e( 'The appropriate length for Content is around 10 words.', 'catch-kathmandu' ); ?></small></p>
                                            </div>
                                            <div class="col col-2">
                                                <textarea class="textarea input-bg" name="catchkathmandu_options[homepage_featured_content][<?php echo absint( $i ); ?>]" cols="70" rows="3"><?php if( array_key_exists( 'homepage_featured_content', $options ) && array_key_exists( $i, $options[ 'homepage_featured_content' ] ) ) echo esc_html( $options[ 'homepage_featured_content' ][ $i ] ); ?></textarea>
                                            </div>
                                        </div><!-- .row --> 
                                    </div><!-- .repeat-content-wrap -->
                                <?php endfor; ?>
                                
                                <div class="row">
                                    <input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save Changes', 'catch-kathmandu' ); ?>" />
                                </div><!-- .row -->
                            </div><!-- .option-content -->
                        </div><!-- .option-container -->                                     
                </div><!-- #contentsettings -->

                <!-- Options for Slider Settings -->
                <div id="slidersettings">
                    <div class="option-container">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Slider Options', 'catch-kathmandu' ); ?></a></h3>
                        <div class="option-content inside">
                            <div class="row">                            
                                <div class="col col-header">
                                    <?php _e( 'Select Slider Type', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-options">
                                    <label title="demo-slider">
                                    <input type="radio" name="catchkathmandu_options[select_slider_type]" id="demo-slider" <?php checked($options['select_slider_type'], 'demo-slider'); ?> value="demo-slider"  />
                                    <?php _e( 'Demo Slider', 'catch-kathmandu' ); ?>
                                    </label>

                                    <label title="post-slider">
                                    <input type="radio" name="catchkathmandu_options[select_slider_type]" id="post-slider" <?php checked($options['select_slider_type'], 'post-slider'); ?> value="post-slider"  />
                                    <?php _e( 'Post Slider', 'catch-kathmandu' ); ?>
                                    </label>
                                    
                                    <label title="page-slider">
                                    <input type="radio" name="catchkathmandu_options[select_slider_type]" id="page-slider" <?php checked($options['select_slider_type'], 'page-slider'); ?> value="page-slider"  />
                                    <?php _e( 'Page Slider', 'catch-kathmandu' ); ?>
                                    </label>
                                    
                                    <label title="category-slider">
                                    <input type="radio" name="catchkathmandu_options[select_slider_type]" id="category-slider" <?php checked($options['select_slider_type'], 'category-slider'); ?> value="category-slider"  />
                                    <?php _e( 'Category Slider', 'catch-kathmandu' ); ?>
                                    </label>
                                    
                                    <label title="image-slider">
                                    <input type="radio" name="catchkathmandu_options[select_slider_type]" id="image-slider" <?php checked($options['select_slider_type'], 'image-slider'); ?> value="image-slider"  />
                                    <?php _e( 'Image Slider', 'catch-kathmandu' ); ?>
                                    </label>
                                </div>
                            </div><!-- .row -->
                            <div class="row">                            
                                <div class="col col-header">
                                    <?php _e( 'Enable Slider', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-options">                          
                                    <label title="enable-slider-homepager">
                                    <input type="radio" name="catchkathmandu_options[enable_slider]" id="enable-slider-homepage" <?php checked($options['enable_slider'], 'enable-slider-homepage'); ?> value="enable-slider-homepage"  />
                                    <?php _e( 'Homepage', 'catch-kathmandu' ); ?>
                                    </label>
                                    <label title="enable-slider-allpage">
                                    <input type="radio" name="catchkathmandu_options[enable_slider]" id="enable-slider-allpage" <?php checked($options['enable_slider'], 'enable-slider-allpage'); ?> value="enable-slider-allpage"  />
                                     <?php _e( 'Entire Site', 'catch-kathmandu' ); ?>
                                    </label>
                                    <label title="disable-slider">
                                    <input type="radio" name="catchkathmandu_options[enable_slider]" id="disable-slider" <?php checked($options['enable_slider'], 'disable-slider'); ?> value="disable-slider"  />
                                     <?php _e( 'Disable', 'catch-kathmandu' ); ?>
                                    </label>                                
                                </div>
                            </div><!-- .row -->
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Number of Slides', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                    <input type="text" name="catchkathmandu_options[slider_qty]" value="<?php echo intval( $options[ 'slider_qty' ] ); ?>" size="2" />
                                </div>
                            </div><!-- .row -->                            
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Transition Effect:', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                    <select id="catchkathmandu_cycle_style" name="catchkathmandu_options[transition_effect]">
                                        <option value="fade" <?php selected('fade', $options['transition_effect']); ?>><?php _e( 'fade', 'catch-kathmandu' ); ?></option>
                                        <option value="wipe" <?php selected('wipe', $options['transition_effect']); ?>><?php _e( 'wipe', 'catch-kathmandu' ); ?></option>
                                        <option value="scrollUp" <?php selected('scrollUp', $options['transition_effect']); ?>><?php _e( 'scrollUp', 'catch-kathmandu' ); ?></option>
                                        <option value="scrollDown" <?php selected('scrollDown', $options['transition_effect']); ?>><?php _e( 'scrollDown', 'catch-kathmandu' ); ?></option>
                                        <option value="scrollLeft" <?php selected('scrollLeft', $options['transition_effect']); ?>><?php _e( 'scrollLeft', 'catch-kathmandu' ); ?></option>
                                        <option value="scrollRight" <?php selected('scrollRight', $options['transition_effect']); ?>><?php _e( 'scrollRight', 'catch-kathmandu' ); ?></option>
                                        <option value="blindX" <?php selected('blindX', $options['transition_effect']); ?>><?php _e( 'blindX', 'catch-kathmandu' ); ?></option>
                                        <option value="blindY" <?php selected('blindY', $options['transition_effect']); ?>><?php _e( 'blindY', 'catch-kathmandu' ); ?></option>
                                        <option value="blindZ" <?php selected('blindZ', $options['transition_effect']); ?>><?php _e( 'blindZ', 'catch-kathmandu' ); ?></option>
                                        <option value="cover" <?php selected('cover', $options['transition_effect']); ?>><?php _e( 'cover', 'catch-kathmandu' ); ?></option>
                                        <option value="shuffle" <?php selected('shuffle', $options['transition_effect']); ?>><?php _e( 'shuffle', 'catch-kathmandu' ); ?></option>
                                    </select>
                                </div>
                            </div><!-- .row -->
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Transition Delay', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                    <input type="text" name="catchkathmandu_options[transition_delay]" value="<?php echo $options[ 'transition_delay' ]; ?>" size="2" />
                                    <span class="description"><?php _e( 'second(s)', 'catch-kathmandu' ); ?></span>
                                </div>
                            </div><!-- .row -->  
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Transition Length', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                    <input type="text" name="catchkathmandu_options[transition_duration]" value="<?php echo $options[ 'transition_duration' ]; ?>" size="2" />
                                    <span class="description"><?php _e( 'second(s)', 'catch-kathmandu' ); ?></span>
                                </div>
                            </div><!-- .row -->                                 
                            <div class="row">
                                <input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save Changes', 'catch-kathmandu' ); ?>" />
                            </div><!-- .row --> 
                        </div><!-- .option-content -->
                    </div><!-- .option-container --> 
              
            
                    <div id="featured-post-slider" class="option-container post-slider">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Featured Post Slider Options', 'catch-kathmandu' ); ?></a></h3>
                        <div class="option-content inside">
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Exclude Slider post from Homepage posts?', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                    <input type='hidden' value='0' name='catchkathmandu_options[exclude_slider_post]'>
                                    <input type="checkbox" id="headerlogo" name="catchkathmandu_options[exclude_slider_post]" value="1" <?php checked( '1', $options['exclude_slider_post'] ); ?> /> <?php _e('Check to exclude', 'catch-kathmandu'); ?>
                                </div>
                            </div><!-- .row --> 
                            <?php for ( $i = 1; $i <= $options[ 'slider_qty' ]; $i++ ): ?>
                                <div class="repeat-content-wrap">
                                    <div class="row">
                                        <div class="col col-1">
                                            <?php printf( esc_attr__( 'Featured Post Slider #%s', 'catch-kathmandu' ), $i ); ?>
                                        </div>
                                        <div class="col col-2">
                                            <input type="text" name="catchkathmandu_options[featured_slider][<?php echo absint( $i ); ?>]" value="<?php if( array_key_exists( 'featured_slider', $options ) && array_key_exists( $i, $options[ 'featured_slider' ] ) ) echo absint( $options[ 'featured_slider' ][ $i ] ); ?>" />
                                        <?php if( isset( $options[ 'featured_slider' ][ $i ] ) && $options[ 'featured_slider' ][ $i ] > 0 ) : ?>
                                            <a href="<?php bloginfo ( 'url' );?>/wp-admin/post.php?post=<?php if( array_key_exists ( 'featured_slider', $options ) && array_key_exists ( $i, $options[ 'featured_slider' ] ) ) echo absint( $options[ 'featured_slider' ][ $i ] ); ?>&action=edit" class="button" title="<?php esc_attr_e('Click Here To Edit'); ?>" target="_blank"><?php _e( 'Click Here To Edit', 'catch-kathmandu' ); ?></a>
                                        <?php endif; ?>
                                        </div>
                                    </div><!-- .row -->
                                </div><!-- .repeat-content-wrap -->  
                            <?php endfor; ?>
                            <div class="row">
                                <p><?php _e( 'Note: Here You can put your Post IDs which displays on Homepage as slider.', 'catch-kathmandu' ); ?>
                            </div><!-- .row --> 
                            <div class="row">
                                <input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save Changes', 'catch-kathmandu' ); ?>" />
                            </div><!-- .row -->      
                        </div><!-- .option-content -->
                    </div><!-- .option-container --> 
                    
                    <div id="featured-page-slider" class="option-container page-slider">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Featured Page Slider Options', 'catch-kathmandu' ); ?></a></h3>
                        <div class="option-content inside">
                            <?php for ( $i = 1; $i <= $options[ 'slider_qty' ]; $i++ ): ?>
                                <div class="repeat-content-wrap">
                                    <div class="row">
                                        <div class="col col-1">
                                            <?php printf( esc_attr__( 'Featured Page Slider #%s', 'catch-kathmandu' ), $i ); ?>
                                        </div>
                                        <div class="col col-2">
                                             <?php
                                                $catchkathmandu_name = 'catchkathmandu_options[featured_slider_page][' . absint( $i ) . ']'; 
                                                $catchkathmandu_args = array(
                                                                'depth'             => 0,
                                                                'child_of'          => 0,
                                                                'selected'          => ( isset( $options[ 'featured_slider_page' ][ $i ] ) && $options[ 'featured_slider_page' ][ $i ] > 0 ) ? $options[ 'featured_slider_page' ][ $i ] : '',
                                                                'echo'              => 1,
                                                                'name'              => $catchkathmandu_name,
                                                                'id'                => $catchkathmandu_name,
                                                                'show_option_none' => '--Select One--',
                                                            );
                                               wp_dropdown_pages( $catchkathmandu_args ); 
                                            ?>
                                            <?php if( isset( $options[ 'featured_slider_page' ][ $i ] ) && $options[ 'featured_slider_page' ][ $i ] > 0 ) : ?>
                                                <a href="<?php bloginfo ( 'url' );?>/wp-admin/post.php?post=<?php if( array_key_exists ( 'featured_slider_page', $options ) && array_key_exists ( $i, $options[ 'featured_slider_page' ] ) ) echo absint( $options[ 'featured_slider_page' ][ $i ] ); ?>&action=edit" class="button" title="<?php esc_attr_e('Click Here To Edit'); ?>" target="_blank"><?php _e( 'Click Here To Edit', 'catch-kathmandu' ); ?></a>
                                            <?php endif; ?>
                                        </div>
                                    </div><!-- .row -->
                                </div><!-- .repeat-content-wrap -->  
                            <?php endfor; ?>
                            <div class="row">
                                <?php _e( 'Note: Here You can put your Page IDs which displays on Homepage as slider.', 'catch-kathmandu' ); ?>
                            </div><!-- .row --> 
                            <div class="row">
                                <input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save Changes', 'catch-kathmandu' ); ?>" />
                            </div><!-- .row -->       
                        </div><!-- .option-content -->
                    </div><!-- .option-container -->   
                    
                    <div id="featured-category-slider" class="option-container category-slider">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Featured Category Slider Options', 'catch-kathmandu' ); ?></a></h3>
                        <div class="option-content inside">
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Select Slider Categories', 'catch-kathmandu' ); ?>
                                    <p><small><?php _e( 'Use this only is you want to display posts from Specific Categories in Featured Slider', 'catch-kathmandu' ); ?></small></p>
                                </div>
                                <div class="col col-2"> 
                                    <select name="catchkathmandu_options[slider_category][]" id="frontpage_posts_cats" multiple="multiple" class="select-multiple">
                                        <option value="0" <?php if ( empty( $options['slider_category'] ) ) { selected( true, true ); } ?>><?php _e( '--Disabled--', 'catch-kathmandu' ); ?></option>
                                        <?php /* Get the list of categories */ 
                                            if( empty( $options[ 'slider_category' ] ) ) {
                                                $options[ 'slider_category' ] = array();
                                            }
                                            $categories = get_categories();
                                            foreach ( $categories as $category) :
                                        ?>
                                        <option value="<?php echo $category->cat_ID; ?>" <?php if ( in_array( $category->cat_ID, $options['slider_category'] ) ) {echo 'selected="selected"';}?>><?php echo $category->cat_name; ?></option>
                                        <?php endforeach; ?>
                                    </select><br />
                                    <span class="description"><?php _e( 'You may select multiple categories by holding down the CTRL key.', 'catch-kathmandu' ); ?></span>
                                </div>
                            </div><!-- .row --> 
                            <div class="row">
                                <?php _e( 'Note: Here you can select the categories from which latest posts will display on Featured Slider.', 'catch-kathmandu' ); ?>
                            </div><!-- .row --> 
                            <div class="row">
                                <input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save Changes', 'catch-kathmandu' ); ?>" />
                            </div><!-- .row -->    
                        </div><!-- .option-content -->
                    </div><!-- .option-container -->                       
                    
                    <div id="featured-image-slider" class="option-container image-slider">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Featured Image Slider Options', 'catch-kathmandu' ); ?></a></h3>
                        <div class="option-content inside">
                             <?php for ( $i = 1; $i <= $options[ 'slider_qty' ]; $i++ ): ?>
                                <div class="repeat-content-wrap">
                                    <h2 class="title"><?php printf( esc_attr__( 'Featured Image Slider #%s', 'catch-kathmandu' ), $i ); ?></h2>
                                    <div class="row">
                                        <div class="col col-1">
                                            <?php _e( 'Image', 'catch-kathmandu' ); ?>
                                        </div>
                                        <div class="col col-2">
                                            <input size="70" type="text" class="upload-url" name="catchkathmandu_options[featured_image_slider_image][<?php echo $i; ?>]" value="<?php if( array_key_exists( 'featured_image_slider_image', $options ) && array_key_exists( $i, $options[ 'featured_image_slider_image' ] ) ) echo esc_url( $options[ 'featured_image_slider_image' ][ $i ] ); ?>" />
                                            <input  ref="<?php printf( esc_attr__( 'Insert as Featured Image Slider #%s', 'catch-kathmandu' ), $i ); ?>"  class="catchkathmandu_upload_image button" name="upload_button" type="button" value="<?php esc_attr_e( 'Upload','catch-kathmandu' ); ?>" />
                                        </div>
                                    </div><!-- .row -->
                                    <div class="row">
                                        <div class="col col-1">
                                            <?php _e( 'Link URL', 'catch-kathmandu' ); ?>
                                        </div>
                                        <div class="col col-2">
                                            <input size="70" type="text" name="catchkathmandu_options[featured_image_slider_link][<?php echo absint( $i ); ?>]" value="<?php if( array_key_exists( 'featured_image_slider_link', $options ) && array_key_exists( $i, $options[ 'featured_image_slider_link' ] ) ) echo esc_url( $options[ 'featured_image_slider_link' ][ $i ] ); ?>" />
                                        </div>
                                    </div><!-- .row -->  
                                    <div class="row">
                                        <div class="col col-1">
                                            <?php _e( 'Target. Open Link in New Window?', 'catch-kathmandu' ); ?>
                                        </div>
                                        <div class="col col-2">
                                            <input type='hidden' value='0' name='catchkathmandu_options[featured_image_slider_base][<?php echo absint( $i ); ?>]'>
                                            <input type="checkbox" name="catchkathmandu_options[featured_image_slider_base][<?php echo absint( $i ); ?>]" value="1" <?php if( array_key_exists( 'featured_image_slider_base', $options ) && array_key_exists( $i, $options[ 'featured_image_slider_base' ] ) ) checked( '1', $options[ 'featured_image_slider_base' ][ $i ] ); ?> /> <?php _e( 'Check to open in new window', 'catch-kathmandu' ); ?>
                                        </div>
                                    </div><!-- .row -->
                                    <div class="row">
                                        <div class="col col-1">
                                            <?php _e( 'Title', 'catch-kathmandu' ); ?>
                                        </div>
                                        <div class="col col-2">
                                            <input size="70" type="text" name="catchkathmandu_options[featured_image_slider_title][<?php echo absint( $i ); ?>]" value="<?php if( array_key_exists( 'featured_image_slider_title', $options ) && array_key_exists( $i, $options[ 'featured_image_slider_title' ] ) ) echo esc_attr( $options[ 'featured_image_slider_title' ][ $i ] ); ?>" />
                                        </div>
                                    </div><!-- .row --> 
                                    <div class="row">
                                        <div class="col col-1">
                                            <?php _e( 'Content', 'catch-kathmandu' ); ?>
                                        </div>
                                        <div class="col col-2">
                                            <textarea name="catchkathmandu_options[featured_image_slider_content][<?php echo absint( $i ); ?>]" cols="70" rows="3"><?php if( array_key_exists( 'featured_image_slider_content', $options ) && array_key_exists( $i, $options[ 'featured_image_slider_content' ] ) ) echo esc_html( $options[ 'featured_image_slider_content' ][ $i ] ); ?></textarea>
                                        </div>
                                    </div><!-- .row -->                                                                                                             
                                </div><!-- .repeat-content-wrap -->  
                            <?php endfor; ?>
                            <div class="row">
                                <input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save Changes', 'catch-kathmandu' ); ?>" />
                            </div><!-- .row -->
                        </div><!-- .option-content -->
                    </div><!-- .option-container --> 
                                   
                </div><!-- #slidersettings -->
                
  
                <!-- Options for Social Links -->
                <div id="sociallinks">
                    <div class="option-container">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Predefined Social Icons', 'catch-kathmandu' ); ?></a></h3>
                        <div class="option-content inside">
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Facebook', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                    <input type="text" size="45" name="catchkathmandu_options[social_facebook]" value="<?php echo esc_url( $options[ 'social_facebook' ] ); ?>" />
                                </div>
                            </div><!-- .row --> 
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Twitter', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                    <input type="text" size="45" name="catchkathmandu_options[social_twitter]" value="<?php echo esc_url( $options[ 'social_twitter'] ); ?>" />
                                </div>
                            </div><!-- .row -->                                                    
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Google+', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                    <input type="text" size="45" name="catchkathmandu_options[social_googleplus]" value="<?php echo esc_url( $options[ 'social_googleplus'] ); ?>" />
                                </div>
                            </div><!-- .row -->  
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Pinterest', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                    <input type="text" size="45" name="catchkathmandu_options[social_pinterest]" value="<?php echo esc_url( $options[ 'social_pinterest'] ); ?>" />
                                </div>
                            </div><!-- .row --> 
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Youtube', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                    <input type="text" size="45" name="catchkathmandu_options[social_youtube]" value="<?php echo esc_url( $options[ 'social_youtube' ] ); ?>" />
                                </div>
                            </div><!-- .row --> 
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Vimeo', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                    <input type="text" size="45" name="catchkathmandu_options[social_vimeo]" value="<?php echo esc_url( $options[ 'social_vimeo' ] ); ?>" />
                                </div>
                            </div><!-- .row -->                                                                                    
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Linkedin', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                    <input type="text" size="45" name="catchkathmandu_options[social_linkedin]" value="<?php echo esc_url( $options[ 'social_linkedin'] ); ?>" />
                                </div>
                            </div><!-- .row --> 
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Slideshare', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                    <input type="text" size="45" name="catchkathmandu_options[social_slideshare]" value="<?php echo esc_url( $options[ 'social_slideshare'] ); ?>" />
                                </div>
                            </div><!-- .row -->                            
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Foursquare', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                    <input type="text" size="45" name="catchkathmandu_options[social_foursquare]" value="<?php echo esc_url( $options[ 'social_foursquare' ] ); ?>" />
                                </div>
                            </div><!-- .row --> 
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Flickr', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                    <input type="text" size="45" name="catchkathmandu_options[social_flickr]" value="<?php echo esc_url( $options[ 'social_flickr' ] ); ?>" />
                                </div>
                            </div><!-- .row -->                                   
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Tumblr', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                    <input type="text" size="45" name="catchkathmandu_options[social_tumblr]" value="<?php echo esc_url( $options[ 'social_tumblr' ] ); ?>" />
                                </div>
                            </div><!-- .row --> 
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'deviantART', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                    <input type="text" size="45" name="catchkathmandu_options[social_deviantart]" value="<?php echo esc_url( $options[ 'social_deviantart' ] ); ?>" />
                                </div>
                            </div><!-- .row -->                                                                  
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Dribbble', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                    <input type="text" size="45" name="catchkathmandu_options[social_dribbble]" value="<?php echo esc_url( $options[ 'social_dribbble' ] ); ?>" />
                                </div>
                            </div><!-- .row --> 
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'MySpace', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                    <input type="text" size="45" name="catchkathmandu_options[social_myspace]" value="<?php echo esc_url( $options[ 'social_myspace' ] ); ?>" />
                                </div>
                            </div><!-- .row -->                                                             
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'WordPress', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                    <input type="text" size="45" name="catchkathmandu_options[social_wordpress]" value="<?php echo esc_url( $options[ 'social_wordpress' ] ); ?>" />
                                </div>
                            </div><!-- .row --> 
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'RSS', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                    <input type="text" size="45" name="catchkathmandu_options[social_rss]" value="<?php echo esc_url( $options[ 'social_rss' ] ); ?>" />
                                </div>
                            </div><!-- .row -->                                                     
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Delicious', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                    <input type="text" size="45" name="catchkathmandu_options[social_delicious]" value="<?php echo esc_url( $options[ 'social_delicious' ] ); ?>" />
                                </div>
                            </div><!-- .row --> 
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Last.fm', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                    <input type="text" size="45" name="catchkathmandu_options[social_lastfm]" value="<?php echo esc_url( $options[ 'social_lastfm' ] ); ?>" />
                                </div>
                            </div><!-- .row -->                                                                 
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Instagram', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                    <input type="text" size="45" name="catchkathmandu_options[social_instagram]" value="<?php echo esc_url( $options[ 'social_instagram' ] ); ?>" />
                                </div>
                            </div><!-- .row --> 
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'GitHub', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                    <input type="text" size="45" name="catchkathmandu_options[social_github]" value="<?php echo esc_url( $options[ 'social_github' ] ); ?>" />
                                </div>
                            </div><!-- .row -->                                    
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Vkontakte', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                    <input type="text" size="45" name="catchkathmandu_options[social_vkontakte]" value="<?php echo esc_url( $options[ 'social_vkontakte'] ); ?>" />
                                </div>
                            </div><!-- .row --> 
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'My World', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                    <input type="text" size="45" name="catchkathmandu_options[social_myworld]" value="<?php echo esc_url( $options[ 'social_myworld' ] ); ?>" />
                                </div>
                            </div><!-- .row -->                            
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Odnoklassniki', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                    <input type="text" size="45" name="catchkathmandu_options[social_odnoklassniki]" value="<?php echo esc_url( $options[ 'social_odnoklassniki' ] ); ?>" />
                                </div>
                            </div><!-- .row --> 
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Goodreads', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                    <input type="text" size="45" name="catchkathmandu_options[social_goodreads]" value="<?php echo esc_url( $options[ 'social_goodreads' ] ); ?>" />
                                </div>
                            </div><!-- .row -->
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Skype', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                    <input type="text" size="45" name="catchkathmandu_options[social_skype]" value="<?php echo esc_attr( $options[ 'social_skype' ] ); ?>" />
                                </div>
                            </div><!-- .row --> 
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Soundcloud', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                    <input type="text" size="45" name="catchkathmandu_options[social_soundcloud]" value="<?php echo esc_url( $options[ 'social_soundcloud' ] ); ?>" />
                                </div>
                            </div><!-- .row -->
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Email', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                    <input type="text" size="45" name="catchkathmandu_options[social_email]" value="<?php echo sanitize_email( $options[ 'social_email' ] ); ?>" />
                                </div>
                            </div><!-- .row --> 
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Contact', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                    <input type="text" size="45" name="catchkathmandu_options[social_contact]" value="<?php echo esc_url( $options[ 'social_contact' ] ); ?>" />
                                </div>
                            </div><!-- .row -->
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Xing', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                    <input type="text" size="45" name="catchkathmandu_options[social_xing]" value="<?php echo esc_url( $options[ 'social_xing' ] ); ?>" />
                                </div>
                            </div><!-- .row --> 
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Meetup', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                    <input type="text" size="45" name="catchkathmandu_options[social_meetup]" value="<?php echo esc_url( $options[ 'social_meetup' ] ); ?>" />
                                </div>
                            </div><!-- .row -->                           
                            <div class="row">
                                <input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save Changes', 'catch-kathmandu' ); ?>" />
                            </div><!-- .row -->
                        </div><!-- .option-content -->
                    </div><!-- .option-container -->    
                    
                    <div class="option-container">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Custom Social Icons', 'catch-kathmandu' ); ?></a></h3>
                        <div class="option-content inside">
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Number of Custom Social Icons', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                    <input type="text" size="2" name="catchkathmandu_options[social_custom_qty]" value="<?php echo intval( $options[ 'social_custom_qty' ] ); ?>" size="2" />
                                </div>
                            </div><!-- .row -->                         
                            <?php for ( $i = 1; $i <= $options[ 'social_custom_qty' ]; $i++ ): ?>
                                <div class="repeat-content-wrap">
                                    <h2 class="title"><?php printf( esc_attr__( 'Custom Social Icon #%s', 'catch-kathmandu' ), $i ); ?></h2>
                                    <div class="row">
                                        <div class="col col-1">
                                            <?php _e( 'Social Icon Name', 'catch-kathmandu' ); ?>
                                        </div>
                                        <div class="col col-2">
                                            <input type="text" size="65" name="catchkathmandu_options[social_custom_name][<?php echo absint( $i ); ?>]" value="<?php if( array_key_exists( 'social_custom_name', $options ) && array_key_exists( $i, $options[ 'social_custom_name' ] ) ) echo esc_attr( $options[ 'social_custom_name' ][ $i ] ); ?>" />
                                        </div>
                                    </div><!-- .row -->
                                    <div class="row">
                                        <div class="col col-1">
                                            <?php printf( esc_attr__( 'Social Icon Image URL', 'catch-kathmandu' ), $i ); ?>
                                        </div>
                                        <div class="col col-2">
                                            <input class="upload-url" size="65" type="text" name="catchkathmandu_options[social_custom_image][<?php echo $i; ?>]" value="<?php if( array_key_exists( 'social_custom_image', $options ) && array_key_exists( $i, $options[ 'social_custom_image' ] ) ) echo esc_url( $options[ 'social_custom_image' ][ $i ] ); ?>" />
                                            <input ref="<?php esc_attr_e( 'Insert as Custom Social Icon Image','catch-kathmandu' );?>"  class="catchkathmandu_upload_image button" name="wsl-image-add" type="button" value="<?php if( array_key_exists( 'social_custom_image', $options ) && array_key_exists( $i, $options[ 'social_custom_image' ] ) ) { esc_attr_e( 'Change Image','catch-kathmandu' ); } else { esc_attr_e( 'Add Image','catch-kathmandu' ); } ?>" /> 
                                        </div>
                                    </div><!-- .row -->  
                                    <div class="row">
                                        <div class="col col-1">
                                            <?php printf( esc_attr__( 'Social Icon Image URL on Hover ', 'catch-kathmandu' ), $i ); ?>
                                        </div>
                                        <div class="col col-2">
                                            <input class="upload-url" size="65" type="text" name="catchkathmandu_options[social_custom_image_hover][<?php echo $i; ?>]" value="<?php if( array_key_exists( 'social_custom_image_hover', $options ) && array_key_exists( $i, $options[ 'social_custom_image_hover' ] ) ) echo esc_url( $options[ 'social_custom_image_hover' ][ $i ] ); ?>" />
                                            <input ref="<?php esc_attr_e( 'Insert as Custom Social Icon Image','catch-kathmandu' );?>"  class="catchkathmandu_upload_image button" name="wsl-image-add" type="button" value="<?php if( array_key_exists( 'social_custom_image_hover', $options ) && array_key_exists( $i, $options[ 'social_custom_image_hover' ] ) ) { esc_attr_e( 'Change Image','catch-kathmandu' ); } else { esc_attr_e( 'Add Image','catch-kathmandu' ); } ?>" /> 
                                        </div>
                                    </div><!-- .row -->  
                                    <div class="row">
                                        <div class="col col-1">
                                            <?php _e( 'Social Icon URL', 'catch-kathmandu' ); ?>
                                        </div>
                                        <div class="col col-2">
                                            <input type="text" size="65" name="catchkathmandu_options[social_custom_url][<?php echo absint( $i ); ?>]" value="<?php if( array_key_exists( 'social_custom_url', $options ) && array_key_exists( $i, $options[ 'social_custom_url' ] ) ) echo esc_url( $options[ 'social_custom_url' ][ $i ] ); ?>" />
                                        </div>
                                    </div><!-- .row -->                                                                                                             
                                </div><!-- .repeat-content-wrap -->                             
                            <?php endfor; ?> 
                            <div class="row">
                                <input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save Changes', 'catch-kathmandu' ); ?>" />
                            </div><!-- .row --> 
                        </div><!-- .option-content -->
                    </div><!-- .option-container --> 
                                                    
                </div><!-- #slidersettings -->
                
                
                <!-- Options for Webmaster Tools -->
                <div id="webmaster">
                    <div id="site-verification" class="option-container">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Site Verification', 'catch-kathmandu' ); ?></a></h3>
                        <div class="option-content inside">
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Google Site Verification ID', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                    <input type="text" size="45" name="catchkathmandu_options[google_verification]" value="<?php echo esc_attr( $options[ 'google_verification' ] ); ?>" /> <?php _e('Enter your Google ID number only', 'catch-kathmandu'); ?>
                                </div>
                            </div><!-- .row -->
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Yahoo Site Verification ID', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                    <input type="text" size="45" name="catchkathmandu_options[yahoo_verification]" value="<?php echo esc_attr( $options[ 'yahoo_verification'] ); ?>" /> <?php _e('Enter your Yahoo ID number only', 'catch-kathmandu'); ?>
                                </div>
                            </div><!-- .row -->                                                    
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Bing Site Verification ID', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                    <input type="text" size="45" name="catchkathmandu_options[bing_verification]" value="<?php echo esc_attr( $options[ 'bing_verification' ] ); ?>" /> <?php _e('Enter your Bing ID number only', 'catch-kathmandu'); ?>
                                </div>
                            </div><!-- .row --> 
                            <div class="row">
                                <input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save Changes', 'catch-kathmandu' ); ?>" />
                            </div><!-- .row --> 
                        </div><!-- .option-content -->
                    </div><!-- .option-container --> 
                
                    <div id="header-footer-codes" class="option-container">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Header and Footer Codes', 'catch-kathmandu' ); ?></a></h3>
                        <div class="option-content inside">
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e( 'Code to display on Header', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                     <textarea name="catchkathmandu_options[analytic_header]" id="analytics" rows="7" cols="70" ><?php echo esc_html( $options[ 'analytic_header' ] ); ?></textarea><br /><span class="description"><?php _e('Note: Here you can put scripts from Google, Facebook, Twitter, Add This etc. which will load on Header', 'catch-kathmandu' ); ?></span>
                                </div>
                            </div><!-- .row -->                                                    
                            <div class="row">
                                <div class="col col-1">
                                    <?php _e('Code to display on Footer', 'catch-kathmandu' ); ?>
                                </div>
                                <div class="col col-2">
                                     <textarea name="catchkathmandu_options[analytic_footer]" id="analytics" rows="7" cols="70" ><?php echo esc_html( $options[ 'analytic_footer' ] ); ?></textarea><br /><span class="description"><?php _e( 'Note: Here you can put scripts from Google, Facebook, Twitter, Add This etc. which will load on footer', 'catch-kathmandu' ); ?></span>
                                </div>
                            </div><!-- .row -->
                            <div class="row">
                                <input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save Changes', 'catch-kathmandu' ); ?>" />
                            </div><!-- .row --> 
                        </div><!-- .option-content -->
                    </div><!-- .option-container -->  
                </div><!-- #webmaster -->

            </div><!-- #catchkathmandu_ad_tabs -->
        </form>
    </div><!-- .wrap -->
<?php
}


/**
 * Validate content options
 * @param array $options
 * @uses esc_url_raw, absint, esc_textarea, sanitize_text_field, catchkathmandu_invalidate_caches
 * @return array
 */
function catchkathmandu_theme_options_validate( $options ) {
    global $catchkathmandu_options_settings, $catchkathmandu_options_defaults;
    $input_validated = $catchkathmandu_options_settings;    
    
    $defaults = $catchkathmandu_options_defaults;
    
    $fonts = catchkathmandu_available_fonts();
    
    $input = array();
    $input = $options;
    
    // Data Validation for Resonsive Design 
    if ( isset( $input['disable_responsive'] ) ) {
        // Our checkbox value is either 0 or 1 
        $input_validated[ 'disable_responsive' ] = $input[ 'disable_responsive' ];
    }
    
    // data validation for update notifier
    if ( isset( $input['disable_notifier'] ) ) {
        // Our checkbox value is either 0 or 1 
        $input_validated[ 'disable_notifier' ] = $input[ 'disable_notifier' ];
    } 

    // data validation for disable scroll up
    if ( isset( $input['disable_scrollup'] ) ) {
        // Our checkbox value is either 0 or 1 
        $input_validated[ 'disable_scrollup' ] = $input[ 'disable_scrollup' ];
    } 
    
    
    if ( isset( $input['enable_menus'] ) ) { 
        // Our checkbox value is either 0 or 1 
        $input_validated[ 'enable_menus' ] = $input[ 'enable_menus' ];
    }   
    
    // Data Validation for Favicon      
    if ( isset( $input[ 'fav_icon' ] ) ) {
        $input_validated[ 'fav_icon' ] = esc_url_raw( $input[ 'fav_icon' ] );
    }
    if ( isset( $input['remove_favicon'] ) ) {
        // Our checkbox value is either 0 or 1 
        $input_validated[ 'remove_favicon' ] = $input[ 'remove_favicon' ];
    }
    
    // Data Validation for web clip icon
    if ( isset( $input[ 'web_clip' ] ) ) {
        $input_validated[ 'web_clip' ] = esc_url_raw( $input[ 'web_clip' ] );
    }
    if ( isset( $input['remove_web_clip'] ) ) {
        // Our checkbox value is either 0 or 1 
        $input_validated[ 'remove_web_clip' ] = $input[ 'remove_web_clip' ];
    }   
    
    // Data Validation for Logo 
    if ( isset( $input['site_title_above'] ) ) {
        // Our checkbox value is either 0 or 1 
        $input_validated[ 'site_title_above' ] = $input[ 'site_title_above' ];
    }
    
    // Data Validation for Promotion/Homepage Headline Message
    if( isset( $input[ 'display_homepage_headline' ] ) ) {
        $input_validated['display_homepage_headline'] =  sanitize_key( $input[ 'display_homepage_headline' ] ) ? $input [ 'display_homepage_headline' ] : $defaults[ 'display_homepage_headline' ];
    }

    if( isset( $input[ 'homepage_headline' ] ) ) {
        $input_validated['homepage_headline'] =  sanitize_text_field( $input[ 'homepage_headline' ] ) ? $input [ 'homepage_headline' ] : $defaults[ 'homepage_headline' ];
    }
    if( isset( $input[ 'homepage_subheadline' ] ) ) {
        $input_validated['homepage_subheadline'] =  sanitize_text_field( $input[ 'homepage_subheadline' ] ) ? $input [ 'homepage_subheadline' ] : $defaults[ 'homepage_subheadline' ];
    }   
    if( isset( $input[ 'homepage_headline_button' ] ) ) {
        $input_validated['homepage_headline_button'] =  sanitize_text_field( $input[ 'homepage_headline_button' ] ) ? $input [ 'homepage_headline_button' ] : $defaults[ 'homepage_headline_button' ];
    }           
    if( isset( $input[ 'homepage_headline_url' ] ) ) {
        $input_validated['homepage_headline_url'] =  esc_url_raw( $input[ 'homepage_headline_url' ] ) ? $input [ 'homepage_headline_url' ] : $defaults[ 'homepage_headline_url' ];
    }   
    if ( isset( $input[ 'homepage_headline_target' ] ) ) {
        $input_validated[ 'homepage_headline_target' ] = $input[ 'homepage_headline_target' ];
    }
    if ( isset( $input[ 'disable_homepage_headline' ] ) ) {
        $input_validated[ 'disable_homepage_headline' ] = $input[ 'disable_homepage_headline' ];
    }
    if ( isset( $input[ 'disable_homepage_subheadline' ] ) ) {
        $input_validated[ 'disable_homepage_subheadline' ] = $input[ 'disable_homepage_subheadline' ];
    }
    if ( isset( $input[ 'disable_homepage_button' ] ) ) {
        $input_validated[ 'disable_homepage_button' ] = $input[ 'disable_homepage_button' ];
    }   
    
    // Data Validation for Header Sidebar   
    if ( isset( $input[ 'disable_header_right_sidebar' ] ) ) {
        $input_validated[ 'disable_header_right_sidebar' ] = $input[ 'disable_header_right_sidebar' ];
    }   
    
    // Data validation for Large Header Image
    if ( isset( $input[ 'enable_featured_header_image' ] ) ) {
        $input_validated[ 'enable_featured_header_image' ] = $input[ 'enable_featured_header_image' ];
    }       
    if ( isset( $input['page_featured_image'] ) ) {
        $input_validated[ 'page_featured_image' ] = $input[ 'page_featured_image' ];
    }   
    if ( isset( $input[ 'featured_header_image_position' ] ) ) {
        $input_validated[ 'featured_header_image_position' ] = $input[ 'featured_header_image_position' ];
    }
    if ( isset( $input[ 'featured_header_image' ] ) ) {
        $input_validated[ 'featured_header_image' ] = esc_url_raw( $input[ 'featured_header_image' ] ) ? $input [ 'featured_header_image' ] : $defaults[ 'featured_header_image' ];
    }   
    if ( isset( $input[ 'featured_header_image_alt' ] ) ) {
        $input_validated[ 'featured_header_image_alt' ] = sanitize_text_field( $input[ 'featured_header_image_alt' ] );
    }   
    if ( isset( $input[ 'featured_header_image_url' ] ) ) {
        $input_validated[ 'featured_header_image_url' ] = esc_url_raw( $input[ 'featured_header_image_url' ] );
    }   
    if ( isset( $input['featured_header_image_base'] ) ) {
        // Our checkbox value is either 0 or 1 
        $input_validated[ 'featured_header_image_base' ] = $input[ 'featured_header_image_base' ];
    }   
    
    if ( isset( $input['reset_featured_image'] ) ) {
        // Our checkbox value is either 0 or 1 
        $input_validated[ 'reset_featured_image' ] = $input[ 'reset_featured_image' ];
    }   

    //Reset Header Featured Image Options
    if( $input[ 'reset_featured_image' ] == 1 ) {
        $input_validated[ 'enable_featured_header_image' ] = $defaults[ 'enable_featured_header_image' ];
        $input_validated[ 'page_featured_image' ] = $defaults[ 'page_featured_image' ];
        $input_validated[ 'featured_header_image_position' ] = $defaults[ 'featured_header_image_position' ];
        $input_validated[ 'featured_header_image' ] = $defaults[ 'featured_header_image' ];
        $input_validated[ 'featured_header_image_alt' ] = $defaults[ 'featured_header_image_alt' ];
        $input_validated[ 'featured_header_image_url' ] = $defaults[ 'featured_header_image_url' ];
        $input_validated[ 'featured_header_image_base' ] = $defaults[ 'featured_header_image_base' ];
    }
    
    
    // data validation for Color Scheme
    if ( isset( $input['color_scheme'] ) ) {
        // Our checkbox value is either 0 or 1 
        $input_validated[ 'color_scheme' ] = $input[ 'color_scheme' ];
    }   
    // data validation for Color Options
    if( isset( $input[ 'header_background' ] ) ) {
        $input_validated[ 'header_background' ] = wp_filter_nohtml_kses( $input[ 'header_background' ] );
    }
    if( isset( $input[ 'content_background' ] ) ) {
        $input_validated[ 'content_background' ] = wp_filter_nohtml_kses( $input[ 'content_background' ] );
    }
    if( isset( $input[ 'footer_sidebar_background' ] ) ) {
        $input_validated[ 'footer_sidebar_background' ] = wp_filter_nohtml_kses( $input[ 'footer_sidebar_background' ] );
    }
    if( isset( $input[ 'footer_background' ] ) ) {
        $input_validated[ 'footer_background' ] = wp_filter_nohtml_kses( $input[ 'footer_background' ] );
    }   
    if( isset( $input[ 'title_color' ] ) ) {
        $input_validated[ 'title_color' ] = wp_filter_nohtml_kses( $input[ 'title_color' ] );
    }
    if( isset( $input[ 'title_hover_color' ] ) ) {
        $input_validated[ 'title_hover_color' ] = wp_filter_nohtml_kses( $input[ 'title_hover_color' ] );
    }
    if( isset( $input[ 'meta_color' ] ) ) {
        $input_validated[ 'meta_color' ] = wp_filter_nohtml_kses( $input[ 'meta_color' ] );
    }
    if( isset( $input[ 'text_color' ] ) ) {
        $input_validated[ 'text_color' ] = wp_filter_nohtml_kses( $input[ 'text_color' ] );
    }
    if( isset( $input[ 'link_color' ] ) ) {
        $input_validated[ 'link_color' ] = wp_filter_nohtml_kses( $input[ 'link_color' ] );
    }
    if( isset( $input[ 'widget_title_color' ] ) ) {
        $input_validated[ 'widget_title_color' ] = wp_filter_nohtml_kses( $input[ 'widget_title_color' ] );
    }   
    if( isset( $input[ 'widget_color' ] ) ) {
        $input_validated[ 'widget_color' ] = wp_filter_nohtml_kses( $input[ 'widget_color' ] );
    }   
    if( isset( $input[ 'widget_link_color' ] ) ) {
        $input_validated[ 'widget_link_color' ] = wp_filter_nohtml_kses( $input[ 'widget_link_color' ] );
    }           
    if( isset( $input[ 'scrollup_bg_color' ] ) ) {
        $input_validated[ 'scrollup_bg_color' ] = wp_filter_nohtml_kses( $input[ 'scrollup_bg_color' ] );
    }   
    if( isset( $input[ 'scrollup_text_color' ] ) ) {
        $input_validated[ 'scrollup_text_color' ] = wp_filter_nohtml_kses( $input[ 'scrollup_text_color' ] );
    }   
    
    // Reset Site Color Options
    if ( isset( $input['reset_color'] ) ) {
        // Our checkbox value is either 0 or 1 
        $input_validated[ 'reset_color' ] = $input[ 'reset_color' ];
    }   
    if( $input[ 'reset_color' ] == 1 ) {
        $input_validated[ 'color_scheme' ] = $defaults[ 'color_scheme' ];
        $input_validated[ 'header_background' ] = $defaults[ 'header_background' ];
        $input_validated[ 'content_background' ] = $defaults[ 'content_background' ];
        $input_validated[ 'footer_sidebar_background' ] = $defaults[ 'footer_sidebar_background' ];
        $input_validated[ 'footer_background' ] = $defaults[ 'footer_background' ];
        $input_validated[ 'title_color' ] = $defaults[ 'title_color' ];
        $input_validated[ 'title_hover_color' ] = $defaults[ 'title_hover_color' ];
        $input_validated[ 'meta_color' ] = $defaults[ 'meta_color' ]; 
        $input_validated[ 'text_color' ] = $defaults[ 'text_color' ]; 
        $input_validated[ 'link_color' ] = $defaults[ 'link_color' ]; 
        $input_validated[ 'widget_title_color' ] = $defaults[ 'widget_title_color' ]; 
        $input_validated[ 'widget_color' ] = $defaults[ 'widget_color' ]; 
        $input_validated[ 'widget_link_color' ] = $defaults[ 'widget_link_color' ]; 
        $input_validated[ 'scrollup_bg_color' ] = $defaults[ 'scrollup_bg_color' ];
        $input_validated[ 'scrollup_text_color' ] = $defaults[ 'scrollup_text_color' ];
    }
    
    
    // Menu Color Options
    if( isset( $input[ 'menu_background' ] ) ) {
        $input_validated[ 'menu_background' ] = wp_filter_nohtml_kses( $input[ 'menu_background' ] );
    }   
    if( isset( $input[ 'menu_color' ] ) ) {
        $input_validated[ 'menu_color' ] = wp_filter_nohtml_kses( $input[ 'menu_color' ] );
    }   
    if( isset( $input[ 'hover_active_color' ] ) ) {
        $input_validated[ 'hover_active_color' ] = wp_filter_nohtml_kses( $input[ 'hover_active_color' ] );
    }       
    if( isset( $input[ 'hover_active_text_color' ] ) ) {
        $input_validated[ 'hover_active_text_color' ] = wp_filter_nohtml_kses( $input[ 'hover_active_text_color' ] );
    }   
    if( isset( $input[ 'sub_menu_bg_color' ] ) ) {
        $input_validated[ 'sub_menu_bg_color' ] = wp_filter_nohtml_kses( $input[ 'sub_menu_bg_color' ] );
    }   
    if( isset( $input[ 'sub_menu_text_color' ] ) ) {
        $input_validated[ 'sub_menu_text_color' ] = wp_filter_nohtml_kses( $input[ 'sub_menu_text_color' ] );
    }   
    if( isset( $input[ 'secondary_menu_background' ] ) ) {
        $input_validated[ 'secondary_menu_background' ] = wp_filter_nohtml_kses( $input[ 'secondary_menu_background' ] );
    }   
    if( isset( $input[ 'secondary_menu_color' ] ) ) {
        $input_validated[ 'secondary_menu_color' ] = wp_filter_nohtml_kses( $input[ 'secondary_menu_color' ] );
    }   
    if( isset( $input[ 'secondary_hover_active_color' ] ) ) {
        $input_validated[ 'secondary_hover_active_color' ] = wp_filter_nohtml_kses( $input[ 'secondary_hover_active_color' ] );
    }       
    if( isset( $input[ 'secondary_hover_active_text_color' ] ) ) {
        $input_validated[ 'secondary_hover_active_text_color' ] = wp_filter_nohtml_kses( $input[ 'secondary_hover_active_text_color' ] );
    }   
    if( isset( $input[ 'secondary_sub_menu_bg_color' ] ) ) {
        $input_validated[ 'secondary_sub_menu_bg_color' ] = wp_filter_nohtml_kses( $input[ 'secondary_sub_menu_bg_color' ] );
    }   
    if( isset( $input[ 'secondary_sub_menu_text_color' ] ) ) {
        $input_validated[ 'secondary_sub_menu_text_color' ] = wp_filter_nohtml_kses( $input[ 'secondary_sub_menu_text_color' ] );
    }       
    if( isset( $input[ 'footer_menu_background' ] ) ) {
        $input_validated[ 'footer_menu_background' ] = wp_filter_nohtml_kses( $input[ 'footer_menu_background' ] );
    }
    if( isset( $input[ 'footer_menu_color' ] ) ) {
        $input_validated[ 'footer_menu_color' ] = wp_filter_nohtml_kses( $input[ 'footer_menu_color' ] );
    }   
    if( isset( $input[ 'footer_hover_active_color' ] ) ) {
        $input_validated[ 'footer_hover_active_color' ] = wp_filter_nohtml_kses( $input[ 'footer_hover_active_color' ] );
    }       
    if( isset( $input[ 'footer_hover_active_text_color' ] ) ) {
        $input_validated[ 'footer_hover_active_text_color' ] = wp_filter_nohtml_kses( $input[ 'footer_hover_active_text_color' ] );
    }   
    if( isset( $input[ 'footer_sub_menu_bg_color' ] ) ) {
        $input_validated[ 'footer_sub_menu_bg_color' ] = wp_filter_nohtml_kses( $input[ 'footer_sub_menu_bg_color' ] );
    }   
    if( isset( $input[ 'footer_sub_menu_text_color' ] ) ) {
        $input_validated[ 'footer_sub_menu_text_color' ] = wp_filter_nohtml_kses( $input[ 'footer_sub_menu_text_color' ] );
    }   
    
    if ( isset( $input['reset_menu_color'] ) ) {
        // Our checkbox value is either 0 or 1 
        $input_validated[ 'reset_menu_color' ] = $input[ 'reset_menu_color' ];
    }   
    if( $input[ 'reset_menu_color' ] == 1 ) {
        $input_validated[ 'menu_background' ] = $defaults[ 'menu_background' ]; 
        $input_validated[ 'menu_color' ] = $defaults[ 'menu_color' ]; 
        $input_validated[ 'hover_active_color' ] = $defaults[ 'hover_active_color' ];
        $input_validated[ 'hover_active_text_color' ] = $defaults[ 'hover_active_text_color' ]; 
        $input_validated[ 'sub_menu_bg_color' ] = $defaults[ 'sub_menu_bg_color' ]; 
        $input_validated[ 'sub_menu_text_color' ] = $defaults[ 'sub_menu_text_color' ]; 
        $input_validated[ 'secondary_menu_background' ] = $defaults[ 'secondary_menu_background' ]; 
        $input_validated[ 'secondary_menu_color' ] = $defaults[ 'secondary_menu_color' ]; 
        $input_validated[ 'secondary_hover_active_color' ] = $defaults[ 'secondary_hover_active_color' ];
        $input_validated[ 'secondary_hover_active_text_color' ] = $defaults[ 'secondary_hover_active_text_color' ]; 
        $input_validated[ 'secondary_sub_menu_bg_color' ] = $defaults[ 'secondary_sub_menu_bg_color' ]; 
        $input_validated[ 'secondary_sub_menu_text_color' ] = $defaults[ 'secondary_sub_menu_text_color' ];     
        $input_validated[ 'footer_menu_background' ] = $defaults[ 'footer_menu_background' ];
        $input_validated[ 'footer_menu_color' ] = $defaults[ 'footer_menu_color' ]; 
        $input_validated[ 'footer_hover_active_color' ] = $defaults[ 'footer_hover_active_color' ];
        $input_validated[ 'footer_hover_active_text_color' ] = $defaults[ 'footer_hover_active_text_color' ]; 
        $input_validated[ 'footer_sub_menu_bg_color' ] = $defaults[ 'footer_sub_menu_bg_color' ];   
        $input_validated[ 'footer_sub_menu_text_color' ] = $defaults[ 'footer_sub_menu_text_color' ]; 
    }   
    
    // Pagination Colors
    if ( function_exists( 'wp_pagenavi' ) || function_exists( 'wp_page_numbers' ) ) :
        if( isset( $input[ 'pagination_pages_color' ] ) ) {
            $input_validated[ 'pagination_pages_color' ] = wp_filter_nohtml_kses( $input[ 'pagination_pages_color' ] );
        }   
        if( isset( $input[ 'pagination_bg_color' ] ) ) {
            $input_validated[ 'pagination_bg_color' ] = wp_filter_nohtml_kses( $input[ 'pagination_bg_color' ] );
        }   
        if( isset( $input[ 'pagination_text_color' ] ) ) {
            $input_validated[ 'pagination_text_color' ] = wp_filter_nohtml_kses( $input[ 'pagination_text_color' ] );
        }   
        if( isset( $input[ 'pagination_active_bg_color' ] ) ) {
            $input_validated[ 'pagination_active_bg_color' ] = wp_filter_nohtml_kses( $input[ 'pagination_active_bg_color' ] );
        }   
        if( isset( $input[ 'pagination_active_text_color' ] ) ) {
            $input_validated[ 'pagination_active_text_color' ] = wp_filter_nohtml_kses( $input[ 'pagination_active_text_color' ] );
        }       
        
        if ( isset( $input['reset_pagination_color'] ) ) {
            // Our checkbox value is either 0 or 1 
            $input_validated[ 'reset_pagination_color' ] = $input[ 'reset_pagination_color' ];
        }   
        if( $input[ 'reset_pagination_color' ] == 1 ) {
            $input_validated[ 'pagination_pages_color' ] = $defaults[ 'pagination_pages_color' ]; 
            $input_validated[ 'pagination_bg_color' ] = $defaults[ 'pagination_bg_color' ]; 
            $input_validated[ 'pagination_text_color' ] = $defaults[ 'pagination_text_color' ];
            $input_validated[ 'pagination_active_bg_color' ] = $defaults[ 'pagination_active_bg_color' ]; 
            $input_validated[ 'pagination_active_text_color' ] = $defaults[ 'pagination_active_text_color' ]; 
        }   
     endif;     
     
    // Slider Colors
    if( isset( $input[ 'slider_background' ] ) ) {
        $input_validated[ 'slider_background' ] = wp_filter_nohtml_kses( $input[ 'slider_background' ] );
    }   
    if( isset( $input[ 'slider_border' ] ) ) {
        $input_validated[ 'slider_border' ] = wp_filter_nohtml_kses( $input[ 'slider_border' ] );
    }   
    if( isset( $input[ 'slider_controller' ] ) ) {
        $input_validated[ 'slider_controller' ] = wp_filter_nohtml_kses( $input[ 'slider_controller' ] );
    }   
    if( isset( $input[ 'slider_controller_text' ] ) ) {
        $input_validated[ 'slider_controller_text' ] = wp_filter_nohtml_kses( $input[ 'slider_controller_text' ] );
    }   
    if( isset( $input[ 'slider_content_bg_color' ] ) ) {
        $input_validated[ 'slider_content_bg_color' ] = wp_filter_nohtml_kses( $input[ 'slider_content_bg_color' ] );
    }   
    if( isset( $input[ 'slider_content_text_color' ] ) ) {
        $input_validated[ 'slider_content_text_color' ] = wp_filter_nohtml_kses( $input[ 'slider_content_text_color' ] );
    }       
    
    if ( isset( $input['reset_slider_color'] ) ) {
        // Our checkbox value is either 0 or 1 
        $input_validated[ 'reset_slider_color' ] = $input[ 'reset_slider_color' ];
    }   
    if( $input[ 'reset_slider_color' ] == 1 ) {
        $input_validated[ 'slider_background' ] = $defaults[ 'slider_background' ]; 
        $input_validated[ 'slider_border' ] = $defaults[ 'slider_border' ]; 
        $input_validated[ 'slider_controller' ] = $defaults[ 'slider_controller' ];
        $input_validated[ 'slider_controller_text' ] = $defaults[ 'slider_controller_text' ]; 
        $input_validated[ 'slider_content_bg_color' ] = $defaults[ 'slider_content_bg_color' ];
        $input_validated[ 'slider_content_text_color' ] = $defaults[ 'slider_content_text_color' ]; 
    }        
     
    // Homepage Headline Color 
    if( isset( $input[ 'home_headline_background' ] ) ) {
        $input_validated[ 'home_headline_background' ] = wp_filter_nohtml_kses( $input[ 'home_headline_background' ] );
    }   
    if( isset( $input[ 'home_headline' ] ) ) {
        $input_validated[ 'home_headline' ] = wp_filter_nohtml_kses( $input[ 'home_headline' ] );
    }
    if( isset( $input[ 'home_headline_border' ] ) ) {
        $input_validated[ 'home_headline_border' ] = wp_filter_nohtml_kses( $input[ 'home_headline_border' ] );
    }   
    if( isset( $input[ 'home_headline_button_bg' ] ) ) {
        $input_validated[ 'home_headline_button_bg' ] = wp_filter_nohtml_kses( $input[ 'home_headline_button_bg' ] );
    }   
    if( isset( $input[ 'home_headline_button' ] ) ) {
        $input_validated[ 'home_headline_button' ] = wp_filter_nohtml_kses( $input[ 'home_headline_button' ] );
    }   
    if( isset( $input[ 'home_headline_button_bg_hover' ] ) ) {
        $input_validated[ 'home_headline_button_bg_hover' ] = wp_filter_nohtml_kses( $input[ 'home_headline_button_bg_hover' ] );
    }   
    if( isset( $input[ 'home_headline_button_hover' ] ) ) {
        $input_validated[ 'home_headline_button_hover' ] = wp_filter_nohtml_kses( $input[ 'home_headline_button_hover' ] );
    }       
    if( isset( $input[ 'home_headline_button_border' ] ) ) {
        $input_validated[ 'home_headline_button_border' ] = wp_filter_nohtml_kses( $input[ 'home_headline_button_border' ] );
    }   
    if ( isset( $input['reset_home_headline_color'] ) ) {
        // Our checkbox value is either 0 or 1 
        $input_validated[ 'reset_home_headline_color' ] = $input[ 'reset_home_headline_color' ];
    }   
    if( $input[ 'reset_home_headline_color' ] == 1 ) {
        $input_validated[ 'home_headline_background' ] = $defaults[ 'home_headline_background' ];
        $input_validated[ 'home_headline' ] = $defaults[ 'home_headline' ];
        $input_validated[ 'home_headline_border' ] = $defaults[ 'home_headline_border' ];
        $input_validated[ 'home_headline_button_bg' ] = $defaults[ 'home_headline_button_bg' ];
        $input_validated[ 'home_headline_button' ] = $defaults[ 'home_headline_button' ];
        $input_validated[ 'home_headline_button_bg_hover' ] = $defaults[ 'home_headline_button_bg_hover' ];
        $input_validated[ 'home_headline_button_hover' ] = $defaults[ 'home_headline_button_hover' ];
        $input_validated[ 'home_headline_button_border' ] = $defaults[ 'home_headline_button_border' ];
    }   
     
    
    // data validation for Font Family Options
    if( isset( $input[ 'reset_typography'] ) ) {  
        // Our checkbox value is either 0 or 1 
        $input_validated[ 'reset_typography' ] = $input[ 'reset_typography' ];
        $input_validated['body_font'] = ( array_key_exists( $input['body_font'], $fonts ) ? $input['body_font'] : $defaults[ 'body_font' ] );
        $input_validated['title_font'] = ( array_key_exists( $input['title_font'], $fonts ) ? $input['title_font'] : $defaults[ 'title_font' ] );
        $input_validated['tagline_font'] = ( array_key_exists( $input['title_font'], $fonts ) ? $input['tagline_font'] : $defaults[ 'tagline_font' ] );
        $input_validated['content_tittle_font'] = ( array_key_exists( $input['content_tittle_font'], $fonts ) ? $input['content_tittle_font'] : $defaults[ 'content_tittle_font' ] );
        $input_validated['content_font'] = ( array_key_exists( $input['content_font'], $fonts ) ? $input['content_font'] : $defaults[ 'content_font' ] );
        $input_validated['headings_font'] = ( array_key_exists( $input['headings_font'], $fonts ) ? $input['headings_font'] : $defaults[ 'headings_font' ] );
        
        if( $input[ 'reset_typography'] == '1' ) {
            $input_validated['body_font'] = $defaults[ 'body_font' ];
            $input_validated['title_font'] = $defaults[ 'title_font' ];
            $input_validated['tagline_font'] = $defaults[ 'tagline_font' ];
            $input_validated['content_tittle_font'] = $defaults[ 'content_tittle_font' ];       
            $input_validated['content_font'] = $defaults[ 'content_font' ];
            $input_validated['headings_font'] = $defaults[ 'headings_font' ];
        }
    }   

    // Data Validation for Comment Setting
    if ( isset( $input[ 'commenting_setting' ] ) ) {
        $input_validated[ 'commenting_setting' ] = $input[ 'commenting_setting' ];
    }   
    if ( isset( $input['commenting_disable_url'] ) ) {
        // Our checkbox value is either 0 or 1 
        $input_validated[ 'commenting_disable_url' ] = $input[ 'commenting_disable_url' ];
    }   
    
    // Data Validation for Custom CSS Style
    if ( isset( $input['custom_css'] ) ) {
        $input_validated['custom_css'] = wp_kses_stripslashes($input['custom_css']);
    }
    
    // Data Validation for Featured Content 

    if ( isset( $input[ 'homepage_featured_type' ] ) ) {
        $input_validated[ 'homepage_featured_type' ] = sanitize_key( $input[ 'homepage_featured_type' ] );
    }
    if ( isset( $input[ 'disable_homepage_featured' ] ) ) {
        $input_validated[ 'disable_homepage_featured' ] = $input[ 'disable_homepage_featured' ];
    }   
    if( isset( $input[ 'homepage_featured_headline' ] ) ) {
        $input_validated['homepage_featured_headline'] =  sanitize_text_field( $input[ 'homepage_featured_headline' ] ) ? $input [ 'homepage_featured_headline' ] : $defaults[ 'homepage_featured_headline' ];
    }   
    if ( isset( $input[ 'homepage_featured_image' ] ) ) {
        $input_validated[ 'homepage_featured_image' ] = array();
    }
    if ( isset( $input[ 'homepage_featured_url' ] ) ) {
        $input_validated[ 'homepage_featured_url' ] = array();
    }
    if ( isset( $input[ 'homepage_featured_base' ] ) ) {
        $input_validated[ 'homepage_featured_base' ] = array();
    }   
    if ( isset( $input[ 'homepage_featured_title' ] ) ) {
        $input_validated[ 'homepage_featured_title' ] = array();
    }
    if ( isset( $input[ 'homepage_featured_content' ] ) ) {
        $input_validated[ 'homepage_featured_content' ] = array();
    }
    if( isset( $input[ 'homepage_featured_layout' ] ) ) {
        $input_validated[ 'homepage_featured_layout' ] = $input[ 'homepage_featured_layout' ];
    }

    // data validation for Featured Post and Page Content
    if ( isset( $input[ 'featured_content_page' ] ) ) {
        $input_validated[ 'featured_content_page' ] = array();
    }
    if ( isset( $input[ 'featured_content_post' ] ) ) {
        $input_validated[ 'featured_content_post' ] = array();
    }

    if ( isset( $input[ 'homepage_featured_qty' ] ) ) {
        $input_validated[ 'homepage_featured_qty' ] = absint( $input[ 'homepage_featured_qty' ] ) ? $input [ 'homepage_featured_qty' ] : $defaults[ 'homepage_featured_qty' ];
        for ( $i = 1; $i <= $input [ 'homepage_featured_qty' ]; $i++ ) {
            if ( !empty( $input[ 'homepage_featured_image' ][ $i ] ) ) {
                $input_validated[ 'homepage_featured_image' ][ $i ] = esc_url_raw($input[ 'homepage_featured_image' ][ $i ] );
            }
            if ( !empty( $input[ 'homepage_featured_url' ][ $i ] ) ) {
                $input_validated[ 'homepage_featured_url'][ $i ] = esc_url_raw($input[ 'homepage_featured_url'][ $i ]);
            }
            if ( !empty( $input[ 'homepage_featured_base' ][ $i ] ) ) {
                $input_validated[ 'homepage_featured_base'][ $i ] = $input[ 'homepage_featured_base'][ $i ];
            }
            if ( !empty( $input[ 'homepage_featured_title' ][ $i ] ) ) {
                $input_validated[ 'homepage_featured_title'][ $i ] = sanitize_text_field($input[ 'homepage_featured_title'][ $i ]);
            }
            if ( !empty( $input[ 'homepage_featured_content' ][ $i ] ) ) {
                $input_validated[ 'homepage_featured_content'][ $i ] = wp_kses_stripslashes($input[ 'homepage_featured_content'][ $i ]);
            }
            if ( !empty( $input[ 'featured_content_post' ][ $i ] ) ) {
                $input_validated[ 'featured_content_post' ][ $i ] = absint($input[ 'featured_content_post' ][ $i ] );
            }
            if ( !empty( $input[ 'featured_content_page' ][ $i ] ) ) {
                $input_validated[ 'featured_content_page' ][ $i ] = absint($input[ 'featured_content_page' ][ $i ] );
            }  
        }
    }

    //Featured Content Catgory
    if ( isset( $input['featured_content_category'] ) ) {
        $input_validated[ 'featured_content_category' ] = $input[ 'featured_content_category' ];
    }  
    
    // Data Validation for Homepage
    if ( isset( $input[ 'enable_posts_home' ] ) ) {
        $input_validated[ 'enable_posts_home' ] = $input[ 'enable_posts_home' ];
    }   
    if ( isset( $input[ 'move_posts_home' ] ) ) {
        $input_validated[ 'move_posts_home' ] = $input[ 'move_posts_home' ];
    }       
    

    if ( isset( $input['exclude_slider_post'] ) ) {
        // Our checkbox value is either 0 or 1 
        $input_validated[ 'exclude_slider_post' ] = $input[ 'exclude_slider_post' ];    
    
    }
    // Front page posts categories
    if( isset( $input['front_page_category' ] ) ) {
        $input_validated['front_page_category'] = $input['front_page_category'];
    }   

    // data validation for Slider Type
    if( isset( $input[ 'select_slider_type' ] ) ) {
        $input_validated[ 'select_slider_type' ] = $input[ 'select_slider_type' ];
    }
    // data validation for Enable Slider
    if( isset( $input[ 'enable_slider' ] ) ) {
        $input_validated[ 'enable_slider' ] = $input[ 'enable_slider' ];
    }   
    // data validation for number of slides
    if ( isset( $input[ 'slider_qty' ] ) ) {
        $input_validated[ 'slider_qty' ] = absint( $input[ 'slider_qty' ] ) ? $input [ 'slider_qty' ] : 4;
    }   
    // data validation for transition effect
    if( isset( $input[ 'transition_effect' ] ) ) {
        $input_validated['transition_effect'] = wp_filter_nohtml_kses( $input['transition_effect'] );
    }
    // data validation for transition delay
    if ( isset( $input[ 'transition_delay' ] ) && is_numeric( $input[ 'transition_delay' ] ) ) {
        $input_validated[ 'transition_delay' ] = $input[ 'transition_delay' ];
    }
    // data validation for transition length
    if ( isset( $input[ 'transition_duration' ] ) && is_numeric( $input[ 'transition_duration' ] ) ) {
        $input_validated[ 'transition_duration' ] = $input[ 'transition_duration' ];
    }   
    
    // data validation for Featured Post and Page Slider
    if ( isset( $input[ 'featured_slider' ] ) ) {
        $input_validated[ 'featured_slider' ] = array();
    }
    if ( isset( $input[ 'featured_slider_page' ] ) ) {
        $input_validated[ 'featured_slider_page' ] = array();
    }       
    if ( isset( $input[ 'slider_qty' ] ) )  {   
        for ( $i = 1; $i <= $input [ 'slider_qty' ]; $i++ ) {
            if ( !empty( $input[ 'featured_slider' ][ $i ] ) && intval( $input[ 'featured_slider' ][ $i ] ) ) {
                $input_validated[ 'featured_slider' ][ $i ] = absint($input[ 'featured_slider' ][ $i ] );
            }
            if ( !empty( $input[ 'featured_slider_page' ][ $i ] ) && intval( $input[ 'featured_slider_page' ][ $i ] ) ) {
                $input_validated[ 'featured_slider_page' ][ $i ] = absint($input[ 'featured_slider_page' ][ $i ] );
            }           
        }
    }   
    
    //Featured Catgory Slider
    if ( isset( $input['slider_category'] ) ) {
        $input_validated[ 'slider_category' ] = $input[ 'slider_category' ];
    }       
    
    // data validation for Featured Image SLider 
    if ( isset( $input[ 'featured_image_slider_image' ] ) ) {
        $input_validated[ 'featured_image_slider_image' ] = array();
    }
    if ( isset( $input[ 'featured_image_slider_link' ] ) ) {
        $input_validated[ 'featured_image_slider_link' ] = array();
    }
    if ( isset( $input[ 'featured_image_slider_base' ] ) ) {
        $input_validated[ 'featured_image_slider_base' ] = array();
    }       
    if ( isset( $input[ 'featured_image_slider_title' ] ) ) {
        $input_validated[ 'featured_image_slider_title' ] = array();
    }
    if ( isset( $input[ 'featured_image_slider_content' ] ) ) {
        $input_validated[ 'featured_image_slider_content' ] = array();
    }   
    if ( isset( $input[ 'slider_qty' ] ) )  {   
        for ( $i = 1; $i <= $input [ 'slider_qty' ]; $i++ ) {
            if ( !empty( $input[ 'featured_image_slider_image' ][ $i ] ) ) {
                $input_validated[ 'featured_image_slider_image' ][ $i ] = esc_url_raw($input[ 'featured_image_slider_image' ][ $i ] );
            }
            if ( !empty( $input[ 'featured_image_slider_link' ][ $i ] ) ) {
                $input_validated[ 'featured_image_slider_link'][ $i ] = esc_url_raw($input[ 'featured_image_slider_link'][ $i ]);
            }
            if ( !empty( $input[ 'featured_image_slider_base' ][ $i ] ) ) {
                $input_validated[ 'featured_image_slider_base'][ $i ] = $input[ 'featured_image_slider_base'][ $i ];
            }
            if ( !empty( $input[ 'featured_image_slider_title' ][ $i ] ) ) {
                $input_validated[ 'featured_image_slider_title'][ $i ] = sanitize_text_field($input[ 'featured_image_slider_title'][ $i ]);
            }
            if ( !empty( $input[ 'featured_image_slider_content' ][ $i ] ) ) {
                $input_validated[ 'featured_image_slider_content'][ $i ] = wp_kses_stripslashes($input[ 'featured_image_slider_content'][ $i ]);
            }           
        }
    }   
    
    // data validation for Social Icons
    if( isset( $input[ 'social_facebook' ] ) ) {
        $input_validated[ 'social_facebook' ] = esc_url_raw( $input[ 'social_facebook' ] );
    }
    if( isset( $input[ 'social_twitter' ] ) ) {
        $input_validated[ 'social_twitter' ] = esc_url_raw( $input[ 'social_twitter' ] );
    }
    if( isset( $input[ 'social_googleplus' ] ) ) {
        $input_validated[ 'social_googleplus' ] = esc_url_raw( $input[ 'social_googleplus' ] );
    }
    if( isset( $input[ 'social_pinterest' ] ) ) {
        $input_validated[ 'social_pinterest' ] = esc_url_raw( $input[ 'social_pinterest' ] );
    }   
    if( isset( $input[ 'social_youtube' ] ) ) {
        $input_validated[ 'social_youtube' ] = esc_url_raw( $input[ 'social_youtube' ] );
    }
    if( isset( $input[ 'social_vimeo' ] ) ) {
        $input_validated[ 'social_vimeo' ] = esc_url_raw( $input[ 'social_vimeo' ] );
    }   
    if( isset( $input[ 'social_linkedin' ] ) ) {
        $input_validated[ 'social_linkedin' ] = esc_url_raw( $input[ 'social_linkedin' ] );
    }
    if( isset( $input[ 'social_slideshare' ] ) ) {
        $input_validated[ 'social_slideshare' ] = esc_url_raw( $input[ 'social_slideshare' ] );
    }   
    if( isset( $input[ 'social_foursquare' ] ) ) {
        $input_validated[ 'social_foursquare' ] = esc_url_raw( $input[ 'social_foursquare' ] );
    }
    if( isset( $input[ 'social_flickr' ] ) ) {
        $input_validated[ 'social_flickr' ] = esc_url_raw( $input[ 'social_flickr' ] );
    }
    if( isset( $input[ 'social_tumblr' ] ) ) {
        $input_validated[ 'social_tumblr' ] = esc_url_raw( $input[ 'social_tumblr' ] );
    }   
    if( isset( $input[ 'social_deviantart' ] ) ) {
        $input_validated[ 'social_deviantart' ] = esc_url_raw( $input[ 'social_deviantart' ] );
    }
    if( isset( $input[ 'social_dribbble' ] ) ) {
        $input_validated[ 'social_dribbble' ] = esc_url_raw( $input[ 'social_dribbble' ] );
    }   
    if( isset( $input[ 'social_myspace' ] ) ) {
        $input_validated[ 'social_myspace' ] = esc_url_raw( $input[ 'social_myspace' ] );
    }
    if( isset( $input[ 'social_wordpress' ] ) ) {
        $input_validated[ 'social_wordpress' ] = esc_url_raw( $input[ 'social_wordpress' ] );
    }   
    if( isset( $input[ 'social_rss' ] ) ) {
        $input_validated[ 'social_rss' ] = esc_url_raw( $input[ 'social_rss' ] );
    }
    if( isset( $input[ 'social_delicious' ] ) ) {
        $input_validated[ 'social_delicious' ] = esc_url_raw( $input[ 'social_delicious' ] );
    }   
    if( isset( $input[ 'social_lastfm' ] ) ) {
        $input_validated[ 'social_lastfm' ] = esc_url_raw( $input[ 'social_lastfm' ] );
    }
    if( isset( $input[ 'social_instagram' ] ) ) {
        $input_validated[ 'social_instagram' ] = esc_url_raw( $input[ 'social_instagram' ] );
    }   
    if( isset( $input[ 'social_github' ] ) ) {
        $input_validated[ 'social_github' ] = esc_url_raw( $input[ 'social_github' ] );
    }
    if( isset( $input[ 'social_vkontakte' ] ) ) {
        $input_validated[ 'social_vkontakte' ] = esc_url_raw( $input[ 'social_vkontakte' ] );
    }   
    if( isset( $input[ 'social_myworld' ] ) ) {
        $input_validated[ 'social_myworld' ] = esc_url_raw( $input[ 'social_myworld' ] );
    }
    if( isset( $input[ 'social_odnoklassniki' ] ) ) {
        $input_validated[ 'social_odnoklassniki' ] = esc_url_raw( $input[ 'social_odnoklassniki' ] );
    }   
    if( isset( $input[ 'social_goodreads' ] ) ) {
        $input_validated[ 'social_goodreads' ] = esc_url_raw( $input[ 'social_goodreads' ] );
    }   
    if( isset( $input[ 'social_skype' ] ) ) {
        $input_validated[ 'social_skype' ] = sanitize_text_field( $input[ 'social_skype' ] );
    }
    if( isset( $input[ 'social_soundcloud' ] ) ) {
        $input_validated[ 'social_soundcloud' ] = esc_url_raw( $input[ 'social_soundcloud' ] );
    }   
    if( isset( $input[ 'social_email' ] ) ) {
        $input_validated[ 'social_email' ] = sanitize_email( $input[ 'social_email' ] );
    }
    if( isset( $input[ 'social_contact' ] ) ) {
        $input_validated[ 'social_contact' ] = esc_url_raw( $input[ 'social_contact' ] );
    }
    if( isset( $input[ 'social_xing' ] ) ) {
        $input_validated[ 'social_xing' ] = esc_url_raw( $input[ 'social_xing' ] );
    }   
    if( isset( $input[ 'social_meetup' ] ) ) {
        $input_validated[ 'social_meetup' ] = esc_url_raw( $input[ 'social_meetup' ] );
    }       

    // data validation for Custom Social Icons 
    if ( isset( $input[ 'social_custom_qty' ] ) ) {
        $input_validated[ 'social_custom_qty' ] = absint( $input[ 'social_custom_qty' ] ) ? $input [ 'social_custom_qty' ] : 1;
    }
    if ( isset( $input[ 'social_custom_name' ] ) ) {
        $input_validated[ 'social_custom_name' ] = array();
    }
    if ( isset( $input[ 'social_custom_image' ] ) ) {
        $input_validated[ 'social_custom_image' ] = array();
    }
    if ( isset( $input[ 'social_custom_image_hover' ] ) ) {
        $input_validated[ 'social_custom_image_hover' ] = array();
    }
    if ( isset( $input[ 'social_custom_url' ] ) ) {
        $input_validated[ 'social_custom_url' ] = array();
    }       
    if ( isset( $input[ 'social_custom_qty' ] ) )   {   
        for ( $i = 1; $i <= $input [ 'social_custom_qty' ]; $i++ ) {
            if ( !empty( $input[ 'social_custom_name' ][ $i ] ) ) {
                $input_validated[ 'social_custom_name'][ $i ] = sanitize_text_field($input[ 'social_custom_name'][ $i ]);
            }
            if ( !empty( $input[ 'social_custom_image' ][ $i ] ) ) {
                $input_validated[ 'social_custom_image' ][ $i ] = esc_url_raw($input[ 'social_custom_image' ][ $i ] );
            }
            if ( !empty( $input[ 'social_custom_image_hover' ][ $i ] ) ) {
                $input_validated[ 'social_custom_image_hover' ][ $i ] = esc_url_raw($input[ 'social_custom_image_hover' ][ $i ] );
            }
            if ( !empty( $input[ 'social_custom_url' ][ $i ] ) ) {
                $input_validated[ 'social_custom_url'][ $i ] = esc_url_raw($input[ 'social_custom_url'][ $i ]);
            }       
        }
    }   
    
        
    //Webmaster Tool Verification
    if( isset( $input[ 'google_verification' ] ) ) {
        $input_validated[ 'google_verification' ] = wp_filter_post_kses( $input[ 'google_verification' ] );
    }
    if( isset( $input[ 'yahoo_verification' ] ) ) {
        $input_validated[ 'yahoo_verification' ] = wp_filter_post_kses( $input[ 'yahoo_verification' ] );
    }
    if( isset( $input[ 'bing_verification' ] ) ) {
        $input_validated[ 'bing_verification' ] = wp_filter_post_kses( $input[ 'bing_verification' ] );
    }   
    if( isset( $input[ 'analytic_header' ] ) ) {
        $input_validated[ 'analytic_header' ] = wp_kses_stripslashes( $input[ 'analytic_header' ] );
    }
    if( isset( $input[ 'analytic_footer' ] ) ) {
        $input_validated[ 'analytic_footer' ] = wp_kses_stripslashes( $input[ 'analytic_footer' ] );    
    }       
    
    // Layout settings verification
    if( isset( $input[ 'sidebar_layout' ] ) ) {
        $input_validated[ 'sidebar_layout' ] = $input[ 'sidebar_layout' ];
    }
    if( isset( $input[ 'content_layout' ] ) ) {
        $input_validated[ 'content_layout' ] = $input[ 'content_layout' ];
    }
    
    //data validation for more text
    if( isset( $input[ 'more_tag_text' ] ) ) {
        $input_validated[ 'more_tag_text' ] = htmlentities( sanitize_text_field ( $input[ 'more_tag_text' ] ), ENT_QUOTES, 'UTF-8' );
    }
    //data validation for excerpt length
    if ( isset( $input[ 'excerpt_length' ] ) ) {
        $input_validated[ 'excerpt_length' ] = absint( $input[ 'excerpt_length' ] ) ? $input [ 'excerpt_length' ] : $defaults[ 'excerpt_length' ];
    }
    if ( isset( $input['reset_moretag'] ) ) {
        // Our checkbox value is either 0 or 1 
        $input_validated[ 'reset_moretag' ] = $input[ 'reset_moretag' ];
    }   
    
    //Reset Color Options
    if( $input[ 'reset_moretag' ] == 1 ) {
        $input_validated[ 'more_tag_text' ] = $defaults[ 'more_tag_text' ];
        $input_validated[ 'excerpt_length' ] = $defaults[ 'excerpt_length' ];
    }           
    
    
    if( isset( $input[ 'search_display_text' ] ) ) {
        $input_validated[ 'search_display_text' ] = sanitize_text_field( $input[ 'search_display_text' ] ) ? $input [ 'search_display_text' ] : $defaults[ 'search_display_text' ];
    }
    
    // Data Validation for Featured Image
    if ( isset( $input['featured_image'] ) ) {
        $input_validated[ 'featured_image' ] = $input[ 'featured_image' ];
    }
    
    if ( isset( $input['reset_layout'] ) ) {
        // Our checkbox value is either 0 or 1 
        $input_validated[ 'reset_layout' ] = $input[ 'reset_layout' ];
    }   
    
    //Reset Color Options
    if( $input[ 'reset_layout' ] == 1 ) {
        $input_validated[ 'sidebar_layout' ] = $defaults[ 'sidebar_layout' ];
        $input_validated[ 'content_layout' ] = $defaults[ 'content_layout' ];
        $input_validated[ 'featured_image' ] = $defaults[ 'featured_image' ];
    }       
    


    //Feed Redirect
    if ( isset( $input[ 'feed_url' ] ) ) {
        $input_validated['feed_url'] = esc_url_raw($input['feed_url']);
    }
    
    //footer text   
    if( isset( $input[ 'footer_code' ] ) ) {
        $input_validated['footer_code'] =  stripslashes( wp_filter_post_kses( addslashes ( $input['footer_code'] ) ) ); 
    }
    if ( isset( $input['reset_footer'] ) ) {
        // Our checkbox value is either 0 or 1 
        $input_validated[ 'reset_footer' ] = $input[ 'reset_footer' ];
    }   
    
    //Reset Color Options
    if ( $input[ 'reset_footer' ] == 1 ) {
        $input_validated[ 'footer_code' ] = $defaults[ 'footer_code' ];
    }   
    
    //Clearing the theme option cache
    if( function_exists( 'catchkathmandu_themeoption_invalidate_caches' ) ) catchkathmandu_themeoption_invalidate_caches();
    
    return $input_validated;
}


/*
 * Clearing the cache if any changes in Admin Theme Option
 */
function catchkathmandu_themeoption_invalidate_caches() {
    delete_transient('catchkathmandu_responsive'); // Responsive design
    delete_transient( 'catchkathmandu_favicon' );    // favicon on cpanel/ backend and frontend  
    delete_transient( 'catchkathmandu_inline_css' ); // Custom Inline CSS
    delete_transient( 'catchkathmandu_post_sliders' ); // featured post slider
    delete_transient( 'catchkathmandu_page_sliders' ); // featured page slider
    delete_transient( 'catchkathmandu_category_sliders' ); // featured category slider
    delete_transient( 'catchkathmandu_image_sliders' ); // featured image slider
    delete_transient( 'catchkathmandu_default_sliders' ); //Default slider
    delete_transient( 'catchkathmandu_homepage_headline' ); // Homepage Headline Message
    delete_transient( 'catchkathmandu_featured_content' ); // Featured Content
    delete_transient( 'catchkathmandu_footer_content' ); // Footer Content
    delete_transient( 'catchkathmandu_social_networks' ); // Social Networks
    delete_transient( 'catchkathmandu_webmaster' ); // scripts which loads on header
    delete_transient( 'catchkathmandu_footercode' ); // scripts which loads on footer
    delete_transient( 'catchkathmandu_web_clip' ); // web clip icons
    delete_transient( 'catchkathmandu_scrollup' ); // Scroll Up code
}


/*
 * Clearing the cache if any changes in post or page
 */
function catchkathmandu_post_invalidate_caches(){
    delete_transient( 'catchkathmandu_post_sliders' ); // featured post slider
    delete_transient( 'catchkathmandu_page_sliders' ); // featured page slider
    delete_transient( 'catchkathmandu_category_sliders' ); // featured category slider
    delete_transient( 'catchkathmandu_featured_content' ); // Featured Content
}
//Add action hook here save post
add_action( 'save_post', 'catchkathmandu_post_invalidate_caches' );


/**
 * Custom scripts and styles on Customizer for Catch Kathmandu
 *
 * @since Catch Kathmandu Pro 2.1.1
 */
function catchkathmandu_customize_scripts() {
    wp_register_script( 'catchkathmandu_customizer_custom', get_template_directory_uri() . '/inc/panel/js/customizer-custom-scripts.js', array( 'jquery' ), '20140108', true );

    $catchkathmandu_misc_links = array(
                            'upgrade_link'              => esc_url( admin_url( 'themes.php?page=theme_options' ) ),
                            'upgrade_text'              => __( 'More Theme Options &raquo;', 'catch-kathmandu' ),
                            );

    //Add More Theme Options Button
    wp_localize_script( 'catchkathmandu_customizer_custom', 'catchkathmandu_misc_links', $catchkathmandu_misc_links );

    wp_enqueue_script( 'catchkathmandu_customizer_custom' );

    wp_enqueue_style( 'catchkathmandu_customizer_custom', get_template_directory_uri() . '/inc/panel/catchkathmandu-customizer.css');
}
add_action( 'customize_controls_print_footer_scripts', 'catchkathmandu_customize_scripts');