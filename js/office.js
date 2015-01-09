jQuery(document).ready(function($) {
    function scrollto(element) {
        $('html, body').animate({
            scrollTop: element.offset().top
        }, 1000, "easeOutExpo");
    }
    function column_spill ( parent, spillover ) {
        var total = parent.length;
        var start_index = Math.ceil( parent.length / 2);
        while ( start_index < total ) {
            $( parent[start_index] ).appendTo( spillover );
            start_index++;
        }
    }
    var profile_anchor = $("#profile_anchor"),
        team_anchor    = $("#team_anchor"),
        awards_anchor  = $("#awards_anchor"),
        pub_anchor     = $("#pub_anchor");

    var profile_btn    = $(".profile_btn")
        team_btn       = $(".team_btn")
        awards_btn     = $(".awards_btn")
        pub_btn        = $(".pub_btn");

    var context_offset = $(window).height()/2;

    $(window).resize(function(){
        context_offset = $(window).height()/2;
    });

    $(".profile_btn").click(function(){
        scrollto(profile_anchor);
    });
    $(".team_btn").click(function(){
        scrollto(team_anchor);
    });
    $(".awards_btn").click(function(){
        scrollto(awards_anchor);
    });
    $(".pub_btn").click(function(){
        scrollto(pub_anchor);
    });

    profile_anchor.waypoint(function(){
        $(".dot").removeClass("current");
        profile_btn.addClass("current");
    }, { offset: 50 });

    team_anchor.waypoint(function(){
        $(".dot").removeClass("current");
        team_btn.addClass("current");
    });

    awards_anchor.waypoint(function(){
        $(".dot").removeClass("current");
        awards_btn.addClass("current");
    });

    pub_anchor.waypoint(function(){
        $(".dot").removeClass("current");
        pub_btn.addClass("current");
    }, { offset: context_offset });

    column_spill($(".staff_architects .list_item"),$(".staff_architects_spillover > .list_container") );

    $(window).load(function(){
        $(".pub_item").each(function(){
            // cover_width = $(".pub_cover img", this).width();
            // cover_height = $(".pub_cover img", this).height();
            // $(this).css({"width":cover_width,"height":cover_height});
            // $(".pub_info", this).css({"width":cover_width});
        });
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
    reposition_feature_title();

});