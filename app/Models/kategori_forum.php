<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kategori_forum extends Model
{
    protected $table = 'kategori_forums';
    protected $fillable = ['nama', 'slug'];

    public function forums()
    {
        return $this->hasMany(Forum::class, 'kategori_forum_id', 'id');
    }
}
