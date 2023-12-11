<?php

namespace App\Http\Controllers;

use App\Models\Mapps;
use App\Models\Picupps;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
        $dataMaps = $contentArrayMaps['maps'];
        // dd($dataPicups);

        return view('backpage.admin', [
            'dataPicups' => $dataPicups, 
            'dataMaps' => $dataMaps
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
            abort(404);
        }

        $pic = $picup->json();
        // dd($pic);

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
        //  // Validasi data yang diterima
        //     $data = $request->validate([
        //         'picup_nama' => 'required|string',
        //         'picup_deskripsi' => 'required|string',
        //         'nama_maps' => 'required|string',
        //         'maps_latitude' => 'required|string',
        //         'maps_longitude' => 'required|string'
                
        //     ]);

        //      // Kirim permintaan PUT atau PATCH ke API untuk mengupdate data (ganti URL dan parameter sesuai dengan API Anda)
        //     $response = Http::put("http://127.0.0.1:8000/api/picups/{$id}", $data);

        //     if ($response->failed()) {
        //         // Handle jika permintaan API gagal
        //         return back()->with('error', 'Failed to update data.'); // Misalnya, tampilkan pesan error
        //     }
        
        //     return redirect()->route('adminPage.index')->with('success', 'Data updated successfully.');

            $picup_nama = $request->picup_nama;
            $picup_deskripsi = $request->picup_deskripsi;
            $nama_maps = $request->nama_maps;
            $maps_latitude = $request->maps_latitude;
            $maps_longitude = $request->maps_longitude;

        $param = [
                'picup_nama' => $picup_nama,
                'picup_deskripsi' => $picup_deskripsi,
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
            $error = $contentAryy['data'];
            return redirect()->to('adminpage')->withErrors($error)->withInput();
        }
        else{
            return redirect()->to('adminpage')->with('success', 'Success Update Data');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
