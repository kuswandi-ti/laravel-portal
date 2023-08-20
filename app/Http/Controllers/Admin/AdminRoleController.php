<?php

namespace App\Http\Controllers\Admin;

use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\Admin\AdminRoleStoreRequest;
use App\Http\Requests\Admin\AdminRoleUpdateRequest;

class AdminRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::where('guard_name', '!=', 'web')->orderBy('name', 'ASC')->get();
        return view('admin.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions_admin = Permission::where('guard_name', 'admin')->get()->groupBy('group_name');
        $permissions_member = Permission::where('guard_name', 'member')->get()->groupBy('group_name');
        return view('admin.role.create', compact('permissions_admin', 'permissions_member'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRoleStoreRequest $request)
    {
        $role = Role::create([
            'name' => $request->role_name,
            'guard_name' => $request->guard_name,
        ]);
        $role->syncPermissions($request->permissions);

        return redirect()->route('admin.role.index')->with('success', __('admin.Create role & permissions successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::findOrFail($id);
        $permissions_admin = Permission::where('guard_name', 'admin')->get()->groupBy('group_name');
        $permissions_member = Permission::where('guard_name', 'member')->get()->groupBy('group_name');
        $roles_permissions = $role->permissions;
        $roles_permissions = $roles_permissions->pluck('name')->toArray();

        return view('admin.role.edit', compact('role', 'permissions_admin', 'permissions_member', 'roles_permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminRoleUpdateRequest $request, string $id)
    {
        $role = Role::findOrFail($id);
        $role->update([
            'name' => $request->role_name,
            'guard_name' => $request->guard_name,
        ]);
        $role->syncPermissions($request->permissions);

        return redirect()->route('admin.role.index')->with('success', __('admin.Updated role & permissions successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $role = Role::findOrFail($id);

            if ($role->name == 'Super Admin') {
                return response([
                    'status' => 'error',
                    'message' => __('admin.Can\'t delete this role')
                ]);
            }

            $role->delete();

            return response([
                'status' => 'success',
                'message' => __('admin.Deleted role successfully')
            ]);
        } catch (\Throwable $th) {
            return response([
                'status' => 'error',
                'message' => __('admin.Deleted role is error')
            ]);
        }
    }
}
