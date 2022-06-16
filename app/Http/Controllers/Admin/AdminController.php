<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;

use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Dashboard\Admin\StoreAdminRequst;
use App\Http\Requests\Dashboard\Admin\UpdateAdminRequst;

class AdminController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['superadmin.prevent.update'])->only('edit','update','destroy');
        $this->middleware('permission:index Admin,admin')->only('index');
        $this->middleware('permission:store Admin,admin')->only('store','create');
        $this->middleware('permission:update Admin,admin')->only('update','edit');
        $this->middleware('permission:destroy Admin,admin')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::all();
      
    
        return view('admin.admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::whereNotIn('name', ['Super Admin'])->get();
        return view('admin.admins.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdminRequst $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'email_verified_at' => $request->email_verified_at ? date('Y-m-d H:i:s') : NULL,
        ];
        DB::beginTransaction();
        try {
            $admin = Admin::create($data);
            $admin->syncRoles($request->role_id);
            if ($request->hasFile('image')) {
                $admin->addMediaFromRequest('image')->toMediaCollection('admins'); // store new image
            }
            DB::commit();

            if ($request->create == 'create') {
                return redirect()->route('admins.index')->with(['success' => 'تمت عمليه الانشاء بنجاح']);
            } elseif ($request->create == 'return') {
                return redirect()->back()->with(['success' => 'تمت عمليه الانشاء بنجاح']);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            if ($request->create == 'create') {
                return redirect()->route('admins.index')->with(['error' => 'فشلت العمليه']);
            } elseif ($request->create == 'return') {
                return redirect()->back()->with(['error' => 'فشلت العمليه']);
            }
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        $roles = Role::all();
        // dd($admin->password);
        return view('admin.admins.edit', compact('admin', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminRequst $request, Admin $admin)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'email_verified_at' => $request->email_verified_at ? date('Y-m-d H:i:s') : NULL,
        ];
        DB::beginTransaction();
        try {
            $admin->update($data);
            $admin->syncRoles($request->role_id);
            if ($request->hasFile('image')) {
                if (isset($admin->getMedia('admins')[0])) {
                    $admin->getMedia('admins')[0]->delete();
                }
                $admin->addMediaFromRequest('image')->toMediaCollection('admins'); // store new image
            }
            DB::commit();

            return redirect()->route('admins.index')->with(['success' => 'تمت عمليه الانشاء بنجاح']);
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->route('admins.index')->with(['error' => 'فشلت العمليه']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();
        return redirect()->route('admins.index')->with(['success' => 'تمت العمليه بنجاح']);
    }
}
