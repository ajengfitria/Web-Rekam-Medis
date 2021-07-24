<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\RekamMedis;

$factory->define(RekamMedis::class, function (Faker $faker) {
    return [
        'id_pasien' => 1,
        'id_dokter' => 2,
        'tgl_rekam' => now(),
        'jenis_pelayanan' => 'Konsultasi',
        'keluhan' => 'Sakit Perut',
        'diagnosa' => 'Asam lambung',
        'tindakan' => 'Pemberian obat',
    ];
});
