jQuery(document).ready(function(e){function t(t){e("html, body").animate({scrollTop:t.offset().top},1e3,"easeOutExpo")}function n(t,n){var r=t.length,i=Math.ceil(t.length/2);while(i<r){e(t[i]).appendTo(n);i++}}function l(){slider_height=Math.round(e(".featured_projects_flexslider").height());featured_title_height=f.height();f.css("padding-top",slider_height-featured_title_height*1.5+"px")}var r=e("#profile_anchor"),i=e("#team_anchor"),s=e("#awards_anchor"),o=e("#pub_anchor"),u=e(".profile_btn");team_btn=e(".team_btn");awards_btn=e(".awards_btn");pub_btn=e(".pub_btn");var a=e(window).height()/2;e(window).resize(function(){a=e(window).height()/2});e(".profile_btn").click(function(){t(r)});e(".team_btn").click(function(){t(i)});e(".awards_btn").click(function(){t(s)});e(".pub_btn").click(function(){t(o)});r.waypoint(function(){e(".dot").removeClass("current");u.addClass("current")},{offset:50});i.waypoint(function(){e(".dot").removeClass("current");team_btn.addClass("current")});s.waypoint(function(){e(".dot").removeClass("current");awards_btn.addClass("current")});o.waypoint(function(){e(".dot").removeClass("current");pub_btn.addClass("current")},{offset:a});n(e(".staff_architects .list_item"),e(".staff_architects_spillover > .list_container"));e(window).load(function(){e(".pub_item").each(function(){})});var f=e(".featured_title");e(window).resize(function(){l()});l()});