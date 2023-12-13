<?php

namespace App\Http\Controllers;

use App\Models\Mapps;
use App\Models\Picupps;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Exception\RequestException;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    $client = new Client();
        $urlPicups = "http://127.0.0.1:8000/api/picups"; // Endpoint untuk picups
        $urlMaps = "http://127.0.0.1:8000/api/maps"; // Endpoint untuk maps

        $responsePicups = $client->request('GET', $urlPicups);
        $responseMaps = $client->request('GET', $urlMaps);

        $contentPicups = $responsePicups->getBody()->getContents();
        $contentMaps = $responseMaps->getBody()->getContents();

        $contentArrayPicups = json_decode($contentPicups, true);
        $contentArrayMaps = json_decode($contentMaps, true);

        $dataPicups = $contentArrayPicups['picups'];
        // $dataMaps = $contentArrayMaps['maps'];
        // dd($dataPicups);

        return view('backpage.admin', [
            'dataPicups' => $dataPicups, 
            // 'dataMaps' => $dataMaps
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pic = new Picupps();
        $map = new Mapps();

        return view('backpage.create', compact('pic', 'map'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
            $picup_nama = $request->picup_nama;
            $picup_deskripsi = $request->picup_deskripsi;
            $no_telepon = $request->no_telepon;
            $alamat = $request->alamat;
            $harga = $request->harga;
            $nama_maps = $request->nama_maps;
            $maps_latitude = $request->maps_latitude;
            $maps_longitude = $request->maps_longitude;
            
    
            $param = [
                // 'picup_nama' => $nama,
                // 'picup_deskripsi' => $desc,
                // 'nama_maps' => $nama_maps,
                // 'maps_latitude' => $latitude,
                // 'maps_longitude' => $long

                'picup_nama' => $picup_nama,
                'picup_deskripsi' => $picup_deskripsi,
                'no_telepon' => $no_telepon,
                'alamat' => $alamat,
                'harga' => $harga,
                'nama_maps' => $nama_maps,
                'maps_latitude' => $maps_latitude,
                'maps_longitude' => $maps_longitude
    
            ];
    
            $client = new Client();
            $urlPic = "http://127.0.0.1:8000/api/picups";
            // $urlMaps = "http://127.0.0.1:8000/api/maps"; 
    
            $response = $client->request('POST', $urlPic, [
                'headers'=>['Content-type'=>'application/json'],
                'body'=>json_encode($param)
            ]);
            $content = $response->getBody()->getContents();
            $contentAryy = json_decode($content, true);
            if($contentAryy['status'] != true){
                $error = $contentAryy['picups'];
                return redirect()->to('adminpage')->withErrors($error)->withInput();
            }
            else{
                return redirect()->to('adminpage')->with('success', 'Success Input new Data');
            }
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
        {
            $picup = Http::get("http://127.0.0.1:8000/api/picups/{$id}");

            if($picup->failed()){
                return redirect()->back()->with('error', 'Failed to fetch data');
            }

            $pic = $picup->json();
            return view('backpage.create', compact('pic'));
        }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validasi
                $picup_nama = $request->picup_nama;
                $picup_deskripsi = $request->picup_deskripsi;
                $no_telepon = $request->no_telepon;
                $alamat = $request->alamat;
                $harga = $request->harga;
                $nama_maps = $request->nama_maps;
                $maps_latitude = $request->maps_latitude;
                $maps_longitude = $request->maps_longitude;

        $param = [
                'picup_nama' => $picup_nama,
                'picup_deskripsi' => $picup_deskripsi,
                'no_telepon' => $no_telepon,
                'alamat' => $alamat,
                'harga' => $harga,
                'nama_maps' => $nama_maps,
                'maps_latitude' => $maps_latitude,
                'maps_longitude' => $maps_longitude
        ];

        $client = new Client();
        $url = "http://127.0.0.1:8000/api/picups/$id";

        $response = $client->request('PUT', $url, [
            'headers'=>['Content-type'=>'application/json'],
            'body'=>json_encode($param)
        ]);
        $content = $response->getBody()->getContents();
        $contentAryy = json_decode($content, true);
        if($contentAryy['status'] != true){
            $error = $contentAryy['picups'];
            return redirect()->to('adminpage')->withErrors($error)->withInput();
        }
        else{
            return redirect()->to('adminpage')->with('success', 'Success Update Data');
        }

    //     $response = Http::asJson()->put("http://127.0.0.1:8000/api/picups/$id", $param);

    //     dd($response);

    // if ($response->failed()) {
    //     return redirect()->back()->with('error', 'Failed to update data')->withInput();
    // }

    // return redirect()->to('adminpage')->with('success', 'Success Update Data');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $response = Http::delete("http://127.0.0.1:8000/api/picups/{$id}");
        // dd($response);
        if ($response->successful()) {
            return redirect()->route('adminpage.index')->with('success', 'Data successfully deleted');
        } else {
            return redirect()->route('adminpage.index')->with('error', 'Failed to delete data');
        }
        
    }
}
