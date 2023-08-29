<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bank;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminBankStoreRequest;
use App\Http\Requests\Admin\AdminBankUpdateRequest;

class AdminBankController extends Controller
{
    function __construct()
    {
        $this->middleware(['permission:bank admin create,' . getGuardNameAdmin()])->only(['create', 'store']);
        $this->middleware(['permission:bank admin delete,' . getGuardNameAdmin()])->only(['destroy']);
        $this->middleware(['permission:bank admin index,' . getGuardNameAdmin()])->only(['index', 'show', 'data']);
        $this->middleware(['permission:bank admin restore,' . getGuardNameAdmin()])->only(['restore']);
        $this->middleware(['permission:bank admin update,' . getGuardNameAdmin()])->only(['edit', 'update']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.bank.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.bank.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminBankStoreRequest $request)
    {
        $store = Bank::create([
            'code' => $request->code,
            'name' => $request->name,
            'type' => $request->type,
            'created_by' => getLoggedUser()->name,
        ]);

        if ($store) {
            return redirect()->route('admin.bank.index')->with('success', __('admin.Created bank successfully'));
        }
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
        $bank = Bank::findOrFail($id);
        return view('admin.bank.edit', compact('bank'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminBankUpdateRequest $request, string $id)
    {
        $bank = Bank::findOrFail($id);
        $update = $bank->update([
            'code' => $request->code,
            'name' => $request->name,
            'type' => $request->type,
            'updated_by' => getLoggedUser()->name,
        ]);

        if ($update) {
            return redirect()->route('admin.bank.index')->with('success', __('admin.Updated bank successfully'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $bank = Bank::findOrFail($id);

            $destroy = $bank->update([
                'status' => 0,
                'deleted_at' => saveDateTimeNow(),
                'deleted_by' => getLoggedUser()->name,
            ]);

            if ($destroy) {
                return response([
                    'status' => 'success',
                    'message' => __('admin.Deleted bank successfully')
                ]);
            }
        } catch (\Throwable $th) {
            return response([
                'status' => 'error',
                'message' => __('admin.Deleted bank is error')
            ]);
        }
    }

    public function restore($id)
    {
        $bank = Bank::findOrFail($id);

        $restore = $bank->update([
            'status' => 1,
            'restored_at' => saveDateTimeNow(),
            'restored_by' => getLoggedUser()->name,
        ]);

        if ($restore) {
            return redirect()->route('admin.bank.index')->with('success', __('admin.Restore bank successfully'));
        }
    }

    public function data(Request $request)
    {
        $query = Bank::orderBy('name');

        return datatables($query)
            ->addIndexColumn()
            ->editColumn('status', function ($query) {
                return '<div class="badge badge-' . setStatusBadge($query->status) . '">' . setStatusText($query->status) . '</div>';
            })
            ->addColumn('action', function ($query) {
                if ($query->status == 1) {
                    if (canAccess(['bank admin update'])) {
                        $update = '
                            <a href="' . route('admin.bank.edit', $query->id) . '" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                        ';
                    }
                    if (canAccess(['bank admin delete'])) {
                        $delete = '
                            <a href="' . route('admin.bank.destroy', $query->id) . '" class="btn btn-danger btn-sm delete_item">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        ';
                    }
                    return (!empty($update) ? $update : '') . (!empty($delete) ? $delete : '');
                } else {
                    if (canAccess(['bank admin restore'])) {
                        return '
                            <a href="' . route('admin.bank.restore', $query->id) . '" class="btn btn-warning btn-sm" data-toggle="tooltip" title="' . __('Restore to Active') . '">
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
