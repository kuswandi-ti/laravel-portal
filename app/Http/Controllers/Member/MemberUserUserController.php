<?php

namespace App\Http\Controllers\Member;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\MemberRegisterVerifyMail;
use App\Http\Requests\Member\MemberUserUserStoreRequest;
use App\Http\Requests\Member\MemberUserUserUpdateRequest;

class MemberUserUserController extends Controller
{
    public function index()
    {
        return view('member.user.index');
    }

    public function restore($id)
    {
        $user = User::findOrFail($id);

        $user->status = 1;
        $user->restored_at = saveDateTimeNow();
        $user->restored_by = getLoggedUser()->name;
        $user->save();

        return redirect()->route('member.user.index')->with('success', __('admin.Restore user successfully'));
    }

    public function data(Request $request)
    {
        $query = User::doesntHave('roles')
            ->where('area_id', getLoggedUserAreaId())
            ->where('status', 0)
            ->orderBy('name', 'ASC')->get();

        return datatables($query)
            ->addIndexColumn()
            ->editColumn('image', function ($query) {
                if (!empty($query->image)) {
                    return '<figure class="avatar"><img src="' . url(config('common.path_storage') . $query->image) . '"></figure>';
                } else {
                    return '<figure class="avatar"><img src="' . url(config('common.path_storage') . config('common.default_image_circle')) . '"></figure>';
                }
            })
            ->editColumn('status', function ($query) {
                return '<div class="badge badge-' . setStatusBadge($query->status) . '">' . setStatusText($query->status) . '</div>';
            })
            ->addColumn('action', function ($query) {
                if ($query->status == 0) {
                    return '
                        <a href="' . route('member.user.restore', $query->id) . '" class="btn btn-warning btn-sm" data-toggle="tooltip" title="' . __('admin.Restore to Active') . '">
                            <i class="fas fa-undo"></i>
                        </a>
                    ';
                }
            })
            ->rawColumns(['action'])
            ->escapeColumns([])
            ->make(true);
    }
}
