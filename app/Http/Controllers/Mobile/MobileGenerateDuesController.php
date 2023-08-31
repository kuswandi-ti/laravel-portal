<?php

namespace App\Http\Controllers\Mobile;

use App\Models\Dues;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\SettingMember;
use App\Http\Controllers\Controller;

class MobileGenerateDuesController extends Controller
{
    public function index()
    {
        return view('mobile.dues.generate_dues');
    }

    public function generateDues(Request $request)
    {
        $user = User::where('area_id', getLoggedUserAreaId())
            ->where('flag_dues', 1)
            ->where('status', 1)
            ->get();
        $area_id = getLoggedUserAreaId();
        $setting_member = getSettingMember();

        foreach ($user as $item) {
            Dues::create([
                'area_id' => $area_id,
                'user_id' => $item->id,
                'month' => $request->month,
                'year' => $request->year,
                'dues_amount' => $setting_member['dues_amount'],
                'created_by' => getLoggedUser()->name,
            ]);
        }

        return redirect()->back()->with('success', __('Generate dues successfully'));
    }
}
