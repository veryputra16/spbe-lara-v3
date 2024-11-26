<?php

namespace App\Http\Controllers;

use App\Models\Frameworkapp;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFrameworkRequest;
use App\Http\Requests\UpdateFrameworkRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrameworkappController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $frameworkapps = Frameworkapp::all();

        return view('framework.framework-index', compact('frameworkapps'), [
            'title' => 'Framework Aplikasi'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('framework.framework-create', [
            'title' => 'Framework Aplikasi'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFrameworkRequest $request)
    {
        DB::transaction(function () use ($request) {
            $validated = $request->validated();

            $newFrameworkapp = Frameworkapp::create($validated);
        });

        flash()->success('Data telah tersimpan dengan sukses!');
        return redirect()->route('masterapp.frameworkapp.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Frameworkapp $frameworkapp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Frameworkapp $frameworkapp)
    {
        return view('framework.framework-edit', compact('frameworkapp'), [
            'title' => 'Framework Aplikasi'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFrameworkRequest $request, Frameworkapp $frameworkapp)
    {
        DB::transaction(function () use ($request, $frameworkapp) {
            $validated = $request->validated();

            $frameworkapp->update($validated);
        });

        flash()->success('Perubahan data telah berhasil dilakukan.');
        return redirect()->route('masterapp.frameworkapp.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Frameworkapp $frameworkapp)
    {
        DB::transaction(function () use ($frameworkapp) {
            $frameworkapp->delete();
        });

        flash()->success('Penghapusan data sukses dilakukan.');
        return redirect()->route('masterapp.frameworkapp.index');
    }
}
