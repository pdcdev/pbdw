jQuery(document).ready(function(e){function v(){p.each(function(){e(window).load(function(){e(this).animate({opacity:1},1e3)})})}function m(){h.each(function(){e(this).css("margin-top",e(window).height()-50+"px")})}function g(){s.each(function(){e(this).css("height",Math.round(e(this).width())+"px")})}function y(){o.each(function(){e(this).css("height",Math.round(e(this).width())+"px")})}function b(){u.each(function(){e(this).css("height",Math.round(e(this).width()*.8333)+"px")})}function w(){e(window).width()>480&&a.each(function(){e(this).css("height",Math.round(e(window).height())+"px")})}function E(){f.each(function(){e(this).css("height",Math.round(e(window).height()/2)+"px")})}function S(){l.css("top",Math.round(e(window).height())+"px")}function x(t,n){duration=n?n:1e3;e("html, body").animate({scrollTop:t.offset().top-t.height()},duration,"easeOutQuad")}function T(){height=Math.round(e(window).height()-30);c.css("top",height)}function N(){var t=e(window).scrollTop(),n=r.height();d.toggleClass("stuck",t>48).toggleClass("hidden",t>n)}var t=e(".wait"),n=e(".fadein");n.delay(500).removeClass("global_hidden").addClass("global_visible");e(window).load(function(){t.delay(500).removeClass("global_hidden").addClass("global_visible");e.waitForImages.hasImgProperties=["backgroundImage"];e("#projectslider .slide, #homeslider .slide").css("display","none");e(".home-flexslider").flexslider({keyboard:!0,animation:"fade",slideshow:!0,slideshowSpeed:5e3,animationSpeed:1e3,touch:Modernizr.touch?"true":"false",video:!1,controlNav:!1,directionNav:!1,useCSS:!0,startAt:0})});e(".project_item").each(function(){e(this).waitForImages(function(){e(this).removeClass("global_hidden").addClass("global_visible")})});var r=e("#projectslider"),i=e(".expand_button"),s=e(".square"),o=e(".foursix"),u=e(".sixfive"),a=e(".window_size"),f=e(".half_window_size"),l=e(".underworld"),c=e(".gallery_nav_container"),h=e(".heavy"),p=e(".preload"),d=e(".mobile_project_header");e("#homeslider").waitForImages(function(){e(this).removeClass("preload")});r.waitForImages(function(){e(".load_symbol").animate({opacity:0},800)});e(".backtotop").click(function(){x(e("header"),500)});e(".mobile_menu_btn").click(function(){visible=e("nav").attr("data-visibility")==1?!0:!1;if(visible){e("nav").attr("data-visibility",0).removeClass("nav_active").addClass("nav_hidden");e("header").removeClass("tablet_nav_expanded").addClass("tablet_nav_shrunk");e(this).removeClass("active").addClass("inactive");d.css({opacity:1,"pointer-events":"inherit"})}else{e("nav").css("display","block").attr("data-visibility",1).removeClass("nav_hidden").addClass("nav_active");e("header").removeClass("tablet_nav_shrunk").addClass("tablet_nav_expanded");e(this).removeClass("inactive").addClass("active");d.css({opacity:0,"pointer-events":"none"})}});e(window).scroll(function(){e(window).scrollTop()>56?i.removeClass("down").addClass("up"):i.removeClass("up").addClass("down");N()});i.click(function(){e(window).scrollTop()>0?e("html, body").animate({scrollTop:0},1e3,"easeInOutQuart"):e("html, body").animate({scrollTop:e(window).height()},1e3,"easeInOutQuart")});var C="http://goo.gl/maps/9DOvO",k="http://maps.apple.com/?q=Platt+Byard+Dovell+White+Architects",L=C;e("#menu-primary-navigation > li:nth-of-type(3)").append('<div class="contact_info"><address><p class="address"><a href='+L+' target="_blank">20 W 22nd Street<br />New York, NY 10010</a></p></address><p class="phone"><br /><a href="tel:212-691-2440">212 691 2440</a></p><p class="email"><br /><a href="tel:212-691-2440">info@pbdw.com</a></p></div>');e(".mobile_down").click(function(){e("html, body").animate({scrollTop:e("#projectslider").height()+48},1e3,"easeInOutQuart")});e(window).resize(function(){g();y();b();w();E();S();T();m()});v();g();y();b();w();E();S();T();m()});