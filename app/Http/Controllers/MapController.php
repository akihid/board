<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapController extends Controller
{
  public function index(Request $request)
    {
      $map_src = "https://maps.googleapis.com/maps/api/js?key=".env('MAP_API_KEY');
      return view('maps.index', compact('map_src'));
    }
}
