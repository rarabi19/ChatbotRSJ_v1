<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Admin Dashboard - RSJ Tampan</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <style>
        .form-label { font-size: 0.75rem; font-weight: 600; color: #1F5F5B; margin-bottom: 4px; }
        .form-input { width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 0.8rem; outline: none; transition: 0.2s; }
        .form-input:focus { border-color: #1F5F5B; box-shadow: 0 0 0 3px rgba(31, 95, 91, 0.1); }
        .page-btn.disabled { opacity: 0.3; cursor: not-allowed; }
    </style>
</head>
<body>
    <div class="container-utama">
        <!-- Header -->
        <div class="header">
            <button class="hamburger" id="btnMenu"><span></span><span></span><span></span></button>
            <div id="headerTitle">Dashboard Admin</div>
            <div style="width: 24px;"></div>
        </div>

        @include('admin.partials.sidebar')

        <!-- Main Content -->
        <div class="content">
            @include('admin.partials.stats')
            @include('admin.partials.rooms')
            @include('admin.partials.feedback')
            @include('admin.partials.profile')
        </div>

        @include('admin.partials.modals')
    </div>

    @include('admin.partials.scripts')
</body>
</html>
