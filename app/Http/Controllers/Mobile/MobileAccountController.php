<?php

namespace App\Http\Controllers\Mobile;

use App\Models\Account;
use Illuminate\Http\Request;
use App\Models\AccountCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Mobile\MobileAccountStoreRequest;
use App\Http\Requests\Mobile\MobileAccountUpdateRequest;

class MobileAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $category_id)
    {
        $account_category = AccountCategory::where([
            ['area_id', getLoggedUserAreaId()],
            ['id', $category_id],
            ['status', 1],
        ])->first();

        $accounts = Account::where([
            ['area_id', getLoggedUserAreaId()],
            ['account_category_id', $category_id],
            ['status', 1],
        ])->get();

        return view('mobile.account.index', compact('account_category', 'accounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $category_id)
    {
        $account_category = AccountCategory::where([
            ['area_id', getLoggedUserAreaId()],
            ['id', $category_id],
            ['status', 1],
        ])->first();

        return view('mobile.account.create', compact('account_category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MobileAccountStoreRequest $request)
    {
        $account = new Account();

        $account->name = $request->name;
        $account->account_category_id = $request->account_category_id;
        $account->area_id = getLoggedUserAreaId();
        $account->created_by = getLoggedUser()->name;
        $account->status = 1;
        $account->save();

        return redirect()->route('mobile.account.index', $request->account_category_id)->with('success', __('Created account successfully'));
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
        $account = Account::findOrFail($id);
        return view('mobile.account.edit', compact('account'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MobileAccountUpdateRequest $request, string $id)
    {
        $account = Account::findOrFail($id);

        $account->name = $request->name;
        $account->updated_by = getLoggedUser()->name;
        $account->save();

        return redirect()->route('mobile.account.index', $request->account_category_id)->with('success', __('Updated account successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $account = Account::findOrFail($id);

        $account->status = 0;
        $account->deleted_at = saveDateTimeNow();
        $account->deleted_by = getLoggedUser()->name;
        $account->save();

        return response()->json([
            'success' => true,
            'message' => __('Deleted account successfully'),
        ]);
    }
}
