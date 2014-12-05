jQuery(document).ready(function($) {

    var projects_container = jQuery("#projects_grid");

    function ajax_test() {
        jQuery.ajax({
            url: my_ajax_script.ajaxurl,
            data: ({action : 'just_a_test'}),
            success: function(response) {
                window.console.log("test: ", response);
            }
        });
    }
    function get_projects(the_category) {
        jQuery.ajax({
            url: my_ajax_script.ajaxurl,
            data: ({
                action : 'query_projects',
                cat : the_category
            }),
            dataType: 'json',
            success: function(response) {
                window.console.log("ajax call sucessful: ", response);
                append_projects(response);
            }
        });
    }
    function append_projects(posts) {
        projects_container.append(posts);
        jQuery.each(posts, function(i, val) {
            projects_container.append("\
            <div class=\"project_item grid foursix\" title=\""+val.project_title+"\" data-order=\""+i+"\" data-completed=\""+val.date_completed+"\" data-category=\""+val.project_category+"\" style=\"background-image: url("+val.featured_image+")\">\
                <a href=\""+val.project_permalink+"\">\
                    <div class=\"project_info\">\
                        <p class=\"title truncate\">"+val.project_title+"</p>\
                        <p class=\"cat truncate\">"+val.project_category+"</p>\
                        <p class=\"date_completed truncate\">"+val.date_completed+"</p>\
                    </div>\
                </a>\
            </div>");
        }).promise().done(function() {
            var foursix = $(".foursix");
        });
    }

    ajax_test();
    get_projects("residential");

});