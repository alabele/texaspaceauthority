<?php 
/*============================= Unique CSS Styles ================================*/
	function mig_page_css_styles(){?>
    <?php $metaboxprefix = 'mig_';?>
    
    <?php 
	$backgroundtype = get_post_meta(get_the_id(), ''.$metaboxprefix.'custom_background_select', true);
	if($backgroundtype == 'backgroundcolor'){$custombackground = get_post_meta(get_the_id(), ''.$metaboxprefix.'custom_background_color', true);}
	elseif($backgroundtype == 'backgroundimage'){$custombackground = get_post_meta(get_the_id(), ''.$metaboxprefix.'custom_background_image', true);}
	elseif($backgroundtype == 'backgroundpattern'){$custombackground = get_post_meta(get_the_id(), ''.$metaboxprefix.'custom_background_pattern', true);}
	elseif($backgroundtype == 'defaultbackground'){$custombackground = '';}
	
	?>
    <?php if($backgroundtype == 'backgroundcolor'):?>
	<style type="text/css">
		
	body{background-color:<?php echo $custombackground?>; background-image: none;}
			
	</style>
    <?php endif;?>
    	
    <?php if($backgroundtype == 'backgroundimage'):?>
    <style type="text/css">
		
	body{background-image:url(<?php echo $custombackground['src']?>); background-position: center; background-attachment: fixed; background-repeat: repeat;}
			
	</style>
    <?php endif?>	
    
     <?php if($backgroundtype == 'backgroundpattern'):?>
    <style type="text/css">
		
	body{background-image:url(<?php echo get_template_directory_uri().'/images/'.$custombackground.'.png'?>);}
			
	</style>
    <?php endif?>	
    
	<?php }
	
	add_action('wp_footer', 'mig_page_css_styles');


?>