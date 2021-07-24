<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\KartuKesehatan;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class KartuKesehatanController extends Controller
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

    //method to redirect into dokter page
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {
            $data = DB::table('kartu_kes')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '
							<div class="text-center">
								<div class="btn-group">
									<a href="' . route('kartuKes.edit', ['id' => $row->id]) . '" class="edit btn btn-success btn-sm"> Edit </a>
									<a href="' . route('kartuKes.destroy', ['id' => $row->id]) . '" class="btn btn-danger btn-sm"> Hapus </a>
								</div>
							</div>
							';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('kartu_kesehatan.kartuKes');
    }

    //method to redirect into create page
    public function create()
    {
        return view('kartu_kesehatan.kartuKesAdd');
    }

    //method for store data into database
    public function store(Request $request)
    {
        $kartuKes = new KartuKesehatan();
        $kartuKes->nama = $request->nama;
        $kartuKes->jenis = $request->jenis;
        $kartuKes->kelas = $request->kelas;
        $kartuKes->save();

        return redirect(route('kartuKes.index'))->with('message', 'Data Added Successfully');
    }


    //method for redirect into edit page
    public function edit($id)
    {
        $data['kartuKes'] = KartuKesehatan::find($id);

        return view('kartu_kesehatan.kartuKesEdit', $data);
    }

    //method for update data into database
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => '',
            'jenis' => '',
            'kelas' => '',
        ]);

        $input = $request->all();

        $kartuKes = KartuKesehatan::find($id);
        $kartuKes->update($input);

        return redirect()->route('kartuKes.index')
            ->with('success', 'Kartu Kesehatan updated successfully');
    }

    //method for delete data from database
    public function destroy($id)
    {
        //
        KartuKesehatan::find($id)->delete();
        return redirect()->route('kartuKes.index')
            ->with('success', 'User deleted successfully');
    }
}
