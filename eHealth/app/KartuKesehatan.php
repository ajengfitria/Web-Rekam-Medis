<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KartuKesehatan extends Model
{
    //
    protected $table = 'kartu_kes';

    protected $fillable = [
        'nama', 'jenis', 'kelas', 
    ];
}
