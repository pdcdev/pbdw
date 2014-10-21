jQuery(document).ready(function($) {

var asc = true,
    desc = false,
    list_header = $(".list_header"),
    alpha_btn = $(".alpha-btn"),
    year_btn = $(".year-btn");

    function sortProjects(attribute, order) {

        var mylist = $('#projects_grid');

        var listitems = mylist.children(".project_item").get();

        listitems.sort(function(a, b) {
           var compA = $(a).attr(attribute).toUpperCase();
           var compB = $(b).attr(attribute).toUpperCase();
           return (compA < compB) ? -1 : (compA > compB) ? 1 : 0;
        });

        if (!order) {
            listitems.reverse();
        }

        $.each(listitems, function(idx, itm) {
            mylist.append(itm);
        });
    }

    // sortProjects("data-completed", asc);

    sortProjects("title", asc);

});