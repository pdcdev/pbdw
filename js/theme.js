jQuery(document).ready(function($) {
    var wait = $(".wait");
    var fadein = $(".fadein");

    fadein.delay(500).removeClass("global_hidden").addClass("global_visible");

    $(window).load(function() {

        wait.delay(500).removeClass("global_hidden").addClass("global_visible");

        $.waitForImages.hasImgProperties = ['backgroundImage'];

        $("#projectslider .slide, #homeslider .slide").css("display","none");

        $('.home-flexslider').flexslider({
            keyboard: true,
            animation: "fade",
            slideshow: true,
            slideshowSpeed: 3000,
            animationSpeed: 1000,
            touch: Modernizr.touch ? "true" : "false",
            video: false,
            controlNav: false,
            directionNav: false,
            useCSS: true,
            startAt: 0,
        });

    });

    $(".project_item").each(function(){
        $(this).waitForImages(function() {
            $(this).removeClass("global_hidden").addClass("global_visible");
        });
    });

    var projectslider = $("#projectslider");    
    var expand_button = $(".expand_button");
    var square = $(".square");
    var foursix = $(".foursix");
    var sixfive = $(".sixfive");
    var window_size = $(".window_size");
    var half_window_size = $(".half_window_size");
    var below_window = $(".underworld");
    var gallery_nav = $(".gallery_nav_container");
    var heavy = $(".heavy");
    var preload = $(".preload");
    var mobile_project_header = $(".mobile_project_header");

    $('#homeslider').waitForImages(function() {
        $(this).removeClass("preload");
    });

    projectslider.waitForImages(function() {
        $(".load_symbol").animate({"opacity": 0}, 800);
    });

    function preload_in() {
        preload.each(function(){
            $(window).load(function() {
                $(this).animate({opacity: 1}, 1000);
            });
        });
    }
    function heavy_object() {
        heavy.each(function(){
            $(this).css("margin-top", $(window).height()-50 +"px");
        });
    }
    function size_square() {
        square.each(function(){
            $(this).css("height", Math.round($(this).width()) + "px");
        });
    }
    function size_foursix() {
        foursix.each(function(){
            $(this).css("height", Math.round($(this).width()/0.6667) + "px");
        });
    }
    function size_sixfive() {
        sixfive.each(function(){
            $(this).css("height", Math.round($(this).width()*0.8333) + "px");
        });
    }
    function size_window(){
        if ($(window).width() > 480) {
            window_size.each(function(){
                $(this).css("height", Math.round($(window).height()) + "px");
            });
        }
    }
    function size_half_window(){
        half_window_size.each(function(){
            $(this).css("height", Math.round($(window).height()/2) + "px");
        });
    }
    function position_below_window(){
        below_window.css("top", Math.round($(window).height()) + "px");
    }
    function scrollTo(element, ms) {
        duration = ms ? ms : 1000 ;

        $('html, body').animate({
            scrollTop: element.offset().top - element.height()
        }, duration, "easeOutQuad");
    }
    function position_gallery_nav(){
        height = Math.round($(window).height()-30);
        gallery_nav.css("top", height);
    }
    function project_header_location() {
        var fromTop = $(window).scrollTop();
        var slider_height = projectslider.height();

        mobile_project_header.toggleClass("stuck", (fromTop > 48)).toggleClass("hidden", (fromTop > slider_height));
    }

    $(".backtotop").click(function(){
        scrollTo( $("header") , 500 );
    });

    $(".mobile_menu_btn").click(function(){
        visible = $("nav").attr("data-visibility") == 1 ? true : false ;
        
        if( visible ) {
            // close nav
            $("nav").attr( "data-visibility", 0).removeClass("nav_active").addClass("nav_hidden");
            $("header").removeClass("tablet_nav_expanded").addClass("tablet_nav_shrunk");
            $(this).removeClass("active").addClass("inactive");
            // show project header
            mobile_project_header.css({ opacity: 1, "pointer-events": "inherit" });
            
        } else {
            // open nav
            $("nav").css("display","block").attr( "data-visibility", 1).removeClass("nav_hidden").addClass("nav_active");
            $("header").removeClass("tablet_nav_shrunk").addClass("tablet_nav_expanded");
            $(this).removeClass("inactive").addClass("active");
            // hide project header
            mobile_project_header.css({ opacity: 0, "pointer-events": "none" });
        }
    });

    $(window).scroll(function(){

        if ($(window).scrollTop() > 56) {
            expand_button.removeClass("down").addClass("up");
        } else {
            expand_button.removeClass("up").addClass("down");
        }

        project_header_location();
        
    });

    expand_button.click(function(){
        if ($(window).scrollTop() > 0) {
            $('html, body').animate({
                scrollTop: 0
            }, 1000, "easeInOutQuart");
        } else {
            $('html, body').animate({
                scrollTop: $(window).height()
            }, 1000, "easeInOutQuart");
        }
    });

    var desktop_map_link = "http://goo.gl/maps/9DOvO";
    var mobile_map_link = "http://maps.apple.com/?q=Platt+Byard+Dovell+White+Architects";
    var the_map_link = desktop_map_link;

    if($(window).width() < 768) {
        the_map_link = mobile_map_link;
    } else {
        the_map_link = desktop_map_link;
    }

    $("#menu-primary-navigation > li:nth-of-type(3)").append("<div class=\"contact_info\"><address><p class=\"address\"><a href="+the_map_link+" target=\"_blank\">20 W 22nd Street<br />New York, NY 10010</a></p></address><p class=\"phone\"><br /><a href=\"tel:212-691-2440\">212 691 2440</a></p><p class=\"email\"><br /><a href=\"tel:212-691-2440\">info@pbdw.com</a></p></div>");

    $(".mobile_down").click(function(){
        $('html, body').animate({
            scrollTop: $("#projectslider").height() + 48
        }, 1000, "easeInOutQuart");
    });

    $(window).resize(function(){
        size_square();
        size_foursix();
        size_sixfive();
        size_window();
        size_half_window();
        position_below_window();
        position_gallery_nav();
        // activate_flexslider();
        heavy_object();
    });

    preload_in();
    size_square();
    size_foursix();
    size_sixfive();
    size_window();
    size_half_window();
    position_below_window();
    position_gallery_nav();
    // activate_flexslider();
    heavy_object();

});