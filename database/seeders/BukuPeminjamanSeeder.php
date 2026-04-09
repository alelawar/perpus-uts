<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BukuPeminjamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('buku_peminjaman')->insert([
            // Peminjaman #1 - Siswa 1 pinjam 3 buku (masih dipinjam)
            [
                'peminjaman_id' => 1,
                'buku_id' => 1, // Laskar Pelangi
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'peminjaman_id' => 1,
                'buku_id' => 3, // Bumi
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'peminjaman_id' => 1,
                'buku_id' => 5, // Atomic Habits
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Peminjaman #2 - Siswa 2 pinjam 2 buku (sudah dikembalikan)
            [
                'peminjaman_id' => 2,
                'buku_id' => 2, // Naruto
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'peminjaman_id' => 2,
                'buku_id' => 7, // One Piece
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Peminjaman #3 - Siswa 3 pinjam 4 buku (masih dipinjam)
            [
                'peminjaman_id' => 3,
                'buku_id' => 4, // Negeri 5 Menara
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'peminjaman_id' => 3,
                'buku_id' => 9, // Ayat-Ayat Cinta
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'peminjaman_id' => 3,
                'buku_id' => 11, // Dilan 1990
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'peminjaman_id' => 3,
                'buku_id' => 14, // Perahu Kertas
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Peminjaman #4 - Siswa 1 pinjam 1 buku (sudah dikembalikan)
            [
                'peminjaman_id' => 4,
                'buku_id' => 6, // Rich Dad Poor Dad
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Peminjaman #5 - Siswa 4 pinjam 2 buku (masih dipinjam)
            [
                'peminjaman_id' => 5,
                'buku_id' => 8, // Attack on Titan
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'peminjaman_id' => 5,
                'buku_id' => 13, // Dragon Ball
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
