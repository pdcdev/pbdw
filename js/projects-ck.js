jQuery(document).ready(function(e){function c(){foursix.each(function(){e(this).css("height",Math.round(e(this).width()*1.5)+"px")})}function h(t,n,r){var i=e("#projects_grid"),s=i.children(".project_item").get();s.sort(function(n,i){var s=e(n).attr(t).toUpperCase(),o=e(i).attr(t).toUpperCase();if(r){s=Number(s);o=Number(o)}return s<o?-1:s>o?1:0});n&&s.reverse();e.each(s,function(e,t){i.append(t)})}function p(r,i){r.removeClass("inactive").addClass("active");e(".list_header p").not(r).removeClass("active ascending descending").addClass("inactive").attr("data-state",1);state=r.attr("data-state")==1?!0:!1;if(state){r.removeClass("descending").addClass("ascending").attr("data-state",0);h(i,t)}else{r.removeClass("ascending").addClass("descending").attr("data-state",1);h(i,n)}}function d(n){if(n){project_item.removeClass("list").addClass("grid");a.removeClass("active");f.addClass("active");r.removeClass("list_header_visible").addClass("list_header_hidden");c();h("data-order",t,!0)}else{project_item.removeClass("grid").addClass("list");f.removeClass("active");a.addClass("active");r.removeClass("list_header_hidden").addClass("list_header_visible");i.removeClass("inactive").addClass("active");e(".list_header p").not(i).removeClass("active ascending descending").addClass("inactive").attr("data-state",1);i.removeClass("descending").addClass("ascending").attr("data-state",0);h("title",t)}}function m(){slider_height=Math.round(e(".featured_projects_flexslider").height());featured_title_height=v.height();v.css("padding-top",slider_height-featured_title_height*1.5+"px")}var t=!1,n=!0,r=e(".list_header"),i=e(".alpha-btn"),s=e(".category-btn"),o=e("#grid-list-btn"),u=e(".year-btn"),a=e(".list_btn"),f=e(".grid_btn"),l=e(".flex-control-nav");e(".list_btn").on("click",function(){d(!1);e("#projects_grid").attr("data-view","list")});e(".grid_btn").on("click",function(){d(!0);e("#projects_grid").attr("data-view","grid")});i.on("click",function(){p(e(this),"title")});s.on("click",function(){p(e(this),"data-category")});u.on("click",function(){p(e(this),"data-completed")});e("#cat_showing").click(function(){if(e(this).attr("data-state")=="active"){e(".project_categories_container").removeClass("active").addClass("hidden");e(this).attr("data-state","hidden")}else{e(".project_categories_container").removeClass("hidden").addClass("active");e(this).attr("data-state","active")}});e(".featured_projects_flexslider").flexslider({keyboard:!0,animation:"fade",slideshow:!0,slideshowSpeed:5e3,animationSpeed:1e3,touch:Modernizr.touch?"true":"false",video:!1,controlNav:!0,directionNav:!1,controlsContainer:".gallery_nav_container",useCSS:!0,startAt:0,pauseOnAction:!0,start:function(t){e(".slides").show();e(".flex").click(function(){e(this).hasClass("next")?t.flexAnimate(t.getTarget("next"),!0):t.flexAnimate(t.getTarget("prev"),!0)})}});var v=e(".featured_title");e(window).resize(function(){m()});m()});