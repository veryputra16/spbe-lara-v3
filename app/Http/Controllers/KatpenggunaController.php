<?php

namespace App\Http\Controllers;

use App\Models\Katpengguna;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePenggunaRequest;
use App\Http\Requests\UpdatePenggunaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KatpenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $katpenggunas = Katpengguna::all();

        return view('katpengguna.katpengguna-index', compact('katpenggunas'), [
            'title' => 'Kategori Penggunaan'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('katpengguna.katpengguna-create', [
            'title' => 'Kategori Penggunaan'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePenggunaRequest $request)
    {
        DB::transaction(function () use ($request) {
            $validated = $request->validated();

            $newKatpengguna = Katpengguna::create($validated);
        });

        flash()->success('Data telah tersimpan dengan sukses!');
        return redirect()->route('masterapp.katpengguna.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Katpengguna $katpengguna)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Katpengguna $katpengguna)
    {
        return view('katpengguna.katpengguna-edit', compact('katpengguna'), [
            'title' => 'Kategori Penggunaan'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePenggunaRequest $request, Katpengguna $katpengguna)
    {
        DB::transaction(function () use ($request, $katpengguna) {
            $validated = $request->validated();

            $katpengguna->update($validated);
        });

        flash()->success('Perubahan data telah berhasil dilakukan.');
        return redirect()->route('masterapp.katpengguna.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Katpengguna $katpengguna)
    {
        DB::transaction(function () use ($katpengguna) {
            $katpengguna->delete();
        });

        flash()->success('Penghapusan data sukses dilakukan.');
        return redirect()->route('masterapp.katpengguna.index');
    }
}
