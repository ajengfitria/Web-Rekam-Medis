<?php

namespace Tests\Feature\Http\Controllers;

use App\RekamMedis;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RekamMedisControllerTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;
    use DatabaseMigrations;

    /** test store rekam medis data
     *
     * @test
     */
    public function it_stores_data()
    {
        //Membuat objek user yang otomatis menambahkannya ke database.
        $user = factory(User::class)->create();

        //Membuat objek rekam medis yang otomatis menambahkannya ke database.
        $rekam_medis = factory(RekamMedis::class)->create();

        //Acting as berfungsi sebagai autentikasi, jika kita menghilangkannya maka akan error.
        $response = $this->actingAs($user)
            //Hit post ke method store, fungsinya ya akan lari ke fungsi store.
            ->post(route('rekamMedis.store'), [
                //isi parameter sesuai kebutuhan request
                'id_pasien' => $rekam_medis->id_pasien,
                'id_dokter' => $rekam_medis->id_dokter,
                'tgl_rekam' => $rekam_medis->tgl_rekam,
                'jenis_pelayanan' => $rekam_medis->jenis_pelayanan,
                'keluhan' => $rekam_medis->keluhan,
                'tindakan' => $rekam_medis->tindakan,
                'diagnosa' => $rekam_medis->diagnosa,
            ]);

        //Status 200, yang berarti redirect status code.
        $response->assertStatus(200);

        //Setelah melakukan POST URL akan dialihkan ke URL rekam medis
        $response->assertRedirect(route('rekamMedis.index'));
    }
}
