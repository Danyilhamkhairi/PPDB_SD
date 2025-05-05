@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="p-5">
                        <div class="text-center mb-4">
                            <img src="{{asset('assets/img/favicon.png')}}" alt="Logo" height="60" class="mb-3">
                            <h1 class="h4 text-gray-900">Selamat Datang</h1>
                            <p class="text-muted small">Sistem Informasi SD NEGERI 98X RANTAU INDAH</p>
                        </div>

                        <form class="user" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group position-relative">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-transparent">
                                            <i class="fas fa-envelope text-primary"></i>
                                        </span>
                                    </div>
                                    <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email"
                                        autofocus placeholder="Email">
                                </div>
                                @error('email')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group position-relative">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-transparent">
                                            <i class="fas fa-lock text-primary"></i>
                                        </span>
                                    </div>
                                    <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                                        name="password" required autocomplete="current-password" id="password"
                                        placeholder="Password">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-transparent toggle-password" style="cursor: pointer;">
                                            <i class="fas fa-eye text-primary"></i>
                                        </span>
                                    </div>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-checkbox small">
                                    <input type="checkbox" class="custom-control-input" id="customCheck" name="remember">
                                    <label class="custom-control-label" for="customCheck">Ingat Saya</label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                <i class="fas fa-sign-in-alt mr-2"></i> Login
                            </button>
                        </form>

                        <hr>

                        <div class="text-center">
                            <a class="small" href="{{ route('password.request') }}">
                                <i class="fas fa-key mr-1"></i> Lupa Password?
                            </a>
                        </div>

                        <div class="text-center mt-2">
                            <?php
                                $user = App\Models\User::all()->count();
                            ?>
                            @if ($user == 0)
                                <a class="small" href="{{route('register')}}">
                                    <i class="fas fa-user-plus mr-1"></i> Buat Akun Baru
                                </a>
                            @endif
                        </div>

                        <div class="text-center mt-3">
                            <a href="{{ route('landing-page') }}" class="small">
                                <i class="fas fa-home mr-1"></i> Kembali ke Beranda
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('style')
<style>
    body {
        background: linear-gradient(135deg, #5066b8 0%, #4357a5 100%);
    }

    .card {
        border-radius: 10px;
        overflow: hidden;
    }

    .input-group-text {
        border: 1px solid #d1d3e2;
        border-right: 0;
    }

    .input-group-append .input-group-text {
        border-left: 0;
        border-right: 1px solid #d1d3e2;
    }

    .form-control-user {
        border-radius: 0;
        padding: 1.2rem 1rem;
        font-size: 0.9rem;
        border-left: 0;
        border-right: 0;
    }

    .input-group {
        border-radius: 30px;
        overflow: hidden;
    }

    .input-group-prepend:first-child .input-group-text {
        border-top-left-radius: 30px;
        border-bottom-left-radius: 30px;
    }

    .input-group-append:last-child .input-group-text {
        border-top-right-radius: 30px;
        border-bottom-right-radius: 30px;
    }

    .btn-user {
        font-size: 0.9rem;
        border-radius: 30px;
        padding: 0.75rem 1rem;
        background: linear-gradient(to right, #4e68ca, #3a4eb5);
        border: none;
        transition: all 0.3s;
    }

    .btn-user:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        background: linear-gradient(to right, #3a4eb5, #2c3b92);
    }

    .custom-checkbox .custom-control-input:checked ~ .custom-control-label::before {
        background-color: #4e68ca;
        border-color: #4e68ca;
    }

    .custom-control-label {
        cursor: pointer;
    }

    .custom-control-input:focus ~ .custom-control-label::before {
        box-shadow: 0 0 0 0.2rem rgba(78, 104, 202, 0.25);
    }

    hr {
        border-color: #eaecf4;
    }

    .toggle-password:hover {
        color: #3a4eb5;
    }

    .text-primary {
        color: #4e68ca !important;
    }

    a {
        color: #4e68ca;
        transition: all 0.2s;
    }

    a:hover {
        color: #3a4eb5;
        text-decoration: none;
    }
</style>
@endpush

@push('script')
<script>
    $(document).ready(function() {
        // Toggle password visibility
        $('.toggle-password').click(function() {
            const passwordInput = $('#password');
            const passwordFieldType = passwordInput.attr('type');
            const eyeIcon = $(this).find('i');

            if (passwordFieldType === 'password') {
                passwordInput.attr('type', 'text');
                eyeIcon.removeClass('fa-eye').addClass('fa-eye-slash');
            } else {
                passwordInput.attr('type', 'password');
                eyeIcon.removeClass('fa-eye-slash').addClass('fa-eye');
            }
        });
    });
</script>
@endpush
@endsection
