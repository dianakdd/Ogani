<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_detail';
    protected $fillable = ['order_id', 'produk_id', 'jml', 'harga', 'total'];
}
