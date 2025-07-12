<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class lokerseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lokers = [
            [
                'kategori_loker_id' => 1,
                'judul' => 'Software Engineer',
                'lokasi' => 'Jakarta',
                'gaji' => '10,000,000 per bulan',
                'persyaratan' => 'Pengalaman minimal 2 tahun di bidang pemrograman.',
                'gambar' => 'images/loker2/Coding.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_loker_id' => 2,
                'judul' => 'Dokter Umum',
                'lokasi' => 'Bandung',
                'gaji' => '15,000,000 per bulan',
                'persyaratan' => 'Memiliki STR dan pengalaman minimal 1 tahun.',
                'gambar' => 'images/loker2/dokter_umum.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_loker_id' => 3,
                'judul' => 'Guru Matematika',
                'lokasi' => 'Yogyakarta',
                'gaji' => '8,000,000 per bulan',
                'persyaratan' => 'Lulusan S1 Pendidikan Matematika.',
                'gambar' => 'images/loker2/guru_mtk.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_loker_id' => 4,
                'judul' => 'Akuntan',
                'lokasi' => 'Surabaya',
                'gaji' => '12,000,000 per bulan',
                'persyaratan' => 'Lulusan S1 Akuntansi dan memiliki sertifikasi.',
                'gambar' => 'images/loker2/akuntansi.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_loker_id' => 5,
                'judul' => 'Marketing Executive',
                'lokasi' => 'Medan',
                'gaji' => '7,000,000 per bulan',
                'persyaratan' => 'Pengalaman di bidang pemasaran minimal 1 tahun.',
                'gambar' => 'images/loker2/marketing.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('informasi_lokers')->insert($lokers);
    }
}
