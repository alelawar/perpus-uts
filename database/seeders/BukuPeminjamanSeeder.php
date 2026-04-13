<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BukuPeminjamanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('buku_peminjaman')->insert([
            
            // Peminjaman 1
            ['peminjaman_id' => 1, 'buku_id' => 6, 'created_at' => now(), 'updated_at' => now()], // Laskar Pelangi
            ['peminjaman_id' => 1, 'buku_id' => 2, 'created_at' => now(), 'updated_at' => now()], // Atomic Habits

            // Peminjaman 2
            ['peminjaman_id' => 2, 'buku_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['peminjaman_id' => 2, 'buku_id' => 3, 'created_at' => now(), 'updated_at' => now()],

            // Peminjaman 3
            ['peminjaman_id' => 3, 'buku_id' => 7, 'created_at' => now(), 'updated_at' => now()],

            // Peminjaman 4
            ['peminjaman_id' => 4, 'buku_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['peminjaman_id' => 4, 'buku_id' => 2, 'created_at' => now(), 'updated_at' => now()],

            // Peminjaman 5
            ['peminjaman_id' => 5, 'buku_id' => 8, 'created_at' => now(), 'updated_at' => now()],
            ['peminjaman_id' => 5, 'buku_id' => 5, 'created_at' => now(), 'updated_at' => now()],

            // Peminjaman 6
            ['peminjaman_id' => 6, 'buku_id' => 6, 'created_at' => now(), 'updated_at' => now()],
            ['peminjaman_id' => 6, 'buku_id' => 7, 'created_at' => now(), 'updated_at' => now()],
            ['peminjaman_id' => 6, 'buku_id' => 1, 'created_at' => now(), 'updated_at' => now()],

            // Peminjaman 7
            ['peminjaman_id' => 7, 'buku_id' => 3, 'created_at' => now(), 'updated_at' => now()],

            // Peminjaman 8
            ['peminjaman_id' => 8, 'buku_id' => 2, 'created_at' => now(), 'updated_at' => now()],

            // Peminjaman 9
            ['peminjaman_id' => 9, 'buku_id' => 7, 'created_at' => now(), 'updated_at' => now()],
            ['peminjaman_id' => 9, 'buku_id' => 6, 'created_at' => now(), 'updated_at' => now()],

            // Peminjaman 10
            ['peminjaman_id' => 10, 'buku_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['peminjaman_id' => 10, 'buku_id' => 5, 'created_at' => now(), 'updated_at' => now()],

            // Peminjaman 11
            ['peminjaman_id' => 11, 'buku_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['peminjaman_id' => 11, 'buku_id' => 4, 'created_at' => now(), 'updated_at' => now()],

            // Peminjaman 12
            ['peminjaman_id' => 12, 'buku_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['peminjaman_id' => 12, 'buku_id' => 8, 'created_at' => now(), 'updated_at' => now()],

            // Peminjaman 13
            ['peminjaman_id' => 13, 'buku_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['peminjaman_id' => 13, 'buku_id' => 6, 'created_at' => now(), 'updated_at' => now()],

            // Peminjaman 14
            ['peminjaman_id' => 14, 'buku_id' => 5, 'created_at' => now(), 'updated_at' => now()],

            // Peminjaman 15
            ['peminjaman_id' => 15, 'buku_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['peminjaman_id' => 15, 'buku_id' => 7, 'created_at' => now(), 'updated_at' => now()],

            // Peminjaman 16
            ['peminjaman_id' => 16, 'buku_id' => 8, 'created_at' => now(), 'updated_at' => now()],
            ['peminjaman_id' => 16, 'buku_id' => 2, 'created_at' => now(), 'updated_at' => now()],

            // Peminjaman 17
            ['peminjaman_id' => 17, 'buku_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['peminjaman_id' => 17, 'buku_id' => 6, 'created_at' => now(), 'updated_at' => now()],

            // Peminjaman 18
            ['peminjaman_id' => 18, 'buku_id' => 7, 'created_at' => now(), 'updated_at' => now()],
            ['peminjaman_id' => 18, 'buku_id' => 1, 'created_at' => now(), 'updated_at' => now()],

            // Peminjaman 19
            ['peminjaman_id' => 19, 'buku_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['peminjaman_id' => 19, 'buku_id' => 4, 'created_at' => now(), 'updated_at' => now()],

            // Peminjaman 20
            ['peminjaman_id' => 20, 'buku_id' => 8, 'created_at' => now(), 'updated_at' => now()],
            ['peminjaman_id' => 20, 'buku_id' => 3, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}