<!-- Loading Overlay -->
<div class="loading-overlay" id="loadingOverlay">
    <div class="spinner"></div>
    <div style="margin-top: 15px; font-weight: 600; color: #1F5F5B; font-size: 0.9rem;" id="loadingText">Memproses...</div>
</div>

<div class="toast" id="toast">Berhasil</div>

<!-- Modal View / Edit -->
<div class="modal-overlay" id="roomModal">
    <div class="modal-card" style="max-width: 500px; max-height: 90vh; display: flex; flex-direction: column;">
        <div class="modal-header">
            <span id="roomModalTitle">Detail Ruangan</span>
            <span style="cursor:pointer; font-size:1.2rem;" onclick="$('#roomModal').hide()">&times;</span>
        </div>
        <div class="modal-body" id="roomModalBody" style="overflow-y:auto; padding: 15px;"></div>
    </div>
</div>

<!-- Modal Galeri Foto -->
<div class="modal-overlay" id="galleryModal">
    <div class="gallery-card">
        <div class="gallery-header">
            <div class="gallery-title-wrap">
                <div class="gallery-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                </div>
                <div>
                    <div class="gallery-title-main" id="galleryTitleMain">Preview Foto</div>
                    <div class="gallery-title-sub" id="galleryTitleSub">Lokasi Ruangan</div>
                </div>
            </div>
            <span class="gallery-close" onclick="$('#galleryModal').fadeOut(200)">&times;</span>
        </div>
        <div class="gallery-body" id="galleryModalBody"></div>
        <div class="gallery-footer">
            <span>📍 Foto asli lokasi ruangan untuk memudahkan navigasi.</span>
        </div>
    </div>
</div>

<!-- Modal Hasil Aksi (Centered & Chatbot Style) -->
<div class="modal-overlay" id="resultModal">
    <div class="modal-card" style="max-width: 380px; border-radius: 20px; border: none; overflow: hidden; box-shadow: 0 15px 50px rgba(0,0,0,0.2);">
        <div class="result-icon" id="resultModalIcon" style="padding-top: 30px;"></div>
        <div class="result-title" id="resultModalTitle" style="font-size: 1.1rem; padding-bottom: 5px;">Berhasil</div>
        <div class="result-message" id="resultModalMessage" style="font-size: 0.85rem; color: #64748b; padding: 0 30px 25px;">Operasi telah berhasil dilakukan.</div>
        <div class="modal-footer" style="justify-content: center; padding: 20px; background: #f8fafc; gap: 15px;">
            <button class="btn" id="resultModalBtn" style="background: #1F5F5B; color: white; padding: 10px 35px; border-radius: 12px; font-weight: 600; font-size: 0.85rem;">OK</button>
        </div>
    </div>
</div>
