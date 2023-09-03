<?php

namespace App\Http\Controllers\Mobile;

use App\Models\Dues;
use App\Models\User;
use App\Models\House;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MobileOutstandingDuesController extends Controller
{
    public function index(Request $request)
    {
        $users = User::where([
            ['area_id', getLoggedUserAreaId()],
            ['flag_dues', 1],
            [function ($query) use ($request) {
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
            }]
        ])
            ->withSum([
                'dues' => function ($query) {
                    $query->where('payable', 0);
                }
            ], 'dues_amount')
            ->orderBy('name')
            ->get();

        return view('mobile.dues.outstanding_dues', compact('users'));
    }

    public function show(string $user_id)
    {
        $dues = Dues::where([
            ['user_id', $user_id],
        ])
            ->with(['user'])
            ->orderBy('year', 'ASC')
            ->orderBy('month', 'ASC')
            ->get()
            ->groupBy('year')
            ->toArray();

        $notpaid_dues = Dues::where([
            ['user_id', $user_id],
        ])
            ->sum('dues_amount');

        return view('mobile.dues.outstanding_dues_show', compact('dues', 'notpaid_dues'));
    }
}
