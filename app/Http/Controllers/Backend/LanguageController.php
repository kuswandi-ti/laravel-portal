<?php

namespace App\Http\Controllers\Backend;

use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLanguageStoreRequest;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.language.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.language.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminLanguageStoreRequest $request)
    {
        $language = new Language();

        $language->name = $request->name;
        $language->lang = $request->lang;
        $language->slug = $request->slug;
        $language->default = $request->default;
        $language->status = $request->status;
        $language->save();

        return redirect()->route('backend.language.index')->with('success', __('Created language successfully'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
