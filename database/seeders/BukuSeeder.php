<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BukuSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            [
                'kategori_id' => 3,
                'judul' => 'A Brief History of Time',
                'penulis' => 'Stephen Hawking',
                'penerbit' => 'Bantam Books',
                'sinopsis' => 'Penjelasan tentang konsep waktu, ruang, dan alam semesta.',
                'tahun_terbit' => '1988',
                'stok' => 5,
                'rak' => 'C1',
                'hambalan' => 1,
                'cover' => 'covers/a-brief-history-of-time.jpeg',
            ],
            [
                'kategori_id' => 3,
                'judul' => 'Atomic Habits',
                'penulis' => 'James Clear',
                'penerbit' => 'Penguin',
                'sinopsis' => 'Strategi membangun kebiasaan kecil yang berdampak besar.',
                'tahun_terbit' => '2018',
                'stok' => 6,
                'rak' => 'C2',
                'hambalan' => 1,
                'cover' => 'covers/atomic-habits.jpeg',
            ],
            [
                'kategori_id' => 3,
                'judul' => 'Cosmos',
                'penulis' => 'Carl Sagan',
                'penerbit' => 'Random House',
                'sinopsis' => 'Eksplorasi tentang alam semesta dan kehidupan.',
                'tahun_terbit' => '1980',
                'stok' => 4,
                'rak' => 'C3',
                'hambalan' => 1,
                'cover' => 'covers/carl-sagan-cosmos.jpeg',
            ],
            [
                'kategori_id' => 1,
                'judul' => 'Filosofi Teras',
                'penulis' => 'Henry Manampiring',
                'penerbit' => 'Gramedia',
                'sinopsis' => 'Pengenalan filsafat Stoikisme dalam kehidupan modern.',
                'tahun_terbit' => '2019',
                'stok' => 4,
                'rak' => 'A1',
                'hambalan' => 1,
                'cover' => 'covers/filosofi-teras.jpeg',
            ],
            [
                'kategori_id' => 1,
                'judul' => 'Habibie & Ainun',
                'penulis' => 'B.J. Habibie',
                'penerbit' => 'THC Mandiri',
                'sinopsis' => 'Kisah cinta dan perjalanan hidup Habibie dan Ainun.',
                'tahun_terbit' => '2010',
                'stok' => 3,
                'rak' => 'A2',
                'hambalan' => 1,
                'cover' => 'covers/habibie-&-ainun.jpeg',
            ],
            [
                'kategori_id' => 1,
                'judul' => 'Laskar Pelangi',
                'penulis' => 'Andrea Hirata',
                'penerbit' => 'Bentang',
                'sinopsis' => 'Perjuangan anak-anak Belitung dalam meraih pendidikan.',
                'tahun_terbit' => '2005',
                'stok' => 10,
                'rak' => 'A3',
                'hambalan' => 1,
                'cover' => 'covers/laskar-pelangi.jpeg',
            ],
            [
                'kategori_id' => 1,
                'judul' => 'Negeri 5 Menara',
                'penulis' => 'Ahmad Fuadi',
                'penerbit' => 'Gramedia',
                'sinopsis' => 'Perjalanan santri dengan mimpi besar.',
                'tahun_terbit' => '2009',
                'stok' => 7,
                'rak' => 'A4',
                'hambalan' => 1,
                'cover' => 'covers/negri-5-menara.jpeg',
            ],
            [
                'kategori_id' => 4,
                'judul' => 'Strategi Menjinakkan Diponegoro',
                'penulis' => 'Peter Carey',
                'penerbit' => 'KPG',
                'sinopsis' => 'Sejarah perang Diponegoro dan strategi kolonial.',
                'tahun_terbit' => '2014',
                'stok' => 5,
                'rak' => 'D1',
                'hambalan' => 2,
                'cover' => 'covers/strategi-menjinakkan-diponegoro.jpeg',
            ],
        ];

        foreach ($books as $book) {
            DB::table('buku')->insert([
                ...$book,
                'slug' => Str::slug($book['judul']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
