<?php

namespace App\Http\Controllers;

use File;
use App\Produk;
use App\Cart;
use DB;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $products = Produk::paginate(1);
        $counts = Cart::count();
        $total = Cart::sum('harga');
        return view('pages.detail', compact('products', 'counts', 'total'));
    }

    public function show($id){
        $products = Produk::find($id);
        return view('pages.detail', compact('products'));
    }

}
