Query(document).ready(function($) {

    $(window).load(function() {
        $('.flexslider').flexslider({
            keyboard: true,
            animation: Modernizr.touch ? "slide" : "fade",
            slideshow: true,
            slideshowSpeed: 3000,
            animationSpeed: 500,
            touch: false,
            video: false,
            controlNav: false,
            directionNav: false,
            startAt: 0,
            useCSS: false
        });
    });

});