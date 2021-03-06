<?php
/**
 * Plugin Name: juiz Last Tweet Widget
 * Plugin URI: http://www.creativejuiz.fr/blog/
 * Description: Adds a widget to your blog's sidebar to show your latest tweets. (XHTML-valid - No JS used to load tweets)
 * Author: Geoffrey Crofte
 * Author URI: http://crofte.fr
 * License: GPLv2 or later 
 */

/**
 * = 1.1.4 =
 * New function jltw( $args )
 * New function get_jltw ( $args );
 * Markup fix (remove ID 'juiz_last_tweet_tweetlist', it's a class now)
 * Conflict between your own CSS and default CSS fixed
 * Fix for an error message in WP Debug Mode at the first use of the widget
 *
 * = 1.1.3 =
 * New widget option : action links (Reply, Retweet, Favorite)
 * Better management of the cache system (try to preserve your tweets cached if Twitter clears its flow)
 * New hooks for developer
 * Optimization of hastag search link
 * Fix for a Notice PHP error in WP Debug Mode
 * Fix for shortcode (/!\ Use 0 and 1 instead of false and true now)
 *
 * = 1.1.2 =
 * Hastag Regexp updated (better multilingual compatibility)
 * Tested successfully on multiblog
 * Twitter Logo updated
 * Files encoding fixes
 * Little CSS update
 *
 * = 1.1.1 =
 * Little debug fix
 * HTML fix (bad markup at the end of tweet)
 *
 * = 1.1.0 =
 * BIG UPDATE
 * Correction in the date for PHP4 server
 * Add several hook (see the FAQ or documentation.html file)
 * Add a shortcode ([jltw])
 * Better control and switching of Twitter RSS feed
 * Better links parser
 * Some fixes with CSS (special case)
 * Turkish translation by Hakan (http://kazancexpert.com/)
 *
 * = 1.0.4 =
 * Optional autoslide tweets, one by one (use JavaScript)
 *
 * = 1.0.3 =
 * Bug fix for multiple Last Tweet Widgets
 * Bug fix for HTML tag display inside Tweets
 *
 * = 1.0.2 =
 * Bug fix for cache system (now uses the WP cache system)
 *
 * = 1.0.1 =
 * Bug fix for Twitter API limitation
 * Bug fix for disabling default CSS
 * You can now show your avatar
 *
 * = 1.0.0 =
 * Fix first version of cache
 *
 * = 1.0.0 beta =
 * Initial Release
 */
 
 /*

Copyright 2011 -  Geoffrey Crofte  (email : support@creativejuiz.com)

    
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

*/

define('mig_LTW_VERSION', '1.1.4');
define('mig_LTW_PLUGINBASENAME', dirname(plugin_basename(__FILE__)));
define('mig_LTW_PLUGINPATH', PLUGINDIR . '/' . mig_LTW_PLUGINBASENAME);


class mig_Last_Tweet_Widget extends WP_Widget {

	function mig_Last_Tweet_Widget() {
	
		// multilingual
		
		if(function_exists('load_plugin_textdomain')) {
			load_plugin_textdomain('mig_ltw', mig_LTW_PLUGINPATH . '/languages', mig_LTW_PLUGINBASENAME . '/languages');
		}
		
		// action links setting
		
		add_filter( 'plugin_action_links_'.plugin_basename( __FILE__ ), 'mig_ltw_plugin_action_links',  10, 2);
		function mig_ltw_plugin_action_links( $links, $file ) {
			$links[] = '<a href="'.admin_url('widgets.php').'">' . __('Widgets') .'</a>';
			return $links;
		}

		$widget_ops = array(
			'classname' => 'mig_last_tweet_widget',
			'description' => __('List you latest tweets by displaying content, date, and link to follow you', 'mig_ltw')
		);

		$control_ops = array();
		
		$this->WP_Widget('mig_last_tweet_widget', __('Evident Latest Tweets', 'mig_ltw'), $widget_ops, $control_ops);
	}

