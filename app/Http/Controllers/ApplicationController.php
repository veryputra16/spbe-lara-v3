<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreApplicationRequest;
use App\Http\Requests\UpdateApplicationRequest;
use App\Models\Bahasaprogram;
use App\Models\Frameworkapp;
use App\Models\Interop;
use App\Models\Katapp;
use App\Models\Katdb;
use App\Models\Katpengguna;
use App\Models\Katplatform;
use App\Models\Katserver;
use App\Models\Keamanan;
use App\Models\Layananapp;
use App\Models\Monevapp;
use App\Models\Opd;
use App\Models\Pengembangan;
use App\Models\Sdmteknic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use function PHPUnit\Framework\isEmpty;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $applications = Application::whereIn('katapp_id', [1, 2])->get();

        return view('aplikasi.aplikasi-index', compact('applications'), [
            'title' => 'Data Aplikasi'
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
        $katapps = Katapp::whereIn('id', [1, 2])->get();
        // $noRegis = Str::upper(Str::random(8));

        return view('aplikasi.aplikasi-create', compact('opds', 'katpenggunas', 'katservers', 'layananapps', 'katapps'), [
            'title' => 'Data Aplikasi'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreApplicationRequest $request)
    {
        DB::transaction(function () use ($request) {
            $validated = $request->validated();

            $validated['no_regis_app'] = Str::upper(Str::random(12));

            if ($request->hasFile('dasar_hukum')) {
                $dasar_hukumPath = $request->file('dasar_hukum')->store('aplikasi/dasar-hukums', 'public');
                $validated['dasar_hukum'] = $dasar_hukumPath;
            }

            $newApplication = Application::create($validated);
        });

        return redirect()->route('admin.application.index')->with('success', 'Data telah tersimpan dengan sukses!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Application $application)
    {
        $monevapps = Monevapp::where('application_id', $application->id)->orderBy('tgl_monev', 'desc')->get();
        $sdmteknics = Sdmteknic::where('application_id', $application->id)->get();
        $interops = Interop::where('application_id', $application->id)->orderBy('id', 'desc')->get();
        $pengembangans = Pengembangan::where('application_id', $application->id)->orderBy('tahun_pengembangan', 'desc')->get();
        $keamanans = Keamanan::where('application_id', $application->id)->orderBy('id', 'desc')->get();

        return view('aplikasi.aplikasi-detail', compact('application', 'monevapps', 'sdmteknics', 'interops', 'pengembangans', 'keamanans'), [
            'title' => 'Data Aplikasi'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $application)
    {
        $opds = Opd::all();
        $katpenggunas = Katpengguna::all();
        $katservers = Katserver::all();
        $layananapps = Layananapp::all();
        $katapps = Katapp::whereIn('id', [1, 2])->get();
        $keamanans = Keamanan::all();

        return view('aplikasi.aplikasi-edit', compact('application', 'opds', 'katpenggunas', 'katservers', 'layananapps', 'katapps'), [
            'title' => 'Data Aplikasi'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateApplicationRequest $request, Application $application)
    {
        DB::transaction(function () use ($request, $application) {
            $validated = $request->validated();

            if (empty($application->no_regis_app)) {
                $validated['no_regis_app'] = Str::upper(Str::random(12));
            }

            if ($request->hasFile('dasar_hukum')) {

                if (!empty($application->dasar_hukum)) {
                    Storage::disk('public')->delete($application->dasar_hukum);
                }

                $dasar_hukumPath = $request->file('dasar_hukum')->store('aplikasi/dasar-hukums', 'public');
                $validated['dasar_hukum'] = $dasar_hukumPath;
            }

            if (isset($validated['status']) && $validated['status'] === '1') {
                $validated['alasan_nonaktif'] = null;
            }

            $application->update($validated);
        });

        return redirect()->route('admin.application.index')->with('success', 'Perubahan data telah berhasil dilakukan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        // dd($application);
        DB::transaction(function () use ($application) {
            $application->delete();
        });

        return redirect()->route('admin.application.index')->with('success', 'Penghapusan data sukses dilakukan.');
    }
}
