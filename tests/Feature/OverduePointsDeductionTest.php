<?php

namespace Tests\Feature;

use App\Models\Peminjaman;
use App\Models\Siswa;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class OverduePointsDeductionTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test bahwa poin dikurangi untuk keterlambatan 1 hari
     */
    public function test_poin_dikurangi_untuk_keterlambatan_satu_hari(): void
    {
        $siswa = Siswa::create([
            'nama' => 'Budi Santoso',
            'nis' => '12345',
            'no_telp' => '081234567890',
            'email' => 'budi@test.com',
            'kelas' => '12',
            'jurusan' => 'IPA',
            'tgl_masuk' => now()->subYears(2),
            'is_verified' => true,
            'verified_at' => now(),
            'point' => 100,
        ]);

        Peminjaman::create([
            'siswa_id' => $siswa->id,
            'tgl_pinjam' => now()->subDays(8),
            'tgl_kembali_seharusnya' => now()->subDay(),
            'tgl_kembali' => null,
            'status' => 'dipinjam',
        ]);

        Artisan::call('peminjaman:deduct-overdue-points');

        $siswa->refresh();
        $this->assertEquals(80, $siswa->point);
    }

    /**
     * Test bahwa poin dikurangi untuk keterlambatan beberapa hari
     */
    public function test_poin_dikurangi_untuk_keterlambatan_beberapa_hari(): void
    {
        $siswa = Siswa::create([
            'nama' => 'Siti Aminah',
            'nis' => '12346',
            'no_telp' => '081234567891',
            'email' => 'siti@test.com',
            'kelas' => '11',
            'jurusan' => 'IPS',
            'tgl_masuk' => now()->subYears(1),
            'is_verified' => true,
            'verified_at' => now(),
            'point' => 100,
        ]);

        Peminjaman::create([
            'siswa_id' => $siswa->id,
            'tgl_pinjam' => now()->subDays(10),
            'tgl_kembali_seharusnya' => now()->subDays(3),
            'tgl_kembali' => null,
            'status' => 'dipinjam',
        ]);

        Artisan::call('peminjaman:deduct-overdue-points');

        $siswa->refresh();
        $this->assertEquals(40, $siswa->point);
    }

    /**
     * Test bahwa poin TIDAK dikurangi jika belum jatuh tempo
     */
    public function test_poin_tidak_dikurangi_jika_belum_jatuh_tempo(): void
    {
        $siswa = Siswa::create([
            'nama' => 'Ahmad Rizki',
            'nis' => '12347',
            'no_telp' => '081234567892',
            'email' => 'ahmad@test.com',
            'kelas' => '10',
            'jurusan' => 'IPA',
            'tgl_masuk' => now()->subMonths(6),
            'is_verified' => true,
            'verified_at' => now(),
            'point' => 100,
        ]);

        Peminjaman::create([
            'siswa_id' => $siswa->id,
            'tgl_pinjam' => now()->subDays(5),
            'tgl_kembali_seharusnya' => now()->addDay(),
            'tgl_kembali' => null,
            'status' => 'dipinjam',
        ]);

        Artisan::call('peminjaman:deduct-overdue-points');

        $siswa->refresh();
        $this->assertEquals(100, $siswa->point);
    }

    /**
     * Test bahwa poin TIDAK dikurangi jika buku sudah dikembalikan
     */
    public function test_poin_tidak_dikurangi_jika_sudah_dikembalikan(): void
    {
        $siswa = Siswa::create([
            'nama' => 'Rina Wati',
            'nis' => '12348',
            'no_telp' => '081234567893',
            'email' => 'rina@test.com',
            'kelas' => '12',
            'jurusan' => 'IPS',
            'tgl_masuk' => now()->subYears(3),
            'is_verified' => true,
            'verified_at' => now(),
            'point' => 100,
        ]);

        Peminjaman::create([
            'siswa_id' => $siswa->id,
            'tgl_pinjam' => now()->subDays(10),
            'tgl_kembali_seharusnya' => now()->subDays(3),
            'tgl_kembali' => now(),
            'status' => 'kembali',
        ]);

        Artisan::call('peminjaman:deduct-overdue-points');

        $siswa->refresh();
        $this->assertEquals(100, $siswa->point);
    }

    /**
     * Test bahwa poin tidak pernah menjadi negatif
     */
    public function test_poin_tidak_boleh_kurang_dari_nol(): void
    {
        $siswa = Siswa::create([
            'nama' => 'Eko Prasetyo',
            'nis' => '12349',
            'no_telp' => '081234567894',
            'email' => 'eko@test.com',
            'kelas' => '11',
            'jurusan' => 'IPA',
            'tgl_masuk' => now()->subYears(1),
            'is_verified' => true,
            'verified_at' => now(),
            'point' => 30,
        ]);

        Peminjaman::create([
            'siswa_id' => $siswa->id,
            'tgl_pinjam' => now()->subDays(12),
            'tgl_kembali_seharusnya' => now()->subDays(5),
            'tgl_kembali' => null,
            'status' => 'dipinjam',
        ]);

        Artisan::call('peminjaman:deduct-overdue-points');

        $siswa->refresh();
        $this->assertEquals(0, $siswa->point);
    }

    /**
     * Test bahwa beberapa peminjaman terlambat dihitung dengan benar
     */
    public function test_beberapa_peminjaman_terlambat_dihitung_dengan_benar(): void
    {
        $siswa = Siswa::create([
            'nama' => 'Dewi Lestari',
            'nis' => '12350',
            'no_telp' => '081234567895',
            'email' => 'dewi@test.com',
            'kelas' => '12',
            'jurusan' => 'IPS',
            'tgl_masuk' => now()->subYears(2),
            'is_verified' => true,
            'verified_at' => now(),
            'point' => 200,
        ]);

        Peminjaman::create([
            'siswa_id' => $siswa->id,
            'tgl_pinjam' => now()->subDays(9),
            'tgl_kembali_seharusnya' => now()->subDays(2),
            'tgl_kembali' => null,
            'status' => 'dipinjam',
        ]);

        Peminjaman::create([
            'siswa_id' => $siswa->id,
            'tgl_pinjam' => now()->subDays(8),
            'tgl_kembali_seharusnya' => now()->subDay(),
            'tgl_kembali' => null,
            'status' => 'dipinjam',
        ]);

        Artisan::call('peminjaman:deduct-overdue-points');

        $siswa->refresh();
        $this->assertEquals(140, $siswa->point);
    }

    /**
     * Test command berjalan sukses dan output sesuai
     */
    public function test_command_berjalan_dengan_sukses(): void
    {
        $siswa = Siswa::create([
            'nama' => 'Test Student',
            'nis' => '99999',
            'no_telp' => '081234567899',
            'email' => 'test@test.com',
            'kelas' => '12',
            'jurusan' => 'IPA',
            'tgl_masuk' => now()->subYears(2),
            'is_verified' => true,
            'verified_at' => now(),
            'point' => 100,
        ]);

        Peminjaman::create([
            'siswa_id' => $siswa->id,
            'tgl_pinjam' => now()->subDays(8),
            'tgl_kembali_seharusnya' => now()->subDay(),
            'tgl_kembali' => null,
            'status' => 'dipinjam',
        ]);

        $exitCode = Artisan::call('peminjaman:deduct-overdue-points');
        $this->assertEquals(0, $exitCode);

        $output = Artisan::output();
        $this->assertStringContainsString('Process completed successfully', $output);
    }

    /**
     * Test command tetap aman jika tidak ada data keterlambatan
     */
    public function test_command_tanpa_data_keterlambatan(): void
    {
        Siswa::create([
            'nama' => 'Student Without Loans',
            'nis' => '88888',
            'no_telp' => '081234567888',
            'email' => 'noloan@test.com',
            'kelas' => '10',
            'jurusan' => 'IPA',
            'tgl_masuk' => now()->subYears(1),
            'is_verified' => true,
            'verified_at' => now(),
            'point' => 100,
        ]);

        $exitCode = Artisan::call('peminjaman:deduct-overdue-points');

        $this->assertEquals(0, $exitCode);

        $output = Artisan::output();
        $this->assertStringContainsString('No overdue loans found', $output);
    }
}