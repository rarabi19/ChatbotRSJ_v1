<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Navigasi RSJ Tampan - Chatbot</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/chatbot.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container-utama">
        <!-- Header & Area Chat -->
        <div class="header">
            SISTEM INFORMASI RUANGAN
        </div>
        <div class="area-chat" id="areaChat">
            <div style="text-align: center; margin: 10px 0 0 0;">
                <img src="{{ asset('icon/logo-chatbot.png') }}" style="width: 160px; opacity: 0.95;">
            </div>
            <div class="bubble-welcome">
                <div class="teks-welcome">
                    Selamat datang di RSJ Tampan. Saya asisten virtual siap membantu Anda menemukan lokasi ruangan dengan cepat. Silakan pilih menu di bawah atau ketik langsung nama ruangan.
                </div>
                <button class="opsi-cepat">Saya Ingin Shalat</button>
                <button class="opsi-cepat">Lokasi Pengambilan Obat (Apotek)</button>
                <button class="opsi-cepat">Daftar Magang di RSJ</button>
                <button class="opsi-cepat">Verifikasi BPJS</button>
            </div>
        </div>

        <!-- Input User -->
        <div class="area-input">
            <input type="text" class="input-teks" id="inputUser" placeholder="Tulis nama ruangan..." autocomplete="off">
            <button class="tombol-kirim" id="tombolKirim">
                <img src="{{ asset('icon/logo-send.png') }}">
            </button>
        </div>
    </div>

    <!-- Modal Galeri Foto -->
    <div id="modalGaleri" class="modal-galeri">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">
                    <div class="icon-img">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                    </div>
                    <div>
                        <div class="title-main" id="modalTitleMain">Preview Foto</div>
                        <div class="title-sub" id="modalTitleSub">Lokasi Ruangan</div>
                    </div>
                </div>
                <span class="tutup-modal">&times;</span>
            </div>
            <div id="kontenGaleri" class="grid-galeri"></div>
            <div class="modal-footer">
                <span>📍 Foto diambil langsung dari berbagai sudut ruangan guna memudahkan navigasi Anda.</span>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            const area = $('#areaChat'), input = $('#inputUser');
            const BASE_URL = "{{ asset('room_img') }}/";

            // Variabel untuk kontrol scroll
            let userInitiatedScroll = false;
            let lastScrollTop = 0;
            let hasNewMessages = false;

            // Indikator Scroll ke Bawah
            const scrollIndicator = $('<div class="scroll-indicator" style="position:fixed; bottom:120px; right:20px; background:#FFECA8; color:#000000; padding:12px 16px; border-radius:25px; cursor:pointer; box-shadow:0 4px 12px rgba(0,0,0,0.3); display:none; z-index:1000; font-size:0.8rem; font-weight:600; transition:all 0.3s ease;"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right:6px;"><path d="M7 13l3 3 7-7"/><path d="M12 2v10"/></svg>Scroll ke bawah</div>');
            $('body').append(scrollIndicator);

            // Klik indikator scroll
            scrollIndicator.on('click', function() {
                scrollToBottom();
                $(this).fadeOut(200);
                hasNewMessages = false;
            });

            // Deteksi scroll user
            area.on('scroll', function() {
                const currentScrollTop = area.scrollTop();
                const maxScrollTop = area[0].scrollHeight - area.outerHeight();

                // Jika user scroll ke atas, tandai sebagai user initiated
                if (currentScrollTop < lastScrollTop - 10) {
                    userInitiatedScroll = true;
                }

                // Jika user sudah di dekat bawah, reset flag
                if (currentScrollTop >= maxScrollTop - 100) {
                    userInitiatedScroll = false;
                    hasNewMessages = false;
                    scrollIndicator.fadeOut(200);
                }

                lastScrollTop = currentScrollTop;
            });

            // Fungsi Scroll Halus 
            const scrollGradually = () => {
                if (!userInitiatedScroll) {
                    area.stop().animate({ scrollTop: area.scrollTop() + 80 }, 400);
                }
            };

            const scrollToBottom = () => {
                setTimeout(() => area.stop().animate({ scrollTop: area[0].scrollHeight }, 500), 100);
            };

            // Tambah Gelembung Pesan
            const addMessage = (teks, dariUser = false) => {
                area.append(`<div class="${dariUser ? 'pesan-user' : 'pesan-bot'}">${teks}</div>`);
                if (!dariUser) {
                    scrollGradually(); 
                    if (userInitiatedScroll) {
                        hasNewMessages = true;
                        scrollIndicator.fadeIn(600);
                    }
                }
            };

            // Render Kartu Informasi Ruangan
            const createCard = (data, userMsg, intent) => {
                const foto = data.foto_ruangans || [];
                const imgPath = foto.length > 0 ? foto[0].path_foto : '';
                const htmlFoto = imgPath
                    ? `<div class="foto-ruangan buka-galeri" style="background-image:url('${BASE_URL}${imgPath}'); height:160px; position:relative; border-radius:14px 14px 0 0;" data-koleksi='${JSON.stringify(foto.map(p => p.path_foto))}' data-nama="${data.nama_ruangan}" data-gedung="${data.nama_gedung}">
                        <div style="position:absolute; top:12px; left:12px; background:rgba(31, 95, 91, 0.75); color:white; padding:4px 12px; border-radius:20px; font-size:0.65rem; font-weight:600; backdrop-filter:blur(4px); border:1px solid rgba(255,255,255,0.2);">${data.kategori || 'Lokasi'}</div>
                        ${foto.length > 1 ? `<div class="badge-foto" style="bottom:12px; right:12px;">${foto.length} Foto</div>` : ''}
                       </div>`
                    : `<div class="foto-ruangan tanpa-foto" style="height:60px; position:relative; border-radius:14px 14px 0 0;">
                        <div style="position:absolute; top:12px; left:12px; background:rgba(31, 95, 91, 0.75); color:white; padding:4px 12px; border-radius:20px; font-size:0.65rem; font-weight:600; backdrop-filter:blur(4px);">${data.kategori || 'Lokasi'}</div>
                       </div>`;

                const cardId = 'card-' + Date.now();
                area.append(`
                    <div class="kartu-ruangan" id="${cardId}" style="border-radius:18px; border:none; box-shadow:0 15px 40px rgba(31, 95, 91, 0.25); background:#1F5F5B; overflow:hidden; margin:4px 0 15px 0;">
                        ${htmlFoto}
                        <div style="padding:14px 16px; display:flex; flex-direction:column; gap:6px;">
                            <div style="width:100%; font-size:0.95rem; font-weight:700; color:#ffffff; margin-bottom:2px; line-height:1.3;">
                                ${data.nama_ruangan}
                            </div>

                            <div style="font-size:0.72rem; color:rgba(255,255,255,0.7); font-weight:500; display:flex; align-items:center; gap:5px;">
                                <span style="background:rgba(255,255,255,0.1); padding:2px 8px; border-radius:6px; border:1px solid rgba(255,255,255,0.1);">${data.nama_gedung || 'Gedung'}</span>
                            </div>

                            <div style="margin-top:2px;">
                                <div style="font-size:0.72rem; line-height:1.4; color:rgba(255,255,255,0.85); font-weight:400;">
                                    ${data.fungsi_ruangan || '-'}
                                </div>
                                <div style="font-size:0.68rem; font-weight:600; color:#FFECA8; margin-top:4px;">
                                    Penanggung Jawab : ${data.penanggung_jawab || '-'}
                                </div>
                            </div>

                            <div style="padding:8px 12px; background:rgba(255,255,255,0.1); border-radius:12px; border:1px solid rgba(255,255,255,0.1); margin-top:4px; display:flex; gap:10px; align-items:center;">
                                <div style="flex-shrink:0; display:flex; align-items:center;">
                                    <img src="{{ asset('icon/iconMaps.png') }}" style="width:24px; height:24px; object-fit:contain;">
                                </div>
                                <div style="font-size:0.72rem; color:#ffffff; font-weight:500;">
                                    ${data.navigasi || '-'}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-feedback" data-for="${cardId}" style="margin-top:-22px; padding-bottom:15px; display:flex; flex-direction:column; gap:4px;">
                        <div class="teks-pertanyaan-feedback" style="margin-left:10px; font-size:0.65rem; color:#64748b; font-style:italic; opacity:0.9;">
                            Apakah bantuan navigasi yang saya berikan sudah sesuai?
                        </div>
                        <div class="grup-tombol-feedback" style="margin-left:10px; display:flex; gap:10px;">
                            <button class="tombol-feedback positif" data-val="1" data-msg="${userMsg}" data-room="${data.id}" data-intent="${intent}">
                                <svg viewBox="0 0 24 24" style="width:38px; height:38px;"><circle cx="12" cy="12" r="10"/><path d="M7 10h3V9l1-4c0-1 1-1 2-1s2 1 2 2v3h4c1 0 1 1 1 2l-2 7c0 1-1 1-2 1H9c-1 0-2-1-2-2v-7z" fill="white" transform="scale(0.6) translate(8, 8)"/></svg>
                            </button>
                            <button class="tombol-feedback negatif" data-val="0" data-msg="${userMsg}" data-room="${data.id}" data-intent="${intent}">
                                <svg viewBox="0 0 24 24" style="width:38px; height:38px;"><circle cx="12" cy="12" r="10"/><path d="M17 14h-3v1l-1 4c0 1-1 1-2 1s-2-1-2-2v-3H5c-1 0-1-1-1-2l2-7c0-1 1-1 2-1h10c1 0 2 1 2 2v7z" fill="white" transform="scale(0.6) translate(8, 8)"/></svg>
                            </button>
                        </div>
                    </div>
                `);
                if (userInitiatedScroll) {
                    hasNewMessages = true;
                    scrollIndicator.fadeIn(300);
                }
            };

            // Render Feedback untuk Respon Text-only (Intent)
            const showFeedbackText = (userMsg, intent) => {
                area.append(`
                    <div class="container-feedback text-feedback" style="margin-top:-8px; padding-bottom:15px; display:flex; flex-direction:column; gap:4px;">
                        <div class="teks-pertanyaan-feedback" style="margin-left:10px; font-size:0.65rem; color:#64748b; font-style:italic; opacity:0.9;">
                            Apakah respon chatbot sudah sesuai dengan maksud Anda?
                        </div>
                        <div class="grup-tombol-feedback" style="margin-left:10px; display:flex; gap:10px;">
                            <button class="tombol-feedback positif" data-val="1" data-msg="${userMsg}" data-room="" data-intent="${intent}">
                                <svg viewBox="0 0 24 24" style="width:38px; height:38px;"><circle cx="12" cy="12" r="10"/><path d="M7 10h3V9l1-4c0-1 1-1 2-1s2 1 2 2v3h4c1 0 1 1 1 2l-2 7c0 1-1 1-2 1H9c-1 0-2-1-2-2v-7z" fill="white" transform="scale(0.6) translate(8, 8)"/></svg>
                            </button>
                            <button class="tombol-feedback negatif" data-val="0" data-msg="${userMsg}" data-room="" data-intent="${intent}">
                                <svg viewBox="0 0 24 24" style="width:38px; height:38px;"><circle cx="12" cy="12" r="10"/><path d="M17 14h-3v1l-1 4c0 1-1 1-2 1s-2-1-2-2v-3H5c-1 0-1-1-1-2l2-7c0-1 1-1 2-1h10c1 0 2 1 2 2v7z" fill="white" transform="scale(0.6) translate(8, 8)"/></svg>
                            </button>
                        </div>
                    </div>
                `);
                if (userInitiatedScroll) {
                    hasNewMessages = true;
                    scrollIndicator.fadeIn(300);
                }
            };

            // Proses Kirim Pesan ke Backend dengan Tampilan Teks vs Payload Vektor
            const sendWithPayload = (tampilanTeks, payload) => {
                addMessage(tampilanTeks, true);

                const loading = $('<div class="mengetik"><span></span><span></span><span></span></div>');
                area.append(loading);

                $.post("{{ route('chat.handle') }}", { _token: '{{ csrf_token() }}', message: payload }, function(res) {
                    loading.remove();
                    if (res.message) addMessage(res.message);

                    // Tampilkan Opsi jika ada beberapa gedung / ruangan hasil grouping
                    if (res.options?.length > 0) {
                        const container = $('<div class="container-opsi"></div>').append('<div class="teks-opsi">Pilih gedung yang Anda tuju:</div>');
                        res.options.forEach(opt => container.append(`<button class="tombol-opsi" data-id="${opt.id}" data-name="${opt.name}">${opt.name}</button>`));
                        area.append(container);
                    }

                    // Tampilkan Kartu Ruangan jika ada, jika tidak tampilkan feedback teks
                    if (res.rooms?.length > 0) {
                        res.rooms.forEach(r => createCard(r, tampilanTeks, res.intent));
                    } else if (res.intent) {
                        // Tampilkan feedback HANYA untuk short talk / sapaan, jangan tampilkan saat grouping aktif!
                        if (!res.options || res.options.length === 0) {
                            showFeedbackText(tampilanTeks, res.intent);
                        }
                    }
                }).fail(() => { loading.remove(); addMessage("Maaf, koneksi terputus."); });
            };

            // Event Handlers
            $('#tombolKirim').click(() => {
                const msg = input.val().trim();
                if (msg) {
                    sendWithPayload(msg, msg);
                    input.val('');
                }
            });

            input.on('keypress', e => {
                if (e.which == 13) {
                    const msg = input.val().trim();
                    if (msg) {
                        sendWithPayload(msg, msg);
                        input.val('');
                    }
                }
            });

            $(document).on('click', '.opsi-cepat', function() {
                const txt = $(this).text();
                sendWithPayload(txt, txt);
            });

            $(document).on('click', '.tombol-opsi', function() {
                const id = $(this).data('id');
                const name = $(this).data('name');
                sendWithPayload(name, id);
            });

            // Galeri Foto Viewer
            $(document).on('click', '.buka-galeri', function() {
                const koleksi = $(this).data('koleksi'), nama = $(this).data('nama'), gedung = $(this).data('gedung');
                $('#modalTitleMain').text(`Preview Foto (${koleksi.length})`);
                $('#modalTitleSub').text(`${nama} - ${gedung}`);
                $('#kontenGaleri').empty().append(koleksi.map(img => `<img src="${BASE_URL}${img}">`));
                $('#modalGaleri').css('display', 'flex').hide().fadeIn(200);
            });

            // Handler Feedback & Koreksi
            $(document).on('click', '.tombol-feedback', function() {
                const btn = $(this), parent = btn.closest('.container-feedback'), isCorrect = btn.data('val');
                if (isCorrect == 0) {
                    parent.html(`
                        <div class="container-pilihan-feedback" style="display:flex; flex-direction:column; gap:6px; padding:0 10px;">
                            <div class="teks-pertanyaan-feedback" style="font-size:0.65rem; color:#64748b; font-style:italic; opacity:0.9;">
                                Apa yang kurang sesuai dari bantuan chatbot?
                            </div>
                            <div style="display:flex; gap:8px;">
                                <button class="opsi-salah-ruangan" style="background:#1F5F5B; color:white; border:none; padding:6px 12px; border-radius:8px; font-size:0.65rem; font-weight:600; cursor:pointer; transition:all 0.2s; box-shadow:0 4px 12px rgba(31,95,91,0.25);">Salah Ruangan</button>
                                <button class="opsi-salah-intent" style="background:#cbd5e1; color:#334155; border:none; padding:6px 12px; border-radius:8px; font-size:0.65rem; font-weight:600; cursor:pointer; transition:all 0.2s;">Salah Maksud</button>
                            </div>
                        </div>
                    `);
                    
                    parent.find('.opsi-salah-ruangan').click(function() {
                        parent.html(`
                            <div class="container-koreksi" style="display:flex; flex-direction:column; gap:6px; padding:0 10px;">
                                <div class="teks-pertanyaan-feedback" style="font-size:0.65rem; color:#64748b; font-style:italic; opacity:0.9;">Ruangan apa yang Anda cari?</div>
                                <div style="display:flex; gap:8px; width:100%;">
                                    <input type="text" class="input-koreksi" placeholder="Misal: IGD, Apotek..." style="flex-grow:1; padding:6px 10px; border-radius:8px; border:1px solid #cbd5e1; font-size:0.7rem; outline:none; background:white;">
                                    <button class="tombol-koreksi" style="background:#1F5F5B; color:white; border:none; padding:6px 12px; border-radius:8px; font-size:0.65rem; font-weight:600; cursor:pointer;">Kirim</button>
                                </div>
                            </div>
                        `);
                        parent.find('.tombol-koreksi').click(() => {
                            const val = parent.find('.input-koreksi').val().trim();
                            if (val) sendFeedback(btn, 0, 1, val, null, parent);
                        });
                    });
                    
                    parent.find('.opsi-salah-intent').click(function() {
                        parent.html(`
                            <div class="container-koreksi-intent" style="display:flex; flex-direction:column; gap:6px; padding:0 10px;">
                                <div class="teks-pertanyaan-feedback" style="font-size:0.65rem; color:#64748b; font-style:italic; opacity:0.9;">Apa maksud asli pertanyaan Anda?</div>
                                <div style="display:flex; gap:8px; width:100%; align-items:center;">
                                    <select class="select-koreksi-intent" style="flex-grow:1; padding:6px 10px; border-radius:8px; border:1px solid #cbd5e1; font-size:0.7rem; outline:none; background:white; color:#334155;">
                                        <option value="sapaan">Menyapa / Mengobrol (Sapaan)</option>
                                        <option value="identitas">Menanyakan Identitas Bot</option>
                                        <option value="penutup">Ucapan Terima Kasih (Penutup)</option>
                                        <option value="cari_ruangan">Mencari Ruangan / Lokasi</option>
                                        <option value="sampah">Lainnya / Tidak Jelas</option>
                                    </select>
                                    <button class="tombol-koreksi-intent" style="background:#1F5F5B; color:white; border:none; padding:6px 12px; border-radius:8px; font-size:0.65rem; font-weight:600; cursor:pointer; flex-shrink:0;">Kirim</button>
                                </div>
                            </div>
                        `);
                        parent.find('.tombol-koreksi-intent').click(() => {
                            const intentVal = parent.find('.select-koreksi-intent').val();
                            sendFeedback(btn, 0, 0, null, intentVal, parent);
                        });
                    });
                } else {
                    sendFeedback(btn, 1, 1, null, null, parent);
                }
            });
 
            const sendFeedback = (btn, isCorrect, isIntentCorrect, koreksiRuang, koreksiIntent, parent) => {
                $.post("{{ route('chat.feedback') }}", {
                    _token: '{{ csrf_token() }}',
                    user_message: btn.data('msg'),
                    is_correct: isCorrect,
                    is_intent_correct: isIntentCorrect,
                    predicted_room_id: btn.data('room') || null,
                    intent: koreksiIntent || btn.data('intent'),
                    correct_room_name: koreksiRuang
                }, () => parent.html('<div class="feedback-selesai" style="margin-left:10px; font-size:0.65rem; color:#1F5F5B; font-weight:600; font-style:italic;">Terima kasih atas masukannya!</div>'));
            };

            $('.tutup-modal').click(() => $('#modalGaleri').fadeOut(200));
        });
    </script>
</body>
</html>
