<?php function mig_slideshow_call() {?>

	
    
    <?php 
	global $metaboxprefix;
	$slideshowid = get_post_meta(get_the_id(), ''.$metaboxprefix.'slideshow_select', true);
    $slides = get_post_meta($slideshowid, ''.$metaboxprefix.'slides_', true);
	$slidepagination = get_post_meta($slideshowid, ''.$metaboxprefix.'slideshow_pagination', true);
	$slideeffect = get_post_meta($slideshowid, ''.$metaboxprefix.'slideshow_effect', true);
	$slidetransition = get_post_meta($slideshowid, ''.$metaboxprefix.'slideshow_transition', true);
	$slideduration = get_post_meta($slideshowid, ''.$metaboxprefix.'slideshow_duration', true);
	?>
    
    <?php if(get_post_meta(get_the_id(), ''.$metaboxprefix.'slideshow_display_slideshow', true) == 'yes'):?>
    <?php if($slides != ''  && !is_home()):?>
    <div id="main-mig-slideshow" class="slider-wrapper clearfix" data-slideshow-pagination="<?php echo $slidepagination;?>" data-slideshow-effect="<?php echo $slideeffect?>" data-slideshow-transition="<?php echo $slidetransition;?>" data-slideshow-duration="<?php echo $slideduration;?>">
        <div class="flexslider">
          <ul class="slides">
          
          
          	<?php foreach ($slides as $slide){?>
            	<?php if($slide[''.$metaboxprefix.'re_slideshow_image']['src'] != null && $slide[''.$metaboxprefix.'re_slideshow_image']['src'] != ''):?>
           		<li data-thumb="<?php echo $slide[''.$metaboxprefix.'re_slideshow_image']['src'];?>">
                <div class="flexslider-image-wrapper">
  	    	    	<a href="<?php bloginfo('url')?>?page_id=<?php echo $slide[''.$metaboxprefix.'re_slideshow_imagelink']?>"><img src="<?php echo $slide[''.$metaboxprefix.'re_slideshow_image']['src'];?>" alt="" /></a>
                	<?php if($slide[''.$metaboxprefix.'re_slideshow_caption_content'] != null && $slide[''.$metaboxprefix.'re_slideshow_caption_content'] != '' or $slide[''.$metaboxprefix.'re_slideshow_caption_title'] != null && $slide[''.$metaboxprefix.'re_slideshow_caption_title'] != null): ?>
                	<div class="flexslider-caption-wrapper <?php echo $slide[''.$metaboxprefix.'re_slideshow_captionalignment'];?>">
                		<div class="flexslider-caption-relative" style="position: relative;">
          
                			<div class="flexslider-caption-text">
                            	<div class="flexslider-caption-title">
                                	<?php if($slide[''.$metaboxprefix.'re_slideshow_caption_title'] && $slide[''.$metaboxprefix.'re_slideshow_caption_title'] != ''):?>
                        			<h1 style="color:<?php echo get_post_meta($slideshowid, ''.$metaboxprefix.'slideshow_title_textcolor', true);?>; font-size:<?php echo get_post_meta($slideshowid, ''.$metaboxprefix.'slideshow_title_size', true);?>;"><?php echo $slide[''.$metaboxprefix.'re_slideshow_caption_title'];?></h1>
									<?php endif;?>
                                	<div class="flexslider-caption-title-background" style="opacity:<?php echo get_post_meta($slideshowid, ''.$metaboxprefix.'slideshow_titlebackground_opacity', true);?>; background-color:<?php echo get_post_meta($slideshowid, ''.$metaboxprefix.'slideshow_title_background', true);?>;" ></div>
                                </div>
                           		
                                <?php if($slide[''.$metaboxprefix.'re_slideshow_caption_content'] && $slide[''.$metaboxprefix.'re_slideshow_caption_content'] != ''):?>)
                            	<div class="flexslider-caption-content" style="color:<?php echo get_post_meta($slideshowid, ''.$metaboxprefix.'slideshow_caption_textcolor', true);?>; font-size:<?php echo get_post_meta($slideshowid, ''.$metaboxprefix.'slideshow_caption_text_size', true);?>;">
								<?php echo $slide[''.$metaboxprefix.'re_slideshow_caption_content'];?>
                                <div class="flexslider-caption-border"  style="background-color:<?php echo get_post_meta($slideshowid, ''.$metaboxprefix.'slideshow_caption_border', true);?>; opacity:<?php echo get_post_meta($slideshowid, ''.$metaboxprefix.'slideshow_titlebackground_opacity', true);?>;"></div>
                                <div class="flexslider-caption-background" style="opacity:<?php echo get_post_meta($slideshowid, ''.$metaboxprefix.'slideshow_captionbackground_opacity', true);?>;  background-color:<?php echo get_post_meta($slideshowid, ''.$metaboxprefix.'slideshow_caption_background', true);?>;"></div>
                                </div>
                                <?php endif;?>
                        	</div>
                            
                		</div>
                	</div>
                    <?php endif;?>
                </div>
  	    		</li>
                <?php endif;?>
            <?php } ?>
            
            
          </ul>
        </div>
        
        <div class="mig-slider-nav" data-opacity="<?php echo get_post_meta($slideshowid, ''.$metaboxprefix.'slideshow_nav_opacity', true);?>">
        	<div class="mig-slideshow-prev" style="background-color:<?php echo get_post_meta($slideshowid, ''.$metaboxprefix.'slideshow_nav_icon_background', true);?>; color:<?php echo get_post_meta($slideshowid, ''.$metaboxprefix.'slideshow_nav_icon_color', true);?>;"><i class="icon-chevron-left"></i></div>
            <div class="mig-slideshow-next" style="background-color:<?php echo get_post_meta($slideshowid, ''.$metaboxprefix.'slideshow_nav_icon_background', true);?>; color:<?php echo get_post_meta($slideshowid, ''.$metaboxprefix.'slideshow_nav_icon_color', true);?>;"><i class="icon-chevron-right"></i></div>
        </div>   
    </div>
    <?php endif;?> 
    <?php endif;?>


	
<?php }?>