<?php

namespace App\Http\Controllers\Admin;

use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminLanguageStoreRequest;
use App\Http\Requests\Admin\AdminLanguageUpdateRequest;

class AdminLanguageController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:language create,' . getGuardNameAdmin(), ['only' => ['create', 'store']]);
        $this->middleware('permission:language delete,' . getGuardNameAdmin(), ['only' => ['destroy']]);
        $this->middleware('permission:language index,' . getGuardNameAdmin(), ['only' => ['index', 'show', 'data']]);
        $this->middleware('permission:language restore,' . getGuardNameAdmin(), ['only' => ['restore']]);
        $this->middleware('permission:language update,' . getGuardNameAdmin(), ['only' => ['edit', 'update']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.language.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.language.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminLanguageStoreRequest $request)
    {
        if ($request->default == 1) {
            Language::update(['default' => 0]);
        }

        $language = new Language();

        $language->name = $request->name;
        $language->lang = $request->lang;
        $language->slug = $request->slug;
        $language->default = $request->default;
        $language->created_by = getLoggedUser()->name;
        $language->status = $request->status;
        $language->save();

        return redirect()->route('admin.language.index')->with('success', __('admin.Created language successfully'));
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
        $language = Language::findOrFail($id);
        return view('admin.language.edit', compact('language'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminLanguageUpdateRequest $request, string $id)
    {
        if ($request->default == '1') {
            Language::where('status', '1')->update(['default' => '0']);
        }

        $language = Language::findOrFail($id);

        $language->name = $request->name;
        $language->lang = $request->lang;
        $language->slug = $request->slug;
        $language->default = $request->default;
        $language->updated_by = getLoggedUser()->name;
        $language->status = $request->status;
        $language->save();

        return redirect()->route('admin.language.index')->with('success', __('admin.Updated language successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $language = Language::findOrFail($id);

            if ($language->default == 1) {
                return response([
                    'status' => 'error',
                    'message' => __('admin.Cannot delete this language because is default')
                ]);
            }

            $language->status = 0;
            $language->deleted_at = saveDateTimeNow();
            $language->deleted_by = getLoggedUser()->name;
            $language->save();

            return response([
                'status' => 'success',
                'message' => __('admin.Deleted language successfully')
            ]);
        } catch (\Throwable $th) {
            return response([
                'status' => 'error',
                'message' => __('admin.Deleted language is error')
            ]);
        }
    }

    public function restore($id)
    {
        $language = Language::findOrFail($id);

        $language->status = 1;
        $language->restored_at = saveDateTimeNow();
        $language->restored_by = getLoggedUser()->name;
        $language->save();

        return redirect()->route('admin.language.index')->with('success', __('admin.Restore language successfully'));
    }

    public function data(Request $request)
    {
        $query = Language::orderBy('name', 'ASC');

        return datatables($query)
            ->addIndexColumn()
            ->editColumn('default', function ($query) {
                $default = $query->default == 1 ? __('Yes') : __('No');
                return '<div class="badge badge-' . setStatusBadge($query->default) . '">' . $default . '</div>';
            })
            ->editColumn('status', function ($query) {
                return '<div class="badge badge-' . setStatusBadge($query->status) . '">' . setStatusText($query->status) . '</div>';
            })
            ->addColumn('action', function ($query) {
                if ($query->default == 1) {
                    return '<div class="badge badge-danger">'  . __('No Action') . '</div>';
                } else {
                    if ($query->status == 1) {
                        if (canAccess(['language update'])) {
                            $update = '
                                <a href="' . route('admin.language.edit', $query->id) . '" class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                            ';
                        }
                        if (canAccess(['language delete'])) {
                            $delete = '
                                <a href="' . route('admin.language.destroy', $query->id) . '" class="btn btn-danger btn-sm delete_item">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            ';
                        }
                        return (!empty($update) ? $update : '') . (!empty($delete) ? $delete : '');
                    } else {
                        if (canAccess(['language restore'])) {
                            return '
                                <a href="' . route('admin.language.restore', $query->id) . '" class="btn btn-warning btn-sm" data-toggle="tooltip" title="' . __('Restore to Active') . '">
                                    <i class="fas fa-undo"></i>
                                </a>
                            ';
                        }
                    }
                }
            })
            ->rawColumns(['action'])
            ->escapeColumns([])
            ->make(true);
    }
}
