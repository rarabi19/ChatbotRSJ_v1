<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDataRuanganRequest extends FormRequest
{
    // Tentukan apakah pengguna diizinkan membuat permintaan ini.
    public function authorize(): bool
    {
        return true;
    }

    // Dapatkan aturan validasi untuk permintaan ini
    public function rules(): array
    {
        return [
            'nama_ruangan' => 'required|string|max:255',
            'nama_gedung' => 'required|string|max:255',
            'penanggung_jawab' => 'required|string|max:255',
            'jabatan_struktural' => 'nullable|string|max:255',
            'kategori' => 'nullable|string|max:255',
            'navigasi' => 'required|string',
            'kata_kunci' => 'nullable|string',
            'fungsi_ruangan' => 'required|string',
            'fotos' => 'nullable|array',
            'fotos.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:10240',
        ];
    }
}
