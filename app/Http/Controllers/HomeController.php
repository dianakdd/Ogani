<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Produk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Produk::all();
        $counts = Cart::count();
        $total = Cart::sum('harga');
        return view('pages.index', compact('products', 'counts', 'total'));
    }

}
