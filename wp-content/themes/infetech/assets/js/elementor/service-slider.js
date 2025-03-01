(function($){
	"use strict";
	

	$(window).on('elementor/frontend/init', function () {
		
        elementorFrontend.hooks.addAction('frontend/element_ready/infetech_elementor_service_slider.default', function(){

        	$(".services-slider").each(function(){
        		var service_slick 	= $(this);
        		var data_options 	= service_slick.data('options') ? service_slick.data('options') : {};

        		var isRTL = $('body').hasClass('rtl');
        		if ( isRTL ) {
        			service_slick.parent().attr('dir','rtl');
        		}

        		service_slick.slick({
        			infinite: data_options.loop,
        			centerMode: true,
        			centerPadding: 0,
					slidesToShow: data_options.items,
					slidesToScroll: 1,
					arrows: false,
					focusOnSelect: true,
					autoplay: data_options.autoplay,
					autoplaySpeed: data_options.autoplay_speed,
					speed: data_options.smartSpeed,
					rtl: isRTL,
					asNavFor: '.services-slider-content',
					responsive: [
					    {
							breakpoint: 1200,
							settings: {
								arrows: false,
								centerMode: true,
								slidesToShow: 3
							}
						},
					    {
							breakpoint: 768,
							settings: {
								arrows: false,
								centerMode: true,
								slidesToShow: 1
							}
					    }
				  	]
				});
        	});

        	$(".services-slider-content").each(function(){
        		var services_content = $(this);

        		var isRTL = $('body').hasClass('rtl');

        		services_content.slick({
        			slidesToShow: 1,
					slidesToScroll: 1,
					arrows: false,
					fade: true,
					rtl: isRTL,
					asNavFor: '.services-slider'
				});
        	});
        });


   });

})(jQuery);
