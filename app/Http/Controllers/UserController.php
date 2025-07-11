<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Opd;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->hasRole('admin-aplikasi')) {
            $users = User::whereHas('roles', function ($query) {
                $query->where('name', 'like', '%aplikasi%')
                    ->where('name', 'not like', '%admin%');
            })->with(['roles', 'opdPivot'])->get();
        } else if (auth()->user()->hasRole('admin-spbe')) {
            $users = User::whereHas('roles', function ($query) {
                $query->where('name', 'like', '%spbe%')
                    ->where('name', 'not like', '%admin%');
            })->with(['roles', 'opdPivot'])->get();
        } else {
            $users = User::with('roles')->get();
        }

        return view('user.user-index', compact('users'), [
            'title' => 'Data User'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $opds = Opd::all(); // menampilkan data semua opd 

        if (auth()->user()->hasRole('admin-aplikasi')) {
            $roles = Role::where('name', 'like', '%aplikasi%')
                ->where('name', 'not like', '%admin%')
                ->get();
        } else if (auth()->user()->hasRole('admin-spbe')) {
            $roles = Role::where('name', 'like', '%spbe%')
                ->where('name', 'not like', '%admin%')
                ->get();
        } else {
            $roles = Role::all();
        }

        return view('user.user-create', compact('roles', 'opds'), [
            'title' => 'Data User'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        // dd($request);
        DB::transaction(function () use ($request) {
            $validated = $request->validated();

            $validated['password'] = bcrypt($validated['password']);

            $newUser = User::create($validated);

            $newUser->assignRole($request->role_id);

            $newUser->opdPivot()->attach($request->opd_id);
        });

        return redirect()->route('admin.user.index')->with('success', 'Data telah tersimpan dengan sukses!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $opds = Opd::all(); // menampilkan data semua opd 
        $userOpds = $user->opdPivot()->get(); // OPD yang dimiliki user

        if (auth()->user()->hasRole('admin-aplikasi')) {
            $roles = Role::where('name', 'like', '%aplikasi%')
                ->where('name', 'not like', '%admin%')
                ->get();
        } else if (auth()->user()->hasRole('admin-spbe')) {
            $roles = Role::where('name', 'like', '%spbe%')
                ->where('name', 'not like', '%admin%')
                ->get();
        } else {
            $roles = Role::all();
        }

        return view('user.user-edit', compact('user', 'roles', 'opds', 'userOpds'), [
            'title' => 'Data User'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        // dd($request);
        DB::transaction(function () use ($request, $user) {
            $validated = $request->validated();

            // Hanya hash dan update password jika diisi
            if (!empty($validated['password'])) {
                $validated['password'] = bcrypt($validated['password']);
            } else {
                unset($validated['password']); // Jangan update password
            }

            $user->update($validated);

            $user->syncRoles([$request->role_id]);

            $user->opdPivot()->sync($request->opd_id);
        });

        return redirect()->route('admin.user.index')->with('success', 'Perubahan data telah berhasil dilakukan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        DB::transaction(function () use ($user) {
            $user->opds()->detach(); // hapus semua relasi dari tabel pivot opd_users
            $user->delete();
        });

        return redirect()->route('admin.user.index')->with('success', 'Penghapusan data sukses dilakukan.');
    }
}
