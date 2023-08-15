<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use App\Models\Currency;
use App\Models\Language;
use App\Models\FormatDate;
use App\Models\FormatTime;
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminGeneralSettingUpdateRequest;
use App\Http\Requests\Admin\AdminPaymentSettingUpdateRequest;
use App\Http\Requests\Admin\AdminNotificationSettingUpdateRequest;

class AdminSettingController extends Controller
{
    use FileUploadTrait;

    public function index()
    {
        return view('admin.setting.index');
    }

    public function generalSettingIndex()
    {
        $default_language = Language::where('default', '1')->get()->pluck('name', 'lang');
        $format_dates = FormatDate::all()->pluck('text', 'code');
        $format_times = FormatTime::all()->pluck('text', 'code');
        $currencies = Currency::all()->pluck('text', 'code');
        $general_setting = Setting::all();
        return view('admin.setting.general_setting', compact('default_language', 'format_dates', 'format_times', 'currencies', 'general_setting'));
    }

    public function generalSettingUpdate(AdminGeneralSettingUpdateRequest $request)
    {
        foreach ($request->only('company_name', 'site_title', 'company_phone', 'company_email', 'company_address', 'default_date_format', 'default_time_format', 'default_currency', 'default_language') as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value],
            );
        }

        if ($request->hasFile('company_logo')) {
            $imagePath = $this->handleImageUpload($request, 'company_logo', $request->old_image_logo, 'company_logo');
            Setting::updateOrCreate(
                ['key' => 'company_logo'],
                ['value' => $imagePath],
            );
        }

        if ($request->hasFile('company_favicon')) {
            $imagePath = $this->handleImageUpload($request, 'company_favicon', $request->old_image_logo, 'company_favicon');
            Setting::updateOrCreate(
                ['key' => 'company_favicon'],
                ['value' => $imagePath],
            );
        }

        return redirect()->back()->with('success', __('Updated general setting successfully'));
    }

    public function notificationSettingIndex()
    {
        $general_setting = Setting::all();
        return view('admin.setting.notification_setting', compact('general_setting'));
    }

    public function notificationSettingUpdate(AdminNotificationSettingUpdateRequest $request)
    {
        foreach ($request->except('_token', '_method') as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value],
            );
        }

        return redirect()->back()->with('success', __('Updated notification setting successfully'));
    }

    public function paymentSettingIndex()
    {
        $payment_setting = Setting::all();
        return view('admin.setting.payment_setting', compact('payment_setting'));
    }

    public function paymentSettingUpdate(AdminPaymentSettingUpdateRequest $request)
    {
        foreach ($request->except('_token', '_method') as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value],
            );
        }

        return redirect()->back()->with('success', __('Updated payment setting successfully'));
    }
}