	function form($instance) {
	
		$instance = wp_parse_args((array) $instance, array(
			'mig_last_tweet_title' => '',
			'mig_last_tweet_username' => '',
			'mig_last_tweet_no_tweets' => '1',
			'mig_last_tweet_show_avatar' => false,
			'mig_last_tweet_cache_duration' => 0,
			'mig_last_tweet_default_css' => false,
			'mig_last_tweet_action_links' => false,
			'mig_last_tweet_auto_slide' => false,
			'mig_last_tweet_auto_slide_delay' => 0,
			'mig_last_tweet_own_css' => ''
		));
		
		$default_css_checked = $action_links_checked = $show_avatar_checked = $auto_slide_checked = ' checked="checked"';
		if ( $instance['mig_last_tweet_default_css'] == false )
			$default_css_checked = '';

		if ( $instance['mig_last_tweet_action_links'] == false )
			$action_links_checked = '';
			
		if ( $instance['mig_last_tweet_show_avatar'] == false )
			$show_avatar_checked = '';
			
		if ( $instance['mig_last_tweet_auto_slide'] == false )
			$auto_slide_checked = '';
			
			

		// Version of the plugin (hidden field)
		$jzoutput  = '<input id="' . $this->get_field_id('plugin-version') . '" name="' . $this->get_field_name('plugin-version') . '" type="hidden" value="' . mig_LTW_VERSION . '" />';

		// Title
		$jzoutput .= '
			<p style="border-bottom: 1px solid #DFDFDF;">
				<label for="' . $this->get_field_id('mig_last_tweet_title') . '"><strong>' . __('Title', 'mig_ltw') . '</strong></label>
			</p>
			<p>
				<input id="' . $this->get_field_id('mig_last_tweet_title') . '" name="' . $this->get_field_name('mig_last_tweet_title') . '" type="text" value="' . $instance['mig_last_tweet_title'] . '" />
			</p>
		';

		// Settings
		$jzoutput .= '
			<p style="border-bottom: 1px solid #DFDFDF;"><strong>' . __('Preferences', 'mig_ltw') . '</strong></p>
			
			<p>
				<label>' . __('Username', 'mig_ltw') . '<br />
				<span style="color:#999;">@</span><input id="' . $this->get_field_id('mig_last_tweet_username') . '" name="' . $this->get_field_name('mig_last_tweet_username') . '" type="text" value="' . $instance['mig_last_tweet_username'] . '" /> <abbr title="' . __('No @, just your username', 'mig_ltw') . '">(?)</abbr></label>
			</p>
			<p>F
				<label>' . __('Number of tweets to show', 'mig_ltw') . '<br />
				<input style="margin-left: 1em;" id="' . $this->get_field_id('mig_last_tweet_no_tweets') . '" name="' . $this->get_field_name('mig_last_tweet_no_tweets') . '" type="text" value="' . $instance['mig_last_tweet_no_tweets'] . '" /> <abbr title="' . __('Just a number, between 1 and 5 for example', 'mig_ltw') . '">(?)</abbr></label>
			</p>
			<p>
				<label>' . __('Duration of cache', 'mig_ltw') . '<br />
				<input style="margin-left: 1em; text-align:right;" id="' . $this->get_field_id('mig_last_tweet_cache_duration') . '" name="' . $this->get_field_name('mig_last_tweet_cache_duration') . '" type="text" size="10" value="' . $instance['mig_last_tweet_cache_duration'] . '" /> '.__('Seconds', 'mig_ltw').' <abbr title="' . __('A big number save your page speed. Try to use the delay between each tweet you make. (e.g. 1800 s = 30 min)', 'mig_ltw') . '">(?)</abbr></label>
			</p>
			<p>
				<label>' . __('Show your avatar?', 'mig_ltw') . ' 
				<input type="checkbox" name="' . $this->get_field_name('mig_last_tweet_show_avatar') . '" id="' . $this->get_field_id('mig_last_tweet_show_avatar') . '"'.$show_avatar_checked.' /> <abbr title="' . __("If it's possible, display your avatar at the top of tweets list", 'mig_ltw') . '">(?)</abbr></label>
			</p>
			<p>
				<label>' . __('Show action links?', 'mig_ltw') . ' 
				<input type="checkbox" name="' . $this->get_field_name('mig_last_tweet_action_links') . '" id="' . $this->get_field_id('mig_last_tweet_action_links') . '"'.$action_links_checked.' /> <abbr title="' . __("Display action links like Retweet, Reply and Fav", 'mig_ltw') . '">(?)</abbr></label>
			</p>
			<p>
				<label>' . __('Auto slide one by one?', 'mig_ltw') . ' 
				<input type="checkbox" name="' . $this->get_field_name('mig_last_tweet_auto_slide') . '" id="' . $this->get_field_id('mig_last_tweet_auto_slide') . '"'.$auto_slide_checked.' /> <abbr title="' . __("Use JavaScript to activate an little slider showing tweet by tweet", 'mig_ltw') . '">(?)</abbr></label>
			</p>
			<p>
				<label>' . __('Delay between 2 tweets?', 'mig_ltw') . ' 
				<input style="margin-left: 1em; text-align:right;" id="' . $this->get_field_id('mig_last_tweet_auto_slide_delay') . '" name="' . $this->get_field_name('mig_last_tweet_auto_slide_delay') . '" type="text" size="10" value="' . $instance['mig_last_tweet_auto_slide_delay'] . '" /> '.__('Seconds', 'mig_ltw').' <abbr title="' . __("Chose a delay if you use the auto slide feature.", 'mig_ltw') . '">(?)</abbr></label>
			</p>
		';
		
		// Default & Own CSS
		$jzoutput .= '
			<p style="border-bottom: 1px solid #DFDFDF;"><strong>' . __('Manage CSS', 'mig_ltw') . '</strong></p>
			
			<p>
				<label>' . __('Use the default CSS?', 'mig_ltw') . ' 
				<input type="checkbox" name="' . $this->get_field_name('mig_last_tweet_default_css') . '" id="' . $this->get_field_id('mig_last_tweet_default_css') . '"'.$default_css_checked.' /> <abbr title="' . __('Load a little CSS file with default styles for the widget', 'mig_ltw') . '">(?)</abbr></label>
			</p>
			<p>
				<label for="' . $this->get_field_id('mig_last_tweet_own_css') . '" style="display:inline-block;">' . __('Your own CSS', 'mig_ltw') . ':  <abbr title="' . __('Write your CSS here to replace or overwrite the default CSS', 'mig_ltw') . '">(?)</abbr></label>
				<textarea id="' . $this->get_field_id('mig_last_tweet_own_css') . '" rows="7" cols="30" name="' . $this->get_field_name('mig_last_tweet_own_css') . '">' . $instance['mig_last_tweet_own_css'] . '</textarea>
			</p>
		';
		
		echo $jzoutput;
	}

