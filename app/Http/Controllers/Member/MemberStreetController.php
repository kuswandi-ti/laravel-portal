<?php

namespace App\Http\Controllers\Member;

use App\Models\Street;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Member\MemberStreetStoreRequest;
use App\Http\Requests\Member\MemberStreetUpdateRequest;

class MemberStreetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('member.street.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('member.street.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MemberStreetStoreRequest $request)
    {
        $street = new Street();

        $street->name = $request->name;
        $street->slug = Str::slug($request->name);
        $street->area_id = getLoggedUser()->area->id;
        $street->created_by = getLoggedUser()->name;
        $street->status = 1;
        $street->save();

        return redirect()->route('member.street.index')->with('success', __('Created street successfully'));
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
        $street = Street::findOrFail($id);
        return view('member.street.edit', compact('street'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MemberStreetUpdateRequest $request, string $id)
    {
        $street = Street::findOrFail($id);
        $street->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'updated_by' => getLoggedUser()->name,
        ]);

        return redirect()->route('member.street.index')->with('success', __('Updated street successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $street = Street::findOrFail($id);

            $street->status = 0;
            $street->deleted_at = saveDateTimeNow();
            $street->deleted_by = getLoggedUser()->name;
            $street->save();

            return response([
                'status' => 'success',
                'message' => __('Deleted street successfully')
            ]);
        } catch (\Throwable $th) {
            return response([
                'status' => 'error',
                'message' => __('Deleted street is error')
            ]);
        }
    }

    public function restore($id)
    {
        $street = Street::findOrFail($id);

        $street->status = 1;
        $street->restored_at = saveDateTimeNow();
        $street->restored_by = getLoggedUser()->name;
        $street->save();

        return redirect()->route('member.street.index')->with('success', __('Restore street successfully'));
    }

    public function data(Request $request)
    {
        $query = Street::orderBy('name', 'ASC');

        return datatables($query)
            ->addIndexColumn()
            ->editColumn('status', function ($query) {
                return '<div class="badge badge-' . setStatusBadge($query->status) . '">' . setStatusText($query->status) . '</div>';
            })
            ->addColumn('action', function ($query) {
                if ($query->status == 1) {
                    return '
                        <a href="' . route('member.street.edit', $query->id) . '" class="btn btn-primary btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="' . route('member.street.destroy', $query->id) . '" class="btn btn-danger btn-sm delete_item">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    ';
                } else {
                    return '
                        <a href="' . route('member.street.restore', $query->id) . '" class="btn btn-warning btn-sm" data-toggle="tooltip" title="' . __('Restore to Active') . '">
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
