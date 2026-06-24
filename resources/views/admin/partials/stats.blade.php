<div id="sec-stats" class="section active">
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-val" id="statChat">{{ $totalChat }}</div>
            <div class="stat-label">Total Chat Masuk</div>
        </div>
        <div class="stat-card">
            <div class="stat-val" id="statFeedback">{{ $totalFeedback }}</div>
            <div class="stat-label">Feedback Masuk</div>
        </div>
        {{-- Akurasi STATIS dari LabelRespon.ipynb --}}
        <div class="stat-card">
            <div class="stat-val" id="statAkurasiIntent" style="color: #0f766e;">{{ $accuracyIntent }}%</div>
            <div class="stat-label">Akurasi Label Respon</div>
            <div style="font-size: 0.65rem; color: #64748b; margin-top: 3px;">Hasil Uji Model (SVM)</div>
        </div>
        {{-- Akurasi STATIS dari Evaluasi_Optimasi2.ipynb --}}
        <div class="stat-card">
            <div class="stat-val" id="statAkurasiRoom" style="color: #0f766e;">{{ $accuracyRoom }}%</div>
            <div class="stat-label">Akurasi Data Ruangan</div>
            <div style="font-size: 0.65rem; color: #64748b; margin-top: 3px;">Hasil Uji Model (Hybrid)</div>
        </div>
        {{-- Akurasi DINAMIS dari feedback user --}}
        <div class="stat-card" style="grid-column: span 2; background: #e0f2fe; border: 1px solid #bae6fd;">
            <div class="stat-val" style="color: #0369a1;" id="statAkurasiLive">{{ $accuracy }}%</div>
            <div class="stat-label" style="color: #0284c7;">Akurasi Nyata (Berdasarkan Feedback User)</div>
            <div style="font-size: 0.65rem; color: #0369a1; margin-top: 3px;">Total: {{ $totalFeedback }} feedback masuk</div>
        </div>
    </div>


    <!-- Grafik Monitoring Akurasi AI (dari Feedback User) -->
    <div class="stat-card" style="margin-top: 20px;">
        <div style="font-size: 1rem; font-weight: 600; margin-bottom: 4px;">Monitoring Akurasi AI</div>
        <div style="font-size: 0.72rem; color: #64748b; margin-bottom: 14px;">Berdasarkan feedback pengguna — sejak {{ \Carbon\Carbon::parse(($accuracyData[0]['date'] ?? now()))->format('d M Y') }}</div>
        @if(count($accuracyData) > 0)
            <div style="height: 360px;"><canvas id="accuracyChart"></canvas></div>
        @else
            <div style="height: 200px; display: flex; align-items: center; justify-content: center; color: #94a3b8; font-style: italic; font-size: 0.85rem; background: #f8fafc; border-radius: 12px; border: 2px dashed #e2e8f0;">
                Belum ada data feedback untuk ditampilkan pada grafik.
            </div>
        @endif
    </div>

    <!-- Sincron Model Card (Match Image Reference) -->
    <div class="stat-card" style="margin-top: 20px; background: #1F5F5B; border: none; border-radius: 15px; padding: 20px; text-align: center; color: white;">
        <div style="font-size: 1rem; font-weight: 700; margin-bottom: 2px;">Status Model AI</div>
        <div style="font-size: 0.75rem; opacity: 0.8; margin-bottom: 15px;">Terkoneksi dengan Python Engine</div>
        
        <div style="display: flex; justify-content: center;">
            <button class="btn" id="btnSyncStats" style="background: #ca8a04; color: white; padding: 8px 25px; border-radius: 10px; font-weight: 700; font-size: 0.8rem; display: flex; align-items: center; gap: 8px; border: none; box-shadow: 0 4px 10px rgba(0,0,0,0.2);">
                <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M23 4v6h-6M1 20v-6h6M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path></svg>
                Sinkronisasi Dataset Sekarang
            </button>
        </div>
    </div>


</div>
