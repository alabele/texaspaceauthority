<?php 
/*============================ Related Posts  ============================== */

	$tags = wp_get_post_tags($post->ID);  
    if ($tags) {  
    $tag_ids = array();  
    foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;  
    $args=array(  
    'tag__in' => $tag_ids,  
    'post__not_in' => array($post->ID),  
    'showposts'=>4,  // Number of related posts that will be shown.  
    'caller_get_posts'=>1  
    );  
    $my_query = new wp_query($args);  
    if( $my_query->have_posts() ) {  
    echo '<div id="relatedposts"><h3>Related Posts</h3><ul>';  
    while ($my_query->have_posts()) {  
    $my_query->the_post();  
    ?>  
    <?php  
    if ( has_post_thumbnail() ) { ?>  
    <li><div class="relatedthumb"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail(); ?><?php the_title(); ?></a></div></li>  
    <?php } else { ?>  
    <li><div class="relatedthumb"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><img src="<?php echo get_template_directory_uri().'/images/no-image.jpg';?>" alt="<?php the_title_attribute(); ?>" /><?php the_title(); ?></a></div></li>  
    <?php }  
    ?>  
    <?php  
    }  
    echo '</ul></div>';  
    }  
    }  
    $post = $backup;  
    wp_reset_query();   

?>