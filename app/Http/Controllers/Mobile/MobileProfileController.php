<?php

namespace App\Http\Controllers\Mobile;

use App\Models\User;
use App\Models\Religion;
use App\Models\Profession;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;
use App\Http\Controllers\Controller;
use KodePandai\Indonesia\Models\City;
use App\Http\Requests\Mobile\MobileProfileDataUpdateRequest;

class MobileProfileController extends Controller
{
    use FileUploadTrait;

    public function indexProfileData()
    {
        $user = getLoggedUser();
        $cities = City::orderBy('name')->get()->pluck('name', 'name');
        $religions = Religion::orderBy('id')->get()->pluck('name', 'name');
        $professions = Profession::orderBy('name')->get()->pluck('name', 'name');
        return view('mobile.profile.data', compact('user', 'cities', 'religions', 'professions'));
    }

    public function indexProfileImage()
    {
        $user = getLoggedUser();
        return view('mobile.profile.image', compact('user'));
    }

    public function updateProfileData(MobileProfileDataUpdateRequest $request, string $id)
    {
        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->slug = Str::slug($request->name);
        if (!empty($request->gender)) {
            $user->gender = $request->gender;
        }
        if (!empty($request->marital_status)) {
            $user->marital_status = $request->marital_status;
        }
        $user->date_of_birth = $request->date_of_birth;
        if (!empty($request->place_of_birth)) {
            $user->place_of_birth = $request->place_of_birth;
        }
        if (!empty($request->profession)) {
            $user->profession = $request->profession;
        }
        $user->workplace = $request->workplace;
        if (!empty($request->religion)) {
            $user->religion = $request->religion;
        }
        $user->phone = $request->phone;
        $user->house_address_others = $request->house_address_others;
        if (!empty($request->house_ownership)) {
            $user->house_ownership = $request->house_ownership;
        }
        if (!empty($request->house_stay)) {
            $user->house_stay = $request->house_stay;
        }
        $user->house_note = $request->house_note;
        $user->family_card_no = $request->family_card_no;
        $user->id_card_no = $request->id_card_no;
        $user->updated_by = getLoggedUser()->name;

        $user->save();

        return redirect()->back()->with('success', __('Update profile successfully'));
    }

    public function updateProfileImage(Request $request, string $id)
    {
        $imagePath = $this->handleImageUpload($request, 'image', $request->old_image, 'mobile_profile');

        $user = User::findOrFail($id);

        $user->image = !empty($imagePath) ? $imagePath : $request->old_image;

        $user->save();

        return redirect()->back()->with('success', __('Update profile successfully'));
    }
}
