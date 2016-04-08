<?php
/*
Plugin Name: Demo Admin Page
Plugin URI: http://en.bainternet.info
Description: My Admin Page Class usage demo
Version: 1.2.4
Author: Bainternet, Ohad Raz
Author URI: http://en.bainternet.info
*/



  //include the main class file
  require_once("admin-page-class/themeoptions.php");
  
  /**
   * configure your admin page
   */
  $config = array(    
		'menu'=> array('Theme Options', 'theme-options'),             //sub page to settings page
		'page_title' => __('Theme Options','apc'),       //The name of this page 
		'capability' => 'edit_themes',         // The capability needed to view the page 
		'option_group' => ''.$themeprefix.'theme_options',       //the name of the option to create in the database
		'id' => ''.$themeprefix.'admin_page',            // meta box id, unique per page
		'fields' => array(),            // list of fields (can be added by field arrays)
		'local_images' => false,          // Use local or hosted images (meta box images for add/remove)
		'use_with_theme' => true,
		'position' => 34,
  );  
  
  
  /**
   * Initiate your admin page
   */
  $options_panel = new BF_Admin_Page_Class($config);
  $options_panel->OpenTabs_container('');
  
  /**
   * define your admin page tabs listing
   */
  $options_panel->TabsListing(array(
    'links' => array(
	'general_options' => __('General Options', 'apc'),
	'typography_options' => __('Typography Options', 'apc'),
    'header_options' =>  __('Header Options','apc'),
	'topbar_options' =>  __('Top Bar Contact','apc'),
	'menu_options' =>  __('Menu Options','apc'),
	'blog_options' =>  __('Blog Options','apc'),
	'post_types_options' =>  __('Custom Posts Options','apc'),
	'sidebar_options' =>  __('Sidebar Options','apc'),
	'footer_options' =>  __('Footer Options','apc'),
	'social_options' =>  __('Social Options','apc'),
	'contactform_options' =>  __('Contact Form','apc'),
	'customcss_options' =>  __('Custom CSS','apc'),
	'analytics_options' =>  __('Google Analytics','apc'),
    )
  ));
  
  /*****************************
   * Open admin page General tab
   *****************************/
   
  $options_panel->OpenTab('general_options');
  $options_panel->Title(__("General Options","apc"));
  $options_panel->addColor(''.$themeprefix.'body_background_color',array('name'=> __('Body Background Color','apc'), 'std' => '#eaeaea', 'desc' => __('General background of website.','apc')));
  $options_panel->addSelect(''.$themeprefix.'general_body_pattern',$patterns,array('name'=> __('Body Background Pattern Image','apc'), 'std'=> array('subtlenet'), 'desc' => __('','apc')));
  $options_panel->addColor(''.$themeprefix.'main_color',array('name'=> __('Main Color','apc'), 'std' => '#fcc500',  'desc' => __('Main color for general details of website','apc')));
  $options_panel->addColor(''.$themeprefix.'link_color',array('name'=> __('Link Color','apc'), 'std' => '#fcc500', 'desc' => __('','apc')));
  $options_panel->addColor(''.$themeprefix.'link_hover_color',array('name'=> __('Link Hover Color','apc'), 'std' => '#ff7b00', 'desc' => __('Color of links when mouse pass over','apc')));
  $options_panel->addSelect(''.$themeprefix.'general_body_lineheight',array('1.4em' => '1.4', '1.5em' => '1.5', '1.6em' => '1.6', '1.7em' => '1.7', '1.8em' => '1.8', '1.9em' => '1.9', '2.0em' => '2.0', '2.1em' => '2.1', '2.2em' => '2.2', ),array('name'=> __('Body Line Height','apc'), 'std'=> array('1.7em'), 'desc' => __('Space Between Lines of Text','apc')));
  $options_panel->CloseTab();
  
  
  /*****************************
   * Open admin page Typography tab
   *****************************/
   
  $options_panel->OpenTab('typography_options');
  $options_panel->Title(__("Typography Options Options","apc"));
  $options_panel->addTypo(''.$themeprefix.'menu_typo',array('name' => __("Menu Font","apc"),'std' => array('size' => '16px', 'color' => '#777777', 'face' => 'Roboto Condensed', 'style' => 'normal'), 'desc' => __('Size, Family Font, Weight, Style, Color','apc')));
  $options_panel->addTypo(''.$themeprefix.'titles_typo',array('name' => __("Titles Font","apc"),'std' => array('size' => '14px', 'color' => '#222222', 'face' => 'Arvo', 'style' => 'normal'), 'desc' => __('','apc')));
  $options_panel->addTypo(''.$themeprefix.'body_typo',array('name' => __("Content Font","apc"),'std' => array('size' => '13px', 'color' => '#777777', 'face' => 'Open Sans', 'style' => 'normal'), 'desc' => __('','apc')));
  $options_panel->CloseTab();
  
  /*****************************
   * Open admin page Header tab
   *****************************/
   
  
   
  $options_panel->OpenTab('header_options');
  $options_panel->Title(__("Header Options","apc"));
  $options_panel->addImage(''.$themeprefix.'logo',array('name'=> __('Main Logo','apc'),'preview_height' => 'auto', 'preview_width' => '240px', 'desc' => __('','apc')));
  $options_panel->addImage(''.$themeprefix.'favicon',array('name'=> __('Favicon','apc'),'preview_height' => '16px', 'preview_width' => '16px', 'desc' => __('Icon used on browser tabs','apc')));
  $options_panel->addColor(''.$themeprefix.'header_background',array('name'=> __('Header Background Color','apc'), 'std' => '#ffffff', 'desc' => __('','apc')));
  $options_panel->addColor(''.$themeprefix.'header_tagline_color',array('name'=> __('Tagline Color','apc'), 'std' => '#afafaf', 'desc' => __('Tagline Below the Main Logo','apc')));
  $options_panel->Title(__("Header top Bar Options","apc"));
  $options_panel->addColor(''.$themeprefix.'top_background',array('name'=> __('Top Bar Background','apc'), 'std' => '#ffffff',  'desc' => __('Background color of top bar','apc')));
  $options_panel->addColor(''.$themeprefix.'top_color',array('name'=> __('Top Bar Text Color','apc'), 'std' => '#8e8e8e',  'desc' => __('','apc')));
  $options_panel->Title(__("Header Bottom Bar Options","apc"));
  $options_panel->addColor(''.$themeprefix.'header_bottom_bar',array('name'=> __('Header Bottom Bar Background','apc'), 'std' => '#fafafa',  'desc' => __('','apc')));
  $options_panel->addColor(''.$themeprefix.'header_bottom_bar_border',array('name'=> __('Bottom Border Color','apc'), 'std' => '#e0e0e0',  'desc' => __('','apc')));  
  $options_panel->CloseTab();
  
  
   /*****************************
   * Open Top Bar tab
   *****************************/
   
  $options_panel->OpenTab('topbar_options');
  $options_panel->Title(__("Top Bar Icons","apc"));
  $options_panel->addSelect(''.$themeprefix.'contact_icon_one',$topbaricons,array('name'=> __('Icon Type','apc'), 'std'=> array('selectkey2'), 'desc' => __('','apc'), 'group' => 'start'));
  $options_panel->addText(''.$themeprefix.'contact_info_one',array('name'=> __('URL','apc'), 'group' => 'end'));
  $options_panel->addSelect(''.$themeprefix.'contact_icon_two',$topbaricons,array('name'=> __('Icon Type','apc'), 'std'=> array('selectkey2'), 'desc' => __('','apc'), 'group' => 'start'));
  $options_panel->addText(''.$themeprefix.'contact_info_two',array('name'=> __('URL','apc'), 'group' => 'end'));
  $options_panel->addSelect(''.$themeprefix.'contact_icon_three',$topbaricons,array('name'=> __('Icon Type','apc'), 'std'=> array('selectkey2'), 'desc' => __('','apc'), 'group' => 'start'));
  $options_panel->addText(''.$themeprefix.'contact_info_three',array('name'=> __('URL','apc'), 'group' => 'end'));
  $options_panel->CloseTab();
  
  /*****************************
   * Open admin page Menu tab
   *****************************/
   
  $options_panel->OpenTab('menu_options');
  $options_panel->Title(__("Menu Options","apc"));
  $options_panel->addColor(''.$themeprefix.'menu_hover_background',array('name'=> __('Menu Hover Background Color','apc'), 'std' => '#fcc500',  'desc' => __('Background color of menu buttons when mouse pass over','apc')));
  $options_panel->addColor(''.$themeprefix.'menu_hover_textcolor',array('name'=> __('Menu Hover Text Color','apc'), 'std' => '#fcc500',  'desc' => __('Text color of menu buttons when mouse pass over','apc')));
  $options_panel->addColor(''.$themeprefix.'submenu_background',array('name'=> __('Submenu Background','apc'), 'std' => '#fafafa',  'desc' => __('background color of submenu buttons when mouse pass over','apc')));
  $options_panel->addColor(''.$themeprefix.'submenu_background_hover',array('name'=> __('Submenu Background Hover','apc'), 'std' => '#fcc500',  'desc' => __('background color when mouse pass over','apc')));
  $options_panel->addColor(''.$themeprefix.'submenu_text_color',array('name'=> __('Submenu Text Color','apc'), 'std' => '#7c7c7c',  'desc' => __('','apc')));
  $options_panel->CloseTab();
 
  
  /*****************************
   * Open admin page Blog tab
   *****************************/
   
  $options_panel->OpenTab('blog_options');
  $options_panel->Title(__("Blog Options","apc"));
  $options_panel->addText(''.$themeprefix.'blog_title',array('name'=> __('Post List Title','apc')));
  $options_panel->addText(''.$themeprefix.'blog_subtitle',array('name'=> __('Post List Subtitle','apc')));
  $options_panel->addColor(''.$themeprefix.'blog_title_color',array('name'=> __('Blog Titles Color','apc'), 'std' => '#444444', 'desc' => __('','apc')));
  $options_panel->addSelect(''.$themeprefix.'blog_sidebar',array('right' => 'Right', 'left' => 'Left'),array('name'=> __('Sidebar Position','apc'), 'std'=> array('right'), 'desc' => __('','apc')));
  $options_panel->CloseTab();
  
   /*****************************
   * Open admin page Post types tab
   *****************************/
   
  $options_panel->OpenTab('post_types_options');
  $options_panel->Title(__("Portfolio Options","apc"));
  $options_panel->addText(''.$themeprefix.'portfolio_pagination',array('name'=> __('Number of projects to display for page ','apc')));
  $options_panel->addSelect(''.$themeprefix.'portfolio_category_filter',array('yes' => 'Yes', 'no' => 'No'),array('name'=> __('Use category filter','apc'), 'std'=> array('yes'), 'desc' => __('','apc')));
  $options_panel->Title(__("Members Options","apc"));
  $options_panel->addText(''.$themeprefix.'members_pagination',array('name'=> __('Number of members to display for page ','apc')));
  $options_panel->Title(__("Gallery Options","apc"));
  $options_panel->addText(''.$themeprefix.'gallery_pagination',array('name'=> __('Number of Images to display for page ','apc')));
  $options_panel->CloseTab();
  
   /*****************************
   * Open admin page Sidebar tab
   *****************************/
   
  $options_panel->OpenTab('sidebar_options');
  $options_panel->Title(__("Sidebar Options","apc")); 
  $options_panel->addColor(''.$themeprefix.'sidebar_title_color',array('name'=> __('Title Color','apc'), 'std' => '#444444',  'desc' => __('Text color of sidebar titles','apc')));
  $options_panel->addColor(''.$themeprefix.'sidebar_text_color',array('name'=> __('Text Color','apc'), 'std' => '#777777',  'desc' => __('Color of content text','apc')));
  $options_panel->CloseTab();
  
  /*****************************
   * Open admin page Footer tab
   *****************************/
   
  $options_panel->OpenTab('footer_options');
  $options_panel->Title(__("Footer Options","apc"));
  $options_panel->addColor(''.$themeprefix.'footer_background_color',array('name'=> __('Background Color','apc'), 'std' => '#424242',  'desc' => __('','apc')));
  $options_panel->addColor(''.$themeprefix.'footer_title_color',array('name'=> __('Titles Color','apc'), 'std' => '#efefef',  'desc' => __('','apc')));
  $options_panel->addColor(''.$themeprefix.'footer_text_color',array('name'=> __('Text Content Color','apc'), 'std' => '#bbbbbb',  'desc' => __('','apc')));
  $options_panel->addColor(''.$themeprefix.'bottom_background_color',array('name'=> __('Bottom Bar Background Color','apc'), 'std' => '#424242',  'desc' => __('','apc')));
  $options_panel->addImage(''.$themeprefix.'bottom_image',array('name'=> __('Bottom Bar Image','apc'),'preview_height' => 'auto', 'preview_width' => '240px', 'desc' => __('','apc')));
  $options_panel->addText(''.$themeprefix.'bottom_info',array('name'=> __('Bottom Bar Info','apc')));
  $options_panel->CloseTab();
  
  /*****************************
   * Open admin page Social tab
   *****************************/
   
  $options_panel->OpenTab('social_options');
  $options_panel->Title(__("Social Icons","apc"));
  $repeater_fields_social[] = $options_panel->addSelect('re_socialicon',$socialicons,array('name'=> __('Icon Type','apc'), 'std'=> array('selectkey2'), 'desc' => __('','apc')), true);
  $repeater_fields_social[] = $options_panel->addText('re_socialurl',array('name'=> __('URL','apc')),true);
  $repeater_fields_social[] = $options_panel->addSelect('re_socialopen',array('_blank'=>'New Window','_self'=>'Self Window'),array('name'=> __('Open','apc'), 'std'=> array('selectkey2'), 'desc' => __('','apc')), true);
  $options_panel->addRepeaterBlock(''.$themeprefix.'social_re_',array('sortable' => true, 'inline' => true, 'name' => __('Social Icons','apc'),'fields' => $repeater_fields_social, 'desc' => __('Add Icon','apc')));
  $options_panel->CloseTab();
  
   /*****************************
   * Open admin page Contact Form tab
   *****************************/
   
  $options_panel->OpenTab('contactform_options');
  $options_panel->Title(__("Contact Form","apc"));
  $options_panel->addText(''.$themeprefix.'contact_image_title',array('name'=> __('Image Title','apc')));
  $options_panel->addImage(''.$themeprefix.'contact_image',array('name'=> __('Contact Main Image','apc'),'preview_height' => 'auto', 'preview_width' => '240px', 'desc' => __('','apc')));
  $options_panel->addCode(''.$themeprefix.'contact_map_address',array('name'=> __('Google Map Address','apc'), 'syntax' => 'html', 'desc' => 'Go to <a target="_new" href="http://maps.google.com/">Google Maps</a> , insert an address, click on the link icon, copy the code that starts with "iframe....." and paste here.'));
  $options_panel->addText(''.$themeprefix.'contact_info_title',array('name'=> __('Info Title','apc')));
  $options_panel->addWysiwyg(''.$themeprefix.'contact_info_content',array('name'=> __('Contact Info ','apc'), 'desc' => __('Aditional Info Field','apc')));
  
  $options_panel->CloseTab();
  
  /*****************************
   * Open admin page Custom CSS tab
   *****************************/
   
  $options_panel->OpenTab('customcss_options');
  $options_panel->Title(__("Custom CSS","apc"));
  $options_panel->addCode(''.$themeprefix.'custom_css',array('name'=> __('Custom CSS ','apc'), 'syntax' => 'html', 'desc' => __('Insert valid Custom CSS Rules','apc')));
  $options_panel->CloseTab();
  
   /*****************************
   * Open admin page Others tab
   *****************************/
   
  $options_panel->OpenTab('analytics_options');
  $options_panel->Title(__("Analytics Options","apc"));
  $options_panel->addCode(''.$themeprefix.'google_analytics',array('name'=> __('Google Analytics Tracking Code ','apc'), 'syntax' => 'html', 'desc' => __('Insert a valid google analytics tracking code','apc')));
  $options_panel->CloseTab();

  //Now Just for the fun I'll add Help tabs
  $options_panel->HelpTab(array(
    'id'=>'tab_id',
    'title'=> __('My help tab title','apc'),
    'content'=>'<p>'.__('This is my Help Tab content','apc').'</p>'
  ));
  $options_panel->HelpTab(array(
    'id' => 'tab_id2',
    'title' => __('My 2nd help tab title','apc'),
    'callback' => 'help_tab_callback_demo'
  ));
  
  //help tab callback function
  function help_tab_callback_demo(){
    echo '<p>'.__('This is my 2nd Help Tab content from a callback function','apc').'</p>';
  }