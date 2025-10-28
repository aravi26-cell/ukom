@extends('admin.layouts.layout')

@section('title', 'Register - Aspray')

@section('body-class', 'auth-bg')

@push('styles')
<style>
    body {
        background: linear-gradient(135deg, #E0F7FA 0%, #C8E6C9 50%, #B2DFDB 100%);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Poppins', sans-serif;
    }

    .register-card {
        background: #fff;
        border-radius: 24px;
        box-shadow: 0 10px 35px rgba(0, 0, 0, 0.12);
        width: 100%;
        max-width: 460px;
        padding: 45px 50px;
        transition: all 0.3s ease;
    }

    .register-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 18px 45px rgba(0, 0, 0, 0.15);
    }

    .register-title {
        font-size: 34px;
        font-weight: 800;
        background: linear-gradient(90deg, #009688, #0288D1);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        letter-spacing: 1px;
    }

    .register-subtitle {
        font-size: 15px;
        color: #6b7280;
    }

    .form-control {
        border-radius: 12px;
        padding: 10px 15px;
        border: 1px solid #E0E0E0;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #0288D1;
        box-shadow: 0 0 0 3px rgba(2, 136, 209, 0.15);
    }

    .btn-primary {
        background: linear-gradient(90deg, #009688, #0288D1);
        border: none;
        border-radius: 12px;
        font-weight: 600;
        color: #fff;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background: linear-gradient(90deg, #00796B, #0277BD);
        transform: scale(1.03);
        box-shadow: 0 6px 15px rgba(0, 150, 136, 0.3);
    }

    .login-links a {
        text-decoration: none;
        color: #0288D1;
        transition: color 0.3s ease;
    }

    .login-links a:hover {
        color: #01579B;
    }

    @media (max-width: 576px) {
        .register-card {
            padding: 35px 25px;
            max-width: 90%;
        }
    }
</style>
@endpush

@section('body')
<div class="register-card">
    <div class="text-center mb-4">
        <h1 class="register-title">Aspray</h1>
        <p class="register-subtitle">Buat akun baru dan mulai perjalananmu</p>
    </div>

    <form action="{{ route('register.proses', ['role' => 'Customer']) }}" method="post">
        @csrf
        <div class="mb-3">
            <x-metronic-input name="name" type="text" caption="Nama Lengkap" placeholder="Masukkan Nama Lengkap"
                :value="old('name')" :viewtype="2" />
        </div>

        <div class="mb-3">
            <x-metronic-input name="email" type="text" caption="Email" placeholder="Masukkan Email"
                :value="old('email')" :viewtype="2" />
        </div>

        <div class="mb-3">
            <x-metronic-input name="password" type="password" caption="Password" placeholder="Masukkan Password"
                :viewtype="2" />
        </div>

        <div class="mb-4">
            <x-metronic-input name="password_confirmation" type="password" caption="Konfirmasi Password"
                placeholder="Ulangi Password" :viewtype="2" />
        </div>

        <button type="submit" class="btn btn-primary w-100 py-2 mb-3">DAFTAR</button>

        <div class="login-links text-center">
            <a href="{{ route('login') }}" class="fw-semibold">Sudah Punya Akun? Masuk Disini</a>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    init_form_element()
</script>
@endpush
