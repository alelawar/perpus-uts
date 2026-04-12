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
            // Peminjaman #1 - Siswa 1, Peminjaman 1 (masih dipinjam)
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

            // Peminjaman #2 - Siswa 1, Peminjaman 2 (sudah dikembalikan)
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

             // Peminjaman #3 - Siswa 1, Peminjaman 3 (sudah dikembalikan)
            [
                'peminjaman_id' => 3,
                'buku_id' => 4, // Negeri 5 Menara
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Peminjaman #4 - Siswa 2, Peminjaman 4 (sudah dikembalikan)
            [
                'peminjaman_id' => 4,
                'buku_id' => 6, // Rich Dad Poor Dad
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'peminjaman_id' => 4,
                'buku_id' => 10, // The Psychology of Money
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Peminjaman #5 - Siswa 2, Peminjaman 5 (masih dipinjam)
            [
                'peminjaman_id' => 5,
                'buku_id' => 8, // Attack on Titan
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'peminjaman_id' => 5,
                'buku_id' => 9, // Ayat-Ayat Cinta
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Peminjaman #6 - Siswa 3, Peminjaman 6 (masih dipinjam)
            [
                'peminjaman_id' => 6,
                'buku_id' => 11, // Dilan 1990
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'peminjaman_id' => 6,
                'buku_id' => 14, // Perahu Kertas
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'peminjaman_id' => 6,
                'buku_id' => 12, // Start With Why
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Peminjaman #7 - Siswa 3, Peminjaman 7 (sudah dikembalikan)
            [
                'peminjaman_id' => 7,
                'buku_id' => 13, // Dragon Ball
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Peminjaman #8 - Siswa 4, Peminjaman 8 (masih dipinjam)
            [
                'peminjaman_id' => 8,
                'buku_id' => 2, // Naruto
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Peminjaman #9 - Siswa 5, Peminjaman 9 (masih dipinjam)
            [
                'peminjaman_id' => 9,
                'buku_id' => 15, // Hujan
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'peminjaman_id' => 9,
                'buku_id' => 4, // Negeri 5 Menara
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'peminjaman_id' => 9,
                'buku_id' => 1, // Laskar Pelangi
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Peminjaman #10 - Siswa 5, Peminjaman 10 (sudah dikembalikan)
            [
                'peminjaman_id' => 10,
                'buku_id' => 3, // Bumi
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'peminjaman_id' => 10,
                'buku_id' => 6, // Rich Dad Poor Dad
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Peminjaman #11 - Siswa 6, Peminjaman 11 (masih dipinjam)
            [
                'peminjaman_id' => 11,
                'buku_id' => 5, // Atomic Habits
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'peminjaman_id' => 11,
                'buku_id' => 17, // Sejarah Islam Nusantara
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Peminjaman #12 - Siswa 7, Peminjaman 12 (masih dipinjam)
            [
                'peminjaman_id' => 12,
                'buku_id' => 7, // One Piece
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'peminjaman_id' => 12,
                'buku_id' => 10, // The Psychology of Money
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Peminjaman #13 - Siswa 8, Peminjaman 13 (masih dipinjam)
            [
                'peminjaman_id' => 13,
                'buku_id' => 16, // Filosofi Teras
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'peminjaman_id' => 13,
                'buku_id' => 11, // Dilan 1990
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Peminjaman #14 - Siswa 8, Peminjaman 14 (sudah dikembalikan)
            [
                'peminjaman_id' => 14,
                'buku_id' => 8, // Attack on Titan
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'peminjaman_id' => 14,
                'buku_id' => 12, // Start With Why
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Peminjaman #15 - Siswa 9, Peminjaman 15 (masih dipinjam)
            [
                'peminjaman_id' => 15,
                'buku_id' => 13, // Dragon Ball
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'peminjaman_id' => 15,
                'buku_id' => 9, // Ayat-Ayat Cinta
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Peminjaman #16 - Siswa 10, Peminjaman 16 (masih dipinjam)
            [
                'peminjaman_id' => 16,
                'buku_id' => 14, // Perahu Kertas
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'peminjaman_id' => 16,
                'buku_id' => 2, // Naruto
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'peminjaman_id' => 16,
                'buku_id' => 18, // Jojo's Bizarre Adventure
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Peminjaman #17 - Siswa 11, Peminjaman 17 (masih dipinjam)
            [
                'peminjaman_id' => 17,
                'buku_id' => 19, // Thinking Fast and Slow
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'peminjaman_id' => 17,
                'buku_id' => 15, // Hujan
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Peminjaman #18 - Siswa 11, Peminjaman 18 (sudah dikembalikan)
            [
                'peminjaman_id' => 18,
                'buku_id' => 4, // Negeri 5 Menara
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'peminjaman_id' => 18,
                'buku_id' => 1, // Laskar Pelangi
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'peminjaman_id' => 18,
                'buku_id' => 5, // Atomic Habits
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Peminjaman #19 - Siswa 12, Peminjaman 19 (masih dipinjam)
            [
                'peminjaman_id' => 19,
                'buku_id' => 3, // Bumi
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'peminjaman_id' => 19,
                'buku_id' => 6, // Rich Dad Poor Dad
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Peminjaman #20 - Siswa 13, Peminjaman 20 (masih dipinjam)
            [
                'peminjaman_id' => 20,
                'buku_id' => 7, // One Piece
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'peminjaman_id' => 20,
                'buku_id' => 10, // The Psychology of Money
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'peminjaman_id' => 20,
                'buku_id' => 16, // Filosofi Teras
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Peminjaman #21 - Siswa 14, Peminjaman 21 (masih dipinjam)
            [
                'peminjaman_id' => 21,
                'buku_id' => 8, // Attack on Titan
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'peminjaman_id' => 21,
                'buku_id' => 11, // Dilan 1990
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Peminjaman #22 - Siswa 14, Peminjaman 22 (sudah dikembalikan)
            [
                'peminjaman_id' => 22,
                'buku_id' => 9, // Ayat-Ayat Cinta
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Peminjaman #23 - Siswa 15, Peminjaman 23 (masih dipinjam)
            [
                'peminjaman_id' => 23,
                'buku_id' => 12, // Start With Why
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'peminjaman_id' => 23,
                'buku_id' => 13, // Dragon Ball
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'peminjaman_id' => 23,
                'buku_id' => 14, // Perahu Kertas
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
