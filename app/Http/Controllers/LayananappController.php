<?php

namespace App\Http\Controllers;

use App\Models\Layananapp;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLayananappRequest;
use App\Http\Requests\UpdateLayananappRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LayananappController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $layananapps = Layananapp::all();

        return view('layananapp.layananapp-index', compact('layananapps'), [
            'title' => 'Layanan Aplikasi'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layananapp.layananapp-create', [
            'title' => 'Layanan Aplikasi'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLayananappRequest $request)
    {
        DB::transaction(function () use ($request) {
            $validated = $request->validated();

            $newLayananapp = Layananapp::create($validated);
        });

        flash()->success('Data telah tersimpan dengan sukses!');
        return redirect()->route('masterapp.layananapp.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Layananapp $layananapp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Layananapp $layananapp)
    {
        return view('layananapp.layananapp-edit', compact('layananapp'), [
            'title' => 'Layanan Aplikasi'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLayananappRequest $request, Layananapp $layananapp)
    {
        DB::transaction(function () use ($request, $layananapp) {
            $validated = $request->validated();

            $layananapp->update($validated);
        });

        flash()->success('Perubahan data telah berhasil dilakukan.');
        return redirect()->route('masterapp.layananapp.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Layananapp $layananapp)
    {
        DB::transaction(function () use ($layananapp) {
            $layananapp->delete();
        });

        flash()->success('Penghapusan data sukses dilakukan.');
        return redirect()->route('masterapp.layananapp.index');
    }
}
