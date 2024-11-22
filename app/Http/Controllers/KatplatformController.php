<?php

namespace App\Http\Controllers;

use App\Models\Katplatform;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePlatformRequest;
use App\Http\Requests\UpdatePlatformRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KatplatformController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $katplatforms = Katplatform::all();

        return view('platform.platform-index', compact('katplatforms'), [
            'title' => 'Kategori Platform'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('platform.platform-create', [
            'title' => 'Kategori Platform'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlatformRequest $request)
    {
        DB::transaction(function () use ($request) {
            $validated = $request->validated();

            $newKatplatform = Katplatform::create($validated);
        });

        flash()->success('Data telah tersimpan dengan sukses!');
        return redirect()->route('masterapp.katplatform.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Katplatform $katplatform)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Katplatform $katplatform)
    {
        return view('platform.platform-edit', compact('katplatform'), [
            'title' => 'Kategori Platform'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlatformRequest $request, Katplatform $katplatform)
    {
        DB::transaction(function () use ($request, $katplatform) {
            $validated = $request->validated();

            $katplatform->update($validated);
        });

        flash()->success('Perubahan data telah berhasil dilakukan.');
        return redirect()->route('masterapp.katplatform.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Katplatform $katplatform)
    {
        DB::transaction(function () use ($katplatform) {
            $katplatform->delete();
        });

        flash()->success('Penghapusan data sukses dilakukan.');
        return redirect()->route('masterapp.katplatform.index');
    }
}
