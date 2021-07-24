<?php

namespace App\Http\Controllers;

use App\Dokter;
use App\User;
use App\KartuKesehatan;
use App\Obat;
use App\Pasien;
use App\RekamMedis;
use App\Ruang;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    //method to redirect into home page
    public function index()
    {
        $data['dokter'] = Dokter::count();
        $data['kartuKes'] = KartuKesehatan::count();
        $data['obat'] = Obat::count();
        $data['pasien'] = Pasien::count();
        $data['rekamMedis'] = RekamMedis::count();
        $data['ruang'] = Ruang::count();
        $data['user'] = User::count();
        return view('home', $data);
    }
}
