<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $table = 'forums';

    protected $fillable = [
        'user_id',
        'kategori_forum_id',
        'judul',
        'isi',
        'status',
    ];

    public function kategoriForum()
    {
        return $this->belongsTo(kategori_forum::class, 'kategori_forum_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function komentar()
    {
        return $this->hasMany(Komentar::class, 'forum_id')->withTrashed()->latest();
    }
}

