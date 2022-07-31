<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\review;
use App\User;
use Auth;
use File;
use DB;



class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
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
        $request->validate([
            'review' => 'required',
            'skor' => 'required',
        ]);

        $query = DB::table('review')->insert([
            "nama_review" => Auth::user()->name,
            "produk_id" => $request->produk_id,
            "user_id" => Auth::user()->id,
            "review" => $request->review,
            "skor" => $request->skor
        ]); 
        return redirect('');
    
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
        $request->validate([
            'review' => 'required',
            'skor' => 'required',
        ]);

        $user = DB::table('users')->where('id', $id)->first();
        $query = DB::table('review')
                    ->where('id', $id)
                    ->update([
                        "review" => $request["review"],
                        "skor" => $request["skor"]          
        ]); 
        return redirect('');
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
        $komen = DB::table('review')->where('id', $id)->first();
        $produk_id = $komen->produk_id;
        $komen->delete();
        return redirect()->route('/produk/'.$produk_id);
    }

}
