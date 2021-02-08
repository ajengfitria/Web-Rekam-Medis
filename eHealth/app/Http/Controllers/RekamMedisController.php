<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\RekamMedis;
use App\Pasien;
use App\Dokter;
use App\User;
use App\KartuKesehatan;
use DataTables;
use DB;
use Hash;

class RekamMedisController extends Controller
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
            $data = DB::table('rekam_medis')->get();
			return Datatables::of($data)
				->addIndexColumn()
				->addColumn('action', function($row){
					$btn = '
							<div class="text-center">
								<div class="btn-group">
									<a href="'.route('rekamMedis.show', ['id' => $row->id]).'" class="edit btn btn-primary btn-sm"> Detail </a>
									<a href="'.route('rekamMedis.edit', ['id' => $row->id]).'" class="edit btn btn-success btn-sm"> Edit </a>
									<a href="'.route('rekamMedis.destroy', ['id' => $row->id]).'" class="btn btn-danger btn-sm"> Hapus </a>
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['pasien'] = Pasien::all();
    
        return view('rekamMedisAdd', $data);
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
    		'id_pasien' => '',
    		'id_dokter' => '',
    		'jenis_pelayanan' => '',
    		'keluhan' => '',
    		'diagnosa' => '',
    		'tindakan' => '',
        ]);

    	$rekamMedis = new RekamMedis();
    	$rekamMedis->id_pasien = $request->id_pasien;
    	$rekamMedis->id_dokter = auth()->user()->id;
    	$rekamMedis->jenis_pelayanan = $request->jenis_pelayanan;
    	$rekamMedis->keluhan = $request->keluhan;
    	$rekamMedis->diagnosa = $request->diagnosa;
    	$rekamMedis->tindakan = $request->tindakan;
    	$rekamMedis->save();

    	return redirect(route('rekamMedis.index'))->with('message','Data Added Successfully');
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
    
        return view('rekamMedisDetail',$data);
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
        $data['rekamMedis'] = RekamMedis::find($id);
        $data['pasien'] = Pasien::all();

        return view('rekamMedisEdit',$data);
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
            'id_pasien' => '',
    		'id_dokter' => '',
    		'jenis_pelayanan' => '',
    		'keluhan' => '',
    		'diagnosa' => '',
    		'tindakan' => '',
        ]);
    
        $input = $request->all();

        $rekamMedis = RekamMedis::find($id);
        $rekamMedis->update($input);
    
        return redirect()->route('rekamMedis.index')
                        ->with('success','rekamMedis updated successfully');
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
        RekamMedis::where('id', $id)->delete();
            return redirect()->route('rekamMedis.index')
            ->with('success','Rekam Medis deleted successfully');
    }
}
