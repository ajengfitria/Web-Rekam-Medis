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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {
            $data = DB::table('kartu_kes')->get();
			return DataTables::of($data)
				->addIndexColumn()
				->addColumn('action', function($row){
					$btn = '
							<div class="text-center">
								<div class="btn-group">
									<a href="'.route('kartuKes.edit', ['id' => $row->id]).'" class="edit btn btn-success btn-sm"> Edit </a>
									<a href="'.route('kartuKes.destroy', ['id' => $row->id]).'" class="btn btn-danger btn-sm"> Hapus </a>
								</div>
							</div>
							';
					return $btn;
				})
				->rawColumns(['action']) 
				->make(true);
		}
        return view('kartuKes');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('kartuKesAdd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
    		'nama' => '',
    		'jenis' => '',
    		'kelas' => '',
        ]);

    	$kartuKes = new KartuKesehatan();
    	$kartuKes->nama = $request->nama;
    	$kartuKes->jenis = $request->jenis;
    	$kartuKes->kelas = $request->kelas;
    	$kartuKes->save();

    	return redirect(route('kartuKes.index'))->with('message','Data Added Successfully');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
        $data['kartuKes'] = KartuKesehatan::find($id);
    
        return view('kartuKesEdit',$data);
    }

    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'nama' => '',
    		'jenis' => '',
    		'kelas' => '',
        ]);
    
        $input = $request->all();

        $kartuKes = KartuKesehatan::find($id);
        $kartuKes->update($input);
    
        return redirect()->route('kartuKes.index')
                        ->with('success','Kartu Kesehatan updated successfully');
    }

    public function destroy($id)
    {
        //
        KartuKesehatan::find($id)->delete();
            return redirect()->route('kartuKes.index')
            ->with('success','User deleted successfully');
    }
}
