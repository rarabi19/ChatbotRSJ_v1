<div id="sec-profile" class="section">
    <div style="background: white; border-radius: 12px; padding: 20px; text-align: center; border: 1px solid #e2e8f0;">
        <div style="width: 80px; height: 80px; background: #1F5F5B; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; margin: 0 auto 15px; font-weight: bold;">
            {{ substr(Auth::user()->name, 0, 1) }}
        </div>
        <h3 style="color: #1e293b; font-size: 1.1rem; margin-bottom: 5px;">{{ Auth::user()->name }}</h3>
        <p style="color: #64748b; font-size: 0.8rem; margin-bottom: 20px;">{{ Auth::user()->email }}</p>
        <div style="text-align: left; font-size: 0.8rem;">
            <div style="padding: 10px 0; border-bottom: 1px solid #f1f5f9;"><strong>Role:</strong> Administrator</div>
            <div style="padding: 10px 0; border-bottom: 1px solid #f1f5f9;"><strong>ID:</strong> #{{ Auth::id() }}</div>
        </div>
        <div style="display: flex; gap: 10px; margin-top: 20px;">
            <a href="{{ route('profile.edit') }}" style="flex: 1; text-align: center; background: #f1f5f9; color: #1e293b; padding: 8px 0; border-radius: 8px; text-decoration: none; font-size: 0.85rem; font-weight: 600; border: 1px solid #e2e8f0; transition: 0.2s; display: block;" onmouseover="this.style.background='#e2e8f0'" onmouseout="this.style.background='#f1f5f9'">Edit Profil</a>
            <a href="{{ route('register') }}" style="flex: 1; text-align: center; background: #f1f5f9; color: #1e293b; padding: 8px 0; border-radius: 8px; text-decoration: none; font-size: 0.85rem; font-weight: 600; border: 1px solid #e2e8f0; transition: 0.2s; display: block;" onmouseover="this.style.background='#e2e8f0'" onmouseout="this.style.background='#f1f5f9'">Tambah Admin</a>
        </div>
    </div>
</div>
