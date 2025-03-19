<?php

namespace App\Http\Controllers;

use App\Models\Katserver;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServerRequest;
use App\Http\Requests\UpdateServerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KatserverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $katservers = Katserver::all();

        return view('katserver.katserver-index', compact('katservers'), [
            'title' => 'Kategori Server'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('katserver.katserver-create', [
            'title' => 'Kategori Server'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServerRequest $request)
    {
        DB::transaction(function () use ($request) {
            $validated = $request->validated();

            $newKatserver = Katserver::create($validated);
        });

        return redirect()->route('masterapp.katserver.index')->with('success', 'Data telah tersimpan dengan sukses!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Katserver $katserver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Katserver $katserver)
    {
        return view('katserver.katserver-edit', compact('katserver'), [
            'title' => 'Kategori Server'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServerRequest $request, Katserver $katserver)
    {
        DB::transaction(function () use ($request, $katserver) {
            $validated = $request->validated();

            $katserver->update($validated);
        });

        return redirect()->route('masterapp.katserver.index')->with('success', 'Perubahan data telah berhasil dilakukan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Katserver $katserver)
    {
        DB::transaction(function () use ($katserver) {
            $katserver->delete();
        });

        return redirect()->route('masterapp.katserver.index')->with('success', 'Penghapusan data sukses dilakukan.');
    }
}
