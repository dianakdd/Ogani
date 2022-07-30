<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profile';
    protected $fillable = [
        'alamat', 'telepon', 'gender','umur','foto'
    ];
    public function user(){
        return $this->hasOne('App\User');
      }
}
