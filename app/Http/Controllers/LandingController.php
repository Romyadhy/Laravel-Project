<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {

    $client = new Client();
        $urlPicups = "http://127.0.0.1:8000/api/picups"; // Endpoint untuk picups
        // $urlMaps = "http://127.0.0.1:8000/api/maps"; // Endpoint untuk maps

        $responsePicups = $client->request('GET', $urlPicups);
        // $responseMaps = $client->request('GET', $urlMaps);

        $contentPicups = $responsePicups->getBody()->getContents();
        // $contentMaps = $responseMaps->getBody()->getContents();

        $contentArrayPicups = json_decode($contentPicups, true);
        // $contentArrayMaps = json_decode($contentMaps, true);

        $dataPicups = $contentArrayPicups['picups'];
        // $dataMaps = $contentArrayMaps['maps'];
        // dd($dataPicups);

        return view('frontpage.landing', [
            'dataPicups' => $dataPicups, 
            // 'dataMaps' => $dataMaps
        ]);
        
    }

    public function detail(){
        return view('frontpage.detail');
    }
}
