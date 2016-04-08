<?php
/*
template name: Gallery
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
	  $layoutshowall = get_post_meta(get_the_id(), ''.$metaboxprefix.'layout_showall', true);
	  ?>
      <?php endwhile;?>
      <?php endif;?>
      
      <?php
	  $pagination = $adminoptions[''.$themeprefix.'gallery_pagination'];
	  if ($pagination == ''){$pagination = '12';}
	  
	  if($columns == 'mig_one_half'){$imagesize = 'big';}
	  elseif($columns == 'mig_one_third'){$imagesize = 'medium';}
	  elseif($columns == 'mig_one_fourth'){$imagesize = '';}
	 
	  if($layoutshowall == 'on'){$categoryslug = '';}
	  $args = array('post_type' => 'gallery', 'posts_per_page' => $pagination, 'paged' => $paged, 'category_name' => $categoryslug);
	  $the_query = new WP_Query( $args );
	  
?>
<?php if($the_query->have_posts()) :?>
<?php while($the_query->have_posts()) : $the_query->the_post()?>
	
	<div class="gallery-wrapper gallery_<?php echo $columns ?>" data-overlay-opacity="<?php echo get_post_meta(get_the_id(), ''.$metaboxprefix.'g_overlay_background_opacity', true);?>">
    
    	<div class="gallery-main-image">
        <?php the_post_thumbnail(''.$imagesize.$aspectratio.'') ?>
        <a rel="prettyPhoto[mig_gal]" href="<?php echo wp_get_attachment_url( get_post_thumbnail_id());  ?>" class="gallery-overlay" style="background-color:<?php echo get_post_meta(get_the_id(), ''.$metaboxprefix.'g_overlay_background', true);?>;"></a>
        </div> <!-- End of gallery Main image -->
    </div> <!-- End of gallery Wrapper -->

<?php endwhile;?>
<?php endif; ?>   

<nav class="custom-post-nav clearfix">
    <div class="custom-prev"><?php previous_posts_link('Previous Images', $the_query->max_num_pages); ?></div>
	<div class="custom-next"><?php next_posts_link('More Images', $the_query->max_num_pages); ?></div>
</nav>

<?php wp_reset_query(); ?> 
<?php get_footer();?>