<?php
/*
template name: Portfolio
*/
?>
<?php get_header(); ?>

<?php 
	  global $themeprefix;
	  global $metaboxprefix;
	  $adminoptions = get_option(''.$themeprefix.'theme_options');
	  $pagination = $adminoptions[''.$themeprefix.'portfolio_pagination'];
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
	  if ($pagination == ''){$pagination = '12';}
	  
	  if($columns == 'mig_one_half'){$imagesize = 'big';}
	  elseif($columns == 'mig_one_third'){$imagesize = 'medium';}
	  elseif($columns == 'mig_one_fourth'){$imagesize = '';}
	  
	 
	  if($layoutshowall == 'on'){$categoryslug = '';}
	  $args = array('post_type' => 'portfolio', 'posts_per_page' => $pagination, 'paged' => $paged, 'portfolio_category' => $categoryslug);
	  $the_query = new WP_Query( $args );
	  
	  
?>

<?php if($adminoptions[''.$themeprefix.'portfolio_category_filter'] == 'yes'):?>
<ul class="portfolio-filter clearfix">
<li><a href="#" data-portfolio-filter="*">All</a></li><?php foreach( get_terms('portfolio_category') as $portfolioterms){echo '<li><a href="#" data-portfolio-filter=".'.$portfolioterms->slug.'">'.$portfolioterms->name.'</a></li>';}?>
</ul>
<?php endif;?>

<div class="portfolio-content clearfix">
<?php if($the_query->have_posts()) :?>
<?php while($the_query->have_posts()) : $the_query->the_post()?>
	<?php $categories = get_the_terms( $post->ID, 'portfolio_category' ); ?> 
	<div class="portfolio-wrapper portfolio_<?php echo $columns ?> <?php foreach( $categories as $category){echo $category->slug.' ';}?>" data-categories="<?php foreach( $categories as $category){echo $category->slug.' ';}?>" data-background-hover="<?php echo get_post_meta(get_the_id(), ''.$metaboxprefix.'pm_info_background_hover', true);?>" data-text-hover="<?php echo get_post_meta(get_the_id(), ''.$metaboxprefix.'pm_info_textcolor_hover', true);?>" data-overlay-opacity="<?php echo get_post_meta(get_the_id(), ''.$metaboxprefix.'pm_overlay_background_opacity', true);?>">
 	
 
    	<div class="portfolio-main-image">
        <?php the_post_thumbnail(''.$imagesize.$aspectratio.'') ?>
        <a class="portfolio-overlay" href="<?php the_permalink();?>" style="background-color:<?php echo get_post_meta(get_the_id(), ''.$metaboxprefix.'pm_overlay_background', true);?>;"></a>
        </div> <!-- End of portfolio Main image -->


        <div class="portfolio-main-info" style="color:<?php echo get_post_meta(get_the_id(), ''.$metaboxprefix.'pm_info_textcolor', true);?>; background-color:<?php echo get_post_meta(get_the_id(), ''.$metaboxprefix.'pm_info_background', true);?>;">
         <h3 style="color:<?php echo get_post_meta(get_the_id(), ''.$metaboxprefix.'pm_info_textcolor', true);?>;"><?php the_title();?></h3>
         <div class="portfolio-excerpt"><?php the_excerpt(); ?></div>
        </div> <!-- End of portfolio main info -->
    </div> <!-- End of Portfolio Wrapper -->

<?php endwhile;?>
<?php endif; ?> 
</div> <!-- End of portfolio content -->


<nav class="custom-post-nav clearfix">
    <div class="custom-prev"><?php previous_posts_link('Previous Projects', $the_query->max_num_pages); ?></div>
	<div class="custom-next"><?php next_posts_link('More Projects', $the_query->max_num_pages); ?></div>
</nav>

<?php wp_reset_query(); ?> 
<?php get_footer();?>