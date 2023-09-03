<?php

namespace App\Http\Controllers\Mobile;

use App\Models\Dues;
use App\Models\User;
use App\Models\Income;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class MobilePayDuesController extends Controller
{
    public function index(Request $request)
    {
        $dues = Dues::where([
            ['area_id', getLoggedUserAreaId()],
            ['payable', 0],
            [function ($query) use ($request) {
                if (($search = $request->search)) {
                    $query->orWhere('year', '=', $search)
                        ->get();
                }
            }]
        ])
            ->with(['user' => function ($query) use ($request) {
                if (($search = $request->search)) {
                    $query->orWhere('name', 'LIKE', '%' . $search . '%')
                        ->orWhere('email', 'LIKE', '%' . $search . '%')
                        ->orWhere('gender', 'LIKE', '%' . $search . '%')
                        ->orWhere('marital_status', 'LIKE', '%' . $search . '%')
                        ->orWhere('place_of_birth', 'LIKE', '%' . $search . '%')
                        ->orWhere('profession', 'LIKE', '%' . $search . '%')
                        ->orWhere('workplace', 'LIKE', '%' . $search . '%')
                        ->orWhere('religion', 'LIKE', '%' . $search . '%')
                        ->orWhere('phone', 'LIKE', '%' . $search . '%')
                        ->orWhere('house_street_name', 'LIKE', '%' . $search . '%')
                        ->orWhere('house_block', 'LIKE', '%' . $search . '%')
                        ->orWhere('house_number', 'LIKE', '%' . $search . '%')
                        ->orWhere('house_address_others', 'LIKE', '%' . $search . '%')
                        ->orWhere('house_ownership', 'LIKE', '%' . $search . '%')
                        ->orWhere('house_stay', 'LIKE', '%' . $search . '%')
                        ->orWhere('house_note', 'LIKE', '%' . $search . '%')
                        ->orWhere('family_card_no', 'LIKE', '%' . $search . '%')
                        ->orWhere('id_card_no', 'LIKE', '%' . $search . '%')
                        ->get();
                }
            }])
            ->orderBy('user_id', 'ASC')
            ->orderBy('year', 'ASC')
            ->orderBy('month', 'ASC')
            ->get()
            ->groupBy('year')
            ->toArray();

        return view('mobile.dues.pay_dues', compact('dues'));
    }

    function payDues(Request $request)
    {
        $arr_id = $request->input('ids');
        $area_id = getLoggedUserAreaId();
        $setting_member = getSettingMember();
        $account = Account::where([
            ['area_id', getLoggedUserAreaId()],
            ['name', 'IPL'],
            ['status', 1],
        ])->first();

        try {
            if (!empty($arr_id)) {
                foreach ($arr_id as $item) {
                    $due = Dues::where('id', $item)->first();

                    Income::create([
                        'area_id' => $area_id,
                        'income_date' => saveDateNow(),
                        'income_amount' => $setting_member['dues_amount'],
                        'income_account_id' => $account->id,
                        'for_month' => $due->month,
                        'for_year' => $due->year,
                        'user_id' => $due->user_id,
                        'income_status' => 'paid',
                        'payment_time' => saveDateTimeNow(),
                        'payment_type' => 'cash',
                        'payment_status' => 'success',
                        'approve_date' => saveDateTimeNow(),
                        'income_notes' => 'IPL',
                        'created_by' => getLoggedUser()->name,
                    ]);

                    $due->delete();
                }

                return response()->json([
                    'success' => true,
                    'message' => __('Pay dues successfully'),
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => __('Please choose one or all'),
                ]);
            }
        } catch (\Throwable $th) {
            return response([
                'success' => false,
                'message' => __('Pay dues is error')
            ]);
        }
    }

    public function indexUser(Request $request)
    {
        $dues = Dues::where([
            ['user_id', getLoggedUser()->id],
        ])
            ->orderBy('year', 'ASC')
            ->get()
            ->groupBy('year')
            ->toArray();

        return view('mobile.dues.pay_dues_user', compact('dues'));
    }
}
