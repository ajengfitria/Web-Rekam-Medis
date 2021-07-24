<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pasien;
use App\KartuKesehatan;
use App\Dokter;
use App\RekamMedis;
use App\User;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class PasienController extends Controller
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
    
    //method for redirect into pasien page
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {
            $data = DB::table('pasien')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '
							<div class="text-center">
								<div class="btn-group">
									<a href="' . route('pasien.show', ['id' => $row->id]) . '" class="btn btn-primary btn-sm"> Detail </a>
                                    <a href="' . route('pasien.edit', ['id' => $row->id]) . '" class="btn btn-success btn-sm"> Edit </a>
									<a href="' . route('pasien.destroy', ['id' => $row->id]) . '" class="btn btn-danger btn-sm"> Hapus </a>
								</div>
							</div>
							';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pasien.pasien');
    }

    //method for redirect into create pasien page
    public function create()
    {
        //
        $data['jenkel'] = ['Pria', 'Wanita'];
        $data['kartuKes'] = KartuKesehatan::all();

        return view('pasien.pasienAdd', $data);
    }

    //method for store pasien data into database
    public function store(Request $request)
    {
        $input = $request->all();

        Pasien::create($input);

        return redirect(route('pasien.index'))->with('message', 'Data Added Successfully');
    }

    //method for redirect into detail pasien page
    public function show(Request $request, $id)
    {
        $data['pasien'] = Pasien::find($id);

        $pasienGetId = Pasien::select('id_kartu')->where('id', $id)->limit(1)->get();
        $pasienIdKartu = $pasienGetId[0];
        $pasienIdKartu = $pasienIdKartu['id_kartu'];
        $data['kartuKes'] = KartuKesehatan::find($pasienIdKartu);

        $rekamMedisGetId = RekamMedis::select('id_dokter')->where('id_pasien', $id)->limit(1)->get();
        $dokterId = $rekamMedisGetId[0];
        $dokterId = $dokterId['id'];
        $data['dokter'] = User::find($dokterId);
        User::select('name')->where('id', $dokterId)->get();


        if ($request->ajax()) {
            $data = RekamMedis::where('id_pasien', $id)->get();
            return Datatables::of($data)
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


        return view('pasien.pasienDetail', $data);
    }

    //method for redirect into pasien edit page
    public function edit($id)
    {
        $data['pasien'] = Pasien::find($id);
        $data['jenkel'] = ['Pria', 'Wanita'];
        $data['kartuKes'] = KartuKesehatan::all();

        return view('pasien.pasienEdit', $data);
    }

    //method for update pasien data into database
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $pasien = Pasien::find($id);
        $pasien->update($input);

        return redirect()->route('pasien.index')
            ->with('success', 'pasien updated successfully');
    }

    //method for delete pasien data from database
    public function destroy($id)
    {
        Pasien::where('id', $id)->delete();
        RekamMedis::where('id_pasien', $id)->delete();
        return redirect()->route('pasien.index')
            ->with('success', 'Pasien deleted successfully');
    }
}
