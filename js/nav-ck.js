jQuery(document).ready(function(e){function a(){t.attr("data-state")==="0"?t.removeClass("inactive").addClass("active").attr("data-state",1):t.removeClass("active").addClass("inactive").attr("data-state",0)}var t=e(".main_nav"),n=e(".nav_btn"),r=e("body"),i=e(window),s=e("header").height(),o=document.querySelector("#header_container"),u=new Headroom(o,{tolerance:5,offset:-30,classes:{initial:"animated",pinned:"slideDown",unpinned:"slideUp",top:"headroom--top",notTop:"headroom--not-top"}});u.init();e("nav .nav_container").not("#menu-primary-navigation").click(function(){t.attr("data-state")==="1"&&t.removeClass("active").addClass("inactive").attr("data-state",0)});n.click(function(){a()})});