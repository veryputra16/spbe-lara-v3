<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();

        $opds = $user->opds;
        // dd($user->load('opdPivot'));

        return view('profile.edit', [
            'user' => $user,
            'opds' => $opds,
            'title' => 'Profile'
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        return redirect()->route('profile.edit')->with('status', 'Profil Berhasil Di Update!');
    }

    public function changepassword()
    {
        return view('profile.changepassword', [
            'user' => Auth::user(),
            'title' => 'Ganti Password'
        ]);
    }

    public function password(Request $request)
    { {
            $request->validate([
                'current_password' => ['required', 'string'],
                'new_password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

            $user = Auth::user();

            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'Password Sebelumnya Salah!']);
            }

            $user->fill([
                'password' => Hash::make($request->new_password)
            ])->save();

            return back()->with('status', 'Password berhasil Diubah!');
        }
    }
}
