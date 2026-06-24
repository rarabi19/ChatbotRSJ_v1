<?php

namespace App\Services;

use App\Models\DataRuangan;
use App\Models\FotoRuangan;
use Illuminate\Support\Facades\DB;

class DataRuanganService
{
    // Manajemen Data RUangan

    // Ambil semua data ruangan urut terbaru
    public function getAllData() { return DataRuangan::with('fotoRuangans')->latest()->get(); }

    // Simpan data ruangan baru
    public function storeData(array $data, array $files = [])
    {
        return DB::transaction(function () use ($data, $files) {
            $ruangan = DataRuangan::create($data);
            if ($files) $this->uploadPhotos($ruangan, $files);
            return $ruangan;
        });
    }

    // Update data ruangan
    public function updateData(DataRuangan $ruangan, array $data, array $files = [])
    {
        return DB::transaction(function () use ($ruangan, $data, $files) {
            $ruangan->update($data);
            if ($files) $this->uploadPhotos($ruangan, $files);
            return $ruangan;
        });
    }

    // Hapus ruangan & semua fotonya
    public function deleteData(DataRuangan $ruangan): bool
    {
        return DB::transaction(function () use ($ruangan) {
            foreach ($ruangan->fotoRuangans as $foto) $this->deletePhysicalFile($foto->path_foto);
            return $ruangan->delete();
        });
    }

    // Hapus satu foto spesifik
    public function deletePhoto(FotoRuangan $foto): bool
    {
        $this->deletePhysicalFile($foto->path_foto);
        return $foto->delete();
    }

    // Private Utilities 

    // Proses unggah foto ke folder public
    protected function uploadPhotos(DataRuangan $ruangan, array $files): void
    {
        $destinationPath = public_path('room_img');
        
        // Buat folder jika belum ada agar tidak gagal saat upload
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        foreach ($files as $file) {
            // Sanitasi nama file untuk menghindari error karena karakter khusus/spasi
            $safeName = preg_replace('/[^a-zA-Z0-9_\.-]/', '_', $file->getClientOriginalName());
            $nama = time() . '_' . $safeName;
            
            // Pindahkan file ke target directory
            $file->move($destinationPath, $nama);
            $ruangan->fotoRuangans()->create(['path_foto' => $nama]);
        }
    }

    // Hapus file foto dari storage fisik
    protected function deletePhysicalFile(string $namaFile): void
    {
        $path = public_path('room_img/' . $namaFile);
        if (file_exists($path)) unlink($path);
    }
}
