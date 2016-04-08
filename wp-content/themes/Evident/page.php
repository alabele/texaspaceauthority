<?php get_header();?>

	<div class="content" style="margin-right:5%;">
  	<div class="page-inner-content clearfix">
	<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
    
    
    
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="page-content clearfix">
		<?php the_content(); ?>
    	</div> <!-- End of page-content -->
	</article> <!-- End of article-->
    
   
<?php endwhile;?>
<?php endif; ?>

</div>
</div> <!-- End of content -->
<?php get_sidebar();?>
<?php get_footer();?>