<?php get_header();?>

<?php 
	  global $themeprefix;
	  global $metaboxprefix;
	  $adminoptions = get_option(''.$themeprefix.'theme_options');
	  ?>
	  
      <?php if (have_posts()) : ?>
	  <?php while (have_posts()) : the_post(); ?>
      <?php
	  $portfolioinfo = get_post_meta(get_the_id(), ''.$metaboxprefix.'portfolio_info_', true);
	  $portfolioimages = get_post_meta(get_the_id(), ''.$metaboxprefix.'portfolio_extraimages_', true);
	  ?>
      <?php endwhile;?>
      <?php endif;?>



<div class="single-portfolio-content clearfix">

	<div class="single-portfolio-main-image">
	<a href="<?php echo wp_get_attachment_url( get_post_thumbnail_id());  ?>" rel="prettyPhoto[portfolio]"><?php the_post_thumbnail('full')?></a>
	</div> <!-- End of single portfolio main image -->
    
    <div class="single-portfolio-info clearfix">
    <?php 
	if($portfolioinfo != null && $portfolioinfo != ''){
	foreach($portfolioinfo as $portfoliometadata) {
		
	echo '<div class="single-portfolio-meta-field"><strong>'.$portfoliometadata[$metaboxprefix.'re_portfolio_field_name'].'</strong>: '.$portfoliometadata[$metaboxprefix.'re_portfolio_field_info'].'</div>';
	}
	}
	?>
    
    <?php if(have_posts()):?>
    <?php while(have_posts()): the_post() ?>
    <div class="single-portfolio-full-info clearfix"><?php the_content();?></div>
    <?php endwhile;?>
    <?php endif;?>
    <ul class="single-portfolio-additional-images clearfix">
    <?php 
	if($portfolioimages != null && $portfolioimages != ''){
	foreach($portfolioimages as $portfolioimage) {
	
	$thumb = $portfolioimage[$metaboxprefix.'re_portfolio_extraimages']['src'];
	$thumb = str_replace('.jpg', '-350x350.jpg', $thumb);
	
	echo '<li><a href="'.$portfolioimage[$metaboxprefix.'re_portfolio_extraimages']['src'].'" rel="prettyPhoto[portfolio]"><img src="'.$thumb.'"/></a></li>';
	}
	}
	?>
    </ul> <!-- end of single portfolio additional images -->

    </div> <!-- End of single-portfolio-info -->
    <nav class="custom-post-nav clearfix">
    <div class="custom-next"><?php next_post_link('%link', 'Previous Project'); ?></div>
    <div class="custom-prev"><?php previous_post_link('%link', 'Next Project'); ?></div>	
	</nav>
    
</div> <!-- End of content -->
<?php get_footer();?>