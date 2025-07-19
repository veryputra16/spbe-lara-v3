<?php

namespace App\Http\Controllers;

use App\Models\Keamanan;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKeamananRequest;
use App\Http\Requests\UpdateKeamananRequest;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class KeamananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $keamanans = Keamanan::orderBy('id', 'desc')->get();

        // return view('keamanan.keamanan-index', compact('keamanans'), [
        //     'title' => 'Keamanan Aplikasi'
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Application $application)
    {
        return view('keamanan.keamanan-create', compact('application'), [
            'title' => 'Keamanan Aplikasi'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKeamananRequest $request)
    {
        DB::transaction(function () use ($request) {
            $validated = $request->validated();

            // dd($validated);
            if ($validated['pernah_audit_keamanan'] == 'belum') {
                $validated['siapa_melakukan_audit_keamanan'] = 'belum-dilaksanakan-audit';
            }

            if ($request->hasFile('penanganan_serangan_cyber')) {
                $penanganan_serangan_cyberPath = $request->file('penanganan_serangan_cyber')->store('aplikasi/keamanan/penanganan-serangan-cybers', 'public');
                $validated['penanganan_serangan_cyber'] = $penanganan_serangan_cyberPath;
            }

            if ($request->hasFile('bukti_dukung_audit_keamanan')) {
                $bukti_dukung_audit_keamananPath = $request->file('bukti_dukung_audit_keamanan')->store('aplikasi/keamanan/buktidukung-audits', 'public');
                $validated['bukti_dukung_audit_keamanan'] = $bukti_dukung_audit_keamananPath;
            }

            $newKeamanan = Keamanan::create($validated);
        });

        return redirect()->route('admin.application.show', $request->application_id)->with('success', 'Data telah tersimpan dengan sukses!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Keamanan $keamanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $application, Keamanan $keamanan)
    {
        return view('keamanan.keamanan-edit', compact('application', 'keamanan'), [
            'title' => 'Keamanan Aplikasi'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Application $application, UpdateKeamananRequest $request, Keamanan $keamanan)
    {
        DB::transaction(function () use ($request, $keamanan) {
            $validated = $request->validated();

            if ($request->hasFile('penanganan_serangan_cyber')) {
                if (!empty($monevapp->bukti_monev)) {
                    Storage::disk('public')->delete($keamanan->penanganan_serangan_cyber);
                }

                $penanganan_serangan_cyberPath = $request->file('penanganan_serangan_cyber')->store('aplikasi/keamanan/penanganan-serangan-cybers', 'public');
                $validated['penanganan_serangan_cyber'] = $penanganan_serangan_cyberPath;
            }

            $keamanan->update($validated);
        });

        return redirect()->route('admin.application.show', $request->application_id)->with('success', 'Perubahan data telah berhasil dilakukan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application, Keamanan $keamanan)
    {
        DB::transaction(function () use ($keamanan) {

            $keamanan->delete();
        });

        return redirect()->route('admin.application.show', $application->id)->with('success', 'Penghapusan data sukses dilakukan.');
    }
}
