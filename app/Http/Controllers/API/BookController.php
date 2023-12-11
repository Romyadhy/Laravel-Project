<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Coor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $maps = Coor::all();
        $data = Book::orderBy('title', 'asc')->get();
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
        $book = new Book;

        $rules = [
            'title' => 'required', 
            'author' => 'required',
            'date_public' => 'required|date'
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => 'Cannot adding the Data',
                'data' => $validator->errors()
                
            ]);
        }

        $book->title = $request->title;
        $book->author = $request->author;
        $book->date_public = $request->date_public;

        $post = $book->save();
        return response()->json([
            'status' => true,
            'message' => 'Sucess',
            
        ],200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Book::find($id);
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
        $book = Book::find($id);

        if(empty($book)){
            return response()->json([
                'status' => false,
                'message' => 'Failed to update data',
                
            ], 404);
        
        }

        $rules = [
            'title' => 'required', 
            'author' => 'required',
            'date_public' => 'required|date'
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => 'Sucess Update Data',
                'data' => $validator->errors()
                
            ]);
        }

        $book->title = $request->title;
        $book->author = $request->author;
        $book->date_public = $request->date_public;

        $post = $book->save();
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
        $book = Book::find($id);

        if(empty($book)){
            return response()->json([
                'status' => false,
                'message' => 'Failed to Delete Data',
                
            ], 404);
        
        }

        $post = $book->delete();

        return response()->json([
            'status' => true,
            'message' => 'Sucess Delete Data',
            
        ],200);
    }

   
}
