<?php get_header(); ?>
			
			<div id="content">

						<article id="post-not-found" class="hentry clearfix">
						
							<header class="article-header">
								<h2><?php _e("Error 404 - Page Not Found"); ?></h2>
							</header> <!-- end article header -->
					
							<section class="entry-content clearfix">
								<p><?php _e("The information you were looking for was not found. You might want to consider some of our suggestions to get better results:"); ?></p>
                                <ul>
									<li><?php  _e('Try a similar keyword.').'<br>'; ?></li>
       								<li><?php  _e('Check your spelling.').'<br>'; ?></li>
        							<li><?php  _e('Try using more than one keyword.').'<br>'; ?></li>
                                </ul>
							</section> <!-- end article section -->


							<section class="search">
								<p><?php get_search_form(); ?></p>
							</section> <!-- end search section -->
						
					
						</article> <!-- end article -->
    
			</div> <!-- end #content -->
<?php get_footer(); ?>