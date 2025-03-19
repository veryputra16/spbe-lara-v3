<?php

namespace App\Http\Controllers;

use App\Models\Katapp;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKatappRequest;
use App\Http\Requests\UpdateKatappRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KatappController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $katapps = Katapp::all();

        return view('katapp.katapp-index', compact('katapps'), [
            'title' => 'Kategori Aplikasi'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('katapp.katapp-create', [
            'title' => 'Kategori Aplikasi'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKatappRequest $request)
    {
        DB::transaction(function () use ($request) {
            $validated = $request->validated();

            $newKatapp = Katapp::create($validated);
        });

        return redirect()->route('masterapp.katapp.index')->with('success', 'Data telah tersimpan dengan sukses!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Katapp $katapp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Katapp $katapp)
    {
        return view('katapp.katapp-edit', compact('katapp'), [
            'title' => 'Kategori Aplikasi'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKatappRequest $request, Katapp $katapp)
    {
        DB::transaction(function () use ($request, $katapp) {
            $validated = $request->validated();

            $katapp->update($validated);
        });

        return redirect()->route('masterapp.katapp.index')->with('success', 'Perubahan data telah berhasil dilakukan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Katapp $katapp)
    {
        DB::transaction(function () use ($katapp) {
            $katapp->delete();
        });

        return redirect()->route('masterapp.katapp.index')->with('success', 'Penghapusan data sukses dilakukan.');
    }
}
