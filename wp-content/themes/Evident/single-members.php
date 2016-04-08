<?php get_header();?>

<?php 
	  global $themeprefix;
	  global $metaboxprefix;
	  $adminoptions = get_option(''.$themeprefix.'theme_options');
	  ?>
      <?php if (have_posts()) : ?>
	  <?php while (have_posts()) : the_post(); ?>
      <?php 
	  $membersinfo = get_post_meta(get_the_id(), ''.$metaboxprefix.'members_info_', true);
	  $memberssocial = get_post_meta(get_the_id(), ''.$metaboxprefix.'members_social_', true);
	  ?>
      <?php endwhile;?>
      <?php endif;?>

<div class="single-members-content clearfix">
	<div class="single-members-main-image">
	<a href="<?php echo wp_get_attachment_url( get_post_thumbnail_id());  ?>" rel="prettyPhoto[members]"><?php the_post_thumbnail('full')?></a>
	</div> <!-- End of single members main image -->
    
    <div class="single-members-info clearfix">
    <?php 
	if($membersinfo != null && $membersinfo != ''){
	foreach($membersinfo as $membersmetadata) {
		
	echo '<div class="single-members-meta-field"><strong>'.$membersmetadata[$metaboxprefix.'re_members_field_name'].'</strong>: '.$membersmetadata[$metaboxprefix.'re_members_field_info'].'</div>';
	}
	}
	?>
    
    <?php if(have_posts()):?>
    <?php while(have_posts()): the_post() ?>
    <div class="single-members-full-info clearfix"><?php the_content();?></div>
    <?php endwhile;?>
    <?php endif;?>
	 </div> <!-- End of single-members-info -->
     
    <ul class="single-members-social-icons clearfix">
    <?php 
	if($memberssocial != null && $memberssocial != ''){
		
	foreach($memberssocial as $membersocial) {
	echo '<li><a target="_new" href="'.$membersocial[$metaboxprefix.'re_members_social_url'].'"><img src="'.get_template_directory_uri().'/icons/social/'.$membersocial[$metaboxprefix.'re_members_social_icon'].'.png"/></a></li>';
	}
	
	}
	
	?>
    </ul> <!-- end of single members social icons -->
	<nav class="custom-post-nav clearfix">
	<div class="custom-next"><?php next_post_link('%link', '%title'); ?></div>
    <div class="custom-prev"><?php previous_post_link('%link', '%title'); ?></div>
	</nav>
    
</div> <!-- End of content -->
<?php get_footer();?>