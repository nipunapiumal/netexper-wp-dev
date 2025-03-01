(function($){
	"use strict";
	

	$(window).on('elementor/frontend/init', function () {
		
        
		elementorFrontend.hooks.addAction('frontend/element_ready/infetech_elementor_progress_circle.default', function(){

			$(".ova-progress-circle").appear(function(){
				var circle = $(this);

				var size     = circle.data('size');
				var value    = circle.data('value');
				var color    = circle.data('color');
				var linecap  = circle.data('linecap');

                var progressBarOptions = {
                	startAngle: -1.55,
                	size: size,
				    value: value,
				    fill: {
				        color: color 
				    },
				    emptyFill: 'rgba(0, 0, 0, 0)',
				    lineCap: linecap
				};

				circle.circleProgress(progressBarOptions).on('circle-animation-progress', function(event, progress, stepValue) {
					$(this).find('strong').text(String((stepValue*100).toFixed(0)));
				});

		    });

		});


   });

})(jQuery);
