<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    //
    protected $table = 'pasien';

    protected $fillable = [
        'nama', 'jenkel', 'alamat', 'pekerjaan', 'telp', 'nik', 'tgl_lahir', 'id_kartu', 'no_kartu'
    ];
}
