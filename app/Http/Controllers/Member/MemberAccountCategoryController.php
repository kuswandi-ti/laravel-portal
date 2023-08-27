<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\AccountCategory;
use Illuminate\Http\Request;

class MemberAccountCategoryController extends Controller
{
    public function index()
    {
        return view('member.account_category.index');
    }

    public function restore($id)
    {
        $account_category = AccountCategory::findOrFail($id);

        $account_category->status = 1;
        $account_category->restored_at = saveDateTimeNow();
        $account_category->restored_by = getLoggedUser()->name;
        $account_category->save();

        return redirect()->route('member.account_category.index')->with('success', __('admin.Restore account category successfully'));
    }

    public function data(Request $request)
    {
        $query = AccountCategory::where('area_id', getLoggedUserAreaId())
            ->where('status', 0)
            ->orderBy('name', 'ASC')->get();

        return datatables($query)
            ->addIndexColumn()
            ->editColumn('status', function ($query) {
                return '<div class="badge badge-' . setStatusBadge($query->status) . '">' . setStatusText($query->status) . '</div>';
            })
            ->addColumn('action', function ($query) {
                if ($query->status == 0) {
                    return '
                        <a href="' . route('member.account_category.restore', $query->id) . '" class="btn btn-warning btn-sm" data-toggle="tooltip" title="' . __('admin.Restore to Active') . '">
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
