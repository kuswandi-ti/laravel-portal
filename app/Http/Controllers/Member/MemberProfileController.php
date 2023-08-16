<?php

namespace App\Http\Controllers\Member;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Member\MemberProfileUpdateRequest;
use App\Http\Requests\Member\MemberProfilePasswordUpdateRequest;

class MemberProfileController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $member = Auth::guard('member')->user();
        return view('member.profile.index', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MemberProfileUpdateRequest $request, string $id)
    {
        $imagePath = $this->handleImageUpload($request, 'image', $request->old_image, 'member_profile');

        $member = Member::findOrFail($id);

        $member->name = $request->name;
        $member->phone = $request->phone;
        $member->address = $request->address;
        $member->image = !empty($imagePath) ? $imagePath : $request->old_image;

        $member->save();

        return redirect()->back()->with('success', __('Update profile successfully'));
    }

    public function indexPassword()
    {
        return view('member.profile.password_update');
    }

    public function updatePassword(MemberProfilePasswordUpdateRequest $request, string $id)
    {
        $member = Member::findOrFail($id);
        $member->password = bcrypt($request->password);
        $member->save();

        return redirect()->back()->with('success', __('Update password successfully'));
    }
}
