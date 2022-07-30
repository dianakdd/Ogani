<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = "kategori";
    protected $fillable = ['name', 'produk_id'];

    public function produk()
    {
        return $this->hasMany(Produk::class);
    }
}
