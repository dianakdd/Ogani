<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use App\OrderDetail;
use App\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $counts = Cart::count();
        $products = Produk::all();
        $carts = Cart::all();
        $total = Cart::sum('total');
        return view('cart.index', compact('counts', 'products', 'carts', 'total'));
    }

    public function create()
    {
        $counts = Cart::count();
        $products = Produk::all();
        $carts = Cart::all();
        $total = Cart::sum('total');

        return view('cart.add', compact('counts', 'products', 'carts', 'total'));
    }

    public function store(Request $request)
    {
        $cart = Cart::insert([
            'jml' => request('jml'),
            'harga' => 20000,
            'produk_id' => request('produk_id')
        ]);
        return redirect('/cart');
    }

    public function save($id)
    {
        $harga = Produk::find($id)->harga;
        $produk = Produk::find($id)->nama;
        $total = $harga * 1;
        $cart = Cart::insert([
            'jml' => 1,
            'harga' => $harga,
            'produk_id' => $id,
            'total' => $total
        ]);
        return redirect('/')->withSuccess($produk . ' berhasil ditambahkan ke cart!');;
    }

    public function edit($id)
    {
        $counts = Cart::count();
        $products = Produk::all();
        $carts = Cart::all();
        $total = Cart::sum('harga');
        $cart = Cart::find($id);
        return view('cart.edit', compact('counts', 'products', 'carts', 'total', 'cart'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'jml' => 'required',
        ]);
        $harga = Produk::find($request->produk_id)->harga;
        $total = $harga * $request->jml;
        $cart = Cart::where('id', $request->id)->update([
            'jml' => $request->jml,
            'harga' => $harga,
            'total' => $total
        ]);
        return redirect('/cart')->withSuccess('Product Berhasil Dirubah!');;
    }

    public function destroy($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return redirect('/cart');
    }

    public function checkout()
    {
        $counts = Cart::count();
        $products = Produk::all();
        $carts = Cart::all();
        $total = Cart::sum('total');
        return view('cart.checkout', compact('counts', 'products', 'carts', 'total'));
    }

    public function confirm(Request $request)
    {
        $carts = Cart::all();
        $order_id = now()->format('YmdHis');

        DB::beginTransaction();
        Order::insert([
            'tanggal' => now()->format('Y-m-d'),
            'payment' => $request->payment,
            'bank' => $request->bank,
            'noRek' => $request->noRek,
            'totalHrg' => Cart::sum('total'),
            'alamat' => $request->alamat,
            'user_id' => $request->user_id,
        ]);

        foreach ($carts as $cart) {
            OrderDetail::insert([
                'order_id' => 1,
                'produk_id' => $cart->produk_id,
                'jml' => $cart->jml,
                'harga' => $cart->harga,
                // 'total' => $cart->total
            ]);
            $cart->delete();
        }
        DB::commit();

        return redirect('/cart')->withSuccess('Pembelian Berhasil!');;
    }


    public function detail(Request $request)
    {
        if ($request->ajax()) {
            $harga = Produk::find($request->id);
            $id = $request->produk_id;
            $produk = Produk::where('id', 1)->first();
            $harga = $produk->harga;

            $msg = [
                'harga' => $harga,
            ];
            echo json_encode($msg);
        }
    }
}
