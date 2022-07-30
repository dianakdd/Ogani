<?php

namespace App\Http\Controllers;

use App\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('admin.kategori.index', compact('kategori'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('admin.kategori.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        $kategori = Kategori::insert([
            'nama' => $request->nama,
        ]);

        return redirect('/kategori')->with('status', 'Data Kategori Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $kategori = Kategori::find($id);
        return view('admin.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        $kategori = Kategori::find($id);
        $kategori->nama = $request->nama;
        $kategori->save();

        return redirect('/kategori')->with('status', 'Data Kategori Berhasil Diubah');
    }

    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();

        return redirect('/kategori')->with('status', 'Data Kategori Berhasil Dihapus');
    }
}
