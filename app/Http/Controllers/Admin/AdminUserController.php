<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminUserStoreRequest;
use App\Http\Requests\Admin\AdminUserUpdateRequest;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = Admin::all();
        return view('admin.admin.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::orderBy('name', 'DESC')->pluck('name', 'name');
        return view('admin.admin.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminUserStoreRequest $request)
    {
        $admin = new Admin();

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->image = '/images/no_image_circle.png';
        $admin->status = 1;
        $admin->save();

        $admin->assignRole($request->role);

        return redirect()->route('admin.admin.index')->with('success', __('Created admin user successfully'));
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
        $admin = Admin::findOrFail($id);
        $roles = Role::orderBy('name', 'DESC')->pluck('name', 'name');
        $admin_role = $admin->roles->pluck('name', 'name')->all();

        return view('admin.admin.edit', compact('admin', 'roles', 'admin_role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminUserUpdateRequest $request, string $id)
    {
        $admin = Admin::findOrFail($id);
        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        $admin->syncRoles($request->role);

        return redirect()->route('admin.admin.index')->with('success', __('Updated admin user successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $admin = Admin::findOrFail($id);

            if ($admin->roles->first()->name == 'Super Admin') {
                return response([
                    'status' => 'error',
                    'message' => __('Can\'t delete this role')
                ]);
            }

            $admin->delete();

            return response([
                'status' => 'success',
                'message' => __('Deleted user admin successfully')
            ]);
        } catch (\Throwable $th) {
            return response([
                'status' => 'error',
                'message' => __('Deleted user admin is error')
            ]);
        }
    }
}
