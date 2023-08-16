<?php

namespace App\Http\Controllers\Member;

use App\Models\Member;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Enums\ActiveStatusEnum;
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
        $members_active = Member::where('area_id', getLoggedUser()->area->id)->get();
        $members_inactive = Member::onlyTrashed()->where('area_id', getLoggedUser()->area->id)->get();
        return view('member.admin.index', compact('members_active', 'members_inactive'));
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
        $member->status = 1;
        $member->save();

        $member->assignRole($request->role);

        return redirect()->route('member.admin.index')->with('success', __('Created admin user successfully'));
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
        ]);
        $member->syncRoles($request->role);

        return redirect()->route('member.admin.index')->with('success', __('Updated admin user successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $member = Member::findOrFail($id);

            if ($member->roles->pluck('name')->first() == 'Admin') {
                return response([
                    'status' => 'error',
                    'message' => __('Can\'t delete this user becase role is Admin')
                ]);
            }

            $member->status = 0;
            $member->save();

            $member->delete();

            return response([
                'status' => 'success',
                'message' => __('Deleted admin user successfully')
            ]);
        } catch (\Throwable $th) {
            return response([
                'status' => 'error',
                'message' => __('Deleted admin user is error')
            ]);
        }
    }

    public function restore($id)
    {
        $member = Member::withTrashed()->findOrFail($id);

        $member->status = 1;
        $member->save();

        $member->restore();

        return redirect()->back()->with('success', __('Restore member admin successfully'));
    }
}
