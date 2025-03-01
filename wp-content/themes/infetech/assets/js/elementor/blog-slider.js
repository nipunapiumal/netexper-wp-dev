(function($){
	"use strict";

	$(window).on('elementor/frontend/init', function () {
		
		elementorFrontend.hooks.addAction('frontend/element_ready/infetech_elementor_blog_slider.default', function(){

			$(".ova-blog-slider .blog-slider").each(function(){
		        var owlsl 		= $(this) ;
		        var owlsl_ops 	= owlsl.data('options') ? owlsl.data('options') : {};
		        var template 	= owlsl_ops.template;
		        var navCon 		= "#ova-blog-slider-control";
		        
		        var isRTL = $('body').hasClass('rtl');
		        
		        if( template === 'template2' || template === 'template3' ) {
		        	var navCon = '#ova-blog-slider-control-2';
		        }

		        if( template === 'template4' ) {
		        	var navCon = '#ova-blog-slider-control-3';
		        }

		        if( template === 'template1' || template === 'template2'){
			        var responsive_value = {
			            0:{
			              	items:1,
			              	nav:false,
			              	dots: owlsl_ops.dots,
			            },
			            576:{
			              	items:1,
			              	dots: owlsl_ops.dots ,
			            },
			            768:{
			              	items:2,
			            },
			            1025:{
			            	items: 1,
			            },
			            1300:{
			              	items:2,
			            },
			            1600:{
			              	items:owlsl_ops.items,
			            }
			        };
		        }

		        if( template === 'template3' ){
			        var responsive_value = {
			            0:{
			              	items:1,
			              	nav:false,
			              	dots: owlsl_ops.dots,
			            },
			            576:{
			              	items:1,
			              	dots: owlsl_ops.dots ,
			            },
			            768:{
			              	items:2,
			            },
			            1200:{
			            	items:owlsl_ops.items,
			            },
			        };
		        }

		        if( template === 'template4'){
			        var responsive_value = {
			            0:{
			              	items:1,
			              	nav:false,
			              	dots: owlsl_ops.dots,
			            },
			            576:{
			              	items:1,
			              	dots: owlsl_ops.dots ,
			            },
			            768:{
			              	items:2,
			              	margin: 30,
			            },
			            1025:{
			            	items:owlsl_ops.items,
			            	margin: 30,
			            },
			            1300:{
			              	items:owlsl_ops.items,
			            },
			        };
		        }
		        
		        owlsl.owlCarousel({
		          	margin: owlsl_ops.margin,
		          	items: owlsl_ops.items,
		          	loop: owlsl_ops.loop,
		          	autoplay: owlsl_ops.autoplay,
		          	autoplayTimeout: owlsl_ops.autoplayTimeout,
		          	center: owlsl_ops.center,
		          	navContainer: navCon,
		          	nav: true,
		          	dots: false,
		          	thumbs: owlsl_ops.thumbs,
		          	autoplayHoverPause: owlsl_ops.autoplayHoverPause,
		          	slideBy: owlsl_ops.slideBy,
		          	smartSpeed: owlsl_ops.smartSpeed,
		          	rtl: isRTL,
		          	navText:[
		          		'<i class='+ owlsl_ops.nav_left  +'></i>',
		          		'<i class='+ owlsl_ops.nav_right +'></i>'
		          	],
		          	responsive: responsive_value,
		        });

		    });

		});
		
   });

})(jQuery);