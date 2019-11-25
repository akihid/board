$(function() {
  var map;
  var pos;
  var current_info_window;
  initMap()

  function initMap() {
    navigator.geolocation.getCurrentPosition(function(position) { 
      //position から緯度経度（ユーザーの位置）のオブジェクトを作成し変数に代入 
      lat = position.coords.latitude;
      lng = position.coords.longitude;
      //位置を現在地に更新
      pos = new google.maps.LatLng(lat, lng);
      createMap();
    }, function() {  //位置情報の取得をユーザーがブロックした場合のコールバック
      //情報ウィンドウのコンテンツを設定
      alert('Error: Geolocation が無効です。渋谷駅付近のマップを表示します');
      lat = 35.658034;
      lng = 139.701636;
      pos = new google.maps.LatLng(lat,lng); 
      createMap();
    });
  }

  function createMap() {
    map = new google.maps.Map(document.getElementById('map'), {
      center: pos,
      zoom: 15
    });

    CreateMyPositionMarker();
    getGurunabiRequest();
  }

  function CreateMyPositionMarker() {
    var image = 'http://maps.google.com/mapfiles/ms/micons/man.png';
    var marker = new google.maps.Marker({
      position: pos,
      map: map,
      icon: image
    });
    marker.setMap(map);
  }

  function getGurunabiRequest(){
    var request = new XMLHttpRequest();
    var url = 'https://api.gnavi.co.jp/RestSearchAPI/v3/?keyid=baa16a1d72c88f9cb1b62a1c33bf0270&wifi=1&range=5&hit_per_page=100&category_l=RSFST18000,RSFST20000&latitude=' + lat + '&longitude=' + lng;
    request.responseType = 'json';
    request.open('GET', url, true);
    request.onload = function () {
      if(this.status == 404){
        alert('指定された条件の店舗が存在しません');
        return;
      }

      var data = request.response;
      data.rest.forEach(res => {  
        var shop_name= res.name;
        var shop_address = res.address;
        var shop_lat = res.latitude;
        var shop_lng = res.longitude;
        var shop_image = res.image_url['shop_image1'];
        var shop_url = res.url;
        var shop_opentime = res.opentime;
  
        // ショップの位置をもとにマーカー作成
        var shop_pos = new google.maps.LatLng(shop_lat, shop_lng);
        var marker = new google.maps.Marker({
          position: shop_pos,
          map: map,
          url: shop_url,
        });
  
        var contentString = `<div style="width:250px"><p><a href=${shop_url}>${shop_name}</a></br>${shop_address}</br>営業時間:${shop_opentime}</p><img src=${shop_image}></div>`;
  
        createWindow(contentString, marker)
      });
    };
    request.send();
  }

  function createWindow(contentString, marker) {
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
})