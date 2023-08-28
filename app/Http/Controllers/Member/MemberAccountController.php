<?php

namespace App\Http\Controllers\Member;

use App\Models\Account;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberAccountController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:account restore,' . getGuardNameMember(), ['only' => ['restore', 'data']]);
    }

    public function index()
    {
        return view('member.account.index');
    }

    public function restore($id)
    {
        $account = Account::findOrFail($id);

        $account->status = 1;
        $account->restored_at = saveDateTimeNow();
        $account->restored_by = getLoggedUser()->name;
        $account->save();

        return redirect()->route('member.account.index')->with('success', __('admin.Restore account successfully'));
    }

    public function data(Request $request)
    {
        $query = Account::where('area_id', getLoggedUserAreaId())
            ->where('status', 0)
            ->orderBy('name', 'ASC')->get();

        return datatables($query)
            ->addIndexColumn()
            ->editColumn('status', function ($query) {
                return '<div class="badge badge-' . setStatusBadge($query->status) . '">' . setStatusText($query->status) . '</div>';
            })
            ->addColumn('action', function ($query) {
                if ($query->status == 0) {
                    if (canAccess(['account restore'])) {
                        return '
                            <a href="' . route('member.account.restore', $query->id) . '" class="btn btn-warning btn-sm" data-toggle="tooltip" title="' . __('Restore to Active') . '">
                                <i class="fas fa-undo"></i>
                            </a>
                        ';
                    }
                }
            })
            ->rawColumns(['action'])
            ->escapeColumns([])
            ->make(true);
    }
}
