<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = "cart";
    protected $fillable = ['jml', 'harga', 'cart_id', 'produk_id'];

    public function produk()
    {
        return $this->belongsTo('App\Produk');
    }

    public function cart()
    {
        return $this->belongsTo('App\Cart');
    }
}
