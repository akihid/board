@extends('layouts.common')
@section('content')

<div id="map" style="height: 500px; width: 80%; margin: 2rem auto 0;"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- google map api -->
    <script src={{$map_src}}></script>
    <!-- js -->
    <script type="text/javascript">
      var map = new google.maps.Map(document.getElementById('map'), {
        center: {
          lat: -34.397, //緯度を設定
          lng: 150.644 //経度を設定
        },
        zoom: 8 //地図のズームを設定
      });
    </script>

@endsection