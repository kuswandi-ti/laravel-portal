<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\Member\MemberRoleStoreRequest;
use App\Http\Requests\Member\MemberRoleUpdateRequest;

class MemberRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::where([
            ['guard_name', '!=', getGuardNameAdmin()],
            ['area_id', getLoggedUser()->area->id]
        ])->orderBy('name', 'ASC')->get();
        return view('member.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions_member = Permission::where('guard_name', getGuardNameLoggedUser())->get()->groupBy('group_name');
        $permissions_web = Permission::where('guard_name', 'web')->get()->groupBy('group_name');
        return view('member.role.create', compact('permissions_member', 'permissions_web'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MemberRoleStoreRequest $request)
    {
        $role = Role::create([
            'name' => $request->role_name,
            'guard_name' => $request->guard_name,
            'area_id' => getLoggedUser()->area->id,
        ]);
        $role->syncPermissions($request->permissions);

        return redirect()->route('member.role.index')->with('success', __('Create role & permissions successfully'));
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
        $role = Role::findOrFail($id);
        $permissions_member = Permission::where('guard_name', getGuardNameLoggedUser())->get()->groupBy('group_name');
        $permissions_web = Permission::where('guard_name', getGuardNameUser())->get()->groupBy('group_name');
        $roles_permissions = $role->permissions;
        $roles_permissions = $roles_permissions->pluck('name')->toArray();

        return view('member.role.edit', compact('role', 'permissions_member', 'permissions_web', 'roles_permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MemberRoleUpdateRequest $request, string $id)
    {
        $role = Role::findOrFail($id);
        $role->update([
            'name' => $request->role_name,
        ]);
        $role->syncPermissions($request->permissions);

        return redirect()->route('member.role.index')->with('success', __('Updated role & permissions successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $role = Role::findOrFail($id);

            if ($role->name == getGuardTextAdmin()) {
                return response([
                    'status' => 'error',
                    'message' => __('Cannot delete this role because role is ' . getGuardTextAdmin())
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
