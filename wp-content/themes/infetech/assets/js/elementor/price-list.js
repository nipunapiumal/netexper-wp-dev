(function($){
  "use strict";
  

    $(window).on('elementor/frontend/init', function () {
        
        elementorFrontend.hooks.addAction('frontend/element_ready/infetech_elementor_price_list.default', function(){

            $('.ova-price-list').each( function(){
                
                var that = $(this);
                var item = that.find('.item-price-list');
               
                var data_options_active = that.find('.item-price-list.active').data('options');
                
                var button = that.find('.choose-plan-button');
                button.attr("href",data_options_active['link']);
                button.attr("target",data_options_active['target']);
                button.attr("rel",data_options_active['nofollow']);

                item.on('click', function(){
                    item.removeClass('active');
                    $(this).addClass('active');
                    var data_options = $(this).data('options');

                    var button_on_click = $(this).closest('.ova-price-list').find('.choose-plan-button');

                    button_on_click.attr("href",data_options['link']);
                    button_on_click.attr("target",data_options['target']);
                    button_on_click.attr("rel",data_options['nofollow']);

                });

            });

        })

    })

})(jQuery);