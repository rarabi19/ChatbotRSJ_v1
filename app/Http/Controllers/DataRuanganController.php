<?php

namespace App\Http\Controllers;

use App\Models\DataRuangan;
use App\Models\FotoRuangan;
use App\Http\Requests\StoreDataRuanganRequest;
use App\Http\Requests\UpdateDataRuanganRequest;
use App\Services\DataRuanganService;
use App\Services\ChatbotService;
use Illuminate\Http\JsonResponse;

class DataRuanganController extends Controller
{
    // Controller manajemen data ruangan dan foto oleh Admin.
    public function __construct(
        protected DataRuanganService $service,
        protected ChatbotService $chatbot
    ) {}

    // Ambil semua data ruangan (JSON)
    public function index(): JsonResponse
    {
        return response()->json(['data' => $this->service->getAllData()], 200);
    }

    // Simpan ruangan baru → Zero-Sync (deferred)
    public function store(StoreDataRuanganRequest $request): JsonResponse
    {
        try {
            $data = $this->service->storeData($request->validated(), $request->file('fotos') ?? []);
            $this->chatbot->scheduleSync(); // Zero-Sync: deferred
            return response()->json(['message' => 'Ruangan berhasil dibuat', 'data' => $data->load('fotoRuangans')], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal simpan data', 'error' => $e->getMessage()], 500);
        }
    }

    // Tampilkan detail ruangan
    public function show(DataRuangan $dataRuangan): JsonResponse
    {
        return response()->json(['data' => $dataRuangan->load('fotoRuangans')], 200);
    }

    // Update data ruangan → Zero-Sync (deferred)
    public function update(UpdateDataRuanganRequest $request, DataRuangan $dataRuangan): JsonResponse
    {
        try {
            $updated = $this->service->updateData($dataRuangan, $request->validated(), $request->file('fotos') ?? []);
            $this->chatbot->scheduleSync(); // Zero-Sync: deferred
            return response()->json(['message' => 'Data berhasil diperbarui', 'data' => $updated->load('fotoRuangans')], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal update data', 'error' => $e->getMessage()], 500);
        }
    }

    // Hapus ruangan → Zero-Sync (deferred)
    public function destroy(DataRuangan $dataRuangan): JsonResponse
    {
        try {
            $this->service->deleteData($dataRuangan);
            $this->chatbot->scheduleSync(); // Zero-Sync: deferred
            return response()->json(['message' => 'Data berhasil dihapus'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal hapus data', 'error' => $e->getMessage()], 500);
        }
    }

    // Hapus foto spesifik (tidak perlu sync — foto tidak mempengaruhi model NLP)
    public function destroyPhoto(FotoRuangan $foto): JsonResponse
    {
        try {
            $this->service->deletePhoto($foto);
            return response()->json(['message' => 'Foto berhasil dihapus'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal hapus foto', 'error' => $e->getMessage()], 500);
        }
    }
}
