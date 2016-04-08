<?php
/*
template name: Members
*/
?>
<?php get_header(); ?>

<?php 
	  global $themeprefix;
	  global $metaboxprefix;
	  $adminoptions = get_option(''.$themeprefix.'theme_options');
	  ?>
      
      <?php if (have_posts()) : ?>
	  <?php while (have_posts()) : the_post(); ?>
      <?php
	  $columns = get_post_meta(get_the_id(), ''.$metaboxprefix.'layout_columns', true);
	  $categoryslug = get_post_meta(get_the_id(), ''.$metaboxprefix.'layout_categories', true);
	  $aspectratio = get_post_meta(get_the_id(), ''.$metaboxprefix.'layout_aspect_ratio', true);
	  $pagination = $adminoptions[''.$themeprefix.'members_pagination'];
	  $layoutshowall = get_post_meta(get_the_id(), ''.$metaboxprefix.'layout_showall', true);
	  ?>
      <?php endwhile;?>
      <?php endif;?>
      
      <?
	  if ($pagination == ''){$pagination = '12';}
	  
	  
	  if($columns == 'mig_one_half'){$imagesize = 'big';}
	  elseif($columns == 'mig_one_third'){$imagesize = 'medium';}
	  elseif($columns == 'mig_one_fourth'){$imagesize = '';}
	  
	 
	  if($layoutshowall == 'on'){$categoryslug = '';}
	  $args = array('post_type' => 'members', 'posts_per_page' => $pagination, 'paged' => $paged, 'category_name' => $categoryslug);
	  $the_query = new WP_Query( $args );
	  
?>
<div class="members-content">
<?php if($the_query->have_posts()) :?>
<?php while($the_query->have_posts()) : $the_query->the_post()?>
<?php 
$memberssocial = get_post_meta(get_the_id(), ''.$metaboxprefix.'members_social_', true);
?>
	
	<div class="members-wrapper members_<?php echo $columns ?> clearfix" data-background-hover="<?php echo get_post_meta(get_the_id(), ''.$metaboxprefix.'pm_info_background_hover', true);?>" data-text-hover="<?php echo get_post_meta(get_the_id(), ''.$metaboxprefix.'pm_info_textcolor_hover', true);?>" data-overlay-opacity="<?php echo get_post_meta(get_the_id(), ''.$metaboxprefix.'pm_overlay_background_opacity', true);?>">
 
 
    	<div class="members-main-image clearfix">
        <?php the_post_thumbnail(''.$imagesize.$aspectratio.'') ?>
        <a class="members-overlay" href="<?php the_permalink();?>" style="background-color:<?php echo get_post_meta(get_the_id(), ''.$metaboxprefix.'pm_overlay_background', true);?>;"></a>
        </div> <!-- End of members Main image -->


        <div class="members-main-info clearfix" style="color:<?php echo get_post_meta(get_the_id(), ''.$metaboxprefix.'pm_info_textcolor', true);?>; background-color:<?php echo get_post_meta(get_the_id(), ''.$metaboxprefix.'pm_info_background', true);?>;">
         	<h3 style="color:<?php echo get_post_meta(get_the_id(), ''.$metaboxprefix.'pm_info_textcolor', true);?>;"><?php the_title();?></h3>
         	<div class="portfolio-excerpt"><?php the_excerpt(); ?></div>
            <?php if($memberssocial != null && $memberssocial != ''):?>
            <ul class="members-social-icons clearfix">
    		<?php 
			
		
			foreach($memberssocial as $membersocial) {
			echo '<li><a target="_new" href="'.$membersocial[$metaboxprefix.'re_members_social_url'].'"><img src="'.get_template_directory_uri().'/icons/social/'.$membersocial[$metaboxprefix.'re_members_social_icon'].'.png"/></a></li>';
			}
	
			
	
			?>
    		</ul> <!-- end of single members additional images -->
            <?php endif;?>
        </div> <!-- End of members main info -->
    </div> <!-- End of members Wrapper -->

<?php endwhile;?>
<?php endif; ?>   

</div> <!-- End of members content -->

<nav class="custom-post-nav clearfix">
    <div class="custom-prev"><?php previous_posts_link('Previous Members', $the_query->max_num_pages); ?></div>
	<div class="custom-next"><?php next_posts_link('More Members', $the_query->max_num_pages); ?></div>
</nav>

<?php wp_reset_query(); ?> 
<?php get_footer();?>