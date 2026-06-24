@extends('layouts.app')

@section('title', 'Daftar Akun')

@section('content')
<div class="auth-card">
    <h2 class="auth-title">Daftar Admin Baru</h2>
    
    @if ($errors->any())
        <div style="background: #fee2e2; color: #dc2626; padding: 10px; border-radius: 8px; font-size: 0.75rem; margin-bottom: 15px;">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
            <label class="form-label">Nama Lengkap</label>
            <input type="text" name="name" value="{{ old('name') }}" required autofocus class="form-input" placeholder="Masukkan nama lengkap">
        </div>
        <div class="form-group">
            <label class="form-label">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required class="form-input" placeholder="Masukkan email">
        </div>
        <div class="form-group">
            <label class="form-label">Password</label>
            <input type="password" name="password" required class="form-input" placeholder="Minimal 8 karakter">
        </div>
        <div class="form-group">
            <label class="form-label">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" required class="form-input" placeholder="Ulangi password">
        </div>
        <button type="submit" class="btn btn-green" style="width:100%; justify-content:center; padding: 12px; margin-top: 10px;">
            Daftar Sekarang
        </button>
    </form>
    
    <div style="text-align:center; margin-top:20px; font-size:0.75rem; color: #64748b;">
        Sudah punya akun? <a href="{{ route('login') }}" class="auth-link">Login Disini</a>
    </div>
</div>
@endsection
