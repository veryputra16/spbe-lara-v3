<?php

namespace App\Http\Controllers;

use App\Models\Bahasaprogram;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBahasaprogramRequest;
use App\Http\Requests\UpdateBahasaprogramRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BahasaprogramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bhsprograms = Bahasaprogram::all();

        return view('bhsprogram.bhsprogram-index', compact('bhsprograms'), [
            'title' => 'Bahasa Pemrograman'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bhsprogram.bhsprogram-create', [
            'title' => 'Bahasa Pemrograman'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBahasaprogramRequest $request)
    {
        DB::transaction(function () use ($request) {
            $validated = $request->validated();

            $newBhsprogram = Bahasaprogram::create($validated);
        });

        return redirect()->route('masterapp.bahasaprogram.index')->with('success', 'Data telah tersimpan dengan sukses!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bahasaprogram $bahasaprogram)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bahasaprogram $bahasaprogram)
    {
        return view('bhsprogram.bhsprogram-edit', compact('bahasaprogram'), [
            'title' => 'Bahasa Pemrograman'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBahasaprogramRequest $request, Bahasaprogram $bahasaprogram)
    {
        DB::transaction(function () use ($request, $bahasaprogram) {
            $validated = $request->validated();

            $bahasaprogram->update($validated);
        });

        return redirect()->route('masterapp.bahasaprogram.index')->with('success', 'Perubahan data telah berhasil dilakukan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bahasaprogram $bahasaprogram)
    {
        DB::transaction(function () use ($bahasaprogram) {
            $bahasaprogram->delete();
        });

        return redirect()->route('masterapp.bahasaprogram.index')->with('success', 'Penghapusan data sukses dilakukan.');
    }
}
