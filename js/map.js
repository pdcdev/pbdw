jQuery(document).ready(function($) {
    
var map;
var loc = new google.maps.LatLng(40.741387,-73.991672);

var MY_MAPTYPE_ID = 'custom_style';

var lightgray = "#eeeeee";
var mediumgray = "#aaaaaa";
var darkgray = "#888888";
var white = "#ffffff";
var black = "#000000";

var parks = "#90d690";

function initialize() {

          var featureOpts = [{
              featureType: "water",
              stylers: [{
                  color: white
              }, {
                  visibility: "on"
              }]
          }, {
              featureType: "landscape",
              stylers: [{
                  color: lightgray
              }]
          }, {
              featureType: "administrative",
              elementType: "geometry.stroke",
              stylers: [{
                  color: "#4a4a4a"
              }, {
                  weight: 0.4
              }]
          }, {
              featureType: "poi",
              stylers: [{
                  color: parks
              }]
          }, {
              featureType: "road",
              elementType: "geometry.fill",
              stylers: [{
                  color: white
              }]
          }, {
              featureType: "road",
              elementType: "geometry.stroke",
              stylers: [{
                  color: mediumgray
              }, {
                  weight: 0
              }, {
                  visibility: "off"
              }]
          }, {
              featureType: "road",
              elementType: "labels.text.stroke",
              stylers: [{
                  color: mediumgray
              }, {
                  weight: 4
              }]
          }, {
              featureType: "road",
              elementType: "labels.text",
              stylers: [{
                  color: "#000000"
              }, {
                  weight: 0.5
              }]
          }, {
              elementType: "labels.text",
              stylers: [{
                  color: "#444444"
              }, {
                  weight: .1
              }]
          }, {
              featureType: "administrative",
              elementType: "labels.text",
              stylers: [{
                  visibility: "on"
              }, {
                  weight: 0.4
              }, {
                  color: "#f9f9f9"
              }]
          }, {
              featureType: "road.highway",
              elementType: "geometry",
              stylers: [{
                  color: mediumgray
              }]
          }, {
              featureType: "road",
              elementType: "labels.icon",
              stylers: [{
                  visibility: "off"
              }]
          }, {
              featureType: "transit",
              elementType: "labels.icon",
              stylers: [{
                  visibility: "on"
              }]
          }, {
              featureType: "administrative",
              elementType: "labels.icon",
              stylers: [{
                  visibility: "off"
              }]
          }, {
              featureType: "poi",
              elementType: "labels.icon",
              stylers: [{
                  visibility: "off"
              }]
          }, {
              featureType: "transit.line",
              elementType: "geometry",
              stylers: [{
                  visibility: "on"
              }, {
                  color: "#ffffff"
              }]
          }, {
              featureType: "poi.medical",
              elementType: "labels",
              stylers: [{
                  color: "#636363"
              }, {
                  visibility: "off"
              }]
          }, {
              featureType: "poi.place_of_worship",
              elementType: "labels",
              stylers: [{
                  visibility: "off"
              }]
          }, {
              featureType: "poi.attraction",
              elementType: "labels",
              stylers: [{
                  visibility: "off"
              }]
          }, {
              featureType: "poi.business",
              elementType: "labels",
              stylers: [{
                  visibility: "off"
              }]
          }];

  var mapOptions = {
    scrollwheel: false,
    zoom: 16,
    center: loc,
    streetViewControl: false,
    draggable: false,
    mapTypeControl:false,
    mapTypeControlOptions: {
      mapTypeIds: [google.maps.MapTypeId.ROADMAP, MY_MAPTYPE_ID]
    },
    mapTypeId: MY_MAPTYPE_ID
  };

  map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);

  var styledMapOptions = {
    name: 'Custom Style'
  };

  var customMapType = new google.maps.StyledMapType(featureOpts, styledMapOptions);

  var marker = new google.maps.Marker({
      position: loc,
      map: map,
      title:"PBDW Architects",
      icon: ''
  });

  map.mapTypes.set(MY_MAPTYPE_ID, customMapType);
}

google.maps.event.addDomListener(window, 'load', initialize);
 
  google.maps.event.addDomListener(window, "resize", function() {
    $('#map-canvas').css({height:'440px'}); 
    var center = map.getCenter();

    google.maps.event.trigger(map, "resize");

    map.setCenter(center);

  });
});