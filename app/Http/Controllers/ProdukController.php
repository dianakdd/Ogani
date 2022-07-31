<?php

namespace App\Http\Controllers;

use File;
use App\Produk;
use App\Cart;
use App\Kategori;
use App\CartDetail;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        $products = Produk::paginate(10);
        $productcount = Produk::count();
       
        if(Auth::user()){
            $user = Auth::id();
            $usercart =Cart::where('user_id', $user)->first();
            if($usercart){
                $cartid =$usercart ->id;
                $counts = CartDetail::where('cart_id', $cartid)->count();
                $total = $usercart ->total;
            }else{
                $counts = 0;
                $total = 0;
            }
           
        }else{
          
           
          
            $counts = 0;
            $total = 0;
            

            }
            return view('pages.product', compact('products', 'counts', 'total','kategori','productcount'));
    }

    public function show($id){
        $products = Produk::find($id);
        if(Auth::user()){
            $user = Auth::id();
            $usercart =Cart::where('user_id', $user)->first();
            if($usercart){
                $cartid =$usercart ->id;
                $counts = CartDetail::where('cart_id', $cartid)->count();
                $total = $usercart ->total;
            }else{
                $counts = 0;
                $total = 0;
            }
           
        }else{
          
           
          
            $counts = 0;
            $total = 0;
            

            }
            return view('pages.detail', compact('products', 'counts', 'total'));
        
    }

}
