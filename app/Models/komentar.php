<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Komentar extends Model
{
    use SoftDeletes;
    protected $table = 'komentar';

    protected $fillable = [
        'forum_id',
        'user_id',
        'isi',
        'deleted_by',
        'deleted_at',
    ];

    public function forum()
    {
        return $this->belongsTo(Forum::class, 'forum_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

