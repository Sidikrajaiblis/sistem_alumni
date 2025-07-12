<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loker extends Model
{
    protected $table = 'informasi_lokers';
    protected $fillable = [
        'kategori_loker_id',
        'judul',
        'lokasi',
        'gaji',
        'persyaratan',
        'gambar',
        'created_at',
        'updated_at'
    ];

    public $timestamps = true;

    public function kategoriLoker()
    {
        return $this->belongsTo(Kategori_loker::class, 'kategori_loker_id', 'id');
    }
}
