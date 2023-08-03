<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleContorller extends Controller
{
    public $obj;

    public function __construct() {
        $this->obj = "Role";
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $roles = Role::orderBy('id','DESC')->get();

        return view('pages.role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rolePermissions    = Permission::get();

        return view('pages.role.create',compact('rolePermissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->only([
            'name',
            'permission'
        ]);

        $validation = Validator::make($data,[
            'name' => 'required|unique:roles,name',
            'permission' => 'required'
        ]);

        if($validation->fails()){
            return redirect()->back()
                        ->withErrors($validation)
                        ->withInput();
        }

        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));
        
        session()->put('notification', ['message'=>'Add '.$this->obj.', success', 'type'=>'success']);
        return redirect(route('managerole.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $role               = Role::find($id);
        $rolePermissions    = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
                            ->where("role_has_permissions.role_id",$id)
                            ->get();

        return view('pages.role.show',compact('role','rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role               = Role::find($id);
        $rolePermissions    = Permission::get();
        $userPermissions    = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
                                    ->pluck('role_has_permissions.permission_id')
                                    ->all();
        #dd($userPermissions);
        return view('pages.role.edit', compact('role','rolePermissions','userPermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $role = Role::find($id);
            $role->name = $request->input('name');
            $role->save();

            $role->syncPermissions($request->input('permission'));
            
            session()->put('notification', ['message'=>'Update '.$this->obj.', success', 'type'=>'success']);
            return redirect(route('managerole.index'));
        } catch (\Throwable $th) {

            session()->put('notification', ['message'=>$th->getMessage(), 'type'=>'error']);
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
