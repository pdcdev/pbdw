jQuery(document).ready(function(e){function f(){function p(){h.getAnimation()!=null?h.setAnimation(null):h.setAnimation(google.maps.Animation.BOUNCE)}var e=[{featureType:"water",stylers:[{color:u},{visibility:"on"}]},{featureType:"landscape",stylers:[{color:i}]},{featureType:"administrative",elementType:"geometry.stroke",stylers:[{color:"#4a4a4a"},{weight:.4}]},{featureType:"poi",stylers:[{color:a}]},{featureType:"road",elementType:"geometry.fill",stylers:[{color:o}]},{featureType:"road",elementType:"geometry.stroke",stylers:[{color:s},{weight:0},{visibility:"off"}]},{featureType:"road",elementType:"labels.text.stroke",stylers:[{color:s},{weight:4}]},{featureType:"road",elementType:"labels.text",stylers:[{color:"#000000"},{weight:.5}]},{elementType:"labels.text",stylers:[{color:"#444444"},{weight:.1}]},{featureType:"administrative",elementType:"labels.text",stylers:[{visibility:"on"},{weight:.4},{color:"#444444"}]},{featureType:"road.highway",elementType:"geometry",stylers:[{color:s}]},{featureType:"road",elementType:"labels.icon",stylers:[{visibility:"off"}]},{featureType:"transit",elementType:"labels.icon",stylers:[{visibility:"on"}]},{featureType:"administrative",elementType:"labels.icon",stylers:[{visibility:"off"}]},{featureType:"poi",elementType:"labels.icon",stylers:[{visibility:"off"}]},{featureType:"transit.line",elementType:"geometry",stylers:[{visibility:"on"},{color:"#44444"}]},{featureType:"poi.medical",elementType:"labels",stylers:[{color:"#636363"},{visibility:"off"}]},{featureType:"poi.place_of_worship",elementType:"labels",stylers:[{visibility:"off"}]},{featureType:"poi.attraction",elementType:"labels",stylers:[{visibility:"off"}]},{featureType:"poi.business",elementType:"labels",stylers:[{visibility:"off"}]}],f={scrollwheel:!1,zoom:16,center:n,streetViewControl:!1,draggable:!0,mapTypeControl:!1,mapTypeControlOptions:{mapTypeIds:[google.maps.MapTypeId.ROADMAP,r]},mapTypeId:r};t=new google.maps.Map(document.getElementById("map-canvas"),f);var l={name:"Custom Style"},c=new google.maps.StyledMapType(e,l),h=new google.maps.Marker({position:n,map:t,title:"PBDW Architects",animation:google.maps.Animation.DROP,icon:"../wp-content/themes/pbdw/images/pbdwpin.png"});google.maps.event.addListener(h,"click",function(){window.open("https://www.google.com/maps/place/PBDW+Architects/@40.751512,-73.985486,17z/data=!3m1!4b1!4m2!3m1!1s0x89c259a38659c76d:0xbf6bd067e5fa6151")});t.mapTypes.set(r,c)}var t,n=new google.maps.LatLng(40.751512,-73.985486),r="custom_style",i="#f5f5f5",s="#f5f5f5",o="#d6d6d6",u="#d6d6d6",a="#ceedd6";google.maps.event.addDomListener(window,"load",f);google.maps.event.addDomListener(window,"resize",function(){var e=t.getCenter();google.maps.event.trigger(t,"resize");t.setCenter(e)})});