jQuery(document).ready(function($) {

    // var nav_height = $("nav").height();

        if($('.home-flexslider')) {
            $('.home-flexslider').flexslider({
                keyboard: true,
                // animation: Modernizr.touch ? "slide" : "fade",
                animation: "fade",
                slideshow: true,
                slideshowSpeed: 4500,
                animationSpeed: 1000,
                // touch: Modernizr.touch ? "true" : "false",
                touch: "true",
                video: false,
                controlNav: false,
                directionNav: false,
                startAt: 0,
            });

    });

});