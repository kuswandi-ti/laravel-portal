<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminAdminUserStoreRequest;
use App\Http\Requests\Admin\AdminAdminUserUpdateRequest;

class AdminAdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins_active = Admin::all();
        $admins_inactive = Admin::onlyTrashed()->get();
        return view('admin.admin.index', compact('admins_active', 'admins_inactive'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::where('guard_name', 'admin')->orderBy('name', 'DESC')->pluck('name', 'name');
        return view('admin.admin.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminAdminUserStoreRequest $request)
    {
        $admin = new Admin();

        $admin->name = $request->name;
        $admin->slug = Str::slug($request->name);
        $admin->email = $request->email;
        $admin->image = '/images/no_image_circle.png';
        $admin->status = 1;
        $admin->save();

        $admin->assignRole($request->role);

        return redirect()->route('admin.admin.index')->with('success', __('Created admin user successfully'));
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
        $admin = Admin::findOrFail($id);
        $roles = Role::where('guard_name', 'admin')->orderBy('name', 'DESC')->pluck('name', 'name');
        $admin_role = $admin->roles->pluck('name', 'name')->all();

        return view('admin.admin.edit', compact('admin', 'roles', 'admin_role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminAdminUserUpdateRequest $request, string $id)
    {
        $admin = Admin::findOrFail($id);
        $admin->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'email' => $request->email,
            'status' => 1,
        ]);
        $admin->syncRoles($request->role);

        return redirect()->route('admin.admin.index')->with('success', __('Updated admin user successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $admin = Admin::findOrFail($id);

            if ($admin->roles->first()->name == 'Super Admin') {
                return response([
                    'status' => 'error',
                    'message' => __('Can\'t delete this user becase role is Super Admin')
                ]);
            }

            $admin->delete();

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
        Admin::withTrashed()->find($id)->restore();

        return redirect()->back()->with('success', __('Restore admin user successfully'));
    }
}
