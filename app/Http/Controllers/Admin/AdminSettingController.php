<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminGeneralSettingUpdateRequest;

class AdminSettingController extends Controller
{
    use FileUploadTrait;

    public function index()
    {
        return view('admin.setting.index');
    }

    public function generalSettingIndex()
    {
        $default_language = Language::where('default', '1')->get();
        $general_setting = Setting::all();
        return view('admin.setting.general_setting', compact('general_setting', 'default_language'));
    }

    public function generalSettingUpdate(AdminGeneralSettingUpdateRequest $request)
    {
        foreach ($request->only('application_name', 'application_tagline', 'application_description') as $key => $value) {
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

    public function notificationSettingIndex()
    {
        $default_language = Language::where('default', '1')->get();
        $general_setting = Setting::all();
        return view('admin.setting.notification_setting', compact('general_setting', 'default_language'));
    }
}
