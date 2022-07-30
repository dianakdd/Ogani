<?php

namespace App\Http\Controllers;

use App\Produk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Produk::all();
        $counts = Produk::count();
        return view('pages.index', compact('products', 'counts'));
    }
}
