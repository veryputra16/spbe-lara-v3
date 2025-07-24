<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/profile/edit';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function attemptLogin(Request $request)
    {
        $user = User::where($this->username(), $request->input($this->username()))->first();

        if (!$user) {
            // User tidak ditemukan, biarkan Auth::attempt yang tangani
            return $this->guard()->attempt(
                $this->credentials($request),
                $request->filled('remember')
            );
        }

        if ($user->status != 1) {
            // User ditemukan tapi status tidak aktif (bukan 1)
            throw ValidationException::withMessages([
                $this->username() => ['Akun Anda belum aktif. Silakan hubungi administrator untuk aktivasi.'],
            ]);
        }

        // Status 1, lanjutkan login
        return $this->guard()->attempt(
            $this->credentials($request),
            $request->filled('remember')
        );
    }

    public function username()
    {
        return 'username';
    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required|string',
            'password' => 'required|string',
            'h-captcha-response' => 'required',
        ]);

        $response = Http::asForm()->post('https://hcaptcha.com/siteverify', [
            'secret' => env('HCAPTCHA_SECRET'),
            'response' => $request->input('h-captcha-response'),
        ]);

        if (!($response->json()['success'] ?? false)) {
            return back()
                ->withErrors(['h-captcha-response' => 'Captcha tidak valid.'])
                ->withInput($request->except('password'));
        }
    }

    // protected function credentials(Request $request)
    // {
    //     return [
    //         $this->username() => $request->input($this->username()),
    //         'password' => $request->input('password'),
    //         'status' => 1,
    //     ];
    // }
}
