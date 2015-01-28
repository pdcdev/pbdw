jQuery(document).ready(function($) {
    $(window).load(function() {
        $('.home-flexslider').flexslider({
            keyboard: true,
            animation: "fade",
            slideshow: true,
            slideshowSpeed: 5000,
            animationSpeed: 1000,
            touch: Modernizr.touch ? "true" : "false",
            video: false,
            controlNav: false,
            directionNav: false,
            useCSS: false,
            startAt: 0
        });

    });

});