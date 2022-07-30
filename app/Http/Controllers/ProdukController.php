<?php

namespace App\Http\Controllers;

use File;
use App\Produk;
use App\Kategori;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Produk::all();
        $kategori = Kategori::all();
        return view('admin.produk.index', compact('produk', 'kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produk = Produk::all();
        $kategori = Kategori::all();
        return view('admin.create', compact('produk', 'kategori'));
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
            'name' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|mimes:png,jpeg,jpg|max:2048',
            'harga' => 'required',
            'stok' => 'required',
        ]);

        $NamaGambar = time() . '.' . $request->gambar->extension();

        $request->gambar->move(public_path('image'), $NamaGambar);

        $produk = new Produk;

        $produk->name = $request->name;
        $produk->deskripsi = $request->deskripsi;
        $produk->gambar = $NamaGambar;
        $produk->harga = $request->harga;
        $produk->stok = $request->stok;

        $produk->save();

        return redirect('/produk');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produk = Produk::find($id);
        return view('admin.detail', compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produk = Produk::find($id);
        return view('admin.update', compact('produk'));
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
        $request->validate([
            'name' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|mimes:png,jpeg,jpg|max:2048',
            'harga' => 'required',
            'stok' => 'required',
        ]);

        $produk = produk::find($id);
        if ($request->has('gambar')) {
            $path = "image/";
            File::delete($path . $produk->gambar);

            $NamaGambar = time() . '.' . $request->gambar->extension();

            $request->gambar->move(public_path('image'), $NamaGambar);

            $produk->gambar = $NamaGambar;

            $produk->save();
        }

        $produk->name = $request->name;
        $produk->deskripsi = $request->deskripsi;
        $produk->harga = $request->harga;
        $produk->stok = $request->stok;

        $produk->save();

        return redirect('/produk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Produk::find($id);

        $path = "image/";
        File::delete($path . $produk->gambar);

        $produk->delete();

        return redirect('/produk');
    }
}
