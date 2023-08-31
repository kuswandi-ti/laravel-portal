<?php

namespace App\Http\Controllers\Mobile;

use Illuminate\Http\Request;
use App\Models\SettingMember;
use App\Http\Controllers\Controller;
use App\Http\Requests\Mobile\MobileSettingMemberUpdateRequest;

class MobileSettingMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('mobile.setting_member.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MobileSettingMemberUpdateRequest $request, string $id)
    {
        SettingMember::updateOrCreate(
            ['key' => 'dues_amount'],
            ['value' => $request->dues_amount, 'area_id' => getLoggedUserAreaId(), 'created_by' => getLoggedUser()->name, 'updated_by' => getLoggedUser()->name],
        );

        return redirect()->back()->with('success', __('Updated system setting successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
