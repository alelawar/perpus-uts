<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeminjamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('peminjaman')->insert([
            // Siswa 1 - Ahmad
            [
                'id' => 1,
                'siswa_id' => 1,
                'tgl_pinjam' => Carbon::now()->subDays(2),
                'tgl_kembali_seharusnya' => Carbon::now()->addDays(5),
                'tgl_kembali' => null,
                'status' => 'dipinjam',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'siswa_id' => 1,
                'tgl_pinjam' => Carbon::now()->subDays(20),
                'tgl_kembali_seharusnya' => Carbon::now()->subDays(13),
                'tgl_kembali' => Carbon::now()->subDays(12),
                'status' => 'kembali',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'siswa_id' => 1,
                'tgl_pinjam' => Carbon::now()->subDays(35),
                'tgl_kembali_seharusnya' => Carbon::now()->subDays(28),
                'tgl_kembali' => Carbon::now()->subDays(25),
                'status' => 'kembali',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Siswa 2 - Budi
            [
                'id' => 4,
                'siswa_id' => 2,
                'tgl_pinjam' => Carbon::now()->subDays(10),
                'tgl_kembali_seharusnya' => Carbon::now()->subDays(3),
                'tgl_kembali' => Carbon::now()->subDays(2),
                'status' => 'kembali',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'siswa_id' => 2,
                'tgl_pinjam' => Carbon::now()->subDays(1),
                'tgl_kembali_seharusnya' => Carbon::now()->addDays(6),
                'tgl_kembali' => null,
                'status' => 'dipinjam',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Siswa 3 - Paris
            [
                'id' => 6,
                'siswa_id' => 3,
                'tgl_pinjam' => Carbon::now()->subDays(5),
                'tgl_kembali_seharusnya' => Carbon::now()->addDays(2),
                'tgl_kembali' => null,
                'status' => 'dipinjam',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'siswa_id' => 3,
                'tgl_pinjam' => Carbon::now()->subDays(25),
                'tgl_kembali_seharusnya' => Carbon::now()->subDays(18),
                'tgl_kembali' => Carbon::now()->subDays(16),
                'status' => 'kembali',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Siswa 4 - Xcel
            [
                'id' => 8,
                'siswa_id' => 4,
                'tgl_pinjam' => Carbon::now()->subDays(1),
                'tgl_kembali_seharusnya' => Carbon::now()->addDays(6),
                'tgl_kembali' => null,
                'status' => 'dipinjam',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Siswa 5 - Siti
            [
                'id' => 9,
                'siswa_id' => 5,
                'tgl_pinjam' => Carbon::now()->subDays(3),
                'tgl_kembali_seharusnya' => Carbon::now()->addDays(4),
                'tgl_kembali' => null,
                'status' => 'dipinjam',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 10,
                'siswa_id' => 5,
                'tgl_pinjam' => Carbon::now()->subDays(15),
                'tgl_kembali_seharusnya' => Carbon::now()->subDays(8),
                'tgl_kembali' => Carbon::now()->subDays(7),
                'status' => 'kembali',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Siswa 6 - Rinto
            [
                'id' => 11,
                'siswa_id' => 6,
                'tgl_pinjam' => Carbon::now()->subDays(7),
                'tgl_kembali_seharusnya' => Carbon::now(),
                'tgl_kembali' => null,
                'status' => 'dipinjam',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Siswa 7 - Dewi
            [
                'id' => 12,
                'siswa_id' => 7,
                'tgl_pinjam' => Carbon::now()->subDays(4),
                'tgl_kembali_seharusnya' => Carbon::now()->addDays(3),
                'tgl_kembali' => null,
                'status' => 'dipinjam',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Siswa 8 - Eko
            [
                'id' => 13,
                'siswa_id' => 8,
                'tgl_pinjam' => Carbon::now()->subDays(2),
                'tgl_kembali_seharusnya' => Carbon::now()->addDays(5),
                'tgl_kembali' => null,
                'status' => 'dipinjam',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 14,
                'siswa_id' => 8,
                'tgl_pinjam' => Carbon::now()->subDays(30),
                'tgl_kembali_seharusnya' => Carbon::now()->subDays(23),
                'tgl_kembali' => Carbon::now()->subDays(20),
                'status' => 'kembali',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Siswa 9 - Hana
            [
                'id' => 15,
                'siswa_id' => 9,
                'tgl_pinjam' => Carbon::now()->subDays(6),
                'tgl_kembali_seharusnya' => Carbon::now()->addDays(1),
                'tgl_kembali' => null,
                'status' => 'dipinjam',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Siswa 10 - Iwan
            [
                'id' => 16,
                'siswa_id' => 10,
                'tgl_pinjam' => Carbon::now()->subDays(5),
                'tgl_kembali_seharusnya' => Carbon::now()->addDays(2),
                'tgl_kembali' => null,
                'status' => 'dipinjam',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Siswa 11 - Joko
            [
                'id' => 17,
                'siswa_id' => 11,
                'tgl_pinjam' => Carbon::now()->subDays(8),
                'tgl_kembali_seharusnya' => Carbon::now()->subDays(1),
                'tgl_kembali' => null,
                'status' => 'dipinjam',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 18,
                'siswa_id' => 11,
                'tgl_pinjam' => Carbon::now()->subDays(40),
                'tgl_kembali_seharusnya' => Carbon::now()->subDays(33),
                'tgl_kembali' => Carbon::now()->subDays(30),
                'status' => 'kembali',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Siswa 12 - Kemala
            [
                'id' => 19,
                'siswa_id' => 12,
                'tgl_pinjam' => Carbon::now()->subDays(3),
                'tgl_kembali_seharusnya' => Carbon::now()->addDays(4),
                'tgl_kembali' => null,
                'status' => 'dipinjam',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Siswa 13 - Lina
            [
                'id' => 20,
                'siswa_id' => 13,
                'tgl_pinjam' => Carbon::now()->subDays(9),
                'tgl_kembali_seharusnya' => Carbon::now()->subDays(2),
                'tgl_kembali' => null,
                'status' => 'dipinjam',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Siswa 14 - Mizar
            [
                'id' => 21,
                'siswa_id' => 14,
                'tgl_pinjam' => Carbon::now()->subDays(4),
                'tgl_kembali_seharusnya' => Carbon::now()->addDays(3),
                'tgl_kembali' => null,
                'status' => 'dipinjam',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 22,
                'siswa_id' => 14,
                'tgl_pinjam' => Carbon::now()->subDays(20),
                'tgl_kembali_seharusnya' => Carbon::now()->subDays(13),
                'tgl_kembali' => Carbon::now()->subDays(11),
                'status' => 'kembali',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Siswa 15 - Nina
            [
                'id' => 23,
                'siswa_id' => 15,
                'tgl_pinjam' => Carbon::now()->subDays(2),
                'tgl_kembali_seharusnya' => Carbon::now()->addDays(5),
                'tgl_kembali' => null,
                'status' => 'dipinjam',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
