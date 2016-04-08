jQuery(document).ready(function(){

jQuery('body, .slidingDiv').addClass('js');

var logoheight = jQuery('.header-logo').height();





/*==================== scroll to top =====================*/

jQuery(function() {
	jQuery(window).scroll(function() {
		if(jQuery(this).scrollTop() != 0) {
			jQuery('.backtotop, .su-divider a').fadeIn();	
		} else {
			jQuery('.backtotop').fadeOut();
		}
	});
 
	jQuery('.backtotop').click(function() {
		jQuery('body,html').animate({scrollTop:0},500);
	});	
});



jQuery('.flexslider')
	.flexslider({
		controlNav: false,               
		directionNav: true, 
		});	


/*============================= pretty photo =====================================*/
  jQuery("a[rel^='prettyPhoto'], a[href*='.png']:has(img), a[href*='.jpeg']:has(img), a[href*='.jpg']:has(img), a[href*='.bmp']:has(img), a[href*='.gif']:has(img)").prettyPhoto({
			animation_speed: 'fast', /* fast/slow/normal */
			slideshow: 5000, /* false OR interval time in ms */
			autoplay_slideshow: true, /* true/false */
			opacity: 0.80, /* Value between 0 and 1 */
			show_title: true, /* true/false */
			allow_resize: true, /* Resize the photos bigger than viewport. true/false */
			default_width: 100,
			default_height: 100,
			counter_separator_label: '/', /* The separator for the gallery counter 1 "of" 2 */
			theme: 'pp_default', /* light_rounded / dark_rounded / light_square / dark_square / facebook */
			horizontal_padding: 20, /* The padding on each side of the picture */
			hideflash: false, /* Hides all the flash object on a page, set to TRUE if flash appears over prettyPhoto */
			wmode: 'opaque', /* Set the flash wmode attribute */
			autoplay: true, /* Automatically start videos: True/False */
			modal: false, /* If set to true, only the close button will close the window */
			deeplinking: true, /* Allow prettyPhoto to update the url to enable deeplinking. */
			overlay_gallery: true, /* If set to true, a gallery will overlay the fullscreen image on mouse over */
			keyboard_shortcuts: true, /* Set to false if you open forms inside prettyPhoto */
			changepicturecallback: function(){}, /* Called everytime an item is shown/changed */
			callback: function(){}, /* Called when prettyPhoto is closed */
			ie6_fallback: true,
			markup: '<div class="pp_pic_holder"> \
						<div class="ppt">&nbsp;</div> \
						<div class="pp_top"> \
							<div class="pp_left"></div> \
							<div class="pp_middle"></div> \
							<div class="pp_right"></div> \
						</div> \
						<div class="pp_content_container"> \
							<div class="pp_left"> \
							<div class="pp_right"> \
								<div class="pp_content"> \
									<div class="pp_loaderIcon"></div> \
									<div class="pp_fade"> \
										<a href="#" class="pp_expand" title="Expand the image">Expand</a> \
										<div class="pp_hoverContainer"> \
											<a class="pp_next" href="#">next</a> \
											<a class="pp_previous" href="#">previous</a> \
										</div> \
										<div id="pp_full_res"></div> \
										<div class="pp_details"> \
											<div class="pp_nav"> \
												<a href="#" class="pp_arrow_previous">Previous</a> \
												<p class="currentTextHolder">0/0</p> \
												<a href="#" class="pp_arrow_next">Next</a> \
											</div> \
											<p class="pp_description"></p> \
											{pp_social} \
											<a class="pp_close" href="#">Close</a> \
										</div> \
									</div> \
								</div> \
							</div> \
							</div> \
						</div> \
						<div class="pp_bottom"> \
							<div class="pp_left"></div> \
							<div class="pp_middle"></div> \
							<div class="pp_right"></div> \
						</div> \
					</div> \
					<div class="pp_overlay"></div>',
			gallery_markup: '<div class="pp_gallery"> \
								<a href="#" class="pp_arrow_previous">Previous</a> \
								<div> \
									<ul> \
										{gallery} \
									</ul> \
								</div> \
								<a href="#" class="pp_arrow_next">Next</a> \
							</div>',
			image_markup: '<img id="fullResImage" src="{path}" />',
			flash_markup: '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="{width}" height="{height}"><param name="wmode" value="{wmode}" /><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="{path}" /><embed src="{path}" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="{width}" height="{height}" wmode="{wmode}"></embed></object>',
			quicktime_markup: '<object classid="clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B" codebase="http://www.apple.com/qtactivex/qtplugin.cab" height="{height}" width="{width}"><param name="src" value="{path}"><param name="autoplay" value="{autoplay}"><param name="type" value="video/quicktime"><embed src="{path}" height="{height}" width="{width}" autoplay="{autoplay}" type="video/quicktime" pluginspage="http://www.apple.com/quicktime/download/"></embed></object>',
			iframe_markup: '<iframe src ="{path}" width="{width}" height="{height}" frameborder="no"></iframe>',
			inline_markup: '<div class="pp_inline">{content}</div>',
			custom_markup: '',
			social_tools: '<div class="pp_social"><div class="twitter"><a href="http://twitter.com/share" class="twitter-share-button" data-count="none">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></div><div class="facebook"><iframe src="http://www.facebook.com/plugins/like.php?locale=en_US&href='+location.href+'&amp;layout=button_count&amp;show_faces=true&amp;width=500&amp;action=like&amp;font&amp;colorscheme=light&amp;height=23" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:500px; height:23px;" allowTransparency="true"></iframe></div></div>' /* html or false to disable */
		});
	

  
  



// initialise superfish
		jQuery(function(){
			jQuery('ul.sf-menu').superfish({
				speed: 300,
				delay:0,
				animation: {height: 'show'}
			});
		});
		
		
/*
 * Superfish v1.4.8 - jQuery menu widget
 * Copyright (c) 2008 Joel Birch
 *
 * Dual licensed under the MIT and GPL licenses:
 * 	http://www.opensource.org/licenses/mit-license.php
 * 	http://www.gnu.org/licenses/gpl.html
 *
 * CHANGELOG: http://users.tpg.com.au/j_birch/plugins/superfish/changelog.txt
 */

;(function($){
	$.fn.superfish = function(op){

		var sf = $.fn.superfish,
			c = sf.c,
			$arrow = $(['<span class="',c.arrowClass,'"> &#187;</span>'].join('')),
			over = function(){
				var $$ = $(this), menu = getMenu($$);
				clearTimeout(menu.sfTimer);
				$$.showSuperfishUl().siblings().hideSuperfishUl();
			},
			out = function(){
				var $$ = $(this), menu = getMenu($$), o = sf.op;
				clearTimeout(menu.sfTimer);
				menu.sfTimer=setTimeout(function(){
					o.retainPath=($.inArray($$[0],o.$path)>-1);
					$$.hideSuperfishUl();
					if (o.$path.length && $$.parents(['li.',o.hoverClass].join('')).length<1){over.call(o.$path);}
				},o.delay);	
			},
			getMenu = function($menu){
				var menu = $menu.parents(['ul.',c.menuClass,':first'].join(''))[0];
				sf.op = sf.o[menu.serial];
				return menu;
			},
			addArrow = function($a){ $a.addClass(c.anchorClass).append($arrow.clone()); };
			
		return this.each(function() {
			var s = this.serial = sf.o.length;
			var o = $.extend({},sf.defaults,op);
			o.$path = $('li.'+o.pathClass,this).slice(0,o.pathLevels).each(function(){
				$(this).addClass([o.hoverClass,c.bcClass].join(' '))
					.filter('li:has(ul)').removeClass(o.pathClass);
			});
			sf.o[s] = sf.op = o;
			
			$('li:has(ul)',this)[($.fn.hoverIntent && !o.disableHI) ? 'hoverIntent' : 'hover'](over,out).each(function() {
				if (o.autoArrows) addArrow( $('>a:first-child',this) );
			})
			.not('.'+c.bcClass)
				.hideSuperfishUl();
			
			var $a = $('a',this);
			$a.each(function(i){
				var $li = $a.eq(i).parents('li');
				$a.eq(i).focus(function(){over.call($li);}).blur(function(){out.call($li);});
			});
			o.onInit.call(this);
			
		}).each(function() {
			var menuClasses = [c.menuClass];
			if (sf.op.dropShadows  && !($.browser.msie && $.browser.version < 7)) menuClasses.push(c.shadowClass);
			$(this).addClass(menuClasses.join(' '));
		});
	};

	var sf = $.fn.superfish;
	sf.o = [];
	sf.op = {};
	sf.IE7fix = function(){
		var o = sf.op;
		if ($.browser.msie && $.browser.version > 6 && o.dropShadows && o.animation.opacity!=undefined)
			this.toggleClass(sf.c.shadowClass+'-off');
		};
	sf.c = {
		bcClass     : 'sf-breadcrumb',
		menuClass   : 'sf-js-enabled',
		anchorClass : 'sf-with-ul',
		arrowClass  : 'sf-sub-indicator',
		shadowClass : 'sf-shadow'
	};
	sf.defaults = {
		hoverClass	: 'sfHover',
		pathClass	: 'overideThisToUse',
		pathLevels	: 1,
		delay		: 800,
		animation	: {opacity:'show'},
		speed		: 'normal',
		autoArrows	: false,
		dropShadows : true,
		disableHI	: true,		// true disables hoverIntent detection
		onInit		: function(){}, // callback functions
		onBeforeShow: function(){},
		onShow		: function(){},
		onHide		: function(){}
	};
	$.fn.extend({
		hideSuperfishUl : function(){
			var o = sf.op,
				not = (o.retainPath===true) ? o.$path : '';
			o.retainPath = false;
			var $ul = $(['li.',o.hoverClass].join(''),this).add(this).not(not).removeClass(o.hoverClass)
					.find('>ul').hide().css('visibility','hidden');
			o.onHide.call($ul);
			return this;
		},
		showSuperfishUl : function(){
			var o = sf.op,
				sh = sf.c.shadowClass+'-off',
				$ul = this.addClass(o.hoverClass)
					.find('>ul:hidden').css('visibility','visible');
			sf.IE7fix.call($ul);
			o.onBeforeShow.call($ul);
			$ul.animate(o.animation,o.speed,function(){ sf.IE7fix.call($ul); o.onShow.call($ul); });
			return this;
		}
	});

})(jQuery);





/*====================================== Responsive Menu ======================================*/
   jQuery(function () {

      // TinyNav.js 1
      jQuery('.navtiny').tinyNav({
      });
      
     

    });
	

/*===================Image Loader==================*/
(function($) {

	$.fn.imageLoader = function(options) {
    	var opts = $.extend({}, $.fn.imageLoader.defaults, options);
		var imagesToLoad = $(this).find("img")
									.css({opacity: 0, visibility: "hidden"})
									.addClass("imageLoader");
		var imagesToLoadCount = imagesToLoad.size();

		var checkIfLoadedTimer = setInterval(function() {
			if(!imagesToLoadCount) {
				clearInterval(checkIfLoadedTimer);
				return;
			} else {
				imagesToLoad.filter(".imageLoader").each(function() {
					if(this.complete) {
						fadeImageIn(this);
						imagesToLoadCount--;
					}
				});
			}
		}, opts.loadedCheckEvery);
		
		var fadeImageIn = function(imageToLoad) {
			$(imageToLoad).css({visibility: "visible"})
							.animate({opacity: 1}, 
								opts.imageEnterDelay, 
								removeImageClass(imageToLoad));
		};
		
		var removeImageClass = function(imageToRemoveClass) {
			$(imageToRemoveClass).removeClass("imageLoader");
		};
	};

	$.fn.imageLoader.defaults = {
		loadedCheckEvery: 350,
		imageEnterDelay: 900
	};

})(jQuery);

jQuery('.main').imageLoader();


/*==================== Isotope =====================*/
jQuery(window).load(function(){
// cache container
var $container = jQuery('.portfolio-content');
// initialize isotope
$container.isotope({
  	 animationOptions: {duration: 350, easing: 'swing', queue: false},
	 animationEngine: 'jquery',
	 layoutMode: 'fitRows',

});

// filter items when filter link is clicked
jQuery('.portfolio-filter a').click(function(e){
  e.preventDefault();
  
  var selector = jQuery(this).attr('data-portfolio-filter');
  $container.isotope({ filter: selector });
  return false;
});

})


/*==================== Portfolio & Gallery & Members ================================*/
jQuery('.portfolio-wrapper, .members-wrapper, .gallery-wrapper').each(function(){
	
	var overlayopacity = jQuery(this).attr('data-overlay-opacity');
	var background = jQuery(this).find('.portfolio-main-info, .members-main-info').css('background-color');
	var text = jQuery(this).find('.portfolio-main-info, .members-main-info').css('color');
	var backgroundhover = jQuery(this).attr('data-background-hover');
	var texthover = jQuery(this).attr('data-text-hover');
	
	jQuery(this).hover(
		function(){
		jQuery(this).find('.portfolio-overlay').stop().animate({opacity: overlayopacity}, 300);
		jQuery(this).find('.portfolio-main-info h3').stop().animate({color: texthover}, 300);
		jQuery(this).find('.portfolio-main-info').stop().animate({color: texthover, backgroundColor: backgroundhover}, 300);
		
		
		},
		function(){
		jQuery(this).find('.portfolio-overlay').stop().animate({opacity: 0}, 300);
		jQuery(this).find('.portfolio-main-info h3').stop().animate({color: text}, 300);
		jQuery(this).find('.portfolio-main-info').stop().animate({color: text, backgroundColor: background}, 300);
		}
	)
	
	jQuery(this).hover(
		function(){
		jQuery(this).find('.members-overlay').stop().animate({opacity: overlayopacity}, 300);
		jQuery(this).find('.members-main-info h3').stop().animate({color: texthover}, 300);
		jQuery(this).find('.members-main-info').stop().animate({color: texthover, backgroundColor: backgroundhover}, 300);
		
		
		},
		function(){
		jQuery(this).find('.members-overlay').stop().animate({opacity: 0}, 300);
		jQuery(this).find('.members-main-info h3').stop().animate({color: text}, 300);
		jQuery(this).find('.members-main-info').stop().animate({color: text, backgroundColor: background}, 300);
		}
	)
	
	jQuery(this).hover(
		function(){
		jQuery(this).find('.gallery-overlay').stop().animate({opacity: overlayopacity}, 300);
		},
		function(){
		jQuery(this).find('.gallery-overlay').stop().animate({opacity: 0}, 300);
		}
	)

})

}); /*============End of document ready ================*/




