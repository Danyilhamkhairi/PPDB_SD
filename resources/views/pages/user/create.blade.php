@extends('layouts.index')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Tambah Pengguna</h1>
            <p class="mt-2 text-gray-600">Tambahkan pengguna administrator baru ke sistem</p>
        </div>
        <a href="{{route('user.index')}}" class="btn btn-warning shadow-sm">
            <i class="fas fa-arrow-left fa-sm mr-2"></i>Kembali
        </a>
    </div>

    <!-- Form Card -->
    <div class="card shadow mb-4 border-0">
        <div class="card-header py-3 bg-white">
            <h6 class="m-0 font-weight-bold text-primary">Formulir Data Pengguna</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8 col-md-10">
                    <form action="{{route('user.store')}}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="name" class="font-weight-bold">Nama Pengguna</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama lengkap" required>
                        </div>

                        <div class="form-group">
                            <label for="email" class="font-weight-bold">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan alamat email" required>
                        </div>

                        <div class="form-group">
                            <label for="password" class="font-weight-bold">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                        <i class="fas fa-eye" id="toggleIcon"></i>
                                    </button>
                                </div>
                            </div>
                            <small class="form-text text-muted">Password harus minimal 8 karakter</small>
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation" class="font-weight-bold">Konfirmasi Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi password" required>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword">
                                        <i class="fas fa-eye" id="toggleConfirmIcon"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-4 d-flex justify-content-between">
                            <a href="{{route('user.index')}}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="fas fa-save mr-1"></i> Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .form-control {
        padding: 0.75rem 1rem;
        border-radius: 5px;
    }
    .form-control:focus {
        border-color: #4e73df;
        box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
    }
    .btn {
        border-radius: 5px;
        padding: 0.5rem 1rem;
        font-weight: 500;
        transition: all 0.2s;
    }
    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .card {
        border-radius: 10px;
        overflow: hidden;
    }
    label {
        font-size: 0.9rem;
        margin-bottom: 0.5rem;
    }
    .input-group-append .btn {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Toggle Password Visibility
        const togglePassword = document.getElementById('togglePassword');
        const password = document.getElementById('password');
        const toggleIcon = document.getElementById('toggleIcon');

        if (togglePassword) {
            togglePassword.addEventListener('click', function() {
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                toggleIcon.classList.toggle('fa-eye');
                toggleIcon.classList.toggle('fa-eye-slash');
            });
        }

        // Toggle Confirm Password Visibility
        const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
        const passwordConfirmation = document.getElementById('password_confirmation');
        const toggleConfirmIcon = document.getElementById('toggleConfirmIcon');

        if (toggleConfirmPassword) {
            toggleConfirmPassword.addEventListener('click', function() {
                const type = passwordConfirmation.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordConfirmation.setAttribute('type', type);
                toggleConfirmIcon.classList.toggle('fa-eye');
                toggleConfirmIcon.classList.toggle('fa-eye-slash');
            });
        }
    });
</script>
@endsection
