<div id="sec-rooms" class="section">
    <div class="toolbar">
        <div class="search-box">
            <svg viewBox="0 0 24 24"><path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg>
            <input type="text" id="searchInput" placeholder="Cari ruangan...">
        </div>
        <div class="toolbar-buttons">
            <button class="btn btn-green" id="btnAddRoom">
                <span>Tambah Ruangan</span>
            </button>
            <button class="btn btn-red" id="btnToggleHapus">
                <span>Hapus</span>
            </button>
            <button class="btn btn-yellow" id="btnSyncTop">
                <span>Syncron Ai</span>
            </button>
        </div>
    </div>

    <!-- Bulk Delete Toolbar -->
    <div class="toolbar" id="bulkDeleteToolbar" style="display: none; background: #fee2e2; padding: 10px; border-radius: 8px;">
        <div style="font-size: 0.75rem; color: #dc2626; font-weight: 600; flex: 1;">Pilih data untuk dihapus</div>
        <button class="btn btn-red" id="btnConfirmDelete">Konfirmasi Hapus</button>
        <button class="btn" style="background: #94a3b8; color: white;" id="btnCancelDelete">Batal</button>
    </div>

    <div class="table-wrapper">
        <table class="styled-table" id="dataTable">
            <thead>
                <tr>
                    <th class="kolom-hapus-header" style="display:none; width: 30px;"></th>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama Ruangan</th>
                    <th>Gedung</th>
                    <th>Kategori</th>
                    <th>Fungsi</th>
                    <th>Penanggung Jawab</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                <tr><td colspan="9" style="text-align:center;">Memuat data...</td></tr>
            </tbody>
        </table>
    </div>

    <div class="pagination" id="pagination"></div>
</div>
