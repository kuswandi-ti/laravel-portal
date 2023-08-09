<?php

namespace App\Http\Controllers\Admin;

use App\Models\Member;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminMemberUserStoreRequest;
use App\Http\Requests\Admin\AdminMemberUserUpdateRequest;

class AdminMemberUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members_active = Member::all();
        $members_inactive = Member::onlyTrashed()->get();
        return view('admin.member.index', compact('members_active', 'members_inactive'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::orderBy('name', 'DESC')->where('guard_name', 'member')->pluck('name', 'name');
        return view('admin.member.create', compact('roles'));
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
        $member->image = '/images/no_image_circle.png';
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

        return view('admin.member.edit', compact('member', 'roles', 'member_role'));
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
                    'message' => __('Can\'t delete this role')
                ]);
            }

            $member->delete();

            return response([
                'status' => 'success',
                'message' => __('Deleted member user successfully')
            ]);
        } catch (\Throwable $th) {
            return response([
                'status' => 'error',
                'message' => __('Deleted member user is error')
            ]);
        }
    }

    public function restore($id)
    {
        Member::withTrashed()->find($id)->restore();

        return redirect()->back()->with('success', __('Restore member user successfully'));
    }
}
