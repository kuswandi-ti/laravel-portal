<?php

namespace App\Http\Controllers\Member;

use App\Models\Member;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Member\MemberAdminUserStoreRequest;
use App\Http\Requests\Member\MemberAdminUserUpdateRequest;

class MemberAdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('member.admin.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::where([
            ['guard_name', getGuardNameLoggedUser()],
            ['area_id', getLoggedUser()->area->id],
        ])->orderBy('name', 'DESC')->pluck('name', 'id');
        return view('member.admin.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MemberAdminUserStoreRequest $request)
    {
        $member = new Member();

        $member->name = $request->name;
        $member->slug = Str::slug($request->name);
        $member->email = $request->email;
        $member->password = Hash::make($request->password);
        $member->image = config('common.default_image_circle');
        $member->area_id = getLoggedUser()->area->id;
        $member->created_by = getLoggedUser()->name;
        $member->status = 1;
        $member->save();

        $member->assignRole($request->role);

        return redirect()->route('member.admin.index')->with('success', __('admin.Created admin user successfully'));
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
        $member = Member::findOrFail($id);
        $roles = Role::where([
            ['guard_name', getGuardNameLoggedUser()],
            ['area_id', getLoggedUser()->area->id],
        ])->orderBy('name', 'DESC')->pluck('name', 'id');
        $member_role = $member->roles->pluck('name', 'id')->all();

        return view('member.admin.edit', compact('member', 'roles', 'member_role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MemberAdminUserUpdateRequest $request, string $id)
    {
        $member = Member::findOrFail($id);
        $member->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'updated_by' => getLoggedUser()->name,
            'status' => 1,
        ]);
        $member->syncRoles($request->role);

        return redirect()->route('member.admin.index')->with('success', __('admin.Updated admin user successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $member = Member::findOrFail($id);

            if ($member->roles->first()->name == getGuardTextAdmin()) {
                return response([
                    'status' => 'error',
                    'message' => __('admin.admin.Cannot delete this user becase role is Admin')
                ]);
            }

            $member->status = 0;
            $member->deleted_at = saveDateTimeNow();
            $member->deleted_by = getLoggedUser()->name;
            $member->save();

            return response([
                'status' => 'success',
                'message' => __('admin.Deleted admin user successfully')
            ]);
        } catch (\Throwable $th) {
            return response([
                'status' => 'error',
                'message' => __('admin.Deleted admin user is error')
            ]);
        }
    }

    public function restore($id)
    {
        $member = Member::findOrFail($id);

        $member->status = 1;
        $member->restored_at = saveDateTimeNow();
        $member->restored_by = getLoggedUser()->name;
        $member->save();

        return redirect()->route('member.admin.index')->with('success', __('admin.Restore admin user successfully'));
    }

    public function data(Request $request)
    {
        $query = Member::where('area_id', getLoggedUserAreaId())->orderBy('name', 'ASC')->get();

        return datatables($query)
            ->addIndexColumn()
            ->editColumn('image', function ($query) {
                if (!empty($query->image)) {
                    return '<figure class="avatar"><img src="' . url(config('common.path_storage') . $query->image) . '"></figure>';
                } else {
                    return '<figure class="avatar"><img src="' . url(config('common.path_storage') . config('common.default_image_circle')) . '"></figure>';
                }
            })
            ->editColumn('role', function ($query) {
                $badge = $query->roles->pluck('name')->first() == getGuardTextAdmin() ? 'danger' : 'dark';
                return '<div class="badge badge-' . $badge . '">' . $query->roles->pluck('name')->first() . '</div>';
            })
            ->editColumn('status', function ($query) {
                return '<div class="badge badge-' . setStatusBadge($query->status) . '">' . setStatusText($query->status) . '</div>';
            })
            ->addColumn('action', function ($query) {
                if ($query->roles->pluck('name')->first() == getGuardTextAdmin()) {
                    return '<div class="badge badge-danger">'  . __('admin.No Action') . '</div>';
                } else {
                    if ($query->status == 1) {
                        return '
                            <a href="' . route('member.admin.edit', $query->id) . '" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="' . route('member.admin.destroy', $query->id) . '" class="btn btn-danger btn-sm delete_item">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        ';
                    } else {
                        return '
                            <a href="' . route('member.admin.restore', $query->id) . '" class="btn btn-warning btn-sm" data-toggle="tooltip" title="' . __('admin.Restore to Active') . '">
                                <i class="fas fa-undo"></i>
                            </a>
                        ';
                    }
                }
            })
            ->rawColumns(['action'])
            ->escapeColumns([])
            ->make(true);
    }
}
