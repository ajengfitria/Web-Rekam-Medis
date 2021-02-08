<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Ruang;
use DataTables;
use DB;
use Hash;

class RuangController extends Controller
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
            $data = DB::table('ruang')->get();
			return Datatables::of($data)
				->addIndexColumn()
				->addColumn('action', function($row){
					$btn = '
							<div class="text-center">
								<div class="btn-group">
									<a href="'.route('ruang.edit', ['id' => $row->id]).'" class="edit btn btn-success btn-sm"> Edit </a>
									<a href="'.route('ruang.destroy', ['id' => $row->id]).'" class="btn btn-danger btn-sm"> Hapus </a>
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['status'] = ['Tersedia','Penuh'];
        return view('ruangAdd',$data);
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
    		'no' => '',
    		'kelas' => '',
            'status' => '',
        ]);

    	$ruang = new Ruang();
    	$ruang->nama = $request->nama;
    	$ruang->no = $request->no;
    	$ruang->kelas = $request->kelas;
    	$ruang->status = $request->status;
    	$ruang->save();

    	return redirect(route('ruang.index'))->with('message','Data Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data['status'] = ['Tersedia','Penuh'];
        $data['ruang'] = Ruang::find($id);
    
        return view('ruangEdit',$data);
    }

    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'nama' => '',
    		'no' => '',
    		'kelas' => '',
            'status' => '',
        ]);
    
        $input = $request->all();

        $ruang = Ruang::find($id);
        $ruang->update($input);
    
        return redirect()->route('ruang.index')
                        ->with('success','Ruang updated successfully');
    }

    public function destroy($id)
    {
        //
        Ruang::where('id', $id)->delete();
            return redirect()->route('ruang.index')
            ->with('success','User deleted successfully');
    }
}
