jQuery(document).ready(function(e){function p(){h.each(function(){height=Math.round(e(this).width()/.6667);e(this).css("height",height+"px")})}function d(t,n,r){var i=e("#projects_grid"),s=i.children(".project_item").get();s.sort(function(n,i){var s=e(n).attr(t).toUpperCase(),o=e(i).attr(t).toUpperCase();if(r){s=Number(s);o=Number(o)}return s<o?-1:s>o?1:0});n&&s.reverse();e.each(s,function(e,t){i.append(t)})}function v(r,i){r.removeClass("inactive").addClass("active");e(".list_header p").not(r).removeClass("active ascending descending").addClass("inactive").attr("data-state",1);state=r.attr("data-state")==1?!0:!1;if(state){r.removeClass("descending").addClass("ascending").attr("data-state",0);d(i,t)}else{r.removeClass("ascending").addClass("descending").attr("data-state",1);d(i,n)}}function m(){state=o.attr("data-state")==1?!0:!1;if(state){l.removeClass("list").addClass("grid");o.attr("data-state",0);f.hide();a.show();r.removeClass("list_header_visible").addClass("list_header_hidden");p();d("data-order",t,!0)}else{l.removeClass("grid").addClass("list");o.attr("data-state",1);a.hide();f.show();r.removeClass("list_header_hidden").addClass("list_header_visible");v(i,"title")}}var t=!1,n=!0,r=e(".list_header"),i=e(".alpha-btn"),s=e(".category-btn"),o=e("#grid-list-btn"),u=e(".year-btn"),a=e("#list_btn"),f=e("#grid_btn"),l=e(".project_item"),c=e(".flex-control-nav"),h=e(".foursix");e("#list_btn, #grid_btn").click(function(){m()});i.click(function(){v(e(this),"title")});s.click(function(){v(e(this),"data-category")});u.click(function(){v(e(this),"data-completed")})});