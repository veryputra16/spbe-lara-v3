<?php

namespace App\Http\Controllers;

use App\Models\Changelog;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreChangelogRequest;
use App\Http\Requests\UpdateChangelogRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChangelogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $changelogs = Changelog::all();

        return view('changelog.changelog-index', compact('changelogs'), [
            'title' => 'Change Log'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('changelog.changelog-create', [
            'title' => 'Change Log'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChangelogRequest $request)
    {
        DB::transaction(function () use ($request) {
            $validated = $request->validated();

            $newChangelog = Changelog::create($validated);
        });

        return redirect()->route('admin.changelog.index')->with('success', 'Data telah tersimpan dengan sukses!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Changelog $changelog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Changelog $changelog)
    {
        return view('changelog.changelog-edit', compact('changelog'), [
            'title' => 'Change Log'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChangelogRequest $request, Changelog $changelog)
    {
        DB::transaction(function () use ($request, $changelog) {
            $validated = $request->validated();

            $changelog->update($validated);
        });

        return redirect()->route('admin.changelog.index')->with('success', 'Perubahan data telah berhasil dilakukan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Changelog $changelog)
    {
        DB::transaction(function () use ($changelog) {
            $changelog->delete();
        });

        return redirect()->route('admin.changelog.index')->with('success', 'Penghapusan data sukses dilakukan.');
    }
}
