<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    // Menggunakan trait RegistersUsers untuk mendapatkan fungsionalitas registrasi pengguna.

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    // Menentukan path redirect setelah pengguna berhasil registrasi. 
    //pengguna akan diarahkan ke RouteServiceProvider::HOME, 
    // yang mungkin telah diatur untuk mengarah ke halaman dashboard atau halaman utama aplikasi.

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    // Metode ini mengembalikan instance validator yang digunakan untuk memvalidasi data registrasi pengguna.
   //Validator memeriksa bahwa nama (name) diperlukan, merupakan string dengan panjang maksimal 255 karakter, 
   //alamat email (email) diperlukan, merupakan alamat email yang valid, dan unik dalam tabel pengguna (users), 
   //serta kata sandi (password) diperlukan, merupakan string dengan panjang minimal 8 karakter, dan terkonfirmasi (confirmed).

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}

// Metode ini digunakan untuk membuat instance pengguna baru setelah data registrasi dinyatakan valid oleh validator.
// Metode create menggunakan model User untuk membuat entitas pengguna baru dengan atribut-atribut yang diberikan, 
// termasuk meng-hash password menggunakan Hash::make.
