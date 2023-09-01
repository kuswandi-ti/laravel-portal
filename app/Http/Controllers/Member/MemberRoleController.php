<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\Member\MemberRoleStoreRequest;
use App\Http\Requests\Member\MemberRoleUpdateRequest;

class MemberRoleController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:role member create,' . getGuardNameMember(), ['only' => ['create', 'store']]);
        $this->middleware('permission:role member delete,' . getGuardNameMember(), ['only' => ['destroy']]);
        $this->middleware('permission:role member index,' . getGuardNameMember(), ['only' => ['index', 'show', 'data']]);
        $this->middleware('permission:role member update,' . getGuardNameMember(), ['only' => ['edit', 'update']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('member.role.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions_member = Permission::where('guard_name', getGuardNameLoggedUser())->get()->groupBy('group_name');
        $permissions_web = Permission::where('guard_name', getGuardNameUser())->get()->groupBy('group_name');
        return view('member.role.create', compact('permissions_member', 'permissions_web'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MemberRoleStoreRequest $request)
    {
        DB::transaction(function () use ($request) {
            $role = Role::create([
                'name' => $request->role_name,
                'guard_name' => $request->guard_name,
                'area_id' => getLoggedUser()->area->id,
            ]);

            if ($request->guard_name == getGuardNameMember()) {
                $role->syncPermissions($request->permissions_member);
            } elseif ($request->guard_name == getGuardNameUser()) {
                $role->syncPermissions($request->permissions_web);
            }
        });

        return redirect()->route('member.role.index')->with('success', __('admin.Create role & permissions successfully'));
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

        DB::transaction(function () use ($request) {
            $role->update([
                'name' => $request->role_name,
            ]);

            if ($request->guard_name == getGuardNameMember()) {
                $role->syncPermissions($request->permissions_member);
            } elseif ($request->guard_name == getGuardNameUser()) {
                $role->syncPermissions($request->permissions_web);
            }
        });

        return redirect()->route('member.role.index')->with('success', __('admin.Updated role & permissions successfully'));
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
                    'message' => __('admin.Cannot delete this role because role is ' . getGuardTextAdmin())
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
        $query = Role::where([
            ['guard_name', '!=', getGuardNameAdmin()],
            ['area_id', getLoggedUser()->area->id]
        ])->orderBy('name', 'ASC')->get();

        return datatables($query)
            ->addIndexColumn()
            ->editColumn('guard_name', function ($query) {
                $badge = $query->guard_name == getGuardNameMember() ? 'danger' : 'dark';
                return '<div class="badge badge-' . $badge . '">' . $query->guard_name . '</div>';
            })
            ->addColumn('action', function ($query) {
                if ($query->name == 'Admin') {
                    return '<div class="badge badge-danger">'  . __('admin.No Action') . '</div>';
                } else {
                    if (canAccess(['role member update'])) {
                        $update = '
                            <a href="' . route('member.role.edit', $query->id) . '" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                        ';
                    }
                    if (canAccess(['role member delete'])) {
                        $delete = '
                            <a href="' . route('member.role.destroy', $query->id) . '" class="btn btn-danger btn-sm delete_item">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        ';
                    }
                    return (!empty($update) ? $update : '') . (!empty($delete) ? $delete : '');
                }
            })
            ->rawColumns(['action'])
            ->escapeColumns([])
            ->make(true);
    }
}
