<?php

			/*===================
			Carousel
			=====================
			*/
	 

function migfx_themeshortcodes_fx_carousel_shortcode($atts, $content){
	
	extract( shortcode_atts( array(
				'posttype' => 'post',
				'items' => '4',
				'blocksize' => '4',
				'blocktitle' => '',
				'titlebackground' => '',
				'titlestyle' => '',
				'titlesize' => '',
				'titlecolor' => '',
				'navbackground' => ''
				), $atts ) ); 
	
			
			
			$output .= '<div class="evident-column '.$blocksize.' '.$last.'">';
			$output .= '<div class="evident_carousel_wrapper">';
			$output .= '<div class="evident_news_block_title '.$titlestyle.'">';
			if($blocktitle != null && $blocktitle != ''):
			$output .= '<h2 style="background-color:'.$titlebackground.'; font-size:'.$titlesize.'; color:'.$titlecolor.';">'.$blocktitle.'</h2>';
			endif;
			$output .= '<div class="mig_carousel_nav" style="background-color:'.$titlebackground.';">';
			$output .= '<a class="prev" id="prev2" href="#" style="background-color:'.$navbackground.';"><i class="icon-chevron-left"></i></a>';
			$output .= '<a class="next" id="next2" href="#" style="background-color:'.$navbackground.';"><i class="icon-chevron-right"></i></a>';
			$output .= '</div>';
			$output .= '</div>';
			$output .= '</div>';
			
		    $output .= '<ul id="foo2" class="evident_carousel_ul">';

		 	$args = array('posts_per_page' => $items, 'post_type' => $posttype); $carouselPosts = new WP_Query( $args );
		 	while ($carouselPosts->have_posts()) : $carouselPosts->the_post();
		 
			$output .= '<li>';
			$output .= '<div style="position:relative;">';
			$output .= '<a href="'.get_permalink().'">';
			$output .=  get_the_post_thumbnail($id, 'carouselimg');
			$output .= '</a>';
			$output .=  '</div>';
			$output .=  '</li>';
        	endwhile;
		
			$output .= '</ul>';
			$output .= '</div>';
			return $output;
			}

	
/*===================
News
=====================
*/			
	 

function migfx_themeshortcodes_fx_news_shortcode($atts, $content){


	extract( shortcode_atts( array(
				'blocktitle' => '',
				'titlebackground' => '',
				'titlestyle' => '',
				'last' => '',
				'blocksize' => '',
				'imageratio' => '',
				'columns' => '',
				'textalign' => '',
				'titlecolor' => '',
				'datecolor' => '',
				'viewmorecolor' => '',
				'posttype' => '',
				'categorietype' => '',
				'order' => '',
				'orderby' => '',
				'items' => '',
				'infobackground' => '',
				'titlesize' => '',
				'displaydate' => '',
				'displayexcerpt' => '',
				'displaymore' => '',

				), $atts ) ); 
				
				if($imageratio == 'portrait' ){$imageratio = 'square';}
				elseif($imageratio == 'original'){$imageratio = 'full';}
				
				if($columns == 'two' ){$imagesize = 'big';}
				elseif($columns == 'three' or $columns == 'four'){$imagesize = 'medium';}
				else {$imagesize = 'full';}
				if($last == 'yes'){$last = 'last';}else{$last = '';}
				if($categorietype = 'all'){$categorietype = '';}
				
				
				$args = array('post_type' => $posttype, 'posts_per_page' => $items, 'order' => $order, 'orderby' => $orderby, 'category_name' => $categorietype);
				$news = new WP_Query($args);?>
				
				<?php $output .= '<div class="evident_news_wrapper evident-column '.$blocksize.' '.$last.' clearfix">';?>
                <?php if($blocktitle != null && $blocktitle != ''):?>
                <?php $output .= '<div class="evident_news_block_title '.$titlestyle.'"><h2 style="background-color:'.$titlebackground.';">'.$blocktitle.'</h2></div>';?>
                <?php endif;?>
                <?php $output .= '<ul class="evident_news_content">';?>
				<?php if($news->have_posts()) :?>
 				<?php while($news->have_posts()) : $news->the_post()?>
                
                <?php 
				$output .= '<li class="evident_news_column '.$columns.'">';
				$output .= '<div class="evident_news_main_image"><a href="'.get_permalink().'">'.get_the_post_thumbnail($post->ID, $imagesize.$imageratio).'</a></div>';
				$output .= '<div class="evident_news_info" style="background-color:'.$infobackground.'; text-align:'.$textalign.';">';
				$output .= '<div class="evident_news_title"><a style="color:'.$titlecolor.'; font-size:'.$titlesize.';" href="'.get_permalink().'">'.get_the_title().'</a></div>';
				if($displaydate == 'yes'):
				$output .= '<div class="evident_news_date"><a  style="color:'.$datecolor.';" href="'.get_permalink().'">'.get_the_time('j M Y').'</a></div>';
				endif;
				
				if($displayexcerpt == 'yes'):
				$output .= '<div class="evident_news_excerpt">'.get_the_excerpt().'</div>';
				endif;
				
				if($displaymore == 'yes'):
				$output .= '<div class="evident_news_viewmore"><a style="color:'.$viewmorecolor.';" href="'.get_permalink().'">View More</a></div>';
				endif;
				$output .= '</div>';
				$output .= '</li>';
				?>
                
				<?php endwhile;?>
				<?php endif;?>
				<?php $output .= '</ul>';?>
                <?php $output .= '</div>';?>
                
		<?php return $output;

}	


