<?php

	
	/**
	 * Open group of Shortcodes
	 */
	function migfx_themeshortcodes_shortcodes( $shortcode = false ) {
		
		/*============ global values from array ==================*/
		
		global $fontawesomeicons;
		global $percentsizes;
		
		$posttypes = get_post_types(array('public' => 'true'));
		
		$attachmentkey = array_search('attachment', $posttypes);
		$pagekey = array_search('page', $posttypes);
		
		if($attachmentkey != null && $attachmentkey != ''){
		unset($posttypes[$attachmentkey]);
		}
		
		if($pagekey != null && $pagekey != ''){
		unset($posttypes[$pagekey]);
		}
		
		
		/*============= Get Pages and posts  ===================*/
		$getpages = get_pages();
		$getposts = get_posts();
		
		/*============= Get categories  ===================*/
		$categories = get_categories(array('type' => 'all'));
		$all->slug = 'all';
		array_push($categories, $all);
		
		/*============= Get categories  ===================*/
		$taxonomies = get_terms('portfolio_category');
		$all->slug = 'all';
		
		
		
		$shortcodes = array(
			# basic shortcodes - start
			'basic-shortcodes-open' => array(
				'name' => __( 'Basic shortcodes', 'mig-fx' ),
				'type' => 'opengroup'
			),
			
			/*===================
			Columns
			=====================
			*/
			
			'fx_columns' => array(
				'name' => 'Columns',
				'desc' => 'Columns',
				'type' => 'wrap',
				'atts' => array(
					'blocktitle' => array(
						'values' => array(),
						'desc' => 'Title of the block'
					),
					
					'titlebackground' => array(
						'values' => array(),
						'desc' => 'Title Background Color',
						'type' => 'color',
						'default' => '#ffffff',
						
					),
					
					'titlestyle' => array(
						'values' => array(
							'slashes',
							'points',
							'line',
							'none',
						),
						'desc' => 'Title style',
						'default' => 'none'
					),
					
					'columnsize' => array (
						'values' => array(
							'full',
							'one-half',
							'one-third',
							'two-third',
							'one-fourth',
							'three-fourth',
						),
						'desc' => 'Column Size'
					),
					
					'last' => array(
						'values' => array(
						'no',
						'yes',
						),
						'desc' => 'Is this the last column of the row?',
					),
				),
			),
			
			/*===================
			Titles
			=====================
			*/
			
			'fx_title' => array(
				'name' => 'Title',
				'desc' => 'Title',
				'type' => 'single',
				'atts' => array(
					'size' => array (
						'values' => array(
								'big',
								'normal',
								'small',
						),
						'desc' => 'Title Size'
					),
					
					'title' => array(
						'values' => array(),
						'desc' => 'Title',
					),
					
					'titlecolor' => array(
						'values' => array(),
						'desc' => __( 'Title Color', 'mig-fx' ),
						'type' => 'color',
						'default' => '#222222',
					),
					
					'subtitle' => array(
						'values' => array(),
						'desc' => 'Subtitle',
					),
					
					'subtitlecolor' => array(
						'values' => array(),
						'desc' => __( 'Subtitle Color', 'mig-fx' ),
						'type' => 'color',
						'default' => '#222222',
					),
					
					'alignment' => array(
						'values' => array(
						'left',
						'center',
						'right',
						),
						'desc' => 'Text Align',
					),
					
					'margintop' => array(
						'values' => array(
							'80px',
							'60px',
							'40px',
							'20px',
							'0',
						),
						'desc' => __( 'Margin from Bottom', 'mig-fx' ),
						'default' => '40px',
					),
					
					'marginbottom' => array(
						'values' => array(
							'80px',
							'60px',
							'40px',
							'20px',
							'0',
						),
						'desc' => __( 'Margin from Top', 'mig-fx' ),
						'default' => '40px',
					),
				),
			),
			
			
			/*===================
			Button
			=====================
			*/
			
			'fx_button' => array(
				'name' => 'Button',
				'desc' => 'Button',
				'type' => 'single',
				'atts' => array(
					'buttontext' => array (
						'values' => array(),
						'desc' => 'Button Text'
					),
					
					'fontsize' => array (
						'values' => $percentsizes,
						'desc' => 'Font Size'
					),
					
					'background' => array(
						'values' => array(),
						'desc' => __( 'Background Color', 'mig-fx' ),
						'type' => 'color',
						'default' => '#fafafa',
					),
					
					'bordercolor' => array(
						'values' => array(),
						'desc' => __( 'Border Color', 'mig-fx' ),
						'type' => 'color',
						'default' => '#eaeaea',
					),
					
					'fontcolor' => array(
						'values' => array(),
						'desc' => __( 'Text Color', 'mig-fx' ),
						'type' => 'color',
						'default' => '#777777',
					),
					
					'useicon' => array(
						'values' => array(
							'yes',
							'no',
						),
						'desc' => __( 'Use Icon', 'mig-fx' ),
					),
					
					'icon' => array(
						'values' => $fontawesomeicons,
						'desc' => 'Icon',
					),
					
					'dividerone' => array(
						'type' => 'divider',		
					),
					
					'linktype' => array(
						'values' => array(
							'page',
							'post',
							'custom',
						),
						'desc' => 'Select the type of link. Only one of the three options below will work, depending of the option choosen here',
					),
					
					'pagelink' => array(
						'values' => $getpages,
						'desc' => 'Page Link',
						'type' => 'page_list',
					),
					
					'postlink' => array(
						'values' => $getposts,
						'desc' => 'Post Link',
						'type' => 'page_list',
					),
					
					'customlink' => array(
						'values' => array(),
						'desc' => 'Custom Link. Insert a valid URL',
						'type' => 'page_list',
						'help' => 'Ex: http://mypage.com/myprofile',
					),
					
					'target' => array(
						'values' => array(
							'self',
							'new',
						),
						'desc' => 'Select the link target',
					),
					
				),
			),
			
			/*===================
			Promo Box
			=====================
			*/
			
			'fx_promobox' => array(
				'name' => 'Promo Box',
				'desc' => 'Promo Box',
				'type' => 'wrap',
				'atts' => array(
					'size' => array (
						'values' => array(
							'full',
							'one-half',
							'one-third',
							'two-third',
							'one-fourth',
							'three-fourth',
						),
						'desc' => 'Box Size'
					),
					
					'background' => array(
						'values' => array(),
						'desc' => __( 'Background Color', 'mig-fx' ),
						'type' => 'color',
						'default' => '#fafafa',
					),
					
					'title' => array(
						'values' => array(),
						'desc' => __( 'Title', 'mig-fx' ),
					),
					
					'titlesize' => array(
						'values' => $percentsizes,
						'desc' => __( 'Title Size', 'mig-fx' ),
						'default' => '190%'
					),
					
					'titlecolor' => array(
						'values' => array(),
						'desc' => __( 'Title Color', 'mig-fx' ),
						'type' => 'color',
						'default' => '#333333',
					),
					
					'contentcolor' => array(
						'values' => array(),
						'desc' => __( 'Text Content Color', 'mig-fx' ),
						'type' => 'color',
						'default' => '#555555',
					),
					
					'fontsize' => array(
						'values' => $percentsizes,
						'desc' => __( 'Main content Font Size', 'mig-fx' ),
						'default' => '110%'
					),
					
					'bordercolor' => array(
						'values' => array(),
						'desc' => __( 'Border Color', 'mig-fx' ),
						'type' => 'color',
						'default' => '#eaeaea',
					),
					
					'buttontext' => array(
						'values' => array(),
						'desc' => __( 'Button Text', 'mig-fx' ),
					),
					
					'buttontextcolor' => array(
						'values' => array(),
						'desc' => __( 'Button Text Color', 'mig-fx' ),
						'type' => 'color',
						'default' => '#ffffff',
					),
					
					'buttonbackground' => array(
						'values' => array(),
						'desc' => __( 'Button Background Color', 'mig-fx' ),
						'type' => 'color',
						'default' => '#fcc500',
					),
					
					'buttonborder' => array(
						'values' => array(),
						'desc' => __( 'Button Border Color', 'mig-fx' ),
						'type' => 'color',
						'default' => '#fcad00',
					),
					
					'buttonsize' => array(
						'values' => $percentsizes,
						'desc' => __( 'Button Size', 'mig-fx' ),
						'default' => '140%'
					),
					
						
					'dividerone' => array(
						'type' => 'divider',		
					),
					
					'linktype' => array(
						'values' => array(
							'page',
							'post',
							'custom',
						),
						'desc' => 'Select the type of link. Only one of the three options below will work, depending of the option choosen here',
					),
					
					'pagelink' => array(
						'values' => $getpages,
						'desc' => 'Page Link',
						'type' => 'page_list',
					),
					
					'postlink' => array(
						'values' => $getposts,
						'desc' => 'Post Link',
						'type' => 'page_list',
					),
					
					'customlink' => array(
						'values' => array(),
						'desc' => 'Custom Link. Insert a valid URL',
						'type' => 'page_list',
						'help' => 'Ex: http://mypage.com/myprofile',
					),
					
					'target' => array(
						'values' => array(
							'self',
							'new',
						),
						'desc' => 'Select the link target',
					),
					
				),
			),
			
			
			/*===================
			Featured Box
			=====================
			*/
			
			'fx_featuredbox' => array(
				'name' => 'Featured Box',
				'desc' => 'Featured Box',
				'type' => 'wrap',
				'atts' => array(
				
					
					'size' => array (
						'values' => array(
							'full',
							'one-half',
							'one-third',
							'two-third',
							'one-fourth',
							'three-fourth',
						),
						'desc' => 'Box Size'
					),
					
					'background' => array(
						'values' => array(),
						'desc' => __( 'Background Color', 'mig-fx' ),
						'type' => 'color',
						'default' => '#fafafa',
					),
					
					'title' => array(
						'values' => array(),
						'desc' => __( 'Title', 'mig-fx' ),
					),
					
					'titlesize' => array(
						'values' => $percentsizes,
						'desc' => __( 'Title Size', 'mig-fx' ),
						'default' => '190%'
					),
					
					'titlecolor' => array(
						'values' => array(),
						'desc' => __( 'Title Color', 'mig-fx' ),
						'type' => 'color',
						'default' => '#333333',
					),
					
					'subtitle' => array(
						'values' => array(),
						'desc' => __( 'Subitle', 'mig-fx' ),
					),
					
					'subtitlesize' => array(
						'values' => $percentsizes,
						'desc' => __( 'Subtitle Size', 'mig-fx' ),
						'default' => '110%'
					),
					
					
					'description' => array (
						'values' => array(),
						'desc' => 'Description'
					),
					
					'contentcolor' => array(
						'values' => array(),
						'desc' => __( 'Text Content Color', 'mig-fx' ),
						'type' => 'color',
						'default' => '#555555',
					),
					
					'fontsize' => array(
						'values' => $percentsizes,
						'desc' => __( 'Main content Font Size', 'mig-fx' ),
						'default' => '100%'
					),
					
					'bordercolor' => array(
						'values' => array(),
						'desc' => __( 'Border Color', 'mig-fx' ),
						'type' => 'color',
						'default' => '#eaeaea',
					),
					
				),
			),
			
			
			/*===================
			Icon Box One
			=====================
			*/
			
			'fx_iconbox_one' => array(
				'name' => 'Icon Box One',
				'desc' => 'Icon Box One',
				'type' => 'wrap',
				'atts' => array(
					'boxsize' => array (
						'values' => array(
								'full',
								'one-half',
								'one-third',
								'two-third',
								'one-fourth',
								'three-fourth',
						),
						'desc' => 'Box Size'
					),
					
					'boxbackground' => array(
						'values' => array(),
						'desc' => __( 'Box Background', 'mig-fx' ),
						'type' => 'color',
						'default' => '#fafafa',
					),
					
					'last' => array(
						'values' => array(
							'no',
							'yes',	
						),
						'desc' => 'Is this the last block of the row?'
					),
					
					'icon' => array (
						'values' => $fontawesomeicons,
						'desc' => 'Select an Icon'
					),
					
					'iconsize' => array(
						'values' => $percentsizes,
						'desc' => 'Icon Size',
						'default' => '180%'
					),
					
					'iconcolor' => array(
						'values' => array(),
						'desc' => __( 'Icon Color', 'mig-fx' ),
						'type' => 'color',
						'default' => '#ffffff',
					),
					
					'iconbackground' => array(
						'values' => array(),
						'desc' => __( 'Icon Color', 'mig-fx' ),
						'type' => 'color',
						'default' => '#fcc500',
					),
					
					'title' => array(
						'values' => array(),
						'desc' => 'Box Title',
					),
					
					'titlesize' => array(
						'values' => $percentsizes,
						'desc' => 'Title Size',
						'default' => '170%'
					),
					
					'titlecolor' => array(
						'values' => array(),
						'desc' => __( 'Title Color', 'mig-fx' ),
						'type' => 'color',
						'default' => '#222222',
					),
					
					'contentcolor' => array(
						'values' => array(),
						'desc' => __( 'Content Text color', 'mig-fx' ),
						'type' => 'color',
						'default' => '#666666',
					),
					
					
				),
			),
			/*===================
			Icon Box Two
			=====================
			*/
			
			'fx_iconbox_two' => array(
				'name' => 'Box with Icon',
				'desc' => 'Box with Icon',
				'type' => 'wrap',
				'atts' => array(
					'boxsize' => array (
						'values' => array(
								'full',
								'one-half',
								'one-third',
								'two-third',
								'one-fourth',
								'three-fourth',
						),
						'desc' => 'Box Size'
					),
					
					'last' => array(
						'values' => array(
							'no',
							'yes',	
						),
						'desc' => 'Is this the last block of the row?'
					),
					
					'icon' => array (
						'values' => $fontawesomeicons,
						'desc' => 'Select an Icon'
					),
					
					'iconcolor' => array(
						'values' => array(),
						'desc' => __( 'Icon Color', 'mig-fx' ),
						'type' => 'color',
						'default' => '#222222',
					),
					
					'title' => array(
						'values' => array(),
						'desc' => 'Box Title',
					),
					
					'titlesize' => array(
						'values' => $percentsizes,
						'desc' => 'Title Size',
						'default' => '140%'
					),
					
					'titlecolor' => array(
						'values' => array(),
						'desc' => __( 'Title Color', 'mig-fx' ),
						'type' => 'color',
						'default' => '#222222',
					),
					
					'contentcolor' => array(
						'values' => array(),
						'desc' => __( 'Content Text color', 'mig-fx' ),
						'type' => 'color',
						'default' => '#666666',
					),
					
					
				),
			),
			
			/*===================
			Carousel
			=====================
			*/
			
			'fx_carousel' => array(
				'name' => 'Image Carousel',
				'desc' => 'Image Carousel',
				'type' => 'single',
				'atts' => array(
					'items' => array (
						'values' => array(
								'4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20'
						),
						'desc' => 'Item to show'
					),
				
					'blocksize' => array(
						'values' => array(
							'full',
							'one-half',
							'one-third',
							'two-third',
							'one-fourth',
							'three-fourth',	
						),
						'desc' => 'Size of container'
					),
					
					'titlesize' => array(
						'values' => $percentsizes,
						'desc' => __( 'Title Size', 'mig-fx' ),
						'default' => '150%'
					),
					
					'titlecolor' => array(
						'values' => array(),
						'desc' => 'Title Text Color',
						'type' => 'color',
						'default' => '#444444',
						
					),
					
					'last' => array(
						'values' => array(
							'no',
							'yes',	
						),
						'desc' => 'Is this the last block of the row?'
					),
					
					
					'blocktitle' => array(
						'values' => array(),
						'desc' => 'Title of the block'
					),
					
					'titlebackground' => array(
						'values' => array(),
						'desc' => 'Title Background Color',
						'type' => 'color',
						'default' => '#ffffff',
						
					),
					
					
					'titlestyle' => array(
						'values' => array(
							'slashes',
							'points',
							'line',
							'none',
						),
						'desc' => 'Title style',
						'default' => 'none'
					),
					
					'navbackground' => array(
						'values' => array(),
						'desc' => 'Nav Buttons Background Color',
						'type' => 'color',
						'default' => '#ffffff',
						
					),

					'posttype' => array(
						'values' => $posttypes,
						'desc' => 'Source of content',
						'type' => 'post_type',
					),
				),
			),
			
			/*===================
			Highlight
			=====================
			*/
			
			'fx_highlight' => array(
				'name' => 'Highlight Text',
				'desc' => 'Highlight Text',
				'type' => 'wrap',
				'atts' => array(

					'color' => array(
						'values' => array(),
						'desc' => 'Text Color',
						'type' => 'color',
						'default' => '#444444',
						
					),
					
					'fontsize' => array(
						'values' => $percentsizes,
						'desc' => 'Font Size',
						'default' => '100%',
						
					),
					
				),
			),
			
			/*===================
			Divider
			=====================
			*/
			
			'fx_divider' => array(
				'name' => 'Horizontal Divider',
				'desc' => 'Horizontal Divider',
				'type' => 'single',
				'atts' => array(

					'style' => array(
						'values' => array(
							'points',
							'slashes',
							'line',
						),
						'desc' => 'Style',
						'default' => 'points',
						
					),
					
				),
			),
	
			/*===================
			Style One
			=====================
			*/
			
			'fx_news' => array(
				'name' => 'Latest News',
				'desc' => 'Latest News',
				'type' => 'single',
				'atts' => array(
					
					'blocksize' => array(
						'values' => array(
							'full',
							'one-half',
							'one-third',
							'two-third',
							'one-fourth',
							'three-fourth',	
						),
						'desc' => 'Size of container'
					),
					
					'last' => array(
						'values' => array(
							'no',
							'yes',	
						),
						'desc' => 'Is this the last block of the row?'
					),
					
					
					'blocktitle' => array(
						'values' => array(),
						'desc' => 'Title of the block'
					),
					
					'titlebackground' => array(
						'values' => array(),
						'desc' => 'Title Background Color',
						'type' => 'color',
						'default' => '#ffffff',
						
					),
					
					'titlestyle' => array(
						'values' => array(
							'slashes',
							'points',
							'line',
							'none',
						),
						'desc' => 'Title style',
						'default' => 'none'
					),
					
					'imageratio' => array(
						'values' => array(
							'portrait',
							'landscape',
							'original',
						),
						'desc' => 'Image Ratio'
					),
					
					
					'columns' => array(
						'values' => array(
							'one',
							'two',
							'three',
							'four',	
						),
						'desc' => 'Number of columns'
					),
					
					'titlesize' => array(
						'values' => $percentsizes,
						'desc' => __( 'Title Size', 'mig-fx' ),
						'default' => '140%'
					),
					
					
					'titlecolor' => array(
						'values' => array(),
						'desc' => __( 'Set the color of the text', 'mig-fx' ),
						'type' => 'color',
						'default' => '#222222',
			
					),
					
					'textalign' => array(
						'values' => array(
							'left',
							'center',
							'right',
						),
						'desc' => __( 'Text Align', 'mig-fx' ),
					),
					
					'infobackground' => array(
						'values' => array(),
						'desc' => __( 'Main background of Info Area', 'mig-fx' ),
						'type' => 'color',
						'default' => '#fafafa',
			
					),
					
					'datecolor' => array(
						'values' => array(),
						'desc' => __( 'Set the color of the text', 'mig-fx' ),
						'type' => 'color',
						'default' => '#666666',
			
					),
					
					'datebackground' => array(
						'values' => array(),
						'desc' => __( 'Set the color of the text', 'mig-fx' ),
						'type' => 'color',
						'default' => '#666666',
			
					),

					'viewmorecolor' => array(
						'values' => array(),
						'desc' => __( 'Set the color of the text', 'mig-fx' ),
						'type' => 'color',
						'default' => '#fcc500',
			
					),
					
					'dividertwo' => array(
						'type' => 'divider',		
					),
					
					'displaydate' => array(
						'values' => array(
							'yes',
							'no',
						),
						'desc' => 'Display Date',
					),
					
					'displayexcerpt' => array(
						'values' => array(
							'yes',
							'no',
						),
						'desc' => 'Display Excerpt',
					),
					
					'displaymore' => array(
						'values' => array(
							'yes',
							'no',
						),
						'desc' => 'Display View More Link',
					),
					
					
					
					'posttype' => array(
						'values' => $posttypes,
						'desc' => 'Source of content',
						'type' => 'post_type',
					),
					
					'items' => array(
						'values' => array(
							'1','2','3','4','5','6','7','8','9','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25'
							
						),
						'desc' => 'Numbers of post to be displayed',
						'type' => 'post_type',
					),
					
					'categorietype' => array(
						'values' => $categories,
						'desc' => 'Categorie (slug)',
						'type' => 'categorie_list',
					),
					
					'order' => array(
						'values' => array(
							'ASC',
							'DESC',
						),
						'desc' => 'Ascending or Descending order',
					),
					
					'orderby' => array(
						'values' => array(
							'title',
							'name',
							'date',
							'modified',
							'rand',
							'comment_count',
							'ID',
						),
						'desc' => 'Order by',
					),
					
					
				),
			),
						
		# basic shortcodes - end
		'basic-shortcodes-close' => array(
			'type' => 'closegroup'
		),
	);

		if ( $shortcode )
			return $shortcodes[$shortcode];
		else
			return $shortcodes;
	}

?>