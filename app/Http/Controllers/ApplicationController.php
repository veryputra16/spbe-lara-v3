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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

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

        $response = Http::get('https://splp.denpasarkota.go.id/index.php/dev/master/opd');
        $opds = $response->json(['entry']);

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
                $dasar_hukumPath = $request->file('dasar_hukum')->store('dasar_hukums', 'public');
                $validated['dasar_hukum'] = $dasar_hukumPath;
            }

            $newApplication = Application::create($validated);
        });

        flash()->success('Data telah tersimpan dengan sukses!');
        return redirect()->route('aplikasi');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateApplicationRequest $request, Application $application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        //
    }
}