	function update($new_instance, $old_instance) {
		
		$instance = $old_instance;

		$new_instance = wp_parse_args((array) $new_instance, array(
			'mig_last_tweet_title' => '',
			'mig_last_tweet_username' => '',
			'mig_last_tweet_no_tweets' => '1',
			'mig_last_tweet_show_avatar' => false,
			'mig_last_tweet_cache_duration' => 0,
			'mig_last_tweet_default_css' => false,
			'mig_last_tweet_action_links' => false,
			'mig_last_tweet_auto_slide' => false,
			'mig_last_tweet_auto_slide_delay' => 0,
			'mig_last_tweet_own_css' => ''
		));

		$instance['plugin-version'] = strip_tags($new_instance['mig_last_tweet-version']);
		$instance['mig_last_tweet_title'] = strip_tags($new_instance['mig_last_tweet_title']);
		$instance['mig_last_tweet_username'] = strip_tags($new_instance['mig_last_tweet_username']);
		$instance['mig_last_tweet_no_tweets'] = strip_tags($new_instance['mig_last_tweet_no_tweets']);
		$instance['mig_last_tweet_show_avatar'] = strip_tags($new_instance['mig_last_tweet_show_avatar']);
		$instance['mig_last_tweet_cache_duration'] = $new_instance['mig_last_tweet_cache_duration'];
		$instance['mig_last_tweet_default_css'] = $new_instance['mig_last_tweet_default_css'];
		$instance['mig_last_tweet_action_links'] = $new_instance['mig_last_tweet_action_links'];
		$instance['mig_last_tweet_auto_slide'] = $new_instance['mig_last_tweet_auto_slide'];
		$instance['mig_last_tweet_auto_slide_delay'] = $new_instance['mig_last_tweet_auto_slide_delay'];
		$instance['mig_last_tweet_own_css'] = $new_instance['mig_last_tweet_own_css'];

		return $instance;
	}

	function widget($args, $instance) {
		extract($args);

		echo $before_widget;

		$title = (empty($instance['mig_last_tweet_title'])) ? '' : apply_filters('widget_title', $instance['mig_last_tweet_title']);

		if(!empty($title)) {
			echo $before_title . $title . $after_title;
		}

		echo $this->mig_last_tweet_output($instance, 'widget');
		echo $after_widget;
	}

