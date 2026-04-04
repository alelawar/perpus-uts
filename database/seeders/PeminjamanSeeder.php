<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
                'buku_id' => 1,
                'siswa_id' => 1,
                'tgl_pinjam' => Carbon::now(),
                'tgl_kembali_seharusnya' => Carbon::now()->addDays(7),
                'tgl_kembali' => null,
                'status' => 'dipinjam',
            ],
            [
                'buku_id' => 2,
                'siswa_id' => 2,
                'tgl_pinjam' => Carbon::now()->subDays(10),
                'tgl_kembali_seharusnya' => Carbon::now()->subDays(3),
                'tgl_kembali' => Carbon::now()->subDays(2),
                'status' => 'kembali',
            ],
        ]);
    }
}
