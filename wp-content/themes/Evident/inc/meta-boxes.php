<?php
global $socialicons;

//include the main class file
require_once("meta-box-class/my-meta-box-class.php");
if (is_admin()){
 

  

  $config = array(
    'id' => ''.$themeprefix.'slideshow_metabox',         
    'title' => 'Slideshow',          
    'pages' => array('slideshow'),    
    'context' => 'normal',           
    'priority' => 'high',            
    'fields' => array(),           
    'local_images' => false,        
    'use_with_theme' => true         
  );
  
/*================================== Slides parameters ===============================================*/


  $my_meta =  new AT_Meta_Box($config);

  $repeater_fields_slideshow[] = $my_meta->addText($metaboxprefix.'re_slideshow_caption_title',array('name'=> 'Caption Title'),true);
  $repeater_fields_slideshow[] = $my_meta->addTextarea($metaboxprefix.'re_slideshow_caption_content',array('name'=> 'Caption Content '),true);
  $repeater_fields_slideshow[] = $my_meta->addImage($metaboxprefix.'re_slideshow_image',array('name'=> 'Slide Image'),true);
  $repeater_fields_slideshow[] = $my_meta->addSelect($metaboxprefix.'re_slideshow_captionalignment',array('captiontopleft'=>'Top Left','captiontopright'=>'Top Right', 'captionmiddleleft'=>'Middle Left', 'captionmiddleright'=>'Middle Right','captionbottomleft'=>'Bottom Left', 'captionbottomright'=>'Bottom Right', 'captiontop'=>'Top', 'captionbottom'=>'Bottom'),array('name'=> 'Caption Alignment ', 'std'=> array('captionmiddleleft')), true);
  $repeater_fields_slideshow[] = $my_meta->addPosts($metaboxprefix.'re_slideshow_imagelink',array('post_type' => array('page', 'post')),array('name'=> 'Image Link'), true);
  $my_meta->addRepeaterBlock($metaboxprefix.'slides_',array('inline' => true, 'name' => 'Add Slides','fields' => $repeater_fields_slideshow, 'sortable'=> true));
  $my_meta->Finish();


/*================================== Slideshow config parameters ===============================================*/
   $config = array(
    'id' => ''.$themeprefix.'slideshow_metabox_config',         
    'title' => 'Slideshow Parameters',         
    'pages' => array('slideshow'),     
    'context' => 'side',           
    'priority' => 'low',          
    'fields' => array(),           
    'local_images' => false,       
    'use_with_theme' => true       
  );
  
  $my_meta1 =  new AT_Meta_Box($config);

  $my_meta1->addSelect($metaboxprefix.'slideshow_effect',array('fade'=>'Fade','slide'=>'Slide'),array('name'=> 'Effect ', 'std'=> array('slide')));
  $my_meta1->addSelect($metaboxprefix.'slideshow_transition',array('100'=>'0.1s','200'=>'0.2s','300'=>'0.3s','400'=>'0.4s','500'=>'0.5s','600'=>'0.6s','700'=>'0.7s','800'=>'0.8s','900'=>'0.9s','1000'=>'1s'),array('name'=> 'Transition Time ', 'std'=> array('700')));
  $my_meta1->addSelect($metaboxprefix.'slideshow_duration',array('1000'=>'1s','2000'=>'2s','3000'=>'3s','4000'=>'4s','5000'=>'5s','6000'=>'6s','7000'=>'7s','8000'=>'8s','9000'=>'9s','10000'=>'10s'),array('name'=> 'Duration of Slide ', 'std'=> array('6000')));
  $my_meta1->addSelect($metaboxprefix.'slideshow_pagination',array('yes'=>'yes','no'=>'no'),array('name'=> 'Use pagination ', 'std'=> array('yes')));
  $my_meta1->addSelect($metaboxprefix.'slideshow_title_size',$percentsizes,array('name'=> 'Titles Size ', 'std'=> array('250%')));
  $my_meta1->addColor($metaboxprefix.'slideshow_title_background',array('name'=> 'Title Background Color', 'std' => '#193f54'));
  $my_meta1->addSelect($metaboxprefix.'slideshow_titlebackground_opacity',array('1'=>'1','0.9'=>'0.9', '0.8'=>'0.8', '0.7'=>'0.7', '0.6'=>'0.6', '0.5'=>'0.5', '0.4'=>'0.4', '0.3'=>'0.3', '0.2'=>'0.2', '0.1'=>'0.1', '0'=>'0'),array('name'=> 'Title Background Opacity ', 'std'=> array('0.6')));
  $my_meta1->addColor($metaboxprefix.'slideshow_title_textcolor',array('name'=> 'Title Text Color', 'std' => '#ffffff'));
  $my_meta1->addSelect($metaboxprefix.'slideshow_caption_text_size',$percentsizes,array('name'=> 'Caption Text Size', 'std'=> array('130%')));
  $my_meta1->addColor($metaboxprefix.'slideshow_caption_background',array('name'=> 'Caption Background Color', 'std' => '#193f54'));
  $my_meta1->addColor($metaboxprefix.'slideshow_caption_border',array('name'=> 'Caption Border Color', 'std' => '#fcc500'));
  $my_meta1->addSelect($metaboxprefix.'slideshow_captionbackground_opacity',array('1'=>'1','0.9'=>'0.9', '0.8'=>'0.8', '0.7'=>'0.7', '0.6'=>'0.6', '0.5'=>'0.5', '0.4'=>'0.4', '0.3'=>'0.3', '0.2'=>'0.2', '0.1'=>'0.1', '0'=>'0'),array('name'=> 'Caption Background Opacity ', 'std'=> array('0.6')));
  $my_meta1->addColor($metaboxprefix.'slideshow_caption_textcolor',array('name'=> 'Content Text Color', 'std' => '#ffffff'));
  $my_meta1->addColor($metaboxprefix.'slideshow_nav_icon_color',array('name'=> 'Nav Icon Color', 'std' => '#ffffff'));
  $my_meta1->addColor($metaboxprefix.'slideshow_nav_icon_background',array('name'=> 'Nav Icon Background Color', 'std' => '#fcc500'));
  $my_meta1->addSelect($metaboxprefix.'slideshow_nav_opacity',array('1'=>'1','0.9'=>'0.9', '0.8'=>'0.8', '0.7'=>'0.7', '0.6'=>'0.6', '0.5'=>'0.5', '0.4'=>'0.4', '0.3'=>'0.3', '0.2'=>'0.2', '0.1'=>'0.1', '0'=>'0'),array('name'=> 'Nav Buttons Opacity ', 'std'=> array('0.9')));
  $my_meta1->Finish();
  
/*================================== Slideshow Select Metabox ===============================================*/

$config = array(
    'id' => ''.$themeprefix.'selectslideshow_metabox',          
    'title' => 'Slideshow',        
    'pages' => array('page', 'post', 'portfolio', 'members'),    
    'context' => 'normal',          
    'priority' => 'high',         
    'fields' => array(),           
    'local_images' => false,         
    'use_with_theme' => true        
  );
  
  
  $my_meta2 =  new AT_Meta_Box($config);
  $my_meta2->addSelect($metaboxprefix.'slideshow_display_slideshow',array('no' => 'no', 'yes' => 'yes'),array('name'=> 'Display Slideshow?', 'std'=> array('no'), 'group' => 'start'));
  $my_meta2->addPosts($metaboxprefix.'slideshow_select',array('post_type' => array('slideshow')),array('name'=> 'Select slideshow', 'group' => 'end'));
  $my_meta2->Finish();
  
  
/*================================== Post Types Layout ===============================================*/

$config = array(
    'id' => ''.$themeprefix.'post_types_layout_metabox',          
    'title' => 'Post Types Layout',        
    'pages' => array('page'),    
    'context' => 'side',          
    'priority' => 'default',         
    'fields' => array(),           
    'local_images' => false,         
    'use_with_theme' => true        
  );
  
  
  $my_meta3 =  new AT_Meta_Box($config);
  $my_meta3->addSelect($metaboxprefix.'layout_aspect_ratio',array('square' => 'Portrait', 'landscape' => 'Landscape'),array('name'=> 'Aspect Ratio', 'std'=> array('0.6')));
  $my_meta3->addSelect($metaboxprefix.'layout_columns',array('mig_one_half' => 'Two Columns', 'mig_one_third' => 'Three Columns', 'mig_one_fourth' => 'Four Columns'),array('name'=> 'Columns', 'std'=> array('0.6')));
  $my_meta3->addTaxonomy($metaboxprefix.'layout_categories',array('taxonomy' => 'portfolio_category'),array('name'=> 'Category ', 'group' => 'start'));
  $my_meta3->addCheckbox($metaboxprefix.'layout_showall',array('name'=> 'Show All ', 'group' => 'end'));
  $my_meta3->Finish();
  
/*================================== Subtitle Metabox ===============================================*/

$config = array(
    'id' => ''.$themeprefix.'subtitle',          
    'title' => 'Title & Subtitle',        
    'pages' => array('page', 'post', 'portfolio', 'members'),    
    'context' => 'side',          
    'priority' => 'default',         
    'fields' => array(),           
    'local_images' => false,         
    'use_with_theme' => true        
  );
  
  
  $my_meta4 =  new AT_Meta_Box($config);
  $my_meta4->addSelect($metaboxprefix.'title_alignment',array('left' => 'Left', 'center' => 'Center', 'right' => 'Right'),array('name'=> 'Title and Subtitle Alignment', 'std'=> array('center')));
  $my_meta4->addCheckbox($metaboxprefix.'use_title',array('name'=> 'Deactivate Page Title'));
  $my_meta4->addText($metaboxprefix.'subtitle',array('name'=> 'Optional Subtitle'));
  $my_meta4->addSelect($metaboxprefix.'title_size',$percentsizes,array('name'=> 'Title Size', 'std'=> array('200%')));
  $my_meta4->addSelect($metaboxprefix.'subtitle_size',$percentsizes,array('name'=> 'Subtitle Size', 'std'=> array('110%')));
  $my_meta4->Finish(); 
  
 
/*================================== Metabox for select kind of featured box ===============================================*/

$config = array(
    'id' => ''.$themeprefix.'featuredcontent_metabox',          
    'title' => 'Featured Content',        
    'pages' => array('post'),    
    'context' => 'side',          
    'priority' => 'low',         
    'fields' => array(),           
    'local_images' => false,         
    'use_with_theme' => true        
  );
  
  
  $my_meta5 =  new AT_Meta_Box($config);
  $my_meta5->addSelect($metaboxprefix.'featured_content_choose',array('Image' => 'Image', 'Images' => 'Images', 'Video' => 'Video'),array('name'=> '', 'std'=> array('0.6')));
  $my_meta5->Finish();


/*================================== Metabox for display categories of gallery ===============================================*/

$config = array(
    'id' => ''.$themeprefix.'additional_images_metabox',          
    'title' => 'Additional Images',        
    'pages' => array('post'),    
    'context' => 'side',          
    'priority' => 'low',         
    'fields' => array(),           
    'local_images' => false,         
    'use_with_theme' => true        
  );
  
  
  $my_meta6 =  new AT_Meta_Box($config);
  $repeater_fields_postside[] = $my_meta6->addImage($metaboxprefix.'re_additional_images',array('name'=> 'Additional Images'),true);
  $my_meta6->addRepeaterBlock($metaboxprefix.'postimages_',array('inline' => false, 'name' => 'Add Image','fields' => $repeater_fields_postside, 'sortable'=> true));
  $my_meta6->Finish();


/*================================== Featured Video Metabox ===============================================*/

$config = array(
    'id' => ''.$themeprefix.'featured_video_metabox',          
    'title' => 'Featured Video Link',        
    'pages' => array('post'),    
    'context' => 'normal',          
    'priority' => 'default',         
    'fields' => array(),           
    'local_images' => false,         
    'use_with_theme' => true        
  );
  
  
  $my_meta7 =  new AT_Meta_Box($config);
  $my_meta7->addText($metaboxprefix.'featured_video_url',array('name'=> 'Insert a valid URL '));
  $my_meta7->Finish();


/*================================== Portfolio Info Metabox ===============================================*/

$config = array(
    'id' => ''.$themeprefix.'portfolio_info',          
    'title' => 'Portfolio Info',        
    'pages' => array('portfolio'),    
    'context' => 'side',          
    'priority' => 'low',         
    'fields' => array(),           
    'local_images' => false,         
    'use_with_theme' => true        
  );
  
  
  $my_meta8 =  new AT_Meta_Box($config);
  $repeater_fields_portfolio_info[] = $my_meta8->addText($metaboxprefix.'re_portfolio_field_name',array('name'=> 'Field Name'),true);
  $repeater_fields_portfolio_info[] = $my_meta8->addTextarea($metaboxprefix.'re_portfolio_field_info',array('name'=> 'Field Info '),true);
  $my_meta8->addRepeaterBlock($metaboxprefix.'portfolio_info_',array('inline' => true, 'name' => 'Add Info Field','fields' => $repeater_fields_portfolio_info, 'sortable'=> true));
  $my_meta8->Finish();  


/*================================== Members Info Metabox ===============================================*/

$config = array(
    'id' => ''.$themeprefix.'members_info',          
    'title' => 'Member Info',        
    'pages' => array('members'),    
    'context' => 'side',          
    'priority' => 'low',         
    'fields' => array(),           
    'local_images' => false,         
    'use_with_theme' => true        
  );
  
  
  $my_meta9 =  new AT_Meta_Box($config);
  $repeater_fields_members_info[] = $my_meta9->addText($metaboxprefix.'re_members_field_name',array('name'=> 'Field Name'),true);
  $repeater_fields_members_info[] = $my_meta9->addTextarea($metaboxprefix.'re_members_field_info',array('name'=> 'Field Info '),true);
  $my_meta9->addRepeaterBlock($metaboxprefix.'members_info_',array('inline' => true, 'name' => 'Add Info Field','fields' => $repeater_fields_members_info, 'sortable'=> true));
  $my_meta9->Finish();  
 

/*================================== Members Social Icons Metabox ===============================================*/

$config = array(
    'id' => ''.$themeprefix.'members_social_icons',          
    'title' => 'Member Social',        
    'pages' => array('members'),    
    'context' => 'side',          
    'priority' => 'low',         
    'fields' => array(),           
    'local_images' => false,         
    'use_with_theme' => true        
  );
  
  
  $my_meta16 =  new AT_Meta_Box($config);
  $repeater_fields_members_social[] = $my_meta16->addSelect($metaboxprefix.'re_members_social_icon',$socialicons,array('name'=> 'Icon ', 'std'=> array('')), true);
  $repeater_fields_members_social[] = $my_meta16->addText($metaboxprefix.'re_members_social_url',array('name'=> 'URL'),true);
  $my_meta16->addRepeaterBlock($metaboxprefix.'members_social_',array('inline' => true, 'name' => 'Add Social Icon','fields' => $repeater_fields_members_social, 'sortable'=> true));
  $my_meta16->Finish();  
  
  
/*================================== Portfolio Additional Images Metabox ===============================================*/

$config = array(
    'id' => ''.$themeprefix.'portfolio_images',          
    'title' => 'Additional Images',        
    'pages' => array('portfolio'),    
    'context' => 'side',          
    'priority' => 'low',         
    'fields' => array(),           
    'local_images' => false,         
    'use_with_theme' => true        
  );
  
  
  $my_meta11 =  new AT_Meta_Box($config);
  $repeater_fields_portfolio_extraimages[] = $my_meta11->addImage($metaboxprefix.'re_portfolio_extraimages',array('name'=> 'Add Image'),true);
  $my_meta11->addRepeaterBlock($metaboxprefix.'portfolio_extraimages_',array('inline' => true, 'name' => 'Additional Images','fields' => $repeater_fields_portfolio_extraimages, 'sortable'=> true));
  $my_meta11->Finish();  
  
  
/*================================== Background Metabox ===============================================*/

$config = array(
    'id' => ''.$themeprefix.'custom_background',          
    'title' => 'Background',        
    'pages' => array('page', 'post', 'portfolio', 'members'),    
    'context' => 'normal',          
    'priority' => 'high',         
    'fields' => array(),           
    'local_images' => false,         
    'use_with_theme' => true        
  );
  
  
  $my_meta12 =  new AT_Meta_Box($config);
  $my_meta12->addSelect($metaboxprefix.'custom_background_select',array('defaultbackground'=>'Default Background','backgroundimage'=>'Full Background Image', 'backgroundpattern'=>'Background Image Pattern', 'backgroundcolor'=>'Background Color'),array('name'=> 'Background', 'std'=> array('defaultbackground'), 'group' => 'start'));
  $my_meta12->addImage($metaboxprefix.'custom_background_image',array('name'=> 'Background Image'));
  $my_meta12->addSelect($metaboxprefix.'custom_background_pattern',$patterns,array('name'=> 'Patterns ', 'std'=> array('subtlenet')));
  $my_meta12->addColor($metaboxprefix.'custom_background_color',array('name'=> 'Background Color', 'std' => '#193f54', 'group' => 'end'));
  $my_meta12->Finish();


/*================================== Gallery Description Metabox ===============================================

$config = array(
    'id' => ''.$themeprefix.'gallery_description',          
    'title' => 'Short Description',        
    'pages' => array('gallery'),    
    'context' => 'normal',          
    'priority' => 'low',         
    'fields' => array(),           
    'local_images' => false,         
    'use_with_theme' => true        
  );
  
  
  $my_meta13 =  new AT_Meta_Box($config);
  $my_meta13->addText($metaboxprefix.'gallery_short_description',array('name'=> 'Short Description'));
  $my_meta13->Finish();  
 
================================== Precontent Metabox ===============================================*/

$config = array(
    'id' => ''.$themeprefix.'precontent_metabox',          
    'title' => 'Pre Content',        
    'pages' => array('page', 'post', 'members', 'portfolio'),    
    'context' => 'normal',          
    'priority' => 'low',         
    'fields' => array(),           
    'local_images' => false,         
    'use_with_theme' => true        
  );
  
  
  $my_meta14 =  new AT_Meta_Box($config);
 
  $my_meta14->addCheckbox($metaboxprefix.'activate_precontent',array('name'=> 'Use Pre Content ', 'std' => '', 'group' => 'end' , 'group' => 'start'));
  $my_meta14->addSelect($metaboxprefix.'precontent_position',array('before' => 'Before Title', 'after' => 'After Tile'),array('name'=> 'Pre Content Position ', 'std'=> array('before')));
  $my_meta14->addColor($metaboxprefix.'precontent_background',array('name'=> 'Pre Content Background Color', 'std' => '#333333'));
  $my_meta14->addColor($metaboxprefix.'precontent_text_color',array('name'=> 'Pre Content Text Color', 'std' => '#ffffff', 'group' => 'end'));
  $my_meta14->addWysiwyg('precontentcontent',array('name'=> 'Pre Content Area ', 'desc' => ''));
  $my_meta14->Finish();  
  
  
/*================================== Precontent Metabox ===============================================*/

$config = array(
    'id' => ''.$themeprefix.'prefooter_metabox',          
    'title' => 'Pre Footer',        
    'pages' => array('page', 'post', 'members', 'portfolio'),    
    'context' => 'normal',          
    'priority' => 'low',         
    'fields' => array(),           
    'local_images' => false,         
    'use_with_theme' => true        
  );
  
  
  $my_meta19 =  new AT_Meta_Box($config);
 
  $my_meta19->addCheckbox($metaboxprefix.'activate_prefooter',array('name'=> 'Use Pre Footer ', 'std' => '', 'group' => 'end' , 'group' => 'start'));
  $my_meta19->addColor($metaboxprefix.'prefooter_background',array('name'=> 'Pre Footer Background Color', 'std' => '#333333'));
  $my_meta19->addColor($metaboxprefix.'prefooter_text_color',array('name'=> 'Pre Footer Text Color', 'std' => '#ffffff', 'group' => 'end'));
  $my_meta19->addWysiwyg('prefootercontent',array('name'=> 'Pre Footer Area ', 'desc' => ''));
  $my_meta19->Finish();  
  
  
/*================================== Members and portfolio colors ===============================================*/

$config = array(
    'id' => ''.$themeprefix.'portfolio_members_design_metabox',          
    'title' => 'Design',        
    'pages' => array('members', 'portfolio'),    
    'context' => 'side',          
    'priority' => 'low',         
    'fields' => array(),           
    'local_images' => false,         
    'use_with_theme' => true        
  );
  
  
  $my_meta15 =  new AT_Meta_Box($config);
  $my_meta15->addColor($metaboxprefix.'pm_overlay_background',array('name'=> 'Image Overlay Color', 'std' => '#000000'));
  $my_meta15->addSelect($metaboxprefix.'pm_overlay_background_opacity',array('1'=>'1','0.9'=>'0.9', '0.8'=>'0.8', '0.7'=>'0.7', '0.6'=>'0.6', '0.5'=>'0.5', '0.4'=>'0.4', '0.3'=>'0.3', '0.2'=>'0.2', '0.1'=>'0.1', '0'=>'0'),array('name'=> 'Overlay Opacity ', 'std'=> array('0.6')));
  $my_meta15->addColor($metaboxprefix.'pm_info_background',array('name'=> 'Excerpt Background Color', 'std' => '#fafafa'));
  $my_meta15->addColor($metaboxprefix.'pm_info_textcolor',array('name'=> 'Excerpt Text Color', 'std' => '#3a3a3a'));
  $my_meta15->addColor($metaboxprefix.'pm_info_background_hover',array('name'=> 'Excerpt Background Color Hover', 'std' => '#444444', 'desc' => 'color on mouse over'));
  $my_meta15->addColor($metaboxprefix.'pm_info_textcolor_hover',array('name'=> 'Excerpt Text Color Hover', 'std' => '#eaeaea', 'desc' => 'color on mouse over'));
  $my_meta15->Finish();
  

/*================================== Gallery colors ===============================================*/

$config = array(
    'id' => ''.$themeprefix.'gallery_design_metabox',          
    'title' => 'Design',        
    'pages' => array('gallery'),    
    'context' => 'side',          
    'priority' => 'low',         
    'fields' => array(),           
    'local_images' => false,         
    'use_with_theme' => true        
  );
  
  
  $my_meta17 =  new AT_Meta_Box($config);
  $my_meta17->addColor($metaboxprefix.'g_overlay_background',array('name'=> 'Image Overlay Color', 'std' => '#000000'));
  $my_meta17->addSelect($metaboxprefix.'g_overlay_background_opacity',array('1'=>'1','0.9'=>'0.9', '0.8'=>'0.8', '0.7'=>'0.7', '0.6'=>'0.6', '0.5'=>'0.5', '0.4'=>'0.4', '0.3'=>'0.3', '0.2'=>'0.2', '0.1'=>'0.1', '0'=>'0'),array('name'=> 'Overlay Opacity ', 'std'=> array('0.6')));
  $my_meta17->Finish();
  
};


