$(function() {
  var map;
  var service;
  var current_info_window;
  initMap()
  function initMap() {
    // 渋谷駅
    var sibuya = new google.maps.LatLng(35.658034, 139.701636);
    map = new google.maps.Map(document.getElementById('map'), {
        center: sibuya,
        zoom: 15
      });
    
    //指定位置の半径1000m内のカフェを検索
    var request = {
      location: sibuya,
      radius: '1000',
      type: ['cafe']
    };
    service = new google.maps.places.PlacesService(map);
    service.nearbySearch(request, callback);
  }

  function createWindow(place, marker) {
    var placename = place.name;
    var placevicinity = place.vicinity;
    // var photo = place.photos[0].html_attributions;
    var contentString = `<div style="width:250px"><p>${placename}</br>${placevicinity}</p></div>`;

    var info_window = new google.maps.InfoWindow({
      content: contentString
    });
    marker.addListener('click', function() {
      if (current_info_window) {
        current_info_window.close();
      }
      info_window.open(map, marker);
      current_info_window = info_window;
		});
  }

  function createMarker(place) {
    // console.log(place);
    var marker = new google.maps.Marker({
      position: place.geometry.location,
      map: map,
      title: place.name
    });
    createWindow(place, marker) 
  }

  function callback(results, status) {
    if (status == google.maps.places.PlacesServiceStatus.OK) {
      for (var i = 0; i < results.length; i++) {
        var place = results[i];
        createMarker(place);
      }
    }
  }
})