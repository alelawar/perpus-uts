<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('siswa')->insert([
            [
                'nama' => 'Ahmad',
                'nis' => '12345',
                'no_telp' => '12212112',
                'kelas' => 'XI',
                'jurusan' => 'RPL',
                'tgl_masuk' => Carbon::parse('2022-07-01'),
                'point' => 100,
            ],
            [
                'nama' => 'Budi',
                'nis' => '12346',
                'no_telp' => '12212113',
                'kelas' => 'X',
                'jurusan' => 'TKJ',
                'tgl_masuk' => Carbon::parse('2023-07-01'),
                'point' => 100,
            ],
        ]);
    }
}
