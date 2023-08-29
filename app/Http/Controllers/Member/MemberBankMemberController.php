<?php

namespace App\Http\Controllers\Member;

use App\Models\BankMember;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberBankMemberController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:bank member restore,' . getGuardNameMember(), ['only' => ['restore', 'data']]);
    }

    public function index()
    {
        return view('member.bank_member.index');
    }

    public function restore($id)
    {
        $bank_member = BankMember::findOrFail($id);

        $restore = $bank_member->update([
            'status' => 1,
            'restored_at' => saveDateTimeNow(),
            'restored_by' => getLoggedUser()->name,
        ]);

        if ($restore) {
            return redirect()->route('admin.bank_member.index')->with('success', __('admin.Restore bank successfully'));
        }
    }

    public function data(Request $request)
    {
        $query = BankMember::where('area_id', getLoggedUserAreaId())
            ->where('status', 0)
            ->orderBy('bank_code', 'ASC')->get();

        return datatables($query)
            ->addIndexColumn()
            ->editColumn('status', function ($query) {
                return '<div class="badge badge-' . setStatusBadge($query->status) . '">' . setStatusText($query->status) . '</div>';
            })
            ->addColumn('action', function ($query) {
                if ($query->status == 0) {
                    if (canAccess(['bank member restore'])) {
                        return '
                            <a href="' . route('member.bank_member.restore', $query->id) . '" class="btn btn-warning btn-sm" data-toggle="tooltip" title="' . __('Restore to Active') . '">
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
