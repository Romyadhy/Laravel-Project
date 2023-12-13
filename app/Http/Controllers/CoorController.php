<?php

namespace App\Http\Controllers;

use App\Models\Coor;
use App\Models\Mapps;
use Illuminate\Http\Request;

class CoorController extends Controller
{
   public function getCoor(){
    $coordinate = Mapps::select('latitude', 'longitude')->get();
    return response()->json($coordinate);
   }
}
