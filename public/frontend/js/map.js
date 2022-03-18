function initialize() {
      var mapOptions = {
    zoom: 10,
    scrollwheel: false,
    center: new google.maps.LatLng(14.551707861824474, 121.21975254043059)
  };

  var map = new google.maps.Map(document.getElementById('googleMap'),
      mapOptions);


  var marker = new google.maps.Marker({
    position: map.getCenter(),
    icon: 'img/map-marker.png',
    map: map
  });

}
google.maps.event.addDomListener(window, 'load', initialize);




























