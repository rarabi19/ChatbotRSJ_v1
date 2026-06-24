<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
$(document).ready(function() {
    const BASE_URL = "{{ asset('room_img') }}/";
    let allData = [], filteredData = [], currentPage = 1, perPage = 7, deleteMode = false;

    // --- Navigasi Sidebar ---
    $('#btnMenu').click(() => { $('#sidebar').addClass('open'); $('#sidebarOverlay').show().css('opacity', 1); });
    $('#sidebarOverlay').click(() => { $('#sidebar').removeClass('open'); $('#sidebarOverlay').css('opacity', 0); setTimeout(() => $('#sidebarOverlay').hide(), 300); });
    $('.menu-item').click(function() {
        $('.menu-item').removeClass('active'); $(this).addClass('active');
        const target = $(this).data('target');
        $('.section').removeClass('active'); $('#' + target).addClass('active');
        $('#headerTitle').text($(this).text().trim());
        $('#sidebarOverlay').click();
        if(target === 'sec-rooms') loadData();
    });

    // --- Utilitas ---
    const showToast = (msg) => { $('#toast').text(msg).css('opacity', 1); setTimeout(() => $('#toast').css('opacity', 0), 3000); };
    const showResultModal = (success, title, message, onOk = null) => {
        const color = success ? '#059669' : '#dc2626';
        const icon = success ? '<svg width="56" height="56" viewBox="0 0 24 24" fill="none" stroke="#059669" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>' : '<svg width="56" height="56" viewBox="0 0 24 24" fill="none" stroke="#dc2626" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>';
        $('#resultModalIcon').html(icon); $('#resultModalTitle').text(title).css('color', color); $('#resultModalMessage').text(message);
        $('#resultModalBtn').css('background', color).off('click').on('click', () => { $('#resultModal').fadeOut(200); if(onOk) onOk(); });
        $('#resultModal').css('display', 'flex').hide().fadeIn(200);
    };

    const showConfirm = (title, message, onConfirm) => {
        $('#resultModalIcon').html('<svg width="56" height="56" viewBox="0 0 24 24" fill="none" stroke="#ca8a04" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>');
        $('#resultModalTitle').text(title).css('color', '#ca8a04'); $('#resultModalMessage').text(message);
        $('#resultModalBtn').text('Ya, Lanjutkan').css('background', '#ca8a04').off('click').on('click', () => { $('#resultModal').fadeOut(200); onConfirm(); });
        
        // Add cancel button if not exists
        if($('#resultModalCancel').length === 0) {
            $('<button class="btn" id="resultModalCancel" style="background:#cbd5e1; color:#475569; padding: 10px 30px; border-radius:12px; font-weight:600; font-size:0.85rem;">Batal</button>').insertBefore('#resultModalBtn');
        }
        $('#resultModalCancel').show().off('click').on('click', () => $('#resultModal').fadeOut(200));
        $('#resultModalBtn').text('Ya');
        $('#resultModal').css('display', 'flex').hide().fadeIn(200);
    };

    const hideConfirmExtra = () => {
        $('#resultModalCancel').hide();
        $('#resultModalBtn').text('OK');
    };

    // --- Manajemen Data Ruangan ---
    const loadData = () => {
        $('#tableBody').html('<tr><td colspan="9" style="text-align:center;">Memuat data...</td></tr>');
        $.get("{{ route('data-ruangan.index') }}", res => { allData = res.data || []; filteredData = [...allData]; renderTable(); });
    };

    const truncateText = (str, max) => {
        if (!str) return '-';
        const words = str.split(' ');
        if (words.length <= max) return str;
        return words.slice(0, max).join(' ') + '...';
    };

    const renderTable = () => {
        const start = (currentPage - 1) * perPage;
        const pageData = filteredData.slice(start, start + perPage);
        let html = pageData.length ? '' : '<tr><td colspan="9" style="text-align:center;">Tidak ada data</td></tr>';
        
        pageData.forEach((item, index) => {
            const img = item.foto_ruangans?.[0]?.path_foto;
            const fotoHtml = img ? `<img src="${BASE_URL}${img}" class="img-thumb" onclick="event.stopPropagation(); viewPhoto(${item.id})">` : '<div class="no-img">No Img</div>';
            html += `
                <tr onclick="openViewModal(${item.id})" style="cursor:pointer;">
                    <td class="kolom-hapus-header" style="${deleteMode?'':'display:none;'}"><input type="checkbox" class="check-hapus" value="${item.id}" onclick="event.stopPropagation()"></td>
                    <td>${start + index + 1}</td>
                    <td>${fotoHtml}</td>
                    <td style="color:#000; font-weight:500;">${item.nama_ruangan}</td>
                    <td>${truncateText(item.nama_gedung, 3)}</td>
                    <td>${truncateText(item.kategori, 3)}</td>
                    <td>${truncateText(item.fungsi_ruangan, 3)}</td>
                    <td>${item.penanggung_jawab || '-'}</td>
                    <td>
                        <div class="action-icons" onclick="event.stopPropagation()">
                            <button class="action-btn btn-view" onclick="openViewModal(${item.id})"><svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></button>
                            <button class="action-btn btn-edit" onclick="openEditModal(${item.id})"><svg viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg></button>
                            <button class="action-btn btn-delete" onclick="deleteSingleRoom(${item.id})"><svg viewBox="0 0 24 24"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><line x1="10" y1="11" x2="10" y2="17"/><line x1="14" y1="11" x2="14" y2="17"/></svg></button>
                        </div>
                    </td>
                </tr>`;
        });
        $('#tableBody').html(html);
        renderPagination();
    };

    // --- Pagination (Max 5 Dot + < >) ---
    const renderPagination = () => {
        const total = Math.ceil(filteredData.length / perPage);
        if (total <= 1) return $('#pagination').html('');
        let html = `<div class="page-btn ${currentPage===1?'disabled':''}" onclick="setPage(${currentPage-1})">&lt;</div>`;
        let start = Math.max(1, currentPage - 2);
        let end = Math.min(total, start + 4);
        if (end - start < 4) start = Math.max(1, end - 4);
        for(let i=start; i<=end; i++) html += `<div class="page-btn ${i===currentPage?'active':''}" onclick="setPage(${i})">${i}</div>`;
        html += `<div class="page-btn ${currentPage===total?'disabled':''}" onclick="setPage(${currentPage+1})">&gt;</div>`;
        $('#pagination').html(html);
    };
    window.setPage = p => { if(p < 1 || p > Math.ceil(filteredData.length/perPage)) return; currentPage = p; renderTable(); };

    $('#searchInput').on('keyup', function() {
        filteredData = allData.filter(d => (d.nama_ruangan||'').toLowerCase().includes($(this).val().toLowerCase()) || (d.nama_gedung||'').toLowerCase().includes($(this).val().toLowerCase()));
        currentPage = 1; renderTable();
    });

    // --- Form Management ---
    const renderForm = (it = {}) => {
        const isEdit = !!it.id;
        hideConfirmExtra();
        $('#roomModalTitle').text(isEdit ? 'Edit Ruangan' : 'Tambah Ruangan');
        
        let existingPhotosHtml = '';
        if (isEdit && it.foto_ruangans && it.foto_ruangans.length > 0) {
            existingPhotosHtml = `
                <label class="form-label" style="margin-top:15px; display:block;">Foto Tersimpan</label>
                <div class="foto-grid">
                    ${it.foto_ruangans.map(f => `
                        <div class="foto-grid-item" id="foto-item-${f.id}">
                            <img src="${BASE_URL}${f.path_foto}">
                            <button class="btn-remove-foto" onclick="deleteSinglePhoto(${f.id}, event)">&times;</button>
                        </div>
                    `).join('')}
                </div>`;
        }

        $('#roomModalBody').html(`
            <div style="padding:5px;">
                <label class="form-label">Nama Ruangan</label>
                <input type="text" id="fNama" value="${it.nama_ruangan||''}" class="form-input" placeholder="Contoh: Ruang Mawar">
                <div style="display:grid; grid-template-columns:1fr 1fr; gap:10px; margin-top:12px;">
                    <div><label class="form-label">Gedung</label><input type="text" id="fGedung" value="${it.nama_gedung||''}" class="form-input" placeholder="Gedung A"></div>
                    <div><label class="form-label">Kategori</label><input type="text" id="fKat" value="${it.kategori||''}" class="form-input" placeholder="Rawat Inap"></div>
                </div>
                <label class="form-label" style="margin-top:12px; display:block;">PJ / Penanggung Jawab</label>
                <input type="text" id="fPJ" value="${it.penanggung_jawab||''}" class="form-input" placeholder="Nama PJ">
                <label class="form-label" style="margin-top:12px; display:block;">Fungsi Ruangan</label>
                <textarea id="fFungsi" class="form-input" style="min-height:60px;" placeholder="Jelaskan fungsi ruangan...">${it.fungsi_ruangan||''}</textarea>
                <label class="form-label" style="margin-top:12px; display:block;">Petunjuk Navigasi</label>
                <textarea id="fNav" class="form-input" style="min-height:60px;" placeholder="Arah jalan menuju lokasi...">${it.navigasi||''}</textarea>
                <label class="form-label" style="margin-top:12px; display:block;">Kata Kunci (Bot Search)</label>
                <input type="text" id="fKunci" value="${it.kata_kunci||''}" class="form-input" placeholder="Contoh: toilet, wc, kamar mandi, ibadah">
                
                ${existingPhotosHtml}

                <label class="form-label" style="margin-top:15px; display:block;">Pilih Foto Baru</label>
                <div class="foto-dropzone" onclick="$('#fFotos').click()">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4M17 8l-5-5-5 5M12 3v12"/></svg>
                    <div>Klik untuk upload foto</div>
                </div>
                <input type="file" id="fFotos" multiple accept="image/*" style="display:none;" onchange="previewFiles(this)">
                <div id="previewContainer" class="foto-grid" style="margin-top:10px;"></div>

                <button class="btn btn-green" onclick="saveRoom(${it.id || 'null'})" style="width:100%; margin-top:20px; justify-content:center; padding:12px; font-size:0.9rem;">
                    SIMPAN PERUBAHAN
                </button>
            </div>`);
        $('#roomModal').css('display', 'flex').hide().fadeIn(200);
    };

    window.previewFiles = input => {
        const container = $('#previewContainer');
        container.empty();
        if (input.files) {
            Array.from(input.files).forEach(file => {
                const reader = new FileReader();
                reader.onload = e => {
                    container.append(`<div class="foto-grid-item"><img src="${e.target.result}"></div>`);
                };
                reader.readAsDataURL(file);
            });
        }
    };

    window.deleteSinglePhoto = (fotoId, event) => {
        event.stopPropagation();
        showConfirm('Hapus Foto?', 'Foto ini akan dihapus dari sistem.', () => {
            $.ajax({
                url: `/data-ruangan/foto/${fotoId}`,
                type: 'DELETE',
                data: { _token: '{{ csrf_token() }}' },
                success: () => {
                    $(`#foto-item-${fotoId}`).remove();
                    showToast('Foto terhapus');
                }
            });
        });
    };

    window.openCreateModal = () => renderForm({});
    window.openEditModal = id => renderForm(allData.find(d => d.id == id));
    window.openViewModal = id => {
        const it = allData.find(d => d.id == id); if(!it) return;
        hideConfirmExtra();
        $('#roomModalTitle').text('Detail Ruangan');
        const foto = it.foto_ruangans?.[0]?.path_foto;
        const fotoHtml = foto ? `<div onclick="viewPhoto(${it.id})" style="height:180px; background:url('${BASE_URL}${foto}') center/cover; border-radius:12px; cursor:pointer; margin-bottom:15px; border:2px solid white; box-shadow:0 4px 10px rgba(0,0,0,0.1);"></div>` : '<div style="height:100px; background:#f1f5f9; border-radius:12px; display:flex; align-items:center; justify-content:center; color:#94a3b8; font-style:italic; margin-bottom:15px;">Belum ada foto</div>';
        
        $('#roomModalBody').html(`
            <div style="padding:5px;">
                ${fotoHtml}
                <div style="display:flex; flex-direction:column; gap:12px;">
                    <div style="padding:12px; background:white; border-radius:10px; border:1px solid #e2e8f0;">
                        <div style="font-size:0.65rem; font-weight:700; color:#64748b; text-transform:uppercase; margin-bottom:4px;">Nama Ruangan</div>
                        <div style="font-size:0.95rem; font-weight:600; color:#1F5F5B;">${it.nama_ruangan}</div>
                    </div>
                    <div style="display:grid; grid-template-columns:1fr 1fr; gap:10px;">
                        <div style="padding:10px; background:white; border-radius:10px; border:1px solid #e2e8f0;">
                            <div style="font-size:0.6rem; font-weight:700; color:#64748b; text-transform:uppercase; margin-bottom:2px;">Gedung</div>
                            <div style="font-size:0.8rem; font-weight:600;">${it.nama_gedung||'-'}</div>
                        </div>
                        <div style="padding:10px; background:white; border-radius:10px; border:1px solid #e2e8f0;">
                            <div style="font-size:0.6rem; font-weight:700; color:#64748b; text-transform:uppercase; margin-bottom:2px;">Kategori</div>
                            <div style="font-size:0.8rem; font-weight:600;">${it.kategori||'-'}</div>
                        </div>
                    </div>
                    <div style="padding:12px; background:white; border-radius:10px; border:1px solid #e2e8f0;">
                        <div style="font-size:0.65rem; font-weight:700; color:#64748b; text-transform:uppercase; margin-bottom:4px;">Fungsi & PJ</div>
                        <div style="font-size:0.8rem; line-height:1.4;">${it.fungsi_ruangan || '-'}</div>
                        <div style="font-size:0.75rem; font-weight:600; color:#1F5F5B; margin-top:5px;">PJ: ${it.penanggung_jawab||'-'}</div>
                    </div>
                    <div style="padding:12px; background:#f0fdfa; border-radius:10px; border:1px solid #ccfbf1;">
                        <div style="font-size:0.65rem; font-weight:700; color:#0f766e; text-transform:uppercase; margin-bottom:4px;">Petunjuk Navigasi</div>
                        <div style="font-size:0.8rem; line-height:1.4; color:#134e4a;">${it.navigasi||'-'}</div>
                    </div>
                    <div style="padding:10px; background:#f8fafc; border-radius:10px; border:1px solid #e2e8f0;">
                        <div style="font-size:0.6rem; font-weight:700; color:#64748b; text-transform:uppercase; margin-bottom:2px;">Kata Kunci</div>
                        <div style="font-size:0.75rem; color:#475569;">${it.kata_kunci||'-'}</div>
                    </div>
                </div>
            </div>`);
        $('#roomModal').css('display', 'flex').hide().fadeIn(200);
    };

    window.saveRoom = id => {
        const fd = new FormData();
        fd.append('_token', '{{ csrf_token() }}');
        if (id) fd.append('_method', 'PUT');
        
        fd.append('nama_ruangan', $('#fNama').val());
        fd.append('nama_gedung', $('#fGedung').val());
        fd.append('kategori', $('#fKat').val());
        fd.append('penanggung_jawab', $('#fPJ').val());
        fd.append('fungsi_ruangan', $('#fFungsi').val());
        fd.append('navigasi', $('#fNav').val());
        fd.append('kata_kunci', $('#fKunci').val());
        fd.append('jabatan_struktural', '-');
        
        const files = $('#fFotos')[0].files;
        for(let i=0; i<files.length; i++) fd.append('fotos[]', files[i]);
        
        $('#loadingOverlay').css('display', 'flex');
        $.ajax({
            url: id ? `/data-ruangan/${id}` : `{{ route('data-ruangan.store') }}`,
            type: 'POST', data: fd, processData: false, contentType: false,
            success: res => { 
                $('#loadingOverlay').hide(); 
                hideConfirmExtra();
                showResultModal(true, 'Berhasil Disimpan', 'Data ruangan telah berhasil diperbarui dan disinkronkan dengan bot AI.', () => { 
                    $('#roomModal').fadeOut(200); 
                    loadData(); 
                }); 
            },
            error: xhr => { 
                $('#loadingOverlay').hide(); 
                let errMsg = 'Terjadi kesalahan saat memproses data. Pastikan semua field wajib terisi.';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errMsg = xhr.responseJSON.message;
                    if (xhr.responseJSON.errors) {
                        const firstError = Object.values(xhr.responseJSON.errors)[0][0];
                        errMsg += ' - ' + firstError;
                    }
                }
                showResultModal(false, 'Gagal Menyimpan', errMsg); 
            }
        });
    };

    window.deleteSingleRoom = id => {
        hideConfirmExtra();
        showConfirm('Hapus Ruangan?', 'Apakah Anda yakin ingin menghapus data ini secara permanen? Tindakan ini tidak dapat dibatalkan.', () => {
            $.ajax({ 
                url: `/data-ruangan/${id}`, 
                type: 'DELETE', 
                data: { _token: '{{ csrf_token() }}' }, 
                success: () => { 
                    showToast('Data berhasil dihapus'); 
                    loadData(); 
                },
                error: () => showResultModal(false, 'Gagal', 'Gagal menghapus data.')
            });
        });
    };

    // Hapus Banyak 
    $('#btnToggleHapus').click(() => {
        deleteMode = !deleteMode;
        $('#btnToggleHapus span').text(deleteMode ? 'Batal' : 'Hapus');
        $('#bulkDeleteToolbar').toggle(deleteMode);
        $('.kolom-hapus-header').toggle(deleteMode);
        $('#dataTable').toggleClass('mode-hapus', deleteMode);
    });

    // Handler Sinkronisasi Model AI 
    const runSync = () => {
        $('#loadingOverlay').css('display', 'flex');
        $.post("{{ route('admin.sync') }}", { _token: '{{ csrf_token() }}' })
            .done(res => {
                $('#loadingOverlay').hide();
                if (res.status === 'success') {
                    showResultModal(true, 'Sinkronisasi Berhasil', 'Model AI Chatbot telah berhasil diperbarui dengan data terbaru.');
                } else {
                    showResultModal(false, 'Gagal Sinkron', res.message || 'Terjadi kesalahan pada server.');
                }
            })
            .fail(xhr => {
                $('#loadingOverlay').hide();
                const msg = xhr.responseJSON?.message || 'Tidak dapat terhubung ke Python Engine. Pastikan server Flask aktif.';
                showResultModal(false, 'Gagal Sinkron', msg);
            });
    };

    // Ikat semua tombol sync yang ada ke fungsi yang sama
    $('#btnSyncStats, #btnSyncTop').on('click', runSync);

    $('#btnConfirmDelete').click(() => {
        const ids = $('.check-hapus:checked').map(function(){ return $(this).val(); }).get();
        if(!ids.length) return alert('Pilih data dulu!');
        if(!confirm(`Hapus ${ids.length} data?`)) return;
        $('#loadingOverlay').css('display', 'flex');
        let done = 0;
        ids.forEach(id => $.ajax({ url: `/data-ruangan/${id}`, type: 'DELETE', data: { _token: '{{ csrf_token() }}' }, complete: () => { if(++done === ids.length) { $('#loadingOverlay').hide(); $('#btnToggleHapus').click(); loadData(); showToast('Data dihapus'); } } }));
    });
    $('#btnCancelDelete').click(() => $('#btnToggleHapus').click());

    window.viewPhoto = id => {
        const it = allData.find(d => d.id == id); if(!it?.foto_ruangans?.length) return;
        $('#galleryTitleSub').text(it.nama_ruangan);
        $('#galleryModalBody').html(it.foto_ruangans.map(f => `<img src="${BASE_URL}${f.path_foto}">`));
        $('#galleryModal').fadeIn(200).css('display', 'flex');
    };

    window.confirmLogout = () => {
        hideConfirmExtra();
        showConfirm('Logout?', 'Apakah Anda yakin ingin keluar dari sistem admin?', () => {
            document.getElementById('logout-form').submit();
        });
    };

    $('#btnAddRoom').click(openCreateModal);

    // Chart Monitoring Akurasi AI (Berdasarkan Feedback User)
    const rawAccuracyData = @json($accuracyData);
    if (rawAccuracyData.length > 0) {
        new Chart(document.getElementById('accuracyChart'), {
        type: 'bar',
        data: {
            labels: rawAccuracyData.map(d => d.date.split('-').slice(1).reverse().join('/')),
            datasets: [
                {
                    label: 'Jawaban Benar',
                    data: rawAccuracyData.map(d => d.correct_count),
                    backgroundColor: '#507fc5ff',
                    borderRadius: 6 
                },
                {
                    label: 'Jawaban Salah',
                    data: rawAccuracyData.map(d => d.wrong_count),
                    backgroundColor: '#b44848ff',
                    borderRadius: 6
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: { boxWidth: 12, padding: 20, font: { size: 11 } }
                },
                tooltip: {
                    callbacks: {
                        // Tampilkan jumlah feedback sebagai konteks di tooltip
                        afterBody: (items) => {
                            const idx   = items[0]?.dataIndex;
                            const total = rawAccuracyData[idx]?.total_feedback ?? 0;
                            return total > 0
                                ? [`Total Feedback: ${total} respons`]
                                : ['Belum ada feedback pada hari ini'];
                        },
                        label: (item) => {
                            return item.raw !== null
                                ? ` ${item.dataset.label}: ${item.raw} kali`
                                : ' Tidak ada data feedback';
                        }
                    }
                }
            },
            scales: {
                x: { stacked: true },
                y: {
                    stacked: true,
                    beginAtZero: true,
                    ticks: { stepSize: 1 }
                }
            }
        }
    });
    } // end if rawAccuracyData.length > 0

    // --- Single Delete Feedback Log ---
    window.deleteSingleFeedback = (id) => {
        hideConfirmExtra();
        showConfirm('Hapus Feedback?', 'Apakah Anda yakin ingin menghapus feedback ini? Feedback yang dihapus tidak akan melatih model AI lagi.', () => {
            $('#loadingOverlay').css('display', 'flex');
            $.ajax({
                url: "{{ route('admin.feedback.destroy') }}",
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}',
                    ids: [id]
                },
                success: function(res) {
                    $('#loadingOverlay').hide();
                    showResultModal(true, 'Berhasil Dihapus', res.message || 'Feedback berhasil dihapus dari database.');
                    $(`.feedback-row[data-id="${id}"]`).fadeOut(300, function() {
                        $(this).remove();
                    });
                },
                error: function(xhr) {
                    $('#loadingOverlay').hide();
                    const msg = xhr.responseJSON?.message || 'Gagal menghapus feedback.';
                    showResultModal(false, 'Gagal Menghapus', msg);
                }
            });
        });
    };

    loadData();
});
</script>
