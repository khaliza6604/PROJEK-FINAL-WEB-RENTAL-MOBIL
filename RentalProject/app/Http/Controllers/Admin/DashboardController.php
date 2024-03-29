<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::latest()->get();
        return view('admin.dashboard', compact('cars'));
    }

//     Purpose: Menampilkan daftar semua mobil di dashboard admin.
//     Description: Mengambil semua data mobil dari database, diurutkan berdasarkan tanggal pembuatan terbaru, 
//     dan kemudian melewatkan data tersebut ke view 'admin.dashboard' untuk ditampilkan.

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
