<?php
/*
template name: Contact
*/
 global $themeprefix;
 global $metaboxprefix;
 $adminoptions = get_option(''.$themeprefix.'theme_options');
?>

<?php get_header();?>
	
	<?php if($adminoptions[''.$themeprefix.'contact_map_address'] != null && $adminoptions[''.$themeprefix.'contact_map_address'] != ''):?>
    <?php 
	
	/*============== clean iframe src ======================*/
	$mapaddress = $adminoptions[''.$themeprefix.'contact_map_address'];
	$mapaddress = stripslashes($mapaddress);
	$mapaddress = preg_match('/src=(["\'])(.*?)\1/', $mapaddress, $pregmapaddress);
	reset($pregmapaddress);
	$cleanmapaddress = current($pregmapaddress);
	/*========================================================*/
	?>
    
	<div class="contact-map clearfix">
    <iframe width="100%" height="300px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" <?php echo $cleanmapaddress;?>></iframe><br /><small><a href="<?php echo $mapaddress;?>"></a></small>
    </div>
    <?php endif;?>
    
	<div class="content-contact clearfix">
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

<div class="contact-info clearfix">
	<div class="contact-image clearfix">
    	<h3><?php echo $adminoptions[''.$themeprefix.'contact_image_title']?></h3>
    	<img src="<?php echo $adminoptions[''.$themeprefix.'contact_image']['src']?>" alt=""/>
    </div>
    <div class="contact-data clearfix">
    <h3><?php echo $adminoptions[''.$themeprefix.'contact_info_title']?></h3>
    <?php echo do_shortcode(wpautop((html_entity_decode(stripslashes($adminoptions[''.$themeprefix.'contact_info_content'])))));?>
    </div>
</div> <!-- End of contact info -->

<?php get_footer();?>