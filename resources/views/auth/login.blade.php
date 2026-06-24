@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="auth-card">
    <h2 class="auth-title">Login Admin</h2>
    
    @if ($errors->any())
        <div style="background: #fee2e2; color: #dc2626; padding: 10px; border-radius: 8px; font-size: 0.75rem; margin-bottom: 15px;">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label class="form-label">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required autofocus class="form-input" placeholder="Masukkan email">
        </div>
        <div class="form-group">
            <label class="form-label">Password</label>
            <input type="password" name="password" required class="form-input" placeholder="Masukkan password">
        </div>
        <div style="display:flex; align-items:center; margin-bottom:20px;">
            <input type="checkbox" name="remember" id="remember" style="margin-right:8px; cursor:pointer;">
            <label for="remember" style="font-size:0.75rem; color:#64748b; cursor:pointer;">Ingat Saya</label>
        </div>
        <button type="submit" class="btn btn-green" style="width:100%; justify-content:center; padding: 12px;">
            Masuk Sekarang
        </button>
    </form>
    
    <div style="text-align:center; margin-top:20px; font-size:0.75rem; color: #64748b;">
        Belum punya akun? <a href="{{ route('register') }}" class="auth-link">Daftar Akun</a>
    </div>
</div>
@endsection