	function mig_last_tweet_output($args = array(), $position) {
		
		
		$need_auto_slide_class = $data_delay = '';
		
		$the_username = $args['mig_last_tweet_username'];
		$the_username = preg_replace('#^@(.+)#', '$1', $the_username);
		$the_nb_tweet = $args['mig_last_tweet_no_tweets'];
		$need_cache = ($args['mig_last_tweet_cache_duration']!='0') ? true : false;
		$show_avatar = ($args['mig_last_tweet_show_avatar']) ? true : false;
		$show_action_links = ($args['mig_last_tweet_action_links']) ? true : false;
		

		if ( $the_nb_tweet > 1 ) {
			$need_auto_slide_class = ($args['mig_last_tweet_auto_slide']) ? ' mig_ltw_autoslide' : '';
			if($args['mig_last_tweet_auto_slide'])
				$data_delay = (intval($args['mig_last_tweet_auto_slide_delay']) == 0) ? ' data-delay="7"' : ' data-delay="'.$args['mig_last_tweet_auto_slide_delay'].'"';
		}


		
		/*
		 * change the default feed cache recreation period
		 */
		 
		if ( !function_exists ('mig_ltw_filter_handler') ) {
			function mig_ltw_filter_handler ( $seconds ) {
				return intval(30); //seconds
			}
		}
		add_filter( 'wp_feed_cache_transient_lifetime' , 'mig_ltw_filter_handler' ); 

		
		 
		if ( !function_exists('jltw_format_since')) {
			function jltw_format_since ( $date ) {
				
				$temp = strtotime($date);
				
				if($temp != -1)
					$timestamp = $temp;
				else {
					// often PHP4 fail
					return false;
					exit;
				}
				
				$the_date = '';
				$now = time();
				$diff = $now - $timestamp;
				
				if($diff < 60 ) {
					$the_date .= $diff.' ';
					$the_date .= ($diff > 1) ?  __('Seconds', 'mig_ltw') :  __('Second', 'mig_ltw');
				}
				elseif($diff < 3600 ) {
					$the_date .= round($diff/60).' ';
					$the_date .= (round($diff/60) > 1) ?  __('Minutes', 'mig_ltw') :  __('Minute', 'mig_ltw');
				}
				elseif($diff < 86400 ) {
					$the_date .=  round($diff/3600).' ';
					$the_date .= (round($diff/3600) > 1) ?  __('Hours', 'mig_ltw') :  __('Hour', 'mig_ltw');
				}
				else {
					$the_date .=  round($diff/86400).' ';
					$the_date .= (round($diff/86400) > 1) ?  __('Days', 'mig_ltw') :  __('Day', 'mig_ltw');
				}
			
				return $the_date;
			}
		}
		if ( !function_exists('jltw_format_tweettext')) {
			function jltw_format_tweettext($raw_tweet, $username) {

				$target4a = apply_filters('mig_ltw_target_attr', '_self'); // @filters

				$i_text = $raw_tweet;			
				//$i_text = htmlspecialchars_decode($raw_tweet);
				//$i_text = preg_replace('#(([a-zA-Z0-9_-]{1,130})\.([a-z]{2,4})(/[a-zA-Z0-9_-]+)?((\#)([a-zA-Z0-9_-]+))?)#','<a href="//$1">$1</a>',$i_text); 
				// replace tag
				$i_text = preg_replace('#\<([a-zA-Z])\>#','&lt;$1&gt;',$i_text);
				// replace ending tag
				$i_text = preg_replace('#\<\/([a-zA-Z])\>#','&lt;/$1&gt;',$i_text);
				// replace classic url
				$i_text = preg_replace('#(((https?|ftp)://(w{3}\.)?)(?<!www)(\w+-?)*\.([a-z]{2,4})(/[a-zA-Z0-9_\?\=-]+)?)#',' <a href="$1" rel="nofollow" class="mig_last_tweet_url" target="'.$target4a.'">$5.$6$7</a>',$i_text);
				// replace user link
				$i_text = preg_replace('#@([a-zA-z0-9_]+)#i','<a href="http://twitter.com/$1" class="mig_last_tweet_tweetos" rel="nofollow" target="'.$target4a.'">@$1</a>',$i_text);
				// replace hash tag search link ([a-zA-z0-9_] recently replaced by \S)
				$i_text = preg_replace('#[^&]\#(\S+)#i',' <a href="http://twitter.com/#!/search/?src=hash&amp;q=%23$1" class="mig_last_tweet_hastag" rel="nofollow" target="'.$target4a.'">#$1</a>',$i_text); // old url was : /search/%23$1
				// remove start username
				$i_text = preg_replace( '#^'.$username.': #i', '', $i_text );
				
				return $i_text;
			
			}
		}
		if ( !function_exists('jltw_format_tweetsource')) {
			function jltw_format_tweetsource($raw_source) {
			
				$target4a = apply_filters('mig_ltw_target_attr', '_self'); // @filters

				$i_source = htmlspecialchars_decode($raw_source);
				$i_source = preg_replace('#^web$#','<a href="http://twitter.com" rel="nofollow" target="'.$target4a.'">Twitter</a>', $i_source);
				
				return $i_source;
			
			}
		}
		if ( !function_exists('jltw_get_the_user_timeline')) {
			function jltw_get_the_user_timeline($username, $nb_tweets, $show_avatar, $show_action_links, $cache_delay) {

				$html_result = '';
				$cache_delay = ($cache_delay == 0 ) ? 1 : $cache_delay;
				
				// check if we have transient (cache of HTML)
				// for multiblog support, maybe use the get_current_blog_id() function to add it in option name ? or not...
				$current_timer = get_option( 'mig_ltw_timer_' . $username , false);
				
				if ( !$current_timer ) {
					// create option
					add_option('mig_ltw_html_' . $username, '', '', 'yes');
					add_option('mig_ltw_timer_' . $username, (time() + intval($cache_delay)), '', 'yes');
				}
				elseif ( $current_timer AND $current_timer > time() ) {
					// get the cached HTML
					$html_result = get_option( 'mig_ltw_html_' . $username, false );
				}
				
				// to find is cached html are tweets
				$is_tweet_cached = preg_match('#mig_lt_content#',$html_result) ? true : false;

				// if need update
				if (!$current_timer OR $current_timer <= time()) {

					$username = (empty($username)) ? 'geoffrey_crofte' : $username;
					$nb_tweets = (empty($nb_tweets) OR $nb_tweets == 0) ? 1 : $nb_tweets;
					$the_best_feed = '';
					
					// include of WP's feed functions
					include_once(ABSPATH . WPINC . '/feed.php');
					
					// some RSS feed with timeline user
					$search_feed1 = "http://search.twitter.com/search.rss?q=from%3A".$username."&rpp=".intval($nb_tweets);
					$search_feed2 = "http://api.twitter.com/1/statuses/user_timeline.rss?screen_name=".$username."&count=".intval($nb_tweets);

					
					// get the better feed
					// try with the first one
					
					$sf_rss = fetch_feed ( $search_feed1 );
					if ( is_wp_error($sf_rss) ) {
						// if first one is not ok, try with the second one
						$sf_rss = fetch_feed ( $search_feed2 );
						
						if ( is_wp_error($sf_rss) ) $the_best_feed = false;
						else $the_best_feed = '2';
					}
					else $the_best_feed = '1';
					
					// if one of them is readable, check if we have tweets (thank you Twitter =_=)
					if ( $the_best_feed ) {
						
						// in case of...
						// if we already have one tweet at least (finded with the mig_lt_content class), keep those tweet, don't show message error.
						$twitter_fail = $is_tweet_cached ? $html_result : __('Twitter has a problem with your RSS feed&hellip;', 'mig_ltw');
					
						$max_i = $sf_rss -> get_item_quantity($nb_tweets);
						
						// if the first feed return zero item, and if the feed is not already the second one, try with the second
						if ( $max_i == 0) {
							if ($the_best_feed!='2') {
								$sf_rss = fetch_feed ( $search_feed2 );
								
								if ( !is_wp_error($sf_rss) ) {
									$max_i = $sf_rss -> get_item_quantity($nb_tweets);
									if ( $max_i != 0 ) $the_best_feed = true;
									else {
										$html_result = $twitter_fail;
										$the_best_feed = false;
									}
								}
								else {
									$html_result = $twitter_fail;
									$the_best_feed = false;
								}
							}
							else {
								$html_result = $twitter_fail;
								$the_best_feed = false;
							}
						}
						
					}
					// end of big backup control
					
					
					// if one of the rss is readable
					if ( $the_best_feed ) {

						$rss_i = $sf_rss -> get_items(0, $max_i);
						
						$i = 0;
						foreach ( $rss_i as $tweet ) {
							$i++;
							$i_title = jltw_format_tweettext($tweet -> get_title() , $username);
							$i_creat = jltw_format_since( $tweet -> get_date() );
							
							$i_guid = $tweet->get_link();
							
							$author_tag = $tweet->get_item_tags('','author');
							$author_a = $author_tag[0]['data'];
							$author = substr($author_a, 0, stripos($author_a, "@") );
							
							$source_tag = $tweet->get_item_tags('http://api.twitter.com','source');
							$i_source = $source_tag[0]['data'];
							$i_source = jltw_format_tweetsource($i_source);
							$i_source = ($i_source) ? '<span class="mig_ltw_source">via ' . $i_source . '</span>' : '';
							
							if ( $the_best_feed == '1' && $show_avatar) {
								$avatar = "http://api.twitter.com/1/users/profile_image/". $username .".xml?size=normal"; // or bigger
							}
							elseif ($the_best_feed == '2' && $show_avatar) {
								$avatar_tag = $tweet->get_item_tags('http://base.google.com/ns/1.0','image_link');
								$avatar = $avatar_tag[0]['data'];
							}

							
							$html_avatar = $new_attrs = '';
							if ($i==1 && $show_avatar && $avatar) { 
								$avatar_attr = array(
									'title'		=> __('Follow', 'mig_ltw') . ' @'.$username.' ' . __('on twitter.', 'mig_ltw'),
									'href'		=> esc_url( 'http://twitter.com/' . $username ),
									'src'		=> esc_url( $avatar ),
									'alt'		=> $author,
									'width'		=> '48',
									'height'		=> '48'
								);
								
								$avatar_attr = apply_filters('mig_ltw_user_avatar_attr', $avatar_attr); // @filters
								if(isset($avatar_attr['attrs'])) {
									foreach ( $avatar_attr['attrs'] as $k=>$v)
										$new_attrs .= ' '.$k.'="'.$v.'"';  
								}
								
								$target4a = apply_filters('mig_ltw_target_attr', '_self'); // @filters

								$html_avatar = '<span class="user_avatar"><a href="'. $avatar_attr['href'] .'" title="' . $avatar_attr['title'] . '" target="'.$target4a.'"><img src="'. $avatar_attr['src'] .'" alt="'. $avatar_attr['alt'] .'" width="'.$avatar_attr['width'].'" height="'.$avatar_attr['height'].'"'.$new_attrs.' /></a></span>';
							}
							
							$html_avatar = apply_filters('mig_ltw_user_avatar', $html_avatar); // @filters
							
							
							//time ago filters
							$the_time_ago = array(
								'before'	=> __('Time ago', 'mig_ltw'),
								'after'		=> '',
								'content'	=> __('See the status', 'mig_ltw')
							);
							
							$the_time_ago = apply_filters('mig_ltw_time_ago', $the_time_ago); // @filters
							
							// for PHP4 fail with strtotime() function

							$target4a = apply_filters('mig_ltw_target_attr', '_self'); // @filters

							$time_ago = ($i_creat!=false) ?  $the_time_ago['before'] . ' <a href="'. esc_url( $i_guid ) .'" target="'.$target4a.'" title="'.$the_time_ago['content'].'">' . $i_creat . '</a>' . $the_time_ago['after'] : '<a href="'. esc_url( $i_guid ) .'" target="'.$target4a.'">' . $the_time_ago['content'] .'</a>';

							// action links
							
							$mig_tweet_id = preg_replace('#(((https?)://(w{3}\.)?)(?<!www)(\w+-?)*\.([a-z]{2,4})(/[a-zA-Z0-9_\?\=-]+)?(/[a-zA-Z0-9_\?\=-]+)?/([0-9]{10,}))#','$9',$i_guid);

							$html_action_links = '';
							if ($show_action_links) {
								$target4action_links = apply_filters('mig_ltw_target_action_links_attr', '_blank'); // @filters
								$html_action_links ='<span class="mig_action_links">
									<a title="'.__('Reply', 'mig_ltw').'" href="https://twitter.com/intent/tweet?in_reply_to='.$mig_tweet_id.'" class="mig_al_reply" rel="nofollow" target="'.$target4action_links.'">'.__('Reply', 'mig_ltw').'</a> <span class="mig_ltw_sep">-</span>
									<a title="'.__('Retweet', 'mig_ltw').'" href="https://twitter.com/intent/retweet?tweet_id='.$mig_tweet_id.'" class="mig_al_retweet" rel="nofollow" target="'.$target4action_links.'">'.__('Retweet', 'mig_ltw').'</a> <span class="mig_ltw_sep">-</span>
									<a title="'.__('Favorite', 'mig_ltw').'" href="https://twitter.com/intent/favorite?tweet_id='.$mig_tweet_id.'" class="mig_al_fav" rel="nofollow" target="'.$target4action_links.'">'.__('Favorite', 'mig_ltw').'</a> 
								</span>';
							}

							$li = 'li';
							$li = apply_filters('mig_ltw_each_item_tag', $li); // @filters
							
							$html_result_temp = '
								<'.$li.'>
									'.$html_avatar.'
									<span class="mig_lt_content">' . $i_title . '</span>
									<em class="mig_last_tweet_inner mig_last_tweet_metadata">  
										'.$time_ago .' '. $i_source .'
									</em>
									'.$html_action_links.'
								</'.$li.'>
							';
							
							$html_result .= apply_filters('mig_ltw_each_tweet', $html_result_temp); // @filters
						}
					}
					// if any feed is readable
					else {
						// if we already have tweets, don't use error message
						if( !$is_tweet_cached ) {
							$html_result = '<li><em>' . $html_result . ' '.__('The RSS feed for this twitter account is not loadable for the moment.', 'mig_ltw').'</em></li>';
						}
					}
					
					// set html cache options
					update_option( 'mig_ltw_html_' . $username , $html_result);
					update_option( 'mig_ltw_timer_' . $username , (time() + intval( $cache_delay )));
					
				} // end of "if need update"

				
				// at the end, return html content
				return $html_result;
			}
		}
			$ul = 'ul';
			$ul = apply_filters('mig_ltw_list_container_tag', $ul); // @filters
			
			// display the widget front content (but not immediatly because of cache system)
			$mig_ltw_all_tweets= '
				<div'.$data_delay.' class="mig_last_tweet_inside'.$need_auto_slide_class.'">
					<'.$ul.' class="mig_last_tweet_tweetlist">
						'. jltw_get_the_user_timeline($the_username, $the_nb_tweet, $show_avatar, $show_action_links, $args['mig_last_tweet_cache_duration']) .'
					</'.$ul.'>
					
					<p class="mig_last_tweet_follow_us">
						<span class="mig_ltw_follow">' . __('Follow', 'mig_ltw') . '</span>
						<a class="mig_ltw_username" href="' . esc_url( 'http://twitter.com/' . $the_username ) . '">@' . $the_username . '</a>
						<span class="mig_ltw_ontwitter">' . __('on twitter.', 'mig_ltw') . '</span>
					</p>
				</div>
			';

			// if JS slider is needed by widget
			if($need_auto_slide_class!='')
				wp_enqueue_script('mig_ltw_auto_slide', get_template_directory_uri().'/inc/latest-tweet/js/mig_ltw_auto_slide.min.js', array('jquery'), mig_LTW_VERSION);
			
			echo apply_filters('mig_ltw_content', $mig_ltw_all_tweets); // @filters
	} // end of output
	
} // end of Widget extend

