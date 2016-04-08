<?php function mig_main_content_title(){?>
<?php 
global $themeprefix;
global $adminoptions;
global $metaboxprefix;
?>
	<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
    <?php
	$titlesize = get_post_meta(get_the_id(), ''.$metaboxprefix.'title_size', true);
	$subtitlesize = get_post_meta(get_the_id(), ''.$metaboxprefix.'subtitle_size', true);
	$titlealign = get_post_meta(get_the_id(), ''.$metaboxprefix.'title_alignment', true);
	$subtitle = get_post_meta(get_the_id(), ''.$metaboxprefix.'subtitle', true);
	?>
    
    <?php endwhile;?>
    <?php endif; ?>


<div class="main-title-wrapper">
	<?php if(!is_home() && !is_archive() && !is_404() && !is_search()):?>
	<div class="main-title" style="text-align:<?php echo $titlealign?>;"><h1 style="font-size:<?php echo $titlesize;?>;"><?php the_title();?></h1></div> <!-- end of main title -->
    <?php 
	if($subtitle != null && $subtitle != ''):?>
    <h4 class="main-subtitle" style="text-align:<?php echo $titlealign?>; font-size:<?php echo $subtitlesize;?>;"><?php echo $subtitle?></h4> <!-- end of main subtitle -->
    <?php endif;?>
    <?php endif;?>
    
    <?php if(is_home()):?>
    <div class="main-title"><h1 style="font-size:<?php echo $titlesize;?>;"><?php echo $adminoptions[''.$themeprefix.'blog_title'];?></h1></div> <!-- end of main title -->
    <?php if($adminoptions[''.$themeprefix.'blog_subtitle'] != null && $adminoptions[''.$themeprefix.'blog_subtitle'] != ''):?>
    <h4 class="main-subtitle" style="font-size:<?php echo $subtitlesize;?>;"><?php echo $adminoptions[''.$themeprefix.'blog_subtitle'];?></h4> <!-- end of main subtitle -->
    <?php endif;?>
    <?php endif;?>
    
    <?php if(is_category() || is_tag() || is_author() || is_day() || is_month() || is_year()):?>
    	<div class="main-title"><h1 style="font-size:<?php echo $titlesize;?>;">
     					<?php if(is_category()):?>
						<span><?php _e("Posts Categorized:"); ?></span> <?php single_cat_title(); ?>
	
					    
					    <?php  elseif (is_tag()):?> 
						<span><?php _e("Posts Tagged:"); ?></span> <?php single_tag_title(); ?>
                        
                        
					    <?php elseif (is_author()):?> 
                        <?php 
					    	global $post;
					    	$author_id = $post->post_author;
					    ?>
						<span><?php _e("Posts By:"); ?></span> <?php echo get_the_author_meta('display_name', $author_id); ?>

						   
					    <?php  elseif (is_day()): ?>
						<span><?php _e("Daily Archives:"); ?></span> <?php the_time('l, F j, Y'); ?>
                        
                        
						<?php elseif (is_month()) : ?>
			    		<span><?php _e("Monthly Archives:"); ?></span> <?php the_time('F Y'); ?>
					        
					
					    <?php elseif (is_year()) : ?>
					    <span><?php _e("Yearly Archives:"); ?></span> <?php the_time('Y'); ?>
					        
					    <?php endif;?>			
						
                        
    	</h1></div> <!-- End of main title -->
    <?php endif;?>
</div> <!-- end of main title -->

<?php } ?>