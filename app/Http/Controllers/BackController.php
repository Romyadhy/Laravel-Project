<?php

namespace App\Http\Controllers;

use App\Models\Mapps;
use App\Models\Picupps;
use Illuminate\Http\Request;

class BackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $picups = Picupps::with('map')->get();
        $maps = Mapps::with('picups')->get();

        return view('backpage.admin', compact('picups', 'maps'));

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
        $data = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'no_telepon' => 'required',
            'alamat' => 'required',
            'harga' => 'required',
            'nama_maps' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'id_maps'=>''
            

            // 'ticket_id' => 'null',
            // 'price' => 'required|numeric|regex:/^\d{1,3}([,.]\d{3})*(\.\d{1,2})?$/'
        ]);   



            $pic =  Picupps::create([
                'nama' => $data['nama'],
                'deskripsi' => $data['deskripsi'],
                'no_telepon' => $data['no_telepon'],
                'alamat' => $data['alamat'],
                'harga' => $data['harga'],
                'image' =>  $data['image'],
                'id_maps' =>  ''
              
                
            ]);

            
        if($request->hasfile('image')){
            $request->file('image')->move('images/', $request->file('image')->getClientOriginalName());
            $pic->image = $request->file('image')->getClientOriginalName();
            $pic->save();
        }
        


        $map =  Mapps::create([
            'nama_maps' => $data['nama_maps'],
            'latitude' => $data['latitude'],
            'longitude' => $data['longitude'],
            

        ]);


        // $pic->id_maps = $map->id;
        // $pic->save();
        // dd($map);
        $pic->map()->save($map);
        // $map->picups()->save($pic);
        //$map->save();
        //$pic->save();
        // Mapps::create($data);
        // Picupps::create($data);

        return redirect()->route('adminPages')->with('success', 'Event and Ticket created successfully.');
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
        //
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
        //
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
