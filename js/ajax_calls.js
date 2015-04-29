jQuery(document).ready(function($) {
    var projects_container = $("#projects_grid");
    var all_btn = $("#proj_all_btn"),
        cultural_btn = $("#proj_cultural_btn"),
        commercial_btn = $("#proj_commercial_btn"),
        education_btn = $("#proj_education_btn"),
        preservation_btn = $("#proj_preservation_btn"),
        residential_btn = $("#proj_residential_btn"),
        category_stage = $("#category_stage"),
        foursix = $(".foursix"),
        project_item = $(".project_item");

    var loader_mark = "<p class=\"loaderdots\"><span class=\"ldr ldr1\"></span><span class=\"ldr ldr2\"></span><span class=\"ldr ldr3\"></span><span class=\"ldr ldr4\"></span></p>";

    function redefine_vars() {
        project_item = $(".project_item");
        foursix = $(".foursix");
    }
    function get_projects(the_category) {
        $.ajax({
            url: my_ajax_script.ajaxurl,
            data: ({
                action : 'query_projects',
                cat : the_category ? the_category : null
            }),
            dataType: 'json',
            success: function(response) {
                append_projects(response,the_category);
            }
        });
    }

    function size_foursix() {
        foursix.each(function(){
            $(this).css("height", Math.round($(this).width()*1.5) + "px");
        });
    }

    function size_cat() {
        $(".cat_size").each(function(){
            if( $(window).width() < 480 ) {
                $(".cat_size").css("height","auto");
            } else {
                $(this).css("height", Math.round($(this).width()*1.5) + "px");
            }
        });
    }
    $(window).on('resize', function(){
        size_foursix();
        size_cat();
    });

    function append_projects(data, requested_cat, grid_or_list) {
        grid_or_list = $("#projects_grid").attr("data-view");

        if(requested_cat) {
            $("#proj_" + requested_cat + "_btn").text(requested_cat);
            $("#" + requested_cat + "_box").appendTo(projects_container);
        } else {
            all_btn.text("All");
            $("#all_box").appendTo(projects_container);
        }

        $.each(data, function(i, val) {
            var project_item = "<div class=\"project_item "+grid_or_list+" foursix\" title=\""+val.project_title+"\" data-order=\""+i+"\" data-completed=\""+val.date_completed+"\" data-category=\""+val.project_category+"\" style=\"background-image: url("+val.featured_image+")\">"+
                "<a href=\""+val.project_permalink+"\">"+
                    "<div class=\"project_info\">"+
                        "<p class=\"title truncate\">"+val.project_title+"</p>"+
                        "<p class=\"cat truncate\">"+val.project_category+"</p>"+
                        "<p class=\"date_completed truncate\">"+val.date_completed+"</p>"+
                    "</div>"+
                "</a>"+
            "</div>";

            $(project_item).appendTo(projects_container).css("opacity","0").delay(i*50).animate({opacity:1}, 200);
        });
        redefine_vars();
        size_foursix();
        size_cat();
    }

    function remove_objects(objects) {
        $(".project_categories_container").removeClass("active").addClass("hidden");
        $("#cat_showing").attr("data-state","hidden");
        $(".cat_box").appendTo(category_stage);
        objects.remove();
    }

    function show_projects(the_category, cat) {
        remove_objects($(".project_item"));
        cat.text("").append(loader_mark);
        if( the_category === null ) {
            get_projects("");
        } else {
            get_projects(the_category);
        }
        $(".cats ul li").not(cat).removeClass("selected");
        cat.addClass("selected");
    }

    all_btn.click(function(){
        show_projects(null, $(this));
    });
    cultural_btn.click(function(){
        show_projects("cultural", $(this));
    });
    commercial_btn.click(function(){
        show_projects("commercial", $(this));
    });
    education_btn.click(function(){
        show_projects("education", $(this));
    });
    preservation_btn.click(function(){
        show_projects("preservation", $(this));
    });
    residential_btn.click(function(){
        show_projects("residential", $(this));
    });
    
    get_projects();
});