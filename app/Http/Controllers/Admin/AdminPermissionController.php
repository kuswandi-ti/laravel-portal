<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\Admin\AdminPermissionStoreRequest;
use App\Http\Requests\Admin\AdminPermissionUpdateRequest;

class AdminPermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.permission.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.permission.create');
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

        return redirect()->route('admin.permission.index')->with('success', __('admin.Created permission successfully'));
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
        return view('admin.permission.edit', compact('permission'));
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

        return redirect()->route('admin.permission.index')->with('success', __('admin.Updated permission successfully'));
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
                'message' => __('admin.Deleted permission successfully')
            ]);
        } catch (\Throwable $th) {
            return response([
                'status' => 'error',
                'message' => __('admin.Deleted permission is error')
            ]);
        }
    }

    public function data(Request $request)
    {
        $query = Permission::where('guard_name', '!=', getGuardNameUser())
            ->orderBy('guard_name', 'ASC')
            ->orderBy('name', 'ASC')
            ->get();

        return datatables($query)
            ->addIndexColumn()
            ->editColumn('guard_name', function ($query) {
                $badge = $query->guard_name == getGuardNameAdmin() ? 'danger' : 'dark';
                return '<div class="badge badge-' . $badge . '">' . $query->guard_name . '</div>';
            })
            ->addColumn('action', function ($query) {
                return '
                    <a href="' . route('admin.permission.edit', $query->id) . '" class="btn btn-primary btn-sm">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="' . route('admin.permission.destroy', $query->id) . '" class="btn btn-danger btn-sm delete_item">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                ';
            })
            ->rawColumns(['action'])
            ->escapeColumns([])
            ->make(true);
    }
}
