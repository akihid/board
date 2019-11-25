@extends('layouts.common')
@section('content')

<div class="row mb-2">
  <div class="col-md-8 mx-auto form-row pt-2 bg-white">
    <div class="form-group col-sm-2">
      <label class="badge badge-light">範囲:</label></br>
      <select class="select_range_box" id="range">
        <option></option>
        <option value="1">300m</option>
        <option value="2">500m</option>
        <option value="3" selected>1000m</option>
        <option value="4">2000m</option>
        <option value="5">3000m</option>
      </select>
    </div>
    <div class="form-group col-sm-6">
      <label class="badge badge-light">店の種類:</label></br>
      <select class="select_category_box" id="category_l"multiple>
      <option></option>
        <option value="RSFST09000">居酒屋</option>
        <option value="RSFST02000">日本料理・郷土料理</option>
        <option value="RSFST03000">すし・魚料理・シーフード</option>
        <option value="RSFST04000">鍋</option>
        <option value="RSFST05000">焼肉・ホルモン</option>
        <option value="RSFST06000">焼き鳥・肉料理・串料理</option>
        <option value="RSFST01000">和食</option>
        <option value="RSFST07000">お好み焼き・粉物</option>
        <option value="RSFST08000">ラーメン・麺料理</option>
        <option value="RSFST14000">中華</option>
        <option value="RSFST11000">イタリアン・フレンチ</option>
        <option value="RSFST13000">洋食</option>
        <option value="RSFST12000">欧米・各国料理</option>
        <option value="RSFST16000">カレー</option>
        <option value="RSFST15000">アジア・エスニック料理</option>
        <option value="RSFST17000">オーガニック・創作料理</option>
        <option value="RSFST10000">ダイニングバー・バー・ビアホール</option>
        <option value="RSFST21000">お酒</option>
        <option value="RSFST18000" selected>カフェ・スイーツ</option>
        <option value="RSFST19000">宴会・カラオケ・エンターテイメント</option>
        <option value="RSFST20000" selected>ファミレス・ファーストフード</option>
        <option value="RSFST90000">その他の料理</option>
      </select>
    </div>
    <div class="form-group col-sm-4">
      <label class="badge badge-light">店名:</label></br>
      <div class="form-inline">
        <input type="text" class="form-control" id="search_shop_name">
        <input type="submit" class="ml-1 btn btn-secondary" id="map_search_btn" value="条件指定">
      </div>
    </div>
  </div>
</div>
    
<div class="col-md-8 mx-auto">
  <div id="map"></div>
</div>




<script src={{$map_src}}></script>
<script src="{{ asset('js/map.js') }}"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/i18n/ja.js"></script>

@endsection