/*===================
Columns
=====================
*/			
	 

function migfx_themeshortcodes_fx_columns_shortcode($atts, $content){


	extract( shortcode_atts( array(
				'columnsize' => '',
				'last' => '',
				'blocktitle' => '',
				'titlebackground' => '',
				'titlestyle' => '',
				), $atts ) ); 
				
				if($last == 'yes'){$last = 'last';}
				
				
     	$output .= '<div class="evident-column '.$columnsize.' '.$last.'">';
		if($blocktitle != null && $blocktitle != ''):
		$output .= '<div class="evident-column-block-title '.$titlestyle.'"><h2 style="background-color:'.$titlebackground.';">'.$blocktitle.'</h2></div>';
		endif;
		$output .= do_shortcode($content);
		$output .= '</div>';
	            
	return $output;

}


/*===================
Icon Box One
=====================
*/			
	 

function migfx_themeshortcodes_fx_iconbox_one_shortcode($atts, $content){


	extract( shortcode_atts( array(
				'boxsize' => '',
				'boxbackground' => '',
				'last' => '',
				'icon' => '',
				'iconsize' => '',
				'iconcolor' => '',
				'iconbackground' => '',
				'title' => '',
				'titlesize' => '',
				'titlecolor' => '',
				'contentcolor' => '',
				), $atts ) ); 
				
				if($last == 'yes'){$last = 'last';}
				
		$output .= '<div class="evident-iconboxone-wrapper clearfix evident-column '.$boxsize.' '.$last.'" style="background-color:'.$boxbackground.';">';
		$output .= '<div class="evident-iconboxone-icon-wrapper">';
		$output .= '<div class="evident-iconboxone-icon" style="font-size:'.$iconsize.'; background-color:'.$iconbackground.';"><i class="icon-'.$icon.'" style="color:'.$iconcolor.';"></i></div>';
		$output .= '</div>';
		$output .= '<div class="evident-iconboxone-padding clearfix">';
		$output .= '<h3 style="color:'.$titlecolor.'; font-size:'.$titlesize.';">'.$title.'</h3>';
		$output .= '<div class="evident-iconboxone-content" style="'.$contentcolor.'">'.wpautop(do_shortcode($content)).'</div>';
		$output .= '</div>';
		$output .= '</div>';	

	            
	return $output;

}


/*===================
Icon Box Two
=====================
*/			
	 

function migfx_themeshortcodes_fx_iconbox_two_shortcode($atts, $content){


	extract( shortcode_atts( array(
				'boxsize' => '',
				'last' => '',
				'icon' => '',
				'iconcolor' => '',
				'title' => '',
				'titlesize' => '',
				'titlecolor' => '',
				'textcolor' => '',
				), $atts ) ); 
				
				if($last == 'yes'){$last = 'last';}
				
		$output .= '<div class="evident-iconboxtwo-wrapper clearfix evident-column '.$boxsize.' '.$last.'">';
		$output .= '<div class="evident-icon" style="font-size:'.$titlesize.';"><i class="icon-'.$icon.'" style="color:'.$iconcolor.';"></i></div><h3 style="color:'.$titlecolor.'; font-size:'.$titlesize.';">'.$title.'</h3>';
		$output .= '<div class="evident-iconboxtwo-content" style="'.$textcolor.'">'.wpautop(do_shortcode($content)).'</div>';
		$output .= '</div>';	

	            
	return $output;

}



