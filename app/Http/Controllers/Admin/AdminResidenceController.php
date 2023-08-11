<?php

namespace App\Http\Controllers\Admin;

use App\Models\Residence;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use KodePandai\Indonesia\Models\City;
use KodePandai\Indonesia\Models\Village;
use KodePandai\Indonesia\Models\District;
use KodePandai\Indonesia\Models\Province;
use App\Http\Requests\Admin\AdminResidenceStoreRequest;
use App\Http\Requests\Admin\AdminResidenceUpdateRequest;

class AdminResidenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $residences_active = Residence::all();
        $residences_inactive = Residence::onlyTrashed()->get();
        return view('admin.residence.index', compact('residences_active', 'residences_inactive'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $provinces = Province::orderBy('name')->get()->pluck('name', 'code');
        return view('admin.residence.create', compact('provinces'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminResidenceStoreRequest $request)
    {
        $residence = new Residence();

        $residence->name = $request->name;
        $residence->slug = Str::slug($request->name);
        $residence->province_code = $request->province;
        $residence->city_code = $request->city;
        $residence->district_code = $request->district;
        $residence->village_code = $request->village;
        $residence->address = $request->address;
        $residence->status = 1;
        $residence->save();

        return redirect()->route('admin.residence.index')->with('success', __('Created residence successfully'));
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
        $residence = Residence::findOrFail($id);
        $provinces = Province::orderBy('name')->get()->pluck('name', 'code');
        $cities = City::where('province_code', $residence->province_code)->orderBy('name')->get()->pluck('name', 'code');
        $districts = District::where('city_code', $residence->city_code)->orderBy('name')->get()->pluck('name', 'code');
        $villages = Village::where('district_code', $residence->district_code)->orderBy('name')->get()->pluck('name', 'code');
        return view('admin.residence.edit', compact('residence', 'provinces', 'cities', 'districts', 'villages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminResidenceUpdateRequest $request, string $id)
    {
        $residence = Residence::findOrFail($id);
        $residence->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'province_code' => $request->province,
            'city_code' => $request->city,
            'district_code' => $request->district,
            'village_code' => $request->village,
            'address' => $request->address,
            'status' => 1,
        ]);

        return redirect()->route('admin.residence.index')->with('success', __('Updated residence successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $residence = Residence::findOrFail($id);
            $residence->delete();
            return response([
                'status' => 'success',
                'message' => __('Deleted residence successfully')
            ]);
        } catch (\Throwable $th) {
            return response([
                'status' => 'error',
                'message' => __('Deleted residence is error')
            ]);
        }
    }

    public function restore($id)
    {
        Residence::withTrashed()->find($id)->restore();

        return redirect()->back()->with('success', __('Restore residence successfully'));
    }

    public function getCities(Request $request)
    {
        $data['cities'] = City::orderBy('name')->where("province_code", $request->province_code)->get(["name", "code"]);
        return response()->json($data);
    }

    public function getDistricts(Request $request)
    {
        $data['districts'] = District::orderBy('name')->where("city_code", $request->city_code)->get(["name", "code"]);
        return response()->json($data);
    }

    public function getVillages(Request $request)
    {
        $data['villages'] = Village::orderBy('name')->where("district_code", $request->district_code)->get(["name", "code"]);
        return response()->json($data);
    }
}
