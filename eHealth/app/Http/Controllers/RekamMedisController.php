<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\RekamMedis;
use App\Pasien;
use App\User;
use App\KartuKesehatan;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class RekamMedisController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //method for redirect into rekam medis page
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {
            $data = DB::table('rekam_medis')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '
							<div class="text-center">
								<div class="btn-group">
									<a href="' . route('rekamMedis.show', ['id' => $row->id]) . '" class="edit btn btn-primary btn-sm"> Detail </a>
									<a href="' . route('rekamMedis.edit', ['id' => $row->id]) . '" class="edit btn btn-success btn-sm"> Edit </a>
									<a href="' . route('rekamMedis.destroy', ['id' => $row->id]) . '" class="btn btn-danger btn-sm"> Hapus </a>
								</div>
							</div>
							';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('rekamMedis');
    }

    //method for redirect into create rekam medis page
    public function create()
    {
        $data['pasien'] = Pasien::all();

        return view('rekamMedisAdd', $data);
    }

    //method for store rekam medis data into database
    public function store(Request $request)
    {
        $rekamMedis = new RekamMedis();
        $rekamMedis->id_pasien = $request->id_pasien;
        $rekamMedis->id_dokter = auth()->user()->id;
        $rekamMedis->jenis_pelayanan = $request->jenis_pelayanan;
        $rekamMedis->keluhan = $request->keluhan;
        $rekamMedis->diagnosa = $request->diagnosa;
        $rekamMedis->tindakan = $request->tindakan;
        $rekamMedis->save();

        return redirect(route('rekamMedis.index'))->with('message', 'Data Added Successfully');
    }

    //method for redirect into rekam medis detail page
    public function show($id)
    {
        $data['rekamMedis'] = RekamMedis::find($id);

        $pasienGetId = RekamMedis::select('id_pasien')->where('id', $id)->limit(1)->get();
        $pasienId = $pasienGetId[0];
        $pasienId = $pasienId['id_pasien'];
        $data['pasien'] = Pasien::find($pasienId);

        $dokterGetId = RekamMedis::select('id_dokter')->where('id', $id)->limit(1)->get();
        $dokterId = $dokterGetId[0];
        $dokterId = $dokterId['id_dokter'];
        $data['dokter'] = User::find($dokterId);

        $kartuGetId = Pasien::select('id_kartu')->where('id', $pasienId)->limit(1)->get();
        $kartuId = $kartuGetId[0];
        $kartuId = $kartuId['id_kartu'];
        $data['kartuKes'] = KartuKesehatan::find($kartuId);

        return view('rekamMedisDetail', $data);
    }

    //method for redirect into rekam medis edit page
    public function edit($id)
    {
        $data['rekamMedis'] = RekamMedis::find($id);
        $data['pasien'] = Pasien::all();

        return view('rekamMedisEdit', $data);
    }

    //method for update rekam medis data into database
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $rekamMedis = RekamMedis::find($id);
        $rekamMedis->update($input);

        return redirect()->route('rekamMedis.index')
            ->with('success', 'rekamMedis updated successfully');
    }

    //method for delete rekam medis data from database
    public function destroy($id)
    {
        RekamMedis::where('id', $id)->delete();
        return redirect()->route('rekamMedis.index')
            ->with('success', 'Rekam Medis deleted successfully');
    }
}
