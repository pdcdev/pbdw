jQuery(document).ready(function($) {

var asc = false,
    desc = true,
    list_header = $(".list_header"),
    alpha_btn = $(".alpha-btn"),
    category_btn = $(".category-btn"),
    grid_list_btn = $("#grid-list-btn"),
    year_btn = $(".year-btn"),
    list_btn = $("#list_btn"),
    grid_btn = $("#grid_btn"),
    project_item = $(".project_item"),
    gallery_nav = $(".flex-control-nav");

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

    function listToggle() {
        state = grid_list_btn.attr("data-state") == 1 ? true : false ;
        if (state) {
            // list to grid
            project_item.removeClass("list").addClass("grid");
            grid_list_btn.attr("data-state", 0);
            
            grid_btn.hide();
            list_btn.show();

            list_header.removeClass('list_header_visible').addClass("list_header_hidden");
            size_foursix();
            sortProjects("data-order", asc, true);

        } else {
            // grid to list
            project_item.removeClass("grid").addClass("list");
            grid_list_btn.attr("data-state", 1);

            list_btn.hide();
            grid_btn.show();

            list_header.removeClass('list_header_hidden').addClass("list_header_visible");
            sortToggle(alpha_btn,"title");
        }
    }

    $(document).on("click","#list_btn, #grid_btn",function(){
        listToggle();
    });

    alpha_btn.click(function(){
        sortToggle($(this),"title");
    });

    category_btn.click(function(){
        sortToggle($(this),"data-category");
    });
    year_btn.click(function(){
        sortToggle($(this),"data-completed");
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

});