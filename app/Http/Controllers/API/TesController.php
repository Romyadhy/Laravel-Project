<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Maps;
use App\Models\Picup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $maps = Maps::all();
        $data = Picup::all();
        return response()->json([
            'status' => true,
            'message' => 'Data ditemukan',
            'data' => $data
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $pic = new Picup;
        // $map = new Maps;

        // $rules = [
        //     'nama' => 'required', 
        //     'deskripsi' => 'required',
        //     'id_peta' => 'required',

        //     'nama_maps' => 'required',
        //     'latitude' => 'required',
        //     'longitude' => 'required'

        // ];

        // $validator = Validator::make($request->all(), $rules);
        // if($validator->fails()){
        //     return response()->json([
        //         'status' => false,
        //         'message' => 'Cannot adding the Data',
        //         'data' => $validator->errors()
                
        //     ]);
        // }

        // $pic->nama = $request->nama;
        // $pic->deskripsi = $request->deskripsi;
        // $pic->id_peta = $request->id_peta;


        // $map->nama_maps = $request->nama_maps;
        // $map->latitude = $request->latitude;
        // $map->longitude = $request->longitude;

        // $post = $pic->save();
        // $pic->maps()->associate($map); 
        // $map->save();
        // return response()->json([
        //     'status' => true,
        //     'message' => 'Sucess',
            
        // ],200);

        $validated = $request->validate([
            'nama' => 'required|max:255',
            'deskripsi' => 'required',
        ]);

        // $request['id_peta'] = Auth::Maps()->id;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Picup::find($id);
        // $maps = Maps::find($id);
        if($data){
            return response()->json([
                'status' => true,
                'message' => 'Data found',
                'data' => $data
            ], 200);
        } 
        else{
            return response()->json([
                'status' => false,
                'message' => 'Data not found'
            ]);
        }
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
        $pic = Picup::find($id);
        $map = Maps::find($id);

        if(empty($pic && $map)){
            return response()->json([
                'status' => false,
                'message' => 'Failed to update data',
                
            ], 404);
        
        }

        $rules = [
            'nama' => 'required', 
            'deskripsi' => 'required',
            // 'id_peta' => 'required',

            'nama_maps' => 'required',
            'latitude' => 'required',
            'longitude' => 'required'

        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => 'Sucess Update Data',
                'data' => $validator->errors()
                
            ]);
        }

        $pic->nama = $request->nama;
        $pic->deskripsi = $request->deskripsi;
        // $pic->id_peta = $request->id_peta;


        $map->nama_maps = $request->nama_maps;
        $map->latitude = $request->latitude;
        $map->longitude = $request->longitude;

        $pic->save();
        $map->save();
        return response()->json([
            'status' => true,
            'message' => 'Sucess',
            
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pic = Picup::find($id);
        // $map = Maps::find($id);

        if(empty($pic)){
            return response()->json([
                'status' => false,
                'message' => 'Failed to Delete Data',
                
            ], 404);
        
        }

        // $post = $book->delete();
        $pic->delete();
        // $map->delete();

        return response()->json([
            'status' => true,
            'message' => 'Sucess Delete Data',
            
        ],200);
    }

}

