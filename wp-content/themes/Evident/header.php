<!DOCTYPE html>
<!--[if IE 8]>              <html class="ie-old ie8"  <?php language_attributes(); ?>     <![endif]-->
<!--[if IE 7]>              <html class="ie-old ie7"  <?php language_attributes(); ?>     <![endif]-->
<!--[if IE 6]>              <html class="ie-old ie6"  <?php language_attributes(); ?>     <![endif]-->


<head>
	<?php
	global $themeprefix;
	global $metaboxprefix;
	$adminoptions = get_option(''.$themeprefix.'theme_options');
    $pagetitledeactivated = '';
	?>
    
	<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
    <?php
	$useprecontent = get_post_meta(get_the_id(), ''.$metaboxprefix.'activate_precontent', true);
	$precontentbackground = get_post_meta(get_the_id(), ''.$metaboxprefix.'precontent_background', true);
	$precontenttextcolor = get_post_meta(get_the_id(), ''.$metaboxprefix.'precontent_text_color', true);
	$precontentpos = get_post_meta(get_the_id(), ''.$metaboxprefix.'precontent_position', true);
	$precontent = get_post_meta(get_the_id(), 'precontentcontent', true);
	$usemaintitle = get_post_meta(get_the_id(), ''.$metaboxprefix.'use_title', true);
	?>
    
    <?php endwhile;?>
    <?php endif; ?>
    
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	
	<title><?php bloginfo('name') ?></title>

	<?php if( $adminoptions[''.$themeprefix.'favicon'] == null or $adminoptions[''.$themeprefix.'favicon'] == ''): ?>
		<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(). '/images/favicon.jpg';?>">
   	<?php else:?>
    	<link rel="icon" type="image/png" href="<?php echo $adminoptions[''.$themeprefix.'favicon']['src']; //get and use the favicon?>">
	<?php endif; ?>

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	
	<?php wp_head(); ?>

	
</head>
<body <?php body_class(); ?>>
<?php if($adminoptions[''.$themeprefix.'general_body_pattern'] == null or $adminoptions[''.$themeprefix.'general_body_pattern'] == ''):?>
<div class="save-options">Please Save Options at your Theme Admin Panel before start using the Theme.</div>
<?php endif;?>

<div class="main-wrapper clearfix">
			<div class="top-bar-wrapper clearfix">
                <div class="top-bar-contact">
                	<ul>
                	<?php 
					if($adminoptions[''.$themeprefix.'contact_info_one'] != null && $adminoptions[''.$themeprefix.'contact_info_one'] != ''){
					echo '<li><img src="'.get_template_directory_uri().'/icons/'.$adminoptions[''.$themeprefix.'contact_icon_one'].'.png" alt="'.$adminoptions[''.$themeprefix.'contact_image_one'].'"/>'.$adminoptions[''.$themeprefix.'contact_info_one'].'</li>';
					}
					if($adminoptions[''.$themeprefix.'contact_info_two'] != null && $adminoptions[''.$themeprefix.'contact_info_two'] != ''){
					echo '<li><img src="'.get_template_directory_uri().'/icons/'.$adminoptions[''.$themeprefix.'contact_icon_two'].'.png" alt="'.$adminoptions[''.$themeprefix.'contact_image_two'].'"/>'.$adminoptions[''.$themeprefix.'contact_info_two'].'</li>';
					}
					if($adminoptions[''.$themeprefix.'contact_info_three'] != null && $adminoptions[''.$themeprefix.'contact_info_three'] != ''){
					echo '<li><img src="'.get_template_directory_uri().'/icons/'.$adminoptions[''.$themeprefix.'contact_icon_three'].'.png" alt="'.$adminoptions[''.$themeprefix.'contact_image_three'].'"/>'.$adminoptions[''.$themeprefix.'contact_info_three'].'</li>';
					}
					?>
                    </ul>
                </div> <!-- end if top bar content -->
            </div> <!-- End of top bar wrapper -->
            
            <div class="header-wrapper clearfix">
            	<div class="logo-wrapper clearfix">
            		<a href="<?php bloginfo('url');?>" class="header-logo">
    					<?php if( $adminoptions[''.$themeprefix.'logo'] == null or $adminoptions[''.$themeprefix.'logo'] == ''): ?>
        				<img src="<?php echo get_template_directory_uri(). '/images/evident-logo.png';?>" alt="<?php echo bloginfo('name')?>">
        				<?php else:?>
						<img src="<?php echo $adminoptions[''.$themeprefix.'logo']['src'];?>" alt="<?php echo bloginfo('name')?>">
						<?php endif; ?>
                    	<div class="header-tagline"><?php bloginfo('description')?></div>
                	</a> <!-- End of header logo -->
                </div> <!-- End of Logo wrapper -->
                <div class="main-menu clearfix"><?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'navtiny clearfix sf-menu' ) ); ?></div> <!-- End of main menu -->
        	</div> <!-- End of header wrapper -->
            
    		<div class="header-bottom-bar clearfix">
            	<div class="header-bottom-bar-content">
                	<div class="header-bottom-bar-colorfix"></div>
                	<div class="header-search"><?php get_search_form();?></div>
                	<?php get_template_part('/inc/social-icons');?>
                </div> <!-- End of header bottom bar content -->
            </div> <!-- End of header bottom bar -->

			<?php if(!is_home()) : mig_slideshow_call(); endif; //call the slideshow function ?>

<?php if($useprecontent == 'on' && $precontentpos == 'before'):?>
<div class="pre-content clearfix" style="background-color:<?php echo $precontentbackground?>; color:<?php echo $precontenttextcolor;?>;">
<?php echo wpautop(do_shortcode($precontent));?>
</div>
<?php endif;?>

<?php if($usemaintitle != 'on'):?>     
<?php mig_main_content_title();?>
<?php $pagetitledeactivated = 'padding-top:0.1%;'?>
<?php else: $pagetitledeactivated = 'padding-top:3%;'?>
<?php endif;?>


<?php if($useprecontent == 'on' && $precontentpos == 'after'):?>
<div class="pre-content" style="background-color:<?php echo $precontentbackground?>; color:<?php echo $precontenttextcolor;?>;">
<?php echo wpautop(do_shortcode($precontent));?></div>
<?php endif;?>

<div class="main clearfix" style="<?php echo $pagetitledeactivated ?>">
