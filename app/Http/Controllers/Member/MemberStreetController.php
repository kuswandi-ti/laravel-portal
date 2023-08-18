<?php

namespace App\Http\Controllers\Member;

use App\Models\Street;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Member\MemberStreetStoreRequest;
use App\Http\Requests\Member\MemberStreetUpdateRequest;

class MemberStreetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $streets_active = Street::where('area_id', getLoggedUser()->area->id)->get();
        $streets_inactive = Street::onlyTrashed()->where('area_id', getLoggedUser()->area->id)->get();
        return view('member.street.index', compact('streets_active', 'streets_inactive'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('member.street.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MemberStreetStoreRequest $request)
    {
        $street = new Street();

        $street->name = $request->name;
        $street->slug = Str::slug($request->name);
        $street->area_id = getLoggedUser()->area->id;
        $street->status = 1;
        $street->save();

        return redirect()->route('member.street.index')->with('success', __('Created street successfully'));
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
        $street = Street::findOrFail($id);
        return view('member.street.edit', compact('street'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MemberStreetUpdateRequest $request, string $id)
    {
        $street = Street::findOrFail($id);
        $street->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('member.street.index')->with('success', __('Updated street successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $street = Street::findOrFail($id);

            $street->status = 0;
            $street->save();

            $street->delete();

            return response([
                'status' => 'success',
                'message' => __('Deleted street successfully')
            ]);
        } catch (\Throwable $th) {
            return response([
                'status' => 'error',
                'message' => __('Deleted street is error')
            ]);
        }
    }

    public function restore($id)
    {
        $street = Street::withTrashed()->findOrFail($id);

        $street->status = 1;
        $street->save();

        $street->restore();

        return redirect()->back()->with('success', __('Restore street successfully'));
    }
}
