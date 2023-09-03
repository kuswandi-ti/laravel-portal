<?php

namespace App\Http\Controllers\Mobile;

use App\Models\Dues;
use App\Models\User;
use App\Models\Income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class MobileGenerateDuesController extends Controller
{
    public function index()
    {
        $users = User::where([
            ['area_id', getLoggedUserAreaId()],
            ['status', 1],
        ])
            ->orderBy('name', 'ASC')
            ->get()
            ->pluck('name', 'id');

        return view('mobile.dues.generate_dues', compact('users'));
    }

    public function generateDues(Request $request)
    {
        // DB::transaction(function () use ($request) {
        $area_id = getLoggedUserAreaId();
        $setting_member = getSettingMember();

        if ($request->choice === 'per_user') {
            /** Check to dues table */
            $dues = Dues::where('month', $request->month)
                ->where('year', $request->year)
                ->where('user_id', $request->user_id)
                ->where('area_id', $area_id)
                ->get();
            if ($dues->count() > 0) {
                return response()->json([
                    'success' => false,
                    'message' => __('Dues already generated in same user, month & year. Check to outstanding dues'),
                ]);
            }

            /** Check to income table */
            $income = Income::where('for_month', $request->month)
                ->where('for_year', $request->year)
                ->where('user_id', $request->user_id)
                ->where('area_id', $area_id)
                ->get();
            if ($income->count() > 0) {
                return response()->json([
                    'success' => false,
                    'message' => __('Dues already payment in same user, month & year'),
                ]);
            }

            Dues::create([
                'area_id' => $area_id,
                'user_id' => $request->user_id,
                'month' => $request->month,
                'year' => $request->year,
                'dues_amount' => $setting_member['dues_amount'],
                'created_by' => getLoggedUser()->name,
            ]);

            return response()->json([
                'success' => true,
                'message' => __('Generate dues successfully'),
            ]);
        } else {
            $user = User::where('area_id', getLoggedUserAreaId())
                ->where('flag_dues', 1)
                ->where('status', 1)
                ->get();
            foreach ($user as $item) {
                /** Check to dues table */
                $dues = Dues::where('month', $request->month)
                    ->where('year', $request->year)
                    ->where('user_id', $item->id)
                    ->where('area_id', $area_id)
                    ->get();
                if ($dues->count() == 0) {
                    /** Check to income table */
                    $income = Income::where('for_month', $request->month)
                        ->where('for_year', $request->year)
                        ->where('user_id', $item->id)
                        ->where('area_id', $area_id)
                        ->get();
                    if ($income->count() == 0) {
                        Dues::create([
                            'area_id' => $area_id,
                            'user_id' => $item->id,
                            'month' => $request->month,
                            'year' => $request->year,
                            'dues_amount' => $setting_member['dues_amount'],
                            'created_by' => getLoggedUser()->name,
                        ]);
                    }
                }
            }

            return response()->json([
                'success' => true,
                'message' => __('Generate dues successfully'),
            ]);
        }
        // });
    }
}
