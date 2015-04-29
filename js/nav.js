jQuery(document).ready(function($) {

    var nav = $(".main_nav");
    var nav_btn = $(".nav_btn");
    var body = $("body");
    var project_from_top = $(window);
    var header_height = $("header").height();
    // grab an element
    var elem = document.querySelector("#header_container");
    
    // construct an instance of Headroom, passing the element
    var headroom = new Headroom(elem, {
        "tolerance": 5,
        "offset": -30,
        "classes": {
            "initial": "animated",
            "pinned": "slideDown",
            "unpinned": "slideUp",
            "top": "headroom--top",
            "notTop": "headroom--not-top"
        }
    });
    
    // initialise
    headroom.init();

    function nav_toggle () {
        if(nav.attr("data-state") === "0") {
            nav.removeClass("inactive").addClass("active").attr("data-state",1);
        } else {
            nav.removeClass("active").addClass("inactive").attr("data-state",0);
        }
    }

    $("nav .nav_container").not("#menu-primary-navigation").click(function(){
        if(nav.attr("data-state") === "1") {
            nav.removeClass("active").addClass("inactive").attr("data-state",0);
        }
    });

    nav_btn.click(function(){
        nav_toggle();
    });

});