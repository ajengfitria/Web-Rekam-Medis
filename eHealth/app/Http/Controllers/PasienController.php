<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pasien;
use App\KartuKesehatan;
use DataTables;
use DB;
use Hash;

class PasienController extends Controller
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
            $data = DB::table('pasien')->get();
			return Datatables::of($data)
				->addIndexColumn()
				->addColumn('action', function($row){
					$btn = '
							<div class="text-center">
								<div class="btn-group">
									<a href="'.route('pasien.show', ['id' => $row->id]).'" class="edit btn btn-primary btn-sm"> Detail </a>
                                    <a href="'.route('pasien.edit', ['id' => $row->id]).'" class="edit btn btn-success btn-sm"> Edit </a>
									<a href="'.route('pasien.destroy', ['id' => $row->id]).'" class="btn btn-danger btn-sm"> Hapus </a>
								</div>
							</div>
							';
					return $btn;
				})
				->rawColumns(['action']) 
				->make(true);
		}
        return view('pasien');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['jenkel'] = ['Pria', 'Wanita'];
        $data['kartuKes'] = KartuKesehatan::all();
    
        return view('pasienAdd',$data);
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
        // $request->validate([
    	// 	'nama' => '',
    	// 	'jenkel' => '',
    	// 	'alamat' => '',
    	// 	'pekerjaan' => '',
    	// 	'telp' => '',
    	// 	'nik' => '',
    	// 	'tgl_lahir' => '',
    	// 	'id_kartu' => '',
    	// 	'no_kartu' => '',
        // ]);

    	// $pasien = new Pasien();
    	// $pasien->nama = $request->nama;
    	// $pasien->jenkel = $request->jenkel;
    	// $pasien->alamat = $request->alamat;
    	// $pasien->pekerjaan = $request->pekerjaan;
    	// $pasien->telp = $request->telp;
    	// $pasien->nik = $request->nik;
    	// $pasien->tgl_lahir = $request->tgl_lahir;
    	// $pasien->id_kartu = $request->id_kartu;
    	// $pasien->no_kartu = $request->no_kartu;
    	// $pasien->save();

        $this->validate($request, [
            'nama' => '',
    		'jenkel' => '',
    		'alamat' => '',
    		'pekerjaan' => '',
    		'telp' => '',
    		'nik' => '',
    		'tgl_lahir' => '',
    		'id_kartu' => '',
    		'no_kartu' => '',
        ]);
    
        $input = $request->all();

        $pasien = Pasien::create($input);

    	return redirect(route('pasien.index'))->with('message','Data Added Successfully');
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
        $data['pasien'] = Pasien::find($id);
        $data['jenkel'] = ['Pria', 'Wanita'];
        $data['kartuKes'] = KartuKesehatan::all();
    
        return view('pasienEdit',$data);
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
    		'jenkel' => '',
    		'alamat' => '',
    		'pekerjaan' => '',
    		'telp' => '',
    		'nik' => '',
    		'tgl_lahir' => '',
    		'id_kartu' => '',
    		'no_kartu' => '',
        ]);
    
        $input = $request->all();

        $pasien = Pasien::find($id);
        $pasien->update($input);
    
        return redirect()->route('pasien.index')
                        ->with('success','pasien updated successfully');
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
        Pasien::where('id', $id)->delete();
            return redirect()->route('pasien.index')
            ->with('success','Pasien deleted successfully');
    }
}
