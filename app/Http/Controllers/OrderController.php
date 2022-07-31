<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;
class OrderController extends Controller
{
    public function index()
    {
        $order = Order::all();
        // $username = User::find($order->user_id)->name;

      
      
        return view('admin.order', compact('order'));
    }
}
