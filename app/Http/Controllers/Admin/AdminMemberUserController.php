<?php

namespace App\Http\Controllers\Admin;

use App\Models\Area;
use App\Models\Member;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admin\AdminMemberUserStoreRequest;
use App\Http\Requests\Admin\AdminMemberUserUpdateRequest;

class AdminMemberUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.member.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::orderBy('name', 'DESC')->where('guard_name', 'member')->pluck('name', 'name');
        $areas = Area::orderBy('name', 'ASC')->pluck('name', 'id');
        return view('admin.member.create', compact('roles', 'areas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminMemberUserStoreRequest $request)
    {
        $member = new Member();

        $member->name = $request->name;
        $member->slug = Str::slug($request->name);
        $member->email = $request->email;
        $member->password = Hash::make($request->password);
        $member->image = config('common.default_image_circle');
        $member->area_id = $request->area;
        $member->email_verified_at = saveDateTimeNow();
        $member->created_by = getLoggedUser()->name;
        $member->status = 1;
        $member->save();

        $member->assignRole($request->role);

        return redirect()->route('admin.member.index')->with('success', __('Created member user successfully'));
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
        $roles = Role::orderBy('name', 'DESC')->where('guard_name', 'member')->pluck('name', 'name');
        $member_role = $member->roles->pluck('name', 'name')->all();
        $areas = Area::orderBy('name', 'ASC')->pluck('name', 'id');

        return view('admin.member.edit', compact('member', 'roles', 'member_role', 'areas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminMemberUserUpdateRequest $request, string $id)
    {
        $member = Member::findOrFail($id);
        $member->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'email' => $request->email,
            'area_id' => $request->area,
            'updated_by' => getLoggedUser()->name,
            'status' => 1,
        ]);
        $member->syncRoles($request->role);

        return redirect()->route('admin.member.index')->with('success', __('Updated member user successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $member = Member::findOrFail($id);

            if ($member->roles->first()->name == 'Admin') {
                return response([
                    'status' => 'error',
                    'message' => __('admin.Cannot delete this user becase role is Admin')
                ]);
            }

            $member->status = 0;
            $member->deleted_at = saveDateTimeNow();
            $member->deleted_by = getLoggedUser()->name;
            $member->save();

            return response([
                'status' => 'success',
                'message' => __('admin.Deleted member user successfully')
            ]);
        } catch (\Throwable $th) {
            return response([
                'status' => 'error',
                'message' => __('admin.Deleted member user is error')
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

        return redirect()->route('admin.member.index')->with('success', __('admin.Restore member user successfully'));
    }

    public function data(Request $request)
    {
        $query = Member::orderBy('name', 'ASC');

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
                    return '<div class="badge badge-danger">'  . __('No Action') . '</div>';
                } else {
                    if ($query->status == 1) {
                        return '
                            <a href="' . route('admin.member.edit', $query->id) . '" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="' . route('admin.member.destroy', $query->id) . '" class="btn btn-danger btn-sm delete_item">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        ';
                    } else {
                        return '
                            <a href="' . route('admin.member.restore', $query->id) . '" class="btn btn-warning btn-sm" data-toggle="tooltip" title="' . __('Restore to Active') . '">
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
