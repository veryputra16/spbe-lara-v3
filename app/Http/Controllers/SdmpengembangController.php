<?php

namespace App\Http\Controllers;

use App\Models\Sdmpengembang;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVendorRequest;
use App\Http\Requests\UpdateVendorRequest;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SdmpengembangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Application $application)
    {
        $sdmpengembangs = Sdmpengembang::where('application_id', $application->id)->get();

        return view('sdmvendor.sdmvendor-index', compact('application', 'sdmpengembangs'), [
            'title' => 'Vendor'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Application $application)
    {
        return view('sdmvendor.sdmvendor-create', compact('application'), [
            'title' => 'Vendor'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVendorRequest $request)
    {
        DB::transaction(function () use ($request) {
            $validated = $request->validated();

            $newSdmpengembang = Sdmpengembang::create($validated);
        });

        return redirect()->route('admin.application.index')->with('success', 'Data telah tersimpan dengan sukses!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sdmpengembang $sdmpengembang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $application, Sdmpengembang $sdmpengembang)
    {
        return view('sdmvendor.sdmvendor-edit', compact('application', 'sdmpengembang'), [
            'title' => 'Vendor'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Application $application, UpdateVendorRequest $request, Sdmpengembang $sdmpengembang)
    {
        DB::transaction(function () use ($request, $sdmpengembang) {
            $validated = $request->validated();

            $sdmpengembang->update($validated);
        });

        return redirect()->route('admin.application.index')->with('success', 'Perubahan data telah berhasil dilakukan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application, Sdmpengembang $sdmpengembang)
    {
        DB::transaction(function () use ($sdmpengembang) {

            $sdmpengembang->delete();
        });

        return redirect()->route('admin.application.index')->with('success', 'Penghapusan data sukses dilakukan.');
    }
}
