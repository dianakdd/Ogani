<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = "produk";

    protected $fillable = ['name', 'deskripsi', 'gambar', 'harga', 'stok', 'kategori_id'];

    public function kategori()
    {
        return $this->belongsTo('App\Kategori');
    }
}
