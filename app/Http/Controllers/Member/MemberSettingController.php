<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use KodePandai\Indonesia\Models\City;
use KodePandai\Indonesia\Models\Village;
use Spatie\Permission\Models\Permission;
use KodePandai\Indonesia\Models\District;
use KodePandai\Indonesia\Models\Province;

class MemberSettingController extends Controller
{
    public function index()
    {
        $provinces = Province::orderBy('name')->get()->pluck('name', 'code');
        $permissions = Permission::where('guard_name', 'member')->get()->groupBy('group_name');
        return view('member.setting.index', compact('provinces', 'permissions'));
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
