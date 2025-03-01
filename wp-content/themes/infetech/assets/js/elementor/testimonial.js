(function($){
	"use strict";
	

	$(window).on('elementor/frontend/init', function () {
		
        
		elementorFrontend.hooks.addAction('frontend/element_ready/infetech_elementor_testimonial.default', function(){

			$(".slide-testimonials").each(function(){

		        var owlsl 		= $(this) ;
		        var owlsl_ops 	= owlsl.data('options') ? owlsl.data('options') : {};
		        var template 	= owlsl_ops.template;

		        var isRTL = $('body').hasClass('rtl');
		       
		        if (template === 'template1' || template ==='template2') {
			        var responsive_value = {
			            0:{
			              items:1,
			              nav:false,
			            },
			            576:{
			              items:1
			            },
			            992:{
			              items:1
			            },
			            1170:{
			              items:owlsl_ops.items
			            }
			        };
		        }
		        
		        if (template === 'template3') {
			        var responsive_value = {
			            0:{
			              items:1,
			              nav:false,
			              dots: true,
			            },
			            767:{
			              items:1,
			              dots:owlsl_ops.dots,
			            },
			            1024:{
			              items:1
			            },
			            1170:{
			              items:owlsl_ops.items
			            }
			        };
		        }

		        if (template === 'template4') {
			        var responsive_value = {
			            0:{
			              	items:1,
			              	nav:false,
			              	dots: true,
			            },
			            768:{
			              	items:2,
			              	dots:owlsl_ops.dots,
			            },
			            1024:{
			             	items:owlsl_ops.items
			            },
			        };
		        }

		        
		        owlsl.owlCarousel({
		          autoWidth: owlsl_ops.autoWidth,
		          margin: owlsl_ops.margin,
		          items: owlsl_ops.items,
		          loop: owlsl_ops.loop,
		          autoplay: owlsl_ops.autoplay,
		          autoplayTimeout: owlsl_ops.autoplayTimeout,
		          center: owlsl_ops.center,
		          nav: owlsl_ops.nav,
		          dots: owlsl_ops.dots,
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

		      	/* Fixed WCAG */
				owlsl.find(".owl-nav button.owl-prev").attr("title", "Previous");
				owlsl.find(".owl-nav button.owl-next").attr("title", "Next");
				owlsl.find(".owl-dots button").attr("title", "Dots");

		      });
		});


   });

})(jQuery);
