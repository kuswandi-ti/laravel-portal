<?php

namespace App\Http\Controllers\Mobile;

use App\Models\Bank;
use App\Models\BankMember;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Mobile\MobileBankMemberStoreRequest;
use App\Http\Requests\Mobile\MobileBankMemberUpdateRequest;

class MobileBankMemberController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:bank member create,' . getGuardNameUser(), ['only' => ['create', 'store']]);
        $this->middleware('permission:bank member delete,' . getGuardNameUser(), ['only' => ['destroy']]);
        $this->middleware('permission:bank member index,' . getGuardNameUser(), ['only' => ['index', 'show']]);
        $this->middleware('permission:bank member update,' . getGuardNameUser(), ['only' => ['edit', 'update']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bank_members = BankMember::where([
            ['area_id', getLoggedUserAreaId()],
            ['status', 1],
        ])->orderBy('updated_at', 'DESC')->get();
        return view('mobile.bank_member.index', compact('bank_members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $banks = Bank::where([
            ['status', 1],
        ])->orderBy('name', 'ASC')->get();
        return view('mobile.bank_member.create', compact('banks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MobileBankMemberStoreRequest $request)
    {
        $store = BankMember::create([
            'bank_account_number' => $request->bank_account_number,
            'bank_account_name' => $request->bank_account_name,
            'beginning_balance' => $request->beginning_balance,
            'bank_code' => $request->bank_code,
            'bank_name' => $request->bank_name,
            'bank_type' => $request->bank_type,
            'area_id' => getLoggedUserAreaId(),
            'created_by' => getLoggedUser()->name,
        ]);

        if ($store) {
            return redirect()->route('mobile.bank-member.index')->with('success', __('Created cash & bank successfully'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $bank_member = BankMember::findOrFail($id);
        $banks = Bank::where([
            ['status', 1],
        ])->orderBy('name', 'ASC')->get();
        return view('mobile.bank_member.edit', compact('bank_member', 'banks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MobileBankMemberUpdateRequest $request, string $id)
    {
        $bank_member = BankMember::findOrFail($id);
        $update = $bank_member->update([
            'bank_account_number' => $request->bank_account_number,
            'bank_account_name' => $request->bank_account_name,
            'beginning_balance' => $request->beginning_balance,
            'bank_code' => $request->bank_code,
            'bank_name' => $request->bank_name,
            'bank_type' => $request->bank_type,
            'updated_by' => getLoggedUser()->name,
        ]);

        if ($update) {
            return redirect()->route('mobile.bank-member.index')->with('success', __('Updated cash & bank successfully'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $bank_member = BankMember::findOrFail($id);

            $destroy = $bank_member->update([
                'status' => 0,
                'deleted_at' => saveDateTimeNow(),
                'deleted_by' => getLoggedUser()->name,
            ]);

            return response()->json([
                'success' => true,
                'message' => __('Deleted cash & bank successfully'),
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => true,
                'message' => __('Deleted cash & bank is error'),
            ]);
        }
    }
}
