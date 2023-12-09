<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    // Menggunakan trait AuthenticatesUsers yang menyediakan implementasi standar untuk proses otentikasi pengguna.

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    // Menentukan path redirect setelah pengguna berhasil login. Pada contoh ini, pengguna akan diarahkan ke RouteServiceProvider::HOME, 
    // yang mungkin telah diatur untuk mengarah ke halaman dashboard atau halaman utama aplikasi.

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}

// Konstruktor controller.
// Menetapkan middleware 'guest' pada semua metode controller kecuali metode 'logout'. 
// Middleware 'guest' memastikan bahwa hanya pengguna yang belum login yang dapat mengakses metode-metode dalam controller ini. 
// Jika pengguna sudah login, mereka akan diarahkan ke halaman yang telah ditentukan dalam properti $redirectTo.
