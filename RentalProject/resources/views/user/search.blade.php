@extends('user.main')

@section('content')

<style>
    .card {
        max-width: 320px;
        gap: 20px; /* Adjust the margin to control the spacing between cards */
        background-color: rgba(251, 242, 231, 0.8);
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .card-body {
        padding: 15px; /* Adjust the padding to control the spacing inside each card */
    }

    .row-cols-1 {
        display: flex;
        flex-wrap: wrap;
        margin: 100px; /* Adjust the negative margin to counteract the margin on the cards */
    }
    header {
        background-color: rgb(84, 69, 65, 0.5);
        padding: 10px 20px;
        margin-bottom: 10px;
    }

    .back-button {
        margin-top: 100; /* Adjust the margin as needed */
    }
</style>

<header class="">
    <div class="container mt-5">
        <h1 class="text-center mb-4" style="color: white">Search Results</h1>

        <form class="d-flex align-items-end pencarian mb-4" action="{{ route('search') }}" method="GET">
            <input class="form-control" type="search" name="nama_mobil" placeholder="Search by Car Name" aria-label="Search" required/>
            <button class="btn search" type="submit" style="color: white">Search</button>
        </form>
    </div>
</header>

    @if (count($cars) > 0)
        <div class="row-cols-1 row-cols-md-4">
            @foreach ($cars as $car)
                <div class="col mb-4">
                    <div class="card h-100">
                        <!-- Gambar mobil -->
                        <img class="card-img-top" src="{{ Storage::url($car->gambar) }}" alt="{{ $car->nama_mobil }}"
                            width="200" height="200"/>

                        <!-- Detail mobil -->
                        <div class="card-body">
                            <h5 class="card-title" style="color: #735e59">{{ $car->nama_mobil }}</h5>
                            <p><span class="" style="color: #c39a74 ">Rp
                                {{ number_format($car->harga_sewa, 0, ',', '.') }}/</span>day</p>
                            <!-- Tambahkan detail lainnya sesuai kebutuhan -->

                            <!-- Tombol Detail -->
                            <a href="{{ route('user.detail', $car->slug) }}" class="btn" style="background-color: #c39a74">Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <center>
            <a class="btn mt-auto text-white back-button" href="{{ route('user.index') }}" style="background-color: #885e43">Back</a>
        </center>
    @else
    <center>
        <p class="mt-5" style="color: white">No results found.</p>
    </center>
    <center>
        <a class="btn mt-auto text-white back-button" href="{{ route('user.index') }}" style="background-color: #885e43" >Back</a>
    </center>
    @endif
</div>
@endsection