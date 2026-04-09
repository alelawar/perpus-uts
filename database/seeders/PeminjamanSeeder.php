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
                'siswa_id' => 2,
                'tgl_pinjam' => Carbon::now()->subDays(10),
                'tgl_kembali_seharusnya' => Carbon::now()->subDays(3),
                'tgl_kembali' => Carbon::now()->subDays(2),
                'status' => 'kembali',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'siswa_id' => 3,
                'tgl_pinjam' => Carbon::now()->subDays(5),
                'tgl_kembali_seharusnya' => Carbon::now()->addDays(2),
                'tgl_kembali' => null,
                'status' => 'dipinjam',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'siswa_id' => 1,
                'tgl_pinjam' => Carbon::now()->subDays(20),
                'tgl_kembali_seharusnya' => Carbon::now()->subDays(13),
                'tgl_kembali' => Carbon::now()->subDays(12),
                'status' => 'kembali',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'siswa_id' => 4,
                'tgl_pinjam' => Carbon::now()->subDays(1),
                'tgl_kembali_seharusnya' => Carbon::now()->addDays(6),
                'tgl_kembali' => null,
                'status' => 'dipinjam',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