/*===================
Title
=====================
*/			
	 

function migfx_themeshortcodes_fx_title_shortcode($atts, $content){


	extract( shortcode_atts( array(
				'size' => '',
				'title' => '',
				'titlecolor' => '',
				'subtitle' => '',
				'subtitlecolor' => '',
				'alignment' => '',
				'margintop' => '',
				'marginbottom' => '',
				
				), $atts ) ); 
				
				if($size == 'big'){$size = 'h1'; $fontsize = '150%';}
				elseif($size == 'normal'){$size = 'h2'; $fontsize = '110%';}
				elseif($size == 'small'){$size = 'h3'; $fontsize = '90%';}
				
				
     	$output .= '<div class="evident-page-title-wrapper" style="text-align:'.$alignment.'; font-size:'.$fontsize.'; margin-bottom:'.$marginbottom.'; margin-top:'.$margintop.';">';
		$output .= '<'.$size.' style="color:'.$titlecolor.';" class="evident-title">'.$title.'</'.$size.'>';
		$output .= '<h5 style="color:'.$subtitlecolor.';" class="evident-subtitle">'.$subtitle.'</h5>';
		$output .= '</div>';
	            
	return $output;

}


/*===================
Button
=====================
*/			
	 

function migfx_themeshortcodes_fx_button_shortcode($atts, $content){


	extract( shortcode_atts( array(
				'buttontext' => '',
				'fontsize' => '',
				'background' => '',
				'bordercolor' => '',
				'fontcolor' => '',
				'useicon' => '',
				'icon' => '',
				'linktype' => '',
				'pagelink' => '',
				'postlink' => '',
				'customlink' => '',
				'target' => '',
				
				), $atts ) ); 
				
				if($linktype == 'page'){
				preg_match('#\((.*?)\)#', $pagelink, $match);
				$final = get_permalink($match[1]);
				}
				
				elseif($linktype == 'post') {
				preg_match('#\((.*?)\)#', $postlink, $match);
				$final = get_permalink($match[1]);
				
				}
				
				elseif($linktype == 'custom') {
				$final = $customlink;
				}
				
				
     	$output .= '<div class="evident-button-wrapper"  style="color:'.$fontcolor.'; font-size:'.$fontsize.'; background-color:'.$background.'; border: 1px solid '.$bordercolor.'">';
		$output .= '<a href="'.$final.'" target="'.$target.'" style="color:'.$fontcolor.';">';
		
		if($useicon == 'yes'){
		$output .= '<i class="icon-'.$icon.'"></i>';	
		}
		
		$output .= $buttontext;
		$output .= '</a>';
		$output .= '</div>';
	            
	return $output;

}		


/*===================
Promo Box
=====================
*/			
	 

function migfx_themeshortcodes_fx_promobox_shortcode($atts, $content){


	extract( shortcode_atts( array(
				'size' => '',
				'title' => '',
				'titlecolor' => '',
				'titlesize' => '',
				'background' => '',
				'contentcolor' => '',
				'fontsize' => '',
				'bordercolor' => '',
				'buttontext' => '',
				'buttontextcolor' => '',
				'buttonbackground' => '',
				'buttonborder' => '',
				'buttonsize' => '',
				'linktype' => '',
				'pagelink' => '',
				'postlink' => '',
				'customlink' => '',
				'target' => '',
				
				), $atts ) ); 
				
				if($linktype == 'page'){
				preg_match('#\((.*?)\)#', $pagelink, $match);
				$final = get_permalink($match[1]);
				}
				
				elseif($linktype == 'post') {
				preg_match('#\((.*?)\)#', $postlink, $match);
				$final = get_permalink($match[1]);
				
				}
				
				elseif($linktype == 'custom') {
				$final = $customlink;
				}
				
				
     	$output .= '<div class="evident-promobox-wrapper evident-column '.$size.' clearfix">';
		$output .= '<div class="evident-promobox-border clearfix" style="border: 1px solid '.$bordercolor.'; background-color:'.$background.';">';
		$output .= '<div class="evident-promobox-content clearfix" style="color:'.$contentcolor.';">';
		if($title != null && $title != ''):
		$output .= '<h2 style="color:'.$titlecolor.'; font-size:'.$titlesize.';">'.$title.'</h2>';
		endif;
		$output .= '<div class="evident-promobox-main clearfix" style="font-size:'.$fontsize.';">'.do_shortcode($content).'</div>';
		$output .= '</div>';
		$output .= '<div class="evident-promobox-button"><a href="'.$final.'" style="color:'.$buttontextcolor.'; background-color:'.$buttonbackground.'; border:1px solid '.$buttonborder.'; font-size:'.$buttonsize.';">'.$buttontext.'</a></div>';
		$output .= '</div>';
		$output .= '</div>';
	            
	return $output;

}		


