<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Chatbot Admin') - RSJ Tampan</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }
        body { background-color: #f0f2f5; color: #334155; }
        .app-header { background-color: #1F5F5B; padding: 15px; text-align: center; color: white; display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid #164a47; }
        .logo { display: flex; align-items: center; gap: 10px; }
        .logo-img { width: 40px; }
        .btn { padding: 8px 16px; border-radius: 8px; font-size: 0.8rem; font-weight: 500; cursor: pointer; border: none; transition: 0.3s; text-decoration: none; display: inline-flex; align-items: center; gap: 5px; }
        .btn-green { background-color: #1F5F5B; color: white; }
        .btn-green:hover { background-color: #164a47; }
        .btn-logout { background-color: #ef4444; color: white; }
        .btn-logout:hover { background-color: #dc2626; }
        .app-content { padding: 20px; min-height: calc(100vh - 120px); display: flex; align-items: center; justify-content: center; }
        .app-footer { text-align: center; padding: 15px; font-size: 0.7rem; color: #64748b; }
        
        /* Auth Styles */
        .auth-card { background: white; border-radius: 12px; padding: 30px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); border: 1px solid #e2e8f0; width: 100%; max-width: 400px; }
        .auth-title { color: #1F5F5B; text-align: center; margin-bottom: 20px; font-weight: 700; font-size: 1.2rem; }
        .form-group { margin-bottom: 15px; }
        .form-label { display: block; font-size: 0.75rem; font-weight: 600; color: #1F5F5B; margin-bottom: 6px; }
        .form-input { width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 0.8rem; outline: none; transition: 0.3s; }
        .form-input:focus { border-color: #1F5F5B; box-shadow: 0 0 0 3px rgba(31, 95, 91, 0.1); }
        .auth-link { color: #1F5F5B; font-weight: 600; text-decoration: none; font-size: 0.75rem; }
        .auth-link:hover { text-decoration: underline; }
    </style>
    @stack('styles')
</head>
<body>
    <header class="app-header">
        <div class="logo">
            <img src="{{ asset('icon/logo-chatbot.png') }}" alt="Logo" class="logo-img" onerror="this.style.display='none'">
            <span style="font-weight: 700; font-size: 0.9rem;">ADMIN PANEL</span>
        </div>
        @if(!Route::is('login') && !Route::is('register') && !Route::is('profile.edit'))
        <a href="{{ url('/') }}" class="btn btn-logout" style="text-decoration: none;">
            <svg viewBox="0 0 24 24" width="16" height="16" fill="white"><path d="M17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5zM4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4V5z"/></svg>
            Keluar
        </a>
        @endif
    </header>

    <main class="app-content"> 
        @yield('content')
    </main>

    <footer class="app-footer">
        © {{ date('Y') }} Navigasi RSJ Tampan - Admin System
    </footer>

    @stack('scripts')
</body>
</html>
