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
     * Test that points are deducted for overdue loans (1 day overdue)
     */
    public function test_points_deducted_for_one_day_overdue_loan(): void
    {
        // Arrange: Create a student with 100 points
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

        // Create an overdue loan (1 day overdue)
        Peminjaman::create([
            'siswa_id' => $siswa->id,
            'tgl_pinjam' => now()->subDays(8),
            'tgl_kembali_seharusnya' => now()->subDay(), // Yesterday
            'tgl_kembali' => null,
            'status' => 'dipinjam',
        ]);

        // Act: Run the deduction command
        Artisan::call('peminjaman:deduct-overdue-points');

        // Assert: Points should be deducted by 20
        $siswa->refresh();
        $this->assertEquals(80, $siswa->point);
    }

    /**
     * Test that points are deducted for multiple days overdue
     */
    public function test_points_deducted_for_multiple_days_overdue(): void
    {
        // Arrange: Create a student with 100 points
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

        // Create a loan that is 3 days overdue
        Peminjaman::create([
            'siswa_id' => $siswa->id,
            'tgl_pinjam' => now()->subDays(10),
            'tgl_kembali_seharusnya' => now()->subDays(3), // 3 days ago
            'tgl_kembali' => null,
            'status' => 'dipinjam',
        ]);

        // Act: Run the deduction command
        Artisan::call('peminjaman:deduct-overdue-points');

        // Assert: Points should be deducted by 60 (20 * 3 days)
        $siswa->refresh();
        $this->assertEquals(40, $siswa->point);
    }

    /**
     * Test that points are NOT deducted for loans that are not yet overdue
     */
    public function test_no_points_deducted_for_loans_not_overdue(): void
    {
        // Arrange: Create a student with 100 points
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

        // Create a loan due tomorrow
        Peminjaman::create([
            'siswa_id' => $siswa->id,
            'tgl_pinjam' => now()->subDays(5),
            'tgl_kembali_seharusnya' => now()->addDay(), // Tomorrow
            'tgl_kembali' => null,
            'status' => 'dipinjam',
        ]);

        // Act: Run the deduction command
        Artisan::call('peminjaman:deduct-overdue-points');

        // Assert: Points should remain the same
        $siswa->refresh();
        $this->assertEquals(100, $siswa->point);
    }

    /**
     * Test that points are NOT deducted for returned loans
     */
    public function test_no_points_deducted_for_returned_loans(): void
    {
        // Arrange: Create a student with 100 points
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

        // Create a loan that was overdue but already returned
        Peminjaman::create([
            'siswa_id' => $siswa->id,
            'tgl_pinjam' => now()->subDays(10),
            'tgl_kembali_seharusnya' => now()->subDays(3),
            'tgl_kembali' => now(), // Already returned
            'status' => 'kembali',
        ]);

        // Act: Run the deduction command
        Artisan::call('peminjaman:deduct-overdue-points');

        // Assert: Points should remain the same (no deduction for returned loans)
        $siswa->refresh();
        $this->assertEquals(100, $siswa->point);
    }

    /**
     * Test that points never go below zero
     */
    public function test_points_never_go_below_zero(): void
    {
        // Arrange: Create a student with only 30 points
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

        // Create a loan that is 5 days overdue (should deduct 100 points)
        Peminjaman::create([
            'siswa_id' => $siswa->id,
            'tgl_pinjam' => now()->subDays(12),
            'tgl_kembali_seharusnya' => now()->subDays(5),
            'tgl_kembali' => null,
            'status' => 'dipinjam',
        ]);

        // Act: Run the deduction command
        Artisan::call('peminjaman:deduct-overdue-points');

        // Assert: Points should be 0, not negative
        $siswa->refresh();
        $this->assertEquals(0, $siswa->point);
    }

    /**
     * Test that multiple overdue loans deduct points correctly
     */
    public function test_multiple_overdue_loans_deduct_points_correctly(): void
    {
        // Arrange: Create a student with 200 points
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

        // Create first overdue loan (2 days)
        Peminjaman::create([
            'siswa_id' => $siswa->id,
            'tgl_pinjam' => now()->subDays(9),
            'tgl_kembali_seharusnya' => now()->subDays(2),
            'tgl_kembali' => null,
            'status' => 'dipinjam',
        ]);

        // Create second overdue loan (1 day)
        Peminjaman::create([
            'siswa_id' => $siswa->id,
            'tgl_pinjam' => now()->subDays(8),
            'tgl_kembali_seharusnya' => now()->subDay(),
            'tgl_kembali' => null,
            'status' => 'dipinjam',
        ]);

        // Act: Run the deduction command
        Artisan::call('peminjaman:deduct-overdue-points');

        // Assert: Points should be deducted by 60 (40 + 20)
        $siswa->refresh();
        $this->assertEquals(140, $siswa->point);
    }

    /**
     * Test command output and success status
     */
    public function test_command_executes_successfully_and_outputs_correct_info(): void
    {
        // Arrange: Create a student and overdue loan
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

        // Act & Assert: Command should return success code 0
        $exitCode = Artisan::call('peminjaman:deduct-overdue-points');
        $this->assertEquals(0, $exitCode);

        // Verify output contains success message
        $output = Artisan::output();
        $this->assertStringContainsString('Process completed successfully', $output);
    }

    /**
     * Test that command handles case with no overdue loans gracefully
     */
    public function test_command_handles_no_overdue_loans_gracefully(): void
    {
        // Arrange: Create students but no overdue loans
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

        // Act: Run the command
        $exitCode = Artisan::call('peminjaman:deduct-overdue-points');

        // Assert: Command should complete successfully
        $this->assertEquals(0, $exitCode);
        
        $output = Artisan::output();
        $this->assertStringContainsString('No overdue loans found', $output);
    }
}