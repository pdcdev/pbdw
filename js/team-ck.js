jQuery(document).ready(function(e){function t(t){e("html, body").animate({scrollTop:t.offset().top},1e3,"easeOutExpo")}function n(t,n){var r=t.length,i=Math.ceil(t.length/2);while(i<r){e(t[i]).appendTo(n);i++}}e(".profile_btn").click(function(){t(e("#profile_anchor"))});e(".team_btn").click(function(){t(e("#team_anchor"))});e(".awards_btn").click(function(){t(e("#awards_anchor"))});e(".pub_btn").click(function(){t(e("#pub_anchor"))});n(e(".staff_architects .list_item"),e(".staff_architects_spillover > .list_container"));e(".pub_item").each(function(){cover_width=e(".pub_cover img",this).width();cover_height=e(".pub_cover img",this).height();e(this).css({width:cover_width,height:cover_height});e(".pub_info",this).css({width:cover_width,height:cover_height})})});