<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreApplicationRequest;
use App\Http\Requests\StoreFullApplicationRequest; //new class for multiple insert table requests
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
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StoreApplicationRequest;
use App\Http\Requests\UpdateApplicationRequest;

class ApplicationController extends Controller
{
    /** Display a listing of the resource. */
    public function index()
    {
        $applications = Application::whereIn('katapp_id', [1, 2])->get();
        return view('aplikasi.aplikasi-index', compact('applications'), [
            'title' => 'Data Aplikasi'
        ]);
    }

    /** Show the form for creating a new resource. */
    public function create()
    {
        $opds = Opd::all();
        $katplatforms = Katplatform::all();
        $katdbs = Katdb::all();
        $bhsprograms = Bahasaprogram::all();
        $frameworkapps = Frameworkapp::all();
        $katpenggunas = Katpengguna::all();
        $katservers = Katserver::all();
        $layananapps = Layananapp::all();
        $katapps = Katapp::whereIn('id', [1, 2])->get();

        Log::info('Data katdbs:', ['katdbs_count' => $katdbs->count()]);

        return view('aplikasi.aplikasi-create', compact(
            'opds', 'katplatforms', 'katdbs', 'bhsprograms', 'frameworkapps', 'katpenggunas', 'katservers', 'layananapps', 'katapps'), [

        // For Pengembangan
        $katplatforms = Katplatform::all();
        $katdbs = Katdb::all();
        $bhsprograms = Bahasaprogram::all();
        $frameworkapps = Frameworkapp::all();
        // $noRegis = Str::upper(Str::random(8));

        return view('aplikasi.aplikasi-create', compact('opds', 'katpenggunas', 'katservers', 'layananapps', 'katapps', 'katplatforms', 'katdbs', 'bhsprograms', 'frameworkapps'), [
            'title' => 'Data Aplikasi'
        ]);
    }

    /** Store a newly created resource in storage. */
    public function store(StoreApplicationRequest $request)
    {
            DB::transaction(function () use ($request) {
                $validated = $request->validated();
                $validated['no_regis_app'] = Str::upper(Str::random(12));

                if ($request->hasFile('dasar_hukum')) {
                    $validated['dasar_hukum'] = $request->file('dasar_hukum')->store('aplikasi/dasar-hukums', 'public');
                }

                $newApplication = Application::create($validated);

                Pengembangan::create([
                    'application_id' => $newApplication->id,
                    'tahun_pengembangan' => $validated['tahun_buat'],
                    'riwayat_pengembangan' => $validated['riwayat_pengembangan'] ?? null,
                    'fitur' => $validated['fitur'],
                    'nda' => $request->file('nda')?->store('aplikasi/nda', 'public'),
                    'doc_perancangan' => $request->file('doc_perancangan')?->store('aplikasi/perancangan', 'public'),
                    'surat_mohon' => $request->file('surat_mohon')?->store('aplikasi/surat-mohon', 'public'),
                    'kak' => $request->file('kak')?->store('aplikasi/kak', 'public'),
                    'sop' => $request->file('sop')?->store('aplikasi/sop', 'public'),
                    'doc_pentest' => $request->file('doc_pentest')?->store('aplikasi/pentest', 'public'),
                    'doc_uat' => $request->file('doc_uat')?->store('aplikasi/uat', 'public'),
                    'video_penggunaan' => $validated['video_penggunaan'] ?? null,
                    'buku_manual' => $request->file('buku_manual')?->store('aplikasi/manual', 'public'),
                    'katplatform_id' => $validated['katplatform_id'],
                    'katdb_id' => $validated['katdb_id'],
                    'bahasaprogram_id' => $validated['bahasaprogram_id'],
                    'frameworkapp_id' => $validated['frameworkapp_id'],
                    'capture_frontend' => $request->file('capture_frontend')?->store('aplikasi/frontend', 'public'),
                    'capture_backend' => $request->file('capture_backend')?->store('aplikasi/backend', 'public'),
                    'user_id' => $validated['user_id'],
                ]);
            });
            return redirect()->route('admin.application.index')->with('success', 'Data telah tersimpan dengan sukses!');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFullApplicationRequest $request)
    {
    DB::transaction(function () use ($request) {
        $validated = $request->validated();

        // Simpan file dasar hukum aplikasi (jika ada)
        if ($request->hasFile('dasar_hukum')) {
            $dasar_hukumPath = $request->file('dasar_hukum')->store('aplikasi/dasar-hukums', 'public');
            $validated['dasar_hukum'] = $dasar_hukumPath;
        }

        // Generate nomor registrasi aplikasi
        $validated['no_regis_app'] = Str::upper(Str::random(12));

        // Simpan data aplikasi dulu
        $newApplication = Application::create($validated);

        // === Simpan data pengembangan ===
        $pengembanganData = $request->only([
            'tahun_pengembangan', 'riwayat_pengembangan', 'fitur',
            'katplatform_id', 'katdb_id', 'bahasaprogram_id', 'frameworkapp_id',
            'video_penggunaan'
        ]);
        $pengembanganData['application_id'] = $newApplication->id;
        $pengembanganData['user_id'] = $validated['user_id'];

        // Handle file upload pengembangan
        $fileFields = [
            'nda', 'doc_perancangan', 'surat_mohon', 'kak', 'sop',
            'doc_pentest', 'doc_uat', 'buku_manual', 'capture_frontend', 'capture_backend'
        ];

        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                $path = $request->file($field)->store("pengembangan/$field", 'public');
                $pengembanganData[$field] = $path;
            }
        }

        Pengembangan::create($pengembanganData);
    });

    return redirect()->route('admin.application.index')->with('success', 'Data telah tersimpan dengan sukses!');
}

