<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Administrator extends Model
{
    //
    protected $table = 'administrator';

    protected $fillable = [
        'nama', 'jenkel', 'alamat', 'telp', 'email', 'id_user',
    ];
}
