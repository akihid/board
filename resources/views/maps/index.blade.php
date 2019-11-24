@extends('layouts.common')
@section('content')

<div class="col-md-8 mx-auto">
  <div id="map"></div>
</div>


<script src={{$map_src}}></script>
<script src="{{ asset('js/map.js') }}"></script>

@endsection