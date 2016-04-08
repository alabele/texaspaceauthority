<?php
	/*
	  Plugin Name: FX Elements
	  Plugin URI: http://miguras.com
	  Version: 1.1(beta)
	  Author: Miguras
	  Author URI: http://miguras.com
	  Description: Add animated elements to the website as shortcodes.
	 */

	// Load libs
	require_once 'lib/available.php';
	require_once 'lib/color.php';
	require_once 'lib/shortcodes.php';


	/**
	 * Plugin initialization
	 */
	function migfx_themeshortcodes_plugin_init() {

		// Enable shortcodes in text widgets
		add_filter( 'widget_text', 'do_shortcode' );

		

		// Fix for large posts, http://core.trac.wordpress.org/ticket/8553
		@ini_set( 'pcre.backtrack_limit', 500000 );

		// Register styles
		wp_register_style( 'migfx-themeshortcodes-generator', get_template_directory_uri().'/inc/FX-Shortcodes/css/generator.css');
		wp_register_style( 'mig-codemirror', get_template_directory_uri().'/inc/FX-Shortcodes/css/codemirror.css');
		wp_register_style( 'mig-codemirror-css', get_template_directory_uri().'/inc/FX-Shortcodes/css/codemirror-css.css');
		wp_register_style( 'mig-chosen', get_template_directory_uri().'/inc/FX-Shortcodes/css/chosen.css');
		wp_register_style( 'migfx-themeshortcodes-effects', get_template_directory_uri().'/inc/FX-Shortcodes/css/migfx-themeshortcodes-effects.css');


		// Register scripts
		wp_register_script( 'mig-fx', get_template_directory_uri().'/inc/FX-Shortcodes/js/init.js');
		wp_register_script( 'migfx-themeshortcodes-generator', get_template_directory_uri().'/inc/FX-Shortcodes/js/generator.js');
		wp_register_script( 'mig-codemirror', get_template_directory_uri().'/inc/FX-Shortcodes/js/codemirror.js');
		wp_register_script( 'mig-codemirror-css', get_template_directory_uri().'/inc/FX-Shortcodes/js/codemirror-css.js');
		wp_register_script( 'mig-chosen', get_template_directory_uri().'/inc/FX-Shortcodes/js/chosen.js');
		wp_register_script( 'mig-ajax-form', get_template_directory_uri().'/inc/FX-Shortcodes/js/jquery.form.js');
		wp_register_script( 'migfx-themeshortcodes-effects', get_template_directory_uri().'/inc/FX-Shortcodes/js/migfx-themeshortcodes-effects.js');
		wp_register_script( 'jquery-color', get_template_directory_uri().'/inc/FX-Shortcodes/js/jquery.color.js');



		// Front-end scripts and styles
		if ( !is_admin() ) {

			$disabled_scripts = get_option( 'migfx_themeshortcodes_disabled_scripts' );
			$disabled_styles = get_option( 'migfx_themeshortcodes_disabled_styles' );

			
			if ( !isset( $disabled_styles['style'] ) ) {
				wp_enqueue_style( 'migfx-themeshortcodes-effects' );

				
			}

			// Enqueue scripts
			if ( !isset( $disabled_scripts['jquery'] ) ) {
				wp_enqueue_script( 'jquery' );
			}
			
			
			if ( !isset( $disabled_scripts['init'] ) ) {
				wp_enqueue_script( 'mig-fx' );
				wp_enqueue_script( 'jquery-color' );
				wp_enqueue_script( 'migfx-themeshortcodes-effects' );

			}
		}

		// Back-end scripts and styles
		elseif ( isset( $_GET['page'] ) && $_GET['page'] == 'mig-fx' ) {

			// Enqueue styles
			wp_enqueue_style( 'mig-codemirror' );
			wp_enqueue_style( 'mig-codemirror-css' );


			// Enqueue scripts
			wp_enqueue_script( 'jquery' );
			wp_enqueue_script( 'mig-codemirror' );
			wp_enqueue_script( 'mig-codemirror-css' );
			wp_enqueue_script( 'mig-ajax-form' );
		}

		// Scipts and stylesheets for editing pages (shortcode generator popup)
		elseif ( is_admin() ) {

			// Get current page type
			global $pagenow;

			// Pages for including
			$migfx_themeshortcodes_generator_includes_pages = array( 'post.php', 'edit.php', 'post-new.php', 'index.php', 'edit-tags.php', 'widgets.php' );

			if ( in_array( $pagenow, $migfx_themeshortcodes_generator_includes_pages ) ) {
				// Enqueue styles
				wp_enqueue_style( 'thickbox' );
				wp_enqueue_style( 'farbtastic' );
				wp_enqueue_style( 'mig-chosen' );
				wp_enqueue_style( 'migfx-themeshortcodes-generator' );

				// Enqueue scripts
				wp_enqueue_script( 'jquery' );
				wp_enqueue_script( 'thickbox' );
				wp_enqueue_script( 'farbtastic' );
				wp_enqueue_script( 'mig-chosen' );
				wp_enqueue_script( 'migfx-themeshortcodes-generator' );
			}
		}

		// Register shortcodes
		foreach ( migfx_themeshortcodes_shortcodes() as $shortcode => $params ) {
			if ( $params['type'] != 'opengroup' && $params['type'] != 'closegroup' )
				add_shortcode( migfx_themeshortcodes_compatibility_mode_prefix() . $shortcode, 'migfx_themeshortcodes_' . $shortcode . '_shortcode' );
		}
	}

	add_action( 'init', 'migfx_themeshortcodes_plugin_init' );

	/**
	 * Returns current plugin version.
	 *
	 * @return string Plugin version
	 */
	function migfx_themeshortcodes_get_version() {
		if ( !function_exists( 'get_plugins' ) ) {
			require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		}
		$plugin_folder = get_plugins( '/' . plugin_basename( dirname( __FILE__ ) ) );
		$plugin_file = basename( ( __FILE__ ) );
		return $plugin_folder[$plugin_file]['Version'];
	}


	/**
	 * Shortcode names prefix in compatibility mode
	 *
	 * @return string Special prefix
	 */
	function migfx_themeshortcodes_compatibility_mode_prefix() {
		$prefix = ( get_option( 'migfx_themeshortcodes_compatibility_mode' ) == 'on' ) ? 'gn_' : '';
		return $prefix;
	}

	/**
	 * Hook to translate plugin information
	 */
	function migfx_themeshortcodes_add_locale_strings() {
		$strings = __( 'Shortcodes Ultimate', 'mig-fx' ) . __( 'Vladimir Anokhin', 'mig-fx' ) . __( 'Provides support for many easy to use shortcodes', 'mig-fx' );
	}

	/*
	 * Custom shortcode function for nested shortcodes support
	 */

	function migfx_themeshortcodes_do_shortcode( $content, $modifier ) {
		if ( strpos( $content, '[_' ) !== false ) {
			$content = preg_replace( '@(\[_*)_(' . $modifier . '|/)@', "$1$2", $content );
		}
		return do_shortcode( $content );
	}

	/**
	 * Disable auto-formatting for shortcodes
	 *
	 * @param string $content
	 * @return string Formatted content with clean shortcodes content
	 */
	function migfx_themeshortcodes_custom_formatter( $content ) {
		$new_content = '';

		// Matches the contents and the open and closing tags
		$pattern_full = '{(\[raw\].*?\[/raw\])}is';

		// Matches just the contents
		$pattern_contents = '{\[raw\](.*?)\[/raw\]}is';

		// Divide content into pieces
		$pieces = preg_split( $pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE );

		// Loop over pieces
		foreach ( $pieces as $piece ) {

			// Look for presence of the shortcode
			if ( preg_match( $pattern_contents, $piece, $matches ) ) {

				// Append to content (no formatting)
				$new_content .= $matches[1];
			} else {

				// Format and append to content
				$new_content .= wptexturize( wpautop( $piece ) );
			}
		}

		return $new_content;
	}

	/**
	 * Print custom CSS styles in wp_head
	 *
	 * @return string Custom CSS
	 */
	function migfx_themeshortcodes_print_custom_css() {
		if ( get_option( 'migfx_themeshortcodes_custom_css' ) ) {
			echo "\n<!-- Mig FX custom CSS - begin -->\n<style type='text/css'>\n" . str_replace( '%theme%', get_template_directory_uri(), get_option( 'migfx_themeshortcodes_custom_css' ) ) . "\n</style>\n<!-- Mig FX custom CSS - end -->\n\n";
		}
	}

	add_action( 'wp_head', 'migfx_themeshortcodes_print_custom_css' );

	/**
	 * Manage settings
	 */
	function migfx_themeshortcodes_manage_settings() {

		// Insert default CSS
		if ( !get_option( 'migfx_themeshortcodes_custom_css' ) ) {
			$default_css = '';
			update_option( 'migfx_themeshortcodes_custom_css', $default_css );
		}

		// Save main settings
		if ( isset( $_POST['save'] ) && $_GET['page'] == 'mig-fx' ) {
			update_option( 'migfx_themeshortcodes_disable_custom_formatting', $_POST['migfx_themeshortcodes_disable_custom_formatting'] );
			update_option( 'migfx_themeshortcodes_compatibility_mode', $_POST['migfx_themeshortcodes_compatibility_mode'] );
			update_option( 'migfx_themeshortcodes_disabled_scripts', $_POST['migfx_themeshortcodes_disabled_scripts'] );
			update_option( 'migfx_themeshortcodes_disabled_styles', $_POST['migfx_themeshortcodes_disabled_styles'] );
		}

		// Save custom css
		if ( isset( $_POST['save-css'] ) && $_GET['page'] == 'mig-fx' ) {
			update_option( 'migfx_themeshortcodes_custom_css', $_POST['migfx_themeshortcodes_custom_css'] );
		}
	}

	add_action( 'admin_init', 'migfx_themeshortcodes_manage_settings' );



	/**
	 * Print notification if options saved
	 */
	function migfx_themeshortcodes_save_notification() {

		// Save main settings
		if ( isset( $_POST['save'] ) && $_GET['page'] == 'mig-fx' ) {
			echo '<div class="updated"><p><strong>' . __( 'Settings saved', 'mig-fx' ) . '</strong></p></div>';
		}

		// Save custom css
		if ( isset( $_POST['save-css'] ) && $_GET['page'] == 'mig-fx' ) {
			echo '<div class="updated"><p><strong>' . __( 'Custom CSS saved', 'mig-fx' ) . '</strong></p></div>';
		}
	}

	/**
	 * Add generator button to Upload/Insert buttons
	 */
	function migfx_themeshortcodes_add_generator_button( $page = null, $target = null ) {
		echo '<a href="#TB_inline?width=640&height=600&inlineId=migfx-themeshortcodes-generator-wrap" class="thickbox" title="' . __( 'Insert shortcode', 'mig-fx' ) . '" data-page="' . $page . '" data-target="' . $target . '"><img src="' . get_template_directory_uri() . '/inc/FX-Shortcodes/images/admin/media-icon.png" alt="" /></a>';
	}

	add_action( 'media_buttons', 'migfx_themeshortcodes_add_generator_button', 100 );

	/**
	 * Generator popup box
	 */
	function migfx_themeshortcodes_generator_popup() {
		?>
		<div id="migfx-themeshortcodes-generator-wrap" style="display:none">
			<div id="migfx-themeshortcodes-generator">
				<div id="migfx-themeshortcodes-generator-shell">
					<div id="migfx-themeshortcodes-generator-header">
						<select id="migfx-themeshortcodes-generator-select" data-placeholder="<?php _e( 'Select shortcode', 'mig-fx' ); ?>" data-no-results-text="<?php _e( 'Shortcode not found', 'mig-fx' ); ?>">
							<option value="raw"></option>
							<?php
							foreach ( migfx_themeshortcodes_shortcodes() as $name => $shortcode ) {

								// Open optgroup
								if ( $shortcode['type'] == 'opengroup' )
									echo '<optgroup label="' . $shortcode['name'] . '">';

								// Close optgroup
								elseif ( $shortcode['type'] == 'closegroup' )
									echo '</optgroup>';

								// Option
								else
									echo '<option value="' . $name . '">' . strtoupper( $name ) . ':&nbsp;&nbsp;' . $shortcode['desc'] . '</option>';
							}
							?>
						</select>
						
					</div>
					<div id="migfx-themeshortcodes-generator-settings"></div>
					<input type="hidden" name="migfx-themeshortcodes-generator-url" id="migfx-themeshortcodes-generator-url" value="<?php echo get_template_directory_uri() .'/inc/FX-Shortcodes' ?>" />
					<input type="hidden" name="migfx-themeshortcodes-compatibility-mode-prefix" id="migfx-themeshortcodes-compatibility-mode-prefix" value="<?php echo migfx_themeshortcodes_compatibility_mode_prefix(); ?>" />
				</div>
			</div>
		</div>
		<?php
	}

	add_action( 'admin_footer', 'migfx_themeshortcodes_generator_popup' );
?>