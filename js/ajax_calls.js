jQuery(document).ready(function($) {
 
    var projects_container = $("#projects_grid");
    var all_btn = $("#proj_all_btn"),
        cultural_btn = $("#proj_cultural_btn"),
        commercial_btn = $("#proj_commercial_btn"),
        education_btn = $("#proj_education_btn"),
        preservation_btn = $("#proj_preservation_btn"),
        residential_btn = $("#proj_residential_btn");
 
    function redefine_vars() {
        project_item = $(".project_item"),
        foursix = $(".foursix");
    }
    function ajax_test() {
        $.ajax({
            url: my_ajax_script.ajaxurl,
            data: ({action : 'just_a_test'}),
            success: function(response) {
                // window.console.log("test: ", response);
            }
        });
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
                redefine_vars();
            }
        });
    }
    function append_projects(data, requested_cat, grid_or_list) {
        // appends projects into projects_container
        var grid_or_list = $("#projects_grid").attr("data-view");
        
        if(requested_cat) {
            $("#proj_" + requested_cat + "_btn").text(requested_cat);
        } else {
            all_btn.text("All");
        }
        
 
        $.each(data, function(i, val) {
            var project_item = "\
<div class=\"project_item "+grid_or_list+" foursix\" title=\""+val.project_title+"\" data-order=\""+i+"\" data-completed=\""+val.date_completed+"\" data-category=\""+val.project_category+"\" style=\"background-image: url("+val.featured_image+")\">\
    <a href=\""+val.project_permalink+"\">\
        <div class=\"project_info\">\
            <p class=\"title truncate\">"+val.project_title+"</p>\
            <p class=\"cat truncate\">"+val.project_category+"</p>\
            <p class=\"date_completed truncate\">"+val.date_completed+"</p>\
        </div>\
    </a>\
</div>";
            $(project_item).appendTo(projects_container).css("opacity","0").delay(i*50).animate({opacity:1}, 200);
            });
            var foursix = $(".foursix");
            function size_foursix() {
                foursix.each(function(){
                    // $(this).css("height", Math.round($(this).width()) + "px");
                    $(this).css("height", Math.round($(this).width()*1.5) + "px");
                });
            }
            size_foursix();
            $(window).on('resize', function(){
                size_foursix();
            });
    }
    var loader_mark = "<p class=\"loaderdots\"><span class=\"ldr ldr1\"></span><span class=\"ldr ldr2\"></span><span class=\"ldr ldr3\"></span><span class=\"ldr ldr4\"></span></p>";
 
    function remove_objects(objects) {
        $(".project_categories_container").removeClass("active").addClass("hidden");
        $("#cat_showing").attr("data-state","hidden");
        objects.remove();
    }
 
    all_btn.click(function(){
        remove_objects($("#projects_grid > div"));
        $(this).text("").append(loader_mark);
        get_projects();
        $(".cats ul li").not($(this)).removeClass("selected");
        $(this).addClass("selected");
    });
    cultural_btn.click(function(){
        remove_objects($("#projects_grid > div"));
        $(this).text("").append(loader_mark);
        get_projects("cultural");
        $(".cats ul li").not($(this)).removeClass("selected");
        $(this).addClass("selected");
    });
    commercial_btn.click(function(){
        remove_objects($("#projects_grid > div"));
        $(this).text("").append(loader_mark);
        get_projects("commercial");
        $(".cats ul li").not($(this)).removeClass("selected");
        $(this).addClass("selected");
    });
    education_btn.click(function(){
        remove_objects($("#projects_grid > div"));
        $(this).text("").append(loader_mark);
        get_projects("education");
        $(".cats ul li").not($(this)).removeClass("selected");
        $(this).addClass("selected");
    });
    preservation_btn.click(function(){
        remove_objects($("#projects_grid > div"));
        $(this).text("").append(loader_mark);
        get_projects("preservation");
        $(".cats ul li").not($(this)).removeClass("selected");
        $(this).addClass("selected");
    });
    residential_btn.click(function(){
        remove_objects($("#projects_grid > div"));
        $(this).text("").append(loader_mark);
        get_projects("residential");
        $(".cats ul li").not($(this)).removeClass("selected");
        $(this).addClass("selected");
    });
 
    // ajax_test();
    // get_projects("education");
    get_projects();
});