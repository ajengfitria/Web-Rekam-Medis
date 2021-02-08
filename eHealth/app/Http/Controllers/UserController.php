<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Dokter;
use App\Administrator;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use DataTables;

class UserController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:user-list');
         $this->middleware('permission:user-create', ['only' => ['create','store']]);
         $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
			$data = User::all();
			return Datatables::of($data)
				->addIndexColumn()
				->addColumn('action', function($row){ 
                    if($row->id != auth()->user()->id){
                        $btn = '
							<div class="text-center">
								<div class="btn-group">
									<a href="'.route('users.edit', ['id' => $row->id]).'" class="edit btn btn-success btn-sm"> Edit </a>
									<a href="'.route('users.destroy', ['id' => $row->id]).'" class="btn btn-danger btn-sm" disabled> Hapus </a>
								</div>
							</div>
							';
                    }else{
					$btn = '
							<div class="text-center">
								<div class="btn-group">
									<a href="'.route('users.edit', ['id' => $row->id]).'" class="edit btn btn-success btn-sm disabled"> Edit </a>
									<a href="'.route('users.destroy', ['id' => $row->id]).'" class="btn btn-danger btn-sm disabled"> Hapus </a>
								</div>
							</div>
							';
                    }
					return $btn;
				})
                ->addColumn('roles', function($row){
                    $role = $row->getRoleNames(); 
                    if ($role == '["Admin"]') {
                        $btnRole = '<span class="badge badge-primary">Admin</span>';
                        return $btnRole;
                    } else {
                        $btnRole = '<span class="badge badge-success">User</span>';
                        return $btnRole;
                    }
                })
				->rawColumns(['action','roles']) 
				->make(true);
		}
        return view('users');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['role'] = Role::all();
        return view('usersAdd',$data);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        $input['password'] = Hash::make($input['username']);
    
        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        $roles = $request->input('roles');

        $userDt = User::select('id')->orderByDesc('id')->limit(1)->get();
        $userID = $userDt[0];


        switch ($roles) {
            case 'Dokter':
                $this->validate($request, [
                    'name' => '',
                    'nama' => '',
                    'id_user' => ''
                ]);
            
                $input = $request->all();
                $input['nama'] = $request->input('name');
                $input['id_user'] = $userID['id'];
            
                $user = Dokter::create($input);
                break;

            case 'Admin':
                $this->validate($request, [
                    'name' => '',
                    'nama' => '',
                    'id_user' => ''
                ]);
            
                $input = $request->all();
                $input['nama'] = $request->input('name');
                $input['id_user'] = $userID['id'];
            
                $user = Administrator::create($input);
                break;
            
            default:
                # code...
                break;
        }
    
        return redirect()->route('users.index');
        //                 ->with('success','User created successfully');
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['role'] = Role::all();
        $data['user'] = User::find($id);
    
        return view('usersEdit',$data);
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
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'roles' => 'required'
        ]);
    
        $input = $request->all();

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('roles'));

        Dokter::where('id_user', $id)->delete();
        Administrator::where('id_user', $id)->delete();

        $roles = $request->input('roles');


        switch ($roles) {
            case 'Dokter':
                $this->validate($request, [
                    'name' => '',
                    'nama' => '',
                    'id_user' => ''
                ]);
            
                $input = $request->all();
                $input['nama'] = $request->input('name');
                $input['id_user'] = $id;
            
                $user = Dokter::create($input);
                break;

            case 'Admin':
                $this->validate($request, [
                    'name' => '',
                    'nama' => '',
                    'id_user' => ''
                ]);
            
                $input = $request->all();
                $input['nama'] = $request->input('name');
                $input['id_user'] = $id;
            
                $user = Administrator::create($input);
                break;
            
            default:
                # code...
                break;
        }
    
        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }
    
    
    public function destroy($id)
    {
        User::find($id)->delete();
        Dokter::where('id_user', $id)->delete();
        Administrator::where('id_user', $id)->delete();
            return redirect()->route('users.index')
            ->with('success','User deleted successfully');
    }
}
