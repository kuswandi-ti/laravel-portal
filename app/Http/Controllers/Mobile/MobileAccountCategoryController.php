<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mobile\MobileAccountCategoryStoreRequest;
use App\Http\Requests\Mobile\MobileAccountCategoryUpdateRequest;
use App\Models\AccountCategory;
use Illuminate\Http\Request;

class MobileAccountCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $account_categories_income = AccountCategory::where([
            ['area_id', getLoggedUserAreaId()],
            ['group', 'Income'],
            ['status', 1],
        ])->orderBy('name', 'ASC')->get();
        $account_categories_expense = AccountCategory::where([
            ['area_id', getLoggedUserAreaId()],
            ['group', 'Expense'],
            ['status', 1],
        ])->orderBy('name', 'ASC')->get();
        return view('mobile.account_category.index', compact('account_categories_income', 'account_categories_expense'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mobile.account_category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MobileAccountCategoryStoreRequest $request)
    {
        $account_category = new AccountCategory();

        $account_category->name = $request->name;
        $account_category->group = $request->group;
        $account_category->area_id = getLoggedUserAreaId();
        $account_category->created_by = getLoggedUser()->name;
        $account_category->status = 1;
        $account_category->save();

        return redirect()->route('mobile.account-category.index')->with('success', __('Created account category successfully'));
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
        $account_category = AccountCategory::findOrFail($id);
        return view('mobile.account_category.edit', compact('account_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MobileAccountCategoryUpdateRequest $request, string $id)
    {
        $account_category = AccountCategory::findOrFail($id);

        $account_category->name = $request->name;
        $account_category->group = $request->group;
        $account_category->updated_by = getLoggedUser()->name;
        $account_category->save();

        return redirect()->route('mobile.account-category.index')->with('success', __('Updated account category successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $account_category = AccountCategory::findOrFail($id);

        $account_category->status = 0;
        $account_category->deleted_at = saveDateTimeNow();
        $account_category->deleted_by = getLoggedUser()->name;
        $account_category->save();

        return response()->json([
            'success' => true,
            'message' => __('Deleted account category successfully'),
        ]);
    }
}
