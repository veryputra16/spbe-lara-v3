<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreApplicationRequest;
use App\Http\Requests\UpdateApplicationRequest;
use App\Models\Bahasaprogram;
use App\Models\Frameworkapp;
use App\Models\Katapp;
use App\Models\Katdb;
use App\Models\Katpengguna;
use App\Models\Katplatform;
use App\Models\Katserver;
use App\Models\Layananapp;
use App\Models\Opd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $applications = Application::all();

        return view('aplikasi.aplikasi-index', compact('applications'), [
            'title' => 'Data Aplikasi'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $katapps = Katapp::all();
        $katpenggunas = Katpengguna::all();
        $katplatforms = Katplatform::all();
        $katdbs = Katdb::all();
        $katservers = Katserver::all();
        $bahasaprograms = Bahasaprogram::all();
        $frameworkapps = Frameworkapp::all();
        $layananapps = Layananapp::all();
        $opds = Opd::all();

        // $response = Http::get('https://splp.denpasarkota.go.id/index.php/dev/master/opd');
        // $opds = $response->json(['entry']);

        return view('aplikasi.aplikasi-create', compact('katapps', 'katpenggunas', 'katplatforms', 'katdbs', 'katservers', 'bahasaprograms', 'frameworkapps', 'layananapps', 'opds'), [
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

            if ($request->hasFile('dasar_hukum')) {
                $dasar_hukumPath = $request->file('dasar_hukum')->store('dasar-hukums', 'public');
                $validated['dasar_hukum'] = $dasar_hukumPath;
            }
            if ($request->hasFile('nda')) {
                $ndaPath = $request->file('nda')->store('ndas', 'public');
                $validated['nda'] = $ndaPath;
            }
            if ($request->hasFile('sop')) {
                $sopPath = $request->file('sop')->store('sops', 'public');
                $validated['sop'] = $sopPath;
            }
            if ($request->hasFile('kak')) {
                $kakPath = $request->file('kak')->store('kaks', 'public');
                $validated['kak'] = $kakPath;
            }
            if ($request->hasFile('capture_frontend')) {
                $capturefrontendPath = $request->file('capture_frontend')->store('capture-frontends', 'public');
                $validated['capture_frontend'] = $capturefrontendPath;
            }
            if ($request->hasFile('capture_backend')) {
                $capturebackendPath = $request->file('capture_backend')->store('capture-backends', 'public');
                $validated['capture_backend'] = $capturebackendPath;
            }
            if ($request->hasFile('buku_manual')) {
                $buku_manualPath = $request->file('buku_manual')->store('buku-manuals', 'public');
                $validated['buku_manual'] = $buku_manualPath;
            }
            if ($request->hasFile('dokumen_perancangan')) {
                $dokumen_perancanganPath = $request->file('dokumen_perancangan')->store('dokumen-perancangans', 'public');
                $validated['dokumen_perancangan'] = $dokumen_perancanganPath;
            }
            if ($request->hasFile('surat_mohon')) {
                $surat_mohonPath = $request->file('surat_mohon')->store('surat-mohons', 'public');
                $validated['surat_mohon'] = $surat_mohonPath;
            }
            if ($request->hasFile('implemen_app')) {
                $implemen_appPath = $request->file('implemen_app')->store('implemen-apps', 'public');
                $validated['implemen_app'] = $implemen_appPath;
            }
            if ($request->hasFile('lapor_pentest')) {
                $lapor_pentestPath = $request->file('lapor_pentest')->store('lapor-pentests', 'public');
                $validated['lapor_pentest'] = $lapor_pentestPath;
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $application)
    {
        $katapps = Katapp::all();
        $katpenggunas = Katpengguna::all();
        $katplatforms = Katplatform::all();
        $katdbs = Katdb::all();
        $katservers = Katserver::all();
        $bahasaprograms = Bahasaprogram::all();
        $frameworkapps = Frameworkapp::all();
        $layananapps = Layananapp::all();
        $opds = Opd::all();

        return view('aplikasi.aplikasi-edit', compact('application', 'katapps', 'katpenggunas', 'katplatforms', 'katdbs', 'katservers', 'bahasaprograms', 'frameworkapps', 'layananapps', 'opds'), [
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

            if ($request->hasFile('dasar_hukum')) {
                Storage::disk('public')->delete($application->dasar_hukum);

                $dasar_hukumPath = $request->file('dasar_hukum')->store('dasar-hukums', 'public');
                $validated['dasar_hukum'] = $dasar_hukumPath;
            }
            if ($request->hasFile('nda')) {
                Storage::disk('public')->delete($application->nda);

                $ndaPath = $request->file('nda')->store('ndas', 'public');
                $validated['nda'] = $ndaPath;
            }
            if ($request->hasFile('sop')) {
                Storage::disk('public')->delete($application->sop);

                $sopPath = $request->file('sop')->store('sops', 'public');
                $validated['sop'] = $sopPath;
            }
            if ($request->hasFile('kak')) {
                Storage::disk('public')->delete($application->kak);

                $kakPath = $request->file('kak')->store('kaks', 'public');
                $validated['kak'] = $kakPath;
            }
            if ($request->hasFile('capture_frontend')) {
                Storage::disk('public')->delete($application->capture_frontend);

                $capturefrontendPath = $request->file('capture_frontend')->store('capture-frontends', 'public');
                $validated['capture_frontend'] = $capturefrontendPath;
            }
            if ($request->hasFile('capture_backend')) {
                Storage::disk('public')->delete($application->capture_backend);

                $capturebackendPath = $request->file('capture_backend')->store('capture-backends', 'public');
                $validated['capture_backend'] = $capturebackendPath;
            }
            if ($request->hasFile('buku_manual')) {
                Storage::disk('public')->delete($application->buku_manual);

                $buku_manualPath = $request->file('buku_manual')->store('buku-manuals', 'public');
                $validated['buku_manual'] = $buku_manualPath;
            }
            if ($request->hasFile('dokumen_perancangan')) {
                Storage::disk('public')->delete($application->dokumen_perancangan);

                $dokumen_perancanganPath = $request->file('dokumen_perancangan')->store('dokumen-perancangans', 'public');
                $validated['dokumen_perancangan'] = $dokumen_perancanganPath;
            }
            if ($request->hasFile('surat_mohon')) {
                Storage::disk('public')->delete($application->surat_mohon);

                $surat_mohonPath = $request->file('surat_mohon')->store('surat-mohons', 'public');
                $validated['surat_mohon'] = $surat_mohonPath;
            }
            if ($request->hasFile('implemen_app')) {
                Storage::disk('public')->delete($application->implemen_app);

                $implemen_appPath = $request->file('implemen_app')->store('implemen-apps', 'public');
                $validated['implemen_app'] = $implemen_appPath;
            }
            if ($request->hasFile('lapor_pentest')) {
                Storage::disk('public')->delete($application->lapor_pentest);

                $lapor_pentestPath = $request->file('lapor_pentest')->store('lapor-pentests', 'public');
                $validated['lapor_pentest'] = $lapor_pentestPath;
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
