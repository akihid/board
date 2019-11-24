$(function() {
  var map;
  var service;
  var current_info_window;
  //マップデフォ
  var sibuya = new google.maps.LatLng(35.658034,139.701636);
  initMap()

  function initMap() {
    navigator.geolocation.getCurrentPosition(function(position) { 
      //position から緯度経度（ユーザーの位置）のオブジェクトを作成し変数に代入 
      lat = position.coords.latitude;
      lng = position.coords.longitude;
      //位置を現在地に更新
      var pos = new google.maps.LatLng(lat, lng);
      createMap(pos);
    }, function() {  //位置情報の取得をユーザーがブロックした場合のコールバック
      //情報ウィンドウのコンテンツを設定
      alert('Error: Geolocation が無効です。渋谷駅付近のマップを表示します');
      createMap(sibuya);
    });
  }

  function CreateMyPositionMarker(pos) {
    var image = 'http://maps.google.com/mapfiles/ms/micons/man.png';
    var marker = new google.maps.Marker({
            position: pos,
            map: map,
            icon: image
        });
    marker.setMap(map);
  }

  function createMap(pos) {
    map = new google.maps.Map(document.getElementById('map'), {
      center: pos,
      zoom: 15
    });
    //指定位置の半径1000m内のカフェを検索
    var request = {
      location: pos,
      radius: '1000',
      type: ['cafe']
    };
    service = new google.maps.places.PlacesService(map);
    service.nearbySearch(request, callback);
    CreateMyPositionMarker(pos);
  }

  function createWindow(place, marker) {
    var placename = place.name;
    var placevicinity = place.vicinity;
    // var a_tag = place.photos[0].html_attributions;
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