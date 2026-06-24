<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FotoRuangan extends Model
{
    protected $fillable = [
        'data_ruangan_id', 
        'path_foto', 
        'caption'
    ];

    public function dataRuangan()
    {
        return $this->belongsTo(DataRuangan::class);
    }
}
