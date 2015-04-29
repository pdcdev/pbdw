jQuery(document).ready(function($) {

    var gallery_nav = $(".gallery_nav_container");

    function position_gallery_nav(){
        height = Math.round($(window).height()-30);
        gallery_nav.css("top", height);
    }

    function init_flex(){
        $('.projects-flexslider').flexslider({
            keyboard: true,
            animation: "fade",
            slideshow: true,
            slideshowSpeed: 3000,
            animationSpeed: 500,
            touch: Modernizr.touch ? "true" : "false",
            video: false,
            controlNav: true,
            directionNav: false,
            startAt: 0,
            controlsContainer: ".gallery_nav_container",
            useCSS: true,
            pauseOnAction: true,
            start: function(slider) {
                $(".slides").show();
                $('.flexbtn').click(function(){
                    if ($(this).hasClass('next')) {
                        slider.flexAnimate(slider.getTarget("next"), true);
                    } else {
                        slider.flexAnimate(slider.getTarget("prev"), true);
                    }
                });
            }
        });
    }

    $(window).load( function() {

        var slideshow = $('.projects-flexslider ul li').clone();

        function activate_flex(){
            if( $(window).width() < 480 ) {
                $('.projects-flexslider, .gallery_nav_container ol').remove();
                $("#projectslider .next").after("<div class=\"projects-flexslider\"><ul class=\"slides\"></ul></div>");
                $('.projects-flexslider ul').append(slideshow);
                $('.projects-flexslider ul li').css({"display":"inherit", opacity: 1, margin: 0}).removeClass("slide_inactive flex-active-slide");
                
            } else {
                init_flex();
                $('.projects-flexslider ul').append(slideshow);

                position_gallery_nav();
            }
        }
        $(window).resize(function(){
            activate_flex();
        });
        activate_flex();
    });

});