<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CarStoreRequest;
use App\Http\Requests\Admin\CarUpdateRequest;

// Mendefinisikan namespace dari controller ini.
// Menggunakan beberapa kelas yang diperlukan, seperti Car, Str untuk manipulasi string, Request, Controller, dan beberapa request classes.

class CarController extends Controller
{
// Mendeklarasikan kelas CarController yang merupakan turunan dari kelas dasar Laravel Controller.

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::latest()->get();

        return view('admin.cars.index', compact('cars'));
    }
    // Mengambil semua mobil dari database dan mengirimkannya ke view 'admin.cars.index'.

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cars.create');
    }
    // Mengembalikan view 'admin.cars.create' untuk menampilkan formulir pembuatan mobil baru.

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarStoreRequest $request)
    {
        if($request->validated()) {
            $gambar = $request->file('gambar')->store('assets/car', 'public');
            $slug = Str::slug($request->nama_mobil, '-');
            Car::create($request->except('gambar') + ['gambar' => $gambar, 'slug' => $slug]);
        }

        return redirect()->route('cars.index')->with([
            'message' => 'Data Berhasil Dibuat',
            'alert-type' => 'success'
        ]);
    }
    // Menyimpan data mobil baru ke dalam database setelah memvalidasi request.
    // Menggunakan Str::slug untuk membuat slug dari nama mobil.
    // Mengarahkan pengguna kembali ke halaman indeks mobil setelah penyimpanan berhasil.


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        return view('admin.cars.edit', compact('car'));
    }
    // Mengembalikan view 'admin.cars.edit' dengan data mobil yang akan diedit.

    /**
     * Update the specified resource in storage.
     */
    public function update(CarUpdateRequest $request, Car $car)
    {
        if($request->validated()) {
            $slug = Str::slug($request->nama_mobil, '-');
            $car->update($request->validated() + ['slug' => $slug]);
        }

        return redirect()->route('cars.index')->with([
            'message' => 'Data Berhasil Diedit',
            'alert-type' => 'info'
        ]);

    }
    // Memperbarui data mobil yang sudah ada di database setelah memvalidasi request.
    // Mengarahkan pengguna kembali ke halaman indeks mobil setelah pembaruan berhasil.

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        if($car->gambar) {
            unlink('storage/'. $car->gambar);
        }
        $car->delete();

        return redirect()->back()->with([
            'message' => 'Data Berhasil DiHapus',
            'alert-type' => 'danger'
        ]);
    }
    // Menghapus data mobil dari database.
    // Menghapus gambar mobil dari penyimpanan publik (jika ada).
    // Mengarahkan pengguna kembali ke halaman sebelumnya setelah penghapusan berhasil.

    public function updateImage (Request $request, $carId){
        $request->validate([
            'gambar' => 'required|image'
        ]);
        $car = Car::findOrFail($carId);
        if($request->gambar) {
            unlink('storage/'. $car->gambar);
            $gambar = $request->file('gambar')->store('assets/car', 'public');

            $car->update(['gambar' => $gambar]);
        }

        return redirect()->back()->with([
            'message' => 'Gambar Berhasil Diedit',
            'alert-type' => 'info'
        ]);
    }
}
// Memperbarui gambar dari sebuah mobil setelah memvalidasi request.
// Menghapus gambar lama dari penyimpanan publik.
// Mengarahkan pengguna kembali ke halaman sebelumnya setelah pembaruan berhasil.
