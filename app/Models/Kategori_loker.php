<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori_loker extends Model
{
    protected $table = 'kategori_lokers';
    protected $fillable = [
        'nama',
        'slug',
        'created_at',
        'updated_at'
    ];

    public $timestamps = true;

    public function Loker()
    {
        return $this->hasMany(Loker::class, 'kategori_loker_id', 'id');
    }
}
