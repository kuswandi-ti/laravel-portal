<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminGeneralSettingUpdateRequest;

class AdminGeneralSettingController extends Controller
{
    use FileUploadTrait;

    public function index()
    {
        $general_setting = Setting::all();
        return view('admin.general_setting.index', compact('general_setting'));
    }

    public function updateGeneralSetting(AdminGeneralSettingUpdateRequest $request)
    {
        foreach ($request->only('application_name', 'currency_code', 'currency_symbol') as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value],
            );
        }

        if ($request->hasFile('logo')) {
            $imagePath = $this->handleImageUpload($request, 'logo', $request->old_image_logo, 'logo');
            Setting::updateOrCreate(
                ['key' => 'image_logo'],
                ['value' => $imagePath],
            );
        }

        if ($request->hasFile('favicon')) {
            $imagePath = $this->handleImageUpload($request, 'favicon', $request->old_image_logo, 'favicon');
            Setting::updateOrCreate(
                ['key' => 'image_favicon'],
                ['value' => $imagePath],
            );
        }

        return redirect()->back()->with('success', __('Updated general setting successfully'));
    }
}
