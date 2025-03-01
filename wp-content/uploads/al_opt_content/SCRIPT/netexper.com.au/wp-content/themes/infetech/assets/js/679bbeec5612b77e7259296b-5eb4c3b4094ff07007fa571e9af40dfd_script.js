!function($){function infetech_menu(){var $btn=$(".main-navigation .menu-toggle"),$menu=$(".main-navigation");$btn.on("click",function(){$menu.toggleClass("toggled")}),0<$menu.length&&($menu.find(".menu-item-has-children > a, .page_item_has_children > a").each((index,element)=>{var $dropdown;$('<button class="dropdown-toggle"></button>').insertAfter(element)}),$(document).on("click",".main-navigation .dropdown-toggle",function(e){e.preventDefault(),$(e.target).toggleClass("toggled-on"),$(e.target).siblings("ul").stop().toggleClass("show")}))}function infetech_set_menu_direction($item){var sub=$item.children(".sub-menu"),offset=$item.offset(),width=$item.outerWidth(),screen_width=$(window).width(),sub_width=sub.outerWidth(),align_delta;0<offset.left+width+sub_width-screen_width?$item.parents(".menu-item-has-children").length?sub.css({left:"auto",right:"100%"}):sub.css({left:"auto",right:"0"}):sub.css({left:"",right:""})}function infetech_hover_submenu(){$(".primary-navigation .menu-item-has-children").hover(function(event){var $item;infetech_set_menu_direction($(event.currentTarget))})}function infetech_circle_follow_cursor(){let cursor=document.getElementById("ova-custom-cursor__cursor"),cursorBorder=document.getElementById("ova-custom-cursor__cursor-border"),cursorPos={x:0,y:0},cursorBorderPos={x:0,y:0};var hexPrimary=getComputedStyle(document.body).getPropertyValue("--primary").trim();let r=parseInt(hexPrimary.slice(1,3),16),g=parseInt(hexPrimary.slice(3,5),16),b=parseInt(hexPrimary.slice(5,7),16);null!==cursor&&(document.addEventListener("mousemove",e=>{cursorPos.x=e.clientX,cursorPos.y=e.clientY,cursor.style.transform=`translate(${e.clientX}px, ${e.clientY}px)`}),requestAnimationFrame(function loop(){var easting=5;cursorBorderPos.x+=(cursorPos.x-cursorBorderPos.x)/5,cursorBorderPos.y+=(cursorPos.y-cursorBorderPos.y)/5,cursorBorder.style.transform=`translate(${cursorBorderPos.x}px, ${cursorBorderPos.y}px)`,requestAnimationFrame(loop)}),document.querySelectorAll("[href]").forEach(item=>{item.addEventListener("mouseover",e=>{cursorBorder.style.backgroundColor=`rgba(${r}, ${g}, ${b}, 0.3)`,cursorBorder.style.setProperty("--size","20px")}),item.addEventListener("mouseout",e=>{cursorBorder.style.backgroundColor="unset",cursorBorder.style.setProperty("--size","26px")})}))}function infetech_scrollUp(options){var defaults,o=$.extend({},{scrollName:"scrollUp",topDistance:600,topSpeed:800,animation:"fade",animationInSpeed:200,animationOutSpeed:200,scrollText:'<i class="ovaicon-up-arrow"></i>',scrollImg:!1,activeOverlay:!1},options),scrollId="#"+o.scrollName;$("<a/>",{id:o.scrollName,href:"#top",title:ScrollUpText.value}).appendTo("body"),o.scrollImg||$(scrollId).html(o.scrollText),$(scrollId).css({display:"none",position:"fixed","z-index":"2147483647"}),o.activeOverlay&&($("body").append("<div id='"+o.scrollName+"-active'></div>"),$(scrollId+"-active").css({position:"absolute",top:o.topDistance+"px",width:"100%","border-top":"1px dotted "+o.activeOverlay,"z-index":"2147483647"})),$(window).scroll(function(){switch(o.animation){case"fade":$($(window).scrollTop()>o.topDistance?$(scrollId).fadeIn(o.animationInSpeed):$(scrollId).fadeOut(o.animationOutSpeed));break;case"slide":$($(window).scrollTop()>o.topDistance?$(scrollId).slideDown(o.animationInSpeed):$(scrollId).slideUp(o.animationOutSpeed));break;default:$($(window).scrollTop()>o.topDistance?$(scrollId).show(0):$(scrollId).hide(0))}}),$(scrollId).on("click",function(event){$("html, body").animate({scrollTop:0},o.topSpeed),event.preventDefault()})}function sticky_menu(menu,sticky){var sticky,sticky;void 0!==sticky&&jQuery.isNumeric(sticky)||(sticky=0),$(window).scrollTop()>=sticky?(0===$("#just-for-height").length&&(sticky=0<$(".above_menu").length&&767<$(window).width()?menu.outerHeight()+$(".above_menu").outerHeight():menu.outerHeight(),menu.after('<div id="just-for-height" style="height:'+sticky+'px"></div>')),menu.addClass("active_sticky")):(menu.removeClass("active_sticky"),$("#just-for-height").remove())}var url,hash;function infetech_calculate_width(directly){var col_offset,ending_left,width_left,width_left,ending_left;$(directly).length&&(col_offset=$(directly).offset(),directly.hasClass("infetech_stretch_column_left")&&(ending_left=col_offset.left,width_left=$(directly).outerWidth()+ending_left,$(".infetech_stretch_column_left .elementor-widget-wrap").css("width",width_left),$(".infetech_stretch_column_left .elementor-widget-wrap").css("margin-left",-ending_left)),directly.hasClass("infetech_stretch_column_right"))&&(width_left=$(window).width()-(col_offset.left+$(directly).outerWidth()),ending_left=$(directly).outerWidth()+width_left,directly.find(".elementor-widget-wrap").css("width",ending_left),directly.find(".elementor-widget-wrap").css("margin-right",-width_left))}$(window).on("load",function(){$("#ova-loader").delay(100).fadeOut(),$("#ova-loader .page-loader").delay(100).fadeOut("fast")}),$(".slide_gallery").each(function(){var autoplay=$(this).data("autoplay"),autoplayTimeout=$(this).data("autoplaytimeout"),autoplaySpeed=$(this).data("autoplayspeed"),stopOnHover=$(this).data("stoponhover"),loop=$(this).data("loop"),dots=$(this).data("dots"),nav=$(this).data("nav"),items=$(this).data("items");$(this).owlCarousel({autoplayTimeout:parseInt(autoplayTimeout),autoplay:autoplay,autoplaySpeed:parseInt(autoplaySpeed),stopOnHover:stopOnHover,loop:loop,dots:dots,nav:nav,items:parseInt(items)})}),$(".ova-geometry1").appear(function(){var move=$(this),div1,div2,triangle1,triangle2;move.prepend("<div class='geometry1'></div>","<div class='geometry2'></div>"),move.find(".geometry1").addClass("animate__animated animate__fadeInTopLeft"),move.find(".geometry2").addClass("animate__animated animate__fadeInBottomRight animate__delay-1s")}),$(".ova-geometry2").appear(function(){var move=$(this),div1,div2,triangle1,triangle2;move.prepend("<div class='geometry3'></div>","<div class='geometry4'></div>"),move.find(".geometry3").addClass("animate__animated animate__fadeInTopRight"),move.find(".geometry4").addClass("animate__animated animate__fadeInTopRight animate__delay-half")}),$(".ova-geometry3").appear(function(){var move=$(this),div,triangle;move.prepend("<div class='geometry5'></div>"),move.find(".geometry5").addClass("animate__animated animate__fadeInBottomLeft")}),$(".ova-geometry4").appear(function(){var move=$(this),div_left_1,div_left_2,div_right_1,div_right_2,div_right_3,triangle,triangle1,triangle2;move.prepend("<div class='geometry6'></div>","<div class='geometry7'></div>","<div class='geometry8'></div>","<div class='geometry9'></div>","<div class='geometry10'></div>"),move.find(".geometry10").addClass("animate__animated animate__fadeInTopRight"),move.find(".geometry7, .geometry9").addClass("animate__animated animate__fadeInBottomLeft animate__delay-half"),move.find(".geometry6, .geometry8").addClass("animate__animated animate__fadeInBottomLeft animate__delay-1s")}),$(".ova-geometry5").appear(function(){var move=$(this),div,triangle;move.prepend("<div class='geometry11'></div>"),move.find(".geometry11").addClass("animate__animated animate__fadeInBottomLeft")}),$(".ova-geometry6").appear(function(){var move=$(this),div,triangle=(move.prepend("<div class='geometry12'></div> <div class='circle'></div>"),move.find(".geometry12")),move=move.find(".circle");triangle.addClass("animate__animated animate__fadeInBottomRight"),move.addClass("animate__animated animate__fadeInTopRight")}),$(".ova-geometry-header-banner").appear(function(){var move=$(this),div,triangle;move.prepend("<div class='geometry-header'></div>"),move.find(".geometry-header").addClass("animate__animated animate__fadeInTopRight")}),$(".ova-geometry-revslider1").appear(function(){var move=$(this),div1,div2,triangle1,triangle2;move.prepend("<div class='geometry-revslider-left'></div>","<div class='geometry-revslider-right'></div>"),move.find(".geometry-revslider-left").addClass("animate__animated animate__fadeInTopRight"),move.find(".geometry-revslider-right").addClass("animate__animated animate__fadeInBottomLeft animate__delay-half")}),$(".header_sticky").length&&$(document).ready(function(){var menu=$(".header_sticky"),sticky;menu.length&&(sticky=menu.offset().top+150,$(".header_sticky").hasClass("mobile_sticky")||767<$(window).width())&&(sticky_menu(menu,sticky),$(window).on("scroll",function(){sticky_menu(menu,sticky)}))}),$("ul.menu").length&&(url=$("ul.menu li a").attr("href")).substring(url.indexOf("#")+1)&&$("ul.menu li a").on("click",function(){$("ul.menu li").removeClass("current-menu-item"),$(this).parent().addClass("current-menu-item"),$(this).closest(".menu-canvas").toggleClass("toggled")}),$(".blog_masonry").each(function(){var grid,run=$(this).masonry({itemSelector:".post-wrap",gutter:0,percentPosition:!0,transitionDuration:0});run.imagesLoaded().progress(function(){run.masonry()})}),$(".infetech_stretch_column_left").each(function(){var that=$(this);null!=that.length&&infetech_calculate_width(that)}),$(".infetech_stretch_column_right").each(function(){var that=$(this);null!=that.length&&infetech_calculate_width(that)}),$(window).resize(function(){$(".infetech_stretch_column_left").each(function(){var that=$(this);null!=that.length&&infetech_calculate_width(that)}),$(".infetech_stretch_column_right").each(function(){var that=$(this);null!=that.length&&infetech_calculate_width(that)})}),infetech_hover_submenu(),infetech_menu(),infetech_scrollUp(),infetech_circle_follow_cursor()}(jQuery);