<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Ruang;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class RuangController extends Controller
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

    //method for redirect into ruang page
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('ruang')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '
							<div class="text-center">
								<div class="btn-group">
									<a href="' . route('ruang.edit', ['id' => $row->id]) . '" class="edit btn btn-success btn-sm"> Edit </a>
									<a href="' . route('ruang.destroy', ['id' => $row->id]) . '" class="btn btn-danger btn-sm"> Hapus </a>
								</div>
							</div>
							';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('ruang');
    }

    //method for redirect into create ruang page
    public function create()
    {
        $data['status'] = ['Tersedia', 'Penuh'];
        return view('ruangAdd', $data);
    }

    //method for store ruang data into database
    public function store(Request $request)
    {
        $ruang = new Ruang();
        $ruang->nama = $request->nama;
        $ruang->no = $request->no;
        $ruang->kelas = $request->kelas;
        $ruang->status = $request->status;
        $ruang->save();

        return redirect(route('ruang.index'))->with('message', 'Data Added Successfully');
    }

    //method for redirect into ruang edit page
    public function edit($id)
    {
        $data['status'] = ['Tersedia', 'Penuh'];
        $data['ruang'] = Ruang::find($id);

        return view('ruangEdit', $data);
    }

    //method for update ruang data into database
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $ruang = Ruang::find($id);
        $ruang->update($input);

        return redirect()->route('ruang.index')
            ->with('success', 'Ruang updated successfully');
    }

    public function destroy($id)
    {
        Ruang::where('id', $id)->delete();
        return redirect()->route('ruang.index')
            ->with('success', 'User deleted successfully');
    }
}
