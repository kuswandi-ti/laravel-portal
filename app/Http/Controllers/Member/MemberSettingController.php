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

    function __construct()
    {
        $this->middleware('permission:member setting,' . getGuardNameMember(), ['only' => ['index', 'settingAreaUpdate', 'settingLogoUpdate', 'settingPaymentUpdate']]);
    }

    public function index()
    {
        $area = Area::findOrFail(getLoggedUserAreaId());
        $permissions = Permission::where('guard_name', getGuardNameMember())->get()->groupBy('group_name');
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
        $area->updated_by = getLoggedUser()->name;
        $area->save();

        return redirect()->back()->with('success', __('admin.Update area successfully'));
    }

    public function settingLogoUpdate(Request $request)
    {
        if ($request->hasFile('member_logo')) {
            $image_path = $this->handleImageUpload($request, 'member_logo', $request->old_member_logo, 'member_logo');
            SettingMember::updateOrCreate(
                ['key' => 'member_logo'],
                ['value' => $image_path, 'area_id' => getLoggedUserAreaId(), 'updated_by' => getLoggedUser()->name],
            );
        }

        return redirect()->back()->with('success', __('admin.Updated logo successfully'));
    }

    public function settingPaymentUpdate(Request $request)
    {
        foreach ($request->only('midtrans_environment', 'midtrans_merchant_id', 'midtrans_client_key', 'midtrans_server_key') as $key => $value) {
            SettingMember::updateOrCreate(
                ['key' => $key],
                ['value' => $value, 'area_id' => getLoggedUserAreaId(), 'updated_by' => getLoggedUser()->name],
            );
        }

        return redirect()->back()->with('success', __('admin.Updated payment setting successfully'));
    }
}
