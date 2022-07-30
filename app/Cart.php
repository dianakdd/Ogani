<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = "cart";
    protected $fillable = ['total', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    
}
