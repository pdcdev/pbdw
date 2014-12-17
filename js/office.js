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
    $(".profile_btn").click(function(){
        scrollto($("#profile_anchor"));
    });
    $(".team_btn").click(function(){
        scrollto($("#team_anchor"));
    });
    $(".awards_btn").click(function(){
        scrollto($("#awards_anchor"));
    });
    $(".pub_btn").click(function(){
        scrollto($("#pub_anchor"));
    });
    column_spill($(".staff_architects .list_item"),$(".staff_architects_spillover > .list_container") );

    $(".pub_item").each(function(){
        cover_width = $(".pub_cover img", this).width();
        cover_height = $(".pub_cover img", this).height();
        $(this).css({"width":cover_width,"height":cover_height});
        $(".pub_info", this).css({"width":cover_width,"height":cover_height});
    });
});