<?php 

function mig_google_fonts(){
$themeprefix = 'evident_';
$getfont = get_option(''.$themeprefix.'theme_options');
$fontone = $getfont[''.$themeprefix.'menu_typo']['face'];
$fontone = str_replace(" ", "+", $fontone);
$fonttwo = $getfont[''.$themeprefix.'body_typo']['face'];
$fonttwo = str_replace(" ", "+", $fonttwo);
$fontthree = $getfont[''.$themeprefix.'titles_typo']['face'];
$fontthree = str_replace(" ", "+", $fontthree);
wp_enqueue_style( 'google_font_'.$fontone.'', 'http://fonts.googleapis.com/css?family='.$fontone.'');
wp_enqueue_style( 'google_font_'.$fonttwo.'', 'http://fonts.googleapis.com/css?family='.$fonttwo.'');
wp_enqueue_style( 'google_font_'.$fontthree.'', 'http://fonts.googleapis.com/css?family='.$fontthree.'');
}

add_action ('wp_enqueue_scripts', 'mig_google_fonts');
?>