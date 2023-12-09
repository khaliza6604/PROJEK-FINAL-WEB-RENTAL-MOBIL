@extends('user.main')
@section('content')
<style>
    .card {
        background-color: rgba(251, 242, 231, 0.8);
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: rgba(0, 123, 255, 0.8);
        color: white;
        border-radius: 10px 10px 0 0;
    }

    .card-body {
        padding: 20px;
    }
    header {
        background-color: rgb(84, 69, 65, 0.5);
        padding: 10px 20px;
        margin-bottom: 10px;
    }
</style>

<header class="">
    <div class="container mt-5">
        <h3 class="text-center mb-4" style="color: white">Daftar Driver</h3>
    </div>
</header>

    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach ($drivers as $driver)
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Sale badge-->
                        <div class="badge badge-custom {{ $driver->status == 'tersedia' ? 'bg-success' : 'bg-warning' }} text-white position-absolute" style="top: 0; right: 0">
                            {{ $driver->status }}
                        </div>
                        <!-- Product image-->
                        <img class="card-img-top" src="{{ Storage::url($driver->gambar_driver) }}" alt="{{ $driver->nama_driver }}" width="200" height="200" />
                        <!-- Product details-->
                        <div class="card-body card-body-custom pt-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder" style="color: #735e59">{{ $driver->nama_driver }}</h5>
                                <!-- Product price-->
                                <ul class="list-unstyled list-style-group">
                                    <li class="border-bottom p-2 d-flex justify-content-between">
                                        <span style="color: #c39a74">Gender</span>
                                        <span style="font-weight: 600; color: #885e43">{{ $driver->gender }}</span>
                                    </li>
                                    <li class="border-bottom p-2 d-flex justify-content-between">
                                        <span style="color: #c39a74" >Usia</span>
                                        <span style="font-weight: 600; color: #885e43">{{ $driver->usia }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <center>
                <a class="btn mt-auto text-white" href="{{ route('user.index') }}" style="background-color: #885e43" >Back</a>
            </center>
        </div>
    </section>
@endsection

