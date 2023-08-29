<?php

namespace App\Http\Controllers\Admin;

use App\Models\Area;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\Admin\AdminRoleStoreRequest;
use App\Http\Requests\Admin\AdminRoleUpdateRequest;

class AdminRoleController extends Controller
{
    function __construct()
    {
        $this->middleware(['permission:role admin create,' . getGuardNameAdmin()])->only(['create', 'store']);
        $this->middleware(['permission:role admin delete,' . getGuardNameAdmin()])->only(['destroy']);
        $this->middleware(['permission:role admin index,' . getGuardNameAdmin()])->only(['index', 'show', 'data']);
        $this->middleware(['permission:role admin update,' . getGuardNameAdmin()])->only(['edit', 'update']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.role.index');
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
            'area_id' => getLoggedUserAreaId(),
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
        $permissions_admin = Permission::where('guard_name', getGuardNameAdmin())->get()->groupBy('group_name');
        $permissions_member = Permission::where('guard_name', getGuardNameMember())->get()->groupBy('group_name');
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
                    'message' => __('admin.Cannot delete this role')
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

    public function data(Request $request)
    {
        $query = Role::where('guard_name', '!=', getGuardNameUser())->orderBy('name', 'ASC')->get();

        return datatables($query)
            ->addIndexColumn()
            ->editColumn('guard_name', function ($query) {
                $badge = $query->guard_name == getGuardNameAdmin() ? 'danger' : 'dark';
                return '<div class="badge badge-' . $badge . '">' . $query->guard_name . '</div>';
            })
            ->editColumn('residence', function ($query) {
                $area = Area::findOrFail($query->area_id);
                return $area->residence->name;
            })
            ->editColumn('area', function ($query) {
                $area = Area::findOrFail($query->area_id);
                return $area->name;
            })
            ->addColumn('action', function ($query) {
                if ($query->name == 'Super Admin') {
                    return '<div class="badge badge-danger">'  . __('No Action') . '</div>';
                } else {
                    if (canAccess(['role admin update'])) {
                        $update = '
                            <a href="' . route('admin.role.edit', $query->id) . '" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                        ';
                    }
                    if (canAccess(['role admin delete'])) {
                        $delete = '
                            <a href="' . route('admin.role.destroy', $query->id) . '" class="btn btn-danger btn-sm delete_item">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        ';
                    }
                    return (!empty($update) ? $update : '') . (!empty($delete) ? $delete : '');
                }
            })
            ->rawColumns(['action', 'residence', 'area'])
            ->escapeColumns([])
            ->make(true);
    }
}
