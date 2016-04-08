<?php  	function dynamic_styles(){?>
<!-- Load dynamic styles from backend -->
<?php 
global $themeprefix;
$adminoptions = get_option(''.$themeprefix.'theme_options');
$menufontsize =  $adminoptions[''.$themeprefix.'menu_typo']['size'];
$menufontsize = str_replace('px', '',$menufontsize );
?>


<?php 


?>
<style type="text/css">
body {
	background-color:<?php echo $adminoptions[''.$themeprefix.'body_background_color']?>;
	font-family:<?php echo $adminoptions[''.$themeprefix.'body_typo']['face']?>; 
	font-size:<?php echo $adminoptions[''.$themeprefix.'body_typo']['size']?>; 
	color:<?php echo $adminoptions[''.$themeprefix.'body_typo']['color']?>; 
	font-weight:<?php echo $adminoptions[''.$themeprefix.'body_typo']['weight']?>; font-style:<?php echo $adminoptions[''.$themeprefix.'body_typo']['style']?>;
	background-image:url(<?php echo get_template_directory_uri().'/images/'?><?php echo $adminoptions[''.$themeprefix.'general_body_pattern']?>.png);
	line-height:<?php echo $adminoptions[''.$themeprefix.'general_body_lineheight'];?>;
	}
	
.fontone {font-family:<?php echo $adminoptions[''.$themeprefix.'menu_typo']['face']?>;}
a {color:<?php echo $adminoptions[''.$themeprefix.'link_color']?>;}
a:hover {color:<?php echo $adminoptions[''.$themeprefix.'link_hover_color']?>}
.main-title-wrapper, .main-title h1, .mwtitle h4 {background-color:<?php echo $adminoptions[''.$themeprefix.'main_background_color']?>;}
h1, h2, h3, h4, h5, h6 {font-family:<?php echo $adminoptions[$themeprefix.'titles_typo']['face']?>; color:<?php echo $adminoptions[$themeprefix.'titles_typo']['color']?>;}	

/*============= Header =======================*/
.header-wrapper {background-color: <?php echo $adminoptions[''.$themeprefix.'header_background']?>;}
.top-bar-wrapper {background-color:<?php echo $adminoptions[''.$themeprefix.'top_background']?>;}
.top-bar-wrapper, .top-bar-wrapper a {color:<?php echo $adminoptions[''.$themeprefix.'top_color']?>;}
.header-bottom-bar {background-color:<?php echo $adminoptions[''.$themeprefix.'header_bottom_bar']?>; border-bottom:6px solid <?php echo $adminoptions[''.$themeprefix.'header_bottom_bar_border']?>;}
.header-bottom-bar .social-icons li {border-right:1px solid <?php echo $adminoptions[''.$themeprefix.'header_bottom_bar']?>; }
.header-bottom-bar-content {background-color:<?php echo $adminoptions[''.$themeprefix.'header_bottom_bar']?>;}
.header-tagline, .header-tagline:hover {color:<?php echo $adminoptions[''.$themeprefix.'header_tagline_color']?>;}

/*============= Menu ==========================*/
.main-menu .sf-menu a {font-family:<?php echo $adminoptions[''.$themeprefix.'menu_typo']['face']?>; color:<?php echo $adminoptions[''.$themeprefix.'menu_typo']['color']?>; font-size:<?php echo $adminoptions[''.$themeprefix.'menu_typo']['size']?>; font-weight:<?php echo $adminoptions[''.$themeprefix.'menu_typo']['weight']?>; font-style:<?php echo $adminoptions[''.$themeprefix.'menu_typo']['style']?>;}
.sf-menu li {border-bottom:1px solid transparent;}
.main-menu .sf-menu li.current-menu-item, .main-menu .sf-menu li:hover, .main-menu .current-menu-ancestor {border-bottom: 1px solid <?php echo $adminoptions[''.$themeprefix.'menu_hover_background']?>;}
.main-menu .sf-menu li.current-menu-item a, .main-menu .sf-menu li a:hover, .main-menu .current-menu-ancestor a{color:<?php echo $adminoptions[''.$themeprefix.'menu_hover_textcolor']?>;}
.main-menu .sf-menu ul {background-color:<?php echo $adminoptions[''.$themeprefix.'submenu_background']?>;}
.main-menu .sf-menu ul li:hover {background-color:<?php echo $adminoptions[''.$themeprefix.'submenu_background_hover']?>;}
.main-menu .sf-menu ul li a, .main-menu .sf-menu ul li a:hover, .main-menu .sf-menu .current-menu-item ul li a, .main-menu .sf-menu ul li.current-menu-item a {color:<?php echo $adminoptions[''.$themeprefix.'submenu_text_color']?>;}
.main-menu .sf-menu ul {border-top:2px solid <?php echo $adminoptions[''.$themeprefix.'menu_hover_background']?>;}
.main-menu .sf-menu ul li a {font-size:<?php echo ($menufontsize - 4) . 'px' ?>;}

/*=================== Content ==========================*/
.main {background-color:<?php echo $adminoptions[''.$themeprefix.'main_background_color']?>;}

/*=========================== Blog =================================*/

.post-title h2 a, .post-categories li a {color:<?php echo $adminoptions[''.$themeprefix.'blog_title_color']?>;}
#post-comments .comment-author a, #post-comments .comment-meta a {color:<?php echo $adminoptions[''.$themeprefix.'body_typo']['color']?>;}

/*============== Sidebar ====================*/
.mwtitle {background-color:<?php echo $adminoptions[''.$themeprefix.'sidebar_title_background']?>; color:<?php echo $adminoptions[''.$themeprefix.'sidebar_title_color']?>;}
.sidebar-wrapper, .sidebar-wrapper a {background-color:<?php echo $adminoptions[''.$themeprefix.'sidebar_backgrund']?>; color:<?php echo $adminoptions[''.$themeprefix.'sidebar_text_color']?>;}


/*===============footer======================*/
.fwtitle {color:<?php echo $adminoptions[''.$themeprefix.'footer_title_color']?>; border-bottom-color:<?php echo $adminoptions[''.$themeprefix.'footer_title_border']?>;}
.footer-wrapper {color:<?php echo $adminoptions[''.$themeprefix.'footer_text_color']?>; background-color:<?php echo $adminoptions[''.$themeprefix.'footer_background_color']?>;}
.footer-wrapper a {color:<?php echo $adminoptions[''.$themeprefix.'footer_text_color']?>;}
.bottom-bar {background-color:<?php echo $adminoptions[''.$themeprefix.'bottom_background_color']?>;}
.fwtitle span {background-color:<?php echo $adminoptions[''.$themeprefix.'footer_background_color']?>;}



/*===================== Main Color ============================*/
.tagcloud a:hover, .footer-wrapper .social-icons li:hover, .backtotop:hover, .wpcf7 .wpcf7-mail-sent-ok, input[type="submit"], .pagination .current, .pagination a:hover {background-color:<?php echo $adminoptions[''.$themeprefix.'main_color']?>;}
.zframe-flickr-wrap-ltr img:hover {border:2px solid <?php echo $adminoptions[''.$themeprefix.'main_color']?>;}
.sidebar-widget a:hover, .post-title h2 a:hover {color:<?php echo $adminoptions[''.$themeprefix.'main_color']?>;}

/*===================== Portfolio & gallery & members ===========================*/

/*============== Pre Footer ====*/


/*============== Custom CSS ==================*/


<?php echo $adminoptions[''.$themeprefix.'custom_css']?>
</style>


<?php } ?>