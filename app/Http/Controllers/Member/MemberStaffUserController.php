<?php

namespace App\Http\Controllers\Member;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\MemberRegisterVerifyMail;
use App\Http\Requests\Member\MemberStaffUserStoreRequest;
use App\Http\Requests\Member\MemberStaffUserUpdateRequest;

class MemberStaffUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staffs_active = User::where('area_id', getLoggedUser()->area->id)->get();
        $staffs_inactive = User::onlyTrashed()->where('area_id', getLoggedUser()->area->id)->get();
        return view('member.staff.index', compact('staffs_active', 'staffs_inactive'));
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
        return view('member.staff.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MemberStaffUserStoreRequest $request)
    {
        $staff = new User();

        $staff->name = $request->name;
        $staff->slug = Str::slug($request->name);
        $staff->email = $request->email;
        $staff->password = Hash::make($request->password);
        $staff->image = config('common.default_image_circle');
        $staff->area_id = getLoggedUser()->area->id;
        $staff->status = 1;
        $staff->save();

        $staff->assignRole($request->role);

        $token = Str::random(64);

        Mail::to($request->email)->send(new MemberRegisterVerifyMail($token));

        return redirect()->route('member.staff.index')->with('success', __('Created staff successfully'));
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

        return view('member.staff.edit', compact('staff', 'roles', 'staff_role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MemberStaffUserUpdateRequest $request, string $id)
    {
        $staff = User::findOrFail($id);
        $staff->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
        $staff->syncRoles($request->role);

        return redirect()->route('member.staff.index')->with('success', __('Updated staff successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $staff = User::findOrFail($id);

            $staff->status = 0;
            $staff->save();

            $staff->delete();

            return response([
                'status' => 'success',
                'message' => __('Deleted staff successfully')
            ]);
        } catch (\Throwable $th) {
            return response([
                'status' => 'error',
                'message' => __('Deleted staff is error')
            ]);
        }
    }

    public function restore($id)
    {
        $staff = User::withTrashed()->findOrFail($id);

        $staff->status = 1;
        $staff->save();

        $staff->restore();

        return redirect()->back()->with('success', __('Restore staff successfully'));
    }
}
