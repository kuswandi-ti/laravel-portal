<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminRegisterVerifyMail;
use App\Http\Requests\Admin\AdminAdminUserStoreRequest;
use App\Http\Requests\Admin\AdminAdminUserUpdateRequest;

class AdminAdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.admin.index');
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
        $token = Str::random(64);

        $admin = new Admin();

        $admin->name = $request->name;
        $admin->slug = Str::slug($request->name);
        $admin->email = $request->email;
        $admin->image = config('common.default_image_circle');
        $admin->area_id = getLoggedUserAreaId();
        $admin->register_token = $token;
        $admin->created_by = getLoggedUser()->name;
        $admin->status = 1;
        $admin->save();

        $admin->assignRole($request->role);

        Mail::to($request->email)->send(new AdminRegisterVerifyMail($token));

        return redirect()->route('admin.admin.index')->with('success', __('admin.Created admin user successfully'));
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
            'updated_by' => getLoggedUser()->name,
            'status' => 1,
        ]);
        $admin->syncRoles($request->role);

        return redirect()->route('admin.admin.index')->with('success', __('admin.Updated admin user successfully'));
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
                    'message' => __('admin.Cannot delete this user becase role is Super Admin')
                ]);
            }

            $admin->status = 0;
            $admin->deleted_at = saveDateTimeNow();
            $admin->deleted_by = getLoggedUser()->name;
            $admin->save();

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
        $admin = Admin::findOrFail($id);

        $admin->status = 1;
        $admin->restored_at = saveDateTimeNow();
        $admin->restored_by = getLoggedUser()->name;
        $admin->save();

        return redirect()->route('admin.admin.index')->with('success', __('admin.Restore admin user successfully'));
    }

    public function data(Request $request)
    {
        $query = Admin::orderBy('name', 'ASC');

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
                $badge = $query->roles->pluck('name')->first() == 'Super Admin' ? 'danger' : 'dark';
                return '<div class="badge badge-' . $badge . '">' . $query->roles->pluck('name')->first() . '</div>';
            })
            ->editColumn('status', function ($query) {
                return '<div class="badge badge-' . setStatusBadge($query->status) . '">' . setStatusText($query->status) . '</div>';
            })
            ->addColumn('action', function ($query) {
                if ($query->roles->pluck('name')->first() == 'Super Admin') {
                    return '<div class="badge badge-danger">'  . __('No Action') . '</div>';
                } else {
                    if ($query->status == 1) {
                        return '
                            <a href="' . route('admin.admin.edit', $query->id) . '" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="' . route('admin.admin.destroy', $query->id) . '" class="btn btn-danger btn-sm delete_item">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        ';
                    } else {
                        return '
                            <a href="' . route('admin.admin.restore', $query->id) . '" class="btn btn-warning btn-sm" data-toggle="tooltip" title="' . __('Restore to Active') . '">
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
