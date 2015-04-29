jQuery(document).ready(function($) {
    var watched_items = $(".watch-orientation");
    function update_orientation(){
        if( $(window).height() > $(window).width()) {
            // portrait
            watched_items.addClass("portrait");
            watched_items.removeClass("landscape");
        } else {
            // landscape
            watched_items.addClass("landscape");
            watched_items.removeClass("portrait");
        }
    }
    // if(Modernizr.touch) {
        $(window).resize(function(){
            update_orientation();
        });
        update_orientation();
    // }
});