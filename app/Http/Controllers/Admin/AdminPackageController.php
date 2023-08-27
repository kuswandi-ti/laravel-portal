<?php

namespace App\Http\Controllers\Admin;

use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminPackageStoreRequest;
use App\Http\Requests\Admin\AdminPackageUpdateRequest;

class AdminPackageController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:package create,' . getGuardNameAdmin(), ['only' => ['create', 'store']]);
        $this->middleware('permission:package delete,' . getGuardNameAdmin(), ['only' => ['destroy']]);
        $this->middleware('permission:package index,' . getGuardNameAdmin(), ['only' => ['index', 'show']]);
        $this->middleware('permission:package restore,' . getGuardNameAdmin(), ['only' => ['edit', 'update']]);
        $this->middleware('permission:package update,' . getGuardNameAdmin(), ['only' => ['edit', 'update']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages = Package::all();
        return view('admin.package.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.package.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminPackageStoreRequest $request)
    {
        $package = new Package();

        $package->name = $request->name;
        $package->cost_per_month = $request->cost_per_month;
        $package->cost_per_year = $request->cost_per_year;
        $package->staff_limit_per_month = $request->staff_limit_per_month;
        $package->user_limit_per_month = $request->user_limit_per_month;
        $package->wallet_amount_limit_per_month = $request->wallet_amount_limit_per_month;
        $package->live_chat_per_month = isset($request->live_chat_per_month) ? $request->live_chat_per_month : '0';
        $package->support_ticket_per_month = isset($request->support_ticket_per_month) ? $request->support_ticket_per_month : '0';
        $package->online_payment_per_month = isset($request->online_payment_per_month) ? $request->online_payment_per_month : '0';
        $package->staff_limit_per_year = $request->staff_limit_per_year;
        $package->user_limit_per_year = $request->user_limit_per_year;
        $package->wallet_amount_limit_per_year = $request->wallet_amount_limit_per_year;
        $package->live_chat_per_year = isset($request->live_chat_per_year) ? $request->live_chat_per_year : '0';
        $package->support_ticket_per_year = isset($request->support_ticket_per_year) ? $request->support_ticket_per_year : '0';
        $package->online_payment_per_year = isset($request->online_payment_per_year) ? $request->online_payment_per_year : '0';
        $package->status = 1;
        $package->created_by = getLoggedUser()->name;
        $package->save();

        return redirect()->route('admin.package.index')->with('success', __('admin.Created package successfully'));
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
        $package = Package::findOrFail($id);
        return view('admin.package.edit', compact('package'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminPackageUpdateRequest $request, string $id)
    {
        $package = Package::findOrFail($id);

        $data = [
            'name' => $request->name,
            'cost_per_month' => unformatAmount($request->cost_per_month),
            'cost_per_year' => unformatAmount($request->cost_per_year),
            'staff_limit_per_month' => $request->staff_limit_per_month,
            'user_limit_per_month' => $request->user_limit_per_month,
            'wallet_amount_limit_per_month' => $request->wallet_amount_limit_per_month,
            'live_chat_per_month' => isset($request->live_chat_per_month) ? $request->live_chat_per_month : '0',
            'support_ticket_per_month' => isset($request->support_ticket_per_month) ? $request->support_ticket_per_month : '0',
            'online_payment_per_month' => isset($request->online_payment_per_month) ? $request->online_payment_per_month : '0',
            'staff_limit_per_year' => $request->staff_limit_per_year,
            'user_limit_per_year' => $request->user_limit_per_year,
            'wallet_amount_limit_per_year' => $request->wallet_amount_limit_per_year,
            'live_chat_per_year' => isset($request->live_chat_per_year) ? $request->live_chat_per_year : '0',
            'support_ticket_per_year' => isset($request->support_ticket_per_year) ? $request->support_ticket_per_year : '0',
            'online_payment_per_year' => isset($request->online_payment_per_year) ? $request->online_payment_per_year : '0',
            'status' => 1,
            'updated_by' => getLoggedUser()->name,
        ];

        $package->update($data);

        return redirect()->route('admin.package.index')->with('success', __('admin.Updated package successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $package = Package::findOrFail($id);

            $package->status = 0;
            $package->deleted_at = saveDateTimeNow();
            $package->deleted_by = getLoggedUser()->name;
            $package->save();

            return response([
                'status' => 'success',
                'message' => __('admin.Deleted package successfully')
            ]);
        } catch (\Throwable $th) {
            return response([
                'status' => 'error',
                'message' => __('admin.Deleted package is error')
            ]);
        }
    }

    public function restore($id)
    {
        $package = Package::findOrFail($id);

        $package->status = 1;
        $package->restored_at = saveDateTimeNow();
        $package->restored_by = getLoggedUser()->name;
        $package->save();

        return redirect()->route('admin.package.index')->with('success', __('admin.Restore package successfully'));
    }
}
