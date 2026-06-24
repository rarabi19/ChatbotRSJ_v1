<!-- Sidebar -->
<div class="sidebar-overlay" id="sidebarOverlay"></div>
<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <img src="{{ asset('icon/logo-chatbot.png') }}" style="width: 120px;">
        <div style="margin-top: 10px;">Admin Panel</div>
    </div>
    <div class="sidebar-menu">
        <div class="menu-item active" data-target="sec-stats">
            <svg viewBox="0 0 24 24"><path d="M3 3v18h18v-2H5V3H3zm6 14h2v-6H9v6zm4 0h2V9h-2v8zm4 0h2V5h-2v12z"/></svg>
            Statistic Bot
        </div>
        <div class="menu-item" data-target="sec-rooms">
            <svg viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14zM7 10h2v7H7v-7zm4-3h2v10h-2V7zm4 6h2v4h-2v-4z"/></svg>
            Manajemen Data Ruangan
        </div>
        <div class="menu-item" data-target="sec-feedback">
            <svg viewBox="0 0 24 24"><path d="M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-2 12H6v-2h12v2zm0-3H6V9h12v2zm0-3H6V6h12v2z"/></svg>
            Manajemen Feedback
        </div>
        <div class="menu-item" data-target="sec-profile">
            <svg viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
            Manajemen Akun
        </div>
    </div>
    <div class="sidebar-footer">
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
        <a href="#" class="btn-logout" onclick="event.preventDefault(); window.confirmLogout();">
            <svg viewBox="0 0 24 24" width="18" height="18" fill="white"><path d="M17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5zM4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4V5z"/></svg>
            Logout
        </a>
    </div>
</div>
