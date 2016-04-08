<?php
global $themeprefix;
$adminoptions = get_option(''.$themeprefix.'theme_options');
$socialicons = $adminoptions[''.$themeprefix.'social_re_'];

if($socialicons != null && $socialicons != ''):
echo '<ul class="social-icons">';
foreach($socialicons as $socialicon):
	echo '<li><a href="'.$socialicon['re_socialurl'].'" target="'.$socialicon['re_socialopen'].'"><img src="'.get_template_directory_uri().'/icons/social/'.$socialicon['re_socialicon'].'.png"  alt="'.$socialicon['re_socialicon'].'"/></a></li>';
endforeach;
echo '</ul>';
endif;
?>