/*===================
Featured Box
=====================
*/			
	 

function migfx_themeshortcodes_fx_featuredbox_shortcode($atts, $content){


	extract( shortcode_atts( array(
				'size' => '',
				'title' => '',
				'titlecolor' => '',
				'description' => '',
				'titlesize' => '',
				'subtitle' => '',
				'subtitlesize' => '',
				'background' => '',
				'contentcolor' => '',
				'fontsize' => '',
				'bordercolor' => '',
				
				), $atts ) ); 
				
				if($linktype == 'page'){
				preg_match('#\((.*?)\)#', $pagelink, $match);
				$final = get_permalink($match[1]);
				}
				
				elseif($linktype == 'post') {
				preg_match('#\((.*?)\)#', $postlink, $match);
				$final = get_permalink($match[1]);
				
				}
				
				elseif($linktype == 'custom') {
				$final = $customlink;
				}
				
				
     	$output .= '<div class="evident-featuredbox-wrapper evident-column '.$size.' clearfix">';
		$output .= '<div class="evident-featuredbox-border clearfix" style="border: 1px solid '.$bordercolor.'; background-color:'.$background.';">';
		$output .= '<div class="evident-featuredbox-featured">';
		$output .= do_shortcode($content);
		$output .= '</div>';
		$output .= '<div class="evident-featuredbox-content">';
		$output .= '<h2 style="color:'.$titlecolor.'; font-size:'.$titlesize.';">'.$title.'</h2>';
		$output .= '<h4 style="color:'.$titlecolor.'; font-size:'.$subtitlesize.';">'.$subtitle.'</h4>';
		$output .= '<div class="evident-featuredbox-main" style="color:'.$contentcolor.'; font-size:'.$fontsize.';">'.$description.'</div>';
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';
	            
	return $output;

}			


/*===================
Highlight
=====================
*/			
	 

function migfx_themeshortcodes_fx_hightlight_shortcode($atts, $content){


	extract( shortcode_atts( array(
				'color' => '',
				'fontsize'
				), $atts ) ); 

		$output .= '<span class="evident-highlight" style="color:'.$color.'; font-size:'.$fontsize.';">'.wpautop(do_shortcode($content)).'</span>';
	            
	return $output;

}		


/*===================
Divider
=====================
*/			
	 

function migfx_themeshortcodes_fx_divider_shortcode($atts, $content){


	extract( shortcode_atts( array(
				'style' => '',
				), $atts ) ); 

		$output .= '<div class="evident-divider '.$style.'"></div>';
	            
	return $output;

}		


/*===================
Divider
=====================
*/	
function migfx_themeshortcodes_fx_tabscontainer_shortcode( $atts, $content ) {
	extract( shortcode_atts( array(
				'style' => 1
				), $atts ) );

		$GLOBALS['tab_count'] = 0;

		do_shortcode( $content );

		if ( is_array( $GLOBALS['tabs'] ) ) {
			foreach ( $GLOBALS['tabs'] as $tab ) {
				$tabs[] = '<span>' . $tab['title'] . '</span>';
				$panes[] = '<div class="su-tabs-pane">' . $tab['content'] . '</div>';
			}
			$return = '<div class="su-tabs su-tabs-style-' . $style . '"><div class="su-tabs-nav">' . implode( '', $tabs ) . '</div><div class="su-tabs-panes">' . implode( "\n", $panes ) . '</div><div class="su-spacer"></div></div>';
		}

		// Unset globals
		unset( $GLOBALS['tabs'], $GLOBALS['tab_count'] );

		return $return;
}
	

