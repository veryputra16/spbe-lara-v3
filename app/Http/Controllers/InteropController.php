<?php

namespace App\Http\Controllers;

use App\Models\Interop;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInteropRequest;
use App\Http\Requests\UpdateInteropRequest;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class InteropController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Application $application)
    {
        // $interops = Interop::where('application_id', $application->id)->get();

        // return view('interop.interop-index', compact('application', 'interops'), [
        //     'title' => 'Interopabilitas'
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Application $application)
    {
        return view('interop.interop-create', compact('application'), [
            'title' => 'Interopabilitas'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInteropRequest $request)
    {
        DB::transaction(function () use ($request) {
            $validated = $request->validated();

            if ($request->hasFile('doc_interop')) {
                $doc_interopPath = $request->file('doc_interop')->store('aplikasi/doc-interops', 'public');
                $validated['doc_interop'] = $doc_interopPath;
            }

            $newInterop = Interop::create($validated);
        });

        return redirect()->route('admin.application.index')->with('success', 'Data telah tersimpan dengan sukses!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Interop $interop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $application, Interop $interop)
    {
        return view('interop.interop-edit', compact('application', 'interop'), [
            'title' => 'Interopabilitas'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Application $application, UpdateInteropRequest $request, Interop $interop)
    {
        DB::transaction(function () use ($request, $interop) {
            $validated = $request->validated();

            if ($request->hasFile('doc_interop')) {
                Storage::disk('public')->delete($interop->doc_interop);

                $doc_interopPath = $request->file('doc_interop')->store('aplikasi/doc-interops', 'public');
                $validated['doc_interop'] = $doc_interopPath;
            }

            $interop->update($validated);
        });

        return redirect()->route('admin.application.index')->with('success', 'Perubahan data telah berhasil dilakukan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application, Interop $interop)
    {
        DB::transaction(function () use ($interop) {

            $interop->delete();
        });

        return redirect()->route('admin.application.index')->with('success', 'Penghapusan data sukses dilakukan.');
    }
}
