<?php get_header(); ?>

	<div class="content" style="margin-right:5%;">
    	<?php if(have_posts()):?>
        <?php while(have_posts()): the_post() ?>
        <?php $featuredcontent = get_post_meta(get_the_id(), 'mig_featured_content_choose', true);?>
        
    	<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article">
        
			
            <?php if ($featuredcontent == 'Image') : ?>
                        	
            				<a class="single-featured-box clearfix" href="<?php the_permalink();?>">
            					<?php the_post_thumbnail(''); ?>
            				</a> <!-- End of single-featured-box -->
                        
                        <?php elseif ($featuredcontent == 'Images') : ?>
                        		<div class="single-featured-box clearfix flexslider">
                            		<ul class="slides">
                            			<?php 
            					    	$images = get_post_meta(get_the_id(), 'mig_postimages_', true);
    									foreach ( $images as $image )
    									{
    										echo "<li><a href='".get_permalink()."'><img src='".$image['mig_re_additional_images']['src']."'/></a></li>";
    									}
										?>
                                	</ul>
            					</div>	
                        
                        <?php elseif ($featuredcontent == 'Slider') : ?>
								<?php 

								?>
                        
                        <?php elseif ($featuredcontent == 'Video') : ?>
            					<div class="single-featured-box clearfix">
            					<?php
								$videolink = get_post_meta(get_the_id(), 'mig_featured_video_url', true);
								$wp_embed = new WP_Embed();
								$post_embed = $wp_embed->run_shortcode('[embed width="960" height="480"]'.$videolink.'[/embed]');
								echo $post_embed
								?>
            					</div> <!-- End of single-featured-box -->
                        <?php endif;?>
                    
            
            <div class="single-post-content">
            	<section class="entry-content clearfix">
                <div class="single-post-date"><?php the_time("M j"); ?></div>
            	<div class="single-post-main-content"><?php the_content();?></div>
            	</section> <!-- End of entry-content -->
				<?php get_template_part('inc/related-posts');?>
            </div> <!-- End of post content -->
            <div class="single-post-meta clearfix">
            <div class="single-post-author clearfix"><?php the_author();?></div><?php the_category( ); ?>
            </div> <!-- end of single post meta -->
            
            <nav class="custom-post-nav clearfix">
    		<div class="custom-prev"><?php previous_post_link('%link', '%title'); ?></div>
			<div class="custom-next"><?php next_post_link('%link', '%title'); ?></div>
			</nav>
            
        </article> <!-- End of article-->
        <?php endwhile; ?>
        <?php endif;?>
        <div id="post-comments">
    	<?php if ( comments_open() || '0' != get_comments_number() ) comments_template( '', true ); ?>
    	</div> <!-- End of post-comments-->
       

    </div> <!-- End of content-->
<?php get_sidebar();?>    
<?php get_footer(); ?>
