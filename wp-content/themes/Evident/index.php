<?php get_header();?>
<?
?>
<?php if($adminoptions[''.$themeprefix.'blog_sidebar'] == 'left'):?>
<?php $blogsidebarmargin = 'margin-left:5%;';?>
<?php get_sidebar();?>
<?php else:?>
<?php $blogsidebarmargin = 'margin-right:5%;'?>
<?php endif;?>

	<div class="content content-background" style=" <?php echo $blogsidebarmargin;?>">
    	<?php if(have_posts()):?>
        <?php while(have_posts()): the_post() ?>
        <?php $featuredcontent = get_post_meta(get_the_id(), 'mig_featured_content_choose', true);?>
        
        
    	<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article">
        
        	<div class="post-wrapper clearfix">
                <div class="bottom-post clearfix">
						<div class="post-header">
                        
                        	<div class="post-title-wrapper clearfix">
                    			<div class="post-title">
            						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?> </a></h2>
                                    <span class="post-date">
            						<?php the_time("j M"); ?>
            						</span> <!-- End of date -->
                        			<span class="post-comments">
            						<a href="<?php the_permalink();?>"><?php comments_number();?></a>
            						</span> <!-- End of post comments -->
                                    <?php the_category( ); ?>
            					</div> <!-- End of post title -->
                                
                            </div> <!-- End of post title wrapper -->              
            			</div> <!-- End of post header -->

                    	<?php if ($featuredcontent == 'Image') : ?>
                        	
            				<a class="featured-box clearfix" href="<?php the_permalink();?>">
            					<?php the_post_thumbnail(''); ?>
            				</a> <!-- End of featured-box -->
                        
                        <?php elseif ($featuredcontent == 'Images') : ?>
                        		<div class="featured-box clearfix flexslider">
                            		<ul class="slides">
                            			<?php 
            					    	$images = get_post_meta(get_the_id(), ''.$metaboxprefix.'postimages_', true);
    									foreach ( $images as $image )
    									{
										$originalsrc = $image[''.$metaboxprefix.'re_additional_images']['src'];
										$replacedsrc = str_replace('.jpg', '-594x337.jpg', $originalsrc, $jpgfound);
										if($jpgfound < 1):
										$replacedsrc = str_replace('.png', '-594x337.png', $originalsrc);
										endif;
    										echo "<li><a href='".get_permalink()."'><img src='".$replacedsrc."'/></a></li>";
    									}
										?>
                                	</ul>
            					</div>	
                        
                        <?php elseif ($featuredcontent == 'Slider') : ?>
								<?php 

								?>
                        
                        <?php elseif ($featuredcontent == 'Video') : ?>
            					<div class="featured-box clearfix">
            					<?php
								$videolink = get_post_meta(get_the_id(), 'mig_featured_video_url', true);
								$wp_embed = new WP_Embed();
								$post_embed = $wp_embed->run_shortcode('[embed width="640" height="320"]'.$videolink.'[/embed]');
								echo $post_embed
								?>
            					</div> <!-- End of featured-box -->
                        <?php endif;?>

            			<section class="post-entry-content clearfix">
						<div class="post-content"><?php the_content();?></div>
            			</section> <!-- End of entry-content -->

                     
            	</div> <!-- End of post-right -->
            </div> <!-- End of post wrapper -->
        </article> <!-- End of article-->
        <?php endwhile; ?>
        <?php endif;?>
        
        
        <div class="pagination">
			<?php
				mig_pagination();
			?>
        </div> <!-- End of pagination-->
        
        
    	<div class="content-background"></div>
    </div> <!-- End of content-->
<?php if($adminoptions[''.$themeprefix.'blog_sidebar'] == 'right'):?>
<?php get_sidebar();?>
<?php endif;?>
<?php get_footer(); ?>