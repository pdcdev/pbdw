jQuery(document).ready(function(e){function h(t,n,r){var i=e("#projects_grid"),s=i.children(".project_item").get();s.sort(function(n,i){var s=e(n).attr(t).toUpperCase(),o=e(i).attr(t).toUpperCase();if(r){s=Number(s);o=Number(o)}return s<o?-1:s>o?1:0});n&&s.reverse();e.each(s,function(e,t){i.append(t)})}function p(r,i){r.removeClass("inactive").addClass("active");e(".list_header p").not(r).removeClass("active ascending descending").addClass("inactive").attr("data-state",1);state=r.attr("data-state")==1?!0:!1;if(state){r.removeClass("descending").addClass("ascending").attr("data-state",0);h(i,t)}else{r.removeClass("ascending").addClass("descending").attr("data-state",1);h(i,n)}}function d(){state=o.attr("data-state")==1?!0:!1;if(state){l.removeClass("list").addClass("grid");o.attr("data-state",0);f.hide();a.show();r.removeClass("list_header_visible").addClass("list_header_hidden");size_foursix();h("data-order",t,!0)}else{l.removeClass("grid").addClass("list");o.attr("data-state",1);a.hide();f.show();r.removeClass("list_header_hidden").addClass("list_header_visible");p(i,"title")}}var t=!1,n=!0,r=e(".list_header"),i=e(".alpha-btn"),s=e(".category-btn"),o=e("#grid-list-btn"),u=e(".year-btn"),a=e("#list_btn"),f=e("#grid_btn"),l=e(".project_item"),c=e(".flex-control-nav");e(document).on("click","#list_btn, #grid_btn",function(){d()});i.click(function(){p(e(this),"title")});s.click(function(){p(e(this),"data-category")});u.click(function(){p(e(this),"data-completed")});e(".featured_projects_flexslider").flexslider({keyboard:!0,animation:"fade",slideshow:!0,slideshowSpeed:5e3,animationSpeed:1e3,touch:Modernizr.touch?"true":"false",video:!1,controlNav:!0,directionNav:!1,controlsContainer:".gallery_nav_container",useCSS:!0,startAt:0,pauseOnAction:!0,start:function(t){e(".slides").show();e(".flex").click(function(){e(this).hasClass("next")?t.flexAnimate(t.getTarget("next"),!0):t.flexAnimate(t.getTarget("prev"),!0)})}})});