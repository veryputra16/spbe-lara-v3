<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFaqRequest;
use App\Http\Requests\UpdateFaqRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = Faq::all();

        return view('faq.faq-index', compact('faqs'), [
            'title' => 'FAQ'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('faq.faq-create', [
            'title' => 'FAQ'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFaqRequest $request)
    {
        DB::transaction(function () use ($request) {
            $validated = $request->validated();

            $newFaq = Faq::create($validated);
        });

        return redirect()->route('admin.faq.index')->with('success', 'Data telah tersimpan dengan sukses!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faq $faq)
    {
        return view('faq.faq-edit', compact('faq'), [
            'title' => 'FAQ'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFaqRequest $request, Faq $faq)
    {
        DB::transaction(function () use ($request, $faq) {
            $validated = $request->validated();

            $faq->update($validated);
        });

        return redirect()->route('admin.faq.index')->with('success', 'Perubahan data telah berhasil dilakukan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq)
    {
        DB::transaction(function () use ($faq) {
            $faq->delete();
        });

        return redirect()->route('admin.faq.index')->with('success', 'Penghapusan data sukses dilakukan.');
    }
}
