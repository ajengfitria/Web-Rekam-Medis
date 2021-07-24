<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Obat;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ObatController extends Controller
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

    //method for redirect into obat page
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {
            $data = DB::table('obat')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '
							<div class="text-center">
								<div class="btn-group">
									<a href="' . route('obat.edit', ['id' => $row->id]) . '" class="edit btn btn-success btn-sm"> Edit </a>
									<a href="' . route('obat.destroy', ['id' => $row->id]) . '" class="btn btn-danger btn-sm"> Hapus </a>
								</div>
							</div>
							';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('obat.obat');
    }

    //method for redirect into create obat page
    public function create()
    {
        return view('obat.obatAdd');
    }

    //method for store obat data into database
    public function store(Request $request)
    {
        $obat = new Obat();
        $obat->nama = $request->nama;
        $obat->kategori = $request->kategori;
        $obat->stok = $request->stok;
        $obat->save();

        return redirect(route('obat.index'))->with('message', 'Data Added Successfully');
    }

    //method for redirect into edit obat page
    public function edit($id)
    {
        $data['obat'] = Obat::find($id);

        return view('obat.obatEdit', $data);
    }

    //method for update obat data into database
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $obat = Obat::find($id);
        $obat->update($input);

        return redirect()->route('obat.index')
            ->with('success', 'Obat updated successfully');
    }

    //method for delete obat data from database
    public function destroy($id)
    {
        Obat::where('id', $id)->delete();
        return redirect()->route('obat.index')
            ->with('success', 'User deleted successfully');
    }
}
