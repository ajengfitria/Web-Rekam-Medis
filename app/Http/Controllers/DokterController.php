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
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    function __construct()
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
        if ($request->ajax()) {
            $data = DB::table('dokter')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '
							<div class="text-center">
								<div class="btn-group">
									
									<a href="' . route('dokter.edit', ['id' => $row->id]) . '" class="btn btn-success btn-sm"> Edit </a>
									<a href="' . route('dokter.destroy', ['id' => $row->id]) . '" class="btn btn-danger btn-sm"> Hapus </a>
								</div>
							</div>
							';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('users.dokter');
    }

    
    //method to redirect into edit page
    public function edit($id)
    {
        $data['dokter'] = Dokter::find($id);
        $data['jenkel'] = ['Pria', 'Wanita'];

        return view('userdokts.erEdit', $data);
    }

    //method to update data into database
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $dokter = Dokter::find($id);
        $dokter->update($input);

        return redirect()->route('dokter.index')
            ->with('success', 'dokter updated successfully');
    }

    //method to delete data in database
    public function destroy($id)
    {
        $userDt = Dokter::select('id_user')->where('id', $id)->limit(1)->get();
        $userId = $userDt[0];
        $userId = $userId['id_user'];
        User::find($userId)->delete();
        Dokter::where('id', $id)->delete();
        return redirect()->route('dokter.index')
            ->with('success', 'User deleted successfully');
    }
}
