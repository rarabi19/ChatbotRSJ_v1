@extends('layouts.app')

@section('title', 'Edit Profil')

@section('content')
<div class="auth-card" style="max-width: 500px; position: relative; padding-top: 40px;">
    <a href="{{ url('/admin') }}" style="position: absolute; top: 15px; right: 15px; width: 30px; height: 30px; background: #f1f5f9; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #64748b; text-decoration: none; font-size: 1.2rem; transition: 0.2s;" onmouseover="this.style.background='#e2e8f0'" onmouseout="this.style.background='#f1f5f9'">&times;</a>
    
    <h2 class="auth-title" style="text-align: center; margin-bottom: 25px;">Edit Profil</h2>

    @if (session('success'))
        <div style="background: #dcfce7; color: #166534; padding: 12px; border-radius: 8px; font-size: 0.75rem; margin-bottom: 15px; border: 1px solid #bbf7d0;">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div style="background: #fee2e2; color: #dc2626; padding: 12px; border-radius: 8px; font-size: 0.75rem; margin-bottom: 15px; border: 1px solid #fecaca;">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        <div class="form-group">
            <label class="form-label">Nama Lengkap</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" required class="form-input">
        </div>
        
        <div class="form-group">
            <label class="form-label">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" required class="form-input">
        </div>

        <hr style="border: 0; border-top: 1px solid #e2e8f0; margin: 20px 0;">
        <p style="font-size: 0.7rem; color: #64748b; margin-bottom: 15px;">Kosongkan password jika tidak ingin mengubahnya.</p>

        <div class="form-group">
            <label class="form-label">Password Baru</label>
            <input type="password" name="password" class="form-input" placeholder="Minimal 8 karakter">
        </div>

        <div class="form-group">
            <label class="form-label">Konfirmasi Password Baru</label>
            <input type="password" name="password_confirmation" class="form-input" placeholder="Ulangi password baru">
        </div>

        <button type="submit" class="btn btn-green" style="width:100%; justify-content:center; padding: 12px; margin-top: 10px;">
            Simpan Perubahan
        </button>
    </form>
</div>
@endsection
