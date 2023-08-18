<?php

namespace App\Http\Controllers\Member;

use App\Models\Block;
use App\Models\House;
use App\Models\Street;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Member\MemberHouseStoreRequest;

class MemberHouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $houses_active = House::where('area_id', getLoggedUserAreaId())->get();
        $houses_inactive = House::onlyTrashed()->where('area_id', getLoggedUserAreaId())->get();
        return view('member.house.index', compact('houses_active', 'houses_inactive'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $streets = Street::where([
            ['area_id', getLoggedUserAreaId()],
        ])->orderBy('name')->pluck('name', 'name');
        $blocks = Block::where([
            ['area_id', getLoggedUserAreaId()],
        ])->orderBy('name')->pluck('name', 'name');
        return view('member.house.create', compact('streets', 'blocks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MemberHouseStoreRequest $request)
    {
        $house = new House();

        $house->owner_name = $request->owner_name;
        $house->street = $request->street;
        $house->block = $request->block;
        $house->no = $request->no;
        $house->address_info = $request->address_info;
        $house->area_id = getLoggedUserAreaId();
        $house->status = 1;
        $house->save();

        return redirect()->route('member.house.index')->with('success', __('Created house successfully'));
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $house = House::findOrFail($id);

            $house->status = 0;
            $house->save();

            $house->delete();

            return response([
                'status' => 'success',
                'message' => __('Deleted house successfully')
            ]);
        } catch (\Throwable $th) {
            return response([
                'status' => 'error',
                'message' => __('Deleted house is error')
            ]);
        }
    }

    public function restore($id)
    {
        $house = House::withTrashed()->findOrFail($id);

        $house->status = 1;
        $house->save();

        $house->restore();

        return redirect()->back()->with('success', __('Restore house successfully'));
    }
}
