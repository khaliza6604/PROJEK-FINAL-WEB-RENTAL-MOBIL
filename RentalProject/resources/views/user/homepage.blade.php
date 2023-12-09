@extends('user.main')
@section('content')
<style>
    .card {
        background-color: rgba(251, 242, 231, 0.8);
        border-radius: 10px; /* untuk memberikan sudut yang sedikit melengkung */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: rgb(204, 197, 194, 0.8);
        color: white;
        border-radius: 10px 10px 0 0;
    }

    .card-body {
        padding: 20px;
    }

    header {
        background-color: rgb(84, 69, 65, 0.5);
        padding: 20px;
    }
</style>
    <header class="">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h3 class="display-4 fw-bolder">
                    くるま レンタル
                    </h3>
                    <h1 class="display-4 fw-bolder">
                        Sistem Pemesanan Mobil
                    </h1>
                    <p class="lead fw-normal text-white-50 mb-0">
                        Kemudahan Perjalanan Anda Dimulai di Sini,
                    </p>
                    <p class="lead fw-normal text-white-50 mb-0">
                        "Kemanapun Anda Akan Pergi!"
                    </p>
                <form class="d-flex align-items-end pencarian mt-5" action="{{ route('search') }}" method="GET">
                    <input class="form-control" type="search" name="nama_mobil" placeholder="Search by Car Name"
                        aria-label="Search" required/>
                    <button class="btn search" type="submit" style="color: white">Search</button>
                </form>
            </div>
        </div>
    </header>
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            @if (session()->has('message'))
                <div class="alert alert-{{ session()->get('alert-type') }} alert-dismissible fade show" role="alert">
                    {{ session()->get('message') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h3 class="text-center mb-5" style="color: white">Daftar Mobil</h3>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach ($cars as $car)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge-->
                            <div class="badge badge-custom {{ $car->status == 'tersedia' ? 'bg-success' : 'bg-warning' }} text-white position-absolute"
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
                            <!-- Product actions-->
                            <div class="card-footer border-top-0 bg-transparent">
                                <div class="text-center">
                                    @if ($car->status == 'tersedia')
                                        <a class="btn mt-auto" href="{{ route('payment', ['car_slug' => $car->slug]) }}" style="background-color: #885e43">Sewa</a>
                                    @else
                                        <button class="btn" style="background-color: #908471; color: white" disabled>Sewa</button>
                                    @endif
                                    <a class="btn mt-auto text-white" href="{{ route('user.detail', $car->slug) }}" style="background-color: #c39a74" >Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
