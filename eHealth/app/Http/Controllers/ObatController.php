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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {
            $data = DB::table('obat')->get();
			return DataTables::of($data)
				->addIndexColumn()
				->addColumn('action', function($row){
					$btn = '
							<div class="text-center">
								<div class="btn-group">
									<a href="'.route('obat.edit', ['id' => $row->id]).'" class="edit btn btn-success btn-sm"> Edit </a>
									<a href="'.route('obat.destroy', ['id' => $row->id]).'" class="btn btn-danger btn-sm"> Hapus </a>
								</div>
							</div>
							';
					return $btn;
				})
				->rawColumns(['action']) 
				->make(true);
		}
        return view('obat');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('obatAdd');
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
    		'kategori' => '',
    		'stok' => '',
        ]);

    	$obat = new Obat();
    	$obat->nama = $request->nama;
    	$obat->kategori = $request->kategori;
    	$obat->stok = $request->stok;
    	$obat->save();

    	return redirect(route('obat.index'))->with('message','Data Added Successfully');
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
        $data['obat'] = Obat::find($id);
    
        return view('obatEdit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'nama' => '',
    		'kategori' => '',
    		'stok' => '',
        ]);
    
        $input = $request->all();

        $obat = Obat::find($id);
        $obat->update($input);
    
        return redirect()->route('obat.index')
                        ->with('success','Obat updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Obat::where('id', $id)->delete();
            return redirect()->route('obat.index')
            ->with('success','User deleted successfully');
    }
}
