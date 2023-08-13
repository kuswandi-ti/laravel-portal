<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminProfilePasswordUpdateRequest;
use App\Http\Requests\Admin\AdminProfileUpdateRequest;
use App\Models\Admin;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminProfileController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.profile.index', compact('admin'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminProfileUpdateRequest $request, string $id)
    {
        $imagePath = $this->handleImageUpload($request, 'image', $request->old_image, 'admin_profile');

        $admin = Admin::findOrFail($id);
        $admin->image = !empty($imagePath) ? $imagePath : $request->old_image;
        $admin->name = $request->name;
        $admin->save();

        return redirect()->back()->with('success', __('Update profile successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function updatePassword(AdminProfilePasswordUpdateRequest $request, string $id)
    {
        $admin = Admin::findOrFail($id);
        $admin->password = bcrypt($request->password);
        $admin->save();

        return redirect()->back()->with('success', __('Update password successfully'));
    }
}
