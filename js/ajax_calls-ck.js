jQuery(document).ready(function(e){function f(){project_item=e(".project_item"),foursix=e(".foursix")}function l(t){e.ajax({url:my_ajax_script.ajaxurl,data:{action:"query_projects",cat:t?t:null},dataType:"json",success:function(e){c(e,t);f()}})}function c(n,i,s){function u(){o.each(function(){e(this).css("height",Math.round(e(this).width()*1.5)+"px")})}var s=e("#projects_grid").attr("data-view");if(i){e("#proj_"+i+"_btn").text(i);e("#"+i+"_box").appendTo(t)}else{r.text("All");e("#all_box").appendTo(t)}e.each(n,function(n,r){var i='<div class="project_item '+s+' foursix" title="'+r.project_title+'" data-order="'+n+'" data-completed="'+r.date_completed+'" data-category="'+r.project_category+'" style="background-image: url('+r.featured_image+')">'+'<a href="'+r.project_permalink+'">'+'<div class="project_info">'+'<p class="title truncate">'+r.project_title+"</p>"+'<p class="cat truncate">'+r.project_category+"</p>"+'<p class="date_completed truncate">'+r.date_completed+"</p>"+"</div>"+"</a>"+"</div>";e(i).appendTo(t).css("opacity","0").delay(n*50).animate({opacity:1},200)});var o=e(".foursix");u();e(window).on("resize",function(){u()})}function d(t){e(".project_categories_container").removeClass("active").addClass("hidden");e("#cat_showing").attr("data-state","hidden");e(".cat_box").appendTo(p);t.remove()}var t=e("#projects_grid"),n=e(".cat_box"),r=e("#proj_all_btn"),i=e("#proj_cultural_btn"),s=e("#proj_commercial_btn"),o=e("#proj_education_btn"),u=e("#proj_preservation_btn"),a=e("#proj_residential_btn"),h='<p class="loaderdots"><span class="ldr ldr1"></span><span class="ldr ldr2"></span><span class="ldr ldr3"></span><span class="ldr ldr4"></span></p>',p=e("#category_stage");r.click(function(){d(e(".project_item"));e(this).text("").append(h);l();e(".cats ul li").not(e(this)).removeClass("selected");e(this).addClass("selected")});i.click(function(){d(e(".project_item"));e(this).text("").append(h);l("cultural");e(".cats ul li").not(e(this)).removeClass("selected");e(this).addClass("selected")});s.click(function(){d(e(".project_item"));e(this).text("").append(h);l("commercial");e(".cats ul li").not(e(this)).removeClass("selected");e(this).addClass("selected")});o.click(function(){d(e(".project_item"));e(this).text("").append(h);l("education");e(".cats ul li").not(e(this)).removeClass("selected");e(this).addClass("selected")});u.click(function(){d(e(".project_item"));e(this).text("").append(h);l("preservation");e(".cats ul li").not(e(this)).removeClass("selected");e(this).addClass("selected")});a.click(function(){d(e(".project_item"));e(this).text("").append(h);l("residential");e(".cats ul li").not(e(this)).removeClass("selected");e(this).addClass("selected")});l()});