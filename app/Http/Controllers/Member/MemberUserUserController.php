<?php

namespace App\Http\Controllers\Member;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Member\MemberUserUserStoreRequest;
use App\Http\Requests\Member\MemberUserUserUpdateRequest;

class MemberUserUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users_active = User::where('area_id', getLoggedUser()->area->id)->get();
        $users_inactive = User::onlyTrashed()->where('area_id', getLoggedUser()->area->id)->get();
        return view('member.user.index', compact('users_active', 'users_inactive'));
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
        return view('member.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MemberUserUserStoreRequest $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->slug = Str::slug($request->name);
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->image = config('common.default_image_circle');
        $user->area_id = getLoggedUser()->area->id;
        $user->status = 1;
        $user->save();

        $user->assignRole($request->role);

        return redirect()->route('member.user.index')->with('success', __('Created user successfully'));
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
        $user = User::findOrFail($id);
        $roles = Role::where([
            ['guard_name', getGuardNameUser()],
            ['area_id', getLoggedUser()->area->id],
        ])->orderBy('name', 'DESC')->pluck('name', 'id');
        $user_role = $user->roles->pluck('name', 'id')->all();

        return view('member.user.edit', compact('member', 'roles', 'user_role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MemberUserUserUpdateRequest $request, string $id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
        $user->syncRoles($request->role);

        return redirect()->route('member.user.index')->with('success', __('Updated user successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $user = User::findOrFail($id);

            $user->status = 0;
            $user->save();

            $user->delete();

            return response([
                'status' => 'success',
                'message' => __('Deleted user successfully')
            ]);
        } catch (\Throwable $th) {
            return response([
                'status' => 'error',
                'message' => __('Deleted user is error')
            ]);
        }
    }

    public function restore($id)
    {
        $user = User::withTrashed()->findOrFail($id);

        $user->status = 1;
        $user->save();

        $user->restore();

        return redirect()->back()->with('success', __('Restore user successfully'));
    }
}
