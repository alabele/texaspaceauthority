<?php
 /*
	Plugin Name: Flickr Badges Widget
	Plugin URI: http://zourbuth.com/archives/500/flickr-badge-widget/
	Description: Display your Flickr latest photostream in widget area using javascript. Easy to customize, just put your Flickr id and your widget ready to lunch. 
	Version: 1.2.3
	Author: zourbuth
	Author URI: http://zourbuth.com
	License: Under GPL2
 
	Copyright 2012 zourbuth (email : zourbuth@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/* Launch the plugin. */
add_action( 'after_setup_theme', 'mig_flickr_badges_widget_plugins_loaded' );

/* Initializes the plugin and it's features. */
function mig_flickr_badges_widget_plugins_loaded() {

	// Set constant path to the members plugin directory
	define( 'FLICKR_BADGES_WIDGET_VERSION', '1.2.3' );
	define( 'FLICKR_BADGES_WIDGET_DIR',TEMPLATEPATH . '/inc/widgets/flickr/' );
	define( 'FLICKR_BADGES_WIDGET_URL',get_template_directory_uri() . '/inc/widgets/flickr/' );

	// Loads and registers the new widgets
	add_action( 'widgets_init', 'mig_flickr_badges_widget_init' );
}

/* Register the extra widgets. Each widget is meant to replace or extend the current default  */
function mig_flickr_badges_widget_init() {

	/* Load widget file. */
	require_once( FLICKR_BADGES_WIDGET_DIR . 'flickr-badges-widget.php' );

	/* Register widget. */
	register_widget( 'Flickr_Badges_Widget' );
}
?>