/*======================== Slider ============================*/
jQuery(window).load(function(){
	
	jQuery('.slider-wrapper').each(function(){
				var slideshoweffect = jQuery(this).attr('data-slideshow-effect')
				var slideshowtransition = jQuery(this).attr('data-slideshow-transition')
				var slideshowduration = jQuery(this).attr('data-slideshow-duration')
				var navopacity = jQuery(this).find('.mig-slider-nav').attr('data-opacity')
				var slideshowtransitionB = parseInt(slideshowtransition)
				var slideshowdurationB = parseInt(slideshowduration)
			
				var slideshowpagination = jQuery(this).attr('data-slideshow-pagination');
			
				if(slideshowpagination == 'yes'){slideshowpagination = true} else {slideshowpagination = false}
				if(slideshoweffect == ''){slideshoweffect = 'fade'}
				if(slideshowtransitionB == ''){slideshowtransitionB = 1000}
				if(slideshowdurationB == ''){slideshowdurationB = 6000}
	
		jQuery('.flexslider')
		.flexslider({
			animation: slideshoweffect,
			controlNav: slideshowpagination,
			directionNav: false,
			slideshowSpeed: slideshowdurationB,    
			animationSpeed: slideshowtransitionB, 
			maxItems: 1,
		});	
		
		jQuery('.mig-slideshow-next').click(function(){
			jQuery(this).parent().parent().find('.flexslider').flexslider("next");
		});

		jQuery('.mig-slideshow-prev').click(function(){
			jQuery(this).parent().parent().find('.flexslider').flexslider("next");
		});
		jQuery('.mig-slideshow-prev, .mig-slideshow-next').animate({opacity: navopacity})
	}) 


jQuery('.slider-wrapper').css({backgroundImage: 'none'});


})/*=========== End of window load =========================*/


