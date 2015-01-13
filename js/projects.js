jQuery(document).ready(function($) {

var asc = false,
    desc = true,
    list_header = $(".list_header"),
    alpha_btn = $(".alpha-btn"),
    category_btn = $(".category-btn"),
    grid_list_btn = $("#grid-list-btn"),
    year_btn = $(".year-btn"),
    list_btn = $(".list_btn"),
    grid_btn = $(".grid_btn"),
    gallery_nav = $(".flex-control-nav");

    function size_foursix() {
        foursix.each(function(){
            $(this).css("height", Math.round($(this).width()*1.5) + "px");
        });
    }
    
    function sortProjects(attribute, order, number) {

        var mylist = $('#projects_grid');

        var listitems = mylist.children(".project_item").get();

        listitems.sort(function(a, b) {

            var compA = $(a).attr(attribute).toUpperCase();
            var compB = $(b).attr(attribute).toUpperCase();

            if(number) {
                compA = Number(compA);
                compB = Number(compB);
            }

            return (compA < compB) ? -1 : (compA > compB) ? 1 : 0;
        });

        if (order) {
            listitems.reverse();
        }

        $.each(listitems, function(idx, itm) {
            mylist.append(itm);
        });
    }

    function sortToggle(element_btn, attr) {
        
        element_btn.removeClass("inactive").addClass("active");

        $(".list_header p").not(element_btn).removeClass("active ascending descending").addClass("inactive").attr("data-state", 1);

        state = element_btn.attr("data-state") == 1 ? true : false ;

        if (state) {
            element_btn.removeClass("descending").addClass("ascending").attr("data-state", 0);
            sortProjects(attr, asc);
        } else {
            element_btn.removeClass("ascending").addClass("descending").attr("data-state", 1);
            sortProjects(attr, desc);
        }
    }

    function listToggle(state) {
        if (state) {
            // list to grid
            project_item.removeClass("list").addClass("grid");
            list_btn.removeClass("active");
            grid_btn.addClass("active");

            list_header.removeClass('list_header_visible').addClass("list_header_hidden");
            size_foursix();
            sortProjects("data-order", asc, true);

        } else {
            // grid to list
            project_item.removeClass("grid").addClass("list");
            grid_btn.removeClass("active");
            list_btn.addClass("active");

            list_header.removeClass('list_header_hidden').addClass("list_header_visible");

            alpha_btn.removeClass("inactive").addClass("active");

            $(".list_header p").not(alpha_btn).removeClass("active ascending descending").addClass("inactive").attr("data-state", 1);

            alpha_btn.removeClass("descending").addClass("ascending").attr("data-state", 0);
            sortProjects("title", asc);

        }
    }

    $(".list_btn").on("click",function(){
        listToggle(false);
        $("#projects_grid").attr("data-view","list");
    });
    $(".grid_btn").on("click",function(){
        listToggle(true);
        $("#projects_grid").attr("data-view","grid");
    });
    alpha_btn.on("click", function(){
        sortToggle($(this),"title");
    });

    category_btn.on("click", function(){
        sortToggle($(this),"data-category");
    });
    year_btn.on("click", function(){
        sortToggle($(this),"data-completed");
    });
    
    $("#cat_showing").click(function(){
        if($(this).attr("data-state") == "active") {
            $(".project_categories_container").removeClass("active").addClass("hidden");
            $(this).attr("data-state","hidden");
        } else {
            $(".project_categories_container").removeClass("hidden").addClass("active");
            $(this).attr("data-state","active");
        }
    });

    $('.featured_projects_flexslider').flexslider({
        keyboard: true,
        animation: "fade",
        slideshow: true,
        slideshowSpeed: 5000,
        animationSpeed: 1000,
        touch: Modernizr.touch ? "true" : "false",
        video: false,
        controlNav: true,
        directionNav: false,
        controlsContainer: ".gallery_nav_container",
        useCSS: true,
        startAt: 0,
        pauseOnAction: true,
        start: function(slider) {
            $(".slides").show();
            $('.flex').click(function(){
                if ($(this).hasClass('next')) {
                    slider.flexAnimate(slider.getTarget("next"), true);
                } else {
                    slider.flexAnimate(slider.getTarget("prev"), true);
                }
            });
        }
    });

    $(".cats ul li").click(function(){
        if($("#projects_grid").offset().top - $(window).height() > $(window).scrollTop()) {
            $('html, body').animate({
                scrollTop: $(".featured_project").height() * .75
            }, 1000, "easeInOutQuart");
        }
    });

    var featured_title = $(".featured_title");
    function reposition_feature_title() {
        slider_height = Math.round($(".featured_projects_flexslider").height());
        featured_title_height = featured_title.height();

        featured_title.css("padding-top",slider_height-featured_title_height*1.5+"px");
    }
    $(window).resize(function(){
        reposition_feature_title();
    });
    $(window).load(function(){
        reposition_feature_title();
    });
    reposition_feature_title();
});