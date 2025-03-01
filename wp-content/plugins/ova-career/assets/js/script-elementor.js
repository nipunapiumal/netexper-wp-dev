(function($){
	"use strict";

	$(window).on('elementor/frontend/init', function () { 

		elementorFrontend.hooks.addAction('frontend/element_ready/ova_category_career_slider.default', function(){

           $(".slide-category-career").each(function(){

                var owlsl 	  = $(this) ;
                var owlsl_ops = owlsl.data('options') ? owlsl.data('options') : {};

                var isRTL = $('body').hasClass('rtl');

                var responsive_value = {
                    0:{
                        items:1,
                        nav: false
                    },
                    767:{
                        items:2,
                        nav: false
                    },
                    1024:{
                        items:owlsl_ops.items - 1,
                        nav: false
                    },
                    1200:{
                        items:owlsl_ops.items
                    }
                };
              
                owlsl.owlCarousel({
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
                        '<i class="ovaicon-back"></i>',
                        '<i class="ovaicon-next"></i>'
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