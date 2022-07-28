<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profile';
    protected $fillable = [
        'alamat', 'telepon', 'gender','tglLahir','foto','user_id'
    ];
}
