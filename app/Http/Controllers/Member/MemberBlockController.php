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
        $blocks_active = Block::where('area_id', getLoggedUserAreaId())->get();
        $blocks_inactive = Block::onlyTrashed()->where('area_id', getLoggedUserAreaId())->get();
        return view('member.block.index', compact('blocks_active', 'blocks_inactive'));
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
        $block->status = 1;
        $block->save();

        return redirect()->route('member.block.index')->with('success', __('Created block successfully'));
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
        ]);

        return redirect()->route('member.block.index')->with('success', __('Updated block successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $block = Block::findOrFail($id);

            $block->status = 0;
            $block->save();

            $block->delete();

            return response([
                'status' => 'success',
                'message' => __('Deleted block successfully')
            ]);
        } catch (\Throwable $th) {
            return response([
                'status' => 'error',
                'message' => __('Deleted block is error')
            ]);
        }
    }

    public function restore($id)
    {
        $block = Block::withTrashed()->findOrFail($id);

        $block->status = 1;
        $block->save();

        $block->restore();

        return redirect()->back()->with('success', __('Restore block successfully'));
    }
}
