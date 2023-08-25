<?php

namespace App\Http\Controllers\Member;

use App\Models\User;
use App\Models\House;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\MemberStaffRegisterVerifyMail;
use App\Http\Requests\Member\MemberStaffUserStoreRequest;
use App\Http\Requests\Member\MemberStaffUserUpdateRequest;

class MemberStaffUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('member.staff.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::where([
            ['guard_name', getGuardNameUser()],
            ['area_id', getLoggedUser()->area->id],
        ])->orderBy('name', 'DESC')->pluck('name', 'id');
        $houses = House::where([
            ['area_id', getLoggedUser()->area->id],
        ])->orderBy('owner_name', 'ASC')->get();
        return view('member.staff.create', compact('roles', 'houses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MemberStaffUserStoreRequest $request)
    {
        $token = Str::random(64);

        $house = House::findOrFail($request->house);
        $house_street_name = $house->street;
        $house_block = $house->block;
        $house_number = $house->no;

        $staff = new User();
        $staff->name = $request->name;
        $staff->slug = Str::slug($request->name);
        $staff->email = $request->email;
        $staff->image = config('common.default_image_circle');
        $staff->area_id = getLoggedUser()->area->id;
        $staff->house_id = $request->house;
        $staff->house_street_name = $house_street_name;
        $staff->house_block = $house_block;
        $staff->house_number = $house_number;
        $staff->register_token = $token;
        $staff->created_by = getLoggedUser()->name;
        $staff->status = 1;
        $staff->save();

        $staff->assignRole($request->role);

        Mail::to($request->email)->send(new MemberStaffRegisterVerifyMail($token));

        return redirect()->route('member.staff.index')->with('success', __('admin.Created staff successfully'));
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
        $staff = User::findOrFail($id);
        $roles = Role::where([
            ['guard_name', getGuardNameUser()],
            ['area_id', getLoggedUser()->area->id],
        ])->orderBy('name', 'DESC')->pluck('name', 'id');
        $staff_role = $staff->roles->pluck('name', 'id')->all();
        $houses = House::where([
            ['area_id', getLoggedUser()->area->id],
        ])->orderBy('owner_name', 'ASC')->get();

        return view('member.staff.edit', compact('staff', 'roles', 'staff_role', 'houses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MemberStaffUserUpdateRequest $request, string $id)
    {
        $house = House::findOrFail($request->house);
        $house_street_name = $house->street;
        $house_block = $house->block;
        $house_number = $house->no;

        $staff = User::findOrFail($id);
        $staff->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'house_id' => $request->house,
            'house_street_name' => $house_street_name,
            'house_block' => $house_block,
            'house_number' => $house_number,
            'updated_by' => getLoggedUser()->name,
            'status' => 1,
        ]);
        $staff->syncRoles($request->role);

        return redirect()->route('member.staff.index')->with('success', __('admin.Updated staff successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $staff = User::findOrFail($id);

            $staff->status = 0;
            $staff->deleted_at = saveDateTimeNow();
            $staff->deleted_by = getLoggedUser()->name;
            $staff->save();

            return response([
                'status' => 'success',
                'message' => __('admin.Deleted staff successfully')
            ]);
        } catch (\Throwable $th) {
            return response([
                'status' => 'error',
                'message' => __('admin.Deleted staff is error')
            ]);
        }
    }

    public function restore($id)
    {
        $staff = User::findOrFail($id);

        $staff->status = 1;
        $staff->restored_at = saveDateTimeNow();
        $staff->restored_by = getLoggedUser()->name;
        $staff->save();

        return redirect()->route('member.staff.index')->with('success', __('admin.Restore staff successfully'));
    }

    public function data(Request $request)
    {
        $query = User::whereHas('roles')
            ->where('area_id', getLoggedUserAreaId())
            ->orderBy('name', 'ASC')->get();

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
                $badge = $query->roles->pluck('name')->first() == getGuardTextUser() ? 'danger' : 'dark';
                return '<div class="badge badge-' . $badge . '">' . $query->roles->pluck('name')->first() . '</div>';
            })
            ->editColumn('status', function ($query) {
                return '<div class="badge badge-' . setStatusBadge($query->status) . '">' . setStatusText($query->status) . '</div>';
            })
            ->addColumn('action', function ($query) {
                if ($query->status == 1) {
                    if (canAccess(['staff update'])) {
                        $update = '
                            <a href="' . route('member.staff.edit', $query->id) . '" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                        ';
                    }
                    if (canAccess(['staff delete'])) {
                        $delete = '
                            <a href="' . route('member.staff.destroy', $query->id) . '" class="btn btn-danger btn-sm delete_item">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        ';
                    }
                    return (!empty($update) ? $update : '') . (!empty($delete) ? $delete : '');
                } else {
                    return '
                        <a href="' . route('member.staff.restore', $query->id) . '" class="btn btn-warning btn-sm" data-toggle="tooltip" title="' . __('admin.Restore to Active') . '">
                            <i class="fas fa-undo"></i>
                        </a>
                    ';
                }
            })
            ->rawColumns(['action'])
            ->escapeColumns([])
            ->make(true);
    }
}
