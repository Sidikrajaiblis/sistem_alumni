<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class kategori_forum extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategori_forums')->insert([
            ['nama' => 'Teknologi', 'slug' => 'teknologi', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Karir', 'slug' => 'karir', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Pendidikan', 'slug' => 'pendidikan', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Bisnis', 'slug' => 'bisnis', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Hobi', 'slug' => 'hobi', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
