<?php

namespace App\Http\Controllers\Backend;

use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\AdminRoleStoreRequest;
use App\Http\Requests\AdminRoleUpdateRequest;

class AdminRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::orderBy('name', 'ASC')->get();
        return view('backend.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all()->groupBy('group_name');
        return view('backend.role.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRoleStoreRequest $request)
    {
        $role = Role::create([
            'guard_name' => $request->guard_name,
            'name' => $request->role_name
        ]);
        $role->syncPermissions($request->permissions);

        return redirect()->route('backend.role.index')->with('success', __('Create role & permissions successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all()->groupBy('group_name');
        $roles_permissions = $role->permissions;
        $roles_permissions = $roles_permissions->pluck('name')->toArray();

        return view('backend.role.edit', compact('role', 'permissions', 'roles_permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminRoleUpdateRequest $request, string $id)
    {
        $role = Role::findOrFail($id);
        $role->update([
            'guard_name' => $role->guard_name == 'admin' ? 'admin' : $request->guard_name,
            'name' => $request->role_name
        ]);
        $role->syncPermissions($request->permissions);

        return redirect()->route('backend.role.index')->with('success', __('Updated role & permissions successfully'));
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
                    'message' => __('Can\'t delete this role')
                ]);
            }

            $role->delete();

            return response([
                'status' => 'success',
                'message' => __('Deleted role successfully')
            ]);
        } catch (\Throwable $th) {
            return response([
                'status' => 'error',
                'message' => __('Deleted role is error')
            ]);
        }
    }
}