    /** Display the specified resource. */
    public function show(Application $application)
    {
        $monevapps = Monevapp::where('application_id', $application->id)->orderBy('tgl_monev', 'desc')->get();
        $sdmteknics = Sdmteknic::where('application_id', $application->id)->get();
        $interops = Interop::where('application_id', $application->id)->orderBy('id', 'desc')->get();
        $pengembangans = Pengembangan::where('application_id', $application->id)->orderBy('tahun_pengembangan', 'desc')->get();
        $keamanans = Keamanan::where('application_id', $application->id)->orderBy('id', 'desc')->get();

        return view('aplikasi.aplikasi-detail', compact(
            'application', 'monevapps', 'sdmteknics', 'interops', 'pengembangans'
        ), [
        return view('aplikasi.aplikasi-detail', compact('application', 'monevapps', 'sdmteknics', 'interops', 'pengembangans', 'keamanans'), [
            'title' => 'Data Aplikasi'
        ]);
    }

    /** Show the form for editing the specified resource. */
    public function edit(Application $application)
    {
        $opds = Opd::all();
        $katpenggunas = Katpengguna::all();
        $katservers = Katserver::all();
        $layananapps = Layananapp::all();
        $katapps = Katapp::whereIn('id', [1, 2])->get();
        $keamanans = Keamanan::all();

        return view('aplikasi.aplikasi-edit', compact(
            'application', 'opds', 'katpenggunas', 'katservers', 'layananapps', 'katapps'
        ), [
            'title' => 'Data Aplikasi'
        ]);
    }

    /** Update the specified resource in storage. */
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
                $validated['dasar_hukum'] = $request->file('dasar_hukum')->store('aplikasi/dasar-hukums', 'public');
            }

            if (isset($validated['status']) && $validated['status'] === '1') {
                $validated['alasan_nonaktif'] = null;
            }

            $application->update($validated);
        });

        return redirect()->route('admin.application.index')->with('success', 'Perubahan data telah berhasil dilakukan.');
    }

    /** Remove the specified resource from storage. */
    public function destroy(Application $application)
    {
        DB::transaction(function () use ($application) {
            $application->delete();
        });

        return redirect()->route('admin.application.index')->with('success', 'Penghapusan data sukses dilakukan.');
    }
}
