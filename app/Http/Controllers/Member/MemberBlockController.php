<?php

namespace App\Http\Controllers\Member;

use App\Models\Block;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Member\MemberBlockStoreRequest;
use App\Http\Requests\Member\MemberBlockUpdateRequest;

class MemberBlockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('member.block.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('member.block.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MemberBlockStoreRequest $request)
    {
        $block = new Block();

        $block->name = $request->name;
        $block->slug = Str::slug($request->name);
        $block->area_id = getLoggedUserAreaId();
        $block->created_by = getLoggedUser()->name;
        $block->status = 1;
        $block->save();

        return redirect()->route('member.block.index')->with('success', __('admin.Created block successfully'));
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
        $block = Block::findOrFail($id);
        return view('member.block.edit', compact('block'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MemberBlockUpdateRequest $request, string $id)
    {
        $block = Block::findOrFail($id);
        $block->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'updated_by' => getLoggedUser()->name,
        ]);

        return redirect()->route('member.block.index')->with('success', __('admin.Updated block successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $block = Block::findOrFail($id);

            $block->status = 0;
            $block->deleted_at = saveDateTimeNow();
            $block->deleted_by = getLoggedUser()->name;
            $block->save();

            return response([
                'status' => 'success',
                'message' => __('admin.Deleted block successfully')
            ]);
        } catch (\Throwable $th) {
            return response([
                'status' => 'error',
                'message' => __('admin.Deleted block is error')
            ]);
        }
    }

    public function restore($id)
    {
        $block = Block::findOrFail($id);

        $block->status = 1;
        $block->restored_at = saveDateTimeNow();
        $block->restored_by = getLoggedUser()->name;
        $block->save();

        return redirect()->route('member.block.index')->with('success', __('admin.Restore block successfully'));
    }

    public function data(Request $request)
    {
        $query = Block::where('area_id', getLoggedUser()->area->id)->orderBy('name', 'ASC');

        return datatables($query)
            ->addIndexColumn()
            ->editColumn('status', function ($query) {
                return '<div class="badge badge-' . setStatusBadge($query->status) . '">' . setStatusText($query->status) . '</div>';
            })
            ->addColumn('action', function ($query) {
                if ($query->status == 1) {
                    return '
                        <a href="' . route('member.block.edit', $query->id) . '" class="btn btn-primary btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="' . route('member.block.destroy', $query->id) . '" class="btn btn-danger btn-sm delete_item">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    ';
                } else {
                    return '
                        <a href="' . route('member.block.restore', $query->id) . '" class="btn btn-warning btn-sm" data-toggle="tooltip" title="' . __('admin.Restore to Active') . '">
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
