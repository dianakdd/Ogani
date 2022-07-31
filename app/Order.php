<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    protected $fillable = ['tanggal', 'pengiriman', 'bank', 'noRek', 'totalHrg', 'alamat', 'user_id'];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
