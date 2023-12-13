<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Mapps;
use App\Models\Picupps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CombineController extends Controller
{
    public function index()
    {
        $picups = Picupps::with('map')->get();
        $maps = Mapps::with('picups')->get();

        return response()->json([
            'status' => true,
            'message' => 'Data ditemukan',
            'picups' => $picups,
            'maps' => $maps
        ], 200);
    }

    public function show($id) {

    $picup = Picupps::with('map')->find($id);

    if (!$picup) {
        return response()->json([
            'status' => false,
            'message' => 'Data not found'
        ], 404);
    }

    return response()->json([
        'status' => true,
        'message' => 'Data ditemukan',
        'data' => $picup
    ], 200);
}

public function store(Request $request)
{
        $validator = Validator::make($request->all(), [
            // Validation rules here
            'picup_nama' => 'required|string',
            'picup_deskripsi' => 'required|string',
            'no_telepon' => 'required|string',
            'alamat' => 'required|string',
            'harga' => 'required',
            'nama_maps' => 'required|string',
            'maps_latitude' => 'required|string',
            'maps_longitude' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }
        
        // Create new Map associated with the Picup
        $map = Mapps::create([
            // Fillable fields here
            'nama_maps' => $request->input('nama_maps'),
            'latitude' => $request->input('maps_latitude'),
            'longitude' => $request->input('maps_longitude')
            
        ]);

        // Create new Picup
        $picup = Picupps::create([
            // Fillable fields here
            'nama' => $request->input('picup_nama'),
            'deskripsi' => $request->input('picup_deskripsi'),
            'id_maps' => $map->id,
            'no_telepon' => $request->input('no_telepon'),
            'alamat' => $request->input('alamat'),
            'harga' => $request->input('harga')
        ]);


        return response()->json([
            'status' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $picup
        ], 201);
}

        public function update(Request $request, $id)
        {
            $validator = Validator::make($request->all(), [
                // Validation rules here
                'picup_nama' => 'required|string',
                'picup_deskripsi' => 'required|string',
                'no_telepon' => 'required|string',
                'alamat' => 'required|string',
                'harga' => 'required',
                'nama_maps' => 'required|string',
                'maps_latitude' => 'required|string',
                'maps_longitude' => 'required|string'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation error',
                    'errors' => $validator->errors()
                ], 422);
            }

            // Cari Picup yang akan diupdate
            $picup = Picupps::find($id);

            if (!$picup) {
                return response()->json([
                    'status' => false,
                    'message' => 'Data Picup tidak ditemukan'
                ], 404);
            }

            // Update data Picup
            $picup->nama = $request->input('picup_nama');
            $picup->deskripsi = $request->input('picup_deskripsi');
            $picup->no_telepon = $request->input('no_telepon');
            $picup->alamat = $request->input('alamat');
            $picup->harga = $request->input('harga');
            $picup->save();

            // Cari Maps yang terkait dengan Picup
            $map = $picup->map;

            if (!$map) {
                return response()->json([
                    'status' => false,
                    'message' => 'Data Maps tidak ditemukan untuk Picup ini'
                ], 404);
            }

            // Update data Maps yang terkait dengan Picup
            $map->nama_maps = $request->input('nama_maps');
            $map->latitude = $request->input('maps_latitude');
            $map->longitude = $request->input('maps_longitude');
            $map->save();

            return response()->json([
                'status' => true,
                'message' => 'Data berhasil diupdate',
                'picup' => $picup,
                'map' => $map
            ], 200);
        }

        public function destroy($id)
    {
        $pic = Picupps::find($id);
        $map = Mapps::where('id', $pic->id_maps)->first();

        if(empty($pic && $map)){
            return response()->json([
                'status' => false,
                'message' => 'Failed to Delete Data',
                
            ], 404);
        
        }

        $pic->delete();
        $map->delete();

        return response()->json([
            'status' => true,
            'message' => 'Sucess Delete Data',
            
        ],200);
    }

}

