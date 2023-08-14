<?php

namespace App\Http\Controllers\Member;

use App\Models\Area;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\Member\MemberSettingAreaUpdateRequest;

class MemberSettingController extends Controller
{
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
}
