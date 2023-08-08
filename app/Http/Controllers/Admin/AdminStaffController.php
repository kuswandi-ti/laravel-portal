<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminStaffStoreRequest;
use App\Http\Requests\Admin\AdminStaffUpdateRequest;

class AdminStaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.staff.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::orderBy('name', 'DESC')->where('guard_name', 'web')->pluck('name', 'name');
        return view('admin.staff.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminStaffStoreRequest $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->slug = Str::slug($request->name);
        $user->image = '/images/no_image_circle.png';
        $user->email = $request->email;
        $user->save();

        $user->assignRole($request->role);

        return redirect()->route('admin.staff.index')->with('success', __('Created staff user successfully'));
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
        $roles = Role::orderBy('name', 'DESC')->where('guard_name', 'web')->pluck('name', 'name');
        $user_role = $user->roles->pluck('name', 'name')->all();

        return view('admin.staff.edit', compact('user', 'roles', 'user_role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminStaffUpdateRequest $request, string $id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'email' => $request->email,
        ]);
        $user->syncRoles($request->role);

        return redirect()->route('admin.staff.index')->with('success', __('Updated staff user successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $user = User::findOrFail($id);

            if ($user->roles->first()->name == 'Admin') {
                return response([
                    'status' => 'error',
                    'message' => __('Can\'t delete this role')
                ]);
            }

            $user->delete();

            return response([
                'status' => 'success',
                'message' => __('Deleted staff user successfully')
            ]);
        } catch (\Throwable $th) {
            return response([
                'status' => 'error',
                'message' => __('Deleted staff user is error')
            ]);
        }
    }
}