add_action('widgets_init', create_function('', 'return register_widget("mig_Last_Tweet_Widget");'));

/**
 * Custom styles, <del>JS</del> and Shortcode
 */
 if(!is_admin()) {

	if(!function_exists('mig_last_tweet_head')) {
		function mig_last_tweet_head() {

			$mig_last_tweet_css = '';
			$use_default_css = $var_sOwnCSS = '';
			
			$array_widgetOptions = get_option('widget_mig_last_tweet_widget');
			
			if(is_array($array_widgetOptions)) {
				foreach($array_widgetOptions as $key => $value) {
					if($value['mig_last_tweet_own_css'])
						$var_sOwnCSS = $value['mig_last_tweet_own_css'];
					if($value['mig_last_tweet_default_css']) {
						$use_default_css = $value['mig_last_tweet_default_css'];
					}
				}
				
				if ( $use_default_css )
					// wp_enqueue_style() adds the style in the footer of document... why ? Oo
					$mig_last_tweet_css .= '<link type="text/css" media="all" rel="stylesheet" id="mig_last_tweet_widget_styles" href="'. get_template_directory_uri().'/inc/latest-tweet/css/mig_last_tweet.css' . '" />';

				if ( $var_sOwnCSS != '' ) {
					$mig_last_tweet_css .= '
						<style type="text/css">
							<!--
							'  . $var_sOwnCSS . '
							-->
						</style>
					';
				}
			}
			echo $mig_last_tweet_css;
		}
	}
	if(!function_exists('mig_last_tweet_footer')) {
		function mig_last_tweet_footer() {
			$var_custom_mig_scripts = "\n\n".'<!-- No script for mig Last Tweet Widget :) -->'."\n\n";
			echo $var_custom_mig_scripts;
		}
	}
 
	// custom head and footer
	add_action('wp_head', 'mig_last_tweet_head');
	add_action('wp_footer', 'mig_last_tweet_footer');
	
	
	
	/*
	 * Add shortcode
	 */
	if ( !function_exists('sc_4_jltw')) {
		function sc_4_jltw($atts) {
		
			global $wp_widget_factory;
			
			extract(shortcode_atts(array(
				'username' 	=> 'geoffrey_crofte',
				'nb' 		=> '1',
				'avatar' 	=> 0, // false
				'cache' 	=> 0,
				'transition'=> 0, // false
				'delay'		=> 0,
				'links'		=> 0 // false
			), $atts));
			
			$username 		= esc_html($username);
			$nb_of_tw		= esc_html($nb);
			$use_avatar		= esc_html($avatar);
			$cache_duration = esc_html($cache);
			$transition		= esc_html($transition);
			$delay			= esc_html($delay);
			$links			= esc_html($links);
			
			
			
			$instance['mig_last_tweet_username'] 			= $username;
			$instance['mig_last_tweet_no_tweets'] 			= $nb_of_tw;
			$instance['mig_last_tweet_show_avatar']		= ($use_avatar==1) ? true : false;
			$instance['mig_last_tweet_cache_duration'] 	= $cache_duration;
			$instance['mig_last_tweet_auto_slide']			= ($transition==1) ? true : false;
			$instance['mig_last_tweet_auto_slide_delay']	= $delay;
			$instance['mig_last_tweet_action_links']		= ($links==1) ? true : false;
			
			$widget_name = "mig_Last_Tweet_Widget";
			
			if (!is_a($wp_widget_factory->widgets[$widget_name], 'WP_Widget')):
				$wp_class = 'WP_Widget_'.ucwords(strtolower($class));
				
				if (!is_a($wp_widget_factory->widgets[$wp_class], 'WP_Widget')):
					return '<p>'.sprintf(__("%s: Widget class not found.", "mig_ltw"),'<strong>'.$class.'</strong>').'</p>';
				else:
					$class = $wp_class;
				endif;
			endif;
			
			ob_start();
			the_widget($widget_name, $instance, array('widget_id'=>'arbitrary-instance-'.$id,
				'before_widget' => '',
				'after_widget' => '',
				'before_title' => '',
				'after_title' => ''
			));
			$output = ob_get_contents();
			ob_end_clean();
			return $output;
		}
	}
	add_shortcode('jltw','sc_4_jltw'); 
	
	if( !function_exists('jltw') ) {
		function jltw( $args ) {
			echo get_jltw( $args );
		}
	}
	if( !function_exists('get_jltw') ) {
		function get_jltw ($args = array('username'=>'geoffrey_crofte', 'nb_tweets'=>1, 'avatar'=>false, 'cache'=>120, 'transition'=>false, 'delay'=>8, 'links'=>true)) {
		
			$avatar 	= $args['avatar'] 		? 1 : 0;
			$transition = $args['transition']	? 1 : 0;
			$links 		= $args['links']		? 1 : 0;

			return do_shortcode('[jltw username="'.$args['username'].'" nb="'.$args['nb_tweets'].'" avatar="'.$avatar.'" cache="'.$args['cache'].'" transition="'.$transition.'" delay="'.$args['delay'].'" links="'.$links.'"]');

		}
	}
	
}
?>