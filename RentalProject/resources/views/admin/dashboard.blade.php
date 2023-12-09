@extends('layouts.admin')

@section('content')
<style>
    .card {
        background-color: rgba(251, 242, 231, 0.8);
        /* RGBA dengan tingkat transparansi 0.8 */
        border-radius: 10px;
        /* Tambahkan border-radius untuk memberikan sudut yang sedikit melengkung */
        box-shadow: 0 0 10px rgb(110, 87, 65);
        /* Tambahkan box-shadow untuk efek bayangan */
    }
</style>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>
    <div class="row">
        <section class="py-5">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 justify-content-center">
                    @foreach ($cars as $car)
                        <div class="col mb-5">
                            <div class="card h-100">
                                <!-- Sale badge-->
                                <div
                                    class="badge badge-custom {{ $car->status == 'tersedia' ? 'bg-success' : 'bg-warning' }} text-white position-absolute"
                                    style="top: 0; right: 0">
                                    {{ $car->status }}
                                </div>
                                <!-- Product image-->
                                <img class="card-img-top" src="{{ Storage::url($car->gambar) }}" alt="{{ $car->nama_mobil }}"
                                    width="200" height="200" />
                                <!-- Product details-->
                                <div class="card-body card-body-custom pt-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder" style="color: #735e59">{{ $car->nama_mobil }}</h5>
                                        <!-- Product price-->
                                        <div class="rent-price mb-3">
                                            <span class="" style="color: #c39a74 ">Rp
                                                {{ number_format($car->harga_sewa, 0, ',', '.') }}/</span>day
                                        </div>
                                        <ul class="list-unstyled list-style-group">
                                            <li class="border-bottom p-2 d-flex justify-content-between">
                                                <span style="color: #c39a74" >Bahan Bakar</span>
                                                <span style="font-weight: 600; color: #885e43">{{ $car->bahan_bakar }}</span>
                                            </li>
                                            <li class="border-bottom p-2 d-flex justify-content-between">
                                                <span style="color: #c39a74">Jumlah Kursi</span>
                                                <span style="font-weight: 600; color: #885e43">{{ $car->jumlah_kursi }}</span>
                                            </li>
                                            <li class="border-bottom p-2 d-flex justify-content-between">
                                                <span style="color: #c39a74">Transmisi</span>
                                                <span style="font-weight: 600; color: #885e43">{{ $car->transmisi }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@endsection
