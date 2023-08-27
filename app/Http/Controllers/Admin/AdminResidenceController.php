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
    function __construct()
    {
        $this->middleware(['permission:residence create,' . getGuardNameAdmin()])->only(['create', 'store']);
        $this->middleware(['permission:residence delete,' . getGuardNameAdmin()])->only(['destroy']);
        $this->middleware(['permission:residence index,' . getGuardNameAdmin()])->only(['index', 'show', 'data']);
        $this->middleware(['permission:residence restore,' . getGuardNameAdmin()])->only(['restore']);
        $this->middleware(['permission:residence update,' . getGuardNameAdmin()])->only(['edit', 'update']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.residence.index');
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
        $residence->created_by = getLoggedUser()->name;
        $residence->save();

        return redirect()->route('admin.residence.index')->with('success', __('admin.Created residence successfully'));
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
            'updated_by' => getLoggedUser()->name,
            'status' => 1,
        ]);

        return redirect()->route('admin.residence.index')->with('success', __('admin.Updated residence successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $residence = Residence::findOrFail($id);

            $residence->status = 0;
            $residence->deleted_at = saveDateTimeNow();
            $residence->deleted_by = getLoggedUser()->name;
            $residence->save();

            return response([
                'status' => 'success',
                'message' => __('admin.Deleted residence successfully')
            ]);
        } catch (\Throwable $th) {
            return response([
                'status' => 'error',
                'message' => __('admin.Deleted residence is error')
            ]);
        }
    }

    public function restore($id)
    {
        $residence = Residence::findOrFail($id);

        $residence->status = 1;
        $residence->restored_at = saveDateTimeNow();
        $residence->restored_by = getLoggedUser()->name;
        $residence->save();

        return redirect()->route('admin.residence.index')->with('success', __('admin.Restore residence successfully'));
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

    public function data(Request $request)
    {
        $query = Residence::orderBy('name');

        return datatables($query)
            ->addIndexColumn()
            ->editColumn('status', function ($query) {
                return '<div class="badge badge-' . setStatusBadge($query->status) . '">' . setStatusText($query->status) . '</div>';
            })
            ->addColumn('action', function ($query) {
                if ($query->status == 1) {
                    if (canAccess(['residence update'])) {
                        $update = '
                            <a href="' . route('admin.residence.edit', $query->id) . '" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                        ';
                    }
                    if (canAccess(['residence delete'])) {
                        $delete = '
                            <a href="' . route('admin.residence.destroy', $query->id) . '" class="btn btn-danger btn-sm delete_item">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        ';
                    }
                    return (!empty($update) ? $update : '') . (!empty($delete) ? $delete : '');
                } else {
                    if (canAccess(['residence restore'])) {
                        return '
                            <a href="' . route('admin.residence.restore', $query->id) . '" class="btn btn-warning btn-sm" data-toggle="tooltip" title="' . __('Restore to Active') . '">
                                <i class="fas fa-undo"></i>
                            </a>
                        ';
                    }
                }
            })
            ->rawColumns(['status', 'action'])
            ->escapeColumns([])
            ->make(true);
    }
}
