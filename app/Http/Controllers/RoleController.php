<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();

        return view('role.role-index', compact('roles'), [
            'title' => 'Roles'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('role.role-create', [
            'title' => 'Roles'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        DB::transaction(function () use ($request) {
            $validated = $request->validated();

            $validated['name'] = Str::slug($validated['name']);

            $newRole = Role::create($validated);
        });

        return redirect()->route('admin.role.index')->with('success', 'Data telah tersimpan dengan sukses!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        $permissions = Permission::all();

        return view('role.role-manage', compact('role', 'permissions'), [
            'title' => 'Roles'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();

        return view('role.role-edit', compact('role', 'permissions'), [
            'title' => 'Roles'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        DB::transaction(function () use ($request, $role) {
            $validated = $request->validated();

            $validated['name'] = Str::slug($validated['name']);

            $role->update($validated);
        });

        return redirect()->route('admin.role.index')->with('success', 'Perubahan data telah berhasil dilakukan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        DB::transaction(function () use ($role) {
            $role->delete();
        });

        return redirect()->route('admin.role.index')->with('success', 'Penghapusan data sukses dilakukan.');
    }

    public function updatePermission(Request $request, Role $role)
    {
        // $role = Role::findOrFail($id);
        // return $request;
        $role->syncPermissions($request->permission ?? []);


        // return redirect()->route('admin.role.index')->with('success', 'Perubahan data permission telah berhasil dilakukan.');
        return redirect()->back()->with('success', 'Perubahan data permission telah berhasil dilakukan.');
    }
}
