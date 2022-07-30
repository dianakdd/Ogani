<?php

namespace App\Http\Controllers;

use App\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('admin.index', compact('kategori'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('admin.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'produk_id' => 'required',
        ]);

        $kategori = new Kategori;

        $kategori->name = $request->name;
        $kategori->produk_id = $request->produk_id;

        $kategori->save();

        return redirect('/kategori')->with('status', 'Data Kategori Berhasil Ditambahkan');
    }
}
