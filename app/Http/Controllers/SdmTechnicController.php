<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSdmTeknisRequest;
use App\Http\Requests\UpdateSdmTeknisRequest;
use App\Models\Application;
use App\Models\Sdmteknic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SdmTechnicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Application $application)
    {
        // $sdmteknics = Sdmteknic::where('application_id', $application->id)->get();

        // return view('sdmteknis.sdmteknis-index', compact('application', 'sdmteknics'), [
        //     'title' => 'SDM Tenaga Teknis'
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Application $application)
    {
        return view('sdmteknis.sdmteknis-create', compact('application'), [
            'title' => 'SDM Tenaga Teknis'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSdmTeknisRequest $request)
    {
        DB::transaction(function () use ($request) {
            $validated = $request->validated();

            $newSdmteknis = Sdmteknic::create($validated);
        });

        return redirect()->route('admin.application.index')->with('success', 'Data telah tersimpan dengan sukses!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sdmteknic $sdmteknic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $application, Sdmteknic $sdmteknic)
    {
        return view('sdmteknis.sdmteknis-edit', compact('application', 'sdmteknic'), [
            'title' => 'SDM Tenaga Teknis'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Application $application, UpdateSdmTeknisRequest $request, Sdmteknic $sdmteknic)
    {
        DB::transaction(function () use ($request, $sdmteknic) {
            $validated = $request->validated();

            $sdmteknic->update($validated);
        });

        return redirect()->route('admin.application.index')->with('success', 'Perubahan data telah berhasil dilakukan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application, Sdmteknic $sdmteknic)
    {
        DB::transaction(function () use ($sdmteknic) {

            $sdmteknic->delete();
        });

        return redirect()->route('admin.application.index')->with('success', 'Penghapusan data sukses dilakukan.');
    }
}
