<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dokter;
use App\User;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class DokterController extends Controller
{
    // function __construct()
    // {
    //     $this->middleware('permission:dokter-all', ['only' => ['index','store','create','edit','destroy']]);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {
            $data = DB::table('dokter')->get();
			return DataTables::of($data)
				->addIndexColumn()
				->addColumn('action', function($row){
					$btn = '
							<div class="text-center">
								<div class="btn-group">
									
									<a href="'.route('dokter.edit', ['id' => $row->id]).'" class="btn btn-success btn-sm"> Edit </a>
									<a href="'.route('dokter.destroy', ['id' => $row->id]).'" class="btn btn-danger btn-sm"> Hapus </a>
								</div>
							</div>
							';
					return $btn;
				})
				->rawColumns(['action']) 
				->make(true);
		}
        return view('dokter');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $data['dokter'] = Dokter::find($id);
        $data['jenkel'] = ['Pria', 'Wanita'];
    
        return view('dokterEdit',$data);
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
    		'telp' => '',
    		'spesialis' => '',
        ]);
    
        $input = $request->all();

        $dokter = Dokter::find($id);
        $dokter->update($input);
    
        return redirect()->route('dokter.index')
                        ->with('success','dokter updated successfully');
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
        $userDt = Dokter::select('id_user')->where('id', $id)->limit(1)->get();
        $userId = $userDt[0];
        $userId = $userId['id_user'];
        User::find($userId)->delete();
        Dokter::where('id', $id)->delete();
            return redirect()->route('dokter.index')
            ->with('success','User deleted successfully');
    }
}
