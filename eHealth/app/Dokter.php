<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    //
    protected $table = 'dokter';

    protected $fillable = [
        'nama', 'jenkel', 'alamat', 'telp', 'email', 'id_user', 'spesialis',
    ];
}
