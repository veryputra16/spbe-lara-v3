<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAppDesaRequest;
use App\Http\Requests\UpdateAppDesaRequest;
use App\Models\Application;
use App\Models\Katapp;
use App\Models\Katpengguna;
use App\Models\Katserver;
use App\Models\Layananapp;
use App\Models\Monevapp;
use App\Models\Opd;
use App\Models\Sdmteknic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AppDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        if (auth()->user()->hasAnyRole(['operator-aplikasi', 'viewer-aplikasi'])) {
            $appdesas = Application::where('katapp_id', 3)
                ->whereHas('opd.users', function ($query) use ($user) {
                    $query->where('users.id', $user->id);
                })
                ->get();
        } else {
            $appdesas = Application::where('katapp_id', 3)->get();
        }

        return view('appdesa.appdesa-index', compact('appdesas'), [
            'title' => 'Aplikasi Desa'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $opds = Opd::where('nama', 'like', 'Desa%')->get();
        $katpenggunas = Katpengguna::all();
        $katservers = Katserver::all();
        $layananapps = Layananapp::all();
        $katapps = Katapp::where('id', 3)->get();
        // $noRegis = Str::upper(Str::random(8));

        return view('appdesa.appdesa-create', compact('opds', 'katpenggunas', 'katservers', 'layananapps', 'katapps'), [
            'title' => 'Aplikasi Desa'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAppDesaRequest $request)
    {
        DB::transaction(function () use ($request) {
            $validated = $request->validated();

            // $validated['no_regis_app'] = Str::upper(Str::random(12));

            if ($request->hasFile('dasar_hukum')) {
                $dasar_hukumPath = $request->file('dasar_hukum')->store('aplikasi/dasar-hukums', 'public');
                $validated['dasar_hukum'] = $dasar_hukumPath;
            }

            $newAppDesa = Application::create($validated);
        });

        return redirect()->route('admin.appdesa.index')->with('success', 'Data telah tersimpan dengan sukses!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Application $appdesa)
    {
        $monevapps = Monevapp::where('application_id', $appdesa->id)->get();
        $sdmteknics = Sdmteknic::where('application_id', $appdesa->id)->get();

        return view('appdesa.appdesa-detail', compact('appdesa', 'monevapps', 'sdmteknics'), [
            'title' => 'Aplikasi Desa'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $appdesa)
    {
        $opds = Opd::where('nama', 'like', 'Desa%')->get();
        $katpenggunas = Katpengguna::all();
        $katservers = Katserver::all();
        $layananapps = Layananapp::all();
        $katapps = Katapp::where('id', 3)->get();

        return view('appdesa.appdesa-edit', compact('appdesa', 'opds', 'katpenggunas', 'katservers', 'layananapps', 'katapps'), [
            'title' => 'Aplikasi Desa'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAppDesaRequest $request, Application $appdesa)
    {
        DB::transaction(function () use ($request, $appdesa) {
            $validated = $request->validated();

            // if (empty($appdesa->no_regis_app)) {
            //     $validated['no_regis_app'] = Str::upper(Str::random(12));
            // }

            if ($request->hasFile('dasar_hukum')) {

                if (!empty($appdesa->dasar_hukum)) {
                    Storage::disk('public')->delete($appdesa->dasar_hukum);
                }

                $dasar_hukumPath = $request->file('dasar_hukum')->store('aplikasi/dasar-hukums', 'public');
                $validated['dasar_hukum'] = $dasar_hukumPath;
            }

            if (isset($validated['status']) && $validated['status'] === '1') {
                $validated['alasan_nonaktif'] = null;
            }

            $appdesa->update($validated);
        });

        return redirect()->route('admin.appdesa.index')->with('success', 'Perubahan data telah berhasil dilakukan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $appdesa)
    {
        DB::transaction(function () use ($appdesa) {
            $appdesa->delete();
        });

        return redirect()->route('admin.appdesa.index')->with('success', 'Penghapusan data sukses dilakukan.');
    }
}
