@extends('layouts.app')

@section('content')
<style>
    .card {
        background-color: rgb(243, 233, 220, 0.8);
        border-radius: 10px;
        box-shadow: 0 0 10px rgb(93, 47, 34, 0.1);
    }

    .card-header {
        background-color: rgba(0, 123, 255, 0.8);
        color: white;
        border-radius: 10px 10px 0 0;
    }

    .card-body {
        padding: 20px;
    }
</style>
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title" style="color: #885e43">Profile</h2>
            <form id="profileForm" action="{{ route('user.profile.update') }}" method="POST">
                @csrf

                <!-- Nama -->
                <div class="mb-3">
                    <label for="name" class="form-label" style="color: #c39a74">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" required>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label" style="color: #c39a74">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" required>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label" style="color: #c39a74">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                    <small class="text-muted" style="color: #c39a74">Biarkan kosong jika tidak ingin mengubah password.</small>
                </div>

                <!-- Konfirmasi Password -->
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label" style="color: #c39a74">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                </div>

                <!-- Tombol Simpan -->
                <button type="submit" class="btn" style="background-color: #c39a74; color: #2c1610">Simpan Perubahan</button>
                <a class="btn mt-auto text-white" href="{{ route('user.index') }}" style="background-color: #885e43" >Back</a>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var form = document.getElementById('profileForm');
        var originalFormData = new FormData(form);

        form.addEventListener('submit', function (event) {
            var currentFormData = new FormData(form);

            if (isFormDataEqual(originalFormData, currentFormData)) {
                event.preventDefault(); // Prevent form submission

                // Show a confirmation dialog
                var isConfirmed = confirm("Tidak ada perubahan yang diubah. Yakin ingin melanjutkan?");
                
                if (isConfirmed) {
                    // If user confirms, submit the form
                    form.submit();
                }
            }
        });

        function isFormDataEqual(formData1, formData2) {
            if (formData1 && formData2) {
                // Convert FormData objects to JSON strings and compare
                return JSON.stringify([...formData1.entries()]) === JSON.stringify([...formData2.entries()]);
            }
            return false;
        }
    });
</script>
@endsection