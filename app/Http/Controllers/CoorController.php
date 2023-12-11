<?php

namespace App\Http\Controllers;

use App\Models\Coor;
use Illuminate\Http\Request;

class CoorController extends Controller
{
   public function getCoor(){
    $coordinate = Coor::select('latitude', 'longitude')->get();
    return response()->json($coordinate);
   }
}
