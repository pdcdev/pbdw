jQuery(document).ready(function(e){function h(){l=e(".project_item");f=e(".foursix")}function p(t){e.ajax({url:my_ajax_script.ajaxurl,data:{action:"query_projects",cat:t?t:null},dataType:"json",success:function(e){m(e,t)}})}function d(){f.each(function(){e(this).css("height",Math.round(e(this).width()*1.5)+"px")})}function v(){e(".cat_size").each(function(){e(window).width()<480?e(".cat_size").css("height","auto"):e(this).css("height",Math.round(e(this).width()*1.5)+"px")})}function m(r,i,s){s=e("#projects_grid").attr("data-view");if(i){e("#proj_"+i+"_btn").text(i);e("#"+i+"_box").appendTo(t)}else{n.text("All");e("#all_box").appendTo(t)}e.each(r,function(n,r){var i='<div class="project_item '+s+' foursix" title="'+r.project_title+'" data-order="'+n+'" data-completed="'+r.date_completed+'" data-category="'+r.project_category+'" style="background-image: url('+r.featured_image+')">'+'<a href="'+r.project_permalink+'">'+'<div class="project_info">'+'<p class="title truncate">'+r.project_title+"</p>"+'<p class="cat truncate">'+r.project_category+"</p>"+'<p class="date_completed truncate">'+r.date_completed+"</p>"+"</div>"+"</a>"+"</div>";e(i).appendTo(t).css("opacity","0").delay(n*50).animate({opacity:1},200)});h();d();v()}function g(t){e(".project_categories_container").removeClass("active").addClass("hidden");e("#cat_showing").attr("data-state","hidden");e(".cat_box").appendTo(a);t.remove()}function y(t,n){g(e(".project_item"));n.text("").append(c);t===null?p(""):p(t);e(".cats ul li").not(n).removeClass("selected");n.addClass("selected")}var t=e("#projects_grid"),n=e("#proj_all_btn"),r=e("#proj_cultural_btn"),i=e("#proj_commercial_btn"),s=e("#proj_education_btn"),o=e("#proj_preservation_btn"),u=e("#proj_residential_btn"),a=e("#category_stage"),f=e(".foursix"),l=e(".project_item"),c='<p class="loaderdots"><span class="ldr ldr1"></span><span class="ldr ldr2"></span><span class="ldr ldr3"></span><span class="ldr ldr4"></span></p>';e(window).on("resize",function(){d();v()});n.click(function(){y(null,e(this))});r.click(function(){y("cultural",e(this))});i.click(function(){y("commercial",e(this))});s.click(function(){y("education",e(this))});o.click(function(){y("preservation",e(this))});u.click(function(){y("residential",e(this))});p()});