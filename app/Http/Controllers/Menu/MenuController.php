<?php

namespace App\Http\Controllers\Menu;

use App\Http\Controllers\Controller;
use App\Models\MenuList;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\TryCatch;

class MenuController extends Controller
{
 
    public $obj;
    function __construct()
    {
        $this->obj = "Menu";
        $this->middleware('permission:menu-list',['only' => ['index,show']]);
        $this->middleware('permission:menu-create',['only' => ['store']]);
        $this->middleware('permission:menu-update',['only' => ['update']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $data['menulist']       = MenuList::all();

            return view('pages.menu.index',$data);
        } catch (\Throwable $th) {
            session()->put('notification', ['message'=>$th->getMessage(), 'type'=>'error']);

            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        try {
            $data['menuparent']   = MenuList::whereNull('parent_id')->get();

            return view('pages.menu.create',$data);

        } catch (\Throwable $th) {

            session()->put('notification', ['message'=>$th->getMessage(), 'type'=>'error']);

            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'title',
            'link',
        ]);

        $validation = Validator::make($data,[
            'title' => 'required|unique:menu_list|min:3',
            'link'  => 'required|unique:menu_list|min:3'
        ]);

        if($validation->fails()){
            return redirect()->back()
                        ->withErrors($validation)
                        ->withInput();
        }

        MenuList::create($request->only([
            'link',
            'title',
            'parent_id',
            'level',
            'sequence',
        ]));

        session()->put('respon_msg', ['msg'=>'Add '.$this->obj.', success', 'code'=>'success']);
        return redirect(route('managemenulist.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $data['menu'] = MenuList::find($id);
            $data['status'] = Status::all();
            $data['menuparent']   = MenuList::whereNull('parent_id')->get();

            return view('pages.menu.show',$data);
        } catch (\Throwable $th) {
            
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $data['menu'] = MenuList::find($id);
            $data['statuses'] = Status::all();
            $data['menuparent']   = MenuList::whereNull('parent_id')->get();

            return view('pages.menu.edit',$data);
        } catch (\Throwable $th) {

            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {

            $menu = MenuList::find($id);

            if ($menu == null){
                
                session()->put('notification', ['message'=>'Data Not Found', 'type'=>'error']);
                return redirect()->back();
            }

            $menu->update($request->only([
                'link',
                'title',
                'parent_id',
                'level',
                'sequence',
                'status_id'
            ]));

            session()->put('notification', ['message'=>'Success Update Data', 'type'=>'success']);
            return redirect(route('managemenulist.index'));

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
