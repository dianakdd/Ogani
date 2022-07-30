<?php

namespace App\Http\Controllers;

use App\Cart;
use App\CartDetail;
use App\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::user()){
            $user = Auth::id();
            $usercart =Cart::where('user_id', $user)->first();
            $products = Produk::paginate(4);
            if($usercart){
                $cartid =$usercart ->id;
                $counts = CartDetail::where('cart_id', $cartid)->count();
                $total = $usercart ->total;
            }else{
                $counts = 0;
                $total = 0;
            }
            return view('pages.index', compact('products', 'counts', 'total'));
        }else{
          
            $products = Produk::paginate(4);
          
            $counts = 0;
            $total = 0;
            return view('pages.index', compact('products', 'counts', 'total'));

            }
       
    }

}
