<?php

namespace App\Http\Controllers;

use App\Produk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Produk::all();
        return view('pages.index', compact('products'));
    }
}
