jQuery(document).ready(function($) {

    var wrap = $(".wrap");

    $(window).load(function() {
        wrap.delay(500).removeClass("global_hidden").addClass("global_visible");
    });

});