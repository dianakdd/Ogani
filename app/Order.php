<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    protected $fillable = ['tanggal', 'payment', 'bank', 'noRek', 'totalHrg', 'alamat', 'user_id'];
}
