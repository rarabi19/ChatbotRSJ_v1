<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataRuangan extends Model
{
    // Fillable
    protected $fillable = [
        'nama_ruangan',
        'nama_gedung',
        'penanggung_jawab',
        'jabatan_struktural',
        'navigasi',
        'kata_kunci',
        'kategori',
        'fungsi_ruangan',
    ];

    // Photos
    public function fotoRuangans()
    {
        return $this->hasMany(FotoRuangan::class);
    }
}
