<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }
}

// 1. auth: Memastikan hanya pengguna yang sudah login yang dapat mengakses metode dalam controller.
// 2. signed: Memastikan bahwa tautan atau permintaan untuk metode 'verify' harus ditandatangani.
// 3. throttle: Membatasi frekuensi pengaksesan metode 'verify' dan 'resend' agar tidak terjadi penyalahgunaan atau serangan.
// middleware 'throttle' diterapkan pada metode 'verify' dan 'resend', dengan batasan sebanyak 6 requests per menit (parameter pertama) dan 1 menit (parameter kedua).