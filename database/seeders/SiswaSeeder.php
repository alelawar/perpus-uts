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
                'nama' => 'Ahmad Lesmana',
                'nis' => '12345',
                'email' => 'ale@gmail.com',
                'no_telp' => '12212112',
                'kelas' => 'XI',
                'jurusan' => 'RPL',
                'tgl_masuk' => Carbon::parse('2022-07-01'),
                'point' => 100,
            ],
            [
                'nama' => 'Budi Hartono',
                'nis' => '12346',
                'no_telp' => '12212113',
                'email' => 'ale1@gmail.com',
                'kelas' => 'X',
                'jurusan' => 'TKJ',
                'tgl_masuk' => Carbon::parse('2023-07-01'),
                'point' => 85,
            ],
            [
                'nama' => 'Paris Hidayat',
                'nis' => '12347',
                'no_telp' => '12212114',
                'email' => 'al2e@gmail.com',
                'kelas' => 'X',
                'jurusan' => 'TKJ',
                'tgl_masuk' => Carbon::parse('2023-07-01'),
                'point' => 95,
            ],
            [
                'nama' => 'Xcel Pratama',
                'nis' => '12348',
                'no_telp' => '12212115',
                'email' => 'ale4@gmail.com',
                'kelas' => 'X',
                'jurusan' => 'TKJ',
                'tgl_masuk' => Carbon::parse('2023-07-01'),
                'point' => 60,
            ],
            [
                'nama' => 'Siti Nuraini',
                'nis' => '12349',
                'no_telp' => '12212116',
                'email' => 'siti@gmail.com',
                'kelas' => 'XI',
                'jurusan' => 'RPL',
                'tgl_masuk' => Carbon::parse('2022-08-15'),
                'point' => 110,
            ],
            [
                'nama' => 'Rinto Suryanto',
                'nis' => '12350',
                'no_telp' => '12212117',
                'email' => 'rinto@gmail.com',
                'kelas' => 'X',
                'jurusan' => 'MM',
                'tgl_masuk' => Carbon::parse('2023-07-01'),
                'point' => 75,
            ],
            [
                'nama' => 'Dewi Kusuma',
                'nis' => '12351',
                'no_telp' => '12212118',
                'email' => 'dewi@gmail.com',
                'kelas' => 'XII',
                'jurusan' => 'RPL',
                'tgl_masuk' => Carbon::parse('2021-07-01'),
                'point' => 88,
            ],
            [
                'nama' => 'Eko Pratama',
                'nis' => '12352',
                'no_telp' => '12212119',
                'email' => 'eko@gmail.com',
                'kelas' => 'XI',
                'jurusan' => 'TKJ',
                'tgl_masuk' => Carbon::parse('2022-07-01'),
                'point' => 45,
            ],
            [
                'nama' => 'Hana Salsabila',
                'nis' => '12353',
                'no_telp' => '12212120',
                'email' => 'hana@gmail.com',
                'kelas' => 'X',
                'jurusan' => 'RPL',
                'tgl_masuk' => Carbon::parse('2023-09-01'),
                'point' => 105,
            ],
            [
                'nama' => 'Iwan Kusuma',
                'nis' => '12354',
                'no_telp' => '12212121',
                'email' => 'iwan@gmail.com',
                'kelas' => 'XII',
                'jurusan' => 'TKJ',
                'tgl_masuk' => Carbon::parse('2021-07-01'),
                'point' => 55,
            ],
            [
                'nama' => 'Joko Widodo',
                'nis' => '12355',
                'no_telp' => '12212122',
                'email' => 'joko@gmail.com',
                'kelas' => 'XI',
                'jurusan' => 'MM',
                'tgl_masuk' => Carbon::parse('2022-07-01'),
                'point' => 92,
            ],
            [
                'nama' => 'Kemala Dewi',
                'nis' => '12356',
                'no_telp' => '12212123',
                'email' => 'kemala@gmail.com',
                'kelas' => 'X',
                'jurusan' => 'TKJ',
                'tgl_masuk' => Carbon::parse('2023-07-01'),
                'point' => 70,
            ],
            [
                'nama' => 'Lina Handayani',
                'nis' => '12357',
                'no_telp' => '12212124',
                'email' => 'lina@gmail.com',
                'kelas' => 'XII',
                'jurusan' => 'RPL',
                'tgl_masuk' => Carbon::parse('2021-07-01'),
                'point' => 115,
            ],
            [
                'nama' => 'Mizar Putra',
                'nis' => '12358',
                'no_telp' => '12212125',
                'email' => 'mizar@gmail.com',
                'kelas' => 'XI',
                'jurusan' => 'TKJ',
                'tgl_masuk' => Carbon::parse('2022-08-01'),
                'point' => 50,
            ],
            [
                'nama' => 'Nina Oktavia',
                'nis' => '12359',
                'no_telp' => '12212126',
                'email' => 'nina@gmail.com',
                'kelas' => 'X',
                'jurusan' => 'MM',
                'tgl_masuk' => Carbon::parse('2023-07-01'),
                'point' => 99,
            ],
        ]);
    }
}
