<?php

namespace App\Http\Controllers\Member;

use App\Models\Block;
use App\Models\House;
use App\Models\Street;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Member\MemberHouseStoreRequest;
use App\Http\Requests\Member\MemberHouseUpdateRequest;

class MemberHouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('member.house.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $streets = Street::where([
            ['area_id', getLoggedUserAreaId()],
        ])->orderBy('name')->pluck('name', 'name');
        $blocks = Block::where([
            ['area_id', getLoggedUserAreaId()],
        ])->orderBy('name')->pluck('name', 'name');
        return view('member.house.create', compact('streets', 'blocks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MemberHouseStoreRequest $request)
    {
        $house = new House();

        $house->owner_name = $request->owner_name;
        $house->street = $request->street;
        $house->block = $request->block;
        $house->no = $request->no;
        $house->address_info = $request->address_info;
        $house->area_id = getLoggedUserAreaId();
        $house->created_by = getLoggedUser()->name;
        $house->status = 1;
        $house->save();

        return redirect()->route('member.house.index')->with('success', __('Created house successfully'));
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
        $house = House::findOrFail($id);
        $streets = Street::where([
            ['area_id', getLoggedUserAreaId()],
        ])->orderBy('name')->pluck('name', 'name');
        $blocks = Block::where([
            ['area_id', getLoggedUserAreaId()],
        ])->orderBy('name')->pluck('name', 'name');

        return view('member.house.edit', compact('house', 'streets', 'blocks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MemberHouseUpdateRequest $request, string $id)
    {
        $house = House::findOrFail($id);
        $house->update([
            'owner_name' => $request->owner_name,
            'street' => $request->street,
            'block' => $request->block,
            'no' => $request->no,
            'address_info' => $request->address_info,
            'updated_by' => getLoggedUser()->name,
            'status' => 1,
        ]);

        return redirect()->route('member.house.index')->with('success', __('Updated house successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $house = House::findOrFail($id);

            $house->status = 0;
            $house->deleted_at = saveDateTimeNow();
            $house->deleted_by = getLoggedUser()->name;
            $house->save();

            return response([
                'status' => 'success',
                'message' => __('Deleted house successfully')
            ]);
        } catch (\Throwable $th) {
            return response([
                'status' => 'error',
                'message' => __('Deleted house is error')
            ]);
        }
    }

    public function restore($id)
    {
        $house = House::findOrFail($id);

        $house->status = 1;
        $house->restored_at = saveDateTimeNow();
        $house->restored_by = getLoggedUser()->name;
        $house->save();

        return redirect()->route('member.house.index')->with('success', __('Restore house successfully'));
    }

    public function data(Request $request)
    {
        $query = House::orderBy('street', 'ASC')
            ->orderBy('block', 'ASC')
            ->orderBy('no', 'ASC')
            ->orderBy('owner_name', 'ASC');

        return datatables($query)
            ->addIndexColumn()
            ->editColumn('status', function ($query) {
                return '<div class="badge badge-' . setStatusBadge($query->status) . '">' . setStatusText($query->status) . '</div>';
            })
            ->addColumn('action', function ($query) {
                if ($query->status == 1) {
                    return '
                        <a href="' . route('member.house.edit', $query->id) . '" class="btn btn-primary btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="' . route('member.house.destroy', $query->id) . '" class="btn btn-danger btn-sm delete_item">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    ';
                } else {
                    return '
                        <a href="' . route('member.house.restore', $query->id) . '" class="btn btn-warning btn-sm" data-toggle="tooltip" title="' . __('Restore to Active') . '">
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
