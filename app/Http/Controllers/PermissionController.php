<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::all();

        return view('permission.permission-index', compact('permissions'), [
            'title' => 'Permission'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('permission.permission-create', [
            'title' => 'Permission'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePermissionRequest $request)
    {
        DB::transaction(function () use ($request) {
            $validated = $request->validated();

            $validated['name'] = Str::slug($validated['name']);

            $newPermission = Permission::create($validated);
        });

        return redirect()->route('admin.permission.index')->with('success', 'Data telah tersimpan dengan sukses!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        return view('permission.permission-edit', compact('permission'), [
            'title' => 'Permission'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePermissionRequest $request, Permission $permission)
    {
        DB::transaction(function () use ($request, $permission) {
            $validated = $request->validated();

            $validated['name'] = Str::slug($validated['name']);

            $permission->update($validated);
        });

        return redirect()->route('admin.permission.index')->with('success', 'Perubahan data telah berhasil dilakukan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        DB::transaction(function () use ($permission) {
            $permission->delete();
        });

        return redirect()->route('admin.permission.index')->with('success', 'Penghapusan data sukses dilakukan.');
    }
}
