<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public $obj;


    function __construct()
    {
        $this->obj = "User";
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = DB::table('users as a')->leftJoin('model_has_roles as b', 'a.id', 'b.model_id')
            ->leftJoin('roles as r', 'r.id', 'b.role_id')
            ->select('a.*', 'r.name as rolename')
            ->get();

        return view('pages.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();

        return view('pages.user.create', compact(
            'roles'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->only([
                'name',
                'email',
                'password',
                'role',
            ]);

            $validation = Validator::make($data, [
                'name' => 'required|min:5',
                'email' => 'required|min:10',
                'password' => 'required|min:8'
            ]);

            if ($validation->fails()) {
                return redirect()->back()
                        ->withErrors($validation)
                        ->withInput();
            }

            DB::beginTransaction();

            $user = User::create([
                'name'      => $request->name,
                'email'     => $request->email,
                'password'  => bcrypt($request->password),
            ]);

            $user->assignRole($request->input('role'));

            DB::commit();

            session()->put('respon_msg', ['msg' => 'Add ' . $this->obj . ', success', 'code' => 'success']);
            return to_route('manageuser.index');
        } catch (\Throwable $th) {
            DB::rollBack();

            session()->put('respon_msg', ['msg' => $th, 'code' => 'error']);
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
