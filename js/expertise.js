jQuery(document).ready(function($) {
    function scrollto(element) {
        $('html, body').animate({
            scrollTop: element.offset().top
        }, 1000, "easeOutExpo");
    }

    $("#expertise").fullpage({
        menu: '#exp_menu',
        anchors: ['expertise','architecture','preservation','urbandesign','adaptivereuse','research','sustainability','designsupport','projectmanagement'],
        responsive: 768
    });

    $(".exp_list").waypoint(function(direction){
        if(direction === "down") {
            $(this).removeClass("unstuck").addClass("stuck");
        } else {
            $(this).removeClass("stuck").addClass("unstuck");
        }
    });
    $(".arch").waypoint(function(){
        $(".exp_list li").removeClass("active");
        $("#arch_btn").addClass("active");
    }, {offset: 45});
    $(".pres").waypoint(function(){
        $(".exp_list li").removeClass("active");
        $("#pres_btn").addClass("active");
    }, {offset: 45});
    $(".urba").waypoint(function(){
        $(".exp_list li").removeClass("active");
        $("#urba_btn").addClass("active");
    }, {offset: 45});
    $(".adap").waypoint(function(){
        $(".exp_list li").removeClass("active");
        $("#adap_btn").addClass("active");
    }, {offset: 45});
    $(".rese").waypoint(function(){
        $(".exp_list li").removeClass("active");
        $("#rese_btn").addClass("active");
    }, {offset: 45});
    $(".sust").waypoint(function(){
        $(".exp_list li").removeClass("active");
        $("#sust_btn").addClass("active");
    }, {offset: 45});
    $(".desi").waypoint(function(){
        $(".exp_list li").removeClass("active");
        $("#desi_btn").addClass("active");
    }, {offset: 45});
    $(".proj").waypoint(function(){
        $(".exp_list li").removeClass("active");
        $("#proj_btn").addClass("active");
    }, {offset: 45});

    $("#arch_btn").click(function(){
        scrollto($(".arch"));
    });
    $("#pres_btn").click(function(){
        scrollto($(".pres"));
    });
    $("#urba_btn").click(function(){
        scrollto($(".urba"));
    });
    $("#adap_btn").click(function(){
        scrollto($(".adap"));
    });
    $("#rese_btn").click(function(){
        scrollto($(".rese"));
    });
    $("#sust_btn").click(function(){
        scrollto($(".sust"));
    });
    $("#desi_btn").click(function(){
        scrollto($(".desi"));
    });
    $("#proj_btn").click(function(){
        scrollto($(".proj"));
    });
});