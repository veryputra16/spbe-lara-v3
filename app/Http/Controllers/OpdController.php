<?php

namespace App\Http\Controllers;

use App\Models\Opd;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOpdRequest;
use App\Http\Requests\UpdateOpdRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OpdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $opds = Opd::all();

        return view('opd.opd-index', compact('opds'), [
            'title' => 'Perangkat Daerah'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('opd.opd-create', [
            'title' => 'Perangkat Daerah'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOpdRequest $request)
    {
        DB::transaction(function () use ($request) {
            $validated = $request->validated();

            $newopd = Opd::create($validated);
        });

        flash()->success('Data telah tersimpan dengan sukses!');
        return redirect()->route('settings.opd.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Opd $opd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Opd $opd)
    {
        return view('opd.opd-edit', compact('opd'), [
            'title' => 'Perangkat Daerah'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOpdRequest $request, Opd $opd)
    {
        DB::transaction(function () use ($request, $opd) {
            $validated = $request->validated();

            $opd->update($validated);
        });

        flash()->success('Perubahan data telah berhasil dilakukan.');
        return redirect()->route('settings.opd.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Opd $opd)
    {
        DB::transaction(function () use ($opd) {
            $opd->delete();
        });

        flash()->success('Penghapusan data sukses dilakukan.');
        return redirect()->route('settings.opd.index');
    }
}
