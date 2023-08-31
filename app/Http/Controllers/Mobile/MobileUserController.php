<?php

namespace App\Http\Controllers\Mobile;

use App\Models\User;
use App\Models\House;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\MobileUserRegisterVerifyMail;
use App\Http\Requests\Mobile\MobileUserStoreRequest;
use App\Http\Requests\Mobile\MobileUserUpdateRequest;

class MobileUserController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:member user create,' . getGuardNameUser(), ['only' => ['create', 'store']]);
        $this->middleware('permission:member user delete,' . getGuardNameUser(), ['only' => ['destroy']]);
        $this->middleware('permission:member user index,' . getGuardNameUser(), ['only' => ['index', 'show', 'data']]);
        $this->middleware('permission:member user update,' . getGuardNameUser(), ['only' => ['edit', 'update']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::where([
            ['area_id', getLoggedUserAreaId()],
            ['status', 1],
            [function ($query) use ($request) {
                if (($search = $request->search)) {
                    $query->orWhere('name', 'LIKE', '%' . $search . '%')
                        ->orWhere('email', 'LIKE', '%' . $search . '%')
                        ->orWhere('gender', 'LIKE', '%' . $search . '%')
                        ->orWhere('marital_status', 'LIKE', '%' . $search . '%')
                        ->orWhere('place_of_birth', 'LIKE', '%' . $search . '%')
                        ->orWhere('profession', 'LIKE', '%' . $search . '%')
                        ->orWhere('workplace', 'LIKE', '%' . $search . '%')
                        ->orWhere('religion', 'LIKE', '%' . $search . '%')
                        ->orWhere('phone', 'LIKE', '%' . $search . '%')
                        ->orWhere('house_street_name', 'LIKE', '%' . $search . '%')
                        ->orWhere('house_block', 'LIKE', '%' . $search . '%')
                        ->orWhere('house_number', 'LIKE', '%' . $search . '%')
                        ->orWhere('house_address_others', 'LIKE', '%' . $search . '%')
                        ->orWhere('house_ownership', 'LIKE', '%' . $search . '%')
                        ->orWhere('house_stay', 'LIKE', '%' . $search . '%')
                        ->orWhere('house_note', 'LIKE', '%' . $search . '%')
                        ->orWhere('family_card_no', 'LIKE', '%' . $search . '%')
                        ->orWhere('id_card_no', 'LIKE', '%' . $search . '%')
                        ->get();
                }
            }]
        ])
        ->orderBy('name', 'ASC')->get();
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
    public function store(MobileUserStoreRequest $request)
    {
        $token = Str::random(64);

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
        $user->register_token = $token;
        if (!empty($request->flag_dues)) {
            $user->flag_dues = $request->flag_dues;
        } else {
            $user->flag_dues = 0;
        }
        $user->created_by = getLoggedUser()->name;
        $user->status = 1;
        $user->save();

        Mail::to($request->email)->send(new MobileUserRegisterVerifyMail($token, $request->email));

        return redirect()->route('mobile.user.index')->with('success', __('Created user successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        $houses = House::where('area_id', getLoggedUserAreaId())
            ->orderBy('block')
            ->orderBy('no')
            ->get();
        return view('mobile.user.show', compact('user', 'houses'));
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
        if (!empty($request->flag_dues)) {
            $user->flag_dues = $request->flag_dues;
        } else {
            $user->flag_dues = 0;
        }
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
        $user = User::findOrFail($id);

        $user->status = 0;
        $user->deleted_at = saveDateTimeNow();
        $user->deleted_by = getLoggedUser()->name;
        $user->save();

        // return redirect()->route('mobile.user.index')->with('success', __('Deleted user successfully'));
        return response()->json([
            'success' => true,
            'message' => __('Deleted user successfully'),
        ]);
    }
}
