<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    //
    protected $table = 'rekam_medis';

    protected $fillable = [
        'id_pasien', 'id_dokter', 'jenis_pelayanan', 'keluhan', 'diagnosa', 'tindakan', 
    ];
}
