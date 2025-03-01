(function($){
	"use strict";
	
	$(window).on('elementor/frontend/init', function () {
		
        elementorFrontend.hooks.addAction('frontend/element_ready/infetech_elementor_progress.default', function(){
	       
	        $('.ova-percent').appear(function(){
   				var that 		= $(this);
   				var percent 	= that.data('percent');
   				var percentage 	= that.closest('.ova-percent-view').find('.percentage');

   				that.animate({
			        width: percent + "%"
			        },1000);

   			});
	    	
        });
        
   });

})(jQuery);
