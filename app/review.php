<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    protected $table = 'review';
    protected $fillable = [
        'nama_review', 'produk_id', 'user_id','review','skor'
    ];
}
