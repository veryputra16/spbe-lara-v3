<?php

namespace App\Http\Controllers;

use App\Models\Katdb;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKatdbRequest;
use App\Http\Requests\UpdateKatdbRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KatdbController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $katdbs = Katdb::all();

        return view('katdb.katdb-index', compact('katdbs'), [
            'title' => 'Kategori Database'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('katdb.katdb-create', [
            'title' => 'Kategori Database'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKatdbRequest $request)
    {
        DB::transaction(function () use ($request) {
            $validated = $request->validated();

            $newKatdb = Katdb::create($validated);
        });

        flash()->success('Data telah tersimpan dengan sukses!');
        return redirect()->route('masterapp.katdb.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Katdb $katdb)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Katdb $katdb)
    {
        return view('katdb.katdb-edit', compact('katdb'), [
            'title' => 'Kategori Database'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKatdbRequest $request, Katdb $katdb)
    {
        DB::transaction(function () use ($request, $katdb) {
            $validated = $request->validated();

            $katdb->update($validated);
        });

        flash()->success('Perubahan data telah berhasil dilakukan.');
        return redirect()->route('masterapp.katdb.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Katdb $katdb)
    {
        DB::transaction(function () use ($katdb) {
            $katdb->delete();
        });

        flash()->success('Penghapusan data sukses dilakukan.');
        return redirect()->route('masterapp.katdb.index');
    }
}
