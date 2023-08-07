<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use App\Traits\FileUploadTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminGeneralSettingUpdateRequest;

class AdminGeneralSettingController extends Controller
{
    use FileUploadTrait;

    public function index()
    {
        $general_setting = GeneralSetting::all();
        return view('admin.general_setting.index', compact('general_setting'));
    }

    public function updateGeneralSetting(AdminGeneralSettingUpdateRequest $request)
    {
        // GeneralSetting::updateOrCreate(
        //     ['key' => 'application_name'],
        //     ['value' => $request->application_name],
        // );

        // GeneralSetting::updateOrCreate(
        //     ['key' => 'currency_code'],
        //     ['value' => $request->currency_code],
        // );

        // GeneralSetting::updateOrCreate(
        //     ['key' => 'currency_symbol'],
        //     ['value' => $request->currency_symbol],
        // );

        // if ($request->hasFile('logo')) {
        //     $imageLogoPath = $this->handleImageUpload($request, 'logo', $request->old_image_logo, 'logo');
        //     GeneralSetting::updateOrCreate(
        //         ['key' => 'image_logo'],
        //         ['value' => $imageLogoPath],
        //     );
        // }

        // if ($request->hasFile('favicon')) {
        //     $imageFaviconPath = $this->handleImageUpload($request, 'favicon', $request->old_image_favicon, 'favicon');
        //     GeneralSetting::updateOrCreate(
        //         ['key' => 'image_favicon'],
        //         ['value' => $imageFaviconPath],
        //     );
        // }

        foreach ($request->only('application_name', 'currency_code', 'currency_symbol') as $key => $value) {
            GeneralSetting::updateOrCreate(
                ['key' => $key],
                ['value' => $value],
            );
        }

        return redirect()->back()->with('success', __('Updated general setting successfully'));
    }
}
