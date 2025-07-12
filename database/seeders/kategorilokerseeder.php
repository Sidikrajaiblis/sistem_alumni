<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class kategorilokerseeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Teknologi Informasi',
            'Kesehatan',
            'Pendidikan',
            'Keuangan',
            'Pemasaran',
            'Manufaktur',
            'Transportasi',
            'Pertanian',
            'Pariwisata',
            'Lainnya'
        ];

        foreach ($categories as $category) {
            DB::table('kategori_lokers')->insert([
                'nama' => $category,
                'slug' => strtolower(str_replace(' ', '-', $category)),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
