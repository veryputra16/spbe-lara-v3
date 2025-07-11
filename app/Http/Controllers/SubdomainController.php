<?php

namespace App\Http\Controllers;

use App\Models\Subdomain;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubdomainRequest;
use App\Http\Requests\UpdateSubdomainRequest;
use App\Models\Opd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SubdomainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        if (auth()->user()->hasAnyRole(['operator-aplikasi', 'viewer-aplikasi'])) {
            $subdomains = Subdomain::whereHas('opd.users', function ($query) use ($user) {
                $query->where('users.id', $user->id);
            })->get();
        } else {
            $subdomains = Subdomain::all();
        }

        return view('subdomain.subdomain-index', compact('subdomains'), [
            'title' => 'Data Portal CMS'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $response = Http::get('https://splp.denpasarkota.go.id/index.php/dev/master/opd');
        // $opds = $response->json(['entry']);

        $opds = Opd::all();

        return view('subdomain.subdomain-create', compact('opds'), [
            'title' => 'Data Portal CMS'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubdomainRequest $request)
    {
        DB::transaction(function () use ($request) {
            $validated = $request->validated();

            $newSubdomain = Subdomain::create($validated);
        });

        return redirect()->route('admin.subdomain.index')->with('success', 'Data telah tersimpan dengan sukses!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subdomain $subdomain)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subdomain $subdomain)
    {
        // $response = Http::get('https://splp.denpasarkota.go.id/index.php/dev/master/opd');
        // $opds = $response->json(['entry']);

        $opds = Opd::all();

        return view('subdomain.subdomain-edit', compact('subdomain', 'opds'), [
            'title' => 'Data Portal CMS'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubdomainRequest $request, Subdomain $subdomain)
    {
        DB::transaction(function () use ($request, $subdomain) {
            $validated = $request->validated();

            $subdomain->update($validated);
        });

        return redirect()->route('admin.subdomain.index')->with('success', 'Perubahan data telah berhasil dilakukan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subdomain $subdomain)
    {
        DB::transaction(function () use ($subdomain) {
            $subdomain->delete();
        });

        return redirect()->route('admin.subdomain.index')->with('success', 'Penghapusan data sukses dilakukan.');
    }
}
