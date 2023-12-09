<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Message;
use App\Models\Payment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PaymentStoreRequest;

class HomeController extends Controller
{
    public function index () {
        $cars = Car::latest()->get();
        return view('frontend.homepage', compact('cars'));
    }
    // Metode ini digunakan untuk menampilkan halaman depan (homepage) dengan daftar mobil terbaru.
    // Mengambil semua mobil dari database, mengurutkannya berdasarkan tanggal pembuatan terbaru, dan mengirimnya ke view 
    // 'frontend.homepage' untuk ditampilkan.

    public function detail (Car $car) {
        return view('frontend.detail', compact('car'));
    }

    // Metode ini digunakan untuk menampilkan halaman detail untuk suatu mobil.
    // Menggunakan model binding, di mana parameter $car secara otomatis diambil dari URL dan dipasangkan dengan model Car.
   // Mengirim data mobil ke view 'frontend.detail' untuk ditampilkan.
   // model binding menyederhanakan proses mengambil data dari database berdasarkan ID atau kolom tertentu tanpa harus menulis kode yang panjang.
}
