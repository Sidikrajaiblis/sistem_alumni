<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class forum extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('forums')->insert([
            [
                'user_id' => 4,
                'kategori_forum_id' => 1,
                'judul' => 'Pertanyaan tentang sistem',
                'isi' => 'Saya ingin bertanya tentang cara menggunakan sistem ini.',
                'status' => 'published',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'kategori_forum_id' => 2,
                'judul' => 'Diskusi tentang lowongan kerja',
                'isi' => 'Ada yang tahu lowongan kerja terbaru?',
                'status' => 'published',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'kategori_forum_id' => 1,
                'judul' => 'Masalah teknis',
                'isi' => 'Saya mengalami masalah teknis saat menggunakan sistem ini. Ada yang bisa membantu?',
                'status' => 'published',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 4,
                'kategori_forum_id' => 3,
                'judul' => 'Saran untuk pengembangan sistem',
                'isi' => 'Saya punya beberapa saran untuk pengembangan sistem ini. Bagaimana cara menyampaikannya?',
                'status' => 'published',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
