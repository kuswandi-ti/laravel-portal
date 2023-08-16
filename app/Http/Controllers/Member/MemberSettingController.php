<?php

namespace App\Http\Controllers\Member;

use App\Models\Area;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\SettingMember;
use App\Traits\FileUploadTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\Member\MemberSettingAreaUpdateRequest;

class MemberSettingController extends Controller
{
    use FileUploadTrait;

    public function index()
    {
        $areaId = Auth::guard('member')->user()->area_id;
        $area = Area::findOrFail($areaId);
        $permissions = Permission::where('guard_name', 'member')->get()->groupBy('group_name');
        return view('member.setting.index', compact('permissions', 'area'));
    }

    public function settingAreaUpdate(MemberSettingAreaUpdateRequest $request, string $id)
    {
        $area = Area::findOrFail($id);
        $area->name = $request->name;
        $area->slug = Str::slug($request->name);
        $area->rt = $request->rt;
        $area->rw = $request->rw;
        $area->postal_code = $request->postal_code;
        $area->full_address = $request->full_address;
        $area->save();

        return redirect()->back()->with('success', __('Update area successfully'));
    }

    public function settingLogoUpdate(Request $request)
    {
        if ($request->hasFile('member_logo')) {
            $imagePath = $this->handleImageUpload($request, 'member_logo', $request->old_member_logo, 'member_logo');
            SettingMember::updateOrCreate(
                ['key' => 'member_logo'],
                ['value' => $imagePath, 'member_id' => Auth::guard('member')->user()->id],
            );
        }

        return redirect()->back()->with('success', __('Updated logo successfully'));
    }
}
