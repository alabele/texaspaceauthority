<?php
global $themeprefix;
global $metaboxprefix;
?>

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<?php 
$adminoptions = get_option(''.$themeprefix.'theme_options');
$prefooterbackground = get_post_meta(get_the_id(), ''.$metaboxprefix.'prefooter_background', true);
$prefootertextcolor = get_post_meta(get_the_id(), ''.$metaboxprefix.'prefooter_text_color', true);
$useprefooter = get_post_meta(get_the_id(), ''.$metaboxprefix.'activate_prefooter', true);
$prefootercontent = get_post_meta(get_the_id(), 'prefootercontent', true);
?>

<?php endwhile;?>
<?php endif; ?>

</div> <!-- End of Main -->
<?php if($useprefooter == 'on'):?>
<div class="pre-footer clearfix" style="background-color:<?php echo $prefooterbackground?>; color:<?php echo $prefootertextcolor;?>;">
<?php echo wpautop(do_shortcode($prefootercontent));?>
</div>
<?php endif;?>
<div class="footer-wrapper clearfix">

	<div id="footer" class="clearfix">
    	<div id="footer-box-one" class="footerbox clearfix">
        	<?php if ( !dynamic_sidebar('footer1') ) : ?>
            
            <?php endif; ?>
        </div> <!-- End of footer-box-one -->
        <div id="footer-box-two" class="footerbox clearfix">
        	<?php if ( !dynamic_sidebar('footer2') ) : ?>
            
            <?php endif; ?>
        </div> <!-- End of footer-box-two -->
        <div id="footer-box-three" class="footerbox clearfix">
        	<?php if ( !dynamic_sidebar('footer3') ) : ?>
            
            <?php endif; ?>
        </div> <!-- End of footer-box-three -->
        <div id="footer-box-four" class="footerbox-last clearfix">
        	<?php if ( !dynamic_sidebar('footer4') ) : ?>
            
            <?php endif; ?>
        </div> <!-- End of footer-box-four -->
       
    </div> <!-- End of footer -->
    <div class="divider"></div>
	<div class="bottom-bar clearfix">
    	<div class="bottom-left clearfix">
        	<?php if($adminoptions[''.$themeprefix.'bottom_image']['src'] != null && $adminoptions[''.$themeprefix.'bottom_image']['src'] != ''):?>
			<div class="bottom-image"><img src="<?php echo $adminoptions[''.$themeprefix.'bottom_image']['src'];?>" alt="<?php echo $adminoptions[''.$themeprefix.'bottom_image']['src'];?>" /></div>
            <?php endif;?>
            <div class="bottom-info"><?php echo $adminoptions[''.$themeprefix.'bottom_info'];?></div>
        </div> <!-- End of bottom-left -->
        <div class="bottom-right clearfix">
        	
         	<?php get_template_part('/inc/social-icons');?>

        </div> <!-- End of bottom-right -->
	</div> <!-- End of bottom -->

</div> <!-- End of footer-wrapper -->

<div class="backtotop"></div>



<?php wp_footer();?>
</div> <!-- End of main wrapper -->

</body> <!-- End of body -->
