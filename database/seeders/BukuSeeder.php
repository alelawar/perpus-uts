<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('buku')->insert([
            [
                'kategori_id' => 1,
                'judul' => 'Laskar Pelangi',
                'penulis' => 'Andrea Hirata',
                'penerbit' => 'Bentang',
                'tahun_terbit' => '2005',
                'stok' => '10',
                'rak' => 'A1',
                'hambalan' => '1',
                'cover' => 'laskar.jpg',
            ],
            [
                'kategori_id' => 2,
                'judul' => 'Naruto',
                'penulis' => 'Masashi Kishimoto',
                'penerbit' => 'Shonen Jump',
                'tahun_terbit' => '1999',
                'stok' => '5',
                'rak' => 'B1',
                'hambalan' => '2',
                'cover' => 'naruto.jpg',
            ],
        ]);
    }
}
