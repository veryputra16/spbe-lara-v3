<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAppLainRequest;
use App\Http\Requests\UpdateAppLainRequest;
use App\Models\Application;
use App\Models\Katapp;
use App\Models\Katpengguna;
use App\Models\Katserver;
use App\Models\Layananapp;
use App\Models\Monevapp;
use App\Models\Opd;
use App\Models\Sdmteknic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AppLainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->hasAnyRole(['operator-aplikasi', 'viewer-aplikasi'])) {
            $applains = Application::where('katapp_id', 4)->get();
        } else {
            $applains = Application::where('katapp_id', 4)->get();
        }

        return view('applain.applain-index', compact('applains'), [
            'title' => 'Aplikasi Lainnya'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $opds = Opd::all();
        $katpenggunas = Katpengguna::all();
        $katservers = Katserver::all();
        $layananapps = Layananapp::all();
        $katapps = Katapp::where('id', 4)->get();
        // $noRegis = Str::upper(Str::random(8));

        return view('applain.applain-create', compact('opds', 'katpenggunas', 'katservers', 'layananapps', 'katapps'), [
            'title' => 'Aplikasi Lainnya'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAppLainRequest $request)
    {
        DB::transaction(function () use ($request) {
            $validated = $request->validated();

            // $validated['no_regis_app'] = Str::upper(Str::random(12));

            if ($request->hasFile('dasar_hukum')) {
                $dasar_hukumPath = $request->file('dasar_hukum')->store('aplikasi/dasar-hukums', 'public');
                $validated['dasar_hukum'] = $dasar_hukumPath;
            }

            $newAppLain = Application::create($validated);
        });

        return redirect()->route('admin.applain.index')->with('success', 'Data telah tersimpan dengan sukses!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Application $applain)
    {
        $monevapps = Monevapp::where('application_id', $applain->id)->get();
        $sdmteknics = Sdmteknic::where('application_id', $applain->id)->get();

        return view('applain.applain-detail', compact('applain', 'monevapps', 'sdmteknics'), [
            'title' => 'Aplikasi Lainnya'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $applain)
    {
        $opds = Opd::all();
        $katpenggunas = Katpengguna::all();
        $katservers = Katserver::all();
        $layananapps = Layananapp::all();
        $katapps = Katapp::where('id', 4)->get();

        return view('applain.applain-edit', compact('applain', 'opds', 'katpenggunas', 'katservers', 'layananapps', 'katapps'), [
            'title' => 'Aplikasi Lainnya'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAppLainRequest $request, Application $applain)
    {
        DB::transaction(function () use ($request, $applain) {
            $validated = $request->validated();

            // if (empty($applain->no_regis_app)) {
            //     $validated['no_regis_app'] = Str::upper(Str::random(12));
            // }

            if ($request->hasFile('dasar_hukum')) {

                if (!empty($applain->dasar_hukum)) {
                    Storage::disk('public')->delete($applain->dasar_hukum);
                }

                $dasar_hukumPath = $request->file('dasar_hukum')->store('aplikasi/dasar-hukums', 'public');
                $validated['dasar_hukum'] = $dasar_hukumPath;
            }

            if (isset($validated['status']) && $validated['status'] === '1') {
                $validated['alasan_nonaktif'] = null;
            }

            $applain->update($validated);
        });

        return redirect()->route('admin.applain.index')->with('success', 'Perubahan data telah berhasil dilakukan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $applain)
    {
        DB::transaction(function () use ($applain) {
            $applain->delete();
        });

        return redirect()->route('admin.applain.index')->with('success', 'Penghapusan data sukses dilakukan.');
    }
}
