<?php

namespace App\Http\Controllers\Mobile;

use App\Models\User;
use App\Models\House;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Mobile\MobileUserCreateRequest;
use App\Http\Requests\Mobile\MobileUserUpdateRequest;

class MobileUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('area_id', getLoggedUserAreaId())->orderBy('name', 'ASC')->get();
        return view('mobile.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $houses = House::where('area_id', getLoggedUserAreaId())
            ->orderBy('block')
            ->orderBy('no')
            ->get();
        return view('mobile.user.create', compact('houses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MobileUserCreateRequest $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->slug = Str::slug($request->name);
        $user->email = $request->email;
        $user->house_street_name = $request->street;
        $user->house_block = $request->block;
        $user->house_number = $request->no;
        $user->image = config('common.default_image_circle');
        $user->area_id = getLoggedUser()->area->id;
        $user->house_id = $request->house;
        $user->created_by = getLoggedUser()->name;
        $user->status = 1;
        $user->save();

        // $token = Str::random(64);
        // Mail::to($request->email)->send(new MemberRegisterVerifyMail($token));

        return redirect()->route('mobile.user.index')->with('success', __('Created user successfully'));
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
        $user = User::findOrFail($id);
        $houses = House::where('area_id', getLoggedUserAreaId())
            ->orderBy('block')
            ->orderBy('no')
            ->get();
        return view('mobile.user.edit', compact('user', 'houses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MobileUserUpdateRequest $request, string $id)
    {
        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->slug = Str::slug($request->name);
        $user->email = $request->email;
        $user->house_street_name = $request->street;
        $user->house_block = $request->block;
        $user->house_number = $request->no;
        $user->image = config('common.default_image_circle');
        $user->area_id = getLoggedUser()->area->id;
        $user->house_id = $request->house;
        $user->updated_by = getLoggedUser()->name;
        $user->status = 1;
        $user->save();

        return redirect()->route('mobile.user.index')->with('success', __('Updated user successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
