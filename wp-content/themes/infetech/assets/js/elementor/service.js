(function($){
	"use strict";
	

	$(window).on('elementor/frontend/init', function () {
		
        
		elementorFrontend.hooks.addAction('frontend/element_ready/infetech_elementor_service.default', function(){

			$(".ova-service-template2 .image-service").appear(function(){

				var move1   = $(this).find('.triangle-topleft-1');
				var move2   = $(this).find('.triangle-topleft-2');

			    move1.addClass('animate__animated animate__fadeInTopLeft');
			    move2.addClass('animate__animated animate__fadeInBottomRight');	

		    });

		});


   });

})(jQuery);
