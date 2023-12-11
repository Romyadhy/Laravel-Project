<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $client = new Client();
       $url = "http://127.0.0.1:8000/api/book/";
       $response = $client->request('GET', $url);
    //    dd($response);
    // echo $response->getStatusCode();
        $content = $response->getBody()->getContents();
        $contentAryy = json_decode($content, true);
        $data = $contentAryy['data'];
        // print_r($data);
        return view('book.index',['data' => $data]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title = $request->title;
        $author = $request->author;
        $date_public = $request->date_public;

        $param = [
            'title' => $title,
            'author' => $author,
            'date_public' => $date_public

        ];

        $client = new Client();
        $url = "http://127.0.0.1:8000/api/book/";

        $response = $client->request('POST', $url, [
            'headers'=>['Content-type'=>'application/json'],
            'body'=>json_encode($param)
        ]);
        $content = $response->getBody()->getContents();
        $contentAryy = json_decode($content, true);
        if($contentAryy['status'] != true){
            $error = $contentAryy['data'];
            return redirect()->to('book')->withErrors($error)->withInput();
        }
        else{
            return redirect()->to('book')->with('success', 'Success Input new Data');
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
        $client = new Client();
       $url = "http://127.0.0.1:8000/api/book/$id";
       $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentAryy = json_decode($content, true);
        if($contentAryy['status'] != true){
            $error = $contentAryy['message'];
            return redirect()->to('book')->withErrors($error);
        }
        else{
            // return redirect()->to('book')->with('success', 'Success Input new Data');
            $data = $contentAryy['data'];
            return view('book.index', ['data' => $data]);
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
        $title = $request->title;
        $author = $request->author;
        $date_public = $request->date_public;

        $param = [
            'title' => $title,
            'author' => $author,
            'date_public' => $date_public

        ];

        $client = new Client();
        $url = "http://127.0.0.1:8000/api/book/$id";

        $response = $client->request('PUT', $url, [
            'headers'=>['Content-type'=>'application/json'],
            'body'=>json_encode($param)
        ]);
        $content = $response->getBody()->getContents();
        $contentAryy = json_decode($content, true);
        if($contentAryy['status'] != true){
            $error = $contentAryy['data'];
            return redirect()->to('book')->withErrors($error)->withInput();
        }
        else{
            return redirect()->to('book')->with('success', 'Success Update Data');
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
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/book/$id";

        $response = $client->request('DELETE', $url);
        $content = $response->getBody()->getContents();
        $contentAryy = json_decode($content, true);
        if($contentAryy['status'] != true){
            $error = $contentAryy['data'];
            return redirect()->to('book')->withErrors($error)->withInput();
        }
        else{
            return redirect()->to('book')->with('success', 'Success Delete Data');
        }
    }
}
