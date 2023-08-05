<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\AdminPermissionStoreRequest;
use App\Http\Requests\AdminPermissionUpdateRequest;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::orderBy('name', 'ASC')->get();
        return view('backend.permission.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminPermissionStoreRequest $request)
    {
        $permission = new Permission();

        $permission->name = $request->permission_name;
        $permission->guard_name = $request->guard_name;
        $permission->group_name = $request->group_name;
        $permission->save();

        return redirect()->route('backend.permission.index')->with('success', __('Created permission successfully'));
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
        $permission = Permission::findOrFail($id);
        return view('backend.permission.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminPermissionUpdateRequest $request, string $id)
    {
        $permission = Permission::findOrFail($id);

        $permission->name = $request->permission_name;
        $permission->guard_name = $request->guard_name;
        $permission->group_name = $request->group_name;
        $permission->save();

        return redirect()->route('backend.permission.index')->with('success', __('Updated permission successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $permission = Permission::findOrFail($id);
            $permission->delete();
            return response([
                'status' => 'success',
                'message' => __('Deleted permission successfully')
            ]);
        } catch (\Throwable $th) {
            return response([
                'status' => 'error',
                'message' => __('Deleted permission is error')
            ]);
        }
    }
}
